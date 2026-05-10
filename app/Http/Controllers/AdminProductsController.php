<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Images;
use App\Models\Tags;

class AdminProductsController extends Controller
{
    public function index()
    {
        $products = Products::with('category')->paginate(9);
        $categories = Categories::pluck('name', 'id');

        return view('admin.products.index', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function  create()
    {
        $categories = Categories::all();

        return view('admin.products.create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|array',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif',
            'type' => 'string|in:payware,freeware',
            'description' => 'required|string',
            'price' => 'required_if:type,payware|numeric|min:0',
            'category' => 'required|exists:categories,id',
            'tags' => 'string|max:1000',
            'active' => 'boolean'
        ]);

        $product = Products::create([
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category,
            'active' => $request->active ?? 1,
        ]);

        $files = null;
        if ($request->hasFile('image')) {
            $files = $request->file('image', []);

            foreach ($files as $file) {
                $path = $file->store('image-products', 'public');

                Images::create([
                    'product_id' => $product->id,
                    'path' => $path,
                ]);
            }
        }

        if ($request->has('tags')) {
            $raw = $request->input('tags', '');
            $names = collect(preg_split('/[,\n]+/', $raw))
                ->map(fn($t) => trim($t))
                ->filter()
                ->unique();

            $tagIds = $names->map(fn($name) => Tags::firstOrCreate(['name' => $name])->id);
            $product->tags()->sync($tagIds->all());
        }
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
    }

    public function edit(Products $product)
    {
        $categories = Categories::all();

        return view('admin.products.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, Products $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|array',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif',
            'type' => 'string|in:payware,freeware',
            'description' => 'required|string',
            'price' => 'required_if:type,payware|numeric|min:0',
            'category' => 'required|exists:categories,id',
            'tags' => 'nullable|string|max:1000',
            'active' => 'boolean'
        ]);

        // Update product data
        $product->update([
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category,
            'active' => $request->active ?? 1,
        ]);

        // Handle image upload (tambah image baru)
        if ($request->hasFile('image')) {
            $files = $request->file('image', []);

            foreach ($files as $file) {
                $path = $file->store('image-products', 'public');

                Images::create([
                    'product_id' => $product->id,
                    'path' => $path,
                ]);
            }
        }

        // Handle delete image (jika ada request untuk hapus)
        if ($request->has('delete_images')) {
            $deleteImageIds = $request->input('delete_images', []);
            
            if (!empty($deleteImageIds)) {
                $imagesToDelete = Images::whereIn('id', $deleteImageIds)
                    ->where('product_id', $product->id)
                    ->get();

                foreach ($imagesToDelete as $image) {
                    // Hapus file dari storage
                    if (file_exists(storage_path('app/public/' . $image->path))) {
                        unlink(storage_path('app/public/' . $image->path));
                    }
                    $image->delete();
                }
            }
        }

        // Handle tags update
        if ($request->has('tags')) {
            $raw = $request->input('tags', '');
            $names = collect(preg_split('/[,\n]+/', $raw))
                ->map(fn($t) => trim($t))
                ->filter()
                ->unique();

            $tagIds = $names->map(fn($name) => Tags::firstOrCreate(['name' => $name])->id);
            $product->tags()->sync($tagIds->all());
        } else {
            // Jika tidak ada tags, hapus semua tags
            $product->tags()->sync([]);
        }

        // Hapus tags yang tidak digunakan
        $this->deleteUnusedTags();

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Products $product)
    {
        // Hapus semua images yang berhubungan
        $images = Images::where('product_id', $product->id)->get();
        
        foreach ($images as $image) {
            // Hapus file dari storage
            if (file_exists(storage_path('app/public/' . $image->path))) {
                unlink(storage_path('app/public/' . $image->path));
            }
            $image->delete();
        }

        // Hapus relasi tags (sync dengan array kosong)
        $product->tags()->sync([]);

        // Hapus product itu sendiri
        $product->delete();

        // Hapus tags yang tidak digunakan
        $this->deleteUnusedTags();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }

    /**
     * Menghapus tags yang tidak digunakan di tabel product_tags
     */
    private function deleteUnusedTags()
    {
        // Cari tags yang tidak memiliki relasi di product_tags
        $unusedTags = Tags::doesntHave('products')->get();

        foreach ($unusedTags as $tag) {
            $tag->delete();
        }
    }
}
