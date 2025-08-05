@extends('layout.base')

@section('content')
    <h1 style="font-size: 24px; color: #333; margin-bottom: 20px;">Créer un Produit</h1>

    @if ($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border: 1px solid #f5c6cb; margin-bottom: 20px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="post" style="background-color: #0743f8; padding: 20px; border-radius: 8px; width: 400px; margin: 0 auto; ">
        @csrf

        <label for="name" style="font-weight: bold; display: block; margin-bottom: 5px;">Nom</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}"
               placeholder="Saisir le nom du produit ..."
               style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; margin-bottom: 15px;" required />

        <label for="description" style="font-weight: bold; display: block; margin-bottom: 5px;">Description</label>
        <input type="text" name="description" id="description" value="{{ old('description') }}"
               placeholder="Saisir la description du produit ..."
               style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; margin-bottom: 15px;" />

        <label for="price" style="font-weight: bold; display: block; margin-bottom: 5px;">Prix</label>
        <input type="number" name="price" id="price" value="{{ old('price') }}"
               placeholder="Saisir le prix du produit ..." step="0.01"
               style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; margin-bottom: 15px;" />

        <label for="quantity" style="font-weight: bold; display: block; margin-bottom: 5px;">Quantité</label>
        <input type="number" name="quantity" id="quantity" value="{{ old('quantity') }}"
               placeholder="Saisir la quantité du produit ..."
               style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; margin-bottom: 15px;" required />

         <label for="category_id" style="font-weight: bold; display: block; margin-bottom: 5px;">Catégorie</label>
        <select name="category_id" id="category_id"
                style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; margin-bottom: 15px;" required>
            <option value="">-- Choisir une catégorie --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <button type="submit"
                style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">
            Soumettre
        </button>
    </form>
@endsection

        