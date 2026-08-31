@extends('layouts.app')

@section('title', 'Guests - '.$brand['acronym'])

@section('content')

    @include('partials.navbar')

    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-6xl mx-auto px-6 lg:px-8">
            <h1 class="text-3xl md:text-4xl font-medium text-[#111111] mb-12 text-center">Guests</h1>

            @if ($guests->isEmpty())
                <p class="text-center text-gray-500 py-16">Guest lineup will be announced soon.</p>
            @else
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    @foreach ($guests as $guest)
                        <div class="text-center">
                            @if ($guest->photo_path)
                                <img src="{{ asset('storage/'.$guest->photo_path) }}" alt="{{ $guest->name }}" class="h-28 w-28 rounded-full object-cover mx-auto mb-3">
                            @endif
                            <h3 class="font-medium text-[#111111]">{{ $guest->name }}</h3>
                            <p class="text-sm text-gray-500">{{ $guest->role }}</p>
                            @if ($guest->country)<p class="text-xs text-gray-400">{{ $guest->country }}</p>@endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    @include('partials.footer')

@endsection
