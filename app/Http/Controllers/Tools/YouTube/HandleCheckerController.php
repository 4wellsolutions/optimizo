<?php

namespace App\Http\Controllers\Tools\YouTube;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class HandleCheckerController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'youtube-handle-checker')->firstOrFail();
        return view('tools.youtube.handle-checker', compact('tool'));
    }

    public function check(Request $request)
    {
        $request->validate([
            'handle' => 'required|string|max:30'
        ]);

        $handle = $request->handle;

        // Remove @ symbol if present
        $handle = ltrim($handle, '@');

        // Basic validation for YouTube handle format
        if (!preg_match('/^[a-zA-Z0-9_.-]+$/', $handle)) {
            return response()->json([
                'success' => false,
                'error' => 'Invalid handle format. Only letters, numbers, dots, hyphens, and underscores are allowed.'
            ], 400);
        }

        try {
            // Note: This is a simplified check. In production, you would use YouTube Data API
            // For now, we'll return a simulated response
            $isAvailable = (bool) random_int(0, 1);

            return response()->json([
                'success' => true,
                'data' => [
                    'handle' => '@' . $handle,
                    'available' => $isAvailable,
                    'url' => $isAvailable ? '' : 'https://www.youtube.com/@' . $handle,
                    'message' => $isAvailable
                        ? "The handle @{$handle} appears to be available!"
                        : "The handle @{$handle} is already taken."
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to check handle availability. Please try again.'
            ], 500);
        }
    }
}
