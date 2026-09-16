@extends('layouts.app')

@section('title', 'Plan Your Visit - '.$brand['acronym'])

@section('content')

    @include('partials.navbar')

    @php $hasHero = \App\Models\PageHero::ofPage($brand['key'], request()->route()->getName())->active()->exists(); @endphp
    <section @class(['relative overflow-hidden bg-white flex items-center justify-center text-center px-6', 'min-h-screen' => $hasHero, 'py-16 md:py-24' => ! $hasHero])>
        @include('partials.page-hero')
        @if ($hasHero)
            <div class="absolute inset-0 bg-black/60"></div>
        @endif
        <div class="relative z-10">
            <div class="inline-flex items-center gap-3 rounded-full border border-black/10 bg-[var(--brand-bg)] px-5 py-2.5 mb-6">
                <span class="h-2.5 w-2.5 rounded-full bg-[var(--accent)]"></span>
                <span class="text-[11px] md:text-xs tracking-[0.26em] uppercase text-gray-600 font-medium">Free &amp; Open to the Public</span>
            </div>
            <h1 class="text-3xl md:text-4xl font-medium mb-4 {{ $hasHero ? 'text-white' : 'text-[#111111]' }}">Plan Your Visit</h1>
            <p class="max-w-xl mx-auto {{ $hasHero ? 'text-white/90' : 'text-gray-600' }}">
                {{ $brand['acronym'] }} is free to attend — no tickets, no registration. Just show up.
                @if ($edition?->start_date && $edition?->end_date)
                    This year's festival runs {{ $edition->start_date->format('F jS') }}–{{ $edition->end_date->format('jS, Y') }}.
                @endif
            </p>
        </div>
    </section>

    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-8 mb-16">
                <a href="{{ route('festival.schedule') }}" class="group rounded-2xl border border-black/10 p-8 hover:-translate-y-0.5 transition duration-300">
                    <h2 class="text-xl font-medium text-[#111111] mb-2 group-hover:text-[var(--accent)] transition">See the Schedule →</h2>
                    <p class="text-gray-600">Browse screenings and events by day, venue, or section to plan which ones you want to catch.</p>
                </a>

                <a href="{{ route('festival.films') }}" class="group rounded-2xl border border-black/10 p-8 hover:-translate-y-0.5 transition duration-300">
                    <h2 class="text-xl font-medium text-[#111111] mb-2 group-hover:text-[var(--accent)] transition">Browse the Films →</h2>
                    <p class="text-gray-600">Explore this year's official selection before you go.</p>
                </a>
            </div>

            @if ($venues->isNotEmpty())
                <div class="mb-16">
                    <h2 class="text-xl font-medium text-[#111111] mb-6">Venues</h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        @foreach ($venues as $venue)
                            <div class="rounded-xl border border-black/10 p-6">
                                <h3 class="font-medium text-[#111111] mb-1">{{ $venue->name }}</h3>
                                @if ($venue->address)<p class="text-sm text-gray-500 mb-2">{{ $venue->address }}</p>@endif
                                @if ($venue->transport_notes)<p class="text-sm text-gray-500">{{ $venue->transport_notes }}</p>@endif
                                @if ($venue->accessibility_info)<p class="text-sm text-gray-500 mt-1">{{ $venue->accessibility_info }}</p>@endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="rounded-2xl bg-[var(--brand-bg)] p-8 text-center">
                <h2 class="text-lg font-medium text-[#111111] mb-2">No ticket needed</h2>
                <p class="text-gray-600">
                    Screenings and events are first-come, first-seated. Arrive a little early for popular screenings —
                    there's no booking or reservation system for this festival.
                </p>
            </div>
        </div>
    </section>

    @include('partials.footer')

@endsection
