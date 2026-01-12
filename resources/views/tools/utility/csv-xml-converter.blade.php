@extends('layouts.app')

@section('title', __tool('csv-xml-converter', 'meta.h1'))
@section('meta_description', __tool('csv-xml-converter', 'meta.subtitle'))
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif



@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" icon="csv-xml-converter" />

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
                    {{ __tool('csv-xml-converter', 'editor.btn_csv_to_xml') }}
                </button>
                <button onclick="setMode('decode')" id="decodeBtn"
                    class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    </svg>
                    {{ __tool('csv-xml-converter', 'editor.btn_xml_to_csv') }}
                </button>
            </div>

            <!-- Input/Output Grid -->
            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <!-- Input Column -->
                <div>
                    <label for="numberInput" class="form-label text-base" id="inputLabel">{{ __tool('csv-xml-converter', 'editor.label_input_csv') }}</label>
                    <textarea id="numberInput" class="form-input font-mono text-sm min-h-[300px]"
                        placeholder="{{ __tool('csv-xml-converter', 'editor.ph_input_csv') }}"></textarea>
                </div>

                <!-- Output Column -->
                <div>
                    <label for="numberOutput" class="form-label text-base" id="outputLabel">{{ __tool('csv-xml-converter', 'editor.label_output_xml') }}</label>
                    <textarea id="numberOutput" class="form-input font-mono text-sm min-h-[300px]" readonly
                        placeholder="{{ __tool('csv-xml-converter', 'editor.ph_output') }}"></textarea>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convertNumber()" class="btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span id="processBtn">{{ __tool('csv-xml-converter', 'editor.btn_convert_xml') }}</span>
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>{{ __tool('csv-xml-converter', 'editor.btn_clear') }}</span>
                </button>
                <button onclick="copyOutput()"
                    class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>{{ __tool('csv-xml-converter', 'editor.btn_copy') }}</span>
                </button>
            </div>

            <!-- Status Message -->
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>
        </div>

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-3xl p-8 md:p-12 border-2 border-blue-100 shadow-2xl">
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">{{ __tool('csv-xml-converter', 'meta.h1') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __tool('csv-xml-converter', 'meta.subtitle') }}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">{{ __tool('csv-xml-converter', 'content.p1') }}</p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📊 {{ __tool('csv-xml-converter', 'content.format_title') }}</h3>
            <p class="text-gray-700 leading-relaxed mb-6">{{ __tool('csv-xml-converter', 'content.format_desc') }}</p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ {{ __tool('csv-xml-converter', 'content.features_title') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                @foreach (['fast', 'bi', 'secure', 'header', 'accurate', 'free'] as $key)
                    <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                        <div class="text-3xl mb-3">
                            @switch($key)
                                @case('fast') ⚡ @break
                                @case('bi') 🔄 @break
                                @case('secure') 🛡️ @break
                                @case('header') 📋 @break
                                @case('accurate') 🎯 @break
                                @case('free') 💸 @break
                            @endswitch
                        </div>
                        <h4 class="font-bold text-gray-900 mb-2">{{ __tool('csv-xml-converter', 'content.features.' . $key . '.title') }}</h4>
                        <p class="text-gray-600 text-sm">{{ __tool('csv-xml-converter', 'content.features.' . $key . '.desc') }}</p>
                    </div>
                @endforeach
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 {{ __tool('csv-xml-converter', 'content.uses_title') }}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                @foreach (['export', 'integration', 'feed', 'migration', 'reporting', 'analysis'] as $key)
                    <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-3">
                            @switch($key)
                                @case('export') 📈 @break
                                @case('integration') 🔗 @break
                                @case('feed') 📦 @break
                                @case('migration') 🗄️ @break
                                @case('reporting') 📊 @break
                                @case('analysis') 🧪 @break
                            @endswitch
                            {{ __tool('csv-xml-converter', 'content.uses.' . $key . '.title') }}
                        </h4>
                        <p class="text-gray-700 leading-relaxed">{{ __tool('csv-xml-converter', 'content.uses.' . $key . '.desc') }}</p>
                    </div>
                @endforeach
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📚 {{ __tool('csv-xml-converter', 'content.steps_title') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-3 text-gray-700">
                    @foreach (['1', '2', '3', '4', '5'] as $step)
                        <li class="flex items-start gap-3">
                            <span class="font-bold text-blue-600 text-lg">{{ $step }}.</span>
                            <span><strong>{{ __tool('csv-xml-converter', 'content.steps.' . $step . '.title') }}:</strong> {{ __tool('csv-xml-converter', 'content.steps.' . $step . '.desc') }}</span>
                        </li>
                    @endforeach
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 {{ __tool('csv-xml-converter', 'content.examples_title') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <div class="space-y-4">
                    @foreach (['simple', 'records', 'header', 'reverse'] as $key)
                        <div>
                            <p class="font-semibold text-gray-900 mb-2">{{ __tool('csv-xml-converter', 'content.examples.' . $key . '.title') }}</p>
                            <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">{{ __tool('csv-xml-converter', 'content.examples.' . $key . '.desc') }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ {{ __tool('csv-xml-converter', 'content.faq_title') }}</h3>
            <div class="space-y-4">
                @foreach (['q1', 'q2', 'q3', 'q4', 'q5'] as $q)
                    <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                        <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('csv-xml-converter', 'content.faq.' . $q) }}</h4>
                        <p class="text-gray-700 leading-relaxed">{{ __tool('csv-xml-converter', 'content.faq.a' . substr($q, 1)) }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.4.1/papaparse.min.js"></script>
    <script>
        let currentMode = 'encode';

        document.addEventListener('DOMContentLoaded', () => {
            if (window.location.hash === '#xml-to-csv') {
                setMode('decode');
            } else {
                setMode('encode');
            }
        });

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
                inputLabel.textContent = "{{ __tool('csv-xml-converter', 'editor.label_input_csv') }}";
                outputLabel.textContent = "{{ __tool('csv-xml-converter', 'editor.label_output_xml') }}";
                processBtn.textContent = "{{ __tool('csv-xml-converter', 'editor.btn_convert_xml') }}";
                window.history.replaceState(null, null, '#csv-to-xml');
            } else {
                decodeBtn.classList.remove('bg-gray-200', 'text-gray-700');
                decodeBtn.classList.add('bg-blue-600', 'text-white');
                encodeBtn.classList.remove('bg-blue-600', 'text-white');
                encodeBtn.classList.add('bg-gray-200', 'text-gray-700');
                inputLabel.textContent = "{{ __tool('csv-xml-converter', 'editor.label_input_xml') }}";
                outputLabel.textContent = "{{ __tool('csv-xml-converter', 'editor.label_output_csv') }}";
                processBtn.textContent = "{{ __tool('csv-xml-converter', 'editor.btn_convert_csv') }}";
                window.history.replaceState(null, null, '#xml-to-csv');
            }
            clearAll();
        }

        function convertNumber() {
            const input = document.getElementById('numberInput').value.trim();
            const output = document.getElementById('numberOutput');

            if (!input) {
                showStatus("{{ __tool('csv-xml-converter', 'editor.error_empty') }}", 'error');
                return;
            }

            try {
                if (currentMode === 'encode') {
                    // CSV to XML
                    const parsed = Papa.parse(input, {
                        header: true,
                        skipEmptyLines: true
                    });

                    if (parsed.errors.length > 0) {
                        showStatus("{{ __tool('csv-xml-converter', 'editor.error_parse_csv') }}" + parsed.errors[0].message, 'error');
                        return;
                    }

                    let xml = '<' + '?xml version="1.0" encoding="UTF-8"?' + '>\n';
                    xml += '<rows>\n';
                    parsed.data.forEach(row => {
                        xml += '  <row>\n';
                        for (const [key, value] of Object.entries(row)) {
                            xml += `    <${key}>${escapeXml(value)}</${key}>\n`;
                        }
                        xml += '  </row>\n';
                    });
                    xml += '</rows>';

                    output.value = xml;
                    showStatus("{{ __tool('csv-xml-converter', 'editor.success_xml') }}", 'success');
                } else {
                    // XML to CSV
                    const parser = new DOMParser();
                    const xmlDoc = parser.parseFromString(input, 'text/xml');

                    const parserError = xmlDoc.getElementsByTagName('parsererror');
                    if (parserError.length > 0) {
                        showStatus("{{ __tool('csv-xml-converter', 'editor.error_invalid_xml') }}", 'error');
                        return;
                    }

                    const rows = xmlDoc.getElementsByTagName('row');
                    if (rows.length === 0) {
                        showStatus("{{ __tool('csv-xml-converter', 'editor.error_no_row') }}", 'error');
                        return;
                    }

                    const data = [];
                    for (let i = 0; i < rows.length; i++) {
                        const row = {};
                        const children = rows[i].children;
                        for (let j = 0; j < children.length; j++) {
                            row[children[j].tagName] = children[j].textContent;
                        }
                        data.push(row);
                    }

                    const csv = Papa.unparse(data);
                    output.value = csv;
                    showStatus("{{ __tool('csv-xml-converter', 'editor.success_csv') }}", 'success');
                }
            } catch (error) {
                showStatus("{{ __tool('csv-xml-converter', 'editor.error_general') }}" + error.message, 'error');
            }
        }

        function escapeXml(str) {
            if (!str) return '';
            return String(str).replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&apos;');
        }

        function clearAll() {
            document.getElementById('numberInput').value = '';
            document.getElementById('numberOutput').value = '';
            document.getElementById('statusMessage').classList.add('hidden');
        }

        function copyOutput() {
            const output = document.getElementById('numberOutput');
            if (!output.value) {
                showStatus("{{ __tool('csv-xml-converter', 'editor.error_no_copy') }}", 'error');
                return;
            }
            output.select();
            document.execCommand('copy');
            showStatus("{{ __tool('csv-xml-converter', 'editor.success_copy') }}", 'success');
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
