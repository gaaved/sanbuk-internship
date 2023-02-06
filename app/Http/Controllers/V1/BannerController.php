<?php

namespace App\Http\Controllers\V1;

use App\Services\BannerService;
use Illuminate\Http\Request;
use Knuckles\Scribe\Attributes\Endpoint;
use Knuckles\Scribe\Attributes\Group;
use Knuckles\Scribe\Attributes\Subgroup;

#[Group('Banner')]
class BannerController
{
    public function __construct(private BannerService $bannerService)
    {
    }

    /**
     * @param Request $request
     * @return string
     */
    #[Endpoint('Banners')]
    public function getBanners(Request $request): string
    {
        $type = $request->get('type');

        return $this->bannerService->getBanners($type);
    }
}
