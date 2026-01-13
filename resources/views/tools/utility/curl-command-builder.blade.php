@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" icon="curl-command-builder" />

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-indigo-200 mb-8">
            <!-- URL & Method -->
            <div class="flex flex-col md:flex-row gap-4 mb-6">
                <div class="w-full md:w-1/4">
                    <label
                        class="block text-sm font-semibold text-gray-700 mb-2">{!! __tool('curl-command-builder', 'editor.method_label') !!}</label>
                    <select id="method" onchange="updateCurl()"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 transition-all font-bold">
                        <option value="GET">GET</option>
                        <option value="POST">POST</option>
                        <option value="PUT">PUT</option>
                        <option value="DELETE">DELETE</option>
                        <option value="PATCH">PATCH</option>
                    </select>
                </div>
                <div class="w-full md:w-3/4">
                    <label
                        class="block text-sm font-semibold text-gray-700 mb-2">{!! __tool('curl-command-builder', 'editor.url_label') !!}</label>
                    <input type="text" id="url" placeholder="https://api.example.com/v1/resource" oninput="updateCurl()"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 transition-all">
                </div>
            </div>

            <!-- Parameters Type -->
            <div class="mb-6">
                <div class="border-b border-gray-200">
                    <nav class="-mb-px flex space-x-8">
                        <button onclick="switchTab('headers')" id="tab-headers"
                            class="border-indigo-500 text-indigo-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                            {!! __tool('curl-command-builder', 'editor.headers_tab') !!}
                        </button>
                        <button onclick="switchTab('body')" id="tab-body"
                            class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                            {!! __tool('curl-command-builder', 'editor.body_tab') !!}
                        </button>
                    </nav>
                </div>

                <!-- Headers -->
                <div id="panel-headers" class="py-4">
                    <div id="headersList" class="space-y-3">
                        <div class="flex gap-2">
                            <input type="text" placeholder="{!! __tool('curl-command-builder', 'editor.key_ph') !!}"
                                class="header-key flex-1 px-3 py-2 border rounded-lg">
                            <input type="text" placeholder="{!! __tool('curl-command-builder', 'editor.value_ph') !!}"
                                class="header-val flex-1 px-3 py-2 border rounded-lg">
                        </div>
                    </div>
                    <button onclick="addHeaderRow()"
                        class="mt-3 text-sm text-indigo-600 font-semibold flex items-center gap-1">
                        <span>{!! __tool('curl-command-builder', 'editor.add_header') !!}</span>
                    </button>
                </div>

                <!-- Body -->
                <div id="panel-body" class="py-4 hidden">
                    <label
                        class="block text-sm font-medium text-gray-700 mb-2">{!! __tool('curl-command-builder', 'editor.raw_data_label') !!}</label>
                    <textarea id="bodyContent" rows="5" oninput="updateCurl()"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 font-mono text-sm"
                        placeholder='{"key": "value"}'></textarea>
                </div>
            </div>

            <!-- Result -->
            <div class="bg-gray-900 rounded-xl p-4 md:p-6 mb-6">
                <div class="flex justify-between items-center mb-2">
                    <label
                        class="text-xs font-bold text-gray-400 uppercase tracking-wider">{!! __tool('curl-command-builder', 'editor.generated_label') !!}</label>
                    <span class="text-xs text-green-400 font-mono">bash</span>
                </div>
                <div class="relative group">
                    <pre class="text-gray-100 font-mono text-sm overflow-x-auto whitespace-pre-wrap break-all p-2"
                        id="curlOutput">curl -X GET "https://api.example.com/v1/resource"</pre>
                </div>
            </div>

            <button onclick="copyOutput()"
                class="w-full py-4 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition-all font-bold shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                </svg>
                <span>{!! __tool('curl-command-builder', 'editor.btn_copy') !!}</span>
            </button>

            <div id="statusMessage" class="hidden mt-4 p-4 rounded-xl font-semibold text-center"></div>
        </div>
    </div>

    @push('scripts')
        <script>
            function switchTab(tab) {
                document.getElementById('panel-headers').classList.add('hidden');
                document.getElementById('panel-body').classList.add('hidden');
                document.getElementById('tab-headers').className = "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm";
                document.getElementById('tab-body').className = "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm";

                document.getElementById('panel-' + tab).classList.remove('hidden');
                document.getElementById('tab-' + tab).className = "border-indigo-500 text-indigo-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm";
            }

            function addHeaderRow() {
                const div = document.createElement('div');
                div.className = "flex gap-2";
                div.innerHTML = '<input type="text" placeholder="{!! __tool('curl-command-builder', 'editor.key_ph') !!}" class="header-key flex-1 px-3 py-2 border rounded-lg" oninput="updateCurl()"> <input type="text" placeholder="{!! __tool('curl-command-builder', 'editor.value_ph') !!}" class="header-val flex-1 px-3 py-2 border rounded-lg" oninput="updateCurl()">';
                document.getElementById('headersList').appendChild(div);
            }

            function updateCurl() {
                const method = document.getElementById('method').value;
                let url = document.getElementById('url').value || 'https://api.example.com';

                let cmd = `curl -X ${method} "${url}"`;

                // Headers
                const keys = document.querySelectorAll('.header-key');
                const vals = document.querySelectorAll('.header-val');

                keys.forEach((k, i) => {
                    const key = k.value.trim();
                    const val = vals[i].value.trim();
                    if (key && val) {
                        cmd += ` \\\n     -H "${key}: ${val}"`;
                    }
                });

                // Body
                const body = document.getElementById('bodyContent').value;
                if (body && method !== 'GET') {
                    // Escape single quotes better for safety, but simple for now
                    cmd += ` \\\n     -d '${body.replace(/'/g, "'\\''")}'`;
                }

                document.getElementById('curlOutput').innerText = cmd;
            }

            function copyOutput() {
                const cmd = document.getElementById('curlOutput').innerText;
                navigator.clipboard.writeText(cmd).then(() => {
                    showStatus("{!! __tool('curl-command-builder', 'js.success_copy') !!}", 'success');
                });
            }

            function showStatus(message, type) {
                const status = document.getElementById('statusMessage');
                status.textContent = message;
                status.className = type === 'success'
                    ? 'mt-4 p-4 rounded-xl font-semibold bg-green-100 text-green-800 border-2 border-green-300 text-center'
                    : 'mt-4 p-4 rounded-xl font-semibold bg-red-100 text-red-800 border-2 border-red-300 text-center';
                status.classList.remove('hidden');
                setTimeout(() => status.classList.add('hidden'), 3000);
            }
        </script>
    @endpush
@endsection