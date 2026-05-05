<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductsFreeware; 

class ProductsFreewareController extends Controller
{
    public function index()
    {
        $products_freeware = ProductsFreeware::all();

        return view('freeware', [
            'products' => $products_freeware
        ]);
}
}
