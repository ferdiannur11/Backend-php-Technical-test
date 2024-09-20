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
Route::get('/authors', [AuthorsController::class, 'getAll']);
Route::post('/authors', [AuthorsController::class, 'store']);
Route::get('/authors/{id}', [AuthorsController::class, 'show']);
Route::put('/authors/{id}', [AuthorsController::class, 'update']);
Route::delete('/authors/{id}', [AuthorsController::class, 'destroy']);


Route::get('/books', [BooksController::class, 'getAll']);
Route::post('/books', [BooksController::class, 'store']);
Route::get('/books/{id}', [BooksController::class, 'show']);
Route::put('/books/{id}', [BooksController::class, 'update']);
Route::delete('/books/{id}', [BooksController::class, 'destroy']);

Route::get('/authors/{id}/books', [BooksController::class, 'getBooksByAuthor']);



// Route::get('/approvers', [ApproverController::class, 'index']);
// Route::post('/approval-stage', [ApprovalStageController::class, 'store']);
// Route::put('/approval-stages/{id}', [ApprovalStageController::class, 'update']);
// Route::post('/expense', [ExpenseController::class, 'store'])->name('expense.create');
// Route::patch('/expense/{id}/approve', [ExpenseController::class, 'approve']);
// Route::get('/expense/{id}', [ExpenseController::class, 'show'])->name('expense.get');