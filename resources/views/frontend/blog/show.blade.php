@extends('layouts.app')

@section('title', $post->meta_title ?: $post->title . ' - ' . config('app.name'))
@section('meta_description', $post->meta_description)
@section('meta_keywords', $post->meta_keywords)

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-8 lg:gap-16">
            {{-- Main Content --}}
            <div class="w-full lg:w-[68%]">
                <article
                    class="bg-white rounded-[2rem] md:rounded-[3rem] overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100/50">
                    {{-- Header Image --}}
                    @if($post->featured_image)
                        <div class="aspect-video lg:aspect-[21/10] w-full overflow-hidden">
                            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}"
                                class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-700">
                        </div>
                    @endif

                    <div class="p-8 md:p-12 lg:p-16">
                        {{-- Meta Info --}}
                        <div class="flex flex-wrap items-center gap-6 mb-10">
                            <div class="flex items-center group">
                                <div
                                    class="w-12 h-12 rounded-2xl bg-gradient-to-br from-indigo-600 to-purple-600 flex items-center justify-center text-white text-base font-black mr-4 shadow-lg shadow-indigo-100 group-hover:rotate-6 transition-transform">
                                    {{ strtoupper(substr($post->author->name, 0, 1)) }}
                                </div>
                                <div>
                                    <div class="text-sm font-bold text-gray-900 tracking-tight">{{ $post->author->name }}
                                    </div>
                                    <div class="text-xs font-semibold text-gray-400 uppercase tracking-widest">
                                        {{ $post->published_at->format('M d, Y') }}</div>
                                </div>
                            </div>
                            <div class="h-10 w-px bg-gray-100 hidden sm:block"></div>
                            <div class="flex flex-wrap gap-2">
                                @foreach($post->categories as $cat)
                                    <a href="{{ localeRoute('blog.category', ['slug' => $cat->slug]) }}"
                                        class="px-4 py-1.5 bg-indigo-50/50 text-indigo-600 rounded-xl text-xs font-black uppercase tracking-wider hover:bg-indigo-600 hover:text-white transition-all duration-300">
                                        {{ $cat->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <h1
                            class="text-4xl md:text-5xl lg:text-6xl font-black text-gray-900 mb-10 leading-[1.15] tracking-tight">
                            {{ $post->title }}
                        </h1>

                        <div
                            class="prose prose-xl prose-indigo max-w-none text-gray-700/90 blog-content leading-relaxed font-medium">
                            {!! $post->content !!}
                        </div>

                        {{-- Tags --}}
                        @if($post->tags->count() > 0)
                            <div class="mt-16 pt-10 border-t border-gray-50">
                                <div class="flex flex-wrap gap-3">
                                    <span
                                        class="text-xs font-black text-gray-400 mr-2 uppercase tracking-[0.2em] self-center">{{ __('Tags:') }}</span>
                                    @foreach($post->tags as $tag)
                                        <a href="{{ localeRoute('blog.tag', ['slug' => $tag->slug]) }}"
                                            class="px-4 py-2 bg-gray-50 text-gray-500 rounded-xl text-sm font-bold hover:bg-gray-900 hover:text-white transition-all duration-300">
                                            #{{ $tag->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </article>
            </div>

            {{-- Sidebar --}}
            <aside class="w-full lg:w-[32%] space-y-10">
                {{-- Categories Widget --}}
                <div
                    class="bg-white rounded-[2.5rem] p-8 lg:p-10 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100/50">
                    <h3 class="text-2xl font-black text-gray-900 mb-8 flex items-center gap-3">
                        <span class="w-2.5 h-10 bg-indigo-600 rounded-full shadow-lg shadow-indigo-100"></span>
                        {{ __('Categories') }}
                    </h3>
                    <div class="space-y-4">
                        @foreach($categories as $cat)
                            <a href="{{ localeRoute('blog.category', ['slug' => $cat->slug]) }}"
                                class="flex items-center justify-between group p-3 -mx-3 rounded-2xl hover:bg-gray-50 transition-all duration-300">
                                <span
                                    class="text-gray-600 group-hover:text-indigo-600 transition-colors font-bold text-lg tracking-tight">{{ $cat->name }}</span>
                                <span
                                    class="px-3 py-1 bg-gray-50 text-gray-400 group-hover:bg-indigo-100 group-hover:text-indigo-600 rounded-xl text-xs font-black transition-all">
                                    {{ $cat->posts_count }}
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- Recent Posts Widget --}}
                <div
                    class="bg-white rounded-[2.5rem] p-8 lg:p-10 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100/50">
                    <h3 class="text-2xl font-black text-gray-900 mb-8 flex items-center gap-3">
                        <span class="w-2.5 h-10 bg-purple-600 rounded-full shadow-lg shadow-purple-100"></span>
                        {{ __('Recent Posts') }}
                    </h3>
                    <div class="space-y-8">
                        @foreach($recentPosts as $recent)
                            <a href="{{ localeRoute('blog.show', ['slug' => $recent->slug]) }}" class="group block">
                                <div class="text-[10px] font-black text-indigo-500 uppercase tracking-widest mb-2">
                                    {{ $recent->published_at->format('M d, Y') }}</div>
                                <h4
                                    class="font-bold text-gray-900 group-hover:text-indigo-600 transition-all duration-300 leading-snug text-lg tracking-tight">
                                    {{ $recent->title }}
                                </h4>
                            </a>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
    </div>

    <style>
        .blog-content h2 {
            @apply text-3xl md:text-4xl font-black text-gray-900 mt-16 mb-8 tracking-tight;
        }

        .blog-content h3 {
            @apply text-2xl md:text-3xl font-black text-gray-900 mt-12 mb-6 tracking-tight;
        }

        .blog-content p {
            @apply mb-8 leading-[1.8] text-gray-700/90;
        }

        .blog-content ul,
        .blog-content ol {
            @apply mb-10 ml-8 space-y-4;
        }

        .blog-content ul {
            @apply list-disc marker:text-indigo-500;
        }

        .blog-content ol {
            @apply list-decimal marker:text-indigo-600 marker:font-black;
        }

        .blog-content li {
            @apply pl-2;
        }

        .blog-content img {
            @apply rounded-[2rem] shadow-2xl shadow-indigo-100/50 my-12 w-full border border-gray-100;
        }

        .blog-content blockquote {
            @apply border-l-[6px] border-indigo-600 pl-8 py-4 italic text-xl font-bold text-gray-800 my-12 bg-indigo-50/40 rounded-r-[2rem];
        }

        .blog-content pre {
            @apply bg-gray-900 text-gray-100 p-8 rounded-[2rem] overflow-x-auto my-12 shadow-2xl;
        }

        .blog-content a {
            @apply text-indigo-600 font-bold underline decoration-2 decoration-indigo-200 underline-offset-4 hover:decoration-indigo-600 transition-all;
        }
    </style>
@endsection