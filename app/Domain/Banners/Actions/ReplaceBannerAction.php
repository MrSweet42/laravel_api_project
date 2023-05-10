<?php

namespace App\Domain\Banners\Actions;

use App\Domain\Banners\Models\Banner;
use App\Exceptions\NotFoundException;

class ReplaceBannerAction
{
    public function execute(int $bannerId, array $data): ?Banner
    {
        $banner = Banner::find($bannerId);
        if (!$banner) {
            throw new NotFoundException('Banner not found');
        }
        $banner->update($data);
        $banner->save();
        return $banner;
    }
}
