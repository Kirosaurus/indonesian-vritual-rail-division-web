<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function getCategories(){
        $categories = Categories::all();

        return view('dashboard_admin_payware_create', [
            'categories' => $categories
        ]);
    }
}
