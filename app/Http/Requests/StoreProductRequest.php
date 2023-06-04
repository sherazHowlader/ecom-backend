<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
    public function rules()
    {
        return [
            'category_id'     => ['required','integer','exists:categories,id'],
            'subcategory_id'  => ['required','integer','exists:subcategories,id'],
            'name'         => ['required','string'],
            'sku'          => ['required','string'],
            'image'        => ['required', 'image', 'max:2048'],
            'short_description'     => ['required','string'],
            'description'           => ['required','string'],
            'regular_price'         => ['required','integer'],
            'discount_price'        => ['nullable', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'category_id'            => 'The category must be selected.',
            'category_id.exists'     => 'The selected category is invalid.',
            'subcategory_id'         => 'The subcategory must be selected.',
            'subcategory_id.exists'  => 'The selected subcategory is invalid.',
            'name'                   => 'The product name is required.',
            'sku'                   => 'The SKU field is required.',
        ];
    }
}
