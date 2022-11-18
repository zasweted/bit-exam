<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
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
Route::delete('/category/delete/{category}', [CategoryController::class, 'destroy'])->name('category.delete')->middleware('gate:admin');


Route::get('/book/list', [BookController::class, 'list'])->name('book.list')->middleware('gate:user');
Route::get('/book/create', [BookController::class, 'create'])->name('book.create')->middleware('gate:admin');
Route::post('/book/store', [BookController::class, 'store'])->name('book.store')->middleware('gate:admin');
Route::get('/book/edit/{book}', [BookController::class, 'edit'])->name('book.edit')->middleware('gate:admin');
Route::post('/book/update/{book}', [BookController::class, 'update'])->name('book.update')->middleware('gate:admin');
Route::delete('/book/delete/{book}', [BookController::class, 'destroy'])->name('book.delete')->middleware('gate:admin');



