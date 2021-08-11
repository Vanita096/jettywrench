<?php

namespace App\Http\Controllers\Tenant\Admin\Product;

use App\Models\Product;
use App\Models\ProductPackage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductPackageController extends Controller
{
    public function destroy(Request $request)
    {
        $product = Product::findOrFail($request->product);

        $package = ProductPackage::where('product_id', $product->id)->findOrFail($request->package)->delete();

        return back();
    }
}
