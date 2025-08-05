@extends('layout.base')

@section('content')
<style>
    /* ... (Votre code CSS existant, inchangé) ... */

    .category-item {
        background: #fff;
        max-width: 600px;
        margin: 20px auto;
        padding: 20px 40px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    .category-item p {
        margin: 0;
        line-height: 1.6;
    }
    
    .actions-group {
        display: flex;
        /* Aligne les éléments sur une ligne */
        flex-direction: row; 
        /* Espace entre les boutons */
        gap: 10px; 
        /* Aligne les éléments verticalement au centre */
        align-items: center; 
        margin-top: 15px;
    }
    
    /* Styles pour les boutons d'action */
    .actions-group a,
    .actions-group button {
        padding: 8px 16px;
        border-radius: 6px;
        text-decoration: none;
        color: white;
        transition: background-color 0.3s ease;
        font-weight: 500;
        border: none;
        cursor: pointer;
    }

    .btn-details {
        background-color: #007bff;
    }
    
    .btn-details:hover {
        background-color: #0056b3;
    }

    .btn-edit {
        background-color: #ffc107;
        color: #333;
    }
    
    .btn-edit:hover {
        background-color: #e0a800;
    }

    .btn-delete {
        background-color: #dc3545;
    }
    
    .btn-delete:hover {
        background-color: #c82333;
    }
</style>

    <div class="form-container">
        <h1>Liste des catégories</h1>
        <a href="{{ route('categories.create') }}" class="btn-create">Créer une catégorie</a>

        @if (session('success'))
            <div class="alert success">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @foreach ($categories as $category)
            <div class="category-item">
                <p><b>Nom</b>: {{ $category->name }}</p>
                <p><b>Description</b>: {{ $category->description ?: 'Non rempli.' }}</p>
                
                <div class="actions-group">
                    <a href="{{ route('categories.show', $category->id) }}" class="btn-details">Détails</a>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn-edit">Modifier</a>
                    
                    <form action="{{ route('categories.destroy', $category->id) }}" method="post" onsubmit="return confirm('Êtes-vous sûr(e) de vouloir supprimer cette catégorie ? Cette action sera irréversible !')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Supprimer</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection