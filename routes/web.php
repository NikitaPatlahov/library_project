<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
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
Route::get('/books/filter', [BookController::class, 'filter'])->name('book.filter');
Route::get('/books/create', [BookController::class, 'create'])->name('book.create');
Route::post('/books/store', [BookController::class, 'store'])->name('book.store');
Route::get('/books/{book}', [BookController::class, 'show'])->name('book.show');
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::patch('/books/{book}', [BookController::class, 'update'])->name('book.update');
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('book.destroy');

Route::get('/authors', [AuthorController::class,'index'])->name('author.index');
Route::get('/authors/create', [AuthorController::class,'create'])->name('author.create');
Route::post('/authors/store', [AuthorController::class,'store'])->name('author.store');
Route::get('/authors/{author}/edit', [AuthorController::class,'edit'])->name('author.edit');
Route::patch('/authors/{author}', [AuthorController::class,'update'])->name('author.update');
Route::delete('/authors/{author}', [AuthorController::class,'destroy'])->name('author.destroy');
