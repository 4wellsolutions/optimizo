@extends('layouts.app')

@section('title', 'JPG to WEBP Converter - Convert Images to WebP | Optimizo')
@section('meta_description', 'Convert JPG images to the modern WebP format for superior compression and web performance. Free online tool.')
@section('meta_keywords', 'jpg to webp, webp converter, image to webp, web optimization, free converter')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-orange-500 via-amber-500 to-yellow-500 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

            <div class="relative z-10">
                <div class="text-center mb-6">
                    <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                        <svg class="w-9 h-9 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">
                        JPG to WEBP Converter
                    </h1>
                    <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                        Convert universal JPGs to next-gen WebP format. Reduce internet bandwidth usage instantly.
                    </p>
                </div>
                @include('components.hero-actions')
            </div>
        </div>

        <!-- Tool Interface -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-orange-50 mb-12">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Upload JPG Image</h2>
                <p class="text-gray-600">Drag & drop your JPG file here</p>
            </div>

            <div id="dropZone"
                class="border-3 border-dashed border-orange-200 rounded-2xl p-8 hover:border-orange-400 hover:bg-orange-50 transition-all cursor-pointer text-center relative group">
                <input type="file" id="imageInput" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                    accept="image/jpeg, image/jpg">
                <div class="space-y-4 pointer-events-none">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-orange-100 text-orange-600 rounded-full group-hover:scale-110 transition-transform">
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

            <div id="editorArea" class="hidden mt-8 grid md:grid-cols-2 gap-8">
                <!-- Left Column: Image Preview -->
                <div class="bg-gray-50 rounded-xl p-4 flex items-center justify-center border border-gray-200 h-[400px]">
                    <img id="imagePreview" class="max-h-full max-w-full object-contain rounded-lg shadow-sm" src=""
                        alt="Preview">
                </div>

                <!-- Right Column: Actions -->
                <div class="flex flex-col justify-center space-y-6">
                    <div class="text-center text-gray-600 font-medium">
                        Output Format: <span class="font-bold text-orange-600">WEBP</span>
                    </div>

                    <div class="w-full">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Compression Quality</label>
                        <div class="flex items-center gap-4">
                            <input type="range" id="qualityRange" min="0.1" max="1.0" step="0.1" value="0.8"
                                class="w-full h-2 bg-orange-200 rounded-lg appearance-none cursor-pointer">
                            <span id="qualityValue" class="text-sm font-bold text-orange-600 w-12">80%</span>
                        </div>
                    </div>

                    <button id="convertBtn"
                        class="w-full bg-gradient-to-r from-orange-500 to-amber-500 hover:from-orange-600 hover:to-amber-600 text-white font-bold py-4 rounded-xl shadow-lg transform hover:scale-[1.01] transition-all flex items-center justify-center gap-2">
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
        <div class="bg-white rounded-3xl p-8 md:p-12 shadow-xl border border-gray-100 mb-12">
            <article class="prose prose-lg prose-blue max-w-none">
                <h2 class="text-3xl font-black text-gray-900 mb-6 text-center">Convert JPG to WebP for Better Performance
                </h2>
                <div class="text-gray-600 text-center mb-12">
                    <p class="mb-4">
                        WebP is a modern image format that provides superior lossless and lossy compression for images on
                        the
                        web. By converting JPG to WebP, developers and webmasters can create smaller, richer images that
                        make the web faster.
                    </p>
                    <p>
                        Our <strong>JPG to WebP Converter</strong> helps you optimize your images instantly in the browser,
                        reducing file size by up to 30% compared to JPEG without standard quality loss.
                    </p>
                </div>

                <!-- Features Grid -->
                <div class="grid md:grid-cols-3 gap-8 mb-16 not-prose">
                    <div class="bg-blue-50 p-6 rounded-2xl border border-blue-100 text-center">
                        <div
                            class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">Faster Loading</h3>
                        <p class="text-sm text-gray-600">WebP images are significantly smaller than JPGs, helping your
                            website load faster and improving SEO scores.</p>
                    </div>
                    <div class="bg-blue-50 p-6 rounded-2xl border border-blue-100 text-center">
                        <div
                            class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">High Quality</h3>
                        <p class="text-sm text-gray-600">Maintain visual fidelity while reducing file weight. Perfect for
                            photographs and complex web graphics.</p>
                    </div>
                    <div class="bg-blue-50 p-6 rounded-2xl border border-blue-100 text-center">
                        <div
                            class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">Secure Processing</h3>
                        <p class="text-sm text-gray-600">All conversions happen locally. Your sensitive images never leave
                            your computer.</p>
                    </div>
                </div>

                <!-- How-to and FAQ Guide -->
                <div class="grid md:grid-cols-2 gap-12">
                    <div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-900">How to Convert JPG to WebP</h3>
                        <ol class="list-decimal pl-5 space-y-3 text-gray-600">
                            <li><strong>Upload:</strong> Select or drag & drop your JPG image.</li>
                            <li><strong>Adjust:</strong> Use the quality slider to balance size vs quality.</li>
                            <li><strong>Preview:</strong> See the result in real-time.</li>
                            <li><strong>Download:</strong> Save your optimized WebP image.</li>
                        </ol>
                    </div>
                    <div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-900">Frequently Asked Questions</h3>
                        <div class="space-y-4">
                            <div>
                                <h4 class="font-bold text-lg text-gray-800">Do all browsers support WebP?</h4>
                                <p class="text-gray-600 text-sm">Yes, all modern browsers (Chrome, Firefox, Safari, Edge)
                                    fully support WebP images.</p>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg text-gray-800">Is WebP better for SEO?</h4>
                                <p class="text-gray-600 text-sm">Absolutely. Google prefers WebP because it loads faster,
                                    improving your Core Web Vitals score.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
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
            dropZone.addEventListener('dragover', (e) => { e.preventDefault(); dropZone.classList.add('border-orange-500', 'bg-orange-50'); });
            dropZone.addEventListener('dragleave', (e) => { e.preventDefault(); dropZone.classList.remove('border-orange-500', 'bg-orange-50'); });
            dropZone.addEventListener('drop', (e) => {
                e.preventDefault();
                dropZone.classList.remove('border-orange-500', 'bg-orange-50');
                if (e.dataTransfer.files[0]) handleFile(e.dataTransfer.files[0]);
            });

            imageInput.addEventListener('change', (e) => { if (e.target.files[0]) handleFile(e.target.files[0]); });

            qualityRange.addEventListener('input', (e) => { qualityValue.innerText = Math.round(e.target.value * 100) + '%'; });

            function handleFile(file) {
                if (!file.type.match('image.*')) { alert('Please upload a valid JPG image'); return; }
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