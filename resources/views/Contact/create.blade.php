<h1 style="text-align:center; color:#333;">Ajouter Contact</h1>

@if ($errors->any())
    <div style="background-color:#f8d7da; color:#721c24; padding:10px; margin-bottom:15px; border-radius:5px;">
        <ul style="margin:0; padding-left:20px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('contacts.store') }}" 
      style="max-width:400px; margin:0 auto; padding:20px; background-color:#f9f9f9; border-radius:10px; box-shadow:0 0 10px #ccc;">
    @csrf

    <input type="text" name="name" placeholder="Nom" value="{{ old('name') }}"
           style="width:100%; padding:10px; margin-bottom:15px; border-radius:5px; border:1px solid #ccc;">

    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"
           style="width:100%; padding:10px; margin-bottom:15px; border-radius:5px; border:1px solid #ccc;">

    <input type="text" name="phone" placeholder="Téléphone" value="{{ old('phone') }}"
           style="width:100%; padding:10px; margin-bottom:20px; border-radius:5px; border:1px solid #ccc;">

    <button type="submit" 
            style="width:100%; padding:10px; border:none; border-radius:5px; background-color:#4CAF50; color:white; font-weight:bold; cursor:pointer;">
        Enregistrer
    </button>
</form>

<div style="text-align:center; margin-top:20px;">
    <a href="{{ route('contacts.index') }}" 
       style="color:#4CAF50; text-decoration:none;">← Retour aux contacts</a>
</div>
