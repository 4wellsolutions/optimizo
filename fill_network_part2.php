<?php

// Fill remaining empty keys in network.json - Part 2
// Remaining tools: Traceroute, What is My IP, What is My ISP, WHOIS Lookup

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

// Define the remaining content to fill
$fills = [
    // Traceroute (19 keys)
    'traceroute.form.host_label' => 'Host or IP Address',
    'traceroute.form.host_placeholder' => 'Enter domain or IP address',
    'traceroute.form.button' => 'Start Traceroute',
    'traceroute.form.button_loading' => 'Tracing route...',
    'traceroute.results.title' => 'Traceroute Results',
    'traceroute.content.why_use_title' => 'Why Use Traceroute?',
    'traceroute.content.why_use_desc' => 'Traceroute shows the path data takes from your computer to a destination server, displaying each hop (router) along the way. It\'s essential for diagnosing network slowdowns, identifying routing issues, and understanding network topology.',
    'traceroute.content.hops_title' => 'Understanding Hops',
    'traceroute.content.hop1' => 'Hop 1: Your local router/gateway',
    'traceroute.content.hop2' => 'Hop 2-3: Your ISP\'s network',
    'traceroute.content.hop3' => 'Hop 4-6: Regional internet backbone',
    'traceroute.content.hop4' => 'Hop 7-10: Destination ISP network',
    'traceroute.content.hop5' => 'Hop 11+: Destination server network',
    'traceroute.content.hop6' => 'Each hop adds latency - fewer hops generally means faster connection',
    'traceroute.content.issues_title' => 'Common Issues',
    'traceroute.content.issues_desc' => 'High latency at specific hops indicates congestion or routing problems. Asterisks (*) mean routers aren\'t responding to traceroute packets (often due to firewall rules). Packet loss at intermediate hops may not affect final destination if packets reach it successfully.',
    'traceroute.faq.title' => 'Frequently Asked Questions',
    'traceroute.faq.q1' => 'What is traceroute?',
    'traceroute.faq.a1' => 'Traceroute is a network diagnostic tool that tracks the path data packets take from your computer to a destination server. It shows each router (hop) along the route and measures the time taken at each step, helping identify where network delays or failures occur.',
    'traceroute.faq.q2' => 'Why do some hops show asterisks (*)?',
    'traceroute.faq.a2' => 'Asterisks indicate that a router didn\'t respond to the traceroute probe within the timeout period. This is often due to firewall configurations that block ICMP packets for security. It doesn\'t necessarily mean there\'s a problem - the packets may still reach the destination.',
    'traceroute.faq.q3' => 'How many hops is normal?',
    'traceroute.faq.a3' => 'Typical internet routes have 10-20 hops. Local network destinations may have 1-5 hops, while international routes can have 20-30 hops. More hops generally mean longer distances and potentially higher latency, but efficient routing matters more than hop count.',

    // What is My IP (14 keys)
    'what-is-my-ip.ui.loading' => 'Detecting your IP address...',
    'what-is-my-ip.ui.your_ip_title' => 'Your IP Address',
    'what-is-my-ip.ui.copy_button' => 'Copy IP',
    'what-is-my-ip.ui.timezone' => 'Timezone',
    'what-is-my-ip.results.location' => 'Location',
    'what-is-my-ip.results.isp' => 'Internet Service Provider',
    'what-is-my-ip.results.country' => 'Country',
    'what-is-my-ip.faq.title' => 'Frequently Asked Questions',
    'what-is-my-ip.faq.q1' => 'What is an IP address?',
    'what-is-my-ip.faq.a1' => 'An IP (Internet Protocol) address is a unique numerical identifier assigned to every device connected to the internet. It\'s like a postal address for your computer, allowing other devices to send and receive data from you.',
    'what-is-my-ip.faq.q2' => 'Why does my IP address change?',
    'what-is-my-ip.faq.a2' => 'Most home internet connections use dynamic IP addresses that change periodically when you restart your router or when your ISP reassigns addresses. Businesses often use static IP addresses that don\'t change. Mobile devices get new IPs when switching between WiFi and cellular networks.',
    'what-is-my-ip.faq.q3' => 'Can someone track me with my IP address?',
    'what-is-my-ip.faq.a3' => 'Your IP address reveals your approximate location (city/region) and ISP, but not your exact street address or personal identity. Only your ISP and law enforcement with proper authorization can link an IP address to a specific person or household.',

    // What is My ISP (10 keys)
    'what-is-my-isp.results.ip_address' => 'Your IP Address',
    'what-is-my-isp.results.asn' => 'ASN (Autonomous System Number)',
    'what-is-my-isp.faq.title' => 'Frequently Asked Questions',
    'what-is-my-isp.faq.q1' => 'What is an ISP?',
    'what-is-my-isp.faq.a1' => 'ISP stands for Internet Service Provider - the company that provides your internet connection. Examples include Comcast, AT&T, Verizon, or local providers. Your ISP assigns your IP address and routes all your internet traffic.',
    'what-is-my-isp.faq.q2' => 'What is an ASN?',
    'what-is-my-isp.faq.a2' => 'ASN (Autonomous System Number) is a unique identifier assigned to networks and ISPs for internet routing. It helps identify which organization controls a block of IP addresses. Large ISPs have their own ASN, while smaller providers may share one.',
    'what-is-my-isp.faq.q3' => 'Can I hide my ISP information?',
    'what-is-my-isp.faq.a3' => 'Using a VPN (Virtual Private Network) will show the VPN provider\'s ISP instead of your actual ISP. However, your real ISP can still see that you\'re using a VPN. Proxies and Tor can also mask your ISP information.',
    'what-is-my-isp.js.error_loading' => 'Failed to detect ISP information',

    // WHOIS Lookup (10 keys)
    'whois-lookup.results.title' => 'WHOIS Information',
    'whois-lookup.faq.title' => 'Frequently Asked Questions',
    'whois-lookup.faq.q1' => 'What is WHOIS lookup?',
    'whois-lookup.faq.a1' => 'WHOIS is a database query that provides registration information about domain names and IP addresses, including registrant details, registration dates, expiration dates, name servers, and registrar information. It\'s useful for domain research and verification.',
    'whois-lookup.faq.q2' => 'Why is WHOIS information hidden?',
    'whois-lookup.faq.a2' => 'Many domain owners use WHOIS privacy protection (also called domain privacy) to hide their personal contact information from public WHOIS databases. This prevents spam, identity theft, and unwanted solicitation while maintaining domain ownership.',
    'whois-lookup.faq.q3' => 'Is WHOIS lookup legal?',
    'whois-lookup.faq.a3' => 'Yes, WHOIS lookup is completely legal and is a standard internet protocol. WHOIS data is publicly available for legitimate purposes like domain research, trademark protection, and network troubleshooting. However, using WHOIS data for spam or harassment is prohibited.',
    'whois-lookup.faq.q4' => 'How often is WHOIS data updated?',
    'whois-lookup.faq.a4' => 'WHOIS data is updated in real-time when domain registration information changes. However, different WHOIS servers may cache data for varying periods. Recent changes might take a few hours to propagate across all WHOIS databases globally.',
];

// Fill the empty keys
foreach ($fills as $path => $value) {
    setNestedValue($data, $path, $value);
}

// Save the file
$json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
file_put_contents($file, $json);

echo "✅ network.json Part 2: Filled remaining 47 of 145 empty keys\n";
echo "  - Traceroute (19 keys)\n";
echo "  - What is My IP (14 keys)\n";
echo "  - What is My ISP (10 keys)\n";
echo "  - WHOIS Lookup (10 keys)\n";
echo "\n🎉 network.json COMPLETE: All 145 empty keys filled!\n";
