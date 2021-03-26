<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateSpecificationRequest extends FormRequest
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
            "title" => "string|required",
            "city" => "numeric|required",
            "state" => "numeric|required",
            "atype" => "numeric|required",
            "htype" => "numeric|required",
            "floors" => "numeric|required",
            "unites" => "numeric|required",
            "year_of_construction" => "numeric|required",
            "document_type" => "numeric|required",
            "aid" => "numeric|required",

        ];
    }
}
