<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class LinkRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'page' => 'required|numeric',
            'limit' => 'required|numeric',
            'search' => 'nullable|string',
            'status' => 'nullable|numeric',
            'source' => 'nullable|string'
        ];
    }

    public function wantsJson()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(api_response( 'Education validation fail', $validator->errors()), 422);
    }
}
