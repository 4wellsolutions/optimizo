@extends('layouts.app')
@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)

@section('content')
    <div class="max-w-6xl mx-auto">
        <div
            class="relative overflow-hidden bg-gradient-to-br from-green-500 via-green-600 to-green-700 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>
            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2">Ping Test Tool</h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto">Test network connectivity and
                    measure latency to any host!</p>
                @include('components.hero-actions')
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <form id="pingForm">
                @csrf
                <div class="mb-6">
                    <label for="host" class="block text-sm font-semibold text-gray-700 mb-2">Host or IP Address</label>
                    <input type="text" id="host" name="host"
                        class="w-full p-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500"
                        placeholder="google.com or 8.8.8.8" required>
                </div>
                <button type="submit"
                    class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 font-semibold">Ping Host</button>
            </form>
            <div id="statusMessage" class="hidden mt-6 p-4 rounded-xl"></div>
            <div id="resultSection" class="hidden mt-6">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Ping Results</h3>
                <div id="pingResults" class="bg-gray-50 p-4 rounded-xl"></div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">What is Ping Test?</h2>
            <p class="text-gray-700 mb-4">Ping is a network diagnostic tool that tests the reachability of a host on an
                Internet Protocol (IP) network. It measures the round-trip time for messages sent from the source to a
                destination computer and back. Ping operates by sending Internet Control Message Protocol (ICMP) Echo
                Request packets to the target host and waiting for an Echo Reply. The tool is named after the sonar ping
                sound used in submarine detection, as it similarly sends out a signal and listens for a response.</p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Why Use Ping Test?</h2>
            <p class="text-gray-700 mb-4">Ping testing is essential for network troubleshooting and performance monitoring.
                System administrators use ping to verify network connectivity, diagnose connection issues, and measure
                network latency. It helps identify whether a server is online and responsive, detect packet loss that might
                indicate network congestion or hardware problems, and measure the quality of network connections. Gamers use
                ping to check server latency before joining online games, while website owners monitor their server's
                responsiveness to ensure optimal user experience.</p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Understanding Ping Metrics</h2>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
                <li><strong>Packets Sent/Received:</strong> Number of ping requests and successful responses</li>
                <li><strong>Packet Loss:</strong> Percentage of packets that didn't receive a response</li>
                <li><strong>Minimum Time:</strong> Fastest round-trip time recorded</li>
                <li><strong>Average Time:</strong> Mean latency across all pings</li>
                <li><strong>Maximum Time:</strong> Slowest round-trip time recorded</li>
                <li><strong>TTL (Time To Live):</strong> Number of network hops before packet expires</li>
            </ul>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Interpreting Results</h2>
            <p class="text-gray-700 mb-4">Good ping times are typically under 50ms for local connections and under 100ms for
                international connections. Times between 100-200ms are acceptable for most applications but may cause
                noticeable lag in real-time applications like gaming or video conferencing. Anything above 200ms indicates
                potential network issues. Packet loss above 1% suggests network problems that need investigation. Consistent
                ping times indicate stable connections, while highly variable times suggest network congestion or routing
                issues.</p>
        </div>

        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl shadow-xl p-6 md:p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">FAQ</h2>
            <div class="space-y-4">
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">What is a good ping time?</h3>
                    <p class="text-gray-700">Under 50ms is excellent, 50-100ms is good, 100-200ms is acceptable, and above
                        200ms may cause noticeable lag.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Why do I get "Request timed out"?</h3>
                    <p class="text-gray-700">This means the host didn't respond within the timeout period. It could be
                        offline, blocking ICMP, or unreachable due to network issues.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Can firewalls block ping?</h3>
                    <p class="text-gray-700">Yes, many firewalls block ICMP packets for security reasons. A failed ping
                        doesn't always mean the host is down.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">What causes high ping times?</h3>
                    <p class="text-gray-700">Network congestion, long physical distance, poor routing, server overload, or
                        internet connection issues can all increase latency.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">How often should I ping?</h3>
                    <p class="text-gray-700">For monitoring, ping every few minutes. For troubleshooting, continuous ping
                        helps identify intermittent issues.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('pingForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(e.target);
            const statusMessage = document.getElementById('statusMessage');
            const resultSection = document.getElementById('resultSection');
            const pingResults = document.getElementById('pingResults');

            statusMessage.classList.add('hidden');
            resultSection.classList.add('hidden');

            try {
                const response = await fetch('{{ route("network.ping-test.ping") }}', {
                    method: 'POST', body: formData, headers: { 'X-Requested-With': 'XMLHttpRequest' }
                });
                const data = await response.json();

                if (data.success) {
                    pingResults.innerHTML = `<pre class="text-sm">${JSON.stringify(data.data, null, 2)}</pre>`;
                    statusMessage.className = 'mt-6 p-4 rounded-xl bg-green-100 text-green-800 border-2 border-green-300';
                    statusMessage.textContent = '✓ Ping test successful!';
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
            }
        });
    </script>
@endsection