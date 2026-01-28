@extends('layouts.app')

@section('title', $post->meta_title ?: $post->title . ' - ' . config('app.name'))
@section('meta_description', $post->meta_description)
@section('meta_keywords', $post->meta_keywords)

@push('scripts')
    {{-- Schema.org JSON-LD --}}
    <script type="application/ld+json">
                    {
                        "@@context": "https://schema.org",
                        "@@type": "BlogPosting",
                        "headline": "{{ addslashes($post->title) }}",
                        "image": "{{ $post->featured_image_url }}",
                        "author": {
                            "@@type": "Person",
                            "name": "{{ addslashes($post->author->name) }}"
                        },
                        "publisher": {
                            "@@type": "Organization",
                            "name": "{{ addslashes(config('app.name')) }}",
                            "logo": {
                                "@@type": "ImageObject",
                                "url": "{{ asset('logo.png') }}"
                            }
                        },
                        "datePublished": "{{ $post->published_at->toIso8601String() }}",
                        "dateModified": "{{ $post->updated_at->toIso8601String() }}",
                        "description": "{{ addslashes($post->meta_description ?: Str::limit(strip_tags($post->content), 160)) }}",
                        "mainEntityOfPage": {
                            "@@type": "WebPage",
                            "@@id": "{{ url()->current() }}"
                        }
                    }
                    </script>

    <script type="application/ld+json">
                    {
                        "@@context": "https://schema.org",
                        "@@type": "BreadcrumbList",
                        "itemListElement": [
                            {
                                "@@type": "ListItem",
                                "position": 1,
                                "name": "Home",
                                "item": "{{ localeRoute('home') }}"
                            },
                            {
                                "@@type": "ListItem",
                                "position": 2,
                                "name": "Blog",
                                "item": "{{ localeRoute('blog.index') }}"
                            },
                            {
                                "@@type": "ListItem",
                                "position": 3,
                                "name": "{{ addslashes($post->title) }}",
                                "item": "{{ url()->current() }}"
                            }
                        ]
                    }
                    </script>
@endpush

@section('content')
    {{-- Reading Progress Bar --}}
    <div class="fixed top-[64px] left-0 w-full h-1.5 z-[100] pointer-events-none">
        <div id="readingProgress"
            class="h-full bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 w-0 transition-all duration-150 shadow-[0_0_20px_rgba(139,92,246,0.6)]">
        </div>
    </div>

    {{-- Cinematic Full-Bleed Hero --}}
    <section class="relative h-[40vh] md:h-[50vh] min-h-[400px] w-full overflow-hidden mb-[-8vh] md:mb-[-12vh]">
        @if($post->featured_image_url)
            <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}"
                class="absolute inset-0 w-full h-full object-cover scale-105 animate-slow-zoom">
        @else
            <div class="absolute inset-0 bg-gradient-to-tr from-gray-900 via-indigo-950 to-purple-900"></div>
        @endif

        <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-transparent to-black/80"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/40 via-transparent to-transparent"></div>

        <div class="relative h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col justify-end pb-24 md:pb-36">
            <div class="max-w-4xl space-y-4">
                <nav class="flex items-center gap-3 text-white/70 text-[10px] font-black uppercase tracking-[0.3em]">
                    <a href="{{ localeRoute('home') }}" class="hover:text-white transition-colors">{{ __('Home') }}</a>
                    <span class="w-1 h-1 rounded-full bg-indigo-500"></span>
                    <a href="{{ localeRoute('blog.index') }}" class="hover:text-white transition-colors">{{ __('Blog') }}</a>
                </nav>

                <h1 class="text-3xl md:text-5xl lg:text-6xl font-black text-white leading-[1.1] tracking-tight text-glow">
                    {{ $post->title }}
                </h1>

                <div class="flex flex-wrap items-center gap-6 text-white pt-2">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center text-lg font-black">
                            {{ strtoupper(substr($post->author->name, 0, 1)) }}
                        </div>
                        <span class="font-bold text-sm tracking-wide">{{ $post->author->name }}</span>
                    </div>
                    <div class="w-px h-4 bg-white/20 hidden sm:block"></div>
                    <span class="text-white/60 text-sm font-medium">{{ $post->published_at->format('M d, Y') }}</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Main Content Section --}}
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Fixed Background Blobs --}}
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-indigo-600/5 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-purple-600/5 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="flex flex-col lg:flex-row gap-8 lg:gap-16">

            {{-- Main Column: Right Side --}}
            <main class="w-full lg:w-[68%] xl:w-[70%] space-y-12">
                
                {{-- Premium Author Signature at Top --}}
                <div class="bg-gradient-to-br from-gray-950 via-gray-900 to-indigo-950 rounded-[2.5rem] md:rounded-[3rem] p-8 md:p-12 relative overflow-hidden group shadow-2xl">
                    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/dark-matter.png')] opacity-10"></div>
                    <div class="absolute -right-20 -top-20 w-64 h-64 bg-indigo-500/10 rounded-full blur-[80px] group-hover:bg-indigo-500/20 transition-all duration-700"></div>

                    <div class="relative flex flex-col md:flex-row items-center gap-8">
                        <div class="relative flex-shrink-0">
                            <div class="w-24 h-24 md:w-28 md:h-28 rounded-[1.8rem] bg-gradient-to-tr from-indigo-500 to-purple-600 p-1 shadow-2xl rotate-2 group-hover:rotate-4 transition-transform duration-500">
                                <div class="w-full h-full bg-gray-950 rounded-[1.6rem] flex items-center justify-center text-3xl font-black text-white">
                                    {{ strtoupper(substr($post->author->name, 0, 1)) }}
                                </div>
                            </div>
                            <div class="absolute -bottom-1 -right-1 w-8 h-8 bg-green-500 border-4 border-gray-950 rounded-full"></div>
                        </div>
                        <div class="text-center md:text-left flex-grow">
                            <span class="text-indigo-400 text-[10px] font-black uppercase tracking-[0.25em] mb-2 block">{{ __('Expert Reviewer') }}</span>
                            <h3 class="text-xl md:text-2xl font-black text-white mb-2">
                                {{ __('Masterfully written by :name', ['name' => $post->author->name]) }}
                            </h3>
                            <p class="text-gray-400 leading-relaxed text-sm md:text-base opacity-80">
                                {{ __('Deep-diving into tech trends and architectural paradigms. Bringing you over 15 years of industry insights concentrated into every single word you read.') }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Article Body --}}
                <div class="bg-white/70 backdrop-blur-md rounded-[2.5rem] md:rounded-[3rem] p-8 md:p-14 lg:p-20 shadow-[0_20px_80px_rgba(0,0,0,0.03)] border border-white/50">
                    
                    {{-- Categories --}}
                    <div class="flex flex-wrap gap-2 mb-12">
                        @foreach($post->categories as $cat)
                            <a href="{{ localeRoute('blog.category', ['slug' => $cat->slug]) }}"
                                class="px-5 py-2 bg-indigo-600 text-white rounded-xl text-[10px] font-black uppercase tracking-wider shadow-lg shadow-indigo-100 ring-2 ring-indigo-50 hover:ring-indigo-100 transition-all">
                                {{ $cat->name }}
                            </a>
                        @endforeach
                    </div>

                    {{-- Dynamic Reading Content --}}
                    <article class="prose prose-lg md:prose-xl prose-indigo max-w-none blog-content selection:bg-indigo-100">
                        {!! $post->content !!}
                    </article>

                    <div class="mt-20 pt-10 border-t border-gray-100 flex flex-col md:flex-row md:items-center justify-between gap-6">
                        <div>
                            <span class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] block mb-4">{{ __('Share this story') }}</span>
                            <div class="flex gap-3">
                                <button class="w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white transition-all shadow-sm">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                    </svg>
                                </button>
                                <button class="w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-black hover:text-white transition-all shadow-sm">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25h6.91l4.715 6.238L18.244 2.25z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <a href="{{ localeRoute('blog.index') }}" class="inline-flex items-center gap-2 text-indigo-600 font-bold hover:translate-x-1 transition-transform">
                            {{ __('Back to Blog') }}
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </div>
            </main>

            {{-- Sidebar Column: Right Side --}}
            <aside class="w-full lg:w-[32%] xl:w-[30%] space-y-10">
                <div class="sticky top-28 space-y-10">
                    
                    {{-- Categories Glass-Card --}}
                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-[2.5rem] blur-2xl opacity-5 group-hover:opacity-10 transition-opacity"></div>
                        <div class="relative bg-white/60 backdrop-blur-xl rounded-[2.5rem] p-8 border border-white/50 shadow-[0_8px_30px_rgb(0,0,0,0.02)]">
                            <h3 class="text-lg font-black text-gray-900 mb-6 flex items-center gap-3">
                                <span class="w-1.5 h-6 bg-indigo-600 rounded-full shadow-lg shadow-indigo-200"></span>
                                {{ __('Categories') }}
                            </h3>
                            <div class="space-y-1">
                                @foreach($categories as $cat)
                                    <a href="{{ localeRoute('blog.category', ['slug' => $cat->slug]) }}"
                                        class="flex items-center justify-between group/link p-3 rounded-2xl hover:bg-indigo-600 transition-all duration-300">
                                        <span class="text-gray-700 group-hover/link:text-white transition-colors font-bold text-sm">{{ $cat->name }}</span>
                                        <span class="px-3 py-1 bg-gray-50/50 text-gray-400 group-hover/link:bg-white/20 group-hover/link:text-white rounded-lg text-[9px] font-black transition-all">
                                            {{ $cat->posts_count }}
                                        </span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- Recent Posts Stack --}}
                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-tr from-purple-500 to-pink-500 rounded-[2.5rem] blur-2xl opacity-5 group-hover:opacity-10 transition-opacity"></div>
                        <div class="relative bg-white/60 backdrop-blur-xl rounded-[2.5rem] p-8 border border-white/50 shadow-[0_8px_30px_rgb(0,0,0,0.02)]">
                            <h3 class="text-lg font-black text-gray-900 mb-8 flex items-center gap-3">
                                <span class="w-1.5 h-6 bg-purple-600 rounded-full shadow-lg shadow-purple-200"></span>
                                {{ __('Hot Stories') }}
                            </h3>
                            <div class="space-y-8">
                                @foreach($recentPosts as $recent)
                                    <a href="{{ localeRoute('blog.show', ['slug' => $recent->slug]) }}"
                                        class="group/post block relative">
                                        <div class="text-[9px] font-black text-indigo-500 uppercase tracking-widest mb-2">
                                            {{ $recent->published_at->format('M d, Y') }}
                                        </div>
                                        <h4 class="font-bold text-gray-900 group-hover/post:text-indigo-600 transition-all duration-300 leading-snug text-sm tracking-tight">
                                            {{ $recent->title }}
                                        </h4>
                                        <div class="w-full h-px bg-gray-100/50 mt-4 group-hover/post:bg-indigo-100 transition-colors"></div>
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
        .text-glow {
            text-shadow: 0 0 30px rgba(255,255,255,0.2);
        }

        .blog-content {
            @apply text-gray-700 leading-[1.8] font-[450] tracking-normal;
        }

        .blog-content > p:first-of-type {
            @apply text-xl md:text-2xl font-bold text-gray-800 leading-[1.6] mb-12 opacity-95;
        }

        .blog-content h2 {
            @apply text-2xl md:text-4xl font-black text-gray-900 mt-16 mb-8 tracking-tighter leading-tight;
        }

        .blog-content h3 {
            @apply text-xl md:text-2xl font-black text-gray-900 mt-12 mb-6 tracking-tight;
        }

        .blog-content p {
            @apply mb-8 text-lg md:text-xl opacity-90;
        }

        .blog-content ul,
        .blog-content ol {
            @apply mb-10 ml-6 md:ml-8 space-y-4 text-lg md:text-xl;
        }

        .blog-content ul {
            @apply list-disc marker:text-indigo-500;
        }

        .blog-content ol {
            @apply list-decimal marker:text-indigo-500 marker:font-black;
        }

        .blog-content li {
            @apply pl-4;
        }

        .blog-content img {
            @apply rounded-[2rem] shadow-2xl my-16 w-full hover:scale-[1.01] transition-all duration-500;
        }

        .blog-content blockquote {
            @apply relative py-10 px-8 md:px-14 my-16 text-2xl md:text-3xl font-black text-gray-950 border-none bg-indigo-50/40 rounded-[3rem] italic;
        }

        .blog-content blockquote::before {
            content: '“';
            @apply absolute -top-6 left-6 text-8xl text-indigo-600/10 font-serif leading-none;
        }

        .blog-content pre {
            @apply bg-gray-950 text-indigo-100 p-8 md:p-12 rounded-[2.5rem] overflow-x-auto my-16 shadow-2xl border border-white/5;
        }

        .blog-content a {
            @apply text-indigo-600 font-bold decoration-[3px] decoration-indigo-100 underline-offset-4 hover:decoration-indigo-500 transition-all;
        }

        @keyframes slow-zoom {
            0% { transform: scale(1.05); }
            100% { transform: scale(1.15); }
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

        // Use a more subtle entry animation
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                }
            });
        }, { threshold: 0.05 });

        document.querySelectorAll('.blog-content > *').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'all 0.8s cubic-bezier(0.2, 0.8, 0.2, 1)';
            
            // Add a class when it becomes visible
            observer.observe(el);
        });

        // Add class helper for visibility
        const style = document.createElement('style');
        style.innerHTML = `
            .is-visible {
                opacity: 1 !important;
                transform: translateY(0) !important;
            }
        `;
        document.head.appendChild(style);
    </script>
@endsection
