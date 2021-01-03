<?php

namespace App\Providers;

use App\Events\EstPreteModificationEvent;
use App\Events\ReservationCreationEvent;
use App\Events\ReservationModificationEvent;
use App\Listeners\EstPreteModificationListener;
use App\Listeners\ReservationCreation;
use App\Listeners\ReservationModification;
use App\Notifications\EstPreteModificationNotification;
use App\Reservation;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ReservationModificationEvent::class => [
            ReservationModification::class
        ],
        EstPreteModificationEvent::class => [
            EstPreteModificationListener::class
        ]


    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
