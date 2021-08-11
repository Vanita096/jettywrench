<?php

namespace App\Http\Controllers\Tenant\Admin;

use App\Http\Requests\Admin\Product\Variation\UpdateProductVariation;
use App\Models\ProductVariation;
use App\Models\ProductVariationType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductVariationController extends Controller
{
    public function show(Request $request)
    {
        $product_variation = ProductVariation::findOrFail($request->product_variation);

        return view('tenant.admin.product-variations.show', compact('product_variation'));
    }

    public function edit(Request $request)
    {
        $product_variation = ProductVariation::findOrFail($request->product_variation);

        return view('tenant.admin.product-variations.edit', compact('product_variation'));
    }

    public function update(UpdateProductVariation $request)
    {
        $product_variation = ProductVariation::findOrFail($request->product_variation);

        $product_variation_type = ProductVariationType::firstOrCreate([
            'name' => $request->type,
        ]);

        $product_variation->update([
            'product_variation_type_id' => $product_variation_type->id,
            'name' => $request->name,
            'price' => $request->price,
            'unit' => $request->unit,
            'ingredients' => $request->ingredients,
        ]);

        return redirect()->route('tenant.admin.products.show', [request()->tenant()->subdomain, $product_variation->product])->with('success', 'Product variation updated');
    }

    public function destroy(Request $request)
    {
        $product_variation = ProductVariation::findOrFail($request->product_variation);

        $product_variation->delete();

        return back();
    }
}
