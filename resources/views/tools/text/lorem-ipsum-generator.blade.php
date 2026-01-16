@extends('layouts.app')

@section('title', __tool('lorem-ipsum-generator', 'meta.title'))
@section('meta_description', __tool('lorem-ipsum-generator', 'meta.description'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" icon="lorem-ipsum-generator" />

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-indigo-200 mb-8">
            <div class="grid md:grid-cols-3 gap-6 mb-6">
                <div>
                    <label for="count"
                        class="block text-sm font-semibold text-gray-700 mb-2">{{ __tool('lorem-ipsum-generator', 'editor.label_count') }}</label>
                    <input type="number" id="count" value="3" min="1" max="100"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                </div>
                <div>
                    <label for="type"
                        class="block text-sm font-semibold text-gray-700 mb-2">{{ __tool('lorem-ipsum-generator', 'editor.label_type') }}</label>
                    <select id="type"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                        <option value="paragraphs">{{ __tool('lorem-ipsum-generator', 'editor.opt_paragraphs') }}</option>
                        <option value="sentences">{{ __tool('lorem-ipsum-generator', 'editor.opt_sentences') }}</option>
                        <option value="words">{{ __tool('lorem-ipsum-generator', 'editor.opt_words') }}</option>
                    </select>
                </div>
                <div class="flex items-end pb-3">
                    <label class="inline-flex items-center text-gray-700 font-semibold cursor-pointer">
                        <input type="checkbox" id="startWithLorem" checked
                            class="w-5 h-5 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 transition-all">
                        <span class="ml-2">{{ __tool('lorem-ipsum-generator', 'editor.label_start_lorem') }}</span>
                    </label>
                </div>
            </div>

            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="generateLorem()"
                    class="px-8 py-3 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    <span>{{ __tool('lorem-ipsum-generator', 'editor.btn_generate') }}</span>
                </button>
                <button onclick="copyOutput()"
                    class="px-6 py-3 bg-gray-600 text-white rounded-xl hover:bg-gray-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>{{ __tool('lorem-ipsum-generator', 'editor.btn_copy') }}</span>
                </button>
            </div>

            <div class="mb-4">
                <label for="outputText"
                    class="block text-sm font-semibold text-gray-700 mb-2">{{ __tool('lorem-ipsum-generator', 'editor.label_output') }}</label>
                <textarea id="outputText" rows="12" readonly
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl bg-gray-50 text-sm leading-relaxed resize-y focus:outline-none"></textarea>
            </div>
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>
        </div>

        <div
            class="bg-gradient-to-br from-indigo-50 to-blue-50 rounded-3xl p-8 md:p-12 border-2 border-indigo-100 shadow-2xl">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-black text-gray-900 mb-3">
                    {{ __tool('lorem-ipsum-generator', 'content.about_title') }}</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">{{ __tool('lorem-ipsum-generator', 'content.about_desc') }}</p>
            </div>
            <p class="text-gray-700 leading-relaxed mb-6">
                {{ __tool('lorem-ipsum-generator', 'content.p1') }}
            </p>
        </div>
    </div>

    @push('scripts')
        <script>
            const loremWords = "lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum".split(' ');

            function generateLorem() {
                const count = parseInt(document.getElementById('count').value) || 3;
                const type = document.getElementById('type').value;
                const startWith = document.getElementById('startWithLorem').checked;
                let result = '';

                if (type === 'paragraphs') {
                    for (let i = 0; i < count; i++) {
                        result += generateParagraph() + (i < count - 1 ? '\n\n' : '');
                    }
                } else if (type === 'sentences') {
                    result = generateSentences(count);
                } else {
                    result = generateWords(count);
                }

                if (startWith && !result.toLowerCase().startsWith('lorem ipsum')) {
                    // Prepend standard start if checkboxes is checked and we generated new random text
                    // However, our logic below builds random text. Simplest way:
                    // If it's the very first generation 'ever', user might expect exactly standard start.
                    // For simplicity, let's just prepend "Lorem ipsum dolor sit amet, " if missing and requested,
                    // adjusting the generated text slightly or just forcing it at the top.
                    if (type === 'words') {
                        result = "Lorem ipsum dolor sit amet " + result;
                    } else {
                        // For paragraphs/sentences, simple replacement of first few words
                        const words = result.split(' ');
                        words.splice(0, 5, "Lorem", "ipsum", "dolor", "sit", "amet,");
                        result = words.join(' ');
                    }
                } else if (startWith && type === 'paragraphs') {
                    // Force first paragraph to be standard-ish if requested
                    if (!result.startsWith("Lorem ipsum")) {
                        result = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. " + result.substring(result.indexOf(' ') + 1);
                    }
                }

                document.getElementById('outputText').value = result;
                showStatus("{{ __tool('lorem-ipsum-generator', 'js.success_generate') }}", 'success');
            }

            function generateWords(num) {
                let words = [];
                for (let i = 0; i < num; i++) {
                    words.push(loremWords[Math.floor(Math.random() * loremWords.length)]);
                }
                return words.join(' ');
            }

            function generateSentences(num) {
                let sentences = [];
                for (let i = 0; i < num; i++) {
                    let sentenceLength = Math.floor(Math.random() * 10) + 5;
                    let sentence = generateWords(sentenceLength);
                    sentences.push(sentence.charAt(0).toUpperCase() + sentence.slice(1) + '.');
                }
                return sentences.join(' ');
            }

            function generateParagraph() {
                let numSentences = Math.floor(Math.random() * 5) + 3;
                return generateSentences(numSentences);
            }

            function copyOutput() {
                const output = document.getElementById('outputText');
                if (!output.value) {
                    showStatus("{{ __tool('lorem-ipsum-generator', 'js.error_copy') }}", 'error');
                    return;
                }
                output.select();
                document.execCommand('copy');
                showStatus("{{ __tool('lorem-ipsum-generator', 'js.success_copy') }}", 'success');
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

            // Initial generation
            generateLorem();
        </script>
    @endpush
@endsection