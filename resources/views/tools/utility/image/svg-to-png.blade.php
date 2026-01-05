@extends('layouts.app')

@section('title', 'SVG to PNG Converter - Rasterize SVG Images | Optimizo')
@section('meta_description', 'Convert Scalable Vector Graphics (SVG) to PNG images instantly. Perfect for ensuring compatibility with applications that don\'t support vector files.')
@section('meta_keywords', 'svg to png, svg converter, vector to raster, free svg tool')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" />

        <!-- Tool Interface -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-rose-50 mb-12">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Upload SVG File</h2>
                <p class="text-gray-600">Drag & drop your SVG file here</p>
            </div>

            <div id="dropZone"
                class="border-3 border-dashed border-rose-200 rounded-2xl p-8 hover:border-rose-400 hover:bg-rose-50 transition-all cursor-pointer text-center relative group">
                <input type="file" id="imageInput" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                    accept="image/svg+xml">
                <div class="space-y-4 pointer-events-none">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-rose-100 text-rose-600 rounded-full group-hover:scale-110 transition-transform">
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
                    <img id="imagePreview"
                        class="max-h-full max-w-full object-contain rounded-lg shadow-sm bg-[url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAF0lEQVQ4T2N89+7df3Qmo2F4NAyjYQAAq003wQ2u5x4AAAAASUVORK5CYII=')] bg-repeat"
                        src="" alt="Preview">
                </div>
                <!-- Right Column: Actions -->
                <div class="flex flex-col justify-center space-y-6">
                    <p class="text-xs text-center text-gray-400">Checkerboard background indicates transparency</p>

                    <div class="text-center text-gray-600 font-medium">
                        Output Format: <span class="font-bold text-rose-600">PNG</span>
                    </div>

                    <div class="w-full">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Resolution Multiplier (Scale)</label>
                        <select id="scaleSelect"
                            class="w-full rounded-lg border-gray-300 focus:border-rose-500 shadow-sm p-3">
                            <option value="1">1x (Original Size)</option>
                            <option value="2">2x (High Res)</option>
                            <option value="4">4x (Ultra Res)</option>
                        </select>
                    </div>

                    <button id="convertBtn"
                        class="w-full bg-gradient-to-r from-pink-600 to-rose-600 hover:from-pink-700 hover:to-rose-700 text-white font-bold py-4 rounded-xl shadow-lg transform hover:scale-[1.01] transition-all flex items-center justify-center gap-2">
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
        <div class="mt-12 mb-20 max-w-7xl mx-auto">
            <article
                class="prose prose-lg prose-rose max-w-none bg-white rounded-3xl p-8 md:p-12 shadow-xl border border-gray-100">
                <h2 class="text-3xl font-black text-gray-900 mb-6 text-center">Rasterize SVG to PNG High-Res</h2>
                <div class="text-gray-600 text-center mb-12">
                    <p class="mb-4">
                        Scalable Vector Graphics (SVG) are perfect for the web, but impossible to use on social media, in
                        Word documents, or as email attachments.
                    </p>
                    <p>
                        Our <strong>SVG to PNG Converter</strong> allows you to turn your vector logo or icon into a
                        high-quality, transparent PNG image. With our unique <strong>scaling feature</strong>, you can
                        produce ultra-high-resolution images without any pixelation.
                    </p>
                </div>

                <!-- Features Grid -->
                <div class="grid md:grid-cols-3 gap-8 mb-16 not-prose">
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center">
                        <div
                            class="w-12 h-12 bg-rose-100 text-rose-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">Transparency Preserved</h3>
                        <p class="text-sm text-gray-600">Unlike JPG, PNG keeps the background transparent. Perfect for logos
                            and overlays.</p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center">
                        <div
                            class="w-12 h-12 bg-pink-100 text-pink-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">Up to 4x Scaling</h3>
                        <p class="text-sm text-gray-600">Export at 4x the original size. Get crisp edges even for large
                            print formats.</p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center">
                        <div
                            class="w-12 h-12 bg-orange-100 text-orange-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">Browser-Based</h3>
                        <p class="text-sm text-gray-600">Fast and secure. No files are uploaded to any server.</p>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-12">
                    <div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-900">How to Convert SVG to PNG?</h3>
                        <ol class="list-decimal pl-5 space-y-2 text-gray-600">
                            <li><strong>Upload:</strong> Drop your `.svg` file into the upload area.</li>
                            <li><strong>Choose Scale:</strong> Select `1x`, `2x`, or `4x` from the dropdown. Higher is
                                better for quality.</li>
                            <li><strong>Preview:</strong> Check the preview image on the left. The checkerboard indicates
                                transparency.</li>
                            <li><strong>Convert:</strong> Hit the button to generate and download your PNG.</li>
                        </ol>
                    </div>
                    <div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-900">Why Convert Vectors?</h3>
                        <p class="text-gray-600 mb-4">
                            Vectors are mathematical formulas, while PNGs are grids of pixels. You need pixels for:
                        </p>
                        <ul class="list-disc pl-5 space-y-2 text-gray-600">
                            <li>Profile pictures (Twitter/LinkedIn often reject SVG).</li>
                            <li>Embedding in emails (SVG support is poor).</li>
                            <li>Using in video editors or simple graphic tools (Canva, Paint).</li>
                        </ul>
                    </div>
                </div>

                <hr class="my-12 border-gray-200">

                <div>
                    <h3 class="font-bold text-2xl mb-6 text-center text-gray-900">Frequently Asked Questions</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h4 class="font-bold text-lg mb-2 text-gray-800">My SVG looks blurry in other tools. Why?</h4>
                            <p class="text-gray-600 text-sm">Most tools rasterize at the default screen size. Our
                                "Multiplier" feature lets you render the vector at a much higher resolution before saving,
                                keeping it crisp.</p>
                        </div>
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h4 class="font-bold text-lg mb-2 text-gray-800">Do you support animated SVGs?</h4>
                            <p class="text-gray-600 text-sm">We capture the first frame of the animation as a static PNG
                                image.</p>
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
        const scaleSelect = document.getElementById('scaleSelect');

        // Drag & Drop
        dropZone.addEventListener('dragover', (e) => { e.preventDefault(); dropZone.classList.add('border-rose-500', 'bg-rose-50'); });
        dropZone.addEventListener('dragleave', (e) => { e.preventDefault(); dropZone.classList.remove('border-rose-500', 'bg-rose-50'); });
        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('border-rose-500', 'bg-rose-50');
            if (e.dataTransfer.files[0]) handleFile(e.dataTransfer.files[0]);
        });

        imageInput.addEventListener('change', (e) => { if (e.target.files[0]) handleFile(e.target.files[0]); });

        function handleFile(file) {
            if (!file.type.match('image/svg.*')) { alert('Please upload a valid SVG image'); return; }
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

                ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

                const dataUrl = canvas.toDataURL('image/png');
                const link = document.createElement('a');
                link.download = 'converted-svg.png';
                link.href = dataUrl;
                link.click();
            };
        });
    </script>
@endsection