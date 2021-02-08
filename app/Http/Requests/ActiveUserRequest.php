<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActiveUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "phonenumber" => ["required", "regex:/^(?:0|98|\+98|\+980|0098|098|00980)?(9\d{9})$/i"] , 
            "code" => "required|min:4|max:4"
        ];
    }
}
