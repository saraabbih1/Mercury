<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   public function index(Request $request)
{
    $request->validate(['search'=>'nullable|regex:/[A-Za-z\s]+$/']);
    $query = Contact::query();

    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    $contacts = $query->get();

    return view('contact.index', compact('contacts'));
}

    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.index')
            ->with('success', 'Contact créé avec succès');
    }

    public function edit(Contact $contact)
    {
        return view('contact.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email',
            'phone' => 'required'
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
