@extends('layouts.app')

@section('title', $tool->name . ' - ' . config('app.name'))
@section('meta_description', $tool->meta_description)

@section('content')
    <div class="max-w-6xl mx-auto">
        <div
            class="relative overflow-hidden bg-gradient-to-br from-rose-500 via-pink-500 to-fuchsia-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2">JSON to SQL Converter</h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto">Convert JSON to SQL INSERT
                    statements!</p>
                @include('components.hero-actions')
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-rose-200 mb-8">
            <div class="mb-4"><label for="tableName" class="form-label text-base">Table Name</label><input type="text"
                    id="tableName" class="form-input" placeholder="users" value="users"></div>
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convert()" class="btn-primary"><svg class="w-5 h-5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg><span>Convert to SQL</span></button>
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
                    <label for="jsonInput" class="form-label text-base">Enter JSON Array</label>
                    <textarea id="jsonInput" class="form-input font-mono text-sm min-h-[400px]"
                        placeholder='[{"name": "John", "age": 30}]'></textarea>
                </div>
                <div>
                    <label for="sqlOutput" class="form-label text-base">SQL Output</label>
                    <textarea id="sqlOutput" class="form-input font-mono text-sm min-h-[400px]" readonly
                        placeholder="SQL INSERT statements will appear here..."></textarea>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-rose-50 to-pink-50 rounded-3xl p-8 md:p-12 border-2 border-rose-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-rose-500 to-pink-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">Free JSON to SQL Converter</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Transform JSON data into SQL INSERT statements instantly
                </p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Our free JSON to SQL converter transforms JSON arrays and objects into SQL INSERT statements. Perfect for
                database imports, data migration from NoSQL to SQL databases, and converting API responses into SQL format
                for relational database systems.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🔐 What is JSON to SQL Conversion?</h3>
            <p class="text-gray-700 leading-relaxed mb-8">
                JSON to SQL conversion transforms JavaScript Object Notation data into SQL INSERT statements. This is
                essential when migrating from NoSQL databases to SQL systems, importing JSON data into relational databases,
                or converting API responses into database-ready SQL format.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ Features</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">Lightning Fast</h4>
                    <p class="text-gray-600 text-sm">Convert JSON to SQL instantly</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">100% Private</h4>
                    <p class="text-gray-600 text-sm">All processing happens in your browser</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📋</div>
                    <h4 class="font-bold text-gray-900 mb-2">Quick Copy</h4>
                    <p class="text-gray-600 text-sm">Copy SQL statements to clipboard instantly</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎯</div>
                    <h4 class="font-bold text-gray-900 mb-2">Smart Generation</h4>
                    <p class="text-gray-600 text-sm">Automatically creates proper SQL INSERT syntax</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🆓</div>
                    <h4 class="font-bold text-gray-900 mb-2">Completely Free</h4>
                    <p class="text-gray-600 text-sm">No limits, no registration needed</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🗄️</div>
                    <h4 class="font-bold text-gray-900 mb-2">Database Ready</h4>
                    <p class="text-gray-600 text-sm">Works with MySQL, PostgreSQL, SQL Server, and more</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Common Use Cases</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔄 NoSQL to SQL Migration</h4>
                    <p class="text-gray-700 leading-relaxed">Convert JSON data from MongoDB, DynamoDB, or Firestore to SQL
                        INSERT statements for relational databases.</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📊 Data Import</h4>
                    <p class="text-gray-700 leading-relaxed">Transform JSON exports into SQL for bulk import into MySQL,
                        PostgreSQL, or SQL Server databases.</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔌 API to Database</h4>
                    <p class="text-gray-700 leading-relaxed">Convert JSON API responses to SQL INSERT statements for
                        database storage.</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🧪 Test Data Generation</h4>
                    <p class="text-gray-700 leading-relaxed">Transform JSON test data to SQL for database seeding and
                        testing.</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📄 Data Backup</h4>
                    <p class="text-gray-700 leading-relaxed">Convert JSON backups to SQL format for relational database
                        restoration.</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔧 Development Tools</h4>
                    <p class="text-gray-700 leading-relaxed">Transform JSON fixtures to SQL for database initialization
                        scripts.</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📝 How to Convert JSON to SQL</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8 shadow-lg">
                <ol class="space-y-4">
                    <li class="flex items-start">
                        <span
                            class="flex-shrink-0 w-8 h-8 bg-rose-600 text-white rounded-full flex items-center justify-center font-bold mr-3">1</span>
                        <div>
                            <p class="font-semibold text-gray-900 mb-1">Paste Your JSON Data</p>
                            <p class="text-gray-700">Copy JSON data (object or array) and paste it into the left input
                                field.</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span
                            class="flex-shrink-0 w-8 h-8 bg-rose-600 text-white rounded-full flex items-center justify-center font-bold mr-3">2</span>
                        <div>
                            <p class="font-semibold text-gray-900 mb-1">Specify Table Name</p>
                            <p class="text-gray-700">The converter will generate INSERT statements for your specified table.
                            </p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span
                            class="flex-shrink-0 w-8 h-8 bg-rose-600 text-white rounded-full flex items-center justify-center font-bold mr-3">3</span>
                        <div>
                            <p class="font-semibold text-gray-900 mb-1">Copy SQL Statements</p>
                            <p class="text-gray-700">Click "Copy" to get the SQL INSERT statements ready for your database.
                            </p>
                        </div>
                    </li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 Conversion Example</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8 shadow-lg">
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm font-semibold text-gray-700 mb-2">JSON Input:</p>
                        <pre
                            class="bg-gray-50 p-3 rounded text-sm overflow-x-auto"><code>{"name": "John", "age": 30}</code></pre>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-700 mb-2">SQL Output:</p>
                        <pre class="bg-gray-50 p-3 rounded text-sm overflow-x-auto"><code>INSERT INTO users (name, age) 
    VALUES ('John', 30);</code></pre>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4 mb-8">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What JSON format is supported?</h4>
                    <p class="text-gray-700 leading-relaxed">The converter supports both JSON objects and arrays. Arrays
                        will generate multiple INSERT statements, one for each object.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is my data secure?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! All conversion happens in your browser using JavaScript.
                        Your JSON data never leaves your device.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Which databases are supported?</h4>
                    <p class="text-gray-700 leading-relaxed">The generated SQL works with MySQL, PostgreSQL, SQL Server,
                        Oracle, and other standard SQL databases.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I convert nested JSON?</h4>
                    <p class="text-gray-700 leading-relaxed">The converter works best with flat JSON objects. Nested objects
                        should be flattened or handled separately for proper SQL structure.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">How are data types handled?</h4>
                    <p class="text-gray-700 leading-relaxed">The converter automatically handles strings, numbers, and
                        booleans. Strings are properly quoted in the SQL output.</p>
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
                            conversion.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700"><strong>Use flat structures:</strong> Flatten nested JSON for better SQL
                            compatibility.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700"><strong>Test SQL output:</strong> Always test generated SQL in a
                            development environment first.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700"><strong>Check table schema:</strong> Ensure JSON keys match your
                            database column names.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700"><strong>Handle special characters:</strong> Strings with quotes are
                            automatically escaped in SQL.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        function convert() {
            const input = document.getElementById('jsonInput').value.trim();
            const tableName = document.getElementById('tableName').value.trim() || 'table';
            if (!input) { showStatus('Please enter JSON data', 'error'); return; }
            try {
                const data = JSON.parse(input);
                const array = Array.isArray(data) ? data : [data];
                let sql = '';
                array.forEach(obj => {
                    const columns = Object.keys(obj).join(', ');
                    const values = Object.values(obj).map(v => typeof v === 'string' ? `'${v}'` : v).join(', ');
                    sql += `INSERT INTO ${tableName} (${columns}) VALUES (${values});\n`;
                });
                document.getElementById('sqlOutput').value = sql;
                showStatus('✓ JSON converted to SQL successfully', 'success');
            } catch (error) { showStatus('✗ Error: ' + error.message, 'error'); }
        }
        function clearAll() { document.getElementById('jsonInput').value = ''; document.getElementById('sqlOutput').value = ''; document.getElementById('statusMessage').classList.add('hidden'); }
        function copyOutput() { const output = document.getElementById('sqlOutput'); if (!output.value) { showStatus('No output to copy', 'error'); return; } output.select(); document.execCommand('copy'); showStatus('✓ Copied to clipboard', 'success'); }
        function loadExample() { document.getElementById('jsonInput').value = JSON.stringify([{ "name": "John Doe", "age": 30, "city": "New York" }, { "name": "Jane Smith", "age": 25, "city": "London" }], null, 2); convert(); }
        function showStatus(message, type) { const statusMessage = document.getElementById('statusMessage'); statusMessage.textContent = message; statusMessage.classList.remove('hidden', 'bg-green-100', 'text-green-800', 'bg-red-100', 'text-red-800', 'border-green-300', 'border-red-300'); if (type === 'success') { statusMessage.classList.add('bg-green-100', 'text-green-800', 'border-2', 'border-green-300'); } else { statusMessage.classList.add('bg-red-100', 'text-red-800', 'border-2', 'border-red-300'); } }
    </script>
@endsection