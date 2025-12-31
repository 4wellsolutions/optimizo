@extends('layouts.app')

@section('title', $tool->name . ' - ' . config('app.name'))
@section('meta_description', $tool->meta_description)

@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="relative overflow-hidden bg-gradient-to-br from-green-500 via-emerald-500 to-teal-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" /></svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2">CSV to XML Converter</h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto">Convert CSV files to XML format instantly!</p>
                @include('components.hero-actions')
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-green-200 mb-8">
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convert()" class="btn-primary"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg><span>Convert to XML</span></button>
                <button onclick="clearAll()" class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg flex items-center gap-2"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg><span>Clear</span></button>
                <button onclick="copyOutput()" class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg flex items-center gap-2"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg><span>Copy</span></button>
                <button onclick="loadExample()" class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all font-semibold shadow-lg flex items-center gap-2"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg><span>Example</span></button>
            </div>
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>
            <div class="grid md:grid-cols-2 gap-6"><div><label for="csvInput" class="form-label text-base">Enter CSV</label><textarea id="csvInput" class="form-input font-mono text-sm min-h-[400px]" placeholder="name,age,city&#10;John,30,New York&#10;Jane,25,London"></textarea></div><div><label for="xmlOutput" class="form-label text-base">XML Output</label><textarea id="xmlOutput" class="form-input font-mono text-sm min-h-[400px]" readonly placeholder="Converted XML will appear here..."></textarea></div></div>
        </div>

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-3xl p-8 md:p-12 border-2 border-green-100 shadow-2xl">
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">Free CSV to XML Converter</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Transform CSV spreadsheet data into structured XML format</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Our free CSV to XML converter transforms comma-separated values (CSV) data into well-structured XML format. Perfect for data migration, system integration, API development, and converting spreadsheet data into XML for enterprise applications, web services, and legacy systems.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🔐 What is CSV to XML Conversion?</h3>
            <p class="text-gray-700 leading-relaxed mb-8">
                CSV to XML conversion transforms tabular data from comma-separated values format into eXtensible Markup Language. While CSV is simple and widely used for spreadsheets and data exports, XML provides better structure, metadata support, and is required by many enterprise systems, SOAP APIs, and data interchange standards.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ Features</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">Instant Conversion</h4>
                    <p class="text-gray-600 text-sm">Convert CSV to XML in milliseconds with smart parsing</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-emerald-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">Secure & Private</h4>
                    <p class="text-gray-600 text-sm">All processing happens locally - your data never leaves your browser</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-teal-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📋</div>
                    <h4 class="font-bold text-gray-900 mb-2">One-Click Copy</h4>
                    <p class="text-gray-600 text-sm">Copy XML output to clipboard instantly</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎯</div>
                    <h4 class="font-bold text-gray-900 mb-2">Smart Formatting</h4>
                    <p class="text-gray-600 text-sm">Properly structured XML with correct indentation</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🆓</div>
                    <h4 class="font-bold text-gray-900 mb-2">100% Free</h4>
                    <p class="text-gray-600 text-sm">No registration, no limits, completely free forever</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📊</div>
                    <h4 class="font-bold text-gray-900 mb-2">Header Detection</h4>
                    <p class="text-gray-600 text-sm">Automatically uses first row as XML element names</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Common Use Cases</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔄 Data Migration</h4>
                    <p class="text-gray-700 leading-relaxed">Convert CSV exports from Excel, Google Sheets, or databases to XML for import into enterprise systems.</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔌 API Integration</h4>
                    <p class="text-gray-700 leading-relaxed">Transform CSV data into XML format for SOAP web services and XML-based APIs.</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📊 Business Intelligence</h4>
                    <p class="text-gray-700 leading-relaxed">Convert CSV reports to XML for BI tools, data warehouses, and analytics platforms.</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🏢 Enterprise Systems</h4>
                    <p class="text-gray-700 leading-relaxed">Transform CSV data to XML for ERP, CRM, and legacy enterprise applications.</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📄 Document Processing</h4>
                    <p class="text-gray-700 leading-relaxed">Convert CSV data to XML for document generation and template engines.</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🗄️ Database Export</h4>
                    <p class="text-gray-700 leading-relaxed">Transform database CSV exports to XML for data interchange and archival.</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📝 How to Convert CSV to XML</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8 shadow-lg">
                <ol class="space-y-4">
                    <li class="flex items-start">
                        <span class="flex-shrink-0 w-8 h-8 bg-green-600 text-white rounded-full flex items-center justify-center font-bold mr-3">1</span>
                        <div>
                            <p class="font-semibold text-gray-900 mb-1">Paste Your CSV Data</p>
                            <p class="text-gray-700">Copy CSV data from Excel, Google Sheets, or any source and paste it into the left field.</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 w-8 h-8 bg-green-600 text-white rounded-full flex items-center justify-center font-bold mr-3">2</span>
                        <div>
                            <p class="font-semibold text-gray-900 mb-1">Click Convert</p>
                            <p class="text-gray-700">Press "Convert to XML" to transform your CSV into structured XML format.</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 w-8 h-8 bg-green-600 text-white rounded-full flex items-center justify-center font-bold mr-3">3</span>
                        <div>
                            <p class="font-semibold text-gray-900 mb-1">Copy and Use</p>
                            <p class="text-gray-700">The XML output appears on the right. Click "Copy" to use it in your application.</p>
                        </div>
                    </li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 Conversion Example</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8 shadow-lg">
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm font-semibold text-gray-700 mb-2">CSV Input:</p>
                        <pre class="bg-gray-50 p-3 rounded text-sm overflow-x-auto"><code>name,age,city
John,30,New York
Jane,25,London</code></pre>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-700 mb-2">XML Output:</p>
                        <pre class="bg-gray-50 p-3 rounded text-sm overflow-x-auto"><code>&lt;data&gt;
  &lt;row&gt;
    &lt;name&gt;John&lt;/name&gt;
    &lt;age&gt;30&lt;/age&gt;
    &lt;city&gt;New York&lt;/city&gt;
  &lt;/row&gt;
  &lt;row&gt;
    &lt;name&gt;Jane&lt;/name&gt;
    &lt;age&gt;25&lt;/age&gt;
    &lt;city&gt;London&lt;/city&gt;
  &lt;/row&gt;
&lt;/data&gt;</code></pre>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4 mb-8">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">How does the converter handle CSV headers?</h4>
                    <p class="text-gray-700 leading-relaxed">The first row of your CSV is automatically used as XML element names. Make sure your CSV has descriptive headers for best results.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is my data secure?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! All conversion happens in your browser using JavaScript. Your CSV data never leaves your device or gets sent to any server.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I convert large CSV files?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes, you can convert CSV files of any size. Very large files may take a few seconds to process depending on your device.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What if my CSV has commas in the data?</h4>
                    <p class="text-gray-700 leading-relaxed">For CSV data with commas, ensure values are properly quoted. Our converter handles standard CSV formatting including quoted fields.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I use this for Excel data?</h4>
                    <p class="text-gray-700 leading-relaxed">Absolutely! Export your Excel data as CSV, then use this tool to convert it to XML format.</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎓 Best Practices</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700"><strong>Use clear headers:</strong> Ensure your CSV first row has descriptive, valid XML tag names.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700"><strong>Clean your data:</strong> Remove extra spaces and special characters from headers before conversion.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700"><strong>Test with examples:</strong> Use the "Example" button to understand the conversion format.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700"><strong>Validate XML output:</strong> Always validate the generated XML against your target system's requirements.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700"><strong>Handle special characters:</strong> Special characters are automatically escaped for valid XML output.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        function convert() {
            const input = document.getElementById('csvInput').value.trim();
            if (!input) { showStatus('Please enter CSV data', 'error'); return; }
            try {
                const lines = input.split('\n').filter(line => line.trim());
                const headers = lines[0].split(',').map(h => h.trim());
                let xml = '<?xml version="1.0" encoding="UTF-8"?>\n<data>\n';
                for (let i = 1; i < lines.length; i++) {
                    const values = lines[i].split(',').map(v => v.trim());
                    xml += '  <row>\n';
                    headers.forEach((header, index) => {
                        xml += `    <${header}>${values[index] || ''}</${header}>\n`;
                    });
                    xml += '  </row>\n';
                }
                xml += '</data>';
                document.getElementById('xmlOutput').value = xml;
                showStatus('✓ CSV converted to XML successfully', 'success');
            } catch (error) { showStatus('✗ Error: ' + error.message, 'error'); }
        }
        function clearAll() { document.getElementById('csvInput').value = ''; document.getElementById('xmlOutput').value = ''; document.getElementById('statusMessage').classList.add('hidden'); }
        function copyOutput() { const output = document.getElementById('xmlOutput'); if (!output.value) { showStatus('No output to copy', 'error'); return; } output.select(); document.execCommand('copy'); showStatus('✓ Copied to clipboard', 'success'); }
        function loadExample() { document.getElementById('csvInput').value = 'name,age,city\nJohn Doe,30,New York\nJane Smith,25,London\nBob Johnson,35,Paris'; convert(); }
        function showStatus(message, type) { const statusMessage = document.getElementById('statusMessage'); statusMessage.textContent = message; statusMessage.classList.remove('hidden', 'bg-green-100', 'text-green-800', 'bg-red-100', 'text-red-800', 'border-green-300', 'border-red-300'); if (type === 'success') { statusMessage.classList.add('bg-green-100', 'text-green-800', 'border-2', 'border-green-300'); } else { statusMessage.classList.add('bg-red-100', 'text-red-800', 'border-2', 'border-red-300'); } }
    </script>
@endsection
