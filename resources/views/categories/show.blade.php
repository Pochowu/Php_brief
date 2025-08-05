@extends('layout.base')

@section('content')
    <h1>Détails de la Catégorie</h1>

    <b>Name: {{$category->name }}</b>  <br>
    <b>Description {{$category->description ? $category->description : 'Non rempli.' }}:</b> 
    @foreach ($category->products as $product)
        <p>
            <div class="form-container">
                <b>Name :  {{ $product->name }}</b> <br />
                <b>Description : {{ $product->description ?: 'Non rempli.' }}</b> <br />
            </div>
            <hr>
            <div class="form-container">
                <a href="{{ route('products.show', $product->id) }}">Details</a><br>
                <hr style="animation-direction: reverse"/>
                <a href="{{ route('products.edit', $product->id) }}">Modifier</a>
            </div>
            <hr>
            <form action="{{ route('products.destroy', $product->id) }}" method="post" onsubmit="return confirm('Êtes-vous sûr(e) de vouloir supprimer cette catégorie ? Cette action sera irréversible !')">
                @csrf
                @method('DELETE')
                <button type="submit" style="background-color: red">Supprimer</button>
            </form>
            <a href="{{route('products.create')}}"> Retour</a>
            <hr>
        </p>
    @endforeach
@endsection