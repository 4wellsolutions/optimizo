@extends('layouts.app')

@section('title', $post->meta_title ?: $post->title . ' - ' . config('app.name'))
@section('meta_description', $post->meta_description)
@section('meta_keywords', $post->meta_keywords)

@section('content')
    {{-- Reading Progress Bar --}}
    <div class="fixed top-[64px] left-0 w-full h-1.5 z-[100] pointer-events-none">
        <div id="readingProgress"
            class="h-full bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 w-0 transition-all duration-150 shadow-[0_0_20px_rgba(139,92,246,0.6)]">
        </div>
    </div>

    {{-- Cinematic Full-Bleed Hero --}}
    <section class="relative h-[45vh] md:h-[55vh] min-h-[400px] w-full overflow-hidden mb-[-8vh] md:mb-[-12vh]">
        @if($post->featured_image_url)
            <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}"
                class="absolute inset-0 w-full h-full object-cover scale-105 animate-slow-zoom">
        @else
            <div class="absolute inset-0 bg-gradient-to-tr from-gray-900 via-indigo-950 to-purple-900"></div>
        @endif
        
        {{-- Deep Gradient Overlays for Immersion --}}
        <div class="absolute inset-0 bg-gradient-to-b from-black/30 via-transparent to-black/70"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/50 via-transparent to-transparent"></div>

        <div class="relative h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col justify-end pb-24 md:pb-40">
            <div class="max-w-4xl space-y-4 md:space-y-6">
                <nav class="flex items-center gap-3 text-white/80 text-xs font-black uppercase tracking-[0.2em]">
                    <a href="{{ localeRoute('home') }}" class="hover:text-white transition-colors">Home</a>
                    <span class="w-1 h-1 rounded-full bg-indigo-500"></span>
                    <a href="{{ localeRoute('blog.index') }}" class="hover:text-white transition-colors">Blog</a>
                </nav>

                <h1 class="text-3xl md:text-5xl lg:text-6xl font-black text-white leading-[1.1] tracking-tight drop-shadow-2xl">
                    {{ $post->title }}
                </h1>

                <div class="flex flex-wrap items-center gap-6 text-white pt-2">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center text-2xl font-black shadow-2xl">
                            {{ strtoupper(substr($post->author->name, 0, 1)) }}
                        </div>
                        <div>
                            <p class="text-white/60 text-xs font-black uppercase tracking-widest leading-none mb-1">Written by</p>
                            <p class="text-white font-black text-lg">{{ $post->author->name }}</p>
                        </div>
                    </div>
                    <div class="hidden sm:block h-10 w-px bg-white/20"></div>
                    <div>
                        <p class="text-white/60 text-xs font-black uppercase tracking-widest leading-none mb-1">Published</p>
                        <p class="text-white font-black text-lg">{{ $post->published_at->format('M d, Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Layered Content Section --}}
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-12 lg:gap-16">
            
            {{-- Main Column: The Article --}}
            <main class="w-full lg:w-[65%] xl:w-[68%]">
                <div class="bg-white rounded-[2.5rem] md:rounded-[4rem] p-8 md:p-14 lg:p-20 shadow-[0_40px_100px_rgba(0,0,0,0.08)] border border-gray-100">
                    
                    {{-- Categories --}}
                    <div class="flex flex-wrap gap-2 mb-12">
                        @foreach($post->categories as $cat)
                            <a href="{{ localeRoute('blog.category', ['slug' => $cat->slug]) }}" 
                                class="px-6 py-2.5 bg-indigo-600 text-white rounded-2xl text-xs font-black uppercase tracking-[0.15em] shadow-xl shadow-indigo-100 ring-4 ring-indigo-50 hover:ring-indigo-100 transition-all">
                                {{ $cat->name }}
                            </a>
                        @endforeach
                    </div>

                    {{-- Dynamic Reading Content --}}
                    <article class="prose prose-xl prose-indigo max-w-none blog-content selection:bg-indigo-100">
                        {!! $post->content !!}
                    </article>

                    {{-- Tags & Share Tools --}}
                    <div class="mt-24 pt-16 border-t border-gray-100 flex flex-col md:flex-row md:items-center justify-between gap-8">
                        @if($post->tags->count() > 0)
                            <div class="flex flex-wrap gap-2">
                                @foreach($post->tags as $tag)
                                    <a href="{{ localeRoute('blog.tag', ['slug' => $tag->slug]) }}" 
                                        class="px-5 py-2.5 bg-gray-50 text-gray-400 rounded-xl text-sm font-bold border border-gray-100 hover:bg-white hover:text-indigo-600 hover:border-indigo-200 transition-all">
                                        #{{ $tag->name }}
                                    </a>
                                @endforeach
                            </div>
                        @endif

                        <div class="flex items-center gap-4">
                            <span class="text-xs font-black text-gray-400 uppercase tracking-widest">Share this story</span>
                            <div class="flex gap-2">
                                <button class="w-12 h-12 rounded-2xl bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white transition-all shadow-sm">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                </button>
                                <button class="w-12 h-12 rounded-2xl bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-black hover:text-white transition-all shadow-sm">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25h6.91l4.715 6.238L18.244 2.25z"/></svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Premium Author Signature --}}
                    <footer class="mt-20 p-10 md:p-14 bg-gradient-to-br from-gray-950 via-gray-900 to-indigo-950 rounded-[2.5rem] md:rounded-[3.5rem] relative overflow-hidden group">
                        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/dark-matter.png')] opacity-20"></div>
                        <div class="absolute -right-20 -top-20 w-80 h-80 bg-indigo-500/10 rounded-full blur-[100px] group-hover:bg-indigo-500/20 transition-all duration-700"></div>
                        
                        <div class="relative flex flex-col md:flex-row items-center gap-10">
                            <div class="relative flex-shrink-0">
                                <div class="w-32 h-32 md:w-40 md:h-40 rounded-[2.5rem] bg-gradient-to-tr from-indigo-500 to-purple-600 p-1.5 shadow-2xl rotate-3 group-hover:rotate-6 transition-transform duration-500">
                                    <div class="w-full h-full bg-gray-950 rounded-[2.2rem] flex items-center justify-center text-5xl font-black text-white">
                                        {{ strtoupper(substr($post->author->name, 0, 1)) }}
                                    </div>
                                </div>
                                <div class="absolute -bottom-2 -right-2 w-12 h-12 bg-green-500 border-8 border-gray-950 rounded-full"></div>
                            </div>
                            <div class="text-center md:text-left flex-grow">
                                <span class="text-indigo-400 text-xs font-black uppercase tracking-[0.3em] mb-3 block">Expert Reviewer</span>
                                <h3 class="text-3xl font-black text-white mb-4">Masterfully written by {{ $post->author->name }}</h3>
                                <p class="text-gray-400 leading-relaxed text-lg max-w-xl">Deep-diving into tech trends and architectural paradigms. Bringing you over 15 years of industry insights concentrated into every single word you read.</p>
                            </div>
                        </div>
                    </footer>
                </div>
            </main>

            {{-- Sidebar Column: Glow-Glass Elements --}}
            <aside class="w-full lg:w-[35%] xl:w-[32%] space-y-12">

                {{-- Categories Glow-Card --}}
                <div class="sticky top-28 space-y-12">
                    <div class="relative group">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-[3rem] blur-2xl opacity-10 group-hover:opacity-20 transition-opacity">
                        </div>
                        <div
                            class="relative bg-white/80 backdrop-blur-3xl rounded-[3rem] p-10 border border-white/50 shadow-xl">
                            <h3 class="text-2xl font-black text-gray-900 mb-8 flex items-center gap-3">
                                <span class="w-2.5 h-10 bg-indigo-600 rounded-full shadow-lg shadow-indigo-200"></span>
                                Categories
                            </h3>
                            <div class="space-y-4">
                                @foreach($categories as $cat)
                                    <a href="{{ localeRoute('blog.category', ['slug' => $cat->slug]) }}"
                                        class="flex items-center justify-between group/link p-4 -mx-4 rounded-3xl hover:bg-indigo-600 hover:-translate-y-1 transition-all duration-300">
                                        <span
                                            class="text-gray-700 group-hover/link:text-white transition-colors font-black text-lg">{{ $cat->name }}</span>
                                        <span
                                            class="px-4 py-1.5 bg-gray-50 text-gray-400 group-hover/link:bg-white/20 group-hover/link:text-white rounded-xl text-xs font-black transition-all">
                                            {{ $cat->posts_count }}
                                        </span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- Recent Posts Stack --}}
                    <div class="relative group">
                        <div
                            class="absolute inset-0 bg-gradient-to-tr from-purple-500 to-pink-500 rounded-[3rem] blur-2xl opacity-5 group-hover:opacity-15 transition-opacity">
                        </div>
                        <div
                            class="relative bg-white/60 backdrop-blur-2xl rounded-[3rem] p-10 border border-white/50 shadow-xl">
                            <h3 class="text-2xl font-black text-gray-900 mb-10 flex items-center gap-3">
                                <span class="w-2.5 h-10 bg-purple-600 rounded-full shadow-lg shadow-purple-200"></span>
                                Hot Stories
                            </h3>
                            <div class="space-y-12">
                                @foreach($recentPosts as $recent)
                                    <a href="{{ localeRoute('blog.show', ['slug' => $recent->slug]) }}"
                                        class="group/post block relative">
                                        <div class="text-[10px] font-black text-indigo-500 uppercase tracking-[0.25em] mb-3">
                                            {{ $recent->published_at->format('M d, Y') }}</div>
                                        <h4
                                            class="font-black text-gray-900 group-hover/post:text-indigo-600 transition-all duration-300 leading-snug text-xl tracking-tight">
                                            {{ $recent->title }}
                                        </h4>
                                        <div
                                            class="w-full h-px bg-gray-100 mt-6 group-hover/post:bg-indigo-100 transition-colors">
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>

    <style>
        .blog-content {
            @apply text-gray-800 leading-[1.85] font-medium tracking-tight;
        }

        .blog-content h2 {
            @apply text-3xl md:text-5xl font-black text-gray-950 mt-20 mb-10 tracking-tighter leading-[1.1];
        }

        .blog-content h3 {
            @apply text-2xl md:text-4xl font-black text-gray-900 mt-16 mb-8 tracking-tighter leading-[1.1];
        }

        .blog-content p {
            @apply mb-10 text-xl md:text-2xl opacity-[0.85];
        }

        .blog-content ul,
        .blog-content ol {
            @apply mb-12 ml-6 md:ml-12 space-y-6 text-xl;
        }

        .blog-content ul {
            @apply list-disc marker:text-indigo-600;
        }

        .blog-content ol {
            @apply list-decimal marker:text-indigo-600 marker:font-black;
        }

        .blog-content li {
            @apply pl-6;
        }

        .blog-content img {
            @apply rounded-[3rem] shadow-[0_40px_80px_rgba(0,0,0,0.15)] my-20 w-full hover:scale-[1.02] transition-transform duration-700 cursor-zoom-in;
        }

        .blog-content blockquote {
            @apply relative py-12 px-10 md:px-20 my-20 text-3xl md:text-4xl font-black text-gray-950 border-none bg-indigo-50/50 rounded-[4rem] italic;
        }

        .blog-content blockquote::before {
            content: '“';
            @apply absolute -top-8 left-10 text-[10rem] text-indigo-600/20 font-serif leading-none;
        }

        .blog-content pre {
            @apply bg-gray-950 text-indigo-200 p-10 md:p-14 rounded-[3.5rem] overflow-x-auto my-20 shadow-2xl selection:bg-indigo-900 selection:text-white border border-white/10;
        }

        .blog-content a {
            @apply text-indigo-600 font-extrabold underline decoration-[4px] decoration-indigo-200 underline-offset-8 hover:decoration-indigo-500 transition-all;
        }

        /* Animations */
        @keyframes slow-zoom {
            0% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1.15);
            }
        }

        .animate-slow-zoom {
            animation: slow-zoom 40s infinite alternate;
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

        // Add reveal animations to headings
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.blog-content h2, .blog-content h3').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'all 1s cubic-bezier(0.22, 1, 0.36, 1)';
            observer.observe(el);
        });
    </script>
@endsection