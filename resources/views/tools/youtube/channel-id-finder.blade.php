@extends('layouts.app')

@section('title', __tool('youtube-channel-id-finder', 'seo.title', $tool->meta_title))
@section('meta_description', __tool('youtube-channel-id-finder', 'seo.description', $tool->meta_description))

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" />

        <!-- Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-red-200 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">{{ __tool('youtube-channel-id-finder', 'form.title') }}</h2>
            <form id="channelForm">
                @csrf
                <div class="mb-6">
                    <label for="url" class="form-label text-base">{{ __tool('youtube-channel-id-finder', 'form.url_label') }}</label>
                    <input type="url" id="url" name="url" class="form-input"
                        placeholder="{{ __tool('youtube-channel-id-finder', 'form.url_placeholder') }}"
                        required>
                    <p class="text-sm text-gray-500 mt-2">{{ __tool('youtube-channel-id-finder', 'form.url_help') }}</p>
                </div>

                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <span id="btnText">{{ __tool('youtube-channel-id-finder', 'form.find_button') }}</span>
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
                    <h3 class="text-xl font-bold text-gray-900 mb-4" id="successTitle">{{ __tool('youtube-channel-id-finder', 'js.success_title') }}</h3>
                    <div class="bg-white rounded-xl p-4 border-2 border-gray-200">
                        <div class="flex justify-between items-start mb-2">
                            <h4 class="font-bold text-gray-900" id="channelIdLabel">{{ __tool('youtube-channel-id-finder', 'js.channel_id') }}</h4>
                            <button onclick="copyChannelId()"
                                class="flex items-center gap-1 text-sm text-indigo-600 hover:text-indigo-800 font-semibold transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                                <span id="copyText">{{ __tool('youtube-channel-id-finder', 'js.copy') }}</span>
                            </button>
                        </div>
                        <p id="channelId" class="text-gray-700 font-mono break-all text-lg"></p>
                    </div>
                    <div id="channelInfo" class="mt-4 space-y-3"></div>
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
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">{{ __tool('youtube-channel-id-finder', 'content.main_title', 'Find Channel IDs Instantly') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __tool('youtube-channel-id-finder', 'content.main_subtitle', 'Discover any YouTube channel\'s unique identifier') }}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {{ __tool('youtube-channel-id-finder', 'content.main_description', 'Our free YouTube Channel ID Finder helps you discover the unique channel ID for any YouTube channel. Essential for developers using the YouTube API, marketers tracking channels, and content creators managing collaborations. Get instant access to channel IDs without needing API keys or technical knowledge.') }}
            </p>

            <div class="grid md:grid-cols-3 gap-6 mb-10">
                <div
                    class="bg-white rounded-2xl p-6 shadow-xl border-2 border-red-100 hover:border-red-300 transition-all hover:shadow-2xl">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-red-500 to-pink-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">{{ __tool('youtube-channel-id-finder', 'features.instant', 'Instant Results') }}</h3>
                    <p class="text-gray-600">{{ __tool('youtube-channel-id-finder', 'content.feature_instant_desc', 'Get channel IDs immediately from any channel URL') }}</p>
                </div>
                <div
                    class="bg-white rounded-2xl p-6 shadow-xl border-2 border-pink-100 hover:border-pink-300 transition-all hover:shadow-2xl">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-pink-500 to-rose-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">{{ __tool('youtube-channel-id-finder', 'content.feature_formats', 'All URL Formats') }}</h3>
                    <p class="text-gray-600">{{ __tool('youtube-channel-id-finder', 'content.feature_formats_desc', 'Works with @handle, /c/, /channel/, and /user/ URLs') }}</p>
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
                    <h3 class="font-bold text-xl text-gray-900 mb-2">{{ __tool('youtube-channel-id-finder', 'content.feature_copy', 'One-Click Copy') }}</h3>
                    <p class="text-gray-600">{{ __tool('youtube-channel-id-finder', 'content.feature_copy_desc', 'Copy channel IDs instantly for easy use in your projects') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('youtube-channel-id-finder', 'use_cases.title', '🎯 Why You Need Channel IDs') }}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">{{ __tool('youtube-channel-id-finder', 'content.api_dev_title', '💻 API Development') }}</h4>
                    <ul class="space-y-2 text-white/90">
                        <li>• {{ __tool('youtube-channel-id-finder', 'content.api_dev_1', 'Required for YouTube Data API requests') }}</li>
                        <li>• {{ __tool('youtube-channel-id-finder', 'content.api_dev_2', 'Essential for building YouTube integrations') }}</li>
                        <li>• {{ __tool('youtube-channel-id-finder', 'content.api_dev_3', 'Needed for analytics and reporting tools') }}</li>
                        <li>• {{ __tool('youtube-channel-id-finder', 'content.api_dev_4', 'Critical for automation scripts') }}</li>
                    </ul>
                </div>
                <div class="bg-gradient-to-br from-pink-500 to-rose-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">{{ __tool('youtube-channel-id-finder', 'content.marketing_title', '📊 Marketing & Analytics') }}</h4>
                    <ul class="space-y-2 text-white/90">
                        <li>• {{ __tool('youtube-channel-id-finder', 'content.marketing_1', 'Track competitor channels') }}</li>
                        <li>• {{ __tool('youtube-channel-id-finder', 'content.marketing_2', 'Monitor influencer performance') }}</li>
                        <li>• {{ __tool('youtube-channel-id-finder', 'content.marketing_3', 'Build channel databases') }}</li>
                        <li>• {{ __tool('youtube-channel-id-finder', 'content.marketing_4', 'Create custom reports') }}</li>
                    </ul>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('youtube-channel-id-finder', 'use_cases.title', '🔍 Common Use Cases') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚙️</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('youtube-channel-id-finder', 'use_cases.case1', 'API Integration') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-channel-id-finder', 'use_cases.case1_desc') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📈</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('youtube-channel-id-finder', 'use_cases.case2') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-channel-id-finder', 'use_cases.case2_desc') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🤝</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('youtube-channel-id-finder', 'use_cases.case3') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-channel-id-finder', 'use_cases.case3_desc') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔗</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('youtube-channel-id-finder', 'use_cases.case4') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-channel-id-finder', 'use_cases.case4_desc') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎬</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('youtube-channel-id-finder', 'use_cases.case5') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-channel-id-finder', 'use_cases.case5_desc') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔧</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('youtube-channel-id-finder', 'use_cases.case6') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-channel-id-finder', 'use_cases.case6_desc') }}</p>
                </div>
            </div>

            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-2 border-blue-200 rounded-2xl p-8 mb-10">
                <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-3 text-xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ __tool('youtube-channel-id-finder', 'pro_tips.title') }}
                </h4>
                <ul class="text-blue-800 leading-relaxed space-y-2">
                    <li>✅ {{ __tool('youtube-channel-id-finder', 'pro_tips.tip1') }}</li>
                    <li>✅ {{ __tool('youtube-channel-id-finder', 'pro_tips.tip2') }}</li>
                    <li>✅ {{ __tool('youtube-channel-id-finder', 'pro_tips.tip3') }}</li>
                    <li>✅ {{ __tool('youtube-channel-id-finder', 'pro_tips.tip4') }}</li>
                    <li>✅ {{ __tool('youtube-channel-id-finder', 'pro_tips.tip5') }}</li>
                </ul>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('youtube-channel-id-finder', 'faq.title', '❓ Frequently Asked Questions') }}</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-channel-id-finder', 'faq.q1', 'What is a YouTube Channel ID?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-channel-id-finder', 'faq.a1', 'A YouTube Channel ID is a unique 24-character identifier (starting with "UC") assigned to every YouTube channel. It\'s permanent and doesn\'t change even if the channel name or handle changes, making it essential for API integrations and tracking.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-channel-id-finder', 'faq.q2', 'How do I find my own YouTube Channel ID?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-channel-id-finder', 'faq.a2', 'Simply paste your channel URL into our tool above! You can use any format: @handle, /c/channelname, /channel/ID, or /user/username. Our tool will extract the channel ID instantly.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-channel-id-finder', 'faq.q4', 'Why do I need a Channel ID instead of the channel name?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-channel-id-finder', 'faq.a4', 'Channel names and handles can change, but channel IDs are permanent. For API calls, automation, and reliable tracking, using the channel ID ensures your integrations won\'t break if the channel rebrands.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-channel-id-finder', 'faq.q5', 'Can I use Channel IDs with the YouTube Data API?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-channel-id-finder', 'faq.a5', 'Yes! Channel IDs are required for most YouTube Data API endpoints. Use them to fetch channel statistics, videos, playlists, and more. Our tool makes it easy to get the IDs you need for your API projects.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-channel-id-finder', 'faq.q6', 'What URL formats does this tool support?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-channel-id-finder', 'faq.a6', 'Our tool supports all YouTube channel URL formats: @handle (youtube.com/@username), /c/ (youtube.com/c/channelname), /channel/ (youtube.com/channel/ID), and /user/ (youtube.com/user/username).') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Translation keys for JavaScript
    const translations = {
        error_enter_url: "{{ __tool('youtube-channel-id-finder', 'js.error_enter_url') }}",
        error_valid_url: "{{ __tool('youtube-channel-id-finder', 'js.error_valid_url') }}",
        finding: "{{ __tool('youtube-channel-id-finder', 'js.finding') }}",
        error_failed: "{{ __tool('youtube-channel-id-finder', 'js.error_failed') }}",
        success_title: "{{ __tool('youtube-channel-id-finder', 'js.success_title') }}",
        channel_id: "{{ __tool('youtube-channel-id-finder', 'js.channel_id') }}",
        channel_name: "{{ __tool('youtube-channel-id-finder', 'js.channel_name') }}",
        channel_url: "{{ __tool('youtube-channel-id-finder', 'js.channel_url') }}",
        copy: "{{ __tool('youtube-channel-id-finder', 'js.copy') }}",
        copied: "{{ __tool('youtube-channel-id-finder', 'js.copied') }}",
    };

    $(document).ready(function () {
        // Set initial text for results labels
        $('#successTitle').text(translations.success_title);
        $('#channelIdLabel').text(translations.channel_id);
        $('#copyText').text(translations.copy);

        $('#channelForm').on('submit', function (e) {
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

            // Basic YouTube channel URL validation
            const youtubeRegex = /^(https?:\/\/)?(www\.)?(youtube\.com)\/(c\/|@|channel\/|user\/).+$/;
            if (!youtubeRegex.test(url)) {
                showError(translations.error_valid_url);
                return;
            }

            // Show loading state
            btn.prop('disabled', true).addClass('opacity-75');
            btnText.text(translations.finding);

            // AJAX Request
            $.ajax({
                url: '{{ route("youtube.channel-id.find") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    url: url
                },
                success: function (response) {
                    if (response.success) {
                        displayResult(response.data);
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

        function displayResult(data) {
            $('#channelId').text(data.channelId);

            const infoContainer = $('#channelInfo');
            infoContainer.empty();

            if (data.channelName) {
                const nameCard = $(`
                    <div class="bg-white rounded-xl p-4 border-2 border-gray-200">
                        <h4 class="font-bold text-gray-900 mb-2">${translations.channel_name}</h4>
                        <p class="text-gray-700">${data.channelName}</p>
                    </div>
                `);
                infoContainer.append(nameCard);
            }

            if (data.channelUrl) {
                const urlCard = $(`
                    <div class="bg-white rounded-xl p-4 border-2 border-gray-200">
                        <h4 class="font-bold text-gray-900 mb-2">${translations.channel_url}</h4>
                        <a href="${data.channelUrl}" target="_blank" class="text-indigo-600 hover:text-indigo-800 break-all">${data.channelUrl}</a>
                    </div>
                `);
                infoContainer.append(urlCard);
            }
        }

        function showError(message) {
            $('#errorText').text(message);
            $('#errorMessage').removeClass('hidden');
            setTimeout(() => {
                $('#errorMessage')[0].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }, 100);
        }
    });

    function copyChannelId() {
        const id = $('#channelId').text();
        navigator.clipboard.writeText(id).then(() => {
            const btn = event.target.closest('button');
            const originalHTML = btn.innerHTML;
            btn.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> ' + translations.copied;
            btn.classList.add('text-green-600');

            setTimeout(() => {
                btn.innerHTML = originalHTML;
                btn.classList.remove('text-green-600');
            }, 2000);
        });
    }
</script>
@endpush