@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-6xl mx-auto">
        {{-- Hero Section --}}
        <x-tool-hero :tool="$tool" icon="pascal-case-converter" />

        {{-- Tool Section --}}
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-indigo-200 mb-8">
            <div class="mb-6">
                <label for="inputText" class="block text-sm font-semibold text-gray-700 mb-2">Input Text</label>
                <textarea id="inputText" rows="8"
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 font-mono text-sm resize-none"
                    placeholder="my class name"></textarea>
            </div>

            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convertText()"
                    class="px-8 py-3 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>Convert to PascalCase</span>
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

            <div class="mb-4">
                <label for="outputText" class="block text-sm font-semibold text-gray-700 mb-2">Output (PascalCase)</label>
                <textarea id="outputText" rows="8" readonly
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl bg-gray-50 font-mono text-sm resize-none"
                    placeholder="MyClassName"></textarea>
            </div>

            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>
        </div>

        {{-- SEO Content --}}
        <div
            class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-3xl p-8 md:p-12 border-2 border-indigo-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">Free Pascal Case Converter Tool</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Convert text to PascalCase for class names and types</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Transform your text into PascalCase format with our free online converter. PascalCase capitalizes the first
                letter of every word with no spaces or special characters. Ideal for class names, type definitions,
                component names, and object-oriented programming conventions.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ Features</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🏛️</div>
                    <h4 class="font-bold text-gray-900 mb-2">OOP Standard</h4>
                    <p class="text-gray-600 text-sm">Perfect for class names in Java, C#, TypeScript, and more</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">Instant Results</h4>
                    <p class="text-gray-600 text-sm">Convert to PascalCase in milliseconds</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">Privacy First</h4>
                    <p class="text-gray-600 text-sm">All processing happens locally in your browser</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📝</div>
                    <h4 class="font-bold text-gray-900 mb-2">Batch Conversion</h4>
                    <p class="text-gray-600 text-sm">Convert multiple class names at once</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎯</div>
                    <h4 class="font-bold text-gray-900 mb-2">Smart Formatting</h4>
                    <p class="text-gray-600 text-sm">Removes spaces and capitalizes each word automatically</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🆓</div>
                    <h4 class="font-bold text-gray-900 mb-2">100% Free</h4>
                    <p class="text-gray-600 text-sm">No registration or limits</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Common Use Cases</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🏗️ Class Names</h4>
                    <p class="text-gray-700 leading-relaxed">Create properly formatted class names for Java, C#, C++, and
                        other OOP languages</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">⚛️ React Components</h4>
                    <p class="text-gray-700 leading-relaxed">Name React, Vue, and Angular components following best
                        practices</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📘 TypeScript Types</h4>
                    <p class="text-gray-700 leading-relaxed">Format interface and type names in TypeScript projects</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🎨 CSS Modules</h4>
                    <p class="text-gray-700 leading-relaxed">Create component class names for CSS-in-JS and CSS modules</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔧 API Models</h4>
                    <p class="text-gray-700 leading-relaxed">Format data model and entity names in backend development</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📦 Package Names</h4>
                    <p class="text-gray-700 leading-relaxed">Create namespace and package names following conventions</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📚 How to Use</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-indigo-600 text-lg">1.</span>
                        <span><strong>Enter Text:</strong> Type the text you want to convert</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-indigo-600 text-lg">2.</span>
                        <span><strong>Click Convert:</strong> Press "Convert to PascalCase"</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-indigo-600 text-lg">3.</span>
                        <span><strong>Review Output:</strong> Check the PascalCase result</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-indigo-600 text-lg">4.</span>
                        <span><strong>Copy Result:</strong> Click "Copy" button</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-indigo-600 text-lg">5.</span>
                        <span><strong>Use in Code:</strong> Paste into your project</span>
                    </li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 Conversion Examples</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <div class="space-y-4">
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Class Names:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">user account → UserAccount</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Component Names:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">navigation bar → NavigationBar</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Type Definitions:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">product details → ProductDetails
                        </p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Model Names:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">shopping cart item →
                            ShoppingCartItem</p>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What is PascalCase?</h4>
                    <p class="text-gray-700 leading-relaxed">PascalCase is a naming convention where every word starts with
                        a capital letter and there are no spaces or special characters. Example: MyClassName</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">When should I use PascalCase?</h4>
                    <p class="text-gray-700 leading-relaxed">Use PascalCase for class names, interface names, type
                        definitions, React components, and any construct that represents a type or class in programming.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">How is PascalCase different from camelCase?</h4>
                    <p class="text-gray-700 leading-relaxed">PascalCase starts with an uppercase letter (MyClass), while
                        camelCase starts with lowercase (myVariable). Use PascalCase for types and classes, camelCase for
                        variables and methods.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Does this work with numbers?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! The tool handles numbers correctly, preserving them while
                        capitalizing the letters appropriately (e.g., "user 2 profile" becomes "User2Profile").</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is this tool free?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! Completely free with no limits. All processing happens in
                        your browser for maximum privacy and speed.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function convertText() {
            const input = document.getElementById('inputText').value;

            if (!input.trim()) {
                showStatus('Please enter some text to convert', 'error');
                return;
            }

            // Convert to PascalCase
            const output = input
                .toLowerCase()
                .replace(/[^a-zA-Z0-9]+(.)/g, (match, chr) => chr.toUpperCase())
                .replace(/^[a-z]/, (match) => match.toUpperCase());

            document.getElementById('outputText').value = output;
            showStatus('✓ Converted to PascalCase successfully!', 'success');
        }

        function clearAll() {
            document.getElementById('inputText').value = '';
            document.getElementById('outputText').value = '';
            document.getElementById('statusMessage').classList.add('hidden');
        }

        function copyOutput() {
            const output = document.getElementById('outputText');

            if (!output.value) {
                showStatus('Nothing to copy! Please convert some text first.', 'error');
                return;
            }

            output.select();
            document.execCommand('copy');
            showStatus('✓ Copied to clipboard!', 'success');
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
    </script>
@endsection