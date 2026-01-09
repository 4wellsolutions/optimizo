@extends('layouts.app')

@section('title', __tool('whois-lookup', 'seo.title'))
@section('meta_description', __tool('whois-lookup', 'seo.description'))
@section('meta_keywords', __tool('whois-lookup', 'seo.keywords'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <!-- Header -->
        <x-tool-hero :tool="$tool" icon="whois-lookup" />

        <!-- Tool -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <form id="whoisForm">
                @csrf
                <div class="mb-6">
                    <label for="domain"
                        class="form-label text-base">{{ __tool('whois-lookup', 'form.domain_label') }}</label>
                    <input type="text" id="domain" name="domain" class="form-input"
                        placeholder="{{ __tool('whois-lookup', 'form.domain_placeholder') }}" required>
                    <p class="text-sm text-gray-500 mt-2">{{ __tool('whois-lookup', 'content.form_hint') }}</p>
                </div>

                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <span>{{ __tool('whois-lookup', 'form.button') }}</span>
                </button>
            </form>

            <div id="statusMessage" class="hidden mt-6 p-4 rounded-xl"></div>

            <div id="resultSection" class="hidden mt-6">
                <h3 class="text-xl font-bold text-gray-900 mb-4">{{ __tool('whois-lookup', 'results.title') }}</h3>
                <div id="whoisData" class="bg-gray-50 p-4 rounded-xl"></div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ __tool('whois-lookup', 'content.what_is_title') }}</h2>
            <p class="text-gray-700 mb-4">
                {{ __tool('whois-lookup', 'content.what_is_desc') }}
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">{{ __tool('whois-lookup', 'content.why_use_title') }}
            </h2>
            <p class="text-gray-700 mb-4">
                {{ __tool('whois-lookup', 'content.why_use_desc') }}
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">{{ __tool('whois-lookup', 'content.key_info_title') }}</h2>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
                <li>{!! __tool('whois-lookup', 'content.key_info1') !!}</li>
                <li>{!! __tool('whois-lookup', 'content.key_info2') !!}</li>
                <li>{!! __tool('whois-lookup', 'content.key_info3') !!}</li>
                <li>{!! __tool('whois-lookup', 'content.key_info4') !!}</li>
                <li>{!! __tool('whois-lookup', 'content.key_info5') !!}</li>
                <li>{!! __tool('whois-lookup', 'content.key_info6') !!}</li>
            </ul>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">{{ __tool('whois-lookup', 'content.how_to_title') }}</h2>
            <ol class="list-decimal list-inside text-gray-700 space-y-2 mb-4">
                <li>{{ __tool('whois-lookup', 'content.how_to1') }}</li>
                <li>{{ __tool('whois-lookup', 'content.how_to2') }}</li>
                <li>{{ __tool('whois-lookup', 'content.how_to3') }}</li>
                <li>{{ __tool('whois-lookup', 'content.how_to4') }}</li>
            </ol>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">{{ __tool('whois-lookup', 'content.privacy_title') }}</h2>
            <p class="text-gray-700 mb-4">
                {{ __tool('whois-lookup', 'content.privacy_desc') }}
            </p>
        </div>

        <!-- FAQ -->
        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl shadow-xl p-6 md:p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __tool('whois-lookup', 'faq.title') }}</h2>
            <div class="space-y-4">
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">{{ __tool('whois-lookup', 'faq.q1') }}</h3>
                    <p class="text-gray-700">{{ __tool('whois-lookup', 'faq.a1') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">{{ __tool('whois-lookup', 'faq.q2') }}</h3>
                    <p class="text-gray-700">{{ __tool('whois-lookup', 'faq.a2') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">{{ __tool('whois-lookup', 'faq.q3') }}</h3>
                    <p class="text-gray-700">{{ __tool('whois-lookup', 'faq.a3') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">{{ __tool('whois-lookup', 'faq.q4') }}</h3>
                    <p class="text-gray-700">{{ __tool('whois-lookup', 'faq.a4') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

    <script>
        const form = document.getElementById('whoisForm');
        const submitBtn = form.querySelector('button[type="submit"]');
        const btnText = submitBtn.querySelector('span');
        const btnIcon = submitBtn.querySelector('svg');

        document.getElementById('whoisForm').addEventListener('submit', async (e) => {
            e.preventDefault();

            const formData = new FormData(e.target);
            const statusMessage = document.getElementById('statusMessage');
            const resultSection = document.getElementById('resultSection');
            const whoisData = document.getElementById('whoisData');

            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
            btnText.textContent = '{{ __tool('whois-lookup', 'form.button_loading') }}';
            btnIcon.classList.add('animate-spin');

            statusMessage.classList.add('hidden');
            resultSection.classList.add('hidden');

            try {
                const response = await fetch('{{ route("network.whois-lookup.lookup") }}', {
                    method: 'POST',
                    body: formData,
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                });

                const data = await response.json();

                if (data.success) {
                    whoisData.innerHTML = `<pre class="text-sm">${JSON.stringify(data.data, null, 2)}</pre>`;
                    statusMessage.className = 'mt-6 p-4 rounded-xl bg-green-100 text-green-800 border-2 border-green-300';
                    statusMessage.textContent = '✓ WHOIS lookup successful!';
                    statusMessage.classList.remove('hidden');
                    resultSection.classList.remove('hidden');
                } else {
                    statusMessage.className = 'mt-6 p-4 rounded-xl bg-red-100 text-red-800 border-2 border-red-300';
                    statusMessage.textContent = '✗ ' + data.error;
                    statusMessage.classList.remove('hidden');
                }
            } catch (error) {
                statusMessage.className = 'mt-6 p-4 rounded-xl bg-red-100 text-red-800 border-2 border-red-300';
                statusMessage.textContent = '✗ An error occurred. Please try again.';
                statusMessage.classList.remove('hidden');
            } finally {
                submitBtn.disabled = false;
                submitBtn.classList.remove('opacity-75', 'cursor-not-allowed');
                btnText.textContent = '{{ __tool('whois-lookup', 'form.button') }}';
                btnIcon.classList.remove('animate-spin');
            }
        });
    </script>
@endpush