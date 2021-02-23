<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use App\Repositories\CategorieRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Product;
use App\Models\Image;
use Flash;
use Response;

class ProductController extends AppBaseController
{
    private $productRepository;
    private $categorieRepository;

    public function __construct(ProductRepository $productRepo, CategorieRepository $categorieRepo)
    {
        $this->productRepository = $productRepo;
        $this->categorieRepository = $categorieRepo;
    }

    public function index($categorie_id, Request $request)
    {   
        $categories = $this->categorieRepository->findWhere(array("status" => 1));
        $products =[];

        if(!isset($request->keywords) || $request->keywords == null || $request->keywords == ""){
            if ($categorie_id == 0){
                $products = $this->productRepository->findWhere(array("status" => 1));
            }
            else{
                $products = $this->productRepository->findWhere(array("categorie_id" => $categorie_id, "status" => 1));

            }
        }else{ //Il s'agit de la recherche 
            $keywords = explode(" ", strtolower($request->keywords));
            $products = $this->productRepository->searchProducts(isset($request->categorie_id) ? $categorie_id :'0', $keywords);
        }

        //produits à la une
        $prodsALaUne = Product::where("status", 1)->orderBy('id', 'desc')->take(4)->get();
        //var_dump($prodsALaUne);
        return view('customer.products')->with('categories', $categories)
                    ->with('products', $products)
                    ->with('prodsALaUne', $prodsALaUne);
    }

    public function searchproducts(Request $request)
    {
        $input = $request->all();   

        $categorie_id = isset($input["categorie_id"]) ? $input["categorie_id"] : "0";
        $keywords = isset($input["keywords"])?$input["keywords"]:'';

        return redirect('/products/'.$categorie_id."/?keywords=".$keywords);
    }

    public function detail($product_id, Request $request)
    {
        $categories = $this->categorieRepository->findWhere(array("status" => 1));

        $product = $this->productRepository->findWhere(array("id" => $product_id, "status" => 1))->first();
        if(is_null($product))
            return redirect('/products/0')->with("error", "Le produit que vous venez de selectionné n'est plus disponible");

        //var_dump(json_encode($product->images[0]->name));

        $products = $this->productRepository->findWhere(array("categorie_id" => $product->categorie_id, "status" => 1));

        return view('customer.details_product')->with('categories', $categories)
                    ->with('product', $product)
                    ->with('products', $products);
    }




    /// ADMIN

    # Affichage du panier
    public function productslist () {
        $categorieslist = $this->categorieRepository->all();
        $productslist = $this->productRepository->all();

        return view("products.index")->with('categorieslist', $categorieslist)
                                    ->with('productslist', $productslist); 
    }

    # Ajout d'un produit au panier
    public function createproduct (Request $request) {
        $this->validate($request, [
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $image = $request->file('main_image');
        $main_image = 'main-'.'prod_'.$this->my_random_string(5).time().'.'.$image->getClientOriginalExtension();
        $destinationPath = base_path('customer/img');
        //var_dump($main_image);
        $image->move($destinationPath, $main_image);


        $info = "";

        $input = $request->all();

        try{
            $data = [
                    "name" => $request->name,
                    "description" => $request->description,
                    "price" => $request->price,
                    "status" => $request->status,
                    "categorie_id" => $request->categorie_id,
                ];


            $data['main_image'] = $main_image;
            $product = $this->productRepository->create($data);
        }catch(\Exception $e){

        }finally{
            return redirect('/productslist');
        }
    }


    public function updateproduct(Request $request)
    {   

        $this->validate($request, [
            'main_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('main_image');
        
        try{
            $product = $this->productRepository->findWhere(array("id" => $request->idProduct))->first();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->status = $request->status;
            $product->categorie_id = $request->categorie_id;

            if(!is_null($image)){
                $main_image = 'main-'.'prod_'.$this->my_random_string(5).time().'.'.$image->getClientOriginalExtension();
                $destinationPath = base_path('customer/img');
                var_dump($main_image);
                $image->move($destinationPath, $main_image);
                $product->main_image = $main_image;
            }
            $product->save();
        }catch(\Exception $e){

        }finally{
            return redirect('/productslist');
        }
    }
    

}