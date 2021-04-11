<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateTicketRequest extends FormRequest
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
            "title" => "required|string|min:10|max:255",
            "description" => "required|string|min:10|max:10000",
            "priority" => "required|string|min:1|max:3",
            "attach" => "file|mimes:png,jpg,zip,jpeg",
        ];
    }
}
