<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Personnalise extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData = [
        "from_address"=>"",
        "subject"=>"",
        "content"=>"",
        "sender"=>""
    ];

    /**
     * Create a new message instance.
     *
     * @param $mailData
     */
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->mailData["from_address"])->subject($this->mailData["subject"])->view('emails.mail-perso');
    }

}
