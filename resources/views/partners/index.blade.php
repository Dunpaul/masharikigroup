@extends('layouts.app')

@section('title', 'Partners - '.$brand['short_name'])

@section('content')

    @include('partials.navbar')

    @php $hasHero = \App\Models\PageHero::ofPage($brand['key'], request()->route()->getName())->active()->exists(); @endphp
    <section @class(['relative overflow-hidden bg-white flex items-center justify-center text-center px-6', 'min-h-screen' => $hasHero, 'py-16 md:py-24' => ! $hasHero])>
        @include('partials.page-hero')
        @if ($hasHero)
            <div class="absolute inset-0 bg-black/60"></div>
        @endif
        <div class="relative z-10">
            <h1 class="text-3xl md:text-4xl font-medium mb-4 {{ $hasHero ? 'text-white' : 'text-[#111111]' }}">Our Partners</h1>
            <p class="{{ $hasHero ? 'text-white/90' : 'text-gray-600' }}">The organizations that work with {{ $brand['short_name'] }}.</p>
        </div>
    </section>

    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-6xl mx-auto px-6 lg:px-8">

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
