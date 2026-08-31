@extends('layouts.app')

@section('title', 'Partners - '.$brand['short_name'])

@section('content')

    @include('partials.navbar')

    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-6xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <h1 class="text-3xl md:text-4xl font-medium text-[#111111] mb-4">Our Partners</h1>
                <p class="text-gray-600">The organizations that work with {{ $brand['short_name'] }}.</p>
            </div>

            @if ($partners->isEmpty())
                <p class="text-center text-gray-500">No partners to show yet.</p>
            @else
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 items-center">
                    @foreach ($partners as $partner)
                        @if ($partner->url)
                            <a href="{{ $partner->url }}" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center p-4">
                                <img src="{{ asset('storage/'.$partner->logo_path) }}" alt="{{ $partner->name }}" class="h-16 w-full object-contain grayscale hover:grayscale-0 transition">
                            </a>
                        @else
                            <div class="flex items-center justify-center p-4">
                                <img src="{{ asset('storage/'.$partner->logo_path) }}" alt="{{ $partner->name }}" class="h-16 w-full object-contain grayscale hover:grayscale-0 transition">
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    @include('partials.footer')

@endsection
