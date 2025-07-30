@extends('layout.base')

@section('content')
<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #f4f6f8;
        margin: 0;
        padding: 0;
    }

    .form-container {
        background: #fff;
        max-width: 600px;
        margin: 50px auto;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }

    .form-container h1 {
        margin-bottom: 25px;
        font-size: 24px;
        color: #333;
    }

    label {
        display: block;
        margin-bottom: 6px;
        color: #555;
        font-weight: 500;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
        background-color: #fdfdfd;
    }

    .btn-group {
        display: flex;
        gap: 10px;
    }

    button {
        background-color: #007bff;
        color: white;
        padding: 10px 22px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #0056b3;
    }

    .cancel-btn {
        text-decoration: none;
        padding: 10px 22px;
        background-color: #ccc;
        color: #333;
        border-radius: 6px;
        transition: background-color 0.3s ease;
    }

    .cancel-btn:hover {
        background-color: #aaa;
    }

    .alert {
        padding: 12px 16px;
        border-radius: 6px;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .alert.error {
        background-color: #f8d7da;
        color: #721c24;
    }

    .alert.success {
        background-color: #d4edda;
        color: #155724;
    }
</style>

<div class="form-container">
    <h1>Modifier une Catégorie</h1>

    @if ($errors->any())
        <div class="alert error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($message = Session::get('succes'))
        <div class="alert success">
            {{ $message }}
        </div>
    @endif

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nom</label>
        <input type="text" id="name" name="name" placeholder="Nom..." value="{{ old('name', $category->name) }}">

        <label for="description">Description</label>
        <textarea id="description" name="description" rows="4">{{ old('description', $category->description) }}</textarea>

        <div class="btn-group">
            <button type="submit">Mettre à jour</button>
            <a href="{{ route('categories.index') }}" class="cancel-btn">Annuler</a>
        </div>
    </form>
</div>
@endsection
