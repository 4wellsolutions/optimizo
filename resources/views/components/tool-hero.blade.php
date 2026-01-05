@props(['title', 'description', 'icon' => 'default', 'tool'])

<div
    class="relative overflow-hidden bg-gradient-to-br from-blue-600 via-indigo-500 to-purple-500 rounded-3xl p-8 md:p-12 mb-12 shadow-2xl">
    <div class="absolute top-0 right-0 w-80 h-80 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

    <div class="relative z-10 text-center">
        <div
            class="inline-flex items-center justify-center w-20 h-20 bg-white rounded-2xl shadow-2xl mb-8 transform -rotate-3 hover:rotate-0 transition-transform duration-300 text-blue-600">
            <x-tool-icon :slug="$icon" />
        </div>
        <h1 class="text-3xl md:text-5xl font-black text-white mb-6 leading-tight tracking-tight">
            {{ $title }}
        </h1>
        <p class="text-xl md:text-2xl text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
            {{ $description }}
        </p>
        <div class="mt-8">
            @include('components.hero-actions')
        </div>
    </div>
</div>