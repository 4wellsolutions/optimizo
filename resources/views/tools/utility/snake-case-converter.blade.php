@extends('layouts.app')

@section('title', __tool('snake-case-converter', 'meta.title'))
@section('meta_description', __tool('snake-case-converter', 'meta.description'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" icon="snake-case-converter" />

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-green-200 mb-8">
            <div class="mb-6">
                <label for="inputText"
                    class="block text-sm font-semibold text-gray-700 mb-2">{{ __tool('snake-case-converter', 'editor.label_input', 'Input Text') }}</label>
                <textarea id="inputText" rows="8"
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 font-mono text-sm resize-none"
                    placeholder="{{ __tool('snake-case-converter', 'editor.ph_input', 'my variable name') }}"></textarea>
            </div>
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convertText()"
                    class="px-8 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>{{ __tool('snake-case-converter', 'editor.btn_convert', 'Convert to snake_case') }}</span>
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>{{ __tool('snake-case-converter', 'editor.btn_clear', 'Clear') }}</span>
                </button>
                <button onclick="copyOutput()"
                    class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>{{ __tool('snake-case-converter', 'editor.btn_copy', 'Copy') }}</span>
                </button>
            </div>
            <div class="mb-4">
                <label for="outputText"
                    class="block text-sm font-semibold text-gray-700 mb-2">{{ __tool('snake-case-converter', 'editor.label_output', 'Output (snake_case)') }}</label>
                <textarea id="outputText" rows="8" readonly
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl bg-gray-50 font-mono text-sm resize-none"
                    placeholder="{{ __tool('snake-case-converter', 'editor.ph_output', 'my_variable_name') }}"></textarea>
            </div>
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>
        </div>

        <div
            class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-3xl p-8 md:p-12 border-2 border-green-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                        </path>
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">
                    {{ __tool('snake-case-converter', 'meta.h1', 'Free Snake Case Converter Tool') }}
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    {{ __tool('snake-case-converter', 'meta.subtitle', 'Convert text to snake_case for Python and databases') }}
                </p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {{ __tool('snake-case-converter', 'content.p1', "Transform your text into snake_case format with our free online converter. Snake_case uses lowercase letters with underscores separating words. It's the standard naming convention for Python variables, database columns, and configuration files.") }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">
                {{ __tool('snake-case-converter', 'content.features_title', '✨ Features') }}
            </h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🐍</div>
                    <h4 class="font-bold text-gray-900 mb-2">
                        {{ __tool('snake-case-converter', 'content.features.python.title', 'Python Standard') }}
                    </h4>
                    <p class="text-gray-600 text-sm">
                        {{ __tool('snake-case-converter', 'content.features.python.desc', 'Follows PEP 8 Python naming conventions') }}
                    </p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-emerald-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">
                        {{ __tool('snake-case-converter', 'content.features.instant.title', 'Instant Conversion') }}
                    </h4>
                    <p class="text-gray-600 text-sm">
                        {{ __tool('snake-case-converter', 'content.features.instant.desc', 'Convert to snake_case in milliseconds') }}
                    </p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">
                        {{ __tool('snake-case-converter', 'content.features.privacy.title', 'Privacy Protected') }}
                    </h4>
                    <p class="text-gray-600 text-sm">
                        {{ __tool('snake-case-converter', 'content.features.privacy.desc', 'All processing happens in your browser') }}
                    </p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-teal-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📝</div>
                    <h4 class="font-bold text-gray-900 mb-2">
                        {{ __tool('snake-case-converter', 'content.features.bulk.title', 'Bulk Processing') }}
                    </h4>
                    <p class="text-gray-600 text-sm">
                        {{ __tool('snake-case-converter', 'content.features.bulk.desc', 'Convert multiple names at once') }}
                    </p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-lime-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎯</div>
                    <h4 class="font-bold text-gray-900 mb-2">
                        {{ __tool('snake-case-converter', 'content.features.smart.title', 'Smart Formatting') }}
                    </h4>
                    <p class="text-gray-600 text-sm">
                        {{ __tool('snake-case-converter', 'content.features.smart.desc', 'Automatically handles spaces and special characters') }}
                    </p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🆓</div>
                    <h4 class="font-bold text-gray-900 mb-2">
                        {{ __tool('snake-case-converter', 'content.features.free.title', '100% Free') }}
                    </h4>
                    <p class="text-gray-600 text-sm">
                        {{ __tool('snake-case-converter', 'content.features.free.desc', 'No limits or registration required') }}
                    </p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">
                {{ __tool('snake-case-converter', 'content.uses_title', '🎯 Common Use Cases') }}
            </h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">
                        {{ __tool('snake-case-converter', 'content.uses.python.title', '🐍 Python Variables') }}
                    </h4>
                    <p class="text-gray-700 leading-relaxed">
                        {{ __tool('snake-case-converter', 'content.uses.python.desc', 'Create properly formatted variable and function names following PEP 8 standards') }}
                    </p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">
                        {{ __tool('snake-case-converter', 'content.uses.db.title', '🗄️ Database Columns') }}
                    </h4>
                    <p class="text-gray-700 leading-relaxed">
                        {{ __tool('snake-case-converter', 'content.uses.db.desc', 'Format table and column names for SQL databases and ORMs') }}
                    </p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">
                        {{ __tool('snake-case-converter', 'content.uses.config.title', '⚙️ Configuration Files') }}
                    </h4>
                    <p class="text-gray-700 leading-relaxed">
                        {{ __tool('snake-case-converter', 'content.uses.config.desc', 'Create config keys for YAML, JSON, and environment variables') }}
                    </p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">
                        {{ __tool('snake-case-converter', 'content.uses.ruby.title', '💎 Ruby Development') }}
                    </h4>
                    <p class="text-gray-700 leading-relaxed">
                        {{ __tool('snake-case-converter', 'content.uses.ruby.desc', 'Follow Ruby naming conventions for variables and methods') }}
                    </p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">
                        {{ __tool('snake-case-converter', 'content.uses.data.title', '📊 Data Science') }}
                    </h4>
                    <p class="text-gray-700 leading-relaxed">
                        {{ __tool('snake-case-converter', 'content.uses.data.desc', 'Format column names in pandas DataFrames and CSV files') }}
                    </p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">
                        {{ __tool('snake-case-converter', 'content.uses.api.title', '🔧 API Parameters') }}
                    </h4>
                    <p class="text-gray-700 leading-relaxed">
                        {{ __tool('snake-case-converter', 'content.uses.api.desc', 'Create consistent parameter names for REST APIs') }}
                    </p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">
                {{ __tool('snake-case-converter', 'content.how_to_title', '📚 How to Use') }}
            </h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-3 text-gray-700">
                    @foreach(__tool('snake-case-converter', 'content.how_to_steps') as $step)
                        <li class="flex items-start gap-3"><span
                                class="font-bold text-green-600 text-lg">{{ $loop->iteration }}.</span><span><strong>{{ $step['title'] }}:</strong>
                                {{ $step['desc'] }}</span></li>
                    @endforeach
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">
                {{ __tool('snake-case-converter', 'content.examples_title', '💡 Conversion Examples') }}
            </h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <div class="space-y-4">
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">
                            {{ __tool('snake-case-converter', 'content.examples.var.title', 'Variable Names:') }}
                        </p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">user name → user_name</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">
                            {{ __tool('snake-case-converter', 'content.examples.func.title', 'Function Names:') }}
                        </p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">calculate total → calculate_total
                        </p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">
                            {{ __tool('snake-case-converter', 'content.examples.db.title', 'Database Columns:') }}
                        </p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">first name → first_name</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">
                            {{ __tool('snake-case-converter', 'content.examples.config.title', 'Config Keys:') }}
                        </p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">max retry count → max_retry_count
                        </p>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">
                {{ __tool('snake-case-converter', 'content.faq_title', '❓ Frequently Asked Questions') }}
            </h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">
                        {{ __tool('snake-case-converter', 'content.faq.q1', 'What is snake_case?') }}
                    </h4>
                    <p class="text-gray-700 leading-relaxed">
                        {{ __tool('snake-case-converter', 'content.faq.a1', 'Snake_case is a naming convention where words are lowercase and separated by underscores. Example: my_variable_name') }}
                    </p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">
                        {{ __tool('snake-case-converter', 'content.faq.q2', 'When should I use snake_case?') }}
                    </h4>
                    <p class="text-gray-700 leading-relaxed">
                        {{ __tool('snake-case-converter', 'content.faq.a2', "Use snake_case for Python variables and functions, database column names, configuration keys, and Ruby method names. It's the standard in Python (PEP 8).") }}
                    </p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">
                        {{ __tool('snake-case-converter', 'content.faq.q3', 'How is snake_case different from kebab-case?') }}
                    </h4>
                    <p class="text-gray-700 leading-relaxed">
                        {{ __tool('snake-case-converter', 'content.faq.a3', 'Snake_case uses underscores (my_variable), while kebab-case uses hyphens (my-variable). Use snake_case for code, kebab-case for URLs and CSS.') }}
                    </p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">
                        {{ __tool('snake-case-converter', 'content.faq.q4', 'Does this handle numbers?') }}
                    </h4>
                    <p class="text-gray-700 leading-relaxed">
                        {{ __tool('snake-case-converter', 'content.faq.a4', 'Yes! The tool correctly handles numbers, preserving them while converting text (e.g., "user 2 profile" becomes "user_2_profile").') }}
                    </p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">
                        {{ __tool('snake-case-converter', 'content.faq.q5', 'Is this tool free?') }}
                    </h4>
                    <p class="text-gray-700 leading-relaxed">
                        {{ __tool('snake-case-converter', 'content.faq.a5', 'Yes! Completely free with no limits. All processing happens in your browser for privacy and speed.') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function convertText() {
                const input = document.getElementById('inputText').value;
                if (!input.trim()) {
                    showStatus("{{ __tool('snake-case-converter', 'js.error_empty', 'Please enter some text to convert') }}", 'error');
                    return;
                }
                const output = input.toLowerCase().replace(/[^a-zA-Z0-9]+/g, '_').replace(/^_+|_+$/g, '');
                document.getElementById('outputText').value = output;
                showStatus("{{ __tool('snake-case-converter', 'js.success_converted', '✓ Converted to snake_case successfully!') }}", 'success');
            }

            function clearAll() {
                document.getElementById('inputText').value = '';
                document.getElementById('outputText').value = '';
                document.getElementById('statusMessage').classList.add('hidden');
            }

            function copyOutput() {
                const output = document.getElementById('outputText');
                if (!output.value) {
                    showStatus("{{ __tool('snake-case-converter', 'js.error_no_copy', 'Nothing to copy! Please convert some text first.') }}", 'error');
                    return;
                }
                output.select();
                document.execCommand('copy');
                showStatus("{{ __tool('snake-case-converter', 'js.success_copy', '✓ Copied to clipboard!') }}", 'success');
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
