@extends('layout.base')
    <style>
    h1 {
        text-align: center;
        color: #333;
    }
    form {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color:white ;
        border-radius: 5px;
        box-shadow: 0 2px 20px rgba(1, 122, 84, 0.959);
    }
    label {
        display: block;
        margin-bottom: 8px;
        color: #555;
    }
    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 3px;
        margin-bottom: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        width: 50%;
        padding: 3px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    button:hover {
        background-color: #218838;
    }
    </style>
@section('content')
    <h1>Inscription</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('auth.registration') }}" method="post">
        @csrf

        <label for="name">Nom de l'utilisateur</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Saisir le nom ici ...">
        <br /><br />

        <label for="email">E-mail</label>
        <input type="text" name="email" id="email" value="{{ old('email') }}"
            placeholder="Saisir l'e-mail ici ...">
        <br /><br />

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" placeholder="Saisir le mot de passe ici ...">
        <br /><br />

        <label for="password_confirmation">Confirmer le mot de passe</label>
        <input type="password" name="password_confirmation" id="password_confirmation"
            placeholder="Confirmez le mot de passe ici ...">
        <br /><br />

        <button type="submit">
            S'inscrire
        </button>
    </form>
@endsection
