@extends('layouts.app')

@section('title', $tool->meta_title)
@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Hero Section -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-purple-500 via-indigo-500 to-blue-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">
                    JSON Parser
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                    Parse, validate, and visualize JSON data instantly - 100% free and secure!
                </p>
                <label for="jsonInput" class="block text-sm font-semibold text-gray-700 mb-2">
                    JSON Input
                </label>
                <textarea id="jsonInput"
                    class="w-full h-64 p-4 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent font-mono text-sm"
                    placeholder='{"name": "John", "age": 30, "city": "New York"}'></textarea>
            </div>

            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="parseJSON()"
                    class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors duration-200 font-semibold">
                    Parse JSON
                </button>
                <button onclick="beautifyJSON()"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                    Beautify
                </button>
                <button onclick="minifyJSON()"
                    class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200">
                    Minify
                </button>
                <button onclick="clearJSON()"
                    class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors duration-200">
                    Clear
                </button>
                <button onclick="loadSample()"
                    class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors duration-200">
                    Load Sample
                </button>
            </div>

            <!-- Status Message -->
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl"></div>

            <!-- Tree View -->
            <div id="treeView" class="hidden">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">JSON Tree View</h3>
                <div id="treeContent"
                    class="bg-gray-50 rounded-xl p-4 border-2 border-gray-200 font-mono text-sm overflow-auto max-h-96">
                </div>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- SEO Content Section -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">What is a JSON Parser?</h2>
            <p class="text-gray-700 mb-4">
                A JSON Parser is an essential tool for developers that validates, formats, and analyzes JSON (JavaScript
                Object Notation) data. JSON is the most widely used data format for APIs, configuration files, and data
                exchange between applications. Our JSON parser helps you quickly validate JSON syntax, identify errors,
                beautify messy JSON, minify for production, and visualize complex JSON structures with an interactive tree
                view. Whether you're debugging API responses, working with configuration files, or learning JSON, our parser
                makes it easy.
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Why Use Our JSON Parser?</h2>
            <p class="text-gray-700 mb-4">
                Our free JSON parser offers comprehensive features for working with JSON data. It instantly validates your
                JSON and highlights syntax errors with clear error messages, making debugging fast and efficient. The
                beautify feature formats messy or minified JSON into a readable, properly indented structure. The minify
                feature removes all whitespace to reduce file size for production use. The tree view visualizes complex
                nested JSON structures, making it easy to understand data hierarchy. All processing happens in your browser,
                ensuring your data remains private and secure.
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Key Features</h2>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
                <li><strong>JSON Validation:</strong> Instantly detect syntax errors with detailed error messages</li>
                <li><strong>Beautify JSON:</strong> Format messy JSON with proper indentation and spacing</li>
                <li><strong>Minify JSON:</strong> Remove whitespace to reduce file size</li>
                <li><strong>Tree View:</strong> Visualize JSON structure with expandable/collapsible nodes</li>
                <li><strong>Error Detection:</strong> Identify and locate JSON syntax errors quickly</li>
                <li><strong>Sample Data:</strong> Load example JSON to test the parser</li>
                <li><strong>Secure & Private:</strong> All processing happens in your browser</li>
                <li><strong>Free to Use:</strong> No registration or payment required</li>
            </ul>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">How to Use the JSON Parser</h2>
            <ol class="list-decimal list-inside text-gray-700 space-y-2 mb-4">
                <li>Paste or type your JSON data into the input field</li>
                <li>Click "Parse JSON" to validate and analyze the data</li>
                <li>View validation results and any error messages</li>
                <li>Use "Beautify" to format JSON with proper indentation</li>
                <li>Use "Minify" to compress JSON by removing whitespace</li>
                <li>Explore the tree view to understand JSON structure</li>
                <li>Click "Load Sample" to see example JSON data</li>
            </ol>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Common Use Cases</h2>
            <p class="text-gray-700 mb-4">
                JSON parsers are indispensable tools for modern web development. Developers use them to validate API
                responses and ensure data integrity. When debugging, parsers help identify syntax errors in JSON
                configuration files. Data analysts use JSON parsers to explore and understand complex data structures from
                APIs. DevOps engineers validate JSON configuration files before deployment. Students learning JSON can
                experiment with different structures and see immediate validation feedback. Content creators working with
                JSON-based content management systems use parsers to verify data format.
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Understanding JSON Format</h2>
            <p class="text-gray-700 mb-4">
                JSON (JavaScript Object Notation) is a lightweight data interchange format that's easy for humans to read
                and write, and easy for machines to parse and generate. JSON is built on two structures: objects
                (collections of name/value pairs enclosed in curly braces) and arrays (ordered lists of values enclosed in
                square brackets). Values can be strings, numbers, booleans, null, objects, or arrays. Proper JSON syntax
                requires double quotes for strings and keys, commas between elements, and no trailing commas. Understanding
                these rules is essential for working with APIs and modern web applications.
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">JSON Best Practices</h2>
            <p class="text-gray-700 mb-4">
                When working with JSON, follow best practices to ensure clean, maintainable data structures. Use descriptive
                key names that clearly indicate the data they contain. Keep JSON structures as flat as possible to improve
                readability and performance. Validate JSON before using it in production to catch errors early. Use
                consistent naming conventions (camelCase or snake_case) throughout your JSON. Avoid deeply nested structures
                when possible. For large datasets, consider pagination or chunking. Always escape special characters in
                strings. These practices lead to more reliable and maintainable applications.
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Common JSON Errors</h2>
            <p class="text-gray-700 mb-4">
                Understanding common JSON errors helps you debug faster. Missing or extra commas are frequent issues - JSON
                requires commas between elements but not after the last element. Using single quotes instead of double
                quotes for strings or keys causes parsing errors. Trailing commas at the end of objects or arrays are not
                allowed in standard JSON. Unescaped special characters in strings can break parsing. Missing closing
                brackets or braces create syntax errors. Our JSON parser detects these errors and provides clear messages to
                help you fix them quickly.
            </p>
        </div>

        <!-- FAQ Section -->
        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl shadow-xl p-6 md:p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Frequently Asked Questions</h2>

            <div class="space-y-4">
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Is this JSON parser free to use?</h3>
                    <p class="text-gray-700">
                        Yes, our JSON parser is completely free with no limitations. You can parse, validate, beautify, and
                        minify as much JSON data as you need. There are no registration requirements, usage limits, or
                        hidden fees.
                    </p>
                </div>

                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Is my JSON data stored or shared?</h3>
                    <p class="text-gray-700">
                        No, all JSON parsing and validation happens entirely in your browser. Your data is never sent to our
                        servers, stored, or shared with anyone. When you close the page, your data is gone. This ensures
                        complete privacy and security for sensitive JSON data.
                    </p>
                </div>

                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">What's the difference between beautify and minify?</h3>
                    <p class="text-gray-700">
                        Beautify formats JSON with proper indentation and line breaks, making it easy to read and
                        understand. Minify removes all unnecessary whitespace and line breaks, creating compact JSON that's
                        smaller in file size. Use beautify for development and debugging, and minify for production to
                        reduce bandwidth and improve load times.
                    </p>
                </div>

                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Can this parser handle large JSON files?</h3>
                    <p class="text-gray-700">
                        Yes, our JSON parser can handle large JSON files efficiently since all processing happens in your
                        browser using JavaScript. However, extremely large files (several megabytes) may take longer to
                        process depending on your device's performance. For best results, we recommend files under 10MB.
                    </p>
                </div>

                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">What types of JSON errors can this parser detect?</h3>
                    <p class="text-gray-700">
                        Our parser detects all common JSON syntax errors including missing or extra commas, incorrect quote
                        usage, unescaped characters, missing brackets or braces, invalid data types, and trailing commas.
                        The parser provides clear error messages indicating the line and position of the error, making it
                        easy to fix issues quickly.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const jsonInput = document.getElementById('jsonInput');
        const statusMessage = document.getElementById('statusMessage');
        const treeView = document.getElementById('treeView');
        const treeContent = document.getElementById('treeContent');

        function showMessage(message, type) {
            statusMessage.className = `mb-6 p-4 rounded-xl ${type === 'success' ? 'bg-green-100 text-green-800 border-2 border-green-300' : 'bg-red-100 text-red-800 border-2 border-red-300'}`;
            statusMessage.textContent = message;
            statusMessage.classList.remove('hidden');
        }

        function hideMessage() {
            statusMessage.classList.add('hidden');
        }

        function parseJSON() {
            hideMessage();
            treeView.classList.add('hidden');

            const input = jsonInput.value.trim();
            if (!input) {
                showMessage('Please enter JSON data to parse', 'error');
                return;
            }

            try {
                const parsed = JSON.parse(input);
                showMessage('✓ Valid JSON! Parsed successfully.', 'success');
                displayTree(parsed);
                treeView.classList.remove('hidden');
            } catch (error) {
                showMessage(`✗ Invalid JSON: ${error.message}`, 'error');
            }
        }

        function beautifyJSON() {
            const input = jsonInput.value.trim();
            if (!input) {
                showMessage('Please enter JSON data to beautify', 'error');
                return;
            }

            try {
                const parsed = JSON.parse(input);
                jsonInput.value = JSON.stringify(parsed, null, 2);
                showMessage('✓ JSON beautified successfully!', 'success');
            } catch (error) {
                showMessage(`✗ Cannot beautify invalid JSON: ${error.message}`, 'error');
            }
        }

        function minifyJSON() {
            const input = jsonInput.value.trim();
            if (!input) {
                showMessage('Please enter JSON data to minify', 'error');
                return;
            }

            try {
                const parsed = JSON.parse(input);
                jsonInput.value = JSON.stringify(parsed);
                showMessage('✓ JSON minified successfully!', 'success');
            } catch (error) {
                showMessage(`✗ Cannot minify invalid JSON: ${error.message}`, 'error');
            }
        }

        function clearJSON() {
            jsonInput.value = '';
            hideMessage();
            treeView.classList.add('hidden');
        }

        function loadSample() {
            jsonInput.value = `{
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
                },
                "preferences": {
                  "theme": "dark",
                  "notifications": true,
                  "language": "en"
                }
              },
              "metadata": {
                "createdAt": "2024-01-15T10:30:00Z",
                "updatedAt": "2024-12-30T15:45:00Z",
                "version": "2.1.0"
              }
            }`;
            hideMessage();
            treeView.classList.add('hidden');
        }

        function displayTree(obj, indent = 0) {
            let html = '';
            const indentStr = '  '.repeat(indent);

            if (Array.isArray(obj)) {
                html += `${indentStr}<span class="text-gray-600">[</span>\n`;
                obj.forEach((item, index) => {
                    html += displayTree(item, indent + 1);
                    if (index < obj.length - 1) html += '<span class="text-gray-600">,</span>';
                    html += '\n';
                });
                html += `${indentStr}<span class="text-gray-600">]</span>`;
            } else if (typeof obj === 'object' && obj !== null) {
                html += `${indentStr}<span class="text-gray-600">{</span>\n`;
                const keys = Object.keys(obj);
                keys.forEach((key, index) => {
                    html += `${indentStr}  <span class="text-blue-600">"${key}"</span><span class="text-gray-600">:</span> `;
                    const value = obj[key];
                    if (typeof value === 'object' && value !== null) {
                        html += '\n' + displayTree(value, indent + 1);
                    } else {
                        html += formatValue(value);
                    }
                    if (index < keys.length - 1) html += '<span class="text-gray-600">,</span>';
                    html += '\n';
                });
                html += `${indentStr}<span class="text-gray-600">}</span>`;
            } else {
                html += `${indentStr}${formatValue(obj)}`;
            }

            if (indent === 0) {
                treeContent.innerHTML = html;
            }
            return html;
        }

        function formatValue(value) {
            if (typeof value === 'string') {
                return `<span class="text-green-600">"${value}"</span>`;
            } else if (typeof value === 'number') {
                return `<span class="text-purple-600">${value}</span>`;
            } else if (typeof value === 'boolean') {
                return `<span class="text-orange-600">${value}</span>`;
            } else if (value === null) {
                return `<span class="text-red-600">null</span>`;
            }
            return value;
        }

        // Load sample on page load
        window.addEventListener('load', loadSample);
    </script>
@endsection