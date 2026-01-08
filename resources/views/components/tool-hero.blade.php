@props(['title' => null, 'description' => null, 'icon' => null, 'tool'])

@php
    // Use provided props, or fall back to $tool properties
    $displayTitle = $title ?? __t($tool, 'name') ?? $tool->meta_title ?? __('common.tool_fallback');
    $displayDescription = $description ?? __t($tool, 'meta_description') ?? $tool->description ?? '';
    $displayIcon = $icon ?? $tool->icon ?? $tool->slug ?? 'default';

    // Category-based gradient colors
    // Category-based gradient colors from Database
    $category = $tool->categoryRelation;
    $gradientFrom = $category?->bg_gradient_from ?? '#6366f1'; // Default Indigo-500
    $gradientTo = $category?->bg_gradient_to ?? '#db2777';   // Default Pink-600
    $textColor = $category?->text_color ?? 'text-indigo-600'; // Default text color

    $iconColorClass = $textColor;
@endphp

<div class="relative overflow-hidden bg-gradient-to-br rounded-3xl p-4 md:p-6 mb-8 shadow-2xl"
    style="--tw-gradient-from: {{ $gradientFrom }}; --tw-gradient-to: {{ $gradientTo }}; --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);">
    <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

    <div class="relative z-10 text-center">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-white rounded-2xl shadow-2xl mb-4 transform -rotate-3 hover:rotate-0 transition-transform duration-300">
            <x-tool-icon :slug="$tool->slug" class="{{ $iconColorClass }}" />
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