@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-teal-500 via-teal-600 to-teal-700 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-teal-600" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">
                    WHOIS Lookup Tool
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                    Get WHOIS information for any domain - registrar, dates, and more!
                </p>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- Tool -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <form id="whoisForm">
                @csrf
                <div class="mb-6">
                    <label for="domain" class="form-label text-base">Domain Name</label>
                    <input type="text" id="domain" name="domain" class="form-input" placeholder="example.com" required>
                    <p class="text-sm text-gray-500 mt-2">Enter domain without http:// or https://</p>
                </div>

                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <span>Lookup WHOIS</span>
                </button>
            </form>

            <div id="statusMessage" class="hidden mt-6 p-4 rounded-xl"></div>

            <div id="resultSection" class="hidden mt-6">
                <h3 class="text-xl font-bold text-gray-900 mb-4">WHOIS Information</h3>
                <div id="whoisData" class="bg-gray-50 p-4 rounded-xl"></div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">What is WHOIS Lookup?</h2>
            <p class="text-gray-700 mb-4">
                WHOIS Lookup is a query and response protocol used to search databases that store registered users or
                assignees of internet resources, particularly domain names. When you perform a WHOIS lookup, you retrieve
                detailed information about domain ownership, registration dates, expiration dates, registrar information,
                and nameserver details. This tool is essential for domain research, cybersecurity investigations, trademark
                protection, and verifying domain availability.
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Why Use WHOIS Lookup?</h2>
            <p class="text-gray-700 mb-4">
                WHOIS lookup serves multiple critical purposes in the digital world. Website owners use it to verify domain
                registration details and ensure their information is accurate. Security professionals rely on WHOIS data to
                investigate phishing attempts, identify malicious domains, and track down cybercriminals. Legal teams use
                WHOIS information for trademark disputes and intellectual property protection. Businesses use it to research
                competitors, verify potential partners, and identify available domain names for acquisition. The
                transparency provided by WHOIS data helps maintain accountability and trust in the domain name system.
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Key Information Provided</h2>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
                <li><strong>Registrant Information:</strong> Domain owner details (may be privacy protected)</li>
                <li><strong>Registration Dates:</strong> When domain was registered and last updated</li>
                <li><strong>Expiration Date:</strong> When domain registration expires</li>
                <li><strong>Registrar:</strong> Company managing the domain registration</li>
                <li><strong>Name Servers:</strong> DNS servers hosting the domain</li>
                <li><strong>Domain Status:</strong> Current status codes and locks</li>
            </ul>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">How to Use</h2>
            <ol class="list-decimal list-inside text-gray-700 space-y-2 mb-4">
                <li>Enter the domain name you want to lookup</li>
                <li>Click "Lookup WHOIS" button</li>
                <li>Review comprehensive registration information</li>
                <li>Use the data for your research or verification needs</li>
            </ol>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Privacy and WHOIS</h2>
            <p class="text-gray-700 mb-4">
                Many domain registrars now offer WHOIS privacy protection services that mask personal information from
                public WHOIS databases. This protects domain owners from spam, identity theft, and unwanted solicitation
                while still maintaining the essential technical information needed for domain operation. GDPR regulations
                have also impacted WHOIS data availability, with many European registrars redacting personal information to
                comply with privacy laws.
            </p>
        </div>

        <!-- FAQ -->
        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl shadow-xl p-6 md:p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Frequently Asked Questions</h2>
            <div class="space-y-4">
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Is WHOIS lookup legal?</h3>
                    <p class="text-gray-700">Yes, WHOIS lookup is completely legal. WHOIS data is publicly available
                        information required by ICANN for domain registration.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Why can't I see the domain owner's name?</h3>
                    <p class="text-gray-700">Many domain owners use privacy protection services that mask personal
                        information. You'll see the privacy service's details instead.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">How often is WHOIS data updated?</h3>
                    <p class="text-gray-700">WHOIS data is updated in real-time when changes are made to domain
                        registration, but it may take 24-48 hours to propagate globally.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Can I use WHOIS to find expired domains?</h3>
                    <p class="text-gray-700">Yes, checking the expiration date in WHOIS data helps identify domains that are
                        expiring soon or have recently expired.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">What does domain status mean?</h3>
                    <p class="text-gray-700">Domain status codes indicate the current state of a domain (active, locked,
                        pending transfer, etc.) and what operations are allowed.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const form = document.getElementById('whoisForm');
        const submitBtn = form.querySelector('button[type="submit"]');
        const btnText = submitBtn.querySelector('span');
        const btnIcon = submitBtn.querySelector('svg');

        document.getElementById('whoisForm').addEventListener('submit', async (e) => {
            e.preventDefault();

            const formData = new FormData(e.target);
            const statusMessage = document.getElementById('statusMessage');
            const resultSection = document.getElementById('resultSection');
            const whoisData = document.getElementById('whoisData');

            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
            btnText.textContent = 'Looking up...';
            btnIcon.classList.add('animate-spin');

            statusMessage.classList.add('hidden');
            resultSection.classList.add('hidden');

            try {
                const response = await fetch('{{ route("network.whois-lookup.lookup") }}', {
                    method: 'POST',
                    body: formData,
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                });

                const data = await response.json();

                if (data.success) {
                    whoisData.innerHTML = `<pre class="text-sm">${JSON.stringify(data.data, null, 2)}</pre>`;
                    statusMessage.className = 'mt-6 p-4 rounded-xl bg-green-100 text-green-800 border-2 border-green-300';
                    statusMessage.textContent = '✓ WHOIS lookup successful!';
                    statusMessage.classList.remove('hidden');
                    resultSection.classList.remove('hidden');
                } else {
                    statusMessage.className = 'mt-6 p-4 rounded-xl bg-red-100 text-red-800 border-2 border-red-300';
                    statusMessage.textContent = '✗ ' + data.error;
                    statusMessage.classList.remove('hidden');
                }
            } catch (error) {
                statusMessage.className = 'mt-6 p-4 rounded-xl bg-red-100 text-red-800 border-2 border-red-300';
                statusMessage.textContent = '✗ An error occurred. Please try again.';
                statusMessage.classList.remove('hidden');
            } finally {
                submitBtn.disabled = false;
                submitBtn.classList.remove('opacity-75', 'cursor-not-allowed');
                btnText.textContent = 'Lookup WHOIS';
                btnIcon.classList.remove('animate-spin');
            }
        });
    </script>
@endsection