@extends('layouts.app')

@section('title', 'Venues - '.$brand['acronym'])

@section('content')

    @include('partials.navbar')

    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-6xl mx-auto px-6 lg:px-8">
            <h1 class="text-3xl md:text-4xl font-medium text-[#111111] mb-12 text-center">Venues</h1>

            @if ($venues->isEmpty())
                <p class="text-center text-gray-500 py-16">No venues published yet.</p>
            @else
                <div class="grid md:grid-cols-2 gap-8">
                    @foreach ($venues as $venue)
                        <div class="rounded-2xl border border-black/10 overflow-hidden">
                            @if ($venue->photo)
                                <img src="{{ asset('storage/'.$venue->photo) }}" alt="{{ $venue->name }}" class="w-full h-48 object-cover">
                            @endif
                            <div class="p-6">
                                <h2 class="text-xl font-medium text-[#111111] mb-2">{{ $venue->name }}</h2>
                                @if ($venue->address)<p class="text-gray-600 mb-3">{{ $venue->address }}</p>@endif
                                @if ($venue->capacity)<p class="text-sm text-gray-500 mb-1">Capacity: {{ $venue->capacity }}</p>@endif
                                @if ($venue->accessibility_info)<p class="text-sm text-gray-500 mb-1">{{ $venue->accessibility_info }}</p>@endif
                                @if ($venue->transport_notes)<p class="text-sm text-gray-500">{{ $venue->transport_notes }}</p>@endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    @include('partials.footer')

@endsection
