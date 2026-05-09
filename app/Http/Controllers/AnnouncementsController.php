<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcements;

class AnnouncementsController extends Controller
{
    public function index()
    {
        return Announcements::where('active', true)->get();
    }
}
