<?php

namespace App\Http\Controllers;

use App\Blacklist;
use App\Gestionnaire;
use App\Reservation;
use Hackzilla\PasswordGenerator\Generator\HumanPasswordGenerator;
use Hackzilla\PasswordGenerator\Generator\HybridPasswordGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Faker\Generator;

class PasswordResetController extends Controller
{
    private $notFind = "Utilisateur non enregistré";

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
            return response("Identifiant non connu", 404);
        }

        $generator = new HybridPasswordGenerator();

        $generator
            ->setLowercase()
            ->setNumbers()
            ->setSymbols(false)
            ->setSegmentLength(3)
            ->setSegmentCount(4)
            ->setSegmentSeparator('-');

        $password = $generator->generatePassword();


        //echo "pasA".$user->password."\n";
        $user->password = Hash::make($password);
        //echo "pasAp".$user->password;
        if($user->save()) {
            $user->sendNewPassword($password);
            return response("Password Reset", 200);
        } else {
            return response("Problème interne, contactez l'administrateur", 500);
        }




    }

    public function setPassword(Request $request){
        $request->validate([
            "id_univ"=>"required|string",
            "password"=>"required|string|min:6"
        ]);
        $user = $this->searchUserName($request->id_univ);
        if($user === $this->notFind){
            return ($this->notFind);
        }

        $user->password = Hash::make($request->password);

        if($user->save()) {
            return \response("MDP à jour");
        } else {
            return response("Problème à l'enregistrement, contactez administrateur", 500);
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
