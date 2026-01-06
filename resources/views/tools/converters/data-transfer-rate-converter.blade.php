@extends('layouts.app')

@section('title', 'Data Transfer Converter - Mbps, Gbps, KB/s')
@section('meta_description', 'Convert data transfer rates instantly. Mbps to MB/s, Gbps to KB/s, and internet speed conversions.')
@section('meta_keywords', 'data transfer converter, mbps to mb/s, internet speed calculator, bandwidth converter')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        {{-- Hero Section --}}
        {{-- Hero Section --}}
        <x-tool-hero :tool="$tool" />

        {{-- Converter Card --}}
        <div class="bg-white rounded-3xl p-6 md:p-10 shadow-2xl border border-gray-100 mb-12 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-cyan-500 to-blue-600"></div>

            <div class="grid md:grid-cols-7 gap-6 items-center">
                {{-- From Section --}}
                <div class="md:col-span-3 space-y-2">
                    <label for="fromValue"
                        class="block text-sm font-bold text-gray-700 uppercase tracking-wide">From</label>
                    <div class="relative">
                        <input type="number" id="fromValue" value="100" step="any"
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-cyan-100 focus:border-cyan-500 transition-all text-gray-800 placeholder-gray-300"
                            placeholder="0" oninput="convert('from')">
                    </div>
                    <select id="fromUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <option value="bps">Bit per second (bps)</option>
                        <option value="kbps">Kilobit per second (Kbps)</option>
                        <option value="Mbps" selected>Megabit per second (Mbps)</option>
                        <option value="Gbps">Gigabit per second (Gbps)</option>
                        <option value="kB_s">Kilobyte per second (KB/s)</option>
                        <option value="MB_s">Megabyte per second (MB/s)</option>
                        <option value="GB_s">Gigabyte per second (GB/s)</option>
                    </select>
                </div>

                {{-- Swap Button --}}
                <div class="md:col-span-1 flex justify-center py-4 md:py-0">
                    <button onclick="swapUnits()"
                        class="p-4 bg-cyan-50 text-cyan-600 rounded-full hover:bg-cyan-100 hover:scale-110 active:scale-95 transition-all shadow-md focus:outline-none focus:ring-4 focus:ring-cyan-100"
                        title="Swap Units">
                        <svg class="w-8 h-8 rotate-90 md:rotate-0 transition-transform duration-300" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                        </svg>
                    </button>
                </div>

                {{-- To Section --}}
                <div class="md:col-span-3 space-y-2">
                    <label for="toValue" class="block text-sm font-bold text-gray-700 uppercase tracking-wide">To</label>
                    <div class="relative">
                        <input type="number" id="toValue" step="any"
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-cyan-100 focus:border-cyan-500 transition-all text-gray-800 placeholder-gray-300 bg-gray-50"
                            placeholder="0" oninput="convert('to')">
                    </div>
                    <select id="toUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <option value="bps">Bit per second (bps)</option>
                        <option value="kbps">Kilobit per second (Kbps)</option>
                        <option value="Mbps">Megabit per second (Mbps)</option>
                        <option value="Gbps">Gigabit per second (Gbps)</option>
                        <option value="kB_s">Kilobyte per second (KB/s)</option>
                        <option value="MB_s" selected>Megabyte per second (MB/s)</option>
                        <option value="GB_s">Gigabyte per second (GB/s)</option>
                    </select>
                </div>
            </div>

            {{-- Formula Display --}}
            <div class="mt-8 p-4 bg-gray-50 rounded-xl border border-gray-100 text-center">
                <p id="formulaDisplay" class="text-cyan-600 font-medium font-mono text-sm sm:text-base"></p>
                <p class="text-xs text-gray-400 mt-2">1 Byte = 8 Bits</p>
            </div>
        </div>

        {{-- SEO Content Section --}}
        <div class="space-y-12">
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-cyan-100 rounded-xl flex items-center justify-center text-cyan-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Transfer Rate Units</h3>
                    <p class="text-gray-600">Convert between Mbps, Gbps, MB/s, KB/s, and more data transfer rates.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Internet & Networking</h3>
                    <p class="text-gray-600">Perfect for understanding internet speeds, download times, and network
                        performance.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Bits vs Bytes</h3>
                    <p class="text-gray-600">Accurately converts between bits (Mbps) and bytes (MB/s) for real-world speeds.
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Understanding Data Transfer Rate Conversion</h2>
                <div class="prose prose-cyan max-w-none text-gray-600">
                    <p>Data transfer rate measures how fast data moves between devices or over networks. Internet Service
                        Providers (ISPs) advertise speeds in megabits per second (Mbps) or gigabits per second (Gbps), while
                        file downloads display in megabytes per second (MB/s). Since 1 byte = 8 bits, a 100 Mbps connection
                        provides approximately 12.5 MB/s actual download speed.</p>
                    <p class="mt-4">Understanding this difference is crucial: a 1 Gbps (gigabit) connection equals 1,000
                        Mbps or about 125 MB/s. When downloading a 1 GB file on a 100 Mbps connection, it takes about 80
                        seconds (1,000 MB ÷ 12.5 MB/s). These conversions help you understand real-world performance,
                        compare internet plans, and estimate download times.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">Common Usage Examples</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Internet Plans:</strong> Understanding advertised speeds vs actual download rates
                            </li>
                            <li><strong>Download Time:</strong> Estimating how long files will take to download</li>
                            <li><strong>Network Performance:</strong> Measuring LAN and WAN transfer speeds</li>
                        </ul>
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Streaming:</strong> Determining bandwidth requirements for video quality</li>
                            <li><strong>Cloud Backup:</strong> Calculating upload times for large files</li>
                            <li><strong>IT Infrastructure:</strong> Specifying network equipment capabilities</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-cyan-50 to-white rounded-3xl p-8 border border-cyan-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                    Frequently Asked Questions
                </h2>
                <div class="space-y-6">
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">How do I convert Mbps to MB/s?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Divide Mbps by 8. For example, 100 Mbps ÷ 8 = 12.5
                            MB/s. This is your actual download speed, which is why downloads seem slower than advertised
                            internet speeds.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">Why is my download speed slower than my internet plan?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">ISPs advertise in Mbps (megabits), but downloads
                            show MB/s (megabytes). Since 1 byte = 8 bits, a 100 Mbps plan gives ~12.5 MB/s downloads. This
                            is normal!</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">How many Mbps do I need for 4K streaming?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">4K streaming typically requires 25-50 Mbps. Netflix
                            recommends 25 Mbps for Ultra HD quality. For multiple devices, add bandwidth for each stream.
                        </p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">What's the difference between Mbps and MBps?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Mbps (megabits per second) measures network speed,
                            while MBps or MB/s (megabytes per second) measures file transfer speed. 1 MBps = 8 Mbps.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Conversion rates relative to Bit per Second (bps)
        // Using standard decimal definition for transfer rates (1k = 1000)
        const rates = {
            'bps': 1,
            'kbps': 1000,
            'Mbps': 1000000,
            'Gbps': 1000000000,
            'kB_s': 8000,
            'MB_s': 8000000,
            'GB_s': 8000000000
        };

        const names = {
            'bps': 'bits/s', 'kbps': 'Kbps', 'Mbps': 'Mbps', 'Gbps': 'Gbps',
            'kB_s': 'KB/s', 'MB_s': 'MB/s', 'GB_s': 'GB/s'
        };

        function convert(source) {
            const fromUnit = document.getElementById('fromUnit').value;
            const toUnit = document.getElementById('toUnit').value;
            const fromInput = document.getElementById('fromValue');
            const toInput = document.getElementById('toValue');

            let value;
            if (source === 'from') {
                value = parseFloat(fromInput.value);
                if (isNaN(value)) {
                    toInput.value = '';
                    updateFormula(null);
                    return;
                }

                const baseValue = value * rates[fromUnit];
                const result = baseValue / rates[toUnit];
                toInput.value = parseFloat(result.toPrecision(12)) / 1;
            } else {
                value = parseFloat(toInput.value);
                if (isNaN(value)) {
                    fromInput.value = '';
                    updateFormula(null);
                    return;
                }

                const baseValue = value * rates[toUnit];
                const result = baseValue / rates[fromUnit];
                fromInput.value = parseFloat(result.toPrecision(12)) / 1;
            }

            updateFormula(fromUnit, toUnit);
        }

        function swapUnits() {
            const fromSelect = document.getElementById('fromUnit');
            const toSelect = document.getElementById('toUnit');
            const temp = fromSelect.value;

            fromSelect.value = toSelect.value;
            toSelect.value = temp;
            convert('from');
        }

        function updateFormula(from, to) {
            const display = document.getElementById('formulaDisplay');
            if (!from) {
                display.innerText = '';
                return;
            }
            const factor = rates[from] / rates[to];
            const cleanFactor = parseFloat(factor.toPrecision(8)) / 1;
            display.innerHTML = `1 ${names[from]} = ${cleanFactor} ${names[to]}`;
        }

        // Initialize
        window.addEventListener('load', () => convert('from'));
    </script>
@endsection