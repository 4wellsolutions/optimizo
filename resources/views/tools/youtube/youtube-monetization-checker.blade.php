@extends('layouts.app')

@section('title', __tool('youtube-monetization-checker', 'meta.title'))
@section('meta_description', __tool('youtube-monetization-checker', 'meta.description'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <x-tool-hero :tool="$tool" />

        <!-- Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-red-200 mb-8">
            <form id="monetizationForm">
                @csrf
                <div class="mb-6">
                    <label for="channelUrl" class="form-label text-base">{{ __tool('youtube-monetization-checker', 'form.url_label') }}</label>
                    <input type="text" id="channelUrl" name="url" class="form-input"
                        placeholder="{{ __tool('youtube-monetization-checker', 'form.url_placeholder') }}" required>
                    <p class="text-sm text-gray-500 mt-2">{{ __tool('youtube-monetization-checker', 'form.url_help') }}</p>
                </div>

                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span id="btnText">{{ __tool('youtube-monetization-checker', 'form.check_button') }}</span>
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
                            <div class="text-sm text-gray-600 mb-1">{{ __tool('youtube-monetization-checker', 'results.monetization_status') }}</div>
                            <div class="text-2xl font-black" id="monetizationStatus"></div>
                        </div>
                        <div class="bg-white rounded-lg p-4">
                            <div class="text-sm text-gray-600 mb-1">{{ __tool('youtube-monetization-checker', 'results.estimated_status') }}</div>
                            <div class="text-lg font-bold text-gray-900" id="estimatedStatus"></div>
                        </div>
                    </div>

                    <div class="mt-4 p-4 bg-blue-50 border-2 border-blue-200 rounded-lg">
                        <p class="text-sm text-blue-800">
                            <strong>{{ __tool('youtube-monetization-checker', 'results.note_title') }}</strong> {{ __tool('youtube-monetization-checker', 'results.note_text') }}
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

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-red-50 via-pink-50 to-rose-50 rounded-3xl p-8 md:p-12 mt-8 border-2 border-red-100 shadow-2xl">
            <h3 class="text-3xl font-bold text-gray-900 mb-6 text-center">{{ __tool('youtube-monetization-checker', 'content.requirements_title') }}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">{{ __tool('youtube-monetization-checker', 'content.req1_title') }}</h4>
                    <p class="text-white/90 mb-3">{{ __tool('youtube-monetization-checker', 'content.req1_desc') }}</p>
                    <p class="text-white/80 text-sm">{{ __tool('youtube-monetization-checker', 'content.req1_note') }}</p>
                </div>
                <div class="bg-gradient-to-br from-pink-500 to-rose-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">{{ __tool('youtube-monetization-checker', 'content.req2_title') }}</h4>
                    <p class="text-white/90 mb-3">{{ __tool('youtube-monetization-checker', 'content.req2_desc') }}</p>
                    <p class="text-white/80 text-sm">{{ __tool('youtube-monetization-checker', 'content.req2_note') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-red-200 shadow-lg">
                    <h4 class="font-bold text-xl text-gray-900 mb-3">{{ __tool('youtube-monetization-checker', 'content.req3_title') }}</h4>
                    <p class="text-gray-700 mb-3">{{ __tool('youtube-monetization-checker', 'content.req3_desc') }}</p>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-monetization-checker', 'content.req3_note') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-pink-200 shadow-lg">
                    <h4 class="font-bold text-xl text-gray-900 mb-3">{{ __tool('youtube-monetization-checker', 'content.req4_title') }}</h4>
                    <p class="text-gray-700 mb-3">{{ __tool('youtube-monetization-checker', 'content.req4_desc') }}</p>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-monetization-checker', 'content.req4_note') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('youtube-monetization-checker', 'content.revenue_title') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">📺</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('youtube-monetization-checker', 'content.revenue1_title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-monetization-checker', 'content.revenue1_desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">⭐</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('youtube-monetization-checker', 'content.revenue2_title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-monetization-checker', 'content.revenue2_desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">💬</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('youtube-monetization-checker', 'content.revenue3_title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-monetization-checker', 'content.revenue3_desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🎬</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('youtube-monetization-checker', 'content.revenue4_title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-monetization-checker', 'content.revenue4_desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🛍️</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('youtube-monetization-checker', 'content.revenue5_title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-monetization-checker', 'content.revenue5_desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🤝</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('youtube-monetization-checker', 'content.revenue6_title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('youtube-monetization-checker', 'content.revenue6_desc') }}</p>
                </div>
            </div>

            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-2 border-blue-200 rounded-2xl p-8 mb-10">
                <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-3 text-xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ __tool('youtube-monetization-checker', 'content.notice_title') }}
                </h4>
                <p class="text-blue-800 leading-relaxed">
                    {{ __tool('youtube-monetization-checker', 'content.notice_text') }}
                </p>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('youtube-monetization-checker', 'content.faq_title') }}</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-monetization-checker', 'content.faq_q1') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-monetization-checker', 'content.faq_a1') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-monetization-checker', 'content.faq_q2') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-monetization-checker', 'content.faq_a2') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-monetization-checker', 'content.faq_q3') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-monetization-checker', 'content.faq_a3') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-monetization-checker', 'content.faq_q4') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-monetization-checker', 'content.faq_a4') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-monetization-checker', 'content.faq_q5') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-monetization-checker', 'content.faq_a5') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Translation keys for JavaScript
    const translations = {
        checking: "{{ __tool('youtube-monetization-checker', 'form.checking') }}",
        check_button: "{{ __tool('youtube-monetization-checker', 'form.check_button') }}",
        error_failed: "{{ __tool('youtube-monetization-checker', 'js.error_failed') }}",
        subscribers_text: "{{ __tool('youtube-monetization-checker', 'js.subscribers_text') }}",
        likely_monetized: "{{ __tool('youtube-monetization-checker', 'js.likely_monetized') }}",
        not_monetized: "{{ __tool('youtube-monetization-checker', 'js.not_monetized') }}",
    };

    $('#monetizationForm').on('submit', function (e) {
        e.preventDefault();

        const url = $('#channelUrl').val().trim();
        const btn = $(this).find('button[type="submit"]');
        const btnText = $('#btnText');

        if (!url) return;

        btn.prop('disabled', true).addClass('opacity-75');
        btnText.text(translations.checking);
        $('#results').addClass('hidden');
        $('#error').addClass('hidden');

        $.ajax({
            url: '{{ route("youtube.youtube-monetization-checker.check") }}',
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
                const error = xhr.responseJSON?.error || translations.error_failed;
                $('#errorText').text(error);
                $('#error').removeClass('hidden');
            },
            complete: function () {
                btn.prop('disabled', false).removeClass('opacity-75');
                btnText.text(translations.check_button);
            }
        });
    });

    function displayResults(data) {
        $('#channelThumbnail').attr('src', data.thumbnail);
        $('#channelName').text(data.channelName);
        $('#subscriberCount').text(data.subscribers + ' ' + translations.subscribers_text);

        const isMonetized = data.isMonetized;
        const statusColor = isMonetized ? 'text-green-600' : 'text-red-600';
        const statusText = isMonetized ? translations.likely_monetized : translations.not_monetized;

        $('#monetizationStatus').html(`<span class="${statusColor}">${statusText}</span>`);
        $('#estimatedStatus').text(data.estimatedStatus);

        $('#results').removeClass('hidden');
        setTimeout(() => {
            $('#results')[0].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }, 100);
    }
</script>
@endpush