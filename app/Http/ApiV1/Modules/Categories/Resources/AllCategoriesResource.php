<?php

namespace App\Http\ApiV1\Modules\Categories\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AllCategoriesResource extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => CategoryResource::collection($this->collection),
        ];
    }
}
