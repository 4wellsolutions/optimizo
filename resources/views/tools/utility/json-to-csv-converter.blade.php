@extends('layouts.app')

@section('title', __tool('json-to-csv-converter', 'meta.h1'))
@section('meta_description', __tool('json-to-csv-converter', 'meta.subtitle'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <x-tool-hero :tool="$tool" icon="json-to-csv" :title="__tool('json-to-csv-converter', 'meta.h1')"
            :subtitle="__tool('json-to-csv-converter', 'meta.subtitle')" />

        <!-- Converter Tool -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <!-- Options -->
            <div class="mb-6">
                <label
                    class="block text-sm font-bold text-gray-900 mb-2">{{ __tool('json-to-csv-converter', 'editor.label_delimiter') }}</label>
                <select id="delimiter"
                    class="px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
                    <option value=",">{{ __tool('json-to-csv-converter', 'editor.opt_comma') }}</option>
                    <option value=";">{{ __tool('json-to-csv-converter', 'editor.opt_semicolon') }}</option>
                    <option value="\t">{{ __tool('json-to-csv-converter', 'editor.opt_tab') }}</option>
                    <option value="|">{{ __tool('json-to-csv-converter', 'editor.opt_pipe') }}</option>
                </select>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convertJsonToCsv()"
                    class="px-6 py-2.5 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg font-semibold hover:shadow-lg transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    {{ __tool('json-to-csv-converter', 'editor.btn_convert') }}
                </button>
                <button onclick="copyCsv()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    {{ __tool('json-to-csv-converter', 'editor.btn_copy') }}
                </button>
                <button onclick="downloadCsv()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    {{ __tool('json-to-csv-converter', 'editor.btn_download') }}
                </button>
                <button onclick="loadExample()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    {{ __tool('json-to-csv-converter', 'editor.btn_example') }}
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    {{ __tool('json-to-csv-converter', 'editor.btn_clear') }}
                </button>
            </div>

            <!-- Input/Output Grid -->
            <div class="grid md:grid-cols-2 gap-6">
                <!-- JSON Input -->
                <div>
                    <label
                        class="block text-sm font-bold text-gray-900 mb-2">{{ __tool('json-to-csv-converter', 'editor.label_input') }}</label>
                    <textarea id="jsonInput"
                        class="w-full h-96 p-4 border-2 border-gray-200 rounded-lg font-mono text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all"
                        placeholder="{{ __tool('json-to-csv-converter', 'editor.ph_input') }}"></textarea>
                </div>

                <!-- CSV Output -->
                <div>
                    <label
                        class="block text-sm font-bold text-gray-900 mb-2">{{ __tool('json-to-csv-converter', 'editor.label_output') }}</label>
                    <textarea id="csvOutput" readonly
                        class="w-full h-96 p-4 border-2 border-gray-200 rounded-lg font-mono text-sm bg-gray-50 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all"
                        placeholder="{{ __tool('json-to-csv-converter', 'editor.ph_output') }}"></textarea>
                </div>
            </div>
            <div id="statusMessage" class="hidden mt-4 p-4 rounded-xl font-semibold"></div>
        </div>

        <!-- SEO Content -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <h2 class="text-3xl font-black text-gray-900 mb-6">{{ __tool('json-to-csv-converter', 'content.hero_title') }}</h2>
            <div class="prose prose-lg max-w-none">
                <p class="text-gray-700 leading-relaxed mb-4">
                    {{ __tool('json-to-csv-converter', 'content.p1') }}
                </p>

                <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">{{ __tool('json-to-csv-converter', 'content.features_title') }}
                </h3>
                <ul class="space-y-2 text-gray-700">
                    @foreach(__tool('json-to-csv-converter', 'content.features_list') as $feature)
                        <li>{!! $feature !!}</li>
                    @endforeach
                </ul>

                <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">{{ __tool('json-to-csv-converter', 'content.uses_title') }}
                </h3>
                <div class="grid md:grid-cols-2 gap-4 mb-6">
                    <!-- API -->
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-5 border-2 border-blue-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">
                            {{ __tool('json-to-csv-converter', 'content.uses.api.title') }}</h4>
                        <p class="text-gray-700 text-sm">{{ __tool('json-to-csv-converter', 'content.uses.api.desc') }}</p>
                    </div>
                    <!-- Database -->
                    <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-5 border-2 border-purple-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">
                            {{ __tool('json-to-csv-converter', 'content.uses.db.title') }}</h4>
                        <p class="text-gray-700 text-sm">{{ __tool('json-to-csv-converter', 'content.uses.db.desc') }}</p>
                    </div>
                    <!-- Analysis -->
                    <div class="bg-gradient-to-br from-cyan-50 to-blue-50 rounded-xl p-5 border-2 border-cyan-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">
                            {{ __tool('json-to-csv-converter', 'content.uses.analysis.title') }}</h4>
                        <p class="text-gray-700 text-sm">{{ __tool('json-to-csv-converter', 'content.uses.analysis.desc') }}</p>
                    </div>
                    <!-- Reporting -->
                    <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl p-5 border-2 border-indigo-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">
                            {{ __tool('json-to-csv-converter', 'content.uses.report.title') }}</h4>
                        <p class="text-gray-700 text-sm">{{ __tool('json-to-csv-converter', 'content.uses.report.desc') }}</p>
                    </div>
                </div>

                <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">{{ __tool('json-to-csv-converter', 'content.faq_title') }}</h3>
                <div class="space-y-4">
                    @foreach(__tool('json-to-csv-converter', 'content.faq') as $key => $value)
                        @if(str_starts_with($key, 'q'))
                            <div class="bg-gray-50 rounded-lg p-5">
                                <h4 class="font-bold text-gray-900 mb-2">{{ $value }}</h4>
                                <p class="text-gray-700 text-sm">
                                    {{ __tool('json-to-csv-converter', 'content.faq.a' . substr($key, 1)) }}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function convertJsonToCsv() {
                const json = document.getElementById('jsonInput').value;
                if (!json.trim()) {
                    showError("{{ __tool('json-to-csv-converter', 'js.error_empty') }}");
                    return;
                }

                try {
                    const data = JSON.parse(json);
                    const delimiter = document.getElementById('delimiter').value.replace('\\t', '\t');

                    let array = Array.isArray(data) ? data : [data];

                    // Flatten nested objects
                    function flatten(obj, prefix = '') {
                        const flattened = {};
                        for (const key in obj) {
                            const value = obj[key];
                            const newKey = prefix ? `${prefix}.${key}` : key;

                            if (typeof value === 'object' && value !== null && !Array.isArray(value)) {
                                Object.assign(flattened, flatten(value, newKey));
                            } else {
                                flattened[newKey] = value;
                            }
                        }
                        return flattened;
                    }

                    // Flatten all objects
                    array = array.map(item => flatten(item));

                    // Get all unique keys
                    const keys = [...new Set(array.flatMap(obj => Object.keys(obj)))];

                    // Create CSV header
                    let csv = keys.join(delimiter) + '\n';

                    // Create CSV rows
                    array.forEach(obj => {
                        const row = keys.map(key => {
                            const value = obj[key] !== undefined ? obj[key] : '';
                            // Escape values containing delimiter or quotes
                            if (typeof value === 'string' && (value.includes(delimiter) || value.includes('"') || value
                                .includes('\n'))) {
                                return `"${value.replace(/"/g, '""')}"`;
                            }
                            return value;
                        });
                        csv += row.join(delimiter) + '\n';
                    });

                    document.getElementById('csvOutput').value = csv;
                    showSuccess('JSON converted to CSV!'); // Added success message
                } catch (error) {
                    showError("{{ __tool('json-to-csv-converter', 'js.error_convert') }}" + error.message);
                }
            }

            function copyCsv() {
                const output = document.getElementById('csvOutput');
                if (!output.value.trim()) {
                    showError("{{ __tool('json-to-csv-converter', 'js.error_no_copy') }}");
                    return;
                }

                output.select();
                document.execCommand('copy');
                showSuccess("{{ __tool('json-to-csv-converter', 'js.success_copy') }}");
            }

            function downloadCsv() {
                const csv = document.getElementById('csvOutput').value;
                if (!csv.trim()) {
                    showError("{{ __tool('json-to-csv-converter', 'js.error_no_download') }}");
                    return;
                }

                const blob = new Blob([csv], {
                    type: 'text/csv'
                });
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = 'converted.csv';
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                URL.revokeObjectURL(url);
            }

            function clearAll() {
                document.getElementById('jsonInput').value = '';
                document.getElementById('csvOutput').value = '';
                document.getElementById('statusMessage').innerHTML = '';
                document.getElementById('statusMessage').className = 'hidden';
            }

            function loadExample() {
                const example = `[
                      {
                        "name": "John Doe",
                        "email": "john@example.com",
                        "age": 30,
                        "address": {
                          "city": "New York",
                          "country": "USA"
                        }
                      },
                      {
                        "name": "Jane Smith",
                        "email": "jane@example.com",
                        "age": 25,
                        "address": {
                          "city": "Los Angeles",
                          "country": "USA"
                        }
                      }
                    ]`;

                document.getElementById('jsonInput').value = example;
                convertJsonToCsv();
            }

            // Auto-convert on input (debounced)
            let debounceTimer;
            document.getElementById('jsonInput').addEventListener('input', function () {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(() => {
                    if (this.value.trim()) {
                        convertJsonToCsv();
                    }
                }, 500);
            });

            document.getElementById('delimiter').addEventListener('change', () => {
                if (document.getElementById('jsonInput').value.trim()) {
                    convertJsonToCsv();
                }
            });

            function showError(message) {
                const status = document.getElementById('statusMessage');
                status.innerHTML = message;
                status.className = 'block mt-4 p-4 rounded-xl font-semibold bg-red-100 text-red-800 border-2 border-red-300';
                setTimeout(() => status.className = 'hidden', 3000);
            }

            function showSuccess(message) {
                const status = document.getElementById('statusMessage');
                status.innerHTML = message;
                status.className = 'block mt-4 p-4 rounded-xl font-semibold bg-green-100 text-green-800 border-2 border-green-300';
                setTimeout(() => status.className = 'hidden', 3000);
            }
        </script>
    @endpush
@endsection