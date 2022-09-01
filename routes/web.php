<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
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

Route::get('/books', [BookController::class, 'index'])->name('book.index');
Route::get('/books/create', [BookController::class, 'create'])->name('book.create');
Route::post('/books/store', [BookController::class, 'store'])->name('book.store');
Route::get('/books/{book}', [BookController::class, 'show'])->name('book.show');
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::patch('/books/{book}', [BookController::class, 'update'])->name('book.update');
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('book.destroy');
