<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**q
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'name'=>['required','unique:products','max:100'],
            'price'=>['required','numeric','integer','min:0'],
            'category'=>['required','exists:categories,id'], // category : name the, categories: name table
            'desc'=>['required'],
            'image'=>['required','mimes:jpg,png,bmg']
        ];

    }

    // sửa câu thông báo
    public function message(){

        return[
            'name.required'=>'Tên sản phẩm không được bỏ trống',
            'name.required'=>'Tên sản phẩm đã tồn tại',
            'name.max'=>'Tên sản phẩm không được 100 ký tự',

        ];

    }
}
