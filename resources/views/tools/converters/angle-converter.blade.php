@extends('layouts.app')

@section('title', 'Angle Converter - Degrees, Radians, Gradians')
@section('meta_description', 'Convert angle units instantly. Degrees to Radians, Gradians, Arcminutes, and Arcseconds.')
@section('meta_keywords', 'angle converter, degrees to radians, radian conversion, geometry calculator')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        {{-- Hero Section --}}
        {{-- Hero Section --}}
        <x-tool-hero :tool="$tool" />

        {{-- Converter Card --}}
        <div class="bg-white rounded-3xl p-6 md:p-10 shadow-2xl border border-gray-100 mb-12 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-amber-500 to-orange-500"></div>

            <div class="grid md:grid-cols-7 gap-6 items-center">
                {{-- From Section --}}
                <div class="md:col-span-3 space-y-2">
                    <label for="fromValue"
                        class="block text-sm font-bold text-gray-700 uppercase tracking-wide">From</label>
                    <div class="relative">
                        <input type="number" id="fromValue" value="1" step="any"
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-amber-100 focus:border-amber-500 transition-all text-gray-800 placeholder-gray-300"
                            placeholder="0" oninput="convert('from')">
                    </div>
                    <select id="fromUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <option value="deg" selected>Degree (°)</option>
                        <option value="rad">Radian (rad)</option>
                        <option value="grad">Gradian (gon)</option>
                        <option value="min">Arcminute (')</option>
                        <option value="sec">Arcsecond (")</option>
                    </select>
                </div>

                {{-- Swap Button --}}
                <div class="md:col-span-1 flex justify-center py-4 md:py-0">
                    <button onclick="swapUnits()"
                        class="p-4 bg-amber-50 text-amber-600 rounded-full hover:bg-amber-100 hover:scale-110 active:scale-95 transition-all shadow-md focus:outline-none focus:ring-4 focus:ring-amber-100"
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
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-amber-100 focus:border-amber-500 transition-all text-gray-800 placeholder-gray-300 bg-gray-50"
                            placeholder="0" oninput="convert('to')">
                    </div>
                    <select id="toUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <option value="deg">Degree (°)</option>
                        <option value="rad" selected>Radian (rad)</option>
                        <option value="grad">Gradian (gon)</option>
                        <option value="min">Arcminute (')</option>
                        <option value="sec">Arcsecond (")</option>
                    </select>
                </div>
            </div>

            {{-- Formula Display --}}
            <div class="mt-8 p-4 bg-gray-50 rounded-xl border border-gray-100 text-center">
                <p id="formulaDisplay" class="text-amber-600 font-medium font-mono text-sm sm:text-base"></p>
            </div>
        </div>

        {{-- SEO Content Section --}}
        <div class="space-y-12">
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center text-amber-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Angle Units</h3>
                    <p class="text-gray-600">Convert between degrees, radians, gradians, and turns for any application.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center text-orange-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Math & Engineering</h3>
                    <p class="text-gray-600">Perfect for trigonometry, navigation, CAD design, and scientific calculations.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center text-yellow-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Precise Conversions</h3>
                    <p class="text-gray-600">Accurate angle conversions using mathematical constants like π.</p>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Understanding Angle Conversion</h2>
                <div class="prose prose-amber max-w-none text-gray-600">
                    <p>Angles measure rotation or the space between two intersecting lines. Degrees (°) are most common in
                        everyday use, with a full circle being 360°. Radians are the standard unit in mathematics and
                        physics, where a full circle equals 2π radians. Gradians (gon) divide a circle into 400 parts, used
                        in some surveying applications.</p>
                    <p class="mt-4">One radian is the angle subtended by an arc equal in length to the radius. Since a
                        circle's circumference is 2πr, a full circle contains 2π radians. This makes 180° = π radians, a
                        fundamental relationship in trigonometry. Understanding angle conversions is essential for
                        mathematics, engineering, navigation, and computer graphics.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">Common Usage Examples</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Mathematics:</strong> Trigonometric calculations in radians</li>
                            <li><strong>Navigation:</strong> Bearing and heading measurements in degrees</li>
                            <li><strong>CAD/Design:</strong> Rotation angles for 3D modeling</li>
                        </ul>
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Surveying:</strong> Land measurements using gradians</li>
                            <li><strong>Programming:</strong> Graphics rotation and animation</li>
                            <li><strong>Astronomy:</strong> Celestial coordinates and positions</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-amber-50 to-white rounded-3xl p-8 border border-amber-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                    Frequently Asked Questions
                </h2>
                <div class="space-y-6">
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">How do I convert degrees to radians?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Multiply degrees by π/180. For example, 90° ×
                            (π/180) = π/2 radians ≈ 1.571 radians. Our converter handles this automatically!</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">Why are radians used in mathematics?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Radians are the "natural" unit for angles because
                            they simplify many mathematical formulas. In calculus and trigonometry, using radians eliminates
                            conversion factors and makes equations cleaner.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">What are gradians used for?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Gradians (gon) divide a circle into 400 parts,
                            making right angles exactly 100 gon. They're used in some surveying and civil engineering
                            applications, particularly in Europe.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">How many degrees are in π radians?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">π radians equals exactly 180 degrees. This is a
                            fundamental relationship: π rad = 180°, so 2π rad = 360° (a full circle).</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Conversion rates relative to Degree (deg)
        const rates = {
            'deg': 1,
            'rad': 57.295779513, // 1 rad = 180/pi deg
            'grad': 0.9,
            'min': 0.016666667,
            'sec': 0.000277778
        };

        const names = {
            'deg': 'Degrees', 'rad': 'Radians', 'grad': 'Gradians',
            'min': 'Arcminutes', 'sec': 'Arcseconds'
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