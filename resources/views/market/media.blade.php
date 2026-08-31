@extends('layouts.app')

@section('title', 'Media - Masharket')

@section('content')

    @include('partials.navbar')

    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-6xl mx-auto px-6 lg:px-8">
            <h1 class="text-3xl md:text-4xl font-medium text-[#111111] mb-12 text-center">Media &amp; Press</h1>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($articles as $article)
                    <a href="{{ route('market.media.show', $article->slug) }}" class="rounded-2xl border border-black/10 overflow-hidden hover:-translate-y-0.5 transition duration-300 bg-white">
                        @if ($article->image_path)
                            <img src="{{ asset('storage/'.$article->image_path) }}" alt="{{ $article->title }}" class="w-full h-48 object-cover">
                        @endif
                        <div class="p-6">
                            <h2 class="font-medium text-lg text-[#111111] mb-2">{{ $article->title }}</h2>
                            <p class="text-sm text-gray-600 line-clamp-3">{{ $article->excerpt }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    @include('partials.footer')

@endsection
