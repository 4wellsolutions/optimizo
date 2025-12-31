@extends('layouts.app')

@section('title', $tool->name . ' - ' . config('app.name'))
@section('meta_description', $tool->meta_description)

@section('content')
    <div class="max-w-6xl mx-auto">
        <div
            class="relative overflow-hidden bg-gradient-to-br from-violet-500 via-purple-500 to-fuchsia-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2">SQL to JSON Converter</h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto">Convert SQL INSERT statements to
                    JSON format!</p>
                @include('components.hero-actions')
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-violet-200 mb-8">
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convert()" class="btn-primary"><svg class="w-5 h-5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg><span>Convert to JSON</span></button>
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
                    <label for="sqlInput" class="form-label text-base">Enter SQL INSERT Statements</label>
                    <textarea id="sqlInput" class="form-input font-mono text-sm min-h-[400px]"
                        placeholder="INSERT INTO users (name, age) VALUES ('John', 30);"></textarea>
                </div>
                <div>
                    <label for="jsonOutput" class="form-label text-base">JSON Output</label>
                    <textarea id="jsonOutput" class="form-input font-mono text-sm min-h-[400px]" readonly
                        placeholder="Converted JSON will appear here..."></textarea>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div
            class="bg-gradient-to-br from-violet-50 to-purple-50 rounded-3xl p-8 md:p-12 border-2 border-violet-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-violet-500 to-purple-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">Free SQL to JSON Converter</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Transform SQL INSERT statements into JSON format
                    instantly</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Our free SQL to JSON converter transforms SQL INSERT statements into clean JSON format. Perfect for API
                development, data migration, NoSQL databases, and converting relational database data into JSON for modern
                web applications and microservices.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🔐 What is SQL to JSON Conversion?</h3>
            <p class="text-gray-700 leading-relaxed mb-8">
                SQL to JSON conversion transforms SQL INSERT statements into JavaScript Object Notation format. This is
                essential when migrating from SQL databases to NoSQL systems, creating REST APIs, or working with modern
                JavaScript frameworks that expect JSON data structures.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ Features</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-violet-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">Instant Conversion</h4>
                    <p class="text-gray-600 text-sm">Convert SQL to JSON in milliseconds</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">Secure & Private</h4>
                    <p class="text-gray-600 text-sm">All processing happens locally in your browser</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📋</div>
                    <h4 class="font-bold text-gray-900 mb-2">One-Click Copy</h4>
                    <p class="text-gray-600 text-sm">Copy JSON output instantly to clipboard</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎯</div>
                    <h4 class="font-bold text-gray-900 mb-2">Smart Parsing</h4>
                    <p class="text-gray-600 text-sm">Automatically extracts columns and values from SQL</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🆓</div>
                    <h4 class="font-bold text-gray-900 mb-2">100% Free</h4>
                    <p class="text-gray-600 text-sm">No limits, no registration required</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🌐</div>
                    <h4 class="font-bold text-gray-900 mb-2">API Ready</h4>
                    <p class="text-gray-600 text-sm">Output works perfectly with REST APIs and JavaScript</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Common Use Cases</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔄 Database Migration</h4>
                    <p class="text-gray-700 leading-relaxed">Convert SQL data to JSON for migrating from SQL databases to
                        NoSQL systems like MongoDB, DynamoDB, or Firestore.</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔌 API Development</h4>
                    <p class="text-gray-700 leading-relaxed">Transform SQL INSERT statements to JSON for REST API payloads
                        and testing.</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">⚛️ Frontend Development</h4>
                    <p class="text-gray-700 leading-relaxed">Convert SQL data to JSON for use in React, Vue, Angular, and
                        other JavaScript frameworks.</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📊 Data Analysis</h4>
                    <p class="text-gray-700 leading-relaxed">Transform SQL exports to JSON for data analysis tools and
                        visualization libraries.</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🧪 Testing & Mocking</h4>
                    <p class="text-gray-700 leading-relaxed">Convert SQL test data to JSON for API mocking and automated
                        testing.</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📄 Documentation</h4>
                    <p class="text-gray-700 leading-relaxed">Transform SQL examples to JSON for API documentation and
                        developer guides.</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📝 How to Convert SQL to JSON</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8 shadow-lg">
                <ol class="space-y-4">
                    <li class="flex items-start">
                        <span
                            class="flex-shrink-0 w-8 h-8 bg-violet-600 text-white rounded-full flex items-center justify-center font-bold mr-3">1</span>
                        <div>
                            <p class="font-semibold text-gray-900 mb-1">Paste SQL INSERT Statement</p>
                            <p class="text-gray-700">Copy your SQL INSERT statement and paste it into the left input field.
                            </p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span
                            class="flex-shrink-0 w-8 h-8 bg-violet-600 text-white rounded-full flex items-center justify-center font-bold mr-3">2</span>
                        <div>
                            <p class="font-semibold text-gray-900 mb-1">Click Convert</p>
                            <p class="text-gray-700">Press "Convert to JSON" to transform your SQL into JSON format.</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span
                            class="flex-shrink-0 w-8 h-8 bg-violet-600 text-white rounded-full flex items-center justify-center font-bold mr-3">3</span>
                        <div>
                            <p class="font-semibold text-gray-900 mb-1">Copy and Use</p>
                            <p class="text-gray-700">The JSON output appears on the right. Click "Copy" to use it in your
                                application.</p>
                        </div>
                    </li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 Conversion Example</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8 shadow-lg">
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm font-semibold text-gray-700 mb-2">SQL Input:</p>
                        <pre class="bg-gray-50 p-3 rounded text-sm overflow-x-auto"><code>INSERT INTO users (name, age) 
    VALUES ('John', 30);</code></pre>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-700 mb-2">JSON Output:</p>
                        <pre class="bg-gray-50 p-3 rounded text-sm overflow-x-auto"><code>{
      "name": "John",
      "age": 30
    }</code></pre>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4 mb-8">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What SQL format is supported?</h4>
                    <p class="text-gray-700 leading-relaxed">The converter supports standard SQL INSERT statements with
                        column names and values. Both single and multiple row inserts are supported.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is my data secure?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! All conversion happens in your browser using JavaScript.
                        Your SQL data never leaves your device or gets sent to any server.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I convert multiple rows?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! The converter handles SQL INSERT statements with multiple
                        rows, creating a JSON array of objects.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Does it work with all SQL databases?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! The converter works with INSERT statements from MySQL,
                        PostgreSQL, SQL Server, Oracle, and other SQL databases.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I use this for API development?</h4>
                    <p class="text-gray-700 leading-relaxed">Absolutely! The generated JSON is perfect for REST API
                        payloads, testing, and frontend development.</p>
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
                        <span class="text-gray-700"><strong>Use standard SQL:</strong> Ensure your INSERT statements follow
                            standard SQL syntax.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700"><strong>Include column names:</strong> Always specify column names in
                            your INSERT statement for accurate JSON keys.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700"><strong>Test with examples:</strong> Use the "Example" button to
                            understand the expected SQL format.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700"><strong>Validate JSON output:</strong> Always validate the generated
                            JSON for your specific use case.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700"><strong>Handle data types:</strong> Be aware that all values are
                            converted to strings or numbers in JSON.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        function convert() {
            const input = document.getElementById('sqlInput').value.trim();
            if (!input) { showStatus('Please enter SQL INSERT statements', 'error'); return; }
            try {
                const regex = /INSERT\s+INTO\s+\w+\s*\(([^)]+)\)\s*VALUES\s*\(([^)]+)\)/gi;
                const matches = [...input.matchAll(regex)];
                if (matches.length === 0) { showStatus('No valid INSERT statements found', 'error'); return; }
                const results = matches.map(match => {
                    const columns = match[1].split(',').map(c => c.trim());
                    const values = match[2].split(',').map(v => v.trim().replace(/^['"]|['"]$/g, ''));
                    const obj = {};
                    columns.forEach((col, i) => { obj[col] = values[i]; });
                    return obj;
                });
                document.getElementById('jsonOutput').value = JSON.stringify(results, null, 2);
                showStatus('✓ SQL converted to JSON successfully', 'success');
            } catch (error) { showStatus('✗ Error: ' + error.message, 'error'); }
        }
        function clearAll() { document.getElementById('sqlInput').value = ''; document.getElementById('jsonOutput').value = ''; document.getElementById('statusMessage').classList.add('hidden'); }
        function copyOutput() { const output = document.getElementById('jsonOutput'); if (!output.value) { showStatus('No output to copy', 'error'); return; } output.select(); document.execCommand('copy'); showStatus('✓ Copied to clipboard', 'success'); }
        function loadExample() { document.getElementById('sqlInput').value = "INSERT INTO users (name, age, city) VALUES ('John Doe', 30, 'New York');\nINSERT INTO users (name, age, city) VALUES ('Jane Smith', 25, 'London');"; convert(); }
        function showStatus(message, type) { const statusMessage = document.getElementById('statusMessage'); statusMessage.textContent = message; statusMessage.classList.remove('hidden', 'bg-green-100', 'text-green-800', 'bg-red-100', 'text-red-800', 'border-green-300', 'border-red-300'); if (type === 'success') { statusMessage.classList.add('bg-green-100', 'text-green-800', 'border-2', 'border-green-300'); } else { statusMessage.classList.add('bg-red-100', 'text-red-800', 'border-2', 'border-red-300'); } }
    </script>
@endsection