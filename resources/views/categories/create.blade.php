@extends('layout.base')

@section('content')
    <h1>Créer une catégorie</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <label for="name">Nom</label><br>
        <input type="text" placeholder="Saisir le nom de la catégorie ..." value="{{ old('name') }}" id="name" name="name" /> <br>
        <br>
        <label for="description">Description</label><br>
        <textarea name="description" id="description" cols="30" rows="5">{{ old('description') }}</textarea><br>
        <button type="submit">Soumettre</button>
    </form>
@endsection