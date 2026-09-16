<header
    x-data="{ open: false }"
    class="sticky top-0 z-50 w-full border-b border-black/5 bg-[var(--brand-bg)]/80 backdrop-blur-xl"
>
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between">

            <a href="{{ route($brand['nav'][0]['route']) }}" class="group inline-flex items-center gap-3">
                @php $logo = $brand['logo'] ?? null; @endphp

                @if ($logo && ($logo['type'] ?? 'wordmark') === 'wordmark')
                    {{-- Full logo replaces the text lockup entirely --}}
                    <img
                        src="{{ asset($logo['src']) }}"
                        alt="{{ $brand['name'] }}"
                        class="h-10 md:h-11 w-auto object-contain transition duration-300 group-hover:-translate-y-0.5"
                    >
                @elseif ($logo && ($logo['type'] ?? 'wordmark') === 'icon')
                    {{-- Icon sits beside the text lockup --}}
                    <img
                        src="{{ asset($logo['src']) }}"
                        alt="{{ $brand['name'] }}"
                        class="h-11 w-11 object-contain transition duration-300 group-hover:-translate-y-0.5"
                    >
                    <div class="flex flex-col leading-none">
                        @if ($logo['show_prefix'] ?? true)
                            <span class="text-[11px] uppercase tracking-[0.28em] text-gray-500">
                                {{ $logo['prefix'] ?? 'Mashariki' }}
                            </span>
                        @endif
                        <span class="text-base md:text-lg font-semibold tracking-[0.18em] text-[#111111]">
                            {{ strtoupper($logo['text'] ?? $brand['short_name']) }}
                        </span>
                    </div>
                @else
                    {{-- Fallback: letter-box + text wordmark --}}
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl border border-black/15 bg-white/70 text-sm font-semibold text-black shadow-sm transition duration-300 group-hover:-translate-y-0.5 group-hover:shadow-md">
                        {{ strtoupper(substr($brand['short_name'], 0, 1)) }}
                    </div>

                    <div class="flex flex-col leading-none">
                        <span class="text-[11px] uppercase tracking-[0.28em] text-gray-500">
                            Mashariki
                        </span>
                        <span class="text-base md:text-lg font-semibold tracking-[0.18em] text-[#111111]">
                            {{ strtoupper($brand['short_name']) }}
                        </span>
                    </div>
                @endif
            </a>

            <nav class="hidden md:flex items-center gap-1 flex-wrap justify-end rounded-full border border-black/5 bg-white/60 px-3 py-2 shadow-sm backdrop-blur max-w-2xl">
                @foreach ($brand['nav'] as $item)
                    @if (isset($item['children']))
                        @php
                            $childRoutes = collect($item['children'])->pluck('route')->filter()->all();
                            $isActive = request()->routeIs($item['route']) || request()->routeIs(...$childRoutes);
                        @endphp
                        <div class="relative" x-data="{ subOpen: false }" @click.outside="subOpen = false">
                            <button
                                type="button"
                                @click="subOpen = !subOpen"
                                class="{{ $isActive ? 'bg-[var(--accent)] text-white shadow-sm' : 'text-gray-700 hover:text-[var(--accent)]' }} inline-flex items-center gap-1 rounded-full px-3.5 py-2 text-sm font-medium transition duration-300 whitespace-nowrap"
                            >
                                {{ $item['label'] }}
                                <svg class="h-3.5 w-3.5 transition-transform" :class="subOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                            <div
                                x-show="subOpen"
                                x-transition:enter="transition ease-out duration-150"
                                x-transition:enter-start="opacity-0 -translate-y-1"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-cloak
                                class="absolute left-0 mt-2 w-64 rounded-2xl border border-black/5 bg-white p-2 shadow-lg"
                            >
                                @foreach ($item['children'] as $child)
                                    <a
                                        href="{{ ($child['external'] ?? false) ? $child['url'] : route($child['route']) }}"
                                        @if ($child['external'] ?? false) target="_blank" rel="noopener noreferrer" @endif
                                        class="block rounded-xl px-4 py-2.5 text-sm text-gray-700 hover:bg-[var(--brand-bg)] hover:text-[var(--accent)] transition"
                                    >
                                        {{ $child['label'] }}
                                        @if ($child['external'] ?? false)
                                            <span class="text-gray-400">↗</span>
                                        @endif
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <a
                            href="{{ route($item['route']) }}"
                            class="{{ request()->routeIs($item['route']) ? 'bg-[var(--accent)] text-white shadow-sm' : 'text-gray-700 hover:text-[var(--accent)]' }} rounded-full px-3.5 py-2 text-sm font-medium transition duration-300 whitespace-nowrap"
                        >
                            {{ $item['label'] }}
                        </a>
                    @endif
                @endforeach
            </nav>

            <div class="hidden md:flex items-center gap-3">
                @isset($brand['secondary'])
                    <a href="{{ route($brand['secondary']['route']) }}" class="text-sm font-medium text-gray-600 hover:text-[var(--accent)] transition whitespace-nowrap">
                        {{ $brand['secondary']['label'] }}
                    </a>
                @endisset

                <a
                    href="{{ isset($brand['cta']['url']) ? $brand['cta']['url'] : route($brand['cta']['route']) }}"
                    @if (isset($brand['cta']['url'])) target="_blank" rel="noopener noreferrer" @endif
                    class="inline-flex items-center rounded-full bg-[var(--accent)] px-5 py-3 text-sm font-medium text-white shadow-lg shadow-black/10 transition duration-300 hover:-translate-y-0.5 whitespace-nowrap"
                >
                    {{ $brand['cta']['label'] }}
                </a>
            </div>

            <button
                type="button"
                @click="open = !open"
                class="md:hidden inline-flex h-11 w-11 items-center justify-center rounded-xl border border-black/10 bg-white/70 text-black shadow-sm transition"
                aria-label="Open menu"
                :aria-expanded="open.toString()"
            >
                <svg x-show="!open" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 7h16M4 12h16M4 17h16"/>
                </svg>

                <svg x-show="open" x-cloak class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M6 6l12 12M18 6L6 18"/>
                </svg>
            </button>

        </div>

        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            x-cloak
            class="md:hidden pb-5"
        >
            <div class="rounded-3xl border border-black/5 bg-white/80 p-3 shadow-lg backdrop-blur-xl">
                <nav class="flex flex-col gap-1">
                    @foreach ($brand['nav'] as $item)
                        @if (isset($item['children']))
                            <div class="px-4 pt-3 pb-1 text-xs uppercase tracking-wider text-gray-400">{{ $item['label'] }}</div>
                            @foreach ($item['children'] as $child)
                                <a
                                    href="{{ ($child['external'] ?? false) ? $child['url'] : route($child['route']) }}"
                                    @if ($child['external'] ?? false) target="_blank" rel="noopener noreferrer" @endif
                                    class="text-gray-700 hover:bg-black/[0.04] hover:text-[var(--accent)] rounded-2xl px-4 py-3 text-sm font-medium transition"
                                >
                                    {{ $child['label'] }}
                                </a>
                            @endforeach
                        @else
                            <a
                                href="{{ route($item['route']) }}"
                                class="{{ request()->routeIs($item['route']) ? 'bg-[var(--accent)] text-white' : 'text-gray-700 hover:bg-black/[0.04] hover:text-[var(--accent)]' }} rounded-2xl px-4 py-3 text-sm font-medium transition"
                            >
                                {{ $item['label'] }}
                            </a>
                        @endif
                    @endforeach

                    @isset($brand['secondary'])
                        <a href="{{ route($brand['secondary']['route']) }}" class="mt-2 text-center text-sm font-medium text-gray-600 hover:text-[var(--accent)] transition px-4 py-2">
                            {{ $brand['secondary']['label'] }}
                        </a>
                    @endisset

                    <a
                        href="{{ isset($brand['cta']['url']) ? $brand['cta']['url'] : route($brand['cta']['route']) }}"
                        @if (isset($brand['cta']['url'])) target="_blank" rel="noopener noreferrer" @endif
                        class="inline-flex items-center justify-center rounded-2xl bg-[var(--accent)] px-5 py-3 text-sm font-medium text-white shadow-lg shadow-black/10 transition duration-300"
                    >
                        {{ $brand['cta']['label'] }}
                    </a>
                </nav>
            </div>
        </div>
    </div>
</header>
