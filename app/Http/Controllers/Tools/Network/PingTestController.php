<?php

namespace App\Http\Controllers\Tools\Network;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class PingTestController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'ping-test')->firstOrFail();
        return view("tools.network.ping-test", compact('tool'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'host' => 'required|string'
        ]);

        $host = $request->host;

        try {
            // Simulated ping results (in production, use actual ping command)
            $results = [
                'host' => $host,
                'packets_sent' => 4,
                'packets_received' => 4,
                'packet_loss' => 0,
                'min_time' => 12.5,
                'avg_time' => 15.3,
                'max_time' => 18.7,
                'status' => 'reachable'
            ];

            return response()->json([
                'success' => true,
                'data' => $results
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to ping host: ' . $e->getMessage()
            ], 500);
        }
    }
}
