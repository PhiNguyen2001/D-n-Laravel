<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|max:50',
            'price' => 'required|alpha_num',
            'image' => 'required',
            'quantity' => 'required|alpha_num',
            'description' => 'required|min:10|max:500',
        ];
    }
    public function messages()
    {
        return [
            'name.max' => 'Tên sản phẩm không được quá 50 ký tự',
            'price.alpha_num' => 'Giá sản phẩm phải là số ',
            'quantity.alpha_num' => 'Số lượng phải là số',
            'description.min' => 'Mô tả tối thiểu 10 ký tự',
            'description.max' => 'Mô tả tối đa 500 ký tự',
            'required' => ':attribute không được để trống',
        ];
    }
    public function attributes()
    {
        return [
            'name'=>'Tên sản phẩm',
            'price'=>'Giá sản phẩm',
            'image'=>'Ảnh sản phẩm',
            'quantity'=>'Số lượng',
            'description'=>'Mô tả',
            
        ];
    }
}
