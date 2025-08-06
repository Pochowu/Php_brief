@extends('layout.base')

@section('content')
    <h1>Profils</h1>
    <div>
        <img src="{{('/profils-removebg-preview.png')}}" alt="" width="200" height="200" style="border-radius: 50%;">
    </div>
    <h1>Bonjour {{ $user->name }}</h1>

    <h2>Mes Catégories</h2>
    <ul>
       @foreach (Auth::user()-> categories as $category)
            <div class="category-item">
                <p><b>Nom</b>: {{ $category->name }}</p>
                <p><b>Description</b>: {{ $category->description ?: 'Non rempli.' }}</p>
    
                </div>
            </div>
        @endforeach
    </ul>

    <h2>Mes Produits</h2>
    <ul>
        @forelse (Auth::user()->products as $product)
            <div class="product-item">
                <div class="product-details">
                    <b>Name : </b> {{ $product->name }} <br />
                    <b>Description : </b> {{ $product->description ?: 'Non rempli.' }}
                </div>
            
            </div>
        @empty
            <p>Aucun produit n'a été trouvé.</p>
        @endforelse
    </ul>
@endsection