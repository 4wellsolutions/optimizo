@extends('layouts.app')

@section('title', __tool('binary-to-text', 'meta.title'))
@section('meta_description', __tool('binary-to-text', 'meta.description'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <x-tool-hero :tool="$tool" title="{{ $tool->name }}" description="{{ $tool->meta_description }}"
            icon="binary-to-text" />

        <!-- Converter Tool -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convertBinaryToText()"
                    class="px-6 py-2.5 bg-gradient-to-r from-teal-600 to-green-600 text-white rounded-lg font-semibold hover:shadow-lg transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    {!! __tool('binary-to-text', 'editor.btn_convert') !!}
                </button>
                <button onclick="copyText()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    {!! __tool('binary-to-text', 'editor.btn_copy') !!}
                </button>
                <button onclick="downloadText()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    {!! __tool('binary-to-text', 'editor.btn_download') !!}
                </button>
                <button onclick="loadExample()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    {!! __tool('binary-to-text', 'editor.btn_example') !!}
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    {!! __tool('binary-to-text', 'editor.btn_clear') !!}
                </button>
            </div>

            <!-- Input/Output Grid -->
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Binary Input -->
                <div>
                    <label
                        class="block text-sm font-bold text-gray-900 mb-2">{!! __tool('binary-to-text', 'editor.label_input') !!}</label>
                    <textarea id="binaryInput"
                        class="w-full h-96 p-4 border-2 border-gray-200 rounded-lg font-mono text-sm focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition-all"
                        placeholder="{!! __tool('binary-to-text', 'editor.ph_input') !!}"></textarea>
                </div>

                <!-- Text Output -->
                <div>
                    <label
                        class="block text-sm font-bold text-gray-900 mb-2">{!! __tool('binary-to-text', 'editor.label_output') !!}</label>
                    <textarea id="textOutput" readonly
                        class="w-full h-96 p-4 border-2 border-gray-200 rounded-lg font-mono text-sm bg-gray-50 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition-all"
                        placeholder="{!! __tool('binary-to-text', 'editor.ph_output') !!}"></textarea>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <h2 class="text-3xl font-black text-gray-900 mb-6">{!! __tool('binary-to-text', 'content.about_title') !!}</h2>
            <div class="prose prose-lg max-w-none">
                <p class="text-gray-700 leading-relaxed mb-4">
                    {!! __tool('binary-to-text', 'content.about_p1') !!}
                </p>

                <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">
                    {!! __tool('binary-to-text', 'content.features_title') !!}</h3>
                <ul class="space-y-2 text-gray-700">
                    <li>✅ {!! __tool('binary-to-text', 'content.features_list.8bit') !!}</li>
                    <li>✅ {!! __tool('binary-to-text', 'content.features_list.validation') !!}</li>
                    <li>✅ {!! __tool('binary-to-text', 'content.features_list.utf8') !!}</li>
                    <li>✅ {!! __tool('binary-to-text', 'content.features_list.instant') !!}</li>
                    <li>✅ {!! __tool('binary-to-text', 'content.features_list.edu') !!}</li>
                    <li>✅ {!! __tool('binary-to-text', 'content.features_list.free') !!}</li>
                </ul>

                <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">
                    {!! __tool('binary-to-text', 'content.uses_title') !!}</h3>
                <div class="grid md:grid-cols-2 gap-4 mb-6">
                    <div class="bg-gradient-to-br from-teal-50 to-green-50 rounded-xl p-5 border-2 border-teal-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">
                            {!! __tool('binary-to-text', 'content.uses_edu_title') !!}</h4>
                        <p class="text-gray-700 text-sm">{!! __tool('binary-to-text', 'content.uses_edu_desc') !!}</p>
                    </div>
                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-5 border-2 border-green-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">
                            {!! __tool('binary-to-text', 'content.uses_prog_title') !!}</h4>
                        <p class="text-gray-700 text-sm">{!! __tool('binary-to-text', 'content.uses_prog_desc') !!}</p>
                    </div>
                    <div class="bg-gradient-to-br from-emerald-50 to-cyan-50 rounded-xl p-5 border-2 border-emerald-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">
                            {!! __tool('binary-to-text', 'content.uses_decoding_title') !!}</h4>
                        <p class="text-gray-700 text-sm">{!! __tool('binary-to-text', 'content.uses_decoding_desc') !!}</p>
                    </div>
                    <div class="bg-gradient-to-br from-cyan-50 to-blue-50 rounded-xl p-5 border-2 border-cyan-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">
                            {!! __tool('binary-to-text', 'content.uses_learning_title') !!}</h4>
                        <p class="text-gray-700 text-sm">{!! __tool('binary-to-text', 'content.uses_learning_desc') !!}</p>
                    </div>
                </div>

                <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">{!! __tool('binary-to-text', 'content.how_title') !!}
                </h3>
                <p class="text-gray-700 mb-4">
                    {!! __tool('binary-to-text', 'content.how_desc') !!}
                </p>

                <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">{!! __tool('binary-to-text', 'content.faq_title') !!}
                </h3>
                <div class="space-y-4">
                    <div class="bg-gray-50 rounded-lg p-5">
                        <h4 class="font-bold text-gray-900 mb-2">{!! __tool('binary-to-text', 'content.q1') !!}</h4>
                        <p class="text-gray-700 text-sm">{!! __tool('binary-to-text', 'content.a1') !!}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-5">
                        <h4 class="font-bold text-gray-900 mb-2">{!! __tool('binary-to-text', 'content.q2') !!}</h4>
                        <p class="text-gray-700 text-sm">{!! __tool('binary-to-text', 'content.a2') !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            const binaryMsgs = {
                empty: "{!! __tool('binary-to-text', 'js.error_empty') !!}",
                invalidChars: "{!! __tool('binary-to-text', 'js.error_invalid_chars') !!}",
                invalidLength: "{!! __tool('binary-to-text', 'js.error_invalid_length') !!}",
                errorGeneral: "{!! __tool('binary-to-text', 'js.error_general') !!}",
                noTextCopy: "{!! __tool('binary-to-text', 'js.error_no_text_copy') !!}",
                successCopy: "{!! __tool('binary-to-text', 'js.success_copy') !!}",
                noTextDownload: "{!! __tool('binary-to-text', 'js.error_no_text_download') !!}"
            };

            function convertBinaryToText() {
                const binary = document.getElementById('binaryInput').value;
                if (!binary.trim()) {
                    showError(binaryMsgs.empty);
                    return;
                }

                try {
                    // Remove extra whitespace and split by spaces
                    const binaryArray = binary.trim().split(/\s+/);

                    // Validate binary input
                    for (const bin of binaryArray) {
                        if (!/^[01]+$/.test(bin)) {
                            showError(binaryMsgs.invalidChars);
                            return;
                        }
                        if (bin.length !== 8) {
                            showError(binaryMsgs.invalidLength);
                            return;
                        }
                    }

                    // Convert binary to text
                    const text = binaryArray.map(bin => {
                        return String.fromCharCode(parseInt(bin, 2));
                    }).join('');

                    document.getElementById('textOutput').value = text;
                } catch (error) {
                    showError(binaryMsgs.errorGeneral + error.message);
                }
            }

            function copyText() {
                const output = document.getElementById('textOutput');
                if (!output.value.trim()) {
                    showError(binaryMsgs.noTextCopy);
                    return;
                }

                output.select();
                document.execCommand('copy');
                showSuccess(binaryMsgs.successCopy);
            }

            function downloadText() {
                const text = document.getElementById('textOutput').value;
                if (!text.trim()) {
                    showError(binaryMsgs.noTextDownload);
                    return;
                }

                const blob = new Blob([text], {
                    type: 'text/plain'
                });
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = 'decoded.txt';
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                URL.revokeObjectURL(url);
            }

            function clearAll() {
                document.getElementById('binaryInput').value = '';
                document.getElementById('textOutput').value = '';
            }

            function loadExample() {
                const example = '01001000 01100101 01101100 01101100 01101111 00100000 01010111 01101111 01110010 01101100 01100100 00100001';
                document.getElementById('binaryInput').value = example;
                convertBinaryToText();
            }

            // Auto-convert on input (debounced)
            let debounceTimer;
            document.getElementById('binaryInput').addEventListener('input', function () {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(() => {
                    if (this.value.trim()) {
                        convertBinaryToText();
                    }
                }, 500);
            });
        </script>
    @endpush
@endsection