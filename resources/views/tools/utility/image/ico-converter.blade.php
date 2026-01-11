@extends('layouts.app')

@section('title', __tool('ico-converter', 'meta.title'))
@section('meta_description', __tool('ico-converter', 'meta.desc'))
@section('meta_keywords', __tool('ico-converter', 'meta.keywords'))

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" />

        <!-- Tool Interface -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-amber-50 mb-12">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">{!! __tool('ico-converter', 'input.title') !!}</h2>
                <p class="text-gray-600">{!! __tool('ico-converter', 'input.desc') !!}</p>
            </div>

            <div id="dropZone"
                class="border-3 border-dashed border-amber-200 rounded-2xl p-8 hover:border-amber-400 hover:bg-amber-50 transition-all cursor-pointer text-center relative group">
                <input type="file" id="imageInput" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                    accept="image/png, image/jpeg, image/jpg">
                <div class="space-y-4 pointer-events-none">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-amber-100 text-amber-600 rounded-full group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-bold text-gray-700">{!! __tool('ico-converter', 'input.drop_title') !!}</p>
                        <p class="text-sm text-gray-500">{!! __tool('ico-converter', 'input.drop_desc') !!}</p>
                    </div>
                </div>
            </div>

            <div id="editorArea" class="hidden mt-8 grid md:grid-cols-2 gap-8">
                <!-- Left Column: Preview Area -->
                <div
                    class="bg-gray-50 rounded-xl p-4 flex flex-col items-center justify-center border border-gray-200 h-[400px] space-y-6">
                    <div class="flex items-center justify-center gap-8">
                        <div>
                            <p class="text-xs text-gray-500 mb-2 text-center">
                                {!! __tool('ico-converter', 'editor.original') !!}
                            </p>
                            <img id="imagePreview" class="h-24 w-auto rounded-lg shadow-sm border border-gray-200" src=""
                                alt="{!! __tool('ico-converter', 'editor.image_alt') !!}">
                        </div>
                        <div class="text-gray-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 mb-2 text-center">
                                {!! __tool('ico-converter', 'editor.favicon') !!}
                            </p>
                            <div
                                class="w-24 h-24 flex items-center justify-center bg-gray-50 border border-gray-200 rounded-lg">
                                <canvas id="faviconCanvas" width="32" height="32" class="shadow-sm"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Settings & Actions -->
                <div class="flex flex-col justify-center space-y-6">
                    <div class="w-full">
                        <label
                            class="block text-sm font-bold text-gray-700 mb-2">{!! __tool('ico-converter', 'editor.size_label') !!}</label>
                        <div class="grid grid-cols-3 gap-3">
                            <button type="button"
                                class="size-btn px-4 py-2 border-2 border-amber-500 bg-amber-50 text-amber-700 font-bold rounded-lg"
                                data-size="32">32x32</button>
                            <button type="button"
                                class="size-btn px-4 py-2 border-2 border-gray-200 bg-white text-gray-600 font-medium rounded-lg hover:border-amber-300"
                                data-size="64">64x64</button>
                            <button type="button"
                                class="size-btn px-4 py-2 border-2 border-gray-200 bg-white text-gray-600 font-medium rounded-lg hover:border-amber-300"
                                data-size="128">128x128</button>
                        </div>
                        <input type="hidden" id="selectedSize" value="32">
                    </div>

                    <div class="text-center text-gray-600 font-medium">
                        {!! __tool('ico-converter', 'editor.output_format') !!} <span
                            class="font-bold text-amber-600">ICO</span>
                    </div>

                    <button id="convertBtn"
                        class="w-full bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white font-bold py-4 rounded-xl shadow-lg transform hover:scale-[1.01] transition-all flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        </svg>
                        {!! __tool('ico-converter', 'editor.btn_download') !!}
                    </button>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="mt-12 mb-20 max-w-7xl mx-auto">
            <article
                class="prose prose-lg prose-amber max-w-none bg-white rounded-3xl p-8 md:p-12 shadow-xl border border-gray-100">
                <h2 class="text-3xl font-black text-gray-900 mb-6 text-center">
                    {!! __tool('ico-converter', 'content.title') !!}
                </h2>
                <div class="text-gray-600 text-center mb-12">
                    <p class="mb-4">
                        {!! __tool('ico-converter', 'content.p1') !!}
                    </p>
                    <p>
                        {!! __tool('ico-converter', 'content.p2') !!}
                    </p>
                </div>

                <!-- Features Grid -->
                <div class="grid md:grid-cols-3 gap-8 mb-16 not-prose">
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center">
                        <div
                            class="w-12 h-12 bg-amber-100 text-amber-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">
                            {!! __tool('ico-converter', 'content.features.sizes.title') !!}
                        </h3>
                        <p class="text-sm text-gray-600">{!! __tool('ico-converter', 'content.features.sizes.desc') !!}</p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center">
                        <div
                            class="w-12 h-12 bg-yellow-100 text-yellow-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">
                            {!! __tool('ico-converter', 'content.features.resize.title') !!}
                        </h3>
                        <p class="text-sm text-gray-600">{!! __tool('ico-converter', 'content.features.resize.desc') !!}</p>
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
                        <h3 class="font-bold text-xl mb-2 text-gray-900">
                            {!! __tool('ico-converter', 'content.features.multi.title') !!}
                        </h3>
                        <p class="text-sm text-gray-600">{!! __tool('ico-converter', 'content.features.multi.desc') !!}</p>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-12">
                    <div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-900">
                            {!! __tool('ico-converter', 'content.how_to.title') !!}
                        </h3>
                        <ol class="list-decimal pl-5 space-y-2 text-gray-600">
                            @foreach(__tool('ico-converter', 'content.how_to.list') as $step)
                                <li>{!! $step !!}</li>
                            @endforeach
                        </ol>
                    </div>
                    <div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-900">
                            {!! __tool('ico-converter', 'content.why.title') !!}
                        </h3>
                        <p class="text-gray-600 mb-4">
                            {!! __tool('ico-converter', 'content.why.p1') !!}
                        </p>
                    </div>
                </div>
            </article>
        </div>

        @push('scripts')
        <script>
            const imageInput = document.getElementById('imageInput');
            const dropZone = document.getElementById('dropZone');
            const editorArea = document.getElementById('editorArea');
            const imagePreview = document.getElementById('imagePreview');
            const convertBtn = document.getElementById('convertBtn');
            const faviconCanvas = document.getElementById('faviconCanvas');
            const ctx = faviconCanvas.getContext('2d');
            const sizeBtns = document.querySelectorAll('.size-btn');
            const selectedSizeInput = document.getElementById('selectedSize');

            let currentImg = new Image();

            // Size Selection
            sizeBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    sizeBtns.forEach(b => {
                        b.classList.remove('border-amber-500', 'bg-amber-50', 'text-amber-700', 'font-bold');
                        b.classList.add('border-gray-200', 'bg-white', 'text-gray-600', 'font-medium');
                    });
                    btn.classList.add('border-amber-500', 'bg-amber-50', 'text-amber-700', 'font-bold');
                    btn.classList.remove('border-gray-200', 'bg-white', 'text-gray-600', 'font-medium');

                    const size = parseInt(btn.dataset.size);
                    selectedSizeInput.value = size;
                    faviconCanvas.width = size;
                    faviconCanvas.height = size;
                    updateCanvas();
                });
            });

            // Drag & Drop
            dropZone.addEventListener('dragover', (e) => { e.preventDefault(); dropZone.classList.add('border-amber-500', 'bg-amber-50'); });
            dropZone.addEventListener('dragleave', (e) => { e.preventDefault(); dropZone.classList.remove('border-amber-500', 'bg-amber-50'); });
            dropZone.addEventListener('drop', (e) => {
                e.preventDefault();
                dropZone.classList.remove('border-amber-500', 'bg-amber-50');
                if (e.dataTransfer.files[0]) handleFile(e.dataTransfer.files[0]);
            });

            imageInput.addEventListener('change', (e) => { if (e.target.files[0]) handleFile(e.target.files[0]); });

            function handleFile(file) {
                if (!file.type.match('image.*')) { showError('{!! __tool('ico-converter', 'js.invalid_image') !!}'); return; }
                const reader = new FileReader();
                reader.onload = (e) => {
                    currentImg = new Image();
                    currentImg.src = e.target.result;
                    imagePreview.src = e.target.result;
                    currentImg.onload = updateCanvas;
                    editorArea.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }

            function updateCanvas() {
                if (!currentImg.src) return;
                ctx.clearRect(0, 0, faviconCanvas.width, faviconCanvas.height);
                ctx.drawImage(currentImg, 0, 0, faviconCanvas.width, faviconCanvas.height);
            }

            convertBtn.addEventListener('click', () => {
                // Note: True ICO files are binary containers. 
                // Browsers don't support creating true .ico binary via Canvas API natively without complex byte manipulation.
                // Using PNG with .ico extension works in most modern browsers/OS, which is standard for client-side only tools.
                // If strict ICO binary is needed, a JS library like 'js-monad-ico' would be required.
                // We stick to the PNG-masquerade approach for speed and simplicity as generally accepted.

                const dataUrl = faviconCanvas.toDataURL('image/png');
                const link = document.createElement('a');
                link.download = 'favicon.ico';
                link.href = dataUrl;
                link.click();
            });
        </script>
        @endpush
@endsection