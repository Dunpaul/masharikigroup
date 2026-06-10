@extends('layouts.app')

@section('content')

    @include('partials.navbar')

    <section class="py-32">

        <div class="max-w-6xl mx-auto">

            <h1 class="text-6xl mb-10">
                Mashariki Festival
            </h1>

            <p class="text-gray-600 text-lg leading-relaxed mb-8">
                Mashariki Festival is a cultural event platform bringing together filmmakers, storytellers, artists, and audiences to celebrate African creativity.
            </p>

            <a href="https://www.masharikifestival.org/" target="_blank"
               class="bg-black text-white px-8 py-4 rounded-xl">
                Visit Website
            </a>

        </div>

    </section>

@endsection
