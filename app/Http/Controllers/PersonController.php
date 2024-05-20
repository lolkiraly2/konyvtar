<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\Person;
use App\Models\Renthistory;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function validatePerson(): array
    {
        return request()->validate([
                'name' => 'required|max:50',
                'postcode' => 'required|integer|between:1000,9999',
                'city' => 'required|max:30',
                'street' => 'required',
                'number' => 'required|integer',
                'type' => 'required',
                'contact' => 'required|email',
                'borrowCount' => 'integer'
            ],
            [
                'name.required' => "A név nem lehet üres!",
                'name.max' => "Túl hosszú név! (Maximum: :max karakter)!",
                'postcode.required' => "Az irányítószám nem lehet üres!",
                'postcode.integer' => "Az irányítószám csak szám lehet!",
                'postcode.between' => "Irányítószámnak :min és :max közötti számot adjon meg!",
                'city.required' => "A város nem lehet üres!",
                'city.max' => "Túl hosszú városnév (Maximum: :max karakter)!",
                'street.required' => "Az utca nem lehet üres!",
                'number.required' => "A házszám nem lehet üres!",
                'number.integer' => "Házszám csak szám lehet!",
                'contact.required' => "Az email nem lehet üres!",
                'contact.email' => "Hibás formátum!"
            ]
        );
    }

    public function getPersonData(Request $request)
    {
        $personId = $request->input('person_id');
        $person = Person::findOrFail($personId);

        return response()->json($person);
    }

    public function typename($type)
    {
        switch ($type) {
            case 'student':
                return 'Diák';
            case 'professor':
                return 'Professzor';
            case 'fromElsewhere':
                return 'Másik egyetemi';
            case 'other':
                return 'Külsős';
        }
    }

    public function optionname($option)
    {
        switch ($option) {
            case 'name':
                return 'Név';
            case 'postcode':
                return 'Irányítószám';
            case 'city':
                return 'Város';
            case 'street':
                return 'Utca';
            case 'type':
                return 'Típus';
            case 'contact':
                return 'Elérhetőség';
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

            if ($option == 'postcode') $people = Person::where($option, 'like', $data . '%')->get();
            else $people = Person::where($option, 'like', '%' . $data . '%')->get();
            //dd(compact('option', 'data','people'));
            if ($option == 'type') $data = $this->typename($data);
            $option = $this->optionname($option);

            return view('people.index', [
                'people' => $people,
                'option' => $option,
                'value' => $data
            ]);
        }

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
        Person::create($this->validatePerson());
        return redirect(route('people.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        return view('people.show', [
            'person' => $person,
            'rentingbooks' => Rent::where("person_id", $person->id)->get(),
            'rentedbooks' => Renthistory::where("person_id", $person->id)->get()
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
        $person->update($this->validatePerson());
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
