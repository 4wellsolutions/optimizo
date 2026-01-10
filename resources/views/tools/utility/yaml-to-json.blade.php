@extends('layouts.app')

@section('title', $tool->name . ' - ' . config('app.name'))
@section('meta_description', $tool->meta_description)

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <!-- Header -->
        <x-tool-hero :tool="$tool" icon="yaml-to-json-converter" />

        <!-- Converter Tool -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convertYamlToJson()"
                    class="px-6 py-2.5 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg font-semibold hover:shadow-lg transition-all">
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
                <!-- YAML Input -->
                <div>
                    <label class="block text-sm font-bold text-gray-900 mb-2">YAML Input</label>
                    <textarea id="yamlInput"
                        class="w-full h-96 p-4 border-2 border-gray-200 rounded-lg font-mono text-sm focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all"
                        placeholder="Paste your YAML data here..."></textarea>
                </div>

                <!-- JSON Output -->
                <div>
                    <label class="block text-sm font-bold text-gray-900 mb-2">JSON Output</label>
                    <textarea id="jsonOutput" readonly
                        class="w-full h-96 p-4 border-2 border-gray-200 rounded-lg font-mono text-sm bg-gray-50 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all"
                        placeholder="Converted JSON will appear here..."></textarea>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <h2 class="text-3xl font-black text-gray-900 mb-6">🔄 About YAML to JSON Converter</h2>
            <div class="prose prose-lg max-w-none">
                <p class="text-gray-700 leading-relaxed mb-4">
                    Convert YAML configuration files to JSON format instantly with our free online YAML to JSON converter.
                    Perfect for developers working with configuration files, CI/CD pipelines, and data transformation.
                </p>

                <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">✨ Key Features</h3>
                <ul class="space-y-2 text-gray-700">
                    <li>✅ <strong>Syntax Validation:</strong> Detects YAML syntax errors</li>
                    <li>✅ <strong>Nested Structure:</strong> Preserves complex hierarchies</li>
                    <li>✅ <strong>Array Support:</strong> Handles YAML lists and sequences</li>
                    <li>✅ <strong>Pretty Formatting:</strong> Clean, readable JSON output</li>
                    <li>✅ <strong>Instant Conversion:</strong> Real-time transformation</li>
                    <li>✅ <strong>Privacy First:</strong> All processing in browser</li>
                </ul>

                <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">🎯 Common Use Cases</h3>
                <div class="grid md:grid-cols-2 gap-4 mb-6">
                    <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-5 border-2 border-purple-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">⚙️ Config Files</h4>
                        <p class="text-gray-700 text-sm">Convert YAML configuration files to JSON for applications.</p>
                    </div>
                    <div class="bg-gradient-to-br from-pink-50 to-rose-50 rounded-xl p-5 border-2 border-pink-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">🔄 CI/CD Pipelines</h4>
                        <p class="text-gray-700 text-sm">Transform YAML pipeline configs to JSON format.</p>
                    </div>
                    <div class="bg-gradient-to-br from-rose-50 to-red-50 rounded-xl p-5 border-2 border-rose-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">☸️ Kubernetes</h4>
                        <p class="text-gray-700 text-sm">Convert Kubernetes YAML manifests to JSON.</p>
                    </div>
                    <div class="bg-gradient-to-br from-fuchsia-50 to-purple-50 rounded-xl p-5 border-2 border-fuchsia-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">📦 Docker Compose</h4>
                        <p class="text-gray-700 text-sm">Transform Docker Compose YAML to JSON.</p>
                    </div>
                </div>

                <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">📚 How to Use YAML to JSON Converter</h3>
                <ol
                    class="space-y-3 text-gray-700 list-decimal list-inside pl-4 bg-gray-50 p-6 rounded-xl border border-gray-200">
                    <li class="pl-2"><span class="font-semibold">Enter YAML:</span> Paste your YAML code into the input box
                        on the left.</li>
                    <li class="pl-2"><span class="font-semibold">Convert:</span> The tool automatically converts your code
                        as you type (or click "Convert").</li>
                    <li class="pl-2"><span class="font-semibold">Review:</span> Check the generated JSON output in the right
                        panel.</li>
                    <li class="pl-2"><span class="font-semibold">Copy/Download:</span> Use the buttons to copy the result or
                        download it as a .json file.</li>
                </ol>

                <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">❓ Frequently Asked Questions</h3>
                <div class="space-y-4">
                    <div class="border-l-4 border-purple-500 pl-4 py-2 bg-gray-50 rounded-r-lg">
                        <h4 class="font-bold text-gray-900">Is this tool free?</h4>
                        <p class="text-gray-700 text-sm mt-1">Yes, this YAML to JSON converter is 100% free to use with no
                            limits.</p>
                    </div>
                    <div class="border-l-4 border-purple-500 pl-4 py-2 bg-gray-50 rounded-r-lg">
                        <h4 class="font-bold text-gray-900">Does it support YAML comments?</h4>
                        <p class="text-gray-700 text-sm mt-1">The converter processes the data structure, but comments are
                            not preserved in JSON as JSON does not support comments.</p>
                    </div>
                    <div class="border-l-4 border-purple-500 pl-4 py-2 bg-gray-50 rounded-r-lg">
                        <h4 class="font-bold text-gray-900">Is my data secure?</h4>
                        <p class="text-gray-700 text-sm mt-1">Absolutely. The conversion happens entirely in your browser.
                            No data is sent to any server.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/js-yaml@4.1.0/dist/js-yaml.min.js"></script>
    <script>
        function convertYamlToJson() {
            const yaml = document.getElementById('yamlInput').value;
            if (!yaml.trim()) {
                showError('Please enter some YAML data to convert.');
                return;
            }

            try {
                const obj = jsyaml.load(yaml);
                const json = JSON.stringify(obj, null, 2);
                document.getElementById('jsonOutput').value = json;
            } catch (error) {
                showError('Error converting YAML: ' + error.message);
            }
        }

        function copyJson() {
            const output = document.getElementById('jsonOutput');
            if (!output.value.trim()) {
                showError('No JSON to copy. Please convert YAML first.');
                return;
            }

            output.select();
            document.execCommand('copy');
            showSuccess('JSON copied to clipboard!');
        }

        function downloadJson() {
            const json = document.getElementById('jsonOutput').value;
            if (!json.trim()) {
                showError('No JSON to download. Please convert YAML first.');
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
            document.getElementById('yamlInput').value = '';
            document.getElementById('jsonOutput').value = '';
        }

        function loadExample() {
            const example = `# Configuration Example
                name: My Application
                version: 1.0.0
                database:
                  host: localhost
                  port: 5432
                  credentials:
                    username: admin
                    password: secret
                features:
                  - authentication
                  - logging
                  - caching
                settings:
                  debug: true
                  timeout: 30`;

            document.getElementById('yamlInput').value = example;
            convertYamlToJson();
        }

        // Auto-convert on input (debounced)
        let debounceTimer;
        document.getElementById('yamlInput').addEventListener('input', function () {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                if (this.value.trim()) {
                    convertYamlToJson();
                }
            }, 500);
        });
    </script>
@endsection