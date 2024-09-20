<?php
namespace App\Http\Requests\Authors;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateAuthorsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'bio' => 'required|string',
            'birth_date' => 'required|date',
        ];

    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'responseCode' => 422,
                'ResponseDesc' => 'Validation Error',
                'errors' => $validator->errors(),
            ], 422)
        );
    }
}
