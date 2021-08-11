<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(['verify' => true]);
Route::group(['middleware' => ['guest', 'requestedToken']], function() {
    Route::get('/login/twofactor', 'Auth\TwoFactorLoginController@index')->name('login.twofactor.index');
    Route::post('/login/twofactor', 'Auth\TwoFactorLoginController@verify')->name('login.twofactor.verify');
    Route::get('/login/twofactor/resend', 'Auth\TwoFactorLoginController@resend')->name('login.twofactor.resend');
});

// Account configuration
Route::prefix('account')->name('account.')->namespace('Account')->middleware(['auth'])->group(function() {

    // Account home
    Route::get('/', 'AccountController@index')->name('index');

    // Personal Information
    Route::get('/profile', 'ProfileController@index')->name('profile.index');
    Route::post('/profile', 'ProfileController@store')->name('profile.store');

    // Security & Privacy
    Route::get('/security', 'Security\SecurityController@index')->name('security.index');
    Route::get('/security/password', 'Security\PasswordController@index')->name('security.password.index');
    Route::post('/security/password', 'Security\PasswordController@store')->name('security.password.store');
    Route::get('/security/twofactor', 'Security\TwoFactorAuthController@index')->name('security.twofactor.index');
    Route::post('/security/twofactor', 'Security\TwoFactorAuthController@store')->name('security.twofactor.store');
    Route::post('/security/twofactor/verify', 'Security\TwoFactorAuthController@verify')->name('security.twofactor.verify');
    Route::delete('/security/twofactor', 'Security\TwoFactorAuthController@destroy')->name('security.twofactor.destroy');
    Route::delete('/security/twofactor/cancel', 'Security\TwoFactorAuthController@cancel')->name('security.twofactor.cancel');
    Route::get('/security/twofactor/resend', 'Security\TwoFactorAuthController@resend')->name('security.twofactor.resend');

    // Organizations
    Route::get('/organizations/select', 'OrganizationController@select')->name('organizations.select');
    Route::resource('/organizations', 'OrganizationController');

});

// Media
Route::name('media.')->prefix('media')->group(function() {
   Route::get('/{media}/{file_name}/{conversion?}/', 'Media\MediaController@show')->name('show');
});