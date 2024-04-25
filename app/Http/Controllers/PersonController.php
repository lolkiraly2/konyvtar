<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('people.index', [
            'people' => Person::orderby('name')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('people.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $person = Person::create([
            'name' => request('name'),
            'postcode' => request('postcode'),
            'city' => request('city'),
            'street' => request('street'),
            'number' => request('number'),
            'type' => request('type'),
            'contact' => request('contact'),
            'borrowCount' => 0
        ]);
        return redirect(route('people.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        return view('people.show',[
            'person' => $person
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person)
    {
        $types = ['student', 'professor', 'fromElsewhere', 'other'];

        return view('people.edit', compact('person', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Person $person)
    {
        $person->update([
            'name' => request('name'),
            'postcode' => request('postcode'),
            'city' => request('city'),
            'street' => request('street'),
            'number' => request('number'),
            'type' => request('type'),
            'contact' => request('contact'),
            'borrowCount' => 0
        ]);
        return redirect(route('people.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        $person->delete();
        return redirect(route('people.index'));
    }
}
