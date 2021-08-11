<?php

namespace App\Http\Requests\Admin\Product\Variation\Ingredient;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductVariationIngredient extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('add-ingredients-to-product-variations');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ingredient_id' => 'required|exists:tenant.ingredients,id'
        ];
    }
}
