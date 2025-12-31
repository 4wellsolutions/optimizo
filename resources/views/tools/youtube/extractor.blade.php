@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

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
                    <svg class="w-12 h-12 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">
                    YouTube Video Data Extractor
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                    Extract complete video metadata instantly - title, description, tags, views, likes, and more!
                </p>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- Video Data Extractor Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-red-200 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Extract YouTube Video Data</h2>
            <form id="extractorForm">
                @csrf
                <div class="mb-6">
                    <label for="url" class="form-label text-base">YouTube Video URL</label>
                    <input type="url" id="url" name="url" class="form-input"
                        placeholder="https://www.youtube.com/watch?v=..." required>
                    <p class="text-sm text-gray-500 mt-2">Paste any YouTube video URL to extract all its metadata</p>
                </div>

                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                    </svg>
                    <span id="btnText">Extract Video Data</span>
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
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Video Data Extracted Successfully!</h3>
                    <div id="videoData" class="space-y-4"></div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#extractorForm').on('submit', function (e) {
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
                    btnText.text('Extracting Data...');

                    // AJAX Request
                    $.ajax({
                        url: '{{ route("youtube.extractor.extract") }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            url: url
                        },
                        success: function (response) {
                            if (response.success) {
                                displayVideoData(response.data);
                                $('#resultsSection').removeClass('hidden');

                                // Smooth scroll to results
                                setTimeout(() => {
                                    $('#resultsSection')[0].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                                }, 100);
                            }
                        },
                        error: function (xhr) {
                            const error = xhr.responseJSON?.error || 'Failed to extract video data. Please try again.';
                            showError(error);
                        },
                        complete: function () {
                            btn.prop('disabled', false).removeClass('opacity-75');
                            btnText.text(originalText);
                        }
                    });
                });

                function displayVideoData(data) {
                    const container = $('#videoData');
                    container.empty();

                    // Add thumbnail if available
                    if (data.thumbnail) {
                        const thumbnailHtml = `
                                <div class="bg-white rounded-xl p-4 border-2 border-gray-200 mb-4">
                                    <h4 class="font-bold text-gray-900 mb-3">Video Thumbnail</h4>
                                    <img src="${data.thumbnail}" alt="Video Thumbnail" class="w-48 rounded-lg shadow-lg border-2 border-gray-300">
                                </div>
                            `;
                        container.append(thumbnailHtml);
                    }

                    const fields = [
                        { label: 'Video Title', value: data.title, copyable: true },
                        { label: 'Channel Name', value: data.channel },
                        { label: 'Views', value: data.views },
                        { label: 'Likes', value: data.likes },
                        { label: 'Publish Date', value: data.publishDate },
                        { label: 'Duration', value: data.duration },
                        { label: 'Video ID', value: data.videoId },
                        { label: 'Description', value: data.description, copyable: true, multiline: true },
                        { label: 'Tags', value: data.tags, copyable: true }
                    ];

                    fields.forEach(field => {
                        if (field.value) {
                            const copyButton = field.copyable ? `
                                    <button onclick="copyText('${field.label.replace(/\s/g, '')}', this)" 
                                        class="flex items-center gap-1 text-sm text-indigo-600 hover:text-indigo-800 font-semibold transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                        </svg>
                                        Copy
                                    </button>
                                ` : '';

                            const item = $(`
                                    <div class="bg-white rounded-xl p-4 border-2 border-gray-200 hover:border-indigo-200 transition-all">
                                        <div class="flex justify-between items-start mb-2">
                                            <h4 class="font-bold text-gray-900">${field.label}</h4>
                                            ${copyButton}
                                        </div>
                                        <p id="${field.label.replace(/\s/g, '')}" class="text-gray-700 ${field.multiline ? 'whitespace-pre-wrap' : ''}">${field.value}</p>
                                    </div>
                                `);
                            container.append(item);
                        }
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

            function copyText(id, button) {
                const text = document.getElementById(id).textContent;
                navigator.clipboard.writeText(text).then(() => {
                    const originalText = button.textContent;
                    button.textContent = 'Copied!';
                    button.classList.add('text-green-600');
                    setTimeout(() => {
                        button.textContent = originalText;
                        button.classList.remove('text-green-600');
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
                    <svg class="w-9 h-9 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">YouTube Video Data Extractor</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Extract complete video metadata instantly for SEO
                    analysis and content research</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Our free YouTube Video Data Extractor is the ultimate tool for content creators, digital marketers, SEO
                specialists, and researchers who need quick access to comprehensive video metadata. Extract complete video
                information including title, description, tags, views, likes, channel name, publish date, and thumbnail -
                all without using any YouTube API. Perfect for competitive analysis, content research, SEO optimization, and
                video marketing strategies.
            </p>

            <div class="grid md:grid-cols-3 gap-6 mb-10">
                <div
                    class="bg-white rounded-2xl p-6 shadow-xl border-2 border-red-100 hover:border-red-300 transition-all hover:shadow-2xl">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-red-500 to-pink-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">Complete Data Extraction</h3>
                    <p class="text-gray-600">Get all video metadata in one place - title, description, tags, views, likes,
                        and more</p>
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
                    <h3 class="font-bold text-xl text-gray-900 mb-2">Easy Copy Function</h3>
                    <p class="text-gray-600">One-click copy buttons for title, description, and tags - perfect for content
                        reuse</p>
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
                    <p class="text-gray-600">Get video data instantly without any API keys or registration required</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📊 Extractable Data Fields</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">📝 Content Information</h4>
                    <ul class="space-y-2 text-white/90">
                        <li>• <strong>Video Title</strong> - Full title with formatting</li>
                        <li>• <strong>Description</strong> - Complete video description</li>
                        <li>• <strong>Tags</strong> - All video tags for SEO analysis</li>
                        <li>• <strong>Category</strong> - Video category classification</li>
                    </ul>
                </div>
                <div class="bg-gradient-to-br from-pink-500 to-rose-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">📈 Performance Metrics</h4>
                    <ul class="space-y-2 text-white/90">
                        <li>• <strong>View Count</strong> - Total video views</li>
                        <li>• <strong>Likes</strong> - Number of likes received</li>
                        <li>• <strong>Publish Date</strong> - When video was uploaded</li>
                        <li>• <strong>Duration</strong> - Video length in minutes</li>
                    </ul>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-red-200 shadow-lg">
                    <h4 class="font-bold text-xl text-gray-900 mb-3">👤 Channel Details</h4>
                    <ul class="space-y-2 text-gray-700">
                        <li>• <strong>Channel Name</strong> - Creator's channel name</li>
                        <li>• <strong>Channel URL</strong> - Direct link to channel</li>
                        <li>• <strong>Subscriber Count</strong> - Channel subscribers</li>
                    </ul>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-pink-200 shadow-lg">
                    <h4 class="font-bold text-xl text-gray-900 mb-3">🖼️ Visual Assets</h4>
                    <ul class="space-y-2 text-gray-700">
                        <li>• <strong>Thumbnail</strong> - Video thumbnail image</li>
                        <li>• <strong>Multiple Resolutions</strong> - HD, SD, HQ options</li>
                        <li>• <strong>Channel Avatar</strong> - Creator profile picture</li>
                    </ul>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Common Use Cases</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎬</div>
                    <h4 class="font-bold text-gray-900 mb-2">Content Research</h4>
                    <p class="text-gray-600 text-sm">Analyze competitor videos to understand successful content strategies
                    </p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📊</div>
                    <h4 class="font-bold text-gray-900 mb-2">SEO Optimization</h4>
                    <p class="text-gray-600 text-sm">Extract tags and keywords from high-performing videos to optimize your
                        own content</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📈</div>
                    <h4 class="font-bold text-gray-900 mb-2">Marketing Analysis</h4>
                    <p class="text-gray-600 text-sm">Track video performance metrics and analyze engagement data</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">✍️</div>
                    <h4 class="font-bold text-gray-900 mb-2">Content Creation</h4>
                    <p class="text-gray-600 text-sm">Get inspiration from successful videos and understand what works</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔍</div>
                    <h4 class="font-bold text-gray-900 mb-2">Competitive Analysis</h4>
                    <p class="text-gray-600 text-sm">Study competitor strategies and identify successful patterns</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📝</div>
                    <h4 class="font-bold text-gray-900 mb-2">Data Collection</h4>
                    <p class="text-gray-600 text-sm">Gather video metadata for research and analysis projects</p>
                </div>
            </div>

            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-2 border-blue-200 rounded-2xl p-8 mb-10">
                <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-3 text-xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    💡 Pro Tip: Competitive Analysis Strategy
                </h4>
                <ul class="text-blue-800 leading-relaxed space-y-2">
                    <li>✅ Extract data from top 10 videos in your niche to identify patterns</li>
                    <li>✅ Analyze tags used by successful creators for SEO insights</li>
                    <li>✅ Study video descriptions to understand effective copywriting</li>
                    <li>✅ Compare view-to-like ratios to gauge engagement quality</li>
                    <li>✅ Track publish dates to identify optimal posting times</li>
                </ul>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Do I need a YouTube API key to use this tool?</h4>
                    <p class="text-gray-700 leading-relaxed">No! Our tool extracts publicly available video data without
                        requiring any API keys, registration, or authentication. Simply paste the video URL and get instant
                        results.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What data can I extract from YouTube videos?</h4>
                    <p class="text-gray-700 leading-relaxed">You can extract comprehensive data including video title,
                        description, tags, view count, likes, channel name, publish date, category, duration, thumbnail, and
                        more. All data is displayed in an easy-to-read format with copy buttons.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I use this for competitor analysis?</h4>
                    <p class="text-gray-700 leading-relaxed">Absolutely! This tool is perfect for competitive analysis.
                        Extract data from competitor videos to understand their SEO strategy, content approach, and what
                        makes their videos successful.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is there a limit on how many videos I can analyze?</h4>
                    <p class="text-gray-700 leading-relaxed">No limits! You can extract data from as many YouTube videos as
                        you need, completely free. There are no daily limits, no registration required, and no hidden fees.
                    </p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I copy the extracted data?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! We provide one-click copy buttons for title, description,
                        and tags. You can easily copy any data field and use it for your own content creation, research, or
                        analysis purposes.</p>
                </div>
            </div>
        </div>
    </div>
@endsection