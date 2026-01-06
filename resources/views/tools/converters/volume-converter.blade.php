@extends('layouts.app')

@section('title', 'Volume Converter - Free Online Unit Converter')
@section('meta_description', 'Convert liquid volume units instantly. Support for Liters, Gallons, Cups, Pints, Milliliters, and Fluid Ounces.')
@section('meta_keywords', 'volume converter, liter to gallon, ml to cups, fluid ounces conversion, liquid measurement')

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
                        <input type="number" id="fromValue" value="1" step="any"
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-cyan-100 focus:border-cyan-500 transition-all text-gray-800 placeholder-gray-300"
                            placeholder="0" oninput="convert('from')">
                    </div>
                    <select id="fromUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <optgroup label="Metric">
                            <option value="ml">Milliliter (ml)</option>
                            <option value="l" selected>Liter (l)</option>
                        </optgroup>
                        <optgroup label="US Customary">
                            <option value="gal">Gallon Top (gal)</option>
                            <option value="qt">Quart (qt)</option>
                            <option value="pt">Pint (pt)</option>
                            <option value="cup">Cup</option>
                            <option value="fl_oz">Fluid Ounce (fl oz)</option>
                        </optgroup>
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
                        <optgroup label="Metric">
                            <option value="ml">Milliliter (ml)</option>
                            <option value="l">Liter (l)</option>
                        </optgroup>
                        <optgroup label="US Customary">
                            <option value="gal" selected>Gallon (gal)</option>
                            <option value="qt">Quart (qt)</option>
                            <option value="pt">Pint (pt)</option>
                            <option value="cup">Cup</option>
                            <option value="fl_oz">Fluid Ounce (fl oz)</option>
                        </optgroup>
                    </select>
                </div>
            </div>

            {{-- Formula Display --}}
            <div class="mt-8 p-4 bg-gray-50 rounded-xl border border-gray-100 text-center">
                <p id="formulaDisplay" class="text-cyan-600 font-medium font-mono text-sm sm:text-base"></p>
            </div>
        </div>

        {{-- SEO Content Section --}}
        <div class="space-y-12">
            {{-- Feature Grid --}}
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-cyan-100 rounded-xl flex items-center justify-center text-cyan-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Liquid & Dry Volume</h3>
                    <p class="text-gray-600">Convert between metric liters and imperial gallons, quarts, pints, and cups.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Cooking & Science</h3>
                    <p class="text-gray-600">Perfect for recipes, chemistry labs, fuel calculations, and beverage
                        measurements.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center text-yellow-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Instant Calculations</h3>
                    <p class="text-gray-600">Real-time conversion with high precision for all your volume needs.</p>
                </div>
            </div>

            {{-- Long Content --}}
            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Understanding Volume Conversion</h2>
                <div class="prose prose-cyan max-w-none text-gray-600">
                    <p>
                        Volume measures the three-dimensional space occupied by a substance, whether liquid, gas, or solid.
                        The metric system uses liters (L) and milliliters (mL),
                        while the US customary system uses gallons, quarts, pints, cups, and fluid ounces. Understanding
                        these conversions is essential for cooking,
                        scientific experiments, fuel calculations, and international trade.
                    </p>
                    <p class="mt-4">
                        The liter is defined as one cubic decimeter (1000 cm³), making it straightforward to convert between
                        volume and cubic measurements.
                        The US gallon (3.785 L) differs from the imperial gallon (4.546 L) used in the UK, so it's important
                        to specify which system you're using.
                        Our converter uses US customary units by default.
                    </p>

                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">Common Usage Examples</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Cooking & Baking:</strong> Converting recipe measurements between cups and
                                milliliters</li>
                            <li><strong>Beverages:</strong> Understanding drink sizes in different countries</li>
                            <li><strong>Fuel Economy:</strong> Calculating gas consumption in liters vs gallons</li>
                        </ul>
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Chemistry Labs:</strong> Precise liquid measurements for experiments</li>
                            <li><strong>Aquariums:</strong> Calculating tank capacity and water changes</li>
                            <li><strong>Medicine:</strong> Dosage calculations in mL or fluid ounces</li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- FAQ Section --}}
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
                        <h3 class="font-bold text-gray-900 mb-2">How many liters are in a gallon?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">A US gallon contains approximately 3.785 liters. An
                            imperial gallon (used in the UK) contains about 4.546 liters. Always specify which gallon you're
                            referring to!</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">How do I convert cups to milliliters?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">One US cup equals approximately 236.6 milliliters.
                            For cooking, many people round this to 240 mL for convenience. Our converter provides the
                            precise value.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">What's the difference between fluid ounces and ounces?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Fluid ounces (fl oz) measure volume, while ounces
                            (oz) measure weight. They're only equivalent for water at specific temperatures. Always use
                            fluid ounces for liquid measurements.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">How many cups are in a quart?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">There are exactly 4 cups in 1 US quart. This makes
                            it easy to scale recipes: 1 quart = 4 cups = 2 pints = 32 fluid ounces.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Conversion rates relative to Milliliter (ml)
        const rates = {
            'ml': 1,
            'l': 1000,
            'gal': 3785.411784,
            'qt': 946.352946,
            'pt': 473.176473,
            'cup': 236.588236,
            'fl_oz': 29.5735296
        };

        const names = {
            'ml': 'Milliliters', 'l': 'Liters',
            'gal': 'Gallons (US)', 'qt': 'Quarts (US)',
            'pt': 'Pints (US)', 'cup': 'Cups (US)',
            'fl_oz': 'Fluid Ounces (US)'
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