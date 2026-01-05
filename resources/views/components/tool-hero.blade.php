@props(['title' => null, 'description' => null, 'icon' => null, 'tool'])

@php
    // Use provided props, or fall back to $tool properties
    $displayTitle = $title ?? $tool->name ?? $tool->meta_title ?? 'Tool';
    $displayDescription = $description ?? $tool->description ?? $tool->meta_description ?? '';
    $displayIcon = $icon ?? $tool->icon ?? $tool->slug ?? 'default';

    // Category-based gradient colors
    $gradientMap = [
        'network' => 'from-blue-500 via-cyan-500 to-teal-600',
        'seo' => 'from-green-500 via-emerald-500 to-teal-600',
        'youtube' => 'from-red-500 via-pink-500 to-rose-600',
        'utility' => 'from-indigo-500 via-purple-500 to-pink-600',
        'document' => 'from-orange-500 via-amber-500 to-yellow-600',
        'spreadsheet' => 'from-green-600 via-lime-500 to-emerald-600',
        'time' => 'from-violet-500 via-indigo-500 to-purple-600',
    ];

    $gradientClass = $gradientMap[$tool->category] ?? 'from-indigo-500 via-purple-500 to-pink-600';
@endphp

<div class="relative overflow-hidden bg-gradient-to-br {{ $gradientClass }} rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
    <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

    <div class="relative z-10 text-center">
        <div
            class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3 transform -rotate-3 hover:rotate-0 transition-transform duration-300 text-indigo-600">
            @if(!empty($tool->icon_svg))
                {{-- Render SVG from database --}}
                <div class="w-9 h-9">
                    {!! $tool->icon_svg !!}
                </div>
            @else
                {{-- Fallback to icon component --}}
                <x-tool-icon :slug="$displayIcon" class="w-9 h-9 text-indigo-600" />
            @endif
        </div>
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight tracking-tight">
            {{ $displayTitle }}
        </h1>
        <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
            {{ $displayDescription }}
        </p>
        <div class="mt-4">
            @include('components.hero-actions')
        </div>
    </div>
</div>