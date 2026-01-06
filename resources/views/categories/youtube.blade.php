@extends('layouts.app')

@section('title', 'YouTube Tools - Free Professional Tools for Creators | Optimizo')
@section('meta_description', 'Free YouTube tools for creators including monetization checker, thumbnail downloader, tag generator, and more. 100% free, no registration required.')

@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Hero Section -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-red-500 via-pink-500 to-rose-600 rounded-2xl p-6 mb-8 shadow-xl">

            <div class="text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white rounded-xl shadow-lg mb-3">
                    <svg class="w-10 h-10 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl font-black text-white mb-2 leading-tight">
                    {{ __('categories.youtube_title') }}
                </h1>
                <p class="text-sm md:text-base text-white/90 font-medium max-w-2xl mx-auto mb-3">
                    {{ __('categories.youtube_subtitle') }}
                </p>
                <div class="flex flex-wrap justify-center gap-3">
                    <div class="bg-white/20 backdrop-blur-sm rounded-lg px-4 py-2">
                        <div class="text-2xl font-black text-white">{{ $tools->count() }}</div>
                        <div class="text-xs text-white/80">{{ __('categories.free_tools') }}</div>
                    </div>
                    <div class="bg-white/20 backdrop-blur-sm rounded-lg px-4 py-2">
                        <div class="text-2xl font-black text-white">100%</div>
                        <div class="text-xs text-white/80">{{ __('categories.free_forever') }}</div>
                    </div>
                    <div class="bg-white/20 backdrop-blur-sm rounded-lg px-4 py-2">
                        <div class="text-2xl font-black text-white">⚡</div>
                        <div class="text-xs text-white/80">{{ __('categories.instant_access') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tools by Subcategory -->
        @php
            $toolsBySubcategory = $tools->groupBy('subcategory');
        @endphp

        @foreach($toolsBySubcategory as $subcategory => $subcategoryTools)
            <div class="mb-10">
                <!-- Subcategory Header -->
                <div class="flex items-center gap-3 mb-6">
                    <div class="flex-1 h-px bg-gradient-to-r from-transparent via-red-300 to-transparent"></div>
                    <h2 class="text-2xl font-black text-gray-900 px-4">
                        {{ $subcategory }}
                        <span class="text-sm font-normal text-gray-500 ml-2">({{ $subcategoryTools->count() }} tools)</span>
                    </h2>
                    <div class="flex-1 h-px bg-gradient-to-r from-transparent via-red-300 to-transparent"></div>
                </div>

                <!-- Tools Grid for this Subcategory -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($subcategoryTools as $tool)
                        <a href="{{ route($tool->route_name) }}"
                            class="group bg-white rounded-2xl p-6 shadow-lg border-2 border-red-200 hover:border-red-500 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="flex items-center gap-4 mb-4">
                                <div
                                    class="w-14 h-14 bg-gradient-to-br from-red-500 to-pink-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                    @include('components.tool-icon', ['slug' => $tool->slug])
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-bold text-lg text-gray-900 group-hover:text-red-600 transition-colors">
                                        {{ str_replace('YouTube ', '', __t($tool, 'name')) }}
                                    </h3>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                {{ __t($tool, 'meta_description') }}
                            </p>
                        </a>
                    @endforeach
                </div>
            </div>
        @endforeach

        <!-- Back to Home -->
        <div class="text-center mb-12">
            <a href="{{ route('home') }}"
                class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-red-500 to-pink-600 text-white rounded-xl font-bold shadow-lg hover:shadow-2xl transition-all hover:scale-105">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                {{ __('categories.back_to_home') }}
            </a>
        </div>
    </div>
@endsection