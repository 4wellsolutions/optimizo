@extends('layouts.app')

@section('title', __tool('image-compressor', 'meta.title'))
@section('meta_description', __tool('image-compressor', 'meta.description'))

@section('content')
    <div class="max-w-4xl mx-auto">
        <x-tool-hero :tool="$tool" icon="image-compressor" />

        <!-- Tool -->
        <!-- Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-cyan-200 mb-8">
            <!-- Modern Drag & Drop Upload Section -->
            <div class="mb-6">
                <label class="form-label text-base mb-3">{{ __tool('image-compressor', 'editor.label_upload') }}</label>
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
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ __tool('image-compressor', 'editor.drop_title') }}</h3>
                    <p class="text-gray-600 mb-4">{{ __tool('image-compressor', 'editor.drop_subtitle') }}</p>

                    <!-- Supported Formats -->
                    <div class="flex items-center justify-center gap-2 text-sm text-gray-500">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>{{ __tool('image-compressor', 'editor.supports') }}</span>
                    </div>
                </div>
            </div>

            <!-- Quality Slider -->
            <div id="qualityControl" class="hidden mb-6">
                <label class="form-label text-base">{{ __tool('image-compressor', 'editor.label_quality') }} <span id="qualityValue">80</span>%</label>
                <input type="range" id="qualitySlider" min="10" max="100" value="80" class="w-full"
                    oninput="updateQuality(this.value)">
            </div>

            <!-- Preview -->
            <div id="preview" class="hidden">
                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">{{ __tool('image-compressor', 'editor.title_original') }}</h3>
                        <div class="border-2 border-gray-200 rounded-xl p-4 bg-gray-50">
                            <img id="originalImage" class="max-w-full h-auto rounded-lg mb-2">
                            <p class="text-sm text-gray-600">{{ __tool('image-compressor', 'editor.label_size') }} <span id="originalSize" class="font-bold"></span></p>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">{{ __tool('image-compressor', 'editor.title_compressed') }}</h3>
                        <div class="border-2 border-cyan-200 rounded-xl p-4 bg-cyan-50">
                            <img id="compressedImage" class="max-w-full h-auto rounded-lg mb-2">
                            <p class="text-sm text-gray-600">{{ __tool('image-compressor', 'editor.label_size') }} <span id="compressedSize" class="font-bold"></span></p>
                            <p class="text-sm text-green-600 font-bold">{{ __tool('image-compressor', 'editor.label_saved') }} <span id="savedSize"></span></p>
                        </div>
                    </div>
                </div>

                <button onclick="downloadImage()" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    <span>{{ __tool('image-compressor', 'editor.btn_download') }}</span>
                </button>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-cyan-50 to-blue-50 rounded-2xl p-6 md:p-8 border-2 border-cyan-100 shadow-xl">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __tool('image-compressor', 'meta.h1') }}</h2>
            <p class="text-gray-700 leading-relaxed text-lg mb-6">{{ __tool('image-compressor', 'content.p1') }}</p>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('image-compressor', 'content.why_title') }}</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6 leading-relaxed">
                @foreach (__tool('image-compressor', 'content.why_list') as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('image-compressor', 'content.formats_title') }}</h3>
            <div class="grid md:grid-cols-3 gap-4 mb-6">
                @foreach (['jpg', 'png', 'webp'] as $key)
                    <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                        <h4 class="font-bold text-cyan-900 mb-2">{{ __tool('image-compressor', 'content.formats.' . $key . '.title') }}</h4>
                        <p class="text-gray-700 text-sm mb-2">{{ __tool('image-compressor', 'content.formats.' . $key . '.desc') }}</p>
                    </div>
                @endforeach
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('image-compressor', 'content.quality_title') }}</h3>
            <div class="bg-white rounded-lg p-4 border-2 border-gray-200 mb-6">
                <ul class="space-y-2 text-gray-700">
                    @foreach (__tool('image-compressor', 'content.quality_list') as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('image-compressor', 'content.how_title') }}</h3>
            <p class="text-gray-700 leading-relaxed mb-4">{{ __tool('image-compressor', 'content.how_desc') }}</p>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('image-compressor', 'content.best_title') }}</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6 leading-relaxed">
                @foreach (__tool('image-compressor', 'content.best_list') as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>

            <div class="bg-green-50 border-2 border-green-200 rounded-xl p-6 mb-6">
                <h4 class="font-bold text-green-900 mb-2 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ __tool('image-compressor', 'content.privacy_title') }}
                </h4>
                <p class="text-green-800 text-sm leading-relaxed">{{ __tool('image-compressor', 'content.privacy_desc') }}</p>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('image-compressor', 'content.faq_title') }}</h3>
            <div class="space-y-4">
                @foreach (['q1', 'q2', 'q3', 'q4', 'q5'] as $q)
                    <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                        <h4 class="font-bold text-gray-900 mb-2">{{ __tool('image-compressor', 'content.faq.' . $q) }}</h4>
                        <p class="text-gray-700 leading-relaxed">{{ __tool('image-compressor', 'content.faq.a' . substr($q, 1)) }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@push('scripts')
    <script>
        // Drag and drop functionality
        const dropZone = document.getElementById('dropZone');
        const fileInput = document.getElementById('imageInput');

        if (dropZone && fileInput) {
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
        }

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
@endpush
@endsection