<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Isbn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->has('value')){
            $option = request('Soption');
            $data = request('value');
            
            $books = DB::table('books')
            ->select('*')
            ->join('isbns', 'books.isbn_id', '=', 'isbns.isbn')
            ->where($option, 'like', '%'. $data . '%')
            ->get();
        
            //dd(compact('option', 'data','books'));
            return view('books.index', [
                'books' => $books
            ]);
        }

        return view('books.index', [
            'books' => DB::table('books')->select('*')->join('isbns', 'books.isbn_id', '=', 'isbns.isbn')->orderBy('inventorynumber')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create',[
            'isbns' => Isbn::pluck('isbn')->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book = Book::create([
            'inventorynumber' => request('inventorynumber'),
            'isbn_id' => request('isbn'),
        ]);
        return redirect(route('books.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show',[
            'book' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit',[
            'book' => $book,
            'isbns' => Isbn::pluck('isbn')->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $book->update([
            'inventorynumber' => request('inventorynumber'),
            'isbn_id' => request('isbn'),
        ]);
        return redirect(route('books.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect(route('books.index'));
    }
}
