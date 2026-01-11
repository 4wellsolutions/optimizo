@extends('layouts.app')

@section('title', __tool('molar-mass-converter', 'seo.title'))
@section('meta_description', __tool('molar-mass-converter', 'seo.description'))
@section('meta_keywords', __tool('molar-mass-converter', 'seo.keywords'))

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
                        class="block text-sm font-bold text-gray-700 uppercase tracking-wide">{{ __tool('molar-mass-converter', 'form.from_label') }}</label>
                    <div class="relative">
                        <input type="number" id="fromValue" value="1" step="any"
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-purple-100 focus:border-purple-500 transition-all text-gray-800 placeholder-gray-300"
                            placeholder="0" oninput="convert('from')">
                    </div>
                    <select id="fromUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <option value="g_mol" selected>{{ __tool('molar-mass-converter', 'form.unit_g_mol') }}</option>
                        <option value="kg_mol">{{ __tool('molar-mass-converter', 'form.unit_kg_mol') }}</option>
                        <option value="lb_mol">{{ __tool('molar-mass-converter', 'form.unit_lb_mol') }}</option>
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
                    <label for="toValue" class="block text-sm font-bold text-gray-700 uppercase tracking-wide">{{ __tool('molar-mass-converter', 'form.to_label') }}</label>
                    <div class="relative">
                        <input type="number" id="toValue" step="any"
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-purple-100 focus:border-purple-500 transition-all text-gray-800 placeholder-gray-300 bg-gray-50"
                            placeholder="0" oninput="convert('to')">
                    </div>
                    <select id="toUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <option value="g_mol">{{ __tool('molar-mass-converter', 'form.unit_g_mol') }}</option>
                        <option value="kg_mol" selected>{{ __tool('molar-mass-converter', 'form.unit_kg_mol') }}</option>
                        <option value="lb_mol">{{ __tool('molar-mass-converter', 'form.unit_lb_mol') }}</option>
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
                    <h3 class="text-lg font-bold text-gray-900 mb-2">{{ __tool('molar-mass-converter', 'content.feature1_title') }}</h3>
                    <p class="text-gray-600">{{ __tool('molar-mass-converter', 'content.feature1_desc') }}</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">{{ __tool('molar-mass-converter', 'content.feature2_title') }}</h3>
                    <p class="text-gray-600">{{ __tool('molar-mass-converter', 'content.feature2_desc') }}</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-violet-100 rounded-xl flex items-center justify-center text-violet-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">{{ __tool('molar-mass-converter', 'content.feature3_title') }}</h3>
                    <p class="text-gray-600">{{ __tool('molar-mass-converter', 'content.feature3_desc') }}</p>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __tool('molar-mass-converter', 'content.main_title') }}</h2>
                <div class="prose prose-purple max-w-none text-gray-600">
                    <p>{{ __tool('molar-mass-converter', 'content.description_p1') }}</p>
                    <p class="mt-4">{{ __tool('molar-mass-converter', 'content.description_p2') }}</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">{{ __tool('molar-mass-converter', 'content.usage_examples_title') }}</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <ul class="list-disc list-inside space-y-2">
                            <li>{!! __tool('molar-mass-converter', 'content.usage_1') !!}</li>
                            <li>{!! __tool('molar-mass-converter', 'content.usage_2') !!}</li>
                            <li>{!! __tool('molar-mass-converter', 'content.usage_3') !!}</li>
                        </ul>
                        <ul class="list-disc list-inside space-y-2">
                            <li>{!! __tool('molar-mass-converter', 'content.usage_4') !!}</li>
                            <li>{!! __tool('molar-mass-converter', 'content.usage_5') !!}</li>
                            <li>{!! __tool('molar-mass-converter', 'content.usage_6') !!}</li>
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
                    {{ __tool('molar-mass-converter', 'content.faq_title') }}
                </h2>
                <div class="space-y-6">
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">{{ __tool('molar-mass-converter', 'content.faq_q1') }}</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">{{ __tool('molar-mass-converter', 'content.faq_a1') }}</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">{{ __tool('molar-mass-converter', 'content.faq_q2') }}</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">{{ __tool('molar-mass-converter', 'content.faq_a2') }}</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">{{ __tool('molar-mass-converter', 'content.faq_q3') }}</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">{{ __tool('molar-mass-converter', 'content.faq_a3') }}</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">{{ __tool('molar-mass-converter', 'content.faq_q4') }}</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">{{ __tool('molar-mass-converter', 'content.faq_a4') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
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
@endpush