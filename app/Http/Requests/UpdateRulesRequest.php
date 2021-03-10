<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRulesRequest extends FormRequest
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


     /**

      */
    public function rules()
    {
        return [
            "delivery_time" => "nullable|string" , 
            "discharge_time" => "nullable|string" , 
            "min_stay" => "nullable|string" , 
            "more_time_rules_description" => "nullable|string" , 
            "more_rules_description" => "nullable|string" , 
            "animal" => "nullable|numeric" , 
            "smoke" => "nullable|numeric" , 
            "party" => "nullable|numeric" , 
            "villa_id" => "required|numeric" , 
        ];
    }
}
