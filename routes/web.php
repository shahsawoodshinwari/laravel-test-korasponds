<?php

use Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'home');

Route::middleware([HandlePrecognitiveRequests::class])->group(function () {
  Route::resource('items', 'ItemController')->except(['show']);
  Route::resource('sales-orders', 'SalesOrderController')->except(['show']);
});
