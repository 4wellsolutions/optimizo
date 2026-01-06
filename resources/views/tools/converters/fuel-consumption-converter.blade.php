@extends('layouts.app')

@section('title', 'Fuel Consumption Converter - MPG, km/L, L/100km')
@section('meta_description', 'Convert fuel consumption units instantly. Miles per Gallon (MPG) to L/100km and Kilometers per Liter.')
@section('meta_keywords', 'fuel converter, mpg to l/100km, km/l to mpg, fuel efficiency calculator')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        {{-- Hero Section --}}
        {{-- Hero Section --}}
        <x-tool-hero :tool="$tool" />

        {{-- Converter Card --}}
        <div class="bg-white rounded-3xl p-6 md:p-10 shadow-2xl border border-gray-100 mb-12 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-green-600 to-teal-700"></div>

            <div class="grid md:grid-cols-7 gap-6 items-center">
                {{-- From Section --}}
                <div class="md:col-span-3 space-y-2">
                    <label for="fromValue"
                        class="block text-sm font-bold text-gray-700 uppercase tracking-wide">From</label>
                    <div class="relative">
                        <input type="number" id="fromValue" value="10" step="any"
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-green-100 focus:border-green-500 transition-all text-gray-800 placeholder-gray-300"
                            placeholder="0" oninput="convert('from')">
                    </div>
                    <select id="fromUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <option value="mpg_us" selected>MPG (US)</option>
                        <option value="mpg_uk">MPG (UK)</option>
                        <option value="km_l">Kilometers/Liter (km/L)</option>
                        <option value="l_100km">Liters/100km</option>
                    </select>
                </div>

                {{-- Swap Button --}}
                <div class="md:col-span-1 flex justify-center py-4 md:py-0">
                    <button onclick="swapUnits()"
                        class="p-4 bg-green-50 text-green-600 rounded-full hover:bg-green-100 hover:scale-110 active:scale-95 transition-all shadow-md focus:outline-none focus:ring-4 focus:ring-green-100"
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
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-green-100 focus:border-green-500 transition-all text-gray-800 placeholder-gray-300 bg-gray-50"
                            placeholder="0" oninput="convert('to')">
                    </div>
                    <select id="toUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <option value="mpg_us">MPG (US)</option>
                        <option value="mpg_uk">MPG (UK)</option>
                        <option value="km_l">Kilometers/Liter (km/L)</option>
                        <option value="l_100km" selected>Liters/100km</option>
                    </select>
                </div>
            </div>

            {{-- Formula Display --}}
            <div class="mt-8 p-4 bg-gray-50 rounded-xl border border-gray-100 text-center">
                <p id="formulaDisplay" class="text-green-600 font-medium font-mono text-sm sm:text-base"></p>
            </div>
        </div>

        {{-- SEO Content Section --}}
        <div class="space-y-12">
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-green-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Fuel Economy Units</h3>
                    <p class="text-gray-600">Convert between MPG, L/100km, km/L, and imperial/US gallons.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Automotive & Travel</h3>
                    <p class="text-gray-600">Perfect for comparing vehicle efficiency and calculating trip fuel costs.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center text-emerald-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Inverse Relationship</h3>
                    <p class="text-gray-600">Handles efficiency (MPG) vs consumption (L/100km) conversions accurately.</p>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Understanding Fuel Consumption Conversion</h2>
                <div class="prose prose-green max-w-none text-gray-600">
                    <p>Fuel consumption measures how efficiently a vehicle uses fuel. Different regions use different
                        standards: MPG (miles per gallon) in the US and UK, L/100km (liters per 100 kilometers) in Europe
                        and most other countries, and km/L in some Asian markets. These units measure opposite concepts: MPG
                        shows efficiency (higher is better), while L/100km shows consumption (lower is better).</p>
                    <p class="mt-4">US and UK gallons differ: 1 US gallon = 3.785 liters, while 1 UK (imperial) gallon =
                        4.546 liters. This means a car rated at 30 MPG (US) equals about 36 MPG (UK). To convert MPG to
                        L/100km, use the formula: 235.21 ÷ MPG (US) = L/100km. Understanding these conversions is essential
                        for comparing vehicle specifications internationally and calculating fuel costs.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">Common Usage Examples</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Vehicle Shopping:</strong> Comparing fuel economy between US and European cars</li>
                            <li><strong>Trip Planning:</strong> Calculating fuel costs for road trips</li>
                            <li><strong>Fleet Management:</strong> Tracking vehicle efficiency across regions</li>
                        </ul>
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Environmental Impact:</strong> Assessing carbon footprint from fuel use</li>
                            <li><strong>Budget Planning:</strong> Estimating monthly fuel expenses</li>
                            <li><strong>International Relocation:</strong> Understanding local fuel economy standards</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-green-50 to-white rounded-3xl p-8 border border-green-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                    Frequently Asked Questions
                </h2>
                <div class="space-y-6">
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">How do I convert MPG to L/100km?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Divide 235.21 by MPG (US). For example, 30 MPG →
                            235.21 ÷ 30 = 7.84 L/100km. Note: higher MPG means lower L/100km (inverse relationship).</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">What's the difference between US and UK MPG?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">UK (imperial) gallons are 20% larger than US
                            gallons. A car rated at 30 MPG (US) equals about 36 MPG (UK). Always check which gallon type is
                            used!</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">Which is better: higher MPG or lower L/100km?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Both indicate better fuel efficiency! Higher MPG
                            means more miles per gallon (good), while lower L/100km means less fuel per distance (also
                            good). They're inversely related.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">Why does Europe use L/100km instead of MPG?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">L/100km directly shows fuel consumption for a
                            standard distance, making it easier to calculate fuel costs. It's also metric-based, aligning
                            with European measurement standards.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Use a conversion map to standardized "MPG (US)"
        // For L/100km, the relationship is inverse: x mpg = 235.215 / y l/100km

        function toMpgUs(val, unit) {
            if (val === 0) return 0; // Avoid division by zero issues
            if (unit === 'mpg_us') return val;
            if (unit === 'mpg_uk') return val / 1.20095;
            if (unit === 'km_l') return val * 2.35215;
            if (unit === 'l_100km') return 235.215 / val;
            return val;
        }

        function fromMpgUs(mpg, unit) {
            if (mpg === 0) return 0;
            if (unit === 'mpg_us') return mpg;
            if (unit === 'mpg_uk') return mpg * 1.20095;
            if (unit === 'km_l') return mpg / 2.35215;
            if (unit === 'l_100km') return 235.215 / mpg;
            return mpg;
        }

        function convert(source) {
            const fromUnit = document.getElementById('fromUnit').value;
            const toUnit = document.getElementById('toUnit').value;
            const fromInput = document.getElementById('fromValue');
            const toInput = document.getElementById('toValue');

            let val;
            let result;

            if (source === 'from') {
                val = parseFloat(fromInput.value);
                // Handle 0 or invalid input specially for inverse units
                if (isNaN(val)) {
                    toInput.value = '';
                    updateFormula(null);
                    return;
                }

                // Convert to Base (MPG US)
                const baseMpg = toMpgUs(val, fromUnit);
                // Convert to Target
                result = fromMpgUs(baseMpg, toUnit);

                // Precision handling
                toInput.value = parseFloat(result.toPrecision(8)) / 1;
            } else {
                val = parseFloat(toInput.value);
                if (isNaN(val)) {
                    fromInput.value = '';
                    updateFormula(null);
                    return;
                }

                const baseMpg = toMpgUs(val, toUnit);
                result = fromMpgUs(baseMpg, fromUnit);

                fromInput.value = parseFloat(result.toPrecision(8)) / 1;
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

            // Generate dynamic text since formula varies
            if (from === 'l_100km' || to === 'l_100km') {
                display.innerText = "Inverse relationship: Higher value means less efficiency.";
            } else {
                display.innerText = "Direct conversion.";
            }
        }

        // Initialize
        window.addEventListener('load', () => convert('from'));
    </script>
@endsection