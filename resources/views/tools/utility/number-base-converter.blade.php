@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Hero Section -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-blue-500 via-indigo-500 to-purple-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">
                    Universal Number Base Converter
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                    Convert numbers between any base from 2 to 36 - Binary, Octal, Decimal, Hexadecimal, and more!
                </p>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- Tool Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-blue-200 mb-8">
            <!-- Base Selectors -->
            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <!-- From Base -->
                <div>
                    <label for="fromBase" class="form-label text-base">From Base</label>
                    <select id="fromBase" onchange="updatePlaceholders()" class="form-input font-semibold text-lg">
                        <option value="2">Binary (Base 2)</option>
                        <option value="8">Octal (Base 8)</option>
                        <option value="10" selected>Decimal (Base 10)</option>
                        <option value="16">Hexadecimal (Base 16)</option>
                        <option value="3">Base 3</option>
                        <option value="4">Base 4</option>
                        <option value="5">Base 5</option>
                        <option value="6">Base 6</option>
                        <option value="7">Base 7</option>
                        <option value="9">Base 9</option>
                        <option value="11">Base 11</option>
                        <option value="12">Base 12</option>
                        <option value="13">Base 13</option>
                        <option value="14">Base 14</option>
                        <option value="15">Base 15</option>
                        <option value="17">Base 17</option>
                        <option value="18">Base 18</option>
                        <option value="19">Base 19</option>
                        <option value="20">Base 20</option>
                        <option value="21">Base 21</option>
                        <option value="22">Base 22</option>
                        <option value="23">Base 23</option>
                        <option value="24">Base 24</option>
                        <option value="25">Base 25</option>
                        <option value="26">Base 26</option>
                        <option value="27">Base 27</option>
                        <option value="28">Base 28</option>
                        <option value="29">Base 29</option>
                        <option value="30">Base 30</option>
                        <option value="31">Base 31</option>
                        <option value="32">Base 32</option>
                        <option value="33">Base 33</option>
                        <option value="34">Base 34</option>
                        <option value="35">Base 35</option>
                        <option value="36">Base 36</option>
                    </select>
                </div>

                <!-- To Base -->
                <div>
                    <label for="toBase" class="form-label text-base">To Base</label>
                    <select id="toBase" onchange="updatePlaceholders()" class="form-input font-semibold text-lg">
                        <option value="2">Binary (Base 2)</option>
                        <option value="8">Octal (Base 8)</option>
                        <option value="10">Decimal (Base 10)</option>
                        <option value="16" selected>Hexadecimal (Base 16)</option>
                        <option value="3">Base 3</option>
                        <option value="4">Base 4</option>
                        <option value="5">Base 5</option>
                        <option value="6">Base 6</option>
                        <option value="7">Base 7</option>
                        <option value="9">Base 9</option>
                        <option value="11">Base 11</option>
                        <option value="12">Base 12</option>
                        <option value="13">Base 13</option>
                        <option value="14">Base 14</option>
                        <option value="15">Base 15</option>
                        <option value="17">Base 17</option>
                        <option value="18">Base 18</option>
                        <option value="19">Base 19</option>
                        <option value="20">Base 20</option>
                        <option value="21">Base 21</option>
                        <option value="22">Base 22</option>
                        <option value="23">Base 23</option>
                        <option value="24">Base 24</option>
                        <option value="25">Base 25</option>
                        <option value="26">Base 26</option>
                        <option value="27">Base 27</option>
                        <option value="28">Base 28</option>
                        <option value="29">Base 29</option>
                        <option value="30">Base 30</option>
                        <option value="31">Base 31</option>
                        <option value="32">Base 32</option>
                        <option value="33">Base 33</option>
                        <option value="34">Base 34</option>
                        <option value="35">Base 35</option>
                        <option value="36">Base 36</option>
                    </select>
                </div>
            </div>

            <!-- Swap Button -->
            <div class="flex justify-center mb-6">
                <button onclick="swapBases()"
                    class="px-6 py-3 bg-purple-600 text-white rounded-xl hover:bg-purple-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                    </svg>
                    <span>Swap Bases</span>
                </button>
            </div>

            <!-- Quick Presets -->
            <div class="bg-gray-50 rounded-xl p-4 mb-6">
                <p class="text-sm font-semibold text-gray-700 mb-3">Quick Presets:</p>
                <div class="flex flex-wrap gap-2">
                    <button onclick="setPreset(10, 2)"
                        class="px-4 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-all font-medium text-sm">
                        Decimal Binary
                    </button>
                    <button onclick="setPreset(10, 16)"
                        class="px-4 py-2 bg-indigo-100 text-indigo-700 rounded-lg hover:bg-indigo-200 transition-all font-medium text-sm">
                        Decimal Hex
                    </button>
                    <button onclick="setPreset(2, 16)"
                        class="px-4 py-2 bg-purple-100 text-purple-700 rounded-lg hover:bg-purple-200 transition-all font-medium text-sm">
                        Binary Hex
                    </button>
                    <button onclick="setPreset(16, 10)"
                        class="px-4 py-2 bg-pink-100 text-pink-700 rounded-lg hover:bg-pink-200 transition-all font-medium text-sm">
                        Hex Decimal
                    </button>
                    <button onclick="setPreset(10, 8)"
                        class="px-4 py-2 bg-green-100 text-green-700 rounded-lg hover:bg-green-200 transition-all font-medium text-sm">
                        Decimal Octal
                    </button>
                </div>
            </div>

            <!-- Input/Output Grid -->
            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <!-- Input Column -->
                <div>
                    <label for="numberInput" class="form-label text-base" id="inputLabel">Enter Number (Base 10)</label>
                    <textarea id="numberInput" class="form-input font-mono text-sm min-h-[300px]"
                        placeholder="255"></textarea>
                </div>

                <!-- Output Column -->
                <div>
                    <label for="numberOutput" class="form-label text-base" id="outputLabel">Result (Base 16)</label>
                    <textarea id="numberOutput" class="form-input font-mono text-sm min-h-[300px]" readonly
                        placeholder="Result will appear here..."></textarea>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convertNumber()" class="btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>Convert Number</span>
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>Clear</span>
                </button>
                <button onclick="copyOutput()"
                    class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>Copy</span>
                </button>
            </div>

            <!-- Status Message -->
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>
        </div>

        <!-- SEO Content -->
        <div
            class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-3xl p-8 md:p-12 border-2 border-blue-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">Universal Number Base Converter</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Convert numbers between any base from 2 to 36
                </p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Our free Universal Number Base Converter allows you to convert numbers between any base from 2 to 36.
                Whether you need to convert binary to hexadecimal, decimal to octal, or any other combination, this tool
                makes it instant and easy. Perfect for programmers, students, and anyone working with different number
                systems. 100% free with client-side processing for complete privacy.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6"> What are Number Bases?</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                A number base (or radix) is the number of unique digits used to represent numbers in a positional numeral
                system. The most common bases are Binary (base 2), Octal (base 8), Decimal (base 10), and Hexadecimal (base
                16). This converter supports all bases from 2 to 36, using digits 0-9 and letters A-Z for higher bases.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6"> Features</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3"></div>
                    <h4 class="font-bold text-gray-900 mb-2">Instant Conversion</h4>
                    <p class="text-gray-600 text-sm">Convert between any bases in milliseconds</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3"></div>
                    <h4 class="font-bold text-gray-900 mb-2">Universal Support</h4>
                    <p class="text-gray-600 text-sm">All bases from 2 to 36 supported</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3"></div>
                    <h4 class="font-bold text-gray-900 mb-2">Quick Presets</h4>
                    <p class="text-gray-600 text-sm">One-click presets for common conversions</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3"></div>
                    <h4 class="font-bold text-gray-900 mb-2">Swap Bases</h4>
                    <p class="text-gray-600 text-sm">Instantly swap from and to bases</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3"></div>
                    <h4 class="font-bold text-gray-900 mb-2">Privacy First</h4>
                    <p class="text-gray-600 text-sm">All processing happens in your browser</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3"></div>
                    <h4 class="font-bold text-gray-900 mb-2">100% Free</h4>
                    <p class="text-gray-600 text-sm">No limits, no registration required</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6"> Common Use Cases</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3"> Programming</h4>
                    <p class="text-gray-700 leading-relaxed">Convert between number systems for low-level programming, bit
                        manipulation, and memory addresses
                    </p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3"> Education</h4>
                    <p class="text-gray-700 leading-relaxed">Learn and practice number system conversions for computer
                        science courses
                    </p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3"> Cryptography</h4>
                    <p class="text-gray-700 leading-relaxed">Work with hexadecimal representations of encrypted data and
                        hashes
                    </p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3"> Web Development</h4>
                    <p class="text-gray-700 leading-relaxed">Convert color codes, Unicode values, and other web-related
                        numbers
                    </p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6"> How to Use</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">1.</span>
                        <span><strong>Select Bases:</strong> Choose your "From Base" and "To Base" from the dropdowns
                            (2-36)</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">2.</span>
                        <span><strong>Use Presets:</strong> Or click a quick preset button for common conversions</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">3.</span>
                        <span><strong>Enter Number:</strong> Type your number in the input field</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">4.</span>
                        <span><strong>Convert:</strong> Click "Convert Number" to see the result</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">5.</span>
                        <span><strong>Copy Result:</strong> Click "Copy" to copy the converted number</span>
                    </li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6"> Conversion Examples</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <div class="space-y-4">
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Decimal to Binary:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">255 (Base 10) 11111111 (Base 2)
                        </p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Decimal to Hexadecimal:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">255 (Base 10) FF (Base 16)</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Binary to Hexadecimal:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">11111111 (Base 2) FF (Base 16)</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Decimal to Base 36:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">1000 (Base 10) RS (Base 36)</p>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6"> Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What is the highest base supported?</h4>
                    <p class="text-gray-700 leading-relaxed">This converter supports all bases from 2 to 36. Base 36 uses
                        digits 0-9 and letters A-Z, providing 36 unique symbols.
                    </p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">How do bases higher than 10 work?</h4>
                    <p class="text-gray-700 leading-relaxed">Bases higher than 10 use letters A-Z to represent values 10-35.
                        For example, in hexadecimal (base 16), A=10, B=11, C=12, D=13, E=14, F=15.
                    </p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I convert negative numbers?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes, the converter handles negative numbers. The negative sign
                        is preserved during conversion.
                    </p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is my data secure?</h4>
                    <p class="text-gray-700 leading-relaxed">Absolutely! All conversions happen entirely in your browser
                        using JavaScript. Your numbers never leave your device or get sent to any server.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function getBaseName(base) {
            const names = {
                2: 'Binary',
                8: 'Octal',
                10: 'Decimal',
                16: 'Hexadecimal'
            };
            return names[base] || `Base ${base}`;
        }

        function updatePlaceholders() {
            const fromBase = parseInt(document.getElementById('fromBase').value);
            const toBase = parseInt(document.getElementById('toBase').value);
            const inputLabel = document.getElementById('inputLabel');
            const outputLabel = document.getElementById('outputLabel');
            const numberInput = document.getElementById('numberInput');

            inputLabel.textContent = `Enter Number (Base ${fromBase})`;
            outputLabel.textContent = `Result (Base ${toBase})`;

            // Update placeholder based on from base
            const placeholders = {
                2: '11111111',
                8: '377',
                10: '255',
                16: 'FF'
            };
            numberInput.placeholder = placeholders[fromBase] || '100';
        }

        function setPreset(from, to) {
            document.getElementById('fromBase').value = from;
            document.getElementById('toBase').value = to;
            updatePlaceholders();
            clearAll();
        }

        function swapBases() {
            const fromBase = document.getElementById('fromBase');
            const toBase = document.getElementById('toBase');
            const temp = fromBase.value;
            fromBase.value = toBase.value;
            toBase.value = temp;
            updatePlaceholders();

            // Swap input/output if there's content
            const input = document.getElementById('numberInput');
            const output = document.getElementById('numberOutput');
            if (output.value) {
                const tempValue = input.value;
                input.value = output.value;
                output.value = tempValue;
            }
        }

        function getValidChars(base) {
            const digits = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            return digits.substring(0, base);
        }

        function convertNumber() {
            const input = document.getElementById('numberInput').value.trim().toUpperCase();
            const output = document.getElementById('numberOutput');
            const fromBase = parseInt(document.getElementById('fromBase').value);
            const toBase = parseInt(document.getElementById('toBase').value);

            if (!input) {
                showStatus('Please enter a number to convert', 'error');
                return;
            }

            // Handle negative numbers
            const isNegative = input.startsWith('-');
            const cleanInput = isNegative ? input.substring(1) : input;

            // Validate input for the selected base
            const validChars = getValidChars(fromBase);
            const validPattern = new RegExp(`^[${validChars}]+$`, 'i');

            if (!validPattern.test(cleanInput)) {
                showStatus(`Invalid input for base ${fromBase}. Only characters ${validChars} are allowed.`, 'error');
                return;
            }

            try {
                // Convert from source base to decimal, then to target base
                const decimal = parseInt(cleanInput, fromBase);
                if (isNaN(decimal)) {
                    showStatus('Invalid number format', 'error');
                    return;
                }

                let result = decimal.toString(toBase).toUpperCase();
                if (isNegative) result = '-' + result;

                output.value = result;
                showStatus(`✓ Converted from base ${fromBase} to base ${toBase} successfully`, 'success');
            } catch (error) {
                showStatus('✗ Error: ' + error.message, 'error');
            }
        }

        function clearAll() {
            document.getElementById('numberInput').value = '';
            document.getElementById('numberOutput').value = '';
            document.getElementById('statusMessage').classList.add('hidden');
        }

        function copyOutput() {
            const output = document.getElementById('numberOutput');
            if (!output.value) {
                showStatus('No output to copy', 'error');
                return;
            }
            output.select();
            document.execCommand('copy');
            showStatus('✓ Copied to clipboard', 'success');
        }

        function showStatus(message, type) {
            const statusMessage = document.getElementById('statusMessage');
            statusMessage.textContent = message;
            statusMessage.classList.remove('hidden', 'bg-green-100', 'text-green-800', 'bg-red-100', 'text-red-800', 'border-green-300', 'border-red-300');

            if (type === 'success') {
                statusMessage.classList.add('bg-green-100', 'text-green-800', 'border-2', 'border-green-300');
            } else {
                statusMessage.classList.add('bg-red-100', 'text-red-800', 'border-2', 'border-red-300');
            }
        }

        // Allow Enter key to process
        document.getElementById('numberInput').addEventListener('keypress', function (e) {
            if (e.key === 'Enter' && e.ctrlKey) {
                convertNumber();
            }
        });

        // Initialize placeholders
        updatePlaceholders();
    </script>
@endsection