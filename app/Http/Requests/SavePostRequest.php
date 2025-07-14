<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {

        // if (request->user()->isAdmin()) 
        return true; // todos los usuarios estan autorizados a hacer esta peticion.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        /*
        Podemos establecer reglas de validacion diferentes dependiendo del metodo HTTP que se este utilizando.

        if($this->isMethod('PATCH')) {
            return [
                'title' => ['min:8']
            ];
        }
        */

        return [
            'title' => ['required', 'min:4'],
            'body' => ['required']
        ];
    }
}
