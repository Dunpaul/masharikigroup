@extends('layouts.app')

@section('title', 'Schedule - '.$brand['acronym'])

@section('content')

    @include('partials.navbar')

    @php $hasHero = \App\Models\PageHero::ofPage($brand['key'], request()->route()->getName())->active()->exists(); @endphp
    <section @class(['relative overflow-hidden bg-white flex items-center justify-center text-center px-6', 'min-h-screen' => $hasHero, 'py-16 md:py-24' => ! $hasHero])>
        @include('partials.page-hero')
        @if ($hasHero)
            <div class="absolute inset-0 bg-black/60"></div>
        @endif
        <h1 class="relative z-10 text-3xl md:text-4xl font-medium {{ $hasHero ? 'text-white' : 'text-[#111111]' }}">Schedule</h1>
    </section>

    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-6xl mx-auto px-6 lg:px-8">
            <form method="GET" class="flex flex-wrap justify-center gap-3 mb-12">
                <select name="day" onchange="this.form.submit()" class="px-4 py-2 rounded-full border border-gray-300 text-sm">
                    <option value="">All Days</option>
                    @foreach ($days as $day)
                        <option value="{{ $day->format('Y-m-d') }}" @selected(($filters['day'] ?? null) === $day->format('Y-m-d'))>{{ $day->format('D, M j') }}</option>
                    @endforeach
                </select>

                <select name="venue" onchange="this.form.submit()" class="px-4 py-2 rounded-full border border-gray-300 text-sm">
                    <option value="">All Venues</option>
                    @foreach ($venues as $venue)
                        <option value="{{ $venue->id }}" @selected((string) ($filters['venue'] ?? '') === (string) $venue->id)>{{ $venue->name }}</option>
                    @endforeach
                </select>

                <select name="section" onchange="this.form.submit()" class="px-4 py-2 rounded-full border border-gray-300 text-sm">
                    <option value="">All Sections</option>
                    @foreach ($sections as $section)
                        <option value="{{ $section->id }}" @selected((string) ($filters['section'] ?? '') === (string) $section->id)>{{ $section->name }}</option>
                    @endforeach
                </select>
            </form>

            @if ($screenings->isEmpty())
                <p class="text-center text-gray-500 py-16">No screenings match those filters yet.</p>
            @else
                <div class="space-y-4">
                    @foreach ($screenings as $screening)
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 rounded-xl border border-black/10 px-6 py-5">
                            <div>
                                <p class="text-sm text-gray-500">{{ $screening->screening_date->format('D, M j') }} · {{ \Illuminate\Support\Carbon::parse($screening->start_time)->format('g:i A') }} · {{ $screening->venue->name }}</p>
                                <a href="{{ route('festival.films.show', $screening->film->slug) }}" class="font-medium text-lg text-[#111111] hover:text-[var(--accent)]">{{ $screening->film->title }}</a>
                                @if ($screening->film->section)
                                    <span class="ml-2 text-xs text-gray-400">{{ $screening->film->section->name }}</span>
                                @endif
                            </div>
                            @if ($screening->sold_out)
                                <span class="text-sm font-medium text-red-600 whitespace-nowrap">Sold Out</span>
                            @elseif ($screening->ticket_url)
                                <a href="{{ $screening->ticket_url }}" target="_blank" rel="noopener" class="text-sm font-medium text-[var(--accent)] whitespace-nowrap">Get Tickets →</a>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    @include('partials.footer')

@endsection
