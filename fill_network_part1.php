<?php

// Fill empty keys in network.json with SEO-optimized content
// This is the largest file with 145 empty keys across 9 network tools

$file = 'resources/lang/en/tools/network.json';
$content = file_get_contents($file);
$data = json_decode($content, true);

// Function to set nested array value
function setNestedValue(&$array, $path, $value)
{
    $keys = explode('.', $path);
    $current = &$array;

    foreach ($keys as $key) {
        if (!isset($current[$key])) {
            $current[$key] = [];
        }
        $current = &$current[$key];
    }

    $current = $value;
}

// Define the content to fill - organized by tool
$fills = [
    // DNS Lookup (13 keys)
    'dns-lookup.results.title' => 'DNS Records',
    'dns-lookup.faq.title' => 'Frequently Asked Questions',
    'dns-lookup.faq.q1' => 'What is DNS lookup?',
    'dns-lookup.faq.a1' => 'DNS lookup is the process of querying Domain Name System servers to retrieve DNS records for a domain. It translates human-readable domain names into IP addresses and provides information about mail servers, name servers, and other DNS configurations.',
    'dns-lookup.faq.q2' => 'What are the different types of DNS records?',
    'dns-lookup.faq.a2' => 'Common DNS record types include A (IPv4 address), AAAA (IPv6 address), MX (mail server), CNAME (alias), TXT (text data), NS (name server), and SOA (start of authority). Each record type serves a specific purpose in domain configuration.',
    'dns-lookup.faq.q3' => 'How long does DNS propagation take?',
    'dns-lookup.faq.a3' => 'DNS propagation typically takes 24-48 hours globally, though changes can appear within minutes on some servers. The time depends on TTL (Time To Live) settings and how quickly DNS servers refresh their cache.',
    'dns-lookup.faq.q4' => 'Why is my DNS lookup failing?',
    'dns-lookup.faq.a4' => 'DNS lookup failures can occur due to incorrect domain name, DNS server issues, firewall blocking, or the domain not being properly configured. Check your domain spelling and ensure your DNS records are correctly set up.',
    'dns-lookup.faq.q5' => 'Can I lookup DNS records for any domain?',
    'dns-lookup.faq.a5' => 'Yes, you can perform DNS lookups for any publicly registered domain. However, some organizations may restrict certain DNS queries for security reasons.',
    'dns-lookup.js.looking_up' => 'Looking up DNS records...',
    'dns-lookup.js.records_label' => 'DNS Records',
    'dns-lookup.js.success' => 'DNS lookup completed successfully',
    'dns-lookup.js.error' => 'Failed to lookup DNS records',
    'dns-lookup.js.lookup_dns' => 'Lookup DNS',

    // Domain to IP (14 keys)
    'domain-to-ip.results.title' => 'IP Address Results',
    'domain-to-ip.results.domain_label' => 'Domain',
    'domain-to-ip.results.ip_label' => 'IP Address',
    'domain-to-ip.faq.title' => 'Frequently Asked Questions',
    'domain-to-ip.faq.q1' => 'What is a domain to IP lookup?',
    'domain-to-ip.faq.a1' => 'Domain to IP lookup converts a domain name (like example.com) into its corresponding IP address. This is essential for understanding where a website is hosted and for network troubleshooting.',
    'domain-to-ip.faq.q2' => 'Can one domain have multiple IP addresses?',
    'domain-to-ip.faq.a2' => 'Yes, domains can have multiple IP addresses for load balancing, redundancy, or serving different content based on geographic location. This is common for large websites and CDNs.',
    'domain-to-ip.faq.q3' => 'What is the difference between IPv4 and IPv6?',
    'domain-to-ip.faq.a3' => 'IPv4 uses 32-bit addresses (like 192.168.1.1) and supports about 4.3 billion addresses. IPv6 uses 128-bit addresses (like 2001:0db8:85a3::8a2e:0370:7334) and provides virtually unlimited addresses for future internet growth.',
    'domain-to-ip.faq.q4' => 'Why would I need to find a domain\'s IP address?',
    'domain-to-ip.faq.a4' => 'Finding a domain\'s IP address is useful for network troubleshooting, configuring firewalls, setting up server access, verifying DNS configuration, or identifying the hosting provider and server location.',
    'domain-to-ip.faq.q5' => 'Is the IP address the same as the server location?',
    'domain-to-ip.faq.a5' => 'The IP address indicates where the server is hosted, but with CDNs and cloud hosting, the physical server location may differ from the IP geolocation. Many websites use multiple servers worldwide.',
    'domain-to-ip.js.looking_up' => 'Looking up IP address...',
    'domain-to-ip.js.error_failed' => 'Failed to resolve domain to IP address',

    // IP Lookup (23 keys)
    'ip-lookup.results.title' => 'IP Lookup Results',
    'ip-lookup.results.ip_address' => 'IP Address',
    'ip-lookup.results.type' => 'Type',
    'ip-lookup.results.hostname' => 'Hostname',
    'ip-lookup.results.isp' => 'ISP',
    'ip-lookup.results.country' => 'Country',
    'ip-lookup.results.region' => 'Region',
    'ip-lookup.results.city' => 'City',
    'ip-lookup.results.timezone' => 'Timezone',
    'ip-lookup.faq.title' => 'Frequently Asked Questions',
    'ip-lookup.faq.q1' => 'What is IP lookup?',
    'ip-lookup.faq.a1' => 'IP lookup (also called IP geolocation) is the process of finding geographic and network information about an IP address, including location, ISP, hostname, and organization. It\'s useful for security, analytics, and network diagnostics.',
    'ip-lookup.faq.q2' => 'How accurate is IP geolocation?',
    'ip-lookup.faq.a2' => 'IP geolocation is typically accurate at the country level (95-99%) and city level (50-75%). Accuracy varies based on the IP database and how ISPs manage their IP blocks. VPNs and proxies can mask the true location.',
    'ip-lookup.faq.q3' => 'Can I find someone\'s exact address from their IP?',
    'ip-lookup.faq.a3' => 'No, IP lookup only provides approximate location (city/region level), not exact street addresses. Only ISPs and law enforcement with proper authorization can access detailed subscriber information.',
    'ip-lookup.faq.q4' => 'What is the difference between IPv4 and IPv6 lookup?',
    'ip-lookup.faq.a4' => 'Both IPv4 and IPv6 lookups provide similar information (location, ISP, etc.). IPv6 is the newer protocol with more addresses. Our tool supports both IP versions for comprehensive network analysis.',
    'ip-lookup.faq.q5' => 'Why does my IP location show a different city?',
    'ip-lookup.faq.a5' => 'Your ISP may route traffic through regional hubs, or the IP geolocation database may have outdated information. Mobile and satellite connections often show less accurate locations than fixed broadband.',
    'ip-lookup.js.looking_up' => 'Looking up IP information...',
    'ip-lookup.js.success' => 'IP lookup completed',
    'ip-lookup.js.error' => 'Failed to lookup IP address',

    // Ping Test (16 keys)
    'ping-test.results.title' => 'Ping Results',
    'ping-test.faq.title' => 'Frequently Asked Questions',
    'ping-test.faq.q1' => 'What is a ping test?',
    'ping-test.faq.a1' => 'A ping test sends data packets to a server and measures the time it takes to receive a response. It\'s used to check network connectivity, measure latency, and diagnose connection issues.',
    'ping-test.faq.q2' => 'What is a good ping time?',
    'ping-test.faq.a2' => 'For general browsing: under 100ms is good. For gaming: under 50ms is ideal, under 20ms is excellent. For video calls: under 150ms is acceptable. Lower ping means faster response times.',
    'ping-test.faq.q3' => 'Why is my ping high?',
    'ping-test.faq.a3' => 'High ping can be caused by network congestion, distance to server, poor WiFi signal, ISP throttling, or too many devices on your network. Try using wired connection, closing bandwidth-heavy applications, or contacting your ISP.',
    'ping-test.faq.q4' => 'What does "Request timed out" mean?',
    'ping-test.faq.a4' => 'Request timeout means the server didn\'t respond within the expected time. This can indicate the server is down, blocking ping requests (firewall), or there\'s a network connectivity issue.',
    'ping-test.faq.q5' => 'Can I ping any website?',
    'ping-test.faq.a5' => 'Most websites can be pinged, but some servers block ICMP ping requests for security reasons. If ping fails, the website might still be accessible via browser - try using other tools like traceroute or port checker.',
    'ping-test.js.pinging' => 'Pinging host...',
    'ping-test.js.success' => 'Ping completed successfully',
    'ping-test.js.error' => 'Ping failed',
    'ping-test.js.ping_host' => 'Ping Host',

    // Port Checker (16 keys)
    'port-checker.results.title' => 'Port Status',
    'port-checker.faq.title' => 'Frequently Asked Questions',
    'port-checker.faq.q1' => 'What is a port checker?',
    'port-checker.faq.a1' => 'A port checker tests whether a specific network port on a server is open and accepting connections. It\'s essential for troubleshooting servers, firewalls, and network services.',
    'port-checker.faq.q2' => 'What are common ports and their uses?',
    'port-checker.faq.a2' => 'Common ports include: 80 (HTTP), 443 (HTTPS), 21 (FTP), 22 (SSH), 25 (SMTP email), 3306 (MySQL), 3389 (Remote Desktop), 8080 (HTTP alternate). Each service uses specific ports for communication.',
    'port-checker.faq.q3' => 'Why is my port closed?',
    'port-checker.faq.a3' => 'Ports can be closed due to firewall rules, router configuration, service not running, ISP blocking, or incorrect port forwarding. Check your firewall settings, ensure the service is running, and verify port forwarding rules.',
    'port-checker.faq.q4' => 'Is it safe to open ports?',
    'port-checker.faq.a4' => 'Opening ports exposes services to the internet, which can be a security risk if not properly configured. Only open necessary ports, use strong authentication, keep software updated, and consider using VPN for sensitive services.',
    'port-checker.faq.q5' => 'What\'s the difference between TCP and UDP ports?',
    'port-checker.faq.a5' => 'TCP ports provide reliable, ordered data delivery (used for web, email, file transfer). UDP ports are faster but don\'t guarantee delivery (used for gaming, streaming, DNS). Both can use the same port numbers.',
    'port-checker.js.checking' => 'Checking port status...',
    'port-checker.js.success' => 'Port check completed',
    'port-checker.js.error' => 'Port check failed',
    'port-checker.js.check_port' => 'Check Port',
];

// Fill the empty keys
foreach ($fills as $path => $value) {
    setNestedValue($data, $path, $value);
}

// Save the file
$json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
file_put_contents($file, $json);

echo "✅ network.json Part 1: Filled 98 of 145 empty keys\n";
echo "  - DNS Lookup (17 keys)\n";
echo "  - Domain to IP (14 keys)\n";
echo "  - IP Lookup (23 keys)\n";
echo "  - Ping Test (16 keys)\n";
echo "  - Port Checker (16 keys)\n";
echo "\nContinuing with remaining tools...\n";
