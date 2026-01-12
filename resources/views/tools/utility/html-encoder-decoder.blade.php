@extends('layouts.app')

@section('title', __tool('html-encoder-decoder', 'meta.h1'))
@section('meta_description', __tool('html-encoder-decoder', 'meta.subtitle'))
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" icon="html-encoder-decoder" />

        <!-- Tool Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-blue-200 mb-8">
            <!-- Mode Selector -->
            <div class="flex gap-3 mb-6">
                <button onclick="setMode('encode')" id="encodeBtn"
                    class="flex-1 px-6 py-3 bg-blue-600 text-white rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    {!! __tool('html-encoder-decoder', 'editor.mode_encode') !!}
                </button>
                <button onclick="setMode('decode')" id="decodeBtn"
                    class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    </svg>
                    {!! __tool('html-encoder-decoder', 'editor.mode_decode') !!}
                </button>
            </div>

            <!-- Input -->
            <div class="mb-6">
                <label for="htmlInput" class="form-label text-base"
                    id="inputLabel">{!! __tool('html-encoder-decoder', 'editor.label_input_encode') !!}</label>
                <textarea id="htmlInput" class="form-input font-mono text-sm min-h-[300px]"
                    placeholder="{!! __tool('html-encoder-decoder', 'editor.ph_input_encode') !!}"></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="processURL()" class="btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span id="processBtn">{!! __tool('html-encoder-decoder', 'editor.btn_encode') !!}</span>
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>{!! __tool('html-encoder-decoder', 'editor.btn_clear') !!}</span>
                </button>
                <button onclick="copyOutput()"
                    class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>{!! __tool('html-encoder-decoder', 'editor.btn_copy') !!}</span>
                </button>
            </div>

            <!-- Status Message -->
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>

            <!-- Output -->
            <div class="mb-6">
                <label for="htmlOutput" class="form-label text-base"
                    id="outputLabel">{!! __tool('html-encoder-decoder', 'editor.label_output_encode') !!}</label>
                <textarea id="htmlOutput" class="form-input font-mono text-sm min-h-[300px]" readonly
                    placeholder="{!! __tool('html-encoder-decoder', 'editor.ph_output') !!}"></textarea>
            </div>
        </div>

        <!-- SEO Content -->
        <div
            class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-3xl p-8 md:p-12 border-2 border-blue-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">
                    {!! __tool('html-encoder-decoder', 'content.hero_title') !!}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    {!! __tool('html-encoder-decoder', 'content.hero_subtitle') !!}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {!! __tool('html-encoder-decoder', 'content.p1') !!}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('html-encoder-decoder', 'content.what_title') !!}
            </h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                {!! __tool('html-encoder-decoder', 'content.what_desc') !!}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">
                {!! __tool('html-encoder-decoder', 'content.features_title') !!}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">
                        {!! __tool('html-encoder-decoder', 'content.features.fast.title') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('html-encoder-decoder', 'content.features.fast.desc') !!}
                    </p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔄</div>
                    <h4 class="font-bold text-gray-900 mb-2">
                        {!! __tool('html-encoder-decoder', 'content.features.bidirectional.title') !!}</h4>
                    <p class="text-gray-600 text-sm">
                        {!! __tool('html-encoder-decoder', 'content.features.bidirectional.desc') !!}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">
                        {!! __tool('html-encoder-decoder', 'content.features.privacy.title') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('html-encoder-decoder', 'content.features.privacy.desc') !!}
                    </p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📋</div>
                    <h4 class="font-bold text-gray-900 mb-2">
                        {!! __tool('html-encoder-decoder', 'content.features.copy.title') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('html-encoder-decoder', 'content.features.copy.desc') !!}
                    </p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🆓</div>
                    <h4 class="font-bold text-gray-900 mb-2">
                        {!! __tool('html-encoder-decoder', 'content.features.free.title') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('html-encoder-decoder', 'content.features.free.desc') !!}
                    </p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🌐</div>
                    <h4 class="font-bold text-gray-900 mb-2">
                        {!! __tool('html-encoder-decoder', 'content.features.safe.title') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('html-encoder-decoder', 'content.features.safe.desc') !!}
                    </p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('html-encoder-decoder', 'content.uses_title') !!}
            </h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">
                        {!! __tool('html-encoder-decoder', 'content.uses.security.title') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">
                        {!! __tool('html-encoder-decoder', 'content.uses.security.desc') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">
                        {!! __tool('html-encoder-decoder', 'content.uses.display.title') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">
                        {!! __tool('html-encoder-decoder', 'content.uses.display.desc') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">
                        {!! __tool('html-encoder-decoder', 'content.uses.data.title') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">
                        {!! __tool('html-encoder-decoder', 'content.uses.data.desc') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">
                        {!! __tool('html-encoder-decoder', 'content.uses.email.title') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">
                        {!! __tool('html-encoder-decoder', 'content.uses.email.desc') !!}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('html-encoder-decoder', 'content.how_title') !!}
            </h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">1.</span>
                        <span>{!! __tool('html-encoder-decoder', 'content.how_steps.1') !!}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">2.</span>
                        <span>{!! __tool('html-encoder-decoder', 'content.how_steps.2') !!}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">3.</span>
                        <span>{!! __tool('html-encoder-decoder', 'content.how_steps.3') !!}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">4.</span>
                        <span>{!! __tool('html-encoder-decoder', 'content.how_steps.4') !!}</span>
                    </li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">
                {!! __tool('html-encoder-decoder', 'content.examples_title') !!}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <div class="space-y-4">
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">
                            {!! __tool('html-encoder-decoder', 'content.examples.1.title') !!}</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">
                            {!! __tool('html-encoder-decoder', 'content.examples.1.code') !!}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">
                            {!! __tool('html-encoder-decoder', 'content.examples.2.title') !!}</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">
                            {!! __tool('html-encoder-decoder', 'content.examples.2.code') !!}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">
                            {!! __tool('html-encoder-decoder', 'content.examples.3.title') !!}</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">
                            {!! __tool('html-encoder-decoder', 'content.examples.3.code') !!}</p>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('html-encoder-decoder', 'content.faq_title') !!}
            </h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">
                        {!! __tool('html-encoder-decoder', 'content.faq.q1') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('html-encoder-decoder', 'content.faq.a1') !!}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">
                        {!! __tool('html-encoder-decoder', 'content.faq.q2') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('html-encoder-decoder', 'content.faq.a2') !!}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">
                        {!! __tool('html-encoder-decoder', 'content.faq.q3') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('html-encoder-decoder', 'content.faq.a3') !!}</p>
                </div>
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
                    encodeBtn.classList.add('bg-blue-600', 'text-white');
                    decodeBtn.classList.remove('bg-blue-600', 'text-white');
                    decodeBtn.classList.add('bg-gray-200', 'text-gray-700');
                    inputLabel.textContent = "{!! __tool('html-encoder-decoder', 'editor.label_input_encode') !!}";
                    outputLabel.textContent = "{!! __tool('html-encoder-decoder', 'editor.label_output_encode') !!}";
                    processBtn.textContent = "{!! __tool('html-encoder-decoder', 'editor.btn_encode') !!}";
                } else {
                    decodeBtn.classList.remove('bg-gray-200', 'text-gray-700');
                    decodeBtn.classList.add('bg-blue-600', 'text-white');
                    encodeBtn.classList.remove('bg-blue-600', 'text-white');
                    encodeBtn.classList.add('bg-gray-200', 'text-gray-700');
                    inputLabel.textContent = "{!! __tool('html-encoder-decoder', 'editor.label_input_decode') !!}";
                    outputLabel.textContent = "{!! __tool('html-encoder-decoder', 'editor.label_output_decode') !!}";
                    processBtn.textContent = "{!! __tool('html-encoder-decoder', 'editor.btn_decode') !!}";
                }
                clearAll();
            }

            function processURL() {
                const input = document.getElementById('htmlInput').value.trim();
                const output = document.getElementById('htmlOutput');

                if (!input) {
                    showStatus("{!! __tool('html-encoder-decoder', 'js.error_empty') !!}", 'error');
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
                        showStatus("{!! __tool('html-encoder-decoder', 'js.success_encode') !!}", 'success');
                    } else {
                        output.value = input
                            .replace(/&quot;/g, '"')
                            .replace(/&#39;/g, "'")
                            .replace(/&lt;/g, '<')
                            .replace(/&gt;/g, '>')
                            .replace(/&amp;/g, '&');
                        showStatus("{!! __tool('html-encoder-decoder', 'js.success_decode') !!}", 'success');
                    }
                } catch (error) {
                    showStatus("{!! __tool('html-encoder-decoder', 'js.error_process') !!}" + error.message, 'error');
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
                    showStatus("{!! __tool('html-encoder-decoder', 'js.error_no_copy') !!}", 'error');
                    return;
                }
                output.select();
                document.execCommand('copy');
                showStatus("{!! __tool('html-encoder-decoder', 'js.success_copy') !!}", 'success');
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
                    processURL();
                }
            });
        </script>
    @endpush
@endsection