@extends('layouts.app')

@section('title', __tool('unicode-encoder', 'meta.title'))
@section('meta_description', __tool('unicode-encoder', 'meta.description'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" icon="unicode-encoder" />
        </div>

        <!-- Tool Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-purple-200 mb-8">
            <!-- Mode Selector -->
            <div class="flex gap-3 mb-6">
                <button onclick="setMode('encode')" id="encodeBtn"
                    class="flex-1 px-6 py-3 bg-purple-600 text-white rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    {{ __tool('unicode-encoder', 'editor.btn_encode') }}
                </button>
                <button onclick="setMode('decode')" id="decodeBtn"
                    class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    </svg>
                    {{ __tool('unicode-encoder', 'editor.btn_decode') }}
                </button>
            </div>

            <!-- Input -->
            <div class="mb-6">
                <label for="unicodeInput" class="form-label text-base" id="inputLabel">{{ __tool('unicode-encoder', 'editor.label_input_enc') }}</label>
                <textarea id="unicodeInput" class="form-input font-mono text-sm min-h-[300px]"
                    placeholder="{{ __tool('unicode-encoder', 'editor.ph_input_enc') }}"></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="processUnicode()" class="btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span id="processBtn">{{ __tool('unicode-encoder', 'editor.btn_process_enc') }}</span>
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>{{ __tool('unicode-encoder', 'editor.btn_clear') }}</span>
                </button>
                <button onclick="copyOutput()"
                    class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>{{ __tool('unicode-encoder', 'editor.btn_copy') }}</span>
                </button>
            </div>

            <!-- Status Message -->
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>

            <!-- Output -->
            <div class="mb-6">
                <label for="unicodeOutput" class="form-label text-base" id="outputLabel">{{ __tool('unicode-encoder', 'editor.label_output_enc') }}</label>
                <textarea id="unicodeOutput" class="form-input font-mono text-sm min-h-[300px]" readonly
                    placeholder="{{ __tool('unicode-encoder', 'editor.ph_output') }}"></textarea>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-purple-50 to-indigo-50 rounded-3xl p-8 md:p-12 border-2 border-purple-100 shadow-2xl">
            <div class="text-center mb-8">
                <h2 class="text-4xl font-black text-gray-900 mb-3">{{ __tool('unicode-encoder', 'meta.h1') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __tool('unicode-encoder', 'meta.subtitle') }}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">{{ __tool('unicode-encoder', 'content.p1') }}</p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🌍 {{ __tool('unicode-encoder', 'content.what_title') }}</h3>
            <p class="text-gray-700 leading-relaxed mb-6">{{ __tool('unicode-encoder', 'content.what_desc') }}</p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ {{ __tool('unicode-encoder', 'content.features_title') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                @foreach (['instant', 'all', 'secure'] as $key)
                    <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg">
                        <div class="text-3xl mb-3">
                            @switch($key)
                                @case('instant') ⚡ @break
                                @case('all') 🌐 @break
                                @case('secure') 🔒 @break
                            @endswitch
                        </div>
                        <h4 class="font-bold text-gray-900 mb-2">{{ __tool('unicode-encoder', 'content.features.' . $key . '.title') }}</h4>
                        <p class="text-gray-600 text-sm">{{ __tool('unicode-encoder', 'content.features.' . $key . '.desc') }}</p>
                    </div>
                @endforeach
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 {{ __tool('unicode-encoder', 'content.uses_title') }}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                @foreach (['js', 'json', 'i18n', 'emoji'] as $key)
                    <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-3">
                            @switch($key)
                                @case('js') 💻 @break
                                @case('json') 📄 @break
                                @case('i18n') 🌍 @break
                                @case('emoji') 😀 @break
                            @endswitch
                            {{ __tool('unicode-encoder', 'content.uses.' . $key . '.title') }}
                        </h4>
                        <p class="text-gray-700 leading-relaxed">{{ __tool('unicode-encoder', 'content.uses.' . $key . '.desc') }}</p>
                    </div>
                @endforeach
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 {{ __tool('unicode-encoder', 'content.examples_title') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <div class="space-y-4">
                    @foreach (['chinese', 'emoji', 'accent'] as $key)
                        <div>
                            <p class="font-semibold text-gray-900 mb-2">{{ __tool('unicode-encoder', 'content.examples.' . $key . '.title') }}</p>
                            <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">{{ __tool('unicode-encoder', 'content.examples.' . $key . '.desc') }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ {{ __tool('unicode-encoder', 'content.faq_title') }}</h3>
            <div class="space-y-4">
                @foreach (['q1', 'q2', 'q3'] as $q)
                    <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg">
                        <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('unicode-encoder', 'content.faq.' . $q) }}</h4>
                        <p class="text-gray-700 leading-relaxed">{{ __tool('unicode-encoder', 'content.faq.a' . substr($q, 1)) }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@push('scripts')
    <script>
        let currentMode = 'encode';

        function setMode(mode) {
            currentMode = mode;
            const encodeBtn = document.getElementById('encodeBtn');
            const decodeBtn = document.getElementById('decodeBtn');
            const inputLabel = document.getElementById('inputLabel');
            const outputLabel = document.getElementById('outputLabel');
            const processBtn = document.getElementById('processBtn');

            if (mode === 'encode') {
                encodeBtn.classList.remove('bg-gray-200', 'text-gray-700');
                encodeBtn.classList.add('bg-purple-600', 'text-white');
                decodeBtn.classList.remove('bg-purple-600', 'text-white');
                decodeBtn.classList.add('bg-gray-200', 'text-gray-700');
                inputLabel.textContent = "{{ __tool('unicode-encoder', 'editor.label_input_enc') }}";
                outputLabel.textContent = "{{ __tool('unicode-encoder', 'editor.label_output_enc') }}";
                processBtn.textContent = "{{ __tool('unicode-encoder', 'editor.btn_process_enc') }}";
            } else {
                decodeBtn.classList.remove('bg-gray-200', 'text-gray-700');
                decodeBtn.classList.add('bg-purple-600', 'text-white');
                encodeBtn.classList.remove('bg-purple-600', 'text-white');
                encodeBtn.classList.add('bg-gray-200', 'text-gray-700');
                inputLabel.textContent = "{{ __tool('unicode-encoder', 'editor.label_input_dec') }}";
                outputLabel.textContent = "{{ __tool('unicode-encoder', 'editor.label_output_dec') }}";
                processBtn.textContent = "{{ __tool('unicode-encoder', 'editor.btn_process_dec') }}";
            }
            clearAll();
        }

        function processUnicode() {
            const input = document.getElementById('unicodeInput').value.trim();
            const output = document.getElementById('unicodeOutput');

            if (!input) {
                showStatus("{{ __tool('unicode-encoder', 'editor.error_empty') }}", 'error');
                return;
            }

            try {
                if (currentMode === 'encode') {
                    let encoded = '';
                    for (let i = 0; i < input.length; i++) {
                        const code = input.charCodeAt(i);
                        if (code > 127) {
                            encoded += '\\u' + ('0000' + code.toString(16)).slice(-4);
                        } else {
                            encoded += input[i];
                        }
                    }
                    output.value = encoded;
                    showStatus("{{ __tool('unicode-encoder', 'editor.success_enc') }}", 'success');
                } else {
                    output.value = input.replace(/\\u[\dA-F]{4}/gi, function (match) {
                        return String.fromCharCode(parseInt(match.replace(/\\u/g, ''), 16));
                    });
                    showStatus("{{ __tool('unicode-encoder', 'editor.success_dec') }}", 'success');
                }
            } catch (error) {
                showStatus("{{ __tool('unicode-encoder', 'editor.error_general') }}" + error.message, 'error');
            }
        }

        function clearAll() {
            document.getElementById('unicodeInput').value = '';
            document.getElementById('unicodeOutput').value = '';
            document.getElementById('statusMessage').classList.add('hidden');
        }

        function copyOutput() {
            const output = document.getElementById('unicodeOutput');
            if (!output.value) {
                showStatus("{{ __tool('unicode-encoder', 'editor.error_no_copy') }}", 'error');
                return;
            }
            output.select();
            document.execCommand('copy');
            showStatus("{{ __tool('unicode-encoder', 'editor.success_copy') }}", 'success');
        }

        function showStatus(message, type) {
            const statusMessage = document.getElementById('statusMessage');
            statusMessage.textContent = message;
            statusMessage.classList.remove('hidden', 'bg-green-100', 'text-green-800', 'bg-red-100', 'text-red-800', 'border-green-300', 'border-red-300');

            if (type === 'success') {
                statusMessage.classList.add('bg-green-100', 'text-green-800', 'border-2', 'border-green-300');
            } else {
                statusMessage.classList.add('bg-red-100', 'text-red-800', 'border-2', 'border-red-300');
            }
        }

        // Allow Enter key to process
        document.getElementById('unicodeInput').addEventListener('keypress', function (e) {
            if (e.key === 'Enter' && e.ctrlKey) {
                processUnicode();
            }
        });
    </script>
@endpush
@endsection