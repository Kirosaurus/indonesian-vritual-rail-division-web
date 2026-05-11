<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcements;
use App\Models\Products;

class DashboardController extends Controller
{
    public function index(){
        $announcements = Announcements::where('active', 1)->get();
        $products = Products::latest()->where('active', true)->get();

        return view('dashboard', [
            'announcements' => $announcements,
            'products' => $products
        ]);
    }
}
