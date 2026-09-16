@extends('layouts.app')

@section('title', 'About - Masharket')

@section('content')

    @include('partials.navbar')

    <!-- HERO -->
    @php $hasHero = \App\Models\PageHero::forPage($brand['key'], request()->route()->getName())->active()->exists(); @endphp
    <section class="relative overflow-hidden py-20 md:py-28 bg-white">
        @include('partials.page-hero')
        @if ($hasHero)
            <div class="absolute inset-0 bg-black/60"></div>
        @endif
        <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8 grid lg:grid-cols-[1fr_360px] gap-12 items-start">
            <div>
                <h1 class="text-4xl md:text-6xl font-medium leading-[1.05] tracking-tight mb-6 max-w-2xl {{ $hasHero ? 'text-white' : 'text-[#111111]' }}">
                    Revolutionizing the Content Ecosystem
                </h1>
                <p class="text-lg max-w-2xl {{ $hasHero ? 'text-white/90' : 'text-gray-700' }}">{{ $settings->event_name }}</p>
            </div>

            <div class="rounded-3xl border border-black/10 bg-[var(--brand-bg)] p-6">
                <h3 class="text-sm uppercase tracking-[0.2em] text-gray-500 mb-3">When &amp; Where</h3>
                @if ($settings->start_date && $settings->end_date)
                    <p class="text-lg font-semibold text-[#111111]">
                        {{ $settings->start_date->format('jS') }} to {{ $settings->end_date->format('jS F, Y') }}
                    </p>
                @else
                    <p class="text-lg font-semibold text-[#111111]">Dates to be announced</p>
                @endif
                @if ($settings->venue_name)
                    <p class="mt-2 text-gray-600">{{ $settings->venue_name }}</p>
                @endif
            </div>
        </div>
    </section>

    <!-- INTRO -->
    <section class="py-16 bg-[var(--brand-bg)]">
        <div class="max-w-4xl mx-auto px-6 lg:px-8 space-y-6 text-lg text-gray-700 leading-8">
            @if ($settings->intro_paragraph_1)
                <p>{{ $settings->intro_paragraph_1 }}</p>
            @endif
            @if ($settings->intro_paragraph_2)
                <p>{{ $settings->intro_paragraph_2 }}</p>
            @endif
            <p>Masharket brings together a team of industry veterans as well as new and established talents from Rwanda and abroad. The event is structured to facilitate the creation, distribution, and monetization of content — partnering with production companies, distributors, and streaming platforms to develop marketing and promotional strategies that reach a wider audience.</p>
        </div>
    </section>

    <!-- TEAM -->
    @if ($team->isNotEmpty())
        <section class="py-24 bg-white">
            <div class="max-w-6xl mx-auto px-6 lg:px-8">
                <h2 class="text-4xl font-medium text-center text-[#111111] mb-12">Our Team</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    @foreach ($team as $member)
                        <div class="text-center">
                            @if ($member->photo_path)
                                <img src="{{ asset('storage/'.$member->photo_path) }}" alt="{{ $member->name }}" class="h-32 w-32 md:h-40 md:w-40 rounded-full object-cover mx-auto mb-4">
                            @endif
                            <h3 class="font-medium text-lg text-[#111111]">{{ $member->name }}</h3>
                            <p class="text-sm text-gray-500 italic">{{ $member->role }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @include('partials.footer')

@endsection
