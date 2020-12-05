<?php

namespace App\Http\Controllers;

use App\Gestionnaire;
use App\Jobs\SendMail;
use Illuminate\Http\Request;

class MailPersoController extends Controller
{
    /**
     *
     * Send a Personnalized Mail
     * Required to be a Gestionnaire
     * @group Mail
     *
     * @bodyParam id_gestionnaire int ID du gestionnaire envoyant le mail
     * @bodyParam to_address string Adresse mail du destinataire
     * @bodyParam content_mail string Contenu du mail
     * @bodyParam subject string Objet du mail
     *
     * @response {
     *  "Mail envoyé"
     * }
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
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

    /**
     * Send a mail to the administration contact mail
     * (Paramétrable dans le fichier .env)
     * @group Mail
     *
     * @bodyParam from_address string Adresse mail de l'envoyeur
     * @bodyParam from_name string Nom de l'envoyeur
     * @bodyParam to_address string Adresse mail du destinataire
     * @bodyParam content string Contenu du mail
     * @bodyParam subject string Objet du mail
     *
     * @response {
     *  "Mail envoyé"
     * }
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function contactAdmin(Request $request) {
        $mailData = [
            "to_address"=> env("MAIL_ADMIN"),
            "content"=> $request->content_mail,
            "subject"=> $request->subject,
            "from_address"=> $request->from_address,
            "sender"=> $request->from_name,
        ];


        SendMail::dispatch($mailData, new \App\Mail\Personnalise($mailData));
        return response("Mail envoyé", 200);
    }
}
