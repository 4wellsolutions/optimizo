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
        <x-tool-hero :tool="$tool" icon="domain-to-ip" />

        <!-- Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-emerald-200 mb-8">
            <form id="domainForm">
                @csrf
                <div class="mb-6">
                    <label for="domain" class="form-label text-base">Enter Domain Name</label>
                    <input type="text" id="domain" name="domain" class="form-input" placeholder="example.com" required>
                    <p class="text-sm text-gray-500 mt-2">Enter domain without http:// or https://</p>
                </div>

                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <span id="btnText">Lookup IP Address</span>
                </button>
            </form>

            <!-- Results -->
            <div id="results" class="hidden mt-8">
                <h3 class="text-xl font-bold text-gray-900 mb-4">DNS Lookup Results</h3>
                <div class="bg-gradient-to-br from-emerald-50 to-green-50 rounded-xl p-6 border-2 border-emerald-200">
                    <div class="mb-4">
                        <div class="text-sm text-gray-600 mb-1">Domain</div>
                        <div class="text-lg font-bold text-gray-900" id="resultDomain"></div>
                    </div>
                    <div>
                        <div class="text-sm text-gray-600 mb-1">IP Address</div>
                        <div class="text-2xl font-black text-emerald-600 font-mono" id="resultIP"></div>
                    </div>
                </div>
            </div>

            <!-- Error -->
            <div id="error" class="hidden mt-8">
                <div class="bg-red-50 border-2 border-red-200 rounded-xl p-6">
                    <p class="text-red-800 font-semibold" id="errorText"></p>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div
            class="bg-gradient-to-br from-emerald-50 to-green-50 rounded-3xl p-8 md:p-12 mt-8 border-2 border-emerald-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-emerald-500 to-green-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">Domain to IP Converter</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Convert any domain name to its IP address instantly</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Our free Domain to IP tool instantly converts any domain name to its corresponding IP address using DNS
                lookup. Essential for network administrators, web developers, security professionals, and anyone needing to
                identify the server behind a domain. Get accurate IP addresses for troubleshooting, server verification, and
                network configuration.
            </p>

            <div class="grid md:grid-cols-3 gap-6 mb-10">
                <div
                    class="bg-white rounded-2xl p-6 shadow-xl border-2 border-emerald-100 hover:border-emerald-300 transition-all hover:shadow-2xl">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-green-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">Instant Lookup</h3>
                    <p class="text-gray-600">Get IP addresses immediately without delays</p>
                </div>
                <div
                    class="bg-white rounded-2xl p-6 shadow-xl border-2 border-green-100 hover:border-green-300 transition-all hover:shadow-2xl">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-green-500 to-teal-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">Accurate Results</h3>
                    <p class="text-gray-600">Real-time DNS queries for current IP addresses</p>
                </div>
                <div
                    class="bg-white rounded-2xl p-6 shadow-xl border-2 border-teal-100 hover:border-teal-300 transition-all hover:shadow-2xl">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">100% Free</h3>
                    <p class="text-gray-600">Unlimited lookups with no registration required</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🌐 What is Domain to IP Lookup?</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                Domain to IP lookup is the process of converting a human-readable domain name (like example.com) into its
                corresponding numerical IP address (like 93.184.216.34). This conversion happens through DNS (Domain Name
                System) servers, which act as the internet's phone book. Every website has an IP address, but domain names
                make them easier to remember and access.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Common Use Cases</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-emerald-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔧</div>
                    <h4 class="font-bold text-gray-900 mb-2">Server Configuration</h4>
                    <p class="text-gray-600 text-sm">Configure firewalls, whitelists, and server settings with IP addresses
                    </p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🛡️</div>
                    <h4 class="font-bold text-gray-900 mb-2">Security Analysis</h4>
                    <p class="text-gray-600 text-sm">Verify server locations and identify hosting providers</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-teal-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔍</div>
                    <h4 class="font-bold text-gray-900 mb-2">Troubleshooting</h4>
                    <p class="text-gray-600 text-sm">Diagnose DNS issues and verify domain configurations</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-emerald-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📊</div>
                    <h4 class="font-bold text-gray-900 mb-2">Network Monitoring</h4>
                    <p class="text-gray-600 text-sm">Track server changes and monitor infrastructure</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🌍</div>
                    <h4 class="font-bold text-gray-900 mb-2">Geolocation</h4>
                    <p class="text-gray-600 text-sm">Determine server geographic location from IP address</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-teal-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚙️</div>
                    <h4 class="font-bold text-gray-900 mb-2">API Integration</h4>
                    <p class="text-gray-600 text-sm">Use IP addresses for direct API connections</p>
                </div>
            </div>

            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-2 border-blue-200 rounded-2xl p-8 mb-10">
                <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-3 text-xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    💡 Pro Tips: Using Domain to IP Lookup
                </h4>
                <ul class="text-blue-800 leading-relaxed space-y-2">
                    <li>✅ Use IP addresses for direct server connections when DNS is slow</li>
                    <li>✅ Verify CDN configurations by checking multiple domain resolutions</li>
                    <li>✅ Whitelist server IPs in firewalls for secure access</li>
                    <li>✅ Compare IP addresses before and after DNS changes</li>
                    <li>✅ Identify shared hosting by checking if multiple domains share IPs</li>
                </ul>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What is the difference between a domain and an IP
                        address?</h4>
                    <p class="text-gray-700 leading-relaxed">A domain name (like google.com) is a human-readable address,
                        while an IP address (like 142.250.185.46) is the numerical address computers use to identify
                        servers. DNS translates domain names to IP addresses automatically when you visit websites.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can a domain have multiple IP addresses?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! Many websites use multiple IP addresses for load
                        balancing, redundancy, or CDN distribution. Our tool shows the primary IP address returned by DNS,
                        but domains can have multiple A records pointing to different servers.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Why would I need to convert a domain to IP?</h4>
                    <p class="text-gray-700 leading-relaxed">Common reasons include: configuring firewalls with IP
                        whitelists, troubleshooting DNS issues, verifying server locations, setting up direct connections,
                        monitoring infrastructure changes, and security analysis to identify hosting providers.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Do IP addresses change?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes, IP addresses can change when websites migrate servers,
                        switch hosting providers, or update their infrastructure. That's why using domain names is more
                        reliable than hardcoding IP addresses in applications.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is this tool accurate?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! Our tool performs real-time DNS queries to get the current
                        IP address for any domain. Results reflect the actual DNS configuration at the time of lookup,
                        ensuring accuracy for troubleshooting and verification.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#domainForm').on('submit', function (e) {
            e.preventDefault();

            const domain = $('#domain').val().trim().replace(/^https?:\/\//, '');
            const btn = $(this).find('button[type="submit"]');
            const btnText = $('#btnText');

            if (!domain) return;

            btn.prop('disabled', true).addClass('opacity-75');
            btnText.text('Looking up...');
            $('#results').addClass('hidden');
            $('#error').addClass('hidden');

            $.ajax({
                url: '{{ route("network.domain-to-ip.lookup") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    domain: domain
                },
                success: function (response) {
                    if (response.success) {
                        $('#resultDomain').text(response.data.domain);
                        $('#resultIP').text(response.data.ip);
                        $('#results').removeClass('hidden');
                    }
                },
                error: function (xhr) {
                    const error = xhr.responseJSON?.error || 'Failed to lookup domain';
                    $('#errorText').text(error);
                    $('#error').removeClass('hidden');
                },
                complete: function () {
                    btn.prop('disabled', false).removeClass('opacity-75');
                    btnText.text('Lookup IP Address');
                }
            });
        });

        async function pasteFromClipboard() {
            try {
                const text = await navigator.clipboard.readText();
                document.getElementById('domain').value = text.trim();
            } catch (err) {
                // Fallback for browsers that don't support clipboard API
                document.getElementById('domain').focus();
            }
        }
    </script>
@endsection