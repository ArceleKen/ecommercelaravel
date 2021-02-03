<?php

namespace App\Http\Controllers;


use App\Repositories\LoginRepository;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController
{

    private $userRepository;

    public function __construct( UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function login(Request $request)
    {
        $user = $this->userRepository->findByField('login', $request->login);

        if (count($user) > 0) {
            if (Auth::attempt(["login" => $request->login, "password" => $request->password])) {
                Session::put('username', $request->login);
                Session::put('log', true);
                return Redirect::to('/connect');
            } else {
                Session::flash("error", "Mot de passe incorrect");
                $errors = ['password' => "Mot de passe incorrect"];
                return view('auth.login')->with("login", $request->login)->withInput($request->input())
                    ->withErrors($errors);

            }
        }

        Session::flash("error", "Mot de passe incorrect");
        $errors = ['password' => "Code pin incorrect"];
        return view('auth.login')->with("login", $request->login)->withInput($request->input())
            ->withErrors($errors);



    }


    public function logout()
    {
        Session::flush();
        return Redirect::to('/');
    }


    public function requestPwd(Request $request)
    {
        $user = $this->userRepository->findByField('login', $request->login);
       // var_dump($user); die();
        if (count($user) > 0) {

            $debut =  $user[0]->debut;
            $fin =  $user[0]->fin;
            $tdh = date("H");
            $tdi = date("i");

            $d = explode(":", $debut);
            $f = explode(":", $fin);

            if(count($d) >=2 && count($f) >= 2){
                if((intval($d[0]) <= $tdh &&  $tdh < intval($f[0])) || ( $tdh == $f[0] &&  $tdi <= $f[1] ))
                    return view('auth.login')->with("login", $request->login);
                else
                    $errors = ['login' =>  "Vous ne pouvez pas vous connecter durant ce creneau"];

            }else
                $errors = ['login' =>  "Vous ne pouvez pas vous connecter durant ce creneau"];



        }else{
            $errors = ['login' =>  "Login incorrect"];
        }


        return redirect()->back()
            ->withInput($request->input())
            ->withErrors($errors);


    }


    public function getLogin()
    {

        return view('auth.verification');


    }


}