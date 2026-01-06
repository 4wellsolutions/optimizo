@extends('layouts.app')

@section('title', 'Cooking Unit Converter - Cups, Tablespoons, Teaspoons')
@section('meta_description', 'Convert cooking units instantly. Cups to Tablespoons, Teaspoons to Milliliters, and Fluid Ounces.')
@section('meta_keywords', 'cooking converter, cups to tbsp, tsp to ml, kitchen calculator, baking conversions')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        {{-- Hero Section --}}
        {{-- Hero Section --}}
        <x-tool-hero :tool="$tool" />

        {{-- Converter Card --}}
        <div class="bg-white rounded-3xl p-6 md:p-10 shadow-2xl border border-gray-100 mb-12 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-orange-400 to-yellow-500"></div>

            <div class="grid md:grid-cols-7 gap-6 items-center">
                {{-- From Section --}}
                <div class="md:col-span-3 space-y-2">
                    <label for="fromValue"
                        class="block text-sm font-bold text-gray-700 uppercase tracking-wide">From</label>
                    <div class="relative">
                        <input type="number" id="fromValue" value="1" step="any"
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-yellow-100 focus:border-yellow-500 transition-all text-gray-800 placeholder-gray-300"
                            placeholder="0" oninput="convert('from')">
                    </div>
                    <select id="fromUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <option value="cup" selected>Cup (US)</option>
                        <option value="tbsp">Tablespoon (US)</option>
                        <option value="tsp">Teaspoon (US)</option>
                        <option value="ml">Milliliter (ml)</option>
                        <option value="fl_oz">Fluid Ounce (fl oz)</option>
                        <option value="pt">Pint (US)</option>
                        <option value="qt">Quart (US)</option>
                        <option value="gal">Gallon (US)</option>
                    </select>
                </div>

                {{-- Swap Button --}}
                <div class="md:col-span-1 flex justify-center py-4 md:py-0">
                    <button onclick="swapUnits()"
                        class="p-4 bg-yellow-50 text-yellow-600 rounded-full hover:bg-yellow-100 hover:scale-110 active:scale-95 transition-all shadow-md focus:outline-none focus:ring-4 focus:ring-yellow-100"
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
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-yellow-100 focus:border-yellow-500 transition-all text-gray-800 placeholder-gray-300 bg-gray-50"
                            placeholder="0" oninput="convert('to')">
                    </div>
                    <select id="toUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <option value="cup">Cup (US)</option>
                        <option value="tbsp" selected>Tablespoon (US)</option>
                        <option value="tsp">Teaspoon (US)</option>
                        <option value="ml">Milliliter (ml)</option>
                        <option value="fl_oz">Fluid Ounce (fl oz)</option>
                        <option value="pt">Pint (US)</option>
                        <option value="qt">Quart (US)</option>
                        <option value="gal">Gallon (US)</option>
                    </select>
                </div>
            </div>

            {{-- Formula Display --}}
            <div class="mt-8 p-4 bg-gray-50 rounded-xl border border-gray-100 text-center">
                <p id="formulaDisplay" class="text-yellow-600 font-medium font-mono text-sm sm:text-base"></p>
            </div>
        </div>

        {{-- SEO Content Section --}}
        <div class="space-y-12">
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center text-yellow-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Cooking Units</h3>
                    <p class="text-gray-600">Convert between cups, tablespoons, teaspoons, milliliters, and more.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center text-orange-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Recipe Scaling</h3>
                    <p class="text-gray-600">Perfect for adjusting recipes, baking, and international cooking conversions.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center text-amber-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Metric & Imperial</h3>
                    <p class="text-gray-600">Seamlessly convert between US, UK, and metric cooking measurements.</p>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Understanding Cooking Unit Conversion</h2>
                <div class="prose prose-yellow max-w-none text-gray-600">
                    <p>Cooking measurements vary by region and recipe tradition. US recipes use cups, tablespoons, and
                        teaspoons, while European and Asian recipes often use milliliters and grams. Understanding these
                        conversions is essential for following international recipes, scaling portions, and achieving
                        consistent results in baking where precision matters.</p>
                    <p class="mt-4">One US cup equals approximately 237 milliliters (often rounded to 240 ml). A tablespoon
                        is about 15 ml, and a teaspoon is 5 ml. Note that US and UK measurements differ: a US cup is 237 ml,
                        while a UK cup is 284 ml. These conversions help you adapt recipes from different cuisines and
                        ensure accurate ingredient proportions.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">Common Usage Examples</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Baking:</strong> Converting recipe measurements for precision</li>
                            <li><strong>International Recipes:</strong> Adapting European recipes to US measurements</li>
                            <li><strong>Recipe Scaling:</strong> Doubling or halving ingredient quantities</li>
                        </ul>
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Meal Prep:</strong> Calculating bulk cooking measurements</li>
                            <li><strong>Dietary Planning:</strong> Portion control and serving sizes</li>
                            <li><strong>Professional Cooking:</strong> Standardizing restaurant recipes</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-yellow-50 to-white rounded-3xl p-8 border border-yellow-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                    Frequently Asked Questions
                </h2>
                <div class="space-y-6">
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">How many tablespoons are in a cup?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">There are 16 tablespoons in 1 cup. This is useful
                            for scaling recipes: half a cup equals 8 tablespoons, and a quarter cup equals 4 tablespoons.
                        </p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">How many milliliters are in a cup?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">A US cup equals approximately 237 milliliters
                            (often rounded to 240 ml for convenience). A UK cup is larger at 284 ml. Always check which
                            standard a recipe uses!</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">What's the difference between a teaspoon and tablespoon?
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed">A tablespoon is 3 times larger than a teaspoon. 1
                            tablespoon = 3 teaspoons = 15 ml, while 1 teaspoon = 5 ml. Using the wrong one can significantly
                            affect recipes!</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">Can I use volume measurements for all ingredients?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Volume works well for liquids, but weight (grams)
                            is more accurate for dry ingredients like flour. For baking precision, consider using a kitchen
                            scale alongside volume measurements.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Conversion rates relative to Milliliter (ml)
        const rates = {
            'ml': 1,
            'cup': 236.588,
            'tbsp': 14.7868,
            'tsp': 4.92892,
            'fl_oz': 29.5735,
            'pt': 473.176,
            'qt': 946.353,
            'gal': 3785.41
        };

        const names = {
            'ml': 'ml', 'cup': 'Cups',
            'tbsp': 'Tablespoons', 'tsp': 'Teaspoons',
            'fl_oz': 'Fluid Ounces', 'pt': 'Pints',
            'qt': 'Quarts', 'gal': 'Gallons'
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