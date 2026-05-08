<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Images;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $viewName = $request->is('admin/payware') ? 'dashboard_admin_payware' : 'payware';
        if ($viewName == 'dashboard_admin_payware') {
            $products = Products::paginate(10);
        } else {
            $products = Products::all();
        }

        return view($viewName, [
            'products' => $products
        ]);
    }

    public function store(Request $request, string $type)
    {
        $type = $request->is('admin/payware') ? 'payware' : 'freeware';
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

        $product = Products::create([
            'name' => $request->name,
            'type' => $type,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category,
            'active' => $request->active ?? 1,
        ]);

        Images::create([
            'product_id' => $product->id,
            'path' => $imagePath,
        ]);

        return redirect()->route('admin.payware.index')->with('success', 'Product created successfully!');
    }
}
