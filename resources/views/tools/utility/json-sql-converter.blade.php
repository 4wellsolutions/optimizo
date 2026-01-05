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
        <x-tool-hero :tool="$tool" icon="json-sql-converter" />

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
                    JSON to SQL
                </button>
                <button onclick="setMode('decode')" id="decodeBtn"
                    class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    </svg>
                    SQL to JSON
                </button>
            </div>

            <!-- Table Name Input -->
            <div class="mb-6" id="tableNameDiv">
                <label for="tableName" class="form-label text-base">Table Name</label>
                <input type="text" id="tableName" class="form-input" placeholder="users" value="users">
            </div>

            <!-- Input/Output Grid -->
            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <!-- Input Column -->
                <div>
                    <label for="numberInput" class="form-label text-base" id="inputLabel">Enter JSON Array</label>
                    <textarea id="numberInput" class="form-input font-mono text-sm min-h-[300px]"
                        placeholder='[{"name": "John", "age": 30}, {"name": "Jane", "age": 25}]'></textarea>
                </div>

                <!-- Output Column -->
                <div>
                    <label for="numberOutput" class="form-label text-base" id="outputLabel">SQL Result</label>
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
                    <span id="processBtn">Convert to SQL</span>
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
                <h2 class="text-4xl font-black text-gray-900 mb-3">Free JSON ↔ SQL Converter</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Generate SQL INSERT statements from JSON and vice versa
                </p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Convert JSON arrays into SQL INSERT statements or parse SQL queries back to JSON format. Essential for
                database seeding, data migration, and API development. All processing happens client-side for complete data
                privacy.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💾 JSON and SQL Integration</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                JSON is the standard format for API responses and modern data exchange. SQL INSERT statements are used to
                populate database tables. This tool bridges the gap, allowing you to quickly generate database insertion
                scripts from JSON data or extract JSON from SQL for testing and documentation.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ Feature Highlights</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">Instant Generation</h4>
                    <p class="text-gray-600 text-sm">Create SQL statements in seconds</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔄</div>
                    <h4 class="font-bold text-gray-900 mb-2">Bidirectional Flow</h4>
                    <p class="text-gray-600 text-sm">JSON to SQL and SQL to JSON</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔐</div>
                    <h4 class="font-bold text-gray-900 mb-2">Data Security</h4>
                    <p class="text-gray-600 text-sm">No server uploads required</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🏷️</div>
                    <h4 class="font-bold text-gray-900 mb-2">Custom Table Names</h4>
                    <p class="text-gray-600 text-sm">Specify your target table</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎯</div>
                    <h4 class="font-bold text-gray-900 mb-2">Type Handling</h4>
                    <p class="text-gray-600 text-sm">Properly escapes strings and numbers</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">💰</div>
                    <h4 class="font-bold text-gray-900 mb-2">Free Forever</h4>
                    <p class="text-gray-600 text-sm">No usage limits</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Use Case Examples</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🌱 Database Seeding</h4>
                    <p class="text-gray-700 leading-relaxed">Generate SQL INSERT scripts from JSON fixtures for populating
                        test databases</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📤 Data Export</h4>
                    <p class="text-gray-700 leading-relaxed">Convert API responses to SQL for importing into relational
                        databases</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔄 Migration Scripts</h4>
                    <p class="text-gray-700 leading-relaxed">Create database migration files from JSON configuration data
                    </p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🧪 Testing Data</h4>
                    <p class="text-gray-700 leading-relaxed">Extract SQL query results as JSON for unit tests and mocking
                    </p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📝 Documentation</h4>
                    <p class="text-gray-700 leading-relaxed">Document database schemas with JSON examples alongside SQL</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔧 Quick Prototyping</h4>
                    <p class="text-gray-700 leading-relaxed">Rapidly create database records from JSON mockups during
                        development</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📚 How to Convert</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">1.</span>
                        <span><strong>Select Mode:</strong> Choose JSON to SQL or SQL to JSON conversion</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">2.</span>
                        <span><strong>Set Table Name:</strong> Enter your database table name (for JSON to SQL)</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">3.</span>
                        <span><strong>Input Data:</strong> Paste your JSON array or SQL INSERT statements</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">4.</span>
                        <span><strong>Generate:</strong> Click convert to create the output</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">5.</span>
                        <span><strong>Use Result:</strong> Copy the generated SQL or JSON for your project</span>
                    </li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 Sample Transformations</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <div class="space-y-4">
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Single Record:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">[{"id": 1, "name": "Alice"}] →
                            INSERT INTO users (id, name) VALUES (1, 'Alice');</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Multiple Records:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">JSON array with multiple objects
                            generates separate INSERT statements</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">String Escaping:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">Automatically escapes single
                            quotes in string values for SQL safety</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Reverse Parsing:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">INSERT INTO table (col) VALUES
                            ('val'); → [{"col": "val"}]</p>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What JSON format is required?</h4>
                    <p class="text-gray-700 leading-relaxed">The tool expects a JSON array of objects. Each object
                        represents one database row, with keys as column names and values as the data to insert.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Are NULL values supported?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! JSON null values are converted to SQL NULL in the INSERT
                        statements, ensuring proper database handling.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I use different table names?</h4>
                    <p class="text-gray-700 leading-relaxed">Absolutely! When converting JSON to SQL, you can specify any
                        table name in the input field. The default is "users" but you can change it to match your schema.
                    </p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What SQL dialects are supported?</h4>
                    <p class="text-gray-700 leading-relaxed">The generated SQL uses standard INSERT syntax compatible with
                        MySQL, PostgreSQL, SQLite, and most other relational databases.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is my database data private?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! All conversions are performed entirely in your browser
                        using JavaScript. Your database data never leaves your machine or gets sent to any server.</p>
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
                inputLabel.textContent = 'Enter JSON Array';
                outputLabel.textContent = 'SQL Result';
                processBtn.textContent = 'Convert to SQL';
                document.getElementById('tableNameDiv').style.display = 'block';
            } else {
                decodeBtn.classList.remove('bg-gray-200', 'text-gray-700');
                decodeBtn.classList.add('bg-blue-600', 'text-white');
                encodeBtn.classList.remove('bg-blue-600', 'text-white');
                encodeBtn.classList.add('bg-gray-200', 'text-gray-700');
                inputLabel.textContent = 'Enter SQL INSERT Statements';
                outputLabel.textContent = 'JSON Result';
                processBtn.textContent = 'Convert to JSON';
                document.getElementById('tableNameDiv').style.display = 'none';
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
                    // JSON to SQL
                    const tableName = document.getElementById('tableName').value.trim() || 'table_name';
                    const jsonData = JSON.parse(input);

                    if (!Array.isArray(jsonData)) {
                        showStatus('JSON must be an array of objects', 'error');
                        return;
                    }

                    if (jsonData.length === 0) {
                        showStatus('JSON array is empty', 'error');
                        return;
                    }

                    let sql = '';
                    jsonData.forEach((row, index) => {
                        const columns = Object.keys(row);
                        const values = Object.values(row).map(val => {
                            if (val === null) return 'NULL';
                            if (typeof val === 'number') return val;
                            return "'" + String(val).replace(/'/g, "''") + "'";
                        });

                        sql += `INSERT INTO ${tableName} (${columns.join(', ')}) VALUES (${values.join(', ')});`;
                        if (index < jsonData.length - 1) sql += '\n';
                    });

                    output.value = sql;
                    showStatus('✓ Converted to SQL successfully', 'success');
                } else {
                    // SQL to JSON (basic parsing)
                    const lines = input.split('\n').filter(line => line.trim());
                    const data = [];

                    lines.forEach(line => {
                        const match = line.match(/INSERT INTO\s+\w+\s*\(([^)]+)\)\s*VALUES\s*\(([^)]+)\)/i);
                        if (match) {
                            const columns = match[1].split(',').map(c => c.trim());
                            const values = match[2].split(',').map(v => {
                                v = v.trim();
                                if (v === 'NULL') return null;
                                if (v.startsWith("'") && v.endsWith("'")) {
                                    return v.slice(1, -1).replace(/''/g, "'");
                                }
                                const num = Number(v);
                                return isNaN(num) ? v : num;
                            });

                            const row = {};
                            columns.forEach((col, i) => {
                                row[col] = values[i];
                            });
                            data.push(row);
                        }
                    });

                    if (data.length === 0) {
                        showStatus('No valid INSERT statements found', 'error');
                        return;
                    }

                    output.value = JSON.stringify(data, null, 2);
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