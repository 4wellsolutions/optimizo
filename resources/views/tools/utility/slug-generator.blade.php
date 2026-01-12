@extends('layouts.app')

@section('title', __tool('slug-generator', 'meta.h1'))
@section('meta_description', __tool('slug-generator', 'meta.subtitle'))
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" icon="slug-generator" />

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-purple-200 mb-8">
            <div class="mb-6">
                <label for="inputString" class="block text-sm font-semibold text-gray-700 mb-2">{{ __tool('utilities.slug-generator.editor.label_input', 'Input Text') }}</label>
                <input type="text" id="inputString"
                    placeholder="{{ __tool('utilities.slug-generator.editor.ph_input', 'Type your text here...') }}"
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    oninput="generateSlug()">
            </div>

            <div class="mb-6">
                <label for="separator" class="block text-sm font-semibold text-gray-700 mb-2">{{ __tool('utilities.slug-generator.editor.label_separator', 'Separator') }}</label>
                <select id="separator"
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    onchange="generateSlug()">
                    <option value="-">{{ __tool('utilities.slug-generator.editor.opt_hyphen', 'Hyphen (-)') }}</option>
                    <option value="_">{{ __tool('utilities.slug-generator.editor.opt_underscore', 'Underscore (_)') }}</option>
                    <option value=".">{{ __tool('utilities.slug-generator.editor.opt_dot', 'Dot (.)') }}</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="outputSlug" class="block text-sm font-semibold text-gray-700 mb-2">{{ __tool('utilities.slug-generator.editor.label_output', 'Generated Slug') }}</label>
                <div class="relative">
                    <input type="text" id="outputSlug" readonly
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl bg-gray-50 font-mono text-gray-600 focus:outline-none">
                    <button onclick="copyToClipboard()"
                        class="absolute right-2 top-1/2 transform -translate-y-1/2 p-2 text-gray-500 hover:text-purple-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                    </button>
                </div>
            </div>
             <div id="copyMessage" class="hidden mt-2 text-center text-sm font-medium text-green-600 transition-opacity duration-300"></div>
        </div>

        <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-3xl p-8 md:p-12 border-2 border-purple-100 shadow-2xl">
            <h2 class="text-3xl font-black text-gray-900 mb-6 text-center">{{ __tool('utilities.slug-generator.meta.h1', 'URL Slug Generator') }}</h2>
            <p class="text-gray-600 text-center mx-auto max-w-2xl mb-8">{{ __tool('utilities.slug-generator.meta.subtitle', 'Create clean, SEO-friendly URL slugs from any text. Perfect for blog posts, product pages, and website URLs. Automatically removes special characters and formats text for optimal web compatibility.') }}</p>
        </div>
    </div>

    @push('scripts')
    <script>
        function generateSlug() {
            const input = document.getElementById('inputString').value;
            const separator = document.getElementById('separator').value;
            const slug = input.toString().toLowerCase()
                .trim()
                .replace(/\s+/g, separator)     // Replace spaces with separator
                .replace(/[^\w\-\.]+/g, '')     // Remove all non-word chars
                .replace(/\-\-+/g, separator);  // Replace multiple separators with single separator

            document.getElementById('outputSlug').value = slug;
        }

        function copyToClipboard() {
            const copyText = document.getElementById("outputSlug");
            if (!copyText.value) return;
            
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
            
            const msg = document.getElementById('copyMessage');
            msg.innerText = "{{ __tool('utilities.slug-generator.js.success_copy', 'Slug copied to clipboard!') }}";
            msg.classList.remove('hidden');
            setTimeout(() => {
                msg.classList.add('hidden');
            }, 3000);
        }
    </script>
    @endpush
@endsection