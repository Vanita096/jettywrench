<?php

namespace App\Http\Controllers\Tenant\Admin;

use App\Models\ProductVariation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class LabelController extends Controller
{

    public function index()
    {
        return view('tenant.admin.labels.index');
    }

    public function create(Request $request)
    {
        $type = $request->type;

        return view('tenant.admin.labels.create', compact('type'));

    }

    public function generate(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'variation_type' => 'nullable|string|max:255',
            'ingredients' => 'sometimes|required|string|max:255'
        ]);

        $type = $request->type;

        $variation_type = $request->variation_type;
        $product_name = $request->name;

        $ingredients = $request->ingredients;

        return view('tenant.admin.product-variations.labels.print', compact('variation_type', 'product_name', 'type', 'ingredients'));
    }
}
