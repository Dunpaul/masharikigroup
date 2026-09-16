@extends('layouts.app')

@section('title', 'Events - Masharket')

@section('content')

    @include('partials.navbar')

    @php $hasHero = \App\Models\PageHero::ofPage($brand['key'], request()->route()->getName())->active()->exists(); @endphp
    <section @class(['relative overflow-hidden py-16 md:py-24 bg-white', 'min-h-screen flex items-center' => $hasHero])>
        @include('partials.page-hero')
        @if ($hasHero)
            <div class="absolute inset-0 bg-black/60"></div>
        @endif
        <div class="relative z-10 w-full max-w-4xl mx-auto px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-medium mb-6 {{ $hasHero ? 'text-white' : 'text-[#111111]' }}">What to Expect at Masharket</h1>
            <p class="text-lg leading-8 {{ $hasHero ? 'text-white/90' : 'text-gray-700' }}">
                To maximize on our success and create an image for the market, we combine traditional film and content market elements — meetings and networking — with activities that meet the current state of the media and creative industry at large. Alongside our physical events, we also run a virtual set of activities through our online platform, extending sales and distribution meetings, panel discussions, presentations, and workshops to a global audience.
            </p>
        </div>
    </section>

    <section class="py-16 bg-[var(--brand-bg)]">
        <div class="max-w-6xl mx-auto px-6 lg:px-8">
            <h2 class="text-3xl font-medium text-center text-[#111111] mb-12">Our Events</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ([
                    ['title' => 'Exhibition', 'route' => 'market.exhibition'],
                    ['title' => 'Conference', 'route' => 'market.conference'],
                    ['title' => 'Workshop', 'route' => 'market.workshop'],
                    ['title' => 'Pitching', 'route' => 'market.pitching'],
                    ['title' => 'Delegates', 'route' => 'market.delegation'],
                ] as $event)
                    <a href="{{ route($event['route']) }}" class="rounded-2xl border border-black/10 bg-white p-10 text-center hover:-translate-y-0.5 transition duration-300 shadow-sm">
                        <h3 class="text-2xl font-medium text-[#111111]">{{ $event['title'] }}</h3>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    @include('partials.footer')

@endsection
