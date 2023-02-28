<?php

namespace App\Listeners;

use App\Events\BookingCreated;
use App\Models\Booking;
use Illuminate\Contracts\Queue\ShouldQueue;

class ChargeBooking implements ShouldQueue
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

    public function handle(BookingCreated $event)
    {
        try {
            $event->booking->user->charge(
                $event->booking->price * 100,
                $event->booking->user->defaultPaymentMethod()?->id,
                [
                    'metadata' => [
                        'booking_id' => $event->booking->id,
                    ]
                ]
            );
        } catch (\Exception $exception) {
            $event->booking->update([
                'status' => Booking::STATUS_ERROR,
            ]);
        }
    }
}
