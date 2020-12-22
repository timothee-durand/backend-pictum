<?php

namespace App\Listeners;

use App\Events\ReservationCreationEvent;
use App\Jobs\SendMail;
use App\Mail\Contact;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ReservationCreation
{


    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param ReservationCreationEvent $event
     * @return void
     */
    public function handle(ReservationCreationEvent $event)
    {
        $mailData = ["to_address"=> $event->reservation->email];
        Log::debug("maildata".json_encode($mailData));
        SendMail::dispatch($mailData, new \App\Mail\ReservationCreation($event->reservation));
    }
}

