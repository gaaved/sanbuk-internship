<?php

namespace App\Services;

use Stripe\StripeClient;

class StripeService
{
    public StripeClient|null $client = null;

    public function __construct()
    {
        $this->client = new StripeClient(config('stripe.stripe_secret'));
    }
}
