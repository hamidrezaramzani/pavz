<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SpaceInfoRequest extends FormRequest
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
            "max_capacity" => "required|numeric|min:1|max:110" , 
            "standard_capacity" => "required|numeric|min:1|max:20" , 
            "heating_system_items" => "nullable|string" , 
            "cooling_system_items" => "nullable|string" , 
            "number_of_bathroom" => "nullable|numeric|min:1",
            "number_of_wc" => "nullable|numeric|min:1" , 
            "more_health_possibilities" => "nullable|string" , 
            "more_pool_possibilities" => "nullable|string" , 
            "courtyard" => "nullable|string" , 
            "about_space_home" => "nullable|string" , 
            "views" => "nullable|string"
        ];
    }
}
