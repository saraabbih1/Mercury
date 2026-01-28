<!DOCTYPE html>
<html>
<head>
    <title>Modifier un Groupe</title>
</head>
<body>

<h1>Modifier le Groupe</h1>

{{-- Display Validation Errors --}}
@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('groups.update', $group->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Nom du groupe :</label>
    <input type="text" name="name" id="name" value="{{ old('name', $group->name) }}">
    <button type="submit">Modifier</button>
</form>

<a href="{{ route('groups.index') }}"> Retour à la liste</a>

</body>
</html>
