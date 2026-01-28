<h1>Ajouter Contact</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li style="color:red">{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('contacts.store') }}">
    @csrf

    <input type="text" name="name" placeholder="Nom"><br>
    <input type="email" name="email" placeholder="Email"><br>
    <input type="text" name="phone" placeholder="Téléphone"><br>

    <button type="submit">Enregistrer</button>
</form>
