{{-- Tool Content Component - Displays SEO content sections if they exist --}}
@props(['tool'])

@php
    $slug = $tool->slug ?? '';
    // Check if content section exists in translation
    $hasContent = __tool($slug, 'content', false) !== false;
@endphp

@if($hasContent)
    <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
        <div class="prose prose-lg max-w-none">
            {{-- Content sections would go here if they exist --}}
            {{-- This component can be expanded based on specific needs --}}
        </div>
    </div>
@endif