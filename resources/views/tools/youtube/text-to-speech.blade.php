@extends('layouts.app')

@section('title', __tool('text-to-speech', 'meta.title'))
@section('meta_description', __tool('text-to-speech', 'meta.description'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <x-tool-hero :tool="$tool" icon="volume-high" />

        <!-- Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-indigo-200 mb-8">
            <form action="{{ route('youtube.text-to-speech.generate') }}" method="POST" id="ttsForm">
                @csrf

                <div class="mb-6">
                    <!-- Text Input -->
                    <div class="mb-6">
                        <label for="text" class="form-label text-base font-semibold text-gray-700 mb-2 block">
                            {{ __tool('text-to-speech', 'form.label_text') }}
                        </label>
                        <textarea id="text" name="text" rows="8" maxlength="5000"
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all font-mono text-sm"
                            placeholder="{{ __tool('text-to-speech', 'form.placeholder_text') }}" required>{{ old('text') }}</textarea>
                         <p class="text-sm text-gray-500 mt-2 text-right">
                            <span id="charCount">0</span> / 5000 {{ __tool('text-to-speech', 'form.chars_counter') }}
                         </p>
                    </div>

                    <!-- Voice Selection -->
                    <div class="mb-6">
                        <label for="voice" class="form-label text-base font-semibold text-gray-700 mb-2 block">
                            {{ __tool('text-to-speech', 'form.label_voice') }}
                        </label>
                        <div class="relative">
                            <select class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all appearance-none bg-white" id="voice" name="voice" required>
                                @foreach($voices as $lang => $langVoices)
                                    <optgroup label="{{ $lang }}">
                                        @foreach($langVoices as $key => $name)
                                            <option value="{{ $key }}" {{ $key == 'en-US-AriaNeural' ? 'selected' : '' }}>
                                                {{ $name }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-4 justify-center">
                    <button type="submit" id="generateBtn"
                        class="px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl font-bold hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 text-lg flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg> {{ __tool('text-to-speech', 'form.btn_generate') }}
                    </button>
                </div>
            </form>
        </div>

        <!-- Results Section (Hidden by default) -->
        <div id="resultsSection" class="hidden bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-green-200 mb-8 animate-fade-in-up">
            <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">{{ __tool('text-to-speech', 'results.title') }}</h3>
            <div class="flex flex-col items-center">
                <audio id="audioPlayer" controls class="w-full mb-6 rounded-lg shadow-sm border border-gray-100 bg-gray-50 focus:outline-none"></audio>
                
                <div class="flex gap-4">
                    <a id="downloadBtn" href="#" download="speech.mp3" 
                        class="px-8 py-3 bg-green-600 text-white rounded-xl font-bold hover:bg-green-700 transition-all duration-200 shadow-lg flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>
                        {{ __tool('text-to-speech', 'results.btn_download') }}
                    </a>
                    <button type="button" id="newBtn"
                        class="px-6 py-3 bg-gray-100 text-gray-700 rounded-xl font-bold hover:bg-gray-200 transition-all duration-200">
                        {{ __tool('text-to-speech', 'results.btn_new') }}
                    </button>
                </div>
            </div>
        </div>

        <!-- SEO Content Section -->
        <div class="space-y-12 mt-16 font-sans">
            <!-- Intro Card -->
            <div class="bg-gradient-to-br from-indigo-50 to-blue-50 rounded-3xl p-8 md:p-12 border border-indigo-100 shadow-xl relative overflow-hidden">
                <div class="absolute top-0 right-0 -mt-10 -mr-10 w-64 h-64 bg-gradient-to-br from-indigo-200 to-blue-200 rounded-full opacity-20 blur-3xl"></div>
                <div class="relative z-10 text-center">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-indigo-600 to-blue-600 rounded-3xl shadow-lg mb-8 transform -rotate-3 hover:rotate-3 transition-transform duration-300">
                        <svg class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.009 9.009 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z" />
</svg>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6 tracking-tight leading-tight">
                        {{ __tool('text-to-speech', 'content.hero_title') }}
                    </h2>
                    <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                        {{ __tool('text-to-speech', 'content.hero_subtitle') }}
                    </p>
                </div>
            </div>

            <!-- Features Grid -->
            <div>
                <h3 class="text-3xl font-bold text-gray-900 mb-10 text-center">{{ __tool('text-to-speech', 'content.features_title') }}</h3>
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-2xl hover:border-indigo-100 transition-all duration-300 group">
                        <div class="w-14 h-14 bg-indigo-50 rounded-xl flex items-center justify-center mb-6 group-hover:bg-indigo-600 transition-colors duration-300">
                            <svg class="h-8 w-8 text-indigo-600 group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 18.75a6 6 0 0 0 6-6v-1.5m-6 7.5a6 6 0 0 1-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 0 1-3-3V4.5a3 3 0 1 1 6 0v8.25a3 3 0 0 1-3 3Z" />
</svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-3">{{ __tool('text-to-speech', 'content.feature1_title') }}</h4>
                        <p class="text-gray-600">{{ __tool('text-to-speech', 'content.feature1_desc') }}</p>
                    </div>
                    <!-- Feature 2 -->
                    <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-2xl hover:border-purple-100 transition-all duration-300 group">
                        <div class="w-14 h-14 bg-purple-50 rounded-xl flex items-center justify-center mb-6 group-hover:bg-purple-600 transition-colors duration-300">
                            <svg class="h-8 w-8 text-purple-600 group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
</svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-3">{{ __tool('text-to-speech', 'content.feature2_title') }}</h4>
                        <p class="text-gray-600">{{ __tool('text-to-speech', 'content.feature2_desc') }}</p>
                    </div>
                    <!-- Feature 3 -->
                    <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-2xl hover:border-pink-100 transition-all duration-300 group">
                        <div class="w-14 h-14 bg-pink-50 rounded-xl flex items-center justify-center mb-6 group-hover:bg-pink-600 transition-colors duration-300">
                           <svg class="h-8 w-8 text-pink-600 group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
</svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-3">{{ __tool('text-to-speech', 'content.feature3_title') }}</h4>
                        <p class="text-gray-600">{{ __tool('text-to-speech', 'content.feature3_desc') }}</p>
                    </div>
                </div>
            </div>

            <!-- Long Form Article Section -->
            <article class="prose prose-lg max-w-none bg-white rounded-3xl p-8 md:p-12 shadow-sm border border-gray-100">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('text-to-speech', 'content.article_title') }}</h2>
                <div class="text-gray-600 space-y-6">
                    {!! __tool('text-to-speech', 'content.article_body') !!}
                </div>
            </article>

             <!-- How to Guide -->
             <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8 md:p-12">
                <h3 class="text-3xl font-bold text-gray-900 mb-8">{{ __tool('text-to-speech', 'content.how_title') }}</h3>
                <div class="space-y-8">
                    @foreach(range(1, 5) as $step)
                        @if(__tool('text-to-speech', "content.step{$step}_title") !== "tools/youtube.text-to-speech.content.step{$step}_title")
                        <div class="flex flex-col md:flex-row gap-6 items-start">
                            <div class="flex-shrink-0 w-10 h-10 bg-indigo-600 text-white rounded-full flex items-center justify-center font-bold text-lg shadow-lg shadow-indigo-200">{{ $step }}</div>
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 mb-2">{{ __tool('text-to-speech', "content.step{$step}_title") }}</h4>
                                <p class="text-gray-600">{{ __tool('text-to-speech', "content.step{$step}_desc") }}</p>
                            </div>
                        </div>
                        @if(!$loop->last && __tool('text-to-speech', "content.step".($step+1)."_title") !== "tools/youtube.text-to-speech.content.step".($step+1)."_title")
                        <div class="relative pl-5 md:pl-0">
                            <div class="absolute left-5 top-0 bottom-0 w-0.5 bg-gray-100 hidden md:block"></div> 
                        </div>
                        @endif
                        @endif
                    @endforeach
                </div>
            </div>
            
             <!-- FAQ Section -->
             <div>
                <h3 class="text-3xl font-bold text-gray-900 mb-8 text-center">{{ __tool('text-to-speech', 'content.faq_title') }}</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    @foreach(range(1, 10) as $i)
                        @if(__tool('text-to-speech', "content.faq{$i}_q") !== "tools/youtube.text-to-speech.content.faq{$i}_q")
                        <div class="bg-gray-50 rounded-xl p-6 hover:bg-white hover:shadow-lg transition-all border border-gray-100 h-full">
                            <h4 class="font-bold text-gray-900 mb-3">{{ __tool('text-to-speech', "content.faq{$i}_q") }}</h4>
                            <p class="text-gray-600 text-sm">{{ __tool('text-to-speech', "content.faq{$i}_a") }}</p>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
    
@push('scripts')
<script>
    $(document).ready(function() {
        $('#ttsForm').on('submit', function(e) {
            e.preventDefault();
            
            const form = $(this);
            const btn = $('#generateBtn');
            const originalBtnContent = btn.html();
            
            // Loading state
            btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin mr-2"></i> {{ __tool('text-to-speech', 'js.validating') }}');
            
            // Clear previous errors/results
            $('#resultsSection').addClass('hidden');
            $('.text-red-500.tts-error').remove();
            $('textarea, select').removeClass('border-red-500');

            // Form Data
            const formData = new FormData(this);

            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                xhrFields: {
                    responseType: 'blob' // Important for handling audio file
                },
                success: function(blob) {
                    // Create object URL from blob
                    const url = window.URL.createObjectURL(blob);
                    
                    // Update audio player and download button
                    const audioPlayer = document.getElementById('audioPlayer');
                    const downloadBtn = document.getElementById('downloadBtn');
                    
                    audioPlayer.src = url;
                    downloadBtn.href = url;
                    
                    // Show results
                    $('#resultsSection').removeClass('hidden');
                    
                    // Smooth scroll to results
                    $('html, body').animate({
                        scrollTop: $("#resultsSection").offset().top - 100
                    }, 500);
                    
                    // Auto play (optional, maybe better not to auto-play for UX)
                    // audioPlayer.play();
                },
                error: function(xhr) {
                    try {
                        let errorMessage = "{{ __tool('text-to-speech', 'js.error_generic') }}";
                        
                        if (xhr.response) {
                            // Try to parse JSON error from blob if possible
                            const reader = new FileReader();
                            reader.onload = function() {
                                try {
                                    const response = JSON.parse(reader.result);
                                    if (response.errors) {
                                        // Field specific errors
                                        Object.keys(response.errors).forEach(field => {
                                            const input = $(`#${field}`);
                                            input.addClass('border-red-500');
                                            input.after(`<p class="text-red-500 text-xs mt-1 tts-error">${response.errors[field][0]}</p>`);
                                        });
                                        errorMessage = response.message || errorMessage;
                                    } else if (response.message) {
                                        errorMessage = response.message;
                                    }
                                } catch (e) {
                                    // Could not parse JSON, use generic or status text
                                    if (xhr.statusText) errorMessage = xhr.statusText;
                                }
                                
                                // Show toast or alert
                                if (typeof toastr !== 'undefined') {
                                    toastr.error(errorMessage);
                                } else {
                                    alert(errorMessage);
                                }
                            };
                            reader.readAsText(xhr.response);
                        } else {
                            // Fallback if no response blob
                            if (typeof toastr !== 'undefined') {
                                toastr.error(errorMessage);
                            } else {
                                alert(errorMessage);
                            }
                        }
                    } catch (e) {
                        console.error('Error handler failed:', e);
                        // Ensure user is notified even if handler crashes
                        alert("{{ __tool('text-to-speech', 'js.error_generic') }}");
                    }
                },
                complete: function() {
                    btn.prop('disabled', false).html(originalBtnContent);
                }
            });
        });

        // "Generate New" button
        $('#newBtn').click(function() {
            $('#resultsSection').addClass('hidden');
            $('#text').focus();
            
            // Release memory
            const audioPlayer = document.getElementById('audioPlayer');
            if (audioPlayer.src) {
                window.URL.revokeObjectURL(audioPlayer.src);
                audioPlayer.src = '';
            }
        });
        // Character counter
        const maxLength = 5000;
        $('#text').on('input', function() {
            const length = $(this).val().length;
            $('#charCount').text(length);
            
            if (length > maxLength) {
                 $('#charCount').addClass('text-red-600 font-bold');
            } else {
                 $('#charCount').removeClass('text-red-600 font-bold');
            }
        });

        // Trigger on load in case of old input
        $('#text').trigger('input');
    });
</script>
@endpush