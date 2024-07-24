<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMotoristaRequest extends FormRequest
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
            'nome' => 'required',
            'cpf' => 'required|unique:motoristas,cpf',
            'cnh' => 'required|unique:motoristas,cnh',
            'dt_nascimento' => 'required',
        ];
    }

    public function messages() {
        return [
            'required' => 'O campo :attribute precisa ser preenchido!',
            'unique' => 'O :attribute não pode ser cadastrado pois já se encontra no sistema!',
        ];
    }
}
