<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $announcements = (new AnnouncementsController)->index();
        $products = (new  ProductsController)->dashboard();

        return view('dashboard', [
            'announcements' => $announcements,
            'products' => $products
        ]);
    }
}
