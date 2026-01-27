<!DOCTYPE html>
<html>
<head>
    <title>Liste des Groupes</title>
</head>
<body>

<h1>Liste des Groupes</h1>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<a href="{{ route('groups.create') }}">Ajouter un Groupe</a>

<ul>
@foreach($groups as $group)
    <li>
        {{ $group->name }}
        <a href="{{ route('groups.edit', $group->id) }}">Modifier</a>
        <form action="{{ route('groups.destroy', $group->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Supprimer</button>
        </form>
    </li>
@endforeach
</ul>

</body>
</html>
