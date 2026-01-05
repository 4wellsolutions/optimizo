@extends('layouts.app')

@section('title', $tool->name . ' - ' . config('app.name'))
@section('meta_description', $tool->meta_description)

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Hero Section -->
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" icon="json-to-xml" />

        <!-- Tool Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-indigo-200 mb-8">
            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convert()" class="btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>Convert to XML</span>
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
                <button onclick="loadExample()"
                    class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>Example</span>
                </button>
            </div>

            <!-- Status Message -->
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>

            <!-- Two Column Layout for Input/Output -->
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Input Column -->
                <div>
                    <label for="jsonInput" class="form-label text-base">Enter JSON</label>
                    <textarea id="jsonInput" class="form-input font-mono text-sm min-h-[400px]"
                        placeholder='{"name": "John", "age": 30, "city": "New York"}'></textarea>
                </div>

                <!-- Output Column -->
                <div>
                    <label for="xmlOutput" class="form-label text-base">XML Output</label>
                    <textarea id="xmlOutput" class="form-input font-mono text-sm min-h-[400px]" readonly
                        placeholder="Converted XML will appear here..."></textarea>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-3xl p-8 md:p-12 border-2 border-indigo-100 shadow-2xl">
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">Free JSON to XML Converter</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Transform JSON data into well-formatted XML instantly</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Our free JSON to XML converter is a powerful online tool that transforms JSON (JavaScript Object Notation) data into well-structured XML (eXtensible Markup Language) format. Perfect for developers, data analysts, and IT professionals who need to convert data between these two popular formats for API integration, data migration, legacy system compatibility, or configuration management.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🔐 What is JSON to XML Conversion?</h3>
            <p class="text-gray-700 leading-relaxed mb-8">
                JSON to XML conversion is the process of transforming data from JavaScript Object Notation format into eXtensible Markup Language format. While JSON is lightweight and commonly used in modern web APIs, XML is still widely used in enterprise systems, SOAP web services, configuration files, and legacy applications. Converting between these formats allows seamless data exchange across different systems and technologies.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ Features</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">Instant Conversion</h4>
                    <p class="text-gray-600 text-sm">Convert JSON to XML in milliseconds with our optimized algorithm</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">Privacy First</h4>
                    <p class="text-gray-600 text-sm">All processing happens in your browser - your data never leaves your device</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📋</div>
                    <h4 class="font-bold text-gray-900 mb-2">One-Click Copy</h4>
                    <p class="text-gray-600 text-sm">Copy XML output instantly to clipboard with a single click</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎯</div>
                    <h4 class="font-bold text-gray-900 mb-2">Accurate Formatting</h4>
                    <p class="text-gray-600 text-sm">Generates properly indented, well-structured XML output</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🆓</div>
                    <h4 class="font-bold text-gray-900 mb-2">100% Free</h4>
                    <p class="text-gray-600 text-sm">No limits, no registration, no hidden fees - completely free forever</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🌐</div>
                    <h4 class="font-bold text-gray-900 mb-2">Works Offline</h4>
                    <p class="text-gray-600 text-sm">Client-side processing means it works even without internet connection</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Common Use Cases</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔄 Data Migration</h4>
                    <p class="text-gray-700 leading-relaxed">Convert JSON data to XML format when migrating from modern REST APIs to legacy systems that only accept XML input.</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔌 API Integration</h4>
                    <p class="text-gray-700 leading-relaxed">Transform JSON API responses into XML format for systems that require XML data structures, such as SOAP web services.</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">⚙️ Configuration Files</h4>
                    <p class="text-gray-700 leading-relaxed">Convert JSON configuration files to XML format for applications that use XML-based configuration systems.</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📊 Enterprise Systems</h4>
                    <p class="text-gray-700 leading-relaxed">Integrate with enterprise resource planning (ERP) and customer relationship management (CRM) systems that require XML data.</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📄 Document Generation</h4>
                    <p class="text-gray-700 leading-relaxed">Convert JSON data to XML for document generation systems, reporting tools, and template engines that use XML.</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🗄️ Database Export</h4>
                    <p class="text-gray-700 leading-relaxed">Transform JSON database exports to XML format for import into systems that only support XML data import.</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📝 How to Convert JSON to XML</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8 shadow-lg">
                <ol class="space-y-4">
                    <li class="flex items-start">
                        <span class="flex-shrink-0 w-8 h-8 bg-indigo-600 text-white rounded-full flex items-center justify-center font-bold mr-3">1</span>
                        <div>
                            <p class="font-semibold text-gray-900 mb-1">Paste Your JSON Data</p>
                            <p class="text-gray-700">Copy and paste your JSON data into the left input field, or click "Example" to see a sample conversion.</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 w-8 h-8 bg-indigo-600 text-white rounded-full flex items-center justify-center font-bold mr-3">2</span>
                        <div>
                            <p class="font-semibold text-gray-900 mb-1">Click Convert</p>
                            <p class="text-gray-700">Press the "Convert to XML" button to transform your JSON data into XML format instantly.</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 w-8 h-8 bg-indigo-600 text-white rounded-full flex items-center justify-center font-bold mr-3">3</span>
                        <div>
                            <p class="font-semibold text-gray-900 mb-1">Copy or Use the XML</p>
                            <p class="text-gray-700">The converted XML appears in the right panel. Click "Copy" to copy it to your clipboard for immediate use.</p>
                        </div>
                    </li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 Conversion Examples</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8 shadow-lg">
                <div class="space-y-6">
                    <div>
                        <p class="font-semibold text-gray-900 mb-3">Simple Object Conversion:</p>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-semibold text-gray-700 mb-2">JSON Input:</p>
                                <pre class="bg-gray-50 p-3 rounded text-sm overflow-x-auto"><code>{"name": "John", "age": 30}</code></pre>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-700 mb-2">XML Output:</p>
                                <pre class="bg-gray-50 p-3 rounded text-sm overflow-x-auto"><code>&lt;root&gt;
  &lt;name&gt;John&lt;/name&gt;
  &lt;age&gt;30&lt;/age&gt;
&lt;/root&gt;</code></pre>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-3">Array Conversion:</p>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-semibold text-gray-700 mb-2">JSON Input:</p>
                                <pre class="bg-gray-50 p-3 rounded text-sm overflow-x-auto"><code>{"users": ["Alice", "Bob"]}</code></pre>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-700 mb-2">XML Output:</p>
                                <pre class="bg-gray-50 p-3 rounded text-sm overflow-x-auto"><code>&lt;root&gt;
  &lt;users&gt;
    &lt;item&gt;Alice&lt;/item&gt;
    &lt;item&gt;Bob&lt;/item&gt;
  &lt;/users&gt;
&lt;/root&gt;</code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4 mb-8">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What is the difference between JSON and XML?</h4>
                    <p class="text-gray-700 leading-relaxed">JSON (JavaScript Object Notation) is a lightweight data format that's easy to read and write, commonly used in modern web APIs. XML (eXtensible Markup Language) is more verbose but offers better support for complex data structures, metadata, and is widely used in enterprise systems and legacy applications.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is my data secure when using this converter?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes, absolutely! All conversion happens entirely in your browser using JavaScript. Your JSON data never leaves your device or gets sent to any server, ensuring complete privacy and security.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I convert large JSON files?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes, you can convert JSON files of any size. However, very large files (over 10MB) may take a few seconds to process depending on your device's performance.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Does the converter handle nested JSON objects?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes, our converter fully supports nested JSON objects and arrays, converting them into properly structured XML with appropriate nesting and indentation.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I use this tool for commercial projects?</h4>
                    <p class="text-gray-700 leading-relaxed">Absolutely! This tool is completely free to use for both personal and commercial projects without any restrictions or attribution requirements.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What happens to special characters during conversion?</h4>
                    <p class="text-gray-700 leading-relaxed">Special characters like &lt;, &gt;, &amp;, and quotes are automatically escaped to their XML entity equivalents (&amp;lt;, &amp;gt;, &amp;amp;, etc.) to ensure valid XML output.</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎓 Best Practices</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700"><strong>Validate JSON first:</strong> Ensure your JSON is valid before conversion to avoid errors.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700"><strong>Use meaningful keys:</strong> JSON keys become XML element names, so use descriptive, valid XML tag names.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700"><strong>Test with sample data:</strong> Use the "Example" button to understand the conversion format before processing your actual data.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700"><strong>Verify XML output:</strong> Always validate the generated XML against your target system's schema requirements.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700"><strong>Handle arrays carefully:</strong> JSON arrays are converted to XML with &lt;item&gt; tags - customize if needed for your use case.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        function convert() {
            const input = document.getElementById('jsonInput').value.trim();
            
            if (!input) {
                showStatus('Please enter JSON data', 'error');
                return;
            }

            try {
                const json = JSON.parse(input);
                const xml = jsonToXml(json);
                document.getElementById('xmlOutput').value = xml;
                showStatus('✓ JSON converted to XML successfully', 'success');
            } catch (error) {
                showStatus('✗ Error: ' + error.message, 'error');
            }
        }

        function jsonToXml(obj, rootName = 'root') {
            let xml = '<?xml version="1.0" encoding="UTF-8"?>\n';
            xml += objectToXml(obj, rootName, 0);
            return xml;
        }

        function objectToXml(obj, name, indent) {
            const spaces = '  '.repeat(indent);
            let xml = '';

            if (Array.isArray(obj)) {
                obj.forEach(item => {
                    xml += objectToXml(item, 'item', indent);
                });
            } else if (typeof obj === 'object' && obj !== null) {
                xml += spaces + '<' + name + '>\n';
                for (let key in obj) {
                    xml += objectToXml(obj[key], key, indent + 1);
                }
                xml += spaces + '</' + name + '>\n';
            } else {
                xml += spaces + '<' + name + '>' + escapeXml(String(obj)) + '</' + name + '>\n';
            }

            return xml;
        }

        function escapeXml(str) {
            return str.replace(/&/g, '&amp;')
                      .replace(/</g, '&lt;')
                      .replace(/>/g, '&gt;')
                      .replace(/"/g, '&quot;')
                      .replace(/'/g, '&apos;');
        }

        function clearAll() {
            document.getElementById('jsonInput').value = '';
            document.getElementById('xmlOutput').value = '';
            document.getElementById('statusMessage').classList.add('hidden');
        }

        function copyOutput() {
            const output = document.getElementById('xmlOutput');
            if (!output.value) {
                showStatus('No output to copy', 'error');
                return;
            }
            output.select();
            document.execCommand('copy');
            showStatus('✓ Copied to clipboard', 'success');
        }

        function loadExample() {
            document.getElementById('jsonInput').value = JSON.stringify({
                "person": {
                    "name": "John Doe",
                    "age": 30,
                    "city": "New York",
                    "hobbies": ["reading", "coding", "gaming"]
                }
            }, null, 2);
            convert();
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
    </script>
@endsection
