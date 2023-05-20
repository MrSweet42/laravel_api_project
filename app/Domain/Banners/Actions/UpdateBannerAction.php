<?php

namespace App\Domain\Banners\Actions;

use App\Domain\Banners\Models\Banner;
use App\Exceptions\NotFoundException;

class UpdateBannerAction
{
    public function execute(int $bannerId, array $data): ?Banner
    {
        $banner = Banner::find($bannerId);
        if (!$banner) {
            throw new NotFoundException('Banner not found');
        }
        $banner->fill($data);
        $banner->save();
        return $banner;
    }
}
