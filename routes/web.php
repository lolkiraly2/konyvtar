<?php
use App\Http\Controllers\ProfileController;
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
Route::resource('people', PersonController::class)->middleware(['auth', 'verified']);

Route::resource('isbns', IsbnController::class)->middleware(['auth', 'verified']);

Route::resource('books', BookController::class)->middleware(['auth', 'verified']);

route::resource('rents', RentController::class)->except([
    'show', 'destroy'
])->middleware(['auth', 'verified']);

route::resource('renthistories', RenthistoryController::class)->only([
    'index'
]);

Route::get('get-person-data', [PersonController::class,'getPersonData'])->name('get.persondata')->middleware(['auth', 'verified']);
Route::get('get-book-data', [BookController::class,'getBookData'])->name('get.bookdata')->middleware(['auth', 'verified']);
Route::get('get-isbn-data', [IsbnController::class,'getisbn'])->name('get.isbn')->middleware(['auth', 'verified']);

Route::get('/', function () {
    return view('index');
})->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';