<?php

namespace App\Http\Controllers\Tools\Network;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class WhoisLookupController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'whois-lookup')->firstOrFail();
        return view('tools.network.whois-lookup', compact('tool'));
    }

    public function lookup(Request $request)
    {
        $request->validate([
            'domain' => 'required|string'
        ]);

        $domain = $request->domain;

        try {
            // In production, use WHOIS API or command-line tool
            $whoisData = [
                'domain' => $domain,
                'registrar' => 'Example Registrar Inc.',
                'registration_date' => '2020-01-15',
                'expiration_date' => '2025-01-15',
                'updated_date' => '2024-01-15',
                'status' => 'Active',
                'name_servers' => ['ns1.example.com', 'ns2.example.com'],
                'registrant' => 'Privacy Protected'
            ];

            return response()->json([
                'success' => true,
                'data' => $whoisData
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to lookup WHOIS: ' . $e->getMessage()
            ], 500);
        }
    }
}
