<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcements;

class AdminAnnouncementsController extends Controller
{
    public function index()
    {
        $announcements = Announcements::all();

        return view('admin.announcements.index', [
            'announcements' => $announcements
        ]);
    }

    public function create()
    {
        return view('admin.announcements.create');
    }
}
