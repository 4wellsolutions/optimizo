@extends('layouts.app')

@section('title', 'Weight Converter - Free Online Unit Converter')
@section('meta_description', 'Convert weight and mass units instantly. Supports Kilograms, Grams, Pounds, Ounces, Metric Tons, and Milligrams.')
@section('meta_keywords', 'weight converter, mass converter, kg to lbs, pounds to kg, grams to ounces')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        {{-- Hero Section --}}
        {{-- Hero Section --}}
        <x-tool-hero :tool="$tool" />

        {{-- Converter Card --}}
        <div class="bg-white rounded-3xl p-6 md:p-10 shadow-2xl border border-gray-100 mb-12 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-green-500 to-teal-600"></div>

            <div class="grid md:grid-cols-7 gap-6 items-center">
                {{-- From Section --}}
                <div class="md:col-span-3 space-y-2">
                    <label for="fromValue"
                        class="block text-sm font-bold text-gray-700 uppercase tracking-wide">From</label>
                    <div class="relative">
                        <input type="number" id="fromValue" value="1" step="any"
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-green-100 focus:border-green-500 transition-all text-gray-800 placeholder-gray-300"
                            placeholder="0" oninput="convert('from')">
                    </div>
                    <select id="fromUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <optgroup label="Metric">
                            <option value="mg">Milligram (mg)</option>
                            <option value="g">Gram (g)</option>
                            <option value="kg" selected>Kilogram (kg)</option>
                            <option value="t">Metric Ton (t)</option>
                        </optgroup>
                        <optgroup label="Imperial">
                            <option value="oz">Ounce (oz)</option>
                            <option value="lb">Pound (lb)</option>
                            <option value="st">Stone (st)</option>
                        </optgroup>
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
                        <optgroup label="Metric">
                            <option value="mg">Milligram (mg)</option>
                            <option value="g">Gram (g)</option>
                            <option value="kg">Kilogram (kg)</option>
                            <option value="t">Metric Ton (t)</option>
                        </optgroup>
                        <optgroup label="Imperial">
                            <option value="oz">Ounce (oz)</option>
                            <option value="lb" selected>Pound (lb)</option>
                            <option value="st">Stone (st)</option>
                        </optgroup>
                    </select>
                </div>
            </div>

            {{-- Formula Display --}}
            <div class="mt-8 p-4 bg-gray-50 rounded-xl border border-gray-100 text-center">
                <p id="formulaDisplay" class="text-green-600 font-medium font-mono text-sm sm:text-base"></p>
            </div>
        </div>

        {{-- Content Section --}}
        {{-- SEO Content Section --}}
        <div class="space-y-12">
            {{-- Feature Grid --}}
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-green-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Mass & Weight Units</h3>
                    <p class="text-gray-600">Convert between mass (kg, g) and weight (lb, oz) units seamlessly for any
                        application.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Scientific Accuracy</h3>
                    <p class="text-gray-600">Perfect for cooking, science projects, shipping calculations, and health
                        tracking.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center text-yellow-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Instant Results</h3>
                    <p class="text-gray-600">Type in any field to get immediate conversions without page reloads.</p>
                </div>
            </div>

            {{-- Long Content --}}
            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Understanding Weight and Mass Conversion</h2>
                <div class="prose prose-green max-w-none text-gray-600">
                    <p>
                        In everyday language, "weight" and "mass" are used interchangeably, but scientifically they are
                        different.
                        Mass is the amount of matter in an object (measured in kg, g), while weight is the force exerted on
                        that mass by gravity (technically measured in Newtons, but lb/kg are commonly used).
                    </p>
                    <p class="mt-4">
                        This converter handles standard mass units used in trade, commerce, and science. The Metric system
                        (grams, kilograms) is decimal-based, making it easy to scale.
                        The Imperial/US Customary system (ounces, pounds, stones) is based on older standards but is still
                        widely used in the US and UK.
                    </p>

                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">Common Usage Examples</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Cooking & Baking:</strong> Converting grams of flour to ounces for recipes</li>
                            <li><strong>Health & Fitness:</strong> Tracking body weight in kilograms vs pounds</li>
                            <li><strong>Shipping & Logistics:</strong> Calculating freight costs based on metric tons</li>
                        </ul>
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Jewelry & Precious Metals:</strong> Measuring gold in grams or troy ounces</li>
                            <li><strong>Science & Lab Work:</strong> Precise milligram measurements for experiments</li>
                            <li><strong>International Trade:</strong> Converting between metric and imperial standards</li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- FAQ Section --}}
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
                        <h3 class="font-bold text-gray-900 mb-2">How many grams are in a kilogram?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">There are exactly 1,000 grams in 1 kilogram. "Kilo"
                            is the metric prefix for thousand, making the conversion straightforward.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">How do I convert pounds to kilograms?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">To convert pounds to kilograms, divide the pound
                            value by approximately 2.20462. For example, 150 lbs ÷ 2.20462 = 68.04 kg. Our converter does
                            this instantly!</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">What is a metric ton?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">A metric ton (or tonne) is equal to 1,000 kilograms
                            or approximately 2,204.6 pounds. It is slightly larger than a US short ton (2,000 lbs) and is
                            commonly used in international shipping.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">Why is the stone unit still used?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">The stone (14 pounds) is still commonly used in the
                            UK and Ireland for measuring body weight. While not part of the metric system, it remains
                            popular for personal weight measurements in these regions.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Conversion rates relative to Gram (g)
        const rates = {
            'mg': 0.001,
            'g': 1,
            'kg': 1000,
            't': 1000000,
            'oz': 28.349523125,
            'lb': 453.59237,
            'st': 6350.29318
        };

        const names = {
            'mg': 'Milligrams', 'g': 'Grams', 'kg': 'Kilograms', 't': 'Metric Tons',
            'oz': 'Ounces', 'lb': 'Pounds', 'st': 'Stones'
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

                // Convert to base unit (g) then to target unit
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

                // Reverse conversion
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