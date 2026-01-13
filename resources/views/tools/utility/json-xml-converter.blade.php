@extends('layouts.app')

@section('title', __tool('json-xml-converter', 'meta.h1'))
@section('meta_description', __tool('json-xml-converter', 'meta.subtitle'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" icon="json-xml-converter" />

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
                    {{ __tool('json-xml-converter', 'editor.btn_encode') }}
                </button>
                <button onclick="setMode('decode')" id="decodeBtn"
                    class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    </svg>
                    {{ __tool('json-xml-converter', 'editor.btn_decode') }}
                </button>
            </div>

            <!-- Input/Output Grid -->
            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <!-- Input Column -->
                <div>
                    <label for="numberInput" class="form-label text-base"
                        id="inputLabel">{{ __tool('json-xml-converter', 'editor.label_input_json') }}</label>
                    <textarea id="numberInput" class="form-input font-mono text-sm min-h-[300px]"
                        placeholder='{{ __tool('json-xml-converter', 'editor.ph_input_json') }}'></textarea>
                </div>

                <!-- Output Column -->
                <div>
                    <label for="numberOutput" class="form-label text-base"
                        id="outputLabel">{{ __tool('json-xml-converter', 'editor.label_output_xml') }}</label>
                    <textarea id="numberOutput" class="form-input font-mono text-sm min-h-[300px]" readonly
                        placeholder="{{ __tool('json-xml-converter', 'editor.ph_output') }}"></textarea>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convertNumber()" class="btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span id="processBtn">{{ __tool('json-xml-converter', 'editor.btn_convert_xml') }}</span>
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>{{ __tool('json-xml-converter', 'editor.btn_clear') }}</span>
                </button>
                <button onclick="copyOutput()"
                    class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>{{ __tool('json-xml-converter', 'editor.btn_copy') }}</span>
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
                <h2 class="text-4xl font-black text-gray-900 mb-3">{{ __tool('json-xml-converter', 'content.hero_title') }}
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    {{ __tool('json-xml-converter', 'content.hero_subtitle') }}
                </p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {{ __tool('json-xml-converter', 'content.p1') }}
            </p>

            <p class="text-gray-700 leading-relaxed mb-6">
                {{ __tool('json-xml-converter', 'content.p2') }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('json-xml-converter', 'content.features_title') }}
            </h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('json-xml-converter', 'content.features.fast.title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('json-xml-converter', 'content.features.fast.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔄</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('json-xml-converter', 'content.features.bidirectional.title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('json-xml-converter', 'content.features.bidirectional.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('json-xml-converter', 'content.features.private.title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('json-xml-converter', 'content.features.private.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📐</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('json-xml-converter', 'content.features.format.title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('json-xml-converter', 'content.features.format.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🆓</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('json-xml-converter', 'content.features.free.title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('json-xml-converter', 'content.features.free.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📋</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('json-xml-converter', 'content.features.copy.title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('json-xml-converter', 'content.features.copy.desc') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('json-xml-converter', 'content.uses_title') }}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('json-xml-converter', 'content.uses.api.title') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-xml-converter', 'content.uses.api.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('json-xml-converter', 'content.uses.migration.title') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-xml-converter', 'content.uses.migration.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('json-xml-converter', 'content.uses.config.title') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-xml-converter', 'content.uses.config.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('json-xml-converter', 'content.uses.mobile.title') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-xml-converter', 'content.uses.mobile.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('json-xml-converter', 'content.uses.test.title') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-xml-converter', 'content.uses.test.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('json-xml-converter', 'content.uses.docs.title') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-xml-converter', 'content.uses.docs.desc') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('json-xml-converter', 'content.how_title') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">1.</span>
                        <span><strong>{{ __tool('json-xml-converter', 'content.how_steps.1.title') }}</strong> {{ __tool('json-xml-converter', 'content.how_steps.1.desc') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">2.</span>
                        <span><strong>{{ __tool('json-xml-converter', 'content.how_steps.2.title') }}</strong> {{ __tool('json-xml-converter', 'content.how_steps.2.desc') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">3.</span>
                        <span><strong>{{ __tool('json-xml-converter', 'content.how_steps.3.title') }}</strong> {{ __tool('json-xml-converter', 'content.how_steps.3.desc') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">4.</span>
                        <span><strong>{{ __tool('json-xml-converter', 'content.how_steps.4.title') }}</strong> {{ __tool('json-xml-converter', 'content.how_steps.4.desc') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">5.</span>
                        <span><strong>{{ __tool('json-xml-converter', 'content.how_steps.5.title') }}</strong> {{ __tool('json-xml-converter', 'content.how_steps.5.desc') }}</span>
                    </li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6 font-primary">{{ __tool('json-xml-converter', 'content.samples_title') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <div class="space-y-4">
                    @foreach(__tool('json-xml-converter', 'content.samples') as $key => $sample)
                        <div>
                            <p class="font-semibold text-gray-900 mb-2">{{ $sample['title'] }}</p>
                            <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded shadow-sm">{{ $sample['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('json-xml-converter', 'content.faq_title') }}</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('json-xml-converter', 'content.faq.q1') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-xml-converter', 'content.faq.a1') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('json-xml-converter', 'content.faq.q2') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-xml-converter', 'content.faq.a2') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('json-xml-converter', 'content.faq.q3') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-xml-converter', 'content.faq.a3') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('json-xml-converter', 'content.faq.q4') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-xml-converter', 'content.faq.a4') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('json-xml-converter', 'content.faq.q5') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-xml-converter', 'content.faq.a5') }}</p>
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
                    inputLabel.textContent = "{{ __tool('json-xml-converter', 'editor.label_input_json') }}";
                    outputLabel.textContent = "{{ __tool('json-xml-converter', 'editor.label_output_xml') }}";
                    processBtn.textContent = "{{ __tool('json-xml-converter', 'editor.btn_convert_xml') }}";
                } else {
                    decodeBtn.classList.remove('bg-gray-200', 'text-gray-700');
                    decodeBtn.classList.add('bg-blue-600', 'text-white');
                    encodeBtn.classList.remove('bg-blue-600', 'text-white');
                    encodeBtn.classList.add('bg-gray-200', 'text-gray-700');
                    inputLabel.textContent = "{{ __tool('json-xml-converter', 'editor.label_input_xml') }}";
                    outputLabel.textContent = "{{ __tool('json-xml-converter', 'editor.label_output_json') }}";
                    processBtn.textContent = "{{ __tool('json-xml-converter', 'editor.btn_convert_json') }}";
                }
                clearAll();
            }

            function convertNumber() {
                const input = document.getElementById('numberInput').value.trim();
                const output = document.getElementById('numberOutput');

                if (!input) {
                    showStatus("{{ __tool('json-xml-converter', 'js.error_empty') }}", 'error');
                    return;
                }

                try {
                    if (currentMode === 'encode') {
                        // JSON to XML
                        const jsonData = JSON.parse(input);
                        const xmlString = jsonToXml(jsonData);
                        output.value = formatXml(xmlString);
                        showStatus("{{ __tool('json-xml-converter', 'js.success_xml') }}", 'success');
                    } else {
                        // XML to JSON
                        const parser = new DOMParser();
                        const xmlDoc = parser.parseFromString(input, 'text/xml');

                        // Check for parsing errors
                        const parserError = xmlDoc.getElementsByTagName('parsererror');
                        if (parserError.length > 0) {
                            showStatus("{{ __tool('json-xml-converter', 'js.error_invalid_xml') }}", 'error');
                            return;
                        }

                        const jsonData = xmlToJson(xmlDoc.documentElement);
                        output.value = JSON.stringify(jsonData, null, 2);
                        showStatus("{{ __tool('json-xml-converter', 'js.success_json') }}", 'success');
                    }
                } catch (error) {
                    showStatus("{{ __tool('json-xml-converter', 'js.error_general') }}" + error.message, 'error');
                }
            }

            function jsonToXml(obj, rootName = 'root') {
                let xml = '<' + '?xml version="1.0" encoding="UTF-8"?' + '>\n';
                xml += buildXmlNode(obj, rootName);
                return xml;
            }

            function buildXmlNode(obj, nodeName) {
                if (obj === null || obj === undefined) {
                    return `<${nodeName}/>`;
                }

                if (typeof obj !== 'object') {
                    return `<${nodeName}>${escapeXml(String(obj))}</${nodeName}>`;
                }

                if (Array.isArray(obj)) {
                    return obj.map(item => buildXmlNode(item, nodeName)).join('\n');
                }

                let xml = `<${nodeName}>`;
                for (const [key, value] of Object.entries(obj)) {
                    xml += '\n  ' + buildXmlNode(value, key).split('\n').join('\n  ');
                }
                xml += `\n</${nodeName}>`;
                return xml;
            }

            function xmlToJson(xml) {
                const obj = {};

                if (xml.nodeType === 1) {
                    // Element node
                    if (xml.attributes.length > 0) {
                        obj['@attributes'] = {};
                        for (let i = 0; i < xml.attributes.length; i++) {
                            const attribute = xml.attributes[i];
                            obj['@attributes'][attribute.nodeName] = attribute.nodeValue;
                        }
                    }
                } else if (xml.nodeType === 3) {
                    // Text node
                    return xml.nodeValue.trim();
                }

                if (xml.hasChildNodes()) {
                    for (let i = 0; i < xml.childNodes.length; i++) {
                        const child = xml.childNodes[i];
                        const nodeName = child.nodeName;

                        if (child.nodeType === 3) {
                            const text = child.nodeValue.trim();
                            if (text) {
                                return text;
                            }
                            continue;
                        }

                        if (typeof obj[nodeName] === 'undefined') {
                            obj[nodeName] = xmlToJson(child);
                        } else {
                            if (!Array.isArray(obj[nodeName])) {
                                obj[nodeName] = [obj[nodeName]];
                            }
                            obj[nodeName].push(xmlToJson(child));
                        }
                    }
                }

                return obj;
            }

            function escapeXml(str) {
                return str.replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&apos;');
            }

            function formatXml(xml) {
                const PADDING = '  ';
                const reg = /(>)(<)(\/*)/g;
                let formatted = '';
                let pad = 0;

                xml = xml.replace(reg, '$1\n$2$3');
                xml.split('\n').forEach((node) => {
                    let indent = 0;
                    if (node.match(/.+<\/\w[^>]*>$/)) {
                        indent = 0;
                    } else if (node.match(/^<\/\w/) && pad > 0) {
                        pad -= 1;
                    } else if (node.match(/^<\w[^>]*[^\/]>.*$/)) {
                        indent = 1;
                    } else {
                        indent = 0;
                    }

                    formatted += PADDING.repeat(pad) + node + '\n';
                    pad += indent;
                });

                return formatted.trim();
            }

            function clearAll() {
                document.getElementById('numberInput').value = '';
                document.getElementById('numberOutput').value = '';
                const statusMessage = document.getElementById('statusMessage');
                statusMessage.classList.add('hidden');
                statusMessage.textContent = '';
            }

            function copyOutput() {
                const output = document.getElementById('numberOutput');
                if (!output.value) {
                    showStatus("{{ __tool('json-xml-converter', 'js.error_no_copy') }}", 'error');
                    return;
                }
                output.select();
                document.execCommand('copy');
                showStatus("{{ __tool('json-xml-converter', 'js.success_copy') }}", 'success');
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