<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PriceAlertsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'cryptocurrency_name' => 'required|string|max:255',
            'target_price' => 'required|numeric|min:0',
        ];
    }
}
