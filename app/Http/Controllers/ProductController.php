<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProductControlleur extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create', [
            'categories' => Category::all()      
          ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products|max:255', 
            // 'description' => 'nullable|string',
        ]);

        Product::create([
            'user_id'=> Auth::id(),
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('products.index')->with('success', "Produit ajouté avec succès.");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $product = Product::findOrFail($id);
        // return view('products.show', compact('product'));

        $product = Product::find($id);
        return view('products.show', [
            'product'=> $product,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('products.edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            // 'description' => 'nullable|string',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('products.index')->with('success', "Produit mis à jour avec succès.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', "Produit supprimé avec succès.");
    }
}