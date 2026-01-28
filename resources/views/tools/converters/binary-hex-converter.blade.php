@extends('layouts.app')

@section('title', __tool('binary-hex-converter', 'meta.title'))
@section('meta_description', __tool('binary-hex-converter', 'meta.description'))
@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" />

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
                    {!! __tool('binary-hex-converter', 'editor.mode_bin_hex') !!}
                </button>
                <button onclick="setMode('decode')" id="decodeBtn"
                    class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    </svg>
                    {!! __tool('binary-hex-converter', 'editor.mode_hex_bin') !!}
                </button>
            </div>

            <!-- Input/Output Grid -->
            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <!-- Input Column -->
                <div>
                    <label for="numberInput" class="form-label text-base"
                        id="inputLabel">{!! __tool('binary-hex-converter', 'editor.label_bin') !!}</label>
                    <textarea id="numberInput" class="form-input font-mono text-sm min-h-[300px]"
                        placeholder="{!! __tool('binary-hex-converter', 'editor.ph_bin') !!}"></textarea>
                </div>

                <!-- Output Column -->
                <div>
                    <label for="numberOutput" class="form-label text-base"
                        id="outputLabel">{!! __tool('binary-hex-converter', 'editor.label_out_hex') !!}</label>
                    <textarea id="numberOutput" class="form-input font-mono text-sm min-h-[300px]" readonly
                        placeholder="{!! __tool('binary-hex-converter', 'editor.ph_hex') !!}"></textarea>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convertNumber()" class="btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span id="processBtn">{!! __tool('binary-hex-converter', 'editor.btn_convert_hex') !!}</span>
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>{!! __tool('binary-hex-converter', 'editor.btn_clear') !!}</span>
                </button>
                <button onclick="copyOutput()"
                    class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>{!! __tool('binary-hex-converter', 'editor.btn_copy') !!}</span>
                </button>
            </div>

            <!-- Status Message -->
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>
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
                <h2 class="text-4xl font-black text-gray-900 mb-3">{!! __tool('binary-hex-converter', 'meta.h1') !!}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{!! __tool('binary-hex-converter', 'meta.subtitle') !!}
                </p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {!! __tool('binary-hex-converter', 'content.p1') !!}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('binary-hex-converter', 'content.what_title') !!}
            </h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                {!! __tool('binary-hex-converter', 'content.what_desc') !!}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('converters', 'general.features', 'Features') !!}
            </h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">
                        {!! __tool('binary-hex-converter', 'content.features.instant.title') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('binary-hex-converter', 'content.features.instant.desc') !!}
                    </p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔄</div>
                    <h4 class="font-bold text-gray-900 mb-2">
                        {!! __tool('binary-hex-converter', 'content.features.bidirectional.title') !!}</h4>
                    <p class="text-gray-600 text-sm">
                        {!! __tool('binary-hex-converter', 'content.features.bidirectional.desc') !!}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">
                        {!! __tool('binary-hex-converter', 'content.features.privacy.title') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('binary-hex-converter', 'content.features.privacy.desc') !!}
                    </p>
                </div>
                <!-- Note: The original file had 6 features, but I only mapped 4 relevant ones in utilities.php. I will display those 4 properly. -->
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📋</div>
                    <h4 class="font-bold text-gray-900 mb-2">
                        {!! __tool('binary-hex-converter', 'content.features.copy.title') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('binary-hex-converter', 'content.features.copy.desc') !!}
                    </p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('binary-hex-converter', 'content.uses.title') !!}
            </h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">
                        {!! __tool('binary-hex-converter', 'content.uses.memory.title') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">
                        {!! __tool('binary-hex-converter', 'content.uses.memory.desc') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">
                        {!! __tool('binary-hex-converter', 'content.uses.colors.title') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">
                        {!! __tool('binary-hex-converter', 'content.uses.colors.desc') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">
                        {!! __tool('binary-hex-converter', 'content.uses.encoding.title') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">
                        {!! __tool('binary-hex-converter', 'content.uses.encoding.desc') !!}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📚
                {!! __tool('binary-hex-converter', 'content.how_to.title') !!}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">1.</span>
                        <span><strong>{!! __tool('binary-hex-converter', 'content.how_to.step1_title') !!}:</strong>
                            {!! __tool('binary-hex-converter', 'content.how_to.step1_desc') !!}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">2.</span>
                        <span><strong>{!! __tool('binary-hex-converter', 'content.how_to.step2_title') !!}:</strong>
                            {!! __tool('binary-hex-converter', 'content.how_to.step2_desc') !!}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">3.</span>
                        <span><strong>{!! __tool('binary-hex-converter', 'content.how_to.step3_title') !!}:</strong>
                            {!! __tool('binary-hex-converter', 'content.how_to.step3_desc') !!}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">4.</span>
                        <span><strong>{!! __tool('binary-hex-converter', 'content.how_to.step4_title') !!}:</strong>
                            {!! __tool('binary-hex-converter', 'content.how_to.step4_desc') !!}</span>
                    </li>
                </ol>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            let currentMode = 'encode';
            const msgs = {
                empty: "{!! __tool('binary-hex-converter', 'js.error_empty') !!}",
                invalidBin: "{!! __tool('binary-hex-converter', 'js.error_invalid_bin') !!}",
                successHex: "{!! __tool('binary-hex-converter', 'js.success_hex') !!}",
                invalidHex: "{!! __tool('binary-hex-converter', 'js.error_invalid_hex') !!}",
                successBin: "{!! __tool('binary-hex-converter', 'js.success_bin') !!}",
                errorGeneral: "{!! __tool('binary-hex-converter', 'js.error_general') !!}",
                noOutput: "{!! __tool('binary-hex-converter', 'js.error_no_output') !!}",
                copied: "{!! __tool('binary-hex-converter', 'js.success_copy') !!}"
            };

            const labels = {
                labelBin: "{!! __tool('binary-hex-converter', 'editor.label_bin') !!}",
                labelHex: "{!! __tool('binary-hex-converter', 'editor.label_hex') !!}",
                labelOutHex: "{!! __tool('binary-hex-converter', 'editor.label_out_hex') !!}",
                labelOutBin: "{!! __tool('binary-hex-converter', 'editor.label_out_bin') !!}",
                btnConvertHex: "{!! __tool('binary-hex-converter', 'editor.btn_convert_hex') !!}",
                btnConvertBin: "{!! __tool('binary-hex-converter', 'editor.btn_convert_bin') !!}"
            };

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
                    inputLabel.textContent = labels.labelBin;
                    outputLabel.textContent = labels.labelOutHex;
                    processBtn.textContent = labels.btnConvertHex;
                } else {
                    decodeBtn.classList.remove('bg-gray-200', 'text-gray-700');
                    decodeBtn.classList.add('bg-blue-600', 'text-white');
                    encodeBtn.classList.remove('bg-blue-600', 'text-white');
                    encodeBtn.classList.add('bg-gray-200', 'text-gray-700');
                    inputLabel.textContent = labels.labelHex;
                    outputLabel.textContent = labels.labelOutBin;
                    processBtn.textContent = labels.btnConvertBin;
                }
                clearAll();
            }

            function convertNumber() {
                const input = document.getElementById('numberInput').value.trim();
                const output = document.getElementById('numberOutput');

                if (!input) {
                    showStatus(msgs.empty, 'error');
                    return;
                }

                try {
                    if (currentMode === 'encode') {
                        // Binary to Hexadecimal
                        if (!/^[01]+$/.test(input)) {
                            showStatus(msgs.invalidBin, 'error');
                            return;
                        }
                        const hex = parseInt(input, 2).toString(16).toUpperCase();
                        output.value = hex;
                        showStatus(msgs.successHex, 'success');
                    } else {
                        // Hexadecimal to Binary
                        if (!/^[0-9A-Fa-f]+$/.test(input)) {
                            showStatus(msgs.invalidHex, 'error');
                            return;
                        }
                        const binary = parseInt(input, 16).toString(2);
                        output.value = binary;
                        showStatus(msgs.successBin, 'success');
                    }
                } catch (error) {
                    showStatus(msgs.errorGeneral + error.message, 'error');
                }
            }

            function clearAll() {
                document.getElementById('numberInput').value = '';
                document.getElementById('numberOutput').value = '';
                document.getElementById('statusMessage').classList.add('hidden');
            }

            function copyOutput() {
                const output = document.getElementById('numberOutput');
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
            document.getElementById('numberInput').addEventListener('keypress', function (e) {
                if (e.key === 'Enter' && e.ctrlKey) {
                    convertNumber();
                }
            });
        </script>
    @endpush
@endsection