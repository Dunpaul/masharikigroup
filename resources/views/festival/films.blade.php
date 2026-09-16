@extends('layouts.app')

@section('title', 'Films - '.$brand['acronym'])

@section('content')

    @include('partials.navbar')

    @php $hasHero = \App\Models\PageHero::ofPage($brand['key'], request()->route()->getName())->active()->exists(); @endphp
    <section @class(['relative overflow-hidden bg-white flex items-center justify-center text-center px-6', 'min-h-screen' => $hasHero, 'py-16 md:py-24' => ! $hasHero])>
        @include('partials.page-hero')
        @if ($hasHero)
            <div class="absolute inset-0 bg-black/60"></div>
        @endif
        <h1 class="relative z-10 text-3xl md:text-4xl font-medium {{ $hasHero ? 'text-white' : 'text-[#111111]' }}">Films</h1>
    </section>

    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            @if ($sections->isNotEmpty())
                <div class="flex flex-wrap justify-center gap-2 mb-12">
                    <a href="{{ route('festival.films') }}" class="px-4 py-2 rounded-full text-sm font-medium {{ !$activeSection ? 'bg-[var(--accent)] text-white' : 'bg-[var(--brand-bg)] text-gray-700' }}">
                        All
                    </a>
                    @foreach ($sections as $section)
                        <a href="{{ route('festival.films', ['section' => $section->id]) }}" class="px-4 py-2 rounded-full text-sm font-medium {{ (string) $activeSection === (string) $section->id ? 'bg-[var(--accent)] text-white' : 'bg-[var(--brand-bg)] text-gray-700' }}">
                            {{ $section->name }}
                        </a>
                    @endforeach
                </div>
            @endif

            @if ($films->isEmpty())
                <p class="text-center text-gray-500 py-16">No films published yet for this edition.</p>
            @else
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-8">
                    @foreach ($films as $film)
                        <a href="{{ route('festival.films.show', $film->slug) }}" class="group">
                            <div class="aspect-[2/3] rounded-xl overflow-hidden bg-gray-100 mb-3">
                                @if ($film->poster_path)
                                    <img src="{{ asset('storage/'.$film->poster_path) }}" alt="{{ $film->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                @endif
                            </div>
                            <h3 class="font-medium text-sm text-[#111111]">{{ $film->title }}</h3>
                            <p class="text-xs text-gray-500">{{ $film->country }} @if($film->release_year) · {{ $film->release_year }} @endif</p>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    @include('partials.footer')

@endsection
