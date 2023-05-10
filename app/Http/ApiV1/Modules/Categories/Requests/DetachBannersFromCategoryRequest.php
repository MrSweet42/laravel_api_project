<?php

namespace App\Http\ApiV1\Modules\Categories\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetachBannersFromCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'banner_ids' => ['required', 'string', 'regex:/^\d+(,\s*\d+)*$/'],
        ];
    }
}
