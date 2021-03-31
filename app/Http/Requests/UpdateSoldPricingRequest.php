<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateSoldPricingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::id();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            "total_price" => "nullable|numeric|min:100",
            "price_per_meter" => "nullable|numeric|min:100",
            "agreed_price" => "required|numeric" , 
            "aid" => "required|numeric"
        ];
    }
}
