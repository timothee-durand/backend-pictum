<?php

namespace App\Http\Controllers;

use App\Blacklist;
use App\Gestionnaire;
use App\Reservation;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    private $notFind = "NOT FIND";
    /**
     * Route de vérification de l'email
     * Générée à la création de compte
     * @group Login
     *
     * @param $user_mail
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function verify($user_mail, Request $request) {
        if (!$request->hasValidSignature()) {
            return response()->json(["msg" => "Invalid/Expired url provided."], 401);
        }

        $user = $this->searchByMail($user_mail);

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        return redirect()->to('/');
    }


    /**
     * Route pour renvoyer l'email de confirmation
     * @group Login
     *
     * @param $user_mail
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function resend($id_univ) {
        $user = $this->searchUserName($id_univ);
        if($user === $this->notFind) {
            return response($user, 404);
        }

        if ($user->hasVerifiedEmail()) {
            return response("Votre email a déjà été verifié", 400);
        }

        $user->sendEmailVerificationNotification();

        return response("Mail send");
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

    private function isGestionnaire($user) {
        return array_key_exists("admin", $user->toArray());
    }
}
