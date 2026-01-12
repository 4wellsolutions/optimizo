@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-6xl mx-auto">
        {{-- Hero Section --}}
        <x-tool-hero :tool="$tool" />

        {{-- Tool Section --}}
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-indigo-200 mb-8">
            {{-- Controls --}}
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label
                        class="block text-sm font-semibold text-gray-700 mb-2">{!! __tool('code-formatter', 'editor.label_language') !!}</label>
                    <div class="relative">
                        <select id="language"
                            class="w-full pl-4 pr-10 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 appearance-none cursor-pointer font-medium text-gray-700">
                            <option value="html">{!! __tool('code-formatter', 'editor.languages.html') !!}</option>
                            <option value="css">{!! __tool('code-formatter', 'editor.languages.css') !!}</option>
                            <option value="js">{!! __tool('code-formatter', 'editor.languages.js') !!}</option>
                            <option value="json">{!! __tool('code-formatter', 'editor.languages.json') !!}</option>
                            <option value="xml">{!! __tool('code-formatter', 'editor.languages.xml') !!}</option>
                            <option value="sql">{!! __tool('code-formatter', 'editor.languages.sql') !!}</option>
                            <option value="php">{!! __tool('code-formatter', 'editor.languages.php') !!}</option>
                        </select>
                        <div class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-gray-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div>
                    <label
                        class="block text-sm font-semibold text-gray-700 mb-2">{!! __tool('code-formatter', 'editor.label_indent') !!}</label>
                    <div class="relative">
                        <select id="indentSize"
                            class="w-full pl-4 pr-10 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 appearance-none cursor-pointer font-medium text-gray-700">
                            <option value="2">{!! __tool('code-formatter', 'editor.indents.2') !!}</option>
                            <option value="4" selected>{!! __tool('code-formatter', 'editor.indents.4') !!}</option>
                            <option value="\t">{!! __tool('code-formatter', 'editor.indents.tab') !!}</option>
                        </select>
                        <div class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-gray-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="flex items-end">
                    <button onclick="formatCode()"
                        class="w-full py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-all font-semibold shadow-lg hover:shadow-indigo-200 active:transform active:scale-95 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        {!! __tool('code-formatter', 'editor.btn_format') !!}
                    </button>
                </div>
            </div>

            {{-- Editor Area --}}
            <div class="grid md:grid-cols-2 gap-4 h-[600px]">
                <div class="flex flex-col h-full">
                    <div class="flex justify-between items-center mb-2 px-1">
                        <label
                            class="text-sm font-semibold text-gray-700">{!! __tool('code-formatter', 'editor.label_input') !!}</label>
                        <button onclick="document.getElementById('inputCode').value = ''"
                            class="text-xs text-red-500 hover:text-red-700 font-medium">
                            {!! __tool('code-formatter', 'editor.btn_clear') !!}
                        </button>
                    </div>
                    <textarea id="inputCode"
                        class="flex-1 w-full p-4 bg-gray-900 text-gray-100 font-mono text-sm rounded-xl border border-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-transparent resize-none leading-relaxed"
                        placeholder="{!! __tool('code-formatter', 'editor.ph_input') !!}"></textarea>
                </div>

                <div class="flex flex-col h-full">
                    <div class="flex justify-between items-center mb-2 px-1">
                        <label
                            class="text-sm font-semibold text-gray-700">{!! __tool('code-formatter', 'editor.label_output') !!}</label>
                        <button onclick="copyOutput()"
                            class="text-xs text-indigo-600 hover:text-indigo-800 font-medium flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                            {!! __tool('code-formatter', 'editor.btn_copy') !!}
                        </button>
                    </div>
                    <textarea id="outputCode" readonly
                        class="flex-1 w-full p-4 bg-gray-50 text-gray-800 font-mono text-sm rounded-xl border-2 border-gray-200 focus:ring-2 focus:ring-green-500 focus:border-transparent resize-none leading-relaxed"
                        placeholder="{!! __tool('code-formatter', 'editor.ph_output') !!}"></textarea>
                </div>
            </div>

            <div id="statusMessage" class="hidden mt-4 p-4 rounded-xl font-semibold text-center max-w-md mx-auto"></div>
        </div>

        {{-- SEO Content --}}
        <div
            class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-3xl p-8 md:p-12 border-2 border-indigo-100 shadow-xl">
            <div class="max-w-4xl mx-auto">
                {{-- About Section --}}
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-4 tracking-tight">
                        {!! __tool('code-formatter', 'content.hero_title') !!}</h2>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        {!! __tool('code-formatter', 'content.p1') !!}
                    </p>
                </div>

                {{-- Features Grid --}}
                <div class="grid md:grid-cols-2 gap-8 mb-16">
                    <div
                        class="bg-white p-6 rounded-2xl shadow-sm border border-indigo-100 hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center mb-4 text-2xl">⚡
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">
                            {!! __tool('code-formatter', 'content.features.multi.title') !!}</h3>
                        <p class="text-gray-600">{!! __tool('code-formatter', 'content.features.multi.desc') !!}</p>
                    </div>
                    <div
                        class="bg-white p-6 rounded-2xl shadow-sm border border-pink-100 hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 bg-pink-100 rounded-xl flex items-center justify-center mb-4 text-2xl">🎨
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">
                            {!! __tool('code-formatter', 'content.features.indent.title') !!}</h3>
                        <p class="text-gray-600">{!! __tool('code-formatter', 'content.features.indent.desc') !!}</p>
                    </div>
                    <div
                        class="bg-white p-6 rounded-2xl shadow-sm border border-purple-100 hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center mb-4 text-2xl">🚀
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">
                            {!! __tool('code-formatter', 'content.features.instant.title') !!}</h3>
                        <p class="text-gray-600">{!! __tool('code-formatter', 'content.features.instant.desc') !!}</p>
                    </div>
                    <div
                        class="bg-white p-6 rounded-2xl shadow-sm border border-teal-100 hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 bg-teal-100 rounded-xl flex items-center justify-center mb-4 text-2xl">🔒
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">
                            {!! __tool('code-formatter', 'content.features.privacy.title') !!}</h3>
                        <p class="text-gray-600">{!! __tool('code-formatter', 'content.features.privacy.desc') !!}</p>
                    </div>
                </div>

                {{-- Supported Languages --}}
                <div class="mb-16">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                        {!! __tool('code-formatter', 'content.langs_title') !!}
                    </h3>
                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="bg-white p-5 rounded-xl border border-gray-200">
                            <strong
                                class="block text-indigo-600 mb-1">{!! __tool('code-formatter', 'content.langs.web.title') !!}</strong>
                            <span
                                class="text-gray-600 text-sm">{!! __tool('code-formatter', 'content.langs.web.desc') !!}</span>
                        </div>
                        <div class="bg-white p-5 rounded-xl border border-gray-200">
                            <strong
                                class="block text-purple-600 mb-1">{!! __tool('code-formatter', 'content.langs.data.title') !!}</strong>
                            <span
                                class="text-gray-600 text-sm">{!! __tool('code-formatter', 'content.langs.data.desc') !!}</span>
                        </div>
                        <div class="bg-white p-5 rounded-xl border border-gray-200">
                            <strong
                                class="block text-pink-600 mb-1">{!! __tool('code-formatter', 'content.langs.backend.title') !!}</strong>
                            <span
                                class="text-gray-600 text-sm">{!! __tool('code-formatter', 'content.langs.backend.desc') !!}</span>
                        </div>
                    </div>
                </div>

                {{-- Why Format Code --}}
                <div class="bg-indigo-900 text-white rounded-2xl p-8 mb-16 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-indigo-800 rounded-full -mr-32 -mt-32 opacity-50"></div>
                    <div class="relative z-10">
                        <h3 class="text-2xl font-bold mb-6">{!! __tool('code-formatter', 'content.why_title') !!}</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start gap-3">
                                <span class="bg-indigo-700 p-1 rounded text-sm">👁️</span>
                                <div>
                                    <strong
                                        class="block text-indigo-200">{!! __tool('code-formatter', 'content.why.read.title') !!}</strong>
                                    <span
                                        class="text-indigo-100 text-sm">{!! __tool('code-formatter', 'content.why.read.desc') !!}</span>
                                </div>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="bg-indigo-700 p-1 rounded text-sm">🐛</span>
                                <div>
                                    <strong
                                        class="block text-indigo-200">{!! __tool('code-formatter', 'content.why.debug.title') !!}</strong>
                                    <span
                                        class="text-indigo-100 text-sm">{!! __tool('code-formatter', 'content.why.debug.desc') !!}</span>
                                </div>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="bg-indigo-700 p-1 rounded text-sm">🤝</span>
                                <div>
                                    <strong
                                        class="block text-indigo-200">{!! __tool('code-formatter', 'content.why.collab.title') !!}</strong>
                                    <span
                                        class="text-indigo-100 text-sm">{!! __tool('code-formatter', 'content.why.collab.desc') !!}</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- FAQ --}}
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">{!! __tool('code-formatter', 'content.faq_title') !!}
                    </h3>
                    <div class="space-y-4">
                        <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                            <h4 class="font-bold text-gray-800 mb-2">{!! __tool('code-formatter', 'content.faq.q1') !!}</h4>
                            <p class="text-gray-600 text-sm">{!! __tool('code-formatter', 'content.faq.a1') !!}</p>
                        </div>
                        <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                            <h4 class="font-bold text-gray-800 mb-2">{!! __tool('code-formatter', 'content.faq.q2') !!}</h4>
                            <p class="text-gray-600 text-sm">{!! __tool('code-formatter', 'content.faq.a2') !!}</p>
                        </div>
                        <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                            <h4 class="font-bold text-gray-800 mb-2">{!! __tool('code-formatter', 'content.faq.q3') !!}</h4>
                            <p class="text-gray-600 text-sm">{!! __tool('code-formatter', 'content.faq.a3') !!}</p>
                        </div>
                        <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                            <h4 class="font-bold text-gray-800 mb-2">{!! __tool('code-formatter', 'content.faq.q4') !!}</h4>
                            <p class="text-gray-600 text-sm">{!! __tool('code-formatter', 'content.faq.a4') !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.14.7/beautify.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.14.7/beautify-css.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.14.7/beautify-html.min.js"></script>
        <script>
            const formatMsgs = {
                empty: "{!! __tool('code-formatter', 'js.error_empty') !!}",
                successFormat: "{!! __tool('code-formatter', 'js.success_format') !!}",
                errorFormat: "{!! __tool('code-formatter', 'js.error_format') !!}",
                noCopy: "{!! __tool('code-formatter', 'js.no_copy') !!}",
                successCopy: "{!! __tool('code-formatter', 'js.success_copy') !!}"
            };

            function formatCode() {
                const input = document.getElementById('inputCode').value;
                const language = document.getElementById('language').value;
                const indentSize = document.getElementById('indentSize').value;

                if (!input.trim()) {
                    showStatus(formatMsgs.empty, 'error');
                    return;
                }

                try {
                    let formatted = '';
                    const options = {
                        indent_size: indentSize === '\\t' ? 1 : parseInt(indentSize),
                        indent_char: indentSize === '\\t' ? '\t' : ' ',
                        max_preserve_newlines: 2,
                        preserve_newlines: true,
                        keep_array_indentation: false,
                        break_chained_methods: false,
                        indent_scripts: 'normal',
                        brace_style: 'collapse',
                        space_before_conditional: true,
                        unescape_strings: false,
                        jslint_happy: false,
                        end_with_newline: false,
                        wrap_line_length: 0,
                        indent_inner_html: false,
                        comma_first: false,
                        e4x: false,
                        indent_empty_lines: false
                    };

                    switch (language) {
                        case 'html':
                        case 'xml':
                        case 'php': // Basic indentation for PHP embedded in HTML
                            formatted = html_beautify(input, options);
                            break;
                        case 'css':
                            formatted = css_beautify(input, options);
                            break;
                        case 'js':
                        case 'json':
                            formatted = js_beautify(input, options);
                            break;
                        case 'sql':
                            // Simple custom SQL formatter since js-beautify doesn't support it standard
                            formatted = formatSQL(input, options.indent_char.repeat(options.indent_size));
                            break;
                        default:
                            formatted = input;
                    }

                    document.getElementById('outputCode').value = formatted;
                    showStatus(formatMsgs.successFormat, 'success');
                } catch (error) {
                    console.error(error);
                    showStatus(formatMsgs.errorFormat + error.message, 'error');
                }
            }

            // Basic SQL Formatter Helper
            function formatSQL(sql, indent) {
                const keywords = ['SELECT', 'FROM', 'WHERE', 'AND', 'OR', 'ORDER BY', 'GROUP BY', 'HAVING', 'LIMIT', 'INSERT INTO', 'VALUES', 'UPDATE', 'SET', 'DELETE', 'CREATE TABLE', 'ALTER TABLE', 'DROP TABLE', 'JOIN', 'LEFT JOIN', 'RIGHT JOIN', 'INNER JOIN', 'OUTER JOIN', 'ON', 'AS', 'DISTINCT', 'COUNT', 'SUM', 'AVG', 'MAX', 'MIN'];

                let formatted = sql;

                // Normalize spaces
                formatted = formatted.replace(/\s+/g, ' ').trim();

                // Uppercase keywords
                keywords.forEach(kw => {
                    const regex = new RegExp(`\\b${kw}\\b`, 'gi');
                    formatted = formatted.replace(regex, kw);
                });

                // Add newlines and indentation
                formatted = formatted.replace(/\s+(SELECT|FROM|WHERE|ORDER BY|GROUP BY|HAVING|LIMIT|INSERT INTO|VALUES|UPDATE|SET|DELETE|CREATE|ALTER|DROP|JOIN|LEFT|RIGHT|INNER|OUTER)\s+/g, '\n$1 ');
                formatted = formatted.replace(/\s+(AND|OR)\s+/g, `\n${indent}$1 `);
                formatted = formatted.replace(/,/g, `,\n${indent}`);

                return formatted;
            }

            function copyOutput() {
                const output = document.getElementById('outputCode');
                if (!output.value.trim()) {
                    showStatus(formatMsgs.noCopy, 'error');
                    return;
                }
                output.select();
                document.execCommand('copy');
                showStatus(formatMsgs.successCopy, 'success');
            }

            function showStatus(message, type) {
                const status = document.getElementById('statusMessage');
                status.textContent = message;
                status.classList.remove('hidden', 'bg-red-100', 'text-red-700', 'bg-green-100', 'text-green-700');

                if (type === 'error') {
                    status.classList.add('bg-red-100', 'text-red-700');
                } else {
                    status.classList.add('bg-green-100', 'text-green-700');
                }
                status.classList.remove('hidden');

                setTimeout(() => {
                    status.classList.add('hidden');
                }, 3000);
            }
        </script>
    @endpush
@endsection