@extends('layouts.app')

@section('title', 'YouTube Channel ID Finder - Find Any Channel ID | Optimizo')
@section('meta_description', 'Find YouTube channel ID from channel URL or name instantly. Free YouTube channel ID finder tool.')

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
                    YouTube Channel ID Finder
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                    Find any YouTube channel ID instantly from channel URL or name!
                </p>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-red-200 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Find Channel ID</h2>
            <form id="channelForm">
                @csrf
                <div class="mb-6">
                    <label for="url" class="form-label text-base">YouTube Channel URL</label>
                    <input type="url" id="url" name="url" class="form-input"
                        placeholder="https://www.youtube.com/@channelname" required>
                    <p class="text-sm text-gray-500 mt-2">Paste any YouTube channel URL to find its ID</p>
                </div>

                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <span id="btnText">Find Channel ID</span>
                </button>
            </form>

            <div id="resultSection" class="hidden mt-6">
                <div class="bg-green-50 border-2 border-green-200 rounded-xl p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Channel ID:</h3>
                    <p id="channelId" class="text-gray-700 font-mono text-lg break-all"></p>
                    <button onclick="copyId()" class="btn-secondary mt-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                        Copy ID
                    </button>
                </div>
            </div>

            <div id="errorMessage" class="hidden mt-6 bg-red-50 border-2 border-red-200 rounded-xl p-6">
                <p class="text-red-800 font-semibold" id="errorText"></p>
            </div>
        </div>
    </div>

    <script>
        function copyId() {
            const id = document.getElementById('channelId').textContent;
            navigator.clipboard.writeText(id);
            alert('Channel ID copied!');
        }
    </script>
@endsection