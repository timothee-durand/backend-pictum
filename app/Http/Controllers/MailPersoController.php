<?php

namespace App\Http\Controllers;

use App\Gestionnaire;
use App\Jobs\SendMail;
use Illuminate\Http\Request;

class MailPersoController extends Controller
{
    public function makeMailPerso(Request $request) {
        $gestionnaire = Gestionnaire::where("id_univ",$request->id_gestionnaire)->first();

        if($gestionnaire != null) {
            $mailData = [
                "to_address"=> $request->to_address,
                "content"=> $request->content_mail,
                "subject"=> $request->subject,
                "from_address"=> $gestionnaire->mail,
                "sender"=> $gestionnaire->prenom." ".$gestionnaire->nom,
            ];

            if( SendMail::dispatch($mailData, new \App\Mail\Personnalise($mailData))) {
                return response("Mail envoyé", 200);
            }
        }

        //return new \App\Mail\Personnalise($mailData);
    }
}
