<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;

class MailVerification extends Notification
{
    use Queueable;




    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);
        $mail = (new MailMessage)
            ->subject(Lang::get('Vérification de l\'adresse mail'))
            ->line(Lang::get('Merci de cliquer sur ce bouton pour vérifier votre email.'))
            ->action(Lang::get('Vérifier son adresse mail'), $verificationUrl)
            ->line(Lang::get('Si vous n\'avez pas demander cette vérification ne faites rien.'))
            ->greeting(Lang::get('Cordialement'));
        return $mail;
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


}
