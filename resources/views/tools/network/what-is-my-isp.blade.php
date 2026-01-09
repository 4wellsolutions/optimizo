@extends('layouts.app')

@section('title', __tool('what-is-my-isp', 'seo.title'))
@section('meta_description', __tool('what-is-my-isp', 'seo.description'))
@section('meta_keywords', __tool('what-is-my-isp', 'seo.keywords'))

@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <!-- Header -->
        <x-tool-hero :tool="$tool" icon="what-is-my-isp" />

        <!-- ISP Information -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-indigo-200 mb-8">
            <div id="loading" class="text-center py-8">
                <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-indigo-600"></div>
                <p class="mt-4 text-gray-600">{{ __tool('what-is-my-isp', 'content.loading') }}</p>
            </div>

            <div id="ispInfo" class="hidden">
                <div class="text-center mb-8">
                    <h2 class="text-sm text-gray-600 mb-2">{{ __tool('what-is-my-isp', 'content.your_isp_title') }}</h2>
                    <div class="text-3xl md:text-4xl font-black text-indigo-600 mb-2" id="ispName"></div>
                    <div class="text-lg text-gray-600" id="ispOrg"></div>
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                    <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl p-4 border-2 border-indigo-200">
                        <div class="text-sm text-gray-600 mb-1">{{ __tool('what-is-my-isp', 'results.ip_address') }}</div>
                        <div class="text-lg font-bold text-gray-900 font-mono" id="ipAddress">-</div>
                    </div>
                    <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl p-4 border-2 border-indigo-200">
                        <div class="text-sm text-gray-600 mb-1">{{ __tool('what-is-my-isp', 'results.asn') }}</div>
                        <div class="text-lg font-bold text-gray-900" id="asn">-</div>
                    </div>
                    <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl p-4 border-2 border-indigo-200">
                        <div class="text-sm text-gray-600 mb-1">{{ __tool('what-is-my-isp', 'content.network_label') }}</div>
                        <div class="text-lg font-semibold text-gray-900" id="network">-</div>
                    </div>
                    <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl p-4 border-2 border-indigo-200">
                        <div class="text-sm text-gray-600 mb-1">{{ __tool('what-is-my-isp', 'content.location_label') }}</div>
                        <div class="text-lg font-bold text-gray-900" id="location">-</div>
                    </div>
                </div>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- SEO Content -->
        <div
            class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl p-6 md:p-8 border-2 border-indigo-100 shadow-xl">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __tool('what-is-my-isp', 'content.main_title') }}</h2>
            <p class="text-gray-700 leading-relaxed text-lg mb-6">
                {{ __tool('what-is-my-isp', 'content.main_desc') }}
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('what-is-my-isp', 'content.info_title') }}</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6">
                <li>{!! __tool('what-is-my-isp', 'content.info1') !!}</li>
                <li>{!! __tool('what-is-my-isp', 'content.info2') !!}</li>
                <li>{!! __tool('what-is-my-isp', 'content.info3') !!}</li>
                <li>{!! __tool('what-is-my-isp', 'content.info4') !!}</li>
                <li>{!! __tool('what-is-my-isp', 'content.info5') !!}</li>
            </ul>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('what-is-my-isp', 'content.why_use_title') }}</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6">
                <li>{{ __tool('what-is-my-isp', 'content.why_use1') }}</li>
                <li>{{ __tool('what-is-my-isp', 'content.why_use2') }}</li>
                <li>{{ __tool('what-is-my-isp', 'content.why_use3') }}</li>
                <li>{{ __tool('what-is-my-isp', 'content.why_use4') }}</li>
                <li>{{ __tool('what-is-my-isp', 'content.why_use5') }}</li>
                <li>{{ __tool('what-is-my-isp', 'content.why_use6') }}</li>
                <li>{{ __tool('what-is-my-isp', 'content.why_use7') }}</li>
                <li>{{ __tool('what-is-my-isp', 'content.why_use8') }}</li>
            </ul>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('what-is-my-isp', 'content.asn_title') }}</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                {{ __tool('what-is-my-isp', 'content.asn_desc') }}
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('what-is-my-isp', 'content.use_cases_title') }}</h3>
            <div class="grid md:grid-cols-2 gap-4 mb-6">
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('what-is-my-isp', 'content.use_case1_title') }}</h4>
                    <p class="text-gray-700 text-sm">{{ __tool('what-is-my-isp', 'content.use_case1_desc') }}</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('what-is-my-isp', 'content.use_case2_title') }}</h4>
                    <p class="text-gray-700 text-sm">{{ __tool('what-is-my-isp', 'content.use_case2_desc') }}</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('what-is-my-isp', 'content.use_case3_title') }}</h4>
                    <p class="text-gray-700 text-sm">{{ __tool('what-is-my-isp', 'content.use_case3_desc') }}</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('what-is-my-isp', 'content.use_case4_title') }}</h4>
                    <p class="text-gray-700 text-sm">{{ __tool('what-is-my-isp', 'content.use_case4_desc') }}</p>
                </div>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('what-is-my-isp', 'content.isp_types_title') }}</h3>
            <p class="text-gray-700 leading-relaxed mb-4">
            </p>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6 leading-relaxed">
                <li>{!! __tool('what-is-my-isp', 'content.isp_type1') !!}</li>
                <li>{!! __tool('what-is-my-isp', 'content.isp_type2') !!}</li>
                <li>{!! __tool('what-is-my-isp', 'content.isp_type3') !!}</li>
                <li>{!! __tool('what-is-my-isp', 'content.isp_type4') !!}</li>
                <li>{!! __tool('what-is-my-isp', 'content.isp_type5') !!}</li>
                <li>{!! __tool('what-is-my-isp', 'content.isp_type6') !!}</li>
            </ul>

            <div class="bg-blue-50 border-2 border-blue-200 rounded-xl p-6 mb-6">
                <h4 class="font-bold text-blue-900 mb-2 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ __tool('what-is-my-isp', 'content.privacy_note_title') }}
                </h4>
                <p class="text-blue-800 text-sm leading-relaxed">
                    {{ __tool('what-is-my-isp', 'content.privacy_note_desc') }}
                </p>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('what-is-my-isp', 'faq.title') }}</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('what-is-my-isp', 'faq.q1') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('what-is-my-isp', 'faq.a1') }}</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('what-is-my-isp', 'faq.q2') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('what-is-my-isp', 'faq.a2') }}</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('what-is-my-isp', 'faq.q3') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('what-is-my-isp', 'faq.a3') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

    <script>
        async function getISPInfo() {
            try {
                const response = await fetch('https://ipapi.co/json/');
                const data = await response.json();

                document.getElementById('ispName').textContent = data.org || 'Unknown ISP';
                document.getElementById('ispOrg').textContent = data.org_name || '';
                document.getElementById('ipAddress').textContent = data.ip;
                document.getElementById('asn').textContent = `AS${data.asn}` || 'Unknown';
                document.getElementById('network').textContent = data.network || 'Unknown';
                document.getElementById('location').textContent = `${data.city}, ${data.country_name}`;

                document.getElementById('loading').classList.add('hidden');
                document.getElementById('ispInfo').classList.remove('hidden');
            } catch (error) {
                document.getElementById('loading').innerHTML = '<p class="text-red-600">{{ __tool('what-is-my-isp', 'js.error_loading') }}</p>';
            }
        }

        // Load ISP info on page load
        getISPInfo();
    </script>
@endpush