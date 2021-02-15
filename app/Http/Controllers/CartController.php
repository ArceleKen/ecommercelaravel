<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\CartSessionRepository;
use App\Repositories\ProductRepository;
use App\Repositories\CategorieRepository;

use App\Models\Product;

class CartController extends Controller
{

	protected $cartRepository; // L'instance cartSessionRepository
    protected $categorieRepository;
    protected $productRepository;

    public function __construct (CartSessionRepository $cartRepository, ProductRepository $productRepository, CategorieRepository $categorieRepository) {
    	$this->cartRepository = $cartRepository;
        $this->categorieRepository = $categorieRepository;
        $this->productRepository = $productRepository;
    }

    # Affichage du panier
    public function show () {
        $categories = $this->categorieRepository->findWhere(array("status" => 1));
    	return view("customer.cart.show")->with('categories', $categories); // resources\views\cart\show.blade.php
    }

    # Ajout d'un produit au panier
    public function add (Product $product, Request $request) {
    	
    	// Validation de la requête
    	$this->validate($request, [
    		"quantity" => "numeric|min:1"
    	]);

        $product = $this->productRepository->findWhere(array("id" => $product->id, "status" => 1))->first();
        if(is_null($product) || !isset($request->quantity))
            return back();

    	// Ajout/Mise à jour du produit au panier avec sa quantité
    	$this->cartRepository->add($product, $request->quantity);

    	// Redirection vers le panier avec un message
    	return back()->withMessage("Produit ajouté au panier avec succès");
    }

    // Suppression d'un produit du panier
    public function remove (Product $product) {

    	// Suppression du produit du panier par son identifiant
    	$this->cartRepository->remove($product);

    	// Redirection vers le panier
    	return back();
    }

    // Vider la panier
    public function empty () {

    	// Suppression des informations du panier en session
    	$this->cartRepository->empty();

    	// Redirection vers le panier
    	return back()->withMessage("Panier vidé");

    }

    public function updateqty (Request $request) {

        $product = $this->productRepository->findWhere(array("id" => $request->idProd, "status" => 1))->first();
        if(!is_null($product) && isset($request->quantity) && $request->quantity > 0)
            $this->cartRepository->add($product, $request->quantity);
        else
            $this->cartRepository->remove($product);

        // Redirection vers le panier
        return response()->json(['status' => 'Ok']);

    }

}