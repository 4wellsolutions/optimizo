@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-5xl mx-auto">
        <!-- Hero Section -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-blue-500 via-indigo-500 to-purple-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">
                    Word Counter
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                    Count words, characters, sentences, and estimate reading time instantly!
                </p>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- Tool Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-blue-200 mb-8">
            <div class="mb-6">
                <label for="textInput" class="form-label text-base">Enter or Paste Your Text</label>
                <textarea id="textInput" class="form-input min-h-[300px]"
                    placeholder="Start typing or paste your text here..."></textarea>
            </div>

            <!-- Real-time Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-4 border-2 border-blue-200">
                    <div class="text-sm text-gray-600 mb-1">Words</div>
                    <div class="text-3xl font-black text-blue-600" id="wordCount">0</div>
                </div>
                <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl p-4 border-2 border-indigo-200">
                    <div class="text-sm text-gray-600 mb-1">Characters</div>
                    <div class="text-3xl font-black text-indigo-600" id="charCount">0</div>
                </div>
                <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-4 border-2 border-purple-200">
                    <div class="text-sm text-gray-600 mb-1">Sentences</div>
                    <div class="text-3xl font-black text-purple-600" id="sentenceCount">0</div>
                </div>
                <div class="bg-gradient-to-br from-pink-50 to-red-50 rounded-xl p-4 border-2 border-pink-200">
                    <div class="text-sm text-gray-600 mb-1">Reading Time</div>
                    <div class="text-3xl font-black text-pink-600" id="readingTime">0m</div>
                </div>
            </div>

            <!-- Additional Stats -->
            <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                    <div class="text-sm text-gray-600 mb-1">Paragraphs</div>
                    <div class="text-xl font-bold text-gray-900" id="paragraphCount">0</div>
                </div>
                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                    <div class="text-sm text-gray-600 mb-1">Long Sentences</div>
                    <div class="text-xl font-bold text-gray-900" id="longSentences">0</div>
                </div>
                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                    <div class="text-sm text-gray-600 mb-1">Short Sentences</div>
                    <div class="text-xl font-bold text-gray-900" id="shortSentences">0</div>
                </div>
                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                    <div class="text-sm text-gray-600 mb-1">Characters (no spaces)</div>
                    <div class="text-xl font-bold text-gray-900" id="charCountNoSpaces">0</div>
                </div>
                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                    <div class="text-sm text-gray-600 mb-1">Average Word Length</div>
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
                <h2 class="text-4xl font-black text-gray-900 mb-3">Free Word Counter Tool</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Count words, characters, and analyze your text in
                    real-time</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Our free Word Counter tool provides instant, real-time analysis of your text. Perfect for writers, students,
                bloggers, and content creators who need to track word count, character count, reading time, and other
                important text metrics. Get accurate counts for essays, articles, social media posts, and any written
                content.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ Features</h3>
            <div class="grid md:grid-cols-2 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📊</div>
                    <h4 class="font-bold text-gray-900 mb-2">Real-Time Counting</h4>
                    <p class="text-gray-600 text-sm">Instant updates as you type or paste text</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📖</div>
                    <h4 class="font-bold text-gray-900 mb-2">Reading Time</h4>
                    <p class="text-gray-600 text-sm">Estimate how long it takes to read your content</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔢</div>
                    <h4 class="font-bold text-gray-900 mb-2">Multiple Metrics</h4>
                    <p class="text-gray-600 text-sm">Words, characters, sentences, paragraphs, and more</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">100% Free</h4>
                    <p class="text-gray-600 text-sm">No limits, no registration required</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">How accurate is the word count?</h4>
                    <p class="text-gray-700 leading-relaxed">Our word counter is highly accurate and counts words the same
                        way most word processors do. It counts any sequence of characters separated by spaces as a word.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">How is reading time calculated?</h4>
                    <p class="text-gray-700 leading-relaxed">Reading time is estimated based on an average reading speed of
                        200-250 words per minute, which is the typical reading speed for adults.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is my text stored or saved?</h4>
                    <p class="text-gray-700 leading-relaxed">No! All text analysis happens in your browser. Your text is
                        never sent to our servers or stored anywhere. Your privacy is completely protected.</p>
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