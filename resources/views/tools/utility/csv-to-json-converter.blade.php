@extends('layouts.app')

@section('title', __tool('csv-to-json-converter', 'meta.h1'))
@section('meta_description', __tool('csv-to-json-converter', 'meta.subtitle'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <x-tool-hero :tool="$tool" icon="csv-to-json" />

        <!-- Converter Tool -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <!-- Options -->
            <div class="mb-6">
                <label
                    class="block text-sm font-bold text-gray-900 mb-2">{!! __tool('csv-to-json-converter', 'editor.label_delimiter') !!}</label>
                <select id="delimiter"
                    class="px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200">
                    <option value=",">{!! __tool('csv-to-json-converter', 'editor.delimiters.comma') !!}</option>
                    <option value=";">{!! __tool('csv-to-json-converter', 'editor.delimiters.semicolon') !!}</option>
                    <option value="\t">{!! __tool('csv-to-json-converter', 'editor.delimiters.tab') !!}</option>
                    <option value="|">{!! __tool('csv-to-json-converter', 'editor.delimiters.pipe') !!}</option>
                </select>
                <label class="inline-flex items-center ml-4">
                    <input type="checkbox" id="hasHeaders" checked
                        class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                    <span class="ml-2 text-sm text-gray-700">{!! __tool('csv-to-json-converter', 'editor.header_checkbox') !!}</span>
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
                    {!! __tool('csv-to-json-converter', 'editor.btn_convert') !!}
                </button>
                <button onclick="copyJson()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    {!! __tool('csv-to-json-converter', 'editor.btn_copy') !!}
                </button>
                <button onclick="downloadJson()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    {!! __tool('csv-to-json-converter', 'editor.btn_download') !!}
                </button>
                <button onclick="loadExample()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    {!! __tool('csv-to-json-converter', 'editor.btn_example') !!}
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    {!! __tool('csv-to-json-converter', 'editor.btn_clear') !!}
                </button>
            </div>

            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>

            <!-- Input/Output Grid -->
            <div class="grid md:grid-cols-2 gap-6">
                <!-- CSV Input -->
                <div>
                    <label
                        class="block text-sm font-bold text-gray-900 mb-2">{!! __tool('csv-to-json-converter', 'editor.label_input') !!}</label>
                    <textarea id="csvInput"
                        class="w-full h-96 p-4 border-2 border-gray-200 rounded-lg font-mono text-sm focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all"
                        placeholder="{!! __tool('csv-to-json-converter', 'editor.ph_input') !!}"></textarea>
                </div>

                <!-- JSON Output -->
                <div>
                    <label
                        class="block text-sm font-bold text-gray-900 mb-2">{!! __tool('csv-to-json-converter', 'editor.label_output') !!}</label>
                    <textarea id="jsonOutput" readonly
                        class="w-full h-96 p-4 border-2 border-gray-200 rounded-lg font-mono text-sm bg-gray-50 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all"
                        placeholder="{!! __tool('csv-to-json-converter', 'editor.ph_output') !!}"></textarea>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <h2 class="text-3xl font-black text-gray-900 mb-6">{!! __tool('csv-to-json-converter', 'content.about_title') !!}</h2>
            <div class="prose prose-lg max-w-none">
                <p class="text-gray-700 leading-relaxed mb-4">
                    {!! __tool('csv-to-json-converter', 'content.about_p1') !!}
                </p>

                <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">
                    {!! __tool('csv-to-json-converter', 'content.features_title') !!}</h3>
                <ul class="space-y-2 text-gray-700">
                    <li>{!! __tool('csv-to-json-converter', 'content.features_list.1') !!}</li>
                    <li>{!! __tool('csv-to-json-converter', 'content.features_list.2') !!}</li>
                    <li>{!! __tool('csv-to-json-converter', 'content.features_list.3') !!}</li>
                    <li>{!! __tool('csv-to-json-converter', 'content.features_list.4') !!}</li>
                    <li>{!! __tool('csv-to-json-converter', 'content.features_list.5') !!}</li>
                    <li>{!! __tool('csv-to-json-converter', 'content.features_list.6') !!}</li>
                </ul>

                <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">{!! __tool('csv-to-json-converter', 'content.uses_title') !!}
                </h3>
                <div class="grid md:grid-cols-2 gap-4 mb-6">
                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-5 border-2 border-green-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">
                            {!! __tool('csv-to-json-converter', 'content.uses.migration.title') !!}</h4>
                        <p class="text-gray-700 text-sm">{!! __tool('csv-to-json-converter', 'content.uses.migration.desc') !!}</p>
                    </div>
                    <div class="bg-gradient-to-br from-teal-50 to-cyan-50 rounded-xl p-5 border-2 border-teal-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">
                            {!! __tool('csv-to-json-converter', 'content.uses.api.title') !!}</h4>
                        <p class="text-gray-700 text-sm">{!! __tool('csv-to-json-converter', 'content.uses.api.desc') !!}</p>
                    </div>
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-5 border-2 border-blue-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">
                            {!! __tool('csv-to-json-converter', 'content.uses.db.title') !!}</h4>
                        <p class="text-gray-700 text-sm">{!! __tool('csv-to-json-converter', 'content.uses.db.desc') !!}</p>
                    </div>
                    <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-5 border-2 border-purple-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">
                            {!! __tool('csv-to-json-converter', 'content.uses.analysis.title') !!}</h4>
                        <p class="text-gray-700 text-sm">{!! __tool('csv-to-json-converter', 'content.uses.analysis.desc') !!}</p>
                    </div>
                </div>

                <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">{!! __tool('csv-to-json-converter', 'content.faq_title') !!}
                </h3>
                <div class="space-y-4">
                    <div class="bg-gray-50 rounded-lg p-5">
                        <h4 class="font-bold text-gray-900 mb-2">{!! __tool('csv-to-json-converter', 'content.faq.q1') !!}</h4>
                        <p class="text-gray-700 text-sm">{!! __tool('csv-to-json-converter', 'content.faq.a1') !!}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-5">
                        <h4 class="font-bold text-gray-900 mb-2">{!! __tool('csv-to-json-converter', 'content.faq.q2') !!}</h4>
                        <p class="text-gray-700 text-sm">{!! __tool('csv-to-json-converter', 'content.faq.a2') !!}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-5">
                        <h4 class="font-bold text-gray-900 mb-2">{!! __tool('csv-to-json-converter', 'content.faq.q3') !!}</h4>
                        <p class="text-gray-700 text-sm">{!! __tool('csv-to-json-converter', 'content.faq.a3') !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function convertCsvToJson() {
                const csv = document.getElementById('csvInput').value;
                if (!csv.trim()) {
                    showStatus("{!! __tool('csv-to-json-converter', 'js.error_empty') !!}", 'error');
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
                    showStatus("{!! __tool('csv-to-json-converter', 'js.error_convert') !!}" + error.message, 'error');
                }
            }

            function copyJson() {
                const output = document.getElementById('jsonOutput');
                if (!output.value.trim()) {
                    showStatus("{!! __tool('csv-to-json-converter', 'js.error_no_copy') !!}", 'error');
                    return;
                }

                output.select();
                document.execCommand('copy');
                showStatus("{!! __tool('csv-to-json-converter', 'js.success_copy') !!}", 'success');
            }

            function downloadJson() {
                const json = document.getElementById('jsonOutput').value;
                if (!json.trim()) {
                    showStatus("{!! __tool('csv-to-json-converter', 'js.error_no_download') !!}", 'error');
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
                document.getElementById('statusMessage').classList.add('hidden');
            }

            function loadExample() {
                const example = `name,email,age,city
                    John Doe,john@example.com,30,New York
                    Jane Smith,jane@example.com,25,Los Angeles
                    Bob Johnson,bob@example.com,35,Chicago`;

                document.getElementById('csvInput').value = example.replace(/^\s+/gm, '').trim();
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

            function showStatus(message, type) {
                const statusMessage = document.getElementById('statusMessage');
                statusMessage.textContent = message;
                statusMessage.classList.remove('hidden', 'bg-green-100', 'text-green-800', 'bg-red-100', 'text-red-800', 'border-green-300', 'border-red-300');

                if (type === 'success') {
                    statusMessage.classList.add('bg-green-100', 'text-green-800', 'border-2', 'border-green-300');
                } else {
                    statusMessage.classList.add('bg-red-100', 'text-red-800', 'border-2', 'border-red-300');
                }

                setTimeout(() => {
                    statusMessage.classList.add('hidden');
                }, 3000);
            }
        </script>
    @endpush
@endsection