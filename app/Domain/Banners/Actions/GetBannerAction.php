<?php

namespace App\Domain\Banners\Actions;

use App\Domain\Banners\Models\Banner;
use App\Exceptions\NotFoundException;

class GetBannerAction
{
    public function execute(int $bannerId): ?Banner
    {
        $banner = Banner::find($bannerId);
        if (!$banner) {
            throw new NotFoundException('Banner not found');
        }
        return $banner;
    }
}
