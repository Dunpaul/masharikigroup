@extends('layouts.app')

@section('title', $film->title.' - '.$brand['acronym'])

@section('content')

    @include('partials.navbar')

    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-5xl mx-auto px-6 lg:px-8">
            <a href="{{ route('festival.films') }}" class="text-sm text-gray-500 hover:text-[var(--accent)]">&larr; Back to Films</a>

            <div class="grid md:grid-cols-[300px_1fr] gap-10 mt-6">
                <div class="aspect-[2/3] rounded-2xl overflow-hidden bg-gray-100">
                    @if ($film->poster_path)
                        <img src="{{ asset('storage/'.$film->poster_path) }}" alt="{{ $film->title }}" class="w-full h-full object-cover">
                    @endif
                </div>

                <div>
                    @if ($film->section)
                        <span class="inline-block px-3 py-1 rounded-full bg-[var(--brand-bg)] text-xs font-medium text-gray-600 mb-4">{{ $film->section->name }}</span>
                    @endif

                    <h1 class="text-3xl md:text-4xl font-medium text-[#111111] mb-2">{{ $film->title }}</h1>
                    @if ($film->original_title && $film->original_title !== $film->title)
                        <p class="text-gray-500 italic mb-4">{{ $film->original_title }}</p>
                    @endif

                    <div class="flex flex-wrap gap-x-6 gap-y-1 text-sm text-gray-600 mb-6">
                        @if ($film->director)<span>Dir. {{ $film->director }}</span>@endif
                        @if ($film->country)<span>{{ $film->country }}</span>@endif
                        @if ($film->release_year)<span>{{ $film->release_year }}</span>@endif
                        @if ($film->runtime_minutes)<span>{{ $film->runtime_minutes }} min</span>@endif
                        @if ($film->language)<span>{{ $film->language }}</span>@endif
                    </div>

                    @if ($film->synopsis)
                        <p class="text-gray-700 leading-8 mb-8">{{ $film->synopsis }}</p>
                    @endif

                    @if ($film->trailer_url)
                        <a href="{{ $film->trailer_url }}" target="_blank" rel="noopener" class="inline-flex items-center rounded-full bg-[var(--accent)] px-6 py-3 text-white text-sm font-medium mb-8">
                            Watch Trailer
                        </a>
                    @endif

                    @if ($film->guests->isNotEmpty())
                        <div class="mb-8">
                            <h3 class="text-sm uppercase tracking-wider text-gray-500 mb-3">Cast &amp; Crew</h3>
                            <div class="flex flex-wrap gap-3">
                                @foreach ($film->guests as $guest)
                                    <span class="text-sm text-gray-700">{{ $guest->name }} @if($guest->pivot->role_on_film) <span class="text-gray-400">({{ $guest->pivot->role_on_film }})</span> @endif</span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if ($film->screenings->isNotEmpty())
                        <div>
                            <h3 class="text-sm uppercase tracking-wider text-gray-500 mb-3">Screenings</h3>
                            <div class="space-y-3">
                                @foreach ($film->screenings as $screening)
                                    <div class="flex items-center justify-between rounded-xl border border-black/10 px-5 py-4">
                                        <div>
                                            <p class="font-medium text-[#111111]">{{ $screening->screening_date->format('D, M j') }} · {{ \Illuminate\Support\Carbon::parse($screening->start_time)->format('g:i A') }}</p>
                                            <p class="text-sm text-gray-500">{{ $screening->venue->name }}{{ $screening->hall ? ' — '.$screening->hall : '' }}</p>
                                        </div>
                                        @if ($screening->sold_out)
                                            <span class="text-sm font-medium text-red-600">Sold Out</span>
                                        @elseif ($screening->ticket_url)
                                            <a href="{{ $screening->ticket_url }}" target="_blank" rel="noopener" class="text-sm font-medium text-[var(--accent)]">Get Tickets →</a>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')

@endsection
