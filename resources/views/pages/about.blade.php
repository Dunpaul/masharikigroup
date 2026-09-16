@extends('layouts.app')

@section('content')

    @include('partials.navbar')

    @php $hasHero = \App\Models\PageHero::forPage($brand['key'], request()->route()->getName())->active()->exists(); @endphp
    <section class="relative overflow-hidden bg-[#f5f6f8] py-24 md:py-32">
        @include('partials.page-hero')
        @if ($hasHero)
            <div class="absolute inset-0 bg-black/60"></div>
        @else
            <div class="absolute inset-0">
                <div class="absolute -top-24 left-0 h-72 w-72 rounded-full bg-orange-200/30 blur-3xl"></div>
                <div class="absolute right-0 top-20 h-80 w-80 rounded-full bg-pink-200/20 blur-3xl"></div>
                <div class="absolute bottom-0 left-1/3 h-72 w-72 rounded-full bg-purple-200/20 blur-3xl"></div>
            </div>
        @endif

        <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <div class="inline-flex items-center rounded-full border border-black/10 bg-white/80 backdrop-blur px-4 py-2 mb-6 shadow-sm">
                        <span class="mr-3 h-2 w-2 rounded-full bg-[var(--accent)]"></span>
                        <p class="text-[11px] font-medium uppercase tracking-[0.28em] text-gray-600 md:text-xs">
                            About Mashariki Group
                        </p>
                    </div>

                    <h1 class="mb-8 text-5xl font-semibold leading-[1.02] tracking-tight md:text-6xl lg:text-7xl {{ $hasHero ? 'text-white' : 'text-[#111111]' }}">
                        Building African Brands
                        <span @class([
                            'mt-2 block',
                            'text-white' => $hasHero,
                            'bg-gradient-to-r from-orange-500 via-pink-500 to-purple-600 bg-clip-text text-transparent' => ! $hasHero,
                        ])>
                            That Move Culture Forward
                        </span>
                    </h1>

                    <p class="mb-6 max-w-2xl text-lg leading-8 md:text-xl {{ $hasHero ? 'text-white/90' : 'text-gray-600' }}">
                        Mashariki Group is a multi-sector holding company operating at the intersection of
                        mobility, film, creative education, content markets, and advertising across Africa.
                    </p>

                    <p class="mb-10 max-w-2xl text-lg leading-8 {{ $hasHero ? 'text-white/90' : 'text-gray-600' }}">
                        We build, support, and scale brands that shape culture, unlock opportunity, and create
                        long-term value across African markets. Our approach combines creativity, strategy,
                        storytelling, and disciplined execution to grow businesses with real impact.
                    </p>

                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('companies') }}"
                           class="inline-flex items-center rounded-2xl bg-[#111111] px-7 py-3.5 font-medium text-white shadow-lg shadow-black/10 transition duration-300 hover:-translate-y-0.5 hover:bg-black">
                            Explore Our Companies
                            <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>

                        <a href="{{ route('contact') }}"
                           class="inline-flex items-center rounded-2xl border border-gray-300 bg-white/80 px-7 py-3.5 font-medium text-[#111111] shadow-sm backdrop-blur transition duration-300 hover:-translate-y-0.5 hover:border-gray-400 hover:bg-white">
                            Contact Us
                        </a>
                    </div>
                </div>

                <div class="grid gap-5 sm:grid-cols-2">
                    <div class="group rounded-3xl border border-white/70 bg-white/90 p-8 shadow-[0_10px_40px_rgba(0,0,0,0.06)] backdrop-blur transition duration-300 hover:-translate-y-1 hover:shadow-[0_20px_60px_rgba(0,0,0,0.08)]">
                        <div class="mb-5 inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-orange-500 to-pink-500 text-2xl font-bold text-white shadow-lg">
                            1
                        </div>
                        <h3 class="mb-3 text-xl font-semibold text-[#111111]">Multi-Industry Holding Group</h3>
                        <p class="leading-7 text-gray-600">
                            Operating across creative, cultural, education, and market-driven sectors.
                        </p>
                    </div>

                    <div class="group rounded-3xl border border-white/70 bg-white/90 p-8 shadow-[0_10px_40px_rgba(0,0,0,0.06)] backdrop-blur transition duration-300 hover:-translate-y-1 hover:shadow-[0_20px_60px_rgba(0,0,0,0.08)]">
                        <div class="mb-5 inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-orange-500 to-pink-500 text-2xl font-bold text-white shadow-lg">
                            3
                        </div>
                        <h3 class="mb-3 text-xl font-semibold text-[#111111]">Core Companies</h3>
                        <p class="leading-7 text-gray-600">
                            A focused portfolio built around learning, commerce, and cultural experiences.
                        </p>
                    </div>

                    <div class="group rounded-3xl border border-white/10 bg-gradient-to-br from-[#111111] via-[#1a1a1a] to-[#222222] p-8 text-white shadow-[0_20px_70px_rgba(0,0,0,0.18)] transition duration-300 hover:-translate-y-1 sm:col-span-2 md:p-10">
                        <div class="mb-5 inline-flex h-14 w-14 items-center justify-center rounded-2xl border border-white/10 bg-white/10 text-2xl font-bold text-orange-400">
                            100%
                        </div>
                        <h3 class="mb-3 text-2xl font-semibold">African-Led Vision</h3>
                        <p class="max-w-2xl leading-8 text-gray-300">
                            We are committed to sustainable growth, local relevance, and globally competitive
                            African brands designed to shape markets and culture for the long term.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="py-24 md:py-32 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid lg:grid-cols-12 gap-12 items-start">
                <div class="lg:col-span-5">
                    <p class="uppercase tracking-[0.28em] text-xs text-gray-500 mb-5">
                        Who We Are
                    </p>

                    <h2 class="text-4xl md:text-5xl lg:text-6xl font-light tracking-tight text-[#111111] mb-6">
                        A diversified group built around creativity, growth, and long-term impact
                    </h2>

                    <p class="text-lg text-gray-600 leading-8 max-w-2xl">
                        Mashariki Group is a diversified holding company committed to building and supporting
                        ventures that shape Africa’s creative, cultural, and service-driven economy.
                        We focus on brands with strong identity, clear relevance, and long-term potential.
                    </p>
                </div>

                <div class="lg:col-span-7">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="rounded-3xl border border-gray-100 bg-[#fafafa] p-8 shadow-[0_8px_30px_rgba(0,0,0,0.04)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_18px_50px_rgba(0,0,0,0.06)]">
                            <div class="w-14 h-14 rounded-2xl bg-[var(--accent)]/10 flex items-center justify-center mb-6">
                                <svg class="w-6 h-6 text-[var(--accent)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 7h18M6 12h12M10 17h4"/>
                                </svg>
                            </div>

                            <h3 class="text-xl font-semibold text-[#111111] mb-3">
                                Diversified Platform
                            </h3>

                            <p class="text-gray-600 leading-7">
                                We operate across multiple sectors with a portfolio designed to balance creativity,
                                commerce, education, and cultural relevance.
                            </p>
                        </div>

                        <div class="rounded-3xl border border-gray-100 bg-[#fafafa] p-8 shadow-[0_8px_30px_rgba(0,0,0,0.04)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_18px_50px_rgba(0,0,0,0.06)]">
                            <div class="w-14 h-14 rounded-2xl bg-pink-50 flex items-center justify-center mb-6">
                                <svg class="w-6 h-6 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6v12m6-6H6"/>
                                </svg>
                            </div>

                            <h3 class="text-xl font-semibold text-[#111111] mb-3">
                                Growth-Oriented
                            </h3>

                            <p class="text-gray-600 leading-7">
                                We build brands with the structure, strategy, and execution discipline needed
                                to grow sustainably and lead in their categories.
                            </p>
                        </div>

                        <div class="rounded-3xl border border-gray-100 bg-[#fafafa] p-8 shadow-[0_8px_30px_rgba(0,0,0,0.04)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_18px_50px_rgba(0,0,0,0.06)]">
                            <div class="w-14 h-14 rounded-2xl bg-purple-50 flex items-center justify-center mb-6">
                                <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 21C12 21 5 13.5 5 9a7 7 0 1114 0c0 4.5-7 12-7 12z"/>
                                </svg>
                            </div>

                            <h3 class="text-xl font-semibold text-[#111111] mb-3">
                                African-Led
                            </h3>

                            <p class="text-gray-600 leading-7">
                                Our businesses are rooted in African realities, opportunities, and audiences,
                                with ambition to compete regionally and globally.
                            </p>
                        </div>

                        <div class="rounded-3xl border border-gray-100 bg-[#111111] p-8 text-white shadow-[0_18px_60px_rgba(0,0,0,0.16)] transition duration-300 hover:-translate-y-1">
                            <div class="w-14 h-14 rounded-2xl bg-white/10 flex items-center justify-center mb-6">
                                <svg class="w-6 h-6 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>

                            <h3 class="text-xl font-semibold mb-3">
                                Built for Impact
                            </h3>

                            <p class="text-gray-300 leading-7">
                                We believe strong businesses should create both commercial value and cultural relevance,
                                shaping industries and communities over the long term.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="rounded-2xl border border-gray-100 bg-[#fafafa] px-6 py-5">
                    <div class="text-3xl font-semibold text-[#111111]">3+</div>
                    <p class="mt-1 text-sm text-gray-600">Core companies</p>
                </div>

                <div class="rounded-2xl border border-gray-100 bg-[#fafafa] px-6 py-5">
                    <div class="text-3xl font-semibold text-[#111111]">5</div>
                    <p class="mt-1 text-sm text-gray-600">Strategic focus areas</p>
                </div>

                <div class="rounded-2xl border border-gray-100 bg-[#fafafa] px-6 py-5">
                    <div class="text-3xl font-semibold text-[#111111]">African</div>
                    <p class="mt-1 text-sm text-gray-600">Rooted vision</p>
                </div>

                <div class="rounded-2xl border border-gray-100 bg-[#fafafa] px-6 py-5">
                    <div class="text-3xl font-semibold text-[#111111]">Long-term</div>
                    <p class="mt-1 text-sm text-gray-600">Growth mindset</p>
                </div>
            </div>
        </div>
    </section>

    <section class="relative overflow-hidden bg-[#0f0f11] py-24 text-white md:py-28">
        <div class="absolute inset-0">
            <div class="absolute left-0 top-0 h-72 w-72 rounded-full bg-[var(--accent)]/10 blur-3xl"></div>
            <div class="absolute bottom-0 right-0 h-72 w-72 rounded-full bg-purple-500/10 blur-3xl"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mb-14 max-w-3xl">
                <div class="mb-5 inline-flex items-center rounded-full border border-white/10 bg-white/5 px-4 py-2">
                    <p class="text-[11px] font-medium uppercase tracking-[0.28em] text-gray-400 md:text-xs">
                        Our Philosophy
                    </p>
                </div>

                <h2 class="mb-6 text-4xl font-semibold tracking-tight md:text-5xl">
                    What drives us
                </h2>

                <p class="text-lg leading-8 text-gray-300">
                    Our philosophy is anchored in purpose, African excellence, long-term thinking, and
                    creative impact.
                </p>
            </div>

            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                <div class="rounded-3xl border border-white/10 bg-white/5 p-8 backdrop-blur transition duration-300 hover:-translate-y-1 hover:bg-white/[0.07]">
                    <h3 class="mb-3 text-xl font-semibold">Purpose-Driven Growth</h3>
                    <p class="leading-7 text-gray-300">
                        We build businesses that contribute meaningfully to society and the markets they serve.
                    </p>
                </div>

                <div class="rounded-3xl border border-white/10 bg-white/5 p-8 backdrop-blur transition duration-300 hover:-translate-y-1 hover:bg-white/[0.07]">
                    <h3 class="mb-3 text-xl font-semibold">African Excellence</h3>
                    <p class="leading-7 text-gray-300">
                        We champion locally rooted brands with the ambition to compete at a global level.
                    </p>
                </div>

                <div class="rounded-3xl border border-white/10 bg-white/5 p-8 backdrop-blur transition duration-300 hover:-translate-y-1 hover:bg-white/[0.07]">
                    <h3 class="mb-3 text-xl font-semibold">Long-Term Value</h3>
                    <p class="leading-7 text-gray-300">
                        We prioritize sustainable growth and enduring business value over short-term gains.
                    </p>
                </div>

                <div class="rounded-3xl border border-white/10 bg-white/5 p-8 backdrop-blur transition duration-300 hover:-translate-y-1 hover:bg-white/[0.07]">
                    <h3 class="mb-3 text-xl font-semibold">Creative Impact</h3>
                    <p class="leading-7 text-gray-300">
                        We see culture, storytelling, and creativity as engines for transformation and growth.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="companies" class="py-24 md:py-32 bg-[#f7f7f8]">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto">
                <p class="uppercase tracking-[0.28em] text-xs text-gray-500 mb-5">
                    Our Companies
                </p>

                <h2 class="text-4xl md:text-5xl lg:text-6xl font-light text-[#111111] mb-6">
                    Our portfolio of specialized businesses
                </h2>

                <p class="text-lg text-gray-600 leading-8">
                    Mashariki Group oversees a portfolio of companies positioned across education, commerce,
                    culture, media, and strategic growth.
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-6 mt-16">
                <a href="https://www.masharikifestival.org/" target="_blank" rel="noopener noreferrer"
                   class="group rounded-3xl bg-white p-8 shadow-[0_8px_30px_rgba(0,0,0,0.04)] border border-gray-100 transition duration-300 hover:-translate-y-1 hover:shadow-[0_18px_50px_rgba(0,0,0,0.06)]">
                    <img src="{{ asset('images/masharikifilmfestival.png') }}" alt="Mashariki Festival" class="h-16 mx-auto object-contain grayscale group-hover:grayscale-0 transition duration-300">
                </a>

                <a href="https://masharket.com/" target="_blank" rel="noopener noreferrer"
                   class="group rounded-3xl bg-white p-8 shadow-[0_8px_30px_rgba(0,0,0,0.04)] border border-gray-100 transition duration-300 hover:-translate-y-1 hover:shadow-[0_18px_50px_rgba(0,0,0,0.06)]">
                    <img src="{{ asset('images/masharket.svg') }}" alt="Masharket" class="h-16 mx-auto object-contain grayscale group-hover:grayscale-0 transition duration-300">
                </a>

                <a href="https://masharikiacademy.org/" target="_blank" rel="noopener noreferrer"
                   class="group rounded-3xl bg-white p-8 shadow-[0_8px_30px_rgba(0,0,0,0.04)] border border-gray-100 transition duration-300 hover:-translate-y-1 hover:shadow-[0_18px_50px_rgba(0,0,0,0.06)]">
                    <img src="{{ asset('images/masharikiacademy_black.png') }}" alt="Mashariki Arts Academy" class="h-16 mx-auto object-contain grayscale group-hover:grayscale-0 transition duration-300">
                </a>

                <div class="group rounded-3xl bg-white p-8 shadow-[0_8px_30px_rgba(0,0,0,0.04)] border border-gray-100 transition duration-300 hover:-translate-y-1 hover:shadow-[0_18px_50px_rgba(0,0,0,0.06)]">
                    <img src="{{ asset('images/company4.png') }}" alt="Company 4" class="h-16 mx-auto object-contain grayscale group-hover:grayscale-0 transition duration-300">
                </div>

                <div class="group rounded-3xl bg-white p-8 shadow-[0_8px_30px_rgba(0,0,0,0.04)] border border-gray-100 transition duration-300 hover:-translate-y-1 hover:shadow-[0_18px_50px_rgba(0,0,0,0.06)]">
                    <img src="{{ asset('images/company5.png') }}" alt="Company 5" class="h-16 mx-auto object-contain grayscale group-hover:grayscale-0 transition duration-300">
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')

@endsection
