<?php

namespace App\Http\ApiV1\Modules\Banners\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AllBannersResource extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => BannerResource::collection($this->collection),
        ];
    }
}
