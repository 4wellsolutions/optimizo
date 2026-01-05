@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-4xl mx-auto">
        <x-tool-hero :tool="$tool" icon="image-compressor" />

        <!-- Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-cyan-200 mb-8">
            <!-- Modern Drag & Drop Upload Section -->
            <div class="mb-6">
                <label class="form-label text-base mb-3">Upload Image</label>
                <div id="dropZone"
                    class="relative border-3 border-dashed border-purple-300 rounded-2xl p-8 md:p-12 text-center bg-gradient-to-br from-purple-50 to-pink-50 hover:from-purple-100 hover:to-pink-100 transition-all duration-300 cursor-pointer group">
                    <input type="file" id="imageInput" accept="image/*" class="hidden" onchange="handleImageUpload(event)">

                    <!-- Upload Icon -->
                    <div class="mb-4">
                        <svg class="w-16 h-16 mx-auto text-purple-400 group-hover:text-purple-600 transition-colors"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                    </div>

                    <!-- Upload Text -->
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Drop your image here</h3>
                    <p class="text-gray-600 mb-4">or click to browse</p>

                    <!-- Supported Formats -->
                    <div class="flex items-center justify-center gap-2 text-sm text-gray-500">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Supports JPG, PNG, WebP formats</span>
                    </div>
                </div>
            </div>

            <script>
                // Drag and drop functionality
                const dropZone = document.getElementById('dropZone');
                const fileInput = document.getElementById('imageInput');

                dropZone.addEventListener('click', () => fileInput.click());

                dropZone.addEventListener('dragover', (e) => {
                    e.preventDefault();
                    dropZone.classList.add('border-purple-500', 'bg-purple-100');
                });

                dropZone.addEventListener('dragleave', () => {
                    dropZone.classList.remove('border-purple-500', 'bg-purple-100');
                });

                dropZone.addEventListener('drop', (e) => {
                    e.preventDefault();
                    dropZone.classList.remove('border-purple-500', 'bg-purple-100');

                    const files = e.dataTransfer.files;
                    if (files.length > 0) {
                        fileInput.files = files;
                        handleImageUpload({ target: fileInput });
                    }
                });
            </script>

            <!-- Quality Slider -->
            <div id="qualityControl" class="hidden mb-6">
                <label class="form-label text-base">Compression Quality: <span id="qualityValue">80</span>%</label>
                <input type="range" id="qualitySlider" min="10" max="100" value="80" class="w-full"
                    oninput="updateQuality(this.value)">
            </div>

            <!-- Preview -->
            <div id="preview" class="hidden">
                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">Original</h3>
                        <div class="border-2 border-gray-200 rounded-xl p-4 bg-gray-50">
                            <img id="originalImage" class="max-w-full h-auto rounded-lg mb-2">
                            <p class="text-sm text-gray-600">Size: <span id="originalSize" class="font-bold"></span></p>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">Compressed</h3>
                        <div class="border-2 border-cyan-200 rounded-xl p-4 bg-cyan-50">
                            <img id="compressedImage" class="max-w-full h-auto rounded-lg mb-2">
                            <p class="text-sm text-gray-600">Size: <span id="compressedSize" class="font-bold"></span></p>
                            <p class="text-sm text-green-600 font-bold">Saved: <span id="savedSize"></span></p>
                        </div>
                    </div>
                </div>

                <button onclick="downloadImage()" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    <span>Download Compressed Image</span>
                </button>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-cyan-50 to-blue-50 rounded-2xl p-6 md:p-8 border-2 border-cyan-100 shadow-xl">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Free Online Image Compressor - Reduce Image File Size</h2>
            <p class="text-gray-700 leading-relaxed text-lg mb-6">
                Compress images online for free without losing quality using our advanced image compression tool. Reduce
                image file sizes by up to 90% for faster website loading, easier sharing, lower storage costs, and improved
                SEO. Supports JPG, PNG, and WebP formats with adjustable quality control. All compression happens
                client-side in your browser - your images never leave your device, ensuring complete privacy and security.
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Why Compress Images?</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6 leading-relaxed">
                <li><strong>Faster Website Loading:</strong> Compressed images load 3-5x faster, improving user experience
                    and SEO rankings</li>
                <li><strong>Reduced Bandwidth:</strong> Save on hosting costs and data transfer fees</li>
                <li><strong>Better Mobile Experience:</strong> Smaller images load faster on mobile networks</li>
                <li><strong>Improved SEO:</strong> Google prioritizes fast-loading websites in search results</li>
                <li><strong>Storage Savings:</strong> Store more images in the same space</li>
                <li><strong>Easier Sharing:</strong> Send images via email and messaging apps faster</li>
                <li><strong>Social Media Optimization:</strong> Meet platform size requirements without quality loss</li>
            </ul>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Supported Image Formats</h3>
            <div class="grid md:grid-cols-3 gap-4 mb-6">
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-cyan-900 mb-2">📷 JPG/JPEG</h4>
                    <p class="text-gray-700 text-sm mb-2">Best for photographs and complex images with many colors</p>
                    <p class="text-gray-700 text-sm"><strong>Compression:</strong> Lossy, up to 90% size reduction</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-blue-900 mb-2">🖼️ PNG</h4>
                    <p class="text-gray-700 text-sm mb-2">Best for graphics, logos, and images with transparency</p>
                    <p class="text-gray-700 text-sm"><strong>Compression:</strong> Lossless or lossy, maintains transparency
                    </p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-indigo-900 mb-2">🌐 WebP</h4>
                    <p class="text-gray-700 text-sm mb-2">Modern format with superior compression and quality</p>
                    <p class="text-gray-700 text-sm"><strong>Compression:</strong> 25-35% smaller than JPG/PNG</p>
                </div>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Compression Quality Guide</h3>
            <div class="bg-white rounded-lg p-4 border-2 border-gray-200 mb-6">
                <ul class="space-y-2 text-gray-700">
                    <li><strong>90-100% Quality:</strong> Minimal compression, nearly identical to original (use for print)
                    </li>
                    <li><strong>80-90% Quality:</strong> Excellent balance of quality and file size (recommended for web)
                    </li>
                    <li><strong>70-80% Quality:</strong> Good quality with significant size reduction (social media)</li>
                    <li><strong>50-70% Quality:</strong> Noticeable quality loss but very small files (thumbnails)</li>
                    <li><strong>Below 50%:</strong> Poor quality, only for extreme size reduction needs</li>
                </ul>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">How Image Compression Works</h3>
            <p class="text-gray-700 leading-relaxed mb-4">
                Our tool uses advanced compression algorithms to reduce image file sizes while preserving visual quality.
                For JPG images, we use lossy compression that removes imperceptible details. For PNG images, we optimize
                color palettes and remove metadata. All processing happens in your browser using HTML5 Canvas API - no
                server uploads required, ensuring your images remain private.
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Best Practices for Image Compression</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6 leading-relaxed">
                <li>Start with high-quality source images for best compression results</li>
                <li>Use 80-85% quality for web images - perfect balance of quality and size</li>
                <li>Compress images before uploading to websites or social media</li>
                <li>Choose JPG for photos, PNG for graphics with transparency</li>
                <li>Resize images to actual display dimensions before compressing</li>
                <li>Test different quality levels to find optimal compression</li>
                <li>Keep original files backed up before compression</li>
                <li>Use WebP format for modern browsers (best compression)</li>
            </ul>

            <div class="bg-green-50 border-2 border-green-200 rounded-xl p-6 mb-6">
                <h4 class="font-bold text-green-900 mb-2 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    Privacy & Security
                </h4>
                <p class="text-green-800 text-sm leading-relaxed">
                    Your images are processed entirely in your browser using JavaScript. No files are uploaded to our
                    servers. Your images never leave your device, ensuring complete privacy and security. This also means
                    faster processing and no file size limits.
                </p>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">Does compression reduce image quality?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes, but at 80-90% quality, the difference is imperceptible to
                        human eyes. Our tool lets you adjust quality to find the perfect balance between file size and
                        visual quality.</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">Are my images uploaded to your server?</h4>
                    <p class="text-gray-700 leading-relaxed">No! All compression happens in your browser using JavaScript.
                        Your images never leave your device, ensuring complete privacy and security.</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">What's the maximum file size I can compress?</h4>
                    <p class="text-gray-700 leading-relaxed">Since processing happens in your browser, there's no strict
                        limit. However, very large images (>50MB) may slow down your browser. For best performance, use
                        images under 20MB.</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">Can I compress multiple images at once?</h4>
                    <p class="text-gray-700 leading-relaxed">Currently, our tool processes one image at a time for optimal
                        quality control. You can compress multiple images by repeating the process for each file.</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">Which format should I use - JPG or PNG?</h4>
                    <p class="text-gray-700 leading-relaxed">Use JPG for photographs and images with many colors. Use PNG
                        for graphics, logos, screenshots, and images requiring transparency. WebP offers best compression
                        for both types.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        let originalFile = null;
        let compressedBlob = null;

        function handleImageUpload(event) {
            const file = event.target.files[0];
            if (!file) return;

            originalFile = file;
            const reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById('originalImage').src = e.target.result;
                document.getElementById('originalSize').textContent = formatFileSize(file.size);
                document.getElementById('qualityControl').classList.remove('hidden');
                compressImage(e.target.result, 80);
            };

            reader.readAsDataURL(file);
        }

        function updateQuality(value) {
            document.getElementById('qualityValue').textContent = value;
            const originalSrc = document.getElementById('originalImage').src;
            if (originalSrc) {
                compressImage(originalSrc, value);
            }
        }

        function compressImage(src, quality) {
            const img = new Image();
            img.onload = function () {
                const canvas = document.createElement('canvas');
                canvas.width = img.width;
                canvas.height = img.height;

                const ctx = canvas.getContext('2d');
                ctx.drawImage(img, 0, 0);

                canvas.toBlob(function (blob) {
                    compressedBlob = blob;
                    const url = URL.createObjectURL(blob);
                    document.getElementById('compressedImage').src = url;
                    document.getElementById('compressedSize').textContent = formatFileSize(blob.size);

                    const saved = originalFile.size - blob.size;
                    const savedPercent = ((saved / originalFile.size) * 100).toFixed(1);
                    document.getElementById('savedSize').textContent = `${formatFileSize(saved)} (${savedPercent}%)`;

                    document.getElementById('preview').classList.remove('hidden');
                }, 'image/jpeg', quality / 100);
            };
            img.src = src;
        }

        function formatFileSize(bytes) {
            if (bytes < 1024) return bytes + ' B';
            if (bytes < 1048576) return (bytes / 1024).toFixed(2) + ' KB';
            return (bytes / 1048576).toFixed(2) + ' MB';
        }

        function downloadImage() {
            if (!compressedBlob) return;

            const url = URL.createObjectURL(compressedBlob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'compressed-' + (originalFile.name || 'image.jpg');
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        }
    </script>
@endsection