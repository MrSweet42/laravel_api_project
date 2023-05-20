<?php

namespace App\Domain\Banners\Actions;

use App\Domain\Banners\Models\Banner;
use Illuminate\Support\Collection;

class GetAllBannersAction
{
    public function execute(): Collection
    {
        return Banner::all();
    }
}
