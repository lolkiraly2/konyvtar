<?php

use App\Models\Book;
use App\Models\Rent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IsbnController;
use App\Http\Controllers\PersonController;

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

Route::get('/kolcsonzesek', function () {
    $table = Rent::with('person','book','isbn')->get();
        
    return view("kolcsonzes", [
        'kolcsonzes' => $table
    ]);
});

Route::resource('people', PersonController::class);

Route::resource('isbns', IsbnController::class);

Route::get('/konyvek', function () {
    $table = Book::with('isbn')->get();
    return view("konyv", [
        'konyv' => $table
    ]);
});

Route::get('/', function () {
    return view('index');
});