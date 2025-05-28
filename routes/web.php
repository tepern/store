<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [App\Http\Controllers\ProductController::class, 'index'])->name('');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

$groupData = [
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'store',
];
Route::group($groupData, function() {
    $methods = ['index', 'show'];
    Route::resource('products','ProductController')->only($methods)->names('products');   
});

Route::get('/order/{id}', [OrderController::class, 'create'])->name('order');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('order.show');