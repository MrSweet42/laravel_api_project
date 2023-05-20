<?php

namespace App\Http\ApiV1\Modules\Categories\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['string', 'max:255'],
            'is_active' => ['boolean'],
        ];
    }
}
