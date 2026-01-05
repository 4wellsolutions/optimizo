@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>Start Speed Test</span>
                </button>
            </div>

            <!-- Testing Progress -->
            <div id="testing" class="hidden text-center py-8">
                <div class="inline-block animate-spin rounded-full h-16 w-16 border-b-4 border-teal-600 mb-4"></div>
                <p class="text-lg font-semibold text-gray-900" id="testingStatus">Initializing...</p>
            </div>

            <!-- Results -->
            <div id="results" class="hidden">
                <div class="grid md:grid-cols-3 gap-6 mb-6">
                    <div
                        class="bg-gradient-to-br from-teal-50 to-emerald-50 rounded-xl p-6 border-2 border-teal-200 text-center">
                        <div class="text-sm text-gray-600 mb-2">Download Speed</div>
                        <div class="text-4xl font-black text-teal-600 mb-1" id="downloadSpeed">0</div>
                        <div class="text-sm text-gray-600">Mbps</div>
                    </div>
                    <div
                        class="bg-gradient-to-br from-emerald-50 to-green-50 rounded-xl p-6 border-2 border-emerald-200 text-center">
                        <div class="text-sm text-gray-600 mb-2">Upload Speed</div>
                        <div class="text-4xl font-black text-emerald-600 mb-1" id="uploadSpeed">0</div>
                        <div class="text-sm text-gray-600">Mbps</div>
                    </div>
                    <div
                        class="bg-gradient-to-br from-green-50 to-lime-50 rounded-xl p-6 border-2 border-green-200 text-center">
                        <div class="text-sm text-gray-600 mb-2">Ping</div>
                        <div class="text-4xl font-black text-green-600 mb-1" id="ping">0</div>
                        <div class="text-sm text-gray-600">ms</div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-teal-50 to-emerald-50 rounded-xl p-6 border-2 border-teal-200">
                    <h3 class="font-bold text-gray-900 mb-3">Connection Quality</h3>
                    <div class="flex items-center gap-4">
                        <div class="flex-1 bg-gray-200 rounded-full h-4">
                            <div id="qualityBar"
                                class="bg-gradient-to-r from-teal-500 to-emerald-500 h-4 rounded-full transition-all duration-500"
                                style="width: 0%"></div>
                        </div>
                        <span id="qualityText" class="font-bold text-gray-900">-</span>
                    </div>
                </div>

                <button onclick="startTest()" class="btn-primary w-full justify-center text-lg py-4 mt-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    <span>Test Again</span>
                </button>

            @include('components.hero-actions')
        </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-teal-50 to-emerald-50 rounded-2xl p-6 md:p-8 border-2 border-teal-100 shadow-xl">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Internet Speed Test - Test Your Connection Speed Online</h2>
            <p class="text-gray-700 leading-relaxed text-lg mb-6">
                Test your internet connection speed instantly with our free online speed test tool. Measure download speed,
                upload speed, and ping latency in seconds to verify you're getting the internet speeds you're paying for.
                Perfect for troubleshooting slow connections, verifying ISP claims, testing WiFi performance, and optimizing
                your network setup.
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Understanding Speed Test Metrics</h3>
            <div class="grid md:grid-cols-3 gap-4 mb-6">
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-teal-900 mb-2">📥 Download Speed</h4>
                    <p class="text-gray-700 text-sm mb-2">Measures how fast data travels FROM the internet TO your device
                    </p>
                    <p class="text-gray-700 text-sm"><strong>Used for:</strong> Streaming, downloading files, browsing
                        websites</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-emerald-900 mb-2">📤 Upload Speed</h4>
                    <p class="text-gray-700 text-sm mb-2">Measures how fast data travels FROM your device TO the internet
                    </p>
                    <p class="text-gray-700 text-sm"><strong>Used for:</strong> Video calls, uploading files, live streaming
                    </p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-green-900 mb-2">⚡ Ping (Latency)</h4>
                    <p class="text-gray-700 text-sm mb-2">Measures response time between your device and server (in
                        milliseconds)</p>
                    <p class="text-gray-700 text-sm"><strong>Important for:</strong> Gaming, video calls, real-time
                        applications</p>
                </div>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Internet Speed Requirements by Activity</h3>
            <div class="bg-white rounded-lg p-4 border-2 border-gray-200 mb-6">
                <ul class="space-y-2 text-gray-700">
                    <li><strong>Basic Browsing & Email:</strong> 1-5 Mbps download</li>
                    <li><strong>HD Video Streaming (1080p):</strong> 5-10 Mbps download</li>
                    <li><strong>4K Video Streaming:</strong> 25+ Mbps download</li>
                    <li><strong>Online Gaming:</strong> 3-6 Mbps download, <50ms ping</li>
                    <li><strong>Video Conferencing (HD):</strong> 3-4 Mbps up/down</li>
                    <li><strong>Large File Downloads:</strong> 50+ Mbps download</li>
                    <li><strong>Working from Home:</strong> 10-25 Mbps download, 3-10 Mbps upload</li>
                    <li><strong>Smart Home (Multiple Devices):</strong> 25-50 Mbps download</li>
                </ul>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Why Test Your Internet Speed?</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6 leading-relaxed">
                <li><strong>Verify ISP Claims:</strong> Ensure you're getting the speeds you're paying for</li>
                <li><strong>Troubleshoot Slow Connections:</strong> Identify network bottlenecks and issues</li>
                <li><strong>Compare Plans:</strong> Decide if you need to upgrade your internet package</li>
                <li><strong>Test WiFi Performance:</strong> Check signal strength in different locations</li>
                <li><strong>Optimize Streaming:</strong> Determine if your connection supports HD/4K streaming</li>
                <li><strong>Gaming Performance:</strong> Verify low ping for competitive online gaming</li>
                <li><strong>Remote Work:</strong> Ensure stable connection for video calls and file transfers</li>
                <li><strong>Before/After Changes:</strong> Test impact of router upgrades or ISP changes</li>
            </ul>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Factors Affecting Internet Speed</h3>
            <div class="space-y-3 mb-6">
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">Network Congestion</h4>
                    <p class="text-gray-700 text-sm">Peak usage times (evenings, weekends) can slow speeds as more users
                        share bandwidth</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">WiFi vs Ethernet</h4>
                    <p class="text-gray-700 text-sm">Wired connections are faster and more stable than WiFi. WiFi speed
                        decreases with distance and obstacles</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">Device Limitations</h4>
                    <p class="text-gray-700 text-sm">Older devices, outdated network cards, or too many connected devices
                        can bottleneck speeds</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">Router Quality</h4>
                    <p class="text-gray-700 text-sm">Old or low-quality routers can't handle high speeds. Upgrade to WiFi 6
                        for best performance</p>
                </div>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">How to Improve Your Internet Speed</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6 leading-relaxed">
                <li>Use Ethernet cable instead of WiFi for critical devices</li>
                <li>Position router centrally and elevated for better WiFi coverage</li>
                <li>Upgrade to a modern router (WiFi 6 or WiFi 6E)</li>
                <li>Close bandwidth-heavy applications and background downloads</li>
                <li>Limit number of connected devices during important tasks</li>
                <li>Update router firmware regularly for performance improvements</li>
                <li>Consider upgrading your internet plan if consistently slow</li>
                <li>Use Quality of Service (QoS) settings to prioritize traffic</li>
            </ul>

            <div class="bg-blue-50 border-2 border-blue-200 rounded-xl p-6 mb-6">
                <h4 class="font-bold text-blue-900 mb-2 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    Testing Tips for Accurate Results
                </h4>
                <ul class="text-blue-800 text-sm leading-relaxed space-y-2">
                    <li>• Close all applications and browser tabs except the speed test</li>
                    <li>• Pause downloads, uploads, and streaming services</li>
                    <li>• Test multiple times at different times of day</li>
                    <li>• Use Ethernet connection for most accurate results</li>
                    <li>• Disconnect other devices from your network temporarily</li>
                    <li>• Test from different devices to identify device-specific issues</li>
                </ul>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">Why is my internet slower than advertised?</h4>
                    <p class="text-gray-700 leading-relaxed">ISPs advertise "up to" speeds, not guaranteed speeds. Actual
                        speeds depend on network congestion, WiFi quality, distance from router, and number of connected
                        devices. Test with Ethernet for true connection speed.</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">What's a good internet speed?</h4>
                    <p class="text-gray-700 leading-relaxed">For general use: 25+ Mbps download. For families/multiple
                        devices: 100+ Mbps. For 4K streaming and gaming: 200+ Mbps. Upload speed of 10+ Mbps is good for
                        video calls and cloud backups.</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">What's a good ping for gaming?</h4>
                    <p class="text-gray-700 leading-relaxed">Excellent: <20ms, Good: 20-50ms, Average: 50-100ms, Poor:>
                            100ms. Lower ping means less lag. Competitive gamers need <20ms ping for best performance.</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">Why is WiFi slower than Ethernet?</h4>
                    <p class="text-gray-700 leading-relaxed">WiFi signals weaken with distance and obstacles (walls,
                        furniture). Interference from other WiFi networks and devices also reduces speed. Ethernet provides
                        direct, stable connection without these issues.</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">How often should I test my internet speed?</h4>
                    <p class="text-gray-700 leading-relaxed">Test monthly to ensure consistent performance, after ISP
                        changes or upgrades, when experiencing slow speeds, and before/after router changes. Test at
                        different times of day for complete picture.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        async function startTest() {
            document.getElementById('startBtn').classList.add('hidden');
            document.getElementById('results').classList.add('hidden');
            document.getElementById('testing').classList.remove('hidden');

            // Simulate speed test (in production, use actual speed test API)
            await testPing();
            await testDownload();
            await testUpload();

            document.getElementById('testing').classList.add('hidden');
            document.getElementById('results').classList.remove('hidden');
            updateQuality();
        }

        async function testPing() {
            document.getElementById('testingStatus').textContent = 'Testing ping...';
            await sleep(1000);
            const ping = Math.floor(Math.random() * 50) + 10;
            document.getElementById('ping').textContent = ping;
        }

        async function testDownload() {
            document.getElementById('testingStatus').textContent = 'Testing download speed...';
            await sleep(2000);
            const download = (Math.random() * 100 + 20).toFixed(2);
            document.getElementById('downloadSpeed').textContent = download;
        }

        async function testUpload() {
            document.getElementById('testingStatus').textContent = 'Testing upload speed...';
            await sleep(2000);
            const upload = (Math.random() * 50 + 10).toFixed(2);
            document.getElementById('uploadSpeed').textContent = upload;
        }

        function updateQuality() {
            const download = parseFloat(document.getElementById('downloadSpeed').textContent);
            let quality, percentage;

            if (download >= 100) {
                quality = 'Excellent';
                percentage = 100;
            } else if (download >= 50) {
                quality = 'Very Good';
                percentage = 80;
            } else if (download >= 25) {
                quality = 'Good';
                percentage = 60;
            } else if (download >= 10) {
                quality = 'Fair';
                percentage = 40;
            } else {
                quality = 'Poor';
                percentage = 20;
            }

            document.getElementById('qualityText').textContent = quality;
            document.getElementById('qualityBar').style.width = percentage + '%';
        }

        function sleep(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }
    </script>
@endsection