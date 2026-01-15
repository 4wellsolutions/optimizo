@extends('layouts.app')

@section('title', __tool('youtube-handle-checker', 'meta.title'))
@section('meta_description', __tool('youtube-handle-checker', 'meta.description'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <!-- Header -->
        <x-tool-hero :tool="$tool" />

        <!-- Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-red-200 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">
                {{ __tool('youtube-handle-checker', 'form.title') }}
            </h2>
            <form id="handleForm">
                @csrf
                <div class="mb-6">
                    <label for="handle"
                        class="form-label text-base">{{ __tool('youtube-handle-checker', 'form.handle_label') }}</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-semibold text-lg">@</span>
                        <input type="text" id="handle" name="handle" class="form-input pl-10"
                            placeholder="{{ __tool('youtube-handle-checker', 'form.handle_placeholder') }}" required
                            pattern="[a-zA-Z0-9._-]+" maxlength="30">
                    </div>
                    <p class="text-sm text-gray-500 mt-2">{{ __tool('youtube-handle-checker', 'form.handle_help') }}</p>
                </div>

                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span id="btnText">{{ __tool('youtube-handle-checker', 'form.check_button') }}</span>
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
                <div id="resultCard" class="rounded-2xl p-8 text-center shadow-xl">
                    <div id="resultIcon" class="inline-flex items-center justify-center w-20 h-20 rounded-full mb-4"></div>
                    <h3 id="resultTitle" class="text-2xl font-bold mb-2"></h3>
                    <p id="resultMessage" class="text-lg mb-4"></p>
                    <p id="handleDisplay" class="text-3xl font-black mb-4"></p>
                    <div id="suggestions" class="hidden mt-6">
                        <p class="text-sm font-semibold mb-3">{{ __tool('youtube-handle-checker', 'js.try_alternatives') }}
                        </p>
                        <div id="suggestionsList" class="flex flex-wrap gap-2 justify-center"></div>
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
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">
                    {{ __tool('youtube-handle-checker', 'content.main_title') }}
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    {{ __tool('youtube-handle-checker', 'content.main_subtitle') }}
                </p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {{ __tool('youtube-handle-checker', 'content.description') }}
            </p>

            <div class="grid md:grid-cols-3 gap-6 mb-10">
                <div
                    class="bg-white rounded-2xl p-6 shadow-xl border-2 border-red-100 hover:border-red-300 transition-all hover:shadow-2xl">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-red-500 to-pink-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">
                        {{ __tool('youtube-handle-checker', 'content.feature1_title') }}
                    </h3>
                    <p class="text-gray-600">{{ __tool('youtube-handle-checker', 'content.feature1_desc') }}</p>
                </div>
                <div
                    class="bg-white rounded-2xl p-6 shadow-xl border-2 border-pink-100 hover:border-pink-300 transition-all hover:shadow-2xl">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-pink-500 to-rose-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">
                        {{ __tool('youtube-handle-checker', 'content.feature2_title') }}
                    </h3>
                    <p class="text-gray-600">{{ __tool('youtube-handle-checker', 'content.feature2_desc') }}</p>
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
                    <h3 class="font-bold text-xl text-gray-900 mb-2">
                        {{ __tool('youtube-handle-checker', 'content.feature3_title') }}
                    </h3>
                    <p class="text-gray-600">{{ __tool('youtube-handle-checker', 'content.feature3_desc') }}</p>
                </div>
            </div>


            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-2 border-blue-200 rounded-2xl p-8 mb-10">
                <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-3 text-xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ __tool('youtube-handle-checker', 'content.tips_title') }}
                </h4>
                <ul class="text-blue-800 leading-relaxed space-y-2">
                    <li>✅ {{ __tool('youtube-handle-checker', 'content.tip1') }}</li>
                    <li>✅ {{ __tool('youtube-handle-checker', 'content.tip2') }}</li>
                    <li>✅ {{ __tool('youtube-handle-checker', 'content.tip3') }}</li>
                    <li>✅ {{ __tool('youtube-handle-checker', 'content.tip4') }}</li>
                    <li>✅ {{ __tool('youtube-handle-checker', 'content.tip5') }}</li>
                </ul>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('youtube-handle-checker', 'content.faq_title') }}
            </h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">
                        {{ __tool('youtube-handle-checker', 'content.faq_q1') }}
                    </h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-handle-checker', 'content.faq_a1') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">
                        {{ __tool('youtube-handle-checker', 'content.faq_q2') }}
                    </h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-handle-checker', 'content.faq_a2') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">
                        {{ __tool('youtube-handle-checker', 'content.faq_q3') }}
                    </h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-handle-checker', 'content.faq_a3') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">
                        {{ __tool('youtube-handle-checker', 'content.faq_q4') }}
                    </h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-handle-checker', 'content.faq_a4') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">
                        {{ __tool('youtube-handle-checker', 'content.faq_q5') }}
                    </h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-handle-checker', 'content.faq_a5') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Translation keys for JavaScript
        const translations = {
            error_enter_handle: "{{ __tool('youtube-handle-checker', 'js.error_enter_handle') }}",
            error_invalid_handle: "{{ __tool('youtube-handle-checker', 'js.error_invalid_handle') }}",
            checking: "{{ __tool('youtube-handle-checker', 'js.checking') }}",
            error_failed: "{{ __tool('youtube-handle-checker', 'js.error_failed') }}",
            available_title: "{{ __tool('youtube-handle-checker', 'js.available_title') }}",
            available_message: "{{ __tool('youtube-handle-checker', 'js.available_message') }}",
            taken_title: "{{ __tool('youtube-handle-checker', 'js.taken_title') }}",
            taken_message: "{{ __tool('youtube-handle-checker', 'js.taken_message') }}",
            try_alternatives: "{{ __tool('youtube-handle-checker', 'js.try_alternatives') }}",
        };

        $(document).ready(function () {
            $('#handleForm').on('submit', function (e) {
                e.preventDefault();

                const handle = $('#handle').val().trim();
                const btn = $(this).find('button[type="submit"]');
                const btnText = $('#btnText');
                const originalText = btnText.text();

                // Hide previous results/errors
                $('#resultsSection').addClass('hidden');
                $('#errorMessage').addClass('hidden');

                // Validate handle
                if (!handle) {
                    showError(translations.error_enter_handle);
                    return;
                }

                // Validate handle format
                const handleRegex = /^[a-zA-Z0-9._-]+$/;
                if (!handleRegex.test(handle)) {
                    showError(translations.error_invalid_handle);
                    return;
                }

                // Show loading state
                btn.prop('disabled', true).addClass('opacity-75');
                btnText.text(translations.checking);

                // AJAX Request
                $.ajax({
                    url: '{{ route("youtube.youtube-handle-checker.check") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        handle: handle
                    },
                    success: function (response) {
                        if (response.success) {
                            displayResult(response.available, handle, response.suggestions);
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

            function displayResult(available, handle, suggestions) {
                const resultCard = $('#resultCard');
                const resultIcon = $('#resultIcon');
                const resultTitle = $('#resultTitle');
                const resultMessage = $('#resultMessage');
                const handleDisplay = $('#handleDisplay');
                const suggestionsDiv = $('#suggestions');
                const suggestionsList = $('#suggestionsList');

                if (available) {
                    resultCard.removeClass('bg-gradient-to-br from-red-50 to-pink-50 border-red-200')
                        .addClass('bg-gradient-to-br from-green-50 to-emerald-50 border-green-200');
                    resultIcon.html(`
                            <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        `);
                    resultTitle.text(translations.available_title).removeClass('text-red-900').addClass('text-green-900');
                    resultMessage.text(translations.available_message).removeClass('text-red-700').addClass('text-green-700');
                    handleDisplay.text('@' + handle).removeClass('text-red-600').addClass('text-green-600');
                    suggestionsDiv.addClass('hidden');
                } else {
                    resultCard.removeClass('bg-gradient-to-br from-green-50 to-emerald-50 border-green-200')
                        .addClass('bg-gradient-to-br from-red-50 to-pink-50 border-red-200');
                    resultIcon.html(`
                            <svg class="w-12 h-12 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        `);
                    resultTitle.text(translations.taken_title).removeClass('text-green-900').addClass('text-red-900');
                    resultMessage.text(translations.taken_message).removeClass('text-green-700').addClass('text-red-700');
                    handleDisplay.text('@' + handle).removeClass('text-green-600').addClass('text-red-600');

                    // Show suggestions if available
                    if (suggestions && suggestions.length > 0) {
                        suggestionsList.empty();
                        suggestions.forEach(suggestion => {
                            suggestionsList.append(`
                                    <button onclick="$('#handle').val('${suggestion}'); $('#handleForm').submit();" 
                                        class="px-4 py-2 bg-red-100 hover:bg-red-200 text-red-800 rounded-lg font-semibold transition-colors">
                                        @${suggestion}
                                    </button>
                                `);
                        });
                        suggestionsDiv.removeClass('hidden');
                    } else {
                        suggestionsDiv.addClass('hidden');
                    }
                }
            }

            function showError(message) {
                $('#errorText').text(message);
                $('#errorMessage').removeClass('hidden');
                setTimeout(() => {
                    $('#errorMessage')[0].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }, 100);
            }
        });
    </script>
@endpush