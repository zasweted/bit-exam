<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('gate:home');

Auth::routes();

Route::get('/category/list', [CategoryController::class, 'list'])->name('category.list')->middleware('gate:admin');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create')->middleware('gate:admin');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store')->middleware('gate:admin');
Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit')->middleware('gate:admin');
Route::post('/category/update/{category}', [CategoryController::class, 'update'])->name('category.update')->middleware('gate:admin');
Route::get('/category/delete/{category}', [CategoryController::class, 'destroy'])->name('category.delete')->middleware('gate:admin');

