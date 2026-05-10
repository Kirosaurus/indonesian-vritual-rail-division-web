<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;

class AdminCategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();

        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'newCategory' => 'string'
        ]);

        $category = Categories::create([
            'name' => $request->newCategory
        ]);

        return response()->json([
            'id' => $category->id,
            'name' => $category->name,
        ]);
    }

    public function edit(Categories $category)
    {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    public function destroy(Categories $category)
    {
        $categoryConnected = Products::where('category_id', $category->id)->count();

        if ($categoryConnected > 0) {
            return redirect()->back()->with(
                'error',
                'Kategori tidak bisa dihapus karena masih terhubung dengan ' . $categoryConnected . ' produk'
            );
        }
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
