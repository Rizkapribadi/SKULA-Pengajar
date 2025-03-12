<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestReplace extends FormRequest
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
         'gambar'=>'max:2000|image:jpeg, jpg, png, bmp'
     ];
 }

 public function messages()
 {
    return [
     'gambar.max' => 'Gambar maksimal berukuran 2MB',
     'gambar.image' => 'Format gambar harus jpeg, jpg, png, bmp'
  ];
 }
}
