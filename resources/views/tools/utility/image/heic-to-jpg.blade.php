@extends('layouts.app')

@section('title', 'HEIC to JPG Converter - Convert iPhone Photos Online | Optimizo')
@section('meta_description', 'Convert High Efficiency Image File (HEIC/HEIF) photos from iPhone to standard JPG format. Free, private, client-side converter.')
@section('meta_keywords', 'heic to jpg, native iphone converter, heic converter, heif to jpg, online image converter')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" />

        <!-- Tool Interface -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-indigo-100 mb-12">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Upload HEIC File</h2>
                <p class="text-gray-600">Drag & drop your .heic or .heif file here</p>
            </div>

            <div id="dropZone"
                class="border-3 border-dashed border-indigo-200 rounded-2xl p-8 hover:border-indigo-400 hover:bg-indigo-50 transition-all cursor-pointer text-center relative group">
                <input type="file" id="imageInput" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                    accept=".heic, .heif">
                <div class="space-y-4 pointer-events-none">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-indigo-100 text-indigo-600 rounded-full group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-bold text-gray-700">Drop HEIC file here</p>
                        <p class="text-sm text-gray-500">Supports HEIC/HEIF (Max 20MB)</p>
                    </div>
                </div>
            </div>

            <!-- Loading State -->
            <div id="loadingIndicator" class="hidden mt-8 text-center">
                <svg class="animate-spin h-10 w-10 text-indigo-600 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                <p class="text-lg font-bold text-gray-700">Processing HEIC file...</p>
                <p class="text-sm text-gray-500">Larger files may take a few seconds.</p>
            </div>

            <div id="editorArea" class="hidden mt-8 grid md:grid-cols-2 gap-8">
                <!-- Left Column: Image Preview -->
                <div class="bg-gray-50 rounded-xl p-4 flex items-center justify-center border border-gray-200 h-[400px]">
                    <img id="imagePreview" class="max-h-full max-w-full object-contain rounded-lg shadow-sm" src=""
                        alt="Preview">
                </div>

                <!-- Right Column: Actions -->
                <div class="flex flex-col justify-center space-y-6">
                    <div class="text-center text-gray-600 font-medium">
                        Converted to: <span class="font-bold text-indigo-600">JPG</span>
                    </div>

                    <button id="downloadBtn"
                        class="w-full bg-gradient-to-r from-indigo-600 to-blue-600 hover:from-indigo-700 hover:to-blue-700 text-white font-bold py-4 rounded-xl shadow-lg transform hover:scale-[1.01] transition-all flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Download JPG Image
                    </button>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="mt-12 mb-20 max-w-7xl mx-auto">
            <article
                class="prose prose-lg prose-indigo max-w-none bg-white rounded-3xl p-8 md:p-12 shadow-xl border border-gray-100">
                <h2 class="text-3xl font-black text-gray-900 mb-6 text-center">Convert HEIC to JPG Instantly</h2>
                <div class="text-gray-600 text-center mb-12">
                    <p class="mb-4">
                        Apple's High Efficiency Image Format (HEIC) is great for saving space on your iPhone, but it can be
                        a nightmare to open on Windows, Android, or older software. Our <strong>HEIC to JPG
                            Converter</strong> solves this problem instantly.
                    </p>
                    <p>
                        We use advanced local processing capabilities to convert your photos without ever uploading them to
                        a cloud server. This is the <strong>safest way</strong> to convert personal photos.
                    </p>
                </div>

                <!-- Features Grid -->
                <div class="grid md:grid-cols-3 gap-8 mb-16 not-prose">
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center">
                        <div
                            class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">100% Private</h3>
                        <p class="text-sm text-gray-600">Your personal photos stay on your device. We use client-side logic
                            for zero-risk conversion.</p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center">
                        <div
                            class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">Broad Compatibility</h3>
                        <p class="text-sm text-gray-600">Convert HEIC and HEIF files from any iOS version (iPhone/iPad) to
                            universally accepted JPGs.</p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center">
                        <div
                            class="w-12 h-12 bg-sky-100 text-sky-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">Fast & Free</h3>
                        <p class="text-sm text-gray-600">No software installation needed. Just drag, drop, and convert in
                            seconds.</p>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-12">
                    <div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-900">How to Convert HEIC to JPG?</h3>
                        <ol class="list-decimal pl-5 space-y-2 text-gray-600">
                            <li><strong>Upload:</strong> Drag your .heic or .heif file into the upload zone.</li>
                            <li><strong>Process:</strong> The tool will automatically read and convert the file using
                                advanced browser libraries.</li>
                            <li><strong>Preview:</strong> See a preview of your converted JPG image immediately.</li>
                            <li><strong>Download:</strong> Click the "Download JPG Image" button to save it to your
                                computer.</li>
                        </ol>
                    </div>
                    <div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-900">Technical Details</h3>
                        <p class="text-gray-600 mb-4">
                            HEIC (High Efficiency Image Container) uses modern compression methods to keep file sizes small.
                            However, Windows and Android often struggle to open them.
                        </p>
                        <p class="text-gray-600">
                            Our tool decodes the HEIC data and re-encodes it as a standardized JPEG image with 90% quality
                            retention, ensuring your photos look great while being accessible everywhere.
                        </p>
                    </div>
                </div>

                <hr class="my-12 border-gray-200">

                <div>
                    <h3 class="font-bold text-2xl mb-6 text-center text-gray-900">Common Questions</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h4 class="font-bold text-lg mb-2 text-gray-800">Can I convert iPhone Live Photos?</h4>
                            <p class="text-gray-600 text-sm">You can convert the still image part of the Live Photo if you
                                transfer the .HEIC file to your computer first.</p>
                        </div>
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h4 class="font-bold text-lg mb-2 text-gray-800">Is quality lost during conversion?</h4>
                            <p class="text-gray-600 text-sm">We use a high-quality setting (0.9 out of 1.0) to ensure
                                minimal visual difference. JPG is a lossy format, but the difference is usually negligible
                                to the human eye.</p>
                        </div>
                    </div>
                </div>
            </article>
        </div>

        <!-- Load heic2any Library -->
        <script src="https://unpkg.com/heic2any"></script>

        <script>
            const imageInput = document.getElementById('imageInput');
            const dropZone = document.getElementById('dropZone');
            const editorArea = document.getElementById('editorArea');
            const loadingIndicator = document.getElementById('loadingIndicator');
            const imagePreview = document.getElementById('imagePreview');
            const downloadBtn = document.getElementById('downloadBtn');
            let currentBlobUrl = null;

            // Drag & Drop
            dropZone.addEventListener('dragover', (e) => { e.preventDefault(); dropZone.classList.add('border-indigo-500', 'bg-indigo-50'); });
            dropZone.addEventListener('dragleave', (e) => { e.preventDefault(); dropZone.classList.remove('border-indigo-500', 'bg-indigo-50'); });
            dropZone.addEventListener('drop', (e) => {
                e.preventDefault();
                dropZone.classList.remove('border-indigo-500', 'bg-indigo-50');
                if (e.dataTransfer.files[0]) processHeic(e.dataTransfer.files[0]);
            });

            imageInput.addEventListener('change', (e) => { if (e.target.files[0]) processHeic(e.target.files[0]); });

            function processHeic(file) {
                editorArea.classList.add('hidden');
                loadingIndicator.classList.remove('hidden');

                heic2any({
                    blob: file,
                    toType: "image/jpeg",
                    quality: 0.9
                })
                    .then(function (conversionResult) {
                        // conversionResult is a Blob
                        if (currentBlobUrl) URL.revokeObjectURL(currentBlobUrl);
                        currentBlobUrl = URL.createObjectURL(conversionResult);

                        imagePreview.src = currentBlobUrl;
                        loadingIndicator.classList.add('hidden');
                        editorArea.classList.remove('hidden');
                    })
                    .catch(function (e) {
                        loadingIndicator.classList.add('hidden');
                        showError('Error converting HEIC file: ' + e.message);
                        console.error(e);
                    });
            }

            downloadBtn.addEventListener('click', () => {
                if (!currentBlobUrl) return;
                const link = document.createElement('a');
                link.download = 'converted-image.jpg';
                link.href = currentBlobUrl;
                link.click();
            });
        </script>
@endsection