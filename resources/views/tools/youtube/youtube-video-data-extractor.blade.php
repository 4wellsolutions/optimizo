@extends('layouts.app')

@section('title', __tool('youtube-video-data-extractor', 'meta.title'))
@section('meta_description', __tool('youtube-video-data-extractor', 'meta.description'))


@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- SEO-Optimized Header with Gradient Background -->
        <x-tool-hero :tool="$tool" />

        <!-- Video Data Extractor Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-red-200 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">{{ __tool('youtube-video-data-extractor', 'form.title', 'Extract YouTube Video Data') }}</h2>
            <form id="extractorForm">
                @csrf
                <div class="mb-6">
                    <label for="url" class="form-label text-base">{{ __tool('youtube-video-data-extractor', 'form.url_label', 'YouTube Video URL') }}</label>
                    <input type="url" id="url" name="url" class="form-input"
                        placeholder="https://www.youtube.com/watch?v=..." required>
                    <p class="text-sm text-gray-500 mt-2">{{ __tool('youtube-video-data-extractor', 'form.url_help', 'Paste any YouTube video URL to extract all its metadata') }}</p>
                </div>

                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                    </svg>
                    <span id="btnText">{{ __tool('youtube-video-data-extractor', 'form.submit', 'Extract Video Data') }}</span>
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
                    <h3 class="text-xl font-bold text-gray-900 mb-4">{{ __tool('youtube-video-data-extractor', 'results.success_title', 'Video Data Extracted Successfully!') }}</h3>
                    <div id="videoData" class="space-y-4"></div>
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
                    <svg class="w-9 h-9 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">{{ __tool('youtube-video-data-extractor', 'content.main_title', 'Complete Video Data Extraction') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __tool('youtube-video-data-extractor', 'content.main_subtitle', 'Extract complete video data instantly') }}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {{ __tool('youtube-video-data-extractor', 'content.description', 'Our free YouTube Video Data Extractor is the ultimate tool for content creators, digital marketers, SEO specialists, and researchers who need quick access to comprehensive video metadata. Extract complete video information including title, description, tags, views, likes, channel name, publish date, and thumbnail - all without using any YouTube API. Perfect for competitive analysis, content research, SEO optimization, and video marketing strategies.') }}
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
                    <h3 class="font-bold text-xl text-gray-900 mb-2">{{ __tool('youtube-video-data-extractor', 'content.feature_complete_data_title', 'Complete Data Extraction') }}</h3>
                    <p class="text-gray-600">{{ __tool('youtube-video-data-extractor', 'content.feature_complete_data_description', 'Get all video metadata in one place - title, description, tags, views, likes, and more') }}</p>
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
                    <h3 class="font-bold text-xl text-gray-900 mb-2">{{ __tool('youtube-video-data-extractor', 'content.feature_easy_copy_title', 'Easy Copy Function') }}</h3>
                    <p class="text-gray-600">{{ __tool('youtube-video-data-extractor', 'content.feature_easy_copy_description', 'One-click copy buttons for title, description, and tags - perfect for content reuse') }}</p>
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
                    <h3 class="font-bold text-xl text-gray-900 mb-2">{{ __tool('youtube-video-data-extractor', 'content.feature_instant_results_title', 'Instant Results') }}</h3>
                    <p class="text-gray-600">{{ __tool('youtube-video-data-extractor', 'content.feature_instant_results_description', 'Get video data instantly without any API keys or registration required') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('youtube-video-data-extractor', 'content.extractable_data_title', 'Extractable Data Fields') }}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">{{ __tool('youtube-video-data-extractor', 'content.data_content_title', '\ud83d\udcdd Content Information') }}</h4>
                    <ul class="space-y-2 text-white/90">
                        <li>? <strong>{{ __tool('youtube-video-data-extractor', 'content.data_video_title', 'Video Title') }}</strong> - {{ __tool('youtube-video-data-extractor', 'content.data_video_title_desc', 'Full title with formatting') }}</li>
                        <li>? <strong>{{ __tool('youtube-video-data-extractor', 'content.data_description', 'Description') }}</strong> - {{ __tool('youtube-video-data-extractor', 'content.data_description_desc', 'Complete video description') }}</li>
                        <li>? <strong>{{ __tool('youtube-video-data-extractor', 'content.data_tags', 'Tags') }}</strong> - {{ __tool('youtube-video-data-extractor', 'content.data_tags_desc', 'All video tags for SEO analysis') }}</li>
                        <li>? <strong>{{ __tool('youtube-video-data-extractor', 'content.data_category', 'Category') }}</strong> - {{ __tool('youtube-video-data-extractor', 'content.data_category_desc', 'Video category classification') }}</li>
                    </ul>
                </div>
                <div class="bg-gradient-to-br from-pink-500 to-rose-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">{{ __tool('youtube-video-data-extractor', 'content.data_performance_title', '\ud83d\udcca Performance Metrics') }}</h4>
                    <ul class="space-y-2 text-white/90">
                        <li>? <strong>{{ __tool('youtube-video-data-extractor', 'content.data_view_count', 'View Count') }}</strong> - {{ __tool('youtube-video-data-extractor', 'content.data_view_count_desc', 'Total video views') }}</li>
                        <li>? <strong>{{ __tool('youtube-video-data-extractor', 'content.data_likes', 'Likes') }}</strong> - {{ __tool('youtube-video-data-extractor', 'content.data_likes_desc', 'Number of likes received') }}</li>
                        <li>? <strong>{{ __tool('youtube-video-data-extractor', 'content.data_publish_date', 'Publish Date') }}</strong> - {{ __tool('youtube-video-data-extractor', 'content.data_publish_date_desc', 'When video was uploaded') }}</li>
                        <li>? <strong>{{ __tool('youtube-video-data-extractor', 'content.data_duration', 'Duration') }}</strong> - {{ __tool('youtube-video-data-extractor', 'content.data_duration_desc', 'Video length in minutes') }}</li>
                    </ul>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-red-200 shadow-lg">
                    <h4 class="font-bold text-xl text-gray-900 mb-3">{{ __tool('youtube-video-data-extractor', 'content.data_channel_title', '\ud83d\udcfa Channel Details') }}</h4>
                    <ul class="space-y-2 text-gray-700">
                        <li>? <strong>{{ __tool('youtube-video-data-extractor', 'content.data_channel_name', 'Channel Name') }}</strong> - {{ __tool('youtube-video-data-extractor', 'content.data_channel_name_desc', "Creator's channel name") }}</li>
                        <li>? <strong>{{ __tool('youtube-video-data-extractor', 'content.data_channel_url', 'Channel URL') }}</strong> - {{ __tool('youtube-video-data-extractor', 'content.data_channel_url_desc', 'Direct link to channel') }}</li>
                        <li>? <strong>{{ __tool('youtube-video-data-extractor', 'content.data_subscriber_count', 'Subscriber Count') }}</strong> - {{ __tool('youtube-video-data-extractor', 'content.data_subscriber_count_desc', 'Channel subscribers') }}</li>
                    </ul>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-pink-200 shadow-lg">
                    <h4 class="font-bold text-xl text-gray-900 mb-3">{{ __tool('youtube-video-data-extractor', 'content.data_visual_title', '\ud83d\uddbc\ufe0f Visual Assets') }}</h4>
                    <ul class="space-y-2 text-gray-700">
                        <li>? <strong>{{ __tool('youtube-video-data-extractor', 'content.data_thumbnail', 'Thumbnail') }}</strong> - {{ __tool('youtube-video-data-extractor', 'content.data_thumbnail_desc', 'Video thumbnail image') }}</li>
                        <li>? <strong>{{ __tool('youtube-video-data-extractor', 'content.data_resolutions', 'Multiple Resolutions') }}</strong> - {{ __tool('youtube-video-data-extractor', 'content.data_resolutions_desc', 'HD, SD, HQ options') }}</li>
                        <li>? <strong>{{ __tool('youtube-video-data-extractor', 'content.data_avatar', 'Channel Avatar') }}</strong> - {{ __tool('youtube-video-data-extractor', 'content.data_avatar_desc', 'Creator profile picture') }}</li>
                    </ul>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('youtube-video-data-extractor', 'content.use_cases_title', 'Common Use Cases') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔍</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('youtube-video-data-extractor', 'content.use_case_research_title', 'Content Research') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-video-data-extractor', 'content.use_case_research_desc', 'Analyze competitor videos to understand successful content strategies') }}
                    </p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎯</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('youtube-video-data-extractor', 'content.use_case_seo_title', 'SEO Optimization') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-video-data-extractor', 'content.use_case_seo_desc', 'Extract tags and keywords from high-performing videos to optimize your own content') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📊</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('youtube-video-data-extractor', 'content.use_case_marketing_title', 'Marketing Analysis') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-video-data-extractor', 'content.use_case_marketing_desc', 'Track video performance metrics and analyze engagement data') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">💡</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('youtube-video-data-extractor', 'content.use_case_creation_title', 'Content Creation') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-video-data-extractor', 'content.use_case_creation_desc', 'Get inspiration from successful videos and understand what works') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔬</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('youtube-video-data-extractor', 'content.use_case_competitive_title', 'Competitive Analysis') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-video-data-extractor', 'content.use_case_competitive_desc', 'Study competitor strategies and identify successful patterns') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📁</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('youtube-video-data-extractor', 'content.use_case_data_title', 'Data Collection') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-video-data-extractor', 'content.use_case_data_desc', 'Gather video metadata for research and analysis projects') }}</p>
                </div>
            </div>

            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-2 border-blue-200 rounded-2xl p-8 mb-10">
                <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-3 text-xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ __tool('youtube-video-data-extractor', 'content.pro_tips_title', 'Pro Tip: Competitive Analysis Strategy') }}
                </h4>
                <ul class="text-blue-800 leading-relaxed space-y-2">
                    <li>✅ {{ __tool('youtube-video-data-extractor', 'content.pro_tip_1', 'Extract data from top 10 videos in your niche to identify patterns') }}</li>
                    <li>✅ {{ __tool('youtube-video-data-extractor', 'content.pro_tip_2', 'Analyze tags used by successful creators for SEO insights') }}</li>
                    <li>✅ {{ __tool('youtube-video-data-extractor', 'content.pro_tip_3', 'Study video descriptions to understand effective copywriting') }}</li>
                    <li>✅ {{ __tool('youtube-video-data-extractor', 'content.pro_tip_4', 'Compare view-to-like ratios to gauge engagement quality') }}</li>
                    <li>✅ {{ __tool('youtube-video-data-extractor', 'content.pro_tip_5', 'Track publish dates to identify optimal posting times') }}</li>
                </ul>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('youtube-video-data-extractor', 'content.faq_title', 'Frequently Asked Questions') }}</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-video-data-extractor', 'content.faq_q1', 'Do I need a YouTube API key to use this tool?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-video-data-extractor', 'content.faq_a1', 'No! Our tool extracts publicly available video data without requiring any API keys, registration, or authentication. Simply paste the video URL and get instant results.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-video-data-extractor', 'content.faq_q2', 'What data can I extract from YouTube videos?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-video-data-extractor', 'content.faq_a2', 'You can extract comprehensive data including video title, description, tags, view count, likes, channel name, publish date, category, duration, thumbnail, and more. All data is displayed in an easy-to-read format with copy buttons.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-video-data-extractor', 'content.faq_q3', 'Can I use this for competitor analysis?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-video-data-extractor', 'content.faq_a3', 'Absolutely! This tool is perfect for competitive analysis. Extract data from competitor videos to understand their SEO strategy, content approach, and what makes their videos successful.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-video-data-extractor', 'content.faq_q4', 'Is there a limit on how many videos I can analyze?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-video-data-extractor', 'content.faq_a4', 'No limits! You can extract data from as many YouTube videos as you need, completely free. There are no daily limits, no registration required, and no hidden fees.') }}
                    </p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-video-data-extractor', 'content.faq_q5', 'Can I copy the extracted data?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-video-data-extractor', 'content.faq_a5', 'Yes! We provide one-click copy buttons for title, description, and tags. You can easily copy any data field and use it for your own content creation, research, or analysis purposes.') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Translation keys for JavaScript
    const translations = {
        error_enter_url: "{{ __tool('youtube-video-data-extractor', 'js.error_enter_url') }}",
        error_valid_url: "{{ __tool('youtube-video-data-extractor', 'js.error_valid_url') }}",
        extracting: "{{ __tool('youtube-video-data-extractor', 'js.extracting') }}",
        error_failed: "{{ __tool('youtube-video-data-extractor', 'js.error_failed') }}",
        video_thumbnail: "{{ __tool('youtube-video-data-extractor', 'js.video_thumbnail') }}",
        video_title: "{{ __tool('youtube-video-data-extractor', 'js.video_title') }}",
        channel_name: "{{ __tool('youtube-video-data-extractor', 'js.channel_name') }}",
        views: "{{ __tool('youtube-video-data-extractor', 'js.views') }}",
        likes: "{{ __tool('youtube-video-data-extractor', 'js.likes') }}",
        publish_date: "{{ __tool('youtube-video-data-extractor', 'js.publish_date') }}",
        duration: "{{ __tool('youtube-video-data-extractor', 'js.duration') }}",
        video_id: "{{ __tool('youtube-video-data-extractor', 'js.video_id') }}",
        description: "{{ __tool('youtube-video-data-extractor', 'js.description') }}",
        tags: "{{ __tool('youtube-video-data-extractor', 'js.tags') }}",
        copy: "{{ __tool('youtube-video-data-extractor', 'js.copy') }}",
        copied: "{{ __tool('youtube-video-data-extractor', 'js.copied') }}",
    };

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
                showError(translations.error_enter_url);
                return;
            }

            // Basic YouTube URL validation
            const youtubeRegex = /^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/.+$/;
            if (!youtubeRegex.test(url)) {
                showError(translations.error_valid_url);
                return;
            }

            // Show loading state
            btn.prop('disabled', true).addClass('opacity-75');
            btnText.text(translations.extracting);

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
                    const error = xhr.responseJSON?.error || translations.error_failed;
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
                        <h4 class="font-bold text-gray-900 mb-3">${translations.video_thumbnail}</h4>
                        <img src="${data.thumbnail}" alt="${translations.video_thumbnail}" class="w-48 rounded-lg shadow-lg border-2 border-gray-300">
                    </div>
                `;
                container.append(thumbnailHtml);
            }

            const fields = [
                { label: translations.video_title, value: data.title, copyable: true },
                { label: translations.channel_name, value: data.channel },
                { label: translations.views, value: data.views },
                { label: translations.likes, value: data.likes },
                { label: translations.publish_date, value: data.publishDate },
                { label: translations.duration, value: data.duration },
                { label: translations.video_id, value: data.videoId },
                { label: translations.description, value: data.description, copyable: true, multiline: true },
                { label: translations.tags, value: data.tags, copyable: true }
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
                            ${translations.copy}
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
            button.textContent = translations.copied;
            button.classList.add('text-green-600');
            setTimeout(() => {
                button.textContent = originalText;
                button.classList.remove('text-green-600');
            }, 2000);
        });
    }
</script>
@endpush