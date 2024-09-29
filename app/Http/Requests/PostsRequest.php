<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
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
            'title'=>'required | max:100',
            'content'=>'required|string',
            // 'category_id'=>'required',
            'updated_at' => now(),
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string,|string>
     */


    public function messages(): array
    {
        return [
            'title.required'=>'Il titolo è obligatorio',
            'title.string'=>'Il titolo deve essere una stringa',
            'title.max'=>'Il titolo non può superare i :max caratteri',
            'content.required'=>'Il contenuto è obligatorio',
            // 'category_id.required'=>'Indicare una categoria'
        ];
    }
}
