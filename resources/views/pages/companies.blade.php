@extends('layouts.app')

@section('content')

    @include('partials.navbar')

    @php $hasHero = \App\Models\PageHero::ofPage($brand['key'], request()->route()->getName())->active()->exists(); @endphp
    <section @class(['relative overflow-hidden bg-[#f6f7f9] py-28', 'min-h-screen flex items-center' => $hasHero])>
        @if ($hasHero)
            @include('partials.page-hero')
            <div class="absolute inset-0 bg-black/60"></div>
        @else
            <!-- subtle background glow -->
            <div class="absolute top-10 left-20 h-72 w-72 rounded-full bg-orange-200/30 blur-3xl"></div>
            <div class="absolute bottom-0 right-10 h-72 w-72 rounded-full bg-purple-200/30 blur-3xl"></div>
        @endif

        <div class="relative z-10 w-full max-w-3xl mx-auto px-6 lg:px-8 text-center">
            <p class="uppercase tracking-[0.25em] text-sm mb-5 {{ $hasHero ? 'text-white/80' : 'text-gray-500' }}">
                Our Portfolio
            </p>

            <h1 class="text-5xl md:text-6xl font-semibold tracking-tight mb-6 {{ $hasHero ? 'text-white' : 'text-[#111111]' }}">
                The Mashariki Companies
            </h1>

            <p class="text-lg leading-8 {{ $hasHero ? 'text-white/90' : 'text-gray-600' }}">
                Mashariki Group oversees companies operating across creative education,
                digital commerce, cultural programming, and innovation.
            </p>
        </div>
    </section>

    <section class="py-20 bg-[#f6f7f9]">
        <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">

                <!-- Academy -->
                <a href="{{ route('academy.home') }}"
                   class="group flex flex-col rounded-[2rem] border border-gray-100 bg-white p-8 lg:p-10 shadow-[0_10px_30px_rgba(0,0,0,0.04)] transition duration-300 hover:-translate-y-2 hover:shadow-[0_20px_50px_rgba(0,0,0,0.08)]">

                    <div class="flex items-start justify-between gap-4 mb-8">
                        <div class="flex h-24 w-24 items-center justify-center rounded-2xl border border-gray-100 bg-[#fafafa] p-4">
                            <img
                                src="/images/masharikiacademy_black.png"
                                alt="Mashariki Arts Academy Logo"
                                class="max-h-14 w-auto object-contain"
                            >
                        </div>

                        <span class="text-sm text-gray-400 transition group-hover:text-gray-600">
                            01
                        </span>
                    </div>

                    <h2 class="text-2xl font-semibold text-[#111111] mb-3">
                        Mashariki Arts Academy
                    </h2>

                    <p class="text-gray-600 leading-7 mb-8 flex-grow">
                        A creative education platform focused on developing African talent through learning,
                        mentorship, and industry exposure.
                    </p>

                    <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                        <span class="text-sm font-medium text-[#111111] transition group-hover:translate-x-1">
                            Visit website
                        </span>

                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-[var(--accent)]/10 text-[var(--accent)] transition group-hover:bg-[var(--accent)]/20">
                            →
                        </span>
                    </div>
                </a>

                <!-- Masharket -->
                <a href="{{ route('market.home') }}"
                   class="group flex flex-col rounded-[2rem] border border-gray-100 bg-white p-8 lg:p-10 shadow-[0_10px_30px_rgba(0,0,0,0.04)] transition duration-300 hover:-translate-y-2 hover:shadow-[0_20px_50px_rgba(0,0,0,0.08)]">

                    <div class="flex items-start justify-between gap-4 mb-8">
                        <div class="flex h-24 w-24 items-center justify-center rounded-2xl border border-gray-100 bg-[#fafafa] p-4">
                            <img
                                src="/images/masharket.svg"
                                alt="Masharket Logo"
                                class="max-h-14 w-auto object-contain"
                            >
                        </div>

                        <span class="text-sm text-gray-400 transition group-hover:text-gray-600">
                            02
                        </span>
                    </div>

                    <h2 class="text-2xl font-semibold text-[#111111] mb-3">
                        Masharket
                    </h2>

                    <p class="text-gray-600 leading-7 mb-8 flex-grow">
                        A digital marketplace connecting African creators, products, and services
                        to wider audiences across the continent and beyond.
                    </p>

                    <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                        <span class="text-sm font-medium text-[#111111] transition group-hover:translate-x-1">
                            Visit website
                        </span>

                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-pink-50 text-pink-500 transition group-hover:bg-pink-100">
                            →
                        </span>
                    </div>
                </a>

                <!-- Festival: staged brand in this app now — internal link (see config/brands.php) -->
                <a href="{{ route('festival.home') }}"
                   class="group flex flex-col rounded-[2rem] border border-gray-100 bg-white p-8 lg:p-10 shadow-[0_10px_30px_rgba(0,0,0,0.04)] transition duration-300 hover:-translate-y-2 hover:shadow-[0_20px_50px_rgba(0,0,0,0.08)]">

                    <div class="flex items-start justify-between gap-4 mb-8">
                        <div class="flex h-24 w-24 items-center justify-center rounded-2xl border border-gray-100 bg-[#fafafa] p-4">
                            <img
                                src="/images/masharikifilmfestival.png"
                                alt="Mashariki African Film Festival Logo"
                                class="max-h-14 w-auto object-contain"
                            >
                        </div>

                        <span class="text-sm text-gray-400 transition group-hover:text-gray-600">
                            03
                        </span>
                    </div>

                    <h2 class="text-2xl font-semibold text-[#111111] mb-3">
                        Mashariki African Film Festival
                    </h2>

                    <p class="text-gray-600 leading-7 mb-8 flex-grow">
                        The annual celebration of African cinema in Kigali — screenings, panels,
                        masterclasses, and premieres (MAAFF).
                    </p>

                    <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                        <span class="text-sm font-medium text-[#111111] transition group-hover:translate-x-1">
                            Visit the Festival
                        </span>

                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-purple-50 text-purple-500 transition group-hover:bg-purple-100">
                            →
                        </span>
                    </div>
                </a>

            </div>
        </div>
    </section>

    @include('partials.footer')

@endsection
