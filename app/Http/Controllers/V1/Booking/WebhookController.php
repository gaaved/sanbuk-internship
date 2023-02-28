<?php

namespace App\Http\Controllers\V1\Booking;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class WebhookController extends Controller
{
    public function chargeSucceeded()
    {
        ray('webhook chargeSucceeded', json_decode(request()->getContent(), true));

        $request = json_decode(request()->getContent(), true);
        $bookingId = $request['data']['object']['metadata']['booking_id'];
        Booking::findOrFail($bookingId)->update([
            'status' => Booking::STATUS_ACTIVE,
        ]);

        return true;
    }
}
