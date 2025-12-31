<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NetworkController extends Controller
{
    // What Is My IP
    public function whatIsMyIP()
    {
        return view('tools.network.what-is-my-ip');
    }

    // What Is My ISP
    public function whatIsMyISP()
    {
        return view('tools.network.what-is-my-isp');
    }

    // Domain to IP
    public function domainToIP()
    {
        return view('tools.network.domain-to-ip');
    }

    public function lookupDomain(Request $request)
    {
        $request->validate([
            'domain' => 'required|string'
        ]);

        $domain = $request->domain;

        // Remove protocol if present
        $domain = preg_replace('/^https?:\/\//', '', $domain);
        // Remove path if present
        $domain = parse_url('http://' . $domain, PHP_URL_HOST) ?: $domain;

        try {
            $ip = gethostbyname($domain);

            // Check if DNS lookup was successful
            if ($ip === $domain) {
                if ($request->ajax() || $request->wantsJson()) {
                    return response()->json([
                        'success' => false,
                        'error' => 'Could not resolve domain name. Please check the domain and try again.'
                    ], 400);
                }
                return back()->with('error', 'Could not resolve domain');
            }

            $data = [
                'domain' => $domain,
                'ip' => $ip
            ];

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['success' => true, 'data' => $data]);
            }

            return view('tools.network.domain-to-ip', compact('data'));
        } catch (\Exception $e) {
            $error = 'Failed to lookup domain';
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['success' => false, 'error' => $error], 500);
            }
            return back()->with('error', $error);
        }
    }
}
