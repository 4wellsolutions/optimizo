@extends('layouts.app')

@section('title', __tool('data-transfer-rate-converter', 'seo.title'))
@section('meta_description', __tool('data-transfer-rate-converter', 'seo.description'))
@section('meta_keywords', __tool('data-transfer-rate-converter', 'seo.keywords'))

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        {{-- Hero Section --}}
        {{-- Hero Section --}}
        <x-tool-hero :tool="$tool" />

        {{-- Converter Card --}}
        <div class="bg-white rounded-3xl p-6 md:p-10 shadow-2xl border border-gray-100 mb-12 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-cyan-500 to-blue-600"></div>

            <div class="grid md:grid-cols-7 gap-6 items-center">
                {{-- From Section --}}
                <div class="md:col-span-3 space-y-2">
                    <label for="fromValue"
                        class="block text-sm font-bold text-gray-700 uppercase tracking-wide">{{ __tool('data-transfer-rate-converter', 'form.from_label') }}</label>
                    <div class="relative">
                        <input type="number" id="fromValue" value="100" step="any"
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-cyan-100 focus:border-cyan-500 transition-all text-gray-800 placeholder-gray-300"
                            placeholder="0" oninput="convert('from')">
                    </div>
                    <select id="fromUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <option value="bps">{{ __tool('data-transfer-rate-converter', 'form.unit_bps') }}</option>
                        <option value="kbps">{{ __tool('data-transfer-rate-converter', 'form.unit_kbps') }}</option>
                        <option value="Mbps" selected>{{ __tool('data-transfer-rate-converter', 'form.unit_Mbps') }}</option>
                        <option value="Gbps">{{ __tool('data-transfer-rate-converter', 'form.unit_Gbps') }}</option>
                        <option value="kB_s">{{ __tool('data-transfer-rate-converter', 'form.unit_kB_s') }}</option>
                        <option value="MB_s">{{ __tool('data-transfer-rate-converter', 'form.unit_MB_s') }}</option>
                        <option value="GB_s">{{ __tool('data-transfer-rate-converter', 'form.unit_GB_s') }}</option>
                    </select>
                </div>

                {{-- Swap Button --}}
                <div class="md:col-span-1 flex justify-center py-4 md:py-0">
                    <button onclick="swapUnits()"
                        class="p-4 bg-cyan-50 text-cyan-600 rounded-full hover:bg-cyan-100 hover:scale-110 active:scale-95 transition-all shadow-md focus:outline-none focus:ring-4 focus:ring-cyan-100"
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
                    <label for="toValue"
                        class="block text-sm font-bold text-gray-700 uppercase tracking-wide">{{ __tool('data-transfer-rate-converter', 'form.to_label') }}</label>
                    <div class="relative">
                        <input type="number" id="toValue" step="any"
                            class="block w-full text-3xl font-bold p-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-cyan-100 focus:border-cyan-500 transition-all text-gray-800 placeholder-gray-300 bg-gray-50"
                            placeholder="0" oninput="convert('to')">
                    </div>
                    <select id="toUnit" onchange="convert('from')"
                        class="block w-full p-3 bg-gray-50 border border-gray-200 rounded-xl font-medium text-gray-700 focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-100">
                        <option value="bps">{{ __tool('data-transfer-rate-converter', 'form.unit_bps') }}</option>
                        <option value="kbps">{{ __tool('data-transfer-rate-converter', 'form.unit_kbps') }}</option>
                        <option value="Mbps">{{ __tool('data-transfer-rate-converter', 'form.unit_Mbps') }}</option>
                        <option value="Gbps">{{ __tool('data-transfer-rate-converter', 'form.unit_Gbps') }}</option>
                        <option value="kB_s">{{ __tool('data-transfer-rate-converter', 'form.unit_kB_s') }}</option>
                        <option value="MB_s" selected>{{ __tool('data-transfer-rate-converter', 'form.unit_MB_s') }}</option>
                        <option value="GB_s">{{ __tool('data-transfer-rate-converter', 'form.unit_GB_s') }}</option>
                    </select>
                </div>
            </div>

            {{-- Formula Display --}}
            <div class="mt-8 p-4 bg-gray-50 rounded-xl border border-gray-100 text-center">
                <p id="formulaDisplay" class="text-cyan-600 font-medium font-mono text-sm sm:text-base"></p>
                <p class="text-xs text-gray-400 mt-2">1 Byte = 8 Bits</p>
            </div>
        </div>

        {{-- SEO Content Section --}}
        <div class="space-y-12">
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-cyan-100 rounded-xl flex items-center justify-center text-cyan-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">{{ __tool('data-transfer-rate-converter', 'content.feature1_title') }}</h3>
                    <p class="text-gray-600">{{ __tool('data-transfer-rate-converter', 'content.feature1_desc') }}</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">{{ __tool('data-transfer-rate-converter', 'content.feature2_title') }}</h3>
                    <p class="text-gray-600">{{ __tool('data-transfer-rate-converter', 'content.feature2_desc') }}</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">{{ __tool('data-transfer-rate-converter', 'content.feature3_title') }}</h3>
                    <p class="text-gray-600">{{ __tool('data-transfer-rate-converter', 'content.feature3_desc') }}</p>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">
                    {{ __tool('data-transfer-rate-converter', 'content.main_title') }}
                </h2>
                <div class="prose prose-cyan max-w-none text-gray-600">
                    <p>{{ __tool('data-transfer-rate-converter', 'content.description_p1') }}</p>
                    <p class="mt-4">{{ __tool('data-transfer-rate-converter', 'content.description_p2') }}</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">{{ __tool('data-transfer-rate-converter', 'content.usage_examples_title') }}</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <ul class="list-disc list-inside space-y-2">
                            <li>{!! __tool('data-transfer-rate-converter', 'content.usage_1') !!}</li>
                            <li>{!! __tool('data-transfer-rate-converter', 'content.usage_2') !!}</li>
                            <li>{!! __tool('data-transfer-rate-converter', 'content.usage_3') !!}</li>
                        </ul>
                        <ul class="list-disc list-inside space-y-2">
                            <li>{!! __tool('data-transfer-rate-converter', 'content.usage_4') !!}</li>
                            <li>{!! __tool('data-transfer-rate-converter', 'content.usage_5') !!}</li>
                            <li>{!! __tool('data-transfer-rate-converter', 'content.usage_6') !!}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-cyan-50 to-white rounded-3xl p-8 border border-cyan-100 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                    {{ __tool('data-transfer-rate-converter', 'content.faq_title') }}
                </h2>
                <div class="space-y-6">
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">{{ __tool('data-transfer-rate-converter', 'content.faq_q1') }}</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">{{ __tool('data-transfer-rate-converter', 'content.faq_a1') }}</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">{{ __tool('data-transfer-rate-converter', 'content.faq_q2') }}</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">{{ __tool('data-transfer-rate-converter', 'content.faq_a2') }}</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">{{ __tool('data-transfer-rate-converter', 'content.faq_q3') }}</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">{{ __tool('data-transfer-rate-converter', 'content.faq_a3') }}</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">{{ __tool('data-transfer-rate-converter', 'content.faq_q4') }}</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">{{ __tool('data-transfer-rate-converter', 'content.faq_a4') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        // Conversion rates relative to Bit per Second (bps)
        // Using standard decimal definition for transfer rates (1k = 1000)
        const rates = {
            'bps': 1,
            'kbps': 1000,
            'Mbps': 1000000,
            'Gbps': 1000000000,
            'kB_s': 8000,
            'MB_s': 8000000,
            'GB_s': 8000000000
        };

        const names = {
            'bps': 'bits/s', 'kbps': 'Kbps', 'Mbps': 'Mbps', 'Gbps': 'Gbps',
            'kB_s': 'KB/s', 'MB_s': 'MB/s', 'GB_s': 'GB/s'
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