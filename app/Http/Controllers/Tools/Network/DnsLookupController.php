<?php

namespace App\Http\Controllers\Tools\Network;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class DnsLookupController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'dns-lookup')->firstOrFail();
        return view("tools.network.dns-lookup", compact('tool'));
    }

    public function lookup(Request $request)
    {
        $request->validate([
            'domain' => 'required|string'
        ]);

        $domain = $request->domain;

        try {
            $records = [
                'A' => dns_get_record($domain, DNS_A),
                'AAAA' => dns_get_record($domain, DNS_AAAA),
                'MX' => dns_get_record($domain, DNS_MX),
                'NS' => dns_get_record($domain, DNS_NS),
                'TXT' => dns_get_record($domain, DNS_TXT),
                'CNAME' => dns_get_record($domain, DNS_CNAME),
            ];

            return response()->json([
                'success' => true,
                'data' => [
                    'domain' => $domain,
                    'records' => $records
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to lookup DNS: ' . $e->getMessage()
            ], 500);
        }
    }
}
