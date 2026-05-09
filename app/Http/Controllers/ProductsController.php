<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Images;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function dashboard()
    {
        return Products::latest()->where('active', true)->get();
    }
}
