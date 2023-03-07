<?php

namespace App\Http\Requests\V1\User\Subscription;

use App\Services\StripeService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;
use Stripe\Exception\InvalidRequestException;

class CreateSubscriptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'stripe_price_id' => 'required|string'
        ];
    }

    /**
     * Configure the validator instance.
     */
    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            $stripeService = new StripeService();
            try {
                $stripeService->client->prices->retrieve($this->stripe_price_id);
            } catch (InvalidRequestException $exception) {
                $validator->errors()->add('stripe_price_id', $exception->getMessage());
            }
        });
    }
}
