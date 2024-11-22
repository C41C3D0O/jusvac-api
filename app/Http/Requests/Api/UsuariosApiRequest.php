<?php

namespace App\Http\Requests\Api;

use App\Http\Response\Api\JsonHttpResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use PhpParser\Node\Stmt\Return_;

class UsuariosApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:50',
            'correo' => 'required|string|max:50',
            'cedula' => 'required|string|max:50',
            'contrasena' => 'required|string|max:50'
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            JsonHttpResponse::errorResponse(
                'Error en elformulario' . $validator->errors(),
                'error' .
                200
            )
        );
    }
}