@extends('layouts.app')

@section('title', __tool('base64-encoder-decoder', 'meta.title'))
@section('meta_description', __tool('base64-encoder-decoder', 'meta.description'))
@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- SEO-Optimized Header with Gradient Background -->
        <x-tool-hero :tool="$tool" />

        <!-- Base64 Tool with Tabs -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-green-200 mb-8">
            <div class="flex gap-2 mb-6 border-b-2 border-gray-200">
                <button onclick="switchTab('encode')" id="encodeTab" class="tab-btn active px-6 py-3 font-bold text-lg">
                    {!! __tool('base64-encoder-decoder', 'editor.tab_encode') !!}
                </button>
                <button onclick="switchTab('decode')" id="decodeTab" class="tab-btn px-6 py-3 font-bold text-lg">
                    {!! __tool('base64-encoder-decoder', 'editor.tab_decode') !!}
                </button>
            </div>

            <!-- Encode Tab -->
            <div id="encodePanel">
                <div class="mb-6">
                    <label for="encodeInput"
                        class="form-label text-base">{!! __tool('base64-encoder-decoder', 'editor.label_encode') !!}</label>
                    <textarea id="encodeInput" class="form-input font-mono text-sm min-h-[350px]"
                        placeholder="{!! __tool('base64-encoder-decoder', 'editor.ph_encode') !!}"></textarea>
                    <p class="text-sm text-gray-500 mt-2">{!! __tool('base64-encoder-decoder', 'editor.desc_encode') !!}</p>
                </div>
                <button onclick="encodeBase64()" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    {!! __tool('base64-encoder-decoder', 'editor.btn_encode') !!}
                </button>
            </div>

            <!-- Decode Tab -->
            <div id="decodePanel" class="hidden">
                <div class="mb-6">
                    <label for="decodeInput"
                        class="form-label text-base">{!! __tool('base64-encoder-decoder', 'editor.label_decode') !!}</label>
                    <textarea id="decodeInput" class="form-input font-mono text-sm min-h-[350px]"
                        placeholder="{!! __tool('base64-encoder-decoder', 'editor.ph_decode') !!}"></textarea>
                    <p class="text-sm text-gray-500 mt-2">{!! __tool('base64-encoder-decoder', 'editor.desc_decode') !!}</p>
                </div>
                <button onclick="decodeBase64()" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    {!! __tool('base64-encoder-decoder', 'editor.btn_decode') !!}
                </button>
            </div>
        </div>

        <!-- Error Message -->
        <div id="errorMessage" class="hidden bg-red-50 border-2 border-red-200 rounded-2xl p-6 mb-8">
            <p class="text-red-800 font-semibold flex items-center">
                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                        clip-rule="evenodd" />
                </svg>
                <span id="errorText"></span>
            </p>
        </div>

        <!-- Results Section -->
        <div id="resultsSection" class="hidden">
            <div class="result-card">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">{!! __tool('base64-encoder-decoder', 'editor.result_title') !!}</h2>
                    <button onclick="copyResult()" class="btn-secondary">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                        {!! __tool('base64-encoder-decoder', 'editor.btn_copy') !!}
                    </button>
                </div>
                <div class="bg-gray-900 rounded-xl p-6 overflow-x-auto">
                    <pre id="resultText" class="text-sm text-green-400 font-mono break-all whitespace-pre-wrap"></pre>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div
            class="bg-gradient-to-br from-green-50 to-teal-50 rounded-2xl p-6 md:p-8 mt-8 border-2 border-green-100 shadow-xl">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">{!! __tool('base64-encoder-decoder', 'content.what_title') !!}</h2>
            <p class="text-gray-700 leading-relaxed mb-6 text-lg">
                {!! __tool('base64-encoder-decoder', 'content.what_desc') !!}
            </p>
            <div class="grid md:grid-cols-3 gap-4 mt-6">
                <div
                    class="bg-white rounded-xl p-5 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-green-200">
                    <div class="text-4xl mb-3">🔐</div>
                    <h3 class="font-bold text-green-600 mb-2 text-lg">
                        {!! __tool('base64-encoder-decoder', 'content.features.secure.title') !!}</h3>
                    <p class="text-sm text-gray-600">{!! __tool('base64-encoder-decoder', 'content.features.secure.desc') !!}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-teal-200">
                    <div class="text-4xl mb-3">⚡</div>
                    <h3 class="font-bold text-teal-600 mb-2 text-lg">
                        {!! __tool('base64-encoder-decoder', 'content.features.instant.title') !!}</h3>
                    <p class="text-sm text-gray-600">{!! __tool('base64-encoder-decoder', 'content.features.instant.desc') !!}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-blue-200">
                    <div class="text-4xl mb-3">🎯</div>
                    <h3 class="font-bold text-blue-600 mb-2 text-lg">{!! __tool('base64-encoder-decoder', 'content.features.easy.title') !!}
                    </h3>
                    <p class="text-sm text-gray-600">{!! __tool('base64-encoder-decoder', 'content.features.easy.desc') !!}</p>
                </div>
            </div>
        </div>

        <!-- How to Use -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-xl border-2 border-gray-200 mt-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center">{!! __tool('base64-encoder-decoder', 'content.how_to.title') !!}
            </h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="p-6 rounded-xl bg-green-50 border-2 border-green-200">
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <span
                            class="w-8 h-8 bg-green-600 text-white rounded-full flex items-center justify-center font-bold">1</span>
                        {!! __tool('base64-encoder-decoder', 'content.how_to.encode.title') !!}
                    </h3>
                    <ol class="space-y-2 text-gray-700">
                        <li>• {!! __tool('base64-encoder-decoder', 'content.how_to.encode.step1') !!}</li>
                        <li>• {!! __tool('base64-encoder-decoder', 'content.how_to.encode.step2') !!}</li>
                        <li>• {!! __tool('base64-encoder-decoder', 'content.how_to.encode.step3') !!}</li>
                        <li>• {!! __tool('base64-encoder-decoder', 'content.how_to.encode.step4') !!}</li>
                    </ol>
                </div>
                <div class="p-6 rounded-xl bg-blue-50 border-2 border-blue-200">
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <span
                            class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold">2</span>
                        {!! __tool('base64-encoder-decoder', 'content.how_to.decode.title') !!}
                    </h3>
                    <ol class="space-y-2 text-gray-700">
                        <li>• {!! __tool('base64-encoder-decoder', 'content.how_to.decode.step1') !!}</li>
                        <li>• {!! __tool('base64-encoder-decoder', 'content.how_to.decode.step2') !!}</li>
                        <li>• {!! __tool('base64-encoder-decoder', 'content.how_to.decode.step3') !!}</li>
                        <li>• {!! __tool('base64-encoder-decoder', 'content.how_to.decode.step4') !!}</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Use Cases -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-xl border-2 border-gray-200 mt-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('base64-encoder-decoder', 'content.uses.title') !!}</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="flex items-start gap-4 p-4 rounded-xl bg-purple-50 border-2 border-purple-200">
                    <div class="flex-shrink-0 text-3xl">🔌</div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">{!! __tool('base64-encoder-decoder', 'content.uses.api.title') !!}
                        </h3>
                        <p class="text-gray-700 text-sm">{!! __tool('base64-encoder-decoder', 'content.uses.api.desc') !!}</p>
                    </div>
                </div>
                <div class="flex items-start gap-4 p-4 rounded-xl bg-blue-50 border-2 border-blue-200">
                    <div class="flex-shrink-0 text-3xl">🖼️</div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">
                            {!! __tool('base64-encoder-decoder', 'content.uses.data_uri.title') !!}</h3>
                        <p class="text-gray-700 text-sm">{!! __tool('base64-encoder-decoder', 'content.uses.data_uri.desc') !!}</p>
                    </div>
                </div>
                <div class="flex items-start gap-4 p-4 rounded-xl bg-green-50 border-2 border-green-200">
                    <div class="flex-shrink-0 text-3xl">📧</div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">
                            {!! __tool('base64-encoder-decoder', 'content.uses.email.title') !!}</h3>
                        <p class="text-gray-700 text-sm">{!! __tool('base64-encoder-decoder', 'content.uses.email.desc') !!}</p>
                    </div>
                </div>
                <div class="flex items-start gap-4 p-4 rounded-xl bg-orange-50 border-2 border-orange-200">
                    <div class="flex-shrink-0 text-3xl">💾</div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">
                            {!! __tool('base64-encoder-decoder', 'content.uses.storage.title') !!}</h3>
                        <p class="text-gray-700 text-sm">{!! __tool('base64-encoder-decoder', 'content.uses.storage.desc') !!}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Comprehensive SEO Content -->
        <div
            class="bg-gradient-to-br from-green-50 via-teal-50 to-cyan-50 rounded-3xl p-8 md:p-12 mt-8 border-2 border-green-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">{!! __tool('base64-encoder-decoder', 'content.bottom.h1') !!}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{!! __tool('base64-encoder-decoder', 'content.bottom.subtitle') !!}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {!! __tool('base64-encoder-decoder', 'content.bottom.desc') !!}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6 text-center">
                {!! __tool('base64-encoder-decoder', 'content.bottom.works_title') !!}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">{!! __tool('base64-encoder-decoder', 'content.how_to.encode.title') !!}</h4>
                    <p class="text-white/90 mb-3">{!! __tool('base64-encoder-decoder', 'content.bottom.works_encoding') !!}</p>
                    <p class="text-white/80 text-sm">{!! __tool('base64-encoder-decoder', 'content.bottom.works_encoding_sub') !!}</p>
                </div>
                <div class="bg-gradient-to-br from-teal-500 to-cyan-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">{!! __tool('base64-encoder-decoder', 'content.how_to.decode.title') !!}</h4>
                    <p class="text-white/90 mb-3">{!! __tool('base64-encoder-decoder', 'content.bottom.works_decoding') !!}</p>
                    <p class="text-white/80 text-sm">{!! __tool('base64-encoder-decoder', 'content.bottom.works_decoding_sub') !!}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('base64-encoder-decoder', 'content.bottom.cases_title') !!}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🔐</div>
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('base64-encoder-decoder', 'content.bottom.case_api') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('base64-encoder-decoder', 'content.bottom.case_api_desc') !!}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-teal-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🖼️</div>
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('base64-encoder-decoder', 'content.bottom.case_uri') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('base64-encoder-decoder', 'content.bottom.case_uri_desc') !!}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-cyan-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">📧</div>
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('base64-encoder-decoder', 'content.bottom.case_email') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('base64-encoder-decoder', 'content.bottom.case_email_desc') !!}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🔗</div>
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('base64-encoder-decoder', 'content.bottom.case_url') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('base64-encoder-decoder', 'content.bottom.case_url_desc') !!}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-teal-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">💾</div>
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('base64-encoder-decoder', 'content.bottom.case_storage') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('base64-encoder-decoder', 'content.bottom.case_storage_desc') !!}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-cyan-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🌐</div>
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('base64-encoder-decoder', 'content.bottom.case_web') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('base64-encoder-decoder', 'content.bottom.case_web_desc') !!}</p>
                </div>
            </div>

            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-2 border-blue-200 rounded-2xl p-8 mb-10">
                <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-3 text-xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    {!! __tool('base64-encoder-decoder', 'content.bottom.best_practices_title') !!}
                </h4>
                <ul class="text-blue-800 leading-relaxed space-y-2">
                    @foreach(__tool('base64-encoder-decoder', 'content.bottom.best_practices_list') as $item)
                        <li>✅ {!! $item !!}</li>
                    @endforeach
                </ul>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('base64-encoder-decoder', 'content.faq.title') !!}</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('base64-encoder-decoder', 'content.faq.q1') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('base64-encoder-decoder', 'content.faq.a1') !!}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('base64-encoder-decoder', 'content.faq.q2') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('base64-encoder-decoder', 'content.faq.a2') !!}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('base64-encoder-decoder', 'content.faq.q3') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('base64-encoder-decoder', 'content.faq.a3') !!}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('base64-encoder-decoder', 'content.faq.q4') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('base64-encoder-decoder', 'content.faq.a4') !!}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('base64-encoder-decoder', 'content.faq.q5') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('base64-encoder-decoder', 'content.faq.a5') !!}</p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            const msgs = {
                emptyEncode: "{!! __tool('base64-encoder-decoder', 'js.error_empty_encode') !!}",
                errorEncoding: "{!! __tool('base64-encoder-decoder', 'js.error_encoding') !!}",
                emptyDecode: "{!! __tool('base64-encoder-decoder', 'js.error_empty_decode') !!}",
                errorInvalid: "{!! __tool('base64-encoder-decoder', 'js.error_invalid') !!}",
                copied: "{!! __tool('base64-encoder-decoder', 'js.copied') !!}"
            };

            function switchTab(tab) {
                if (tab === 'encode') {
                    document.getElementById('encodePanel').classList.remove('hidden');
                    document.getElementById('decodePanel').classList.add('hidden');
                    document.getElementById('encodeTab').classList.add('active');
                    document.getElementById('decodeTab').classList.remove('active');
                } else {
                    document.getElementById('encodePanel').classList.add('hidden');
                    document.getElementById('decodePanel').classList.remove('hidden');
                    document.getElementById('encodeTab').classList.remove('active');
                    document.getElementById('decodeTab').classList.add('active');
                }
                document.getElementById('resultsSection').classList.add('hidden');
                document.getElementById('errorMessage').classList.add('hidden');
            }

            function encodeBase64() {
                const input = document.getElementById('encodeInput').value;

                if (!input) {
                    showError(msgs.emptyEncode);
                    return;
                }

                try {
                    const encoded = btoa(unescape(encodeURIComponent(input)));
                    document.getElementById('resultText').textContent = encoded;
                    document.getElementById('resultsSection').classList.remove('hidden');
                    document.getElementById('errorMessage').classList.add('hidden');

                    setTimeout(() => {
                        document.getElementById('resultsSection').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    }, 100);
                } catch (error) {
                    showError(msgs.errorEncoding + error.message);
                }
            }

            function decodeBase64() {
                const input = document.getElementById('decodeInput').value.trim();

                if (!input) {
                    showError(msgs.emptyDecode);
                    return;
                }

                try {
                    const decoded = decodeURIComponent(escape(atob(input)));
                    document.getElementById('resultText').textContent = decoded;
                    document.getElementById('resultsSection').classList.remove('hidden');
                    document.getElementById('errorMessage').classList.add('hidden');

                    setTimeout(() => {
                        document.getElementById('resultsSection').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    }, 100);
                } catch (error) {
                    showError(msgs.errorInvalid);
                }
            }

            function copyResult() {
                const result = document.getElementById('resultText').textContent;
                navigator.clipboard.writeText(result).then(() => {
                    const btn = event.target.closest('button');
                    const originalHTML = btn.innerHTML;
                    btn.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> ' + msgs.copied;
                    btn.classList.add('bg-green-600', 'text-white', 'border-green-600');

                    setTimeout(() => {
                        btn.innerHTML = originalHTML;
                        btn.classList.remove('bg-green-600', 'text-white', 'border-green-600');
                    }, 2000);
                });
            }

            function showError(message) {
                document.getElementById('errorText').textContent = message;
                document.getElementById('errorMessage').classList.remove('hidden');
                document.getElementById('resultsSection').classList.add('hidden');
                setTimeout(() => {
                    document.getElementById('errorMessage').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }, 100);
            }
        </script>
    @endpush

    @push('styles')
        <style>
            .tab-btn {
                @apply text-gray-600 border-b-4 border-transparent transition-all duration-200;
            }

            .tab-btn.active {
                @apply text-green-600 border-green-600 font-bold;
            }

            .tab-btn:hover {
                @apply text-green-500;
            }
        </style>
    @endpush
@endsection