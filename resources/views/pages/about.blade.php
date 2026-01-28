@extends('layouts.app')

@section('title', __page('about', 'meta.title'))
@section('meta_description', __page('about', 'meta.description'))

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-3xl shadow-2xl p-8 md:p-12 mb-8">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-2xl shadow-xl mb-6">
                    <svg class="w-11 h-11 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h1 class="text-5xl font-black text-gray-900 mb-4">{{ __page('about', 'hero.title') }}</h1>
                <p class="text-xl text-gray-600">{{ __page('about', 'hero.subtitle') }}</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">{{ __page('about', 'mission.title') }}</h2>
            <p class="text-gray-700 leading-relaxed text-lg mb-6">
                {{ __page('about', 'mission.p1') }}
            </p>
            <p class="text-gray-700 leading-relaxed text-lg mb-6">
                {{ __page('about', 'mission.p2') }}
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">{{ __page('about', 'different.title') }}</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-6 border-2 border-blue-200">
                    <div class="text-4xl mb-3">🔒</div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">{{ __page('about', 'different.privacy.title') }}</h3>
                    <p class="text-gray-700">{{ __page('about', 'different.privacy.desc') }}</p>
                </div>
                <div class="bg-gradient-to-br from-green-50 to-teal-50 rounded-xl p-6 border-2 border-green-200">
                    <div class="text-4xl mb-3">⚡</div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">{{ __page('about', 'different.speed.title') }}</h3>
                    <p class="text-gray-700">{{ __page('about', 'different.speed.desc') }}</p>
                </div>
                <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-6 border-2 border-purple-200">
                    <div class="text-4xl mb-3">🆓</div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">{{ __page('about', 'different.free.title') }}</h3>
                    <p class="text-gray-700">{{ __page('about', 'different.free.desc') }}</p>
                </div>
                <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-xl p-6 border-2 border-orange-200">
                    <div class="text-4xl mb-3">🚫</div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">{{ __page('about', 'different.no_reg.title') }}</h3>
                    <p class="text-gray-700">{{ __page('about', 'different.no_reg.desc') }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">{{ __page('about', 'tools_section.title') }}</h2>
            <div class="space-y-6">
                <div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">{{ __page('about', 'tools_section.youtube.title') }}
                    </h3>
                    <p class="text-gray-700">{{ __page('about', 'tools_section.youtube.desc') }}</p>
                </div>
                <div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">{{ __page('about', 'tools_section.seo.title') }}</h3>
                    <p class="text-gray-700">{{ __page('about', 'tools_section.seo.desc') }}</p>
                </div>
                <div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">{{ __page('about', 'tools_section.network.title') }}
                    </h3>
                    <p class="text-gray-700">{{ __page('about', 'tools_section.network.desc') }}</p>
                </div>
                <div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">{{ __page('about', 'tools_section.utility.title') }}
                    </h3>
                    <p class="text-gray-700">{{ __page('about', 'tools_section.utility.desc') }}</p>
                </div>
            </div>
        </div>

        <div
            class="bg-gradient-to-br from-indigo-600 to-purple-600 rounded-2xl shadow-xl p-8 md:p-12 text-white text-center">
            <h2 class="text-3xl font-bold mb-4">{{ __page('about', 'cta.title') }}</h2>
            <p class="text-lg mb-6 text-white/90">{{ __page('about', 'cta.subtitle') }}</p>
            <a href="{{ route('contact') }}"
                class="inline-block bg-white text-indigo-600 font-bold px-8 py-4 rounded-xl hover:bg-gray-100 transition-all transform hover:scale-105 shadow-lg">
                {{ __page('about', 'cta.button') }}
            </a>
        </div>
    </div>
@endsection