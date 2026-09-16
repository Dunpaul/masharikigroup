@extends('layouts.app')

@section('title', 'Program - Masharket')

@section('content')

    @include('partials.navbar')

    @php $hasHero = \App\Models\PageHero::forPage($brand['key'], request()->route()->getName())->active()->exists(); @endphp
    <section @class(['relative overflow-hidden bg-white flex items-center justify-center text-center px-6', 'min-h-screen' => $hasHero, 'py-16 md:py-24' => ! $hasHero])>
        @include('partials.page-hero')
        @if ($hasHero)
            <div class="absolute inset-0 bg-black/60"></div>
        @endif
        <div class="relative z-10">
            <h1 class="text-3xl md:text-4xl font-medium mb-4 {{ $hasHero ? 'text-white' : 'text-[#111111]' }}">Event Schedule</h1>
            <p class="{{ $hasHero ? 'text-white/90' : 'text-gray-500' }}">Program is subject to change.</p>
        </div>
    </section>

    <section class="py-16 md:py-24 bg-white" x-data="{ activeDay: {{ $sessions->keys()->first() ?? 1 }} }">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">
            <div class="flex justify-center gap-2 mb-12 flex-wrap">
                @foreach ($sessions->keys() as $dayNumber)
                    <button
                        @click="activeDay = {{ $dayNumber }}"
                        :class="activeDay === {{ $dayNumber }} ? 'bg-[var(--brand-primary)] text-white' : 'bg-[var(--brand-bg)] text-gray-700'"
                        class="px-6 py-3 rounded-full text-sm font-medium transition"
                    >
                        Day {{ $dayNumber }} &middot; {{ $dayLabels[$dayNumber] }}
                    </button>
                @endforeach
            </div>

            @foreach ($sessions as $dayNumber => $daySessions)
                <div x-show="activeDay === {{ $dayNumber }}" x-cloak class="space-y-4">
                    @foreach ($daySessions as $session)
                        <div class="rounded-xl border border-black/10 p-6">
                            <p class="text-sm font-semibold text-[var(--brand-primary)] mb-1">{{ $session->time_label }}</p>
                            <h3 class="text-lg font-medium text-[#111111]">{{ $session->title }}</h3>
                            @if ($session->description)
                                <p class="text-sm text-gray-500 mt-1">{{ $session->description }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>

    @include('partials.footer')

@endsection
