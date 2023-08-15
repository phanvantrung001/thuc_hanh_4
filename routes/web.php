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

Route::get('/welcome', function () {
    return view('welcome');
});


Route::prefix('book')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('books.index');
    Route::get('/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/store', [BookController::class, 'store'])->name('books.store');
    Route::get('/show/{id}', [BookController::class, 'show'])->name('books.show');
    Route::get('/edit/{id}', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/update/{id}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/destroy/{id}', [BookController::class, 'destroy'])->name('books.destroy');
});