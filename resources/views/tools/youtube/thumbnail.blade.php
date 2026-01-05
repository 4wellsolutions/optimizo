@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-5xl mx-auto">
        <x-tool-hero :tool="$tool" />

        <!-- Thumbnail Downloader Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-red-200 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Download YouTube Thumbnail</h2>
            <form id="thumbnailForm">
                @csrf
                <div class="mb-6">
                    <label for="url" class="form-label text-base">YouTube Video URL</label>
                    <input type="url" id="url" name="url" class="form-input"
                        placeholder="https://www.youtube.com/watch?v=..." required>
                    <p class="text-sm text-gray-500 mt-2">Paste any YouTube video URL to get all available thumbnail
                        resolutions</p>
                </div>

                <button type="submit" class="btn-primary w-full justify-center text-lg py-4 shadow-2xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M21 3H3c-1.11 0-2 .89-2 2v12c0 1.1.89 2 2 2h5v2h8v-2h5c1.1 0 1.99-.9 1.99-2L23 5c0-1.11-.9-2-2-2zm0 14H3V5h18v12zm-5-6l-7 4V7z" />
                    </svg>
                    <span id="btnText">Get Thumbnails</span>
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
                <!-- Thumbnail Preview -->
                <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl p-6 mb-6 border-2 border-indigo-200">
                    <h3 class="text-xl font-bold text-gray-900 mb-4 text-center">Thumbnail Preview</h3>
                    <div class="max-w-2xl mx-auto">
                        <img id="previewImage" src="" alt="Thumbnail Preview"
                            class="w-full rounded-xl shadow-2xl border-2 border-white">
                    </div>
                </div>

                <!-- Download Options -->
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Available Resolutions</h3>
                    <div id="resolutionList" class="space-y-3"></div>
                </div>
            </div>
        </div>

        <!-- SEO Content Section -->
        <div
            class="bg-gradient-to-br from-red-50 via-pink-50 to-rose-50 rounded-3xl p-8 md:p-12 mt-8 border-2 border-red-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M21 3H3c-1.11 0-2 .89-2 2v12c0 1.1.89 2 2 2h5v2h8v-2h5c1.1 0 1.99-.9 1.99-2L23 5c0-1.11-.9-2-2-2zm0 14H3V5h18v12zm-5-6l-7 4V7z" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">How It Works</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Download HD thumbnails from any YouTube video instantly -
                    all resolutions available!</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Download YouTube video thumbnails in the highest quality available with our free thumbnail downloader tool.
                Get thumbnails in HD (1920x1080), Full HD, SD (640x480), HQ, MQ, and default resolutions - all with a single
                click. Perfect for content creators analyzing competitor thumbnails, designers needing reference images,
                marketers creating presentations, or anyone who wants to save memorable video thumbnails for inspiration.
            </p>

            <div class="grid md:grid-cols-3 gap-6 mb-10">
                <div
                    class="bg-white rounded-2xl p-6 shadow-xl border-2 border-red-100 hover:border-red-300 transition-all hover:shadow-2xl">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-red-500 to-pink-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">All Resolutions</h3>
                    <p class="text-gray-600">Download thumbnails in HD, Full HD, SD, HQ, MQ, and default sizes -
                        choose the
                        perfect quality</p>
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
                    <h3 class="font-bold text-xl text-gray-900 mb-2">Instant Download</h3>
                    <p class="text-gray-600">Get thumbnails immediately without any processing delays or waiting
                        time</p>
                </div>
                <div
                    class="bg-white rounded-2xl p-6 shadow-xl border-2 border-rose-100 hover:border-rose-300 transition-all hover:shadow-2xl">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-rose-500 to-red-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">100% Free</h3>
                    <p class="text-gray-600">No registration, no watermarks, no limits - completely free forever</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📐 Available Thumbnail Resolutions</h3>
            <div class="grid md:grid-cols-2 gap-4 mb-10">
                <div class="bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-2">🎬 HD (Maxres)</h4>
                    <p class="text-white/90 mb-2"><strong>Resolution:</strong> 1920x1080 pixels</p>
                    <p class="text-white/80 text-sm">Highest quality available - perfect for presentations, design
                        work, and
                        professional use</p>
                </div>
                <div class="bg-gradient-to-br from-pink-500 to-rose-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-2">📺 SD (Standard)</h4>
                    <p class="text-white/90 mb-2"><strong>Resolution:</strong> 640x480 pixels</p>
                    <p class="text-white/80 text-sm">Standard definition - good balance of quality and file size for
                        web use
                    </p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-red-200 shadow-lg">
                    <h4 class="font-bold text-xl text-gray-900 mb-2">🎯 HQ (High Quality)</h4>
                    <p class="text-gray-700 mb-2"><strong>Resolution:</strong> 480x360 pixels</p>
                    <p class="text-gray-600 text-sm">High quality thumbnail for social media and blogs</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-pink-200 shadow-lg">
                    <h4 class="font-bold text-xl text-gray-900 mb-2">📱 MQ (Medium Quality)</h4>
                    <p class="text-gray-700 mb-2"><strong>Resolution:</strong> 320x180 pixels</p>
                    <p class="text-gray-600 text-sm">Medium quality for mobile displays and previews</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Common Use Cases</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎨</div>
                    <h4 class="font-bold text-gray-900 mb-2">Design Inspiration</h4>
                    <p class="text-gray-600 text-sm">Analyze successful thumbnail designs and create your own
                        eye-catching
                        thumbnails</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📊</div>
                    <h4 class="font-bold text-gray-900 mb-2">Competitor Analysis</h4>
                    <p class="text-gray-600 text-sm">Study competitor thumbnails to understand what works in your
                        niche</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📱</div>
                    <h4 class="font-bold text-gray-900 mb-2">Social Media Sharing</h4>
                    <p class="text-gray-600 text-sm">Share video thumbnails on Instagram, Twitter, or Facebook</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">💼</div>
                    <h4 class="font-bold text-gray-900 mb-2">Presentations</h4>
                    <p class="text-gray-600 text-sm">Use thumbnails in business presentations and reports</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📝</div>
                    <h4 class="font-bold text-gray-900 mb-2">Blog Posts</h4>
                    <p class="text-gray-600 text-sm">Embed video thumbnails in articles and blog content</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎓</div>
                    <h4 class="font-bold text-gray-900 mb-2">Educational Content</h4>
                    <p class="text-gray-600 text-sm">Save educational video thumbnails for reference and study</p>
                </div>
            </div>

            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-2 border-blue-200 rounded-2xl p-8 mb-10">
                <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-3 text-xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    💡 Pro Tip: Creating Effective Thumbnails
                </h4>
                <ul class="text-blue-800 leading-relaxed space-y-2">
                    <li>✅ Use bright, contrasting colors to stand out in search results</li>
                    <li>✅ Include clear, readable text (max 3-5 words)</li>
                    <li>✅ Show faces with emotions - they get 30% more clicks</li>
                    <li>✅ Maintain consistent branding across all your thumbnails</li>
                    <li>✅ Use the 1920x1080 resolution for best quality across all devices</li>
                </ul>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I download thumbnails from any YouTube
                        video?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! Our tool works with any public YouTube video.
                        Simply paste
                        the video URL and download thumbnails in all available resolutions instantly.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What resolution should I choose?</h4>
                    <p class="text-gray-700 leading-relaxed">For professional use, presentations, or design work,
                        choose HD
                        (1920x1080). For web use and social media, SD (640x480) or HQ (480x360) are perfect. The
                        higher the
                        resolution, the better the quality but larger file size.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is it legal to download YouTube thumbnails?
                    </h4>
                    <p class="text-gray-700 leading-relaxed">Downloading thumbnails for personal use, research, or
                        inspiration is generally acceptable. However, using someone else's thumbnail for your own
                        videos
                        without permission may violate copyright. Always create original thumbnails for your
                        content.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Do I need to install any software?</h4>
                    <p class="text-gray-700 leading-relaxed">No! Our tool is completely web-based. Just paste the
                        YouTube
                        URL and download - no software installation, no registration, and no downloads required.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Why are some resolutions not available?</h4>
                    <p class="text-gray-700 leading-relaxed">Not all videos have thumbnails in all resolutions.
                        Older videos
                        or videos from smaller channels may only have lower resolution thumbnails available. Our
                        tool shows
                        all available resolutions for each video.</p>
                </div>
            </div>
        </div>

        <!-- How to Use Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-xl border-2 border-gray-200 mt-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">How to Download YouTube Thumbnails</h2>
            <ol class="space-y-3 text-gray-700">
                <li class="flex items-start">
                    <span class="font-bold text-red-600 mr-3">1.</span>
                    <span><strong>Copy Video URL:</strong> Go to YouTube and copy the video URL from the address bar.</span>
                </li>
                <li class="flex items-start">
                    <span class="font-bold text-red-600 mr-3">2.</span>
                    <span><strong>Paste URL:</strong> Paste the YouTube video URL into the input field above.</span>
                </li>
                <li class="flex items-start">
                    <span class="font-bold text-red-600 mr-3">3.</span>
                    <span><strong>Get Thumbnails:</strong> Click the button to load all available thumbnail
                        resolutions.</span>
                </li>
                <li class="flex items-start">
                    <span class="font-bold text-red-600 mr-3">4.</span>
                    <span><strong>Download:</strong> Choose your preferred resolution and click download to save the
                        thumbnail.</span>
                </li>
            </ol>
        </div>

        <!-- SEO Content: Use Cases -->
        <div class="bg-gradient-to-br from-purple-50 to-indigo-50 rounded-2xl p-6 md:p-8 mt-8 border border-purple-100">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Popular Use Cases for YouTube Thumbnails</h2>
            <ul class="space-y-2 text-gray-700">
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-purple-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span><strong>Content Creation:</strong> Analyze competitor thumbnails for inspiration and
                        trends</span>
                </li>
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-purple-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span><strong>Presentations:</strong> Use video thumbnails in PowerPoint or Google Slides</span>
                </li>
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-purple-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span><strong>Social Media:</strong> Share video previews on Twitter, Facebook, or Instagram</span>
                </li>
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-purple-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span><strong>Design Reference:</strong> Use thumbnails as design inspiration for your own
                        content</span>
                </li>
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-purple-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span><strong>Archiving:</strong> Save memorable video thumbnails for personal collections</span>
                </li>
            </ul>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#thumbnailForm').on('submit', function (e) {
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
                btnText.text('Loading Thumbnails...');

                // AJAX Request
                $.ajax({
                    url: '{{ route('youtube.thumbnail.download') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        url: url
                    },
                    success: function (response) {
                        if (response.success) {
                            displayThumbnails(response.thumbnails, response.videoId);
                            $('#resultsSection').removeClass('hidden');

                            // Smooth scroll to results
                            setTimeout(() => {
                                $('#resultsSection')[0].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                            }, 100);
                        }
                    },
                    error: function (xhr) {
                        const error = xhr.responseJSON?.error || 'Failed to load thumbnails. Please try again.';
                        showError(error);
                    },
                    complete: function () {
                        btn.prop('disabled', false).removeClass('opacity-75');
                        btnText.text(originalText);
                    }
                });
            });

            function displayThumbnails(thumbnails, videoId) {
                const resolutionList = $('#resolutionList');
                resolutionList.empty();

                // Set preview to highest quality (maxresdefault)
                const previewUrl = thumbnails.maxresdefault?.url || thumbnails.sddefault?.url || thumbnails.hqdefault?.url;
                $('#previewImage').attr('src', previewUrl);

                const qualityOrder = ['maxresdefault', 'sddefault', 'hqdefault', 'mqdefault', 'default'];

                qualityOrder.forEach(key => {
                    if (thumbnails[key]) {
                        const thumb = thumbnails[key];
                        const item = `
                                                                            <div class="flex items-center justify-between p-4 rounded-xl border-2 border-gray-200 hover:border-indigo-400 hover:bg-indigo-50 transition-all duration-200 group">
                                                                                <div class="flex items-center space-x-4 flex-1">
                                                                                    <div class="flex-shrink-0">
                                                                                        <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center shadow-lg">
                                                                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                                                            </svg>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="flex-1">
                                                                                        <h4 class="font-bold text-gray-900 text-base mb-1">${thumb.quality}</h4>
                                                                                        <div class="flex items-center space-x-3 text-sm text-gray-600">
                                                                                            <span class="flex items-center">
                                                                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                                                                                </svg>
                                                                                                ${thumb.resolution}
                                                                                            </span>
                                                                                            <span class="px-2 py-1 bg-indigo-100 text-indigo-700 rounded-full text-xs font-bold">${thumb.size}</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="flex-shrink-0 ml-4">
                                                                                    <button onclick="downloadThumbnail('${thumb.url}', 'youtube-thumbnail-${videoId}-${key}.jpg')" 
                                                                                        class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl hover:from-indigo-700 hover:to-purple-700 shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 font-semibold text-sm">
                                                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                                                                        </svg>
                                                                                        Download
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        `;
                        resolutionList.append(item);
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

        // Global function to properly download thumbnail files (outside jQuery ready block)
        async function downloadThumbnail(url, filename) {
            try {
                // Fetch the image as a blob
                const response = await fetch(url);
                const blob = await response.blob();

                // Create a temporary URL for the blob
                const blobUrl = window.URL.createObjectURL(blob);

                // Create a temporary anchor element and trigger download
                const a = document.createElement('a');
                a.href = blobUrl;
                a.download = filename;
                document.body.appendChild(a);
                a.click();

                // Clean up
                document.body.removeChild(a);
                window.URL.revokeObjectURL(blobUrl);
            } catch (error) {
                console.error('Download failed:', error);
                alert('Failed to download thumbnail. Please try again.');
            }
        }
    </script>
@endsection