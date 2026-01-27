<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index()
    {
        $media = Media::latest()->paginate(24);
        return view('admin.media.index', compact('media'));
    }

    public function list()
    {
        $media = Media::latest()->paginate(24);
        return response()->json($media);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:5120', // 5MB max
        ]);

        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();

        // WordPress style path: year/month/day
        $datePath = date('Y/m/d');
        $directory = public_path('images/' . $datePath);

        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }

        $mimeType = $file->getMimeType();
        $size = $file->getSize();
        $originalName = $file->getClientOriginalName();

        $file->move($directory, $filename);
        $path = 'images/' . $datePath . '/' . $filename;

        $media = Media::create([
            'filename' => $filename,
            'original_name' => $originalName,
            'mime_type' => $mimeType,
            'size' => $size,
            'path' => $path,
            'url' => asset($path),
            'user_id' => auth()->id(),
        ]);

        return response()->json([
            'success' => true,
            'media' => $media,
            'message' => 'File uploaded successfully!'
        ]);
    }

    public function destroy(Media $media)
    {
        $fullPath = public_path($media->path);

        if (file_exists($fullPath)) {
            unlink($fullPath);
        }

        $media->delete();

        return response()->json([
            'success' => true,
            'message' => 'Media deleted successfully!'
        ]);
    }

    public function update(Request $request, Media $media)
    {
        $validated = $request->validate([
            'alt_text' => 'nullable|string|max:255',
            'caption' => 'nullable|string',
        ]);

        $media->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Media updated successfully!'
        ]);
    }
}
