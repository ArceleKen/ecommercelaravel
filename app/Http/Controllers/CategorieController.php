<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\UserRepository;
use App\Repositories\ProductRepository;
use App\Repositories\CategorieRepository;

use App\Models\Product;
use App\Models\Categorie;
use App\Models\UserModel;
use App\Email;

class CategorieController extends AppBaseController
{

    protected $categorieRepository;
    protected $userRepository;
    protected $productRepository;

    public function __construct (ProductRepository $productRepository, UserRepository $userRepository, CategorieRepository $categorieRepository) {
        $this->categorieRepository = $categorieRepository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
    }

    # Affichage du panier
    public function index () {
        $categorieslist = $this->categorieRepository->all();

    	return view("categories.index")->with('categorieslist', $categorieslist); 
    }

    # Ajout d'un produit au panier
    public function createcategorie (Request $request) {
        $info = "";

        $input = $request->all();

        try{
            $categorie = $this->categorieRepository->create([
                    "name" => $request->name,
                    "description" => $request->description,
                    "status" => $request->status,
                ]);
        }catch(\Exception $e){

        }finally{
            return redirect('/categorieslist');
        }
    }


    public function updatecategorie(Request $request)
    {   
        try{
            $categorie = $this->categorieRepository->findWhere(array("id" => $request->idCategorie))->first();
            $categorie->name = $request->name;
            $categorie->description = $request->description;
            $categorie->status = $request->status;
            $categorie->save();
        }catch(\Exception $e){

        }finally{
            return redirect('/categorieslist');
        }
    }
    

}