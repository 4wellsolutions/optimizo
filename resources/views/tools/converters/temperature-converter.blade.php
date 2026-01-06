@extends('layouts.app')

@section('title', 'Temperature Converter - Celsius, Fahrenheit, Kelvin')
@section('meta_description', 'Convert temperature readings between Celsius, Fahrenheit, and Kelvin scales instantly.')
@section('meta_keywords', 'temperature converter, celsius to fahrenheit, kelvin to celsius, fahrenheit to celsius')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        {{-- Hero Section --}}
        {{-- Hero Section --}}
        <x-tool-hero :tool="$tool" />

        {{-- Converter Card --}}
        <div class="bg-white rounded-3xl p-6 md:p-10 shadow-2xl border border-gray-100 mb-12 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-red-500 to-orange-600"></div>

            <div class="grid md:grid-cols-7 gap-6 items-center">
                {{-- From Section --}}
                <div class="md:col-span-3 space-y-2">
                    <label for="fromValue"
                        class="block text-sm font-bold text-gray-700 uppercase tracking-wide">From</label>
                    <div class="relative">
                        <input type="number" id="fromValue" value="0" step="any"
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-red-100 focus:border-red-500 transition-all text-gray-800 placeholder-gray-300"
                            placeholder="0" oninput="convert('from')">
                    </div>
                    <select id="fromUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <option value="c" selected>Celsius (°C)</option>
                        <option value="f">Fahrenheit (°F)</option>
                        <option value="k">Kelvin (K)</option>
                    </select>
                </div>

                {{-- Swap Button --}}
                <div class="md:col-span-1 flex justify-center py-4 md:py-0">
                    <button onclick="swapUnits()"
                        class="p-4 bg-red-50 text-red-600 rounded-full hover:bg-red-100 hover:scale-110 active:scale-95 transition-all shadow-md focus:outline-none focus:ring-4 focus:ring-red-100"
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
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-red-100 focus:border-red-500 transition-all text-gray-800 placeholder-gray-300 bg-gray-50"
                            placeholder="0" oninput="convert('to')">
                    </div>
                    <select id="toUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <option value="c">Celsius (°C)</option>
                        <option value="f" selected>Fahrenheit (°F)</option>
                        <option value="k">Kelvin (K)</option>
                    </select>
                </div>
            </div>

            {{-- Formula Display --}}
            <div class="mt-8 p-4 bg-gray-50 rounded-xl border border-gray-100 text-center">
                <p id="formulaDisplay" class="text-red-600 font-medium font-mono text-sm sm:text-base"></p>
            </div>
        </div>

        {{-- SEO Content Section --}}
        <div class="space-y-12">
            {{-- Feature Grid --}}
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center text-red-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Three Major Scales</h3>
                    <p class="text-gray-600">Convert between Celsius, Fahrenheit, and Kelvin with precision for any
                        application.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center text-orange-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Accurate Formulas</h3>
                    <p class="text-gray-600">Uses standard conversion formulas for weather, cooking, science, and
                        engineering.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center text-yellow-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Real-Time Conversion</h3>
                    <p class="text-gray-600">Instant bidirectional conversion as you type in any temperature field.</p>
                </div>
            </div>

            {{-- Long Content --}}
            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Understanding Temperature Conversion</h2>
                <div class="prose prose-red max-w-none text-gray-600">
                    <p>
                        Temperature measures the degree of hotness or coldness of an object or environment. Three main
                        scales are used worldwide:
                        <strong>Celsius (°C)</strong> is the metric standard used globally, <strong>Fahrenheit (°F)</strong>
                        is primarily used in the United States,
                        and <strong>Kelvin (K)</strong> is the absolute thermodynamic scale used in scientific research.
                    </p>
                    <p class="mt-4">
                        The Celsius scale is based on water's freezing (0°C) and boiling points (100°C) at standard
                        atmospheric pressure.
                        Fahrenheit sets water's freezing point at 32°F and boiling at 212°F. Kelvin starts at absolute zero
                        (-273.15°C),
                        the theoretical point where all molecular motion stops, making it ideal for scientific calculations.
                    </p>

                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">Common Usage Examples</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Weather Forecasts:</strong> Converting between °C and °F for international travel
                            </li>
                            <li><strong>Cooking & Baking:</strong> Oven temperature conversions for recipes</li>
                            <li><strong>Medical Applications:</strong> Body temperature readings in different scales</li>
                        </ul>
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Scientific Research:</strong> Using Kelvin for thermodynamic calculations</li>
                            <li><strong>HVAC Systems:</strong> Setting thermostats in different regions</li>
                            <li><strong>Industrial Processes:</strong> Monitoring manufacturing temperatures</li>
                        </ul>
                    </div>

                    <div class="mt-6 p-4 bg-red-50 rounded-xl border border-red-100">
                        <h4 class="font-bold text-gray-900 mb-2">Quick Conversion Formulas</h4>
                        <div class="space-y-1 text-sm font-mono">
                            <p>°C = (°F - 32) × 5/9</p>
                            <p>°F = (°C × 9/5) + 32</p>
                            <p>K = °C + 273.15</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- FAQ Section --}}
            <div class="bg-gradient-to-br from-red-50 to-white rounded-3xl p-8 border border-red-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                    Frequently Asked Questions
                </h2>
                <div class="space-y-6">
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">What is the easiest way to convert Celsius to Fahrenheit?
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Multiply the Celsius temperature by 9/5 (or 1.8),
                            then add 32. For example: 20°C × 1.8 + 32 = 68°F. Our converter does this instantly for you!</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">Why does the US use Fahrenheit instead of Celsius?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">The Fahrenheit scale was established before Celsius
                            and became deeply embedded in American culture and infrastructure. While most countries adopted
                            the metric system (including Celsius), the US retained Fahrenheit for everyday temperature
                            measurements.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">What is absolute zero in different scales?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Absolute zero is 0 Kelvin, -273.15°C, or -459.67°F.
                            This is the theoretical lowest possible temperature where molecular motion ceases completely.
                        </p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">When should I use Kelvin instead of Celsius?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Kelvin is preferred in scientific contexts,
                            especially in physics and chemistry, because it's an absolute scale with no negative values.
                            It's essential for gas law calculations, thermodynamics, and astronomical measurements.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toCelsius(val, unit) {
            if (unit === 'c') return val;
            if (unit === 'f') return (val - 32) * 5 / 9;
            if (unit === 'k') return val - 273.15;
            return val;
        }

        function fromCelsius(celsius, unit) {
            if (unit === 'c') return celsius;
            if (unit === 'f') return (celsius * 9 / 5) + 32;
            if (unit === 'k') return celsius + 273.15;
            return celsius;
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
                if (isNaN(val)) {
                    toInput.value = '';
                    updateFormula(null);
                    return;
                }

                // Convert to Celsius first
                const celsius = toCelsius(val, fromUnit);
                // Convert to target
                result = fromCelsius(celsius, toUnit);

                toInput.value = parseFloat(result.toPrecision(12)) / 1;
            } else {
                val = parseFloat(toInput.value);
                if (isNaN(val)) {
                    fromInput.value = '';
                    updateFormula(null);
                    return;
                }

                // Reverse logic
                const celsius = toCelsius(val, toUnit);
                result = fromCelsius(celsius, fromUnit);

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

            let formula = '';
            if (from === 'c' && to === 'f') formula = '(°C × 9/5) + 32 = °F';
            else if (from === 'f' && to === 'c') formula = '(°F - 32) × 5/9 = °C';
            else if (from === 'c' && to === 'k') formula = '°C + 273.15 = K';
            else if (from === 'k' && to === 'c') formula = 'K - 273.15 = °C';
            else if (from === 'f' && to === 'k') formula = '(°F - 32) × 5/9 + 273.15 = K';
            else if (from === 'k' && to === 'f') formula = '(K - 273.15) × 9/5 + 32 = °F';
            else formula = `${from.toUpperCase()} = ${to.toUpperCase()}`;

            display.innerText = formula;
        }

        // Initialize
        window.addEventListener('load', () => convert('from'));
    </script>
@endsection