@extends('layouts.app')

@section('title', $tool->name . ' - ' . config('app.name'))
@section('meta_description', $tool->meta_description)

@section('content')
    <div class="max-w-6xl mx-auto">
        <div
            class="relative overflow-hidden bg-gradient-to-br from-cyan-500 via-blue-500 to-indigo-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">JSON to YAML Converter
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto">Convert JSON to YAML format -
                    Perfect for configuration files!</p>
                @include('components.hero-actions')
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-cyan-200 mb-8">
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convert()" class="btn-primary"><svg class="w-5 h-5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg><span>Convert to YAML</span></button>
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
                <div>
                    <label for="jsonInput" class="form-label text-base">Enter JSON</label>
                    <textarea id="jsonInput" class="form-input font-mono text-sm min-h-[400px]"
                        placeholder='{"name": "value", "nested": {"key": "data"}}'></textarea>
                </div>
                <div>
                    <label for="yamlOutput" class="form-label text-base">YAML Output</label>
                    <textarea id="yamlOutput" class="form-input font-mono text-sm min-h-[400px]" readonly
                        placeholder="Converted YAML will appear here..."></textarea>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-cyan-50 to-blue-50 rounded-3xl p-8 md:p-12 border-2 border-cyan-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">Free JSON to YAML Converter</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Transform JSON into human-readable YAML format instantly
                </p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Our free JSON to YAML converter is the perfect tool for developers working with configuration files, Docker
                Compose, Kubernetes manifests, CI/CD pipelines, and cloud infrastructure. Convert JSON data into clean,
                readable YAML format with proper indentation and structure in seconds.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🔐 What is JSON to YAML Conversion?</h3>
            <p class="text-gray-700 leading-relaxed mb-8">
                JSON to YAML conversion transforms JavaScript Object Notation into YAML (YAML Ain't Markup Language) format.
                YAML is preferred for configuration files due to its human-readable syntax, minimal punctuation, and support
                for comments. It's widely used in DevOps, cloud platforms, and modern application configuration.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ Features</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-cyan-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">Lightning Fast</h4>
                    <p class="text-gray-600 text-sm">Convert JSON to YAML instantly with optimized parsing</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">100% Private</h4>
                    <p class="text-gray-600 text-sm">All conversion happens locally - your data stays secure</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📋</div>
                    <h4 class="font-bold text-gray-900 mb-2">Quick Copy</h4>
                    <p class="text-gray-600 text-sm">One-click copy to clipboard for immediate use</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎯</div>
                    <h4 class="font-bold text-gray-900 mb-2">Perfect Formatting</h4>
                    <p class="text-gray-600 text-sm">Properly indented, clean YAML output every time</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🆓</div>
                    <h4 class="font-bold text-gray-900 mb-2">Completely Free</h4>
                    <p class="text-gray-600 text-sm">No registration, no limits, no hidden costs</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🌐</div>
                    <h4 class="font-bold text-gray-900 mb-2">Works Offline</h4>
                    <p class="text-gray-600 text-sm">Client-side processing works without internet</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Common Use Cases</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🐳 Docker & Kubernetes</h4>
                    <p class="text-gray-700 leading-relaxed">Convert JSON configuration to YAML for Docker Compose files,
                        Kubernetes deployments, and container orchestration.</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">⚙️ Configuration Files</h4>
                    <p class="text-gray-700 leading-relaxed">Transform JSON configs into YAML for applications, frameworks,
                        and tools that prefer YAML format.</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔄 CI/CD Pipelines</h4>
                    <p class="text-gray-700 leading-relaxed">Convert JSON to YAML for GitHub Actions, GitLab CI, CircleCI,
                        and other pipeline configurations.</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">☁️ Cloud Infrastructure</h4>
                    <p class="text-gray-700 leading-relaxed">Transform JSON into YAML for AWS CloudFormation, Terraform,
                        Ansible playbooks, and infrastructure as code.</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📊 Data Serialization</h4>
                    <p class="text-gray-700 leading-relaxed">Convert JSON API responses to YAML for better readability and
                        documentation purposes.</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔧 Development Tools</h4>
                    <p class="text-gray-700 leading-relaxed">Transform JSON to YAML for OpenAPI specs, Swagger docs, and API
                        documentation.</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📝 How to Convert JSON to YAML</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8 shadow-lg">
                <ol class="space-y-4">
                    <li class="flex items-start">
                        <span
                            class="flex-shrink-0 w-8 h-8 bg-cyan-600 text-white rounded-full flex items-center justify-center font-bold mr-3">1</span>
                        <div>
                            <p class="font-semibold text-gray-900 mb-1">Enter Your JSON</p>
                            <p class="text-gray-700">Paste your JSON data into the left input field or click "Example" for a
                                sample.</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span
                            class="flex-shrink-0 w-8 h-8 bg-cyan-600 text-white rounded-full flex items-center justify-center font-bold mr-3">2</span>
                        <div>
                            <p class="font-semibold text-gray-900 mb-1">Click Convert</p>
                            <p class="text-gray-700">Press "Convert to YAML" to transform your JSON into clean YAML format.
                            </p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span
                            class="flex-shrink-0 w-8 h-8 bg-cyan-600 text-white rounded-full flex items-center justify-center font-bold mr-3">3</span>
                        <div>
                            <p class="font-semibold text-gray-900 mb-1">Copy and Use</p>
                            <p class="text-gray-700">The YAML output appears on the right. Click "Copy" to use it in your
                                project.</p>
                        </div>
                    </li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 Conversion Examples</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8 shadow-lg">
                <div class="space-y-6">
                    <div>
                        <p class="font-semibold text-gray-900 mb-3">Simple Object:</p>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-semibold text-gray-700 mb-2">JSON:</p>
                                <pre
                                    class="bg-gray-50 p-3 rounded text-sm overflow-x-auto"><code>{"name": "App", "version": "1.0"}</code></pre>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-700 mb-2">YAML:</p>
                                <pre class="bg-gray-50 p-3 rounded text-sm overflow-x-auto"><code>name: "App"
    version: "1.0"</code></pre>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-3">Nested Structure:</p>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-semibold text-gray-700 mb-2">JSON:</p>
                                <pre
                                    class="bg-gray-50 p-3 rounded text-sm overflow-x-auto"><code>{"server": {"host": "localhost", "port": 8080}}</code></pre>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-700 mb-2">YAML:</p>
                                <pre class="bg-gray-50 p-3 rounded text-sm overflow-x-auto"><code>server:
      host: "localhost"
      port: 8080</code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4 mb-8">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Why use YAML instead of JSON?</h4>
                    <p class="text-gray-700 leading-relaxed">YAML is more human-readable with less syntax noise (no brackets
                        or commas), supports comments, and is preferred for configuration files. It's easier to read and
                        edit manually, making it ideal for DevOps and infrastructure as code.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is my data safe?</h4>
                    <p class="text-gray-700 leading-relaxed">Absolutely! All conversion happens in your browser using
                        JavaScript. Your JSON data never leaves your device or gets sent to any server.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I convert complex JSON structures?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! Our converter handles nested objects, arrays, and complex
                        data structures, converting them into properly indented YAML format.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Does it work for Docker Compose files?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! This tool is perfect for converting JSON configurations to
                        Docker Compose YAML format, Kubernetes manifests, and other container orchestration configs.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I use this for CI/CD pipelines?</h4>
                    <p class="text-gray-700 leading-relaxed">Absolutely! Convert JSON to YAML for GitHub Actions, GitLab CI,
                        CircleCI, Jenkins, and other pipeline configuration files.</p>
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
                        <span class="text-gray-700"><strong>Validate JSON first:</strong> Ensure your JSON is valid before
                            conversion to avoid errors.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700"><strong>Check indentation:</strong> YAML is whitespace-sensitive -
                            verify proper indentation in the output.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700"><strong>Test with examples:</strong> Use the "Example" button to
                            understand the conversion format.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700"><strong>Validate YAML output:</strong> Use a YAML validator to ensure
                            the output is syntactically correct.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700"><strong>Add comments manually:</strong> YAML supports comments - add
                            them after conversion for better documentation.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        function convert() {
            const input = document.getElementById('jsonInput').value.trim();
            if (!input) { showStatus('Please enter JSON data', 'error'); return; }
            try {
                const json = JSON.parse(input);
                const yaml = jsonToYaml(json);
                document.getElementById('yamlOutput').value = yaml;
                showStatus('✓ JSON converted to YAML successfully', 'success');
            } catch (error) { showStatus('✗ Error: ' + error.message, 'error'); }
        }

        function jsonToYaml(obj, indent = 0) {
            let yaml = '';
            const spaces = '  '.repeat(indent);
            if (Array.isArray(obj)) {
                obj.forEach(item => {
                    if (typeof item === 'object' && item !== null) {
                        yaml += spaces + '-\n' + jsonToYaml(item, indent + 1);
                    } else {
                        yaml += spaces + '- ' + (typeof item === 'string' ? '"' + item + '"' : item) + '\n';
                    }
                });
            } else if (typeof obj === 'object' && obj !== null) {
                for (let key in obj) {
                    if (typeof obj[key] === 'object' && obj[key] !== null) {
                        yaml += spaces + key + ':\n' + jsonToYaml(obj[key], indent + 1);
                    } else {
                        yaml += spaces + key + ': ' + (typeof obj[key] === 'string' ? '"' + obj[key] + '"' : obj[key]) + '\n';
                    }
                }
            }
            return yaml;
        }

        function clearAll() { document.getElementById('jsonInput').value = ''; document.getElementById('yamlOutput').value = ''; document.getElementById('statusMessage').classList.add('hidden'); }
        function copyOutput() { const output = document.getElementById('yamlOutput'); if (!output.value) { showStatus('No output to copy', 'error'); return; } output.select(); document.execCommand('copy'); showStatus('✓ Copied to clipboard', 'success'); }
        function loadExample() { document.getElementById('jsonInput').value = JSON.stringify({ "database": { "host": "localhost", "port": 5432, "credentials": { "user": "admin", "password": "secret" } } }, null, 2); convert(); }
        function showStatus(message, type) { const statusMessage = document.getElementById('statusMessage'); statusMessage.textContent = message; statusMessage.classList.remove('hidden', 'bg-green-100', 'text-green-800', 'bg-red-100', 'text-red-800', 'border-green-300', 'border-red-300'); if (type === 'success') { statusMessage.classList.add('bg-green-100', 'text-green-800', 'border-2', 'border-green-300'); } else { statusMessage.classList.add('bg-red-100', 'text-red-800', 'border-2', 'border-red-300'); } }
    </script>
@endsection