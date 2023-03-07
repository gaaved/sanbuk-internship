<?php

namespace App\Actions\User\Subscription;

use App\Models\User;
use App\Services\StripeService;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateSubscriptionAction
{
    use AsAction;

    public function __construct(private StripeService $stripeService) {}

    public function handle(User $user, $stripePriceId)
    {
        $subscription = $this->stripeService->client->subscriptions->all([
            'customer' => $user->stripe_id
        ])->first();

        $currentItems = $subscription->items->toArray();
        $newItems = [];
        foreach ($currentItems['data'] as $currentItem) {
            $newItems[] = [
                'id' => $currentItem['id'],
                'deleted' => true,
            ];
        }

        $newItems[] = [
            'price' => $stripePriceId,
        ];

        return $this->stripeService->client->subscriptions->update($subscription->id, [
            'items' => $newItems,
        ]);
    }
}
