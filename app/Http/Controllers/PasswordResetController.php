<?php

namespace App\Http\Controllers;

use App\Blacklist;
use App\Gestionnaire;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Faker\Generator;

class PasswordResetController extends Controller
{
    private $notFind = "NOT FIND";

    /**
     * Envoie un nouveau mot de passe sécurisé par mail
     * @group Login
     * @urlParam ID_UNIV required id universitaire de la personne à qui renvoyer le mot de passe
     *
     *
     * @param $id_univ
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function reset($id_univ){
        $user = $this->searchUserName($id_univ);

        if($user === $this->notFind) {
            return response($user, 404);
        }

        $password = file_get_contents("https://www.passwordrandom.com/query?command=password");

        //echo "pasA".$user->password."\n";
        $user->password = Hash::make($password);
        //echo "pasAp".$user->password;
        if($user->save()) {
            $user->sendNewPassword($password);
            return response("Password Reset", 200);
        } else {
            return response("A problem occur", 500);
        }




    }

    public function searchUserName($username)
    {
        //regarde déjà si il est blacklisté
        if (Gestionnaire::where('id_univ', $username)->first()) {

            $result = Gestionnaire::where('id_univ', $username)->first();

        } elseif (Reservation::where('id_univ', $username)->first()) {

            $result = Reservation::where('id_univ', $username)->first();

        } else {

            $result = $this->notFind;
        }
        return $result;
    }

}
