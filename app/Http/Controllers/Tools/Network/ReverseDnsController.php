<?php

namespace App\Http\Controllers\Tools\Network;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class ReverseDnsController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'reverse-dns')->firstOrFail();
        return view('tools.network.reverse-dns', compact('tool'));
    }

    public function lookup(Request $request)
    {
        $request->validate([
            'ip_address' => 'required|ip'
        ]);

        $ip = $request->ip_address;

        try {
            $hostname = gethostbyaddr($ip);

            if ($hostname === $ip) {
                // No reverse DNS record found
                $found = false;
                $message = "No reverse DNS record found for $ip";
            } else {
                $found = true;
                $message = "Reverse DNS lookup successful";
            }

            return response()->json([
                'success' => true,
                'data' => [
                    'ip' => $ip,
                    'hostname' => $hostname,
                    'found' => $found,
                    'message' => $message
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to perform reverse DNS lookup: ' . $e->getMessage()
            ], 500);
        }
    }
}
