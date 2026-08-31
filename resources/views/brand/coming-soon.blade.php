@extends('layouts.app')

@section('content')

    @include('partials.navbar')

    <section class="min-h-[70vh] flex items-center justify-center px-6 text-center">
        <div class="max-w-xl">
            <div class="text-[11px] uppercase tracking-[0.28em] text-gray-500 mb-4">{{ $brand['short_name'] }}</div>
            <h1 class="text-4xl md:text-5xl font-medium tracking-tight text-[#111111] mb-4">{{ $brand['tagline'] }}</h1>
            <p class="text-gray-600">This section is being migrated into the unified Mashariki platform. Full content is coming in a later phase of the rebuild.</p>
        </div>
    </section>

    @include('partials.footer')

@endsection
