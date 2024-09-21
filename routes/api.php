<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/authors', [AuthorsController::class, 'getAll'])->name('authors.getAll');
Route::post('/authors', [AuthorsController::class, 'store'])->name('authors.create');
Route::get('/authors/{id}', [AuthorsController::class, 'show']);
Route::put('/authors/{id}', [AuthorsController::class, 'update'])->name('authors.update');
Route::delete('/authors/{id}', [AuthorsController::class, 'destroy'])->name('authors.delete');


Route::get('/books', [BooksController::class, 'getAll'])->name('books.getAll');
Route::post('/books', [BooksController::class, 'store'])->name('books.create');
Route::get('/books/{id}', [BooksController::class, 'show']);
Route::put('/books/{id}', [BooksController::class, 'update'])->name('books.update');
Route::delete('/books/{id}', [BooksController::class, 'destroy'])->name('books.delete');

Route::get('/authors/{id}/books', [BooksController::class, 'getBooksByAuthor']);