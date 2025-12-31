@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- SEO-Optimized Header with Gradient Background -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <!-- Decorative Elements -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">
                    JSON Formatter & Validator
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                    Format, beautify, minify, and validate JSON data instantly with syntax highlighting!
                </p>
                <div class="flex flex-wrap items-center justify-center gap-3 mt-4">
                    <div class="flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="font-semibold">Instant Format</span>
                    </div>
                    <div class="flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="font-semibold">Error Detection</span>
                    </div>
                    <div class="flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="font-semibold">100% Free</span>
                    </div>
                </div>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- JSON Formatter Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-indigo-200 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Format Your JSON Data</h2>
            <form id="jsonForm">
                @csrf
                <div class="mb-6">
                    <label for="json" class="form-label text-base">Enter JSON Data</label>
                    <textarea id="json" name="json" class="form-input font-mono text-sm min-h-[400px]"
                        placeholder='{"name": "John Doe", "age": 30, "city": "New York"}'></textarea>
                    <p class="text-sm text-gray-500 mt-2">Paste your JSON data to format, beautify, or minify it</p>
                </div>

                <div class="flex flex-col md:flex-row gap-3">
                    <button type="button" onclick="formatJSON()" class="btn-primary flex-1 justify-center text-lg py-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                        <span id="formatBtnText">Format & Beautify</span>
                    </button>
                    <button type="button" onclick="minifyJSON()" class="btn-secondary flex-1 justify-center text-lg py-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                        <span id="minifyBtnText">Minify JSON</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Error Message -->
        <div id="errorMessage" class="hidden bg-red-50 border-2 border-red-200 rounded-2xl p-6 mb-8">
            <p class="text-red-800 font-semibold flex items-center">
                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                        clip-rule="evenodd" />
                </svg>
                <span id="errorText"></span>
            </p>
        </div>

        <!-- Results Section -->
        <div id="resultsSection" class="hidden">
            <div class="result-card">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Formatted JSON</h2>
                    <button onclick="copyJSON()" class="btn-secondary">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                        Copy JSON
                    </button>
                </div>
                <div class="bg-gray-900 rounded-xl p-6 overflow-x-auto">
                    <pre id="formattedJSON" class="text-sm text-green-400 font-mono"></pre>
                </div>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- SEO Content Section -->
        <div
            class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl p-6 md:p-8 mt-8 border-2 border-indigo-100 shadow-xl">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Why Use Our JSON Formatter?</h2>
            <p class="text-gray-700 leading-relaxed mb-6 text-lg">
                JSON (JavaScript Object Notation) is the most popular data interchange format used in web development, APIs,
                and configuration files. Our free online JSON formatter helps developers, data analysts, and IT
                professionals quickly format, beautify, validate, and minify JSON data. Whether you're debugging API
                responses, cleaning up configuration files, or preparing JSON for production, our tool provides instant
                results with syntax highlighting and error detection. Perfect for developers working with REST APIs, NoSQL
                databases, and modern web applications.
            </p>
            <div class="grid md:grid-cols-3 gap-4 mt-6">
                <div
                    class="bg-white rounded-xl p-5 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-indigo-200">
                    <div class="text-4xl mb-3">⚡</div>
                    <h3 class="font-bold text-indigo-600 mb-2 text-lg">Instant Formatting</h3>
                    <p class="text-sm text-gray-600">Format and beautify JSON data in milliseconds with proper indentation
                        and syntax highlighting</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-purple-200">
                    <div class="text-4xl mb-3">✅</div>
                    <h3 class="font-bold text-purple-600 mb-2 text-lg">Error Detection</h3>
                    <p class="text-sm text-gray-600">Automatically detect and highlight JSON syntax errors with helpful
                        error messages</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-pink-200">
                    <div class="text-4xl mb-3">🔒</div>
                    <h3 class="font-bold text-pink-600 mb-2 text-lg">100% Private</h3>
                    <p class="text-sm text-gray-600">All processing happens in your browser - your JSON data never leaves
                        your computer</p>
                </div>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- How to Use Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-xl border-2 border-gray-200 mt-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center">How to Format JSON in 3 Easy Steps</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="flex flex-col items-center text-center p-4 rounded-xl bg-indigo-50 border-2 border-indigo-200">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-indigo-600 to-purple-600 text-white rounded-full flex items-center justify-center font-bold text-xl shadow-lg mb-4">
                        1</div>
                    <h3 class="font-bold text-lg text-gray-900 mb-2">Paste JSON Data</h3>
                    <p class="text-gray-700 text-sm">Copy and paste your JSON data into the text area above</p>
                </div>
                <div class="flex flex-col items-center text-center p-4 rounded-xl bg-purple-50 border-2 border-purple-200">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-purple-600 to-pink-600 text-white rounded-full flex items-center justify-center font-bold text-xl shadow-lg mb-4">
                        2</div>
                    <h3 class="font-bold text-lg text-gray-900 mb-2">Choose Action</h3>
                    <p class="text-gray-700 text-sm">Click "Format & Beautify" to format or "Minify" to compress your JSON
                    </p>
                </div>
                <div class="flex flex-col items-center text-center p-4 rounded-xl bg-pink-50 border-2 border-pink-200">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-pink-600 to-red-600 text-white rounded-full flex items-center justify-center font-bold text-xl shadow-lg mb-4">
                        3</div>
                    <h3 class="font-bold text-lg text-gray-900 mb-2">Copy Result</h3>
                    <p class="text-gray-700 text-sm">Click the copy button to copy the formatted JSON to your clipboard</p>
                </div>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- Use Cases Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-xl border-2 border-gray-200 mt-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Common JSON Formatting Use Cases</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="flex items-start gap-4 p-4 rounded-xl bg-blue-50 border-2 border-blue-200">
                    <div class="flex-shrink-0 text-3xl">🔌</div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">API Response Debugging</h3>
                        <p class="text-gray-700 text-sm">Format messy API responses to easily read and debug JSON data from
                            REST APIs, GraphQL, and web services.</p>
                    </div>
                </div>
                <div class="flex items-start gap-4 p-4 rounded-xl bg-green-50 border-2 border-green-200">
                    <div class="flex-shrink-0 text-3xl">⚙️</div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">Configuration Files</h3>
                        <p class="text-gray-700 text-sm">Clean up and validate JSON configuration files for applications,
                            package.json, tsconfig.json, and more.</p>
                    </div>
                </div>
                <div class="flex items-start gap-4 p-4 rounded-xl bg-purple-50 border-2 border-purple-200">
                    <div class="flex-shrink-0 text-3xl">💾</div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">Database Data</h3>
                        <p class="text-gray-700 text-sm">Format JSON data from NoSQL databases like MongoDB, CouchDB, and
                            Firebase for better readability.</p>
                    </div>
                </div>
                <div class="flex items-start gap-4 p-4 rounded-xl bg-orange-50 border-2 border-orange-200">
                    <div class="flex-shrink-0 text-3xl">📦</div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">Data Export/Import</h3>
                        <p class="text-gray-700 text-sm">Prepare JSON data for export or validate imported JSON data to
                            ensure proper structure and syntax.</p>
                    </div>
                </div>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- Best Practices Section -->
        <div
            class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-6 md:p-8 mt-8 border-2 border-blue-100 shadow-xl">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">JSON Best Practices & Tips</h2>
            <div class="space-y-4">
                <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 border-green-500">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">✓ Always Validate JSON</h3>
                    <p class="text-gray-700">Use a JSON validator to catch syntax errors before deploying to production.
                        Invalid JSON can break your application.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 border-blue-500">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">✓ Use Proper Indentation</h3>
                    <p class="text-gray-700">Format JSON with 2 or 4 space indentation for better readability during
                        development and debugging.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 border-purple-500">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">✓ Minify for Production</h3>
                    <p class="text-gray-700">Minify JSON data before deploying to production to reduce file size and improve
                        load times.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 border-orange-500">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">✓ Use Consistent Naming</h3>
                    <p class="text-gray-700">Follow camelCase or snake_case naming conventions consistently throughout your
                        JSON structure.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function formatJSON() {
            const jsonInput = $('#json').val().trim();

            if (!jsonInput) {
                showError('Please enter JSON data to format');
                return;
            }

            try {
                // Parse and format JSON
                const parsed = JSON.parse(jsonInput);
                const formatted = JSON.stringify(parsed, null, 2);

                // Display result
                $('#formattedJSON').text(formatted);
                $('#resultsSection').removeClass('hidden');
                $('#errorMessage').addClass('hidden');

                // Scroll to results
                setTimeout(() => {
                    $('#resultsSection')[0].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }, 100);
            } catch (error) {
                showError('Invalid JSON: ' + error.message);
            }
        }

        function minifyJSON() {
            const jsonInput = $('#json').val().trim();

            if (!jsonInput) {
                showError('Please enter JSON data to minify');
                return;
            }

            try {
                // Parse and minify JSON
                const parsed = JSON.parse(jsonInput);
                const minified = JSON.stringify(parsed);

                // Display result
                $('#formattedJSON').text(minified);
                $('#resultsSection').removeClass('hidden');
                $('#errorMessage').addClass('hidden');

                // Scroll to results
                setTimeout(() => {
                    $('#resultsSection')[0].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }, 100);
            } catch (error) {
                showError('Invalid JSON: ' + error.message);
            }
        }

        function copyJSON() {
            const json = $('#formattedJSON').text();
            navigator.clipboard.writeText(json).then(() => {
                const btn = event.target.closest('button');
                const originalHTML = btn.innerHTML;
                btn.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Copied!';
                btn.classList.add('bg-green-600', 'text-white', 'border-green-600');

                setTimeout(() => {
                    btn.innerHTML = originalHTML;
                    btn.classList.remove('bg-green-600', 'text-white', 'border-green-600');
                }, 2000);
            }).catch(err => {
                alert('Failed to copy. Please copy manually.');
            });
        }

        function showError(message) {
            $('#errorText').text(message);
            $('#errorMessage').removeClass('hidden');
            $('#resultsSection').addClass('hidden');
            setTimeout(() => {
                $('#errorMessage')[0].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }, 100);
        }
    </script>
@endsection