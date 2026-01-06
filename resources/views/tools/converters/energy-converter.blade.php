@extends('layouts.app')

@section('title', 'Energy Converter - Joules, Calories, kWh')
@section('meta_description', 'Convert energy units instantly. Joules to Calories, Kilowatt-hours to BTUs, and more.')
@section('meta_keywords', 'energy converter, joules to calories, btu conversion, kwh to joules')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        {{-- Hero Section --}}
        {{-- Hero Section --}}
        <x-tool-hero :tool="$tool" />

        {{-- Converter Card --}}
        <div class="bg-white rounded-3xl p-6 md:p-10 shadow-2xl border border-gray-100 mb-12 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-orange-500 to-red-500"></div>

            <div class="grid md:grid-cols-7 gap-6 items-center">
                {{-- From Section --}}
                <div class="md:col-span-3 space-y-2">
                    <label for="fromValue"
                        class="block text-sm font-bold text-gray-700 uppercase tracking-wide">From</label>
                    <div class="relative">
                        <input type="number" id="fromValue" value="1" step="any"
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-orange-100 focus:border-orange-500 transition-all text-gray-800 placeholder-gray-300"
                            placeholder="0" oninput="convert('from')">
                    </div>
                    <select id="fromUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <option value="J" selected>Joule (J)</option>
                        <option value="kJ">Kilojoule (kJ)</option>
                        <option value="cal">Calorie (cal)</option>
                        <option value="kcal">Kilocalorie (kcal/Cal)</option>
                        <option value="Wh">Watt-hour (Wh)</option>
                        <option value="kWh">Kilowatt-hour (kWh)</option>
                        <option value="BTU">British Thermal Unit (BTU)</option>
                        <option value="ftlb">Foot-pound (ft⋅lb)</option>
                    </select>
                </div>

                {{-- Swap Button --}}
                <div class="md:col-span-1 flex justify-center py-4 md:py-0">
                    <button onclick="swapUnits()"
                        class="p-4 bg-orange-50 text-orange-600 rounded-full hover:bg-orange-100 hover:scale-110 active:scale-95 transition-all shadow-md focus:outline-none focus:ring-4 focus:ring-orange-100"
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
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-orange-100 focus:border-orange-500 transition-all text-gray-800 placeholder-gray-300 bg-gray-50"
                            placeholder="0" oninput="convert('to')">
                    </div>
                    <select id="toUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <option value="J">Joule (J)</option>
                        <option value="kJ">Kilojoule (kJ)</option>
                        <option value="cal" selected>Calorie (cal)</option>
                        <option value="kcal">Kilocalorie (kcal/Cal)</option>
                        <option value="Wh">Watt-hour (Wh)</option>
                        <option value="kWh">Kilowatt-hour (kWh)</option>
                        <option value="BTU">British Thermal Unit (BTU)</option>
                        <option value="ftlb">Foot-pound (ft⋅lb)</option>
                    </select>
                </div>
            </div>

            {{-- Formula Display --}}
            <div class="mt-8 p-4 bg-gray-50 rounded-xl border border-gray-100 text-center">
                <p id="formulaDisplay" class="text-orange-600 font-medium font-mono text-sm sm:text-base"></p>
            </div>
        </div>

        {{-- SEO Content Section --}}
        <div class="space-y-12">
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center text-orange-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Multiple Energy Units</h3>
                    <p class="text-gray-600">Convert between joules, calories, BTU, kilowatt-hours, and more.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center text-red-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Nutrition & Physics</h3>
                    <p class="text-gray-600">Perfect for food calories, electricity bills, and thermodynamics calculations.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center text-yellow-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Scientific Accuracy</h3>
                    <p class="text-gray-600">Precise conversions for engineering, nutrition, and energy management.</p>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Understanding Energy Conversion</h2>
                <div class="prose prose-orange max-w-none text-gray-600">
                    <p>Energy is the capacity to do work or produce heat. Different fields use different units: joules (J)
                        in physics, calories in nutrition, BTU in heating/cooling, and kilowatt-hours (kWh) for electricity.
                        Understanding these conversions is essential for diet planning, energy bills, and scientific
                        calculations.</p>
                    <p class="mt-4">The SI unit is the joule. One food Calorie (capital C) equals 1 kilocalorie (kcal) or
                        4,184 joules. A kilowatt-hour, used on electric bills, equals 3.6 million joules. BTU (British
                        Thermal Unit) measures heat energy, with 1 BTU equaling approximately 1,055 joules.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">Common Usage Examples</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Nutrition:</strong> Converting food calories to joules or kJ</li>
                            <li><strong>Electricity Bills:</strong> Understanding kWh consumption</li>
                            <li><strong>HVAC Systems:</strong> BTU ratings for air conditioners and heaters</li>
                        </ul>
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Physics:</strong> Energy calculations in joules</li>
                            <li><strong>Fitness:</strong> Tracking calorie burn during exercise</li>
                            <li><strong>Engineering:</strong> Thermal energy and efficiency calculations</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-orange-50 to-white rounded-3xl p-8 border border-orange-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                    Frequently Asked Questions
                </h2>
                <div class="space-y-6">
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">How many joules are in a calorie?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">One small calorie (cal) equals 4.184 joules. One
                            food Calorie (Cal or kcal) equals 4,184 joules or 4.184 kilojoules.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">What's the difference between calories and Calories?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">A small calorie (cal) is the energy to heat 1g of
                            water by 1°C. A food Calorie (Cal, capital C) equals 1,000 small calories (1 kcal). Food labels
                            use Calories (kcal).</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">How do I convert kWh to joules?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Multiply kWh by 3,600,000. For example, 1 kWh =
                            3,600,000 joules (3.6 megajoules). This is useful for understanding electricity consumption.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">What is a BTU used for?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">BTU (British Thermal Unit) measures heating and
                            cooling capacity. Air conditioners and heaters are rated in BTU/hour, indicating how much heat
                            they can add or remove.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Conversion rates relative to Joule (J)
        const rates = {
            'J': 1,
            'kJ': 1000,
            'cal': 4.184,
            'kcal': 4184,
            'Wh': 3600,
            'kWh': 3600000,
            'BTU': 1055.056,
            'ftlb': 1.355818
        };

        const names = {
            'J': 'Joules', 'kJ': 'Kilojoules', 'cal': 'Calories', 'kcal': 'Kilocalories',
            'Wh': 'Watt-hours', 'kWh': 'Kilowatt-hours', 'BTU': 'BTUs', 'ftlb': 'Foot-pounds'
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