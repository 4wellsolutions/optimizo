<?php

namespace App\Http\Controllers\Tools\Network;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class DomainToIpController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'domain-to-ip')->firstOrFail();
        return view('tools.network.domain-to-ip', compact('tool'));
    }

    public function lookup(Request $request)
    {
        $request->validate([
            'domain' => 'required|string'
        ]);

        $domain = $request->domain;

        // Remove http://, https://, www. and trailing slashes
        $domain = preg_replace('/^https?:\/\/(www\.)?/', '', $domain);
        $domain = rtrim($domain, '/');

        try {
            // Use gethostbyname to resolve domain to IP
            $ip = gethostbyname($domain);

            // gethostbyname returns the domain itself if resolution fails
            if ($ip === $domain) {
                return response()->json([
                    'success' => false,
                    'error' => 'Could not resolve domain to IP address. Please check the domain name.'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => [
                    'domain' => $domain,
                    'ip' => $ip
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to lookup domain: ' . $e->getMessage()
            ], 500);
        }
    }
}
