<?php

namespace App\Http\Controllers\Tools\Network;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class IpLookupController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'ip-lookup')->firstOrFail();
        return view('tools.network.ip-lookup', compact('tool'));
    }

    public function lookup(Request $request)
    {
        $request->validate([
            'ip_address' => 'required|ip'
        ]);

        $ip = $request->ip_address;

        try {
            // Get IP details (in production, use a geolocation API)
            $details = [
                'ip' => $ip,
                'type' => filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) ? 'IPv4' : 'IPv6',
                'hostname' => gethostbyaddr($ip),
                'isp' => 'Example ISP',
                'country' => 'United States',
                'region' => 'California',
                'city' => 'San Francisco',
                'latitude' => '37.7749',
                'longitude' => '-122.4194',
                'timezone' => 'America/Los_Angeles'
            ];

            return response()->json([
                'success' => true,
                'data' => $details
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to lookup IP: ' . $e->getMessage()
            ], 500);
        }
    }
}
