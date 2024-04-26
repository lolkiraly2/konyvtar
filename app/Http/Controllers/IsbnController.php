<?php

namespace App\Http\Controllers;

use App\Models\Isbn;
use Illuminate\Http\Request;

class IsbnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('isbns.index', [
            'isbns' => Isbn::orderby('title')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('isbns.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $isbn = Isbn::create([
            'isbn' => request('isbn'),
            'writer' => request('writer'),
            'title' => request('title'),
            'publisher' => request('publisher'),
            'publishedAt' => request('publishedAt'),
        ]);
        return redirect(route('isbns.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Isbn $isbn)
    {
        return view('isbns.show',[
            'isbn' => $isbn
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Isbn $isbn)
    {
        return view('isbns.edit',[
            'isbn' => $isbn
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Isbn $isbn)
    {
        $isbn->update([
            'isbn' => request('isbn'),
            'writer' => request('writer'),
            'title' => request('title'),
            'publisher' => request('publisher'),
            'publishedAt' => request('publishedAt'),
        ]);
        return redirect(route('isbns.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Isbn $isbn)
    {
        $isbn->delete();
        return redirect(route('isbns.index'));
    }
}
