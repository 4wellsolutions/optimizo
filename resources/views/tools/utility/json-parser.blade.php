@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Hero Section -->
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" icon="json-parser" />

        <!-- Tool Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-purple-200 mb-8">
            <!-- JSON Input -->
            <div class="mb-6">
                <label for="jsonInput" class="form-label text-base">JSON Input</label>
                <textarea id="jsonInput" class="form-input font-mono text-sm min-h-[300px]"
                    placeholder='{"name": "John Doe", "age": 30, "email": "john@example.com", "isActive": true}'></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="parseJSON()" class="btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <span>Parse JSON</span>
                </button>
                <button onclick="beautifyJSON()" class="btn-secondary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                    </svg>
                    <span>Beautify</span>
                </button>
                <button onclick="minifyJSON()"
                    class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <span>Minify</span>
                </button>
                <button onclick="clearJSON()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>Clear</span>
                </button>
                <button onclick="loadSample()"
                    class="px-6 py-3 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                    <span>Load Sample</span>
                </button>
            </div>

            <!-- Status Message -->
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>

            <!-- Tree View -->
            <div id="treeView" class="hidden">
                <h3 class="text-xl font-bold text-gray-900 mb-4">JSON Tree View</h3>
                <div id="treeContent"
                    class="bg-gray-50 rounded-xl p-6 border-2 border-gray-200 font-mono text-sm overflow-auto max-h-96">
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div
            class="bg-gradient-to-br from-purple-50 to-indigo-50 rounded-3xl p-8 md:p-12 border-2 border-purple-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">Free JSON Parser & Validator</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Parse, validate, beautify, and minify JSON data instantly
                </p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Our free JSON Parser is a powerful online tool for developers, data analysts, and anyone working with JSON
                data. Instantly parse, validate, beautify, and minify JSON with a clean, intuitive interface. Perfect for
                debugging APIs, formatting configuration files, or validating JSON structure. 100% free, client-side
                processing ensures your data stays private and secure.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📋 What is JSON?</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                JSON (JavaScript Object Notation) is a lightweight data-interchange format that's easy for humans to read
                and write, and easy for machines to parse and generate. It's the most popular format for APIs, configuration
                files, and data storage. JSON uses key-value pairs and supports strings, numbers, booleans, arrays, and
                nested objects.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ Features</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">✅</div>
                    <h4 class="font-bold text-gray-900 mb-2">JSON Validation</h4>
                    <p class="text-gray-600 text-sm">Instantly validate JSON syntax and structure</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎨</div>
                    <h4 class="font-bold text-gray-900 mb-2">Beautify JSON</h4>
                    <p class="text-gray-600 text-sm">Format JSON with proper indentation and spacing</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📦</div>
                    <h4 class="font-bold text-gray-900 mb-2">Minify JSON</h4>
                    <p class="text-gray-600 text-sm">Compress JSON by removing whitespace</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🌳</div>
                    <h4 class="font-bold text-gray-900 mb-2">Tree View</h4>
                    <p class="text-gray-600 text-sm">Visualize JSON structure in tree format</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">Privacy First</h4>
                    <p class="text-gray-600 text-sm">All processing happens in your browser</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">Instant Results</h4>
                    <p class="text-gray-600 text-sm">Parse and format JSON in milliseconds</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Common Use Cases</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔌 API Development</h4>
                    <p class="text-gray-700 leading-relaxed">Test and debug API responses, validate request payloads, and
                        format JSON data</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">⚙️ Configuration Files</h4>
                    <p class="text-gray-700 leading-relaxed">Format and validate config files for applications, databases,
                        and services</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📊 Data Analysis</h4>
                    <p class="text-gray-700 leading-relaxed">Parse and visualize JSON data from databases, logs, and
                        analytics tools</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🐛 Debugging</h4>
                    <p class="text-gray-700 leading-relaxed">Identify syntax errors, validate structure, and troubleshoot
                        JSON issues</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📝 Documentation</h4>
                    <p class="text-gray-700 leading-relaxed">Create readable JSON examples for API docs and technical guides
                    </p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔄 Data Migration</h4>
                    <p class="text-gray-700 leading-relaxed">Transform and validate JSON during data imports and exports</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📚 How to Use</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-purple-600 text-lg">1.</span>
                        <span><strong>Paste JSON:</strong> Copy and paste your JSON data into the input field</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-purple-600 text-lg">2.</span>
                        <span><strong>Parse:</strong> Click "Parse JSON" to validate and visualize the structure</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-purple-600 text-lg">3.</span>
                        <span><strong>Beautify:</strong> Click "Beautify" to format with proper indentation</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-purple-600 text-lg">4.</span>
                        <span><strong>Minify:</strong> Click "Minify" to compress and remove whitespace</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-purple-600 text-lg">5.</span>
                        <span><strong>View Tree:</strong> See the hierarchical structure in tree view format</span>
                    </li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 JSON Best Practices</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ul class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="text-green-600 font-bold text-xl">✓</span>
                        <span><strong>Use double quotes:</strong> JSON requires double quotes for strings, not single
                            quotes</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-green-600 font-bold text-xl">✓</span>
                        <span><strong>No trailing commas:</strong> Remove commas after the last item in objects and
                            arrays</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-green-600 font-bold text-xl">✓</span>
                        <span><strong>Proper data types:</strong> Use numbers without quotes, booleans as true/false, null
                            for empty values</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-green-600 font-bold text-xl">✓</span>
                        <span><strong>Validate regularly:</strong> Always validate JSON before deployment or production
                            use</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-green-600 font-bold text-xl">✓</span>
                        <span><strong>Beautify for readability:</strong> Format JSON for easier debugging and
                            maintenance</span>
                    </li>
                </ul>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What's the difference between beautify and minify?</h4>
                    <p class="text-gray-700 leading-relaxed">Beautify adds indentation and line breaks to make JSON
                        human-readable. Minify removes all whitespace to reduce file size, making it ideal for production
                        environments.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is my JSON data secure?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! All JSON parsing and formatting happens entirely in your
                        browser. Your data never leaves your device and is not sent to any server.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I parse large JSON files?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes, our parser can handle large JSON files. However, very
                        large files (>10MB) may take longer to process depending on your device's performance.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What errors does the parser detect?</h4>
                    <p class="text-gray-700 leading-relaxed">The parser detects syntax errors like missing quotes, trailing
                        commas, invalid characters, unclosed brackets, and incorrect data types. Error messages show the
                        exact location of the issue.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I use this for API testing?</h4>
                    <p class="text-gray-700 leading-relaxed">Absolutely! This tool is perfect for testing API responses,
                        validating request payloads, and formatting JSON data from API calls.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function parseJSON() {
            const input = document.getElementById('jsonInput').value.trim();
            const statusMessage = document.getElementById('statusMessage');
            const treeView = document.getElementById('treeView');
            const treeContent = document.getElementById('treeContent');

            if (!input) {
                showStatus('Please enter JSON data to parse', 'error');
                return;
            }

            try {
                const parsed = JSON.parse(input);
                showStatus('✓ Valid JSON! Parsed successfully', 'success');
                treeView.classList.remove('hidden');
                treeContent.innerHTML = syntaxHighlight(JSON.stringify(parsed, null, 2));
            } catch (error) {
                showStatus('✗ Invalid JSON: ' + error.message, 'error');
                treeView.classList.add('hidden');
            }
        }

        function beautifyJSON() {
            const input = document.getElementById('jsonInput').value.trim();
            if (!input) {
                showStatus('Please enter JSON data to beautify', 'error');
                return;
            }

            try {
                const parsed = JSON.parse(input);
                document.getElementById('jsonInput').value = JSON.stringify(parsed, null, 2);
                showStatus('✓ JSON beautified successfully', 'success');
            } catch (error) {
                showStatus('✗ Cannot beautify invalid JSON: ' + error.message, 'error');
            }
        }

        function minifyJSON() {
            const input = document.getElementById('jsonInput').value.trim();
            if (!input) {
                showStatus('Please enter JSON data to minify', 'error');
                return;
            }

            try {
                const parsed = JSON.parse(input);
                document.getElementById('jsonInput').value = JSON.stringify(parsed);
                showStatus('✓ JSON minified successfully', 'success');
            } catch (error) {
                showStatus('✗ Cannot minify invalid JSON: ' + error.message, 'error');
            }
        }

        function clearJSON() {
            document.getElementById('jsonInput').value = '';
            document.getElementById('treeView').classList.add('hidden');
            document.getElementById('statusMessage').classList.add('hidden');
        }

        function loadSample() {
            const sample = {
                "user": {
                    "id": 12345,
                    "name": "John Doe",
                    "email": "john.doe@example.com",
                    "isActive": true,
                    "roles": ["admin", "user"],
                    "profile": {
                        "age": 30,
                        "city": "New York",
                        "country": "USA"
                    }
                }
            };
            document.getElementById('jsonInput').value = JSON.stringify(sample, null, 2);
            showStatus('Sample JSON loaded', 'success');
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

        function syntaxHighlight(json) {
            json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
            return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
                let cls = 'text-orange-600';
                if (/^"/.test(match)) {
                    if (/:$/.test(match)) {
                        cls = 'text-blue-600 font-semibold';
                    } else {
                        cls = 'text-green-600';
                    }
                } else if (/true|false/.test(match)) {
                    cls = 'text-purple-600 font-semibold';
                } else if (/null/.test(match)) {
                    cls = 'text-gray-500 font-semibold';
                }
                return '<span class="' + cls + '">' + match + '</span>';
            });
        }
    </script>
@endsection