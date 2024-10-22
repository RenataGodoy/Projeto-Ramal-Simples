<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RamaisFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true; // Permitir que qualquer usuário faça a requisição
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [ 
            'ramal' => 'required|regex:/^\d{3}#$/'
        ];
    }
    

    public function messages() 
    {
        return [
            'ramal.required' => 'O campo ramal é obrigatório.',
            'ramal.regex' => 'O campo ramal deve ter 3 dígitos seguidos de uma tralha (#).',
        ];
    }
}
