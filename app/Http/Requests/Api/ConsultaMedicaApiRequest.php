<?php

namespace App\Http\Requests\Api;

use App\Http\Response\Api\JsonHttpResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ConsultaMedicaApiRequest extends FormRequest
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
            'nombre_paciente' => 'required|string|max:50',
            'ubicacion' => 'required|string|max:50',
            'telefono' => 'required|numeric|min:10',
            'sintomas_paciente' => 'required|string|min:50',
            'fecha_consulta' => 'required|date',
            'hora_consulta' => 'required|string'
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
