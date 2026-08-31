@extends('layouts.app')

@section('title', $title.' - Masharket')

@section('content')

    @include('partials.navbar')

    <section class="min-h-[60vh] flex items-center justify-center px-6 text-center bg-white">
        <div class="max-w-xl">
            <div class="text-[11px] uppercase tracking-[0.28em] text-gray-500 mb-4">Masharket</div>
            <h1 class="text-4xl md:text-5xl font-medium tracking-tight text-[#111111] mb-4">{{ $title }}</h1>
            <p class="text-gray-600">Coming soon. Details for this part of the program will be published closer to the event.</p>
        </div>
    </section>

    @include('partials.footer')

@endsection
