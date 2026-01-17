@extends('layouts.app')

@section('title', __tool('xml-to-csv', 'meta.title'))
@section('meta_description', __tool('xml-to-csv', 'meta.description'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" icon="xml-to-csv" />

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-orange-200 mb-8">
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convert()" class="btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>{{ __tool('xml-to-csv', 'editor.btn_convert', 'Convert to CSV') }}</span>
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>{{ __tool('xml-to-csv', 'editor.btn_clear', 'Clear') }}</span>
                </button>
                <button onclick="copyOutput()"
                    class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>{{ __tool('xml-to-csv', 'editor.btn_copy', 'Copy') }}</span>
                </button>
                <button onclick="loadExample()"
                    class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all font-semibold shadow-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>{{ __tool('xml-to-csv', 'editor.btn_example', 'Example') }}</span>
                </button>
            </div>
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label for="xmlInput" class="form-label text-base">{{ __tool('xml-to-csv', 'editor.label_input', 'Enter XML') }}</label>
                    <textarea id="xmlInput" class="form-input font-mono text-sm min-h-[400px]"
                        placeholder="{{ __tool('xml-to-csv', 'editor.ph_input', '<data><row><name>John</name><age>30</age></row></data>') }}"></textarea>
                </div>
                <div>
                    <label for="csvOutput" class="form-label text-base">{{ __tool('xml-to-csv', 'editor.label_output', 'CSV Output') }}</label>
                    <textarea id="csvOutput" class="form-input font-mono text-sm min-h-[400px]" readonly
                        placeholder="{{ __tool('xml-to-csv', 'editor.ph_output', 'Converted CSV will appear here...') }}"></textarea>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-3xl p-8 md:p-12 border-2 border-orange-100 shadow-2xl">
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">{{ __tool('xml-to-csv', 'meta.h1', 'Free XML to CSV Converter') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __tool('xml-to-csv', 'meta.subtitle', 'Transform XML data into spreadsheet-friendly CSV format') }}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {{ __tool('xml-to-csv', 'content.p1', 'Our free XML to CSV converter transforms structured XML data into comma-separated values format. Perfect for importing XML data into Excel, Google Sheets, databases, and data analysis tools. Convert complex XML structures into simple, tabular CSV format in seconds.') }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🔐 {{ __tool('xml-to-csv', 'content.what_title', 'What is XML to CSV Conversion?') }}</h3>
            <p class="text-gray-700 leading-relaxed mb-8">
                {{ __tool('xml-to-csv', 'content.what_desc', 'XML to CSV conversion transforms structured eXtensible Markup Language data into comma-separated values format. While XML is great for complex data structures and APIs, CSV is simpler and universally supported by spreadsheet applications, making it ideal for data analysis, reporting, and import/export operations.') }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ {{ __tool('xml-to-csv', 'content.features_title', 'Features') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <!-- Fast -->
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-orange-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('xml-to-csv', 'content.features.fast.title', 'Lightning Fast') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('xml-to-csv', 'content.features.fast.desc', 'Convert XML to CSV instantly with optimized parsing') }}</p>
                </div>
                <!-- Secure -->
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('xml-to-csv', 'content.features.secure.title', '100% Secure') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('xml-to-csv', 'content.features.secure.desc', 'All processing happens locally - your data stays private') }}</p>
                </div>
                <!-- Copy -->
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📋</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('xml-to-csv', 'content.features.copy.title', 'Quick Copy') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('xml-to-csv', 'content.features.copy.desc', 'Copy CSV output to clipboard with one click') }}</p>
                </div>
                <!-- Smart -->
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎯</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('xml-to-csv', 'content.features.smart.title', 'Smart Parsing') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('xml-to-csv', 'content.features.smart.desc', 'Automatically extracts data from XML row elements') }}</p>
                </div>
                <!-- Free -->
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🆓</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('xml-to-csv', 'content.features.free.title', 'Completely Free') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('xml-to-csv', 'content.features.free.desc', 'No limits, no registration, free forever') }}</p>
                </div>
                <!-- Excel -->
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📊</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('xml-to-csv', 'content.features.excel.title', 'Excel Ready') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('xml-to-csv', 'content.features.excel.desc', 'Output works perfectly in Excel and Google Sheets') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 {{ __tool('xml-to-csv', 'content.uses_title', 'Common Use Cases') }}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📊 {{ __tool('xml-to-csv', 'content.uses.analysis.title', 'Data Analysis') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('xml-to-csv', 'content.uses.analysis.desc', 'Convert XML reports and data exports to CSV for analysis in Excel, Google Sheets, or BI tools.') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔄 {{ __tool('xml-to-csv', 'content.uses.migration.title', 'System Migration') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('xml-to-csv', 'content.uses.migration.desc', 'Transform XML data from legacy systems to CSV for import into modern databases and applications.') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📈 {{ __tool('xml-to-csv', 'content.uses.reporting.title', 'Reporting') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('xml-to-csv', 'content.uses.reporting.desc', 'Convert XML API responses to CSV for creating reports and dashboards.') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🗄️ {{ __tool('xml-to-csv', 'content.uses.db.title', 'Database Import') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('xml-to-csv', 'content.uses.db.desc', 'Transform XML exports to CSV for bulk import into SQL databases.') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📧 {{ __tool('xml-to-csv', 'content.uses.email.title', 'Email Lists') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('xml-to-csv', 'content.uses.email.desc', 'Convert XML contact data to CSV for email marketing platforms.') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔍 {{ __tool('xml-to-csv', 'content.uses.cleaning.title', 'Data Cleaning') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('xml-to-csv', 'content.uses.cleaning.desc', 'Transform XML to CSV for easier data cleaning and manipulation in spreadsheets.') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📝 {{ __tool('xml-to-csv', 'content.how_to_title', 'How to Convert XML to CSV') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8 shadow-lg">
                <ol class="space-y-4">
                    <li class="flex items-start">
                        <span class="flex-shrink-0 w-8 h-8 bg-orange-600 text-white rounded-full flex items-center justify-center font-bold mr-3">1</span>
                        <div>
                            <p class="font-semibold text-gray-900 mb-1">{{ __tool('xml-to-csv', 'content.how_to.step1.title', 'Paste Your XML Data') }}</p>
                            <p class="text-gray-700">{{ __tool('xml-to-csv', 'content.how_to.step1.desc', 'Copy XML data from your source and paste it into the left input field.') }}</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 w-8 h-8 bg-orange-600 text-white rounded-full flex items-center justify-center font-bold mr-3">2</span>
                        <div>
                            <p class="font-semibold text-gray-900 mb-1">{{ __tool('xml-to-csv', 'content.how_to.step2.title', 'Click Convert') }}</p>
                            <p class="text-gray-700">{{ __tool('xml-to-csv', 'content.how_to.step2.desc', 'Press "Convert to CSV" to transform your XML into CSV format.') }}</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 w-8 h-8 bg-orange-600 text-white rounded-full flex items-center justify-center font-bold mr-3">3</span>
                        <div>
                            <p class="font-semibold text-gray-900 mb-1">{{ __tool('xml-to-csv', 'content.how_to.step3.title', 'Copy and Use') }}</p>
                            <p class="text-gray-700">{{ __tool('xml-to-csv', 'content.how_to.step3.desc', 'The CSV output appears on the right. Click "Copy" to paste it into Excel or any application.') }}</p>
                        </div>
                    </li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 {{ __tool('xml-to-csv', 'content.example_title', 'Conversion Example') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8 shadow-lg">
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm font-semibold text-gray-700 mb-2">XML Input:</p>
                        <pre class="bg-gray-50 p-3 rounded text-sm overflow-x-auto"><code>&lt;data&gt;
      &lt;row&gt;
        &lt;name&gt;John&lt;/name&gt;
        &lt;age&gt;30&lt;/age&gt;
      &lt;/row&gt;
    &lt;/data&gt;</code></pre>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-700 mb-2">CSV Output:</p>
                        <pre class="bg-gray-50 p-3 rounded text-sm overflow-x-auto"><code>name,age
    John,30</code></pre>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ {{ __tool('xml-to-csv', 'content.faq_title', 'Frequently Asked Questions') }}</h3>
            <div class="space-y-4 mb-8">
                @php $faqs = __tool('xml-to-csv', 'content.faq'); @endphp
                @if(is_array($faqs))
                    @foreach($faqs as $key => $value)
                        @if(str_starts_with($key, 'q'))
                            <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                                <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ $value }}</h4>
                                <p class="text-gray-700 leading-relaxed">{{ __tool('xml-to-csv', 'content.faq.a' . substr($key, 1)) }}</p>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎓 {{ __tool('xml-to-csv', 'content.best_practices_title', 'Best Practices') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                <ul class="space-y-3">
                    @php $best_practices = __tool('xml-to-csv', 'content.best_practices'); @endphp
                    @if(is_array($best_practices))
                        @foreach($best_practices as $item)
                            @if(is_array($item) && isset($item['title'], $item['desc']))
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-gray-700"><strong>{{ $item['title'] }}:</strong> {{ $item['desc'] }}</span>
                                </li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function convert() {
            const input = document.getElementById('xmlInput').value.trim();
            if (!input) { showStatus("{{ __tool('xml-to-csv', 'js.error_empty', 'Please enter XML data') }}", 'error'); return; }
            try {
                const parser = new DOMParser();
                const xmlDoc = parser.parseFromString(input, 'text/xml');
                const rows = xmlDoc.getElementsByTagName('row');
                if (rows.length === 0) { showStatus("{{ __tool('xml-to-csv', 'js.error_no_row', 'No <row> elements found in XML') }}", 'error'); return; }
                const headers = [];
                const firstRow = rows[0];
                const columns = [];
                for (let child of firstRow.children) { headers.push(child.tagName); }
                
                let csv = headers.join(',') + '\n';
                for (let row of rows) {
                    const values = [];
                    headers.forEach(header => {
                        const element = row.getElementsByTagName(header)[0];
                        let val = element ? element.textContent : '';
                        // Handle CSV escaping if needed (basic)
                        if (val.includes(',')) val = `"${val}"`;
                        values.push(val);
                    });
                    csv += values.join(',') + '\n';
                }
                document.getElementById('csvOutput').value = csv;
                showStatus("{{ __tool('xml-to-csv', 'js.success_convert', '✓ XML converted to CSV successfully') }}", 'success');
            } catch (error) { showStatus("{{ __tool('xml-to-csv', 'js.error_process', '✗ Error: ') }}" + error.message, 'error'); }
        }
        function clearAll() { document.getElementById('xmlInput').value = ''; document.getElementById('csvOutput').value = ''; document.getElementById('statusMessage').classList.add('hidden'); }
        function copyOutput() { const output = document.getElementById('csvOutput'); if (!output.value) { showStatus("{{ __tool('xml-to-csv', 'js.error_no_copy', 'No output to copy') }}", 'error'); return; } output.select(); document.execCommand('copy'); showStatus("{{ __tool('xml-to-csv', 'js.success_copy', '✓ Copied to clipboard') }}", 'success'); }
        function loadExample() { document.getElementById('xmlInput').value = '<' + '?xml version="1.0"?>\n<data>\n  <row><name>John</name><age>30</age><city>New York</city></row>\n  <row><name>Jane</name><age>25</age><city>London</city></row>\n</data>'; convert(); }
        function showStatus(message, type) { const statusMessage = document.getElementById('statusMessage'); statusMessage.textContent = message; statusMessage.classList.remove('hidden', 'bg-green-100', 'text-green-800', 'bg-red-100', 'text-red-800', 'border-green-300', 'border-red-300'); if (type === 'success') { statusMessage.classList.add('bg-green-100', 'text-green-800', 'border-2', 'border-green-300'); } else { statusMessage.classList.add('bg-red-100', 'text-red-800', 'border-2', 'border-red-300'); } }
    </script>
    @endpush
@endsection