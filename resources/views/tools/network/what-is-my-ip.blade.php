@extends('layouts.app')

@section('title', __tool('what-is-my-ip', 'meta.title'))
@section('meta_description', __tool('what-is-my-ip', 'meta.description'))

@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <!-- Header -->
        <x-tool-hero :tool="$tool" icon="what-is-my-ip" />

        <!-- IP Information -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-blue-200 mb-8">
            <div id="loading" class="text-center py-8">
                <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600"></div>
                <p class="mt-4 text-gray-600">{{ __tool('what-is-my-ip', 'ui.loading') }}</p>
            </div>

            <div id="ipInfo" class="hidden">
                <div class="text-center mb-8">
                    <h2 class="text-sm text-gray-600 mb-2">{{ __tool('what-is-my-ip', 'ui.your_ip_title') }}</h2>
                    <div class="text-4xl md:text-5xl font-black text-blue-600 mb-4" id="ipAddress"></div>
                    <button onclick="copyIP()" class="btn-primary justify-center px-8 py-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                        <span>{{ __tool('what-is-my-ip', 'ui.copy_button') }}</span>
                    </button>
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                    <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl p-4 border-2 border-blue-200">
                        <div class="text-sm text-gray-600 mb-1">{{ __tool('what-is-my-ip', 'results.location') }}</div>
                        <div class="text-lg font-bold text-gray-900" id="location">-</div>
                    </div>
                    <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl p-4 border-2 border-blue-200">
                        <div class="text-sm text-gray-600 mb-1">{{ __tool('what-is-my-ip', 'results.isp') }}</div>
                        <div class="text-lg font-bold text-gray-900" id="isp">-</div>
                    </div>
                    <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl p-4 border-2 border-blue-200">
                        <div class="text-sm text-gray-600 mb-1">{{ __tool('what-is-my-ip', 'results.country') }}</div>
                        <div class="text-lg font-bold text-gray-900" id="country">-</div>
                    </div>
                    <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl p-4 border-2 border-blue-200">
                        <div class="text-sm text-gray-600 mb-1">{{ __tool('what-is-my-ip', 'ui.timezone') }}</div>
                        <div class="text-lg font-bold text-gray-900" id="timezone">-</div>
                    </div>
                </div>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl p-6 md:p-8 border-2 border-blue-100 shadow-xl">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __tool('what-is-my-ip', 'content.main_title') }}</h2>
            <p class="text-gray-700 leading-relaxed text-lg mb-6">
                {{ __tool('what-is-my-ip', 'content.main_desc') }}
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('what-is-my-ip', 'content.what_is_title') }}</h3>
            <p class="text-gray-700 leading-relaxed mb-4">
                {{ __tool('what-is-my-ip', 'content.what_is_desc') }}
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('what-is-my-ip', 'content.ipv4_vs_ipv6_title') }}</h3>
            <div class="grid md:grid-cols-2 gap-4 mb-6">
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('what-is-my-ip', 'content.ipv4_title') }}</h4>
                    <p class="text-gray-700 text-sm mb-2">{!! __tool('what-is-my-ip', 'content.ipv4_format') !!}</p>
                    <p class="text-gray-700 text-sm mb-2">{!! __tool('what-is-my-ip', 'content.ipv4_total') !!}</p>
                    <p class="text-gray-700 text-sm">{{ __tool('what-is-my-ip', 'content.ipv4_desc') }}</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('what-is-my-ip', 'content.ipv6_title') }}</h4>
                    <p class="text-gray-700 text-sm mb-2">{!! __tool('what-is-my-ip', 'content.ipv6_format') !!}</p>
                    <p class="text-gray-700 text-sm mb-2">{!! __tool('what-is-my-ip', 'content.ipv6_total') !!}</p>
                    <p class="text-gray-700 text-sm">{{ __tool('what-is-my-ip', 'content.ipv6_desc') }}</p>
                </div>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('what-is-my-ip', 'content.why_check_title') }}</h3>
            <p class="text-gray-700 leading-relaxed mb-4">
                {{ __tool('what-is-my-ip', 'content.why_check_desc') }}
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('what-is-my-ip', 'content.public_vs_private_title') }}</h3>
            <div class="grid md:grid-cols-2 gap-4 mb-6">
                <div class="bg-white rounded-lg p-4 border-2 border-blue-200">
                    <h4 class="font-bold text-blue-900 mb-2">{{ __tool('what-is-my-ip', 'content.public_ip_title') }}</h4>
                    <p class="text-gray-700 text-sm mb-2">{{ __tool('what-is-my-ip', 'content.public_ip_desc') }}</p>
                    <p class="text-gray-700 text-sm">{!! __tool('what-is-my-ip', 'content.public_ip_example') !!}</p>
                    <p class="text-gray-700 text-sm mt-2">{{ __tool('what-is-my-ip', 'content.public_ip_note') }}</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-green-200">
                    <h4 class="font-bold text-green-900 mb-2">{{ __tool('what-is-my-ip', 'content.private_ip_title') }}</h4>
                    <p class="text-gray-700 text-sm mb-2">{{ __tool('what-is-my-ip', 'content.private_ip_desc') }}</p>
                    <p class="text-gray-700 text-sm">{!! __tool('what-is-my-ip', 'content.private_ip_example') !!}</p>
                    <p class="text-gray-700 text-sm mt-2">{{ __tool('what-is-my-ip', 'content.private_ip_note') }}</p>
                </div>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('what-is-my-ip', 'content.security_title') }}</h3>
            <p class="text-gray-700 leading-relaxed mb-4">
                {{ __tool('what-is-my-ip', 'content.security_desc1') }}
            </p>
            <p class="text-gray-700 leading-relaxed mb-6">
                {!! __tool('what-is-my-ip', 'content.security_desc2') !!}
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('what-is-my-ip', 'content.dynamic_vs_static_title') }}</h3>
            <div class="bg-white rounded-lg p-4 border-2 border-gray-200 mb-6">
                <p class="text-gray-700 leading-relaxed mb-3">
                    {!! __tool('what-is-my-ip', 'content.dynamic_ip') !!}
                </p>
                <p class="text-gray-700 leading-relaxed">
                    {!! __tool('what-is-my-ip', 'content.static_ip') !!}
                </p>
            </div>

            <div class="bg-yellow-50 border-2 border-yellow-200 rounded-xl p-6 mb-6">
                <h4 class="font-bold text-yellow-900 mb-2 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ __tool('what-is-my-ip', 'content.privacy_tips_title') }}
                </h4>
                <ul class="text-yellow-800 text-sm leading-relaxed space-y-2">
                    <li>{{ __tool('what-is-my-ip', 'content.privacy_tip1') }}</li>
                    <li>{{ __tool('what-is-my-ip', 'content.privacy_tip2') }}</li>
                    <li>{{ __tool('what-is-my-ip', 'content.privacy_tip3') }}</li>
                    <li>{{ __tool('what-is-my-ip', 'content.privacy_tip4') }}</li>
                    <li>{{ __tool('what-is-my-ip', 'content.privacy_tip5') }}</li>
                </ul>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('what-is-my-ip', 'faq.title') }}</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('what-is-my-ip', 'faq.q1') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('what-is-my-ip', 'faq.a1') }}</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('what-is-my-ip', 'faq.q2') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('what-is-my-ip', 'faq.a2') }}</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('what-is-my-ip', 'faq.q3') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('what-is-my-ip', 'faq.a3') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

    <script>
        async function getIPInfo() {
            try {
                const response = await fetch('https://ipapi.co/json/');
                const data = await response.json();

                document.getElementById('ipAddress').textContent = data.ip;
                document.getElementById('location').textContent = `${data.city}, ${data.region}`;
                document.getElementById('isp').textContent = data.org || 'Unknown';
                document.getElementById('country').textContent = `${data.country_name} (${data.country})`;
                document.getElementById('timezone').textContent = data.timezone;

                document.getElementById('loading').classList.add('hidden');
                document.getElementById('ipInfo').classList.remove('hidden');
            } catch (error) {
                document.getElementById('loading').innerHTML = '<p class="text-red-600">Failed to load IP information</p>';
            }
        }

        function copyIP() {
            const ip = document.getElementById('ipAddress').textContent;
            navigator.clipboard.writeText(ip);

            const btn = event.target.closest('button');
            const originalHTML = btn.innerHTML;
            btn.innerHTML = '<span>Copied!</span>';
            setTimeout(() => btn.innerHTML = originalHTML, 2000);
        }

        // Load IP info on page load
        getIPInfo();
    </script>
@endpush