<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RappelNonRendu extends Mailable
{
    use Queueable, SerializesModels;

    public $nom;
    public $materiels;
    public $mail_gestionnaire;
    public $mailData;

    /**
     * RappelNonRendu constructor.
     * @param $nom
     * @param $materiels
     * @param $date_rdv
     * @param $heure_rdv
     * @param $mail_gestionnaire
     * @param $mailData
     */
    public function __construct($nom, array $materiels, $mail_gestionnaire, array $mailData)
    {
        $this->nom = $nom;
        $this->materiels = $materiels;
        $this->email = $mail_gestionnaire;
        $this->mailData = $mailData;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->mailData ["from_address"])->subject($this->mailData["subject"])->view('emails.rappel-non-rendu');
    }
}
