<?php

namespace App\Http\Controllers\Tools\Youtube;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class YoutubeHandleCheckerController extends Controller
{
    public function index()
    {
        $tool = Tool::with(['categoryRelation'])->where('slug', 'youtube-handle-checker')->active()->firstOrFail();
        return view('tools.youtube.youtube-handle-checker', compact('tool'));
    }

    public function check(Request $request)
    {
        $request->validate([
            'handle' => 'required|string|min:3|max:30'
        ]);

        $handle = $request->handle;

        // Remove @ if present
        $handle = ltrim($handle, '@');

        // Validate handle format (alphanumeric, dots, underscores)
        if (!preg_match('/^[a-zA-Z0-9._]+$/', $handle)) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'error' => 'Invalid handle format. Use only letters, numbers, dots, and underscores.'
                ], 400);
            }
            return back()->with('error', 'Invalid handle format');
        }

        try {
            // Check if handle exists by trying to access the channel page
            $response = \Illuminate\Support\Facades\Http::withHeaders([
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'
            ])->get("https://www.youtube.com/@{$handle}");

            $statusCode = $response->status();
            $isAvailable = $statusCode === 404;

            $data = [
                'handle' => '@' . $handle,
                'available' => $isAvailable,
                'status' => $isAvailable ? 'Available' : 'Taken',
                'message' => $isAvailable
                    ? "Great news! @{$handle} is available!"
                    : "Sorry, @{$handle} is already taken.",
                'url' => "https://www.youtube.com/@{$handle}"
            ];

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['success' => true, 'data' => $data]);
            }

            return view('tools.youtube.youtube-handle-checker', compact('data'));
        } catch (\Exception $e) {
            $error = 'Failed to check handle availability';
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['success' => false, 'error' => $error], 500);
            }
            return back()->with('error', $error);
        }
    }
}
