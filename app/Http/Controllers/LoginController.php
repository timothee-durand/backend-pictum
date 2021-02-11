<?php

namespace App\Http\Controllers;

use App\Blacklist;
use App\Gestionnaire;
use App\Http\Resources\ReservationResource;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Anam\Captcha\Captcha;


class LoginController extends Controller
{
    private $notFind = "Non trouvé";
    private $blackliste = "vous êtes blacklisté, contactez l'administrateur pour régulariser votre situation";
    private $gestionnaire = "GEST";
    private $reservation = "RES";
    private $erreur = "ERR";


    /**
     * Connexion à Pictum
     *
     * @group Login
     * @bodyParam username string required id universitaire de la personne
     * @bodyParam password string required mot de passe de la personne
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|void
     */

    public function login(Request $request)
    {

        $user = $this->searchUserName($request->username);


        if ($user === $this->notFind || $user === $this->blackliste || $user === $this->erreur) {
            //si pas trouvé ou blacklisté
            return response($user, 403);

        } else {
            //sinon je l'authentifie

            Log::debug(json_encode($user));

            //on regarde si c'est un gestionnaire ou une réservation


            if ($this->isCredentialsCorrects($user, $request->password)) {
                //si le mdp est correct

                if (!$this->isEmailVerified($user)) {
                    //si l'email n'est pas vérifié
                    return response("Email not verified", 418);
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


    /**
     * Vérifie que la personne fait partie de la base de donnée LDAP
     * @group Login
     * @bodyParam id_univ string required
     *
     * @response 200 {
     * "nom": "BLOCH",
     * "prenom": "CHRISTELLE",
     * "email": "christelle.bloch@univ-fcomte.fr",
     * "groups": [
     * "iutbm",
     * "enseignant"
     * ]
     * }
     *
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function verifyLDAP(Request $request)
    {
        $request->validate([
            "id_univ" => "string|required"
        ]);

        if($this->searchUserName($request->id_univ) !== $this->notFind) {
            return response("Vous êtes déjà enregistré !", 418);
        }

        $ldap = $this->getInfoLDAPByUsername($request->id_univ);
        if ($ldap !== false) {
            return response($this->getJSONFromLDAP($ldap));
        } else {
            return response("NOT FIND LDAP", 404);
        }
    }

    /**
     * Vérifie qu'une réservation existe par rapport à un gestionnaire
     * @group Login
     * @bodyParam username required string ID Universitaire du gestionnaire concerné
     * @response Renvoie la réservation concernée ou 404 si le gestionnaire n'existe pas
     *
     * @param Request $request
     * @return ReservationResource|Reservation|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function verifyRes(Request $request) {
        $request->validate([
            "username"=>"required|string"
        ]);
        if(Reservation::where('id_univ', $request->username)->first()) {
            return new ReservationResource(Reservation::where('id_univ', $request->username)->first());

        } else {
            if(Gestionnaire::where('id_univ', $request->username)->first()) {
                $gest = Gestionnaire::where('id_univ', $request->username)->first();
                //echo "res".json_encode($gest);
                $res = new Reservation([
                    "id_univ"=>$gest->id_univ,
                    "nom" => $gest->nom,
                    "prenom" => $gest->prenom,
                    "email" =>$gest->email,
                    "prof" => 1,
                    "password"=> $gest->password,
                    "raison_pro"=> "",
                    "valide"=> 1
                ]);
                if($res->save()){
                    return $res;
                } else {
                    return \response("Erreur à l'enregistrement", 500);
                }
            } else {
                return \response("Gestionnaire non trouvé, veuillez-vous recréer un compte", 404);
            }
        }
    }

    /**
     * Retourne tous les utilisateurs LDAP de l'IUTBM
     * @group Login
     *
     *
     * @return array
     */
    public function getLDAPUsers()
    {
        include(app_path("/Http/Controllers/client_api/UtilsLDAP.php"));
        $users = getAllUsers(["iutbm", 'personnel_bu_montbe']);
        $response = [];
        foreach ($users as $group) {
            foreach ($group as $user) {
                $response[] = $this->simplifyLDAPResponse($user);
            }
        }

        return $response;
    }

    private function getInfoLDAPByUsername($id_univ)
    {
        include(app_path("/Http/Controllers/client_api/UtilsLDAP.php"));

        //recherche si l'username LDAP est bon
        return getInfoLDAP($id_univ);
    }

    private function getJSONFromLDAP($ldap)
    {
        return json_encode($this->simplifyLDAPResponse($ldap));
    }

    private function simplifyLDAPResponse($ldap)
    {

        return [
            "nom" => $ldap["nom"][0],
            "prenom" => $ldap["prenom"][0],
            "email" => $ldap["courriel"][0],
            "groups" => $ldap["inGroup"],
            "id_univ" => $ldap["uid"]
        ];
    }

    private function getInfoLDAPByMail($mail)
    {
        include(app_path("/Http/Controllers/client_api/UtilsLDAP.php"));

        //recherche si l'username LDAP est bon
        return getInfoLDAPByMail($mail)[0];
    }


    public function searchUserName($username)
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
        if (Blacklist::where('email', $mail)->first()) {

            return $this->blackliste;

        } elseif (Gestionnaire::where('email', $mail)->first()) {

            $result = Gestionnaire::where('email', $mail)->first();

        } elseif (Reservation::where('email', $mail)->first()) {

            $result = Reservation::where('email', $mail)->first();

        } else {

            $result = $this->notFind;
        }
        return $result;
    }


    private function isCredentialsCorrects($user, $password)
    {
        if (Hash::check($password, $user["password"])) {
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
