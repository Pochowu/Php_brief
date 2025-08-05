@extends('layout.base')

@section('content')
    <h1 style="font-size: 24px; color: #333; margin-bottom: 20px;">Créer une catégorie</h1>

    @if ($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border: 1px solid #f5c6cb; margin-bottom: 20px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="post" style="background-color: #f9f9f9; padding: 20px; border-radius: 8px; width: 400px;">
        @csrf

        <label for="name" style="font-weight: bold; display: block; margin-bottom: 5px;">Nom</label>
        <input type="text" placeholder="Saisir le nom du produit ..." value="{{ old('name') }}" id="name" name="name"
               style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; margin-bottom: 15px;" />

        <label for="description" style="font-weight: bold; display: block; margin-bottom: 5px;">Description</label>
        <textarea name="description" id="description" cols="30" rows="5"
                  style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; margin-bottom: 15px;">{{ old('description') }}</textarea>

        <button type="submit" style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">
            Soumettre
        </button>
    </form>
@endsection
