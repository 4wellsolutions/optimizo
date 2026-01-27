@extends('layouts.app')

@section('title', $post->meta_title ?: $post->title . ' - ' . config('app.name'))
@section('meta_description', $post->meta_description)
@section('meta_keywords', $post->meta_keywords)

@section('content')
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">
            {{-- Main Content --}}
            <div class="lg:col-span-3">
                <article class="bg-white rounded-[2.5rem] overflow-hidden shadow-sm border border-gray-100">
                    {{-- Header Image --}}
                    @if($post->featured_image)
                        <div class="aspect-[21/9] w-full overflow-hidden">
                            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}"
                                class="w-full h-full object-cover">
                        </div>
                    @endif

                    <div class="p-8 md:p-12">
                        {{-- Meta Info --}}
                        <div class="flex flex-wrap items-center gap-4 mb-8">
                            <div class="flex items-center">
                                <div
                                    class="w-10 h-10 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white text-sm font-bold mr-3 shadow-md">
                                    {{ strtoupper(substr($post->author->name, 0, 1)) }}
                                </div>
                                <div>
                                    <div class="text-sm font-bold text-gray-900">{{ $post->author->name }}</div>
                                    <div class="text-xs text-gray-500">{{ $post->published_at->format('M d, Y') }}</div>
                                </div>
                            </div>
                            <div class="h-8 w-px bg-gray-100 hidden sm:block"></div>
                            <div class="flex flex-wrap gap-2">
                                @foreach($post->categories as $cat)
                                    <a href="{{ localeRoute('blog.category', $cat->slug) }}"
                                        class="px-3 py-1 bg-gray-50 text-gray-600 rounded-full text-xs font-bold hover:bg-indigo-50 hover:text-indigo-600 transition-colors">
                                        {{ $cat->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <h1 class="text-4xl md:text-5xl font-black text-gray-900 mb-8 leading-tight">
                            {{ $post->title }}
                        </h1>

                        <div class="prose prose-lg max-w-none text-gray-700 blog-content">
                            {!! $post->content !!}
                        </div>

                        {{-- Tags --}}
                        @if($post->tags->count() > 0)
                            <div class="mt-12 pt-8 border-t border-gray-100">
                                <div class="flex flex-wrap gap-2">
                                    <span
                                        class="text-sm font-bold text-gray-500 mr-2 uppercase tracking-wider self-center">{{ __('Tags:') }}</span>
                                    @foreach($post->tags as $tag)
                                        <a href="{{ localeRoute('blog.tag', $tag->slug) }}"
                                            class="px-3 py-1 bg-gray-100 text-gray-500 rounded-lg text-sm hover:bg-gray-200 transition-colors">
                                            #{{ $tag->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </article>

                {{-- Post Navigation/Author Bio could go here --}}
            </div>

            {{-- Sidebar --}}
            <aside class="space-y-10">
                {{-- Categories Widget --}}
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                    <h3 class="text-xl font-black text-gray-900 mb-6 flex items-center gap-2">
                        <span class="w-2 h-8 bg-indigo-600 rounded-full"></span>
                        {{ __('Categories') }}
                    </h3>
                    <div class="space-y-2">
                        @foreach($categories as $cat)
                            <a href="{{ localeRoute('blog.category', $cat->slug) }}"
                                class="flex items-center justify-between group">
                                <span
                                    class="text-gray-600 group-hover:text-indigo-600 transition-colors font-medium">{{ $cat->name }}</span>
                                <span
                                    class="px-2 py-1 bg-gray-50 text-gray-400 group-hover:bg-indigo-50 group-hover:text-indigo-600 rounded-lg text-xs font-bold transition-all">
                                    {{ $cat->posts_count }}
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- Recent Posts Widget --}}
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                    <h3 class="text-xl font-black text-gray-900 mb-6 flex items-center gap-2">
                        <span class="w-2 h-8 bg-purple-600 rounded-full"></span>
                        {{ __('Recent Posts') }}
                    </h3>
                    <div class="space-y-6">
                        @foreach($recentPosts as $recent)
                            <a href="{{ localeRoute('blog.show', $recent->slug) }}" class="group block">
                                <div class="text-xs text-gray-400 mb-1">{{ $recent->published_at->format('M d, Y') }}</div>
                                <h4 class="font-bold text-gray-900 group-hover:text-indigo-600 transition-colors leading-snug">
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
            @apply text-3xl font-bold text-gray-900 mt-12 mb-6;
        }

        .blog-content h3 {
            @apply text-2xl font-bold text-gray-900 mt-10 mb-5;
        }

        .blog-content p {
            @apply mb-6 leading-relaxed;
        }

        .blog-content ul,
        .blog-content ol {
            @apply mb-6 ml-6;
        }

        .blog-content ul {
            @apply list-disc;
        }

        .blog-content ol {
            @apply list-decimal;
        }

        .blog-content li {
            @apply mb-2;
        }

        .blog-content img {
            @apply rounded-2xl shadow-lg my-10 w-full;
        }

        .blog-content blockquote {
            @apply border-l-4 border-indigo-500 pl-6 py-2 italic text-gray-600 my-10 bg-indigo-50/30 rounded-r-2xl;
        }

        .blog-content pre {
            @apply bg-gray-900 text-gray-100 p-6 rounded-2xl overflow-x-auto my-10 shadow-2xl;
        }
    </style>
@endsection