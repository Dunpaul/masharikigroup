@extends('layouts.app')

@section('title', 'Gallery - '.$brand['short_name'])

@section('content')

    @include('partials.navbar')

    @php $hasHero = \App\Models\PageHero::forPage($brand['key'], request()->route()->getName())->active()->exists(); @endphp
    <section @class(['relative overflow-hidden bg-white flex items-center justify-center text-center px-6', 'min-h-screen' => $hasHero, 'py-16 md:py-24' => ! $hasHero])>
        @include('partials.page-hero')
        @if ($hasHero)
            <div class="absolute inset-0 bg-black/60"></div>
        @endif
        <div class="relative z-10">
            <h1 class="text-3xl md:text-4xl font-medium mb-4 {{ $hasHero ? 'text-white' : 'text-[#111111]' }}">Gallery</h1>
            <p class="{{ $hasHero ? 'text-white/90' : 'text-gray-600' }}">Photos from {{ $brand['short_name'] }}, by year and day.</p>
        </div>
    </section>

    <section class="py-16 md:py-24 bg-white" x-data="{ lightboxSrc: null }">
        <div class="max-w-6xl mx-auto px-6 lg:px-8">

            @if ($years->isNotEmpty())
                <div class="flex flex-wrap justify-center gap-2 mb-6">
                    @foreach ($years as $year)
                        <a
                            href="{{ route(request()->route()->getName(), array_merge(request()->except(['year', 'day']), ['year' => $year])) }}"
                            class="{{ (int) $selectedYear === (int) $year ? 'bg-[var(--accent)] text-white' : 'bg-[var(--brand-bg)] text-gray-700 hover:text-[var(--accent)]' }} rounded-full px-4 py-2 text-sm font-medium transition"
                        >
                            {{ $year }}
                        </a>
                    @endforeach
                </div>

                @if ($days->isNotEmpty())
                    <div class="flex flex-wrap justify-center gap-2 mb-12">
                        <a
                            href="{{ route(request()->route()->getName(), ['year' => $selectedYear]) }}"
                            class="{{ ! $activeDay ? 'bg-gray-900 text-white' : 'bg-white border border-black/10 text-gray-600 hover:text-gray-900' }} rounded-full px-3.5 py-1.5 text-xs font-medium transition"
                        >
                            All Days
                        </a>
                        @foreach ($days as $day)
                            <a
                                href="{{ route(request()->route()->getName(), ['year' => $selectedYear, 'day' => $day->format('Y-m-d')]) }}"
                                class="{{ $activeDay === $day->format('Y-m-d') ? 'bg-gray-900 text-white' : 'bg-white border border-black/10 text-gray-600 hover:text-gray-900' }} rounded-full px-3.5 py-1.5 text-xs font-medium transition"
                            >
                                {{ $day->format('M j') }}
                            </a>
                        @endforeach
                    </div>
                @endif
            @endif

            @if ($images->isEmpty())
                <p class="text-center text-gray-500">No photos for this selection yet.</p>
            @else
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                    @foreach ($images as $image)
                        <button
                            type="button"
                            @click="lightboxSrc = '{{ asset('storage/'.$image->image_path) }}'"
                            class="group relative aspect-square overflow-hidden rounded-xl border border-black/5 bg-gray-100"
                        >
                            <img
                                src="{{ asset('storage/'.$image->thumb_path) }}"
                                loading="lazy"
                                alt="{{ $image->caption ?? 'Photo' }}"
                                class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
                            >
                            @if ($image->category)
                                <span class="absolute bottom-2 left-2 rounded-full bg-black/60 px-2 py-0.5 text-[10px] uppercase tracking-wide text-white">
                                    {{ str($image->category)->replace('_', ' ') }}
                                </span>
                            @endif
                        </button>
                    @endforeach
                </div>
            @endif
        </div>

        <div
            x-show="lightboxSrc"
            x-cloak
            x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            @click="lightboxSrc = null"
            @keydown.escape.window="lightboxSrc = null"
            class="fixed inset-0 z-[60] flex items-center justify-center bg-black/90 p-6"
        >
            <button
                type="button"
                @click="lightboxSrc = null"
                class="absolute top-6 right-6 text-white/80 hover:text-white text-3xl leading-none"
                aria-label="Close"
            >&times;</button>
            <img :src="lightboxSrc" @click.stop class="max-h-full max-w-full rounded-lg object-contain">
        </div>
    </section>

    @include('partials.footer')

@endsection
