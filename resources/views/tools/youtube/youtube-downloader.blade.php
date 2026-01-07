@extends('layouts.app')

@section('title', __tool('youtube-downloader', 'seo.title', $tool->meta_title))
@section('meta_description', __tool('youtube-downloader', 'seo.description', $tool->meta_description))

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" />

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-red-50 to-pink-50 rounded-2xl p-6 md:p-8 mt-8 border-2 border-red-100 shadow-xl">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __tool('youtube-downloader', 'content.main_title') }}</h2>
            <p class="text-gray-700 leading-relaxed mb-6 text-lg">
                {{ __tool('youtube-downloader', 'content.main_description') }}
            </p>
            <div class="grid md:grid-cols-3 gap-4 mt-6">
                <div class="bg-white rounded-xl p-5 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-red-200">
                    <div class="text-4xl mb-3">🎬</div>
                    <h3 class="font-bold text-red-600 mb-2 text-lg">{{ __tool('youtube-downloader', 'content.feature1_title') }}</h3>
                    <p class="text-sm text-gray-600">{{ __tool('youtube-downloader', 'content.feature1_desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-pink-200">
                    <div class="text-4xl mb-3">⚡</div>
                    <h3 class="font-bold text-pink-600 mb-2 text-lg">{{ __tool('youtube-downloader', 'content.feature2_title') }}</h3>
                    <p class="text-sm text-gray-600">{{ __tool('youtube-downloader', 'content.feature2_desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-purple-200">
                    <div class="text-4xl mb-3">🔒</div>
                    <h3 class="font-bold text-purple-600 mb-2 text-lg">{{ __tool('youtube-downloader', 'content.feature3_title') }}</h3>
                    <p class="text-sm text-gray-600">{{ __tool('youtube-downloader', 'content.feature3_desc') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Translation keys for JavaScript
    const translations = {
        error_enter_url: "{{ __tool('youtube-downloader', 'js.error_enter_url') }}",
        processing: "{{ __tool('youtube-downloader', 'js.processing') }}",
        error_failed: "{{ __tool('youtube-downloader', 'js.error_failed') }}",
    };

    $('#downloaderForm').on('submit', function (e) {
        e.preventDefault();

        const url = $('#url').val().trim();
        const btn = $(this).find('button[type="submit"]');
        const btnText = $('#btnText');

        if (!url) {
            showError(translations.error_enter_url);
            return;
        }

        // Show loading
        btn.prop('disabled', true).addClass('opacity-75');
        btnText.text(translations.processing);
        $('#resultsSection').addClass('hidden');
        $('#errorMessage').addClass('hidden');

        // AJAX Request
        $.ajax({
            url: '{{ route("youtube.download") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                url: url
            },
            success: function (response) {
                if (response.success) {
                    displayResults(response.data);
                    $('#resultsSection').removeClass('hidden');
                }
            },
            error: function (xhr) {
                const error = xhr.responseJSON?.error || translations.error_failed;
                showError(error);
            },
            complete: function () {
                btn.prop('disabled', false).removeClass('opacity-75');
                btnText.text(btnText.data('original-text') || 'Download');
            }
        });
    });

    function displayResults(data) {
        // Display download results
        const container = $('#downloadResults');
        container.empty();
        // Add download links based on response data
    }

    function showError(message) {
        $('#errorText').text(message);
        $('#errorMessage').removeClass('hidden');
    }
</script>
@endpush