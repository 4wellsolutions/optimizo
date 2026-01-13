@extends('layouts.app')

@section('title', __('home.title'))
@section('meta_description', __('home.meta_description'))

@section('content')
    <!-- Hero Section -->
    <div class="text-center py-12 md:py-16 animate-fade-in">
        <div class="mb-6 inline-block">
            <span
                class="px-6 py-3 bg-gradient-to-r from-indigo-100 to-purple-100 text-indigo-700 rounded-full text-sm font-bold uppercase tracking-wide">
                {{ __('home.hero_badge') }}
            </span>
        </div>
        <h1 class="hero-title animate-float">
            {!! __('home.hero_title') !!}
        </h1>
        <p class="hero-subtitle">
            {{ __('home.hero_subtitle') }}<br>
            <span class="font-bold text-indigo-600">{{ __('home.hero_subtitle_bold') }}</span>
        </p>
        <div class="flex flex-wrap justify-center gap-6">
            <a href="#youtube-tools" class="btn-primary">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                </svg>
                {{ __('home.hero_cta_youtube') }}
            </a>
            <a href="#seo-tools" class="btn-secondary">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                {{ __('home.hero_cta_seo') }}
            </a>
        </div>
    </div>

    <!-- YouTube Tools Section -->
    <section id="youtube-tools" class="mb-24 animate-slide-up">
        <div class="section-header">
            <div class="section-icon bg-gradient-to-br from-red-500 to-pink-600">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                </svg>
            </div>
            <h2 class="section-title">{{ __('home.section_youtube_title') }}</h2>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
            @foreach($youtubeTools as $tool)
                <x-tool-card :tool="$tool" />
            @endforeach
        </div>

        <div class="text-center">
            <a href="{{ localeRoute('category.youtube') }}"
                class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-red-500 to-pink-600 text-white rounded-xl font-bold shadow-lg hover:shadow-2xl transition-all hover:scale-105">
                <span>{{ __('home.view_all_youtube') }}</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </section>

    <!-- SEO Tools Section -->
    <section id="seo-tools" class="mb-24 animate-slide-up">
        <div class="section-header">
            <div class="section-icon bg-gradient-to-br from-green-500 to-emerald-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <h2 class="section-title">{{ __('home.section_seo_title') }}</h2>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
            @foreach($seoTools as $tool)
                <x-tool-card :tool="$tool" />
            @endforeach
        </div>

        <div class="text-center">
            <a href="{{ localeRoute('category.seo') }}"
                class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-xl font-bold shadow-lg hover:shadow-2xl transition-all hover:scale-105">
                <span>{{ __('home.view_all_seo') }}</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </section>

    <!-- Utility Tools Section -->
    <section id="utility-tools" class="mb-24 animate-slide-up">
        <div class="section-header">
            <div class="section-icon bg-gradient-to-br from-blue-500 to-cyan-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <h2 class="section-title">{{ __('home.section_utility_title') }}</h2>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
            @foreach($utilityTools as $tool)
                <x-tool-card :tool="$tool" />
            @endforeach
        </div>

        <div class="text-center">
            <a href="{{ localeRoute('category.utility') }}"
                class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-blue-500 to-cyan-600 text-white rounded-xl font-bold shadow-lg hover:shadow-2xl transition-all hover:scale-105">
                <span>{{ __('home.view_all_utility') }}</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </section>

    <!-- Network Tools Section -->
    <section id="network-tools" class="mb-24 animate-slide-up">
        <div class="section-header">
            <div class="section-icon bg-gradient-to-br from-purple-500 to-indigo-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                </svg>
            </div>
            <h2 class="section-title">{{ __('home.section_network_title') }}</h2>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
            @foreach($networkTools as $tool)
                <x-tool-card :tool="$tool" />
            @endforeach
        </div>

        <div class="text-center">
            <a href="{{ localeRoute('category.network') }}"
                class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-purple-500 to-indigo-600 text-white rounded-xl font-bold shadow-lg hover:shadow-2xl transition-all hover:scale-105">
                <span>{{ __('home.view_all_network') }}</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </section>

    <!-- Features Section -->
    <section
        class="bg-gradient-to-br from-gray-50 to-indigo-50 rounded-[3rem] p-16 md:p-24 shadow-2xl border-2 border-gray-100">
        <div class="text-center mb-20">
            <div class="mb-6 inline-block">
                <span
                    class="px-6 py-3 bg-white text-indigo-700 rounded-full text-sm font-bold uppercase tracking-wide shadow-lg">
                    {{ __('home.why_choose_badge') }}
                </span>
            </div>
            <h2 class="text-5xl md:text-6xl font-black mb-6 text-gray-900" style="letter-spacing: -0.02em;">
                {{ __('home.why_choose_title') }}
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">{{ __('home.why_choose_subtitle') }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div class="feature-card">
                <div class="feature-icon bg-gradient-success">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="feature-title">{{ __('home.feature_fast_title') }}</h3>
                <p class="feature-description">{{ __('home.feature_fast_desc') }}</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon bg-gradient-primary">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h3 class="feature-title">{{ __('home.feature_free_title') }}</h3>
                <p class="feature-description">{{ __('home.feature_free_desc') }}</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon bg-gradient-secondary">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="feature-title">{{ __('home.feature_privacy_title') }}</h3>
                <p class="feature-description">{{ __('home.feature_privacy_desc') }}</p>
            </div>
        </div>
    </section>

    <!-- SEO Optimized Content Section -->
    <section
        class="relative py-20 md:py-32 mt-24 overflow-hidden bg-gradient-to-br from-gray-50 via-indigo-50 to-purple-50">
        <!-- Decorative Background Elements -->
        <div class="absolute inset-0 opacity-30">
            <div
                class="absolute top-0 left-0 w-96 h-96 bg-gradient-to-br from-indigo-400 to-purple-400 rounded-full filter blur-3xl">
            </div>
            <div
                class="absolute bottom-0 right-0 w-96 h-96 bg-gradient-to-br from-blue-400 to-cyan-400 rounded-full filter blur-3xl">
            </div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center mb-16 animate-fade-in">
                <div class="inline-block mb-6">
                    <span
                        class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-full text-sm font-bold uppercase tracking-wide shadow-lg">
                        {{ __('home.powerful_tools_badge') }}
                    </span>
                </div>
                <h2 class="text-5xl md:text-6xl font-black text-gray-900 mb-6" style="letter-spacing: -0.02em;">
                    {!! __('home.everything_title') !!}
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    {{ __('home.everything_subtitle') }}
                </p>
            </div>

            <!-- Tool Categories Grid -->
            <div class="grid md:grid-cols-2 gap-8 mb-16">
                <!-- YouTube Tools Card -->
                <div
                    class="group bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border-2 border-white hover:border-red-200 hover:scale-105">
                    <div class="flex items-center mb-6">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                            </svg>
                        </div>
                        <h3 class="text-3xl font-black text-gray-900 ml-4">{{ __('home.section_youtube_title') }}</h3>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        {{ __('home.youtube_card_desc') }}
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-red-500 mt-1 mr-3 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700">{{ __('home.youtube_feature_1') }}</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-red-500 mt-1 mr-3 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700">{{ __('home.youtube_feature_2') }}</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-red-500 mt-1 mr-3 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700">{{ __('home.youtube_feature_3') }}</span>
                        </li>
                    </ul>
                </div>

                <!-- SEO Tools Card -->
                <div
                    class="group bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border-2 border-white hover:border-green-200 hover:scale-105">
                    <div class="flex items-center mb-6">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <h3 class="text-3xl font-black text-gray-900 ml-4">{{ __('home.section_seo_title') }}</h3>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        {{ __('home.seo_card_desc') }}
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mt-1 mr-3 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700">{{ __('home.seo_feature_1') }}</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mt-1 mr-3 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700">{{ __('home.seo_feature_2') }}</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mt-1 mr-3 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700">{{ __('home.seo_feature_3') }}</span>
                        </li>
                    </ul>
                </div>

                <!-- Utility Tools Card -->
                <div
                    class="group bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border-2 border-white hover:border-blue-200 hover:scale-105">
                    <div class="flex items-center mb-6">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h3 class="text-3xl font-black text-gray-900 ml-4">{{ __('home.section_utility_title') }}</h3>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        {{ __('home.utility_card_desc') }}
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-500 mt-1 mr-3 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700">{{ __('home.utility_feature_1') }}</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-500 mt-1 mr-3 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700">{{ __('home.utility_feature_2') }}</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-500 mt-1 mr-3 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700">{{ __('home.utility_feature_3') }}</span>
                        </li>
                    </ul>
                </div>

                <!-- Network Tools Card -->
                <div
                    class="group bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border-2 border-white hover:border-purple-200 hover:scale-105">
                    <div class="flex items-center mb-6">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                            </svg>
                        </div>
                        <h3 class="text-3xl font-black text-gray-900 ml-4">{{ __('home.section_network_title') }}</h3>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        {{ __('home.network_card_desc') }}
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-purple-500 mt-1 mr-3 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700">{{ __('home.network_feature_1') }}</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-purple-500 mt-1 mr-3 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700">{{ __('home.network_feature_2') }}</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-purple-500 mt-1 mr-3 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700">{{ __('home.network_feature_3') }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="mt-20">
                <div class="text-center mb-12">
                    <h3 class="text-4xl font-black text-gray-900 mb-4">{{ __('home.faq_title') }}</h3>
                    <p class="text-xl text-gray-600">{{ __('home.faq_subtitle') }}</p>
                </div>

                <div class="grid md:grid-cols-2 gap-6 max-w-6xl mx-auto">
                    <div
                        class="bg-white/60 backdrop-blur-sm rounded-2xl p-6 shadow-lg border-2 border-white hover:border-indigo-200 transition-all">
                        <h4 class="text-xl font-bold text-gray-900 mb-3 flex items-center">
                            <svg class="w-6 h-6 text-indigo-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ __('home.faq_q1') }}
                        </h4>
                        <p class="text-gray-700">{{ __('home.faq_a1') }}</p>
                    </div>

                    <div
                        class="bg-white/60 backdrop-blur-sm rounded-2xl p-6 shadow-lg border-2 border-white hover:border-indigo-200 transition-all">
                        <h4 class="text-xl font-bold text-gray-900 mb-3 flex items-center">
                            <svg class="w-6 h-6 text-indigo-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ __('home.faq_q2') }}
                        </h4>
                        <p class="text-gray-700">{{ __('home.faq_a2') }}</p>
                    </div>

                    <div
                        class="bg-white/60 backdrop-blur-sm rounded-2xl p-6 shadow-lg border-2 border-white hover:border-indigo-200 transition-all">
                        <h4 class="text-xl font-bold text-gray-900 mb-3 flex items-center">
                            <svg class="w-6 h-6 text-indigo-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ __('home.faq_q3') }}
                        </h4>
                        <p class="text-gray-700">{{ __('home.faq_a3') }}</p>
                    </div>

                    <div
                        class="bg-white/60 backdrop-blur-sm rounded-2xl p-6 shadow-lg border-2 border-white hover:border-indigo-200 transition-all">
                        <h4 class="text-xl font-bold text-gray-900 mb-3 flex items-center">
                            <svg class="w-6 h-6 text-indigo-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ __('home.faq_q4') }}
                        </h4>
                        <p class="text-gray-700">{{ __('home.faq_a4') }}</p>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="mt-20 text-center">
                <div
                    class="bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 rounded-3xl p-12 shadow-2xl relative overflow-hidden">
                    <div class="relative z-10">
                        <div class="px-6 py-3 bg-white/20 backdrop-blur-sm rounded-xl inline-block mb-8">
                            <div class="text-3xl font-black text-white">∞</div>
                            <div class="text-sm text-white/80">{{ __('home.cta_badge') }}</div>
                        </div>
                        <h3 class="text-4xl font-black text-white mb-4">{{ __('home.cta_title') }}</h3>
                        <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                            {{ __('home.cta_subtitle') }}
                        </p>
                        <div class="flex flex-wrap justify-center gap-4">
                            <a href="#youtube-tools"
                                class="inline-flex items-center px-8 py-4 bg-white text-indigo-600 rounded-xl font-bold hover:bg-gray-100 transition-all hover:scale-105 shadow-lg">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                                </svg>
                                {{ __('home.cta_explore_youtube') }}
                            </a>
                            <a href="#seo-tools"
                                class="inline-flex items-center px-8 py-4 bg-white/20 backdrop-blur-sm text-white border-2 border-white rounded-xl font-bold hover:bg-white/30 transition-all hover:scale-105">
                                {{ __('home.cta_browse_all') }}
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection