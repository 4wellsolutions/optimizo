@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- SEO-Optimized Header with Gradient Background -->
        <x-tool-hero :tool="$tool" />

        <!-- Video Tags Extractor Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-red-200 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Extract Video Tags</h2>
            <form id="tagsForm">
                @csrf
                <div class="mb-6">
                    <label for="url" class="form-label text-base">YouTube Video URL</label>
                    <input type="url" id="url" name="url" class="form-input"
                        placeholder="https://www.youtube.com/watch?v=..." required>
                    <p class="text-sm text-gray-500 mt-2">Paste any YouTube video URL to extract all its tags</p>
                </div>

                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                    <span id="btnText">Extract Tags</span>
                </button>
            </form>

            <!-- Error Message -->
            <div id="errorMessage" class="hidden mt-6 bg-red-50 border-2 border-red-200 rounded-xl p-6">
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
                        <h3 class="text-xl font-bold text-gray-900">Extracted Tags (<span id="tagCount">0</span>)</h3>
                        <button onclick="copyAllTags()" class="btn-secondary">
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
                <h2 class="text-4xl font-black text-gray-900 mb-3">Extract Video Tags for SEO</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Analyze tags from any YouTube video for optimization
                    insights</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Extract all tags from any YouTube video instantly with our free tags extractor tool. Analyze competitor
                tags, discover trending keywords, and optimize your own video tags for better search rankings. Perfect for
                content creators, SEO specialists, and digital marketers who want to understand what tags successful videos
                use to rank higher in YouTube search results.
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
                    <h3 class="font-bold text-xl text-gray-900 mb-2">Complete Tag List</h3>
                    <p class="text-gray-600">Extract all tags from any video - see exactly what keywords creators use</p>
                </div>
                <div
                    class="bg-white rounded-2xl p-6 shadow-xl border-2 border-pink-100 hover:border-pink-300 transition-all hover:shadow-2xl">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-pink-500 to-rose-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">One-Click Copy</h3>
                    <p class="text-gray-600">Copy all tags instantly in comma-separated format for easy use</p>
                </div>
                <div
                    class="bg-white rounded-2xl p-6 shadow-xl border-2 border-rose-100 hover:border-rose-300 transition-all hover:shadow-2xl">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-rose-500 to-red-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">Instant Results</h3>
                    <p class="text-gray-600">Get tags immediately without any delays or processing time</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Why Extract YouTube Tags?</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">📊 Competitor Analysis</h4>
                    <p class="text-white/90 mb-2">Discover what tags successful videos in your niche use</p>
                    <p class="text-white/80 text-sm">Analyze top-performing videos to understand their SEO strategy and
                        replicate their success</p>
                </div>
                <div class="bg-gradient-to-br from-pink-500 to-rose-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">🔍 Keyword Research</h4>
                    <p class="text-white/90 mb-2">Find trending keywords and popular search terms</p>
                    <p class="text-white/80 text-sm">Identify high-performing keywords to improve your video's
                        discoverability</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-red-200 shadow-lg">
                    <h4 class="font-bold text-xl text-gray-900 mb-2">💡 Content Ideas</h4>
                    <p class="text-gray-700 mb-2">Get inspiration for your own video tags</p>
                    <p class="text-gray-600 text-sm">See what topics and keywords are trending in your niche</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-pink-200 shadow-lg">
                    <h4 class="font-bold text-xl text-gray-900 mb-2">📈 SEO Optimization</h4>
                    <p class="text-gray-700 mb-2">Optimize your tags for better rankings</p>
                    <p class="text-gray-600 text-sm">Learn from successful videos to improve your own SEO strategy</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Common Use Cases</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎬</div>
                    <h4 class="font-bold text-gray-900 mb-2">Content Research</h4>
                    <p class="text-gray-600 text-sm">Analyze competitor tags to understand successful content strategies</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📊</div>
                    <h4 class="font-bold text-gray-900 mb-2">SEO Analysis</h4>
                    <p class="text-gray-600 text-sm">Study tag patterns in high-ranking videos for optimization insights</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔍</div>
                    <h4 class="font-bold text-gray-900 mb-2">Keyword Discovery</h4>
                    <p class="text-gray-600 text-sm">Find new keyword opportunities from successful videos</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">💼</div>
                    <h4 class="font-bold text-gray-900 mb-2">Marketing Strategy</h4>
                    <p class="text-gray-600 text-sm">Develop data-driven tag strategies for your videos</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📝</div>
                    <h4 class="font-bold text-gray-900 mb-2">Trend Analysis</h4>
                    <p class="text-gray-600 text-sm">Identify trending topics and keywords in your niche</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎓</div>
                    <h4 class="font-bold text-gray-900 mb-2">Learning & Research</h4>
                    <p class="text-gray-600 text-sm">Study how successful creators optimize their content</p>
                </div>
            </div>

            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-2 border-blue-200 rounded-2xl p-8 mb-10">
                <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-3 text-xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    💡 Pro Tips: Using Extracted Tags Effectively
                </h4>
                <ul class="text-blue-800 leading-relaxed space-y-2">
                    <li>✅ Analyze tags from top 10 videos in your niche to find common patterns</li>
                    <li>✅ Don't copy tags directly - use them as inspiration for your own unique tags</li>
                    <li>✅ Focus on tags that are relevant to your specific content</li>
                    <li>✅ Mix broad and specific tags for maximum reach</li>
                    <li>✅ Update your tags regularly based on trending keywords</li>
                </ul>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">How do I extract tags from a YouTube video?</h4>
                    <p class="text-gray-700 leading-relaxed">Simply paste the YouTube video URL into the input field above
                        and click "Extract Tags". Our tool will instantly retrieve all tags used in that video and display
                        them in an easy-to-copy format.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I see tags from any YouTube video?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! Our tool works with any public YouTube video. However, if
                        a video creator hasn't added any tags, the tool will show that no tags are available for that
                        particular video.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is it legal to extract YouTube video tags?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes, extracting tags for research and analysis is completely
                        legal. Tags are publicly available metadata. However, you should create your own original tags
                        rather than copying them directly from other videos.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">How can I use extracted tags for my videos?</h4>
                    <p class="text-gray-700 leading-relaxed">Use extracted tags as inspiration and research. Analyze
                        patterns in successful videos, identify relevant keywords for your niche, and create your own unique
                        tag combinations that accurately describe your content.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Do I need a YouTube API key?</h4>
                    <p class="text-gray-700 leading-relaxed">No! Our tool doesn't require any API keys or authentication.
                        Simply paste the video URL and get instant results - completely free and unlimited.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#tagsForm').on('submit', function (e) {
                e.preventDefault();

                const url = $('#url').val().trim();
                const btn = $(this).find('button[type="submit"]');
                const btnText = $('#btnText');
                const originalText = btnText.text();

                // Hide previous results/errors
                $('#resultsSection').addClass('hidden');
                $('#errorMessage').addClass('hidden');

                // Validate URL
                if (!url) {
                    showError('Please enter a YouTube URL');
                    return;
                }

                // Basic YouTube URL validation
                const youtubeRegex = /^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/.+$/;
                if (!youtubeRegex.test(url)) {
                    showError('Please enter a valid YouTube URL');
                    return;
                }

                // Show loading state
                btn.prop('disabled', true).addClass('opacity-75');
                btnText.text('Extracting Tags...');

                // AJAX Request
                $.ajax({
                    url: '{{ route("youtube.video-tags.extract") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        url: url
                    },
                    success: function (response) {
                        if (response.success && response.tags) {
                            displayTags(response.tags);
                            $('#resultsSection').removeClass('hidden');

                            // Smooth scroll to results
                            setTimeout(() => {
                                $('#resultsSection')[0].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                            }, 100);
                        }
                    },
                    error: function (xhr) {
                        const error = xhr.responseJSON?.error || 'Failed to extract tags. Please try again.';
                        showError(error);
                    },
                    complete: function () {
                        btn.prop('disabled', false).removeClass('opacity-75');
                        btnText.text(originalText);
                    }
                });
            });

            function displayTags(tags) {
                const container = $('#tagsContainer');
                const tagsText = $('#tagsText');
                const tagCount = $('#tagCount');

                container.empty();

                if (!tags || tags.length === 0) {
                    showError('No tags found for this video');
                    return;
                }

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
@endsection