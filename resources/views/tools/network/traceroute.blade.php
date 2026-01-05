@extends('layouts.app')
@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" icon="traceroute" />

        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <form id="traceForm">
                @csrf
                <div class="mb-6">
                    <label for="host" class="form-label text-base">Host or Domain</label>
                    <input type="text" id="host" name="host" class="form-input" placeholder="google.com" required>
                </div>
                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 013.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                    </svg>
                    <span>Trace Route</span>
                </button>
            </form>
            <div id="statusMessage" class="hidden mt-6 p-4 rounded-xl"></div>
            <div id="resultSection" class="hidden mt-6">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Route Trace</h3>
                <div id="traceResults" class="bg-gray-50 p-4 rounded-xl"></div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">What is Traceroute?</h2>
            <p class="text-gray-700 mb-4">Traceroute is a network diagnostic tool that displays the route and measures
                transit delays of packets across an Internet Protocol network. It shows the path data takes from your
                computer to a destination server, revealing every router (hop) the packets pass through. Each hop represents
                a network device that forwards your data closer to its final destination. Traceroute helps identify where
                network slowdowns or failures occur by showing the exact point in the network path where problems arise.</p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Why Use Traceroute?</h2>
            <p class="text-gray-700 mb-4">Network administrators use traceroute to diagnose routing problems, identify
                network bottlenecks, and understand network topology. When a website is slow or unreachable, traceroute
                reveals whether the problem is with your ISP, an intermediate network, or the destination server. It's
                invaluable for troubleshooting connectivity issues, optimizing network performance, and understanding how
                data travels across the internet. Security professionals use it to identify suspicious routing patterns that
                might indicate network attacks or misconfigurations.</p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Understanding Hops</h2>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
                <li><strong>Hop Number:</strong> Sequential number of each router in the path</li>
                <li><strong>IP Address:</strong> The router's IP address at each hop</li>
                <li><strong>Hostname:</strong> Domain name of the router (if available)</li>
                <li><strong>Response Time:</strong> How long it took to reach that hop</li>
                <li><strong>Asterisks (*):</strong> Indicate timeouts or routers that don't respond</li>
                <li><strong>Total Hops:</strong> Complete number of routers in the path</li>
            </ul>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Common Issues Revealed</h2>
            <p class="text-gray-700 mb-4">Traceroute can identify routing loops where packets circle between routers, high
                latency at specific hops indicating network congestion, packet loss at particular points in the network, and
                inefficient routing paths. If response times suddenly increase at a specific hop, that router or network
                segment is likely causing delays. Multiple timeouts suggest firewall blocking or router configuration
                issues. Understanding these patterns helps pinpoint exactly where network problems originate.</p>
        </div>

        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl shadow-xl p-6 md:p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">FAQ</h2>
            <div class="space-y-4">
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">How many hops is normal?</h3>
                    <p class="text-gray-700">Typically 10-20 hops for most destinations. More hops don't necessarily mean
                        slower connections.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">What do asterisks (*) mean?</h3>
                    <p class="text-gray-700">Asterisks indicate the router didn't respond within the timeout period, often
                        due to firewall rules blocking ICMP.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Why does the path change?</h3>
                    <p class="text-gray-700">Internet routing is dynamic. Paths can change based on network conditions, load
                        balancing, and routing policies.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Can I see my ISP's routers?</h3>
                    <p class="text-gray-700">Yes, the first few hops typically show your ISP's network infrastructure before
                        reaching backbone networks.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Is traceroute always accurate?</h3>
                    <p class="text-gray-700">Traceroute provides a snapshot in time. Results can vary between runs due to
                        dynamic routing and network conditions.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const form = document.getElementById('traceForm');
        const submitBtn = form.querySelector('button[type="submit"]');
        const btnText = submitBtn.querySelector('span');
        const btnIcon = submitBtn.querySelector('svg');

        document.getElementById('traceForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(e.target);
            const statusMessage = document.getElementById('statusMessage');
            const resultSection = document.getElementById('resultSection');
            const traceResults = document.getElementById('traceResults');

            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
            btnText.textContent = 'Tracing...';
            btnIcon.classList.add('animate-spin');

            statusMessage.classList.add('hidden');
            resultSection.classList.add('hidden');

            try {
                const response = await fetch('{{ route("network.traceroute.trace") }}', {
                    method: 'POST', body: formData, headers: { 'X-Requested-With': 'XMLHttpRequest' }
                });
                const data = await response.json();

                if (data.success) {
                    traceResults.innerHTML = `<pre class="text-sm">${JSON.stringify(data.data, null, 2)}</pre>`;
                    statusMessage.className = 'mt-6 p-4 rounded-xl bg-green-100 text-green-800 border-2 border-green-300';
                    statusMessage.textContent = '✓ Traceroute successful!';
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
                btnText.textContent = 'Trace Route';
                btnIcon.classList.remove('animate-spin');
            }
        });
    </script>
@endsection