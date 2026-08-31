@extends('layouts.app')

@section('title', $brand['name'].' ('.$brand['acronym'].')')

@section('content')

    @include('partials.navbar')

    <!-- HERO -->
    <section class="relative min-h-[80vh] flex items-center overflow-hidden bg-gray-900 text-white">
        @if ($edition?->hero_image)
            <img src="{{ asset('storage/'.$edition->hero_image) }}" alt="{{ $edition->theme_name }}" class="absolute inset-0 w-full h-full object-cover opacity-50">
        @endif
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-black/80"></div>

        <div class="relative z-10 max-w-5xl mx-auto px-6 lg:px-8 text-center">
            <div class="inline-flex items-center gap-3 rounded-full border border-white/20 bg-white/10 backdrop-blur px-5 py-2.5 mb-8">
                <span class="h-2.5 w-2.5 rounded-full bg-[var(--accent)]"></span>
                <span class="text-[11px] md:text-xs tracking-[0.26em] uppercase text-white/80 font-medium">
                    {{ $brand['acronym'] }} {{ $edition?->edition_number ? '· Edition '.$edition->edition_number : '' }}
                </span>
            </div>

            <h1 class="text-5xl md:text-7xl font-medium leading-[1.05] tracking-tight mb-6">
                {{ $edition?->theme_name ?? $brand['tagline'] }}
            </h1>

            @if ($edition?->theme_statement)
                <p class="text-lg md:text-xl text-white/80 max-w-2xl mx-auto mb-8">{{ $edition->theme_statement }}</p>
            @endif

            @if ($edition?->start_date && $edition?->end_date)
                <p class="text-white/70 mb-10">
                    {{ $edition->start_date->format('F jS') }}–{{ $edition->end_date->format('jS, Y') }} · Kigali, Rwanda
                </p>
            @else
                <p class="text-white/70 mb-10">Dates to be announced</p>
            @endif

            <div class="flex items-center justify-center gap-4">
                <a href="{{ route('festival.schedule') }}" class="inline-flex items-center rounded-2xl bg-[var(--accent)] px-7 py-4 text-white font-medium shadow-lg transition duration-300 hover:-translate-y-0.5">
                    View Schedule
                </a>
                <a href="{{ route('festival.films') }}" class="inline-flex items-center rounded-2xl border border-white/30 px-7 py-4 text-white font-medium transition duration-300 hover:-translate-y-0.5 hover:bg-white/10">
                    Browse Films
                </a>
            </div>
        </div>
    </section>

    <!-- FEATURED FILMS -->
    @if ($featuredFilms->isNotEmpty())
        <section class="py-20 md:py-28 bg-white">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <h2 class="text-3xl font-medium text-center text-[#111111] mb-12">Featured Films</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                    @foreach ($featuredFilms as $film)
                        <a href="{{ route('festival.films.show', $film->slug) }}" class="group">
                            <div class="aspect-[2/3] rounded-xl overflow-hidden bg-gray-100 mb-3">
                                @if ($film->poster_path)
                                    <img src="{{ asset('storage/'.$film->poster_path) }}" alt="{{ $film->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                @endif
                            </div>
                            <h3 class="font-medium text-sm text-[#111111]">{{ $film->title }}</h3>
                            <p class="text-xs text-gray-500">{{ $film->country }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- SPONSORS (this edition only) -->
    @if ($sponsors->isNotEmpty())
        <section class="py-16 bg-[var(--brand-bg)]">
            <div class="max-w-6xl mx-auto px-6 lg:px-8">
                <h2 class="text-2xl font-medium text-center text-[#111111] mb-10">This Year's Sponsors</h2>
                <div class="flex flex-wrap items-center justify-center gap-10">
                    @foreach ($sponsors as $sponsor)
                        @if ($sponsor->logo_path)
                            <img src="{{ asset('storage/'.$sponsor->logo_path) }}" alt="{{ $sponsor->name }}" class="h-14 object-contain grayscale hover:grayscale-0 transition">
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- PARTNERS (ongoing) -->
    @if ($partners->isNotEmpty())
        <section class="py-16 bg-white">
            <div class="max-w-6xl mx-auto px-6 lg:px-8">
                <h2 class="text-2xl font-medium text-center text-[#111111] mb-10">Our Partners</h2>
                <div class="flex flex-wrap items-center justify-center gap-10">
                    @foreach ($partners as $partner)
                        <img src="{{ asset('storage/'.$partner->logo_path) }}" alt="{{ $partner->name }}" class="h-14 object-contain grayscale hover:grayscale-0 transition">
                    @endforeach
                </div>
                <p class="text-center mt-8">
                    <a href="{{ route('festival.partners') }}" class="text-sm font-medium text-gray-600 hover:text-[var(--accent)] transition">See all partners →</a>
                </p>
            </div>
        </section>
    @endif

    @include('partials.footer')

@endsection
