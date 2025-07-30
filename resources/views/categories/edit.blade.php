@extends('layout.base')

@section('content')
    <h1>Modifier une Catégorie</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($message = Session::get('succes'))
        <p>
            {{$message}}
        </p>
    @endif

    <form action="{{route('categories.update', $category->id)}}" method="post">
        @csrf

        @method('PUT')
        <label for="name">Nom</label><br>
        <input type="text" placeholder="Saisir le nom de la catégorie..." value="{{$category->name}}" id="name" name="name"><br>

        <label for="description">Description</label><br>
        <textarea name="description" id="description" cols="30" rows="5"><br>
            {{$category->description}}
        </textarea>
        <button type="submit"><br>
            Mettre à jour
        </button>
    </form>
@endsection