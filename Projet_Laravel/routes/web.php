<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\SauceController;

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

Route::prefix('/sauce')->name('sauce.')->controller(SauceController::class)->group(function(){

    Route::get('/', 'index')->name('index');
    
    Route::get('/{sauce}', 'show')->where([
        'id' => '[0-9]+',
    ])->name('show');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
