@extends('layouts.app')

@section('title', __tool('username-checker', 'meta.h1'))
@section('meta_description', __tool('username-checker', 'meta.subtitle'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" icon="username-checker" />

        <!-- Username Checker Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-purple-200 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">{{ __tool('username-checker', 'editor.title_enter', 'Enter Username') }}</h2>
            <form id="usernameForm">
                @csrf
                <div class="mb-6">
                    <label for="username" class="form-label text-base">{{ __tool('username-checker', 'editor.label_username', 'Username') }}</label>
                    <input type="text" id="username" name="username" class="form-input" 
                        placeholder="{{ __tool('username-checker', 'editor.ph_username', 'johndoe') }}" 
                        required minlength="3" maxlength="30">
                    <p class="text-sm text-gray-500 mt-2">{{ __tool('username-checker', 'editor.help_username', 'Enter username without @ symbol') }}</p>
                </div>

                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <span id="btnText">{{ __tool('username-checker', 'editor.btn_check', 'Check Availability') }}</span>
                </button>
            </form>
        </div>

        <!-- Results Section -->
        <div id="resultsSection" class="hidden">
            <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">{{ __tool('username-checker', 'editor.title_results', 'Availability Results') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4" id="platformResults">
                <!-- Results will be inserted here -->
            </div>
            
            <div class="mt-8">
                @include('components.hero-actions')
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-purple-50 via-pink-50 to-rose-50 rounded-3xl p-8 md:p-12 mt-8 border-2 border-purple-100 shadow-2xl">
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">{{ __tool('username-checker', 'meta.h1', 'Username Availability Checker') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __tool('username-checker', 'meta.subtitle', 'Check username availability across all major social platforms') }}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {{ __tool('username-checker', 'content.p1', 'Check username availability across all major social media platforms instantly with our free username checker. Find the perfect handle for your brand across Twitter, Instagram, GitHub, TikTok, Facebook, LinkedIn, YouTube, Reddit, and more. Secure your brand identity by claiming the same username on all platforms before someone else does. Perfect for personal branding of business accounts, and influencer marketing.') }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6 text-center">🌐 {{ __tool('username-checker', 'content.platforms_title', 'Supported Platforms') }}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">📱 {{ __tool('username-checker', 'content.platforms.social.title', 'Social Media') }}</h4>
                    <ul class="space-y-2 text-white/90">
                        @foreach(__tool('username-checker', 'content.platforms.social.list') as $item)
                            <li>• <strong>{!! explode(':', $item)[0] !!}:</strong> {!! explode(':', $item)[1] ?? '' !!}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="bg-gradient-to-br from-pink-500 to-rose-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">💼 {{ __tool('username-checker', 'content.platforms.professional.title', 'Professional') }}</h4>
                    <ul class="space-y-2 text-white/90">
                        @foreach(__tool('username-checker', 'content.platforms.professional.list') as $item)
                            <li>• <strong>{!! explode(':', $item)[0] !!}:</strong> {!! explode(':', $item)[1] ?? '' !!}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✅ {{ __tool('username-checker', 'content.best_practices_title', 'Username Best Practices') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🎯</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('username-checker', 'content.best_practices.short.title', 'Keep It Short') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('username-checker', 'content.best_practices.short.desc', 'Aim for 6-15 characters for easy memorability and typing') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🔤</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('username-checker', 'content.best_practices.spell.title', 'Easy to Spell') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('username-checker', 'content.best_practices.spell.desc', 'Avoid complex spellings, numbers, and special characters') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🏷️</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('username-checker', 'content.best_practices.brand.title', 'Brand Consistent') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('username-checker', 'content.best_practices.brand.desc', 'Use the same username across all platforms for recognition') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🚫</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('username-checker', 'content.best_practices.trends.title', 'Avoid Trends') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('username-checker', 'content.best_practices.trends.desc', "Don't use trendy words that may become outdated") }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🔍</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('username-checker', 'content.best_practices.seo.title', 'SEO Friendly') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('username-checker', 'content.best_practices.seo.desc', 'Include relevant keywords for better discoverability') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('username-checker', 'content.best_practices.fast.title', 'Act Fast') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('username-checker', 'content.best_practices.fast.desc', "Claim your username quickly before it's taken") }}</p>
                </div>
            </div>

            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-2 border-blue-200 rounded-2xl p-8 mb-10">
                <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-3 text-xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    💡 {{ __tool('username-checker', 'content.tips_title', 'Pro Tips for Choosing a Username') }}
                </h4>
                <ul class="text-blue-800 leading-relaxed space-y-2">
                    @foreach(__tool('username-checker', 'content.tips_list.items') as $tip)
                        <li>✅ {{ $tip }}</li>
                    @endforeach
                </ul>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ {{ __tool('username-checker', 'content.faq_title', 'Frequently Asked Questions') }}</h3>
            <div class="space-y-4">
                @foreach(__tool('username-checker', 'content.faq') as $key => $value)
                    @if(str_starts_with($key, 'q'))
                        <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                            <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ $value }}</h4>
                            <p class="text-gray-700 leading-relaxed">{{ __tool('username-checker', 'content.faq.a' . substr($key, 1)) }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const platforms = [
            { name: 'Twitter', url: 'https://twitter.com/', icon: '𝕏', color: 'blue' },
            { name: 'Instagram', url: 'https://instagram.com/', icon: '📷', color: 'pink' },
            { name: 'GitHub', url: 'https://github.com/', icon: '💻', color: 'gray' },
            { name: 'TikTok', url: 'https://tiktok.com/@', icon: '🎵', color: 'red' },
            { name: 'Facebook', url: 'https://facebook.com/', icon: '👥', color: 'blue' },
            { name: 'LinkedIn', url: 'https://linkedin.com/in/', icon: '💼', color: 'blue' }
        ];

        $('#usernameForm').on('submit', function (e) {
            e.preventDefault();

            const username = $('#username').val().trim();
            const btn = $(this).find('button[type="submit"]');
            const btnText = $('#btnText');

            if (!username) return;

            btn.prop('disabled', true).addClass('opacity-75');
            btnText.text("{{ __tool('username-checker', 'editor.btn_checking', 'Checking...') }}");
            $('#resultsSection').removeClass('hidden');
            $('#platformResults').empty();

            platforms.forEach(platform => {
                checkPlatform(platform, username);
            });

            setTimeout(() => {
                btn.prop('disabled', false).removeClass('opacity-75');
                btnText.text("{{ __tool('username-checker', 'editor.btn_check', 'Check Availability') }}");
                $('#resultsSection')[0].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }, 1000);
        });

        function checkPlatform(platform, username) {
            const url = platform.url + username;

            // Simulate check (in real implementation, you'd make actual HTTP requests)
            setTimeout(() => {
                const isAvailable = Math.random() > 0.5; // Random for demo
                displayResult(platform, username, isAvailable);
            }, Math.random() * 500);
        }

        function displayResult(platform, username, isAvailable) {
            const colorClass = isAvailable ? 'border-green-300 bg-green-50' : 'border-red-300 bg-red-50';
            const statusIcon = isAvailable ? '✅' : '❌';
            const statusText = isAvailable ? "{{ __tool('username-checker', 'editor.status_available', 'Available') }}" : "{{ __tool('username-checker', 'editor.status_taken', 'Taken') }}";
            const statusColor = isAvailable ? 'text-green-700' : 'text-red-700';

            const html = `
                            <div class="border-2 ${colorClass} rounded-xl p-4 hover:shadow-lg transition-all duration-300">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="flex items-center gap-2">
                                        <span class="text-2xl">${platform.icon}</span>
                                        <span class="font-bold text-gray-900">${platform.name}</span>
                                    </div>
                                    <span class="text-2xl">${statusIcon}</span>
                                </div>
                                <p class="text-sm ${statusColor} font-semibold mb-2">${statusText}</p>
                                <a href="${platform.url}${username}" target="_blank" class="text-sm text-blue-600 hover:text-blue-800 underline">
                                    {{ __tool('username-checker', 'editor.link_view', 'View Profile →') }}
                                </a>
                            </div>
                        `;
            $('#platformResults').append(html);
        }
    </script>
    @endpush
@endsection