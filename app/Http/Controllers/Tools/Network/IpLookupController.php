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
        return view("tools.network.ip-lookup", compact('tool'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'ip_address' => 'required|ip'
        ]);

        $ip = $request->ip_address;

        try {
            // Use ipapi.co free API for IP geolocation
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://ipapi.co/{$ip}/json/");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36');
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);

            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($httpCode !== 200 || !$response) {
                return response()->json([
                    'success' => false,
                    'error' => 'Failed to fetch IP information. Please try again.'
                ], 400);
            }

            $data = json_decode($response, true);

            if (isset($data['error']) && $data['error']) {
                return response()->json([
                    'success' => false,
                    'error' => 'Invalid IP address or API error.'
                ], 400);
            }

            // Format the response
            $details = [
                'ip' => $data['ip'] ?? $ip,
                'type' => $data['version'] ?? (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) ? 'IPv4' : 'IPv6'),
                'hostname' => gethostbyaddr($ip),
                'isp' => $data['org'] ?? 'Unknown',
                'country' => $data['country_name'] ?? 'Unknown',
                'country_code' => $data['country'] ?? '',
                'region' => $data['region'] ?? 'Unknown',
                'city' => $data['city'] ?? 'Unknown',
                'postal' => $data['postal'] ?? '',
                'latitude' => $data['latitude'] ?? '',
                'longitude' => $data['longitude'] ?? '',
                'timezone' => $data['timezone'] ?? 'Unknown',
                'asn' => $data['asn'] ?? '',
                'network' => $data['network'] ?? ''
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
