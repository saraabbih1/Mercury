<h1>Contacts</h1>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<a href="{{ route('contacts.create') }}">+ Ajouter contact</a>
<form method="GET" action="{{ route('contacts.index') }}" class="mb-3">
    <input 
        type="text" 
        name="search" 
        placeholder="Rechercher par nom"
        value="{{ request('search') }}"
    >
    <button type="submit">Rechercher</button>
</form>

<table border="1">
    <tr>
        <th>Nom</th>
        <th>Email</th>
        <th>Téléphone</th>
        <th>Actions</th>
    </tr>

@foreach($contacts as $contact)
<tr>
    <td>{{ $contact->name }}</td>
    <td>{{ $contact->email }}</td>
    <td>{{ $contact->phone }}</td>
    <td>
        <a href="{{ route('contacts.edit', $contact) }}">mpdifie</a>

        <form action="{{ route('contacts.destroy', $contact) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">supprimer</button>
        </form>
    </td>
</tr>
@endforeach
</table>
