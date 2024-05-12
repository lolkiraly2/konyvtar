<?php

namespace App\Http\Controllers;

use App\Models\Isbn;
use App\Models\Person;
use App\Models\Rent;
use App\Models\Renthistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('rents.index',[
            'rents' => Rent::with('person','book','isbn')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rents.create',[
            'people' => Person::orderby('name')->get(),
            'titles' => DB::select('SELECT DISTINCT title from books inner join isbns on isbn_id = isbn order by title')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book = Rent::create([
            'person_id' => request('personSelect'),
            'inumber' => request('inumber'),
            'rentdate' => request('rentdate'),
            'expiredate' => request('expiredate')
        ]);

        $kolcsonzo = Person::find(request('personSelect'));
        $db = $kolcsonzo->borrowCount + 1;
        $kolcsonzo->borrowCount = $db;
        $kolcsonzo->save();

        return redirect(route('rents.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rent $rent)
    {
        return view('rents.edit', [
            'rent' => $rent
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Rent $rent)
    {
        $kolcsonzo = Person::find(request('personid'));
        $db = $kolcsonzo->borrowCount - 1;
        $kolcsonzo->borrowCount = $db;
        $kolcsonzo->save();

        $rentb = Renthistory::create([
            'id' => $rent->id,
            'person_id' => request('personid'),
            'inumber' => request('inumber'),
            'rentdate' => request('rentdate'),
            'expiredate' => request('expiredate'),
            'tookback' => request('tookback')
        ]);

        $rent->delete();

        return redirect(route('rents.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
