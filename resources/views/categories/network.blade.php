@extends('layouts.app')

@section('title', 'Network Tools - Free Network Diagnostic Tools | Optimizo')
@section('meta_description', 'Free network tools including IP lookup, DNS lookup, WHOIS, ping test, and more. Professional network diagnostic tools.')

@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Hero Section -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-purple-500 via-violet-500 to-indigo-600 rounded-2xl p-6 mb-8 shadow-xl">

            <div class="text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white rounded-xl shadow-lg mb-3">
                    <svg class="w-10 h-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 919-9" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl font-black text-white mb-2 leading-tight">
                    {{ __('categories.network_title') }}
                </h1>
                <p class="text-sm md:text-base text-white/90 font-medium max-w-2xl mx-auto mb-3">
                    {{ __('categories.network_subtitle') }}
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
                    <div class="flex-1 h-px bg-gradient-to-r from-transparent via-purple-300 to-transparent"></div>
                    <h2 class="text-2xl font-black text-gray-900 px-4">
                        {{ $subcategory }}
                        <span class="text-sm font-normal text-gray-500 ml-2">({{ $subcategoryTools->count() }} tools)</span>
                    </h2>
                    <div class="flex-1 h-px bg-gradient-to-r from-transparent via-purple-300 to-transparent"></div>
                </div>

                <!-- Tools Grid for this Subcategory -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($subcategoryTools as $tool)
                        <a href="{{ route($tool->route_name) }}"
                            class="group bg-white rounded-2xl p-6 shadow-lg border-2 border-purple-200 hover:border-purple-500 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="flex items-center gap-4 mb-4">
                                <div
                                    class="w-14 h-14 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                    @include('components.tool-icon', ['slug' => $tool->slug])
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-bold text-lg text-gray-900 group-hover:text-purple-600 transition-colors">
                                        {{ $tool->name }}
                                    </h3>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                {{ $tool->meta_description }}
                            </p>
                        </a>
                    @endforeach
                </div>
            </div>
        @endforeach

        <!-- Back to Home -->
        <div class="text-center mb-12">
            <a href="{{ route('home') }}"
                class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-purple-500 to-indigo-600 text-white rounded-xl font-bold shadow-lg hover:shadow-2xl transition-all hover:scale-105">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                {{ __('categories.back_to_home') }}
            </a>
        </div>
    </div>
@endsection