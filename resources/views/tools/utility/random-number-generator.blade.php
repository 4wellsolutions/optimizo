@extends('layouts.app')

@section('title', __tool('random-number-generator', 'meta.title'))
@section('meta_description', __tool('random-number-generator', 'meta.description'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" icon="random-number-generator" />

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-purple-200 mb-8">
            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="min" class="block text-sm font-semibold text-gray-700 mb-2">{{ __tool('utilities.random-number-generator.editor.label_min', 'Min Value') }}</label>
                    <input type="number" id="min" value="1"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                </div>
                <div>
                    <label for="max" class="block text-sm font-semibold text-gray-700 mb-2">{{ __tool('utilities.random-number-generator.editor.label_max', 'Max Value') }}</label>
                    <input type="number" id="max" value="100"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                </div>
            </div>

            <div class="mb-6">
                <label for="count" class="block text-sm font-semibold text-gray-700 mb-2">{{ __tool('utilities.random-number-generator.editor.label_count', 'Quantity') }}</label>
                <input type="number" id="count" value="1" min="1" max="1000"
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
            </div>

            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="generateRandom()"
                    class="px-8 py-3 bg-purple-600 text-white rounded-xl hover:bg-purple-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                    <span>{{ __tool('utilities.random-number-generator.editor.btn_generate', 'Generate Numbers') }}</span>
                </button>
            </div>

            <div class="mb-4">
                <label for="outputResult" class="block text-sm font-semibold text-gray-700 mb-2">{{ __tool('utilities.random-number-generator.editor.label_result', 'Result') }}</label>
                <div id="outputResult"
                    class="w-full px-4 py-6 border-2 border-gray-200 rounded-xl bg-gray-50 text-3xl font-mono text-center min-h-[100px] flex items-center justify-center break-all">
                    50
                </div>
            </div>
        </div>

        <div
            class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-3xl p-8 md:p-12 border-2 border-purple-100 shadow-2xl">
            <h2 class="text-3xl font-black text-gray-900 mb-3 text-center">{{ __tool('utilities.random-number-generator.meta.h1', 'Random Number Generation') }}</h2>
            <p class="text-gray-600 text-center mx-auto max-w-xl">{{ __tool('utilities.random-number-generator.meta.subtitle', 'Generate true random integers within your specified range. Useful for games, lotteries, statistical sampling, and giveaways.') }}</p>
        </div>
    </div>

    @push('scripts')
    <script>
        function generateRandom() {
            const min = parseInt(document.getElementById('min').value);
            const max = parseInt(document.getElementById('max').value);
            const count = parseInt(document.getElementById('count').value) || 1;

            if (isNaN(min) || isNaN(max)) {
                showError("{{ __tool('utilities.random-number-generator.js.error_invalid', 'Please enter valid numbers') }}");
                return;
            }
            if (min > max) {
                showError("{{ __tool('utilities.random-number-generator.js.error_min_max', 'Min cannot be greater than Max') }}");
                return;
            }

            const results = [];
            for (let i = 0; i < count; i++) {
                results.push(Math.floor(Math.random() * (max - min + 1)) + min);
            }

            document.getElementById('outputResult').innerText = results.join(', ');
        }
    </script>
    @endpush
@endsection