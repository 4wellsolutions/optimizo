@extends('layouts.app')

@section('title', __tool('cron-job-generator', 'meta.title'))
@section('meta_description', __tool('cron-job-generator', 'meta.description'))
@section('content')
    <div class="max-w-6xl mx-auto">
        {{-- Hero Section --}}
        <x-tool-hero :tool="$tool" />

        {{-- Tool Section --}}
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-indigo-200 mb-8">
            <div class="mb-6">
                <label
                    class="block text-sm font-semibold text-gray-700 mb-2">{!! __tool('cron-job-generator', 'editor.common_settings') !!}</label>
                <select id="commonSettings" onchange="applyCommonSetting(this.value)"
                    class="w-full md:w-1/2 px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500">
                    <option value="">{!! __tool('cron-job-generator', 'editor.choose') !!}</option>
                    <option value="* * * * *">{!! __tool('cron-job-generator', 'editor.options.every_minute') !!}</option>
                    <option value="*/5 * * * *">{!! __tool('cron-job-generator', 'editor.options.every_5_minutes') !!}
                    </option>
                    <option value="*/15 * * * *">{!! __tool('cron-job-generator', 'editor.options.every_15_minutes') !!}
                    </option>
                    <option value="*/30 * * * *">{!! __tool('cron-job-generator', 'editor.options.every_30_minutes') !!}
                    </option>
                    <option value="0 * * * *">{!! __tool('cron-job-generator', 'editor.options.every_hour') !!}</option>
                    <option value="0 0 * * *">{!! __tool('cron-job-generator', 'editor.options.every_day_midnight') !!}
                    </option>
                    <option value="0 0 * * 0">{!! __tool('cron-job-generator', 'editor.options.every_week') !!}</option>
                    <option value="0 0 1 * *">{!! __tool('cron-job-generator', 'editor.options.every_month') !!}</option>
                </select>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-6">
                {{-- Minute --}}
                <div class="space-y-2">
                    <label
                        class="block text-sm font-semibold text-gray-700">{!! __tool('cron-job-generator', 'editor.minute') !!}</label>
                    <div class="relative">
                        <div class="flex items-center mb-2">
                            <input type="radio" name="minuteType" value="*" checked onchange="toggleInputs('minute')"
                                class="text-indigo-600 focus:ring-indigo-500">
                            <span class="ml-2 text-sm">{!! __tool('cron-job-generator', 'editor.every_minute') !!}</span>
                        </div>
                        <div class="h-32 overflow-y-auto border rounded p-2 text-sm">
                            @for($i = 0; $i < 60; $i++)
                                <div class="flex items-center">
                                    <input type="checkbox" name="minute" value="{{$i}}" onchange="updateCron()"
                                        class="text-indigo-600 focus:ring-indigo-500 rounded">
                                    <span class="ml-2">{{$i}}</span>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                {{-- Hour --}}
                <div class="space-y-2">
                    <label
                        class="block text-sm font-semibold text-gray-700">{!! __tool('cron-job-generator', 'editor.hour') !!}</label>
                    <div class="relative">
                        <div class="flex items-center mb-2">
                            <input type="radio" name="hourType" value="*" checked onchange="toggleInputs('hour')"
                                class="text-indigo-600 focus:ring-indigo-500">
                            <span class="ml-2 text-sm">{!! __tool('cron-job-generator', 'editor.every_hour') !!}</span>
                        </div>
                        <div class="h-32 overflow-y-auto border rounded p-2 text-sm">
                            @for($i = 0; $i < 24; $i++)
                                <div class="flex items-center">
                                    <input type="checkbox" name="hour" value="{{$i}}" onchange="updateCron()"
                                        class="text-indigo-600 focus:ring-indigo-500 rounded">
                                    <span class="ml-2">{{$i}}</span>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                {{-- Day --}}
                <div class="space-y-2">
                    <label
                        class="block text-sm font-semibold text-gray-700">{!! __tool('cron-job-generator', 'editor.day') !!}</label>
                    <div class="relative">
                        <div class="flex items-center mb-2">
                            <input type="radio" name="dayType" value="*" checked onchange="toggleInputs('day')"
                                class="text-indigo-600 focus:ring-indigo-500">
                            <span class="ml-2 text-sm">{!! __tool('cron-job-generator', 'editor.every_day') !!}</span>
                        </div>
                        <div class="h-32 overflow-y-auto border rounded p-2 text-sm">
                            @for($i = 1; $i <= 31; $i++)
                                <div class="flex items-center">
                                    <input type="checkbox" name="day" value="{{$i}}" onchange="updateCron()"
                                        class="text-indigo-600 focus:ring-indigo-500 rounded">
                                    <span class="ml-2">{{$i}}</span>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                {{-- Month --}}
                <div class="space-y-2">
                    <label
                        class="block text-sm font-semibold text-gray-700">{!! __tool('cron-job-generator', 'editor.month') !!}</label>
                    <div class="relative">
                        <div class="flex items-center mb-2">
                            <input type="radio" name="monthType" value="*" checked onchange="toggleInputs('month')"
                                class="text-indigo-600 focus:ring-indigo-500">
                            <span class="ml-2 text-sm">{!! __tool('cron-job-generator', 'editor.every_month') !!}</span>
                        </div>
                        <div class="h-32 overflow-y-auto border rounded p-2 text-sm">
                            @foreach(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'] as $index => $month)
                                <div class="flex items-center">
                                    <input type="checkbox" name="month" value="{{$index + 1}}" onchange="updateCron()"
                                        class="text-indigo-600 focus:ring-indigo-500 rounded">
                                    <span class="ml-2">{{$month}}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Weekday --}}
                <div class="space-y-2">
                    <label
                        class="block text-sm font-semibold text-gray-700">{!! __tool('cron-job-generator', 'editor.weekday') !!}</label>
                    <div class="relative">
                        <div class="flex items-center mb-2">
                            <input type="radio" name="weekdayType" value="*" checked onchange="toggleInputs('weekday')"
                                class="text-indigo-600 focus:ring-indigo-500">
                            <span class="ml-2 text-sm">{!! __tool('cron-job-generator', 'editor.every_weekday') !!}</span>
                        </div>
                        <div class="h-32 overflow-y-auto border rounded p-2 text-sm">
                            @foreach(['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] as $index => $day)
                                <div class="flex items-center">
                                    <input type="checkbox" name="weekday" value="{{$index}}" onchange="updateCron()"
                                        class="text-indigo-600 focus:ring-indigo-500 rounded">
                                    <span class="ml-2">{{$day}}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <label
                    class="block text-sm font-semibold text-gray-700 mb-2">{!! __tool('cron-job-generator', 'editor.command') !!}</label>
                <input type="text" id="commandInput" onkeyup="updateCron()"
                    placeholder="{!! __tool('cron-job-generator', 'editor.ph_command') !!}"
                    class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 font-mono text-sm">
            </div>

            <div class="bg-gray-100 p-6 rounded-xl border border-gray-200">
                <label
                    class="block text-sm font-semibold text-gray-700 mb-2">{!! __tool('cron-job-generator', 'editor.generated_cron') !!}</label>
                <div class="flex gap-2">
                    <input type="text" id="cronOutput" readonly
                        class="flex-1 px-4 py-3 bg-white border border-gray-300 rounded-lg font-mono text-lg text-center tracking-wider text-indigo-600 font-bold"
                        value="* * * * *">
                    <button onclick="copyCron()"
                        class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-semibold transition-colors">
                        {!! __tool('cron-job-generator', 'editor.btn_copy') !!}
                    </button>
                    <button onclick="resetCron()"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 font-semibold transition-colors">
                        {!! __tool('cron-job-generator', 'editor.btn_clear') !!}
                    </button>
                </div>
            </div>

            <div id="statusMessage" class="hidden mt-4 p-4 rounded-xl font-semibold text-center max-w-md mx-auto"></div>
        </div>

        {{-- SEO Content --}}
        <div
            class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-3xl p-8 md:p-12 border-2 border-indigo-100 shadow-xl">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-4 tracking-tight">
                        {!! __tool('cron-job-generator', 'content.hero_title') !!}</h2>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        {!! __tool('cron-job-generator', 'content.p1') !!}
                    </p>
                </div>

                {{-- Features --}}
                <div class="grid md:grid-cols-2 gap-8 mb-16">
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-indigo-100">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">
                            {!! __tool('cron-job-generator', 'content.features.visual.title') !!}</h3>
                        <p class="text-gray-600">{!! __tool('cron-job-generator', 'content.features.visual.desc') !!}</p>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-purple-100">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">
                            {!! __tool('cron-job-generator', 'content.features.readable.title') !!}</h3>
                        <p class="text-gray-600">{!! __tool('cron-job-generator', 'content.features.readable.desc') !!}</p>
                    </div>
                </div>

                {{-- Syntax Guide --}}
                <div class="bg-white rounded-2xl p-8 shadow-sm border-2 border-gray-100 mb-12">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">
                        {!! __tool('cron-job-generator', 'content.syntax_title') !!}</h3>
                    <p class="mb-4 text-gray-600">{!! __tool('cron-job-generator', 'content.syntax_intro') !!}</p>
                    <div class="grid grid-cols-5 gap-2 text-center font-mono text-sm mb-4">
                        <div class="bg-indigo-50 p-2 rounded text-indigo-700 font-bold">*</div>
                        <div class="bg-pink-50 p-2 rounded text-pink-700 font-bold">*</div>
                        <div class="bg-purple-50 p-2 rounded text-purple-700 font-bold">*</div>
                        <div class="bg-teal-50 p-2 rounded text-teal-700 font-bold">*</div>
                        <div class="bg-orange-50 p-2 rounded text-orange-700 font-bold">*</div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-4 text-sm">
                        <div><strong>{!! __tool('cron-job-generator', 'content.syntax_fields.min') !!}</strong></div>
                        <div><strong>{!! __tool('cron-job-generator', 'content.syntax_fields.hour') !!}</strong></div>
                        <div><strong>{!! __tool('cron-job-generator', 'content.syntax_fields.day') !!}</strong></div>
                        <div><strong>{!! __tool('cron-job-generator', 'content.syntax_fields.month') !!}</strong></div>
                        <div><strong>{!! __tool('cron-job-generator', 'content.syntax_fields.week') !!}</strong></div>
                    </div>
                </div>

                {{-- FAQ --}}
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">
                        {!! __tool('cron-job-generator', 'content.faq_title') !!}</h3>
                    <div class="space-y-4">
                        <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                            <h4 class="font-bold text-gray-800 mb-2">{!! __tool('cron-job-generator', 'content.faq.q1') !!}
                            </h4>
                            <p class="text-gray-600 text-sm">{!! __tool('cron-job-generator', 'content.faq.a1') !!}</p>
                        </div>
                        <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                            <h4 class="font-bold text-gray-800 mb-2">{!! __tool('cron-job-generator', 'content.faq.q2') !!}
                            </h4>
                            <p class="text-gray-600 text-sm">{!! __tool('cron-job-generator', 'content.faq.a2') !!}</p>
                        </div>
                        <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                            <h4 class="font-bold text-gray-800 mb-2">{!! __tool('cron-job-generator', 'content.faq.q4') !!}
                            </h4>
                            <p class="text-gray-600 text-sm">{!! __tool('cron-job-generator', 'content.faq.a4') !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            const statusMsgs = {
                successCopy: "{!! __tool('cron-job-generator', 'js.success_copy') !!}",
                noCopy: "{!! __tool('cron-job-generator', 'js.no_copy') !!}"
            };

            function toggleInputs(type) {
                // When switching "every" (radio) vs "specific" (checkboxes)
                // Just trigger updateCron to read current state
                updateCron();
            }

            function applyCommonSetting(value) {
                if (!value) return;
                const parts = value.split(' ');
                if (parts.length !== 5) return;

                // Helper to set state
                const setField = (type, val) => {
                    const checkboxes = document.querySelectorAll(`input[name="${type}"]`);
                    const radio = document.querySelector(`input[name="${type}Type"]`);

                    // Clear all checkboxes
                    checkboxes.forEach(cb => cb.checked = false);

                    if (val === '*' || val.startsWith('*/')) {
                        radio.checked = true;
                        // For simplicity in this basic UI, we don't fully support setting step values (*/5) back into the UI
                        // visuals perfectly if the UI is just checkboxes. 
                        // But we can reset to "Every *" mode.
                    } else {
                        // It's a number or list
                        radio.checked = false; // implied we want specific mode usually, but check current UI logic
                        // Actually, if we select a preset, we might just want to set the output directly?
                        // But the requirement implies a visual generator. 
                        // Let's just set the output value directly for now as simple presets, 
                        // or try to parse simple ones like "0 0 * * *".
                        if (val !== '*') {
                            const search = val.split(',');
                            checkboxes.forEach(cb => {
                                if (search.includes(cb.value)) cb.checked = true;
                            });
                        }
                    }
                };

                // This basic generator logic might be complex to reverse map exactly from all cron strings.
                // For now, let's just set the string directly if it's a preset?
                // Or better, just update the visual display if possible.
                // Let's stick to updating the output text directly for presets to ensure accuracy.
                document.getElementById('cronOutput').value = value;
            }

            function updateCron() {
                const getVal = (type) => {
                    const isEvery = document.querySelector(`input[name="${type}Type"]`).checked;
                    if (isEvery) return '*';

                    const checked = Array.from(document.querySelectorAll(`input[name="${type}"]:checked`)).map(cb => cb.value);
                    if (checked.length === 0) return '*'; // Default back to * if nothing selected? Or error?
                    return checked.join(',');
                };

                const min = getVal('minute');
                const hour = getVal('hour');
                const day = getVal('day');
                const month = getVal('month');
                const weekday = getVal('weekday');

                const command = document.getElementById('commandInput').value.trim();

                let cron = `${min} ${hour} ${day} ${month} ${weekday}`;
                if (command) cron += ` ${command}`;

                document.getElementById('cronOutput').value = cron;
            }

            function copyCron() {
                const output = document.getElementById('cronOutput');
                if (!output.value) {
                    showStatus(statusMsgs.noCopy, 'error');
                    return;
                }
                output.select();
                document.execCommand('copy');
                showStatus(statusMsgs.successCopy, 'success');
            }

            function resetCron() {
                document.getElementById('commonSettings').value = "";
                document.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = false);
                document.querySelectorAll('input[type="radio"][value="*"]').forEach(rb => rb.checked = true);
                document.getElementById('commandInput').value = "";
                updateCron();
            }

            function showStatus(message, type) {
                const status = document.getElementById('statusMessage');
                status.textContent = message;
                status.classList.remove('hidden', 'bg-red-100', 'text-red-700', 'bg-green-100', 'text-green-700');

                if (type === 'error') {
                    status.classList.add('bg-red-100', 'text-red-700');
                } else {
                    status.classList.add('bg-green-100', 'text-green-700');
                }
                status.classList.remove('hidden');

                setTimeout(() => {
                    status.classList.add('hidden');
                }, 3000);
            }
        </script>
    @endpush
@endsection