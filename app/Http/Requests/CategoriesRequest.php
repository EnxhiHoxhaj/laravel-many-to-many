<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
            'name'=>'required|unique:categories,name|min:2|max:20'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=>'Il campo nome è obbligatorio',
            'name.min'=>'Il nome deve avere contenere almeno :min caratteri',
            'name.max'=>'Il nome deve avere contenere al massimo :max caratteri',
            'name.unique'=>'Categoria già presente',
        ];

    }
}
