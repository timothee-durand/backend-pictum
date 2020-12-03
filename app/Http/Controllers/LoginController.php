<?php

namespace App\Http\Controllers;

use App\Blacklist;
use App\Gestionnaire;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    private $notFind = "NOT FIND";
    private $blackliste = "BL";
    private $gestionnaire = "GEST";
    private $reservation = "RES";

    /**
     * Connexion
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|void
     */
    public function login(Request $request)
    {
        $username = $this->searchUserName($request->username);

        Log::debug(json_encode($username));

        if($username === $this->notFind || $username === $this->blackliste) {
            //si pas trouvé ou blacklisté
            return response($username, 403);
        } else {
            //sinon je l'authentifie
            //echo json_encode($username);
            //on regarde si c'est un gestionnaire ou une réservation
            if(array_key_exists("admin", $username->toArray())) {
                //c'est un gestionnaire
                if(Auth::guard('gest')->loginUsingId($username->id)){
                    return response($this->gestionnaire, 200);
                } else {
                    return response("Authentification non réussie en tant que " . $this->gestionnaire, 403);
                }
            } else {
                //si c'est une reservation
                if(Auth::guard("res")->loginUsingId($username->id)){
                    return response($this->reservation, 200);
                } else {
                    return response("Authentification non réussie en tant que " . $this->reservation, 403);
                }
            }
        }

    }

    private function searchUserName($username)
    {

        //regarde déjà si il est blacklisté
        if(Blacklist::where('id_univ', $username)->first()) {
            return $this->blackliste;

        } elseif (Gestionnaire::where('id_univ', $username)->first()){
            $result = Gestionnaire::where('id_univ', $username)->first();

        } elseif (Reservation::where('id_univ', $username)->first()){
            $result = Reservation::where('id_univ', $username)->first();

        } else {
            $result = $this->notFind;
        }
        return $result;
    }

    /**
     * @return false|\Illuminate\Contracts\Auth\Authenticatable|string|null
     */
    public function getLoggedUsers() {
        if (! Auth::guard('res')->check()) {
            return 'You are unauthenticated';
        } else {
            return "alles ist richtig";
        }
    }


}
