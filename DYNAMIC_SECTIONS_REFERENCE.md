# Complete home.blade.php with ALL dynamic sections
# This file contains the corrected sections for SEO, Utility, and Network tools
# To be used as reference for manual updates

## SEO SECTION (after YouTube, around line 77)
Replace the SEO section grid with:

```blade
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
    @foreach($seoTools as $tool)
        <a href="{{ route($tool->route_name) }}" class="tool-card">
            <div class="tool-card-icon">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <h3 class="tool-card-title">{{ $tool->name }}</h3>
            <p class="tool-card-description">{{ Str::limit($tool->meta_description, 80) }}</p>
        </a>
    @endforeach
</div>

<div class="text-center">
    <a href="{{ route('category.seo') }}"
        class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-xl font-bold shadow-lg hover:shadow-2xl transition-all hover:scale-105">
        <span>View All SEO Tools</span>
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
        </svg>
    </a>
</div>
```

## UTILITY SECTION
Replace the Utility section grid with:

```blade
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
    @foreach($utilityTools as $tool)
        <a href="{{ route($tool->route_name) }}" class="tool-card">
            <div class="tool-card-icon">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <h3 class="tool-card-title">{{ $tool->name }}</h3>
            <p class="tool-card-description">{{ Str::limit($tool->meta_description, 80) }}</p>
        </a>
    @endforeach
</div>

<div class="text-center">
    <a href="{{ route('category.utility') }}"
        class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-blue-500 to-cyan-600 text-white rounded-xl font-bold shadow-lg hover:shadow-2xl transition-all hover:scale-105">
        <span>View All Utility Tools</span>
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
        </svg>
    </a>
</div>
```

## NETWORK SECTION
Replace the Network section grid with:

```blade
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
    @foreach($networkTools as $tool)
        <a href="{{ route($tool->route_name) }}" class="tool-card">
            <div class="tool-card-icon">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                </svg>
            </div>
            <h3 class="tool-card-title">{{ $tool->name }}</h3>
            <p class="tool-card-description">{{ Str::limit($tool->meta_description, 80) }}</p>
        </a>
    @endforeach
</div>

<div class="text-center">
    <a href="{{ route('category.network') }}"
        class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-purple-500 to-indigo-600 text-white rounded-xl font-bold shadow-lg hover:shadow-2xl transition-all hover:scale-105">
        <span>View All Network Tools</span>
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
        </svg>
    </a>
</div>
```
