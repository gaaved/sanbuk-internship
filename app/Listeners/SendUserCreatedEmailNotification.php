<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Mail\UserCreatedSuccessful;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendUserCreatedEmailNotification
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
     * @param  \App\Events\UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        $result = \Mail::to($event->user)->queue(new UserCreatedSuccessful($event->user));
        ray($result);
    }
}
