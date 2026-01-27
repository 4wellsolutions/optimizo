@extends('layouts.app')

@section('title', $post->meta_title ?: $post->title . ' - ' . config('app.name'))
@section('meta_description', $post->meta_description)
@section('meta_keywords', $post->meta_keywords)

@section('content')
    {{-- Reading Progress Bar --}}
    <div class="fixed top-[64px] left-0 w-full h-1 z-[60] pointer-events-none">
        <div id="readingProgress"
            class="h-full bg-gradient-to-r from-indigo-600 to-purple-600 w-0 transition-all duration-150 shadow-[0_0_10px_rgba(79,70,229,0.5)]">
        </div>
    </div>

    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Hero Section --}}
        <header class="relative mb-12 md:mb-20">
            @if($post->featured_image)
                <div
                    class="relative h-[400px] md:h-[600px] w-full rounded-[2.5rem] md:rounded-[4rem] overflow-hidden shadow-2xl">
                    <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}"
                        class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                </div>
            @else
                <div
                    class="relative h-[300px] md:h-[400px] w-full rounded-[2.5rem] md:rounded-[4rem] overflow-hidden bg-gradient-to-br from-indigo-600 via-indigo-700 to-purple-800 shadow-2xl flex items-center justify-center">
                    <svg class="w-32 h-32 text-white/10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z" />
                    </svg>
                </div>
            @endif

            {{-- Floating Title Card --}}
            <div class="relative -mt-24 md:-mt-32 px-4 md:px-12 max-w-5xl mx-auto">
                <div
                    class="bg-white/80 backdrop-blur-2xl rounded-[2rem] md:rounded-[3rem] p-8 md:p-14 shadow-[0_20px_50px_rgba(0,0,0,0.1)] border border-white/50">
                    <div class="flex flex-wrap items-center gap-4 mb-6 md:mb-8">
                        @foreach($post->categories as $cat)
                            <a href="{{ localeRoute('blog.category', ['slug' => $cat->slug]) }}"
                                class="px-5 py-2 bg-indigo-600 text-white rounded-2xl text-xs font-black uppercase tracking-widest shadow-lg shadow-indigo-200 hover:-translate-y-1 transition-transform">
                                {{ $cat->name }}
                            </a>
                        @endforeach
                        <span
                            class="text-gray-400 font-bold text-sm tracking-tight">{{ $post->published_at->format('M d, Y') }}</span>
                    </div>

                    <h1 class="text-3xl md:text-5xl lg:text-6xl font-black text-gray-900 leading-[1.1] tracking-tight mb-8">
                        {{ $post->title }}
                    </h1>

                    <div class="flex items-center">
                        <div
                            class="w-14 h-14 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white text-xl font-black mr-4 shadow-xl">
                            {{ strtoupper(substr($post->author->name, 0, 1)) }}
                        </div>
                        <div>
                            <div class="text-gray-900 font-black text-lg leading-tight">{{ $post->author->name }}</div>
                            <div class="text-gray-400 font-bold text-sm uppercase tracking-widest">Author</div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="flex flex-col lg:flex-row gap-12 lg:gap-16 max-w-[1300px] mx-auto pb-20 relative">
            {{-- Floating Social Share (Desktop) --}}
            <div class="hidden xl:block absolute -left-24 top-0 h-full">
                <div class="sticky top-32 flex flex-col gap-4">
                    <button class="w-12 h-12 rounded-2xl bg-white shadow-lg flex items-center justify-center text-gray-400 hover:text-blue-600 hover:shadow-blue-100 transition-all group">
                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </button>
                    <button class="w-12 h-12 rounded-2xl bg-white shadow-lg flex items-center justify-center text-gray-400 hover:text-blue-400 hover:shadow-blue-50 transition-all group">
                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.84 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                    </button>
                    <button class="w-12 h-12 rounded-2xl bg-white shadow-lg flex items-center justify-center text-gray-400 hover:text-blue-700 hover:shadow-blue-100 transition-all group">
                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </button>
                    <div class="h-20 w-px bg-gray-100 mx-auto mt-4"></div>
                </div>
            </div>

            {{-- Main Blog Content --}}
            <main class="w-full lg:w-[68%]">
                <div class="prose prose-xl prose-indigo max-w-none blog-content">
                    {!! $post->content !!}
                </div>

                {{-- Tags --}}
                @if($post->tags->count() > 0)
                    <div class="mt-20 pt-12 border-t border-gray-100/50">
                        <div class="flex flex-wrap gap-3">
                            @foreach($post->tags as $tag)
                                <a href="{{ localeRoute('blog.tag', ['slug' => $tag->slug]) }}"
                                    class="px-5 py-2.5 bg-gray-50 text-gray-500 rounded-2xl text-sm font-black hover:bg-gray-900 hover:text-white transition-all duration-300 border border-gray-100">
                                    #{{ $tag->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Author Bio Card --}}
                <section
                    class="mt-20 p-8 md:p-12 bg-gradient-to-br from-indigo-50 via-white to-purple-50 rounded-[3rem] border border-white shadow-xl flex flex-col md:flex-row items-center gap-8">
                    <div
                        class="w-24 h-24 md:w-32 md:h-32 rounded-[2rem] bg-indigo-600 flex items-center justify-center text-white text-4xl font-black shadow-2xl flex-shrink-0">
                        {{ strtoupper(substr($post->author->name, 0, 1)) }}
                    </div>
                    <div class="text-center md:text-left">
                        <h3 class="text-2xl font-black text-gray-900 mb-2">Written by {{ $post->author->name }}</h3>
                        <p class="text-gray-600 leading-relaxed text-lg mb-6">Expert in development and SEO with over a
                            decade of experience helping brands build better online presences. Follow for more insights into
                            the digital world.</p>
                        <div class="flex justify-center md:justify-start gap-4">
                            <button
                                class="w-10 h-10 rounded-xl bg-white shadow-md flex items-center justify-center text-gray-400 hover:text-indigo-600 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.84 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                </svg>
                            </button>
                            <button
                                class="w-10 h-10 rounded-xl bg-white shadow-md flex items-center justify-center text-gray-400 hover:text-indigo-600 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.332 3.608 1.308.975.975 1.246 2.242 1.308 3.608.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.062 1.366-.332 2.633-1.308 3.608-.975.975-2.242 1.246-3.608 1.308-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.332-3.608-1.308-.975-.975-1.246-2.242-1.308-3.608-.058-1.266-.07-1.646-.07-4.85s.012-3.584.07-4.85c.062-1.366.332-2.633 1.308-3.608.975-.975 2.242-1.246 3.608-1.308 1.266-.058 1.646-.07 4.85-.07zM12 0C8.74 0 8.333.014 7.053.072c-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948s.014 3.667.072 4.947c.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072s3.667-.014 4.947-.072c4.358-.2 6.78-2.618 6.98-6.98.058-1.281.072-1.689.072-4.948s-.014-3.667-.072-4.947c-.2-4.358-2.618-6.78-6.98-6.98C15.667.014 15.26 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </section>
            </main>

            {{-- Sidebar --}}
            <aside class="w-full lg:w-[32%] space-y-10">
                {{-- Categories Glassmorphism Card --}}
                <div class="sticky top-24">
                    <div
                        class="bg-gray-50/50 backdrop-blur-xl rounded-[2.5rem] p-8 md:p-10 border border-white shadow-[0_8px_30px_rgba(0,0,0,0.02)] mb-10">
                        <h3 class="text-2xl font-black text-gray-900 mb-8 flex items-center gap-3">
                            <span class="w-2.5 h-10 bg-indigo-600 rounded-full"></span>
                            {{ __('Categories') }}
                        </h3>
                        <div class="space-y-4">
                            @foreach($categories as $cat)
                                <a href="{{ localeRoute('blog.category', ['slug' => $cat->slug]) }}"
                                    class="flex items-center justify-between group p-3 -mx-3 rounded-2xl hover:bg-white hover:shadow-md transition-all duration-300">
                                    <span
                                        class="text-gray-600 group-hover:text-indigo-600 transition-colors font-bold text-lg tracking-tight">{{ $cat->name }}</span>
                                    <span
                                        class="px-3 py-1 bg-white text-gray-400 group-hover:bg-indigo-600 group-hover:text-white rounded-xl text-xs font-black transition-all shadow-sm">
                                        {{ $cat->posts_count }}
                                    </span>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    {{-- Recent Posts Stack --}}
                    <div
                        class="bg-white rounded-[2.5rem] p-8 md:p-10 border border-gray-100 shadow-[0_8px_30px_rgba(0,0,0,0.02)]">
                        <h3 class="text-2xl font-black text-gray-900 mb-8 flex items-center gap-3">
                            <span class="w-2.5 h-10 bg-purple-600 rounded-full"></span>
                            {{ __('Recent Posts') }}
                        </h3>
                        <div class="space-y-10">
                            @foreach($recentPosts as $recent)
                                <a href="{{ localeRoute('blog.show', ['slug' => $recent->slug]) }}"
                                    class="group block relative pl-8 pb-1 border-l-2 border-gray-50 hover:border-purple-200 transition-colors">
                                    <div
                                        class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-white border-2 border-gray-100 group-hover:border-purple-500 transition-colors">
                                    </div>
                                    <div class="text-[10px] font-black text-purple-500 uppercase tracking-widest mb-2">
                                        {{ $recent->published_at->format('M d, Y') }}</div>
                                    <h4
                                        class="font-bold text-gray-900 group-hover:text-indigo-600 transition-all duration-300 leading-snug text-lg tracking-tight">
                                        {{ $recent->title }}
                                    </h4>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>

    <style>
        .blog-content {
            @apply text-gray-800 leading-[1.8] font-medium;
        }

        .blog-content h2 {
            @apply text-3xl md:text-5xl font-black text-gray-900 mt-20 mb-10 tracking-tight leading-tight;
        }

        .blog-content h3 {
            @apply text-2xl md:text-4xl font-black text-gray-900 mt-16 mb-8 tracking-tight leading-tight;
        }

        .blog-content p {
            @apply mb-10 text-xl;
        }

        .blog-content ul,
        .blog-content ol {
            @apply mb-12 ml-8 md:ml-12 space-y-6 text-lg md:text-xl;
        }

        .blog-content ul {
            @apply list-disc marker:text-indigo-600;
        }

        .blog-content ol {
            @apply list-decimal marker:text-indigo-600 marker:font-black;
        }

        .blog-content li {
            @apply pl-4;
        }

        .blog-content img {
            @apply rounded-[3rem] shadow-2xl my-16 w-full border border-gray-100;
        }

        .blog-content blockquote {
            @apply border-l-[12px] border-indigo-600 pl-10 md:pl-16 py-8 italic text-2xl md:text-3xl font-black text-gray-900 my-16 bg-indigo-50/40 rounded-r-[3rem];
        }

        .blog-content pre {
            @apply bg-gray-900 text-gray-100 p-8 md:p-12 rounded-[3rem] overflow-x-auto my-16 shadow-2xl;
        }

        .blog-content a {
            @apply text-indigo-600 font-black underline decoration-[3px] decoration-indigo-200 underline-offset-8 hover:decoration-indigo-600 transition-all;
        }

        /* Reading Progress Scroll Listener */
        #readingProgress {
            @apply z-[70];
        }
    </style>

    <script>
        document.addEventListener('scroll', () => {
            const h = document.documentElement,
                b = document.body,
                st = 'scrollTop',
                sh = 'scrollHeight';
            const progress = (h[st] || b[st]) / ((h[sh] || b[sh]) - h.clientHeight) * 100;
            const progressBar = document.getElementById('readingProgress');
            if (progressBar) progressBar.style.width = progress + '%';
        });
    </script>
@endsection