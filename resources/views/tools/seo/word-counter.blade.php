@extends('layouts.app')

@section('title', __tool('word-counter', 'seo.title', $tool->meta_title))
@section('meta_description', __tool('word-counter', 'seo.description', $tool->meta_description))
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-5xl mx-auto">
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" />

        <!-- Tool Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-blue-200 mb-8">
            <div class="mb-6">
                <label for="textInput" class="form-label text-base">{{ __tool('word-counter', 'form.label') }}</label>
                <textarea id="textInput" class="form-input min-h-[300px]"
                    placeholder="{{ __tool('word-counter', 'form.placeholder') }}"></textarea>
            </div>

            <!-- Real-time Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-4 border-2 border-blue-200">
                    <div class="text-sm text-gray-600 mb-1">{{ __tool('word-counter', 'stats.words') }}</div>
                    <div class="text-3xl font-black text-blue-600" id="wordCount">0</div>
                </div>
                <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl p-4 border-2 border-indigo-200">
                    <div class="text-sm text-gray-600 mb-1">{{ __tool('word-counter', 'stats.characters') }}</div>
                    <div class="text-3xl font-black text-indigo-600" id="charCount">0</div>
                </div>
                <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-4 border-2 border-purple-200">
                    <div class="text-sm text-gray-600 mb-1">{{ __tool('word-counter', 'stats.sentences') }}</div>
                    <div class="text-3xl font-black text-purple-600" id="sentenceCount">0</div>
                </div>
                <div class="bg-gradient-to-br from-pink-50 to-red-50 rounded-xl p-4 border-2 border-pink-200">
                    <div class="text-sm text-gray-600 mb-1">{{ __tool('word-counter', 'stats.reading_time') }}</div>
                    <div class="text-3xl font-black text-pink-600" id="readingTime">0m</div>
                </div>
            </div>

            <!-- Additional Stats -->
            <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                    <div class=" text-sm text-gray-600 mb-1">{{ __tool('word-counter', 'stats.paragraphs') }}</div>
                    <div class="text-xl font-bold text-gray-900" id="paragraphCount">0</div>
                </div>
                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                    <div class="text-sm text-gray-600 mb-1">{{ __tool('word-counter', 'stats.long_sentences') }}</div>
                    <div class="text-xl font-bold text-gray-900" id="longSentences">0</div>
                </div>
                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                    <div class="text-sm text-gray-600 mb-1">{{ __tool('word-counter', 'stats.short_sentences') }}</div>
                    <div class="text-xl font-bold text-gray-900" id="shortSentences">0</div>
                </div>
                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                    <div class="text-sm text-gray-600 mb-1">{{ __tool('word-counter', 'stats.chars_no_spaces') }}</div>
                    <div class="text-xl font-bold text-gray-900" id="charCountNoSpaces">0</div>
                </div>
                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                    <div class="text-sm text-gray-600 mb-1">{{ __tool('word-counter', 'stats.avg_word_length') }}</div>
                    <div class="text-xl font-bold text-gray-900" id="avgWordLength">0</div>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div
            class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-3xl p-8 md:p-12 border-2 border-blue-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">{{ __tool('word-counter', 'content.main_title') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __tool('word-counter', 'content.main_description') }}
                </p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {{ __tool('word-counter', 'content.intro') }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('word-counter', 'content.features_title') }}</h3>
            <div class="grid md:grid-cols-2 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📊</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('word-counter', 'content.feature1_title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('word-counter', 'content.feature1_desc') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📖</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('word-counter', 'content.feature2_title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('word-counter', 'content.feature2_desc') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔢</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('word-counter', 'content.feature3_title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('word-counter', 'content.feature3_desc') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('word-counter', 'content.feature4_title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('word-counter', 'content.feature4_desc') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('word-counter', 'content.faq_title') }}</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('word-counter', 'content.faq1_q') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('word-counter', 'content.faq1_a') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('word-counter', 'content.faq2_q') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('word-counter', 'content.faq2_a') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('word-counter', 'content.faq3_q') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('word-counter', 'content.faq3_a') }}</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const textInput = document.getElementById('textInput');
        const wordCount = document.getElementById('wordCount');
        const charCount = document.getElementById('charCount');
        const charCountNoSpaces = document.getElementById('charCountNoSpaces');
        const sentenceCount = document.getElementById('sentenceCount');
        const paragraphCount = document.getElementById('paragraphCount');
        const readingTime = document.getElementById('readingTime');
        const avgWordLength = document.getElementById('avgWordLength');
        const longSentences = document.getElementById('longSentences');
        const shortSentences = document.getElementById('shortSentences');

        function updateCounts() {
            const text = textInput.value;

            // Word count
            const words = text.trim().split(/\s+/).filter(word => word.length > 0);
            const wordCountValue = text.trim() === '' ? 0 : words.length;
            wordCount.textContent = wordCountValue.toLocaleString();

            // Character count
            charCount.textContent = text.length.toLocaleString();
            charCountNoSpaces.textContent = text.replace(/\s/g, '').length.toLocaleString();

            // Sentence count
            const sentences = text.split(/[.!?]+/).filter(sentence => sentence.trim().length > 0);
            sentenceCount.textContent = sentences.length.toLocaleString();

            // Count long and short sentences (long = >20 words, short = <10 words)
            let longCount = 0;
            let shortCount = 0;
            sentences.forEach(sentence => {
                const sentenceWords = sentence.trim().split(/\s+/).length;
                if (sentenceWords > 20) longCount++;
                if (sentenceWords < 10) shortCount++;
            });
            longSentences.textContent = longCount.toLocaleString();
            shortSentences.textContent = shortCount.toLocaleString();

            // Paragraph count
            const paragraphs = text.split(/\n+/).filter(para => para.trim().length > 0);
            paragraphCount.textContent = paragraphs.length.toLocaleString();

            // Reading time (assuming 200 words per minute)
            const minutes = Math.ceil(wordCountValue / 200);
            readingTime.textContent = minutes + 'm';

            // Average word length
            if (wordCountValue > 0) {
                const totalChars = words.join('').length;
                const avg = (totalChars / wordCountValue).toFixed(1);
                avgWordLength.textContent = avg;
            } else {
                avgWordLength.textContent = '0';
            }
        }

        textInput.addEventListener('input', updateCounts);
    </script>
@endsection