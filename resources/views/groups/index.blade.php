<!DOCTYPE html>
<html>
<head>
    <title>Liste des Groupes</title>
</head>
<body style="font-family:Arial, sans-serif; background:#f5f5f5;">

<h1 style="text-align:center; color:#333;">Liste des Groupes</h1>

@if(session('success'))
    <div style="background-color:#d4edda; color:#155724; padding:10px; margin-bottom:15px; border-radius:5px; width:400px; margin:auto;">
        {{ session('success') }}
    </div>
@endif

<div style="width:400px; margin:0 auto 20px auto; display:flex; justify-content:space-between; align-items:center;">
    <a href="{{ route('groups.create') }}" 
       style="background-color:#4CAF50; color:white; padding:10px 15px; text-decoration:none; border-radius:5px;">
       + Ajouter un Groupe
    </a>
</div>
<div style="margin-bottom:20px;">
    <a href="{{ route('contacts.index') }}" 
       style="background-color:#0d1d50; color:white; padding:10px 15px; text-decoration:none; border-radius:5px;">
       Voir les Contacts
    </a>
</div>

@if($groups->count() > 0)
<table style="width:100%; border-collapse:collapse; text-align:left; max-width:400px; margin:auto;">
    <thead>
        <tr style="background-color:#f2f2f2;">
            <th style="padding:10px; border-bottom:1px solid #ddd;">Nom</th>
            <th style="padding:10px; border-bottom:1px solid #ddd;">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($groups as $group)
    <tr>
        <td style="padding:8px; border-bottom:1px solid #ddd;">{{ $group->name }}</td>
        <td style="padding:8px; border-bottom:1px solid #ddd;">
            <a href="{{ route('groups.edit', $group->id) }}" 
               style="color:#ffa007; margin-right:10px;">Modifier</a>

            <form action="{{ route('groups.destroy', $group->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        onclick="return confirm('Voulez-vous supprimer ce groupe?')"
                        style="color:white; background-color:#dc3545; border:none; padding:5px 10px; border-radius:5px; cursor:pointer;">
                        Supprimer
                </button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@else
    <p style="color:#555; text-align:center; margin-top:20px;">Pas encore de groupes.</p>
@endif

</body>
</html>
