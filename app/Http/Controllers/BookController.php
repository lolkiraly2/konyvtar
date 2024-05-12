<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Isbn;
use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{

    
    //Visszaadja azon leltári számokat, amelyik még szabadok az adott címhez
    public function getBookData(Request $request)
    {
        $title = $request->input('title');
         $isbn = Isbn::where('title',$title)->get();

        $book = DB::select('select inventorynumber from books inner join isbns on isbn_id = isbn where isbn_id = :isbnid EXCEPT
        select inumber from rents inner join books on inumber = inventorynumber inner join isbns on isbn_id = isbn 
        where isbn_id = :isbnid',['isbnid' => $isbn->first()->isbn]);

        return response()->json($book);
    }
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
            'titles' => Isbn::orderby('title')->pluck('title')
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
