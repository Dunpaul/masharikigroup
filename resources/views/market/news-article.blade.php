@extends('layouts.app')

@section('title', $article->title.' - Masharket')

@section('content')

    @include('partials.navbar')

    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-3xl mx-auto px-6 lg:px-8">
            <a href="{{ route('market.media') }}" class="text-sm text-gray-500 hover:text-[var(--brand-primary)]">&larr; Back to Media</a>

            <h1 class="text-3xl md:text-4xl font-medium text-[#111111] mt-4 mb-2">{{ $article->title }}</h1>
            @if ($article->published_at)
                <p class="text-sm text-gray-500 mb-8">{{ $article->published_at->format('F j, Y') }}</p>
            @endif

            @if ($article->image_path)
                <img src="{{ asset('storage/'.$article->image_path) }}" alt="{{ $article->title }}" class="w-full rounded-2xl mb-8">
            @endif

            <div class="prose max-w-none text-gray-700 leading-8">
                {!! $article->body !!}
            </div>
        </div>
    </section>

    @include('partials.footer')

@endsection
