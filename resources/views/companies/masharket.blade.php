@extends('layouts.app')

@section('content')

    @include('partials.navbar')

    <section class="py-32">

        <div class="max-w-6xl mx-auto">

            <h1 class="text-6xl mb-10">
                Masharket
            </h1>

            <p class="text-gray-600 text-lg leading-relaxed mb-8">
                Masharket is a digital marketplace connecting African creatives, entrepreneurs and consumers through commerce, storytelling and culture-driven products.
            </p>

            <a href="http://masharket.com/" target="_blank"
               class="bg-black text-white px-8 py-4 rounded-xl">
                Visit Website
            </a>

        </div>

    </section>

    @include('partials.footer')

@endsection
