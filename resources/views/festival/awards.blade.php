@extends('layouts.app')

@section('title', 'Juries & Awards - '.$brand['acronym'])

@section('content')

    @include('partials.navbar')

    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-5xl mx-auto px-6 lg:px-8">
            <h1 class="text-3xl md:text-4xl font-medium text-[#111111] mb-12 text-center">Juries &amp; Awards</h1>

            @if ($juryMembers->isNotEmpty())
                <h2 class="text-xl font-medium text-[#111111] mb-6">Jury</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-16">
                    @foreach ($juryMembers as $member)
                        <div class="text-center">
                            @if ($member->photo_path)
                                <img src="{{ asset('storage/'.$member->photo_path) }}" alt="{{ $member->name }}" class="h-28 w-28 rounded-full object-cover mx-auto mb-3">
                            @endif
                            <h3 class="font-medium text-[#111111]">{{ $member->name }}</h3>
                            <p class="text-sm text-gray-500">{{ $member->role }}</p>
                        </div>
                    @endforeach
                </div>
            @endif

            @if ($awards->isNotEmpty())
                <h2 class="text-xl font-medium text-[#111111] mb-6">Awards</h2>
                <div class="space-y-3">
                    @foreach ($awards as $award)
                        <div class="flex items-center justify-between rounded-xl border border-black/10 px-6 py-4">
                            <span class="font-medium text-[#111111]">{{ $award->category }}</span>
                            <span class="text-gray-600">
                                @if ($award->winnerFilm)
                                    <a href="{{ route('festival.films.show', $award->winnerFilm->slug) }}" class="hover:text-[var(--accent)]">{{ $award->winnerFilm->title }}</a>
                                @else
                                    {{ $award->winner_name ?? 'TBA' }}
                                @endif
                            </span>
                        </div>
                    @endforeach
                </div>
            @endif

            @if ($juryMembers->isEmpty() && $awards->isEmpty())
                <p class="text-center text-gray-500 py-16">Jury and award details will be published closer to the event.</p>
            @endif
        </div>
    </section>

    @include('partials.footer')

@endsection
