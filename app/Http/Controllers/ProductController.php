<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /** Display a listing of the products. */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(10);
        return view('products.index', compact('products'));
    }

    /** Show the form for creating a new product. */
    public function create()
    {
        $product = new Product();
        return view('products.create', compact('product'));
    }

    /** Store a newly created product in storage. */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /** Display the specified product. */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /** Show the form for editing the specified product. */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /** Update the specified product in storage. */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /** Remove the specified product from storage. */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted.');
    }
}
