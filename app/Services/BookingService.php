<?php

namespace App\Services;

use App\Models\Package;
use App\Models\User;

class BookingService
{
    public function create($packageId)
    {
        $package = Package::findOrFail($packageId);

        /** @var User $user */
        $user = auth()->user();
        return $user->bookings()->firstOrCreate([
            'package_id' => $packageId,
            'package_data' => $package->toArray(),
            'user_data' => $user->toArray(),
            'price' => $package->price,
        ]);
    }
}
