<?php

use App\Models\Book;
use App\Models\Person;
use Illuminate\Support\Facades\Route;
use App\Models\Rent;

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
    $table = Rent::join('person', 'rent.person_id', '=', 'person.id')
        ->join('book', 'rent.in', '=', 'book.inventorynumber')
        ->join('isbn', 'book.isbn', '=', 'isbn.isbn')->get();
        
    return view("kolcsonzes", [
        'kolcsonzes' => $table
    ]);
});

Route::get('/tagok', function () {
    $table = Person::all();
    return view("tag", [
        'emberek' => $table
    ]);
});

Route::get('/konyvek', function () {
    $table = Book::join('isbn', 'book.isbn', '=', 'isbn.isbn')->get();
    return view("konyv", [
        'konyv' => $table
    ]);
});

Route::get('/', function () {
    return view('index');
});