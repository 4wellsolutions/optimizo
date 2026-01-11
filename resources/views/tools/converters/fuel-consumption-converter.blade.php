@extends('layouts.app')

@section('title', __tool('fuel-consumption-converter', 'seo.title'))
@section('meta_description', __tool('fuel-consumption-converter', 'seo.description'))
@section('meta_keywords', __tool('fuel-consumption-converter', 'seo.keywords'))

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        {{-- Hero Section --}}
        {{-- Hero Section --}}
        <x-tool-hero :tool="$tool" />

        {{-- Converter Card --}}
        <div class="bg-white rounded-3xl p-6 md:p-10 shadow-2xl border border-gray-100 mb-12 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-green-600 to-teal-700"></div>

            <div class="grid md:grid-cols-7 gap-6 items-center">
                {{-- From Section --}}
                <div class="md:col-span-3 space-y-2">
                    <label for="fromValue"
                        class="block text-sm font-bold text-gray-700 uppercase tracking-wide">{{ __tool('fuel-consumption-converter', 'form.from_label') }}</label>
                    <div class="relative">
                        <input type="number" id="fromValue" value="10" step="any"
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-green-100 focus:border-green-500 transition-all text-gray-800 placeholder-gray-300"
                            placeholder="0" oninput="convert('from')">
                    </div>
                    <select id="fromUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <option value="mpg_us" selected>{{ __tool('fuel-consumption-converter', 'form.unit_mpg_us') }}</option>
                        <option value="mpg_uk">{{ __tool('fuel-consumption-converter', 'form.unit_mpg_uk') }}</option>
                        <option value="km_l">{{ __tool('fuel-consumption-converter', 'form.unit_km_l') }}</option>
                        <option value="l_100km">{{ __tool('fuel-consumption-converter', 'form.unit_l_100km') }}</option>
                    </select>
                </div>

                {{-- Swap Button --}}
                <div class="md:col-span-1 flex justify-center py-4 md:py-0">
                    <button onclick="swapUnits()"
                        class="p-4 bg-green-50 text-green-600 rounded-full hover:bg-green-100 hover:scale-110 active:scale-95 transition-all shadow-md focus:outline-none focus:ring-4 focus:ring-green-100"
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
                    <label for="toValue" class="block text-sm font-bold text-gray-700 uppercase tracking-wide">{{ __tool('fuel-consumption-converter', 'form.to_label') }}</label>
                    <div class="relative">
                        <input type="number" id="toValue" step="any"
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-green-100 focus:border-green-500 transition-all text-gray-800 placeholder-gray-300 bg-gray-50"
                            placeholder="0" oninput="convert('to')">
                    </div>
                    <select id="toUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <option value="mpg_us">{{ __tool('fuel-consumption-converter', 'form.unit_mpg_us') }}</option>
                        <option value="mpg_uk">{{ __tool('fuel-consumption-converter', 'form.unit_mpg_uk') }}</option>
                        <option value="km_l">{{ __tool('fuel-consumption-converter', 'form.unit_km_l') }}</option>
                        <option value="l_100km" selected>{{ __tool('fuel-consumption-converter', 'form.unit_l_100km') }}</option>
                    </select>
                </div>
            </div>

            {{-- Formula Display --}}
            <div class="mt-8 p-4 bg-gray-50 rounded-xl border border-gray-100 text-center">
                <p id="formulaDisplay" class="text-green-600 font-medium font-mono text-sm sm:text-base"></p>
            </div>
        </div>

        {{-- SEO Content Section --}}
        <div class="space-y-12">
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-green-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">{{ __tool('fuel-consumption-converter', 'content.feature1_title') }}</h3>
                    <p class="text-gray-600">{{ __tool('fuel-consumption-converter', 'content.feature1_desc') }}</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">{{ __tool('fuel-consumption-converter', 'content.feature2_title') }}</h3>
                    <p class="text-gray-600">{{ __tool('fuel-consumption-converter', 'content.feature2_desc') }}</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center text-emerald-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">{{ __tool('fuel-consumption-converter', 'content.feature3_title') }}</h3>
                    <p class="text-gray-600">{{ __tool('fuel-consumption-converter', 'content.feature3_desc') }}</p>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __tool('fuel-consumption-converter', 'content.main_title') }}</h2>
                <div class="prose prose-green max-w-none text-gray-600">
                    <p>{{ __tool('fuel-consumption-converter', 'content.description_p1') }}</p>
                    <p class="mt-4">{{ __tool('fuel-consumption-converter', 'content.description_p2') }}</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">{{ __tool('fuel-consumption-converter', 'content.usage_examples_title') }}</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <ul class="list-disc list-inside space-y-2">
                            <li>{!! __tool('fuel-consumption-converter', 'content.usage_1') !!}</li>
                            <li>{!! __tool('fuel-consumption-converter', 'content.usage_2') !!}</li>
                            <li>{!! __tool('fuel-consumption-converter', 'content.usage_3') !!}</li>
                        </ul>
                        <ul class="list-disc list-inside space-y-2">
                            <li>{!! __tool('fuel-consumption-converter', 'content.usage_4') !!}</li>
                            <li>{!! __tool('fuel-consumption-converter', 'content.usage_5') !!}</li>
                            <li>{!! __tool('fuel-consumption-converter', 'content.usage_6') !!}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-green-50 to-white rounded-3xl p-8 border border-green-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                    {{ __tool('fuel-consumption-converter', 'content.faq_title') }}
                </h2>
                <div class="space-y-6">
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">{{ __tool('fuel-consumption-converter', 'content.faq_q1') }}</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">{{ __tool('fuel-consumption-converter', 'content.faq_a1') }}</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">{{ __tool('fuel-consumption-converter', 'content.faq_q2') }}</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">{{ __tool('fuel-consumption-converter', 'content.faq_a2') }}</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">{{ __tool('fuel-consumption-converter', 'content.faq_q3') }}</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">{{ __tool('fuel-consumption-converter', 'content.faq_a3') }}</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">{{ __tool('fuel-consumption-converter', 'content.faq_q4') }}</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">{{ __tool('fuel-consumption-converter', 'content.faq_a4') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    // Use a conversion map to standardized "MPG (US)"
    // For L/100km, the relationship is inverse: x mpg = 235.215 / y l/100km

    function toMpgUs(val, unit) {
        if (val === 0) return 0; // Avoid division by zero issues
        if (unit === 'mpg_us') return val;
        if (unit === 'mpg_uk') return val / 1.20095;
        if (unit === 'km_l') return val * 2.35215;
        if (unit === 'l_100km') return 235.215 / val;
        return val;
    }

    function fromMpgUs(mpg, unit) {
        if (mpg === 0) return 0;
        if (unit === 'mpg_us') return mpg;
        if (unit === 'mpg_uk') return mpg * 1.20095;
        if (unit === 'km_l') return mpg / 2.35215;
        if (unit === 'l_100km') return 235.215 / mpg;
        return mpg;
    }

    function convert(source) {
        const fromUnit = document.getElementById('fromUnit').value;
        const toUnit = document.getElementById('toUnit').value;
        const fromInput = document.getElementById('fromValue');
        const toInput = document.getElementById('toValue');

        let val;
        let result;

        if (source === 'from') {
            val = parseFloat(fromInput.value);
            // Handle 0 or invalid input specially for inverse units
            if (isNaN(val)) {
                toInput.value = '';
                updateFormula(null);
                return;
            }

            // Convert to Base (MPG US)
            const baseMpg = toMpgUs(val, fromUnit);
            // Convert to Target
            result = fromMpgUs(baseMpg, toUnit);

            // Precision handling
            toInput.value = parseFloat(result.toPrecision(8)) / 1;
        } else {
            val = parseFloat(toInput.value);
            if (isNaN(val)) {
                fromInput.value = '';
                updateFormula(null);
                return;
            }

            const baseMpg = toMpgUs(val, toUnit);
            result = fromMpgUs(baseMpg, fromUnit);

            fromInput.value = parseFloat(result.toPrecision(8)) / 1;
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

        // Generate dynamic text since formula varies
        if (from === 'l_100km' || to === 'l_100km') {
            display.innerText = "Inverse relationship: Higher value means less efficiency.";
        } else {
            display.innerText = "Direct conversion.";
        }
    }

    // Initialize
    window.addEventListener('load', () => convert('from'));
</script>
@endpush