<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\TitleRuleRequest;

class CompagnieRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name'=>'required|string',
            'address'=>'required|string',
            'contact'=>'required|string',
            'field_of_activity' => 'required|string'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'vous devez remplire le champ du title' ,
            'adress.required' => 'vous devez remplire le champ du adress' ,

        ];
    }
}
