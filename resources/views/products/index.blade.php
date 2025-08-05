@extends('layout.base')

@section('content')
<style>
    /* ... (Votre CSS existant) ... */

    /* Styles pour la liste des produits */
    .product-list {
        max-width: 800px; /* Augmenté pour un meilleur affichage */
        margin: 50px auto;
        padding: 0;
    }

    .product-item {
        background: #fff;
        padding: 20px 40px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        margin-bottom: 20px;
    }

    .product-details {
        margin-bottom: 15px;
        line-height: 1.6;
    }

    /* Conteneur pour les boutons d'action */
    .actions-group {
        display: flex; /* Active Flexbox */
        flex-direction: row; /* Aligne les éléments horizontalement (par défaut) */
        gap: 10px; /* Ajoute un espacement de 10px entre les boutons */
        align-items: center; /* Aligne les éléments verticalement au centre */
        margin-top: 15px;
    }
    
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

    /* Style pour le bouton "Créer un produit" en haut de page */
    .btn-create {
        display: inline-block;
        background-color: #28a745;
        color: white;
        padding: 10px 22px;
        border-radius: 6px;
        text-decoration: none;
        margin-bottom: 20px;
        transition: background-color 0.3s ease;
    }
    .btn-create:hover {
        background-color: #218838;
    }

    /* Supprime les hr et les balises <p> inutiles */
    hr {
        display: none;
    }
</style>

    <div class="product-list">
        <h1>Liste des Produits</h1>
        <a href="{{ route('products.create') }}" class="btn-create">Créer un Produit</a>

        @if (session('success'))
            <div class="alert success">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @forelse ($products as $product)
            <div class="product-item">
                <div class="product-details">
                    <b>Name : </b> {{ $product->name }} <br />
                    <b>Description : </b> {{ $product->description ?: 'Non rempli.' }}
                </div>
                
                <div class="actions-group">
                    <a href="{{ route('products.show', $product->id) }}" class="btn-details">Détails</a>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn-edit">Modifier</a>
                    
                    <form action="{{ route('products.destroy', $product->id) }}" method="post" onsubmit="return confirm('Êtes-vous sûr(e) de vouloir supprimer ce produit ? Cette action sera irréversible !')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Supprimer</button>
                    </form>
                </div>
            </div>
        @empty
            <p>Aucun produit n'a été trouvé.</p>
        @endforelse
    </div>
@endsection