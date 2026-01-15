@extends('layouts.app')

@section('title', __tool('html-encoder', 'meta.title'))
@section('meta_description', __tool('html-encoder', 'meta.description'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" icon="html-encoder" />

        <!-- Tool Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-orange-200 mb-8">
            <!-- Mode Selector -->
            <div class="flex gap-3 mb-6">
                <button onclick="setMode('encode')" id="encodeBtn"
                    class="flex-1 px-6 py-3 bg-orange-600 text-white rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    {{ __tool('html-encoder', 'editor.btn_encode') }}
                </button>
                <button onclick="setMode('decode')" id="decodeBtn"
                    class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    </svg>
                    {{ __tool('html-encoder', 'editor.btn_decode') }}
                </button>
            </div>

            <!-- Input -->
            <div class="mb-6">
                <label for="htmlInput" class="form-label text-base" id="inputLabel">{{ __tool('html-encoder', 'editor.label_input_enc') }}</label>
                <textarea id="htmlInput" class="form-input font-mono text-sm min-h-[300px]"
                    placeholder="<div class='example'>Hello & Welcome!</div>"></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="processHTML()" class="btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span id="processBtn">{{ __tool('html-encoder', 'editor.btn_process_enc') }}</span>
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>{{ __tool('html-encoder', 'editor.btn_clear') }}</span>
                </button>
                <button onclick="copyOutput()"
                    class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>{{ __tool('html-encoder', 'editor.btn_copy') }}</span>
                </button>
            </div>

            <!-- Status Message -->
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>

            <!-- Output -->
            <div class="mb-6">
                <label for="htmlOutput" class="form-label text-base" id="outputLabel">{{ __tool('html-encoder', 'editor.label_output_enc') }}</label>
                <textarea id="htmlOutput" class="form-input font-mono text-sm min-h-[300px]" readonly
                    placeholder="Processed HTML will appear here..."></textarea>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-3xl p-8 md:p-12 border-2 border-orange-100 shadow-2xl">
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">{{ __tool('html-encoder', 'meta.h1') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __tool('html-encoder', 'meta.subtitle') }}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">{{ __tool('html-encoder', 'content.p1') }}</p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🔐 {{ __tool('html-encoder', 'content.what_title') }}</h3>
            <p class="text-gray-700 leading-relaxed mb-6">{{ __tool('html-encoder', 'content.what_desc') }}</p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ {{ __tool('html-encoder', 'content.features_title') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                @foreach (['instant', 'bi', 'xss', 'copy', 'free', 'chars'] as $key)
                    <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-orange-300 transition-all shadow-lg hover:shadow-xl">
                        <div class="text-3xl mb-3">
                            @switch($key)
                                @case('instant') ⚡ @break
                                @case('bi') 🔄 @break
                                @case('xss') 🔒 @break
                                @case('copy') 📋 @break
                                @case('free') 🆓 @break
                                @case('chars') 🌐 @break
                            @endswitch
                        </div>
                        <h4 class="font-bold text-gray-900 mb-2">{{ __tool('html-encoder', 'content.features.' . $key . '.title') }}</h4>
                        <p class="text-gray-600 text-sm">{{ __tool('html-encoder', 'content.features.' . $key . '.desc') }}</p>
                    </div>
                @endforeach
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 {{ __tool('html-encoder', 'content.uses_title') }}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                @foreach (['security', 'display', 'email', 'db'] as $key)
                    <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-3">
                            @switch($key)
                                @case('security') 🔒 @break
                                @case('display') 💻 @break
                                @case('email') 📧 @break
                                @case('db') 🗄️ @break
                            @endswitch
                            {{ __tool('html-encoder', 'content.uses.' . $key . '.title') }}
                        </h4>
                        <p class="text-gray-700 leading-relaxed">{{ __tool('html-encoder', 'content.uses.' . $key . '.desc') }}</p>
                    </div>
                @endforeach
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 {{ __tool('html-encoder', 'content.examples_title') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <div class="space-y-4">
                    @foreach (['less', 'greater', 'amp', 'quote'] as $key)
                        <div>
                            <p class="font-semibold text-gray-900 mb-2">{{ __tool('html-encoder', 'content.examples.' . $key . '.title') }}</p>
                            <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">{{ __tool('html-encoder', 'content.examples.' . $key . '.desc') }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ {{ __tool('html-encoder', 'content.faq_title') }}</h3>
            <div class="space-y-4">
                @foreach (['q1', 'q2', 'q3'] as $q)
                    <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                        <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('html-encoder', 'content.faq.' . $q) }}</h4>
                        <p class="text-gray-700 leading-relaxed">{{ __tool('html-encoder', 'content.faq.a' . substr($q, 1)) }}</p>
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
                encodeBtn.classList.add('bg-orange-600', 'text-white');
                decodeBtn.classList.remove('bg-orange-600', 'text-white');
                decodeBtn.classList.add('bg-gray-200', 'text-gray-700');
                inputLabel.textContent = "{{ __tool('html-encoder', 'editor.label_input_enc') }}";
                outputLabel.textContent = "{{ __tool('html-encoder', 'editor.label_output_enc') }}";
                processBtn.textContent = "{{ __tool('html-encoder', 'editor.btn_process_enc') }}";
            } else {
                decodeBtn.classList.remove('bg-gray-200', 'text-gray-700');
                decodeBtn.classList.add('bg-orange-600', 'text-white');
                encodeBtn.classList.remove('bg-orange-600', 'text-white');
                encodeBtn.classList.add('bg-gray-200', 'text-gray-700');
                inputLabel.textContent = "{{ __tool('html-encoder', 'editor.label_input_dec') }}";
                outputLabel.textContent = "{{ __tool('html-encoder', 'editor.label_output_dec') }}";
                processBtn.textContent = "{{ __tool('html-encoder', 'editor.btn_process_dec') }}";
            }
            clearAll();
        }

        function processHTML() {
            const input = document.getElementById('htmlInput').value.trim();
            const output = document.getElementById('htmlOutput');

            if (!input) {
                showStatus("{{ __tool('html-encoder', 'editor.error_empty') }}", 'error');
                return;
            }

            try {
                if (currentMode === 'encode') {
                    output.value = input
                        .replace(/&/g, '&amp;')
                        .replace(/</g, '&lt;')
                        .replace(/>/g, '&gt;')
                        .replace(/"/g, '&quot;')
                        .replace(/'/g, '&#39;');
                    showStatus("{{ __tool('html-encoder', 'editor.success_enc') }}", 'success');
                } else {
                    output.value = input
                        .replace(/&lt;/g, '<')
                        .replace(/&gt;/g, '>')
                        .replace(/&quot;/g, '"')
                        .replace(/&#39;/g, "'")
                        .replace(/&amp;/g, '&');
                    showStatus("{{ __tool('html-encoder', 'editor.success_dec') }}", 'success');
                }
            } catch (error) {
                showStatus("{{ __tool('html-encoder', 'editor.error_general') }}" + error.message, 'error');
            }
        }

        function clearAll() {
            document.getElementById('htmlInput').value = '';
            document.getElementById('htmlOutput').value = '';
            document.getElementById('statusMessage').classList.add('hidden');
        }

        function copyOutput() {
            const output = document.getElementById('htmlOutput');
            if (!output.value) {
                showStatus("{{ __tool('html-encoder', 'editor.error_no_copy') }}", 'error');
                return;
            }
            output.select();
            document.execCommand('copy');
            showStatus("{{ __tool('html-encoder', 'editor.success_copy') }}", 'success');
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
        document.getElementById('htmlInput').addEventListener('keypress', function (e) {
            if (e.key === 'Enter' && e.ctrlKey) {
                processHTML();
            }
        });
    </script>
@endpush
@endsection