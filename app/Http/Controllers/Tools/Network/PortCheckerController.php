<?php

namespace App\Http\Controllers\Tools\Network;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class PortCheckerController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'port-checker')->firstOrFail();
        return view("tools.network.port-checker", compact('tool'));
    }

    public function check(Request $request)
    {
        $request->validate([
            'host' => 'required|string',
            'port' => 'required|integer|min:1|max:65535'
        ]);

        $host = $request->host;
        $port = $request->port;

        try {
            // Test port connectivity
            $connection = @fsockopen($host, $port, $errno, $errstr, 5);

            if ($connection) {
                fclose($connection);
                $status = 'open';
                $message = "Port $port is open on $host";
            } else {
                $status = 'closed';
                $message = "Port $port is closed or filtered on $host";
            }

            return response()->json([
                'success' => true,
                'data' => [
                    'host' => $host,
                    'port' => $port,
                    'status' => $status,
                    'message' => $message
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to check port: ' . $e->getMessage()
            ], 500);
        }
    }
}
