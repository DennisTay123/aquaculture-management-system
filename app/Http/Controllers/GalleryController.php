<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('gallery.index', compact('galleries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'media.*' => 'required|mimes:jpeg,png,gif,webp,jpg,jfif,mp4,avi,mov|max:20480', // Max 20MB per file
        ]);

        try {
            $files = $request->file('media');

            foreach ($files as $file) {
                $mediaType = $file->getClientMimeType();

                // Upload to Cloudinary
                $uploadResult = Cloudinary::uploadFile($file->getRealPath(), [
                    'resource_type' => strpos($mediaType, 'video') !== false ? 'video' : 'image',
                    'folder' => 'gallery'
                ]);

                // Save to database
                Gallery::create([
                    'public_id' => $uploadResult->getPublicId(),
                    'url' => $uploadResult->getSecurePath(),
                    'media_type' => strpos($mediaType, 'video') !== false ? 'video' : 'image'
                ]);
            }

            return redirect()->route('gallery.index')->with('success', 'Files uploaded successfully.');
        } catch (\Exception $e) {
            return redirect()->route('gallery.index')->with('error', 'Failed to upload files. ' . $e->getMessage());
        }
    }

    public function multiDelete(Request $request)
    {
        $request->validate([
            'selected' => 'required|array',
            'selected.*' => 'exists:galleries,id',
        ]);

        $selected = $request->input('selected');

        foreach ($selected as $id) {
            $gallery = Gallery::findOrFail($id);

            Cloudinary::destroy($gallery->public_id, [
                'resource_type' => $gallery->media_type === 'video' ? 'video' : 'image',
            ]);

            $gallery->delete();
        }

        return redirect()->route('gallery.index')->with('success', 'Selected media deleted successfully.');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        Cloudinary::destroy($gallery->public_id, [
            'resource_type' => $gallery->media_type === 'video' ? 'video' : 'image',
        ]);

        $gallery->delete();

        return redirect()->route('gallery.index')->with('success', 'Media deleted successfully.');
    }

    private function getMediaType($mimeType)
    {
        if (str_contains($mimeType, 'video')) {
            return 'video';
        } elseif (str_contains($mimeType, 'image')) {
            return 'image';
        } else {
            return 'unknown';
        }
    }
}
