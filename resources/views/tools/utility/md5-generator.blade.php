@extends('layouts.app')

@section('title', __tool('md5-generator', 'meta.title'))
@section('meta_description', __tool('md5-generator', 'meta.description'))
@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <x-tool-hero :tool="$tool" />

        <!-- Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-green-200 mb-8">
            <div class="mb-6">
                <label for="inputText"
                    class="form-label text-base">{{ __tool('md5-generator', 'editor.label_input') }}</label>
                <textarea id="inputText" class="form-input min-h-[200px]"
                    placeholder="{{ __tool('md5-generator', 'editor.ph_input') }}"></textarea>
            </div>

            <button onclick="generateMD5()" class="btn-primary w-full justify-center text-lg py-4 mb-6">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                <span>{{ __tool('md5-generator', 'editor.btn_generate') }}</span>
            </button>

            <div id="result" class="hidden">
                <label class="form-label text-base">{{ __tool('md5-generator', 'editor.label_result') }}</label>
                <div class="relative">
                    <input type="text" id="md5Output" readonly class="form-input font-mono text-sm bg-gray-50">
                    <button onclick="copyHash()"
                        class="absolute right-2 top-1/2 -translate-y-1/2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-colors">
                        {{ __tool('md5-generator', 'editor.btn_copy') }}
                    </button>
                </div>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- SEO Content - Stunning Design -->
        <div
            class="bg-gradient-to-br from-green-50 via-teal-50 to-cyan-50 rounded-3xl p-8 md:p-12 mt-8 border-2 border-green-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">{{ __tool('md5-generator', 'content.hero_title') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __tool('md5-generator', 'content.hero_subtitle') }}
                </p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {{ __tool('md5-generator', 'content.p1') }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6 text-center">
                {{ __tool('md5-generator', 'content.what_title') }}</h3>
            <p class="text-gray-700 leading-relaxed mb-8 text-center max-w-3xl mx-auto">
                {{ __tool('md5-generator', 'content.what_desc') }}
            </p>

            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">{{ __tool('md5-generator', 'content.features_title') }}</h4>
                    <ul class="space-y-2 text-white/90">
                        <li>• {!! __tool('md5-generator', 'content.features.fast') !!}</li>
                        <li>• {!! __tool('md5-generator', 'content.features.fixed') !!}</li>
                        <li>• {!! __tool('md5-generator', 'content.features.deterministic') !!}</li>
                        <li>• {!! __tool('md5-generator', 'content.features.support') !!}</li>
                    </ul>
                </div>
                <div class="bg-gradient-to-br from-teal-500 to-cyan-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">{{ __tool('md5-generator', 'content.uses_title') }}</h4>
                    <ul class="space-y-2 text-white/90">
                        <li>• {!! __tool('md5-generator', 'content.uses.verify') !!}</li>
                        <li>• {!! __tool('md5-generator', 'content.uses.checksum') !!}</li>
                        <li>• {!! __tool('md5-generator', 'content.uses.cache') !!}</li>
                        <li>• {!! __tool('md5-generator', 'content.uses.integrity') !!}</li>
                    </ul>
                </div>
            </div>

            <div class="bg-gradient-to-r from-red-50 to-orange-50 border-2 border-red-200 rounded-2xl p-8 mb-10">
                <h4 class="font-bold text-red-900 mb-3 flex items-center gap-3 text-xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ __tool('md5-generator', 'content.warning_title') }}
                </h4>
                <p class="text-red-800 leading-relaxed mb-3">
                    {!! __tool('md5-generator', 'content.warning_desc') !!}
                </p>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('md5-generator', 'content.compare_title') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🔵</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('md5-generator', 'content.compare.md5.title') }}</h4>
                    <p class="text-gray-600 text-sm mb-2">{{ __tool('md5-generator', 'content.compare.md5.desc1') }}</p>
                    <p class="text-gray-600 text-sm">{{ __tool('md5-generator', 'content.compare.md5.desc2') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-teal-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🟢</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('md5-generator', 'content.compare.sha1.title') }}</h4>
                    <p class="text-gray-600 text-sm mb-2">{{ __tool('md5-generator', 'content.compare.sha1.desc1') }}</p>
                    <p class="text-gray-600 text-sm">{{ __tool('md5-generator', 'content.compare.sha1.desc2') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-cyan-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🟡</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('md5-generator', 'content.compare.sha256.title') }}</h4>
                    <p class="text-gray-600 text-sm mb-2">{{ __tool('md5-generator', 'content.compare.sha256.desc1') }}</p>
                    <p class="text-gray-600 text-sm">{{ __tool('md5-generator', 'content.compare.sha256.desc2') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('md5-generator', 'content.faq_title') }}</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('md5-generator', 'content.faq.q1') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('md5-generator', 'content.faq.a1') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('md5-generator', 'content.faq.q2') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('md5-generator', 'content.faq.a2') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('md5-generator', 'content.faq.q3') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('md5-generator', 'content.faq.a3') }}</p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
        <script>
            function generateMD5() {
                const text = document.getElementById('inputText').value;
                if (!text) {
                    // Assuming shared showStatus or alert
                    alert("{{ __tool('md5-generator', 'js.error_empty') }}");
                    return;
                }

                const hash = CryptoJS.MD5(text).toString();
                document.getElementById('md5Output').value = hash;
                document.getElementById('result').classList.remove('hidden');
            }

            function copyHash() {
                const output = document.getElementById('md5Output');
                output.select();
                document.execCommand('copy');

                const btn = event.target;
                const originalText = btn.textContent;
                btn.textContent = '{{ __tool('md5-generator', 'js.btn_copied') }}';
                setTimeout(() => btn.textContent = originalText, 2000);
            }
        </script>
    @endpush
@endsection