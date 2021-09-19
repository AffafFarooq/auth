<?php

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

Auth::routes();

Route::get('/index', [App\Http\Controllers\AddController::class, 'index'])->name('index');
Route::group(['prefix' => 'index'], function () {
        Route::post('data-create', [App\Http\Controllers\AddController::class, 'store'])->name('SubmitData')->middleware('auth');
    });
