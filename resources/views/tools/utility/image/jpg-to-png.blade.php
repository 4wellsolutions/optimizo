@extends('layouts.app')

@section('title', 'JPG to PNG Converter - Convert JPG Images to PNG Free | Optimizo')
@section('meta_description', 'Convert JPG images to PNG format instantly. 100% free, secure client-side conversion, no file size limits.')
@section('meta_keywords', 'jpg to png, jpg converter, convert image to png, free image converter')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" />

        <!-- Tool Interface -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-indigo-50 mb-12">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Upload JPG Image</h2>
                <p class="text-gray-600">Drag & drop your JPG/JPEG file here</p>
            </div>

            <!-- Upload Area -->
            <div id="dropZone"
                class="border-3 border-dashed border-blue-200 rounded-2xl p-8 hover:border-blue-400 hover:bg-blue-50 transition-all cursor-pointer text-center relative group">
                <input type="file" id="imageInput" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                    accept="image/jpeg, image/jpg">
                <div class="space-y-4 pointer-events-none">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 text-blue-600 rounded-full group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-bold text-gray-700">Drop JPG file here</p>
                        <p class="text-sm text-gray-500">Supports JPG, JPEG (Max 10MB)</p>
                    </div>
                </div>
            </div>

            <!-- Controls (Values hidden as fixed) -->
            <input type="hidden" id="formatSelect" value="image/png">
            <input type="hidden" id="qualityRange" value="1.0">

            <!-- Preview & Actions -->
            <div id="editorArea" class="hidden mt-8 grid md:grid-cols-2 gap-8">
                <!-- Left Column: Image Preview -->
                <div class="bg-gray-50 rounded-xl p-4 flex items-center justify-center border border-gray-200 h-[400px]">
                    <img id="imagePreview" class="max-h-full max-w-full object-contain rounded-lg shadow-sm" src=""
                        alt="Preview">
                </div>

                <!-- Right Column: Actions -->
                <div class="flex flex-col justify-center space-y-6">
                    <div class="text-center text-gray-600 font-medium">
                        Output Format: <span class="font-bold text-blue-600">PNG</span>
                    </div>

                    <button id="convertBtn"
                        class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold py-4 rounded-xl shadow-lg transform hover:scale-[1.01] transition-all flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Convert to PNG & Download
                    </button>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-white rounded-3xl p-8 md:p-12 shadow-xl border border-gray-100 mb-12">
            <article class="prose prose-lg prose-blue max-w-none">
                <h2 class="text-3xl font-black text-gray-900 mb-6 text-center">Convert JPG to PNG Instantly</h2>
                <div class="text-gray-600 text-center mb-12">
                    <p class="mb-4">
                        JPG is the world's most popular image format, but it often lacks the versatility needed for modern
                        web
                        design. By converting to PNG, you gain access to lossless compression and transparency support.
                    </p>
                    <p>
                        Our <strong>JPG to PNG Converter</strong> is designed for speed and privacy, handling everything
                        directly in your browser without uploading your sensitive photos to any server.
                    </p>
                </div>

                <!-- Features Grid -->
                <div class="grid md:grid-cols-3 gap-8 mb-16 not-prose">
                    <div class="bg-blue-50 p-6 rounded-2xl border border-blue-100 text-center">
                        <div
                            class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">Lossless Quality</h3>
                        <p class="text-sm text-gray-600">Stop image degradation. PNG uses lossless compression to keep every
                            pixel perfect during edits.</p>
                    </div>
                    <div class="bg-blue-50 p-6 rounded-2xl border border-blue-100 text-center">
                        <div
                            class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">100% Private</h3>
                        <p class="text-sm text-gray-600">Files are processed locally on your device. We never see, store, or
                            upload your images.</p>
                    </div>
                    <div class="bg-blue-50 p-6 rounded-2xl border border-blue-100 text-center">
                        <div
                            class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">Transparency Ready</h3>
                        <p class="text-sm text-gray-600">Convert to the preferred format for logos, icons, and graphics that
                            require transparent backgrounds.</p>
                    </div>
                </div>

                <!-- How-to and FAQ Guide -->
                <div class="grid md:grid-cols-2 gap-12">
                    <div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-900">How to Convert JPG to PNG</h3>
                        <ol class="list-decimal pl-5 space-y-3 text-gray-600">
                            <li><strong>Upload Image:</strong> Drag and drop your JPG file into the designated area.</li>
                            <li><strong>Auto-Process:</strong> The tool immediately reads the file ready for conversion.
                            </li>
                            <li><strong>Preview:</strong> See exactly how your image looks before saving.</li>
                            <li><strong>Download:</strong> Click "Convert & Download" to save your new PNG instantly.</li>
                        </ol>
                    </div>
                    <div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-900">Frequently Asked Questions</h3>
                        <div class="space-y-4">
                            <div>
                                <h4 class="font-bold text-lg text-gray-800">Is the quality better?</h4>
                                <p class="text-gray-600 text-sm">Converting to PNG stops <em>future</em> quality loss. It's
                                    best for images you plan to edit further or need to keep sharp.</p>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg text-gray-800">Are there file limits?</h4>
                                <p class="text-gray-600 text-sm">Since we process files in your browser, the limit is
                                    determined by your device's memory, usually allowing files up to 50MB easily.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>

    <!-- Reuse same script logic but simplified -->
    <script>
        const imageInput = document.getElementById('imageInput');
        const dropZone = document.getElementById('dropZone');
        const editorArea = document.getElementById('editorArea');
        const imagePreview = document.getElementById('imagePreview');
        const convertBtn = document.getElementById('convertBtn');

        // Drag & Drop
        dropZone.addEventListener('dragover', (e) => { e.preventDefault(); dropZone.classList.add('border-blue-500', 'bg-blue-50'); });
        dropZone.addEventListener('dragleave', (e) => { e.preventDefault(); dropZone.classList.remove('border-blue-500', 'bg-blue-50'); });
        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('border-blue-500', 'bg-blue-50');
            if (e.dataTransfer.files[0]) handleFile(e.dataTransfer.files[0]);
        });

        imageInput.addEventListener('change', (e) => { if (e.target.files[0]) handleFile(e.target.files[0]); });

        function handleFile(file) {
            if (!file.type.match('image.*')) { showError('Please upload a valid JPG image'); return; }
            const reader = new FileReader();
            reader.onload = (e) => { imagePreview.src = e.target.result; editorArea.classList.remove('hidden'); };
            reader.readAsDataURL(file);
        }

        convertBtn.addEventListener('click', () => {
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');
            const img = new Image();
            img.src = imagePreview.src;
            img.onload = () => {
                canvas.width = img.width;
                canvas.height = img.height;
                ctx.drawImage(img, 0, 0);
                const dataUrl = canvas.toDataURL('image/png');
                const link = document.createElement('a');
                link.download = 'converted-image.png';
                link.href = dataUrl;
                link.click();
            };
        });
    </script>
@endsection