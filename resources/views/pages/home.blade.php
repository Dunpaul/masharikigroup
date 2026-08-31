@extends('layouts.app')

@section('content')

    @include('partials.navbar')

    <!-- HERO -->
    <section class="relative min-h-[100svh] overflow-hidden bg-[#eef0f2] flex items-center">
        <!-- Right artwork -->
        <div class="absolute inset-y-0 right-0 w-[58%] hidden lg:block pointer-events-none overflow-hidden">
            <img
                src="{{ asset('images/hero-shape.jpg') }}"
                alt=""
                class="absolute inset-y-0 right-[-28%] h-full w-auto max-w-none object-cover opacity-100"
            >

            <!-- left blend into background -->
            <div class="absolute inset-y-0 left-0 w-[42%] bg-gradient-to-r from-[#eef0f2] via-[#eef0f2]/85 to-transparent"></div>

            <!-- soft veil -->
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/6 to-white/12"></div>
        </div>

        <!-- Mobile artwork -->
        <div class="absolute inset-0 lg:hidden pointer-events-none overflow-hidden">
            <img
                src="{{ asset('images/hero-shape.jpg') }}"
                alt=""
                class="absolute inset-y-0 right-[-25%] h-full w-auto max-w-none object-cover opacity-[0.18]"
            >
            <div class="absolute inset-0 bg-[#eef0f2]/88"></div>
        </div>

        <!-- Soft ambient glows -->
        <div class="absolute top-24 left-10 h-56 w-56 rounded-full bg-orange-200/20 blur-3xl"></div>
        <div class="absolute bottom-16 left-1/4 h-56 w-56 rounded-full bg-pink-200/20 blur-3xl"></div>

        <div class="relative z-20 max-w-7xl mx-auto w-full px-6 lg:px-8">
            <div class="grid lg:grid-cols-[620px_1fr] min-h-[100svh] items-center">
                <div class="py-20 lg:py-24">
                    <div class="inline-flex items-center gap-3 rounded-full border border-black/10 bg-white/70 backdrop-blur px-5 py-2.5 mb-8 shadow-sm">
                        <span class="h-2.5 w-2.5 rounded-full bg-[var(--accent)]"></span>
                        <span class="text-[11px] md:text-xs tracking-[0.26em] uppercase text-gray-600 font-medium">
                            Mashariki Group
                        </span>
                    </div>

                    <h2 class="text-4xl md:text-5xl lg:text-[64px] font-light leading-[1.05] tracking-tight text-[#111111] mb-3 max-w-[560px]">
                        Building African Brands That Move
                    </h2>

                    <h1 class="text-6xl md:text-7xl lg:text-[96px] font-medium leading-[0.92] tracking-tight bg-gradient-to-r from-orange-500 via-pink-500 to-purple-600 bg-clip-text text-transparent">
                        Culture<br class="hidden lg:block"> Forward
                    </h1>

                    <p class="mt-8 text-lg md:text-[20px] text-gray-700 italic leading-9 max-w-[560px]">
                        Mashariki Group is a multi-sector holding company operating at the intersection of mobility,
                        film, creative education, content markets, and advertising across Africa.
                    </p>

                    <div class="mt-10 flex items-center gap-4">
                        <a href="#portfolio"
                           class="inline-flex items-center rounded-2xl bg-[#111111] px-7 py-4 text-white font-medium shadow-lg shadow-black/10 transition duration-300 hover:-translate-y-0.5 hover:bg-black">
                            Explore Our Portfolio
                        </a>

                        <a href="#portfolio"
                           class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-[#111111] text-white shadow-lg shadow-black/10 transition duration-300 hover:-translate-y-0.5 hover:bg-black">
                            ↓
                        </a>
                    </div>
                </div>

                <div class="hidden lg:block"></div>
            </div>
        </div>
    </section>

    <!-- PORTFOLIO -->
    <section id="portfolio" class="py-24 md:py-32 bg-[#fafafa]">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="max-w-2xl mb-16">
                <p class="uppercase tracking-[0.28em] text-xs text-gray-500 mb-5">Our Portfolio</p>
                <h2 class="text-4xl md:text-5xl font-light tracking-tight text-[#111111]">
                    Three brands, one mission — pick where you want to go
                </h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Academy -->
                <a href="{{ route('academy.home') }}" class="group flex flex-col rounded-[2rem] overflow-hidden bg-white border border-gray-100 shadow-[0_10px_30px_rgba(0,0,0,0.04)] transition duration-300 hover:-translate-y-2 hover:shadow-[0_20px_50px_rgba(0,0,0,0.08)]">
                    <div class="h-56 overflow-hidden">
                        <img src="{{ asset('academy/images/25_workshop1.jpg') }}" alt="Mashariki Arts Academy" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="p-8 flex flex-col flex-grow">
                        <h3 class="text-2xl font-semibold text-[#111111] mb-3">Mashariki Arts Academy</h3>
                        <p class="text-gray-600 leading-7 mb-8 flex-grow">
                            Hands-on film and creative training in Kigali, for aspiring African filmmakers, editors, and creative entrepreneurs who want to work in the industry.
                        </p>
                        <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                            <span class="text-sm font-medium text-[#111111] transition group-hover:translate-x-1">Visit the Academy</span>
                            <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-[var(--accent)]/10 text-[var(--accent)] transition group-hover:bg-[var(--accent)]/20">→</span>
                        </div>
                    </div>
                </a>

                <!-- Masharket -->
                <a href="{{ route('market.home') }}" class="group flex flex-col rounded-[2rem] overflow-hidden bg-white border border-gray-100 shadow-[0_10px_30px_rgba(0,0,0,0.04)] transition duration-300 hover:-translate-y-2 hover:shadow-[0_20px_50px_rgba(0,0,0,0.08)]">
                    <div class="h-56 overflow-hidden">
                        <img src="{{ asset('storage/gallery/market/full/bf05a997-66ad-436d-9f1f-efed253aa60c.webp') }}" alt="Masharket" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="p-8 flex flex-col flex-grow">
                        <h3 class="text-2xl font-semibold text-[#111111] mb-3">Masharket</h3>
                        <p class="text-gray-600 leading-7 mb-8 flex-grow">
                            Rwanda's first content market, for producers, buyers, and distributors who come to Kigali to trade film and media content face to face.
                        </p>
                        <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                            <span class="text-sm font-medium text-[#111111] transition group-hover:translate-x-1">Visit Masharket</span>
                            <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-[var(--accent)]/10 text-[var(--accent)] transition group-hover:bg-[var(--accent)]/20">→</span>
                        </div>
                    </div>
                </a>

                <!-- Festival: now a staged brand in this app (see config/brands.php) — internal link, not the old external WP site. Still not public; staging only. -->
                <a href="{{ route('festival.home') }}" class="group flex flex-col rounded-[2rem] overflow-hidden bg-[#111111] border border-gray-100 shadow-[0_10px_30px_rgba(0,0,0,0.04)] transition duration-300 hover:-translate-y-2 hover:shadow-[0_20px_50px_rgba(0,0,0,0.08)]">
                    <div class="h-56 flex items-center justify-center bg-gradient-to-br from-gray-900 to-black">
                        <img src="{{ asset('images/masharikifilmfestival.png') }}" alt="Mashariki African Film Festival" class="max-h-20 w-auto object-contain">
                    </div>
                    <div class="p-8 flex flex-col flex-grow">
                        <h3 class="text-2xl font-semibold text-white mb-3">Mashariki African Film Festival</h3>
                        <p class="text-gray-400 leading-7 mb-8 flex-grow">
                            The annual Mashariki African Film Festival (MAAFF), for film lovers and industry guests attending screenings, panels, and premieres each year in Kigali.
                        </p>
                        <div class="flex items-center justify-between pt-6 border-t border-white/10">
                            <span class="text-sm font-medium text-white transition group-hover:translate-x-1">Visit the Festival</span>
                            <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/10 text-white transition group-hover:bg-white/20">→</span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="mt-12 text-center">
                <a href="{{ route('companies') }}" class="text-sm font-medium text-gray-600 hover:text-[var(--accent)] transition">
                    See the full company directory →
                </a>
            </div>
        </div>
    </section>

    <!-- WHO WE ARE -->
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

    <!-- CONTACT -->
    <section id="contact" class="py-24 md:py-32 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                <div>
                    <p class="uppercase tracking-[0.28em] text-xs text-gray-500 mb-5">
                        Contact
                    </p>

                    <h3 class="text-gray-300 text-3xl md:text-4xl font-light">
                        WE'D LOVE TO HEAR FROM YOU
                    </h3>

                    <h2 class="text-5xl md:text-6xl lg:text-7xl text-[var(--accent)] font-semibold tracking-tight mt-2">
                        GET IN TOUCH
                    </h2>

                    <p class="mt-6 text-lg text-gray-600 leading-8 max-w-xl">
                        Get in touch with us today to discuss your project and see how we can help you
                        build, grow, and scale your next idea.
                    </p>

                    <div class="mt-10 space-y-6">
                        <div class="rounded-2xl border border-gray-100 bg-[#fafafa] p-5">
                            <strong class="block text-[#111111] mb-1">Location</strong>
                            <p class="text-gray-600">Kigali Rwanda</p>
                        </div>

                        <div class="rounded-2xl border border-gray-100 bg-[#fafafa] p-5">
                            <strong class="block text-[#111111] mb-1">Phone</strong>
                            <p class="text-gray-600">+250 792 608 452</p>
                        </div>

                        <div class="rounded-2xl border border-gray-100 bg-[#fafafa] p-5">
                            <strong class="block text-[#111111] mb-1">Email</strong>
                            <p class="text-gray-600">info@masharikigroup.org</p>
                        </div>
                    </div>

                    <a href="{{ route('contact') }}"
                       class="inline-flex items-center mt-10 rounded-2xl bg-[#111111] text-white px-8 py-4 font-medium shadow-lg shadow-black/10 transition duration-300 hover:-translate-y-0.5">
                        Contact us
                    </a>
                </div>

                <div class="relative">
                    <div class="absolute -top-6 -left-6 h-full w-full rounded-[2rem] bg-gradient-to-br from-orange-100 via-pink-100 to-purple-100 blur-2xl opacity-50"></div>
                    <div class="relative overflow-hidden rounded-[2rem] border border-gray-100 shadow-[0_20px_60px_rgba(0,0,0,0.08)]">
                        <img src="{{ asset('images/contact.jpg') }}" alt="Contact" class="w-full h-[520px] object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($partners->isNotEmpty())
        <section class="py-16 bg-[var(--brand-bg)]">
            <div class="max-w-6xl mx-auto px-6 lg:px-8">
                <h2 class="text-2xl font-medium text-center text-[#111111] mb-10">Our Partners</h2>
                <div class="flex flex-wrap items-center justify-center gap-10">
                    @foreach ($partners as $partner)
                        <img src="{{ asset('storage/'.$partner->logo_path) }}" alt="{{ $partner->name }}" class="h-14 object-contain grayscale hover:grayscale-0 transition">
                    @endforeach
                </div>
                <p class="text-center mt-8">
                    <a href="{{ route('partners') }}" class="text-sm font-medium text-gray-600 hover:text-[var(--accent)] transition">See all partners →</a>
                </p>
            </div>
        </section>
    @endif

    @include('partials.footer')

@endsection
