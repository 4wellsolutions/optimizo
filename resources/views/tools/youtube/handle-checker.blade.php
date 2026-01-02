@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-red-500 via-pink-500 to-purple-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">
                    YouTube Handle Checker
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                    Check if your desired @handle is available on YouTube instantly!
                </p>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-red-200 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Check Handle Availability</h2>
            <form id="handleForm">
                @csrf
                <div class="mb-6">
                    <label for="handle" class="form-label text-base">YouTube Handle</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-semibold text-lg">@</span>
                        <input type="text" id="handle" name="handle" class="form-input pl-10" placeholder="yourhandle"
                            required pattern="[a-zA-Z0-9._-]+" maxlength="30">
                    </div>
                    <p class="text-sm text-gray-500 mt-2">Enter your desired handle (without @). Letters, numbers, dots,
                        underscores, and hyphens only.</p>
                </div>

                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span id="btnText">Check Availability</span>
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
                        <p class="text-sm font-semibold mb-3">Try these alternatives:</p>
                        <div id="suggestionsList" class="flex flex-wrap gap-2 justify-center"></div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
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
                        showError('Please enter a handle');
                        return;
                    }

                    // Validate format
                    const handleRegex = /^[a-zA-Z0-9._-]+$/;
                    if (!handleRegex.test(handle)) {
                        showError('Handle can only contain letters, numbers, dots, underscores, and hyphens');
                        return;
                    }

                    if (handle.length < 3) {
                        showError('Handle must be at least 3 characters long');
                        return;
                    }

                    // Show loading state
                    btn.prop('disabled', true).addClass('opacity-75');
                    btnText.text('Checking...');

                    // AJAX Request
                    $.ajax({
                        url: '{{ route("youtube.handle.check") }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            handle: handle
                        },
                        success: function (response) {
                            displayResult(response.available, handle, response.suggestions);
                            $('#resultsSection').removeClass('hidden');

                            // Smooth scroll to results
                            setTimeout(() => {
                                $('#resultsSection')[0].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                            }, 100);
                        },
                        error: function (xhr) {
                            const error = xhr.responseJSON?.error || 'Failed to check handle. Please try again.';
                            showError(error);
                        },
                        complete: function () {
                            btn.prop('disabled', false).removeClass('opacity-75');
                            btnText.text(originalText);
                        }
                    });
                });

                function displayResult(available, handle, suggestions = []) {
                    const resultCard = $('#resultCard');
                    const resultIcon = $('#resultIcon');
                    const resultTitle = $('#resultTitle');
                    const resultMessage = $('#resultMessage');
                    const handleDisplay = $('#handleDisplay');
                    const suggestionsDiv = $('#suggestions');
                    const suggestionsList = $('#suggestionsList');

                    if (available) {
                        // Available
                        resultCard.removeClass('bg-red-50 border-red-200').addClass('bg-green-50 border-2 border-green-200');
                        resultIcon.removeClass('bg-red-500').addClass('bg-green-500').html(`
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                `);
                        resultTitle.removeClass('text-red-900').addClass('text-green-900').text('Available! 🎉');
                        resultMessage.removeClass('text-red-700').addClass('text-green-700').text('This handle is available for your YouTube channel');
                        handleDisplay.removeClass('text-red-600').addClass('text-green-600').text('@' + handle);
                        suggestionsDiv.addClass('hidden');
                    } else {
                        // Not available
                        resultCard.removeClass('bg-green-50 border-green-200').addClass('bg-red-50 border-2 border-red-200');
                        resultIcon.removeClass('bg-green-500').addClass('bg-red-500').html(`
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                `);
                        resultTitle.removeClass('text-green-900').addClass('text-red-900').text('Not Available');
                        resultMessage.removeClass('text-green-700').addClass('text-red-700').text('This handle is already taken');
                        handleDisplay.removeClass('text-green-600').addClass('text-red-600').text('@' + handle);

                        // Show suggestions
                        if (suggestions && suggestions.length > 0) {
                            suggestionsDiv.removeClass('hidden');
                            suggestionsList.empty();
                            suggestions.forEach(suggestion => {
                                const badge = $(`
                                            <button onclick="checkHandle('${suggestion}')" class="px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-semibold hover:bg-indigo-200 transition-colors">
                                                @${suggestion}
                                            </button>
                                        `);
                                suggestionsList.append(badge);
                            });
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

            function checkHandle(handle) {
                $('#handle').val(handle);
                $('#handleForm').submit();
            }
        </script>

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
                <h2 class="text-4xl font-black text-gray-900 mb-3">Check Handle Availability</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Find the perfect @handle for your YouTube channel</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Our free YouTube Handle Checker helps you find the perfect @handle for your YouTube channel. Check handle
                availability instantly, get alternative suggestions if your desired handle is taken, and secure your brand
                identity on YouTube. Essential for new channels, rebranding, or claiming your unique identity on the
                platform.
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
                    <h3 class="font-bold text-xl text-gray-900 mb-2">Instant Check</h3>
                    <p class="text-gray-600">Get immediate results on handle availability</p>
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
                    <h3 class="font-bold text-xl text-gray-900 mb-2">Smart Suggestions</h3>
                    <p class="text-gray-600">Get alternative handle ideas if yours is taken</p>
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
                    <h3 class="font-bold text-xl text-gray-900 mb-2">100% Free</h3>
                    <p class="text-gray-600">No limits, no registration required</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✅ Handle Best Practices</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">✅ Do's</h4>
                    <ul class="space-y-2 text-white/90">
                        <li>• Keep it short and memorable (3-20 characters)</li>
                        <li>• Use your brand name or personal name</li>
                        <li>• Make it easy to spell and pronounce</li>
                        <li>• Check availability across other platforms</li>
                        <li>• Use consistent branding across social media</li>
                    </ul>
                </div>
                <div class="bg-gradient-to-br from-pink-500 to-rose-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">❌ Don'ts</h4>
                    <ul class="space-y-2 text-white/90">
                        <li>• Avoid special characters (except . _ -)</li>
                        <li>• Don't use confusing numbers or letters</li>
                        <li>• Avoid trademarked names</li>
                        <li>• Don't make it too long or complex</li>
                        <li>• Avoid handles that are hard to remember</li>
                    </ul>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Why Your Handle Matters</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔗</div>
                    <h4 class="font-bold text-gray-900 mb-2">Easy Sharing</h4>
                    <p class="text-gray-600 text-sm">Simple @handles are easier to share and remember than long channel URLs
                    </p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎨</div>
                    <h4 class="font-bold text-gray-900 mb-2">Brand Identity</h4>
                    <p class="text-gray-600 text-sm">Your handle is part of your brand - make it count</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📱</div>
                    <h4 class="font-bold text-gray-900 mb-2">Cross-Platform</h4>
                    <p class="text-gray-600 text-sm">Use the same handle across all social platforms for consistency</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔍</div>
                    <h4 class="font-bold text-gray-900 mb-2">Discoverability</h4>
                    <p class="text-gray-600 text-sm">A good handle makes you easier to find and tag</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">💼</div>
                    <h4 class="font-bold text-gray-900 mb-2">Professionalism</h4>
                    <p class="text-gray-600 text-sm">Clean handles look more professional and trustworthy</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">Memorability</h4>
                    <p class="text-gray-600 text-sm">Short, catchy handles stick in people's minds</p>
                </div>
            </div>

            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-2 border-blue-200 rounded-2xl p-8 mb-10">
                <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-3 text-xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    💡 Pro Tips: Choosing the Perfect Handle
                </h4>
                <ul class="text-blue-800 leading-relaxed space-y-2">
                    <li>✅ Check availability on Instagram, Twitter, and TikTok too for consistency</li>
                    <li>✅ Consider future growth - will this handle still fit in 5 years?</li>
                    <li>✅ Test pronunciation - can people say it easily?</li>
                    <li>✅ Avoid trends that might date your brand</li>
                    <li>✅ If your first choice is taken, try adding your niche or location</li>
                </ul>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What characters can I use in my YouTube handle?</h4>
                    <p class="text-gray-700 leading-relaxed">YouTube handles can contain letters (a-z), numbers (0-9),
                        periods (.), underscores (_), and hyphens (-). Handles must be 3-30 characters long and cannot
                        contain spaces or special characters.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I change my YouTube handle later?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! YouTube allows you to change your handle, but you can only
                        do it a limited number of times within a certain period. Choose wisely to avoid frequent changes
                        that might confuse your audience.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What if my desired handle is taken?</h4>
                    <p class="text-gray-700 leading-relaxed">Our tool provides alternative suggestions if your handle is
                        unavailable. Try adding numbers, your niche, location, or variations of your name. You can also
                        check if the handle is available with different capitalization.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Should my YouTube handle match my channel name?</h4>
                    <p class="text-gray-700 leading-relaxed">Ideally, yes! Having your handle match your channel name
                        creates consistency and makes you easier to find. However, if your channel name is long, consider a
                        shortened version for your handle.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">How do I claim my YouTube handle?</h4>
                    <p class="text-gray-700 leading-relaxed">Once you verify a handle is available using our tool, go to
                        YouTube Studio, navigate to Customization > Basic Info, and you'll see the option to choose your
                        handle. Claim it quickly before someone else does!</p>
                </div>
            </div>
        </div>
    </div>
@endsection