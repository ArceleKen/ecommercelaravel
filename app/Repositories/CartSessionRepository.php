<?php

namespace App\Repositories;

use App\Models\Product;

class CartSessionRepository implements CartInterfaceRepository  {

	# Afficher le panier
	public function show () {
		return view("customer.cart.show"); // resources\views\customer\cart\show.blade.php
	}

	# Ajouter/Mettre à jour un produit du panier
	public function add (Product $product, $quantity) {		
		$cart = session()->get("cart"); // On récupère le panier en session

		// Les informations du produit à ajouter
		$product_details = [
			'name' => $product->name,
			'main_image' => $product->main_image,
			'price' => $product->price,
			'quantity' => $quantity
		];
		
		$cart[$product->id] = $product_details; // On ajoute ou on met à jour le produit au panier
		session()->put("cart", $cart); // On enregistre le panier

		$totalQuantity = 0;
		$totalPrice = 0;
		foreach ($cart as $key => $item) {
			$totalQuantity += $item['quantity'];
			$totalPrice += $item['price']*$item['quantity'];
		}
		session()->put("totalQuantity", $totalQuantity);
		session()->put("totalPrice", $totalPrice);
	}

	# Retirer un produit du panier
	public function remove (Product $product) {
		$cart = session()->get("cart"); // On récupère le panier en session
		unset($cart[$product->id]); // On supprime le produit du tableau $cart
		session()->put("cart", $cart); // On enregistre le panier

		$totalQuantity = 0;
		$totalPrice = 0;
		foreach ($cart as $key => $item) {
			$totalQuantity += $item['quantity'];
			$totalPrice += $item['price']*$item['quantity'];
		}
		session()->put("totalQuantity", $totalQuantity);
		session()->put("totalPrice", $totalPrice);
	}

	# Vider le panier
	public function empty () {
		session()->forget("cart"); // On supprime le panier en session
		session()->forget("totalQuantity");
		session()->forget("totalPrice");
	}

}
