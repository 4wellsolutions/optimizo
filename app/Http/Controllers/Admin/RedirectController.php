<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Redirect;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function index()
    {
        $redirects = Redirect::latest()->paginate(20);
        return view('admin.redirects.index', compact('redirects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'from_url' => 'required|string',
            'to_url' => 'required|url',
            'type' => 'required|in:301,302',
            'status' => 'boolean',
        ]);

        $redirect = Redirect::create($validated);

        return response()->json([
            'success' => true,
            'redirect' => $redirect,
            'message' => 'Redirect created successfully!'
        ]);
    }

    public function update(Request $request, Redirect $redirect)
    {
        $validated = $request->validate([
            'from_url' => 'required|string',
            'to_url' => 'required|url',
            'type' => 'required|in:301,302',
            'status' => 'boolean',
        ]);

        $redirect->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Redirect updated successfully!'
        ]);
    }

    public function destroy(Redirect $redirect)
    {
        $redirect->delete();

        return response()->json([
            'success' => true,
            'message' => 'Redirect deleted successfully!'
        ]);
    }
}
