<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcements;

class AdminAnnouncementsController extends Controller
{
    public function index()
    {
        $announcements = Announcements::paginate(3);

        return view('admin.announcements.index', [
            'announcements' => $announcements
        ]);
    }

    public function create()
    {
        return view('admin.announcements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'active' => 'boolean'
        ]);

        $file = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image')->store('Announcements', 'public');
            Announcements::create([
                'image' => $file
            ]);
        }

        return redirect()->route('admin.announcements.index')->with('success', 'Announcements created successfully!');
    }
}
