<!DOCTYPE html>
<html>
<head>
    <title>Modifier Contact</title>
</head>
<body style="font-family:Arial, sans-serif; background:#f5f5f5;">

<h1 style="text-align:center; color:#333;">Modifier Contact</h1>

@if ($errors->any())
    <div style="color:#721c24; background:#f8d7da; padding:10px; width:400px; margin:15px auto; border-radius:5px;">
        <ul style="margin:0; padding-left:20px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div style="width:400px; margin:0 auto; background:white; padding:20px; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1);">

    <form method="POST" action="{{ route('contacts.update', $contact) }}">
        @csrf
        @method('PUT')

        <label style="display:block; margin-bottom:5px;">Nom :</label>
        <input 
            type="text" 
            name="name" 
            value="{{ old('name', $contact->name) }}"
            style="width:100%; padding:8px; border:1px solid #ccc; border-radius:5px; margin-bottom:12px;"
        >

        <label style="display:block; margin-bottom:5px;">Email :</label>
        <input 
            type="email" 
            name="email" 
            value="{{ old('email', $contact->email) }}"
            style="width:100%; padding:8px; border:1px solid #ccc; border-radius:5px; margin-bottom:12px;"
        >

        <label style="display:block; margin-bottom:5px;">Téléphone :</label>
        <input 
            type="text" 
            name="phone" 
            value="{{ old('phone', $contact->phone) }}"
            style="width:100%; padding:8px; border:1px solid #ccc; border-radius:5px; margin-bottom:15px;"
        >
    <label style="display:block; margin-bottom:5px;">Groupe :</label>
        <select name="group_id" style="width:100%; padding:8px; margin-bottom:15px; border-radius:5px; border:1px solid #ccc;">
            <option value=""> Choisir un groupe </option>
            @foreach($groups as $group)
                <option value="{{ $group->id }}" {{ old('group_id', $contact->group_id) == $group->id ? 'selected' : '' }}>
                    {{ $group->name }}
                </option>
            @endforeach
        </select>
        <button 
            type="submit"
            style="background-color:#112b80; color:white; border:none; padding:10px; width:100%; border-radius:5px; cursor:pointer;"
        >
            Modifier
        </button>
    </form>

    <a href="{{ route('contacts.index') }}" 
       style="display:block; text-align:center; margin-top:15px; text-decoration:none; color:#0d1d50;">
       ← Retour à la liste
    </a>

</div>

</body>
</html>
