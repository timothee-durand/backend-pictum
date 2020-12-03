<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\HtmlString;

class RappelRDV extends Mailable
{
    use Queueable, SerializesModels;

    public $nom;
    public $raison_rdv;
    public $date_rdv;
    public $heure_rdv;
    public $mail_gestionnaire;
    public $mailData;

    /**
     * RappelRDV constructor.
     * @param $nom
     * @param $raison_rdv
     * @param $date_rdv
     * @param $heure_rdv
     * @param $mail_gestionnaire
     */
    public function __construct($nom, $raison_rdv, $date_rdv, $heure_rdv, $mail_gestionnaire, $mailData)
    {
        $this->nom = $nom;
        $this->raison_rdv = $raison_rdv;
        $this->date_rdv = $date_rdv;
        $this->heure_rdv = $heure_rdv;
        $this->mail_gestionnaire = $mail_gestionnaire;
        $this->mailData = $mailData;
    }

    /**
     * Create a new message instance.
     *
     * @return void
     */

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->mailData ["from_address"])->subject($this->mailData["subject"])->view('emails.rappel-rdv');
    }

}
