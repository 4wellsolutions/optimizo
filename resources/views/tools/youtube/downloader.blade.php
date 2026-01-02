@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', 
@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- SEO-Optimized Header with Gradient Background -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-red-500 via-pink-500 to-purple-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">
                    YouTube Video Downloader
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                    Download YouTube videos in multiple quality options - HD, SD, and MP3 audio!
                </p>@include('components.hero-actions')
        
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-red-50 to-pink-50 rounded-2xl p-6 md:p-8 mt-8 border-2 border-red-100 shadow-xl">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Free YouTube Video Downloader</h2>
            <p class="text-gray-700 leading-relaxed mb-6 text-lg">
                Download YouTube videos easily with our free online video downloader. Choose from multiple quality options
                including Full HD (1080p), HD (720p), SD (480p), 360p, and MP3 audio format. No registration required,
                completely free, and works with all YouTube videos. Perfect for saving videos for offline viewing, creating
                compilations, or extracting audio for podcasts and music.
            </p>
            <div class="grid md:grid-cols-3 gap-4 mt-6">
                <div
                    class="bg-white rounded-xl p-5 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-red-200">
                    <div class="text-4xl mb-3">🎬</div>
                    <h3 class="font-bold text-red-600 mb-2 text-lg">Multiple Formats</h3>
                    <p class="text-sm text-gray-600">Download in MP4, WebM, or extract MP3 audio from videos</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-pink-200">
                    <div class="text-4xl mb-3">⚡</div>
                    <h3 class="font-bold text-pink-600 mb-2 text-lg">Fast Downloads</h3>
                    <p class="text-sm text-gray-600">Quick processing and high-speed download links</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-purple-200">
                    <div class="text-4xl mb-3">🔒</div>
                    <h3 class="font-bold text-purple-600 mb-2 text-lg">Safe & Secure</h3>
                    <p class="text-sm text-gray-600">No malware, no viruses, completely safe to use</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#downloaderForm').on('submit', function (e) {
            e.preventDefault();

            const url = $('#url').val().trim();
            const btn = $(this).find('button[type="submit"]');
            const btnText = $('#btnText');

            if (!url) {
                showError('Please enter a YouTube URL');
                return;
            }

            // Show loading
            btn.prop('disabled', true).addClass('opacity-75');
            btnText.text('Processing...');
            $('#resultsSection').addClass('hidden');
            $('#errorMessage').addClass('hidden');

            // AJAX Request
            $.ajax({
                url: '{{ route("youtube.downloader.get") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    url: url
                },
                success: function (response) {
                    if (response.success) {
                        displayDownloadOptions(response.data);
                        $('#resultsSection').removeClass('hidden');
                        setTimeout(() => {
                            $('#resultsSection')[0].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                        }, 100);
                    }
                },
                error: function (xhr) {
                    const error = xhr.responseJSON?.error || 'Failed to process video. Please check the URL and try again.';
                    showError(error);
                },
                complete: function () {
                    btn.prop('disabled', false).removeClass('opacity-75');
                    btnText.text('Get Download Options');
                }
            });
        });

        function displayDownloadOptions(data) {
            $('#videoThumbnail').attr('src', data.thumbnail);
            $('#videoTitle').text(data.title);
            
            const formatsList = $('#formatsList');
            formatsList.empty();
            
            data.formats.forEach(format => {
                const icon = format.type === 'audio' ? '🎵' : '🎬';
                const colorClass = format.type === 'audio' ? 'border-purple-200 hover:border-purple-500' : 'border-blue-200 hover:border-blue-500';
                
                const formatHtml = `
                    <div class="flex items-center justify-between p-4 border-2 ${colorClass} rounded-xl hover:shadow-lg transition-all duration-300">
                        <div class="flex items-center gap-4">
                            <div class="text-3xl">${icon}</div>
                            <div>
                                <div class="font-bold text-gray-900">${format.quality}</div>
                                <div class="text-sm text-gray-600">Format: ${format.format.toUpperCase()} • Size: ${format.size}</div>
                            </div>
                        </div>
                        <a href="${format.url}" download="${data.title}.${format.format}" class="btn-primary px-6 py-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                            <span>Download</span>
                        </a>
                    </div>
                `;
                formatsList.append(formatHtml);
            });
        }

        function showError(message) {
            $('#errorText').text(message);
            $('#errorMessage').removeClass('hidden');
            setTimeout(() => {
                $('#errorMessage')[0].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }, 100);
        }
    </script>
@endsection