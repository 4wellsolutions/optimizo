@extends('layouts.app')

@section('title', $tool->name . ' - ' . config('app.name'))
@section('meta_description', $tool->meta_description)

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <x-tool-hero :tool="$tool" icon="csv-to-json" />

        <!-- Converter Tool -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <!-- Options -->
            <div class="mb-6">
                <label class="block text-sm font-bold text-gray-900 mb-2">Delimiter</label>
                <select id="delimiter"
                    class="px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200">
                    <option value=",">Comma (,)</option>
                    <option value=";">Semicolon (;)</option>
                    <option value="\t">Tab</option>
                    <option value="|">Pipe (|)</option>
                </select>
                <label class="inline-flex items-center ml-4">
                    <input type="checkbox" id="hasHeaders" checked
                        class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                    <span class="ml-2 text-sm text-gray-700">First row is header</span>
                </label>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convertCsvToJson()"
                    class="px-6 py-2.5 bg-gradient-to-r from-green-600 to-teal-600 text-white rounded-lg font-semibold hover:shadow-lg transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Convert
                </button>
                <button onclick="copyJson()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    Copy JSON
                </button>
                <button onclick="downloadJson()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    Download
                </button>
                <button onclick="loadExample()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Example
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Clear
                </button>
            </div>

            <!-- Input/Output Grid -->
            <div class="grid md:grid-cols-2 gap-6">
                <!-- CSV Input -->
                <div>
                    <label class="block text-sm font-bold text-gray-900 mb-2">CSV Input</label>
                    <textarea id="csvInput"
                        class="w-full h-96 p-4 border-2 border-gray-200 rounded-lg font-mono text-sm focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all"
                        placeholder="Paste your CSV data here..."></textarea>
                </div>

                <!-- JSON Output -->
                <div>
                    <label class="block text-sm font-bold text-gray-900 mb-2">JSON Output</label>
                    <textarea id="jsonOutput" readonly
                        class="w-full h-96 p-4 border-2 border-gray-200 rounded-lg font-mono text-sm bg-gray-50 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all"
                        placeholder="Converted JSON will appear here..."></textarea>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <h2 class="text-3xl font-black text-gray-900 mb-6">🔄 About CSV to JSON Converter</h2>
            <div class="prose prose-lg max-w-none">
                <p class="text-gray-700 leading-relaxed mb-4">
                    Transform CSV (Comma-Separated Values) data into JSON format instantly with our free online CSV to JSON
                    converter. Perfect for developers, data analysts, and anyone working with data transformation between
                    different formats.
                </p>

                <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">✨ Key Features</h3>
                <ul class="space-y-2 text-gray-700">
                    <li>✅ <strong>Multiple Delimiters:</strong> Support for comma, semicolon, tab, and pipe delimiters</li>
                    <li>✅ <strong>Header Detection:</strong> Automatically use first row as object keys</li>
                    <li>✅ <strong>Formatted Output:</strong> Pretty-printed JSON for readability</li>
                    <li>✅ <strong>Instant Conversion:</strong> Real-time CSV to JSON transformation</li>
                    <li>✅ <strong>Download Option:</strong> Save converted JSON as a file</li>
                    <li>✅ <strong>Privacy Focused:</strong> All processing happens in your browser</li>
                </ul>

                <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">🎯 Common Use Cases</h3>
                <div class="grid md:grid-cols-2 gap-4 mb-6">
                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-5 border-2 border-green-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">📊 Data Migration</h4>
                        <p class="text-gray-700 text-sm">Convert CSV exports from Excel or Google Sheets to JSON for use in
                            web applications.</p>
                    </div>
                    <div class="bg-gradient-to-br from-teal-50 to-cyan-50 rounded-xl p-5 border-2 border-teal-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">🔌 API Integration</h4>
                        <p class="text-gray-700 text-sm">Transform CSV data into JSON format for REST API consumption and
                            integration.</p>
                    </div>
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-5 border-2 border-blue-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">💾 Database Import</h4>
                        <p class="text-gray-700 text-sm">Convert CSV database exports to JSON for NoSQL databases like
                            MongoDB.</p>
                    </div>
                    <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-5 border-2 border-purple-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">📈 Data Analysis</h4>
                        <p class="text-gray-700 text-sm">Transform CSV datasets to JSON for JavaScript-based data
                            visualization libraries.</p>
                    </div>
                </div>

                <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">❓ Frequently Asked Questions</h3>
                <div class="space-y-4">
                    <div class="bg-gray-50 rounded-lg p-5">
                        <h4 class="font-bold text-gray-900 mb-2">What delimiters are supported?</h4>
                        <p class="text-gray-700 text-sm">We support comma (,), semicolon (;), tab (\t), and pipe (|)
                            delimiters. You can select your delimiter from the dropdown menu.</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-5">
                        <h4 class="font-bold text-gray-900 mb-2">How do headers work?</h4>
                        <p class="text-gray-700 text-sm">If "First row is header" is checked, the first row of your CSV
                            will be used as JSON object keys. Otherwise, numeric indices will be used.</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-5">
                        <h4 class="font-bold text-gray-900 mb-2">Is there a file size limit?</h4>
                        <p class="text-gray-700 text-sm">No, but very large CSV files may take longer to process depending
                            on your browser's performance.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function convertCsvToJson() {
            const csv = document.getElementById('csvInput').value;
            if (!csv.trim()) {
                showError('Please enter some CSV data to convert.');
                return;
            }

            try {
                const delimiter = document.getElementById('delimiter').value.replace('\\t', '\t');
                const hasHeaders = document.getElementById('hasHeaders').checked;

                const lines = csv.trim().split('\n');
                const headers = hasHeaders ? lines[0].split(delimiter).map(h => h.trim()) : null;
                const dataLines = hasHeaders ? lines.slice(1) : lines;

                const result = dataLines.map((line, index) => {
                    const values = line.split(delimiter).map(v => v.trim());
                    if (hasHeaders) {
                        const obj = {};
                        headers.forEach((header, i) => {
                            obj[header] = values[i] || '';
                        });
                        return obj;
                    } else {
                        return values;
                    }
                });

                document.getElementById('jsonOutput').value = JSON.stringify(result, null, 2);
            } catch (error) {
                showError('Error converting CSV: ' + error.message);
            }
        }

        function copyJson() {
            const output = document.getElementById('jsonOutput');
            if (!output.value.trim()) {
                showError('No JSON to copy. Please convert CSV first.');
                return;
            }

            output.select();
            document.execCommand('copy');
            showSuccess('JSON copied to clipboard!');
        }

        function downloadJson() {
            const json = document.getElementById('jsonOutput').value;
            if (!json.trim()) {
                showError('No JSON to download. Please convert CSV first.');
                return;
            }

            const blob = new Blob([json], {
                type: 'application/json'
            });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'converted.json';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        }

        function clearAll() {
            document.getElementById('csvInput').value = '';
            document.getElementById('jsonOutput').value = '';
        }

        function loadExample() {
            const example = `name,email,age,city
            John Doe,john@example.com,30,New York
            Jane Smith,jane@example.com,25,Los Angeles
            Bob Johnson,bob@example.com,35,Chicago`;

            document.getElementById('csvInput').value = example;
            convertCsvToJson();
        }

        // Auto-convert on input (debounced)
        let debounceTimer;
        document.getElementById('csvInput').addEventListener('input', function () {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                if (this.value.trim()) {
                    convertCsvToJson();
                }
            }, 500);
        });

        document.getElementById('delimiter').addEventListener('change', () => {
            if (document.getElementById('csvInput').value.trim()) {
                convertCsvToJson();
            }
        });

        document.getElementById('hasHeaders').addEventListener('change', () => {
            if (document.getElementById('csvInput').value.trim()) {
                convertCsvToJson();
            }
        });
    </script>
@endsection