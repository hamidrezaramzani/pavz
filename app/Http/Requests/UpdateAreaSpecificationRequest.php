<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateAreaSpecificationRequest extends FormRequest
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
            "title" => "string|required|min:10|max:100" , 
            "state" => "numeric|required" , 
            "city" => "numeric|required" , 
            "document_type" => "numeric|required" , 
            "id" => "numeric|required" , 
        ];
    }
}
