<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewPassword extends Notification
{
    use Queueable;

    private $newPassword;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($newPassword)
    {
        $this->newPassword = $newPassword;
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
        return (new MailMessage)
            ->subject('Mot de passe oublié - Pictum')
                    ->line('Vous avez demandé un nouveau mot de passe pour votre compte pictum, le voici :')
                    ->line($this->newPassword);
    }

}
