@extends('layout.base')

@section('content')
    <h1>Veuillez vous connectez</h1>
    @if ($message = Session::get('success'))
        <h3>{{ $message }}</h3>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="form-container">
        <form method="POST" action="{{ route('auth.login') }}">
            @csrf
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div><br>
            <div>
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required>
            </div> <br>
            <button type="submit">Se connecter</button>
        </form>
        <hr>
        <p>Avez-vous un compte? Si non Veuillez vous Inscrire <br> <hr> <a href="{{ route('auth.registration') }}">S'Inscrire</a></p>
@endsection