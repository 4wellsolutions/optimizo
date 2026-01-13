@extends('layouts.app')

@section('title', __tool('qr-code-generator', 'meta.title'))
@section('meta_description', __tool('qr-code-generator', 'meta.description'))

@section('content')
    <div class="max-w-5xl mx-auto">
        <!-- Hero Section -->
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" icon="qr-code-generator" />

        <!-- Tool Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-purple-200 mb-8">
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Input Section -->
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __tool('qr-code-generator', 'editor.title', 'Generate QR Code') }}</h2>

                    <div class="mb-6">
                        <label for="qrText" class="form-label text-base">{{ __tool('qr-code-generator', 'editor.label_text', 'Enter Text or URL') }}</label>
                        <textarea id="qrText" class="form-input min-h-[200px]"
                            placeholder="{{ __tool('qr-code-generator', 'editor.ph_text', 'Enter text, URL, or any data you want to encode...') }}"></textarea>
                    </div>

                    <div class="mb-6">
                        <label for="qrSize" class="form-label text-base">{{ __tool('qr-code-generator', 'editor.label_size', 'QR Code Size') }}</label>
                        <select id="qrSize" class="form-input">
                            <option value="128">{{ __tool('qr-code-generator', 'editor.opt_small') }}</option>
                            <option value="256" selected>{{ __tool('qr-code-generator', 'editor.opt_medium') }}</option>
                            <option value="512">{{ __tool('qr-code-generator', 'editor.opt_large') }}</option>
                            <option value="1024">{{ __tool('qr-code-generator', 'editor.opt_xl') }}</option>
                        </select>
                    </div>

                    <button onclick="generateQR()" class="btn-primary w-full justify-center text-lg py-4 mb-4 flex items-center gap-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                        </svg>
                        <span>{{ __tool('qr-code-generator', 'editor.btn_generate', 'Generate QR Code') }}</span>
                    </button>

                    <button onclick="downloadQR()" id="downloadBtn"
                        class="btn-secondary w-full justify-center text-lg py-4 hidden flex items-center gap-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        <span>{{ __tool('qr-code-generator', 'editor.btn_download', 'Download QR Code') }}</span>
                    </button>
                    <div id="statusMessage" class="hidden mt-4 p-4 rounded-xl font-semibold text-center"></div>
                </div>

                <!-- Preview Section -->
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __tool('qr-code-generator', 'editor.preview_title', 'Preview') }}</h2>
                    <div id="qrPreview"
                        class="bg-gray-50 rounded-xl p-8 border-2 border-gray-200 flex items-center justify-center min-h-[300px]">
                        <div class="text-center text-gray-400">
                            <svg class="w-24 h-24 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                            </svg>
                            <p class="text-lg font-medium">{{ __tool('qr-code-generator', 'editor.preview_placeholder', 'Your QR code will appear here') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div
            class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-3xl p-8 md:p-12 border-2 border-purple-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">{{ __tool('qr-code-generator', 'content.hero_title', 'Free QR Code Generator') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __tool('qr-code-generator', 'content.hero_subtitle', 'Create custom QR codes instantly for any purpose') }}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {{ __tool('qr-code-generator', 'content.p1', 'Our free QR Code Generator creates high-quality QR codes instantly. Perfect for businesses, marketers, event organizers, and anyone who needs to share information quickly. Generate QR codes for URLs, text, contact information, WiFi credentials, and more. Download in multiple sizes and use anywhere - completely free, no registration required.') }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('qr-code-generator', 'content.faq.q1', 'What is a QR Code?') }}</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                {{ __tool('qr-code-generator', 'content.faq.a1', 'QR (Quick Response) codes are two-dimensional barcodes that can store various types of information. They can be scanned using smartphone cameras or dedicated QR code readers, instantly accessing the encoded data. QR codes are widely used for marketing, payments, authentication, product tracking, and contactless information sharing.') }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('qr-code-generator', 'content.features_title', '✨ Features') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('qr-code-generator', 'content.features.instant.title', 'Instant Generation') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('qr-code-generator', 'content.features.instant.desc', 'Create QR codes in seconds with real-time preview') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📏</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('qr-code-generator', 'content.features.sizes.title', 'Multiple Sizes') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('qr-code-generator', 'content.features.sizes.desc', 'Choose from 128px to 1024px for any use case') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">💾</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('qr-code-generator', 'content.features.download.title', 'Easy Download') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('qr-code-generator', 'content.features.download.desc', 'Download as PNG image with one click') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-orange-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('qr-code-generator', 'content.features.privacy.title', 'Privacy First') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('qr-code-generator', 'content.features.privacy.desc', 'All processing happens in your browser') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🆓</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('qr-code-generator', 'content.features.free.title', '100% Free') }}
                    </h4>
                    <p class="text-gray-600 text-sm">{{ __tool('qr-code-generator', 'content.features.free.desc', 'No limits, no watermarks, no registration') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📱</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('qr-code-generator', 'content.features.compatibility.title', 'Universal Compatibility') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('qr-code-generator', 'content.features.compatibility.desc', 'Works with all QR code scanners') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('qr-code-generator', 'content.uses_title', '🎯 Common Use Cases') }}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('qr-code-generator', 'content.uses.urls.title', '🔗 Website URLs') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('qr-code-generator', 'content.uses.urls.desc', 'Direct users to your website, landing page, or online store instantly') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('qr-code-generator', 'content.uses.contact.title', '👤 Contact Information') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('qr-code-generator', 'content.uses.contact.desc', 'Share vCards with email, phone, and address details') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('qr-code-generator', 'content.uses.social.title', '👍 Social Media') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('qr-code-generator', 'content.uses.social.desc', 'Link to your social profiles, YouTube channel, or Instagram') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('qr-code-generator', 'content.uses.tickets.title', '🎟️ Event Tickets') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('qr-code-generator', 'content.uses.tickets.desc', 'Generate scannable tickets for events and conferences') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('qr-code-generator', 'content.uses.product.title', '📦 Product Information') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('qr-code-generator', 'content.uses.product.desc', 'Add QR codes to products for manuals, specs, or authenticity') }}
                    </p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('qr-code-generator', 'content.uses.payment.title', '💳 Payment Links') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('qr-code-generator', 'content.uses.payment.desc', 'Enable quick payments via PayPal, Venmo, or crypto wallets') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('qr-code-generator', 'content.how_title', '📚 How to Use') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-purple-600 text-lg">1.</span>
                        <span><strong>{{ __tool('qr-code-generator', 'content.how_steps.1.title', 'Enter your data:') }}</strong> {{ __tool('qr-code-generator', 'content.how_steps.1.desc', 'Type or paste the text, URL, or information you want to encode') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-purple-600 text-lg">2.</span>
                        <span><strong>{{ __tool('qr-code-generator', 'content.how_steps.2.title', 'Choose size:') }}</strong> {{ __tool('qr-code-generator', 'content.how_steps.2.desc', 'Select the QR code size based on where you\'ll use it') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-purple-600 text-lg">3.</span>
                        <span><strong>{{ __tool('qr-code-generator', 'content.how_steps.3.title', 'Generate:') }}</strong> {{ __tool('qr-code-generator', 'content.how_steps.3.desc', 'Click "Generate QR Code" to create your QR code instantly') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-purple-600 text-lg">4.</span>
                        <span><strong>{{ __tool('qr-code-generator', 'content.how_steps.4.title', 'Download:') }}</strong> {{ __tool('qr-code-generator', 'content.how_steps.4.desc', 'Click "Download QR Code" to save the PNG image') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-purple-600 text-lg">5.</span>
                        <span><strong>{{ __tool('qr-code-generator', 'content.how_steps.5.title', 'Use anywhere:') }}</strong> {{ __tool('qr-code-generator', 'content.how_steps.5.desc', 'Print, share digitally, or add to marketing materials') }}</span>
                    </li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('qr-code-generator', 'content.best_practices_title') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ul class="space-y-3 text-gray-700">
                    @foreach(__tool('qr-code-generator', 'content.best_practices') as $key => $practice)
                        <li class="flex items-start gap-3">
                            <span class="text-green-600 font-bold text-xl">✓</span>
                            <span><strong>{{ $practice['title'] }}</strong> {{ $practice['desc'] }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('qr-code-generator', 'content.faq_title', '❓ Frequently Asked Questions') }}</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('qr-code-generator', 'content.faq.q2', 'Are the QR codes permanent?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('qr-code-generator', 'content.faq.a2', 'Yes! QR codes are static and permanent. Once generated, they will always work as long as the encoded data (like a URL) remains valid.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('qr-code-generator', 'content.faq.q3', 'What size should I use for printing?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('qr-code-generator', 'content.faq.a3', 'For business cards, use at least 256px. For posters and banners, use 512px or 1024px. The larger the print size, the bigger the QR code should be for easy scanning.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('qr-code-generator', 'content.faq.q4', 'Can I track QR code scans?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('qr-code-generator', 'content.faq.a4', 'Our tool generates static QR codes without tracking. To track scans, use a URL shortener with analytics before generating the QR code, or use a dynamic QR code service.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('qr-code-generator', 'content.faq.q5', 'Is there a limit to how much data I can encode?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('qr-code-generator', 'content.faq.a5', 'QR codes can store up to 4,296 alphanumeric characters, but for best scanning results, keep data concise. URLs under 100 characters work best.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('qr-code-generator', 'content.faq.q6', 'Do QR codes expire?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('qr-code-generator', 'content.faq.a6', 'No, QR codes themselves never expire. However, if the QR code links to a URL that gets deleted or changed, the QR code won\'t work anymore.') }}</p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <!-- QR Code Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

    <script>
        function showError(message) {
            const statusMessage = document.getElementById('statusMessage');
            statusMessage.textContent = message;
            statusMessage.classList.remove('hidden', 'bg-green-100', 'text-green-800');
            statusMessage.classList.add('bg-red-100', 'text-red-800');
            setTimeout(() => statusMessage.classList.add('hidden'), 5000);
        }

        function generateQR() {
            const text = document.getElementById('qrText').value.trim();
            const size = parseInt(document.getElementById('qrSize').value);
            const preview = document.getElementById('qrPreview');
            const downloadBtn = document.getElementById('downloadBtn');

            if (!text) {
                showError("{{ __tool('qr-code-generator', 'js.error_empty') }}");
                return;
            }

            preview.innerHTML = '';

            try {
                const qrContainer = document.createElement('div');
                qrContainer.id = 'qrcode-container';
                qrContainer.style.display = 'inline-block';
                preview.appendChild(qrContainer);

                new QRCode(qrContainer, {
                    text: text,
                    width: size,
                    height: size,
                    colorDark: "#000000",
                    colorLight: "#ffffff",
                    correctLevel: QRCode.CorrectLevel.H
                });

                downloadBtn.classList.remove('hidden');

                setTimeout(() => {
                    const img = qrContainer.querySelector('img');
                    if (img) {
                        img.style.borderRadius = '12px';
                        img.style.maxWidth = '100%';
                        img.style.height = 'auto';
                    }
                }, 100);
            } catch (error) {
                console.error('QR Error:', error);
                preview.innerHTML = '<p class="text-red-600 font-bold">{{ __tool("qr-code-generator", "js.error_generating") }}</p>';
            }
        }

        function downloadQR() {
            const qrContainer = document.getElementById('qrcode-container');
            if (!qrContainer) {
                showError("{{ __tool('qr-code-generator', 'js.error_no_code') }}");
                return;
            }

            const img = qrContainer.querySelector('img');
            if (!img) {
                showError("{{ __tool('qr-code-generator', 'js.error_image_not_found') }}");
                return;
            }

            const link = document.createElement('a');
            link.download = 'qr-code.png';
            link.href = img.src;
            link.click();
        }

        document.getElementById('qrText').addEventListener('keypress', function (e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                generateQR();
            }
        });
    </script>
    @endpush
@endsection