<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcements;
use Illuminate\Auth\RequestGuard;
use Symfony\Component\HttpFoundation\RequestStack;

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

    public function edit(Announcements $announcement)
    {
        return view('admin.announcements.edit', [
            'announcement' => $announcement
        ]);
    }

    public function update(Request $request, Announcements $announcement)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg',
            'active' => 'boolean'
        ]);

        // Handle image replacement
        if ($request->hasFile('image')) {
            // Hapus file lama jika ada
            if ($announcement->image && file_exists(storage_path('app/public/' . $announcement->image))) {
                unlink(storage_path('app/public/' . $announcement->image));
            }

            $file = $request->file('image')->store('Announcements', 'public');
            $announcement->image = $file;
        }

        // Update active status
        $announcement->active = $request->active ?? 0;
        $announcement->save();

        return redirect()->route('admin.announcements.index')->with('success', 'Announcement updated successfully!');
    }

    public function destroy(Announcements $announcement)
    {
        if (file_exists(storage_path('app/public/' . $announcement->image))) {
            unlink(storage_path('app/public/' . $announcement->image));
        }
        $announcement->delete();

        return redirect()->route('admin.announcements.index')->with('success', 'Announcement deleted successfully!');
    }
}
