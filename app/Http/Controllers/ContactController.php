<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Group;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $groups = Group::all();

        $query = Contact::with('group');

        // Filtrage par group
        if ($request->filled('group_id')) {
    $query->whereHas('group', function ($q) use ($request) {
        $q->where('id', $request->group_id);
    });
}


        // Filtrage par search 
        if ($request->filled('search')) {
            $request->validate(['search'=>'nullable|regex:/[A-Za-z\s]+$/']);
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $contacts = $query->get();

        return view('contact.index', compact('contacts', 'groups'));
    }

    public function create()
    {
        $groups = Group::all();
        return view('contact.create', compact('groups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email',
            'phone'    => 'required',
            'group_id' => 'required|exists:groups,id',
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.index')
            ->with('success', 'Contact créé avec succès');
    }

    public function edit(Contact $contact)
    {
        $groups = Group::all();
        return view('contact.edit', compact('contact', 'groups'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email',
            'phone'    => 'required',
            'group_id' => 'required|exists:groups,id'
        ]);

        $contact->update($request->all());

        return redirect()->route('contacts.index')
            ->with('success', 'Contact modifié avec succès');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')
            ->with('success', 'Contact supprimé');
    }
}
