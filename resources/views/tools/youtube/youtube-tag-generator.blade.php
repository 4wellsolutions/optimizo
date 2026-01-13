@extends('layouts.app')

@section('title', __tool('youtube-tag-generator', 'meta.title'))
@section('meta_description', __tool('youtube-tag-generator', 'meta.description'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <x-tool-hero :tool="$tool" />

        <!-- Tag Generator Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-red-200 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">
                {{ __tool('youtube-tag-generator', 'form.title') }}
            </h2>
            <form id="tagForm">
                @csrf
                <div class="mb-6">
                    <label for="keyword"
                        class="form-label text-base">{{ __tool('youtube-tag-generator', 'form.keyword_label') }}</label>
                    <input type="text" id="keyword" name="keyword" class="form-input"
                        placeholder="{{ __tool('youtube-tag-generator', 'form.keyword_placeholder') }}" required>
                    <p class="text-sm text-gray-500 mt-2">{{ __tool('youtube-tag-generator', 'form.keyword_help') }}</p>
                </div>

                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                    <span id="btnText">{{ __tool('youtube-tag-generator', 'form.generate_button') }}</span>
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
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold text-gray-900">{{ __tool('youtube-tag-generator', 'results.title') }}
                            (<span id="tagCount">0</span>)</h3>
                        <button onclick="copyAllTags()" class="btn-secondary flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                            <span id="copyBtnText">{{ __tool('youtube-tag-generator', 'results.copy_all') }}</span>
                        </button>
                    </div>

                    <div id="tagsContainer" class="flex flex-wrap gap-2 mb-4"></div>

                    <div class="mt-4 p-4 bg-white rounded-lg border-2 border-gray-200">
                        <p class="text-sm text-gray-600 mb-2 font-semibold">Comma-separated tags (ready to paste):</p>
                        <p id="tagsText" class="text-sm text-gray-700 font-mono break-all"></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div
            class="bg-gradient-to-br from-red-50 via-pink-50 to-rose-50 rounded-3xl p-8 md:p-12 mt-8 border-2 border-red-100 shadow-2xl">
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
                        {{ __tool('youtube-tag-generator', 'content.feature1_title') }}</h3>
                    <p class="text-gray-600">{{ __tool('youtube-tag-generator', 'content.feature1_desc') }}</p>
                </div>
                <div
                    class="bg-white rounded-2xl p-6 shadow-xl border-2 border-pink-100 hover:border-pink-300 transition-all hover:shadow-2xl">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-pink-500 to-rose-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">
                        {{ __tool('youtube-tag-generator', 'content.feature2_title') }}</h3>
                    <p class="text-gray-600">{{ __tool('youtube-tag-generator', 'content.feature2_desc') }}</p>
                </div>
                <div
                    class="bg-white rounded-2xl p-6 shadow-xl border-2 border-rose-100 hover:border-rose-300 transition-all hover:shadow-2xl">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-rose-500 to-red-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">
                        {{ __tool('youtube-tag-generator', 'content.feature3_title') }}</h3>
                    <p class="text-gray-600">{{ __tool('youtube-tag-generator', 'content.feature3_desc') }}</p>
                </div>
            </div>

            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-2 border-blue-200 rounded-2xl p-8 mb-10">
                <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-3 text-xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ __tool('youtube-tag-generator', 'content.tips_title') }}
                </h4>
                <ul class="text-blue-800 leading-relaxed space-y-2">
                    <li>✅ {{ __tool('youtube-tag-generator', 'content.tip1') }}</li>
                    <li>✅ {{ __tool('youtube-tag-generator', 'content.tip2') }}</li>
                    <li>✅ {{ __tool('youtube-tag-generator', 'content.tip3') }}</li>
                    <li>✅ {{ __tool('youtube-tag-generator', 'content.tip4') }}</li>
                    <li>✅ {{ __tool('youtube-tag-generator', 'content.tip5') }}</li>
                </ul>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('youtube-tag-generator', 'content.faq_title') }}
            </h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-tag-generator', 'content.faq_q1') }}
                    </h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-tag-generator', 'content.faq_a1') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-tag-generator', 'content.faq_q2') }}
                    </h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-tag-generator', 'content.faq_a2') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-tag-generator', 'content.faq_q3') }}
                    </h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-tag-generator', 'content.faq_a3') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-tag-generator', 'content.faq_q4') }}
                    </h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-tag-generator', 'content.faq_a4') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('youtube-tag-generator', 'content.faq_q5') }}
                    </h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('youtube-tag-generator', 'content.faq_a5') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Translation keys for JavaScript
        const translations = {
            error_enter_keyword: "{{ __tool('youtube-tag-generator', 'js.error_enter_keyword') }}",
            error_failed: "{{ __tool('youtube-tag-generator', 'js.error_failed') }}",
            generating: "{{ __tool('youtube-tag-generator', 'js.generating') }}",
            generate_button: "{{ __tool('youtube-tag-generator', 'js.generate_button') }}",
            copied: "{{ __tool('youtube-tag-generator', 'js.copied') }}",
            copy_all: "{{ __tool('youtube-tag-generator', 'js.copy_all') }}",
        };

        $(document).ready(function () {
            $('#tagForm').on('submit', function (e) {
                e.preventDefault();

                const keyword = $('#keyword').val().trim();
                const btn = $(this).find('button[type="submit"]');
                const btnText = $('#btnText');
                const originalText = btnText.text();

                // Hide previous results/errors
                $('#resultsSection').addClass('hidden');
                $('#errorMessage').addClass('hidden');

                // Validate keyword
                if (!keyword) {
                    showError(translations.error_enter_keyword);
                    return;
                }

                // Show loading state
                btn.prop('disabled', true).addClass('opacity-75');
                btnText.text(translations.generating);

                // Generate tags client-side
                setTimeout(() => {
                    const tags = generateTags(keyword);
                    displayTags(tags);
                    $('#resultsSection').removeClass('hidden');

                    // Smooth scroll to results
                    setTimeout(() => {
                        $('#resultsSection')[0].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    }, 100);

                    btn.prop('disabled', false).removeClass('opacity-75');
                    btnText.text(originalText);
                }, 500);
            });

            function generateTags(keyword) {
                const tags = [];
                const keywordLower = keyword.toLowerCase();

                // Primary tag - exact keyword
                tags.push(keyword);

                // Add variations
                const words = keyword.split(' ');
                if (words.length > 1) {
                    // Add individual words
                    words.forEach(word => {
                        if (word.length > 3 && !tags.includes(word)) {
                            tags.push(word);
                        }
                    });

                    // Add reversed phrase
                    tags.push(words.reverse().join(' '));
                    words.reverse(); // restore order
                }

                // Add common modifiers
                const prefixes = ['how to', 'best', 'top', 'free', 'tutorial', 'guide'];
                const suffixes = ['tutorial', 'guide', 'tips', 'tricks', 'for beginners', '2024', '2025'];

                prefixes.forEach(prefix => {
                    tags.push(`${prefix} ${keywordLower}`);
                });

                suffixes.forEach(suffix => {
                    tags.push(`${keywordLower} ${suffix}`);
                });

                // Add question formats
                tags.push(`what is ${keywordLower}`);
                tags.push(`how to use ${keywordLower}`);

                // Return unique tags (limit to 20)
                return [...new Set(tags)].slice(0, 20);
            }

            function displayTags(tags) {
                const container = $('#tagsContainer');
                container.empty();

                tags.forEach(tag => {
                    const badge = $(`
                            <span class="px-4 py-2 bg-indigo-100 text-indigo-800 rounded-full text-sm font-semibold hover:bg-indigo-200 transition-colors cursor-pointer">
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