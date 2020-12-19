<?php

namespace App\Http\Controllers;

use App\Blacklist;
use App\Gestionnaire;
use App\Reservation;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
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

    public function resend($user_mail) {
        $user = $this->searchByMail($user_mail);
        if ($user->hasVerifiedEmail()) {
            return response()->json(["msg" => "Email already verified."], 400);
        }

        $user->sendEmailVerificationNotification();

        return response()->json(["msg" => "Email verification link sent on your email id"]);
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

    private function isGestionnaire($user) {
        return array_key_exists("admin", $user->toArray());
    }
}
