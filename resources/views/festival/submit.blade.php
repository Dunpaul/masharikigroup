@extends('layouts.app')

@section('title', 'Submit Your Film - '.$brand['acronym'])

@section('content')

    @include('partials.navbar')

    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-2xl mx-auto px-6 lg:px-8">
            @php $hasHero = \App\Models\PageHero::forPage($brand['key'], request()->route()->getName())->active()->exists(); @endphp
            <div @class(['relative text-center mb-8', 'overflow-hidden rounded-3xl py-16 px-6' => $hasHero])>
                @if ($hasHero)
                    @include('partials.page-hero')
                    <div class="absolute inset-0 bg-black/60"></div>
                @endif
                <h1 class="relative z-10 text-3xl md:text-4xl font-medium {{ $hasHero ? 'text-white' : 'text-[#111111]' }}">Submit Your Film</h1>
            </div>

            @if (! $submissionInfo)
                <p class="text-center text-gray-500 py-16">Submission details for this edition will be published soon.</p>
            @else
                @if ($submissionInfo->guidelines)
                    <div class="mb-8">
                        <h2 class="text-lg font-medium text-[#111111] mb-2">Guidelines</h2>
                        <p class="text-gray-700 leading-7">{{ $submissionInfo->guidelines }}</p>
                    </div>
                @endif

                @if ($submissionInfo->categories)
                    <div class="mb-8">
                        <h2 class="text-lg font-medium text-[#111111] mb-2">Categories</h2>
                        <p class="text-gray-700 leading-7">{{ $submissionInfo->categories }}</p>
                    </div>
                @endif

                <div class="mb-8 grid grid-cols-3 gap-4 text-center">
                    <div class="rounded-xl border border-black/10 p-4">
                        <p class="text-xs uppercase tracking-wider text-gray-500 mb-1">Early Deadline</p>
                        <p class="font-medium text-[#111111]">{{ $submissionInfo->deadline_early?->format('M j, Y') ?? 'TBA' }}</p>
                    </div>
                    <div class="rounded-xl border border-black/10 p-4">
                        <p class="text-xs uppercase tracking-wider text-gray-500 mb-1">Regular Deadline</p>
                        <p class="font-medium text-[#111111]">{{ $submissionInfo->deadline_regular?->format('M j, Y') ?? 'TBA' }}</p>
                    </div>
                    <div class="rounded-xl border border-black/10 p-4">
                        <p class="text-xs uppercase tracking-wider text-gray-500 mb-1">Late Deadline</p>
                        <p class="font-medium text-[#111111]">{{ $submissionInfo->deadline_late?->format('M j, Y') ?? 'TBA' }}</p>
                    </div>
                </div>

                @if ($submissionInfo->fees)
                    <div class="mb-8">
                        <h2 class="text-lg font-medium text-[#111111] mb-2">Fees</h2>
                        <p class="text-gray-700 leading-7">{{ $submissionInfo->fees }}</p>
                    </div>
                @endif

                @if ($submissionInfo->filmfreeway_url)
                    <div class="text-center">
                        <a href="{{ $submissionInfo->filmfreeway_url }}" target="_blank" rel="noopener" class="inline-flex items-center rounded-2xl bg-[var(--accent)] px-7 py-4 text-white font-medium shadow-lg transition duration-300 hover:-translate-y-0.5">
                            Submit via FilmFreeway →
                        </a>
                    </div>
                @endif
            @endif
        </div>
    </section>

    @include('partials.footer')

@endsection
