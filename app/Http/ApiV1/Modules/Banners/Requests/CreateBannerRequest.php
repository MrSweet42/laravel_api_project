<?php

namespace App\Http\ApiV1\Modules\Banners\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBannerRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'image_path'=> ['required', 'string', 'max:255', 'starts_with:storage/images/banners/'],
        ];
    }
}
