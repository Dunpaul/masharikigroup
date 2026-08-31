@extends('layouts.app')

@section('content')

    @include('partials.navbar')

    <!-- HERO -->
    <section class="py-20 md:py-28 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 grid lg:grid-cols-[1fr_360px] gap-12 items-start">
            <div>
                <div class="inline-flex items-center gap-3 rounded-full border border-black/10 bg-[var(--brand-bg)] px-5 py-2.5 mb-8">
                    <span class="h-2.5 w-2.5 rounded-full bg-[var(--brand-accent)]"></span>
                    <span class="text-[11px] md:text-xs tracking-[0.26em] uppercase text-gray-600 font-medium">{{ $settings->event_name }}</span>
                </div>

                <h1 class="text-4xl md:text-6xl font-medium leading-[1.05] tracking-tight text-[#111111] mb-6 max-w-2xl">
                    Discover the Cinematic Tapestry in Kigali, Rwanda
                </h1>

                @if ($settings->theme)
                    <p class="text-lg italic text-gray-700 mb-2">Theme: {{ $settings->theme }}</p>
                @endif

                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="#categories" class="inline-flex items-center rounded-2xl bg-[var(--brand-primary)] px-7 py-4 text-white font-medium shadow-lg transition duration-300 hover:-translate-y-0.5">
                        Register Now
                    </a>
                </div>
            </div>

            <div class="rounded-3xl border border-black/10 bg-[var(--brand-bg)] p-6">
                <h3 class="text-sm uppercase tracking-[0.2em] text-gray-500 mb-3">When &amp; Where</h3>

                @if ($settings->start_date && $settings->end_date)
                    <p class="text-lg font-semibold text-[#111111]">
                        {{ $settings->start_date->format('jS') }} to {{ $settings->end_date->format('jS F, Y') }}
                    </p>
                @else
                    <p class="text-lg font-semibold text-[#111111]">Dates to be announced</p>
                @endif

                @if ($settings->venue_name)
                    <p class="mt-2 text-gray-600">{{ $settings->venue_name }}</p>
                @endif
                @if ($settings->venue_address)
                    <p class="text-gray-600">{{ $settings->venue_address }}</p>
                @endif
            </div>
        </div>
    </section>

    <!-- INTRO -->
    @if ($settings->intro_paragraph_1 || $settings->intro_paragraph_2)
        <section class="py-16 bg-[var(--brand-bg)]">
            <div class="max-w-4xl mx-auto px-6 lg:px-8 space-y-6 text-lg text-gray-700 leading-8">
                @if ($settings->intro_paragraph_1)
                    <p>{{ $settings->intro_paragraph_1 }}</p>
                @endif
                @if ($settings->intro_paragraph_2)
                    <p>{{ $settings->intro_paragraph_2 }}</p>
                @endif
            </div>
        </section>
    @endif

    <!-- CATEGORIES -->
    <section id="categories" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <h2 class="text-4xl font-medium text-center text-[#111111] mb-12">Categories</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($categories as $category)
                    <div class="rounded-2xl border border-black/10 p-8">
                        <h3 class="text-2xl font-medium text-[#111111] mb-4 text-center">{{ $category->title }}</h3>
                        <p class="text-gray-600 mb-6">{{ $category->description }}</p>
                        <div class="text-center">
                            <a
                                href="{{ $category->cta_url ?? '#' }}"
                                class="inline-flex items-center rounded-full bg-[var(--brand-accent)] px-6 py-3 text-[#111111] font-semibold shadow-sm transition duration-300 hover:-translate-y-0.5"
                            >
                                {{ $category->cta_label }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- PARTNERS -->
    @if ($partners->isNotEmpty())
        <section class="py-16 bg-[var(--brand-bg)]">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <h2 class="text-3xl font-medium text-center text-[#111111] mb-10">Our Partners</h2>
                <div class="flex flex-wrap items-center justify-center gap-10">
                    @foreach ($partners as $partner)
                        <img src="{{ asset('storage/'.$partner->logo_path) }}" alt="{{ $partner->name }}" class="h-16 object-contain grayscale hover:grayscale-0 transition">
                    @endforeach
                </div>
                <p class="text-center mt-8">
                    <a href="{{ route('market.partners') }}" class="text-sm font-medium text-gray-600 hover:text-[var(--accent)] transition">See all partners →</a>
                </p>
            </div>
        </section>
    @endif

    <!-- VENUE & CONTACT -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 grid md:grid-cols-2 gap-12">
            <div>
                <h3 class="text-2xl font-medium text-[#111111] mb-4">Contact Us</h3>
                <div class="space-y-2 text-gray-700">
                    @if ($settings->contact_phone_1)
                        <p><a href="tel:{{ $settings->contact_phone_1 }}" class="hover:text-[var(--brand-primary)]">{{ $settings->contact_phone_1 }}</a></p>
                    @endif
                    @if ($settings->contact_phone_2)
                        <p><a href="tel:{{ $settings->contact_phone_2 }}" class="hover:text-[var(--brand-primary)]">{{ $settings->contact_phone_2 }}</a></p>
                    @endif
                    @if ($settings->contact_email)
                        <p><a href="mailto:{{ $settings->contact_email }}" class="hover:text-[var(--brand-primary)]">{{ $settings->contact_email }}</a></p>
                    @endif
                </div>
            </div>

            @if ($settings->map_embed_url)
                <div class="rounded-2xl overflow-hidden border border-black/10">
                    <iframe src="{{ $settings->map_embed_url }}" class="w-full h-64" style="border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            @endif
        </div>
    </section>

    @include('partials.footer')

@endsection
