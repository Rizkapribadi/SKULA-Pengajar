<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStore extends FormRequest
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
        return [
            'title' => 'required|unique:materis',
            'content' => 'required|min:20',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Judul harus diisi',
            'title.unique' => 'Judul sudah ada, silahkan diisi dengan judul lain',
            'content.required' => 'Konten harus diisi',
            'content.min' => 'Konten minimal berisi 20 karakter',

        ];
    }

}
