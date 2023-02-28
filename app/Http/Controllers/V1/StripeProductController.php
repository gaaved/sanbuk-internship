<?php

namespace App\Http\Controllers\V1;

use App\Http\Requests\Product\BuyProductRequest;
use App\Services\StripeProductService;
use Knuckles\Scribe\Attributes\Authenticated;
use Knuckles\Scribe\Attributes\Endpoint;
use Knuckles\Scribe\Attributes\Group;
use Knuckles\Scribe\Attributes\Header;

#[Group('Stripe Products')]
class StripeProductController
{
    public function __construct(public StripeProductService $productService)
    {
    }

    #[Endpoint('Get all active products')]
    public function getProducts()
    {
        return $this->productService->getProducts();
    }

    #[Endpoint('Create charge')]
    #[Authenticated]
    #[Header('Authorization', 'Bearer ')]
    public function buyProduct(BuyProductRequest $request)
    {
        return $this->productService->buyProduct($request);
    }
}
