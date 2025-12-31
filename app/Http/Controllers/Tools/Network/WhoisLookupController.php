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

        // Remove http://, https://, www. and trailing slashes
        $domain = preg_replace('/^https?:\/\/(www\.)?/', '', $domain);
        $domain = rtrim($domain, '/');

        try {
            // Use shell_exec to run whois command (works on Linux/Unix)
            // For Windows, you may need to install whois or use an API
            $whoisRaw = shell_exec("whois " . escapeshellarg($domain));

            if (empty($whoisRaw)) {
                // Fallback: Try using a simple web-based approach
                $whoisData = $this->parseBasicWhois($domain);
            } else {
                $whoisData = $this->parseWhoisData($whoisRaw, $domain);
            }

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

    private function parseWhoisData($whoisRaw, $domain)
    {
        $data = [
            'domain' => $domain,
            'raw' => $whoisRaw
        ];

        // Extract registrar
        if (preg_match('/Registrar:\s*(.+)/i', $whoisRaw, $matches)) {
            $data['registrar'] = trim($matches[1]);
        }

        // Extract creation date
        if (preg_match('/Creation Date:\s*(.+)/i', $whoisRaw, $matches)) {
            $data['registration_date'] = trim($matches[1]);
        } elseif (preg_match('/Created:\s*(.+)/i', $whoisRaw, $matches)) {
            $data['registration_date'] = trim($matches[1]);
        }

        // Extract expiration date
        if (preg_match('/Expir(?:y|ation) Date:\s*(.+)/i', $whoisRaw, $matches)) {
            $data['expiration_date'] = trim($matches[1]);
        }

        // Extract updated date
        if (preg_match('/Updated Date:\s*(.+)/i', $whoisRaw, $matches)) {
            $data['updated_date'] = trim($matches[1]);
        }

        // Extract name servers
        preg_match_all('/Name Server:\s*(.+)/i', $whoisRaw, $matches);
        if (!empty($matches[1])) {
            $data['name_servers'] = array_map('trim', $matches[1]);
        }

        // Extract status
        if (preg_match('/Status:\s*(.+)/i', $whoisRaw, $matches)) {
            $data['status'] = trim($matches[1]);
        }

        return $data;
    }

    private function parseBasicWhois($domain)
    {
        // Fallback when whois command is not available
        // Use DNS to get basic information
        $ip = gethostbyname($domain);

        return [
            'domain' => $domain,
            'ip_address' => $ip !== $domain ? $ip : 'Not found',
            'note' => 'WHOIS command not available. Showing basic DNS information only.',
            'raw' => 'WHOIS lookup requires the whois command to be installed on the server.'
        ];
    }
}
