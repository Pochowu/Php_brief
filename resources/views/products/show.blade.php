@extends('layout.base')

@section('content')
    <h1>Détails du produit</h1>

    <b>Name : {{ $product->name }}</b>  <br />
    <b>Description :{{ $product->description ? $product->description : 'Non rempli.'}} </b> <br />
    <b>Prix :{{ $product->price }} FCFA</b>  <br />
    <b>Quantité :{{ $product->quantity }}</b>  <br />
    <b>Catégorie :{{ $product->category ? $product->category->name : 'Aucune catégorie'}}</b>  <br />
@endsection