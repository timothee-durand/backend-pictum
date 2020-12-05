<?php

namespace App\Http\Middleware;

use App\Gestionnaire;
use Closure;

class VerifyGest
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
       // echo "idgest".json_encode(Gestionnaire::where("id_univ", $request->id_gestionnaire)->first() );

        if($request->id_gestionnaire == null ){
            return response("Il manque le paramètre id_gestionnaire", 401);
        }
        //vérifie si la requête est faite par un gestionnaire
        if(Gestionnaire::where("id_univ", $request->id_gestionnaire)->first() != null) {
            return $next($request);
        } else {
            return response ("Seuls les gestionnaires ont accès à cette route.", 401);
        }


    }
}
