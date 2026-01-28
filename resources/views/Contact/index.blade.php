<h1>Contacts</h1>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<a href="{{ route('contacts.create') }}">➕ Ajouter contact</a>

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
        <a href="{{ route('contacts.edit', $contact) }}">✏️</a>

        <form action="{{ route('contacts.destroy', $contact) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">🗑️</button>
        </form>
    </td>
</tr>
@endforeach
</table>
