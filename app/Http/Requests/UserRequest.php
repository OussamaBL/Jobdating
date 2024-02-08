<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|string',
            'adress'=>'required|string',
            Rule::unique('users', 'email')->ignore(auth()->user()->id),
            // "email"=>['required','email','unique:users,email,'.auth()->user()->id],
        ];
    }
    public function messages(){
        return [
            'name.required' => 'vous devez remplire le champ du title' ,
            'adress.required' => 'vous devez remplire le champ du adress' ,
            'email.unique' => 'email deja exist',

        ];
    }
}
