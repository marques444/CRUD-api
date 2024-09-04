<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status'=> false,
            'erros'=> $validator->errors(),
        ], 422));
    }

    public function rules(): array
    {

        //Recuperar o id do usuário enviado na URL
        $userID = $this->route('user');
        return [
            'name'=>'required',
            'email'=>'required|email|unique:users,email,' .($userID ? $userID->id : null) ,
            'password' => 'required|min:6'
        ];
    }

    public function messages(): array
    {
        return[
            'name.required'=>'Campo nome é obrigatório!',
            'email.required'=>'Campo email é obrigatório!',
            'email.email'=>'É necessario enviar e-mail válido!',
            'email.unique'=>'O e-mail já está cadastrado!',
            'password.required'=>'Campo senha é obrigatório!',
            'password.min'=>'Senha com no mínimo 6 caracteres',
        ];
    }
}
