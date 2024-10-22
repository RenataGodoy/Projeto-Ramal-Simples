<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PessoasFormRequest extends FormRequest
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
            'nome' => 'required|regex:/^[a-zA-Zà-ÿÀ-ÿ\s]{3,}$/', 
            'local' => 'required|regex:/^[a-zA-Zà-ÿÀ-ÿ\s]{3,}$/',
            'setor' => 'required|regex:/^[A-Za-z0-9]{4,5}$/', 
        ];
    }
    

    public function messages() 
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.regex' => 'O campo nome deve conter pelo menos 3 letras (sem números ou caracteres especiais).',
            
            'local.required' => 'O campo local é obrigatório.',
            'local.regex' => 'O campo local deve conter pelo menos 3 letras (sem números ou caracteres especiais).',
            
            'setor.required' => 'O campo setor é obrigatório.',
            'setor.regex' => 'O campo setor deve conter de 4 a 5 letras e/ou números (sem espaços).',

        ];
    }
}
