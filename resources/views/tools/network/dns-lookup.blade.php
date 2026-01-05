@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" icon="dns-lookup" />

        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <form id="dnsForm">
                @csrf
                <div class="mb-6">
                    <label for="domain" class="form-label text-base">Domain Name</label>
                    <input type="text" id="domain" name="domain" class="form-input" placeholder="example.com" required>
                </div>
                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <span>Lookup DNS</span>
                </button>
            </form>
            <div id="statusMessage" class="hidden mt-6 p-4 rounded-xl"></div>
            <div id="resultSection" class="hidden mt-6">
                <h3 class="text-xl font-bold text-gray-900 mb-4">DNS Records</h3>
                <div id="dnsRecords"></div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">What is DNS Lookup?</h2>
            <p class="text-gray-700 mb-4">DNS Lookup is a tool that queries Domain Name System servers to retrieve DNS
                records for a domain. DNS records contain important information about how a domain is configured, including
                mail servers (MX records), nameservers (NS records), IP addresses (A/AAAA records), and text records (TXT
                records) used for verification and security.</p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Why Use DNS Lookup?</h2>
            <p class="text-gray-700 mb-4">DNS Lookup is essential for troubleshooting email delivery issues, verifying
                domain configuration, checking nameserver settings, validating SPF and DKIM records, and understanding how a
                domain is set up. It's used by system administrators, web developers, and IT professionals daily.</p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">DNS Record Types</h2>
            <ul class="list-disc list-inside text-gray-700 space-y-2">
                <li><strong>A Record:</strong> Maps domain to IPv4 address</li>
                <li><strong>AAAA Record:</strong> Maps domain to IPv6 address</li>
                <li><strong>MX Record:</strong> Mail server information</li>
                <li><strong>NS Record:</strong> Nameserver information</li>
                <li><strong>TXT Record:</strong> Text records for verification</li>
                <li><strong>CNAME Record:</strong> Canonical name alias</li>
            </ul>
        </div>

        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl shadow-xl p-6 md:p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">FAQ</h2>
            <div class="space-y-4">
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">What is DNS?</h3>
                    <p class="text-gray-700">DNS (Domain Name System) translates human-readable domain names into IP
                        addresses.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">How long does DNS propagation take?</h3>
                    <p class="text-gray-700">DNS changes can take 24-48 hours to fully propagate worldwide.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Can I lookup any domain?</h3>
                    <p class="text-gray-700">Yes, you can lookup DNS records for any publicly registered domain.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">What's an MX record?</h3>
                    <p class="text-gray-700">MX (Mail Exchange) records specify the mail servers responsible for receiving
                        email.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Why are multiple DNS records returned?</h3>
                    <p class="text-gray-700">Domains often have multiple records for redundancy and different purposes.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const form = document.getElementById('dnsForm');
        const submitBtn = form.querySelector('button[type="submit"]');
        const btnText = submitBtn.querySelector('span');
        const btnIcon = submitBtn.querySelector('svg');

        document.getElementById('dnsForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(e.target);

            // Show loading state
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
            btnText.textContent = 'Looking up...';
            btnIcon.classList.add('animate-spin');

            document.getElementById('statusMessage').classList.add('hidden');
            document.getElementById('resultSection').classList.add('hidden');

            try {
                const response = await fetch('{{ route("network.dns-lookup.lookup") }}', {
                    method: 'POST',
                    body: formData,
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                });
                const data = await response.json();
                if (data.success) {
                    let html = '';
                    for (const [type, records] of Object.entries(data.data.records)) {
                        if (records.length > 0) {
                            html += `<div class="mb-4"><h4 class="font-bold text-lg mb-2">${type} Records</h4>`;
                            records.forEach(r => {
                                html += `<div class="bg-gray-50 p-3 rounded mb-2"><code class="text-sm">${JSON.stringify(r)}</code></div>`;
                            });
                            html += '</div>';
                        }
                    }
                    document.getElementById('dnsRecords').innerHTML = html;
                    document.getElementById('statusMessage').className = 'mt-6 p-4 rounded-xl bg-green-100 text-green-800';
                    document.getElementById('statusMessage').textContent = '✓ DNS lookup successful!';
                    document.getElementById('statusMessage').classList.remove('hidden');
                    document.getElementById('resultSection').classList.remove('hidden');
                } else {
                    document.getElementById('statusMessage').className = 'mt-6 p-4 rounded-xl bg-red-100 text-red-800';
                    document.getElementById('statusMessage').textContent = '✗ ' + data.error;
                    document.getElementById('statusMessage').classList.remove('hidden');
                }
            } catch (error) {
                document.getElementById('statusMessage').className = 'mt-6 p-4 rounded-xl bg-red-100 text-red-800';
                document.getElementById('statusMessage').textContent = '✗ An error occurred';
                document.getElementById('statusMessage').classList.remove('hidden');
            } finally {
                // Reset button state
                submitBtn.disabled = false;
                submitBtn.classList.remove('opacity-75', 'cursor-not-allowed');
                btnText.textContent = 'Lookup DNS';
                btnIcon.classList.remove('animate-spin');
            }
        });
    </script>
@endsection