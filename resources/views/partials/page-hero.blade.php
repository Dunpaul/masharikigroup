@php
    $__pageHeroes = \App\Models\PageHero::forPage($brand['key'], request()->route()->getName())
        ->active()
        ->orderBy('sort_order')
        ->get();
@endphp

@if ($__pageHeroes->isNotEmpty())
    <div
        @if ($__pageHeroes->count() > 1)
            x-data="{ active: 0, count: {{ $__pageHeroes->count() }} }"
            x-init="setInterval(() => active = (active + 1) % count, 5000)"
        @endif
        class="absolute inset-0"
    >
        @foreach ($__pageHeroes as $i => $hero)
            <div
                class="absolute inset-0 transition-opacity duration-[1500ms] ease-in-out"
                @if ($__pageHeroes->count() > 1)
                    :class="active === {{ $i }} ? 'opacity-100' : 'opacity-0'"
                @else
                    style="opacity: 1"
                @endif
            >
                <img
                    src="{{ asset('storage/'.$hero->image_path) }}"
                    alt="{{ $hero->alt_text ?? $hero->caption ?? '' }}"
                    class="w-full h-full object-cover"
                    loading="{{ $i === 0 ? 'eager' : 'lazy' }}"
                >
            </div>
        @endforeach
    </div>
@endif
