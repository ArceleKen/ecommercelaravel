<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Repositories\CategorieRepository;
use App\Repositories\ProductRepository;

class HomeController extends Controller
{
    private $categorieRepository;
    private $productRepository;

    public function __construct(ProductRepository $productRepo, CategorieRepository $categorieRepo)
    {
        $this->productRepository = $productRepo;
        $this->categorieRepository = $categorieRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $categories = $this->categorieRepository->findWhere(array("status" => 1));

        

        //var_dump($categories);
        $products = $this->productRepository->findWhere(array("status" => 1));

        return view('customer.home')->with('home', 'home')
                ->with('categories', $categories)
                ->with('products', $products);
    }

    public function index()
    {
        return view('home');
    }


}
