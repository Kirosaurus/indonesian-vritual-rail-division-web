<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsPaywareController extends Controller
{
    public function get(){
        $products = Products::where('type', 'payware')->get();

        return view('payware',[
            'products' => $products
        ]);
    }
}
