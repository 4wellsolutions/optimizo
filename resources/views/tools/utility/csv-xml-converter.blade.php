@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

<!-- PapaParse Library for CSV Parsing -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.4.1/papaparse.min.js"></script>

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
                    CSV to XML
                </button>
                <button onclick="setMode('decode')" id="decodeBtn"
                    class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    </svg>
                    XML to CSV
                </button>
            </div>

            <!-- Input/Output Grid -->
            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <!-- Input Column -->
                <div>
                    <label for="numberInput" class="form-label text-base" id="inputLabel">Enter CSV Data</label>
                    <textarea id="numberInput" class="form-input font-mono text-sm min-h-[300px]"
                        placeholder="Name,Age,City\nJohn,30,New York\nJane,25,Boston"></textarea>
                </div>

                <!-- Output Column -->
                <div>
                    <label for="numberOutput" class="form-label text-base" id="outputLabel">XML Result</label>
                    <textarea id="numberOutput" class="form-input font-mono text-sm min-h-[300px]" readonly
                        placeholder="Result will appear here..."></textarea>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convertNumber()" class="btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span id="processBtn">Convert to XML</span>
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>Clear</span>
                </button>
                <button onclick="copyOutput()"
                    class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>Copy</span>
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
                <h2 class="text-4xl font-black text-gray-900 mb-3">Free CSV ↔ XML Converter</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Convert spreadsheet data to structured XML and back</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Seamlessly convert between CSV (Comma-Separated Values) and XML formats with our powerful bidirectional
                tool. Perfect for data interchange, spreadsheet exports, and system integrations. All conversions run
                locally in your browser for maximum security.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📊 CSV and XML Formats</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                CSV is a simple, flat file format ideal for tabular data and spreadsheets. XML provides hierarchical
                structure with metadata support, commonly used in enterprise data exchange. Converting between them enables
                compatibility across different systems and applications.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ Tool Capabilities</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">Rapid Conversion</h4>
                    <p class="text-gray-600 text-sm">Process large datasets instantly</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔄</div>
                    <h4 class="font-bold text-gray-900 mb-2">Two-Way Processing</h4>
                    <p class="text-gray-600 text-sm">CSV to XML and XML to CSV</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🛡️</div>
                    <h4 class="font-bold text-gray-900 mb-2">Privacy Protected</h4>
                    <p class="text-gray-600 text-sm">Browser-only processing</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📋</div>
                    <h4 class="font-bold text-gray-900 mb-2">Header Recognition</h4>
                    <p class="text-gray-600 text-sm">Automatically detects CSV headers</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎯</div>
                    <h4 class="font-bold text-gray-900 mb-2">Accurate Parsing</h4>
                    <p class="text-gray-600 text-sm">Handles quotes and special characters</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">💸</div>
                    <h4 class="font-bold text-gray-900 mb-2">Zero Cost</h4>
                    <p class="text-gray-600 text-sm">Free unlimited conversions</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Practical Applications</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📈 Data Export/Import</h4>
                    <p class="text-gray-700 leading-relaxed">Export Excel/Google Sheets data as XML for enterprise systems
                        or import XML data into spreadsheets</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔗 System Integration</h4>
                    <p class="text-gray-700 leading-relaxed">Bridge CSV-based tools with XML-consuming applications for
                        seamless data flow</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📦 E-commerce Feeds</h4>
                    <p class="text-gray-700 leading-relaxed">Convert product catalogs between CSV (for editing) and XML (for
                        feeds)</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🗄️ Database Migrations</h4>
                    <p class="text-gray-700 leading-relaxed">Transform database exports from CSV to XML for legacy system
                        compatibility</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📊 Reporting Tools</h4>
                    <p class="text-gray-700 leading-relaxed">Convert report data between formats for different visualization
                        platforms</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🧪 Data Analysis</h4>
                    <p class="text-gray-700 leading-relaxed">Prepare XML datasets for analysis in CSV-friendly tools like
                        Excel or R</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📚 Step-by-Step Guide</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">1.</span>
                        <span><strong>Choose Direction:</strong> Select CSV to XML or XML to CSV mode</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">2.</span>
                        <span><strong>Paste Content:</strong> Enter your CSV or XML data in the input area</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">3.</span>
                        <span><strong>Process Data:</strong> Click convert to transform your data</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">4.</span>
                        <span><strong>Review Output:</strong> Inspect the converted result</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">5.</span>
                        <span><strong>Download/Copy:</strong> Save or copy the result for use</span>
                    </li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 Conversion Illustrations</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <div class="space-y-4">
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Simple Table:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">CSV: Name,Age → XML:
                            &lt;rows&gt;&lt;row&gt;&lt;Name&gt;...&lt;/Name&gt;&lt;/row&gt;&lt;/rows&gt;</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Multiple Records:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">Each CSV row becomes an XML
                            &lt;row&gt; element with child elements for each column</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Header Mapping:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">CSV column headers become XML
                            element names automatically</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Reverse Transform:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">XML &lt;row&gt; elements convert
                            back to CSV rows with comma-separated values</p>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">How are CSV headers handled?</h4>
                    <p class="text-gray-700 leading-relaxed">The first row of your CSV is automatically treated as headers
                        and becomes XML element names. Each subsequent row creates a &lt;row&gt; element with child elements
                        named after the headers.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What about commas within values?</h4>
                    <p class="text-gray-700 leading-relaxed">The tool uses PapaParse library which correctly handles quoted
                        values containing commas, ensuring accurate parsing and conversion.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I convert large CSV files?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes, the tool handles large files efficiently. For very large
                        datasets (>5MB), processing may take a few seconds but will complete successfully.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What XML structure is generated?</h4>
                    <p class="text-gray-700 leading-relaxed">CSV data is wrapped in a &lt;rows&gt; root element, with each
                        data row as a &lt;row&gt; element containing child elements for each column value.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is my business data secure?</h4>
                    <p class="text-gray-700 leading-relaxed">Absolutely! All conversions happen entirely in your browser
                        using JavaScript and PapaParse. Your sensitive business data never leaves your computer.</p>
                </div>
            </div>
        </div>
    </div>

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
                inputLabel.textContent = 'Enter CSV Data';
                outputLabel.textContent = 'XML Result';
                processBtn.textContent = 'Convert to XML';
            } else {
                decodeBtn.classList.remove('bg-gray-200', 'text-gray-700');
                decodeBtn.classList.add('bg-blue-600', 'text-white');
                encodeBtn.classList.remove('bg-blue-600', 'text-white');
                encodeBtn.classList.add('bg-gray-200', 'text-gray-700');
                inputLabel.textContent = 'Enter XML Data';
                outputLabel.textContent = 'CSV Result';
                processBtn.textContent = 'Convert to CSV';
            }
            clearAll();
        }

        function convertNumber() {
            const input = document.getElementById('numberInput').value.trim();
            const output = document.getElementById('numberOutput');

            if (!input) {
                showStatus('Please enter data to convert', 'error');
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
                        showStatus('Error parsing CSV: ' + parsed.errors[0].message, 'error');
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
                    showStatus('✓ Converted to XML successfully', 'success');
                } else {
                    // XML to CSV
                    const parser = new DOMParser();
                    const xmlDoc = parser.parseFromString(input, 'text/xml');

                    const parserError = xmlDoc.getElementsByTagName('parsererror');
                    if (parserError.length > 0) {
                        showStatus('Invalid XML format', 'error');
                        return;
                    }

                    const rows = xmlDoc.getElementsByTagName('row');
                    if (rows.length === 0) {
                        showStatus('No <row> elements found in XML', 'error');
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
                    showStatus('✓ Converted to CSV successfully', 'success');
                }
            } catch (error) {
                showStatus('✗ Error: ' + error.message, 'error');
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
                showStatus('No output to copy', 'error');
                return;
            }
            output.select();
            document.execCommand('copy');
            showStatus('✓ Copied to clipboard', 'success');
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
@endsection