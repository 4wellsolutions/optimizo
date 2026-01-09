@extends('layouts.app')

@section('title', __tool('domain-to-ip', 'seo.title'))
@section('meta_description', __tool('domain-to-ip', 'seo.description'))
@section('meta_keywords', __tool('domain-to-ip', 'seo.keywords'))

@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <!-- Header -->
        <x-tool-hero :tool="$tool" icon="domain-to-ip" />

        <!-- Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-emerald-200 mb-8">
            <form id="domainForm">
                @csrf
                <div class="mb-6">
                    <label for="domain"
                        class="form-label text-base">{{ __tool('domain-to-ip', 'form.domain_label') }}</label>
                    <input type="text" id="domain" name="domain" class="form-input"
                        placeholder="{{ __tool('domain-to-ip', 'form.domain_placeholder') }}" required>
                    <p class="text-sm text-gray-500 mt-2">{{ __tool('domain-to-ip', 'form.domain_hint') }}</p>
                </div>

                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <span id="btnText">{{ __tool('domain-to-ip', 'form.button') }}</span>
                </button>
            </form>

            <!-- Results -->
            <div id="results" class="hidden mt-8">
                <h3 class="text-xl font-bold text-gray-900 mb-4">{{ __tool('domain-to-ip', 'results.title') }}</h3>
                <div class="bg-gradient-to-br from-emerald-50 to-green-50 rounded-xl p-6 border-2 border-emerald-200">
                    <div class="mb-4">
                        <div class="text-sm text-gray-600 mb-1">{{ __tool('domain-to-ip', 'results.domain_label') }}</div>
                        <div class="text-lg font-bold text-gray-900" id="resultDomain"></div>
                    </div>
                    <div>
                        <div class="text-sm text-gray-600 mb-1">{{ __tool('domain-to-ip', 'results.ip_label') }}</div>
                        <div class="text-2xl font-black text-emerald-600 font-mono" id="resultIP"></div>
                    </div>
                </div>
            </div>

            <!-- Error -->
            <div id="error" class="hidden mt-8">
                <div class="bg-red-50 border-2 border-red-200 rounded-xl p-6">
                    <p class="text-red-800 font-semibold" id="errorText"></p>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div
            class="bg-gradient-to-br from-emerald-50 to-green-50 rounded-3xl p-8 md:p-12 mt-8 border-2 border-emerald-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-emerald-500 to-green-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">{{ __tool('domain-to-ip', 'content.main_title') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __tool('domain-to-ip', 'content.main_subtitle') }}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {{ __tool('domain-to-ip', 'content.intro') }}
            </p>

            <div class="grid md:grid-cols-3 gap-6 mb-10">
                <div
                    class="bg-white rounded-2xl p-6 shadow-xl border-2 border-emerald-100 hover:border-emerald-300 transition-all hover:shadow-2xl">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-green-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">{{ __tool('domain-to-ip', 'content.feature1_title') }}</h3>
                    <p class="text-gray-600">{{ __tool('domain-to-ip', 'content.feature1_desc') }}</p>
                </div>
                <div
                    class="bg-white rounded-2xl p-6 shadow-xl border-2 border-green-100 hover:border-green-300 transition-all hover:shadow-2xl">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-green-500 to-teal-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">{{ __tool('domain-to-ip', 'content.feature2_title') }}</h3>
                    <p class="text-gray-600">{{ __tool('domain-to-ip', 'content.feature2_desc') }}</p>
                </div>
                <div
                    class="bg-white rounded-2xl p-6 shadow-xl border-2 border-teal-100 hover:border-teal-300 transition-all hover:shadow-2xl">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">{{ __tool('domain-to-ip', 'content.feature3_title') }}</h3>
                    <p class="text-gray-600">{{ __tool('domain-to-ip', 'content.feature3_desc') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('domain-to-ip', 'content.what_is_title') }}</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                {{ __tool('domain-to-ip', 'content.what_is_desc') }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('domain-to-ip', 'content.use_cases_title') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-emerald-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔧</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('domain-to-ip', 'content.uc1_title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('domain-to-ip', 'content.uc1_desc') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🛡️</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('domain-to-ip', 'content.uc2_title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('domain-to-ip', 'content.uc2_desc') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-teal-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔍</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('domain-to-ip', 'content.uc3_title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('domain-to-ip', 'content.uc3_desc') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-emerald-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📊</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('domain-to-ip', 'content.uc4_title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('domain-to-ip', 'content.uc4_desc') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🌍</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('domain-to-ip', 'content.uc5_title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('domain-to-ip', 'content.uc5_desc') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-teal-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚙️</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('domain-to-ip', 'content.uc6_title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('domain-to-ip', 'content.uc6_desc') }}</p>
                </div>
            </div>

            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-2 border-blue-200 rounded-2xl p-8 mb-10">
                <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-3 text-xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ __tool('domain-to-ip', 'content.pro_tips_title') }}
                </h4>
                <ul class="text-blue-800 leading-relaxed space-y-2">
                    <li>{{ __tool('domain-to-ip', 'content.tip1') }}</li>
                    <li>{{ __tool('domain-to-ip', 'content.tip2') }}</li>
                    <li>{{ __tool('domain-to-ip', 'content.tip3') }}</li>
                    <li>{{ __tool('domain-to-ip', 'content.tip4') }}</li>
                    <li>{{ __tool('domain-to-ip', 'content.tip5') }}</li>
                </ul>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('domain-to-ip', 'faq.title') }}</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('domain-to-ip', 'faq.q1') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('domain-to-ip', 'faq.a1') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('domain-to-ip', 'faq.q2') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('domain-to-ip', 'faq.a2') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('domain-to-ip', 'faq.q3') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('domain-to-ip', 'faq.a3') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('domain-to-ip', 'faq.q4') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('domain-to-ip', 'faq.a4') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('domain-to-ip', 'faq.q5') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('domain-to-ip', 'faq.a5') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')


    <script>
        $('#domainForm').on('submit', function (e) {
            e.preventDefault();

            const domain = $('#domain').val().trim().replace(/^https?:\/\//, '');
            const btn = $(this).find('button[type="submit"]');
            const btnText = $('#btnText');

            if (!domain) return;

            btn.prop('disabled', true).addClass('opacity-75');
            btnText.text('{{ __tool('domain-to-ip', 'js.looking_up') }}');
            $('#results').addClass('hidden');
            $('#error').addClass('hidden');

            $.ajax({
                url: '{{ route("network.domain-to-ip.lookup") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    domain: domain
                },
                success: function (response) {
                    if (response.success) {
                        $('#resultDomain').text(response.data.domain);
                        $('#resultIP').text(response.data.ip);
                        $('#results').removeClass('hidden');
                    }
                },
                error: function (xhr) {
                    const error = xhr.responseJSON?.error || '{{ __tool('domain-to-ip', 'js.error_failed') }}';
                    $('#errorText').text(error);
                    $('#error').removeClass('hidden');
                },
                complete: function () {
                    btn.prop('disabled', false).removeClass('opacity-75');
                    btnText.text('{{ __tool('domain-to-ip', 'form.button') }}');
                }
            });
        });

        async function pasteFromClipboard() {
            try {
                const text = await navigator.clipboard.readText();
                document.getElementById('domain').value = text.trim();
            } catch (err) {
                // Fallback for browsers that don't support clipboard API
                document.getElementById('domain').focus();
            }
        }
    </script>
@endpush