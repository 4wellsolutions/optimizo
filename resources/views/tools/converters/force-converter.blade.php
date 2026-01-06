@extends('layouts.app')

@section('title', 'Force Converter - Newtons, Pound-force, Kilogram-force')
@section('meta_description', 'Convert force units instantly. Newtons to Pound-force (lbf), Kilogram-force (kgf), and more.')
@section('meta_keywords', 'force converter, newtons to lbf, kgf conversion, physics calculator')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        {{-- Hero Section --}}
        {{-- Hero Section --}}
        <x-tool-hero :tool="$tool" />

        {{-- Converter Card --}}
        <div class="bg-white rounded-3xl p-6 md:p-10 shadow-2xl border border-gray-100 mb-12 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-indigo-500 to-blue-500"></div>

            <div class="grid md:grid-cols-7 gap-6 items-center">
                {{-- From Section --}}
                <div class="md:col-span-3 space-y-2">
                    <label for="fromValue"
                        class="block text-sm font-bold text-gray-700 uppercase tracking-wide">From</label>
                    <div class="relative">
                        <input type="number" id="fromValue" value="1" step="any"
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 transition-all text-gray-800 placeholder-gray-300"
                            placeholder="0" oninput="convert('from')">
                    </div>
                    <select id="fromUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <option value="N" selected>Newton (N)</option>
                        <option value="kN">Kilonewton (kN)</option>
                        <option value="lbf">Pound-force (lbf)</option>
                        <option value="kgf">Kilogram-force (kgf)</option>
                        <option value="dyn">Dyne (dyn)</option>
                    </select>
                </div>

                {{-- Swap Button --}}
                <div class="md:col-span-1 flex justify-center py-4 md:py-0">
                    <button onclick="swapUnits()"
                        class="p-4 bg-indigo-50 text-indigo-600 rounded-full hover:bg-indigo-100 hover:scale-110 active:scale-95 transition-all shadow-md focus:outline-none focus:ring-4 focus:ring-indigo-100"
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
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 transition-all text-gray-800 placeholder-gray-300 bg-gray-50"
                            placeholder="0" oninput="convert('to')">
                    </div>
                    <select id="toUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <option value="N">Newton (N)</option>
                        <option value="kN">Kilonewton (kN)</option>
                        <option value="lbf" selected>Pound-force (lbf)</option>
                        <option value="kgf">Kilogram-force (kgf)</option>
                        <option value="dyn">Dyne (dyn)</option>
                    </select>
                </div>
            </div>

            {{-- Formula Display --}}
            <div class="mt-8 p-4 bg-gray-50 rounded-xl border border-gray-100 text-center">
                <p id="formulaDisplay" class="text-indigo-600 font-medium font-mono text-sm sm:text-base"></p>
            </div>
        </div>

        {{-- SEO Content Section --}}
        <div class="space-y-12">
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Force Units</h3>
                    <p class="text-gray-600">Convert between newtons, pound-force, kilogram-force, and dynes.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Physics & Engineering</h3>
                    <p class="text-gray-600">Perfect for mechanics, structural engineering, and physics calculations.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center text-purple-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Scientific Accuracy</h3>
                    <p class="text-gray-600">Precise conversions using standard force unit relationships.</p>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Understanding Force Conversion</h2>
                <div class="prose prose-indigo max-w-none text-gray-600">
                    <p>Force is a push or pull that can cause an object to accelerate, defined by Newton's Second Law: F =
                        ma (force equals mass times acceleration). The SI unit is the newton (N), equal to the force needed
                        to accelerate 1 kilogram at 1 meter per second squared. Imperial systems use pound-force (lbf),
                        while kilogram-force (kgf) is used in some engineering contexts.</p>
                    <p class="mt-4">One newton equals approximately 0.2248 pound-force. One kilogram-force equals 9.80665
                        newtons (the force exerted by 1 kg mass under standard gravity). Understanding force conversions is
                        essential for structural engineering, mechanical design, and physics problem-solving.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">Common Usage Examples</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Structural Engineering:</strong> Load calculations for buildings and bridges</li>
                            <li><strong>Mechanical Design:</strong> Spring force and tension specifications</li>
                            <li><strong>Physics:</strong> Force calculations in mechanics problems</li>
                        </ul>
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Aerospace:</strong> Thrust and lift force measurements</li>
                            <li><strong>Automotive:</strong> Brake force and suspension calculations</li>
                            <li><strong>Manufacturing:</strong> Press force and clamping specifications</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-indigo-50 to-white rounded-3xl p-8 border border-indigo-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                    Frequently Asked Questions
                </h2>
                <div class="space-y-6">
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">How do I convert newtons to pound-force?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Multiply newtons by 0.2248. For example, 100 N ×
                            0.2248 = 22.48 lbf. This is useful for converting between metric and imperial engineering
                            specifications.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">What's the difference between mass and force?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Mass (kg) is the amount of matter, while force (N)
                            is mass times acceleration. Weight is a force: the force of gravity on a mass. A 1 kg mass
                            exerts about 9.8 N of force (weight) on Earth.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">What is kilogram-force (kgf)?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Kilogram-force is the force exerted by 1 kilogram
                            of mass under standard gravity (9.80665 m/s²). It equals 9.80665 newtons. It's used in some
                            engineering contexts but is not an SI unit.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">How is force related to pressure?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Pressure is force per unit area (P = F/A). For
                            example, 100 N applied over 1 m² creates 100 Pa of pressure. Understanding both force and area
                            is essential for pressure calculations.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Conversion rates relative to Newton (N)
        const rates = {
            'N': 1,
            'kN': 1000,
            'lbf': 4.448221615,
            'kgf': 9.80665,
            'dyn': 0.00001
        };

        const names = {
            'N': 'Newtons', 'kN': 'Kilonewtons', 'lbf': 'Pound-forces',
            'kgf': 'Kilogram-forces', 'dyn': 'Dynes'
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