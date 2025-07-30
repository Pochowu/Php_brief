@extends('layout.base')

@section('content')
    <h1>Détails de la Catégorie</h1>

    <b>Name :</b> {{$category->name }} <br>
    <b>Description :</b> {{$category->description ? $category->description : 'Non rempli.' }}
@endsection