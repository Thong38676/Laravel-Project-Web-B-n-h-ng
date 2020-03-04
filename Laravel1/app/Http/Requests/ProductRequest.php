<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_name' => 'required|unique:products',
            'price' => 'required',
            'image' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'product_name.required' => 'Product name is required',
            'product_name.unique' => 'This name is already taken',
            'price.required' => 'Price is required',
            'image.required' => 'Image is required',
            'brand_id.required' => 'Let choice brand',
            'category_id.required' => 'Let choice category',
        ];
    }
}
