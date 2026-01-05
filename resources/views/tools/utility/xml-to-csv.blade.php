@extends('layouts.app')

@section('title', $tool->name . ' - ' . config('app.name'))
@section('meta_description', $tool->meta_description)

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" icon="xml-to-csv" />

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-orange-200 mb-8">
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convert()" class="btn-primary"><svg class="w-5 h-5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg><span>Convert to CSV</span></button>
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg flex items-center gap-2"><svg
                        class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg><span>Clear</span></button>
                <button onclick="copyOutput()"
                    class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg flex items-center gap-2"><svg
                        class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg><span>Copy</span></button>
                <button onclick="loadExample()"
                    class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all font-semibold shadow-lg flex items-center gap-2"><svg
                        class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg><span>Example</span></button>
            </div>
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>
            <div class="grid md:grid-cols-2 gap-6">
                <div><label for="xmlInput" class="form-label text-base">Enter XML</label><textarea id="xmlInput"
                        class="form-input font-mono text-sm min-h-[400px]"
                        placeholder="<data><row><name>John</name><age>30</age></row></data>"></textarea></div>
                <div><label for="csvOutput" class="form-label text-base">CSV Output</label><textarea id="csvOutput"
                        class="form-input font-mono text-sm min-h-[400px]" readonly
                        placeholder="Converted CSV will appear here..."></textarea></div>
            </div>
        </div>

        <!-- SEO Content -->
        <div
            class="bg-gradient-to-br from-orange-50 to-red-50 rounded-3xl p-8 md:p-12 border-2 border-orange-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">Free XML to CSV Converter</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Transform XML data into spreadsheet-friendly CSV format
                </p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Our free XML to CSV converter transforms structured XML data into comma-separated values format. Perfect for
                importing XML data into Excel, Google Sheets, databases, and data analysis tools. Convert complex XML
                structures into simple, tabular CSV format in seconds.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🔐 What is XML to CSV Conversion?</h3>
            <p class="text-gray-700 leading-relaxed mb-8">
                XML to CSV conversion transforms structured eXtensible Markup Language data into comma-separated values
                format. While XML is great for complex data structures and APIs, CSV is simpler and universally supported by
                spreadsheet applications, making it ideal for data analysis, reporting, and import/export operations.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ Features</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-orange-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">Lightning Fast</h4>
                    <p class="text-gray-600 text-sm">Convert XML to CSV instantly with optimized parsing</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">100% Secure</h4>
                    <p class="text-gray-600 text-sm">All processing happens locally - your data stays private</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📋</div>
                    <h4 class="font-bold text-gray-900 mb-2">Quick Copy</h4>
                    <p class="text-gray-600 text-sm">Copy CSV output to clipboard with one click</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎯</div>
                    <h4 class="font-bold text-gray-900 mb-2">Smart Parsing</h4>
                    <p class="text-gray-600 text-sm">Automatically extracts data from XML row elements</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🆓</div>
                    <h4 class="font-bold text-gray-900 mb-2">Completely Free</h4>
                    <p class="text-gray-600 text-sm">No limits, no registration, free forever</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📊</div>
                    <h4 class="font-bold text-gray-900 mb-2">Excel Ready</h4>
                    <p class="text-gray-600 text-sm">Output works perfectly in Excel and Google Sheets</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Common Use Cases</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📊 Data Analysis</h4>
                    <p class="text-gray-700 leading-relaxed">Convert XML reports and data exports to CSV for analysis in
                        Excel, Google Sheets, or BI tools.</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔄 System Migration</h4>
                    <p class="text-gray-700 leading-relaxed">Transform XML data from legacy systems to CSV for import into
                        modern databases and applications.</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📈 Reporting</h4>
                    <p class="text-gray-700 leading-relaxed">Convert XML API responses to CSV for creating reports and
                        dashboards.</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🗄️ Database Import</h4>
                    <p class="text-gray-700 leading-relaxed">Transform XML exports to CSV for bulk import into SQL
                        databases.</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📧 Email Lists</h4>
                    <p class="text-gray-700 leading-relaxed">Convert XML contact data to CSV for email marketing platforms.
                    </p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔍 Data Cleaning</h4>
                    <p class="text-gray-700 leading-relaxed">Transform XML to CSV for easier data cleaning and manipulation
                        in spreadsheets.</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📝 How to Convert XML to CSV</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8 shadow-lg">
                <ol class="space-y-4">
                    <li class="flex items-start">
                        <span
                            class="flex-shrink-0 w-8 h-8 bg-orange-600 text-white rounded-full flex items-center justify-center font-bold mr-3">1</span>
                        <div>
                            <p class="font-semibold text-gray-900 mb-1">Paste Your XML Data</p>
                            <p class="text-gray-700">Copy XML data from your source and paste it into the left input field.
                            </p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span
                            class="flex-shrink-0 w-8 h-8 bg-orange-600 text-white rounded-full flex items-center justify-center font-bold mr-3">2</span>
                        <div>
                            <p class="font-semibold text-gray-900 mb-1">Click Convert</p>
                            <p class="text-gray-700">Press "Convert to CSV" to transform your XML into CSV format.</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span
                            class="flex-shrink-0 w-8 h-8 bg-orange-600 text-white rounded-full flex items-center justify-center font-bold mr-3">3</span>
                        <div>
                            <p class="font-semibold text-gray-900 mb-1">Copy and Use</p>
                            <p class="text-gray-700">The CSV output appears on the right. Click "Copy" to paste it into
                                Excel or any application.</p>
                        </div>
                    </li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 Conversion Example</h3>
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

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4 mb-8">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What XML structure is required?</h4>
                    <p class="text-gray-700 leading-relaxed">The converter expects XML with &lt;row&gt; elements. Each row's
                        child elements become CSV columns. The first row determines the column headers.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is my data secure?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! All conversion happens in your browser using JavaScript.
                        Your XML data never leaves your device or gets sent to any server.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I import the CSV into Excel?</h4>
                    <p class="text-gray-700 leading-relaxed">Absolutely! The generated CSV works perfectly with Excel,
                        Google Sheets, and all spreadsheet applications. Just copy and paste or save as a .csv file.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What if my XML has nested elements?</h4>
                    <p class="text-gray-700 leading-relaxed">The converter works best with flat XML structures. Nested
                        elements will be flattened. For complex nested XML, consider restructuring before conversion.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I convert large XML files?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes, you can convert XML files of any size. Very large files
                        may take a few seconds to process depending on your device's performance.</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎓 Best Practices</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700"><strong>Use row elements:</strong> Structure your XML with &lt;row&gt;
                            elements for best results.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700"><strong>Consistent structure:</strong> Ensure all rows have the same
                            child elements for proper CSV columns.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700"><strong>Test with examples:</strong> Use the "Example" button to
                            understand the expected XML format.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700"><strong>Validate XML first:</strong> Ensure your XML is well-formed
                            before conversion.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700"><strong>Handle special characters:</strong> Commas in data are
                            automatically handled in the CSV output.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        function convert() {
            const input = document.getElementById('xmlInput').value.trim();
            if (!input) { showStatus('Please enter XML data', 'error'); return; }
            try {
                const parser = new DOMParser();
                const xmlDoc = parser.parseFromString(input, 'text/xml');
                const rows = xmlDoc.getElementsByTagName('row');
                if (rows.length === 0) { showStatus('No <row> elements found in XML', 'error'); return; }
                const headers = [];
                const firstRow = rows[0];
                for (let child of firstRow.children) { headers.push(child.tagName); }
                let csv = headers.join(',') + '\n';
                for (let row of rows) {
                    const values = [];
                    headers.forEach(header => {
                        const element = row.getElementsByTagName(header)[0];
                        values.push(element ? element.textContent : '');
                    });
                    csv += values.join(',') + '\n';
                }
                document.getElementById('csvOutput').value = csv;
                showStatus('✓ XML converted to CSV successfully', 'success');
            } catch (error) { showStatus('✗ Error: ' + error.message, 'error'); }
        }
        function clearAll() { document.getElementById('xmlInput').value = ''; document.getElementById('csvOutput').value = ''; document.getElementById('statusMessage').classList.add('hidden'); }
        function copyOutput() { const output = document.getElementById('csvOutput'); if (!output.value) { showStatus('No output to copy', 'error'); return; } output.select(); document.execCommand('copy'); showStatus('✓ Copied to clipboard', 'success'); }
        function loadExample() { document.getElementById('xmlInput').value = '<' + '?xml version="1.0"?>\n<data>\n  <row><name>John</name><age>30</age><city>New York</city></row>\n  <row><name>Jane</name><age>25</age><city>London</city></row>\n</data>'; convert(); }
        function showStatus(message, type) { const statusMessage = document.getElementById('statusMessage'); statusMessage.textContent = message; statusMessage.classList.remove('hidden', 'bg-green-100', 'text-green-800', 'bg-red-100', 'text-red-800', 'border-green-300', 'border-red-300'); if (type === 'success') { statusMessage.classList.add('bg-green-100', 'text-green-800', 'border-2', 'border-green-300'); } else { statusMessage.classList.add('bg-red-100', 'text-red-800', 'border-2', 'border-red-300'); } }
    </script>
@endsection