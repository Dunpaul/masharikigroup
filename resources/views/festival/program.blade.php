@extends('layouts.app')

@section('title', 'Program - '.$brand['acronym'])

@section('content')

    @include('partials.navbar')

    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">
            <h1 class="text-3xl md:text-4xl font-medium text-[#111111] mb-12 text-center">Program</h1>

            @if ($programs->isEmpty())
                <p class="text-center text-gray-500 py-16">No panels, masterclasses, or events published yet.</p>
            @else
                <div class="space-y-4">
                    @foreach ($programs as $program)
                        <div class="rounded-xl border border-black/10 p-6">
                            <div class="flex items-center justify-between mb-2">
                                <span class="inline-block px-3 py-1 rounded-full bg-[var(--brand-bg)] text-xs font-medium uppercase tracking-wider text-gray-600">{{ $program->type }}</span>
                                @if ($program->event_date)
                                    <span class="text-sm text-gray-500">
                                        {{ $program->event_date->format('D, M j') }}
                                        @if ($program->start_time) · {{ \Illuminate\Support\Carbon::parse($program->start_time)->format('g:i A') }} @endif
                                    </span>
                                @endif
                            </div>
                            <h3 class="text-xl font-medium text-[#111111] mb-1">{{ $program->title }}</h3>
                            @if ($program->venue)<p class="text-sm text-gray-500 mb-2">{{ $program->venue->name }}</p>@endif
                            @if ($program->description)<p class="text-gray-600">{{ $program->description }}</p>@endif
                            @if ($program->speakers->isNotEmpty())
                                <p class="text-sm text-gray-500 mt-3">Speakers: {{ $program->speakers->pluck('name')->join(', ') }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    @include('partials.footer')

@endsection
