@extends('layouts.app')

@section('title', 'Pressure Converter - Pascal, Bar, PSI, Atm')
@section('meta_description', 'Convert pressure units instantly. Pascal to Bar, PSI to Atmospheres, and mmHg conversions.')
@section('meta_keywords', 'pressure converter, psi to bar, pascal to atm, mmhg conversion, tyre pressure')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        {{-- Hero Section --}}
        {{-- Hero Section --}}
        <x-tool-hero :tool="$tool" />

        {{-- Converter Card --}}
        <div class="bg-white rounded-3xl p-6 md:p-10 shadow-2xl border border-gray-100 mb-12 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-purple-500 to-indigo-600"></div>

            <div class="grid md:grid-cols-7 gap-6 items-center">
                {{-- From Section --}}
                <div class="md:col-span-3 space-y-2">
                    <label for="fromValue"
                        class="block text-sm font-bold text-gray-700 uppercase tracking-wide">From</label>
                    <div class="relative">
                        <input type="number" id="fromValue" value="1" step="any"
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-purple-100 focus:border-purple-500 transition-all text-gray-800 placeholder-gray-300"
                            placeholder="0" oninput="convert('from')">
                    </div>
                    <select id="fromUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <option value="Pa">Pascal (Pa)</option>
                        <option value="kPa">Kilopascal (kPa)</option>
                        <option value="bar" selected>Bar</option>
                        <option value="psi">PSI (lb/in²)</option>
                        <option value="atm">Atmosphere (atm)</option>
                        <option value="mmHg">Millimeter of Mercury (mmHg)</option>
                    </select>
                </div>

                {{-- Swap Button --}}
                <div class="md:col-span-1 flex justify-center py-4 md:py-0">
                    <button onclick="swapUnits()"
                        class="p-4 bg-purple-50 text-purple-600 rounded-full hover:bg-purple-100 hover:scale-110 active:scale-95 transition-all shadow-md focus:outline-none focus:ring-4 focus:ring-purple-100"
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
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-purple-100 focus:border-purple-500 transition-all text-gray-800 placeholder-gray-300 bg-gray-50"
                            placeholder="0" oninput="convert('to')">
                    </div>
                    <select id="toUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <option value="Pa">Pascal (Pa)</option>
                        <option value="kPa">Kilopascal (kPa)</option>
                        <option value="bar">Bar</option>
                        <option value="psi" selected>PSI (lb/in²)</option>
                        <option value="atm">Atmosphere (atm)</option>
                        <option value="mmHg">Millimeter of Mercury (mmHg)</option>
                    </select>
                </div>
            </div>

            {{-- Formula Display --}}
            <div class="mt-8 p-4 bg-gray-50 rounded-xl border border-gray-100 text-center">
                <p id="formulaDisplay" class="text-purple-600 font-medium font-mono text-sm sm:text-base"></p>
            </div>
        </div>

        {{-- SEO Content Section --}}
        <div class="space-y-12">
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center text-purple-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Pressure Units</h3>
                    <p class="text-gray-600">Convert between PSI, bar, pascal, atmosphere, and more pressure units.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Automotive & Weather</h3>
                    <p class="text-gray-600">Perfect for tire pressure, weather forecasting, and industrial applications.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Scientific Precision</h3>
                    <p class="text-gray-600">Accurate conversions for engineering, diving, and scientific research.</p>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Understanding Pressure Conversion</h2>
                <div class="prose prose-purple max-w-none text-gray-600">
                    <p>Pressure measures force per unit area. Different industries use different units: PSI (pounds per
                        square inch) in automotive, bar in meteorology, pascal (Pa) in science, and atmospheres (atm) in
                        diving. Understanding these conversions is essential for tire maintenance, weather analysis, and
                        engineering applications.</p>
                    <p class="mt-4">The SI unit is the pascal (1 Pa = 1 N/m²). One bar equals 100,000 pascals and is close
                        to atmospheric pressure at sea level. One atmosphere equals approximately 14.7 PSI or 1.01325 bar.
                        PSI is commonly used in the US for tire pressure, while bar is standard in Europe.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">Common Usage Examples</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Automotive:</strong> Tire pressure specifications (PSI vs bar)</li>
                            <li><strong>Weather:</strong> Atmospheric pressure in meteorology (hPa, mb)</li>
                            <li><strong>Diving:</strong> Underwater pressure calculations in atmospheres</li>
                        </ul>
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Engineering:</strong> Hydraulic system pressure ratings</li>
                            <li><strong>Aviation:</strong> Cabin pressure and altitude measurements</li>
                            <li><strong>Industrial:</strong> Compressed air and gas pressure systems</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-purple-50 to-white rounded-3xl p-8 border border-purple-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                    Frequently Asked Questions
                </h2>
                <div class="space-y-6">
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">How do I convert PSI to bar?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Divide PSI by 14.504. For example, 30 PSI ÷ 14.504
                            ≈ 2.07 bar. This is useful for tire pressure conversions between US and European specifications.
                        </p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">What is atmospheric pressure?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Standard atmospheric pressure at sea level is 1
                            atmosphere (atm), equal to 101,325 pascals, 1.01325 bar, or 14.7 PSI. It decreases with
                            altitude.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">Why is tire pressure measured in PSI or bar?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">PSI (pounds per square inch) is traditional in the
                            US, while bar is standard in Europe. Both are convenient scales for typical tire pressures
                            (30-35 PSI or 2-2.4 bar).</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">What's the difference between gauge and absolute pressure?
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Gauge pressure measures relative to atmospheric
                            pressure (tire gauges show gauge pressure). Absolute pressure includes atmospheric pressure.
                            Absolute = Gauge + Atmospheric.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Conversion rates relative to Pascal (Pa)
        const rates = {
            'Pa': 1,
            'kPa': 1000,
            'bar': 100000,
            'psi': 6894.757293,
            'atm': 101325,
            'mmHg': 133.322387415
        };

        const names = {
            'Pa': 'Pascals', 'kPa': 'Kilopascals', 'bar': 'Bar',
            'psi': 'PSI', 'atm': 'Atmospheres', 'mmHg': 'mmHg'
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