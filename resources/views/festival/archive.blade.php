@extends('layouts.app')

@section('title', 'Past Editions - '.$brand['acronym'])

@section('content')

    @include('partials.navbar')

    @php $hasHero = \App\Models\PageHero::ofPage($brand['key'], request()->route()->getName())->active()->exists(); @endphp
    <section @class(['relative overflow-hidden bg-white flex items-center justify-center text-center px-6', 'min-h-screen' => $hasHero, 'py-16 md:py-24' => ! $hasHero])>
        @include('partials.page-hero')
        @if ($hasHero)
            <div class="absolute inset-0 bg-black/60"></div>
        @endif
        <h1 class="relative z-10 text-3xl md:text-4xl font-medium {{ $hasHero ? 'text-white' : 'text-[#111111]' }}">Past Editions</h1>
    </section>

    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">

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
