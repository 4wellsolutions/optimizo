@extends('layouts.app')

@section('title', __page('sponsors', 'meta.title'))
@section('meta_description', __page('sponsors', 'meta.description'))

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-3xl shadow-2xl p-8 md:p-12 mb-8">
            <div class="text-center">
                <div
                    class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-purple-600 to-pink-600 rounded-2xl shadow-xl mb-6">
                    <svg class="w-11 h-11 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                <h1 class="text-5xl font-black text-gray-900 mb-4">{{ __page('sponsors', 'hero.title') }}</h1>
                <p class="text-xl text-gray-600">{{ __page('sponsors', 'hero.subtitle') }}</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">{{ __page('sponsors', 'why.title') }}</h2>
            <p class="text-gray-700 leading-relaxed text-lg mb-6">
                {{ __page('sponsors', 'why.content') }}
            </p>
            <ul class="space-y-3 text-gray-700 text-lg mb-6">
                @foreach(__page('sponsors', 'why.items') as $item)
                    <li class="flex items-start gap-3">
                        <span class="text-green-600 font-bold text-xl">✓</span>
                        <span>{{ $item }}</span>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">{{ __page('sponsors', 'tiers.title') }}</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-6 border-2 border-blue-200">
                    <div class="text-4xl mb-3">☕</div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-2">{{ __page('sponsors', 'tiers.coffee.title') }}</h3>
                    <p class="text-3xl font-black text-blue-600 mb-4">{{ __page('sponsors', 'tiers.coffee.price') }}</p>
                    <ul class="space-y-2 text-gray-700 text-sm">
                        @foreach(__page('sponsors', 'tiers.coffee.items') as $item)
                            <li>✓ {{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
                <div
                    class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-6 border-2 border-purple-200 transform scale-105">
                    <div class="text-4xl mb-3">🚀</div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-2">{{ __page('sponsors', 'tiers.pro.title') }}</h3>
                    <p class="text-3xl font-black text-purple-600 mb-4">{{ __page('sponsors', 'tiers.pro.price') }}</p>
                    <ul class="space-y-2 text-gray-700 text-sm">
                        @foreach(__page('sponsors', 'tiers.pro.items') as $item)
                            <li>✓ {{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-xl p-6 border-2 border-orange-200">
                    <div class="text-4xl mb-3">⭐</div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-2">{{ __page('sponsors', 'tiers.enterprise.title') }}</h3>
                    <p class="text-3xl font-black text-orange-600 mb-4">{{ __page('sponsors', 'tiers.enterprise.price') }}</p>
                    <ul class="space-y-2 text-gray-700 text-sm">
                        @foreach(__page('sponsors', 'tiers.enterprise.items') as $item)
                            <li>✓ {{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div
            class="bg-gradient-to-br from-indigo-600 to-purple-600 rounded-2xl shadow-xl p-8 md:p-12 text-white text-center">
            <h2 class="text-3xl font-bold mb-4">{{ __page('sponsors', 'cta.title') }}</h2>
            <p class="text-lg mb-6 text-white/90">{{ __page('sponsors', 'cta.subtitle') }}</p>
            <a href="{{ route('contact') }}"
                class="inline-block bg-white text-indigo-600 font-bold px-8 py-4 rounded-xl hover:bg-gray-100 transition-all transform hover:scale-105 shadow-lg">
                {{ __page('sponsors', 'cta.button') }}
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mt-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center">{{ __page('sponsors', 'list.title') }}</h2>
            <p class="text-gray-600 text-center mb-8">{{ __page('sponsors', 'list.subtitle') }}</p>
            <div class="text-center text-gray-500">
                <p class="text-lg">{{ __page('sponsors', 'list.empty_title') }}</p>
                <p class="text-sm mt-2">{{ __page('sponsors', 'list.empty_desc') }}</p>
            </div>
        </div>
    </div>
@endsection
