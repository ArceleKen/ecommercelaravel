<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CheckCreneau
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if($user != null ){

            $debut =  $user->debut;
            $fin =  $user->fin;
            $tdh = intval(date("H"));
            $tdi = intval(date("i"));

            $d = explode(":", $debut);
            $f = explode(":", $fin);
            if(count($d) >=2 && count($f) >= 2){
                /*var_dump(intval($d[0]));
                var_dump(intval($d[1]));
                var_dump(intval($f[0]));
                var_dump(intval($f[1]));
                var_dump(intval($tdh));
                var_dump(intval( $tdi));*/ //die();
                if((intval($d[0]) <= $tdh &&  $tdh < intval($f[0])) || ( $tdh == $f[0] &&  $tdi <= $f[1] ))
                    return $next($request);

            }
        }

        Session::flush();
        return Redirect::to('/');

    }
}
