<?php

use App\Http\Controllers\ProfileController;
use App\Models\Book;
use App\Models\Rent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\IsbnController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\RenthistoryController;

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
Route::resource('people', PersonController::class);

Route::resource('isbns', IsbnController::class);

Route::resource('books', BookController::class);

route::resource('rents', RentController::class)->except([
    'show', 'destroy'
]);

route::resource('renthistories', RenthistoryController::class)->except([
    'destroy'
]);

Route::get('get-person-data', [PersonController::class,'getPersonData'])->name('get.persondata');
Route::get('get-book-data', [BookController::class,'getBookData'])->name('get.bookdata');
Route::get('get-isbn-data', [IsbnController::class,'getisbn'])->name('get.isbn');

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
