<?php

namespace App\Domain\Banners\Actions;

use App\Domain\Banners\Models\Banner;
use App\Exceptions\NotFoundException;

class DeleteBannerAction
{
    public function execute(int $bannerId): void
    {
        $banner = Banner::find($bannerId);
        if (!$banner) {
            throw new NotFoundException('Banner not found');
        }
        $banner->delete();
    }
}
