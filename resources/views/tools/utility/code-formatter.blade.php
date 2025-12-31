@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- SEO-Optimized Header with Gradient Background -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-violet-500 via-purple-500 to-indigo-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">
                    Code Formatter
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                    Format, beautify, and minify code in multiple programming languages - 100% free and secure!
                </p>

                @include('components.hero-actions')

            </div>
        </div>

        <!-- Code Formatter Tool -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-3">
                    Select Programming Language
                </label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                    <button type="button" onclick="selectLanguage('html')"
                        class="language-btn active flex flex-col items-center gap-2 p-4 border-2 border-violet-500 bg-violet-50 rounded-xl hover:bg-violet-100 transition-all duration-200 group"
                        data-lang="html">
                        <svg class="w-8 h-8 text-violet-600" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 17.56l-6.94 3.64 1.33-7.74L.78 8.1l7.78-1.13L12 0l3.44 6.97 7.78 1.13-5.61 5.36 1.33 7.74z" />
                        </svg>
                        <span class="font-semibold text-violet-700">HTML</span>
                    </button>
                    <button type="button" onclick="selectLanguage('css')"
                        class="language-btn flex flex-col items-center gap-2 p-4 border-2 border-gray-200 bg-white rounded-xl hover:border-blue-500 hover:bg-blue-50 transition-all duration-200 group"
                        data-lang="css">
                        <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M4.192 3.143h15.615l-1.42 16.034-6.404 1.812-6.369-1.813L4.192 3.143zM16.9 6.424l-9.8-.002.158 1.949 7.529.002-.189 2.02H9.66l.179 1.913h4.597l-.272 2.62-2.164.598-2.197-.603-.141-1.569h-1.94l.216 2.867L12 17.484l3.995-1.137.905-9.923z" />
                        </svg>
                        <span class="font-semibold text-gray-700 group-hover:text-blue-700">CSS</span>
                    </button>
                    <button type="button" onclick="selectLanguage('javascript')"
                        class="language-btn flex flex-col items-center gap-2 p-4 border-2 border-gray-200 bg-white rounded-xl hover:border-yellow-500 hover:bg-yellow-50 transition-all duration-200 group"
                        data-lang="javascript">
                        <svg class="w-8 h-8 text-yellow-600" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M3 3h18v18H3V3zm16.525 13.707c-.131-.821-.666-1.511-2.252-2.155-.552-.259-1.165-.438-1.349-.854-.068-.248-.078-.382-.034-.529.113-.484.687-.629 1.137-.495.293.09.563.315.732.676.775-.507.775-.507 1.316-.844-.203-.314-.304-.451-.439-.586-.473-.528-1.103-.798-2.126-.775l-.528.067c-.507.124-.991.395-1.283.754-.855.968-.611 2.655.427 3.354 1.023.765 2.521.933 2.712 1.653.18.878-.652 1.159-1.475 1.058-.607-.136-.945-.439-1.316-1.002l-1.372.788c.157.359.337.517.607.832 1.305 1.316 4.568 1.249 5.153-.754.021-.067.18-.528.056-1.237l.034.049zm-6.737-5.434h-1.686c0 1.453-.007 2.898-.007 4.354 0 .924.047 1.772-.104 2.033-.247.517-.886.451-1.175.359-.297-.146-.448-.349-.623-.641-.047-.078-.082-.146-.095-.146l-1.368.844c.229.473.563.879.994 1.137.641.383 1.502.507 2.404.305.588-.17 1.095-.519 1.358-1.059.384-.697.302-1.553.299-2.509.008-1.541 0-3.083 0-4.635l.003-.042z" />
                        </svg>
                        <span class="font-semibold text-gray-700 group-hover:text-yellow-700">JavaScript</span>
                    </button>
                    <button type="button" onclick="selectLanguage('json')"
                        class="language-btn flex flex-col items-center gap-2 p-4 border-2 border-gray-200 bg-white rounded-xl hover:border-green-500 hover:bg-green-50 transition-all duration-200 group"
                        data-lang="json">
                        <svg class="w-8 h-8 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M5.843 18.157c.664 0 1.202-.538 1.202-1.202s-.538-1.202-1.202-1.202-1.202.538-1.202 1.202.538 1.202 1.202 1.202zm12.314 0c.664 0 1.202-.538 1.202-1.202s-.538-1.202-1.202-1.202-1.202.538-1.202 1.202.538 1.202 1.202 1.202zM7.5 5.5h9v13h-9z" />
                        </svg>
                        <span class="font-semibold text-gray-700 group-hover:text-green-700">JSON</span>
                    </button>
                    <button type="button" onclick="selectLanguage('php')"
                        class="language-btn flex flex-col items-center gap-2 p-4 border-2 border-gray-200 bg-white rounded-xl hover:border-purple-500 hover:bg-purple-50 transition-all duration-200 group"
                        data-lang="php">
                        <svg class="w-8 h-8 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M7.01 10.207h-.944l-.515 2.648h.838c.556 0 .97-.105 1.242-.314.272-.21.455-.559.55-1.049.092-.47.05-.802-.124-.995-.175-.193-.523-.29-1.047-.29zM12 5.688C5.373 5.688 0 8.514 0 12s5.373 6.313 12 6.313S24 15.486 24 12s-5.373-6.312-12-6.312zm-3.26 7.451c-.261.25-.575.438-.917.551-.336.108-.765.164-1.285.164H5.357l-.327 1.681H3.652l1.23-6.326h2.65c.797 0 1.378.209 1.744.628.366.418.476 1.002.33 1.752a2.836 2.836 0 0 1-.305.847c-.143.255-.33.49-.551.703zm4.024.715l.543-2.799c.063-.318.039-.536-.068-.651-.107-.116-.336-.174-.687-.174h-.802l-.695 3.624H9.667l1.23-6.326h1.388l-.419 2.156h.92c.673 0 1.137.119 1.392.356.255.237.33.652.224 1.245l-.596 3.07h-1.391zm4.413-4.715h-1.084l.506-2.61h1.388l-.506 2.61zm-1.506 4.715L16.9 7.528h1.388l-1.23 6.326h-1.387z" />
                        </svg>
                        <span class="font-semibold text-gray-700 group-hover:text-purple-700">PHP</span>
                    </button>
                    <button type="button" onclick="selectLanguage('python')"
                        class="language-btn flex flex-col items-center gap-2 p-4 border-2 border-gray-200 bg-white rounded-xl hover:border-indigo-500 hover:bg-indigo-50 transition-all duration-200 group"
                        data-lang="python">
                        <svg class="w-8 h-8 text-indigo-600" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M14.25.18l.9.2.73.26.59.3.45.32.34.34.25.34.16.33.1.3.04.26.02.2-.01.13V8.5l-.05.63-.13.55-.21.46-.26.38-.3.31-.33.25-.35.19-.35.14-.33.1-.3.07-.26.04-.21.02H8.77l-.69.05-.59.14-.5.22-.41.27-.33.32-.27.35-.2.36-.15.37-.1.35-.07.32-.04.27-.02.21v3.06H3.17l-.21-.03-.28-.07-.32-.12-.35-.18-.36-.26-.36-.36-.35-.46-.32-.59-.28-.73-.21-.88-.14-1.05-.05-1.23.06-1.22.16-1.04.24-.87.32-.71.36-.57.4-.44.42-.33.42-.24.4-.16.36-.1.32-.05.24-.01h.16l.06.01h8.16v-.83H6.18l-.01-2.75-.02-.37.05-.34.11-.31.17-.28.25-.26.31-.23.38-.2.44-.18.51-.15.58-.12.64-.1.71-.06.77-.04.84-.02 1.27.05zm-6.3 1.98l-.23.33-.08.41.08.41.23.34.33.22.41.09.41-.09.33-.22.23-.34.08-.41-.08-.41-.23-.33-.33-.22-.41-.09-.41.09zm13.09 3.95l.28.06.32.12.35.18.36.27.36.35.35.47.32.59.28.73.21.88.14 1.04.05 1.23-.06 1.23-.16 1.04-.24.86-.32.71-.36.57-.4.45-.42.33-.42.24-.4.16-.36.09-.32.05-.24.02-.16-.01h-8.22v.82h5.84l.01 2.76.02.36-.05.34-.11.31-.17.29-.25.25-.31.24-.38.2-.44.17-.51.15-.58.13-.64.09-.71.07-.77.04-.84.01-1.27-.04-1.07-.14-.9-.2-.73-.25-.59-.3-.45-.33-.34-.34-.25-.34-.16-.33-.1-.3-.04-.25-.02-.2.01-.13v-5.34l.05-.64.13-.54.21-.46.26-.38.3-.32.33-.24.35-.2.35-.14.33-.1.3-.06.26-.04.21-.02.13-.01h5.84l.69-.05.59-.14.5-.21.41-.28.33-.32.27-.35.2-.36.15-.36.1-.35.07-.32.04-.28.02-.21V6.07h2.09l.14.01zm-6.47 14.25l-.23.33-.08.41.08.41.23.33.33.23.41.08.41-.08.33-.23.23-.33.08-.41-.08-.41-.23-.33-.33-.23-.41-.08-.41.08z" />
                        </svg>
                        <span class="font-semibold text-gray-700 group-hover:text-indigo-700">Python</span>
                    </button>
                    <button type="button" onclick="selectLanguage('java')"
                        class="language-btn flex flex-col items-center gap-2 p-4 border-2 border-gray-200 bg-white rounded-xl hover:border-red-500 hover:bg-red-50 transition-all duration-200 group"
                        data-lang="java">
                        <svg class="w-8 h-8 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M8.851 18.56s-.917.534.653.714c1.902.218 2.874.187 4.969-.211 0 0 .552.346 1.321.646-4.699 2.013-10.633-.118-6.943-1.149M8.276 15.933s-1.028.761.542.924c2.032.209 3.636.227 6.413-.308 0 0 .384.389.987.602-5.679 1.661-12.007.13-7.942-1.218M13.116 11.475c1.158 1.333-.304 2.533-.304 2.533s2.939-1.518 1.589-3.418c-1.261-1.772-2.228-2.652 3.007-5.688 0-.001-8.216 2.051-4.292 6.573M19.33 20.504s.679.559-.747.991c-2.712.822-11.288 1.069-13.669.033-.856-.373.75-.89 1.254-.998.527-.114.828-.093.828-.093-.953-.671-6.156 1.317-2.643 1.887 9.58 1.553 17.462-.7 14.977-1.82M9.292 13.21s-4.362 1.036-1.544 1.412c1.189.159 3.561.123 5.77-.062 1.806-.152 3.618-.477 3.618-.477s-.637.272-1.098.587c-4.429 1.165-12.986.623-10.522-.568 2.082-1.006 3.776-.892 3.776-.892M17.116 17.584c4.503-2.34 2.421-4.589.968-4.285-.355.074-.515.138-.515.138s.132-.207.385-.297c2.875-1.011 5.086 2.981-.928 4.562 0-.001.07-.062.09-.118M14.401 0s2.494 2.494-2.365 6.33c-3.896 3.077-.888 4.832-.001 6.836-2.274-2.053-3.943-3.858-2.824-5.539 1.644-2.469 6.197-3.665 5.19-7.627M9.734 23.924c4.322.277 10.959-.153 11.116-2.198 0 0-.302.775-3.572 1.391-3.688.694-8.239.613-10.937.168 0-.001.553.457 3.393.639" />
                        </svg>
                        <span class="font-semibold text-gray-700 group-hover:text-red-700">Java</span>
                    </button>
                    <button type="button" onclick="selectLanguage('cpp')"
                        class="language-btn flex flex-col items-center gap-2 p-4 border-2 border-gray-200 bg-white rounded-xl hover:border-cyan-500 hover:bg-cyan-50 transition-all duration-200 group"
                        data-lang="cpp">
                        <svg class="w-8 h-8 text-cyan-600" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M22.394 6c-.167-.29-.398-.543-.652-.69L12.926.22c-.509-.294-1.34-.294-1.848 0L2.26 5.31c-.508.293-.923 1.013-.923 1.6v10.18c0 .294.104.62.271.91.167.29.398.543.652.69l8.816 5.09c.508.293 1.34.293 1.848 0l8.816-5.09c.254-.147.485-.4.652-.69.167-.29.27-.616.27-.91V6.91c.003-.294-.1-.62-.268-.91zM12 19.11c-3.92 0-7.109-3.19-7.109-7.11 0-3.92 3.19-7.11 7.11-7.11a7.133 7.133 0 016.156 3.553l-3.076 1.78a3.567 3.567 0 00-3.08-1.78A3.56 3.56 0 008.444 12 3.56 3.56 0 0012 15.555a3.57 3.57 0 003.08-1.778l3.078 1.78A7.135 7.135 0 0112 19.11zm7.11-6.715h-.79v.79h-.79v-.79h-.79v-.79h.79v-.79h.79v.79h.79v.79zm2.962 0h-.79v.79h-.79v-.79h-.79v-.79h.79v-.79h.79v.79h.79v.79z" />
                        </svg>
                        <span class="font-semibold text-gray-700 group-hover:text-cyan-700">C++</span>
                    </button>
                </div>
                <input type="hidden" id="selectedLanguage" value="html">
            </div>

            <div class="mb-6">
                <label for="codeInput" class="block text-sm font-semibold text-gray-700 mb-2">
                    Code Input
                </label>
                <textarea id="codeInput"
                    class="w-full h-64 p-4 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-violet-500 focus:border-transparent font-mono text-sm"
                    placeholder="Paste your code here..."></textarea>
            </div>

            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="formatCode()"
                    class="px-6 py-2 bg-violet-600 text-white rounded-lg hover:bg-violet-700 transition-colors duration-200 font-semibold">
                    Beautify Code
                </button>
                <button onclick="minifyCode()"
                    class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors duration-200">
                    Minify Code
                </button>
                <button onclick="clearCode()"
                    class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors duration-200">
                    Clear
                </button>
                <button onclick="loadSample()"
                    class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors duration-200">
                    Load Sample
                </button>
                <button onclick="copyCode()"
                    class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200">
                    Copy Output
                </button>
            </div>

            <!-- Status Message -->
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl"></div>

            <!-- Output -->
            <div id="outputSection" class="hidden">
                <label for="codeOutput" class="block text-sm font-semibold text-gray-700 mb-2">
                    Formatted Code
                </label>
                <textarea id="codeOutput" readonly
                    class="w-full h-64 p-4 border-2 border-gray-300 rounded-xl bg-gray-50 font-mono text-sm"
                    placeholder="Formatted code will appear here..."></textarea>
            </div>
        </div>

        <!-- SEO Content Section -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">What is a Code Formatter?</h2>
            <p class="text-gray-700 mb-4">
                A Code Formatter is an essential tool for developers that automatically formats and beautifies source code
                according to standard conventions. Our free online code formatter supports multiple programming languages
                including HTML, CSS, JavaScript, PHP, Python, Java, C++, and JSON. It helps you maintain clean, readable
                code by applying consistent indentation, spacing, and line breaks. Whether you're cleaning up minified code,
                standardizing team code style, or preparing code for documentation, our formatter makes it easy.
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Why Use Our Code Formatter?</h2>
            <p class="text-gray-700 mb-4">
                Our code formatter offers comprehensive features for multiple programming languages. It instantly beautifies
                messy or minified code with proper indentation and formatting. The minify feature removes unnecessary
                whitespace and comments to reduce file size for production. Support for 8 popular languages means you can
                format all your code in one place. All processing happens in your browser, ensuring your code remains
                private and secure. No installation or registration required - just paste your code and format it instantly.
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Supported Languages</h2>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
                <li><strong>HTML:</strong> Format HTML markup with proper indentation and structure</li>
                <li><strong>CSS:</strong> Beautify CSS stylesheets with organized properties</li>
                <li><strong>JavaScript:</strong> Format JS code with consistent spacing and brackets</li>
                <li><strong>JSON:</strong> Pretty-print JSON data with proper indentation</li>
                <li><strong>PHP:</strong> Format PHP code following standard conventions</li>
                <li><strong>Python:</strong> Organize Python code with proper indentation</li>
                <li><strong>Java:</strong> Format Java code with standard style guidelines</li>
                <li><strong>C++:</strong> Beautify C++ code with consistent formatting</li>
            </ul>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Key Features</h2>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
                <li><strong>Multi-Language Support:</strong> Format code in 8 popular programming languages</li>
                <li><strong>Beautify Code:</strong> Add proper indentation, spacing, and line breaks</li>
                <li><strong>Minify Code:</strong> Remove whitespace to reduce file size</li>
                <li><strong>Instant Results:</strong> Format code in real-time without delays</li>
                <li><strong>Copy Output:</strong> Easily copy formatted code to clipboard</li>
                <li><strong>Sample Code:</strong> Load example code for each language</li>
                <li><strong>Secure & Private:</strong> All processing happens in your browser</li>
                <li><strong>Free to Use:</strong> No registration or payment required</li>
            </ul>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">How to Use the Code Formatter</h2>
            <ol class="list-decimal list-inside text-gray-700 space-y-2 mb-4">
                <li>Select your programming language from the dropdown</li>
                <li>Paste or type your code into the input field</li>
                <li>Click "Beautify Code" to format with proper indentation</li>
                <li>Click "Minify Code" to compress and remove whitespace</li>
                <li>Copy the formatted code using the "Copy Output" button</li>
                <li>Click "Load Sample" to see example code for the selected language</li>
            </ol>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Common Use Cases</h2>
            <p class="text-gray-700 mb-4">
                Code formatters are indispensable for modern software development. Developers use them to clean up minified
                production code for debugging. Teams use formatters to enforce consistent code style across projects. When
                reviewing code, formatters make it easier to read and understand complex logic. Students learning
                programming can use formatters to see proper code structure. Before committing code to version control,
                formatters ensure consistent formatting. When preparing code for documentation or tutorials, formatters make
                code more readable and professional.
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Code Formatting Best Practices</h2>
            <p class="text-gray-700 mb-4">
                Following code formatting best practices improves code quality and maintainability. Use consistent
                indentation (2 or 4 spaces) throughout your codebase. Keep line length reasonable (80-120 characters) for
                better readability. Use meaningful variable and function names that don't require excessive comments. Group
                related code together and separate logical sections with blank lines. Follow language-specific style guides
                (PEP 8 for Python, PSR for PHP, etc.). Use formatters automatically before committing code to maintain
                consistency. These practices lead to more maintainable and collaborative codebases.
            </p>
        </div>

        <!-- FAQ Section -->
        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl shadow-xl p-6 md:p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Frequently Asked Questions</h2>

            <div class="space-y-4">
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Is this code formatter free to use?</h3>
                    <p class="text-gray-700">
                        Yes, our code formatter is completely free with no limitations. You can format as much code as you
                        need in any supported language. There are no registration requirements, usage limits, or hidden
                        fees.
                    </p>
                </div>

                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Is my code stored or shared?</h3>
                    <p class="text-gray-700">
                        No, all code formatting happens entirely in your browser. Your code is never sent to our servers,
                        stored, or shared with anyone. When you close the page, your code is gone. This ensures complete
                        privacy and security for proprietary or sensitive code.
                    </p>
                </div>

                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">What's the difference between beautify and minify?</h3>
                    <p class="text-gray-700">
                        Beautify formats code with proper indentation, spacing, and line breaks, making it easy to read and
                        maintain. Minify removes all unnecessary whitespace, comments, and line breaks to create compact
                        code that's smaller in file size. Use beautify for development and minify for production deployment.
                    </p>
                </div>

                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Can this formatter fix syntax errors?</h3>
                    <p class="text-gray-700">
                        No, code formatters only adjust spacing, indentation, and line breaks. They don't fix syntax errors
                        or logical bugs in your code. If your code has syntax errors, you'll need to fix those manually
                        before formatting. However, proper formatting can make it easier to spot and fix errors.
                    </p>
                </div>

                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Which programming languages are supported?</h3>
                    <p class="text-gray-700">
                        Our formatter currently supports HTML, CSS, JavaScript, JSON, PHP, Python, Java, and C++. These
                        cover the most popular web development and general-purpose programming languages. We're continuously
                        working to add support for more languages based on user demand.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const codeInput = document.getElementById('codeInput');
        const codeOutput = document.getElementById('codeOutput');
        const statusMessage = document.getElementById('statusMessage');
        const outputSection = document.getElementById('outputSection');

        function selectLanguage(lang) {
            // Update hidden input
            document.getElementById('selectedLanguage').value = lang;

            // Update button styles
            document.querySelectorAll('.language-btn').forEach(btn => {
                if (btn.dataset.lang === lang) {
                    btn.classList.add('active', 'border-violet-500', 'bg-violet-50');
                    btn.classList.remove('border-gray-200', 'bg-white');
                } else {
                    btn.classList.remove('active', 'border-violet-500', 'bg-violet-50');
                    btn.classList.add('border-gray-200', 'bg-white');
                }
            });

            // Load sample for selected language
            loadSample();
        }

        function showMessage(message, type) {
            statusMessage.className = `mb-6 p-4 rounded-xl ${type === 'success' ? 'bg-green-100 text-green-800 border-2 border-green-300' : 'bg-red-100 text-red-800 border-2 border-red-300'}`;
            statusMessage.textContent = message;
            statusMessage.classList.remove('hidden');
        }

        function hideMessage() {
            statusMessage.classList.add('hidden');
        }

        function formatCode() {
            const code = codeInput.value.trim();
            if (!code) {
                showMessage('Please enter code to format', 'error');
                return;
            }

            const lang = document.getElementById('selectedLanguage').value;
            let formatted = '';

            try {
                if (lang === 'json') {
                    const parsed = JSON.parse(code);
                    formatted = JSON.stringify(parsed, null, 2);
                } else if (lang === 'html') {
                    formatted = beautifyHTML(code);
                } else if (lang === 'css') {
                    formatted = beautifyCSS(code);
                } else if (lang === 'javascript') {
                    formatted = beautifyJS(code);
                } else {
                    formatted = addIndentation(code);
                }

                codeOutput.value = formatted;
                outputSection.classList.remove('hidden');
                showMessage('✓ Code formatted successfully!', 'success');
            } catch (error) {
                showMessage(`✗ Error formatting code: ${error.message}`, 'error');
            }
        }

        function minifyCode() {
            const code = codeInput.value.trim();
            if (!code) {
                showMessage('Please enter code to minify', 'error');
                return;
            }

            const lang = document.getElementById('selectedLanguage').value;
            let minified = '';

            try {
                if (lang === 'json') {
                    const parsed = JSON.parse(code);
                    minified = JSON.stringify(parsed);
                } else {
                    // Simple minification - remove extra whitespace
                    minified = code.replace(/\s+/g, ' ').trim();
                }

                codeOutput.value = minified;
                outputSection.classList.remove('hidden');
                showMessage('✓ Code minified successfully!', 'success');
            } catch (error) {
                showMessage(`✗ Error minifying code: ${error.message}`, 'error');
            }
        }

        function beautifyHTML(html) {
            // Improved HTML beautification
            let formatted = html.replace(/\>\s+\</g, '\>\<');
            formatted = formatted.replace(/\>\</g, '\>\n\<');
            const lines = formatted.split('\n');
            let indent = 0;
            let result = '';

            lines.forEach(line => {
                const trimmed = line.trim();
                if (!trimmed) return;

                // Decrease indent for closing tags
                if (trimmed.startsWith('\</')) {
                    indent = Math.max(0, indent - 1);
                }

                result += '  '.repeat(indent) + trimmed + '\n';

                // Increase indent for opening tags (not self-closing or inline)
                if (trimmed.startsWith('\<') && !trimmed.startsWith('\</') && !trimmed.endsWith('/\>') && !trimmed.match(/\<\/\w+\>$/)) {
                    if (!trimmed.match(/\<(br|hr|img|input|meta|link|area|base|col|embed|param|source|track|wbr)/i)) {
                        indent++;
                    }
                }
            });

            return result.trim();
        }

        function beautifyCSS(css) {
            // Remove extra whitespace
            let formatted = css.replace(/\s+/g, ' ').trim();
            // Add line breaks and indentation
            formatted = formatted.replace(/\{/g, ' {\n  ');
            formatted = formatted.replace(/\}/g, '\n}\n\n');
            formatted = formatted.replace(/;(?!\s*})/g, ';\n  ');
            // Clean up multiple line breaks
            formatted = formatted.replace(/\n{3,}/g, '\n\n');
            formatted = formatted.replace(/\n\s+\n/g, '\n');
            // Remove space before closing brace
            formatted = formatted.replace(/\s+\n}/g, '\n}');
            return formatted.trim();
        }

        function beautifyJS(js) {
            // Remove extra whitespace
            let formatted = js.replace(/\s+/g, ' ').trim();
            // Add line breaks for braces
            formatted = formatted.replace(/\{/g, ' {\n  ');
            formatted = formatted.replace(/\}/g, '\n}\n');
            // Add line breaks after semicolons (but not in for loops)
            formatted = formatted.replace(/;(?!\s*[\)])/g, ';\n  ');
            // Clean up
            formatted = formatted.replace(/\n\s+\n/g, '\n');
            formatted = formatted.replace(/\s+\n}/g, '\n}');
            return formatted.trim();
        }

        function addIndentation(code) {
            // First, add line breaks after semicolons and braces
            let formatted = code.replace(/\s+/g, ' ').trim();
            formatted = formatted.replace(/\{/g, ' {\n');
            formatted = formatted.replace(/\}/g, '\n}\n');
            formatted = formatted.replace(/;/g, ';\n');

            const lines = formatted.split('\n');
            let indent = 0;
            let result = '';

            lines.forEach(line => {
                const trimmed = line.trim();
                if (!trimmed) return;

                // Decrease indent for closing braces/brackets
                if (trimmed.startsWith('}') || trimmed.startsWith(']') || trimmed.startsWith(')')) {
                    indent = Math.max(0, indent - 1);
                }

                result += '  '.repeat(indent) + trimmed + '\n';

                // Increase indent for opening braces/brackets
                if (trimmed.endsWith('{') || trimmed.endsWith('[') || trimmed.endsWith('(')) {
                    indent++;
                }
            });

            return result.trim();
        }

        function clearCode() {
            codeInput.value = '';
            codeOutput.value = '';
            hideMessage();
            outputSection.classList.add('hidden');
        }

        function copyCode() {
            if (!codeOutput.value) {
                showMessage('No formatted code to copy', 'error');
                return;
            }

            codeOutput.select();
            document.execCommand('copy');
            showMessage('✓ Code copied to clipboard!', 'success');
        }

        function loadSample() {
            const lang = document.getElementById('selectedLanguage').value;
            const samples = {
                html: '<div class="container"><h1>Hello World</h1><p>This is a sample HTML document.</p></div>',
                css: 'body{margin:0;padding:0;font-family:Arial,sans-serif}.container{max-width:1200px;margin:0 auto}',
                javascript: 'function greet(name){return "Hello, "+name+"!";}console.log(greet("World"));',
                json: '{"name":"John Doe","age":30,"city":"New York","hobbies":["reading","coding","gaming"]}',
                php: '<?php function add($a, $b)
    {
        return $a + $b;
    }
    echo add(5, 10);?>',
                python: 'def greet(name):\nreturn f"Hello, {name}!"\nprint(greet("World"))',
                java: 'public class Main{public static void main(String[]args){System.out.println("Hello World");}}',
                cpp: '#include<iostream>\nusing namespace std;int main(){cout<<"Hello World";return 0;}'
            };

            codeInput.value = samples[lang] || '';
            hideMessage();
            outputSection.classList.add('hidden');
        }

        // Load sample on page load
        window.addEventListener('load', loadSample);
    </script>
@endsection