@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-5xl mx-auto">
        <!-- Hero Section -->
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" />

        <!-- Tool Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-purple-200 mb-8">
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Input Section -->
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Generate QR Code</h2>

                    <div class="mb-6">
                        <label for="qrText" class="form-label text-base">Enter Text or URL</label>
                        <textarea id="qrText" class="form-input min-h-[200px]"
                            placeholder="Enter text, URL, or any data you want to encode..."></textarea>
                    </div>

                    <div class="mb-6">
                        <label for="qrSize" class="form-label text-base">QR Code Size</label>
                        <select id="qrSize" class="form-input">
                            <option value="128">Small (128x128)</option>
                            <option value="256" selected>Medium (256x256)</option>
                            <option value="512">Large (512x512)</option>
                            <option value="1024">Extra Large (1024x1024)</option>
                        </select>
                    </div>

                    <button onclick="generateQR()" class="btn-primary w-full justify-center text-lg py-4 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                        </svg>
                        <span>Generate QR Code</span>
                    </button>

                    <button onclick="downloadQR()" id="downloadBtn"
                        class="btn-secondary w-full justify-center text-lg py-4 hidden">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        <span>Download QR Code</span>
                    </button>
                </div>

                <!-- Preview Section -->
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Preview</h2>
                    <div id="qrPreview"
                        class="bg-gray-50 rounded-xl p-8 border-2 border-gray-200 flex items-center justify-center min-h-[300px]">
                        <div class="text-center text-gray-400">
                            <svg class="w-24 h-24 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                            </svg>
                            <p class="text-lg font-medium">Your QR code will appear here</p>
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
                <h2 class="text-4xl font-black text-gray-900 mb-3">Free QR Code Generator</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Create custom QR codes instantly for any purpose</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Our free QR Code Generator creates high-quality QR codes instantly. Perfect for businesses, marketers, event
                organizers, and anyone who needs to share information quickly. Generate QR codes for URLs, text, contact
                information, WiFi credentials, and more. Download in multiple sizes and use anywhere - completely free, no
                registration required.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">?? What is a QR Code?</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                QR (Quick Response) codes are two-dimensional barcodes that can store various types of information. They can
                be scanned using smartphone cameras or dedicated QR code readers, instantly accessing the encoded data. QR
                codes are widely used for marketing, payments, authentication, product tracking, and contactless information
                sharing.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">? Features</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">?</div>
                    <h4 class="font-bold text-gray-900 mb-2">Instant Generation</h4>
                    <p class="text-gray-600 text-sm">Create QR codes in seconds with real-time preview</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">??</div>
                    <h4 class="font-bold text-gray-900 mb-2">Multiple Sizes</h4>
                    <p class="text-gray-600 text-sm">Choose from 128px to 1024px for any use case</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">??</div>
                    <h4 class="font-bold text-gray-900 mb-2">Easy Download</h4>
                    <p class="text-gray-600 text-sm">Download as PNG image with one click</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-orange-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">??</div>
                    <h4 class="font-bold text-gray-900 mb-2">Privacy First</h4>
                    <p class="text-gray-600 text-sm">All processing happens in your browser</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">??</div>
                    <h4 class="font-bold text-gray-900 mb-2">100% Free</h4>
                    <p class="text-gray-600 text-sm">No limits, no watermarks, no registration</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">??</div>
                    <h4 class="font-bold text-gray-900 mb-2">Universal Compatibility</h4>
                    <p class="text-gray-600 text-sm">Works with all QR code scanners</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">?? Common Use Cases</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">?? Website URLs</h4>
                    <p class="text-gray-700 leading-relaxed">Direct users to your website, landing page, or online store
                        instantly</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">?? Contact Information</h4>
                    <p class="text-gray-700 leading-relaxed">Share vCards with email, phone, and address details</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">?? Social Media</h4>
                    <p class="text-gray-700 leading-relaxed">Link to your social profiles, YouTube channel, or Instagram</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">?? Event Tickets</h4>
                    <p class="text-gray-700 leading-relaxed">Generate scannable tickets for events and conferences</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">?? Product Information</h4>
                    <p class="text-gray-700 leading-relaxed">Add QR codes to products for manuals, specs, or authenticity
                    </p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">?? Payment Links</h4>
                    <p class="text-gray-700 leading-relaxed">Enable quick payments via PayPal, Venmo, or crypto wallets</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">?? How to Use</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-purple-600 text-lg">1.</span>
                        <span><strong>Enter your data:</strong> Type or paste the text, URL, or information you want to
                            encode</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-purple-600 text-lg">2.</span>
                        <span><strong>Choose size:</strong> Select the QR code size based on where you'll use it</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-purple-600 text-lg">3.</span>
                        <span><strong>Generate:</strong> Click "Generate QR Code" to create your QR code instantly</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-purple-600 text-lg">4.</span>
                        <span><strong>Download:</strong> Click "Download QR Code" to save the PNG image</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-purple-600 text-lg">5.</span>
                        <span><strong>Use anywhere:</strong> Print, share digitally, or add to marketing materials</span>
                    </li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">?? Best Practices</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ul class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="text-green-600 font-bold text-xl">?</span>
                        <span><strong>Test before printing:</strong> Always scan your QR code to verify it works
                            correctly</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-green-600 font-bold text-xl">?</span>
                        <span><strong>Use appropriate size:</strong> Larger QR codes are easier to scan from a
                            distance</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-green-600 font-bold text-xl">?</span>
                        <span><strong>Ensure contrast:</strong> Print on white or light backgrounds for best scanning</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-green-600 font-bold text-xl">?</span>
                        <span><strong>Add context:</strong> Include a call-to-action like "Scan to visit website"</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-green-600 font-bold text-xl">?</span>
                        <span><strong>Keep URLs short:</strong> Shorter URLs create simpler, more scannable QR codes</span>
                    </li>
                </ul>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">? Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Are the QR codes permanent?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! QR codes are static and permanent. Once generated, they
                        will always work as long as the encoded data (like a URL) remains valid.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What size should I use for printing?</h4>
                    <p class="text-gray-700 leading-relaxed">For business cards, use at least 256px. For posters and
                        banners, use 512px or 1024px. The larger the print size, the bigger the QR code should be for easy
                        scanning.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I track QR code scans?</h4>
                    <p class="text-gray-700 leading-relaxed">Our tool generates static QR codes without tracking. To track
                        scans, use a URL shortener with analytics before generating the QR code, or use a dynamic QR code
                        service.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is there a limit to how much data I can encode?</h4>
                    <p class="text-gray-700 leading-relaxed">QR codes can store up to 4,296 alphanumeric characters, but for
                        best scanning results, keep data concise. URLs under 100 characters work best.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Do QR codes expire?</h4>
                    <p class="text-gray-700 leading-relaxed">No, QR codes themselves never expire. However, if the QR code
                        links to a URL that gets deleted or changed, the QR code won't work anymore.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- QR Code Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

    <script>
        function generateQR() {
            const text = document.getElementById('qrText').value.trim();
            const size = parseInt(document.getElementById('qrSize').value);
            const preview = document.getElementById('qrPreview');
            const downloadBtn = document.getElementById('downloadBtn');

            if (!text) {
                alert('Please enter text or URL to generate QR code');
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
                preview.innerHTML = '<p class="text-red-600 font-bold">Error generating QR code.</p>';
            }
        }

        function downloadQR() {
            const qrContainer = document.getElementById('qrcode-container');
            if (!qrContainer) {
                alert('Please generate a QR code first');
                return;
            }

            const img = qrContainer.querySelector('img');
            if (!img) {
                alert('QR code image not found');
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
@endsection