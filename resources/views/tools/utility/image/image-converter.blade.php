@extends('layouts.app')

@section('title', 'Image Converter - Convert Images Online Free | Optimizo')
@section('meta_description', 'Convert images between multiple formats (PNG, JPG, WEBP) easily and for free. Secure, client-side conversion requiring no uploads.')
@section('meta_keywords', 'image converter, png to jpg, jpg to png, webp converter, free image tool')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" />

        <!-- Tool Interface -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-indigo-50 mb-12">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Upload Your Image</h2>
                <p class="text-gray-600">Drag & drop or click to select an image</p>
            </div>

            <!-- Upload Area -->
            <div id="dropZone"
                class="border-3 border-dashed border-indigo-200 rounded-2xl p-8 hover:border-indigo-400 hover:bg-indigo-50 transition-all cursor-pointer text-center relative group">
                <input type="file" id="imageInput" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                    accept="image/png, image/jpeg, image/webp">
                <div class="space-y-4 pointer-events-none">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-indigo-100 text-indigo-600 rounded-full group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-bold text-gray-700">Drop your image here</p>
                        <p class="text-sm text-gray-500">Supports PNG, JPG, WEBP (Max 10MB)</p>
                    </div>
                </div>
            </div>

            <!-- Controls & Preview (Hidden initially) -->
            <div id="editorArea" class="hidden mt-8 grid md:grid-cols-2 gap-8">
                <!-- Left Column: Image Preview -->
                <div class="bg-gray-50 rounded-xl p-4 flex items-center justify-center border border-gray-200 h-[400px]">
                    <img id="imagePreview" class="max-h-full max-w-full object-contain rounded-lg shadow-sm" src=""
                        alt="Preview">
                </div>

                <!-- Right Column: Controls -->
                <div class="space-y-6">
                    <!-- Settings -->
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 space-y-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Target Format</label>
                            <select id="formatSelect"
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm text-gray-700 font-medium p-3">
                                <option value="image/png">PNG</option>
                                <option value="image/jpeg">JPG</option>
                                <option value="image/webp">WEBP</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Quality (JPG/WEBP)</label>
                            <div class="flex items-center gap-4">
                                <input type="range" id="qualityRange" min="0.1" max="1.0" step="0.1" value="0.9"
                                    class="w-full h-2 bg-indigo-200 rounded-lg appearance-none cursor-pointer">
                                <span id="qualityValue" class="text-sm font-bold text-indigo-600 w-12">90%</span>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <button id="convertBtn"
                        class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-bold py-4 rounded-xl shadow-lg transform hover:scale-[1.01] transition-all flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Convert & Download
                    </button>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="mt-12 mb-20 max-w-7xl mx-auto">
            <article
                class="prose prose-lg prose-indigo max-w-none bg-white rounded-3xl p-8 md:p-12 shadow-xl border border-gray-100">
                <h2 class="text-3xl font-black text-gray-900 mb-6 text-center">The Ultimate Free Online Image Converter</h2>
                <div class="text-gray-600 text-center mb-12">
                    <p class="mb-4">
                        In today's digital landscape, working with images requires versatility. Whether you're a web
                        developer needing WEBP for performance, a designer needing PNG for transparency, or a photographer
                        needing universal JPG compatibility, our <strong>Image Converter</strong> is the all-in-one
                        solution.
                    </p>
                    <p>
                        Forget about installing heavy software or uploading your private photos to unknown servers. Our tool
                        runs entirely in your browser, ensuring <strong>100% privacy and lightning-fast speeds</strong>.
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
                        <h3 class="font-bold text-xl mb-2 text-gray-900">Secure & Private</h3>
                        <p class="text-sm text-gray-600">Your files never leave your device. All processing happens locally
                            in your browser.</p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center">
                        <div
                            class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">Instant Conversion</h3>
                        <p class="text-sm text-gray-600">No queuing or waiting. Powered by modern WebAssembly technology for
                            speed.</p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center">
                        <div
                            class="w-12 h-12 bg-pink-100 text-pink-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">Bulk Processing</h3>
                        <p class="text-sm text-gray-600">Convert unlimited images one by one without any usage restrictions
                            or costs.</p>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-12">
                    <div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-900">How to Convert Images?</h3>
                        <ol class="list-decimal pl-5 space-y-2 text-gray-600">
                            <li><strong>Select or Drop:</strong> Drag your image file into the blue box or click to select
                                from your device.</li>
                            <li><strong>Choose Format:</strong> Select your desired output format (PNG, JPG, or WEBP) from
                                the dropdown.</li>
                            <li><strong>Adjust Quality:</strong> If choosing JPG or WEBP, use the slider to balance file
                                size and quality.</li>
                            <li><strong>Download:</strong> Click the "Convert & Download" button to save your formatted
                                image instantly.</li>
                        </ol>
                    </div>
                    <div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-900">Key Features</h3>
                        <ul class="list-disc pl-5 space-y-2 text-gray-600">
                            <li><strong>Cross-Format Support:</strong> Effortlessly switch between PNG, JPG, and WEBP.</li>
                            <li><strong>Transparency Control:</strong> PNG conversions preserve transparency, while JPG
                                fills it with a white background.</li>
                            <li><strong>Responsive:</strong> Works perfectly on Desktops, Tablets, and Mobile phones.</li>
                            <li><strong>No Limits:</strong> No file size limits and no daily conversion caps.</li>
                        </ul>
                    </div>
                </div>

                <hr class="my-12 border-gray-200">

                <div>
                    <h3 class="font-bold text-2xl mb-6 text-center text-gray-900">Frequently Asked Questions</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h4 class="font-bold text-lg mb-2 text-gray-800">Is this tool free?</h4>
                            <p class="text-gray-600 text-sm">Yes, absolutely. We don't charge anything, and there are no
                                hidden premium features.</p>
                        </div>
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h4 class="font-bold text-lg mb-2 text-gray-800">Does it support transparency?</h4>
                            <p class="text-gray-600 text-sm">Yes! If you convert to PNG or WEBP, transparency is preserved.
                                For JPG, transparent areas become white.</p>
                        </div>
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h4 class="font-bold text-lg mb-2 text-gray-800">Are my images uploaded?</h4>
                            <p class="text-gray-600 text-sm">No. All conversion logic runs in your own browser using
                                JavaScript and Canvas APIs. We count privacy as our top feature.</p>
                        </div>
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h4 class="font-bold text-lg mb-2 text-gray-800">What is the best format?</h4>
                            <p class="text-gray-600 text-sm">Use <strong>JPG</strong> for photos, <strong>PNG</strong> for
                                graphics with sharp edges/transparency, and <strong>WEBP</strong> for web performance.</p>
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
        const qualityRange = document.getElementById('qualityRange');
        const qualityValue = document.getElementById('qualityValue');
        const convertBtn = document.getElementById('convertBtn');
        const formatSelect = document.getElementById('formatSelect');

        // Drag & Drop
        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.classList.add('border-indigo-500', 'bg-indigo-50');
        });

        dropZone.addEventListener('dragleave', (e) => {
            e.preventDefault();
            dropZone.classList.remove('border-indigo-500', 'bg-indigo-50');
        });

        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('border-indigo-500', 'bg-indigo-50');
            const file = e.dataTransfer.files[0];
            if (file) handleFile(file);
        });

        imageInput.addEventListener('change', (e) => {
            if (e.target.files[0]) handleFile(e.target.files[0]);
        });

        // Quality Slider
        qualityRange.addEventListener('input', (e) => {
            qualityValue.innerText = Math.round(e.target.value * 100) + '%';
        });

        function handleFile(file) {
            if (!file.type.match('image.*')) {
                showError('Please upload a valid image file');
                return;
            }

            const reader = new FileReader();
            reader.onload = (e) => {
                imagePreview.src = e.target.result;
                editorArea.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }

        // Convert Logic
        convertBtn.addEventListener('click', () => {
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');
            const img = new Image();

            img.src = imagePreview.src;

            img.onload = () => {
                canvas.width = img.width;
                canvas.height = img.height;
                ctx.drawImage(img, 0, 0);

                const format = formatSelect.value;
                const quality = parseFloat(qualityRange.value);
                const dataUrl = canvas.toDataURL(format, quality);

                // Download
                const link = document.createElement('a');
                link.download = 'converted-image.' + format.split('/')[1];
                link.href = dataUrl;
                link.click();
            };
        });
    </script>
@endsection