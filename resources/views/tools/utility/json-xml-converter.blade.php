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
                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">
                    JSON ↔ XML Converter
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                    Convert JSON to XML and XML to JSON - 100% free, instant, and accurate!
                </p>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- Tool Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-blue-200 mb-8">
            <!-- Mode Selector -->
            <div class="flex gap-3 mb-6">
                <button onclick="setMode('encode')" id="encodeBtn"
                    class="flex-1 px-6 py-3 bg-blue-600 text-white rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    JSON to XML
                </button>
                <button onclick="setMode('decode')" id="decodeBtn"
                    class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    </svg>
                    XML to JSON
                </button>
            </div>

            <!-- Input/Output Grid -->
            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <!-- Input Column -->
                <div>
                    <label for="numberInput" class="form-label text-base" id="inputLabel">Enter JSON Data</label>
                    <textarea id="numberInput" class="form-input font-mono text-sm min-h-[300px]"
                        placeholder='{"name": "John", "age": 30}'></textarea>
                </div>

                <!-- Output Column -->
                <div>
                    <label for="numberOutput" class="form-label text-base" id="outputLabel">XML Result</label>
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
                    <span id="processBtn">Convert to XML</span>
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
                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">Free JSON ↔ XML Converter</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Transform data between JSON and XML formats seamlessly
                </p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Our JSON ↔ XML Converter enables instant bidirectional transformation between JSON and XML data structures.
                Perfect for API integrations, data migration, and cross-platform compatibility. Process everything locally
                in your browser for complete privacy and security.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🔄 Understanding JSON and XML</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                JSON (JavaScript Object Notation) is a lightweight, human-readable data format widely used in modern web
                APIs. XML (eXtensible Markup Language) is a structured markup language common in enterprise systems and
                legacy applications. Both serve data exchange purposes but with different syntax and use cases.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ Key Features</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">Lightning Fast</h4>
                    <p class="text-gray-600 text-sm">Convert complex data structures in milliseconds</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔄</div>
                    <h4 class="font-bold text-gray-900 mb-2">Two-Way Conversion</h4>
                    <p class="text-gray-600 text-sm">Switch between JSON and XML effortlessly</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">Client-Side Processing</h4>
                    <p class="text-gray-600 text-sm">Your data never leaves your browser</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📐</div>
                    <h4 class="font-bold text-gray-900 mb-2">Format Preservation</h4>
                    <p class="text-gray-600 text-sm">Maintains data structure and attributes</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🆓</div>
                    <h4 class="font-bold text-gray-900 mb-2">Completely Free</h4>
                    <p class="text-gray-600 text-sm">Unlimited conversions, no sign-up needed</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📋</div>
                    <h4 class="font-bold text-gray-900 mb-2">Quick Copy</h4>
                    <p class="text-gray-600 text-sm">One-click clipboard copying</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Popular Applications</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🌐 API Integration</h4>
                    <p class="text-gray-700 leading-relaxed">Convert between JSON REST APIs and XML SOAP services for
                        seamless system integration</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📊 Data Migration</h4>
                    <p class="text-gray-700 leading-relaxed">Transform legacy XML databases to modern JSON-based systems
                        during platform upgrades</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔧 Configuration Files</h4>
                    <p class="text-gray-700 leading-relaxed">Convert application configs between XML and JSON formats for
                        different environments</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📱 Mobile Development</h4>
                    <p class="text-gray-700 leading-relaxed">Adapt server responses from XML to JSON for mobile app
                        consumption</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🧪 Testing & Debugging</h4>
                    <p class="text-gray-700 leading-relaxed">Validate data transformations and troubleshoot format-specific
                        issues</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📄 Document Processing</h4>
                    <p class="text-gray-700 leading-relaxed">Handle XML documents in JSON-based workflows and vice versa</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📚 Usage Guide</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">1.</span>
                        <span><strong>Select Direction:</strong> Choose "JSON to XML" or "XML to JSON" mode</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">2.</span>
                        <span><strong>Paste Data:</strong> Input your JSON object or XML document</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">3.</span>
                        <span><strong>Convert:</strong> Click the conversion button to transform your data</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">4.</span>
                        <span><strong>Review Output:</strong> Examine the converted result in the output panel</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">5.</span>
                        <span><strong>Copy & Use:</strong> Copy the result to your clipboard for immediate use</span>
                    </li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 Conversion Samples</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <div class="space-y-4">
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Simple Object:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">JSON: {"name": "John"} → XML:
                            &lt;root&gt;&lt;name&gt;John&lt;/name&gt;&lt;/root&gt;</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Nested Structure:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">JSON: {"user": {"id": 1, "name":
                            "Jane"}} → Nested XML elements</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Array Handling:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">JSON arrays convert to multiple
                            XML elements with the same tag name</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Reverse Conversion:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">XML:
                            &lt;item&gt;Value&lt;/item&gt; → JSON: {"item": "Value"}</p>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">When should I use JSON vs XML?</h4>
                    <p class="text-gray-700 leading-relaxed">JSON is ideal for web APIs, JavaScript applications, and modern
                        systems due to its simplicity. XML excels in document-centric applications, enterprise systems, and
                        scenarios requiring schemas and namespaces.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Are XML attributes preserved?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes, XML attributes are converted to a special "@attributes"
                        property in JSON, ensuring no data loss during conversion.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I convert large files?</h4>
                    <p class="text-gray-700 leading-relaxed">The tool handles reasonably large files efficiently. For
                        extremely large datasets (>10MB), consider splitting them into smaller chunks for optimal
                        performance.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is the conversion lossless?</h4>
                    <p class="text-gray-700 leading-relaxed">The converter preserves data structure and content. However,
                        some XML-specific features like processing instructions may not have direct JSON equivalents.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is my sensitive data safe?</h4>
                    <p class="text-gray-700 leading-relaxed">Absolutely! All conversions occur entirely in your browser
                        using JavaScript. No data is transmitted to our servers or any third parties.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentMode = 'encode';

        function setMode(mode) {
            currentMode = mode;
            const encodeBtn = document.getElementById('encodeBtn');
            const decodeBtn = document.getElementById('decodeBtn');
            const inputLabel = document.getElementById('inputLabel');
            const outputLabel = document.getElementById('outputLabel');
            const processBtn = document.getElementById('processBtn');

            if (mode === 'encode') {
                encodeBtn.classList.remove('bg-gray-200', 'text-gray-700');
                encodeBtn.classList.add('bg-blue-600', 'text-white');
                decodeBtn.classList.remove('bg-blue-600', 'text-white');
                decodeBtn.classList.add('bg-gray-200', 'text-gray-700');
                inputLabel.textContent = 'Enter JSON Data';
                outputLabel.textContent = 'XML Result';
                processBtn.textContent = 'Convert to XML';
            } else {
                decodeBtn.classList.remove('bg-gray-200', 'text-gray-700');
                decodeBtn.classList.add('bg-blue-600', 'text-white');
                encodeBtn.classList.remove('bg-blue-600', 'text-white');
                encodeBtn.classList.add('bg-gray-200', 'text-gray-700');
                inputLabel.textContent = 'Enter XML Data';
                outputLabel.textContent = 'JSON Result';
                processBtn.textContent = 'Convert to JSON';
            }
            clearAll();
        }

        function convertNumber() {
            const input = document.getElementById('numberInput').value.trim();
            const output = document.getElementById('numberOutput');

            if (!input) {
                showStatus('Please enter data to convert', 'error');
                return;
            }

            try {
                if (currentMode === 'encode') {
                    // JSON to XML
                    const jsonData = JSON.parse(input);
                    const xmlString = jsonToXml(jsonData);
                    output.value = formatXml(xmlString);
                    showStatus('✓ Converted to XML successfully', 'success');
                } else {
                    // XML to JSON
                    const parser = new DOMParser();
                    const xmlDoc = parser.parseFromString(input, 'text/xml');

                    // Check for parsing errors
                    const parserError = xmlDoc.getElementsByTagName('parsererror');
                    if (parserError.length > 0) {
                        showStatus('Invalid XML format', 'error');
                        return;
                    }

                    const jsonData = xmlToJson(xmlDoc.documentElement);
                    output.value = JSON.stringify(jsonData, null, 2);
                    showStatus('✓ Converted to JSON successfully', 'success');
                }
            } catch (error) {
                showStatus('✗ Error: ' + error.message, 'error');
            }
        }

        function jsonToXml(obj, rootName = 'root') {
            let xml = '<' + '?xml version="1.0" encoding="UTF-8"?' + '>\n';
            xml += buildXmlNode(obj, rootName);
            return xml;
        }

        function buildXmlNode(obj, nodeName) {
            if (obj === null || obj === undefined) {
                return `<${nodeName}/>`;
            }

            if (typeof obj !== 'object') {
                return `<${nodeName}>${escapeXml(String(obj))}</${nodeName}>`;
            }

            if (Array.isArray(obj)) {
                return obj.map(item => buildXmlNode(item, nodeName)).join('\n');
            }

            let xml = `<${nodeName}>`;
            for (const [key, value] of Object.entries(obj)) {
                xml += '\n  ' + buildXmlNode(value, key).split('\n').join('\n  ');
            }
            xml += `\n</${nodeName}>`;
            return xml;
        }

        function xmlToJson(xml) {
            const obj = {};

            if (xml.nodeType === 1) {
                // Element node
                if (xml.attributes.length > 0) {
                    obj['@attributes'] = {};
                    for (let i = 0; i < xml.attributes.length; i++) {
                        const attribute = xml.attributes[i];
                        obj['@attributes'][attribute.nodeName] = attribute.nodeValue;
                    }
                }
            } else if (xml.nodeType === 3) {
                // Text node
                return xml.nodeValue.trim();
            }

            if (xml.hasChildNodes()) {
                for (let i = 0; i < xml.childNodes.length; i++) {
                    const child = xml.childNodes[i];
                    const nodeName = child.nodeName;

                    if (child.nodeType === 3) {
                        const text = child.nodeValue.trim();
                        if (text) {
                            return text;
                        }
                        continue;
                    }

                    if (typeof obj[nodeName] === 'undefined') {
                        obj[nodeName] = xmlToJson(child);
                    } else {
                        if (!Array.isArray(obj[nodeName])) {
                            obj[nodeName] = [obj[nodeName]];
                        }
                        obj[nodeName].push(xmlToJson(child));
                    }
                }
            }

            return obj;
        }

        function escapeXml(str) {
            return str.replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&apos;');
        }

        function formatXml(xml) {
            const PADDING = '  ';
            const reg = /(>)(<)(\/*)/g;
            let formatted = '';
            let pad = 0;

            xml = xml.replace(reg, '$1\n$2$3');
            xml.split('\n').forEach((node) => {
                let indent = 0;
                if (node.match(/.+<\/\w[^>]*>$/)) {
                    indent = 0;
                } else if (node.match(/^<\/\w/) && pad > 0) {
                    pad -= 1;
                } else if (node.match(/^<\w[^>]*[^\/]>.*$/)) {
                    indent = 1;
                } else {
                    indent = 0;
                }

                formatted += PADDING.repeat(pad) + node + '\n';
                pad += indent;
            });

            return formatted.trim();
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
    </script>
@endsection