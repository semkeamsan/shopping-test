<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/', 'Front\\FrontController@index')->name('front.index');
Route::get('/home', 'Front\\FrontController@home')->name('front.home');

Auth::routes(['verify' => true]);
Route::prefix('language')->as('language.')->group(function () {
    Route::match(['get', 'post'], 'set/{locale}', function ($locale) {
        Session::put('locale', $locale);
        if (request()->method() == 'POST') {
            return [
                'status' => true,
            ];
        } else {
            return redirect()->back();
        }
    })->name('set');
});
