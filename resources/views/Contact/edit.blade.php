<h1>Modifier Contact</h1>

<form method="POST" action="{{ route('contacts.update', $contact) }}">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $contact->name }}"><br>
    <input type="email" name="email" value="{{ $contact->email }}"><br>
    <input type="text" name="phone" value="{{ $contact->phone }}"><br>

    <button type="submit">Modifier</button>
</form>
