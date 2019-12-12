<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostApplyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'day' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:1',
            'description' => 'nullable'
        ];
    }
}
