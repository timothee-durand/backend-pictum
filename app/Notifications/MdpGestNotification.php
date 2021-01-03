<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MdpGestNotification extends Notification
{
    use Queueable;

    public $password;
    public $departement;
    public $admin;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    
    public function __construct($password, $departement, $admin)
    {
        $this->admin = $admin;
        $this->password = $password;
        if($this->admin === 0 ){
            $this->admin = 'gestionnaire';
            $this->departement = " pour le département". $departement;
        } else {
            $this->admin = "administrateur";
        }


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
            ->subject("Compte" .$this->admin. "pictum")
            ->line('Vous avez été ajouté comme '. $this->admin .' sur pictum'. $this->departement)
            ->line('Por vous identifier, utilisez votre identifiant universitaire et le mot de passe '.$this->password)
            ->action('Visiter Pictum', "https://pictum.pu-pm.univ-fcomte.fr/")
            ->greeting("Bonjour,")
            ->salutation("Cordialement.");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
