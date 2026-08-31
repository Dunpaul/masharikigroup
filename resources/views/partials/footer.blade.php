<footer class="border-t border-black/5 bg-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-16">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-8">
            <div>
                <span class="text-lg font-semibold tracking-[0.18em] text-[#111111]">{{ strtoupper($brand['short_name']) }}</span>
                <p class="mt-2 max-w-md text-sm text-gray-600">{{ $brand['tagline'] }}</p>
            </div>

            <div class="flex items-center gap-4">
                @foreach ($brand['socials'] as $network => $url)
                    <a href="{{ $url }}" class="text-sm text-gray-500 hover:text-[var(--accent)] capitalize" target="_blank" rel="noopener">
                        {{ $network }}
                    </a>
                @endforeach
            </div>
        </div>

        @if ($brand['key'] === 'market')
            <div class="mt-10 pt-8 border-t border-black/5">
                @if (session('success'))
                    <p class="text-sm text-green-700 mb-3">{{ session('success') }}</p>
                @elseif (session('error'))
                    <p class="text-sm text-red-700 mb-3">{{ session('error') }}</p>
                @endif
                <form action="{{ route('market.subscribe') }}" method="POST" class="flex flex-col sm:flex-row gap-3 max-w-md">
                    @csrf
                    <input type="email" name="email" placeholder="Enter your email" required class="flex-1 px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--accent)] text-sm">
                    <button type="submit" class="px-5 py-2.5 rounded-lg bg-[var(--accent)] text-white text-sm font-medium">
                        Subscribe to our Newsletter
                    </button>
                </form>
            </div>
        @endif

        @php
            $ecosystemBrands = [
                'group' => ['label' => 'Mashariki Group', 'route' => 'home'],
                'academy' => ['label' => 'Mashariki Arts Academy', 'route' => 'academy.home'],
                'market' => ['label' => 'Masharket', 'route' => 'market.home'],
                'festival' => ['label' => 'Mashariki Film Festival', 'route' => 'festival.home'],
            ];
        @endphp

        <div class="mt-10 pt-8 border-t border-black/5">
            <p class="text-xs uppercase tracking-wider text-gray-400 mb-3">Explore the Mashariki Ecosystem</p>
            <div class="flex flex-wrap gap-x-6 gap-y-2">
                @foreach ($ecosystemBrands as $key => $item)
                    <a
                        href="{{ route($item['route']) }}"
                        class="text-sm {{ $key === $brand['key'] ? 'text-[var(--accent)] font-medium' : 'text-gray-600 hover:text-[var(--accent)]' }} transition"
                    >
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </div>
        </div>

        <div class="mt-6 pt-6 border-t border-black/5 text-sm text-gray-500">
            &copy; {{ now()->year }} {{ $brand['name'] }}. All rights reserved.
        </div>
    </div>
</footer>
