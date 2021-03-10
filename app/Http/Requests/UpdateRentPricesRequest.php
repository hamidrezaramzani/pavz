<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRentPricesRequest extends FormRequest
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
            "middweek" => "required|numeric" , 
            "endweek" => "required|numeric" , 
            "peek" => "required|numeric" , 
            "price_per_person" => "required|numeric" , 
            "middweek_discount" => "nullable|numeric" , 
            "endweek_discount" => "nullable|numeric" , 
            "peek_discount" => "nullable|numeric" , 
            "villa_id" => "required|numeric" , 
        ];
    }
}
