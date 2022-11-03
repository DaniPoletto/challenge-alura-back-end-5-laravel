<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class VideoRequest extends FormRequest
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
            'titulo' => 'required|string',
            'descricao' => 'required|string',
            'url' => 'required|url',
            'categorias_id' => 'nullable|int'
        ];
    }

    protected function failedValidation(Validator $validator) {
        $response = [
            'status' => false,
            'message' => $validator->errors()->first(),
        ];
        throw new HttpResponseException(response()->json($response, 422));
    }
}
