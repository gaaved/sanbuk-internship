<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Booking\CreateRequest;
use App\Services\BookingService;
use Knuckles\Scribe\Attributes\Authenticated;
use Knuckles\Scribe\Attributes\Endpoint;
use Knuckles\Scribe\Attributes\Group;
use Knuckles\Scribe\Attributes\Header;

#[Group('Booking')]
#[Authenticated]
class BookingController extends Controller
{

    public function __construct(public BookingService $bookingService)
    {
    }

    #[Endpoint('Create booking')]
    #[Header('Authorization', 'Bearer ')]
    public function store(CreateRequest $request)
    {
        $this->bookingService->create($request->input('package_id'));
    }
}
