<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCaminhaoRequest extends FormRequest
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
            'placa' => 'required|unique:caminhoes,placa',
            'modelo' => 'required'
        ];
    }

    public function messages() {
        return [
            'required' => 'O campo :attribute precisa ser preenchido!',
            'placa.unique' => 'Esta placa já está cadastrada no sistema!'
        ];
    }
}
