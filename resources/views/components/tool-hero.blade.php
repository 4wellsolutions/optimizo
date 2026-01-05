@props(['title', 'description', 'icon' => 'default', 'tool'])

<div
    class="relative overflow-hidden bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
    <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

    <div class="relative z-10 text-center">
        <div
            class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3 transform -rotate-3 hover:rotate-0 transition-transform duration-300 text-indigo-600">
            <x-tool-icon :slug="$icon" />
        </div>
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight tracking-tight">
            {{ $title }}
        </h1>
        <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
            {{ $description }}
        </p>
        <div class="mt-4">
            @include('components.hero-actions')
        </div>
    </div>
</div>