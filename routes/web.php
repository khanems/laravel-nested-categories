<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

Route::get('/d', function () {
    return view('welcome');
});


Route::get('/',[CategoryController::class,'index']);

Route::get('create',[CategoryController::class,'create']);
Route::post('store',[CategoryController::class,'store']);
Route::get('edit/{id}',[CategoryController::class,'edit']);
Route::put('update/{id}',[CategoryController::class,'update']);