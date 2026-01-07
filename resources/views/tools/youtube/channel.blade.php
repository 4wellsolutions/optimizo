@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <!-- Header -->
        <x-tool-hero :tool="$tool" />

        <!-- Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-red-200 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">
                {{ __tool('youtube-channel-extractor', 'form.title', 'Extract Channel Data') }}</h2>
            <form id="channelForm">
                @csrf
                <div class="mb-6">
                    <label for="url"
                        class="form-label text-base">{{ __tool('youtube-channel-extractor', 'form.url_label', 'YouTube Channel URL') }}</label>
                    <input type="url" id="url" name="url" class="form-input"
                        placeholder="https://www.youtube.com/@channelname or https://www.youtube.com/c/channelname"
                        required>
                    <p class="text-sm text-gray-500 mt-2">
                        {{ __tool('youtube-channel-extractor', 'form.url_help', 'Paste any YouTube channel URL to extract its data') }}
                    </p>
                </div>

                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                    </svg>
                    <span
                        id="btnText">{{ __tool('youtube-channel-extractor', 'form.submit', 'Extract Channel Data') }}</span>
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
                    <h3 class="text-xl font-bold text-gray-900 mb-4">
                        {{ __tool('youtube-channel-extractor', 'results.success_title', 'Channel Data Extracted Successfully!') }}
                    </h3>
                    <div id="channelData" class="space-y-4"></div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
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
                        showError('Please enter a YouTube channel URL');
                        return;
                    }

                    // Basic YouTube channel URL validation
                    const youtubeRegex = /^(https?:\/\/)?(www\.)?(youtube\.com)\/(c\/|@|channel\/|user\/).+$/;
                    if (!youtubeRegex.test(url)) {
                        showError('Please enter a valid YouTube channel URL');
                        return;
                    }

                    // Show loading state
                    btn.prop('disabled', true).addClass('opacity-75');
                    btnText.text('Extracting Data...');

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
                                displayChannelData(response.data);
                                $('#resultsSection').removeClass('hidden');

                                // Smooth scroll to results
                                setTimeout(() => {
                                    $('#resultsSection')[0].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                                }, 100);
                            }
                        },
                        error: function (xhr) {
                            const error = xhr.responseJSON?.error || 'Failed to extract channel data. Please try again.';
                            showError(error);
                        },
                        complete: function () {
                            btn.prop('disabled', false).removeClass('opacity-75');
                            btnText.text(originalText);
                        }
                    });
                });

                function displayChannelData(data) {
                    const container = $('#channelData');
                    container.empty();

                    // Add channel avatar if available
                    if (data.avatar) {
                        const avatarHtml = `
                                            <div class="bg-white rounded-xl p-4 border-2 border-gray-200 mb-4">
                                                <h4 class="font-bold text-gray-900 mb-3">Channel Avatar</h4>
                                                <img src="${data.avatar}" alt="Channel Avatar" class="w-32 h-32 rounded-full shadow-lg border-2 border-gray-300">
                                            </div>
                                        `;
                        container.append(avatarHtml);
                    }

                    const fields = [
                        { label: 'Channel Name', value: data.name, copyable: true },
                        { label: 'Subscribers', value: data.subscribers },
                        { label: 'Total Videos', value: data.videoCount },
                        { label: 'Total Views', value: data.views },
                        { label: 'Channel ID', value: data.channelId, copyable: true },
                        { label: 'Channel Handle', value: data.handle },
                        { label: 'Joined Date', value: data.joinedDate },
                        { label: 'Description', value: data.description, copyable: true, multiline: true },
                        { label: 'Channel URL', value: data.url, copyable: true }
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
                    <h4 class="font-bold text-2xl mb-3">📈 Channel Statistics</h4>
                    <ul class="space-y-2 text-white/90">
                        <li>• <strong>Subscriber Count</strong> - Total subscribers</li>
                        <li>• <strong>Video Count</strong> - Number of videos published</li>
                        <li>• <strong>Total Views</strong> - Lifetime channel views</li>
                        <li>• <strong>Join Date</strong> - When channel was created</li>
                    </ul>
                </div>
                <div class="bg-gradient-to-br from-pink-500 to-rose-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">ℹ️ Channel Information</h4>
                    <ul class="space-y-2 text-white/90">
                        <li>• <strong>Channel Name</strong> - Official channel title</li>
                        <li>• <strong>Channel Handle</strong> - @username format</li>
                        <li>• <strong>Description</strong> - Full channel description</li>
                        <li>• <strong>Channel ID</strong> - Unique identifier</li>
                    </ul>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('youtube-channel-extractor', 'content.use_cases_title', 'Common Use Cases') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔍</div>
                    <h4 class="font-bold text-gray-900 mb-2">Competitor Analysis</h4>
                    <p class="text-gray-600 text-sm">Research competitor channels to understand their growth and strategy
                    </p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">👥</div>
                    <h4 class="font-bold text-gray-900 mb-2">Influencer Research</h4>
                    <p class="text-gray-600 text-sm">Evaluate influencers for collaboration and sponsorship opportunities
                    </p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📊</div>
                    <h4 class="font-bold text-gray-900 mb-2">Market Research</h4>
                    <p class="text-gray-600 text-sm">Analyze channel performance in your niche or industry</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">💼</div>
                    <h4 class="font-bold text-gray-900 mb-2">Partnership Evaluation</h4>
                    <p class="text-gray-600 text-sm">Assess potential partners based on their channel metrics</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📈</div>
                    <h4 class="font-bold text-gray-900 mb-2">Growth Tracking</h4>
                    <p class="text-gray-600 text-sm">Monitor channel growth over time for benchmarking</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎯</div>
                    <h4 class="font-bold text-gray-900 mb-2">Content Strategy</h4>
                    <p class="text-gray-600 text-sm">Study successful channels to inform your content strategy</p>
                </div>
            </div>

            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-2 border-blue-200 rounded-2xl p-8 mb-10">
                <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-3 text-xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ __tool('youtube-channel-extractor', 'content.pro_tips_title', 'Pro Tips: Channel Analysis') }}
                </h4>
                <ul class="text-blue-800 leading-relaxed space-y-2">
                    <li>✅ Compare multiple channels in your niche to find growth patterns</li>
                    <li>✅ Track subscriber-to-view ratios to gauge engagement quality</li>
                    <li>✅ Analyze channel descriptions for keyword strategies</li>
                    <li>✅ Monitor join dates to understand channel maturity</li>
                    <li>✅ Use channel data for influencer outreach campaigns</li>
                </ul>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('youtube-channel-extractor', 'content.faq_title', 'Frequently Asked Questions') }}</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Do I need a YouTube API key?</h4>
                    <p class="text-gray-700 leading-relaxed">No! Our tool extracts publicly available channel data without
                        requiring any API keys, registration, or authentication. Simply paste the channel URL and get
                        instant results.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What channel data can I extract?</h4>
                    <p class="text-gray-700 leading-relaxed">You can extract subscriber count, total videos, total views,
                        channel name, description, join date, channel ID, handle, and channel avatar. All data is displayed
                        in an organized format with copy buttons.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I use this for competitor research?</h4>
                    <p class="text-gray-700 leading-relaxed">Absolutely! This tool is perfect for analyzing competitor
                        channels, understanding their growth metrics, and identifying successful strategies in your niche.
                    </p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is there a limit on how many channels I can analyze?
                    </h4>
                    <p class="text-gray-700 leading-relaxed">No limits! Extract data from as many YouTube channels as you
                        need, completely free. Perfect for comprehensive market research and competitive analysis.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What channel URL formats are supported?</h4>
                    <p class="text-gray-700 leading-relaxed">We support all YouTube channel URL formats including @handle,
                        /c/channelname, /channel/ID, and /user/username. Just paste any valid channel URL and we'll extract
                        the data.</p>
                </div>
            </div>
        </div>
    </div>
@endsection