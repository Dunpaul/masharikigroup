@php
    $ecosystemBrands = [
        'group' => ['label' => 'Group', 'route' => 'home'],
        'academy' => ['label' => 'Academy', 'route' => 'academy.home'],
        'market' => ['label' => 'Market', 'route' => 'market.home'],
        'festival' => ['label' => 'Festival', 'route' => 'festival.home'],
    ];
@endphp

<div class="w-full bg-[#111111] text-white text-xs">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 h-9 flex items-center justify-between gap-4">
        <a href="{{ route('home') }}" class="flex items-center gap-2 text-white/70 hover:text-white transition whitespace-nowrap">
            <span class="h-1.5 w-1.5 rounded-full bg-[var(--accent)]"></span>
            Part of Mashariki Group
        </a>

        <nav class="flex items-center gap-1">
            @foreach ($ecosystemBrands as $key => $item)
                @php $isCurrent = $key === $brand['key']; @endphp
                <a
                    href="{{ route($item['route']) }}"
                    class="px-2.5 py-1 rounded-full transition whitespace-nowrap {{ $isCurrent ? 'bg-white/15 text-white font-medium' : 'text-white/60 hover:text-white' }}"
                    @if ($isCurrent) aria-current="page" @endif
                >
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>
    </div>
</div>
