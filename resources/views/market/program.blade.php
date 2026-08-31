@extends('layouts.app')

@section('title', 'Program - Masharket')

@section('content')

    @include('partials.navbar')

    <section class="py-16 md:py-24 bg-white" x-data="{ activeDay: {{ $sessions->keys()->first() ?? 1 }} }">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">
            <h1 class="text-3xl md:text-4xl font-medium text-[#111111] mb-4 text-center">Event Schedule</h1>
            <p class="text-center text-gray-500 mb-10">Program is subject to change.</p>

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
