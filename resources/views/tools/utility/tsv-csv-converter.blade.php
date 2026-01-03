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
        <div
            class="relative overflow-hidden bg-gradient-to-br from-blue-500 via-indigo-500 to-purple-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">
                    TSV ↔ CSV Converter
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                    Convert TSV to CSV and CSV to TSV - 100% free, instant, and accurate!
                </p>

                @include('components.hero-actions')
            </div>
        </div>

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
                    TSV to CSV
                </button>
                <button onclick="setMode('decode')" id="decodeBtn"
                    class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    </svg>
                    CSV to TSV
                </button>
            </div>

            <!-- Input/Output Grid -->
            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <!-- Input Column -->
                <div>
                    <label for="numberInput" class="form-label text-base" id="inputLabel">Enter TSV Data</label>
                    <textarea id="numberInput" class="form-input font-mono text-sm min-h-[300px]"
                        placeholder="Name\tAge\tCity\nJohn\t30\tNew York"></textarea>
                </div>

                <!-- Output Column -->
                <div>
                    <label for="numberOutput" class="form-label text-base" id="outputLabel">CSV Result</label>
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
                    <span id="processBtn">Convert to CSV</span>
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
                <h2 class="text-4xl font-black text-gray-900 mb-3">Free TSV ↔ CSV Converter</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Switch between tab and comma delimiters effortlessly</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Convert Tab-Separated Values (TSV) to Comma-Separated Values (CSV) and back with ease. Perfect for data
                portability between different spreadsheet applications and database tools. Fully client-side processing
                ensures your data remains private.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📋 TSV vs CSV Formats</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                TSV uses tab characters to separate values, making it ideal for data containing commas. CSV uses commas as
                delimiters and is the most widely supported format. Both are plain text formats for tabular data, but each
                has specific use cases where it excels.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ Converter Benefits</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">Fast Processing</h4>
                    <p class="text-gray-600 text-sm">Convert large files quickly</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔄</div>
                    <h4 class="font-bold text-gray-900 mb-2">Reversible</h4>
                    <p class="text-gray-600 text-sm">TSV to CSV and CSV to TSV</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">Local Processing</h4>
                    <p class="text-gray-600 text-sm">Data stays on your device</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">✅</div>
                    <h4 class="font-bold text-gray-900 mb-2">Smart Parsing</h4>
                    <p class="text-gray-600 text-sm">Handles edge cases correctly</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📊</div>
                    <h4 class="font-bold text-gray-900 mb-2">Format Preservation</h4>
                    <p class="text-gray-600 text-sm">Maintains data integrity</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎁</div>
                    <h4 class="font-bold text-gray-900 mb-2">No Cost</h4>
                    <p class="text-gray-600 text-sm">Unlimited free conversions</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Real-World Uses</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📊 Spreadsheet Compatibility</h4>
                    <p class="text-gray-700 leading-relaxed">Convert between Excel (CSV) and Google Sheets (TSV) export
                        formats</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🗄️ Database Imports</h4>
                    <p class="text-gray-700 leading-relaxed">Prepare data in the correct delimiter format for database bulk
                        imports</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📁 Data Cleaning</h4>
                    <p class="text-gray-700 leading-relaxed">Switch delimiters to avoid conflicts with data containing
                        commas or tabs</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔬 Scientific Data</h4>
                    <p class="text-gray-700 leading-relaxed">Convert research data between TSV (common in bioinformatics)
                        and CSV</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📈 Analytics Tools</h4>
                    <p class="text-gray-700 leading-relaxed">Adapt data format for different analytics and visualization
                        platforms</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔄 Format Standardization</h4>
                    <p class="text-gray-700 leading-relaxed">Normalize mixed-format datasets to a single delimiter standard
                    </p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📚 Conversion Steps</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">1.</span>
                        <span><strong>Pick Format:</strong> Choose TSV to CSV or CSV to TSV</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">2.</span>
                        <span><strong>Add Data:</strong> Paste your tab or comma-separated data</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">3.</span>
                        <span><strong>Execute:</strong> Click the convert button</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">4.</span>
                        <span><strong>Check Output:</strong> Verify the converted format</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">5.</span>
                        <span><strong>Save/Copy:</strong> Export the result for your needs</span>
                    </li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 Format Examples</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <div class="space-y-4">
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">TSV Format:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">Name[TAB]Age[TAB]City → Values
                            separated by tab characters</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">CSV Format:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">Name,Age,City → Values separated
                            by commas</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Delimiter Change:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">Tool automatically swaps tabs for
                            commas or vice versa</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Data Integrity:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">Quoted values and special
                            characters are preserved correctly</p>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">When should I use TSV instead of CSV?</h4>
                    <p class="text-gray-700 leading-relaxed">Use TSV when your data contains many commas (like addresses or
                        descriptions) to avoid delimiter conflicts. TSV is also preferred in scientific computing and
                        bioinformatics.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">How are tabs represented in the input?</h4>
                    <p class="text-gray-700 leading-relaxed">When pasting TSV data, actual tab characters from your source
                        will be preserved. The tool uses PapaParse to correctly identify and convert tab delimiters.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What if my data has both tabs and commas?</h4>
                    <p class="text-gray-700 leading-relaxed">The tool treats the selected delimiter as the field separator.
                        If converting TSV to CSV, tabs become field delimiters and commas within fields are preserved as
                        regular characters.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Are line breaks within fields supported?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! The converter properly handles multi-line field values
                        that are enclosed in quotes, maintaining data structure during conversion.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is my spreadsheet data safe?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! All conversions are performed locally in your browser
                        using the PapaParse library. Your spreadsheet data never leaves your device or gets uploaded
                        anywhere.</p>
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
                inputLabel.textContent = 'Enter TSV Data';
                outputLabel.textContent = 'CSV Result';
                processBtn.textContent = 'Convert to CSV';
            } else {
                decodeBtn.classList.remove('bg-gray-200', 'text-gray-700');
                decodeBtn.classList.add('bg-blue-600', 'text-white');
                encodeBtn.classList.remove('bg-blue-600', 'text-white');
                encodeBtn.classList.add('bg-gray-200', 'text-gray-700');
                inputLabel.textContent = 'Enter CSV Data';
                outputLabel.textContent = 'TSV Result';
                processBtn.textContent = 'Convert to TSV';
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
                    // TSV to CSV
                    const parsed = Papa.parse(input, {
                        delimiter: '\t',
                        skipEmptyLines: true
                    });

                    if (parsed.errors.length > 0) {
                        showStatus('Error parsing TSV: ' + parsed.errors[0].message, 'error');
                        return;
                    }

                    const csv = Papa.unparse(parsed.data);
                    output.value = csv;
                    showStatus('✓ Converted to CSV successfully', 'success');
                } else {
                    // CSV to TSV
                    const parsed = Papa.parse(input, {
                        skipEmptyLines: true
                    });

                    if (parsed.errors.length > 0) {
                        showStatus('Error parsing CSV: ' + parsed.errors[0].message, 'error');
                        return;
                    }

                    const tsv = Papa.unparse(parsed.data, {
                        delimiter: '\t'
                    });
                    output.value = tsv;
                    showStatus('✓ Converted to TSV successfully', 'success');
                }
            } catch (error) {
                showStatus('✗ Error: ' + error.message, 'error');
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