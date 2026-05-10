<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Images;


class ImagesController extends Controller
{
    public function destroy(Images $image){
        // Hapus file dari storage jika ada
        if (file_exists(storage_path('app/public/' . $image->path))) {
            unlink(storage_path('app/public/' . $image->path));
        }
        
        // Hapus record dari database
        $image->delete();
        
        return response()->json(['success' => true, 'message' => 'Image deleted successfully']);
    }
}
