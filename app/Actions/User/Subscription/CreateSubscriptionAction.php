<?php

namespace App\Actions\User\Subscription;

use App\Models\User;
use App\Services\StripeService;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateSubscriptionAction
{
    use AsAction;

    public function __construct(private StripeService $stripeService)
    {
    }

    public function handle(User $user, $stripePriceId)
    {
        $stripeCustomerId = $user->stripe_id;
        $subscriptions = $this->stripeService->client->subscriptions->all([
            'customer' => $stripeCustomerId,
        ]);

        if (count($subscriptions) === 0) {
            return $this->stripeService->client->subscriptions->create([
                'customer' => $stripeCustomerId,
                'items' => [
                    [
                        'price' => $stripePriceId,
                    ],
                ],
            ]);
        }

        return false;
    }
}
