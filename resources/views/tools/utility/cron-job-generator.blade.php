@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" icon="cron-job-generator" />

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-purple-200 mb-8">
            <!-- Visual Editor -->
            <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-8">
                <!-- Minute -->
                <div class="p-4 bg-gray-50 rounded-xl border-2 border-gray-100">
                    <label class="block text-sm font-bold text-gray-700 mb-2 text-center">Minute</label>
                    <div class="flex justify-center mb-2 text-2xl font-mono font-bold text-purple-600" id="disp_minute">*
                    </div>
                    <select id="minute" onchange="updateCron()"
                        class="w-full text-sm border-gray-200 rounded-lg focus:ring-purple-500">
                        <option value="*">Every Minute (*)</option>
                        <option value="*/2">Every 2 Minutes (*/2)</option>
                        <option value="*/5">Every 5 Minutes (*/5)</option>
                        <option value="*/10">Every 10 Minutes (*/10)</option>
                        <option value="*/15">Every 15 Minutes (*/15)</option>
                        <option value="*/30">Every 30 Minutes (*/30)</option>
                        <option value="0">At minute 0 (0)</option>
                    </select>
                </div>

                <!-- Hour -->
                <div class="p-4 bg-gray-50 rounded-xl border-2 border-gray-100">
                    <label class="block text-sm font-bold text-gray-700 mb-2 text-center">Hour</label>
                    <div class="flex justify-center mb-2 text-2xl font-mono font-bold text-purple-600" id="disp_hour">*
                    </div>
                    <select id="hour" onchange="updateCron()"
                        class="w-full text-sm border-gray-200 rounded-lg focus:ring-purple-500">
                        <option value="*">Every Hour (*)</option>
                        <option value="*/2">Every 2 Hours (*/2)</option>
                        <option value="*/3">Every 3 Hours (*/3)</option>
                        <option value="*/4">Every 4 Hours (*/4)</option>
                        <option value="*/6">Every 6 Hours (*/6)</option>
                        <option value="*/12">Every 12 Hours (*/12)</option>
                        <option value="0">At 00:00 (Midnight)</option>
                    </select>
                </div>

                <!-- Day -->
                <div class="p-4 bg-gray-50 rounded-xl border-2 border-gray-100">
                    <label class="block text-sm font-bold text-gray-700 mb-2 text-center">Day</label>
                    <div class="flex justify-center mb-2 text-2xl font-mono font-bold text-purple-600" id="disp_day">*</div>
                    <select id="day" onchange="updateCron()"
                        class="w-full text-sm border-gray-200 rounded-lg focus:ring-purple-500">
                        <option value="*">Every Day (*)</option>
                        <option value="1">1st of Month</option>
                        <option value="15">15th of Month</option>
                        <option value="*/2">Every 2 Days</option>
                    </select>
                </div>

                <!-- Month -->
                <div class="p-4 bg-gray-50 rounded-xl border-2 border-gray-100">
                    <label class="block text-sm font-bold text-gray-700 mb-2 text-center">Month</label>
                    <div class="flex justify-center mb-2 text-2xl font-mono font-bold text-purple-600" id="disp_month">*
                    </div>
                    <select id="month" onchange="updateCron()"
                        class="w-full text-sm border-gray-200 rounded-lg focus:ring-purple-500">
                        <option value="*">Every Month (*)</option>
                        <option value="*/2">Every 2 Months</option>
                        <option value="*/3">Every 3 Months (Quarterly)</option>
                        <option value="*/6">Every 6 Months</option>
                        <option value="1">January</option>
                        <option value="6">June</option>
                        <option value="12">December</option>
                    </select>
                </div>

                <!-- Weekday -->
                <div class="p-4 bg-gray-50 rounded-xl border-2 border-gray-100">
                    <label class="block text-sm font-bold text-gray-700 mb-2 text-center">Weekday</label>
                    <div class="flex justify-center mb-2 text-2xl font-mono font-bold text-purple-600" id="disp_weekday">*
                    </div>
                    <select id="weekday" onchange="updateCron()"
                        class="w-full text-sm border-gray-200 rounded-lg focus:ring-purple-500">
                        <option value="*">Every Day (*)</option>
                        <option value="1-5">Mon-Fri (Weekday)</option>
                        <option value="0,6">Sat-Sun (Weekend)</option>
                        <option value="0">Sunday</option>
                        <option value="1">Monday</option>
                        <option value="5">Friday</option>
                    </select>
                </div>
            </div>

            <!-- Result -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Generated Cron Expression</label>
                <div class="flex">
                    <input type="text" id="cronOutput" readonly value="* * * * *"
                        class="w-full px-6 py-4 text-3xl font-mono font-bold text-center text-gray-800 bg-gray-100 border-2 border-gray-300 rounded-l-xl focus:outline-none">
                    <button onclick="copyCron()"
                        class="px-8 bg-purple-600 text-white font-bold rounded-r-xl hover:bg-purple-700 transition-all flex items-center gap-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                        Copy
                    </button>
                </div>
            </div>

            <div class="p-4 bg-blue-50 text-blue-800 rounded-xl border border-blue-200 text-center">
                <span class="font-bold">Human Readable:</span> <span id="humanReadable">Every minute</span>
            </div>

            <div id="statusMessage" class="hidden mt-4 p-4 rounded-xl font-semibold text-center"></div>
        </div>

        <div
            class="bg-gradient-to-br from-purple-50 to-indigo-50 rounded-3xl p-8 md:p-12 border-2 border-purple-100 shadow-2xl">
            <h2 class="text-3xl font-black text-gray-900 mb-4 text-center">Common Examples</h2>
            <div class="grid md:grid-cols-2 gap-4">
                <button onclick="setPreset('0 0 * * *', 'Every day at midnight')"
                    class="p-3 bg-white hover:bg-purple-50 border rounded-lg text-left transition-all">
                    <div class="font-mono font-bold text-purple-600">0 0 * * *</div>
                    <div class="text-sm text-gray-600">Every day at midnight</div>
                </button>
                <button onclick="setPreset('*/15 * * * *', 'Every 15 minutes')"
                    class="p-3 bg-white hover:bg-purple-50 border rounded-lg text-left transition-all">
                    <div class="font-mono font-bold text-purple-600">*/15 * * * *</div>
                    <div class="text-sm text-gray-600">Every 15 minutes</div>
                </button>
                <button onclick="setPreset('0 9-17 * * 1-5', 'Every hour from 9am-5pm on weekdays')"
                    class="p-3 bg-white hover:bg-purple-50 border rounded-lg text-left transition-all">
                    <div class="font-mono font-bold text-purple-600">0 9-17 * * 1-5</div>
                    <div class="text-sm text-gray-600">Work hours checking</div>
                </button>
                <button onclick="setPreset('0 0 1 * *', 'At 00:00 on day-of-month 1')"
                    class="p-3 bg-white hover:bg-purple-50 border rounded-lg text-left transition-all">
                    <div class="font-mono font-bold text-purple-600">0 0 1 * *</div>
                    <div class="text-sm text-gray-600">Monthly job</div>
                </button>
            </div>
        </div>
    </div>

    <script>
        function updateCron() {
            const m = document.getElementById('minute').value;
            const h = document.getElementById('hour').value;
            const d = document.getElementById('day').value;
            const mo = document.getElementById('month').value;
            const w = document.getElementById('weekday').value;

            document.getElementById('disp_minute').innerText = m;
            document.getElementById('disp_hour').innerText = h;
            document.getElementById('disp_day').innerText = d;
            document.getElementById('disp_month').innerText = mo;
            document.getElementById('disp_weekday').innerText = w;

            const expression = `${m} ${h} ${d} ${mo} ${w}`;
            document.getElementById('cronOutput').value = expression;

            // Simple human readable parser logic (expandable)
            let human = "Custom schedule";
            if (expression === "* * * * *") human = "Every minute";
            else if (expression === "0 * * * *") human = "At minute 0 past every hour";
            else if (expression === "0 0 * * *") human = "At 00:00 every day";

            document.getElementById('humanReadable').innerText = human;
        }

        function setPreset(expr, text) {
            document.getElementById('cronOutput').value = expr;
            document.getElementById('humanReadable').innerText = text;

            // Simplistic reverse mapping (optional, but nice)
            const parts = expr.split(' ');
            if (parts.length === 5) {
                document.getElementById('disp_minute').innerText = parts[0];
                document.getElementById('disp_hour').innerText = parts[1];
                document.getElementById('disp_day').innerText = parts[2];
                document.getElementById('disp_month').innerText = parts[3];
                document.getElementById('disp_weekday').innerText = parts[4];

                // Try to match dropdowns if possible
                trySetSelect('minute', parts[0]);
                trySetSelect('hour', parts[1]);
                trySetSelect('day', parts[2]);
                trySetSelect('month', parts[3]);
                trySetSelect('weekday', parts[4]);
            }
            showStatus('Preset loaded!', 'success');
        }

        function trySetSelect(id, val) {
            const sel = document.getElementById(id);
            if (sel.querySelector('option[value="' + val + '"]')) {
                sel.value = val;
            }
        }

        function copyCron() {
            const output = document.getElementById('cronOutput');
            output.select();
            document.execCommand('copy');
            showStatus('Copied to clipboard!', 'success');
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
@endsection