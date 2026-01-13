@extends('layouts.app')

@section('title', __tool('text-reverser', 'meta.h1'))
@section('meta_description', __tool('text-reverser', 'meta.subtitle'))
@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" icon="text-reverser" />

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-violet-200 mb-8">
            <div class="mb-6">
                <label for="inputText" class="block text-sm font-semibold text-gray-700 mb-2">{!! __tool('text-reverser', 'editor.label_input', 'Input Text') !!}</label>
                <textarea id="inputText" rows="8"
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-violet-500 focus:border-transparent transition-all duration-200 font-mono text-sm resize-none"
                    placeholder="{!! __tool('text-reverser', 'editor.ph_input', 'Hello World') !!}"></textarea>
            </div>
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convertText()"
                    class="px-8 py-3 bg-violet-600 text-white rounded-xl hover:bg-violet-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                    </svg>
                    <span>{!! __tool('text-reverser', 'editor.btn_reverse', 'Reverse Text') !!}</span>
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>{!! __tool('text-reverser', 'editor.btn_clear', 'Clear') !!}</span>
                </button>
                <button onclick="copyOutput()"
                    class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>{!! __tool('text-reverser', 'editor.btn_copy', 'Copy') !!}</span>
                </button>
            </div>
            <div class="mb-4">
                <label for="outputText" class="block text-sm font-semibold text-gray-700 mb-2">{!! __tool('text-reverser', 'editor.label_output', 'Reversed Text') !!}</label>
                <textarea id="outputText" rows="8" readonly
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl bg-gray-50 font-mono text-sm resize-none"
                    placeholder="{!! __tool('text-reverser', 'editor.ph_output', 'dlroW olleH') !!}"></textarea>
            </div>
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>
        </div>

        <div
            class="bg-gradient-to-br from-violet-50 to-purple-50 rounded-3xl p-8 md:p-12 border-2 border-violet-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-violet-500 to-purple-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">{!! __tool('text-reverser', 'meta.h1', 'Free Text Reverser Tool') !!}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{!! __tool('text-reverser', 'meta.subtitle', 'Reverse text character by character') !!}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">{!! __tool('text-reverser', 'content.p1', 'Reverse your text instantly with our free online text reverser. This tool flips your text backwards, character by character, creating mirror text. Perfect for creating puzzles, encoding messages, testing palindromes, or just having fun with text manipulation.') !!}</p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('utilities', 'features.title', 'Features') !!}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-violet-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔄</div>
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('text-reverser', 'content.features.char.title', 'Character Reversal') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('text-reverser', 'content.features.char.desc', 'Reverses text character by character') !!}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('text-reverser', 'content.features.instant.title', 'Instant Results') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('text-reverser', 'content.features.instant.desc', 'Reverse text in milliseconds') !!}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-violet-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('text-reverser', 'content.features.privacy.title', 'Privacy Protected') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('text-reverser', 'content.features.privacy.desc', 'All processing happens in your browser') !!}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-fuchsia-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📝</div>
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('text-reverser', 'content.features.bulk.title', 'Bulk Processing') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('text-reverser', 'content.features.bulk.desc', 'Reverse multiple lines at once') !!}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎯</div>
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('text-reverser', 'content.features.formatting.title', 'Preserves Formatting') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('text-reverser', 'content.features.formatting.desc', 'Maintains spaces and special characters') !!}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🆓</div>
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('text-reverser', 'content.features.free.title', '100% Free') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('text-reverser', 'content.features.free.desc', 'No limits or registration required') !!}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('text-reverser', 'content.uses_title', 'Common Use Cases') !!}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{!! __tool('text-reverser', 'content.uses.puzzles.title', 'Puzzles & Games') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('text-reverser', 'content.uses.puzzles.desc', 'Create word puzzles, riddles, and brain teasers with reversed text') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{!! __tool('text-reverser', 'content.uses.encoding.title', 'Simple Encoding') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('text-reverser', 'content.uses.encoding.desc', 'Create basic encoded messages for fun or simple obfuscation') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{!! __tool('text-reverser', 'content.uses.palindrome.title', 'Palindrome Testing') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('text-reverser', 'content.uses.palindrome.desc', 'Test if words or phrases are palindromes by comparing with reversed version') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{!! __tool('text-reverser', 'content.uses.creative.title', 'Creative Writing') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('text-reverser', 'content.uses.creative.desc', 'Add artistic flair to poetry and creative content') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{!! __tool('text-reverser', 'content.uses.social.title', 'Social Media') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('text-reverser', 'content.uses.social.desc', 'Create unique posts and comments with reversed text') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{!! __tool('text-reverser', 'content.uses.testing.title', 'Testing') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('text-reverser', 'content.uses.testing.desc', 'Test string manipulation functions in programming') !!}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('text-reverser', 'content.how_to.title', 'How to Use') !!}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3"><span
                            class="font-bold text-violet-600 text-lg">1.</span><span><strong>{!! __tool('text-reverser', 'content.how_to.step1', 'Enter Text') !!}:</strong> {!! __tool('text-reverser', 'content.how_to.step1_desc', 'Type or paste the text you want to reverse') !!}</span></li>
                    <li class="flex items-start gap-3"><span
                            class="font-bold text-violet-600 text-lg">2.</span><span><strong>{!! __tool('text-reverser', 'content.how_to.step2', 'Click Reverse') !!}:</strong> {!! __tool('text-reverser', 'content.how_to.step2_desc', 'Press "Reverse Text" button') !!}</span></li>
                    <li class="flex items-start gap-3"><span
                            class="font-bold text-violet-600 text-lg">3.</span><span><strong>{!! __tool('text-reverser', 'content.how_to.step3', 'Review Output') !!}:</strong> {!! __tool('text-reverser', 'content.how_to.step3_desc', 'Check the reversed text result') !!}</span></li>
                    <li class="flex items-start gap-3"><span
                            class="font-bold text-violet-600 text-lg">4.</span><span><strong>{!! __tool('text-reverser', 'content.how_to.step4', 'Copy Result') !!}:</strong> {!! __tool('text-reverser', 'content.how_to.step4_desc', 'Click "Copy" to copy to clipboard') !!}</span></li>
                    <li class="flex items-start gap-3"><span
                            class="font-bold text-violet-600 text-lg">5.</span><span><strong>{!! __tool('text-reverser', 'content.how_to.step5', 'Use Anywhere') !!}:</strong> {!! __tool('text-reverser', 'content.how_to.step5_desc', 'Paste the reversed text wherever needed') !!}</span></li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('text-reverser', 'content.examples_title', 'Reversal Examples') !!}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <div class="space-y-4">
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">{!! __tool('text-reverser', 'content.examples.simple', 'Simple Text:') !!}</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">Hello → olleH</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">{!! __tool('text-reverser', 'content.examples.phrases', 'Phrases:') !!}</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">Hello World → dlroW olleH</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">{!! __tool('text-reverser', 'content.examples.palindromes', 'Palindromes:') !!}</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">racecar → racecar (same!)</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">{!! __tool('text-reverser', 'content.examples.numbers', 'Numbers:') !!}</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">12345 → 54321</p>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('text-reverser', 'content.faq_title', 'Frequently Asked Questions') !!}</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('text-reverser', 'content.faq.q1', 'How does text reversal work?') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('text-reverser', 'content.faq.a1', 'The tool reverses the order of characters in your text. The last character becomes first, second-to-last becomes second, and so on.') !!}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('text-reverser', 'content.faq.q2', 'Does it preserve spaces?') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('text-reverser', 'content.faq.a2', 'Yes! All characters including spaces, punctuation, and special characters are preserved and reversed in order.') !!}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('text-reverser', 'content.faq.q3', 'Can I reverse it back?') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('text-reverser', 'content.faq.a3', 'Yes! Simply paste the reversed text back into the input and reverse it again to get the original text.') !!}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('text-reverser', 'content.faq.q4', 'What are palindromes?') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('text-reverser', 'content.faq.a4', 'Palindromes are words or phrases that read the same forwards and backwards, like "racecar" or "madam". Use this tool to test them!') !!}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('text-reverser', 'content.faq.q5', 'Is this tool free?') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('text-reverser', 'content.faq.a5', 'Yes! Completely free with no limits. All processing happens in your browser for privacy and speed.') !!}</p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function convertText() {
            const input = document.getElementById('inputText').value;
            if (!input.trim()) {
                showStatus('{!! __tool('text-reverser', 'js.error_empty', 'Please enter some text to reverse') !!}', 'error');
                return;
            }
            const output = input.split('').reverse().join('');
            document.getElementById('outputText').value = output;
            showStatus('{!! __tool('text-reverser', 'js.success_reverse', '✓ Text reversed successfully!') !!}', 'success');
        }

        function clearAll() {
            document.getElementById('inputText').value = '';
            document.getElementById('outputText').value = '';
            document.getElementById('statusMessage').classList.add('hidden');
        }

        function copyOutput() {
            const output = document.getElementById('outputText');
            if (!output.value) {
                showStatus('{!! __tool('text-reverser', 'js.error_no_copy', 'Nothing to copy! Please reverse some text first.') !!}', 'error');
                return;
            }
            output.select();
            document.execCommand('copy');
            showStatus('{!! __tool('text-reverser', 'js.success_copy', '✓ Copied to clipboard!') !!}', 'success');
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