@extends('layouts.app')

@section('title', isset($category) ? $category->name . ' - ' . config('app.name') : (isset($tag) ? '#' . $tag->name . ' - ' . config('app.name') : __('Blog - ' . config('app.name'))))

@section('content')
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-black text-gray-900 mb-4">
                @if(isset($category))
                    {{ __('Category: :name', ['name' => $category->name]) }}
                @elseif(isset($tag))
                    {{ __('Tag: #:name', ['name' => $tag->name]) }}
                @else
                    {{ __('Our Blog') }}
                @endif
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                {{ __('Exploring insights, tutorials, and latest updates from the Optimizo team.') }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($posts as $post)
                <article
                    class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 flex flex-col group">
                    {{-- Featured Image Placeholder or actual --}}
                    <a href="{{ localeRoute('blog.show', $post->slug) }}" class="relative aspect-video overflow-hidden">
                        @if($post->featured_image)
                            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div
                                class="w-full h-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center p-8">
                                <svg class="w-16 h-16 text-white/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 2v6h6" />
                                </svg>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-colors"></div>
                    </a>

                    <div class="p-6 flex-grow flex flex-col">
                        <div class="flex items-center gap-2 mb-4">
                            @foreach($post->categories as $cat)
                                <a href="{{ localeRoute('blog.category', $cat->slug) }}"
                                    class="px-3 py-1 bg-indigo-50 text-indigo-600 rounded-full text-xs font-bold hover:bg-indigo-100 transition-colors">
                                    {{ $cat->name }}
                                </a>
                            @endforeach
                            <span class="text-xs text-gray-400 ml-auto">{{ $post->published_at->format('M d, Y') }}</span>
                        </div>

                        <h2 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-indigo-600 transition-colors">
                            <a href="{{ localeRoute('blog.show', $post->slug) }}">{{ $post->title }}</a>
                        </h2>

                        <p class="text-gray-600 line-clamp-3 mb-6 flex-grow">
                            {{ $post->excerpt }}
                        </p>

                        <div class="flex items-center pt-6 border-t border-gray-50 mt-auto">
                            <div class="flex items-center">
                                <div
                                    class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 mr-2 text-xs font-bold">
                                    {{ strtoupper(substr($post->author->name, 0, 1)) }}
                                </div>
                                <span class="text-sm font-medium text-gray-700">{{ $post->author->name }}</span>
                            </div>
                            <a href="{{ localeRoute('blog.show', $post->slug) }}"
                                class="ml-auto text-indigo-600 font-bold text-sm flex items-center gap-1 group-hover:gap-2 transition-all">
                                {{ __('Read More') }}
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full py-20 text-center bg-gray-50 rounded-3xl border-2 border-dashed border-gray-200">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ __('No posts found') }}</h2>
                    <p class="text-gray-500">{{ __('We haven\'t published any posts here yet. Check back soon!') }}</p>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $posts->links() }}
        </div>
    </div>
@endsection