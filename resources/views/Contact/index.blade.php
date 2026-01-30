<h1 style="text-align:center; color:#333;">Contacts</h1>

@if(session('success'))
    <div style="background-color:#d4edda; color:#155724; padding:10px; margin-bottom:15px; border-radius:5px; text-align:center;">
        {{ session('success') }}
    </div>
@endif



<!-- Barre de recherche et filtre Group -->
<div style=" margin-bottom:20px;">
    <form method="GET" action="{{ route('contacts.index') }}" style="display:inline-flex; gap:5px; flex-wrap:wrap;">
        <input 
            type="text" 
            name="search" 
            placeholder="Rechercher par nom"
            value="{{ request('search') }}"
            style="padding:5px; border-radius:5px; border:1px solid #ccc;"
        >

        <select name="group_id" style="padding:5px; border-radius:5px; border:1px solid #ccc;">
            <option value=""> Tous les groupes </option>
            @foreach($groups as $group)
                <option value="{{ $group->id }}" {{ request('group_id') == $group->id ? 'selected' : '' }}>
                    {{ $group->name }}
                </option>
            @endforeach
        </select>

        <button type="submit" 
            style="padding:5px 10px; border:none; background-color:#112b80; color:white; border-radius:5px; cursor:pointer;">
            Rechercher
        </button>
    </form>
</div>
<div style="margin-bottom:20px;">
    <a href="{{ route('groups.index') }}" 
       style="background-color:#28a745; color:white; padding:10px 15px; text-decoration:none; border-radius:5px; margin-right:10px;">
       Voir les Groups
    </a>

    <a href="{{ route('contacts.create') }}" 
       style="background-color:#112b80; color:white; padding:10px 15px; text-decoration:none; border-radius:5px;">
       + Ajouter Contact
    </a>
</div>


@if($contacts->count() > 0)
<table style="width:100%; border-collapse:collapse; text-align:left;">
    <thead>
        <tr style="background-color:#f2f2f2;">
            <th style="padding:10px; border-bottom:1px solid #ddd;">Nom</th>
            <th style="padding:10px; border-bottom:1px solid #ddd;">Email</th>
            <th style="padding:10px; border-bottom:1px solid #ddd;">Téléphone</th>
            <th style="padding:10px; border-bottom:1px solid #ddd;">Groupe</th> 
            <th style="padding:10px; border-bottom:1px solid #ddd;">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($contacts as $contact)
    <tr>
        <td style="padding:8px; border-bottom:1px solid #ddd;">{{ $contact->name }}</td>
        <td style="padding:8px; border-bottom:1px solid #ddd;">{{ $contact->email }}</td>
        <td style="padding:8px; border-bottom:1px solid #ddd;">{{ $contact->phone }}</td>
        <td style="padding:8px; border-bottom:1px solid #ddd;">{{ $contact->group->name ?? 'walo grop?' }}</td> 
        <td style="padding:8px; border-bottom:1px solid #ddd;">
            <a href="{{ route('contacts.edit', $contact) }}" 
               style="color:#ffa007; margin-right:10px;">Modifier</a>
            <form action="{{ route('contacts.destroy', $contact) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        onclick="return confirm('Voulez-vous supprimer ce contact?')"
                        style="color:white; background-color:#dc3545; border:none; padding:5px 10px; border-radius:5px; cursor:pointer;">
                        Supprimer
                </button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

@elseif(request()->filled('search') || request()->filled('group_id'))
    <p style="color:#555; text-align:center; margin-top:20px;">
        Aucun contact trouvé.
    </p>
@else
    <p style="color:#555; text-align:center; margin-top:20px;">
        Pas encore de contacts.
    </p>
@endif
