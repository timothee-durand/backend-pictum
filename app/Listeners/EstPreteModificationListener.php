<?php

namespace App\Listeners;

use App\Events\EstPreteModificationEvent;
use App\Notifications\EstPreteModificationNotification;
use App\Reservation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EstPreteModificationListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(EstPreteModificationEvent $event)
    {
        $reservation = Reservation::find($event->estPrete->reservation_id);
        //echo "reservation". json_encode($reservation);
        $reservation->notify(new EstPreteModificationNotification());
    }
}
