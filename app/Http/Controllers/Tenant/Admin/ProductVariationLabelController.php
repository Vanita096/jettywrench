<?php

namespace App\Http\Controllers\Tenant\Admin;

use App\Models\ProductVariation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductVariationLabelController extends Controller
{
    public function print(Request $request)
    {
        $product_variation = ProductVariation::findOrFail($request->product_variation);

        $type = $request->type;

        $variation_type = $product_variation->name;
        $product_name = $product_variation->product->name;

        $ingredients = $product_variation->ingredients;

        return view('tenant.admin.product-variations.labels.print', compact('product_variation', 'type', 'product_name', 'ingredients', 'variation_type'));
    }
}
