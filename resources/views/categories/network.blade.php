@extends('layouts.app')

@section('title', 'Network Tools - Free Network Diagnostic Tools | Optimizo')
@section('meta_description', 'Free network tools including IP lookup, DNS lookup, WHOIS, ping test, and more. Professional network diagnostic tools.')

@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Hero Section -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-purple-500 via-violet-500 to-indigo-600 rounded-3xl p-8 md:p-12 mb-12 shadow-2xl">
            <div class="absolute top-0 right-0 w-96 h-96 bg-white opacity-10 rounded-full -mr-48 -mt-48"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-white opacity-10 rounded-full -ml-32 -mb-32"></div>

            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-white rounded-2xl shadow-2xl mb-6">
                    <svg class="w-12 h-12 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                    </svg>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-4 leading-tight">
                    Network Tools
                </h1>
                <p class="text-xl md:text-2xl text-white/90 font-medium max-w-3xl mx-auto mb-6">
                    Professional network diagnostic tools - 100% free
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <div class="bg-white/20 backdrop-blur-sm rounded-xl px-6 py-3">
                        <div class="text-3xl font-black text-white">{{ $tools->count() }}</div>
                        <div class="text-sm text-white/80">Free Tools</div>
                    </div>
                    <div class="bg-white/20 backdrop-blur-sm rounded-xl px-6 py-3">
                        <div class="text-3xl font-black text-white">100%</div>
                        <div class="text-sm text-white/80">Free Forever</div>
                    </div>
                    <div class="bg-white/20 backdrop-blur-sm rounded-xl px-6 py-3">
                        <div class="text-3xl font-black text-white">0</div>
                        <div class="text-sm text-white/80">Registration</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tools Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @foreach($tools as $tool)
                <a href="{{ route('network.' . str_replace('network-', '', $tool->slug)) }}"
                    class="group bg-white rounded-2xl p-6 shadow-lg border-2 border-purple-200 hover:border-purple-500 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="flex items-center gap-4 mb-4">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                            </svg>
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

        <!-- Back to Home -->
        <div class="text-center mb-12">
            <a href="{{ route('home') }}"
                class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-purple-500 to-indigo-600 text-white rounded-xl font-bold shadow-lg hover:shadow-2xl transition-all hover:scale-105">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Home
            </a>
        </div>
    </div>
@endsection