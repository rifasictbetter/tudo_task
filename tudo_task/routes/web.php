<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
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

 Route::get('/', [App\Http\Controllers\IndexController::class, 'index']);
// Route::get('/helpguide', [App\Http\Controllers\IndexController::class, 'helpguide']);

//Route::post('/helpguide', [App\Http\Controllers\IndexController::class, 'store']);
Route::controller(IndexController::class)->group(function () {
    Route::get('/helpguide', 'helpguide');
    Route::post('/helpguide', 'store')->name('helpguide.store');
    Route::get('/main', 'mainhelpguide');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
