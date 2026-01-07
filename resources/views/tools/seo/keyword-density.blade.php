@extends('layouts.app')

@section('title', __tool('keyword-density', 'seo.title', $tool->meta_title))
@section('meta_description', __tool('keyword-density', 'seo.description', $tool->meta_description))
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-5xl mx-auto">
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" />

        <!-- Tool Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-purple-200 mb-8">
            <div class="mb-6">
                <label for="textInput" class="form-label text-base">{{ __tool('keyword-density', 'form.label') }}</label>
                <textarea id="textInput" class="form-input min-h-[300px]"
                    placeholder="{{ __tool('keyword-density', 'form.placeholder') }}"></textarea>
            </div>

            <button onclick="analyzeKeywords()" class="btn-primary w-full justify-center text-lg py-4 mb-6">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
                <span>{{ __tool('keyword-density', 'form.button') }}</span>
            </button>

            <!-- Results -->
            <div id="results" class="hidden">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ __tool('keyword-density', 'results.title') }}</h3>

                <!-- Summary Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                    <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-4 border-2 border-purple-200">
                        <div class="text-sm text-gray-600 mb-1">Total Words</div>
                        <div class="text-2xl font-black text-purple-600" id="totalWords">0</div>
                    </div>
                    <div class="bg-gradient-to-br from-pink-50 to-red-50 rounded-xl p-4 border-2 border-pink-200">
                        <div class="text-sm text-gray-600 mb-1">Unique Words</div>
                        <div class="text-2xl font-black text-pink-600" id="uniqueWords">0</div>
                    </div>
                    <div class="bg-gradient-to-br from-red-50 to-orange-50 rounded-xl p-4 border-2 border-red-200">
                        <div class="text-sm text-gray-600 mb-1">Sentences</div>
                        <div class="text-2xl font-black text-red-600" id="sentenceCount">0</div>
                    </div>
                    <div class="bg-gradient-to-br from-orange-50 to-yellow-50 rounded-xl p-4 border-2 border-orange-200">
                        <div class="text-sm text-gray-600 mb-1">Paragraphs</div>
                        <div class="text-2xl font-black text-orange-600" id="paragraphCount">0</div>
                    </div>
                </div>

                <!-- Additional Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                    <div class="bg-gradient-to-br from-yellow-50 to-green-50 rounded-xl p-4 border-2 border-yellow-200">
                        <div class="text-sm text-gray-600 mb-1">Long Sentences</div>
                        <div class="text-2xl font-black text-yellow-600" id="longSentences">0</div>
                    </div>
                    <div class="bg-gradient-to-br from-green-50 to-teal-50 rounded-xl p-4 border-2 border-green-200">
                        <div class="text-sm text-gray-600 mb-1">Short Sentences</div>
                        <div class="text-2xl font-black text-green-600" id="shortSentences">0</div>
                    </div>
                    <div class="bg-gradient-to-br from-teal-50 to-blue-50 rounded-xl p-4 border-2 border-teal-200">
                        <div class="text-sm text-gray-600 mb-1">Top Keyword</div>
                        <div class="text-lg font-black text-teal-600" id="topKeyword">-</div>
                    </div>
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-4 border-2 border-blue-200">
                        <div class="text-sm text-gray-600 mb-1">Top Density</div>
                        <div class="text-2xl font-black text-blue-600" id="topDensity">0%</div>
                    </div>
                </div>

                <!-- Single Word Density -->
                <div class="bg-gray-50 rounded-xl p-6 border-2 border-gray-200 mb-6">
                    <h4 class="font-bold text-lg text-gray-900 mb-4">Top Single Keywords (excluding common words)</h4>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b-2 border-gray-300">
                                    <th class="text-left py-3 px-4 font-bold text-gray-700">Keyword</th>
                                    <th class="text-center py-3 px-4 font-bold text-gray-700">Count</th>
                                    <th class="text-center py-3 px-4 font-bold text-gray-700">Density</th>
                                </tr>
                            </thead>
                            <tbody id="keywordTable"></tbody>
                        </table>
                    </div>
                </div>

                <!-- 2-Word Phrases -->
                <div class="bg-gray-50 rounded-xl p-6 border-2 border-gray-200 mb-6">
                    <h4 class="font-bold text-lg text-gray-900 mb-4">Top 2-Word Phrases</h4>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b-2 border-gray-300">
                                    <th class="text-left py-3 px-4 font-bold text-gray-700">Phrase</th>
                                    <th class="text-center py-3 px-4 font-bold text-gray-700">Count</th>
                                    <th class="text-center py-3 px-4 font-bold text-gray-700">Density</th>
                                </tr>
                            </thead>
                            <tbody id="twoWordTable"></tbody>
                        </table>
                    </div>
                </div>

                <!-- 3-Word Phrases -->
                <div class="bg-gray-50 rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-4">Top 3-Word Phrases</h4>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b-2 border-gray-300">
                                    <th class="text-left py-3 px-4 font-bold text-gray-700">Phrase</th>
                                    <th class="text-center py-3 px-4 font-bold text-gray-700">Count</th>
                                    <th class="text-center py-3 px-4 font-bold text-gray-700">Density</th>
                                </tr>
                            </thead>
                            <tbody id="threeWordTable"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div
            class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-3xl p-8 md:p-12 border-2 border-purple-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">Keyword Density Analyzer</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Optimize your content for search engines with keyword
                    density analysis</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Our free Keyword Density Checker analyzes your content to show how often keywords appear and their density
                percentage. Essential for SEO optimization, content writing, and ensuring your target keywords are properly
                distributed throughout your text without over-optimization or keyword stuffing.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 What is Keyword Density?</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                Keyword density is the percentage of times a keyword or phrase appears in your content compared to the total
                word count. For example, if a keyword appears 10 times in a 1000-word article, the keyword density is 1%.
                Search engines use keyword density as one factor to understand what your content is about, but
                over-optimization can lead to penalties.
            </p>

            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-2 border-blue-200 rounded-2xl p-8 mb-10">
                <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-3 text-xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    💡 Optimal Keyword Density Guidelines
                </h4>
                <ul class="text-blue-800 leading-relaxed space-y-2">
                    <li>✅ <strong>1-2%</strong> - Ideal keyword density for most content</li>
                    <li>✅ <strong>0.5-1%</strong> - Safe range for competitive keywords</li>
                    <li>⚠️ <strong>3-5%</strong> - Approaching over-optimization territory</li>
                    <li>❌ <strong>Above 5%</strong> - Risk of keyword stuffing penalties</li>
                    <li>✅ Focus on natural, reader-friendly content over exact percentages</li>
                </ul>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ Why Use Keyword Density Analysis?</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔍</div>
                    <h4 class="font-bold text-gray-900 mb-2">SEO Optimization</h4>
                    <p class="text-gray-600 text-sm">Ensure keywords appear enough without over-optimization</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📝</div>
                    <h4 class="font-bold text-gray-900 mb-2">Content Balance</h4>
                    <p class="text-gray-600 text-sm">Maintain natural keyword distribution throughout content</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🛡️</div>
                    <h4 class="font-bold text-gray-900 mb-2">Avoid Penalties</h4>
                    <p class="text-gray-600 text-sm">Prevent keyword stuffing that can harm rankings</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-orange-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📊</div>
                    <h4 class="font-bold text-gray-900 mb-2">Competitor Analysis</h4>
                    <p class="text-gray-600 text-sm">Analyze top-ranking content keyword strategies</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">✍️</div>
                    <h4 class="font-bold text-gray-900 mb-2">Content Writing</h4>
                    <p class="text-gray-600 text-sm">Guide keyword usage during content creation</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎯</div>
                    <h4 class="font-bold text-gray-900 mb-2">Topic Relevance</h4>
                    <p class="text-gray-600 text-sm">Verify content focuses on target topics</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📚 Best Practices for Keyword Usage</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ul class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="text-green-600 font-bold text-xl">✓</span>
                        <span><strong>Write for humans first:</strong> Create valuable, readable content before optimizing
                            for search engines</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-green-600 font-bold text-xl">✓</span>
                        <span><strong>Use variations:</strong> Include synonyms, related terms, and LSI keywords
                            naturally</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-green-600 font-bold text-xl">✓</span>
                        <span><strong>Strategic placement:</strong> Include keywords in titles, headings, first paragraph,
                            and conclusion</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-green-600 font-bold text-xl">✓</span>
                        <span><strong>Natural flow:</strong> Keywords should fit seamlessly into sentences without forced
                            insertion</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-red-600 font-bold text-xl">✗</span>
                        <span><strong>Avoid keyword stuffing:</strong> Don't repeat keywords unnaturally or
                            excessively</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-red-600 font-bold text-xl">✗</span>
                        <span><strong>Don't sacrifice quality:</strong> Never compromise content quality for keyword
                            density</span>
                    </li>
                </ul>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What is the ideal keyword density for SEO?</h4>
                    <p class="text-gray-700 leading-relaxed">There's no perfect number, but 1-2% is generally considered
                        optimal. Modern SEO focuses more on content quality, relevance, and user intent than exact keyword
                        density percentages. Aim for natural keyword usage that serves readers first.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can high keyword density hurt my SEO?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! Keyword stuffing (excessive keyword repetition) can
                        trigger search engine penalties and harm your rankings. Search engines prioritize natural, valuable
                        content over keyword-optimized but low-quality text. Focus on comprehensive, helpful content.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Should I check keyword density for every page?</h4>
                    <p class="text-gray-700 leading-relaxed">It's helpful for important pages like landing pages, blog
                        posts, and product pages. Use it as a guide to ensure you're covering your topic thoroughly without
                        over-optimization. It's especially useful when optimizing existing content.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What about long-tail keywords?</h4>
                    <p class="text-gray-700 leading-relaxed">Long-tail keywords (3+ word phrases) naturally have lower
                        density but can be more valuable for SEO. Focus on including them naturally throughout your content
                        rather than hitting specific density targets.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">How does this tool filter common words?</h4>
                    <p class="text-gray-700 leading-relaxed">Our tool automatically excludes common stop words (like "the",
                        "and", "is") that don't contribute to SEO. This helps you focus on meaningful keywords that actually
                        impact your content's relevance and rankings.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Common stop words to exclude
        const stopWords = new Set(['the', 'be', 'to', 'of', 'and', 'a', 'in', 'that', 'have', 'i', 'it', 'for', 'not', 'on', 'with', 'he', 'as', 'you', 'do', 'at', 'this', 'but', 'his', 'by', 'from', 'they', 'we', 'say', 'her', 'she', 'or', 'an', 'will', 'my', 'one', 'all', 'would', 'there', 'their', 'what', 'so', 'up', 'out', 'if', 'about', 'who', 'get', 'which', 'go', 'me', 'when', 'make', 'can', 'like', 'time', 'no', 'just', 'him', 'know', 'take', 'people', 'into', 'year', 'your', 'good', 'some', 'could', 'them', 'see', 'other', 'than', 'then', 'now', 'look', 'only', 'come', 'its', 'over', 'think', 'also', 'back', 'after', 'use', 'two', 'how', 'our', 'work', 'first', 'well', 'way', 'even', 'new', 'want', 'because', 'any', 'these', 'give', 'day', 'most', 'us', 'is', 'was', 'are', 'been', 'has', 'had', 'were', 'said', 'did', 'having', 'may', 'should', 'am']);

        function analyzeKeywords() {
            const text = document.getElementById('textInput').value.trim();

            if (!text) {
                alert('Please enter some text to analyze');
                return;
            }

            // Convert to lowercase and split into words
            const words = text.toLowerCase()
                .replace(/[^\w\s]/g, ' ')
                .split(/\s+/)
                .filter(word => word.length > 2 && !stopWords.has(word));

            const totalWords = words.length;

            // Count sentences and paragraphs
            const sentences = text.split(/[.!?]+/).filter(s => s.trim().length > 0);
            const paragraphs = text.split(/\n+/).filter(p => p.trim().length > 0);

            // Count long and short sentences (long = >20 words, short = <10 words)
            let longSentences = 0;
            let shortSentences = 0;
            sentences.forEach(sentence => {
                const wordCount = sentence.trim().split(/\s+/).length;
                if (wordCount > 20) longSentences++;
                if (wordCount < 10) shortSentences++;
            });

            // Single word frequency
            const wordCount = {};
            words.forEach(word => {
                wordCount[word] = (wordCount[word] || 0) + 1;
            });

            // 2-word phrases
            const twoWordPhrases = {};
            for (let i = 0; i < words.length - 1; i++) {
                const phrase = words[i] + ' ' + words[i + 1];
                twoWordPhrases[phrase] = (twoWordPhrases[phrase] || 0) + 1;
            }

            // 3-word phrases
            const threeWordPhrases = {};
            for (let i = 0; i < words.length - 2; i++) {
                const phrase = words[i] + ' ' + words[i + 1] + ' ' + words[i + 2];
                threeWordPhrases[phrase] = (threeWordPhrases[phrase] || 0) + 1;
            }

            // Sort by frequency
            const sortedWords = Object.entries(wordCount).sort((a, b) => b[1] - a[1]).slice(0, 20);
            const sortedTwoWord = Object.entries(twoWordPhrases).sort((a, b) => b[1] - a[1]).slice(0, 15);
            const sortedThreeWord = Object.entries(threeWordPhrases).sort((a, b) => b[1] - a[1]).slice(0, 15);

            // Update summary stats
            document.getElementById('totalWords').textContent = totalWords.toLocaleString();
            document.getElementById('uniqueWords').textContent = Object.keys(wordCount).length.toLocaleString();
            document.getElementById('sentenceCount').textContent = sentences.length.toLocaleString();
            document.getElementById('paragraphCount').textContent = paragraphs.length.toLocaleString();
            document.getElementById('longSentences').textContent = longSentences.toLocaleString();
            document.getElementById('shortSentences').textContent = shortSentences.toLocaleString();

            if (sortedWords.length > 0) {
                document.getElementById('topKeyword').textContent = sortedWords[0][0];
                const topDensity = ((sortedWords[0][1] / totalWords) * 100).toFixed(2);
                document.getElementById('topDensity').textContent = topDensity + '%';
            }

            // Build single keyword table
            const tableBody = document.getElementById('keywordTable');
            tableBody.innerHTML = sortedWords.map(([word, count]) => {
                const density = ((count / totalWords) * 100).toFixed(2);
                const densityClass = density > 5 ? 'text-red-600' : density > 3 ? 'text-orange-600' : density > 1 ? 'text-yellow-600' : 'text-green-600';

                return `
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="py-3 px-4 font-medium text-gray-900">${word}</td>
                                    <td class="py-3 px-4 text-center font-bold text-gray-700">${count}</td>
                                    <td class="py-3 px-4 text-center font-bold ${densityClass}">${density}%</td>
                                </tr>
                            `;
            }).join('');

            // Build 2-word phrase table
            const twoWordTable = document.getElementById('twoWordTable');
            twoWordTable.innerHTML = sortedTwoWord.map(([phrase, count]) => {
                const density = ((count / (totalWords - 1)) * 100).toFixed(2);
                const densityClass = density > 3 ? 'text-red-600' : density > 2 ? 'text-orange-600' : density > 1 ? 'text-yellow-600' : 'text-green-600';

                return `
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="py-3 px-4 font-medium text-gray-900">${phrase}</td>
                                    <td class="py-3 px-4 text-center font-bold text-gray-700">${count}</td>
                                    <td class="py-3 px-4 text-center font-bold ${densityClass}">${density}%</td>
                                </tr>
                            `;
            }).join('');

            // Build 3-word phrase table
            const threeWordTable = document.getElementById('threeWordTable');
            threeWordTable.innerHTML = sortedThreeWord.map(([phrase, count]) => {
                const density = ((count / (totalWords - 2)) * 100).toFixed(2);
                const densityClass = density > 2 ? 'text-red-600' : density > 1.5 ? 'text-orange-600' : density > 1 ? 'text-yellow-600' : 'text-green-600';

                return `
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="py-3 px-4 font-medium text-gray-900">${phrase}</td>
                                    <td class="py-3 px-4 text-center font-bold text-gray-700">${count}</td>
                                    <td class="py-3 px-4 text-center font-bold ${densityClass}">${density}%</td>
                                </tr>
                            `;
            }).join('');

            // Show results
            document.getElementById('results').classList.remove('hidden');
        }
    </script>
@endsection