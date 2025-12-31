@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-blue-500 via-cyan-500 to-teal-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2">
                    What Is My IP?
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium">
                    Discover your public IP address and location!
                </p>

            @include('components.hero-actions')
        </div>
        </div>

        <!-- IP Information -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-blue-200 mb-8">
            <div id="loading" class="text-center py-8">
                <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600"></div>
                <p class="mt-4 text-gray-600">Loading your IP information...</p>
            </div>

            <div id="ipInfo" class="hidden">
                <div class="text-center mb-8">
                    <h2 class="text-sm text-gray-600 mb-2">Your IP Address</h2>
                    <div class="text-4xl md:text-5xl font-black text-blue-600 mb-4" id="ipAddress"></div>
                    <button onclick="copyIP()" class="btn-primary justify-center px-8 py-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                        <span>Copy IP</span>
                    </button>
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                    <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl p-4 border-2 border-blue-200">
                        <div class="text-sm text-gray-600 mb-1">Location</div>
                        <div class="text-lg font-bold text-gray-900" id="location">-</div>
                    </div>
                    <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl p-4 border-2 border-blue-200">
                        <div class="text-sm text-gray-600 mb-1">ISP</div>
                        <div class="text-lg font-bold text-gray-900" id="isp">-</div>
                    </div>
                    <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl p-4 border-2 border-blue-200">
                        <div class="text-sm text-gray-600 mb-1">Country</div>
                        <div class="text-lg font-bold text-gray-900" id="country">-</div>
                    </div>
                    <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl p-4 border-2 border-blue-200">
                        <div class="text-sm text-gray-600 mb-1">Timezone</div>
                        <div class="text-lg font-bold text-gray-900" id="timezone">-</div>
                    </div>
                </div>

            @include('components.hero-actions')
        </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl p-6 md:p-8 border-2 border-blue-100 shadow-xl">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">What Is My IP Address - Free IP Lookup Tool</h2>
            <p class="text-gray-700 leading-relaxed text-lg mb-6">
                Find your public IP address instantly with our free IP lookup tool. Discover your IPv4 or IPv6 address,
                precise geographic location (city, region, country), ISP information, timezone, and complete network
                details. Essential for network configuration, security testing, remote access setup, VPN verification, and
                understanding your internet connection footprint.
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">What Is an IP Address?</h3>
            <p class="text-gray-700 leading-relaxed mb-4">
                An IP (Internet Protocol) address is a unique numerical label assigned to every device connected to the
                internet. It serves two critical purposes: identifying your device on the network and providing your
                approximate location for routing internet traffic correctly. Think of it as your device's mailing address on
                the internet - it tells other computers where to send data you've requested.
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">IPv4 vs IPv6 Addresses</h3>
            <div class="grid md:grid-cols-2 gap-4 mb-6">
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">IPv4 Address</h4>
                    <p class="text-gray-700 text-sm mb-2"><strong>Format:</strong> 192.168.1.1 (four numbers 0-255 separated
                        by dots)</p>
                    <p class="text-gray-700 text-sm mb-2"><strong>Total Addresses:</strong> ~4.3 billion addresses</p>
                    <p class="text-gray-700 text-sm">Most common format worldwide, but running out of available addresses
                        due to internet growth</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">IPv6 Address</h4>
                    <p class="text-gray-700 text-sm mb-2"><strong>Format:</strong> 2001:0db8:85a3::8a2e:0370:7334</p>
                    <p class="text-gray-700 text-sm mb-2"><strong>Total Addresses:</strong> 340 undecillion addresses</p>
                    <p class="text-gray-700 text-sm">Newer format with virtually unlimited addresses, gradually replacing
                        IPv4</p>
                </div>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Why Check Your IP Address?</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6 leading-relaxed">
                <li><strong>Remote Access Setup:</strong> Configure remote desktop, FTP servers, or SSH connections</li>
                <li><strong>Network Troubleshooting:</strong> Diagnose connectivity issues and routing problems</li>
                <li><strong>Security & Privacy:</strong> Verify your connection and detect unauthorized access</li>
                <li><strong>VPN Testing:</strong> Confirm your VPN is working by checking IP changes</li>
                <li><strong>Geolocation Verification:</strong> See how websites detect and use your location</li>
                <li><strong>Firewall Configuration:</strong> Provide your IP for whitelist/blacklist rules</li>
                <li><strong>Gaming & P2P:</strong> Share your IP for direct connections and hosting</li>
                <li><strong>Privacy Awareness:</strong> Understand what information websites can see about you</li>
            </ul>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Public vs Private IP Addresses</h3>
            <div class="grid md:grid-cols-2 gap-4 mb-6">
                <div class="bg-white rounded-lg p-4 border-2 border-blue-200">
                    <h4 class="font-bold text-blue-900 mb-2">🌐 Public IP Address</h4>
                    <p class="text-gray-700 text-sm mb-2">Your unique address on the internet, visible to all websites and
                        services you visit.</p>
                    <p class="text-gray-700 text-sm"><strong>Example:</strong> 203.0.113.45</p>
                    <p class="text-gray-700 text-sm mt-2">Assigned by your ISP and used for all internet communication</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-green-200">
                    <h4 class="font-bold text-green-900 mb-2">🏠 Private IP Address</h4>
                    <p class="text-gray-700 text-sm mb-2">Your device's address on your local network, not visible on the
                        internet.</p>
                    <p class="text-gray-700 text-sm"><strong>Example:</strong> 192.168.1.100</p>
                    <p class="text-gray-700 text-sm mt-2">Used for communication within your home or office network</p>
                </div>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">IP Address Security & Privacy</h3>
            <p class="text-gray-700 leading-relaxed mb-4">
                Your IP address reveals your approximate location (city/region), ISP, and can be used to track your online
                activity across websites. While it doesn't expose your exact home address or personal identity directly, it
                can be combined with other data for tracking. Websites use your IP for analytics, ad targeting, and
                geographic restrictions.
            </p>
            <p class="text-gray-700 leading-relaxed mb-6">
                <strong>Privacy Protection:</strong> Use a VPN (Virtual Private Network) to mask your real IP address and
                enhance privacy. VPNs route your traffic through their servers, showing the VPN's IP instead of yours. Our
                tool shows exactly what information websites can see about your connection.
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Dynamic vs Static IP Addresses</h3>
            <div class="bg-white rounded-lg p-4 border-2 border-gray-200 mb-6">
                <p class="text-gray-700 leading-relaxed mb-3">
                    <strong>Dynamic IP:</strong> Changes periodically (daily, weekly, or when you restart your router). Most
                    home users have dynamic IPs assigned automatically by their ISP. Cheaper and more common for residential
                    connections.
                </p>
                <p class="text-gray-700 leading-relaxed">
                    <strong>Static IP:</strong> Never changes and remains constant. Typically used for business connections,
                    web servers, email servers, and remote access. Costs more but essential for hosting services.
                </p>
            </div>

            <div class="bg-yellow-50 border-2 border-yellow-200 rounded-xl p-6 mb-6">
                <h4 class="font-bold text-yellow-900 mb-2 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    Privacy & Security Tips
                </h4>
                <ul class="text-yellow-800 text-sm leading-relaxed space-y-2">
                    <li>• Never share your IP address publicly on forums or social media</li>
                    <li>• Use a VPN when connecting to public WiFi networks</li>
                    <li>• Enable your router's firewall to block unauthorized access</li>
                    <li>• Regularly check your IP to detect unauthorized VPN disconnections</li>
                    <li>• Be aware that websites log your IP for security and analytics</li>
                </ul>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">Can someone find my exact location from my IP address?</h4>
                    <p class="text-gray-700 leading-relaxed">No. IP geolocation shows your city or region, not your exact
                        street address. Accuracy is typically within 50-100 miles. Only your ISP knows your exact address.
                    </p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">Does my IP address change?</h4>
                    <p class="text-gray-700 leading-relaxed">Most home users have dynamic IPs that change periodically when
                        you restart your router or after a certain time. Business connections often have static IPs that
                        never change.</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">How do I hide my IP address?</h4>
                    <p class="text-gray-700 leading-relaxed">Use a VPN (Virtual Private Network) or proxy service to route
                        your traffic through their servers, masking your real IP address. Tor browser also hides your IP
                        through multiple relay nodes.</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">Is it safe to share my IP address?</h4>
                    <p class="text-gray-700 leading-relaxed">Generally yes for legitimate purposes, but avoid sharing it
                        publicly. Websites see your IP automatically, but publicly sharing it could expose you to DDoS
                        attacks or targeted hacking attempts.</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">What's the difference between IPv4 and IPv6?</h4>
                    <p class="text-gray-700 leading-relaxed">IPv4 uses 32-bit addresses (4.3 billion possible), while IPv6
                        uses 128-bit addresses (virtually unlimited). IPv6 was created to solve IPv4 address exhaustion and
                        offers better security and performance.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        async function getIPInfo() {
            try {
                const response = await fetch('https://ipapi.co/json/');
                const data = await response.json();

                document.getElementById('ipAddress').textContent = data.ip;
                document.getElementById('location').textContent = `${data.city}, ${data.region}`;
                document.getElementById('isp').textContent = data.org || 'Unknown';
                document.getElementById('country').textContent = `${data.country_name} (${data.country})`;
                document.getElementById('timezone').textContent = data.timezone;

                document.getElementById('loading').classList.add('hidden');
                document.getElementById('ipInfo').classList.remove('hidden');
            } catch (error) {
                document.getElementById('loading').innerHTML = '<p class="text-red-600">Failed to load IP information</p>';
            }
        }

        function copyIP() {
            const ip = document.getElementById('ipAddress').textContent;
            navigator.clipboard.writeText(ip);

            const btn = event.target.closest('button');
            const originalHTML = btn.innerHTML;
            btn.innerHTML = '<span>Copied!</span>';
            setTimeout(() => btn.innerHTML = originalHTML, 2000);
        }

        // Load IP info on page load
        getIPInfo();
    </script>
@endsection