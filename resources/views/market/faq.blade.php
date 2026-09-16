@extends('layouts.app')

@section('title', 'FAQs - Masharket')

@section('content')

    @include('partials.navbar')

    @php $hasHero = \App\Models\PageHero::ofPage($brand['key'], request()->route()->getName())->active()->exists(); @endphp
    <section @class(['relative overflow-hidden bg-white flex items-center justify-center text-center px-6', 'min-h-screen' => $hasHero, 'py-16 md:py-24' => ! $hasHero])>
        @include('partials.page-hero')
        @if ($hasHero)
            <div class="absolute inset-0 bg-black/60"></div>
        @endif
        <h1 class="relative z-10 text-3xl md:text-4xl font-medium {{ $hasHero ? 'text-white' : 'text-[#111111]' }}">Frequently Asked Questions</h1>
    </section>

    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-3xl mx-auto px-6 lg:px-8">
            <div class="space-y-4">
                @foreach ($faqs as $faq)
                    <div x-data="{ open: false }" class="rounded-xl border border-black/10 overflow-hidden">
                        <button @click="open = !open" class="w-full flex justify-between items-center text-left px-6 py-4 font-medium text-[#111111] hover:bg-[var(--brand-bg)] transition">
                            <span>{{ $faq->question }}</span>
                            <span x-text="open ? '−' : '+'" class="text-xl text-gray-400"></span>
                        </button>
                        <div x-show="open" x-cloak class="px-6 pb-4 text-gray-600">
                            {{ $faq->answer }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('partials.footer')

@endsection
