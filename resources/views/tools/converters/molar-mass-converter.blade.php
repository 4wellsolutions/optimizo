@extends('layouts.app')

@section('title', 'Molar Mass Converter - g/mol to kg/mol')
@section('meta_description', 'Convert molar mass units instantly. Grams per mole to Kilograms per mole.')
@section('meta_keywords', 'molar mass converter, g/mol conversion, chemistry calculator, molecular weight')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        {{-- Hero Section --}}
        {{-- Hero Section --}}
        <x-tool-hero :tool="$tool" />

        {{-- Converter Card --}}
        <div class="bg-white rounded-3xl p-6 md:p-10 shadow-2xl border border-gray-100 mb-12 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-purple-500 to-pink-500"></div>

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
                        <option value="g_mol" selected>Gram per mole (g/mol)</option>
                        <option value="kg_mol">Kilogram per mole (kg/mol)</option>
                        <option value="lb_mol">Pound per mole (lb/mol)</option>
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
                        <option value="g_mol">Gram per mole (g/mol)</option>
                        <option value="kg_mol" selected>Kilogram per mole (kg/mol)</option>
                        <option value="lb_mol">Pound per mole (lb/mol)</option>
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
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Molar Mass Units</h3>
                    <p class="text-gray-600">Convert between g/mol, kg/mol, lb/mol for chemistry calculations.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Chemistry & Science</h3>
                    <p class="text-gray-600">Essential for stoichiometry, molecular calculations, and lab work.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-violet-100 rounded-xl flex items-center justify-center text-violet-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Molecular Weight</h3>
                    <p class="text-gray-600">Accurate conversions for chemical compound mass calculations.</p>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Understanding Molar Mass Conversion</h2>
                <div class="prose prose-purple max-w-none text-gray-600">
                    <p>Molar mass is the mass of one mole of a substance, typically expressed in grams per mole (g/mol).
                        It's a fundamental concept in chemistry, equal to the sum of atomic masses of all atoms in a
                        molecule. For example, water (H₂O) has a molar mass of approximately 18 g/mol (2×1 + 16).
                        Understanding molar mass is essential for stoichiometry, solution preparation, and chemical
                        calculations.</p>
                    <p class="mt-4">The standard unit is g/mol, though kg/mol is used for larger quantities (1 kg/mol = 1000
                        g/mol). Imperial systems occasionally use lb/mol, where 1 lb/mol ≈ 453.59 g/mol. Carbon-12 is
                        defined to have exactly 12 g/mol, serving as the reference for atomic mass units. These conversions
                        are crucial for laboratory work, pharmaceutical calculations, and industrial chemistry.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">Common Usage Examples</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Stoichiometry:</strong> Calculating reactant and product quantities</li>
                            <li><strong>Solution Preparation:</strong> Making molar solutions in the lab</li>
                            <li><strong>Chemical Analysis:</strong> Determining compound composition</li>
                        </ul>
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Pharmaceuticals:</strong> Drug dosage and formulation calculations</li>
                            <li><strong>Industrial Chemistry:</strong> Large-scale production calculations</li>
                            <li><strong>Academic Research:</strong> Molecular weight determinations</li>
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
                        <h3 class="font-bold text-gray-900 mb-2">How do I calculate molar mass?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Add the atomic masses of all atoms in the molecule.
                            For H₂O: (2 × 1.008) + 16.00 = 18.016 g/mol. Use the periodic table for atomic masses.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">What's the difference between molar mass and molecular
                            weight?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">They're numerically equal but conceptually
                            different. Molar mass has units (g/mol), while molecular weight is dimensionless. In practice,
                            the terms are often used interchangeably.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">How do I convert g/mol to kg/mol?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Divide by 1000. For example, 180 g/mol ÷ 1000 =
                            0.18 kg/mol. This is useful for large-scale industrial calculations.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">Why is Carbon-12 exactly 12 g/mol?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Carbon-12 is the reference standard for atomic
                            mass. By definition, one mole of C-12 atoms has a mass of exactly 12 grams, establishing the
                            mole as a fundamental unit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Conversion rates relative to g/mol
        const rates = {
            'g_mol': 1,
            'kg_mol': 1000,
            'lb_mol': 453.59237
        };

        const names = {
            'g_mol': 'g/mol', 'kg_mol': 'kg/mol', 'lb_mol': 'lb/mol'
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