<?php

namespace App\Http\Requests\Admin\Ingredients;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIngredient extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('update-ingredients');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'nullable|numeric|max:99999',
            'unit' => 'required_with:price|nullable|string|max:50',
        ];
    }
}
