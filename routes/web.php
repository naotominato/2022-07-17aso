<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

//お問い合わせフォーム
Route::get('/contact', [ContactController::class, 'index'])->name('index');
Route::post('/contact/confirm', [ContactController::class, 'confirm'])->name('confirm');
Route::post('/contact/complete', [ContactController::class, 'complete'])->name('complete');

//管理システム
Route::get(
  '/search',
  [ContactController::class, 'search']
)->name('search');
Route::post(
  '/search',
  [ContactController::class, 'search']
)->name('search');
Route::get('/delete', [ContactController::class, 'delete'])->name('delete');
