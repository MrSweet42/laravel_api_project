<?php

namespace App\Http\ApiV1\Modules\Categories\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReplaceCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'is_active' => ['required', 'boolean'],
        ];
    }
}
