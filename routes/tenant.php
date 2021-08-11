<?php

/*
 * ---------------------------------------------------------------------------------------------------------------------
 * Public pages
 * ---------------------------------------------------------------------------------------------------------------------
 */

Route::name('public.')->group(function() {

    // Home page
    Route::get('/', 'HomeController@index')->name('home');

    // About page
    Route::get('/about', 'AboutController@index')->name('about');

    // Contact page
    Route::get('/contact', 'ContactController@index')->name('contact');

});


/*
 * ---------------------------------------------------------------------------------------------------------------------
 * Admin pages
 * ---------------------------------------------------------------------------------------------------------------------
 */

Route::name('admin.')->prefix("admin")->namespace('Admin')->middleware(['auth', 'can:access-admin-pages', 'verified'])
    ->group(function() {

    // Dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard');

    // Orders
    Route::resource('orders', 'OrderController');

    // Ingredients
    Route::resource('ingredients', 'Ingredients\IngredientController');

    // Products
    Route::resource('products', 'ProductController');

    Route::get('products/{product}/variations/create', 'ProductController@createVariation')->name('products.variations.create');
    Route::post('products/{product}/variations/', 'ProductController@storeVariation')->name('products.variations.store');

    Route::get('products/{product}/packages/create', 'ProductController@createPackage')->name('products.packages.create');
    Route::post('products/{product}/packages/', 'ProductController@storePackage')->name('products.packages.store');
    Route::delete('products/{product}/packages/{package}', 'Product\ProductPackageController@destroy')->name('products.packages.destroy');

    // Product Variations
    Route::resource('product-variations', 'ProductVariationController');
    Route::get('product-variations/{product_variation}/labels/{type}/print', 'ProductVariationLabelController@print')->name('product-variations.labels.print');
    Route::get('product-variations/{product_variation}/ingredients/create', 'ProductVariation\ProductVariationIngredientController@create')->name('product-variations.ingredients.create');
    Route::post('product-variations/{product_variation}/ingredients/', 'ProductVariation\ProductVariationIngredientController@store')->name('product-variations.ingredients.store');
    Route::delete('product-variations/{product_variation}/ingredients/{ingredient}', 'ProductVariation\ProductVariationIngredientController@destroy')->name('product-variations.ingredients.destroy');
    Route::patch('product-variations/{product_variation}/ingredients/', 'ProductVariation\ProductVariationIngredientController@update')->name('product-variations.ingredients.update');

    // Labels
    Route::get('labels', 'LabelController@index')->name('labels.index');
    Route::get('labels/create', 'LabelController@create')->name('labels.create');
    Route::post('labels/generate', 'LabelController@generate')->name('labels.generate');

    // Settings
    Route::get('settings', 'Settings\SettingsController@index')->name('settings.index');

    Route::get('settings/general', 'Settings\GeneralController@index')->name('settings.general.index');
    Route::post('settings/general', 'Settings\GeneralController@store')->name('settings.general.store');

    // TODO: make sure that the user belongs to this tenant!!

});