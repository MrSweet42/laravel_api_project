<?php

namespace App\Domain\Banners\Actions;

use App\Domain\Banners\Models\Banner;
class CreateBannerAction
{
    public function execute(array $data): ?Banner
    {
        return Banner::create([
            'name' => $data['name'],
            'image_path' => $data['image_path']
        ]);
    }
}
