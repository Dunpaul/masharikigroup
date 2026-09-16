@extends('layouts.app')

@section('title', 'Past Editions - '.$brand['acronym'])

@section('content')

    @include('partials.navbar')

    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">
            @php $hasHero = \App\Models\PageHero::forPage($brand['key'], request()->route()->getName())->active()->exists(); @endphp
            <div @class(['relative text-center mb-12', 'overflow-hidden rounded-3xl py-16 px-6' => $hasHero])>
                @if ($hasHero)
                    @include('partials.page-hero')
                    <div class="absolute inset-0 bg-black/60"></div>
                @endif
                <h1 class="relative z-10 text-3xl md:text-4xl font-medium {{ $hasHero ? 'text-white' : 'text-[#111111]' }}">Past Editions</h1>
            </div>

            @if ($editions->isEmpty())
                <p class="text-center text-gray-500 py-16">No archived editions yet.</p>
            @else
                <div class="space-y-4">
                    @foreach ($editions as $edition)
                        <div class="flex items-center justify-between rounded-xl border border-black/10 px-6 py-5">
                            <div>
                                <h3 class="font-medium text-lg text-[#111111]">Edition {{ $edition->edition_number }} · {{ $edition->year }}</h3>
                                @if ($edition->theme_name)<p class="text-sm text-gray-500">{{ $edition->theme_name }}</p>@endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    @include('partials.footer')

@endsection
