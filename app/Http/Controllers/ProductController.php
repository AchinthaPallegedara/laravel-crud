<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function main(){
        $products = Product::all();
        return view('welcome', ['products' => $products]);
    }
    public function index()
    {
        $products = Product::all();
        return view('product.index',['products' => $products]);
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|decimal:0,2|min:0',
            'stock' => 'required|integer|min:0'
        ]);
        Product::create($data);
        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return view('product.edit', ['product' => $product]);
    }

    public function update(Request $request, Product $product)
    {
         $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|decimal:0,2|min:0',
            'stock' => 'required|integer|min:0'
        ]);
        $product->update($data);
        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
}
