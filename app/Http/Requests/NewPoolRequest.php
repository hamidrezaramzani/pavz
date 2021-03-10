<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class NewPoolRequest extends FormRequest
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
            "id" => "required|numeric" , 
            "pool_type" => "required|numeric" , 
            "pool_location" => "required|string" ,
            "heating_systems" => "nullable|string" , 
            "cooling_systems" => "nullable|string" , 
            "width" => "nullable|numeric" , 
            "length" => "nullable|numeric" , 
            "min_depth" => "nullable|numeric" , 
            "max_depth" => "nullable|numeric" , 
            "possibilities" => "nullable|string" , 
            "villa_id" => "required|string" , 
        ];
    }
}
