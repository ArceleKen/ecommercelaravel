<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Categorie;
use Flash;
use Response;

class ProductController extends AppBaseController
{
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

    public function index(Request $request)
    {
        $categorie = Categorie::all();

        // foreach (Categorie::all() as $elt) {
        //     echo $elt->name;
        // }

        //var_dump(json_encode($categorie));

        return view('customer.products')->with('categorie', $categorie);
    }

    public function detail(Request $request)
    {
        $categorie = Categorie::all();

        // foreach (Categorie::all() as $elt) {
        //     echo $elt->name;
        // }

        //var_dump(json_encode($categorie));

        return view('customer.details_product')->with('categorie', $categorie);
    }
    

}