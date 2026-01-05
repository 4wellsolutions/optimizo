@extends('layouts.app')

@section('title', 'Image to Base64 Converter - Convert Image to String | Optimizo')
@section('meta_description', 'Convert images to Base64 encoded strings for embedding in HTML or CSS. Free online tool supporting PNG, JPG, GIF.')
@section('meta_keywords', 'image to base64, base64 encoder, image to string, embed image, data uri generator')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" />

        <!-- Tool Interface -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-gray-100 mb-12">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Upload Image</h2>
                <p class="text-gray-600">Drag & drop your image file here</p>
            </div>

            <div id="dropZone"
                class="border-3 border-dashed border-gray-300 rounded-2xl p-8 hover:border-gray-500 hover:bg-gray-50 transition-all cursor-pointer text-center relative group">
                <input type="file" id="imageInput" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                    accept="image/*">
                <div class="space-y-4 pointer-events-none">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 text-gray-600 rounded-full group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-bold text-gray-700">Drop image file here</p>
                        <p class="text-sm text-gray-500">Supports All Image Formats</p>
                    </div>
                </div>
            </div>

            <div id="editorArea" class="hidden mt-8 grid md:grid-cols-2 gap-8">
                <!-- Left Column: Image Preview -->
                <div class="bg-gray-50 rounded-xl p-4 flex items-center justify-center border border-gray-200 h-[400px]">
                    <img id="imagePreview" class="max-h-full max-w-full object-contain rounded-lg shadow-sm" src=""
                        alt="Preview">
                </div>

                <!-- Right Column: Output -->
                <div class="flex flex-col space-y-6">
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <label class="block text-sm font-bold text-gray-700">Base64 String</label>
                            <button id="copyBtn"
                                class="text-indigo-600 hover:text-indigo-800 font-bold text-sm flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                                </svg>
                                Copy to Clipboard
                            </button>
                        </div>
                        <textarea id="base64Output" readonly
                            class="w-full h-48 bg-gray-50 border-2 border-gray-200 rounded-xl p-4 font-mono text-sm text-gray-600 focus:border-gray-400 focus:ring-0 resize-none"></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <span class="block text-xs font-bold text-blue-600 uppercase mb-1">Character Count</span>
                            <span id="charCount" class="text-xl font-black text-gray-800">0</span>
                        </div>
                        <div class="bg-green-50 p-4 rounded-lg">
                            <span class="block text-xs font-bold text-green-600 uppercase mb-1">MIME Type</span>
                            <span id="mimeType" class="text-xl font-black text-gray-800">-</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="mt-12 mb-20 max-w-7xl mx-auto">
            <article
                class="prose prose-lg prose-slate max-w-none bg-white rounded-3xl p-8 md:p-12 shadow-xl border border-gray-100">
                <h2 class="text-3xl font-black text-gray-900 mb-6 text-center">Convert Image to Base64 String</h2>
                <div class="text-gray-600 text-center mb-12">
                    <p class="mb-4">
                        Developers and web designers often need to embed images directly into HTML or CSS files to reduce
                        HTTP requests.
                    </p>
                    <p>
                        Our <strong>Image to Base64 Converter</strong> encodes your image file into a long string of
                        characters that represents the binary data. You can paste this string straight into your code.
                    </p>
                </div>

                <!-- Features Grid -->
                <div class="grid md:grid-cols-3 gap-8 mb-16 not-prose">
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center">
                        <div
                            class="w-12 h-12 bg-gray-200 text-gray-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">Clipboard Ready</h3>
                        <p class="text-sm text-gray-600">One-click copy. We format the output for HTML (`&lt;img
                            src="..."&gt;`) or CSS (`background: url(...)`).</p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center">
                        <div
                            class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">Reduce Requests</h3>
                        <p class="text-sm text-gray-600">Embedding small icons and logos as Base64 eliminates the network
                            overhead of fetching external image files.</p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center">
                        <div
                            class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">Any Format</h3>
                        <p class="text-sm text-gray-600">Works with PNG, JPG, GIF, WEBP, SVG, and even ICO files.</p>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-12">
                    <div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-900">How to use?</h3>
                        <ol class="list-decimal pl-5 space-y-2 text-gray-600">
                            <li><strong>Upload:</strong> Select your image file.</li>
                            <li><strong>Generate:</strong> The tool immediately converts the file to a Data URI.</li>
                            <li><strong>Copy:</strong> Click "Copy to Clipboard" to grab the code.</li>
                            <li><strong>Paste:</strong> Insert it into your `src` attribute or CSS file.</li>
                        </ol>
                    </div>
                    <div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-900">When to use Base64?</h3>
                        <ul class="list-disc pl-5 space-y-2 text-gray-600">
                            <li><strong>Small Images:</strong> Best for icons, spinners, and small logos (under 10KB).</li>
                            <li><strong>Single-File Apps:</strong> When you need to bundle everything into one HTML file
                                (e.g., email templates).</li>
                            <li><strong>Offline Access:</strong> Ensures images load even without a network connection if
                                the HTML is saved locally.</li>
                        </ul>
                    </div>
                </div>
            </article>
        </div>

        <script>
            const imageInput = document.getElementById('imageInput');
            const dropZone = document.getElementById('dropZone');
            const editorArea = document.getElementById('editorArea');
            const imagePreview = document.getElementById('imagePreview');
            const base64Output = document.getElementById('base64Output');
            const charCount = document.getElementById('charCount');
            const mimeType = document.getElementById('mimeType');
            const copyBtn = document.getElementById('copyBtn');

            // Drag & Drop
            dropZone.addEventListener('dragover', (e) => { e.preventDefault(); dropZone.classList.add('border-gray-500', 'bg-gray-50'); });
            dropZone.addEventListener('dragleave', (e) => { e.preventDefault(); dropZone.classList.remove('border-gray-500', 'bg-gray-50'); });
            dropZone.addEventListener('drop', (e) => {
                e.preventDefault();
                dropZone.classList.remove('border-gray-500', 'bg-gray-50');
                if (e.dataTransfer.files[0]) handleFile(e.dataTransfer.files[0]);
            });

            imageInput.addEventListener('change', (e) => { if (e.target.files[0]) handleFile(e.target.files[0]); });

            function handleFile(file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    const result = e.target.result;
                    imagePreview.src = result;
                    base64Output.value = result;
                    charCount.innerText = result.length.toLocaleString();
                    mimeType.innerText = result.match(/:(.*?);/)[1];
                    editorArea.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }

            copyBtn.addEventListener('click', () => {
                base64Output.select();
                document.execCommand('copy');
                const originalText = copyBtn.innerHTML;
                copyBtn.innerText = 'Copied!';
                setTimeout(() => { copyBtn.innerHTML = originalText; }, 2000);
            });
        </script>
@endsection