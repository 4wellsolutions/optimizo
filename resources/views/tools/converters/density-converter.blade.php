@extends('layouts.app')

@section('title', 'Density Converter - kg/m³, g/cm³, lb/ft³')
@section('meta_description', 'Convert density units instantly. Kilograms per cubic meter to Grams per cubic centimeter and Pounds per cubic foot.')
@section('meta_keywords', 'density converter, kg/m3 to g/cm3, density calculator, physics conversions')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        {{-- Hero Section --}}
        {{-- Hero Section --}}
        <x-tool-hero :tool="$tool" />

        {{-- Converter Card --}}
        <div class="bg-white rounded-3xl p-6 md:p-10 shadow-2xl border border-gray-100 mb-12 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-teal-500 to-cyan-600"></div>

            <div class="grid md:grid-cols-7 gap-6 items-center">
                {{-- From Section --}}
                <div class="md:col-span-3 space-y-2">
                    <label for="fromValue"
                        class="block text-sm font-bold text-gray-700 uppercase tracking-wide">From</label>
                    <div class="relative">
                        <input type="number" id="fromValue" value="1000" step="any"
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-teal-100 focus:border-teal-500 transition-all text-gray-800 placeholder-gray-300"
                            placeholder="0" oninput="convert('from')">
                    </div>
                    <select id="fromUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <option value="kg_m3" selected>kg/m³ (Kilogram/cubic meter)</option>
                        <option value="g_cm3">g/cm³ (Gram/cubic centimeter)</option>
                        <option value="lb_ft3">lb/ft³ (Pound/cubic foot)</option>
                        <option value="lb_in3">lb/in³ (Pound/cubic inch)</option>
                    </select>
                </div>

                {{-- Swap Button --}}
                <div class="md:col-span-1 flex justify-center py-4 md:py-0">
                    <button onclick="swapUnits()"
                        class="p-4 bg-teal-50 text-teal-600 rounded-full hover:bg-teal-100 hover:scale-110 active:scale-95 transition-all shadow-md focus:outline-none focus:ring-4 focus:ring-teal-100"
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
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-teal-100 focus:border-teal-500 transition-all text-gray-800 placeholder-gray-300 bg-gray-50"
                            placeholder="0" oninput="convert('to')">
                    </div>
                    <select id="toUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <option value="kg_m3">kg/m³ (Kilogram/cubic meter)</option>
                        <option value="g_cm3" selected>g/cm³ (Gram/cubic centimeter)</option>
                        <option value="lb_ft3">lb/ft³ (Pound/cubic foot)</option>
                        <option value="lb_in3">lb/in³ (Pound/cubic inch)</option>
                    </select>
                </div>
            </div>

            {{-- Formula Display --}}
            <div class="mt-8 p-4 bg-gray-50 rounded-xl border border-gray-100 text-center">
                <p id="formulaDisplay" class="text-teal-600 font-medium font-mono text-sm sm:text-base"></p>
            </div>
        </div>

        {{-- SEO Content Section --}}
        <div class="space-y-12">
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-teal-100 rounded-xl flex items-center justify-center text-teal-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Density Units</h3>
                    <p class="text-gray-600">Convert between kg/m³, g/cm³, lb/ft³, and other density measurements.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Material Science</h3>
                    <p class="text-gray-600">Perfect for physics, chemistry, engineering, and material identification.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-cyan-100 rounded-xl flex items-center justify-center text-cyan-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Mass-Volume Ratio</h3>
                    <p class="text-gray-600">Accurate conversions for density calculations and material properties.</p>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Understanding Density Conversion</h2>
                <div class="prose prose-teal max-w-none text-gray-600">
                    <p>Density measures mass per unit volume (ρ = m/V), indicating how tightly matter is packed. The SI unit
                        is kilograms per cubic meter (kg/m³), though grams per cubic centimeter (g/cm³) is common in
                        chemistry and materials science. Imperial systems use pounds per cubic foot (lb/ft³). Understanding
                        density is essential for material identification, buoyancy calculations, and engineering design.</p>
                    <p class="mt-4">Water has a density of approximately 1000 kg/m³ or 1 g/cm³ at standard conditions,
                        making it a useful reference. One g/cm³ equals exactly 1000 kg/m³. One lb/ft³ equals about 16.02
                        kg/m³. Density varies with temperature and pressure, which is important for precise scientific work
                        and engineering applications.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">Common Usage Examples</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Material Identification:</strong> Determining unknown materials by density</li>
                            <li><strong>Buoyancy:</strong> Calculating whether objects float or sink</li>
                            <li><strong>Chemistry:</strong> Solution concentration and purity testing</li>
                        </ul>
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Engineering:</strong> Structural load calculations and material selection</li>
                            <li><strong>Manufacturing:</strong> Quality control and material specifications</li>
                            <li><strong>Geology:</strong> Rock and mineral identification</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-teal-50 to-white rounded-3xl p-8 border border-teal-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                    Frequently Asked Questions
                </h2>
                <div class="space-y-6">
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">How do I convert g/cm³ to kg/m³?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Multiply g/cm³ by 1000. For example, 2.5 g/cm³ ×
                            1000 = 2500 kg/m³. This is because 1 cm³ = 0.000001 m³ and 1 g = 0.001 kg.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">What is the density of water?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Water's density is approximately 1000 kg/m³ or 1
                            g/cm³ at 4°C. This makes it a convenient reference: materials denser than water sink, while less
                            dense materials float.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">How is density related to buoyancy?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Objects float if their density is less than the
                            fluid's density. A ship floats because its average density (including air space) is less than
                            water's 1000 kg/m³.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">Why does density change with temperature?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Most materials expand when heated, increasing
                            volume while mass stays constant, thus decreasing density. Water is unusual: it's densest at
                            4°C, which is why ice floats.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Conversion rates relative to kg/m³
        const rates = {
            'kg_m3': 1,
            'g_cm3': 1000,
            'lb_ft3': 16.018463,
            'lb_in3': 27679.9047
        };

        const names = {
            'kg_m3': 'kg/m³', 'g_cm3': 'g/cm³',
            'lb_ft3': 'lb/ft³', 'lb_in3': 'lb/in³'
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

                // Convert to Base (kg/m3) -> Value * Rate(From)
                // Wait.
                // 1 g/cm3 = 1000 kg/m3.
                // So if I have 1 g/cm3 (Input=1, Unit=g/cm3), Base should be 1000.
                // So Base = Input * Rate. Correct.

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