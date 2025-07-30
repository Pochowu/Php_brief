@extends('layout.base')

@section('content')
    <h1>Liste des catégories</h1>
    <a href="{{ route('categories.create') }}">Créer une catégorie</a>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @foreach ($categories as $category)
        <p>
            <b>Name</b>: {{ $category->name }}<br />
            <b>Description</b>: {{ $category->description ?: 'Non rempli.' }}<br />
            <a href="{{ route('categories.show', $category->id) }}">Details</a>
            <br />
            <a href="{{ route('categories.edit', $category->id) }}">Modifier</a>
            <br />
            <form action="{{ route('categories.destroy', $category->id) }}" method="post" onsubmit="return confirm('Êtes-vous sûr(e) de vouloir supprimer cette catégorie ? Cette action sera irréversible !')">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
            </form>
        </p>
    @endforeach
@endsection