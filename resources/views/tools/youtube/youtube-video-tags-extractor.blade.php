@extends('layouts.app')

@section('title', __tool('youtube-video-tags-extractor', 'seo.title', $tool->meta_title))
@section('meta_description', __tool('youtube-video-tags-extractor', 'seo.description', $tool->meta_description))

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <x-tool-hero :tool="$tool" />

        <!-- Video Tags Extractor Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-red-200 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">{{ __tool('youtube-video-tags-extractor', 'form.title') }}</h2>
            <form id="tagsForm">
                @csrf
                <div class="mb-6">
                    <label for="url" class="form-label text-base">{{ __tool('youtube-video-tags-extractor', 'form.url_label') }}</label>
                    <input type="url" id="url" name="url" class="form-input"
                        placeholder="{{ __tool('youtube-video-tags-extractor', 'form.url_placeholder') }}" required>
                    <p class="text-sm text-gray-500 mt-2">{{ __tool('youtube-video-tags-extractor', 'form.url_help') }}</p>
                </div>

                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                    <span id="btnText">{{ __tool('youtube-video-tags-extractor', 'form.extract_button') }}</span>
                </button>
            </form>

            <!-- Error Message -->
            <div id="errorMessage" class="hidden mt-6 bg-red-50 border-2 border-red-200 rounded-xl p-6">
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
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold text-gray-900">{{ __tool('youtube-video-tags-extractor', 'results.title') }} (<span id="tagCount">0</span>)</h3>
                        <button onclick="copyAllTags()" class="btn-secondary">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                            <span id="copyBtnText">{{ __tool('youtube-video-tags-extractor', 'results.copy_all') }}</span>
                        </button>
                    </div>
                    <div id="tagsContainer" class="flex flex-wrap gap-2 mb-4"></div>
                    <div class="bg-white rounded-xl p-4 mt-4">
                        <p class="text-sm text-gray-600 mb-2 font-semibold">{{ __tool('youtube-video-tags-extractor', 'results.comma_separated') }}</p>
                        <p id="tagsText" class="text-sm text-gray-700 font-mono break-all"></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-red-50 via-pink-50 to-rose-50 rounded-3xl p-8 md:p-12 mt-8 border-2 border-red-100 shadow-2xl">
            <div class="grid md:grid-cols-3 gap-6 mb-10">
                <div class="bg-white rounded-2xl p-6 shadow-xl border-2 border-red-100 hover:border-red-300 transition-all">
                    <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-pink-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">{{ __tool('youtube-video-tags-extractor', 'content.feature1_title') }}</h3>
                    <p class="text-gray-600">{{ __tool('youtube-video-tags-extractor', 'content.feature1_desc') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-xl border-2 border-pink-100 hover:border-pink-300 transition-all">
                    <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-rose-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">{{ __tool('youtube-video-tags-extractor', 'content.feature2_title') }}</h3>
                    <p class="text-gray-600">{{ __tool('youtube-video-tags-extractor', 'content.feature2_desc') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-xl border-2 border-rose-100 hover:border-rose-300 transition-all">
                    <div class="w-12 h-12 bg-gradient-to-br from-rose-500 to-red-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">{{ __tool('youtube-video-tags-extractor', 'content.feature3_title') }}</h3>
                    <p class="text-gray-600">{{ __tool('youtube-video-tags-extractor', 'content.feature3_desc') }}</p>
                </div>
            </div>

            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-2 border-blue-200 rounded-2xl p-8 mb-10">
                <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-3 text-xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ __tool('youtube-video-tags-extractor', 'content.tips_title') }}
                </h4>
                <ul class="text-blue-800 leading-relaxed space-y-2">
                    <li>✅ {{ __tool('youtube-video-tags-extractor', 'content.tip1') }}</li>
                    <li>✅ {{ __tool('youtube-video-tags-extractor', 'content.tip2') }}</li>
                    <li>✅ {{ __tool('youtube-video-tags-extractor', 'content.tip3') }}</li>
                    <li>✅ {{ __tool('youtube-video-tags-extractor', 'content.tip4') }}</li>
                    <li>✅ {{ __tool('youtube-video-tags-extractor', 'content.tip5') }}</li>
                </ul>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('youtube-video-tags-extractor', 'content.faq_title') }}</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-video-tags-extractor', 'content.faq_q1') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-video-tags-extractor', 'content.faq_a1') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-video-tags-extractor', 'content.faq_q2') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-video-tags-extractor', 'content.faq_a2') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-video-tags-extractor', 'content.faq_q3') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-video-tags-extractor', 'content.faq_a3') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-video-tags-extractor', 'content.faq_q4') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-video-tags-extractor', 'content.faq_a4') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-video-tags-extractor', 'content.faq_q5') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-video-tags-extractor', 'content.faq_a5') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Translation keys for JavaScript
    const translations = {
        error_enter_url: "{{ __tool('youtube-video-tags-extractor', 'js.error_enter_url') }}",
        error_valid_url: "{{ __tool('youtube-video-tags-extractor', 'js.error_valid_url') }}",
        error_failed: "{{ __tool('youtube-video-tags-extractor', 'js.error_failed') }}",
        extracting: "{{ __tool('youtube-video-tags-extractor', 'js.extracting') }}",
        extract_button: "{{ __tool('youtube-video-tags-extractor', 'js.extract_button') }}",
        copied: "{{ __tool('youtube-video-tags-extractor', 'js.copied') }}",
    };

    $(document).ready(function () {
        $('#tagsForm').on('submit', function (e) {
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
                url: '{{ route("youtube.video-tags.extract") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    url: url
                },
                success: function (response) {
                    if (response.success && response.tags) {
                        displayTags(response.tags);
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

        function displayTags(tags) {
            const container = $('#tagsContainer');
            container.empty();

            tags.forEach(tag => {
                const badge = $(`
                    <span class="px-4 py-2 bg-indigo-100 text-indigo-800 rounded-full text-sm font-semibold hover:bg-indigo-200 transition-colors">
                        ${tag}
                    </span>
                `);
                container.append(badge);
            });

            $('#tagCount').text(tags.length);
            $('#tagsText').text(tags.join(', '));
        }

        function showError(message) {
            $('#errorText').text(message);
            $('#errorMessage').removeClass('hidden');
            setTimeout(() => {
                $('#errorMessage')[0].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }, 100);
        }
    });

    function copyAllTags() {
        const text = $('#tagsText').text();
        navigator.clipboard.writeText(text).then(() => {
            const btn = $('#copyBtnText');
            const originalText = btn.text();
            btn.text(translations.copied);
            setTimeout(() => {
                btn.text(originalText);
            }, 2000);
        });
    }
</script>
@endpush