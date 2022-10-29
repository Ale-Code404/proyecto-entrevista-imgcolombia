<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rules\Unique;

class RegisterRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:4|regex:/^[\pL\s\-]+$/u',
            'email' => ['required', 'email', new Unique('users', 'email')],
            'password' => ['required', Password::min(4)->numbers()->mixedCase()->symbols(), 'confirmed']
        ];
    }

    public function attributes()
    {
        return [
            'name' => '(nombre)',
            'email' => '(correo electrónico)',
            'password' => '(contraseña)'
        ];
    }

    public function messages()
    {
        return [
            'name.regex' => 'El :attribute solo puede contener letras, espacios y números',
            'email.unique' => 'El :attribute ya ha sido registrado'
        ];
    }
}
