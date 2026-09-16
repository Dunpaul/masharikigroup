@extends('layouts.app')

@section('title', 'Schedule a Meeting - Masharket')

@section('content')

    @include('partials.navbar')

    @php $hasHero = \App\Models\PageHero::forPage($brand['key'], request()->route()->getName())->active()->exists(); @endphp
    <section @class(['relative overflow-hidden bg-white flex items-center justify-center text-center px-6', 'min-h-screen' => $hasHero, 'py-16 md:py-24' => ! $hasHero])>
        @include('partials.page-hero')
        @if ($hasHero)
            <div class="absolute inset-0 bg-black/60"></div>
        @endif
        <h1 class="relative z-10 text-3xl md:text-4xl font-medium {{ $hasHero ? 'text-white' : 'text-[#111111]' }}">
            Select a time to schedule a meeting with a delegate
        </h1>
    </section>

    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">
            <div class="calendly-inline-widget rounded-2xl overflow-hidden border border-black/10" data-url="https://calendly.com/masharket/30min" style="min-width:320px;height:700px;"></div>
            <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
        </div>
    </section>

    @include('partials.footer')

@endsection
