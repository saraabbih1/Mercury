<?php


namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return view('groups.index', compact('groups'));
    }

    public function create()
    {
        return view('groups.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:groups,name',
        ]);

        Group::create($request->all());

        return redirect()->route('groups.index')
            ->with('success', 'Group créé avec succès');
    }

    public function edit($id)
    {
        $group = Group::findOrFail($id);
        return view('groups.edit', compact('group'));
    }

    public function update(Request $request, $id)
    {
        $group = Group::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:groups,name,' . $id,
        ]);

        $group->update($request->all());

        return redirect()->route('groups.index')
            ->with('success', 'Group modifié avec succès');
    }

    public function destroy($id)
    {
        $group = Group::findOrFail($id);

        if ($group->contacts()->count() > 0) {
            return redirect()->route('groups.index')
                ->with('error', 'Impossible de supprimer un groupe qui contient des contacts.');
        }

        $group->delete();

        return redirect()->route('groups.index')
            ->with('success', 'Group supprimé avec succès');
    }

    public function show($id)
    {
        $group = Group::with('contacts')->findOrFail($id);
        return view('groups.show', compact('group'));
    }
}
