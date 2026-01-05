@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

<!-- js-yaml Library for YAML Parsing -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-yaml/4.1.0/js-yaml.min.js"></script>

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Hero Section -->
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" icon="json-yaml-converter" />

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
                    JSON to YAML
                </button>
                <button onclick="setMode('decode')" id="decodeBtn"
                    class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    </svg>
                    YAML to JSON
                </button>
            </div>

            <!-- Input/Output Grid -->
            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <!-- Input Column -->
                <div>
                    <label for="numberInput" class="form-label text-base" id="inputLabel">Enter JSON Data</label>
                    <textarea id="numberInput" class="form-input font-mono text-sm min-h-[300px]"
                        placeholder='{"name": "John", "age": 30}'></textarea>
                </div>

                <!-- Output Column -->
                <div>
                    <label for="numberOutput" class="form-label text-base" id="outputLabel">YAML Result</label>
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
                    <span id="processBtn">Convert to YAML</span>
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
                <h2 class="text-4xl font-black text-gray-900 mb-3">Free JSON ↔ YAML Converter</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Effortlessly convert between JSON and YAML formats</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Transform data between JSON and YAML with our free bidirectional converter. Ideal for configuration
                management, DevOps workflows, and data serialization tasks. All processing happens securely in your browser
                with zero server uploads.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📝 JSON vs YAML Explained</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                JSON uses brackets and braces with a compact syntax, while YAML relies on indentation and whitespace for a
                more human-readable format. YAML is popular in configuration files (Docker, Kubernetes, CI/CD), whereas JSON
                dominates web APIs and JavaScript ecosystems.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ Powerful Features</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">Instant Transformation</h4>
                    <p class="text-gray-600 text-sm">Convert between formats in real-time</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔄</div>
                    <h4 class="font-bold text-gray-900 mb-2">Bidirectional Support</h4>
                    <p class="text-gray-600 text-sm">JSON to YAML and YAML to JSON</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔐</div>
                    <h4 class="font-bold text-gray-900 mb-2">Secure Processing</h4>
                    <p class="text-gray-600 text-sm">No data sent to servers</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📊</div>
                    <h4 class="font-bold text-gray-900 mb-2">Syntax Validation</h4>
                    <p class="text-gray-600 text-sm">Detects and reports format errors</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎨</div>
                    <h4 class="font-bold text-gray-900 mb-2">Pretty Formatting</h4>
                    <p class="text-gray-600 text-sm">Clean, readable output with proper indentation</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">💯</div>
                    <h4 class="font-bold text-gray-900 mb-2">Always Free</h4>
                    <p class="text-gray-600 text-sm">No limits or registration</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Common Usage Scenarios</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">⚙️ Configuration Management</h4>
                    <p class="text-gray-700 leading-relaxed">Convert application configs between YAML (Docker Compose,
                        Kubernetes) and JSON formats</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🚀 DevOps Pipelines</h4>
                    <p class="text-gray-700 leading-relaxed">Transform CI/CD pipeline definitions between YAML and JSON for
                        different platforms</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📦 Package Management</h4>
                    <p class="text-gray-700 leading-relaxed">Convert package.json to YAML or vice versa for different build
                        tools</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔧 Infrastructure as Code</h4>
                    <p class="text-gray-700 leading-relaxed">Adapt CloudFormation, Terraform, or Ansible configurations
                        between formats</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📝 Documentation</h4>
                    <p class="text-gray-700 leading-relaxed">Generate human-friendly YAML docs from JSON API responses</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🧪 Testing & Validation</h4>
                    <p class="text-gray-700 leading-relaxed">Verify data consistency across different serialization formats
                    </p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📚 How It Works</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">1.</span>
                        <span><strong>Pick Format:</strong> Select JSON to YAML or YAML to JSON conversion</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">2.</span>
                        <span><strong>Input Data:</strong> Paste your JSON or YAML content into the input field</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">3.</span>
                        <span><strong>Transform:</strong> Hit the convert button to process your data</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">4.</span>
                        <span><strong>Verify Result:</strong> Check the formatted output for accuracy</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">5.</span>
                        <span><strong>Export:</strong> Copy the converted data to your clipboard</span>
                    </li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 Example Conversions</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <div class="space-y-4">
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Basic Object:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">JSON: {"port": 8080} → YAML: port:
                            8080</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Nested Configuration:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">JSON: {"server": {"host":
                            "localhost"}} → YAML with indented structure</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Array Conversion:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">JSON arrays become YAML lists with
                            dash notation</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Reverse Process:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">YAML: name: App → JSON: {"name":
                            "App"}</p>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Which format is better for configuration files?</h4>
                    <p class="text-gray-700 leading-relaxed">YAML is generally preferred for human-edited config files due
                        to its readability and minimal syntax. JSON works better for machine-generated configs and when
                        strict parsing is required.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Does the converter handle comments?</h4>
                    <p class="text-gray-700 leading-relaxed">YAML supports comments (# symbol), but JSON does not. When
                        converting YAML with comments to JSON, comments are stripped. Converting back won't restore them.
                    </p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Are multiline strings supported?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! YAML multiline strings (using | or >) are converted to
                        JSON strings with escaped newlines, preserving the content.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What about data types?</h4>
                    <p class="text-gray-700 leading-relaxed">The converter preserves strings, numbers, booleans, arrays, and
                        objects. YAML's implicit typing is maintained during conversion.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is my configuration data private?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! All conversions are performed locally in your browser
                        using the js-yaml library. Your sensitive config data never leaves your device.</p>
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
                inputLabel.textContent = 'Enter JSON Data';
                outputLabel.textContent = 'YAML Result';
                processBtn.textContent = 'Convert to YAML';
            } else {
                decodeBtn.classList.remove('bg-gray-200', 'text-gray-700');
                decodeBtn.classList.add('bg-blue-600', 'text-white');
                encodeBtn.classList.remove('bg-blue-600', 'text-white');
                encodeBtn.classList.add('bg-gray-200', 'text-gray-700');
                inputLabel.textContent = 'Enter YAML Data';
                outputLabel.textContent = 'JSON Result';
                processBtn.textContent = 'Convert to JSON';
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
                    // JSON to YAML
                    const jsonData = JSON.parse(input);
                    const yamlString = jsyaml.dump(jsonData, {
                        indent: 2,
                        lineWidth: -1
                    });
                    output.value = yamlString;
                    showStatus('✓ Converted to YAML successfully', 'success');
                } else {
                    // YAML to JSON
                    const jsonData = jsyaml.load(input);
                    output.value = JSON.stringify(jsonData, null, 2);
                    showStatus('✓ Converted to JSON successfully', 'success');
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