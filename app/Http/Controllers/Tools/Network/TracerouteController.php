<?php

namespace App\Http\Controllers\Tools\Network;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class TracerouteController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'traceroute')->firstOrFail();
        return view("tools.network.traceroute", compact('tool'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'host' => 'required|string'
        ]);

        $host = $request->host;

        try {
            // Simulated traceroute results
            $hops = [
                ['hop' => 1, 'ip' => '192.168.1.1', 'hostname' => 'router.local', 'time' => 1.2],
                ['hop' => 2, 'ip' => '10.0.0.1', 'hostname' => 'isp-gateway', 'time' => 5.4],
                ['hop' => 3, 'ip' => '172.16.0.1', 'hostname' => 'backbone.net', 'time' => 12.8],
                ['hop' => 4, 'ip' => '8.8.8.8', 'hostname' => $host, 'time' => 18.5],
            ];

            return response()->json([
                'success' => true,
                'data' => [
                    'host' => $host,
                    'hops' => $hops,
                    'total_hops' => count($hops)
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to trace route: ' . $e->getMessage()
            ], 500);
        }
    }
}
