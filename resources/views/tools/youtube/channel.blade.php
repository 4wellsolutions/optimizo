@extends('layouts.app')

@section('title', __tool('youtube-channel', 'seo.title', $tool->meta_title))
@section('meta_description', __tool('youtube-channel', 'seo.description', $tool->meta_description))

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <!-- Header -->
        <x-tool-hero :tool="$tool" />

        <!-- Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-red-200 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">{{ __tool('youtube-channel', 'form.title') }}</h2>
            <form id="channelForm">
                @csrf
                <div class="mb-6">
                    <label for="url" class="form-label text-base">{{ __tool('youtube-channel', 'form.url_label') }}</label>
                    <input type="url" id="url" name="url" class="form-input"
                        placeholder="{{ __tool('youtube-channel', 'form.url_placeholder') }}"
                        required>
                    <p class="text-sm text-gray-500 mt-2">{{ __tool('youtube-channel', 'form.url_help') }}</p>
                </div>

                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                    </svg>
                    <span id="btnText">{{ __tool('youtube-channel', 'form.submit') }}</span>
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
                    <h3 class="text-xl font-bold text-gray-900 mb-4">{{ __tool('youtube-channel', 'results.success_title') }}</h3>
                    <div id="channelData" class="space-y-4"></div>
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
                <h2 class="text-4xl font-black text-gray-900 mb-3">
                    {{ __tool('youtube-channel-extractor', 'content.main_title', 'YouTube Channel Data Extractor') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    {{ __tool('youtube-channel-extractor', 'content.main_subtitle', 'Extract complete channel statistics and information instantly') }}
                </p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {{ __tool('youtube-channel-extractor', 'content.description', 'Our free YouTube Channel Data Extractor helps you analyze any YouTube channel by extracting comprehensive statistics and information. Get subscriber counts, total videos, view counts, channel descriptions, join dates, and more - all without needing a YouTube API key. Perfect for competitor analysis, influencer research, marketing campaigns, and content strategy planning.') }}
            </p>

            <div class="grid md:grid-cols-3 gap-6 mb-10">
                <div
                    class="bg-white rounded-2xl p-6 shadow-xl border-2 border-red-100 hover:border-red-300 transition-all hover:shadow-2xl">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-red-500 to-pink-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">{{ __tool('youtube-channel-extractor', 'content.feature_complete_stats_title', 'Complete Statistics') }}</h3>
                    <p class="text-gray-600">{{ __tool('youtube-channel-extractor', 'content.feature_complete_stats_description', 'Get subscribers, views, video count, and all channel metrics') }}</p>
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
                    <h3 class="font-bold text-xl text-gray-900 mb-2">{{ __tool('youtube-channel-extractor', 'content.feature_instant_results_title', 'Instant Results') }}</h3>
                    <p class="text-gray-600">{{ __tool('youtube-channel-extractor', 'content.feature_instant_results_description', 'Extract channel data instantly without any delays') }}</p>
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
                    <h3 class="font-bold text-xl text-gray-900 mb-2">{{ __tool('youtube-channel-extractor', 'content.feature_free_title', '100% Free') }}</h3>
                    <p class="text-gray-600">{{ __tool('youtube-channel-extractor', 'content.feature_free_description', 'No API keys, no registration, completely free forever') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('youtube-channel-extractor', 'content.extractable_data_title', 'Extractable Channel Data') }}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">{{ __tool('youtube-channel', 'stats.title') }}</h4>
                    <ul class="space-y-2 text-white/90">
                        <li>• <strong>{{ __tool('youtube-channel', 'stats.subscriber_count') }}</strong> - {{ __tool('youtube-channel', 'stats.subscriber_count_desc') }}</li>
                        <li>• <strong>{{ __tool('youtube-channel', 'stats.video_count') }}</strong> - {{ __tool('youtube-channel', 'stats.video_count_desc') }}</li>
                        <li>• <strong>{{ __tool('youtube-channel', 'stats.total_views') }}</strong> - {{ __tool('youtube-channel', 'stats.total_views_desc') }}</li>
                        <li>• <strong>{{ __tool('youtube-channel', 'stats.join_date') }}</strong> - {{ __tool('youtube-channel', 'stats.join_date_desc') }}</li>
                    </ul>
                </div>
                <div class="bg-gradient-to-br from-pink-500 to-rose-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">{{ __tool('youtube-channel', 'info.title') }}</h4>
                    <ul class="space-y-2 text-white/90">
                        <li>• <strong>{{ __tool('youtube-channel', 'info.channel_name') }}</strong> - {{ __tool('youtube-channel', 'info.channel_name_desc') }}</li>
                        <li>• <strong>{{ __tool('youtube-channel', 'info.channel_handle') }}</strong> - {{ __tool('youtube-channel', 'info.channel_handle_desc') }}</li>
                        <li>• <strong>{{ __tool('youtube-channel', 'info.description') }}</strong> - {{ __tool('youtube-channel', 'info.description_desc') }}</li>
                        <li>• <strong>{{ __tool('youtube-channel', 'info.channel_id') }}</strong> - {{ __tool('youtube-channel', 'info.channel_id_desc') }}</li>
                    </ul>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('youtube-channel-extractor', 'content.use_cases_title', 'Common Use Cases') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔍</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('youtube-channel', 'use_cases.case1') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-channel', 'use_cases.case1_desc') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">👥</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('youtube-channel', 'use_cases.case2') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-channel', 'use_cases.case2_desc') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📊</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('youtube-channel', 'use_cases.case3') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-channel', 'use_cases.case3_desc') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">💼</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('youtube-channel', 'use_cases.case4') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-channel', 'use_cases.case4_desc') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📈</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('youtube-channel', 'use_cases.case5') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-channel', 'use_cases.case5_desc') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎯</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('youtube-channel', 'use_cases.case6') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-channel', 'use_cases.case6_desc') }}</p>
                </div>
            </div>

            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-2 border-blue-200 rounded-2xl p-8 mb-10">
                <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-3 text-xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ __tool('youtube-channel', 'pro_tips.title') }}
                </h4>
                <ul class="text-blue-800 leading-relaxed space-y-2">
                    <li>✅ {{ __tool('youtube-channel', 'pro_tips.tip1') }}</li>
                    <li>✅ {{ __tool('youtube-channel', 'pro_tips.tip2') }}</li>
                    <li>✅ {{ __tool('youtube-channel', 'pro_tips.tip3') }}</li>
                    <li>✅ {{ __tool('youtube-channel', 'pro_tips.tip4') }}</li>
                    <li>✅ {{ __tool('youtube-channel', 'pro_tips.tip5') }}</li>
                </ul>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('youtube-channel', 'faq.title') }}</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-channel', 'faq.q1') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-channel', 'faq.a1') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-channel', 'faq.q2') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-channel', 'faq.a2') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-channel', 'faq.q3') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-channel', 'faq.a3') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-channel', 'faq.q4') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-channel', 'faq.a4') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-channel', 'faq.q5') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-channel', 'faq.a5') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Translation keys for JavaScript
    const translations = {
        error_enter_url: "{{ __tool('youtube-channel', 'js.error_enter_url') }}",
        error_valid_url: "{{ __tool('youtube-channel', 'js.error_valid_url') }}",
        extracting: "{{ __tool('youtube-channel', 'js.extracting') }}",
        error_failed: "{{ __tool('youtube-channel', 'js.error_failed') }}",
        copy: "{{ __tool('youtube-channel', 'js.copy') }}",
        copied: "{{ __tool('youtube-channel', 'js.copied') }}",
    };

    $(document).ready(function () {
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
            btnText.text(translations.extracting);

            // AJAX Request
            $.ajax({
                url: '{{ route("youtube.channel.extract") }}',
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
            const container = $('#channelData');
            container.empty();

            // Define fields to display
            const fields = [
                { label: 'Channel Name', value: data.channelName || data.name, copyable: false },
                { label: 'Channel ID', value: data.channelId, copyable: true },
                { label: 'Subscriber Count', value: data.subscriberCount || data.subscribers, copyable: false },
                { label: 'Total Videos', value: data.videoCount, copyable: false },
                { label: 'Total Views', value: data.viewCount || data.views, copyable: false },
                { label: 'Channel Description', value: data.description, copyable: false, multiline: true },
                { label: 'Custom URL', value: data.customUrl || data.handle, copyable: true },
                { label: 'Country', value: data.country, copyable: false },
                { label: 'Published Date', value: data.publishedAt || data.joinedDate, copyable: false },
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
            button.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> ' + translations.copied;
            button.classList.add('text-green-600');

            setTimeout(() => {
                button.textContent = originalText;
                button.classList.remove('text-green-600');
            }, 2000);
        });
    }
</script>
@endpush
```