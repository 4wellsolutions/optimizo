@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-red-500 via-pink-500 to-rose-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1.41 16.09V16h-2.67v2.09c-2.45-.4-4.32-2.24-4.32-4.59h2.67c0 1.71 1.39 3.1 3.1 3.1s3.1-1.39 3.1-3.1c0-1.71-1.39-3.1-3.1-3.1-2.76 0-5-2.24-5-5h2.67c0 1.71 1.39 3.1 3.1 3.1s3.1-1.39 3.1-3.1h2.67c0 2.35-1.87 4.19-4.32 4.59z" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2">
                    YouTube Monetization Checker
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium">
                    Check if a YouTube channel is monetized!
                </p>

            @include('components.hero-actions')
        </div>
        </div>

        <!-- Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-red-200 mb-8">
            <form id="monetizationForm">
                @csrf
                <div class="mb-6">
                    <label for="channelUrl" class="form-label text-base">YouTube Channel URL or Handle</label>
                    <input type="text" id="channelUrl" name="url" class="form-input"
                        placeholder="https://www.youtube.com/@channelname or @channelname" required>
                    <p class="text-sm text-gray-500 mt-2">Enter channel URL, handle (@username), or channel ID</p>
                </div>

                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span id="btnText">Check Monetization</span>
                </button>
            </form>

            <!-- Results -->
            <div id="results" class="hidden mt-8">
                <div class="bg-gradient-to-br from-red-50 to-pink-50 rounded-xl p-6 border-2 border-red-200">
                    <div class="flex items-center gap-4 mb-4">
                        <img id="channelThumbnail" src="" alt="Channel" class="w-20 h-20 rounded-full">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900" id="channelName"></h3>
                            <p class="text-gray-600" id="subscriberCount"></p>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4 mt-6">
                        <div class="bg-white rounded-lg p-4">
                            <div class="text-sm text-gray-600 mb-1">Monetization Status</div>
                            <div class="text-2xl font-black" id="monetizationStatus"></div>
                        </div>
                        <div class="bg-white rounded-lg p-4">
                            <div class="text-sm text-gray-600 mb-1">Estimated Status</div>
                            <div class="text-lg font-bold text-gray-900" id="estimatedStatus"></div>
                        </div>
                    </div>

                    <div class="mt-4 p-4 bg-blue-50 border-2 border-blue-200 rounded-lg">
                        <p class="text-sm text-blue-800">
                            <strong>Note:</strong> This tool estimates monetization based on public channel data. Actual
                            monetization status can only be confirmed by the channel owner through YouTube Studio.
                        </p>
                    </div>

            @include('components.hero-actions')
        </div>
            </div>

            <!-- Error -->
            <div id="error" class="hidden mt-8">
                <div class="bg-red-50 border-2 border-red-200 rounded-xl p-6">
                    <p class="text-red-800 font-semibold" id="errorText"></p>
                </div>

            @include('components.hero-actions')
        </div>
        </div>

        <!-- SEO Content - Redesigned -->
        <div
            class="bg-gradient-to-br from-red-50 via-pink-50 to-rose-50 rounded-3xl p-8 md:p-12 mt-8 border-2 border-red-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">YouTube Monetization Checker</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Verify channel eligibility for the YouTube Partner
                    Program instantly</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Check if a YouTube channel is monetized and eligible for the YouTube Partner Program with our free
                monetization checker tool. Our advanced analyzer examines public channel metrics including subscriber count,
                total views, upload frequency, and channel age to provide accurate monetization estimates. Perfect for
                content creators tracking their progress, marketers researching influencers, or anyone curious about a
                channel's revenue potential.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6 text-center">✅ YouTube Partner Program Requirements (2024)</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">👥 1,000 Subscribers</h4>
                    <p class="text-white/90 mb-3">Minimum subscriber threshold required for monetization eligibility</p>
                    <p class="text-white/80 text-sm">Essential first milestone for YouTube Partner Program</p>
                </div>
                <div class="bg-gradient-to-br from-pink-500 to-rose-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">⏱️ 4,000 Watch Hours</h4>
                    <p class="text-white/90 mb-3">Must be accumulated in the past 12 months for long-form content</p>
                    <p class="text-white/80 text-sm">Or 10M Shorts views in 90 days as alternative</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-red-200 shadow-lg">
                    <h4 class="font-bold text-xl text-gray-900 mb-3">💳 Google AdSense Account</h4>
                    <p class="text-gray-700 mb-3">Valid and approved AdSense account linked to your channel</p>
                    <p class="text-gray-600 text-sm">Required for receiving payments from YouTube</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-pink-200 shadow-lg">
                    <h4 class="font-bold text-xl text-gray-900 mb-3">📋 Policy Compliance</h4>
                    <p class="text-gray-700 mb-3">No active strikes, violations, or policy warnings</p>
                    <p class="text-gray-600 text-sm">Full compliance with community and content guidelines</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💰 YouTube Monetization Revenue Streams</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">📺</div>
                    <h4 class="font-bold text-gray-900 mb-2">Ad Revenue</h4>
                    <p class="text-gray-600 text-sm">Display, overlay, skippable, and non-skippable video ads</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">⭐</div>
                    <h4 class="font-bold text-gray-900 mb-2">Channel Memberships</h4>
                    <p class="text-gray-600 text-sm">Monthly recurring payments for exclusive perks</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">💬</div>
                    <h4 class="font-bold text-gray-900 mb-2">Super Chat & Thanks</h4>
                    <p class="text-gray-600 text-sm">Fan funding during live streams and on videos</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🎬</div>
                    <h4 class="font-bold text-gray-900 mb-2">YouTube Premium</h4>
                    <p class="text-gray-600 text-sm">Share of subscription fees from Premium members</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🛍️</div>
                    <h4 class="font-bold text-gray-900 mb-2">Merchandise Shelf</h4>
                    <p class="text-gray-600 text-sm">Sell branded merchandise directly below videos</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🤝</div>
                    <h4 class="font-bold text-gray-900 mb-2">Sponsored Content</h4>
                    <p class="text-gray-600 text-sm">Brand deals and sponsorships opportunities</p>
                </div>
            </div>

            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-2 border-blue-200 rounded-2xl p-8 mb-10">
                <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-3 text-xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    💡 Important Disclaimer
                </h4>
                <p class="text-blue-800 leading-relaxed">
                    This tool provides estimates based on publicly available channel data and YouTube Partner Program
                    requirements. Actual monetization status can only be confirmed by the channel owner through YouTube
                    Studio. Meeting minimum requirements doesn't guarantee approval - channels must maintain compliance with
                    all YouTube policies, community guidelines, and advertiser-friendly content guidelines.
                </p>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">How accurate is the monetization check?</h4>
                    <p class="text-gray-700 leading-relaxed">Our tool provides highly accurate estimates (90%+ accuracy)
                        based on public metrics and YouTube Partner Program requirements. However, only channel owners can
                        confirm actual monetization status through YouTube Studio.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I check any YouTube channel?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! You can check any public YouTube channel by entering its
                        URL, handle (@username), or channel ID. Private or deleted channels cannot be analyzed.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">How long does monetization approval take?</h4>
                    <p class="text-gray-700 leading-relaxed">YouTube typically reviews applications within 1 month after you
                        meet all requirements. Complex cases or high-volume periods may result in longer wait times (up to
                        2-3 months).</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What if my channel is rejected?</h4>
                    <p class="text-gray-700 leading-relaxed">If rejected, review YouTube's feedback, address any policy
                        violations, and reapply after 30 days. Common rejection reasons include reused content, spam,
                        misleading metadata, or policy violations.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">How much money can monetized channels make?</h4>
                    <p class="text-gray-700 leading-relaxed">Earnings vary widely based on niche, audience demographics, CPM
                        rates, and engagement. Average CPM ranges from $0.25 to $4.00 per 1,000 views, but can be much
                        higher for premium niches like finance, technology, or business content.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#monetizationForm').on('submit', function (e) {
            e.preventDefault();

            const url = $('#channelUrl').val().trim();
            const btn = $(this).find('button[type="submit"]');
            const btnText = $('#btnText');

            if (!url) return;

            btn.prop('disabled', true).addClass('opacity-75');
            btnText.text('Checking...');
            $('#results').addClass('hidden');
            $('#error').addClass('hidden');

            $.ajax({
                url: '{{ route("youtube.monetization.check") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    url: url
                },
                success: function (response) {
                    if (response.success) {
                        displayResults(response.data);
                    }
                },
                error: function (xhr) {
                    const error = xhr.responseJSON?.error || 'Failed to check monetization status';
                    $('#errorText').text(error);
                    $('#error').removeClass('hidden');
                },
                complete: function () {
                    btn.prop('disabled', false).removeClass('opacity-75');
                    btnText.text('Check Monetization');
                }
            });
        });

        function displayResults(data) {
            $('#channelThumbnail').attr('src', data.thumbnail);
            $('#channelName').text(data.channelName);
            $('#subscriberCount').text(data.subscribers + ' subscribers');

            const isMonetized = data.isMonetized;
            const statusColor = isMonetized ? 'text-green-600' : 'text-red-600';
            const statusText = isMonetized ? '✅ Likely Monetized' : '❌ Not Monetized';

            $('#monetizationStatus').html(`<span class="${statusColor}">${statusText}</span>`);
            $('#estimatedStatus').text(data.estimatedStatus);

            $('#results').removeClass('hidden');
            setTimeout(() => {
                $('#results')[0].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }, 100);
        }
    </script>
@endsection