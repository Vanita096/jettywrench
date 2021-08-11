<?php

namespace App\Http\Controllers\Tenant\Admin\Ingredients;

use App\Http\Requests\Admin\Ingredients\StoreIngredient;
use App\Http\Requests\Admin\Ingredients\UpdateIngredient;
use App\Models\Ingredient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index()
    {
        $ingredients = cache()->remember('ingredients', 10, function() {
            return Ingredient::get();
        });

        return view('tenant.admin.ingredients.index', compact('ingredients'));
    }

    public function create()
    {
        return view('tenant.admin.ingredients.create');
    }

    public function store(StoreIngredient $request)
    {
        $ingredient = Ingredient::create([
            'name' => $request->name,
            'price' => $request->price,
            'unit' => $request->unit,
        ]);

        cache()->forget('ingredients');

        return redirect()->route('tenant.admin.ingredients.index', $request->tenant()->subdomain);
    }

    public function show(Request $request)
    {
        $ingredient = Ingredient::findOrFail($request->ingredient);

        return view('tenant.admin.ingredients.show', compact('ingredient'));
    }

    public function edit(Request $request)
    {
        $ingredient = Ingredient::findOrFail($request->ingredient);

        return view('tenant.admin.ingredients.edit', compact('ingredient'));
    }

    public function update(UpdateIngredient $request)
    {
        $ingredient = Ingredient::findOrFail($request->ingredient);

        $ingredient->update($request->only('name', 'price', 'unit'));

        cache()->forget('ingredients');

        return redirect()->route('tenant.admin.ingredients.show', [request()->tenant()->subdomain, $ingredient])->with('success', 'Ingredient updated');
    }

    public function destroy(Request $request)
    {
        $ingredient = Ingredient::findOrFail($request->ingredient);

        $ingredient->delete();

        cache()->forget('ingredients');

        return redirect()->route('tenant.admin.ingredients.index', [request()->tenant()->subdomain])->withSuccess('Ingredient successfully deleted');
    }

}
