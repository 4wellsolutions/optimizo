@extends('layouts.app')

@section('title', 'PNG to WEBP Converter - Compress PNG to WebP | Optimizo')
@section('meta_description', 'Convert PNG images to WebP to reduce file size while maintaining transparency. Enhance your website loading speed.')
@section('meta_keywords', 'png to webp, webp converter, compress png, free image converter')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" />

        <!-- Tool Interface -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-purple-50 mb-12">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Upload PNG Image</h2>
                <p class="text-gray-600">Drag & drop your PNG file here</p>
            </div>

            <div id="dropZone"
                class="border-3 border-dashed border-purple-200 rounded-2xl p-8 hover:border-purple-400 hover:bg-purple-50 transition-all cursor-pointer text-center relative group">
                <input type="file" id="imageInput" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                    accept="image/png">
                <div class="space-y-4 pointer-events-none">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-purple-100 text-purple-600 rounded-full group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-bold text-gray-700">Drop PNG file here</p>
                        <p class="text-sm text-gray-500">Supports PNG (Max 10MB)</p>
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
                    <div class="text-center text-gray-600 font-medium">
                        Output Format: <span class="font-bold text-purple-600">WEBP</span>
                    </div>

                    <div class="w-full">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Compression Quality</label>
                        <div class="flex items-center gap-4">
                            <input type="range" id="qualityRange" min="0.1" max="1.0" step="0.1" value="0.9"
                                class="w-full h-2 bg-purple-200 rounded-lg appearance-none cursor-pointer">
                            <span id="qualityValue" class="text-sm font-bold text-purple-600 w-12">90%</span>
                        </div>
                    </div>

                    <button id="convertBtn"
                        class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-bold py-4 rounded-xl shadow-lg transform hover:scale-[1.01] transition-all flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        Convert to WEBP & Download
                    </button>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="mt-12 mb-20 max-w-7xl mx-auto">
            <article
                class="prose prose-lg prose-purple max-w-none bg-white rounded-3xl p-8 md:p-12 shadow-xl border border-gray-100">
                <h2 class="text-3xl font-black text-gray-900 mb-6 text-center">Optimize Images with PNG to WebP</h2>
                <div class="text-gray-600 text-center mb-12">
                    <p class="mb-4">
                        Want faster website load times? Converting your PNGs to WebP is the #1 recommendation from Google
                        PageSpeed Insights.
                    </p>
                    <p>
                        Our tool compresses your PNG images into the modern WebP format, reducing file size by up to
                        <strong>30-50%</strong> while keeping the background transparent and the quality sharp.
                    </p>
                </div>

                <!-- Features Grid -->
                <div class="grid md:grid-cols-3 gap-8 mb-16 not-prose">
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center">
                        <div
                            class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">Significantly Smaller</h3>
                        <p class="text-sm text-gray-600">WebP offers superior compression. Save bandwidth and storage space
                            instantly.</p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center">
                        <div
                            class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">Transparency Kept</h3>
                        <p class="text-sm text-gray-600">Unlike converting to JPG, switching from PNG to WebP preserves your
                            alpha channel (background transparency).</p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center">
                        <div
                            class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">Adjustable Quality</h3>
                        <p class="text-sm text-gray-600">You control the balance. Choose 90% for high quality or 70% for
                            maximum savings.</p>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-12">
                    <div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-900">How to Convert?</h3>
                        <ol class="list-decimal pl-5 space-y-2 text-gray-600">
                            <li><strong>Upload PNG:</strong> Drag and drop your file.</li>
                            <li><strong>Set Quality:</strong> Use the slider. We recommend 80-90% for a good balance.</li>
                            <li><strong>Process:</strong> Click the "Convert" button.</li>
                            <li><strong>Download:</strong> Your lighter .webp file is ready.</li>
                        </ol>
                    </div>
                    <div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-900">Why WebP?</h3>
                        <p class="text-gray-600 mb-4">
                            WebP is a modern image format developed by Google.
                        </p>
                        <ul class="list-disc pl-5 space-y-2 text-gray-600">
                            <li><strong>SEO Boost:</strong> Faster sites rank better on Google.</li>
                            <li><strong>Mobile Friendly:</strong> Uses less data for mobile visitors.</li>
                            <li><strong>Support:</strong> Supported by Chrome, Firefox, Safari, Edge, and all modern
                                browsers.</li>
                        </ul>
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
        const qualityRange = document.getElementById('qualityRange');
        const qualityValue = document.getElementById('qualityValue');

        // Drag & Drop
        dropZone.addEventListener('dragover', (e) => { e.preventDefault(); dropZone.classList.add('border-purple-500', 'bg-purple-50'); });
        dropZone.addEventListener('dragleave', (e) => { e.preventDefault(); dropZone.classList.remove('border-purple-500', 'bg-purple-50'); });
        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('border-purple-500', 'bg-purple-50');
            if (e.dataTransfer.files[0]) handleFile(e.dataTransfer.files[0]);
        });

        imageInput.addEventListener('change', (e) => { if (e.target.files[0]) handleFile(e.target.files[0]); });
        qualityRange.addEventListener('input', (e) => { qualityValue.innerText = Math.round(e.target.value * 100) + '%'; });

        function handleFile(file) {
            if (!file.type.match('image.*')) { showError('Please upload a valid PNG image'); return; }
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
                const quality = parseFloat(qualityRange.value);
                const dataUrl = canvas.toDataURL('image/webp', quality);
                const link = document.createElement('a');
                link.download = 'converted-image.webp';
                link.href = dataUrl;
                link.click();
            };
        });
    </script>
@endsection