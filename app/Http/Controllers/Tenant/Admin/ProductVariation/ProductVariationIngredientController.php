<?php

namespace App\Http\Controllers\Tenant\Admin\ProductVariation;

use App\Http\Requests\Admin\Product\Package\StorePackage;
use App\Http\Requests\Admin\Product\Variation\Ingredient\StoreProductVariationIngredient;
use App\Models\Ingredient;
use App\Models\ProductVariation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductVariationIngredientController extends Controller
{
    public function create(Request $request)
    {
        $product_variation = ProductVariation::findOrFail($request->product_variation);

        $ingredients = Ingredient::all()->mapWithKeys(function ($item) {
            return [$item['name'] => $item['id']];
        });

        return view('tenant.admin.product-variations.ingredients.create', compact('product_variation', 'ingredients'));
    }

    public function store(StoreProductVariationIngredient $request)
    {
        $product_variation = ProductVariation::findOrFail($request->product_variation);

        $product_variation->ingredients()->attach($request->ingredient_id);

        return redirect()->route('tenant.admin.product-variations.show', [ request()->tenant()->subdomain, $product_variation])->withSuccess('Ingredient successfully added.');
    }

    public function destroy(Request $request)
    {
        $product_variation = ProductVariation::findOrFail($request->product_variation);

        $product_variation->ingredients()->detach($request->ingredient_id);

        return back();
    }
}
