@extends('layouts.app')

@section('title', $title.' - Masharket')

@section('content')

    @include('partials.navbar')

    @php $hasHero = \App\Models\PageHero::forPage($brand['key'], request()->route()->getName())->active()->exists(); @endphp
    <section class="relative overflow-hidden min-h-[60vh] flex items-center justify-center px-6 text-center bg-white">
        @include('partials.page-hero')
        @if ($hasHero)
            <div class="absolute inset-0 bg-black/60"></div>
        @endif
        <div class="relative z-10 max-w-xl">
            <div class="text-[11px] uppercase tracking-[0.28em] mb-4 {{ $hasHero ? 'text-white/80' : 'text-gray-500' }}">Masharket</div>
            <h1 class="text-4xl md:text-5xl font-medium tracking-tight mb-4 {{ $hasHero ? 'text-white' : 'text-[#111111]' }}">{{ $title }}</h1>
            <p class="{{ $hasHero ? 'text-white/90' : 'text-gray-600' }}">Coming soon. Details for this part of the program will be published closer to the event.</p>
        </div>
    </section>

    @include('partials.footer')

@endsection
