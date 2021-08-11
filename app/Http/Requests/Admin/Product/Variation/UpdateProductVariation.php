<?php

namespace App\Http\Requests\Admin\Product\Variation;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductVariation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update-product-variations');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'price' => 'nullable|numeric|max:99999',
            'unit' => 'required_with:price|nullable|string|max:50',
            'ingredients' => 'nullable|string',
        ];
    }
}
