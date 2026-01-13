@props(['tool', 'gradientFrom' => null, 'gradientTo' => null])

<a href="{{ localeRoute($tool->route_name) }}"
    class="group bg-white rounded-2xl p-6 shadow-lg border-2 transition-all duration-300 transform hover:-translate-y-2 hover:shadow-2xl"
    @if($gradientFrom && $gradientTo) style="border-color: rgba(0,0,0,0.05);"
        onmouseover="this.style.borderColor='{{ $gradientFrom }}'" onmouseout="this.style.borderColor='rgba(0,0,0,0.05)'"
    @else style="border-color: rgba(0,0,0,0.05);" onmouseover="this.style.borderColor='rgba(99, 102, 241, 1)'"
    onmouseout="this.style.borderColor='rgba(0,0,0,0.05)'" @endif>
    <div class="flex items-center gap-4 mb-4">
        <div class="w-14 h-14 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform"
            @if($gradientFrom && $gradientTo)
                style="background: linear-gradient(to bottom right, {{ $gradientFrom }}, {{ $gradientTo }}); color: white;"
            @else style="background: linear-gradient(to bottom right, #6366f1, #8b5cf6); color: white;" @endif>
            @include('components.tool-icon', ['slug' => $tool->slug])
        </div>
        <div class="flex-1">
            <h3 class="font-bold text-lg text-gray-900 transition-colors" @if($gradientTo)
                style="transition: color 0.3s;" onmouseover="this.style.color='{{ $gradientTo }}'"
            onmouseout="this.style.color=''" @endif>
                {{ __tool($tool->slug, 'meta.h1') ?: __tool($tool->slug, 'meta.title') ?: __tool($tool->slug, 'form.title') ?: $tool->slug }}
            </h3>
        </div>
    </div>
    <p class="text-gray-600 text-sm leading-relaxed">
        {{ Str::limit(__tool($tool->slug, 'meta.subtitle') ?: __tool($tool->slug, 'seo.description') ?: __tool($tool->slug, 'meta.desc') ?: '', 100) }}
    </p>
</a>