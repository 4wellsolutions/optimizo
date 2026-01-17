@extends('layouts.app')

@section('title', __tool('xml-to-json', 'meta.title'))
@section('meta_description', __tool('xml-to-json', 'meta.description'))

@section('content')
    <div class="max-w-7xl mx-auto">
        <x-tool-hero :tool="$tool" icon="xml-to-json" />

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-green-200 mb-8">
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convert()"
                    class="px-8 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                    </svg>
                    <span>{{ __tool('xml-to-json', 'editor.btn_convert', 'Convert to JSON') }}</span>
                </button>
                <button onclick="copyJson()"
                    class="px-6 py-3 bg-gray-600 text-white rounded-xl hover:bg-gray-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>{{ __tool('xml-to-json', 'editor.btn_copy', 'Copy JSON') }}</span>
                </button>
                <button onclick="downloadJson()"
                    class="px-6 py-3 bg-purple-600 text-white rounded-xl hover:bg-purple-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    <span>{{ __tool('xml-to-json', 'editor.btn_download', 'Download') }}</span>
                </button>
                <button onclick="loadExample()"
                    class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                    <span>{{ __tool('xml-to-json', 'editor.btn_example', 'Load Example') }}</span>
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-red-500 text-white rounded-xl hover:bg-red-600 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>{{ __tool('xml-to-json', 'editor.btn_clear', 'Clear') }}</span>
                </button>
            </div>
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label for="xmlInput" class="form-label text-base">{{ __tool('xml-to-json', 'editor.label_input', 'XML Input') }}</label>
                    <textarea id="xmlInput" class="form-input font-mono text-sm min-h-[500px]"
                        placeholder="{{ __tool('xml-to-json', 'editor.ph_input', '<' . '?x' . 'ml version=\"1.0\"?>\n<root>\n  <item>Your XML here...</item>\n</root>') }}"></textarea>
                </div>
                <div>
                    <label for="jsonOutput" class="form-label text-base">{{ __tool('xml-to-json', 'editor.label_output', 'JSON Output') }}</label>
                    <textarea id="jsonOutput" class="form-input font-mono text-sm min-h-[500px]" readonly
                        placeholder="{{ __tool('xml-to-json', 'editor.ph_output', 'Converted JSON will appear here...') }}"></textarea>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-3xl p-8 md:p-12 border-2 border-green-100 shadow-2xl">
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">{{ __tool('xml-to-json', 'content.h2', 'Free XML to JSON Converter Online') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __tool('xml-to-json', 'meta.subtitle', 'Transform XML data into JSON format instantly') }}</p>
            </div>

            <div class="space-y-6 text-gray-700 leading-relaxed text-lg mb-12">
                <p>{{ __tool('xml-to-json', 'content.p1', 'Transform XML data into JSON format instantly with our powerful, free online XML to JSON converter. Perfect for developers, data analysts, and anyone working with API integrations, data migration, or modern web applications.') }}</p>
                <p>{{ __tool('xml-to-json', 'content.p2', 'XML (eXtensible Markup Language) has been a standard for data exchange for decades, but modern applications increasingly prefer JSON (JavaScript Object Notation) for its simplicity and native JavaScript support. Our converter bridges this gap, allowing you to seamlessly transform XML documents into clean, readable JSON format.') }}</p>
                <p>{{ __tool('xml-to-json', 'content.p3', 'Whether you\'re migrating legacy systems, integrating with RESTful APIs, or simply need to convert configuration files, our tool handles it all with precision and speed. No installation required, no registration needed – just paste your XML and get instant results.') }}</p>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-8 flex items-center gap-3">
                <span class="bg-green-100 p-2 rounded-lg">✨</span> {{ __tool('xml-to-json', 'content.features_title', 'Powerful Features') }}
            </h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                <!-- Fast -->
                <div class="bg-white rounded-2xl p-6 border border-green-100 shadow-lg hover:shadow-xl transition-all">
                    <div class="text-3xl mb-4 bg-green-50 w-12 h-12 flex items-center justify-center rounded-xl">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('xml-to-json', 'content.features.fast.title', 'Lightning Fast') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('xml-to-json', 'content.features.fast.desc', 'Instant conversion with real-time processing. No waiting, no delays.') }}</p>
                </div>
                <!-- Secure -->
                <div class="bg-white rounded-2xl p-6 border border-green-100 shadow-lg hover:shadow-xl transition-all">
                    <div class="text-3xl mb-4 bg-green-50 w-12 h-12 flex items-center justify-center rounded-xl">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('xml-to-json', 'content.features.secure.title', '100% Secure') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('xml-to-json', 'content.features.secure.desc', 'All conversion happens in your browser. Your data never leaves your device.') }}</p>
                </div>
                <!-- Attributes -->
                <div class="bg-white rounded-2xl p-6 border border-green-100 shadow-lg hover:shadow-xl transition-all">
                    <div class="text-3xl mb-4 bg-green-50 w-12 h-12 flex items-center justify-center rounded-xl">🏷️</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('xml-to-json', 'content.features.attributes.title', 'Attribute Handling') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('xml-to-json', 'content.features.attributes.desc', 'Preserves XML attributes and converts them properly to JSON structure.') }}</p>
                </div>
                <!-- Nested -->
                <div class="bg-white rounded-2xl p-6 border border-green-100 shadow-lg hover:shadow-xl transition-all">
                    <div class="text-3xl mb-4 bg-green-50 w-12 h-12 flex items-center justify-center rounded-xl">🌳</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('xml-to-json', 'content.features.nested.title', 'Nested Structure') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('xml-to-json', 'content.features.nested.desc', 'Maintains complex hierarchical data structures during conversion.') }}</p>
                </div>
                <!-- Pretty -->
                <div class="bg-white rounded-2xl p-6 border border-green-100 shadow-lg hover:shadow-xl transition-all">
                    <div class="text-3xl mb-4 bg-green-50 w-12 h-12 flex items-center justify-center rounded-xl">🎨</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('xml-to-json', 'content.features.pretty.title', 'Pretty Formatting') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('xml-to-json', 'content.features.pretty.desc', 'Clean, indented JSON output that\'s easy to read and understand.') }}</p>
                </div>
                <!-- Validation -->
                <div class="bg-white rounded-2xl p-6 border border-green-100 shadow-lg hover:shadow-xl transition-all">
                    <div class="text-3xl mb-4 bg-green-50 w-12 h-12 flex items-center justify-center rounded-xl">✅</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('xml-to-json', 'content.features.validation.title', 'Error Validation') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('xml-to-json', 'content.features.validation.desc', 'Detects and reports invalid XML syntax with helpful error messages.') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-8 flex items-center gap-3">
                <span class="bg-blue-100 p-2 rounded-lg">🎯</span> {{ __tool('xml-to-json', 'content.uses_title', 'Common Use Cases') }}
            </h3>
            <div class="grid md:grid-cols-2 gap-6 mb-12">
                <!-- API -->
                <div class="bg-white rounded-2xl p-6 border border-blue-100 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-lg text-gray-900 mb-3 flex items-center gap-2">
                        <span>🔌</span> {{ __tool('xml-to-json', 'content.uses.api.title', 'API Integration') }}
                    </h4>
                    <p class="text-gray-700">{{ __tool('xml-to-json', 'content.uses.api.desc', 'Convert XML API responses to JSON for modern web applications and RESTful services.') }}</p>
                </div>
                <!-- Migration -->
                <div class="bg-white rounded-2xl p-6 border border-blue-100 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-lg text-gray-900 mb-3 flex items-center gap-2">
                        <span>🔄</span> {{ __tool('xml-to-json', 'content.uses.migration.title', 'Data Migration') }}
                    </h4>
                    <p class="text-gray-700">{{ __tool('xml-to-json', 'content.uses.migration.desc', 'Transform XML databases and exports to JSON for NoSQL systems like MongoDB.') }}</p>
                </div>
                <!-- Config -->
                <div class="bg-white rounded-2xl p-6 border border-blue-100 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-lg text-gray-900 mb-3 flex items-center gap-2">
                        <span>⚙️</span> {{ __tool('xml-to-json', 'content.uses.config.title', 'Configuration Files') }}
                    </h4>
                    <p class="text-gray-700">{{ __tool('xml-to-json', 'content.uses.config.desc', 'Convert XML configuration files to JSON for modern applications and build tools.') }}</p>
                </div>
                <!-- SOAP -->
                <div class="bg-white rounded-2xl p-6 border border-blue-100 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-lg text-gray-900 mb-3 flex items-center gap-2">
                        <span>🧼</span> {{ __tool('xml-to-json', 'content.uses.soap.title', 'SOAP to REST') }}
                    </h4>
                    <p class="text-gray-700">{{ __tool('xml-to-json', 'content.uses.soap.desc', 'Transform SOAP XML responses to JSON for RESTful services.') }}</p>
                </div>
                <!-- RSS -->
                <div class="bg-white rounded-2xl p-6 border border-blue-100 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-lg text-gray-900 mb-3 flex items-center gap-2">
                        <span>📰</span> {{ __tool('xml-to-json', 'content.uses.rss.title', 'RSS Feeds') }}
                    </h4>
                    <p class="text-gray-700">{{ __tool('xml-to-json', 'content.uses.rss.desc', 'Convert RSS and Atom feeds (XML format) to JSON for parsing in JS apps.') }}</p>
                </div>
                <!-- Analysis -->
                <div class="bg-white rounded-2xl p-6 border border-blue-100 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-lg text-gray-900 mb-3 flex items-center gap-2">
                        <span>📊</span> {{ __tool('xml-to-json', 'content.uses.analysis.title', 'Data Analysis') }}
                    </h4>
                    <p class="text-gray-700">{{ __tool('xml-to-json', 'content.uses.analysis.desc', 'Convert XML data exports to JSON for easier analysis with JavaScript libraries.') }}</p>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-8 border-2 border-green-200 mb-12 shadow-lg">
                <h3 class="text-3xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                    <span class="bg-green-100 p-2 rounded-lg">📝</span> {{ __tool('xml-to-json', 'content.how_to_title', 'How XML to JSON Conversion Works') }}
                </h3>
                <p class="text-gray-700 mb-6 text-lg">{{ __tool('xml-to-json', 'content.how_to_desc', 'Our XML to JSON converter uses advanced parsing algorithms to accurately transform XML documents into JSON format.') }}</p>
                
                <div class="space-y-6">
                    @php $steps = __tool('xml-to-json', 'content.steps'); @endphp
                    @if(is_array($steps))
                        @foreach($steps as $step)
                            @if(is_array($step) && isset($step['title'], $step['desc']))
                                <div class="flex items-start gap-4">
                                    <div class="w-8 h-8 rounded-full bg-green-600 text-white flex items-center justify-center font-bold flex-shrink-0 mt-1">✓</div>
                                    <div>
                                        <h4 class="font-bold text-gray-900 text-lg">{{ $step['title'] }}</h4>
                                        <p class="text-gray-600">{{ $step['desc'] }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 {{ __tool('xml-to-json', 'content.example_title', 'Example Conversion') }}</h3>
            <div class="bg-gray-900 rounded-2xl p-6 mb-12 shadow-xl overflow-hidden">
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <div class="text-gray-400 mb-2 font-mono text-sm">XML Input</div>
                        <pre class="font-mono text-sm text-green-400 overflow-x-auto whitespace-pre-wrap">&lt;user id="1"&gt;
  &lt;name&gt;John Doe&lt;/name&gt;
  &lt;email&gt;john@example.com&lt;/email&gt;
  &lt;roles&gt;
    &lt;role&gt;Admin&lt;/role&gt;
    &lt;role&gt;Editor&lt;/role&gt;
  &lt;/roles&gt;
&lt;/user&gt;</pre>
                    </div>
                    <div>
                        <div class="text-gray-400 mb-2 font-mono text-sm">JSON Output</div>
                        <pre class="font-mono text-sm text-blue-400 overflow-x-auto whitespace-pre-wrap">{
  "user": {
    "_attributes": {
      "id": "1"
    },
    "name": "John Doe",
    "email": "john@example.com",
    "roles": {
      "role": [
        "Admin",
        "Editor"
      ]
    }
  }
}</pre>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ {{ __tool('xml-to-json', 'content.faq_title', 'Frequently Asked Questions') }}</h3>
            <div class="space-y-4 mb-12">
                @php $faqs = __tool('xml-to-json', 'content.faq'); @endphp
                @if(is_array($faqs))
                    @foreach($faqs as $key => $value)
                        @if(str_starts_with($key, 'q'))
                            <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                                <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ $value }}</h4>
                                <p class="text-gray-700 leading-relaxed">{{ __tool('xml-to-json', 'content.faq.a' . substr($key, 1)) }}</p>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>

            <div class="bg-gradient-to-r from-yellow-50 to-orange-50 border-2 border-yellow-200 rounded-2xl p-8">
                <h3 class="text-2xl font-bold text-yellow-900 mb-6 flex items-center gap-3">
                    <span class="text-3xl">💡</span> {{ __tool('xml-to-json', 'content.tips_title', 'Tips & Best Practices') }}
                </h3>
                <div class="grid md:grid-cols-2 gap-6">
                    @php $tips = __tool('xml-to-json', 'content.tips'); @endphp
                    @if(is_array($tips))
                        @foreach($tips as $tip)
                            @if(is_array($tip) && isset($tip['title'], $tip['desc']))
                                <div>
                                    <h4 class="font-bold text-yellow-800 mb-2">{{ $tip['title'] }}</h4>
                                    <p class="text-yellow-700 text-sm">{{ $tip['desc'] }}</p>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function convert() {
            const input = document.getElementById('xmlInput').value;
            if (!input.trim()) { showStatus("{{ __tool('xml-to-json', 'js.error_empty', 'Please enter some XML data to convert.') }}", 'error'); return; }
            try {
                const parser = new DOMParser();
                const xmlDoc = parser.parseFromString(input, "text/xml");
                if (xmlDoc.getElementsByTagName("parsererror").length > 0) { throw new Error("{{ __tool('xml-to-json', 'js.error_syntax', '\\n\\nPlease check your XML syntax.') }}"); }
                const json = xmlToJson(xmlDoc);
                document.getElementById('jsonOutput').value = JSON.stringify(json, null, 2);
            } catch (error) { showStatus("{{ __tool('xml-to-json', 'js.error_process', 'Error converting XML: ') }}" + error.message, 'error'); }
        }
        function xmlToJson(xml) { let obj = {}; if (xml.nodeType === 1) { if (xml.attributes.length > 0) { obj["_attributes"] = {}; for (let j = 0; j < xml.attributes.length; j++) { const attribute = xml.attributes.item(j); obj["_attributes"][attribute.nodeName] = attribute.nodeValue; } } } else if (xml.nodeType === 3) { obj = xml.nodeValue.trim(); } if (xml.hasChildNodes()) { for (let i = 0; i < xml.childNodes.length; i++) { const item = xml.childNodes.item(i); const nodeName = item.nodeName; if (nodeName === "#text") { if (item.nodeValue.trim() !== "") { obj = item.nodeValue.trim(); } } else { if (typeof (obj[nodeName]) === "undefined") { obj[nodeName] = xmlToJson(item); } else { if (typeof (obj[nodeName].push) === "undefined") { const old = obj[nodeName]; obj[nodeName] = []; obj[nodeName].push(old); } obj[nodeName].push(xmlToJson(item)); } } } } return obj; }
        function copyJson() { const output = document.getElementById('jsonOutput'); if (!output.value) { showStatus("{{ __tool('xml-to-json', 'js.error_no_copy', 'No JSON to copy. Please convert XML first.') }}", 'error'); return; } output.select(); document.execCommand('copy'); showStatus("{{ __tool('xml-to-json', 'js.success_copy', 'Copied!') }}", 'success'); }
        function downloadJson() { const output = document.getElementById('jsonOutput').value; if (!output) { showStatus("{{ __tool('xml-to-json', 'js.error_no_download', 'No JSON to download. Please convert XML first.') }}", 'error'); return; } const blob = new Blob([output], { type: 'application/json' }); const url = URL.createObjectURL(blob); const a = document.createElement('a'); a.href = url; a.download = 'converted.json'; a.click(); URL.revokeObjectURL(url); }
        function clearAll() { document.getElementById('xmlInput').value = ''; document.getElementById('jsonOutput').value = ''; }
        function loadExample() { const example = `<` + `?xml version="1.0" encoding="UTF-8"?` + `>\n<library>\n  <book id="1">\n    <title>The Great Gatsby</title>\n    <author>F. Scott Fitzgerald</author>\n    <year>1925</year>\n  </book>\n  <book id="2">\n    <title>1984</title>\n    <author>George Orwell</author>\n    <year>1949</year>\n  </book>\n</library>`; document.getElementById('xmlInput').value = example; convert(); }
        function showStatus(message, type) { const status = document.getElementById('statusMessage'); status.textContent = message; status.className = type === 'success' ? 'mb-6 p-4 rounded-xl font-semibold bg-green-100 text-green-800 border-2 border-green-300' : 'mb-6 p-4 rounded-xl font-semibold bg-red-100 text-red-800 border-2 border-red-300'; status.classList.remove('hidden'); setTimeout(() => status.classList.add('hidden'), 3000); }
    </script>
    @endpush
@endsection
