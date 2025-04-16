<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Tymon\JWTAuth\Facades\JWTAuth;

class PersonController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $persons = Person::latest()->paginate($perPage);
        return Inertia::render('persons/index', [
            'persons' => $persons,
            'perPage' => (int)$perPage,
            'status' => session('status'),
        ]);
    }

    // Show the form for creating a new person
    public function create()
    {
        return Inertia::render('Persons/Create');
    }

    // Store a newly created person
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:persons',
            'bio' => 'nullable|string',
            'birth_date' => 'nullable|date',
        ]);

        $person = Person::create($validated);

        return redirect()
            ->route('persons.index')
            ->with('status', 'Person created successfully');
    }

    // Display the specified person
    public function show(Person $person)
    {
        return Inertia::render('Persons/Show', [
            'person' => $person,
        ]);
    }

    // Show the form for editing the person
    public function edit(Person $person)
    {
        return Inertia::render('Persons/Edit', [
            'person' => $person,
        ]);
    }

    // Update the specified person
    public function update(Request $request, Person $person)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:persons,email,' . $person->id,
            'bio' => 'nullable|string',
            'birth_date' => 'nullable|date',
        ]);

        $person->update($validated);

        return redirect()
            ->route('persons.index')
            ->with('status', 'Person updated successfully');
    }

    // Delete the specified person
    public function destroy(Person $person)
    {
        $person->delete();

        return redirect()
            ->route('persons.index')
            ->with('status', 'Person deleted successfully');
    }
}
