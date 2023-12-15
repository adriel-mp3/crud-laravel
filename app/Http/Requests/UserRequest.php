<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use LaravelLegends\PtBrValidator\Rules\CpfOuCnpj;

class UserRequest extends FormRequest
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
        $userId = $this->route('user');

        $rules = [
            'nome' => 'required|string|max:255|regex:/^[a-zA-ZÀ-ÖØ-öø-ÿ\s]+$/',
            'cpf_cnpj' => [
                'required',
                Rule::unique('users')->ignore($userId),
                new CpfOuCnpj,
            ],
            'nome_social' => 'nullable|string|max:255|regex:/^[a-zA-ZÀ-ÖØ-öø-ÿ\s]+$/',
            'data_nascimento' => 'date',
            'foto' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo Nome é obrigatório.',
            'nome.string' => 'O campo Nome não pode ter caracteres especiais.',
            'nome.max' => 'O campo Nome não pode ter mais de 255 caracteres.',
            'nome.regex' => 'O campo Nome não pode conter caracteres especiais',

            'cpf_cnpj.required' => 'O campo CPF/CNPJ é obrigatório.',
            'cpf_cnpj.unique' => 'Desculpe, não foi possível concluir sua solicitação. Se o CPF ou CNPJ fornecido já estiver cadastrado, entre em contato conosco para obter assistência.',

            'nome_social.string' => 'O campo não pode ter caracteres especiais.',
            'nome_social.max' => 'O campo Nome Social não pode ter mais de 255 caracteres.',
            'nome_social.regex' => 'O campo Nome Social não pode conter caracteres especiais',

            'data_nascimento.date' => 'O campo data de nascimento deve ser uma data válida.',

            'foto.image' => 'O arquivo enviado deve ser uma imagem.',
            'foto.mimes' => 'A imagem deve ser dos tipos: jpeg, png, jpg, gif.',
            'foto.max' => 'A imagem não pode ter mais de 2MB.',
            'foto.required' => 'O campo de Imagem é obrigatório',
            'foto.sometimes' => 'O campo de Imagem é obrigatório',
        ];
    }
}
