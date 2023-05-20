<?php

namespace App\Http\ApiV1\Modules\Banners\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['string', 'max:255'],
            'image_path'=> ['string', 'max:255', 'starts_with:storage/images/banners/'],
        ];
    }
}
