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
        $user = $this->userRepository->findByField('email', $request->email);

        if (count($user) > 0) {

            if($user[0]->status !=1 || $user[0]->type != 'admin'){
                $errors = ['error' => "Vous n'etes pas autorisé à vous connecter ici"];
                return redirect('/login')->with("login", $request->login)->withInput($request->input())
                                        ->withErrors($errors);
            }

            if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
                $debut =  $user[0]->debut;
                $fin =  $user[0]->fin;
                $tdh = date("H");
                $tdi = date("i");

                $d = explode(":", $debut);
                $f = explode(":", $fin);

                if(count($d) >=2 && count($f) >= 2){
                    if((intval($d[0]) <= $tdh &&  $tdh < intval($f[0])) || ( $tdh == $f[0] &&  $tdi <= $f[1] )){
                        
                        Session::put('email', $request->email);
                        Session::put('log', true);
                        return Redirect::to('/connect');
                    }
                    else
                        $errors = ['error' =>  "Vous ne pouvez pas vous connecter durant ce creneau"];

                }else
                    $errors = ['error' =>  "Vous ne pouvez pas vous connecter durant ce creneau"];

            }else 
                $errors = ['password' => "Email ou Mot de passe incorrect."];

        }else
            $errors = ['error' => "Email ou Mot de passe incorrect"];
        
        Session::flush();
        return redirect('/login')->with("login", $request->login)->withInput($request->input())
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

        return view('auth.login');


    }


}