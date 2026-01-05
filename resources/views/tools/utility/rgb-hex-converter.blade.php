@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif


@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <x-tool-hero :tool="$tool" />

        <!-- Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-pink-200 mb-8">
            <!-- RGB to HEX -->
            <div class="mb-8">
                <h3 class="text-xl font-bold text-gray-900 mb-4">RGB to HEX</h3>
                <div class="grid grid-cols-3 gap-4 mb-4">
                    <div>
                        <label class="form-label">Red (0-255)</label>
                        <input type="number" id="r" min="0" max="255" value="255" class="form-input" oninput="rgbToHex()">
                    </div>
                    <div>
                        <label class="form-label">Green (0-255)</label>
                        <input type="number" id="g" min="0" max="255" value="0" class="form-input" oninput="rgbToHex()">
                    </div>
                    <div>
                        <label class="form-label">Blue (0-255)</label>
                        <input type="number" id="b" min="0" max="255" value="0" class="form-input" oninput="rgbToHex()">
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="flex-1">
                        <label class="form-label">HEX Color</label>
                        <input type="text" id="hexOutput" readonly class="form-input font-mono bg-gray-50">
                    </div>
                    <div id="colorPreview1" class="w-20 h-20 rounded-xl border-4 border-gray-300 shadow-lg"
                        style="background-color: #FF0000"></div>
                </div>
            </div>

            <hr class="my-8 border-gray-200">

            <!-- HEX to RGB -->
            <div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">HEX to RGB</h3>
                <div class="mb-4">
                    <label class="form-label">HEX Color</label>
                    <input type="text" id="hexInput" placeholder="#FF0000" class="form-input font-mono"
                        oninput="hexToRgb()">
                </div>
                <div class="flex items-center gap-4">
                    <div class="flex-1">
                        <label class="form-label">RGB Color</label>
                        <input type="text" id="rgbOutput" readonly class="form-input bg-gray-50">
                    </div>
                    <div id="colorPreview2" class="w-20 h-20 rounded-xl border-4 border-gray-300 shadow-lg"></div>
                </div>

            @include('components.hero-actions')
        </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-pink-50 to-purple-50 rounded-2xl p-6 md:p-8 border-2 border-pink-100 shadow-xl">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">RGB to HEX Color Converter - Convert Colors Online</h2>
            <p class="text-gray-700 leading-relaxed text-lg mb-6">
                Convert colors between RGB and HEX formats instantly with our free online color converter tool. Perfect for
                web designers, developers, graphic artists, and anyone working with digital colors. Get accurate conversions
                with live color preview, supporting both RGB to HEX and HEX to RGB conversions. Essential for CSS styling,
                design systems, and cross-platform color consistency.
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Understanding Color Formats</h3>
            <div class="grid md:grid-cols-2 gap-4 mb-6">
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-pink-900 mb-2">🎨 RGB (Red, Green, Blue)</h4>
                    <p class="text-gray-700 text-sm mb-2"><strong>Format:</strong> rgb(255, 0, 0)</p>
                    <p class="text-gray-700 text-sm mb-2"><strong>Range:</strong> 0-255 for each channel</p>
                    <p class="text-gray-700 text-sm"><strong>Used in:</strong> Image editing, programming, digital displays
                    </p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-purple-900 mb-2">#️⃣ HEX (Hexadecimal)</h4>
                    <p class="text-gray-700 text-sm mb-2"><strong>Format:</strong> #FF0000</p>
                    <p class="text-gray-700 text-sm mb-2"><strong>Range:</strong> 00-FF for each channel</p>
                    <p class="text-gray-700 text-sm"><strong>Used in:</strong> Web development, CSS, HTML, design tools</p>
                </div>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Why Convert Between RGB and HEX?</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6 leading-relaxed">
                <li><strong>Web Development:</strong> CSS supports both formats - convert for compatibility</li>
                <li><strong>Design Tools:</strong> Different software uses different formats (Photoshop vs Figma)</li>
                <li><strong>Color Matching:</strong> Ensure consistent colors across platforms and tools</li>
                <li><strong>Documentation:</strong> Communicate colors clearly in style guides</li>
                <li><strong>Programming:</strong> Convert between formats for different libraries and frameworks</li>
                <li><strong>Brand Guidelines:</strong> Maintain brand color consistency across mediums</li>
            </ul>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">How Color Conversion Works</h3>
            <p class="text-gray-700 leading-relaxed mb-4">
                <strong>RGB to HEX:</strong> Each RGB value (0-255) is converted to hexadecimal (00-FF). For example,
                RGB(255, 0, 0) becomes #FF0000. The conversion formula: HEX = (R × 65536) + (G × 256) + B, then converted to
                base-16.
            </p>
            <p class="text-gray-700 leading-relaxed mb-6">
                <strong>HEX to RGB:</strong> Each pair of hexadecimal digits is converted to decimal (0-255). For example,
                #FF0000 becomes RGB(255, 0, 0). The first two digits are Red, middle two are Green, last two are Blue.
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Common Use Cases</h3>
            <div class="space-y-3 mb-6">
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">Web Development</h4>
                    <p class="text-gray-700 text-sm">Convert design mockup colors (RGB) to CSS-ready HEX codes for websites
                    </p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">Graphic Design</h4>
                    <p class="text-gray-700 text-sm">Match colors between Adobe Photoshop (RGB) and web design tools (HEX)
                    </p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">Brand Guidelines</h4>
                    <p class="text-gray-700 text-sm">Document brand colors in both formats for print (RGB) and web (HEX)</p>
                </div>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Color Format Best Practices</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6 leading-relaxed">
                <li>Use HEX for CSS and HTML - it's more compact and widely supported</li>
                <li>Use RGB when you need alpha transparency (RGBA format)</li>
                <li>Always include the # symbol with HEX codes in CSS</li>
                <li>Document both formats in design systems for flexibility</li>
                <li>Use uppercase for HEX codes for consistency (#FF0000 not #ff0000)</li>
                <li>Test colors on different displays for accurate representation</li>
            </ul>

            <div class="bg-blue-50 border-2 border-blue-200 rounded-xl p-6 mb-6">
                <h4 class="font-bold text-blue-900 mb-2">💡 Pro Tip</h4>
                <p class="text-blue-800 text-sm leading-relaxed">
                    HEX shorthand: Colors like #FF0000 can be shortened to #F00 when each pair of digits is identical. Our
                    tool automatically handles both 3-digit and 6-digit HEX codes for maximum compatibility.
                </p>
                <h3 class="text-xl font-bold text-gray-900 mb-4">RGB to HEX</h3>
                <div class="grid grid-cols-3 gap-4 mb-4">
                    <div>
                        <label class="form-label">Red (0-255)</label>
                        <input type="number" id="r" min="0" max="255" value="255" class="form-input" oninput="rgbToHex()">
                    </div>
                    <div>
                        <label class="form-label">Green (0-255)</label>
                        <input type="number" id="g" min="0" max="255" value="0" class="form-input" oninput="rgbToHex()">
                    </div>
                    <div>
                        <label class="form-label">Blue (0-255)</label>
                        <input type="number" id="b" min="0" max="255" value="0" class="form-input" oninput="rgbToHex()">
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="flex-1">
                        <label class="form-label">HEX Color</label>
                        <input type="text" id="hexOutput" readonly class="form-input font-mono bg-gray-50">
                    </div>
                    <div id="colorPreview1" class="w-20 h-20 rounded-xl border-4 border-gray-300 shadow-lg"
                        style="background-color: #FF0000"></div>
                </div>
            </div>

            <hr class="my-8 border-gray-200">

            <!-- HEX to RGB -->
            <div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">HEX to RGB</h3>
                <div class="mb-4">
                    <label class="form-label">HEX Color</label>
                    <input type="text" id="hexInput" placeholder="#FF0000" class="form-input font-mono"
                        oninput="hexToRgb()">
                </div>
                <div class="flex items-center gap-4">
                    <div class="flex-1">
                        <label class="form-label">RGB Color</label>
                        <input type="text" id="rgbOutput" readonly class="form-input bg-gray-50">
                    </div>
                    <div id="colorPreview2" class="w-20 h-20 rounded-xl border-4 border-gray-300 shadow-lg"></div>
                </div>

            @include('components.hero-actions')
        </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-pink-50 to-purple-50 rounded-2xl p-6 md:p-8 border-2 border-pink-100 shadow-xl">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">RGB to HEX Color Converter - Convert Colors Online</h2>
            <p class="text-gray-700 leading-relaxed text-lg mb-6">
                Convert colors between RGB and HEX formats instantly with our free online color converter tool. Perfect for
                web designers, developers, graphic artists, and anyone working with digital colors. Get accurate conversions
                with live color preview, supporting both RGB to HEX and HEX to RGB conversions. Essential for CSS styling,
                design systems, and cross-platform color consistency.
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Understanding Color Formats</h3>
            <div class="grid md:grid-cols-2 gap-4 mb-6">
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-pink-900 mb-2">🎨 RGB (Red, Green, Blue)</h4>
                    <p class="text-gray-700 text-sm mb-2"><strong>Format:</strong> rgb(255, 0, 0)</p>
                    <p class="text-gray-700 text-sm mb-2"><strong>Range:</strong> 0-255 for each channel</p>
                    <p class="text-gray-700 text-sm"><strong>Used in:</strong> Image editing, programming, digital displays
                    </p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-purple-900 mb-2">#️⃣ HEX (Hexadecimal)</h4>
                    <p class="text-gray-700 text-sm mb-2"><strong>Format:</strong> #FF0000</p>
                    <p class="text-gray-700 text-sm mb-2"><strong>Range:</strong> 00-FF for each channel</p>
                    <p class="text-gray-700 text-sm"><strong>Used in:</strong> Web development, CSS, HTML, design tools</p>
                </div>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Why Convert Between RGB and HEX?</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6 leading-relaxed">
                <li><strong>Web Development:</strong> CSS supports both formats - convert for compatibility</li>
                <li><strong>Design Tools:</strong> Different software uses different formats (Photoshop vs Figma)</li>
                <li><strong>Color Matching:</strong> Ensure consistent colors across platforms and tools</li>
                <li><strong>Documentation:</strong> Communicate colors clearly in style guides</li>
                <li><strong>Programming:</strong> Convert between formats for different libraries and frameworks</li>
                <li><strong>Brand Guidelines:</strong> Maintain brand color consistency across mediums</li>
            </ul>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">How Color Conversion Works</h3>
            <p class="text-gray-700 leading-relaxed mb-4">
                <strong>RGB to HEX:</strong> Each RGB value (0-255) is converted to hexadecimal (00-FF). For example,
                RGB(255, 0, 0) becomes #FF0000. The conversion formula: HEX = (R × 65536) + (G × 256) + B, then converted to
                base-16.
            </p>
            <p class="text-gray-700 leading-relaxed mb-6">
                <strong>HEX to RGB:</strong> Each pair of hexadecimal digits is converted to decimal (0-255). For example,
                #FF0000 becomes RGB(255, 0, 0). The first two digits are Red, middle two are Green, last two are Blue.
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Common Use Cases</h3>
            <div class="space-y-3 mb-6">
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">Web Development</h4>
                    <p class="text-gray-700 text-sm">Convert design mockup colors (RGB) to CSS-ready HEX codes for websites
                    </p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">Graphic Design</h4>
                    <p class="text-gray-700 text-sm">Match colors between Adobe Photoshop (RGB) and web design tools (HEX)
                    </p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">Brand Guidelines</h4>
                    <p class="text-gray-700 text-sm">Document brand colors in both formats for print (RGB) and web (HEX)</p>
                </div>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Color Format Best Practices</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6 leading-relaxed">
                <li>Use HEX for CSS and HTML - it's more compact and widely supported</li>
                <li>Use RGB when you need alpha transparency (RGBA format)</li>
                <li>Always include the # symbol with HEX codes in CSS</li>
                <li>Document both formats in design systems for flexibility</li>
                <li>Use uppercase for HEX codes for consistency (#FF0000 not #ff0000)</li>
                <li>Test colors on different displays for accurate representation</li>
            </ul>

            <div class="bg-blue-50 border-2 border-blue-200 rounded-xl p-6 mb-6">
                <h4 class="font-bold text-blue-900 mb-2">💡 Pro Tip</h4>
                <p class="text-blue-800 text-sm leading-relaxed">
                    HEX shorthand: Colors like #FF0000 can be shortened to #F00 when each pair of digits is identical. Our
                    tool automatically handles both 3-digit and 6-digit HEX codes for maximum compatibility.
                </p>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">What's the difference between RGB and HEX?</h4>
                    <p class="text-gray-700 leading-relaxed">RGB uses decimal numbers (0-255) for each color channel, while
                        HEX uses hexadecimal (00-FF). They represent the same colors, just in different number systems. HEX
                        is more compact and commonly used in web development.</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">Can I use RGB in CSS?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! CSS supports both rgb(255, 0, 0) and #FF0000. RGB is
                        useful when you need transparency with rgba(255, 0, 0, 0.5). HEX is more compact for opaque colors.
                    </p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">What does the # symbol mean in HEX codes?</h4>
                    <p class="text-gray-700 leading-relaxed">The # symbol indicates that the following characters are a
                        hexadecimal color code. It's required in CSS and HTML to distinguish color codes from other values.
                    </p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">Are 3-digit and 6-digit HEX codes the same?</h4>
                    <p class="text-gray-700 leading-relaxed">3-digit HEX codes (#F00) are shorthand for 6-digit codes where
                        each digit is doubled (#FF0000). They work identically but 3-digit codes only work when each pair of
                        digits is the same.</p>
                </div>
            </div>
        </div>
    </div>

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
                document.getElementById('rgbOutput').value = 'Invalid HEX';
                return;
            }

            const r = parseInt(hex.substring(0, 2), 16);
            const g = parseInt(hex.substring(2, 4), 16);
            const b = parseInt(hex.substring(4, 6), 16);

            if (isNaN(r) || isNaN(g) || isNaN(b)) {
                document.getElementById('rgbOutput').value = 'Invalid HEX';
                return;
            }

            document.getElementById('rgbOutput').value = `rgb(${r}, ${g}, ${b})`;
            document.getElementById('colorPreview2').style.backgroundColor = `#${hex}`;
        }

        // Initialize
        rgbToHex();
    </script>
@endsection