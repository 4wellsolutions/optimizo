@extends('layouts.app')

@section('title', 'Power Converter - Watts, Kilowatts, Horsepower')
@section('meta_description', 'Convert power units instantly. Watts to Horsepower, Kilowatts to BTU/h, and more.')
@section('meta_keywords', 'power converter, watts to hp, horsepower conversion, kilowatts calculator')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        {{-- Hero Section --}}
        {{-- Hero Section --}}
        <x-tool-hero :tool="$tool" />

        {{-- Converter Card --}}
        <div class="bg-white rounded-3xl p-6 md:p-10 shadow-2xl border border-gray-100 mb-12 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-red-600 to-gray-800"></div>

            <div class="grid md:grid-cols-7 gap-6 items-center">
                {{-- From Section --}}
                <div class="md:col-span-3 space-y-2">
                    <label for="fromValue"
                        class="block text-sm font-bold text-gray-700 uppercase tracking-wide">From</label>
                    <div class="relative">
                        <input type="number" id="fromValue" value="1" step="any"
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-red-100 focus:border-red-500 transition-all text-gray-800 placeholder-gray-300"
                            placeholder="0" oninput="convert('from')">
                    </div>
                    <select id="fromUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <option value="W" selected>Watt (W)</option>
                        <option value="kW">Kilowatt (kW)</option>
                        <option value="hp">Horsepower (hp)</option>
                        <option value="ps">Metric Horsepower (PS)</option>
                        <option value="kcal_h">kcal/h</option>
                        <option value="btu_h">BTU/h</option>
                    </select>
                </div>

                {{-- Swap Button --}}
                <div class="md:col-span-1 flex justify-center py-4 md:py-0">
                    <button onclick="swapUnits()"
                        class="p-4 bg-gray-100 text-gray-600 rounded-full hover:bg-gray-200 hover:scale-110 active:scale-95 transition-all shadow-md focus:outline-none focus:ring-4 focus:ring-gray-200"
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
                        <option value="W">Watt (W)</option>
                        <option value="kW">Kilowatt (kW)</option>
                        <option value="hp" selected>Horsepower (hp)</option>
                        <option value="ps">Metric Horsepower (PS)</option>
                        <option value="kcal_h">kcal/h</option>
                        <option value="btu_h">BTU/h</option>
                    </select>
                </div>
            </div>

            {{-- Formula Display --}}
            <div class="mt-8 p-4 bg-gray-50 rounded-xl border border-gray-100 text-center">
                <p id="formulaDisplay" class="text-gray-700 font-medium font-mono text-sm sm:text-base"></p>
            </div>
        </div>

        {{-- SEO Content Section --}}
        <div class="space-y-12">
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center text-red-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Power Units</h3>
                    <p class="text-gray-600">Convert between watts, kilowatts, horsepower, and metric horsepower (PS).</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center text-orange-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Automotive & Industrial</h3>
                    <p class="text-gray-600">Perfect for engine specifications, electrical systems, and machinery ratings.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center text-yellow-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Accurate Conversions</h3>
                    <p class="text-gray-600">Precise calculations for engineering, automotive, and electrical applications.
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Understanding Power Conversion</h2>
                <div class="prose prose-red max-w-none text-gray-600">
                    <p>Power measures the rate of energy transfer or work done per unit time. The SI unit is the watt (W),
                        defined as one joule per second. Different industries use different units: watts/kilowatts in
                        electrical systems, horsepower in automotive, and metric horsepower (PS/CV) in European vehicle
                        specifications.</p>
                    <p class="mt-4">One mechanical horsepower equals approximately 745.7 watts, while one metric horsepower
                        (PS, Pferdestärke) equals about 735.5 watts. Kilowatts are commonly used for electric motors and
                        power plants (1 kW = 1,000 W). Understanding these conversions is essential for comparing engine
                        specifications, electrical appliances, and industrial machinery.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">Common Usage Examples</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Automotive:</strong> Converting engine power between HP and kW</li>
                            <li><strong>Electrical:</strong> Appliance power ratings in watts</li>
                            <li><strong>Industrial:</strong> Motor and machinery power specifications</li>
                        </ul>
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Renewable Energy:</strong> Solar panel and wind turbine output</li>
                            <li><strong>HVAC:</strong> Air conditioner and heater power consumption</li>
                            <li><strong>Engineering:</strong> Power calculations for mechanical systems</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-red-50 to-white rounded-3xl p-8 border border-red-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                    Frequently Asked Questions
                </h2>
                <div class="space-y-6">
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">How do I convert horsepower to kilowatts?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Multiply horsepower by 0.7457. For example, 100 HP
                            × 0.7457 = 74.57 kW. This is useful for comparing US and European vehicle specifications.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">What's the difference between HP and PS?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">HP (horsepower) is the imperial unit (745.7 W),
                            while PS (Pferdestärke) is the metric horsepower (735.5 W). PS is slightly smaller, so 100 PS ≈
                            98.6 HP.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">How many watts are in a kilowatt?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">There are exactly 1,000 watts in 1 kilowatt. "Kilo"
                            is the metric prefix for thousand, making the conversion straightforward.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">Why is horsepower still used instead of watts?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Horsepower has historical significance in
                            automotive and remains popular for marketing engines. However, kW is increasingly used,
                            especially in electric vehicles and international markets.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Conversion rates relative to Watt (W)
        const rates = {
            'W': 1,
            'kW': 1000,
            'hp': 745.699872, // Mechanical horsepower
            'ps': 735.49875,  // Metric horsepower
            'kcal_h': 1.162222222,
            'btu_h': 0.29307107
        };

        const names = {
            'W': 'Watts', 'kW': 'Kilowatts', 'hp': 'Horsepower',
            'ps': 'Metric Horsepower', 'kcal_h': 'kcal/h', 'btu_h': 'BTU/h'
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