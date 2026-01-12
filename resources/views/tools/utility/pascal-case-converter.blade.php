@extends('layouts.app')

@section('title', __tool('pascal-case-converter', 'meta.h1'))
@section('meta_description', __tool('pascal-case-converter', 'meta.subtitle'))

@section('content')
    <div class="max-w-6xl mx-auto">
        {{-- Hero Section --}}
        <x-tool-hero :tool="$tool" icon="pascal-case-converter" />

        {{-- Tool Section --}}
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-indigo-200 mb-8">
            <div class="mb-6">
                <label for="inputText" class="block text-sm font-semibold text-gray-700 mb-2">{{ __tool('pascal-case-converter', 'editor.label_input', 'Input Text') }}</label>
                <textarea id="inputText" rows="8"
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 font-mono text-sm resize-none"
                    placeholder="{{ __tool('pascal-case-converter', 'editor.ph_input', 'my class name') }}"></textarea>
            </div>

            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convertText()"
                    class="px-8 py-3 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>{{ __tool('pascal-case-converter', 'editor.btn_convert', 'Convert to PascalCase') }}</span>
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>{{ __tool('pascal-case-converter', 'editor.btn_clear', 'Clear') }}</span>
                </button>
                <button onclick="copyOutput()"
                    class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>{{ __tool('pascal-case-converter', 'editor.btn_copy', 'Copy') }}</span>
                </button>
            </div>

            <div class="mb-4">
                <label for="outputText" class="block text-sm font-semibold text-gray-700 mb-2">{{ __tool('pascal-case-converter', 'editor.label_output', 'Output (PascalCase)') }}</label>
                <textarea id="outputText" rows="8" readonly
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl bg-gray-50 font-mono text-sm resize-none"
                    placeholder="{{ __tool('pascal-case-converter', 'editor.ph_output', 'MyClassName') }}"></textarea>
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
                <h2 class="text-4xl font-black text-gray-900 mb-3">{{ __tool('pascal-case-converter', 'content.hero_title', 'Free Pascal Case Converter Tool') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __tool('pascal-case-converter', 'content.hero_subtitle', 'Convert text to PascalCase for class names and types') }}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {{ __tool('pascal-case-converter', 'content.p1', 'Transform your text into PascalCase format with our free online converter. PascalCase capitalizes the first letter of every word with no spaces or special characters. Ideal for class names, type definitions, component names, and object-oriented programming conventions.') }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('pascal-case-converter', 'content.features_title', '✨ Features') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🏛️</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('pascal-case-converter', 'content.features.oop.title', 'OOP Standard') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('pascal-case-converter', 'content.features.oop.desc', 'Perfect for class names in Java, C#, TypeScript, and more') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('pascal-case-converter', 'content.features.instant.title', 'Instant Results') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('pascal-case-converter', 'content.features.instant.desc', 'Convert to PascalCase in milliseconds') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('pascal-case-converter', 'content.features.privacy.title', 'Privacy First') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('pascal-case-converter', 'content.features.privacy.desc', 'All processing happens locally in your browser') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📝</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('pascal-case-converter', 'content.features.batch.title', 'Batch Conversion') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('pascal-case-converter', 'content.features.batch.desc', 'Convert multiple class names at once') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎯</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('pascal-case-converter', 'content.features.smart.title', 'Smart Formatting') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('pascal-case-converter', 'content.features.smart.desc', 'Removes spaces and capitalizes each word automatically') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🆓</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('pascal-case-converter', 'content.features.free.title', '100% Free') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('pascal-case-converter', 'content.features.free.desc', 'No registration or limits') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('pascal-case-converter', 'content.uses_title', '🎯 Common Use Cases') }}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('pascal-case-converter', 'content.uses.class.title', '🏗️ Class Names') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('pascal-case-converter', 'content.uses.class.desc', 'Create properly formatted class names for Java, C#, C++, and other OOP languages') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('pascal-case-converter', 'content.uses.react.title', '⚛️ React Components') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('pascal-case-converter', 'content.uses.react.desc', 'Name React, Vue, and Angular components following best practices') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('pascal-case-converter', 'content.uses.ts.title', '📘 TypeScript Types') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('pascal-case-converter', 'content.uses.ts.desc', 'Format interface and type names in TypeScript projects') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('pascal-case-converter', 'content.uses.css.title', '🎨 CSS Modules') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('pascal-case-converter', 'content.uses.css.desc', 'Create component class names for CSS-in-JS and CSS modules') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('pascal-case-converter', 'content.uses.api.title', '🔧 API Models') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('pascal-case-converter', 'content.uses.api.desc', 'Format data model and entity names in backend development') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('pascal-case-converter', 'content.uses.pkg.title', '📦 Package Names') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('pascal-case-converter', 'content.uses.pkg.desc', 'Create namespace and package names following conventions') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('pascal-case-converter', 'content.how_title', '📚 How to Use') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-indigo-600 text-lg">1.</span>
                        <span><strong>{{ __tool('pascal-case-converter', 'content.how_steps.1.title', 'Enter Text:') }}</strong> {{ __tool('pascal-case-converter', 'content.how_steps.1.desc', 'Type the text you want to convert') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-indigo-600 text-lg">2.</span>
                        <span><strong>{{ __tool('pascal-case-converter', 'content.how_steps.2.title', 'Click Convert:') }}</strong> {{ __tool('pascal-case-converter', 'content.how_steps.2.desc', 'Press "Convert to PascalCase"') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-indigo-600 text-lg">3.</span>
                        <span><strong>{{ __tool('pascal-case-converter', 'content.how_steps.3.title', 'Review Output:') }}</strong> {{ __tool('pascal-case-converter', 'content.how_steps.3.desc', 'Check the PascalCase result') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-indigo-600 text-lg">4.</span>
                        <span><strong>{{ __tool('pascal-case-converter', 'content.how_steps.4.title', 'Copy Result:') }}</strong> {{ __tool('pascal-case-converter', 'content.how_steps.4.desc', 'Click "Copy" button') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-indigo-600 text-lg">5.</span>
                        <span><strong>{{ __tool('pascal-case-converter', 'content.how_steps.5.title', 'Use in Code:') }}</strong> {{ __tool('pascal-case-converter', 'content.how_steps.5.desc', 'Paste into your project') }}</span>
                    </li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6 font-primary">{{ __tool('pascal-case-converter', 'content.examples_title') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <div class="space-y-4">
                    @foreach(__tool('pascal-case-converter', 'content.samples') as $key => $sample)
                        <div>
                            <p class="font-semibold text-gray-900 mb-2">{{ $sample['title'] }}</p>
                            <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded shadow-sm">{{ $sample['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('pascal-case-converter', 'content.faq_title', '❓ Frequently Asked Questions') }}</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('pascal-case-converter', 'content.faq.q1', 'What is PascalCase?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('pascal-case-converter', 'content.faq.a1', 'PascalCase is a naming convention where every word starts with a capital letter and there are no spaces or special characters. Example: MyClassName') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('pascal-case-converter', 'content.faq.q2', 'When should I use PascalCase?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('pascal-case-converter', 'content.faq.a2', 'Use PascalCase for class names, interface names, type definitions, React components, and any construct that represents a type or class in programming.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('pascal-case-converter', 'content.faq.q3', 'How is PascalCase different from camelCase?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('pascal-case-converter', 'content.faq.a3', 'PascalCase starts with an uppercase letter (MyClass), while camelCase starts with lowercase (myVariable). Use PascalCase for types and classes, camelCase for variables and methods.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('pascal-case-converter', 'content.faq.q4', 'Does this work with numbers?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('pascal-case-converter', 'content.faq.a4', 'Yes! The tool handles numbers correctly, preserving them while capitalizing the letters appropriately (e.g., "user 2 profile" becomes "User2Profile").') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('pascal-case-converter', 'content.faq.q5', 'Is this tool free?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('pascal-case-converter', 'content.faq.a5', 'Yes! Completely free with no limits. All processing happens in your browser for maximum privacy and speed.') }}</p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function convertText() {
            const input = document.getElementById('inputText').value;

            if (!input.trim()) {
                showStatus("{{ __tool('pascal-case-converter', 'js.error_empty', 'Please enter some text to convert') }}", 'error');
                return;
            }

            // Convert to PascalCase
            const output = input
                .toLowerCase()
                .replace(/[^a-zA-Z0-9]+(.)/g, (match, chr) => chr.toUpperCase())
                .replace(/^[a-z]/, (match) => match.toUpperCase());

            document.getElementById('outputText').value = output;
            showStatus("{{ __tool('pascal-case-converter', 'js.success_convert', 'Converted to PascalCase successfully!') }}", 'success');
        }

        function clearAll() {
            document.getElementById('inputText').value = '';
            document.getElementById('outputText').value = '';
            document.getElementById('statusMessage').classList.add('hidden');
        }

        function copyOutput() {
            const output = document.getElementById('outputText');

            if (!output.value) {
                showStatus("{{ __tool('pascal-case-converter', 'js.error_copy', 'Nothing to copy! Please convert some text first.') }}", 'error');
                return;
            }

            output.select();
            document.execCommand('copy');
            showStatus("{{ __tool('pascal-case-converter', 'js.success_copy', 'Copied to clipboard!') }}", 'success');
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
    @endpush
@endsection