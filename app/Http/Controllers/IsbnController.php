<?php

namespace App\Http\Controllers;

use App\Models\Isbn;
use Illuminate\Http\Request;

class IsbnController extends Controller
{
    public function validateIsbn(): array
    {
        return request()->validate([
                'isbn' => 'required|integer|digits:13|unique:isbns,isbn',
                'writer' => 'required|max:50',
                'title' => 'required',
                'publisher' => 'required|max:50',
                'publishedAt' => 'required|integer|between:1700,2024',
            ],
            [
                'isbn.required' => "A ISBN szám nem lehet üres!",
                'isbn.unique' => "A ISBN számnak egyedinek kell lennie!",
                'isbn.integer' => "A ISBN szám csak számokból állhat!",
                'isbn.digits'  => "A ISBN szám 13 számjegyből kell álljon!",
                'writer.required' => "Az író nem lehet üres!",
                'writer.max' => "Az író neve túl hosszú! (Maximum :max karakter)",
                'title.required' => "A cím nem lehet üres!",
                'publisher.required' => "Az kiadó neve nem lehet üres!",
                'publisher.max' => "Az kiadó neve túl hosszú! (Maximum :max karakter)",
                'publishedAt.required' => "A kiadás éve nem lehet üres!",
                'publishedAt.integer' => "A kiadás évéhez évszámot adjon meg!",
                'publishedAt.between' => "Az évszám :min és :max között lehet!"
            ]
        );
    }

    public function getisbn(Request $request)
    {
        $title = $request->input('title');
        $isbn = Isbn::where('title', $title)->pluck('isbn');

        return response()->json($isbn);
    }

    public function optionname($option)
    {
        switch ($option) {
            case 'isbn':
                return 'Isbn szám';
            case 'writer':
                return 'Író';
            case 'title':
                return 'Cím';
            case 'publisher':
                return 'Kiadó';
            case 'publihedAt':
                return 'Kiadási év';
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->has('value')) {
            $option = request('Soption');
            $data = request('value');

            if($option == 'isbn') $isbns = Isbn::where($option, 'like', $data . '%')->get();
            else $isbns = Isbn::where($option, 'like', '%' . $data . '%')->get();

            
            $option = $this->optionname($option);
            //dd(compact('option', 'data','isbns'));
            return view('isbns.index', [
                'isbns' => $isbns,
                'option' => $option,
                'value' => $data
            ]);
        }

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
        Isbn::create($this->validateIsbn());
        return redirect(route('isbns.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Isbn $isbn)
    {
        return view('isbns.show', [
            'isbn' => $isbn
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Isbn $isbn)
    {
        $rented = true;
        if($isbn->rent->isEmpty())
            $rented =false;

        return view('isbns.edit', [
            'isbn' => $isbn,
            'rented' => $rented
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Isbn $isbn)
    {
        $isbn->update($this->validateIsbn());
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
