<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un Groupe</title>
</head>
<body>

<h1>Ajouter un Groupe</h1>

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

<form action="{{ route('groups.store') }}" method="POST">
    @csrf
    <label for="name">Nom du groupe :</label>
    <input type="text" name="name" id="name" value="{{ old('name') }}">
    <button type="submit">Ajouter</button>
</form>

<a href="{{ route('groups.index') }}">🔙 Retour à la liste</a>

</body>
</html>

