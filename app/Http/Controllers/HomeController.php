<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $categorie = Categorie::all();

        // foreach (Categorie::all() as $elt) {
        //     echo $elt->name;
        // }

        //var_dump(json_encode($categorie));

        return view('customer.home')->with('home', 'home')
                ->with('categorie', $categorie);
    }

    public function index()
    {
        return view('home');
    }


}
