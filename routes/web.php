<?php

use App\Models\Book;
use App\Models\Rent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\IsbnController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\RentController;

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
    'show'
]);

Route::get('get-person-data', [PersonController::class,'getPersonData'])->name('get.persondata');
Route::get('get-book-data', [BookController::class,'getBookData'])->name('get.bookdata');


Route::get('/', function () {
    return view('index');
});