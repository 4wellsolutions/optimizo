@extends('layouts.app')

@section('title', __tool('tsv-csv-converter', 'meta.h1'))
@section('meta_description', __tool('tsv-csv-converter', 'meta.subtitle'))


@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" icon="tsv-csv-converter" />

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
                    {{ __tool('tsv-csv-converter', 'editor.btn_tsv_to_csv', 'TSV to CSV') }}
                </button>
                <button onclick="setMode('decode')" id="decodeBtn"
                    class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    </svg>
                    {{ __tool('tsv-csv-converter', 'editor.btn_csv_to_tsv', 'CSV to TSV') }}
                </button>
            </div>

            <!-- Input/Output Grid -->
            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <!-- Input Column -->
                <div>
                    <label for="numberInput" class="form-label text-base" id="inputLabel">
                        {{ __tool('tsv-csv-converter', 'editor.label_input_tsv', 'Enter TSV Data') }}
                    </label>
                    <textarea id="numberInput" class="form-input font-mono text-sm min-h-[300px]"
                        placeholder="{{ __tool('tsv-csv-converter', 'editor.ph_input_tsv', "Name\tAge\tCity\nJohn\t30\tNew York") }}"></textarea>
                </div>

                <!-- Output Column -->
                <div>
                    <label for="numberOutput" class="form-label text-base" id="outputLabel">
                        {{ __tool('tsv-csv-converter', 'editor.label_output_csv', 'CSV Result') }}
                    </label>
                    <textarea id="numberOutput" class="form-input font-mono text-sm min-h-[300px]" readonly
                        placeholder="{{ __tool('tsv-csv-converter', 'editor.ph_output', 'Result will appear here...') }}"></textarea>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convertNumber()" class="btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span id="processBtn">{{ __tool('tsv-csv-converter', 'editor.btn_convert_csv', 'Convert to CSV') }}</span>
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>{{ __tool('tsv-csv-converter', 'editor.btn_clear', 'Clear') }}</span>
                </button>
                <button onclick="copyOutput()"
                    class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>{{ __tool('tsv-csv-converter', 'editor.btn_copy', 'Copy') }}</span>
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">{{ __tool('tsv-csv-converter', 'meta.h1', 'Free TSV ↔ CSV Converter') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __tool('tsv-csv-converter', 'meta.subtitle', 'Switch between tab and comma delimiters effortlessly') }}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {{ __tool('tsv-csv-converter', 'content.p1', 'Convert Tab-Separated Values (TSV) to Comma-Separated Values (CSV) and back with ease. Perfect for data portability between different spreadsheet applications and database tools. Fully client-side processing ensures your data remains private.') }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📋 {{ __tool('tsv-csv-converter', 'content.format_title', 'TSV vs CSV Formats') }}</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                {{ __tool('tsv-csv-converter', 'content.format_desc', 'TSV uses tab characters to separate values, making it ideal for data containing commas. CSV uses commas as delimiters and is the most widely supported format. Both are plain text formats for tabular data, but each has specific use cases where it excels.') }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ {{ __tool('tsv-csv-converter', 'content.benefits_title', 'Converter Benefits') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('tsv-csv-converter', 'content.benefits.fast.title', 'Fast Processing') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('tsv-csv-converter', 'content.benefits.fast.desc', 'Convert large files quickly') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔄</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('tsv-csv-converter', 'content.benefits.reversible.title', 'Reversible') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('tsv-csv-converter', 'content.benefits.reversible.desc', 'TSV to CSV and CSV to TSV') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('tsv-csv-converter', 'content.benefits.local.title', 'Local Processing') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('tsv-csv-converter', 'content.benefits.local.desc', 'Data stays on your device') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">✅</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('tsv-csv-converter', 'content.benefits.smart.title', 'Smart Parsing') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('tsv-csv-converter', 'content.benefits.smart.desc', 'Handles edge cases correctly') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📊</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('tsv-csv-converter', 'content.benefits.integrity.title', 'Format Preservation') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('tsv-csv-converter', 'content.benefits.integrity.desc', 'Maintains data integrity') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎁</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('tsv-csv-converter', 'content.benefits.free.title', 'No Cost') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('tsv-csv-converter', 'content.benefits.free.desc', 'Unlimited free conversions') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 {{ __tool('tsv-csv-converter', 'content.uses_title', 'Real-World Uses') }}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📊 {{ __tool('tsv-csv-converter', 'content.uses.spreadsheet.title', 'Spreadsheet Compatibility') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('tsv-csv-converter', 'content.uses.spreadsheet.desc', 'Convert between Excel (CSV) and Google Sheets (TSV) export formats') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🗄️ {{ __tool('tsv-csv-converter', 'content.uses.database.title', 'Database Imports') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('tsv-csv-converter', 'content.uses.database.desc', 'Prepare data in the correct delimiter format for database bulk imports') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📁 {{ __tool('tsv-csv-converter', 'content.uses.cleaning.title', 'Data Cleaning') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('tsv-csv-converter', 'content.uses.cleaning.desc', 'Switch delimiters to avoid conflicts with data containing commas or tabs') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔬 {{ __tool('tsv-csv-converter', 'content.uses.science.title', 'Scientific Data') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('tsv-csv-converter', 'content.uses.science.desc', 'Convert research data between TSV (common in bioinformatics) and CSV') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📈 {{ __tool('tsv-csv-converter', 'content.uses.analytics.title', 'Analytics Tools') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('tsv-csv-converter', 'content.uses.analytics.desc', 'Adapt data format for different analytics and visualization platforms') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔄 {{ __tool('tsv-csv-converter', 'content.uses.standard.title', 'Format Standardization') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('tsv-csv-converter', 'content.uses.standard.desc', 'Normalize mixed-format datasets to a single delimiter standard') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📚 {{ __tool('tsv-csv-converter', 'content.steps_title', 'Conversion Steps') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">1.</span>
                        <span><strong>{{ __tool('tsv-csv-converter', 'content.steps.1.title', 'Pick Format') }}:</strong> {{ __tool('tsv-csv-converter', 'content.steps.1.desc', 'Choose TSV to CSV or CSV to TSV') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">2.</span>
                        <span><strong>{{ __tool('tsv-csv-converter', 'content.steps.2.title', 'Add Data') }}:</strong> {{ __tool('tsv-csv-converter', 'content.steps.2.desc', 'Paste your tab or comma-separated data') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">3.</span>
                        <span><strong>{{ __tool('tsv-csv-converter', 'content.steps.3.title', 'Execute') }}:</strong> {{ __tool('tsv-csv-converter', 'content.steps.3.desc', 'Click the convert button') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">4.</span>
                        <span><strong>{{ __tool('tsv-csv-converter', 'content.steps.4.title', 'Check Output') }}:</strong> {{ __tool('tsv-csv-converter', 'content.steps.4.desc', 'Verify the converted format') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">5.</span>
                        <span><strong>{{ __tool('tsv-csv-converter', 'content.steps.5.title', 'Save/Copy') }}:</strong> {{ __tool('tsv-csv-converter', 'content.steps.5.desc', 'Export the result for your needs') }}</span>
                    </li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 {{ __tool('tsv-csv-converter', 'content.examples_title', 'Format Examples') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <div class="space-y-4">
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">{{ __tool('tsv-csv-converter', 'content.examples.tsv.title', 'TSV Format:') }}</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">{{ __tool('tsv-csv-converter', 'content.examples.tsv.desc', 'Values separated by tab characters') }}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">{{ __tool('tsv-csv-converter', 'content.examples.csv.title', 'CSV Format:') }}</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">{{ __tool('tsv-csv-converter', 'content.examples.csv.desc', 'Values separated by commas') }}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">{{ __tool('tsv-csv-converter', 'content.examples.change.title', 'Delimiter Change:') }}</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">{{ __tool('tsv-csv-converter', 'content.examples.change.desc', 'Tool automatically swaps tabs for commas or vice versa') }}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">{{ __tool('tsv-csv-converter', 'content.examples.integrity.title', 'Data Integrity:') }}</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">{{ __tool('tsv-csv-converter', 'content.examples.integrity.desc', 'Quoted values and special characters are preserved correctly') }}</p>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ {{ __tool('tsv-csv-converter', 'content.faq_title', 'Frequently Asked Questions') }}</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('tsv-csv-converter', 'content.faq.q1', 'When should I use TSV instead of CSV?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('tsv-csv-converter', 'content.faq.a1', 'Use TSV when your data contains many commas (like addresses or descriptions) to avoid delimiter conflicts. TSV is also preferred in scientific computing and bioinformatics.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('tsv-csv-converter', 'content.faq.q2', 'How are tabs represented in the input?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('tsv-csv-converter', 'content.faq.a2', 'When pasting TSV data, actual tab characters from your source will be preserved. The tool uses PapaParse to correctly identify and convert tab delimiters.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('tsv-csv-converter', 'content.faq.q3', 'What if my data has both tabs and commas?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('tsv-csv-converter', 'content.faq.a3', 'The tool treats the selected delimiter as the field separator. If converting TSV to CSV, tabs become field delimiters and commas within fields are preserved as regular characters.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('tsv-csv-converter', 'content.faq.q4', 'Are line breaks within fields supported?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('tsv-csv-converter', 'content.faq.a4', 'Yes! The converter properly handles multi-line field values that are enclosed in quotes, maintaining data structure during conversion.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('tsv-csv-converter', 'content.faq.q5', 'Is my spreadsheet data safe?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('tsv-csv-converter', 'content.faq.a5', 'Yes! All conversions are performed locally in your browser using the PapaParse library. Your spreadsheet data never leaves your device or gets uploaded anywhere.') }}</p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.4.1/papaparse.min.js"></script>
    <script>
        let currentMode = 'encode'; // Encode = TSV to CSV

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
                inputLabel.textContent = "{{ __tool('tsv-csv-converter', 'editor.label_input_tsv', 'Enter TSV Data') }}";
                outputLabel.textContent = "{{ __tool('tsv-csv-converter', 'editor.label_output_csv', 'CSV Result') }}";
                processBtn.textContent = "{{ __tool('tsv-csv-converter', 'editor.btn_convert_csv', 'Convert to CSV') }}";
            } else {
                decodeBtn.classList.remove('bg-gray-200', 'text-gray-700');
                decodeBtn.classList.add('bg-blue-600', 'text-white');
                encodeBtn.classList.remove('bg-blue-600', 'text-white');
                encodeBtn.classList.add('bg-gray-200', 'text-gray-700');
                inputLabel.textContent = "{{ __tool('tsv-csv-converter', 'editor.label_input_csv', 'Enter CSV Data') }}";
                outputLabel.textContent = "{{ __tool('tsv-csv-converter', 'editor.label_output_tsv', 'TSV Result') }}";
                processBtn.textContent = "{{ __tool('tsv-csv-converter', 'editor.btn_convert_tsv', 'Convert to TSV') }}";
            }
            clearAll();
        }

        function convertNumber() {
            const input = document.getElementById('numberInput').value.trim();
            const output = document.getElementById('numberOutput');

            if (!input) {
                showStatus("{{ __tool('tsv-csv-converter', 'js.error_empty', 'Please enter data to convert') }}", 'error');
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
                        showStatus("{{ __tool('tsv-csv-converter', 'js.error_parse_tsv', 'Error parsing TSV: ') }}" + parsed.errors[0].message, 'error');
                        return;
                    }

                    const csv = Papa.unparse(parsed.data);
                    output.value = csv;
                    showStatus("{{ __tool('tsv-csv-converter', 'js.success_csv', '✓ Converted to CSV successfully') }}", 'success');
                } else {
                    // CSV to TSV
                    const parsed = Papa.parse(input, {
                        skipEmptyLines: true
                    });

                    if (parsed.errors.length > 0) {
                        showStatus("{{ __tool('tsv-csv-converter', 'js.error_parse_csv', 'Error parsing CSV: ') }}" + parsed.errors[0].message, 'error');
                        return;
                    }

                    const tsv = Papa.unparse(parsed.data, {
                        delimiter: '\t'
                    });
                    output.value = tsv;
                    showStatus("{{ __tool('tsv-csv-converter', 'js.success_tsv', '✓ Converted to TSV successfully') }}", 'success');
                }
            } catch (error) {
                showStatus("{{ __tool('tsv-csv-converter', 'js.error_general', '✗ Error: ') }}" + error.message, 'error');
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
                showStatus("{{ __tool('tsv-csv-converter', 'js.error_no_copy', 'No output to copy') }}", 'error');
                return;
            }
            output.select();
            document.execCommand('copy');
            showStatus("{{ __tool('tsv-csv-converter', 'js.success_copy', '✓ Copied to clipboard') }}", 'success');
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