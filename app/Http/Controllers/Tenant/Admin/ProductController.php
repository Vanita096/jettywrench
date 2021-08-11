<?php

namespace App\Http\Controllers\Tenant\Admin;

use App\Http\Requests\Admin\Product\Package\StorePackage;
use App\Http\Requests\Admin\Product\StoreProduct;
use App\Http\Requests\Admin\Product\Variation\StoreProductVariation;
use App\Http\Requests\Admin\Product\UpdateProduct;
use App\Models\Product;
use App\Models\ProductVariationType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = cache()->remember('products', 10, function() {
            return Product::latest()->get();
        });

        return view('tenant.admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('tenant.admin.products.create');
    }

    public function store(StoreProduct $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'unit' => $request->unit,
            'ingredients' => $request->ingredients,
        ]);

        cache()->forget('products');

        return redirect()->route('tenant.admin.products.show', [$request->tenant()->subdomain, $product->id]);
    }

    public function show(Request $request)
    {
        $product = Product::findOrFail($request->product);

        $product_variations = $product->variations;

        return view('tenant.admin.products.show', compact('product', 'product_variations'));
    }

    public function edit(Request $request)
    {
        $product = Product::findOrFail($request->product);

        return view('tenant.admin.products.edit', compact('product'));
    }

    public function update(UpdateProduct $request)
    {
        $product = Product::findOrFail($request->product);

        $product->update($request->only('name', 'price', 'unit'));

        cache()->forget('products');

        return redirect()->route('tenant.admin.products.show', [request()->tenant()->subdomain, $product])->with('success', 'Product updated');
    }

    public function destroy(Request $request)
    {
        $product = Product::findOrFail($request->product);

        $product->delete();

        cache()->forget('products');

        return redirect()->route('tenant.admin.products.index', [request()->tenant()->subdomain])->withSuccess('Product successfully deleted.');
    }

    public function createVariation(Request $request)
    {
        $product = Product::findOrFail($request->product);

        return view('tenant.admin.product-variations.create', compact('product'));
    }

    public function storeVariation(StoreProductVariation $request)
    {
        $product = Product::findOrFail($request->product);

        $product_variation_type = ProductVariationType::firstOrCreate([
            'name' => $request->type
        ]);

        $product_variation = $product->variations()->create([
            'name' => $request->name,
            'price' => $request->price,
            'unit' => $request->unit,
            'product_variation_type_id' => $product_variation_type->id
        ]);

        return redirect()->route('tenant.admin.product-variations.show', [request()->tenant()->subdomain, $product_variation->id])->with('success', 'Product variation created');

    }

    public function createPackage(Request $request)
    {
        $product = Product::findOrFail($request->product);

        return view('tenant.admin.products.packages.create', compact('product'));
    }

    public function storePackage(StorePackage $request)
    {
        $product = Product::findOrFail($request->product);

        $product->packages()->create([
            'quantity' => $request->quantity,
            'amount' => $request->amount
        ]);

        return redirect()->route('tenant.admin.products.show', [request()->tenant()->subdomain, $product]);
    }


}
