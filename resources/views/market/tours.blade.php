@extends('layouts.app')

@section('title', 'Tours - Masharket')

@section('content')

    @include('partials.navbar')

    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-6xl mx-auto px-6 lg:px-8">
            <h1 class="text-3xl md:text-4xl font-medium text-[#111111] mb-12 text-center">Tours &amp; Accommodation</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <a href="https://www.planettravel.rw/" target="_blank" rel="noopener" class="group rounded-2xl overflow-hidden border border-black/10 hover:-translate-y-0.5 transition duration-300">
                    <div class="h-64 bg-[var(--brand-bg)] flex items-center justify-center text-gray-400 text-sm">Flights & Explore Rwanda</div>
                    <div class="p-6 text-center">
                        <h2 class="text-xl font-medium text-[#111111]">Flights and Explore Rwanda</h2>
                    </div>
                </a>

                <a href="https://smartbookings.rw/Event-Hotels/651a984e0d2c5/1/Search?place=Rwanda&roomnum=1&adult=1&child=0" target="_blank" rel="noopener" class="group rounded-2xl overflow-hidden border border-black/10 hover:-translate-y-0.5 transition duration-300">
                    <div class="h-64 bg-[var(--brand-bg)] flex items-center justify-center text-gray-400 text-sm">Kigali Accommodation & Transport</div>
                    <div class="p-6 text-center">
                        <h2 class="text-xl font-medium text-[#111111]">Kigali Accommodation & Transport</h2>
                    </div>
                </a>
            </div>
        </div>
    </section>

    @include('partials.footer')

@endsection
