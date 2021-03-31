<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateSoldVillaPricesRequest extends FormRequest
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
            "total_price" => "nullable|integer" , 
            "price_per_meter" => "nullable|integer" , 
            "agreed_price" => "required|numeric" , 
            "villa_id" => "required|integer"
        ];
    }
}
