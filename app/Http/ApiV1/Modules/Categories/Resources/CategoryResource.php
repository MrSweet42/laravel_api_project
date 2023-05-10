<?php

namespace App\Http\ApiV1\Modules\Categories\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'data' => [
                'id' => $this->id,
                'name' => $this->name,
                'is_active' => $this->is_active,
            ],
        ];
    }
}
