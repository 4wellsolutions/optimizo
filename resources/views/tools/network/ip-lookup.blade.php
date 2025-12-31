@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Hero Section -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-blue-500 via-blue-600 to-blue-700 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">
                    IP Lookup Tool
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                    Get detailed information about any IP address - location, ISP, and more!
                </p>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- Tool Section -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">

            <form id="ipForm">
                @csrf
                <div class="mb-6">
                    <label for="ipAddress" class="form-label text-base">IP Address</label>
                    <input type="text" id="ipAddress" name="ip_address" class="form-input" placeholder="8.8.8.8" required>
                </div>

                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <span>Lookup IP Address</span>
                </button>
            </form>

            <!-- Status Message -->
            <div id="statusMessage" class="hidden mt-6 p-4 rounded-xl"></div>

            <div id="resultSection" class="hidden mt-6">
                <h3 class="text-xl font-bold text-gray-900 mb-4">IP Details</h3>
                <div class="grid md:grid-cols-2 gap-5" id="ipDetails"></div>
            </div>
        </div>

        <!-- SEO Content with Premium Design -->
        <div
            class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-3xl shadow-xl p-8 md:p-10 mb-8 border border-gray-200">
            <h2 class="text-3xl font-black text-gray-900 mb-6 flex items-center gap-3">
                <span
                    class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                        <path fill-rule="evenodd"
                            d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                What is IP Lookup?
            </h2>
            <p class="text-gray-700 text-lg leading-relaxed mb-6">
                IP Lookup is a tool that provides detailed information about any IP address. It reveals the geographical
                location, Internet Service Provider (ISP), hostname, and other technical details associated with an IP
                address. This information is valuable for network administrators, security professionals, website owners,
                and anyone interested in understanding where internet traffic originates from.
            </p>

            <h2 class="text-3xl font-black text-gray-900 mb-6 mt-10 flex items-center gap-3">
                <span
                    class="w-12 h-12 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                Why Use IP Lookup?
            </h2>
            <p class="text-gray-700 text-lg leading-relaxed mb-6">
                IP Lookup tools are essential for various purposes including security analysis, fraud prevention, content
                localization, network troubleshooting, and compliance verification. Website owners use IP lookup to
                understand their visitor demographics, while security teams use it to identify potential threats and block
                malicious traffic. It's also useful for verifying VPN connections and understanding your own internet
                footprint.
            </p>

            <h2 class="text-3xl font-black text-gray-900 mb-6 mt-10">Key Features</h2>
            <div class="grid md:grid-cols-2 gap-4">
                <div
                    class="bg-white p-6 rounded-2xl shadow-lg border-l-4 border-cyan-500 hover:shadow-xl transition-shadow">
                    <h3 class="font-bold text-xl text-gray-900 mb-2">🌍 Geolocation Data</h3>
                    <p class="text-gray-600">Country, region, city, and coordinates</p>
                </div>
                <div
                    class="bg-white p-6 rounded-2xl shadow-lg border-l-4 border-teal-500 hover:shadow-xl transition-shadow">
                    <h3 class="font-bold text-xl text-gray-900 mb-2">🏢 ISP Information</h3>
                    <p class="text-gray-600">Internet Service Provider details</p>
                </div>
                <div
                    class="bg-white p-6 rounded-2xl shadow-lg border-l-4 border-blue-500 hover:shadow-xl transition-shadow">
                    <h3 class="font-bold text-xl text-gray-900 mb-2">🔗 Hostname Resolution</h3>
                    <p class="text-gray-600">Domain name associated with IP</p>
                </div>
                <div
                    class="bg-white p-6 rounded-2xl shadow-lg border-l-4 border-cyan-600 hover:shadow-xl transition-shadow">
                    <h3 class="font-bold text-xl text-gray-900 mb-2">⚡ Instant Results</h3>
                    <p class="text-gray-600">Fast and accurate lookup</p>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-10">
            <h2 class="text-3xl font-black text-gray-900 mb-8 text-center">Frequently Asked Questions</h2>
            <div class="space-y-5">
                <div
                    class="bg-gradient-to-r from-cyan-50 to-blue-50 rounded-2xl p-6 shadow-md hover:shadow-xl transition-shadow border-l-4 border-cyan-500">
                    <h3 class="font-bold text-xl text-gray-900 mb-3">Is IP lookup legal?</h3>
                    <p class="text-gray-700 text-lg">Yes, IP lookup is completely legal. IP addresses are public information
                        used for internet routing.</p>
                </div>
                <div
                    class="bg-gradient-to-r from-teal-50 to-cyan-50 rounded-2xl p-6 shadow-md hover:shadow-xl transition-shadow border-l-4 border-teal-500">
                    <h3 class="font-bold text-xl text-gray-900 mb-3">How accurate is IP geolocation?</h3>
                    <p class="text-gray-700 text-lg">IP geolocation is typically accurate to the city level, but exact
                        location may vary by 50-100 miles.</p>
                </div>
                <div
                    class="bg-gradient-to-r from-blue-50 to-teal-50 rounded-2xl p-6 shadow-md hover:shadow-xl transition-shadow border-l-4 border-blue-500">
                    <h3 class="font-bold text-xl text-gray-900 mb-3">Can I lookup my own IP?</h3>
                    <p class="text-gray-700 text-lg">Yes, you can lookup your own IP address to see what information is
                        publicly available about your connection.</p>
                </div>
                <div
                    class="bg-gradient-to-r from-cyan-50 to-teal-50 rounded-2xl p-6 shadow-md hover:shadow-xl transition-shadow border-l-4 border-cyan-600">
                    <h3 class="font-bold text-xl text-gray-900 mb-3">What's the difference between IPv4 and IPv6?</h3>
                    <p class="text-gray-700 text-lg">IPv4 uses 32-bit addresses (e.g., 192.168.1.1) while IPv6 uses 128-bit
                        addresses for more available IPs.</p>
                </div>
                <div
                    class="bg-gradient-to-r from-teal-50 to-blue-50 rounded-2xl p-6 shadow-md hover:shadow-xl transition-shadow border-l-4 border-teal-600">
                    <h3 class="font-bold text-xl text-gray-900 mb-3">Can IP lookup identify a specific person?</h3>
                    <p class="text-gray-700 text-lg">No, IP lookup only shows ISP and general location. Specific user
                        identification requires ISP cooperation.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const form = document.getElementById('ipForm');
        const statusMessage = document.getElementById('statusMessage');
        const resultSection = document.getElementById('resultSection');
        const ipDetails = document.getElementById('ipDetails');
        const submitBtn = form.querySelector('button[type="submit"]');
        const btnText = submitBtn.querySelector('span');
        const btnIcon = submitBtn.querySelector('svg');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            const formData = new FormData(form);
            
            // Show loading state
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
            btnText.textContent = 'Looking up...';
            btnIcon.classList.add('animate-spin');
            
            statusMessage.classList.add('hidden');
            resultSection.classList.add('hidden');

            try {
                const response = await fetch('{{ route("network.ip-lookup.lookup") }}', {
                    method: 'POST',
                    body: formData,
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                });

                const data = await response.json();

                if (data.success) {
                    displayResults(data.data);
                    showMessage('✓ IP lookup successful!', 'success');
                    resultSection.classList.remove('hidden');
                } else {
                    showMessage('✗ ' + data.error, 'error');
                }
            } catch (error) {
                showMessage('✗ An error occurred. Please try again.', 'error');
            } finally {
                // Reset button state
                submitBtn.disabled = false;
                submitBtn.classList.remove('opacity-75', 'cursor-not-allowed');
                btnText.textContent = 'Lookup IP Address';
                btnIcon.classList.remove('animate-spin');
            }
        });

        function displayResults(data) {
            const fields = [
                { label: 'IP Address', value: data.ip, icon: '🌐' },
                { label: 'Type', value: data.type, icon: '📡' },
                { label: 'Hostname', value: data.hostname, icon: '🔗' },
                { label: 'ISP', value: data.isp, icon: '🏢' },
                { label: 'Country', value: data.country, icon: '🌍' },
                { label: 'Region', value: data.region, icon: '📍' },
                { label: 'City', value: data.city, icon: '🏙️' },
                { label: 'Timezone', value: data.timezone, icon: '🕐' }
            ];

            ipDetails.innerHTML = fields.map(field => `
                                                <div class="bg-gradient-to-br from-white to-gray-50 p-6 rounded-2xl shadow-lg border border-gray-200 hover:shadow-xl transition-all transform hover:-translate-y-1">
                                                    <p class="text-sm font-semibold text-gray-600 mb-2 flex items-center gap-2">
                                                        <span class="text-2xl">${field.icon}</span>
                                                        ${field.label}
                                                    </p>
                                                    <p class="text-xl font-black text-gray-900">${field.value}</p>
                                                </div>
                                            `).join('');
        }

        function showMessage(message, type) {
            statusMessage.className = `mt-8 p-5 rounded-2xl shadow-lg ${type === 'success' ? 'bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 border-2 border-green-300' : 'bg-gradient-to-r from-red-100 to-rose-100 text-red-800 border-2 border-red-300'}`;
            statusMessage.innerHTML = `<p class="text-lg font-bold">${message}</p>`;
            statusMessage.classList.remove('hidden');
        }
    </script>
@endsection