@extends('layouts.app')

@section('title', $tool->meta_title ?? $tool->name)
@section('meta_description', $tool->meta_description ?? $tool->description)

@section('content')
    <x-tool-hero :tool="$tool" />
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
    <div class="bg-white rounded-3xl p-8 md:p-10 shadow-xl border border-gray-100 mb-16">
        <div class="text-center mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Upload PDF File</h2>
            <p class="text-lg text-gray-600">Drag & drop PDF to convert to JPG images</p>
        </div>

        <form action="#" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <div class="border-4 border-dashed border-amber-100 rounded-3xl p-10 text-center hover:border-amber-300 hover:bg-amber-50 transition-all cursor-pointer relative group bg-gray-50/50"
                id="dropzone">
                <input type="file" name="file" id="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                    accept=".pdf">
                <div class="space-y-6 pointer-events-none">
                    <div
                        class="inline-flex items-center justify-center w-20 h-20 bg-amber-100 text-amber-600 rounded-full group-hover:scale-110 transition-transform">
                        <!-- Icon: Cloud Upload -->
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xl font-bold text-gray-700">Click to upload or drag and drop</p>
                        <p class="text-base text-gray-500 mt-2">PDF files to extract images</p>
                    </div>
                </div>
                <div id="file-name" class="mt-4 text-amber-600 font-medium hidden text-lg"></div>
            </div>

            <div class="text-center">
                <button type="submit"
                    class="w-full md:w-auto min-w-[300px] inline-flex items-center justify-center px-10 py-5 border border-transparent text-xl font-bold rounded-2xl shadow-xl text-white bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 focus:outline-none focus:ring-4 focus:ring-amber-500/50 transform hover:-translate-y-1 transition-all">
                    Convert to JPG
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
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-6">Convert PDF to JPG - High Quality</h2>
                <p class="text-xl leading-relaxed text-gray-600">
                    Extract pages from your PDF documents and save them as high-quality JPG images.
                    Perfect for sharing on social media or inserting into other documents.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 mb-16 not-prose">
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-amber-100 text-amber-600 rounded-2xl flex items-center justify-center mb-6">
                        <!-- Icon: Photograph -->
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">High Resolution</h3>
                    <p class="text-base text-gray-600 leading-relaxed">We maintain the highest possible quality for your
                        images during conversion.</p>
                </div>
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-orange-100 text-orange-600 rounded-2xl flex items-center justify-center mb-6">
                        <!-- Icon: Share -->
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">Easily Sharable</h3>
                    <p class="text-base text-gray-600 leading-relaxed">JPGs are universally accepted and easy to view on any
                        device or browser.</p>
                </div>
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-yellow-100 text-yellow-600 rounded-2xl flex items-center justify-center mb-6">
                        <!-- Icon: Folder Open -->
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">Zip Archive</h3>
                    <p class="text-base text-gray-600 leading-relaxed">Download all images at once in a convenient ZIP file
                        for multi-page PDFs.</p>
                </div>
            </div>

            <div class="max-w-4xl mx-auto space-y-12">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">How to Convert PDF to JPG</h3>
                    <ol class="space-y-4">
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-amber-100 text-amber-600 rounded-full font-bold mr-4 mt-1">1</span>
                            <div>
                                <strong class="text-gray-900 text-lg">Upload PDF:</strong>
                                <p class="mt-1 text-gray-600">Choose the PDF file you want to convert.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-amber-100 text-amber-600 rounded-full font-bold mr-4 mt-1">2</span>
                            <div>
                                <strong class="text-gray-900 text-lg">Convert:</strong>
                                <p class="mt-1 text-gray-600">The tool processes each page into an image.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-amber-100 text-amber-600 rounded-full font-bold mr-4 mt-1">3</span>
                            <div>
                                <strong class="text-gray-900 text-lg">Download:</strong>
                                <p class="mt-1 text-gray-600">Download single images or a ZIP file.</p>
                            </div>
                        </li>
                    </ol>
                </div>

                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Why convert to JPG?</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mt-1 mr-3 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span><strong class="text-gray-900">Social Media:</strong> Easily post pages from a PDF to
                                Instagram or Facebook</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mt-1 mr-3 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span><strong class="text-gray-900">Embedding:</strong> Insert PDF content into Word or
                                PowerPoint as an image</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mt-1 mr-3 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span><strong class="text-gray-900">Compatibility:</strong> View on devices that don't support
                                PDF viewers</span>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h3>
                    <div class="space-y-6">
                        <div class="bg-gray-50 rounded-2xl p-6">
                            <h4 class="font-bold text-lg text-gray-900 mb-2">Is the quality reduced?</h4>
                            <p>JPG is lossy, but we use high settings to ensure the difference is negligible for typical
                                use.</p>
                        </div>
                        <div class="bg-gray-50 rounded-2xl p-6">
                            <h4 class="font-bold text-lg text-gray-900 mb-2">Can I convert the whole PDF?</h4>
                            <p>Yes, all pages in your PDF will be converted to separate image files.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-amber-50 border-l-4 border-amber-500 p-8 rounded-r-2xl">
                    <p class="font-bold text-amber-900 text-lg mb-2 flex items-center">
                        <svg class="w-6 h-6 text-orange-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 2a6 6 0 00-6 6c0 1.887-.454 3.665-1.257 5.234a.75.75 0 00.515 1.076 32.91 32.91 0 003.256.508 3.5 3.5 0 006.972 0 32.903 32.903 0 003.256-.508.75.75 0 00.515-1.076A11.448 11.448 0 0116 8a6 6 0 00-6-6zM8.05 14.943a33.54 33.54 0 003.9 0 2 2 0 00-3.9 0zm1.5 5.002c.767 0 1.517-.06 2.25-.175a.75.75 0 00-.25-1.48 31.39 31.39 0 01-1.996 0 .75.75 0 00-.25 1.48c.081.013.164.026.246.04v.135z"
                                clip-rule="evenodd" />
                        </svg>
                        Pro Tip:
                    </p>
                    <p class="text-amber-800 text-lg">Use these images for easy insertion into Word documents where PDF
                        compatibility can be tricky.</p>
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