<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    private $notifiable;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($notifiable)
    {
        $this->notifiable = $notifiable;
    }

    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes( 60),
            [
                'mail' => $notifiable->email,
            ]
        );
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $verificationUrl = $this->verificationUrl($this->notifiable);
        Log::debug( "url".json_encode($verificationUrl));
        Log::debug("view".view("emails.verification", ["validationURL"=>$verificationUrl])->toHtml());

        return $this->from(env("MAIL_FROM_ADDRESS"))->view("emails.verification", ["validationURL"=>$verificationUrl]);
    }
}
