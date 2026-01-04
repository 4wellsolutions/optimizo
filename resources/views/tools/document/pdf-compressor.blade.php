@extends('layouts.app')

@section('title', $tool->meta_title ?? $tool->name)
@section('meta_description', $tool->meta_description ?? $tool->description)

@section('content')
    <!-- Hero Section -->
    <div
        class="relative overflow-hidden bg-gradient-to-br from-red-600 via-rose-500 to-pink-500 rounded-3xl p-8 md:p-12 mb-12 shadow-2xl">
        <div class="absolute top-0 right-0 w-80 h-80 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

        <div class="relative z-10 text-center">
            <div
                class="inline-flex items-center justify-center w-20 h-20 bg-white rounded-2xl shadow-2xl mb-8 transform -rotate-3 hover:rotate-0 transition-transform duration-300">
                <!-- Icon: Archive (Red) -->
                <svg class="w-10 h-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                </svg>
            </div>
            <h1 class="text-3xl md:text-5xl font-black text-white mb-6 leading-tight tracking-tight">
                {{ $tool->name }}
            </h1>
            <p class="text-xl md:text-2xl text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                {{ $tool->description }}
            </p>
            <div class="mt-8">
                @include('components.hero-actions')
            </div>
        </div>
    </div>

    <!-- Tool Interface Section -->
    <!-- Wide form layout -->
    <div class="bg-white rounded-3xl p-8 md:p-10 shadow-xl border border-gray-100 mb-16">
        <div class="text-center mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Upload PDF File</h2>
            <p class="text-lg text-gray-600">Drag & drop PDF to compress and reduce file size</p>
        </div>

        <form action="#" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <div class="border-4 border-dashed border-red-100 rounded-3xl p-10 text-center hover:border-red-300 hover:bg-red-50 transition-all cursor-pointer relative group bg-gray-50/50"
                id="dropzone">
                <input type="file" name="file" id="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                    accept=".pdf">
                <div class="space-y-6 pointer-events-none">
                    <div
                        class="inline-flex items-center justify-center w-20 h-20 bg-red-100 text-red-600 rounded-full group-hover:scale-110 transition-transform">
                        <!-- Icon: Cloud Upload -->
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xl font-bold text-gray-700">Click to upload or drag and drop</p>
                        <p class="text-base text-gray-500 mt-2">PDF files up to 100MB</p>
                    </div>
                </div>
                <div id="file-name" class="mt-4 text-red-600 font-medium hidden text-lg"></div>
            </div>

            <!-- Compression Options -->
            <div class="grid md:grid-cols-3 gap-6">
                <label
                    class="relative flex flex-col p-6 bg-white border-2 border-gray-200 rounded-2xl cursor-pointer hover:border-red-300 transition-colors">
                    <input type="radio" name="compression_level" value="extreme" class="peer sr-only">
                    <span class="text-lg font-bold text-gray-900 mb-2">Extreme Compression</span>
                    <span class="text-sm text-gray-500">Loosest quality, smallest size. Good for web viewing.</span>
                    <div
                        class="absolute top-4 right-4 w-6 h-6 border-2 border-gray-300 rounded-full peer-checked:bg-red-500 peer-checked:border-red-500">
                    </div>
                </label>

                <label
                    class="relative flex flex-col p-6 bg-white border-2 border-red-500 rounded-2xl cursor-pointer ring-4 ring-red-50">
                    <input type="radio" name="compression_level" value="recommended" class="peer sr-only" checked>
                    <span class="text-lg font-bold text-gray-900 mb-2">Recommended</span>
                    <span class="text-sm text-gray-500">Good quality, good compression. Best for most PDFs.</span>
                    <div
                        class="absolute top-4 right-4 w-6 h-6 bg-red-500 border-2 border-red-500 rounded-full peer-checked:bg-red-500 peer-checked:border-red-500">
                    </div>
                </label>

                <label
                    class="relative flex flex-col p-6 bg-white border-2 border-gray-200 rounded-2xl cursor-pointer hover:border-red-300 transition-colors">
                    <input type="radio" name="compression_level" value="less" class="peer sr-only">
                    <span class="text-lg font-bold text-gray-900 mb-2">Less Compression</span>
                    <span class="text-sm text-gray-500">High quality, larger size. Good for printing.</span>
                    <div
                        class="absolute top-4 right-4 w-6 h-6 border-2 border-gray-300 rounded-full peer-checked:bg-red-500 peer-checked:border-red-500">
                    </div>
                </label>
            </div>

            <div class="text-center">
                <button type="submit"
                    class="w-full md:w-auto min-w-[300px] inline-flex items-center justify-center px-10 py-5 border border-transparent text-xl font-bold rounded-2xl shadow-xl text-white bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-700 hover:to-rose-700 focus:outline-none focus:ring-4 focus:ring-red-500/50 transform hover:-translate-y-1 transition-all">
                    Compress PDF
                    <!-- Icon: Arrow Right -->
                    <svg class="ml-3 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
                <p class="mt-4 text-sm text-gray-400">Feature currently in development.</p>
            </div>
        </form>
    </div>

    <!-- SEO Content Section -->
    <div class="bg-white rounded-3xl p-8 md:p-12 shadow-xl border border-gray-100 mb-12">
        <article class="prose prose-lg md:prose-xl max-w-none text-gray-600">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-6">Compress PDF File - Reduce File Size</h2>
                <p class="text-xl leading-relaxed text-gray-600">
                    Reduce the size of your PDF documents without compromising quality. Perfect for uploading to websites,
                    sharing via email, or saving storage space.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 mb-16 not-prose">
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-red-100 text-red-600 rounded-2xl flex items-center justify-center mb-6">
                        <!-- Icon: Scale -->
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">Adjustable Quality</h3>
                    <p class="text-base text-gray-600 leading-relaxed">Choose from multiple compression levels to balance
                        file size and visual quality.</p>
                </div>
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-rose-100 text-rose-600 rounded-2xl flex items-center justify-center mb-6">
                        <!-- Icon: Shield Check -->
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">Secure Processing</h3>
                    <p class="text-base text-gray-600 leading-relaxed">Your files are compressed securely and deleted from
                        our servers automatically.</p>
                </div>
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-pink-100 text-pink-600 rounded-2xl flex items-center justify-center mb-6">
                        <!-- Icon: Lightning Bolt -->
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">Fast & Free</h3>
                    <p class="text-base text-gray-600 leading-relaxed">Compress large files in seconds. No hidden fees or
                        watermarks.</p>
                </div>
            </div>
            <!-- ... rest of the SEO content ... -->
            <div class="max-w-4xl mx-auto space-y-12">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">How to Compress a PDF</h3>
                    <ol class="space-y-4">
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-red-100 text-red-600 rounded-full font-bold mr-4 mt-1">1</span>
                            <div>
                                <strong class="text-gray-900 text-lg">Upload PDF:</strong>
                                <p class="mt-1 text-gray-600">Select the file you want to compress.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-red-100 text-red-600 rounded-full font-bold mr-4 mt-1">2</span>
                            <div>
                                <strong class="text-gray-900 text-lg">Choose Level:</strong>
                                <p class="mt-1 text-gray-600">Select Extreme, Recommended, or Less compression.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-red-100 text-red-600 rounded-full font-bold mr-4 mt-1">3</span>
                            <div>
                                <strong class="text-gray-900 text-lg">Download:</strong>
                                <p class="mt-1 text-gray-600">Get your smaller PDF file immediately.</p>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </article>
    </div>

    @push('scripts')
        <script>
            const fileInput = document.getElementById('file');
            const fileName = document.getElementById('file-name');

            fileInput.addEventListener('change', (e) => {
                if (e.target.files.length > 0) {
                    fileName.textContent = e.target.files[0].name;
                    fileName.classList.remove('hidden');
                }
            });
        </script>
    @endpush
@endsection