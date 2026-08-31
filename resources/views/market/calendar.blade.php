@extends('layouts.app')

@section('title', 'Schedule a Meeting - Masharket')

@section('content')

    @include('partials.navbar')

    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">
            <h1 class="text-3xl md:text-4xl font-medium text-[#111111] mb-8 text-center">
                Select a time to schedule a meeting with a delegate
            </h1>

            <div class="calendly-inline-widget rounded-2xl overflow-hidden border border-black/10" data-url="https://calendly.com/masharket/30min" style="min-width:320px;height:700px;"></div>
            <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
        </div>
    </section>

    @include('partials.footer')

@endsection
