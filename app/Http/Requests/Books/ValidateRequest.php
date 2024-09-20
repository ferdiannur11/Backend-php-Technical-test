<?php
namespace App\Http\Requests\Books;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ValidateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string',
            'description'=> 'required|string',
            'publish_date' => 'required|date',
            'author_id' => 'required|exists:authors,id',

        ];

    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required.',
            'author_id.required' => 'Author ID is required.',
            'author_id.exists' => 'The selected author ID does not exist.',
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
