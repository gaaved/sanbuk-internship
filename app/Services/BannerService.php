<?php

namespace App\Services;

use App\Models\Banner;
class BannerService
{
    /**
     * @param $type
     * @return string
     */
    public function getBanners($type): string
    {
        $types = explode(',', $type);

        return Banner::whereIn('type', $types)
            ->get();
    }
}
