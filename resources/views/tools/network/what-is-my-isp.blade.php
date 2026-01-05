@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <!-- Header -->
        <x-tool-hero :tool="$tool" icon="what-is-my-isp" />

        <!-- ISP Information -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-indigo-200 mb-8">
            <div id="loading" class="text-center py-8">
                <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-indigo-600"></div>
                <p class="mt-4 text-gray-600">Loading ISP information...</p>
            </div>

            <div id="ispInfo" class="hidden">
                <div class="text-center mb-8">
                    <h2 class="text-sm text-gray-600 mb-2">Your Internet Service Provider</h2>
                    <div class="text-3xl md:text-4xl font-black text-indigo-600 mb-2" id="ispName"></div>
                    <div class="text-lg text-gray-600" id="ispOrg"></div>
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                    <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl p-4 border-2 border-indigo-200">
                        <div class="text-sm text-gray-600 mb-1">IP Address</div>
                        <div class="text-lg font-bold text-gray-900 font-mono" id="ipAddress">-</div>
                    </div>
                    <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl p-4 border-2 border-indigo-200">
                        <div class="text-sm text-gray-600 mb-1">ASN</div>
                        <div class="text-lg font-bold text-gray-900" id="asn">-</div>
                    </div>
                    <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl p-4 border-2 border-indigo-200">
                        <div class="text-sm text-gray-600 mb-1">Network</div>
                        <div class="text-lg font-bold text-gray-900 font-mono" id="network">-</div>
                    </div>
                    <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl p-4 border-2 border-indigo-200">
                        <div class="text-sm text-gray-600 mb-1">Location</div>
                        <div class="text-lg font-bold text-gray-900" id="location">-</div>
                    </div>
                </div>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- SEO Content -->
        <div
            class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl p-6 md:p-8 border-2 border-indigo-100 shadow-xl">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">What Is My ISP - Internet Service Provider Lookup Tool</h2>
            <p class="text-gray-700 leading-relaxed text-lg mb-6">
                Discover your Internet Service Provider (ISP) details instantly with our free ISP lookup tool. Find out who
                provides your internet connection, view your ASN (Autonomous System Number), network details, organization
                information, and geographic location. Perfect for network troubleshooting, security analysis, privacy
                verification, and understanding your internet connection infrastructure.
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">What Information Can You Find?</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6 leading-relaxed">
                <li><strong>ISP Name:</strong> Your Internet Service Provider's official company name and brand</li>
                <li><strong>Organization:</strong> The organization or entity managing your network connection</li>
                <li><strong>ASN (Autonomous System Number):</strong> Unique identifier for your network on the internet</li>
                <li><strong>IP Address:</strong> Your current public IP address visible to websites</li>
                <li><strong>Location:</strong> City, region, and country associated with your connection</li>
                <li><strong>Network Details:</strong> IP range, subnet information, and network infrastructure data</li>
            </ul>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Why Check Your ISP?</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6 leading-relaxed">
                <li>Verify you're connected through the correct internet provider</li>
                <li>Troubleshoot network connectivity and performance issues</li>
                <li>Check if you're using a VPN or proxy service correctly</li>
                <li>Identify your network for security and privacy purposes</li>
                <li>Verify ISP claims about service coverage and infrastructure</li>
                <li>Research network routing and peering relationships</li>
                <li>Confirm business internet connections and dedicated lines</li>
                <li>Detect unauthorized network access or connection hijacking</li>
            </ul>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Understanding ASN (Autonomous System Number)</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                An ASN is a unique number assigned to networks that participate in internet routing using BGP (Border
                Gateway Protocol). Your ISP's ASN identifies their network infrastructure globally and is used for routing
                internet traffic. Large ISPs may have multiple ASNs for different regions, services, or acquired networks.
                Understanding your ASN helps with advanced network troubleshooting, BGP routing analysis, and identifying
                network ownership and peering relationships.
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Common Use Cases</h3>
            <div class="grid md:grid-cols-2 gap-4 mb-6">
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">🔧 Network Troubleshooting</h4>
                    <p class="text-gray-700 text-sm">Identify ISP-related issues, verify routing paths, and diagnose
                        connection problems</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">🔒 VPN Verification</h4>
                    <p class="text-gray-700 text-sm">Confirm your VPN is working by checking if ISP changes when connected
                    </p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">🛡️ Security Analysis</h4>
                    <p class="text-gray-700 text-sm">Verify connection authenticity and detect unauthorized network access
                    </p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">💼 Business Verification</h4>
                    <p class="text-gray-700 text-sm">Confirm dedicated business lines and enterprise internet connections
                    </p>
                </div>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">ISP Types and Services</h3>
            <p class="text-gray-700 leading-relaxed mb-4">
                Internet Service Providers offer various connection types:
            </p>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6 leading-relaxed">
                <li><strong>Cable ISPs:</strong> High-speed internet via coaxial cable infrastructure</li>
                <li><strong>DSL Providers:</strong> Internet through telephone lines (ADSL, VDSL)</li>
                <li><strong>Fiber Optic ISPs:</strong> Ultra-fast connections using fiber optic cables</li>
                <li><strong>Wireless/Mobile ISPs:</strong> 4G/5G cellular internet connections</li>
                <li><strong>Satellite ISPs:</strong> Internet via satellite for remote areas</li>
                <li><strong>Business ISPs:</strong> Dedicated enterprise-grade connections with SLAs</li>
            </ul>

            <div class="bg-blue-50 border-2 border-blue-200 rounded-xl p-6 mb-6">
                <h4 class="font-bold text-blue-900 mb-2 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    Privacy Note
                </h4>
                <p class="text-blue-800 text-sm leading-relaxed">
                    Your ISP can see all unencrypted internet traffic and the websites you visit (but not HTTPS content).
                    They may log connection data, browsing history, and DNS queries. Use a VPN to encrypt your traffic and
                    prevent ISP monitoring. Our tool only displays publicly available information that websites can already
                    see.
                </p>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">Is my ISP information private?</h4>
                    <p class="text-gray-700 leading-relaxed">Your ISP information is publicly visible to websites you visit.
                        This tool simply displays what's already publicly available about your connection.</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">Can I hide my ISP?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes, using a VPN or proxy service will show the VPN provider's
                        ISP instead of your actual ISP, protecting your privacy and location.</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">Why does my ISP show a different company?</h4>
                    <p class="text-gray-700 leading-relaxed">Many ISPs use infrastructure from larger network providers or
                        parent companies. The displayed ISP might be the wholesale provider or network operator rather than
                        your retail ISP brand.</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">What can my ISP see?</h4>
                    <p class="text-gray-700 leading-relaxed">Your ISP can see all websites you visit (URLs), connection
                        times, data usage, and unencrypted traffic. They cannot see HTTPS content, but can see the domains
                        you access.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        async function getISPInfo() {
            try {
                const response = await fetch('https://ipapi.co/json/');
                const data = await response.json();

                document.getElementById('ispName').textContent = data.org || 'Unknown ISP';
                document.getElementById('ispOrg').textContent = data.org_name || '';
                document.getElementById('ipAddress').textContent = data.ip;
                document.getElementById('asn').textContent = `AS${data.asn}` || 'Unknown';
                document.getElementById('network').textContent = data.network || 'Unknown';
                document.getElementById('location').textContent = `${data.city}, ${data.country_name}`;

                document.getElementById('loading').classList.add('hidden');
                document.getElementById('ispInfo').classList.remove('hidden');
            } catch (error) {
                document.getElementById('loading').innerHTML = '<p class="text-red-600">Failed to load ISP information</p>';
            }
        }

        // Load ISP info on page load
        getISPInfo();
    </script>
@endsection