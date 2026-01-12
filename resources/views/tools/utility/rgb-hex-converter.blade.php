@extends('layouts.app')

@section('title', __tool('rgb-hex-converter', 'meta.h1'))
@section('meta_description', __tool('rgb-hex-converter', 'meta.subtitle'))

@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <x-tool-hero :tool="$tool" icon="rgb-hex-converter" />

        <!-- Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-pink-200 mb-8">
            <!-- RGB to HEX -->
            <div class="mb-8">
                <h3 class="text-xl font-bold text-gray-900 mb-4">{{ __tool('rgb-hex-converter', 'editor.rgb_to_hex', 'RGB to HEX') }}</h3>
                <div class="grid grid-cols-3 gap-4 mb-4">
                    <div>
                        <label class="form-label">{{ __tool('rgb-hex-converter', 'editor.label_red', 'Red (0-255)') }}</label>
                        <input type="number" id="r" min="0" max="255" value="255" class="form-input" oninput="rgbToHex()">
                    </div>
                    <div>
                        <label class="form-label">{{ __tool('rgb-hex-converter', 'editor.label_green', 'Green (0-255)') }}</label>
                        <input type="number" id="g" min="0" max="255" value="0" class="form-input" oninput="rgbToHex()">
                    </div>
                    <div>
                        <label class="form-label">{{ __tool('rgb-hex-converter', 'editor.label_blue', 'Blue (0-255)') }}</label>
                        <input type="number" id="b" min="0" max="255" value="0" class="form-input" oninput="rgbToHex()">
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="flex-1">
                        <label class="form-label">{{ __tool('rgb-hex-converter', 'editor.label_hex', 'HEX Color') }}</label>
                        <input type="text" id="hexOutput" readonly class="form-input font-mono bg-gray-50">
                    </div>
                    <div id="colorPreview1" class="w-20 h-20 rounded-xl border-4 border-gray-300 shadow-lg"
                        style="background-color: #FF0000"></div>
                </div>
            </div>

            <hr class="my-8 border-gray-200">

            <!-- HEX to RGB -->
            <div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">{{ __tool('rgb-hex-converter', 'editor.hex_to_rgb', 'HEX to RGB') }}</h3>
                <div class="mb-4">
                    <label class="form-label">{{ __tool('rgb-hex-converter', 'editor.label_hex_input', 'HEX Color') }}</label>
                    <input type="text" id="hexInput" placeholder="{{ __tool('rgb-hex-converter', 'editor.ph_hex', '#FF0000') }}" class="form-input font-mono"
                        oninput="hexToRgb()">
                </div>
                <div class="flex items-center gap-4">
                    <div class="flex-1">
                        <label class="form-label">{{ __tool('rgb-hex-converter', 'editor.label_rgb_output', 'RGB Color') }}</label>
                        <input type="text" id="rgbOutput" readonly class="form-input bg-gray-50">
                    </div>
                    <div id="colorPreview2" class="w-20 h-20 rounded-xl border-4 border-gray-300 shadow-lg"></div>
                </div>

            @include('components.hero-actions')
        </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-pink-50 to-purple-50 rounded-2xl p-6 md:p-8 border-2 border-pink-100 shadow-xl">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __tool('rgb-hex-converter', 'meta.h1', 'RGB to HEX Color Converter - Convert Colors Online') }}</h2>
            <p class="text-gray-700 leading-relaxed text-lg mb-6">
                {{ __tool('rgb-hex-converter', 'content.p1', 'Convert colors between RGB and HEX formats instantly with our free online color converter tool. Perfect for web designers, developers, graphic artists, and anyone working with digital colors. Get accurate conversions with live color preview, supporting both RGB to HEX and HEX to RGB conversions. Essential for CSS styling, design systems, and cross-platform color consistency.') }}
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('rgb-hex-converter', 'content.formats_title', 'Understanding Color Formats') }}</h3>
            <div class="grid md:grid-cols-2 gap-4 mb-6">
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-pink-900 mb-2">{{ __tool('rgb-hex-converter', 'content.formats.rgb.title') }}</h4>
                    <p class="text-gray-700 text-sm mb-2"><strong>{{ __tool('rgb-hex-converter', 'content.formats.rgb.format') }}:</strong> {{ __tool('rgb-hex-converter', 'content.formats.rgb.format_val') }}</p>
                    <p class="text-gray-700 text-sm mb-2"><strong>{{ __tool('rgb-hex-converter', 'content.formats.rgb.range') }}:</strong> {{ __tool('rgb-hex-converter', 'content.formats.rgb.range_val') }}</p>
                    <p class="text-gray-700 text-sm"><strong>{{ __tool('rgb-hex-converter', 'content.formats.rgb.used_in') }}:</strong> {{ __tool('rgb-hex-converter', 'content.formats.rgb.used_in_val') }}
                    </p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-purple-900 mb-2">{{ __tool('rgb-hex-converter', 'content.formats.hex.title') }}</h4>
                    <p class="text-gray-700 text-sm mb-2"><strong>{{ __tool('rgb-hex-converter', 'content.formats.hex.format') }}:</strong> {{ __tool('rgb-hex-converter', 'content.formats.hex.format_val') }}</p>
                    <p class="text-gray-700 text-sm mb-2"><strong>{{ __tool('rgb-hex-converter', 'content.formats.hex.range') }}:</strong> {{ __tool('rgb-hex-converter', 'content.formats.hex.range_val') }}</p>
                    <p class="text-gray-700 text-sm"><strong>{{ __tool('rgb-hex-converter', 'content.formats.hex.used_in') }}:</strong> {{ __tool('rgb-hex-converter', 'content.formats.hex.used_in_val') }}</p>
                </div>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('rgb-hex-converter', 'content.why_title', 'Why Convert Between RGB and HEX?') }}</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6 leading-relaxed">
                @foreach(__tool('rgb-hex-converter', 'content.why_list') as $key => $item)
                    <li><strong>{{ $item['title'] }}:</strong> {{ $item['desc'] }}</li>
                @endforeach
            </ul>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('rgb-hex-converter', 'content.how_work_title', 'How Color Conversion Works') }}</h3>
            <p class="text-gray-700 leading-relaxed mb-4">
                <strong>{{ __tool('rgb-hex-converter', 'content.how_work_t1') }}:</strong> {{ __tool('rgb-hex-converter', 'content.how_work_p1') }}
            </p>
            <p class="text-gray-700 leading-relaxed mb-6">
                <strong>{{ __tool('rgb-hex-converter', 'content.how_work_t2') }}:</strong> {{ __tool('rgb-hex-converter', 'content.how_work_p2') }}
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('rgb-hex-converter', 'content.uses_title', 'Common Use Cases') }}</h3>
            <div class="space-y-3 mb-6">
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('rgb-hex-converter', 'content.uses.web.title', 'Web Development') }}</h4>
                    <p class="text-gray-700 text-sm">{{ __tool('rgb-hex-converter', 'content.uses.web.desc', 'Convert design mockup colors (RGB) to CSS-ready HEX codes for websites') }}
                    </p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('rgb-hex-converter', 'content.uses.graphic.title', 'Graphic Design') }}</h4>
                    <p class="text-gray-700 text-sm">{{ __tool('rgb-hex-converter', 'content.uses.graphic.desc', 'Match colors between Adobe Photoshop (RGB) and web design tools (HEX)') }}
                    </p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('rgb-hex-converter', 'content.uses.brand.title', 'Brand Guidelines') }}</h4>
                    <p class="text-gray-700 text-sm">{{ __tool('rgb-hex-converter', 'content.uses.brand.desc', 'Document brand colors in both formats for print (RGB) and web (HEX)') }}</p>
                </div>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('rgb-hex-converter', 'content.practices_title', 'Color Format Best Practices') }}</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6 leading-relaxed">
                @foreach(__tool('rgb-hex-converter', 'content.practices_list') as $practice)
                    <li>{{ $practice }}</li>
                @endforeach
            </ul>

            <div class="bg-blue-50 border-2 border-blue-200 rounded-xl p-6 mb-6">
                <h4 class="font-bold text-blue-900 mb-2">{{ __tool('rgb-hex-converter', 'content.pro_tip_title', '💡 Pro Tip') }}</h4>
                <p class="text-blue-800 text-sm leading-relaxed">
                    {{ __tool('rgb-hex-converter', 'content.pro_tip_desc', 'HEX shorthand: Colors like #FF0000 can be shortened to #F00 when each pair of digits is identical. Our tool automatically handles both 3-digit and 6-digit HEX codes for maximum compatibility.') }}
                </p>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('rgb-hex-converter', 'content.faq_title', 'Frequently Asked Questions') }}</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('rgb-hex-converter', 'content.faq.q1', 'What\'s the difference between RGB and HEX?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('rgb-hex-converter', 'content.faq.a1', 'RGB uses decimal numbers (0-255) for each color channel, while HEX uses hexadecimal (00-FF). They represent the same colors, just in different number systems. HEX is more compact and commonly used in web development.') }}</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('rgb-hex-converter', 'content.faq.q2', 'Can I use RGB in CSS?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('rgb-hex-converter', 'content.faq.a2', 'Yes! CSS supports both rgb(255, 0, 0) and #FF0000. RGB is useful when you need transparency with rgba(255, 0, 0, 0.5). HEX is more compact for opaque colors.') }}
                    </p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('rgb-hex-converter', 'content.faq.q3', 'What does the # symbol mean in HEX codes?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('rgb-hex-converter', 'content.faq.a3', 'The # symbol indicates that the following characters are a hexadecimal color code. It\'s required in CSS and HTML to distinguish color codes from other values.') }}
                    </p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('rgb-hex-converter', 'content.faq.q4', 'Are 3-digit and 6-digit HEX codes the same?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('rgb-hex-converter', 'content.faq.a4', '3-digit HEX codes (#F00) are shorthand for 6-digit codes where each digit is doubled (#FF0000). They work identically but 3-digit codes only work when each pair of digits is the same.') }}</p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function rgbToHex() {
            const r = parseInt(document.getElementById('r').value) || 0;
            const g = parseInt(document.getElementById('g').value) || 0;
            const b = parseInt(document.getElementById('b').value) || 0;

            const hex = "#" + ((1 << 24) + (r << 16) + (g << 8) + b).toString(16).slice(1).toUpperCase();
            document.getElementById('hexOutput').value = hex;
            document.getElementById('colorPreview1').style.backgroundColor = hex;
        }

        function hexToRgb() {
            let hex = document.getElementById('hexInput').value.trim();
            hex = hex.replace('#', '');

            if (hex.length === 3) {
                hex = hex.split('').map(c => c + c).join('');
            }

            if (hex.length !== 6) {
                document.getElementById('rgbOutput').value = "{{ __tool('rgb-hex-converter', 'js.invalid_hex', 'Invalid HEX') }}";
                return;
            }

            const r = parseInt(hex.substring(0, 2), 16);
            const g = parseInt(hex.substring(2, 4), 16);
            const b = parseInt(hex.substring(4, 6), 16);

            if (isNaN(r) || isNaN(g) || isNaN(b)) {
                document.getElementById('rgbOutput').value = "{{ __tool('rgb-hex-converter', 'js.invalid_hex', 'Invalid HEX') }}";
                return;
            }

            document.getElementById('rgbOutput').value = `rgb(${r}, ${g}, ${b})`;
            document.getElementById('colorPreview2').style.backgroundColor = `#${hex}`;
        }

        // Initialize
        rgbToHex();
    </script>
    @endpush
@endsection