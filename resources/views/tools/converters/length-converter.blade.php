@extends('layouts.app')

@section('title', 'Length Converter - Free Online Unit Converter')
@section('meta_description', 'Convert length measurements instantly. Supports metric and imperial units like meters, feet, inches, kilometers, and miles.')
@section('meta_keywords', 'length converter, meter to feet, cm to inch, km to miles, online unit converter')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        {{-- Hero Section --}}
        <x-tool-hero :tool="$tool" />

        {{-- Converter Card --}}
        <div class="bg-white rounded-3xl p-6 md:p-10 shadow-2xl border border-gray-100 mb-12 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-500 to-indigo-600"></div>

            <div class="grid md:grid-cols-7 gap-6 items-center">
                {{-- From Section --}}
                <div class="md:col-span-3 space-y-2">
                    <label for="fromValue"
                        class="block text-sm font-bold text-gray-700 uppercase tracking-wide">From</label>
                    <div class="relative">
                        <input type="number" id="fromValue" value="1" step="any"
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all text-gray-800 placeholder-gray-300"
                            placeholder="0" oninput="convert('from')">
                    </div>
                    <select id="fromUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <optgroup label="Metric">
                            <option value="mm">Millimeter (mm)</option>
                            <option value="cm">Centimeter (cm)</option>
                            <option value="m" selected>Meter (m)</option>
                            <option value="km">Kilometer (km)</option>
                        </optgroup>
                        <optgroup label="Imperial">
                            <option value="in">Inch (in)</option>
                            <option value="ft">Foot (ft)</option>
                            <option value="yd">Yard (yd)</option>
                            <option value="mi">Mile (mi)</option>
                        </optgroup>
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
                        <optgroup label="Metric">
                            <option value="mm">Millimeter (mm)</option>
                            <option value="cm">Centimeter (cm)</option>
                            <option value="m">Meter (m)</option>
                            <option value="km">Kilometer (km)</option>
                        </optgroup>
                        <optgroup label="Imperial">
                            <option value="in">Inch (in)</option>
                            <option value="ft" selected>Foot (ft)</option>
                            <option value="yd">Yard (yd)</option>
                            <option value="mi">Mile (mi)</option>
                        </optgroup>
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
            {{-- Feature Grid --}}
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Instant Conversion</h3>
                    <p class="text-gray-600">Get results immediately as you type. No waiting, no page reloads.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-green-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">High Precision</h3>
                    <p class="text-gray-600">Calculates up to 10 decimal places for scientific accuracy.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center text-purple-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Metric & Imperial</h3>
                    <p class="text-gray-600">Supports all common units from Millimeters to Miles.</p>
                </div>
            </div>

            {{-- Long Content --}}
            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Understanding Length Conversion</h2>
                <div class="prose prose-indigo max-w-none text-gray-600">
                    <p>
                        Length conversion is the process of changing a unit of measurement for length or distance into
                        another unit.
                        This is common in science, engineering, and daily life, as different regions and industries use
                        different systems.
                    </p>
                    <p class="mt-4">
                        The two most common systems are the <strong>Metric System</strong> (meters, kilometers, centimeters)
                        and the
                        <strong>Imperial System</strong> (feet, inches, miles). The metric system is used globally, while
                        the imperial
                        system is primarily used in the United States.
                    </p>

                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">Common Usage Scenarios</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Construction:</strong> Converting blueprints from meters to feet.</li>
                            <li><strong>Travel:</strong> Understanding distances in kilometers vs miles.</li>
                            <li><strong>Science:</strong> Precise measurements in millimeters or micrometers.</li>
                        </ul>
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Sports:</strong> Track lengths (100m sprint vs 100 yards).</li>
                            <li><strong>Education:</strong> Teaching unit conversion in physics.</li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- FAQ Section --}}
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
                        <h3 class="font-bold text-gray-900 mb-2">How many feet are in a meter?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">There are approximately 3.28084 feet in one meter.
                            This is a common conversion for height and room dimensions.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">What is the difference between a Yard and a Meter?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">A meter is slightly longer than a yard. 1 Meter =
                            1.09361 Yards. While close in size, they belong to different measurement systems.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">How to convert Kilometers to Miles?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">To convert kilometers to miles, multiply the
                            kilometer value by 0.621371. For example, 10 km is approximately 6.2 miles.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Conversion rates relative to Meter
        const rates = {
            'mm': 0.001,
            'cm': 0.01,
            'm': 1,
            'km': 1000,
            'in': 0.0254,
            'ft': 0.3048,
            'yd': 0.9144,
            'mi': 1609.344
        };

        const names = {
            'mm': 'Millimeters', 'cm': 'Centimeters', 'm': 'Meters', 'km': 'Kilometers',
            'in': 'Inches', 'ft': 'Feet', 'yd': 'Yards', 'mi': 'Miles'
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

                // Convert to base unit (m) then to target unit
                const baseValue = value * rates[fromUnit];
                const result = baseValue / rates[toUnit];

                // Format result to avoid tiny floating point errors (e.g., 0.99999999)
                // Use a smart precision: up to 10 decimals, but strip trailing zeros
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

            // Trigger conversion with the new units, keeping the 'From' value as the anchor
            convert('from');
        }

        function updateFormula(from, to) {
            const display = document.getElementById('formulaDisplay');
            if (!from) {
                display.innerText = '';
                return;
            }

            // Calculate factor for display
            // 1 [from] = X [to]
            const factor = rates[from] / rates[to];
            const cleanFactor = parseFloat(factor.toPrecision(8)) / 1;

            display.innerHTML = `1 ${names[from]} = ${cleanFactor} ${names[to]}`;
        }

        // Initialize
        window.addEventListener('load', () => convert('from'));
    </script>
@endsection