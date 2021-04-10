<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateShopSpecification extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title" => "required|string|min:5",
            "state" => "required|numeric",
            "city"  => "required|numeric",
            "foundation" => "required|numeric|min:1",
            "border_width" => "required|numeric",
            "height" => "required|numeric",
            "description"  => "required|string",
            "document_type" => "nullable|numeric",
            "scores" => "nullable|string",
            "id" => "required|numeric"
        ];
    }
}
