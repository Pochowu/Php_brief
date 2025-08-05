<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all(); // Or however you retrieve your products
        return view('products.index', ['products' => $products]);
    }


    /**
     * Show the form for creating a new resource.
     */
     // Assure-toi d'importer le modèle

    public function create()
    {
        $categories = Category::all(); // Récupère toutes les catégories depuis la BDD
        return view('products.create', compact('categories')); // Envoie à la vue
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id, // Assuming you have a category_id
        ]);
        return redirect()->route('products.index')->with('success', "Produits ajoutée avec succès.");
    }

    /**
     * Display the specified resource.
     */
        public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', [
            'product' => $product, // ✅ Utilise le bon nom
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    

        public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Product::find($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id, // Assuming you have a category_id
        ]);
        return back()->with('success', "Produit ajoutée avec succès.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::find($id)->delete();
        return redirect()->route('products.index')->with('success', "Produit supprimée avec succès.");
    }
}
