<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products_freeware; 

class produtcs_freeware extends Controller
{
    public function index()
    {
        $products_freeware = products_freeware::all();

        return view('freeware', [
            'products' => $products_freeware
        ]);
}
}
