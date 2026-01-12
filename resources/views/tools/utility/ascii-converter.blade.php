@extends('layouts.app')

@section('title', $tool->name . ' - ' . config('app.name'))
@section('meta_description', $tool->meta_description)

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" />

        <!-- Tool Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-yellow-200 mb-8">
            <!-- Mode Selector -->
            <div class="flex gap-3 mb-6">
                <button onclick="setMode('toAscii')" id="toAsciiBtn"
                    class="flex-1 px-6 py-3 bg-yellow-600 text-white rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                    </svg>
                    {!! __tool('ascii-converter', 'editor.to_ascii') !!}
                </button>
                <button onclick="setMode('toText')" id="toTextBtn"
                    class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
                    </svg>
                    {!! __tool('ascii-converter', 'editor.to_text') !!}
                </button>
            </div>

            <!-- Input -->
            <div class="mb-6">
                <label for="asciiInput" class="form-label text-base" id="inputLabel">{!! __tool('ascii-converter', 'editor.label_text') !!}</label>
                <textarea id="asciiInput" class="form-input font-mono text-sm min-h-[300px]"
                    placeholder="{!! __tool('ascii-converter', 'editor.ph_text') !!}"></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="processASCII()" class="btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span id="processBtn">{!! __tool('ascii-converter', 'editor.btn_convert_ascii') !!}</span>
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>{!! __tool('ascii-converter', 'editor.btn_clear') !!}</span>
                </button>
                <button onclick="copyOutput()"
                    class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>{!! __tool('ascii-converter', 'editor.btn_copy') !!}</span>
                </button>
            </div>

            <!-- Status Message -->
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>

            <!-- Output -->
            <div class="mb-6">
                <label for="asciiOutput" class="form-label text-base" id="outputLabel">{!! __tool('ascii-converter', 'editor.label_output_ascii') !!}</label>
                <textarea id="asciiOutput" class="form-input font-mono text-sm min-h-[300px]" readonly
                    placeholder="{!! __tool('ascii-converter', 'editor.ph_ascii') !!}"></textarea>
            </div>
        </div>

        <!-- SEO Content -->
        <div
            class="bg-gradient-to-br from-yellow-50 to-orange-50 rounded-3xl p-8 md:p-12 border-2 border-yellow-100 shadow-2xl">
            <div class="text-center mb-8">
                <h2 class="text-4xl font-black text-gray-900 mb-3">{!! __tool('ascii-converter', 'content.title') !!}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{!! __tool('ascii-converter', 'content.subtitle') !!}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {!! __tool('ascii-converter', 'content.p1') !!}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('ascii-converter', 'content.what_title') !!}</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                {!! __tool('ascii-converter', 'content.what_desc') !!}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('converters', 'general.features', 'Features') !!}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('ascii-converter', 'content.features.instant.title') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('ascii-converter', 'content.features.instant.desc') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-orange-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🔄</div>
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('ascii-converter', 'content.features.bidirectional.title') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('ascii-converter', 'content.features.bidirectional.desc') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('ascii-converter', 'content.features.privacy.title') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('ascii-converter', 'content.features.privacy.desc') !!}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('ascii-converter', 'content.uses.title') !!}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{!! __tool('ascii-converter', 'content.uses.programming.title') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('ascii-converter', 'content.uses.programming.desc') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{!! __tool('ascii-converter', 'content.uses.learning.title') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('ascii-converter', 'content.uses.learning.desc') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{!! __tool('ascii-converter', 'content.uses.encoding.title') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('ascii-converter', 'content.uses.encoding.desc') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{!! __tool('ascii-converter', 'content.uses.debugging.title') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('ascii-converter', 'content.uses.debugging.desc') !!}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('ascii-converter', 'content.examples.title') !!}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <div class="space-y-4">
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">{!! __tool('ascii-converter', 'content.examples.a_upper') !!}</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">ASCII Code: 65</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">{!! __tool('ascii-converter', 'content.examples.a_lower') !!}</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">ASCII Code: 97</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">{!! __tool('ascii-converter', 'content.examples.zero') !!}</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">ASCII Code: 48</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">{!! __tool('ascii-converter', 'content.examples.space') !!}</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">ASCII Code: 32</p>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('ascii-converter', 'content.faq.title') !!}</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('ascii-converter', 'content.faq.q1') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('ascii-converter', 'content.faq.a1') !!}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('ascii-converter', 'content.faq.q2') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('ascii-converter', 'content.faq.a2') !!}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('ascii-converter', 'content.faq.q3') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('ascii-converter', 'content.faq.a3') !!}</p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        let currentMode = 'toAscii';
        const msgs = {
            empty: "{!! __tool('ascii-converter', 'js.error_empty') !!}",
            successAscii: "{!! __tool('ascii-converter', 'js.success_ascii') !!}",
            successText: "{!! __tool('ascii-converter', 'js.success_text') !!}",
            invalidAscii: "{!! __tool('ascii-converter', 'js.error_invalid_ascii') !!}",
            errorGeneral: "{!! __tool('ascii-converter', 'js.error_general') !!}",
            noOutput: "{!! __tool('ascii-converter', 'js.error_no_output') !!}",
            copied: "{!! __tool('ascii-converter', 'js.success_copy') !!}"
        };

        const labels = {
            inputText: "{!! __tool('ascii-converter', 'editor.label_text') !!}",
            inputAscii: "{!! __tool('ascii-converter', 'editor.label_ascii') !!}",
            outputText: "{!! __tool('ascii-converter', 'editor.label_output_text') !!}",
            outputAscii: "{!! __tool('ascii-converter', 'editor.label_output_ascii') !!}",
            btnAscii: "{!! __tool('ascii-converter', 'editor.btn_convert_ascii') !!}",
            btnText: "{!! __tool('ascii-converter', 'editor.btn_convert_text') !!}"
        };

        function setMode(mode) {
            currentMode = mode;
            const toAsciiBtn = document.getElementById('toAsciiBtn');
            const toTextBtn = document.getElementById('toTextBtn');
            const inputLabel = document.getElementById('inputLabel');
            const outputLabel = document.getElementById('outputLabel');
            const processBtn = document.getElementById('processBtn');

            if (mode === 'toAscii') {
                toAsciiBtn.classList.remove('bg-gray-200', 'text-gray-700');
                toAsciiBtn.classList.add('bg-yellow-600', 'text-white');
                toTextBtn.classList.remove('bg-yellow-600', 'text-white');
                toTextBtn.classList.add('bg-gray-200', 'text-gray-700');
                inputLabel.textContent = labels.inputText;
                outputLabel.textContent = labels.outputAscii;
                processBtn.textContent = labels.btnAscii;
            } else {
                toTextBtn.classList.remove('bg-gray-200', 'text-gray-700');
                toTextBtn.classList.add('bg-yellow-600', 'text-white');
                toAsciiBtn.classList.remove('bg-yellow-600', 'text-white');
                toAsciiBtn.classList.add('bg-gray-200', 'text-gray-700');
                inputLabel.textContent = labels.inputAscii;
                outputLabel.textContent = labels.outputText;
                processBtn.textContent = labels.btnText;
            }
            clearAll();
        }

        function processASCII() {
            const input = document.getElementById('asciiInput').value.trim();
            const output = document.getElementById('asciiOutput');

            if (!input) {
                showStatus(msgs.empty, 'error');
                return;
            }

            try {
                if (currentMode === 'toAscii') {
                    // Text to ASCII
                    const codes = [];
                    for (let i = 0; i < input.length; i++) {
                        codes.push(input.charCodeAt(i));
                    }
                    output.value = codes.join(' ');
                    showStatus(msgs.successAscii, 'success');
                } else {
                    // ASCII to Text
                    const codes = input.split(/\s+/).filter(code => code.trim());
                    let text = '';
                    for (let code of codes) {
                        const num = parseInt(code);
                        if (isNaN(num) || num < 0 || num > 127) {
                            showStatus(msgs.invalidAscii + code, 'error');
                            return;
                        }
                        text += String.fromCharCode(num);
                    }
                    output.value = text;
                    showStatus(msgs.successText, 'success');
                }
            } catch (error) {
                showStatus(msgs.errorGeneral + error.message, 'error');
            }
        }

        function clearAll() {
            document.getElementById('asciiInput').value = '';
            document.getElementById('asciiOutput').value = '';
            document.getElementById('statusMessage').classList.add('hidden');
        }

        function copyOutput() {
            const output = document.getElementById('asciiOutput');
            if (!output.value) {
                showStatus(msgs.noOutput, 'error');
                return;
            }
            output.select();
            document.execCommand('copy');
            showStatus(msgs.copied, 'success');
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
        document.getElementById('asciiInput').addEventListener('keypress', function (e) {
            if (e.key === 'Enter' && e.ctrlKey) {
                processASCII();
            }
        });
    </script>
    @endpush
@endsection
