@extends('layouts.app')

@section('title', 'YouTube Tag Generator - Free SEO-Optimized Tags | Optimizo')
@section('meta_description', 'Generate SEO-optimized YouTube tags instantly. Free tag generator tool to boost your video visibility and rankings.')

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- SEO-Optimized Header with Gradient Background -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-red-500 via-pink-500 to-purple-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <!-- Decorative Elements -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">
                    YouTube Tag Generator
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                    Generate SEO-optimized tags to boost your video's visibility and rankings!
                </p>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- Tag Generator Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-red-200 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Generate YouTube Tags</h2>
            <form id="tagForm">
                @csrf
                <div class="mb-6">
                    <label for="keyword" class="form-label text-base">Main Keyword or Topic</label>
                    <input type="text" id="keyword" name="keyword" class="form-input"
                        placeholder="e.g., cooking recipes, gaming tutorial, tech review..." required>
                    <p class="text-sm text-gray-500 mt-2">Enter your video's main topic to generate relevant tags</p>
                </div>

                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                    <span id="btnText">Generate Tags</span>
                </button>
            </form>

            <!-- Error Message -->
            <div id="errorMessage" class="hidden mt-6 bg-red-50 border-2 border-red-200 rounded-2xl p-6">
                <p class="text-red-800 font-semibold flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                            clip-rule="evenodd" />
                    </svg>
                    <span id="errorText"></span>
                </p>
            </div>

            <!-- Results Section -->
            <div id="resultsSection" class="hidden mt-8">
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 border-2 border-green-200 rounded-2xl p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold text-gray-900">Generated Tags (<span id="tagCount">0</span>)</h3>
                        <button onclick="copyAllTags()" class="btn-secondary flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                            Copy All
                        </button>
                    </div>
                    <div id="tagsContainer" class="flex flex-wrap gap-2 mb-4"></div>
                    <div class="bg-white rounded-xl p-4 mt-4">
                        <p class="text-sm text-gray-600 mb-2 font-semibold">Comma-separated format:</p>
                        <p id="tagsText" class="text-sm text-gray-700 font-mono break-all"></p>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#tagForm').on('submit', function (e) {
                    e.preventDefault();

                    const keyword = $('#keyword').val().trim();
                    const btn = $(this).find('button[type="submit"]');
                    const btnText = $('#btnText');
                    const originalText = btnText.text();

                    // Hide previous results/errors
                    $('#resultsSection').addClass('hidden');
                    $('#errorMessage').addClass('hidden');

                    // Validate keyword
                    if (!keyword) {
                        showError('Please enter a keyword or topic');
                        return;
                    }

                    // Show loading state
                    btn.prop('disabled', true).addClass('opacity-75');
                    btnText.text('Generating Tags...');

                    // Generate tags client-side
                    setTimeout(() => {
                        const tags = generateTags(keyword);
                        displayTags(tags);
                        $('#resultsSection').removeClass('hidden');

                        // Smooth scroll to results
                        setTimeout(() => {
                            $('#resultsSection')[0].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                        }, 100);

                        btn.prop('disabled', false).removeClass('opacity-75');
                        btnText.text(originalText);
                    }, 500);
                });

                function generateTags(keyword) {
                    const tags = [];
                    const keywordLower = keyword.toLowerCase();

                    // Primary tag - exact keyword
                    tags.push(keyword);

                    // Add variations
                    const words = keyword.split(' ');
                    if (words.length > 1) {
                        // Add individual words
                        words.forEach(word => {
                            if (word.length > 3 && !tags.includes(word)) {
                                tags.push(word);
                            }
                        });

                        // Add reversed phrase
                        tags.push(words.reverse().join(' '));
                        words.reverse(); // restore order
                    }

                    // Add common modifiers
                    const prefixes = ['how to', 'best', 'top', 'free', 'tutorial', 'guide'];
                    const suffixes = ['tutorial', 'guide', 'tips', 'tricks', 'for beginners', '2024', '2025'];

                    prefixes.forEach(prefix => {
                        tags.push(`${prefix} ${keywordLower}`);
                    });

                    suffixes.forEach(suffix => {
                        tags.push(`${keywordLower} ${suffix}`);
                    });

                    // Add question formats
                    tags.push(`what is ${keywordLower}`);
                    tags.push(`how to use ${keywordLower}`);

                    // Return unique tags (limit to 20)
                    return [...new Set(tags)].slice(0, 20);
                }

                function displayTags(tags) {
                    const container = $('#tagsContainer');
                    const tagsText = $('#tagsText');
                    const tagCount = $('#tagCount');

                    container.empty();
                    tagCount.text(tags.length);
                    tagsText.text(tags.join(', '));

                    tags.forEach(tag => {
                        const tagElement = $(`
                                    <span class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-full text-sm font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all">
                                        ${tag}
                                    </span>
                                `);
                        container.append(tagElement);
                    });
                }

                function showError(message) {
                    $('#errorText').text(message);
                    $('#errorMessage').removeClass('hidden');
                    setTimeout(() => {
                        $('#errorMessage')[0].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    }, 100);
                }
            });

            function copyAllTags() {
                const tagsText = $('#tagsText').text();
                navigator.clipboard.writeText(tagsText).then(() => {
                    const btn = event.target.closest('button');
                    const originalHTML = btn.innerHTML;
                    btn.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Copied!';
                    btn.classList.add('bg-green-600', 'text-white', 'border-green-600');

                    setTimeout(() => {
                        btn.innerHTML = originalHTML;
                        btn.classList.remove('bg-green-600', 'text-white', 'border-green-600');
                    }, 2000);
                });
            }
        </script>

        <!-- SEO Content Section -->
        <div
            class="bg-gradient-to-br from-red-50 to-pink-50 rounded-3xl p-8 md:p-12 mt-8 border-2 border-red-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">YouTube Tag Generator</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Generate SEO-optimized tags to boost your video's
                    visibility and rankings</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Our free YouTube Tag Generator helps content creators, marketers, and video producers create effective,
                SEO-optimized tags that improve video discoverability. Generate relevant tags based on your main keyword,
                understand tag strategy, and boost your YouTube SEO with data-driven tag suggestions. Perfect for maximizing
                reach, improving search rankings, and growing your channel organically.
            </p>

            <div class="grid md:grid-cols-3 gap-6 mb-10">
                <div
                    class="bg-white rounded-2xl p-6 shadow-xl border-2 border-red-100 hover:border-red-300 transition-all hover:shadow-2xl">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-red-500 to-pink-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">SEO Optimized</h3>
                    <p class="text-gray-600">Generate tags optimized for YouTube's search algorithm to improve rankings</p>
                </div>
                <div
                    class="bg-white rounded-2xl p-6 shadow-xl border-2 border-pink-100 hover:border-pink-300 transition-all hover:shadow-2xl">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-pink-500 to-rose-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">Instant Results</h3>
                    <p class="text-gray-600">Get relevant tag suggestions instantly based on your keyword</p>
                </div>
                <div
                    class="bg-white rounded-2xl p-6 shadow-xl border-2 border-rose-100 hover:border-rose-300 transition-all hover:shadow-2xl">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-rose-500 to-red-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">Easy Copy</h3>
                    <p class="text-gray-600">One-click copy in comma-separated format ready to paste</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Tag Strategy Guide</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">🎯 Primary Tags (3-5)</h4>
                    <p class="text-white/90 mb-2">Your main keywords that directly describe your video</p>
                    <p class="text-white/80 text-sm">Example: "cooking tutorial", "easy recipes", "beginner cooking"</p>
                </div>
                <div class="bg-gradient-to-br from-pink-500 to-rose-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">📊 Secondary Tags (5-10)</h4>
                    <p class="text-white/90 mb-2">Related keywords that expand your reach</p>
                    <p class="text-white/80 text-sm">Example: "quick meals", "healthy eating", "kitchen tips"</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-red-200 shadow-lg">
                    <h4 class="font-bold text-xl text-gray-900 mb-2">🔍 Long-tail Tags (5-10)</h4>
                    <p class="text-gray-700 mb-2">Specific phrases with less competition</p>
                    <p class="text-gray-600 text-sm">Example: "how to cook pasta for beginners"</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-pink-200 shadow-lg">
                    <h4 class="font-bold text-xl text-gray-900 mb-2">🏷️ Branded Tags (2-3)</h4>
                    <p class="text-gray-700 mb-2">Your channel name and brand keywords</p>
                    <p class="text-gray-600 text-sm">Example: "YourChannelName", "YourBrand cooking"</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✅ Tag Best Practices</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📏</div>
                    <h4 class="font-bold text-gray-900 mb-2">Use 15-20 Tags</h4>
                    <p class="text-gray-600 text-sm">Optimal number for maximum SEO benefit without over-tagging</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎯</div>
                    <h4 class="font-bold text-gray-900 mb-2">Mix Broad & Specific</h4>
                    <p class="text-gray-600 text-sm">Combine general and niche tags for better reach</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🥇</div>
                    <h4 class="font-bold text-gray-900 mb-2">First Tag Matters</h4>
                    <p class="text-gray-600 text-sm">Your most important keyword should be the first tag</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚠️</div>
                    <h4 class="font-bold text-gray-900 mb-2">Avoid Misleading Tags</h4>
                    <p class="text-gray-600 text-sm">Only use tags relevant to your actual content</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔄</div>
                    <h4 class="font-bold text-gray-900 mb-2">Update Regularly</h4>
                    <p class="text-gray-600 text-sm">Refresh tags based on performance and trends</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔍</div>
                    <h4 class="font-bold text-gray-900 mb-2">Research Competitors</h4>
                    <p class="text-gray-600 text-sm">Analyze successful videos in your niche</p>
                </div>
            </div>

            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-2 border-blue-200 rounded-2xl p-8 mb-10">
                <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-3 text-xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    💡 Pro Tips: Maximizing Tag Effectiveness
                </h4>
                <ul class="text-blue-800 leading-relaxed space-y-2">
                    <li>✅ Use your main keyword in the video title, description, AND first tag</li>
                    <li>✅ Include misspellings of popular keywords to capture more searches</li>
                    <li>✅ Add location-based tags if your content is location-specific</li>
                    <li>✅ Use YouTube's autocomplete to find popular search terms</li>
                    <li>✅ Monitor analytics to see which tags drive the most traffic</li>
                </ul>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">How many tags should I use for my YouTube videos?</h4>
                    <p class="text-gray-700 leading-relaxed">YouTube allows up to 500 characters of tags. The sweet spot is
                        15-20 well-chosen tags that mix broad keywords, specific phrases, and long-tail variations. Quality
                        matters more than quantity.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Do YouTube tags really help with SEO?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! While title and description are more important, tags help
                        YouTube understand your content and suggest it to relevant viewers. They're especially useful for
                        commonly misspelled keywords and synonyms.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Should I use single words or phrases as tags?</h4>
                    <p class="text-gray-700 leading-relaxed">Use both! Mix single-word tags (broad reach) with multi-word
                        phrases (specific targeting). For example: "cooking" (broad) and "easy cooking for beginners"
                        (specific).</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I copy tags from popular videos?</h4>
                    <p class="text-gray-700 leading-relaxed">You can use them as inspiration, but create your own unique tag
                        combination. Focus on tags that accurately describe YOUR content. Misleading tags can hurt your
                        channel's performance.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">How often should I update my video tags?</h4>
                    <p class="text-gray-700 leading-relaxed">Review and update tags every 3-6 months, or when you notice
                        performance changes. Add trending keywords relevant to your content and remove underperforming tags
                        based on your analytics.</p>
                </div>
            </div>
        </div>
    </div>
@endsection