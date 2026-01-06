@extends('layouts.app')

@section('title', 'Speed Converter - Free Online Unit Converter')
@section('meta_description', 'Convert speed units instantly. Miles per hour to Kilometers per hour, Meters per second, and Knots.')
@section('meta_keywords', 'speed converter, mph to kph, knots conversion, speed limit converter')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        {{-- Hero Section --}}
        {{-- Hero Section --}}
        <x-tool-hero :tool="$tool" />

        {{-- Converter Card --}}
        <div class="bg-white rounded-3xl p-6 md:p-10 shadow-2xl border border-gray-100 mb-12 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-indigo-500 to-purple-600"></div>

            <div class="grid md:grid-cols-7 gap-6 items-center">
                {{-- From Section --}}
                <div class="md:col-span-3 space-y-2">
                    <label for="fromValue"
                        class="block text-sm font-bold text-gray-700 uppercase tracking-wide">From</label>
                    <div class="relative">
                        <input type="number" id="fromValue" value="1" step="any"
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 transition-all text-gray-800 placeholder-gray-300"
                            placeholder="0" oninput="convert('from')">
                    </div>
                    <select id="fromUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <option value="kph" selected>Kilometers per Hour (km/h)</option>
                        <option value="mph">Miles per Hour (mph)</option>
                        <option value="mps">Meters per Second (m/s)</option>
                        <option value="knot">Knots (kn)</option>
                        <option value="mach">Mach (Standard Atmosphere)</option>
                    </select>
                </div>

                {{-- Swap Button --}}
                <div class="md:col-span-1 flex justify-center py-4 md:py-0">
                    <button onclick="swapUnits()"
                        class="p-4 bg-indigo-50 text-indigo-600 rounded-full hover:bg-indigo-100 hover:scale-110 active:scale-95 transition-all shadow-md focus:outline-none focus:ring-4 focus:ring-indigo-100"
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
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 transition-all text-gray-800 placeholder-gray-300 bg-gray-50"
                            placeholder="0" oninput="convert('to')">
                    </div>
                    <select id="toUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <option value="kph">Kilometers per Hour (km/h)</option>
                        <option value="mph" selected>Miles per Hour (mph)</option>
                        <option value="mps">Meters per Second (m/s)</option>
                        <option value="knot">Knots (kn)</option>
                        <option value="mach">Mach (Standard)</option>
                    </select>
                </div>
            </div>

            {{-- Formula Display --}}
            <div class="mt-8 p-4 bg-gray-50 rounded-xl border border-gray-100 text-center">
                <p id="formulaDisplay" class="text-indigo-600 font-medium font-mono text-sm sm:text-base"></p>
            </div>
        </div>

        {{-- SEO Content Section --}}
        <div class="space-y-12">
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Multiple Speed Units</h3>
                    <p class="text-gray-600">Convert between MPH, KPH, knots, meters/second, and even Mach numbers.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Travel & Navigation</h3>
                    <p class="text-gray-600">Perfect for international travel, maritime navigation, and aviation
                        calculations.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center text-purple-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Real-Time Results</h3>
                    <p class="text-gray-600">Instant speed conversions for driving, flying, sailing, and running.</p>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Understanding Speed Conversion</h2>
                <div class="prose prose-indigo max-w-none text-gray-600">
                    <p>Speed measures how fast an object moves over time. Different regions and industries use different
                        units: miles per hour (MPH) in the US, kilometers per hour (KPH) globally, knots for maritime and
                        aviation, and meters per second (m/s) in scientific contexts. Understanding these conversions is
                        essential for international travel, navigation, and physics calculations.</p>
                    <p class="mt-4">One mile equals 1.609 kilometers, so 60 MPH equals approximately 96.5 KPH. Knots measure
                        nautical miles per hour, where one nautical mile equals 1.852 kilometers. Mach numbers represent
                        multiples of the speed of sound (approximately 343 m/s at sea level), commonly used in aerospace
                        engineering.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">Common Usage Examples</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Driving:</strong> Converting speed limits when traveling between US and Europe</li>
                            <li><strong>Aviation:</strong> Understanding aircraft speeds in knots and Mach</li>
                            <li><strong>Maritime:</strong> Ship navigation using knots</li>
                        </ul>
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Athletics:</strong> Running pace conversions (min/km to min/mile)</li>
                            <li><strong>Physics:</strong> Velocity calculations in m/s</li>
                            <li><strong>Weather:</strong> Wind speed measurements</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-indigo-50 to-white rounded-3xl p-8 border border-indigo-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                    Frequently Asked Questions
                </h2>
                <div class="space-y-6">
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">How do I convert KPH to MPH?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Divide the KPH value by 1.609. For example, 100 KPH
                            ÷ 1.609 ≈ 62 MPH. Our converter does this instantly!</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">What is a knot in speed?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">A knot is one nautical mile per hour. It equals
                            1.852 KPH or about 1.15 MPH. It's the standard speed unit in maritime and aviation.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">How fast is Mach 1?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Mach 1 is the speed of sound, approximately 343 m/s
                            (1,235 KPH or 767 MPH) at sea level. The exact value varies with temperature and altitude.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">Why do ships use knots instead of MPH?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Knots relate directly to nautical miles, which
                            align with latitude/longitude coordinates (1 minute of latitude = 1 nautical mile), making
                            navigation calculations easier.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Conversion rates relative to Meters per Second (m/s)
        const rates = {
            'mps': 1,
            'kph': 0.277777778,
            'mph': 0.44704,
            'knot': 0.514444444,
            'mach': 340.29
        };

        const names = {
            'mps': 'Meters per Second', 'kph': 'Kilometers per Hour', 'mph': 'Miles per Hour',
            'knot': 'Knots', 'mach': 'Mach'
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