<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductsPayware;
use Illuminate\Support\Facades\Storage;

class ProductsPaywareController extends Controller
{
    public function index()
    {
        $products = ProductsPayware::all();

        return view('payware', [
            'products' => $products
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'active' => 'boolean'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('image-products', 'public');
        }

        ProductsPayware::create([
            'name' => $request->name,
            'image' => $imagePath,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'active' => $request->active ?? 1
        ]);

        return redirect()->route('admin.payware.index')->with('success', 'Product created successfully!');
    }
}
