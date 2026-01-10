@extends('layouts.app')

@section('title', __tool('youtube-earnings-calculator', 'seo.title', $tool->meta_title))
@section('meta_description', __tool('youtube-earnings-calculator', 'seo.description', $tool->meta_description))

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <!-- Header -->
        <x-tool-hero :tool="$tool" />

        <!-- Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-red-200 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">{{ __tool('youtube-earnings-calculator', 'how_to_use.title', 'Calculate YouTube Earnings') }}</h2>
            <form id="earningsForm">
                @csrf
                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="views" class="form-label text-base">{{ __tool('youtube-earnings-calculator', 'form.daily_views_label', 'Daily Video Views') }}</label>
                        <input type="number" id="views" name="views" class="form-input" placeholder="10000" min="0"
                            required>
                        <p class="text-sm text-gray-500 mt-2">{{ __tool('youtube-earnings-calculator', 'form.daily_views_help', 'Enter your average daily video views') }}</p>
                    </div>

                    <div>
                        <label for="cpm" class="form-label text-base">{{ __tool('youtube-earnings-calculator', 'form.cpm_label', 'Estimated CPM ($)') }}</label>
                        <input type="number" id="cpm" name="cpm" class="form-input" placeholder="2.50" min="0" step="0.01"
                            value="2.50" required>
                        <p class="text-sm text-gray-500 mt-2">{{ __tool('youtube-earnings-calculator', 'form.cpm_help', 'Average CPM ranges from $0.25 to $4.00') }}</p>
                    </div>
                </div>

                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span id="btnText">{{ __tool('youtube-earnings-calculator', 'form.calculate_button', 'Calculate Earnings') }}</span>
                </button>
            </form>

            <!-- Results Section -->
            <div id="resultsSection" class="hidden mt-8">
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 border-2 border-green-200 rounded-2xl p-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">{{ __tool('youtube-earnings-calculator', 'form.estimated_earnings', 'Estimated Earnings') }}</h3>

                    <div class="grid md:grid-cols-3 gap-4 mb-6">
                        <div class="bg-white rounded-xl p-6 border-2 border-gray-200 text-center">
                            <p class="text-sm text-gray-600 mb-2 font-semibold">{{ __tool('youtube-earnings-calculator', 'form.daily', 'Daily') }}</p>
                            <p id="dailyEarnings" class="text-3xl font-black text-green-600"></p>
                            <p id="dailyRange" class="text-xs text-gray-500 mt-1"></p>
                        </div>
                        <div class="bg-white rounded-xl p-6 border-2 border-indigo-200 text-center">
                            <p class="text-sm text-gray-600 mb-2 font-semibold">{{ __tool('youtube-earnings-calculator', 'form.monthly', 'Monthly') }}</p>
                            <p id="monthlyEarnings" class="text-3xl font-black text-indigo-600"></p>
                            <p id="monthlyRange" class="text-xs text-gray-500 mt-1"></p>
                        </div>
                        <div class="bg-white rounded-xl p-6 border-2 border-purple-200 text-center">
                            <p class="text-sm text-gray-600 mb-2 font-semibold">{{ __tool('youtube-earnings-calculator', 'form.yearly', 'Yearly') }}</p>
                            <p id="yearlyEarnings" class="text-3xl font-black text-purple-600"></p>
                            <p id="yearlyRange" class="text-xs text-gray-500 mt-1"></p>
                        </div>
                    </div>

                    <div class="bg-blue-50 border-2 border-blue-200 rounded-xl p-4">
                        <p class="text-sm text-blue-800">
                            {{ __tool('youtube-earnings-calculator', 'form.note', 'Note: These are estimates based on your CPM. Actual earnings vary based on niche, audience location, engagement, and ad types.') }}
                        </p>
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
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">{{ __tool('youtube-earnings-calculator', 'content.main_title', 'Calculate Your Revenue Potential') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __tool('youtube-earnings-calculator', 'content.main_subtitle', 'Estimate your YouTube earnings based on views and CPM') }}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {{ __tool('youtube-earnings-calculator', 'content.main_description', 'Our free YouTube Earnings Calculator helps content creators estimate their potential revenue based on daily views and CPM (Cost Per Mille). Get instant calculations for daily, monthly, and yearly earnings with realistic ranges. Perfect for planning your YouTube career, setting revenue goals, and understanding your channel\'s monetization potential.') }}
            </p>

            <div class="grid md:grid-cols-3 gap-6 mb-10">
                <div
                    class="bg-white rounded-2xl p-6 shadow-xl border-2 border-red-100 hover:border-red-300 transition-all hover:shadow-2xl">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-red-500 to-pink-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">{{ __tool('youtube-earnings-calculator', 'features.instant', 'Instant Calculations') }}</h3>
                    <p class="text-gray-600">{{ __tool('youtube-earnings-calculator', 'features.instant_desc', 'Get daily, monthly, and yearly earnings estimates instantly') }}</p>
                </div>
                <div
                    class="bg-white rounded-2xl p-6 shadow-xl border-2 border-pink-100 hover:border-pink-300 transition-all hover:shadow-2xl">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-pink-500 to-rose-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">{{ __tool('youtube-earnings-calculator', 'features.realistic_ranges', 'Realistic Ranges') }}</h3>
                    <p class="text-gray-600">{{ __tool('youtube-earnings-calculator', 'features.realistic_ranges_desc', 'See low and high estimates based on CPM variations') }}</p>
                </div>
                <div
                    class="bg-white rounded-2xl p-6 shadow-xl border-2 border-rose-100 hover:border-rose-300 transition-all hover:shadow-2xl">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-rose-500 to-red-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">{{ __tool('youtube-earnings-calculator', 'features.custom_cpm', 'Custom CPM') }}</h3>
                    <p class="text-gray-600">{{ __tool('youtube-earnings-calculator', 'features.custom_cpm_desc', 'Adjust CPM based on your niche and audience') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('youtube-earnings-calculator', 'content.understanding_title', '💰 Understanding YouTube Earnings') }}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">{{ __tool('youtube-earnings-calculator', 'content.how_pays_title', '📊 How YouTube Pays') }}</h4>
                    <ul class="space-y-2 text-white/90">
                        <li>• {{ __tool('youtube-earnings-calculator', 'content.how_pays_1', 'CPM (Cost Per Mille): Earnings per 1,000 views') }}</li>
                        <li>• {{ __tool('youtube-earnings-calculator', 'content.how_pays_2', 'Ad Revenue: Based on ad impressions and clicks') }}</li>
                        <li>• {{ __tool('youtube-earnings-calculator', 'content.how_pays_3', 'Revenue Share: YouTube keeps 45%, creators get 55%') }}</li>
                        <li>• {{ __tool('youtube-earnings-calculator', 'content.how_pays_4', 'Payment Threshold: $100 minimum for payout') }}</li>
                    </ul>
                </div>
                <div class="bg-gradient-to-br from-pink-500 to-rose-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">{{ __tool('youtube-earnings-calculator', 'content.cpm_niche_title', '🎯 CPM by Niche') }}</h4>
                    <ul class="space-y-2 text-white/90">
                        <li>• {{ __tool('youtube-earnings-calculator', 'content.cpm_finance', 'Finance/Business: $4 - $12') }}</li>
                        <li>• {{ __tool('youtube-earnings-calculator', 'content.cpm_tech', 'Tech/Software: $2 - $8') }}</li>
                        <li>• {{ __tool('youtube-earnings-calculator', 'content.cpm_gaming', 'Gaming: $0.50 - $3') }}</li>
                        <li>• {{ __tool('youtube-earnings-calculator', 'content.cpm_entertainment', 'Entertainment: $0.25 - $2') }}</li>
                    </ul>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('youtube-earnings-calculator', 'content.factors_title', '📈 Factors Affecting Earnings') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🌍</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('youtube-earnings-calculator', 'content.factor_location', 'Audience Location') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-earnings-calculator', 'content.factor_location_desc', 'US, UK, Canada viewers generate higher CPM than other regions') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎯</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('youtube-earnings-calculator', 'content.factor_niche', 'Content Niche') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-earnings-calculator', 'content.factor_niche_desc', 'Finance and tech niches typically have higher CPM rates') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⏱️</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('youtube-earnings-calculator', 'content.factor_length', 'Video Length') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-earnings-calculator', 'content.factor_length_desc', 'Videos over 8 minutes can have mid-roll ads, increasing revenue') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">👥</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('youtube-earnings-calculator', 'content.factor_engagement', 'Engagement Rate') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-earnings-calculator', 'content.factor_engagement_desc', 'Higher engagement leads to better ad performance and CPM') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📅</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('youtube-earnings-calculator', 'content.factor_seasonality', 'Seasonality') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-earnings-calculator', 'content.factor_seasonality_desc', 'Q4 (Oct-Dec) typically has higher CPM due to holiday advertising') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎬</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('youtube-earnings-calculator', 'content.factor_ad_types', 'Ad Types') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-earnings-calculator', 'content.factor_ad_types_desc', 'Skippable, non-skippable, and display ads affect earnings') }}</p>
                </div>
            </div>

            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-2 border-blue-200 rounded-2xl p-8 mb-10">
                <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-3 text-xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ __tool('youtube-earnings-calculator', 'content.tips_title', '💡 Pro Tips: Maximizing YouTube Earnings') }}
                </h4>
                <ul class="text-blue-800 leading-relaxed space-y-2">
                    <li>✅ {{ __tool('youtube-earnings-calculator', 'content.tip1', 'Create videos over 8 minutes to enable mid-roll ads') }}</li>
                    <li>✅ {{ __tool('youtube-earnings-calculator', 'content.tip2', 'Target high-CPM niches like finance, tech, or business') }}</li>
                    <li>✅ {{ __tool('youtube-earnings-calculator', 'content.tip3', 'Focus on attracting viewers from tier-1 countries (US, UK, Canada)') }}</li>
                    <li>✅ {{ __tool('youtube-earnings-calculator', 'content.tip4', 'Maintain high watch time and engagement for better ad performance') }}</li>
                    <li>✅ {{ __tool('youtube-earnings-calculator', 'content.tip5', 'Diversify income with memberships, Super Chat, and merchandise') }}</li>
                </ul>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('youtube-earnings-calculator', 'faq.title', '❓ Frequently Asked Questions') }}</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-earnings-calculator', 'faq.q1', 'How much does YouTube pay per 1,000 views?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-earnings-calculator', 'faq.a1', 'YouTube pays between $0.25 to $4.00 per 1,000 views on average, depending on your niche, audience location, and engagement. High-value niches like finance can earn $4-$12 per 1,000 views, while gaming typically earns $0.50-$3.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-earnings-calculator', 'faq.q2', 'What is CPM and how does it work?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-earnings-calculator', 'faq.a2', 'CPM (Cost Per Mille) is the amount advertisers pay per 1,000 ad impressions. YouTube takes 45% and creators receive 55%. Your actual CPM varies based on niche, audience demographics, video length, and ad types enabled on your videos.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-earnings-calculator', 'faq.q3', 'How many views do I need to make $1,000/month?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-earnings-calculator', 'faq.a3', 'With an average CPM of $2.50, you\'d need approximately 400,000 monthly views (13,333 daily views) to earn $1,000/month. However, this varies significantly based on your CPM, which depends on your niche and audience.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-earnings-calculator', 'faq.q4', 'Do all views generate revenue?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-earnings-calculator', 'faq.a4', 'No. Only monetized views (where ads are shown and viewed) generate revenue. Viewers with ad blockers, YouTube Premium subscribers, and videos watched in countries with low ad demand may not generate ad revenue, though Premium views do generate revenue through subscription fees.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-earnings-calculator', 'faq.q5', 'How can I increase my YouTube earnings?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-earnings-calculator', 'faq.a5', 'Increase earnings by: creating longer videos (8+ minutes) for mid-roll ads, targeting high-CPM niches, attracting tier-1 country viewers, improving watch time and engagement, enabling all ad formats, and diversifying with memberships, Super Chat, and merchandise.') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Translation keys for JavaScript
    const translations = {
        error_views: "{{ __tool('youtube-earnings-calculator', 'js.error_views') }}",
        error_cpm: "{{ __tool('youtube-earnings-calculator', 'js.error_cpm') }}",
    };

    $(document).ready(function () {
        $('#earningsForm').on('submit', function (e) {
            e.preventDefault();

            const views = parseInt($('#views').val());
            const cpm = parseFloat($('#cpm').val());

            if (!views || views < 0) {
                showError(translations.error_views);
                return;
            }

            if (!cpm || cpm < 0) {
                showError(translations.error_cpm);
                return;
            }

            // Calculate earnings (CPM is per 1000 views)
            const dailyEarnings = (views / 1000) * cpm;
            const monthlyEarnings = dailyEarnings * 30;
            const yearlyEarnings = dailyEarnings * 365;

            // Calculate ranges (low: 50% of CPM, high: 150% of CPM)
            const lowCpm = cpm * 0.5;
            const highCpm = cpm * 1.5;

            const dailyLow = (views / 1000) * lowCpm;
            const dailyHigh = (views / 1000) * highCpm;
            const monthlyLow = dailyLow * 30;
            const monthlyHigh = dailyHigh * 30;
            const yearlyLow = dailyLow * 365;
            const yearlyHigh = dailyHigh * 365;

            // Display results
            $('#dailyEarnings').text('$' + dailyEarnings.toFixed(2));
            $('#dailyRange').text('$' + dailyLow.toFixed(2) + ' - $' + dailyHigh.toFixed(2));

            $('#monthlyEarnings').text('$' + monthlyEarnings.toFixed(2));
            $('#monthlyRange').text('$' + monthlyLow.toFixed(2) + ' - $' + monthlyHigh.toFixed(2));

            $('#yearlyEarnings').text('$' + yearlyEarnings.toFixed(2));
            $('#yearlyRange').text('$' + yearlyLow.toFixed(2) + ' - $' + yearlyHigh.toFixed(2));

            $('#resultsSection').removeClass('hidden');

            // Smooth scroll to results
            setTimeout(() => {
                $('#resultsSection')[0].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }, 100);
        });
    });
</script>
@endpush