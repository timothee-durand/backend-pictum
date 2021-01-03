<?php

namespace App\Listeners;

use App\Events\ReservationModificationEvent;
use App\Notifications\ReservationChange;
use App\Reservation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ReservationModification
{


    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ReservationModificationEvent $event)
    {
        $event->reservation->notify(new ReservationChange($event->reservation->valide));
    }
}
