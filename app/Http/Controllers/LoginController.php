<?php

namespace App\Http\Controllers;

use App\Blacklist;
use App\Gestionnaire;
use App\Http\Resources\ReservationResource;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

;


class LoginController extends Controller
{
    private $notFind = "NOT FIND";
    private $blackliste = "BL";
    private $gestionnaire = "GEST";
    private $reservation = "RES";
    private $erreur = "ERR";


    /**
     * Connexion à Pictum
     * Si on est pas connecté au CAS de l'université, redirige vers la page de connexion puis renvoie la réponse,
     * sinon, rnevoie juste la réponse
     * Si connexion vers MMI-Projet, faire la requete comme ca :
     *
     * let headers = {
     * "Authorization": "Bearer {YOUR_AUTH_KEY}",
     * "Content-Type": "application/json",
     * "Accept": "application/json",
     * };
     *
     *axios({
     * method: 'get',
     * url: url,
     * headers:headers,
     * auth: {
     * username: username,
     * password: password
     * }
     * })
     *
     * @group Login
     * @response {
     * "userType": "GEST",
     * "user": {
     * "id": 6,
     * "created_at": null,
     * "updated_at": null,
     * "nom": "MARTIN",
     * "prenom": "Dilan",
     * "mail": "dilan.martin@univ-fcomte.fr",
     * "id_univ": "dmartin",
     * "admin": 0
     * },
     * "token": "23|vQPQxXdy7e6LRgLXExslsuyR78yabPij3QkcMZWQ"
     * }
     *
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|void
     */

    public function login(Request $request)
    {

        $user = $this->searchByMail($request->mail);

        if ($user === $this->notFind || $user === $this->blackliste || $user === $this->erreur) {
            //si pas trouvé ou blacklisté
            return response($user, 403);

        } else {
            //sinon je l'authentifie

            Log::debug(json_encode($user));

            //on regarde si c'est un gestionnaire ou une réservation


            if ($this->isCredentialsCorrects($user, $request->password)) {
                //si le mdp est correct

                if(!$this->isEmailVerified($user)){
                    //si l'email n'est pas vérifié
                    return response("Email not verified", 401);
                }

                $token = $user->createToken("user-token")->plainTextToken;

                $response = [
                    "user" => $user,
                    "token" => $token
                ];

                if (array_key_exists("admin", $user->toArray())) {
                    //c'est un gestionnaire
                    $response["user_type"] = $this->gestionnaire;
                } else {
                    $response["user_type"] = $this->reservation;
                }

                return response($response, 201);

            } else {
                return response("Password Not Match", 401);
            }
        }

    }

//    public function logout() {
//        return cas()->logout();
//    }

    private function searchUserName($username)
    {

        //regarde déjà si il est blacklisté
        if (Blacklist::where('id_univ', $username)->first()) {

            return $this->blackliste;

        } elseif (Gestionnaire::where('id_univ', $username)->first()) {

            $result = Gestionnaire::where('id_univ', $username)->first();

        } elseif (Reservation::where('id_univ', $username)->first()) {

            $result = Reservation::where('id_univ', $username)->first();

        } else {

            $result = $this->notFind;
        }
        return $result;
    }

    private function searchByMail($mail)
    {

        //regarde déjà si il est blacklisté
        if (Blacklist::where('mail', $mail)->first()) {

            return $this->blackliste;

        } elseif (Gestionnaire::where('mail', $mail)->first()) {

            $result = Gestionnaire::where('mail', $mail)->first();

        } elseif (Reservation::where('mail', $mail)->first()) {

            $result = Reservation::where('mail', $mail)->first();

        } else {

            $result = $this->notFind;
        }
        return $result;
    }

    private function loginLDAP($userName)
    {
        include(app_path("/Http/Controllers/client_api/UtilsLDAP.php"));

        //recherche si l'username LDAP est bon
        $ldap = getInfoLDAP($userName);
        //echo "test".json_encode($ldap)."\n";

        //si il fait partie de l'iut
        if ($ldap != false) {

            $pictum = $this->searchUserName($userName);

            //si il n'a pas été trouvé chez nous
            if ($pictum === $this->notFind) {
                //on l'enregistre
                $reservation = new Reservation([
                    "nom" => $ldap["nom"][0],
                    "prenom" => $ldap["prenom"][0],
                    "mail" => $ldap["courriel"][0],
                    "id_univ" => $userName,
                    "prof" => $this->isProf($ldap["inGroup"])
                ]);

                //si l'enregistrement se passe bien
                if ($reservation->save()) {
                    return new ReservationResource($reservation);
                } //sinon
                else {
                    return $this->erreur;
                }

                //echo "res".json_encode($reservation);
            } //si il est déjà dans la base de donnée on lui retourne ce qu'il faut pour l'identification
            else {
                //echo "pictum trouvé cool";

                return $pictum;
            }

            //echo "pictum".json_encode($pictum);
        } else {
            return $this->notFind;
        }

    }


    private function isProf(array $groups)
    {
        foreach ($groups as $group) {
            if ($group === "enseignant") {
                return 1;
            }
        }
        return 0;
    }

    private function isCredentialsCorrects($user, $password)
    {
        if ($user["password"] === $password) {
            return true;
        } else {
            return false;
        }
    }

    private function isEmailVerified($user)
    {
        if ($user["email_verified_at"] !== null) {
            return true;
        } else {
            return false;
        }
    }


}
