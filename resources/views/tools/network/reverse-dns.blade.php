@extends('layouts.app')
@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)

@section('content')
    <div class="max-w-6xl mx-auto">
        <div
            class="relative overflow-hidden bg-gradient-to-br from-pink-500 via-pink-600 to-pink-700 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>
            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2">Reverse DNS Lookup</h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto">Perform reverse DNS lookup
                    for any IP address!</p>

                @include('components.hero-actions')
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <form id="rdnsForm">
                @csrf
                <div class="mb-6">
                    <label for="ipAddress" class="form-label text-base">IP Address</label>
                    <input type="text" id="ipAddress" name="ip_address" class="form-input" placeholder="8.8.8.8" required>
                </div>
                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                    </svg>
                    <span>Reverse Lookup</span>
                </button>
            </form>
            <div id="statusMessage" class="hidden mt-6 p-4 rounded-xl"></div>
            <div id="resultSection" class="hidden mt-6">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Reverse DNS Results</h3>
                <div id="rdnsResults" class="bg-gray-50 p-4 rounded-xl"></div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">What is Reverse DNS Lookup?</h2>
            <p class="text-gray-700 mb-4">Reverse DNS Lookup (rDNS) is the process of determining the hostname associated
                with a given IP address. While standard DNS lookup converts domain names to IP addresses, reverse DNS does
                the opposite - it queries DNS servers for PTR (Pointer) records that map IP addresses back to hostnames.
                This is accomplished by querying special reverse DNS zones in the in-addr.arpa domain for IPv4 addresses or
                ip6.arpa for IPv6 addresses. Reverse DNS is crucial for email delivery, network troubleshooting, and
                security investigations.</p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Why Use Reverse DNS?</h2>
            <p class="text-gray-700 mb-4">Reverse DNS lookup serves several important purposes in network operations and
                security. Email servers use rDNS to verify sender legitimacy - many mail servers reject emails from IP
                addresses without proper reverse DNS records as an anti-spam measure. Network administrators use it to
                identify devices on their network, troubleshoot connectivity issues, and verify server configurations.
                Security professionals employ reverse DNS to investigate suspicious IP addresses, identify the organizations
                behind network attacks, and track down sources of malicious traffic. Web server logs often use reverse DNS
                to convert IP addresses to readable hostnames for better analysis.</p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Understanding PTR Records</h2>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
                <li><strong>PTR Record:</strong> DNS record type that maps IP to hostname</li>
                <li><strong>Forward Confirmation:</strong> Hostname should resolve back to same IP</li>
                <li><strong>Email Delivery:</strong> Required for reliable email server operation</li>
                <li><strong>Network Identification:</strong> Helps identify server ownership</li>
                <li><strong>Security Analysis:</strong> Reveals organization behind IP address</li>
                <li><strong>Logging:</strong> Makes server logs more readable</li>
            </ul>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Common Use Cases</h2>
            <p class="text-gray-700 mb-4">Email server administrators configure reverse DNS to ensure their mail servers
                aren't flagged as spam. Network engineers verify that server IP addresses have correct PTR records matching
                their hostnames. Security analysts investigate suspicious connections by looking up the hostnames of
                attacking IP addresses. Website owners analyze traffic sources by resolving visitor IP addresses to
                hostnames. System administrators troubleshoot network issues by verifying DNS configuration integrity
                through forward and reverse lookup consistency checks.</p>
        </div>

        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl shadow-xl p-6 md:p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">FAQ</h2>
            <div class="space-y-4">
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">What if no hostname is found?</h3>
                    <p class="text-gray-700">Not all IP addresses have reverse DNS records. This is common for dynamic IPs
                        and some hosting providers.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Why is reverse DNS important for email?</h3>
                    <p class="text-gray-700">Many mail servers check rDNS to verify sender legitimacy. Missing or mismatched
                        rDNS can cause email delivery failures.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Can I set up reverse DNS myself?</h3>
                    <p class="text-gray-700">You need to contact your IP address provider (ISP or hosting company) to
                        configure PTR records for your IPs.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Should forward and reverse DNS match?</h3>
                    <p class="text-gray-700">Yes, for email servers it's critical that the hostname resolves to the IP and
                        the IP resolves back to the same hostname.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">How long does rDNS propagation take?</h3>
                    <p class="text-gray-700">PTR record changes typically propagate within a few hours, but can take up to
                        48 hours globally.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const form = document.getElementById('rdnsForm');
        const submitBtn = form.querySelector('button[type="submit"]');
        const btnText = submitBtn.querySelector('span');
        const btnIcon = submitBtn.querySelector('svg');

        document.getElementById('rdnsForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(e.target);
            const statusMessage = document.getElementById('statusMessage');
            const resultSection = document.getElementById('resultSection');
            const rdnsResults = document.getElementById('rdnsResults');

            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
            btnText.textContent = 'Looking up...';
            btnIcon.classList.add('animate-spin');

            statusMessage.classList.add('hidden');
            resultSection.classList.add('hidden');

            try {
                const response = await fetch('{{ route("network.reverse-dns.lookup") }}', {
                    method: 'POST', body: formData, headers: { 'X-Requested-With': 'XMLHttpRequest' }
                });
                const data = await response.json();

                if (data.success) {
                    rdnsResults.innerHTML = `<pre class="text-sm">${JSON.stringify(data.data, null, 2)}</pre>`;
                    statusMessage.className = 'mt-6 p-4 rounded-xl bg-green-100 text-green-800 border-2 border-green-300';
                    statusMessage.textContent = '✓ Reverse DNS lookup successful!';
                    statusMessage.classList.remove('hidden');
                    resultSection.classList.remove('hidden');
                } else {
                    statusMessage.className = 'mt-6 p-4 rounded-xl bg-red-100 text-red-800 border-2 border-red-300';
                    statusMessage.textContent = '✗ ' + data.error;
                    statusMessage.classList.remove('hidden');
                }
            } catch (error) {
                statusMessage.className = 'mt-6 p-4 rounded-xl bg-red-100 text-red-800 border-2 border-red-300';
                statusMessage.textContent = '✗ An error occurred';
                statusMessage.classList.remove('hidden');
            } finally {
                submitBtn.disabled = false;
                submitBtn.classList.remove('opacity-75', 'cursor-not-allowed');
                btnText.textContent = 'Reverse Lookup';
                btnIcon.classList.remove('animate-spin');
            }
        });
    </script>
@endsection