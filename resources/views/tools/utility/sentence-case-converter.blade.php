@extends('layouts.app')

@section('title', __tool('sentence-case-converter', 'meta.h1'))
@section('meta_description', __tool('sentence-case-converter', 'meta.subtitle'))

@section('content')
    <div class="max-w-6xl mx-auto">
        {{-- Hero Section --}}
        <x-tool-hero :tool="$tool" icon="sentence-case-converter" />


        {{-- Tool Section --}}
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-purple-200 mb-8">
            {{-- Input Section --}}
            <div class="mb-6">
                <label for="inputText" class="block text-sm font-semibold text-gray-700 mb-2">
                    {{ __tool('sentence-case-converter', 'editor.label_input') }}
                </label>
                <textarea id="inputText" rows="8"
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 font-mono text-sm resize-none"
                    placeholder="{{ __tool('sentence-case-converter', 'editor.ph_input') }}"></textarea>
            </div>

            {{-- Action Buttons --}}
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convertText()"
                    class="px-8 py-3 bg-purple-600 text-white rounded-xl hover:bg-purple-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>{{ __tool('sentence-case-converter', 'editor.btn_convert') }}</span>
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>{{ __tool('sentence-case-converter', 'editor.btn_clear') }}</span>
                </button>
                <button onclick="copyOutput()"
                    class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>{{ __tool('sentence-case-converter', 'editor.btn_copy') }}</span>
                </button>
            </div>

            {{-- Output Section --}}
            <div class="mb-4">
                <label for="outputText" class="block text-sm font-semibold text-gray-700 mb-2">
                     {{ __tool('sentence-case-converter', 'editor.label_output') }}
                </label>
                <textarea id="outputText" rows="8" readonly
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl bg-gray-50 font-mono text-sm resize-none"
                    placeholder="{{ __tool('sentence-case-converter', 'editor.ph_output') }}"></textarea>
            </div>

            {{-- Status Message --}}
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>
        </div>
    </div>

    {{-- SEO Content --}}
    <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-3xl p-8 md:p-12 border-2 border-purple-100 shadow-2xl">
        <div class="text-center mb-8">
            <div
                class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl shadow-xl mb-4">
                <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
            </div>
            <h2 class="text-4xl font-black text-gray-900 mb-3">{{ __tool('sentence-case-converter', 'meta.h1') }}</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __tool('sentence-case-converter', 'meta.subtitle') }}</p>
        </div>

        <p class="text-gray-700 leading-relaxed text-lg mb-8">
            {{ __tool('sentence-case-converter', 'content.p1') }}
        </p>

        <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('sentence-case-converter', 'content.features_title') }}</h3>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
            <div
                class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                <div class="text-3xl mb-3">🎯</div>
                <h4 class="font-bold text-gray-900 mb-2">{{ __tool('sentence-case-converter', 'content.features.auto_cap.title') }}</h4>
                <p class="text-gray-600 text-sm">{{ __tool('sentence-case-converter', 'content.features.auto_cap.desc') }}</p>
            </div>
            <div
                class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                <div class="text-3xl mb-3">⚡</div>
                <h4 class="font-bold text-gray-900 mb-2">{{ __tool('sentence-case-converter', 'content.features.instant.title') }}</h4>
                <p class="text-gray-600 text-sm">{{ __tool('sentence-case-converter', 'content.features.instant.desc') }}</p>
            </div>
            <div
                class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                <div class="text-3xl mb-3">🔒</div>
                <h4 class="font-bold text-gray-900 mb-2">{{ __tool('utilities.sentence-case-converter.content.features.privacy.title', 'Privacy Protected') }}</h4>
                <p class="text-gray-600 text-sm">{{ __tool('utilities.sentence-case-converter.content.features.privacy.desc', 'All processing happens in your browser - your text never leaves your device') }}
                </p>
            </div>
            <div
                class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                <div class="text-3xl mb-3">📝</div>
                <h4 class="font-bold text-gray-900 mb-2">{{ __tool('sentence-case-converter', 'content.features.bulk.title') }}</h4>
                <p class="text-gray-600 text-sm">{{ __tool('sentence-case-converter', 'content.features.bulk.desc') }}</p>
            </div>
            <div
                class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                <div class="text-3xl mb-3">🎨</div>
                <h4 class="font-bold text-gray-900 mb-2">{{ __tool('utilities.sentence-case-converter.content.features.clean.title', 'Clean Formatting') }}</h4>
                <p class="text-gray-600 text-sm">{{ __tool('utilities.sentence-case-converter.content.features.clean.desc', 'Removes inconsistent capitalization and creates uniform, professional text') }}
                </p>
            </div>
            <div
                class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                <div class="text-3xl mb-3">🆓</div>
                <h4 class="font-bold text-gray-900 mb-2">{{ __tool('sentence-case-converter', 'content.features.free.title') }}</h4>
                <p class="text-gray-600 text-sm">{{ __tool('sentence-case-converter', 'content.features.free.desc') }}</p>
            </div>
        </div>

        <h3 class="text-2xl font-bold text-gray-900 mt-12 mb-6">{{ __tool('sentence-case-converter', 'content.uses_title') }}</h3>

            @foreach(['email', 'document', 'content', 'social', 'academic', 'business'] as $use)
            <div class="bg-white p-6 rounded-xl border-2 border-gray-100 hover:border-purple-200 transition-colors">
                <h4 class="font-bold text-gray-900 mb-2">{{ __tool('sentence-case-converter', 'content.uses.' . $use . '.title') }}</h4>
                <p class="text-gray-600 text-sm">{{ __tool('sentence-case-converter', 'content.uses.' . $use . '.desc') }}</p>
            </div>
            @endforeach
        </div>

        <h3 class="text-2xl font-bold text-gray-900 mt-12 mb-6">{{ __tool('sentence-case-converter', 'content.how_to_title') }}</h3>
        <ol class="space-y-4 mb-12">
            @foreach(__tool('sentence-case-converter', 'content.how_to_steps') as $step)
            <li class="flex gap-4">
                <span
                    class="flex-shrink-0 w-8 h-8 bg-purple-600 text-white rounded-full flex items-center justify-center font-bold">{{ $loop->iteration }}</span>
                <div>
                    <strong class="text-gray-900">{{ $step['title'] }}</strong>
                    <p class="text-gray-600 mt-1">{{ $step['desc'] }}</p>
                </div>
            </li>
            @endforeach
        </ol>

        <h3 class="text-2xl font-bold text-gray-900 mt-12 mb-6">{{ __tool('sentence-case-converter', 'content.examples_title') }}</h3>

            @foreach(__tool('sentence-case-converter', 'content.samples') as $sample)
            <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                <div class="mb-3">
                    <span class="text-sm font-semibold text-gray-500 uppercase">Before:</span>
                    <p class="font-mono text-sm mt-2 text-gray-700">{{ $sample['before'] }}</p>
                </div>
                <div>
                    <span class="text-sm font-semibold text-purple-600 uppercase">After:</span>
                    <p class="font-mono text-sm mt-2 text-gray-900">{{ $sample['after'] }}</p>
                </div>
            </div>
            @endforeach
        </div>

        <h3 class="text-2xl font-bold text-gray-900 mt-12 mb-6">{{ __tool('sentence-case-converter', 'content.faq_title') }}</h3>
        <div class="space-y-6 mb-12">
            @foreach(['q1', 'q2', 'q3', 'q4', 'q5'] as $faq)
            <div class="bg-white p-6 rounded-xl border-2 border-gray-100">
                <h4 class="font-bold text-gray-900 mb-2">{{ __tool('sentence-case-converter', 'content.faq.' . $faq) }}</h4>
                <p class="text-gray-600 text-sm">{{ __tool('sentence-case-converter', 'content.faq.' . str_replace('q', 'a', $faq)) }}</p>
            </div>
            @endforeach
        </div>
    </div>
    </div>

    @push('scripts')
    <script>
        function convertText() {
            const input = document.getElementById('inputText').value;

            if (!input.trim()) {
                showStatus("{{ __tool('sentence-case-converter', 'js.error_empty') }}", 'error');
                return;
            }

            // Convert to sentence case
            const output = input.toLowerCase().replace(/(^\s*\w|[.!?]\s*\w)/g, function (match) {
                return match.toUpperCase();
            });

            document.getElementById('outputText').value = output;
            showStatus("{{ __tool('sentence-case-converter', 'js.success_converted') }}", 'success');
        }

        function clearAll() {
            document.getElementById('inputText').value = '';
            document.getElementById('outputText').value = '';
            hideStatus();
        }

        function copyOutput() {
            const output = document.getElementById('outputText');

            if (!output.value) {
                showStatus("{{ __tool('sentence-case-converter', 'js.error_no_copy') }}", 'error');
                return;
            }

            output.select();
            document.execCommand('copy');
            showStatus("{{ __tool('sentence-case-converter', 'js.success_copy') }}", 'success');
        }

        function showStatus(message, type) {
            const statusEl = document.getElementById('statusMessage');
            statusEl.textContent = message;
            statusEl.className = `mt-4 text-center text-sm font-medium ${type === 'success' ? 'text-green-600' : 'text-red-600'}`;
            statusEl.classList.remove('hidden');
        }

        function hideStatus() {
            document.getElementById('statusMessage').classList.add('hidden');
        }
    </script>
    @endpush
@endsection