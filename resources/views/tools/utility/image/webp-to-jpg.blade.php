@extends('layouts.app')

@section('title', 'WEBP to JPG Converter - Convert WebP to JPG Online | Optimizo')
@section('meta_description', 'Convert WebP images to standard JPG format for broad compatibility. Free, fast, and secure converter.')
@section('meta_keywords', 'webp to jpg, convert webp, image converter, free webp to jpg')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" />

        <!-- Tool Interface -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-cyan-50 mb-12">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Upload WEBP Image</h2>
                <p class="text-gray-600">Drag & drop your WEBP file here</p>
            </div>

            <div id="dropZone"
                class="border-3 border-dashed border-cyan-200 rounded-2xl p-8 hover:border-cyan-400 hover:bg-cyan-50 transition-all cursor-pointer text-center relative group">
                <input type="file" id="imageInput" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                    accept="image/webp">
                <div class="space-y-4 pointer-events-none">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-cyan-100 text-cyan-600 rounded-full group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-bold text-gray-700">Drop WEBP file here</p>
                        <p class="text-sm text-gray-500">Supports WEBP (Max 10MB)</p>
                    </div>
                </div>
            </div>

            <div id="editorArea" class="hidden mt-8 grid md:grid-cols-2 gap-8">
                <!-- Left Column: Image Preview -->
                <div class="bg-gray-50 rounded-xl p-4 flex items-center justify-center border border-gray-200 h-[400px]">
                    <img id="imagePreview" class="max-h-full max-w-full object-contain rounded-lg shadow-sm" src=""
                        alt="Preview">
                </div>

                <!-- Right Column: Actions -->
                <div class="flex flex-col justify-center space-y-6">
                    <!-- White BG Note -->
                    <div class="bg-cyan-50 border border-cyan-200 rounded-lg p-4 text-sm text-cyan-700">
                        <span class="font-bold">Note:</span> Transparent backgrounds (common in WEBP) will be verified to
                        white.
                    </div>

                    <div class="text-center text-gray-600 font-medium">
                        Output Format: <span class="font-bold text-cyan-600">JPG</span>
                    </div>

                    <button id="convertBtn"
                        class="w-full bg-gradient-to-r from-cyan-500 to-teal-500 hover:from-cyan-600 hover:to-teal-600 text-white font-bold py-4 rounded-xl shadow-lg transform hover:scale-[1.01] transition-all flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Convert to JPG & Download
                    </button>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="mt-12 mb-20 max-w-7xl mx-auto">
            <article
                class="prose prose-lg prose-cyan max-w-none bg-white rounded-3xl p-8 md:p-12 shadow-xl border border-gray-100">
                <h2 class="text-3xl font-black text-gray-900 mb-6 text-center">WebP to JPG: The Compatibility Fixer</h2>
                <div class="text-gray-600 text-center mb-12">
                    <p class="mb-4">
                        WebP is fantastic for website speed, but it's a pain when you try to open it in Photoshop, older
                        image viewers, or upload it to platforms that only accept JPG.
                    </p>
                    <p>
                        Our <strong>WebP to JPG Converter</strong> bridges this gap. It takes your highly optimized WebP
                        images and transforms them into the universally compatible JPEG format in milliseconds.
                    </p>
                </div>

                <!-- Features Grid -->
                <div class="grid md:grid-cols-3 gap-8 mb-16 not-prose">
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center">
                        <div
                            class="w-12 h-12 bg-cyan-100 text-cyan-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">Universal Support</h3>
                        <p class="text-sm text-gray-600">JPG works everywhere: Word docs, PowerPoint, legacy software, and
                            every social media platform.</p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center">
                        <div
                            class="w-12 h-12 bg-teal-100 text-teal-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">Secure Processing</h3>
                        <p class="text-sm text-gray-600">We don't see your files. The conversion is performed locally by
                            your web browser.</p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center">
                        <div
                            class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">Smart Backgrounds</h3>
                        <p class="text-sm text-gray-600">Automatically detects transparent pixels in WebP and fills them
                            with a clean white background.</p>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-12">
                    <div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-900">Step-by-Step Guide</h3>
                        <ol class="list-decimal pl-5 space-y-2 text-gray-600">
                            <li><strong>Select File:</strong> Click the box or drag your WebP image onto the page.</li>
                            <li><strong>Review:</strong> The tool will display a preview of your image.</li>
                            <li><strong>Convert:</strong> Click the "Convert to JPG" button. The system handles transparency
                                and compression automatically.</li>
                            <li><strong>Save:</strong> Your new .jpg file will download instantly.</li>
                        </ol>
                    </div>
                    <div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-900">Why Convert WebP?</h3>
                        <ul class="list-disc pl-5 space-y-2 text-gray-600">
                            <li><strong>Editing:</strong> Many desktop editors typically don't support WebP out of the box.
                            </li>
                            <li><strong>Email:</strong> Outlook and other email clients might not render WebP inline images
                                correctly.</li>
                            <li><strong>Printing:</strong> Print shops often require standard JPG or TIFF files.</li>
                        </ul>
                    </div>
                </div>

                <hr class="my-12 border-gray-200">

                <div>
                    <h3 class="font-bold text-2xl mb-6 text-center text-gray-900">FAQ</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h4 class="font-bold text-lg mb-2 text-gray-800">What happens to transparent backgrounds?</h4>
                            <p class="text-gray-600 text-sm">Since JPG doesn't support transparency, our tool replaces
                                transparent areas with white. This is perfect for product photos and logos.</p>
                        </div>
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h4 class="font-bold text-lg mb-2 text-gray-800">Is it safe?</h4>
                            <p class="text-gray-600 text-sm">Yes. Unlike other converters that upload your file to a server,
                                this tool runs 100% on your device. Your data remains private.</p>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>

    <script>
        const imageInput = document.getElementById('imageInput');
        const dropZone = document.getElementById('dropZone');
        const editorArea = document.getElementById('editorArea');
        const imagePreview = document.getElementById('imagePreview');
        const convertBtn = document.getElementById('convertBtn');

        // Drag & Drop
        dropZone.addEventListener('dragover', (e) => { e.preventDefault(); dropZone.classList.add('border-cyan-500', 'bg-cyan-50'); });
        dropZone.addEventListener('dragleave', (e) => { e.preventDefault(); dropZone.classList.remove('border-cyan-500', 'bg-cyan-50'); });
        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('border-cyan-500', 'bg-cyan-50');
            if (e.dataTransfer.files[0]) handleFile(e.dataTransfer.files[0]);
        });

        imageInput.addEventListener('change', (e) => { if (e.target.files[0]) handleFile(e.target.files[0]); });

        function handleFile(file) {
            if (!file.type.match('image.*')) { showError('Please upload a valid WEBP image'); return; }
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
                // White BG
                ctx.fillStyle = '#FFFFFF';
                ctx.fillRect(0, 0, canvas.width, canvas.height);
                ctx.drawImage(img, 0, 0);
                const dataUrl = canvas.toDataURL('image/jpeg', 0.9);
                const link = document.createElement('a');
                link.download = 'converted-image.jpg';
                link.href = dataUrl;
                link.click();
            };
        });
    </script>
@endsection