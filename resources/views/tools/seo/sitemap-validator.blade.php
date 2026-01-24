@extends('layouts.app')

@section('title', __tool('sitemap-validator', 'meta.title'))
@section('meta_description', __tool('sitemap-validator', 'meta.description'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <x-tool-hero :tool="$tool" icon="sitemap-validator" />

        <!-- Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-indigo-200 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">{{ __tool('sitemap-validator', 'editor.title', 'Validate Sitemap') }}</h2>
            <form id="sitemapValidatorForm" method="POST" action="{{ route('seo.sitemap-validator.validate') }}">
                @csrf

                <div class="mb-6">
                    <div class="flex gap-4 mb-6">
                        <button type="button" id="urlInputBtn"
                            class="flex-1 px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg font-semibold hover:from-blue-700 hover:to-blue-800 transition-all duration-200 shadow-md active-tab">
                            <i class="fas fa-link mr-2"></i>{{ __tool('sitemap-validator', 'editor.btn_url_input', 'URL Input') }}
                        </button>
                        <button type="button" id="xmlInputBtn"
                            class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition-all duration-200">
                            <i class="fas fa-code mr-2"></i>{{ __tool('sitemap-validator', 'editor.btn_xml_input', 'XML Input') }}
                        </button>
                    </div>

                    <!-- URL Input Tab -->
                    <div id="urlInputSection">
                        <label for="sitemapUrl" class="form-label text-base font-semibold text-gray-700 mb-2 block">
                            {{ __tool('sitemap-validator', 'editor.label_url', 'Sitemap URL') }}
                        </label>
                        <input type="url" id="sitemapUrl" name="url"
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                            placeholder="{{ __tool('sitemap-validator', 'editor.ph_url', 'https://example.com/sitemap.xml') }}"
                            value="{{ old('url', request('url')) }}">
                         <p class="text-sm text-gray-500 mt-2">{{ __tool('sitemap-validator', 'editor.help_url', 'Enter the full URL of your sitemap.xml file') }}</p>
                    </div>

                    <!-- XML Input Tab -->
                    <div id="xmlInputSection" class="hidden">
                        <label for="sitemapXml" class="form-label text-base font-semibold text-gray-700 mb-2 block">
                            {{ __tool('sitemap-validator', 'editor.label_xml', 'Paste Sitemap XML') }}
                        </label>
                        <textarea id="sitemapXml" name="xml" rows="12"
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all font-mono text-sm"
                            placeholder="{{ __tool('sitemap-validator', 'editor.ph_xml', 'Paste your sitemap XML here...') }}">{{ old('xml', request('xml')) }}</textarea>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-4">
                    <button type="submit" id="validateBtn"
                        class="flex-1 px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl font-bold hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 text-lg">
                        <i class="fas fa-check-circle mr-2"></i>{{ __tool('sitemap-validator', 'editor.btn_validate', 'Validate Sitemap') }}
                    </button>
                    <button type="button" id="clearBtn"
                        class="px-8 py-4 bg-gray-100 text-gray-700 rounded-xl font-bold hover:bg-gray-200 transition-all duration-200 hover:shadow-md">
                        <i class="fas fa-eraser mr-2"></i>{{ __tool('sitemap-validator', 'editor.btn_clear', 'Clear') }}
                    </button>
                </div>
            </form>
        </div>

        <!-- Results Container -->
        <div id="resultsContainer">
            @if(isset($result))
                @include('tools.seo.sitemap-validator-results', ['result' => $result])
            @endif
        </div>

        <!-- Features Section -->
        <div class="mt-12 bg-white rounded-2xl shadow-xl p-8">
            <p class="text-gray-700 mb-6">{{ __tool('sitemap-validator', 'content.p1') }}</p>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-xl">
                    <div class="text-blue-600 text-3xl mb-3"><i class="fas fa-code"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">
                        {{ __tool('sitemap-validator', 'content.features.xml.title') }}
                    </h4>
                    <p class="text-gray-600 text-sm">{{ __tool('sitemap-validator', 'content.features.xml.desc') }}</p>
                </div>
                <div class="bg-gradient-to-br from-green-50 to-green-100 p-6 rounded-xl">
                    <div class="text-green-600 text-3xl mb-3"><i class="fas fa-link"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">
                        {{ __tool('sitemap-validator', 'content.features.url.title') }}
                    </h4>
                    <p class="text-gray-600 text-sm">{{ __tool('sitemap-validator', 'content.features.url.desc') }}</p>
                </div>
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-6 rounded-xl">
                    <div class="text-purple-600 text-3xl mb-3"><i class="fas fa-check-circle"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">
                        {{ __tool('sitemap-validator', 'content.features.protocol.title') }}
                    </h4>
                    <p class="text-gray-600 text-sm">{{ __tool('sitemap-validator', 'content.features.protocol.desc') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            // --- Helper Functions ---
            function clearErrors() {
                $('#sitemapUrl, #sitemapXml').removeClass('border-red-500 focus:ring-red-500 focus:border-red-500')
                    .addClass('border-gray-300 focus:ring-blue-500 focus:border-blue-500');
            }

            function highlightError(fieldId) {
                $(fieldId).removeClass('border-gray-300 focus:ring-blue-500 focus:border-blue-500')
                    .addClass('border-red-500 focus:ring-red-500 focus:border-red-500');
            }

            // --- Event Listeners ---

            // Tab Switching - XML
            $('#xmlInputBtn').click(function () {
                $('#xmlInputSection').removeClass('hidden');
                $('#urlInputSection').addClass('hidden');
                $('#sitemapUrl').val('');

                // Toggle Active State
                $(this).addClass('bg-gradient-to-r from-blue-600 to-blue-700 text-white').removeClass('bg-gray-200 text-gray-700');
                $('#urlInputBtn').removeClass('bg-gradient-to-r from-blue-600 to-blue-700 text-white').addClass('bg-gray-200 text-gray-700');

                clearErrors();
            });

            // Tab Switching - URL
            $('#urlInputBtn').click(function () {
                $('#urlInputSection').removeClass('hidden');
                $('#xmlInputSection').addClass('hidden');
                $('#sitemapXml').val('');

                // Toggle Active State
                $(this).addClass('bg-gradient-to-r from-blue-600 to-blue-700 text-white').removeClass('bg-gray-200 text-gray-700');
                $('#xmlInputBtn').removeClass('bg-gradient-to-r from-blue-600 to-blue-700 text-white').addClass('bg-gray-200 text-gray-700');

                clearErrors();
            });

            // Clear Button
            $('#clearBtn').click(function () {
                $('#sitemapUrl').val('');
                $('#sitemapXml').val('');
                $('#resultsContainer').empty();
                clearErrors();
            });

            // AJAX Form Submission
            $('#sitemapValidatorForm').submit(function (e) {
                e.preventDefault();

                var form = $(this);
                var btn = $('#validateBtn');
                var originalBtnContent = btn.html();

                // Clear previous results and errors immediately
                $('#resultsContainer').empty();
                clearErrors();

                // Loading State - Use double quotes for outer string to safely contain Blade directives
                var loadingText = '{{ __tool("sitemap-validator", "editor.btn_validating", "Validating...") }}';
                btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin mr-2"></i>' + loadingText);

                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: form.serialize(),
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            $('#resultsContainer').html(response.html);

                            if (typeof showSuccess === 'function') {
                                showSuccess('Sitemap validated successfully!');
                            }

                            // Scroll to results
                            $('html, body').animate({
                                scrollTop: $("#resultsContainer").offset().top - 100
                            }, 500);
                        } else {
                            var msg = response.message || 'An error occurred during validation';
                            if (typeof showError === 'function') {
                                showError(msg);
                            } else {
                                alert(msg);
                            }

                            // Highlight active input if generic failure
                            if (!$('#urlInputSection').hasClass('hidden')) highlightError('#sitemapUrl');
                            if (!$('#xmlInputSection').hasClass('hidden')) highlightError('#sitemapXml');
                        }
                    },
                    error: function (xhr) {
                        var errorMessage = 'An error occurred';
                        var fieldError = false;
                        var response = xhr.responseJSON || {};

                        if (xhr.status === 422) {
                            // Validation errors
                            var errors = response.errors || {};

                            if (errors.url) {
                                highlightError('#sitemapUrl');
                                errorMessage = errors.url[0];
                                fieldError = true;
                            }
                            if (errors.xml) {
                                highlightError('#sitemapXml');
                                // Use this message if it wasn't the URL error
                                if (!fieldError) errorMessage = errors.xml[0];
                                fieldError = true;
                            }

                            // Fallback logic for generic 422 messages
                            if (!fieldError) {
                                if (response.message) {
                                    errorMessage = response.message;
                                }

                                // Highlight the active visible input
                                if (!$('#urlInputSection').hasClass('hidden')) highlightError('#sitemapUrl');
                                if (!$('#xmlInputSection').hasClass('hidden')) highlightError('#sitemapXml');
                            } else {
                                // If we have a field error, ensure we have the message
                                if (!errorMessage && response.message) {
                                    errorMessage = response.message;
                                }
                            }

                        } else {
                            if (response.message) {
                                errorMessage = response.message;
                            } else if (response.error) {
                                errorMessage = response.error;
                            } else {
                                errorMessage = 'HTTP Error: ' + xhr.status;
                            }
                        }

                        if (typeof showError === 'function') {
                            showError(errorMessage);
                        } else {
                            alert(errorMessage);
                        }
                    },
                    complete: function () {
                        btn.prop('disabled', false).html(originalBtnContent);
                    }
                });
            });
        });
    </script>
@endpush