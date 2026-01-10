@extends('layouts.app')

@section('title', 'SVG to JPG Converter - Vector to Raster Conversion | Optimizo')
@section('meta_description', 'Convert SVG vector files to JPG images online. Auto-fills transparent backgrounds with white for perfect JPG output.')
@section('meta_keywords', 'svg to jpg, vector converter, svg rasterize, free jpg tool')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" />

        <!-- Tool Interface -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-teal-50 mb-12">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Upload SVG File</h2>
                <p class="text-gray-600">Drag & drop your SVG file here</p>
            </div>

            <div id="dropZone"
                class="border-3 border-dashed border-teal-200 rounded-2xl p-8 hover:border-teal-400 hover:bg-teal-50 transition-all cursor-pointer text-center relative group">
                <input type="file" id="imageInput" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                    accept="image/svg+xml">
                <div class="space-y-4 pointer-events-none">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-teal-100 text-teal-600 rounded-full group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-bold text-gray-700">Drop SVG file here</p>
                        <p class="text-sm text-gray-500">Supports SVG, SVGZ (Max 10MB)</p>
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
                    <div class="bg-teal-50 border border-teal-200 rounded-lg p-4 text-sm text-teal-700">
                        <span class="font-bold">Note:</span> Transparent backgrounds will be filled with white color.
                    </div>

                    <div class="text-center text-gray-600 font-medium">
                        Output Format: <span class="font-bold text-teal-600">JPG</span>
                    </div>

                    <div class="w-full">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Resolution Multiplier (Scale)</label>
                        <select id="scaleSelect"
                            class="w-full rounded-lg border-gray-300 focus:border-teal-500 shadow-sm p-3">
                            <option value="1">1x (Original Size)</option>
                            <option value="2">2x (High Res)</option>
                            <option value="4">4x (Ultra Res)</option>
                        </select>
                    </div>

                    <button id="convertBtn"
                        class="w-full bg-gradient-to-r from-teal-600 to-green-600 hover:from-teal-700 hover:to-green-700 text-white font-bold py-4 rounded-xl shadow-lg transform hover:scale-[1.01] transition-all flex items-center justify-center gap-2">
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
                class="prose prose-lg prose-teal max-w-none bg-white rounded-3xl p-8 md:p-12 shadow-xl border border-gray-100">
                <h2 class="text-3xl font-black text-gray-900 mb-6 text-center">Convert SVG to JPG Format</h2>
                <div class="text-gray-600 text-center mb-12">
                    <p class="mb-4">
                        Need to use a logo in a document or on a website that doesn't accept vector files? Our <strong>SVG
                            to JPG Converter</strong> is the answer.
                    </p>
                    <p>
                        It creates a solid, high-compatibility image file from your vector source. We automatically handle
                        transparency by adding a clean white background, ensuring your graphic looks professional on any
                        medium.
                    </p>
                </div>

                <!-- Features Grid -->
                <div class="grid md:grid-cols-3 gap-8 mb-16 not-prose">
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center">
                        <div
                            class="w-12 h-12 bg-green-100 text-green-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">Maximum Compatibility</h3>
                        <p class="text-sm text-gray-600">JPG is opened by literally every digital device and software
                            created in the last 30 years.</p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center">
                        <div
                            class="w-12 h-12 bg-teal-100 text-teal-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">4x High Resolution</h3>
                        <p class="text-sm text-gray-600">Scale up your SVG before saving to ensure your JPG is sharp, not
                            blurry.</p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center">
                        <div
                            class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">Secure Client-Side</h3>
                        <p class="text-sm text-gray-600">Processing happens in your browser. We never see your files.</p>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-12">
                    <div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-900">Easy Instructions</h3>
                        <ol class="list-decimal pl-5 space-y-2 text-gray-600">
                            <li><strong>Upload SVG:</strong> Click "Upload" or drag your file to the center box.</li>
                            <li><strong>Set Resolution:</strong> Choose a scaling factor (e.g., 2x or 4x) for higher quality
                                results.</li>
                            <li><strong>Preview:</strong> Observe the image. Note that transparent backgrounds are now
                                white.</li>
                            <li><strong>Save:</strong> Click "Convert to JPG & Download".</li>
                        </ol>
                    </div>
                    <div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-900">Why choose JPG over PNG for Vectors?</h3>
                        <p class="text-gray-600 mb-4">
                            While PNG supports transparency, JPG generates smaller file sizes for complex, colorful images.
                        </p>
                        <ul class="list-disc pl-5 space-y-2 text-gray-600">
                            <li><strong>Smaller Files:</strong> Better for emails and attachments.</li>
                            <li><strong>No Transparency Issues:</strong> Some viewers render transparency as black. JPG
                                forces a white background, ensuring your logo is legible.</li>
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
            const convertBtn = document.getElementById('convertBtn');
            const scaleSelect = document.getElementById('scaleSelect');

            // Drag & Drop
            dropZone.addEventListener('dragover', (e) => { e.preventDefault(); dropZone.classList.add('border-teal-500', 'bg-teal-50'); });
            dropZone.addEventListener('dragleave', (e) => { e.preventDefault(); dropZone.classList.remove('border-teal-500', 'bg-teal-50'); });
            dropZone.addEventListener('drop', (e) => {
                e.preventDefault();
                dropZone.classList.remove('border-teal-500', 'bg-teal-50');
                if (e.dataTransfer.files[0]) handleFile(e.dataTransfer.files[0]);
            });

            imageInput.addEventListener('change', (e) => { if (e.target.files[0]) handleFile(e.target.files[0]); });

            function handleFile(file) {
                if (!file.type.match('image/svg.*')) { showError('Please upload a valid SVG image'); return; }
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
                    const scale = parseInt(scaleSelect.value);
                    canvas.width = img.width * scale;
                    canvas.height = img.height * scale;

                    // White BG
                    ctx.fillStyle = '#FFFFFF';
                    ctx.fillRect(0, 0, canvas.width, canvas.height);
                    ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

                    const dataUrl = canvas.toDataURL('image/jpeg', 0.9);
                    const link = document.createElement('a');
                    link.download = 'converted-svg.jpg';
                    link.href = dataUrl;
                    link.click();
                };
            });
        </script>
@endsection