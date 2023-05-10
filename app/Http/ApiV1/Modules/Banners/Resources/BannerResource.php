<?php

namespace App\Http\ApiV1\Modules\Banners\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'data' => [
                'id' => $this->id,
                'name' => $this->name,
                'image_path' => $this->image_path,
            ],
        ];
    }
}
