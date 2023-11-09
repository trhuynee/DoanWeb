<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            //Trong dieu kien unique loại bỏ tên sản phẩm hiệntại vì có
            // thể chỉ những trường hợp khác , giữ nguyên tên cũ
            // cỏ thể ko cập nhật hình
            'name'=>['required',Rule::unique('products')->ignore($this->product),'max:100'],
            'price'=>['required','numeric','integer','min:0'],
            'category'=>['required','exists:categories,id'],
            'desc'=>['required'],
            'image'=>['mimes:jpg,png,bmg']
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
