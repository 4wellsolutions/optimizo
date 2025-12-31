@extends('layouts.app')
@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)

@section('content')
    <div class="max-w-6xl mx-auto">
        <div
            class="relative overflow-hidden bg-gradient-to-br from-rose-500 via-rose-600 to-rose-700 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>
            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2">Port Checker Tool</h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto">Check if network ports are open
                    or closed!</p>

                @include('components.hero-actions')
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <form id="portForm">
                @csrf
                <div class="mb-6">
                    <label for="host" class="form-label text-base">Host or IP Address</label>
                    <input type="text" id="host" name="host" class="form-input" placeholder="example.com or 8.8.8.8"
                        required>
                </div>
                <div class="mb-6">
                    <label for="port" class="form-label text-base">Port Number</label>
                    <input type="number" id="port" name="port" class="form-input" placeholder="80" min="1" max="65535"
                        required>
                </div>
                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    <span>Check Port</span>
                </button>
            </form>
            <div id="statusMessage" class="hidden mt-6 p-4 rounded-xl"></div>
            <div id="resultSection" class="hidden mt-6">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Port Status</h3>
                <div id="portResults" class="bg-gray-50 p-4 rounded-xl"></div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">What is Port Checker?</h2>
            <p class="text-gray-700 mb-4">A Port Checker is a network diagnostic tool that determines whether a specific TCP
                or UDP port on a server or device is open (accepting connections), closed (rejecting connections), or
                filtered (blocked by a firewall). Ports are virtual endpoints for network communication, with each port
                number (1-65535) potentially hosting different services. Common ports include 80 for HTTP web traffic, 443
                for HTTPS, 22 for SSH, and 25 for email. Checking port status is essential for network configuration,
                security auditing, and troubleshooting connectivity issues.</p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Why Check Ports?</h2>
            <p class="text-gray-700 mb-4">Port checking serves multiple critical purposes in network management and
                security. System administrators verify that services are accessible on their intended ports after
                configuration changes. Security professionals scan for open ports to identify potential vulnerabilities and
                ensure unnecessary ports are closed. Developers test whether their applications are properly listening on
                configured ports. Network troubleshooters use port checking to diagnose why services aren't accessible,
                determining if the issue is with the service itself, firewall rules, or network routing.</p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Common Ports</h2>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
                <li><strong>Port 80:</strong> HTTP (web traffic)</li>
                <li><strong>Port 443:</strong> HTTPS (secure web traffic)</li>
                <li><strong>Port 22:</strong> SSH (secure shell access)</li>
                <li><strong>Port 21:</strong> FTP (file transfer)</li>
                <li><strong>Port 25:</strong> SMTP (email sending)</li>
                <li><strong>Port 3306:</strong> MySQL database</li>
                <li><strong>Port 3389:</strong> RDP (Remote Desktop)</li>
            </ul>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Security Implications</h2>
            <p class="text-gray-700 mb-4">Open ports represent potential entry points for attackers. Best security practice
                dictates keeping only necessary ports open and closing or filtering all others. Regularly scanning your own
                servers helps identify unintended open ports that could be exploited. However, port scanning others' systems
                without permission may be illegal and is considered hostile activity. Always ensure you have authorization
                before scanning ports on systems you don't own.</p>
        </div>

        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl shadow-xl p-6 md:p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">FAQ</h2>
            <div class="space-y-4">
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">What does "port closed" mean?</h3>
                    <p class="text-gray-700">A closed port actively rejects connections. The server is reachable but no
                        service is listening on that port.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">What's the difference between closed and filtered?</h3>
                    <p class="text-gray-700">Closed ports respond with rejection. Filtered ports don't respond at all,
                        usually due to firewall blocking.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Can I check any port?</h3>
                    <p class="text-gray-700">Yes, you can check ports 1-65535. However, only check ports on systems you own
                        or have permission to scan.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Why is my port showing closed when service is running?</h3>
                    <p class="text-gray-700">Check firewall rules, ensure the service is listening on the correct interface,
                        and verify port forwarding if behind NAT.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Is port scanning legal?</h3>
                    <p class="text-gray-700">Scanning your own systems is legal. Scanning others without permission may
                        violate laws and terms of service.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const form = document.getElementById('portForm');
        const submitBtn = form.querySelector('button[type="submit"]');
        const btnText = submitBtn.querySelector('span');
        const btnIcon = submitBtn.querySelector('svg');

        document.getElementById('portForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(e.target);
            const statusMessage = document.getElementById('statusMessage');
            const resultSection = document.getElementById('resultSection');
            const portResults = document.getElementById('portResults');

            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
            btnText.textContent = 'Checking...';
            btnIcon.classList.add('animate-spin');

            statusMessage.classList.add('hidden');
            resultSection.classList.add('hidden');

            try {
                const response = await fetch('{{ route("network.port-checker.check") }}', {
                    method: 'POST', body: formData, headers: { 'X-Requested-With': 'XMLHttpRequest' }
                });
                const data = await response.json();

                if (data.success) {
                    portResults.innerHTML = `<pre class="text-sm">${JSON.stringify(data.data, null, 2)}</pre>`;
                    statusMessage.className = 'mt-6 p-4 rounded-xl bg-green-100 text-green-800 border-2 border-green-300';
                    statusMessage.textContent = '✓ Port check complete!';
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
                btnText.textContent = 'Check Port';
                btnIcon.classList.remove('animate-spin');
            }
        });
    </script>
@endsection