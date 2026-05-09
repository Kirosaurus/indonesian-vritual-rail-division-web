<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Products; 

class ProductsFreewareController extends Controller
{
    public function index()
    {
        $products = Products::where('type', 'freeware')->get();

        return view('freeware', [
            'products' => $products
        ]);
    }
}
