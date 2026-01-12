@extends('layouts.app')

@section('title', __tool('xml-formatter', 'meta.h1'))
@section('meta_description', __tool('xml-formatter', 'meta.subtitle'))
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-7xl mx-auto">
        <x-tool-hero :tool="$tool" icon="xml-formatter" />

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-blue-200 mb-8">
            <div class="mb-4">
                <label for="xmlInput"
                    class="block text-sm font-semibold text-gray-700 mb-2">{{ __tool('xml-formatter', 'editor.label_input', 'XML Input') }}</label>
                <textarea id="xmlInput" rows="15"
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 transition-all font-mono text-sm"
                    placeholder="{{ __tool('xml-formatter', 'editor.ph_input', '<root><child>value</child></root>') }}"></textarea>
            </div>

            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="formatXml()"
                    class="px-8 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                    <span>{{ __tool('xml-formatter', 'editor.btn_format', 'Format / Beautify') }}</span>
                </button>
                <button onclick="minifyXml()"
                    class="px-6 py-3 bg-gray-700 text-white rounded-xl hover:bg-gray-800 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>{{ __tool('xml-formatter', 'editor.btn_minify', 'Minify') }}</span>
                </button>
                <button onclick="copyOutput()"
                    class="px-6 py-3 bg-gray-600 text-white rounded-xl hover:bg-gray-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>{{ __tool('xml-formatter', 'editor.btn_copy', 'Copy') }}</span>
                </button>
            </div>
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>
        </div>
    </div>

    @push('scripts')
        <script>
            function formatXml() {
                const input = document.getElementById('xmlInput');
                const xml = input.value;
                if (!xml.trim()) return;

                try {
                    // Simple XML formatter logic
                    let formatted = '';
                    let reg = /(>)(<)(\/*)/g;
                    let xmlStr = xml.replace(reg, '$1\r\n$2$3');
                    let pad = 0;

                    xmlStr.split('\r\n').forEach(node => {
                        let indent = 0;
                        if (node.match(/.+<\/\w[^>]*>$/)) {
                            indent = 0;
                        } else if (node.match(/^<\/\w/)) {
                            if (pad !== 0) {
                                pad -= 1;
                            }
                        } else if (node.match(/^<\w[^>]*[^\/]>.*$/)) {
                            indent = 1;
                        } else {
                            indent = 0;
                        }

                        let padding = '';
                        for (let i = 0; i < pad; i++) {
                            padding += '  ';
                        }

                        formatted += padding + node + '\r\n';
                        pad += indent;
                    });

                    input.value = formatted.trim();
                    showStatus("{{ __tool('xml-formatter', 'js.success_format', 'XML Formatted Successfully!') }}", 'success');
                } catch (e) {
                    showStatus("{{ __tool('xml-formatter', 'js.error_invalid', 'Invalid XML') }}", 'error');
                }
            }

            function minifyXml() {
                const input = document.getElementById('xmlInput');
                const xml = input.value;
                if (!xml.trim()) return;

                // Naive minification: remove whitespace between tags
                const minified = xml.replace(/>\s+</g, '><').trim();
                input.value = minified;
                showStatus("{{ __tool('xml-formatter', 'js.success_minify', 'XML Minified!') }}", 'success');
            }

            function copyOutput() {
                const input = document.getElementById('xmlInput');
                if (!input.value) return;
                input.select();
                document.execCommand('copy');
                showStatus("{{ __tool('xml-formatter', 'js.success_copy', 'Copied to clipboard!') }}", 'success');
            }

            function showStatus(message, type) {
                const status = document.getElementById('statusMessage');
                status.textContent = message;
                status.className = type === 'success'
                    ? 'mb-6 p-4 rounded-xl font-semibold bg-green-100 text-green-800 border-2 border-green-300'
                    : 'mb-6 p-4 rounded-xl font-semibold bg-red-100 text-red-800 border-2 border-red-300';
                status.classList.remove('hidden');
                setTimeout(() => status.classList.add('hidden'), 3000);
            }
        </script>
    @endpush
@endsection