<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestImport extends FormRequest
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
            'dok' => 'max:1000|required|mimes:ods',
        ];
    }

    public function messages()
    {
        return [
            'dok.mimes' => 'File import harus berekstensi ods',
            'dok.max' => 'File maksimal berukuran 1MB',
        ];
    }

}
