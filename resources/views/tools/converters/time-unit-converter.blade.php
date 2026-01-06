@extends('layouts.app')

@section('title', 'Time Unit Converter - Seconds, Minutes, Hours')
@section('meta_description', 'Convert time durations instantly. Seconds to minutes, hours to days, weeks to months, and years.')
@section('meta_keywords', 'time converter, seconds to minutes, hours to days, duration calculator')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        {{-- Hero Section --}}
        {{-- Hero Section --}}
        <x-tool-hero :tool="$tool" />

        {{-- Converter Card --}}
        <div class="bg-white rounded-3xl p-6 md:p-10 shadow-2xl border border-gray-100 mb-12 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-teal-400 to-green-500"></div>

            <div class="grid md:grid-cols-7 gap-6 items-center">
                {{-- From Section --}}
                <div class="md:col-span-3 space-y-2">
                    <label for="fromValue"
                        class="block text-sm font-bold text-gray-700 uppercase tracking-wide">From</label>
                    <div class="relative">
                        <input type="number" id="fromValue" value="1" step="any"
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-teal-100 focus:border-teal-500 transition-all text-gray-800 placeholder-gray-300"
                            placeholder="0" oninput="convert('from')">
                    </div>
                    <select id="fromUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <option value="ms">Millisecond (ms)</option>
                        <option value="s">Second (s)</option>
                        <option value="min" selected>Minute (min)</option>
                        <option value="hr">Hour (hr)</option>
                        <option value="day">Day (d)</option>
                        <option value="wk">Week (wk)</option>
                        <option value="mo">Month (Avg. 30.44d)</option>
                        <option value="yr">Year (365.25d)</option>
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
                        <option value="ms">Millisecond (ms)</option>
                        <option value="s" selected>Second (s)</option>
                        <option value="min">Minute (min)</option>
                        <option value="hr">Hour (hr)</option>
                        <option value="day">Day (d)</option>
                        <option value="wk">Week (wk)</option>
                        <option value="mo">Month (Avg. 30.44d)</option>
                        <option value="yr">Year (365.25d)</option>
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
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Duration Conversion</h3>
                    <p class="text-gray-600">Convert between seconds, minutes, hours, days, weeks, months, and years.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Project Planning</h3>
                    <p class="text-gray-600">Perfect for scheduling, video editing, project timelines, and time tracking.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-green-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Precise Calculations</h3>
                    <p class="text-gray-600">Accurate time conversions for science, programming, and daily planning.</p>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Understanding Time Unit Conversion</h2>
                <div class="prose prose-teal max-w-none text-gray-600">
                    <p>Time is a fundamental dimension measuring duration and sequence of events. Different scales serve
                        different purposes: milliseconds for computing, seconds for physics, hours for daily schedules, and
                        years for long-term planning. Understanding time conversions is essential for project management,
                        scientific calculations, and international coordination.</p>
                    <p class="mt-4">The SI base unit is the second, defined by atomic transitions. A minute contains 60
                        seconds, an hour has 3,600 seconds, and a day equals 86,400 seconds. Years are more complex: a
                        standard year has 365 days, but accounting for leap years, the average is 365.25 days (31,557,600
                        seconds).</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">Common Usage Examples</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Project Management:</strong> Converting work hours to days or weeks</li>
                            <li><strong>Video Editing:</strong> Converting timestamps between formats</li>
                            <li><strong>Programming:</strong> Millisecond to second conversions for timers</li>
                        </ul>
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Science:</strong> Measuring reaction times in experiments</li>
                            <li><strong>Fitness:</strong> Converting workout durations</li>
                            <li><strong>Travel:</strong> Calculating trip durations across time zones</li>
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
                        <h3 class="font-bold text-gray-900 mb-2">How many seconds are in a day?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">There are exactly 86,400 seconds in one day (24
                            hours × 60 minutes × 60 seconds = 86,400 seconds).</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">How do I convert hours to days?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Divide the number of hours by 24. For example, 48
                            hours ÷ 24 = 2 days. Our converter handles this automatically!</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">Why is a year 365.25 days?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Earth's orbit takes approximately 365.25 days,
                            which is why we have leap years every 4 years to add the extra quarter day and keep calendars
                            aligned with seasons.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">What's the difference between duration and time?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Time refers to a specific moment (e.g., 3:00 PM),
                            while duration measures how long something lasts (e.g., 2 hours). This converter handles
                            duration conversions.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Conversion rates relative to Second (s)
        const rates = {
            'ms': 0.001,
            's': 1,
            'min': 60,
            'hr': 3600,
            'day': 86400,
            'wk': 604800,
            'mo': 2629746, // Average month (30.436875 days)
            'yr': 31556952 // Gregorian year (365.2425 days)
        };

        const names = {
            'ms': 'Milliseconds', 's': 'Seconds', 'min': 'Minutes', 'hr': 'Hours',
            'day': 'Days', 'wk': 'Weeks', 'mo': 'Months', 'yr': 'Years'
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