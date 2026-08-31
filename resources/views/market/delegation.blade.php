@extends('layouts.app')

@section('title', 'Delegates - Masharket')

@section('content')

    @include('partials.navbar')

    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-6xl mx-auto px-6 lg:px-8">
            <div class="mb-10 text-center">
                <h1 class="text-4xl md:text-5xl font-medium text-[#111111] mb-3">Delegates</h1>
                <p class="text-gray-600">Confirmed attendees for {{ $settings->event_name }}.</p>
            </div>

            @if ($delegates->isEmpty())
                <p class="text-center text-gray-500 py-16">No confirmed delegates yet. Check back soon.</p>
            @else
                <div class="overflow-x-auto rounded-2xl border border-black/10">
                    <table class="w-full text-left">
                        <thead class="bg-[var(--brand-bg)]">
                            <tr>
                                <th class="px-4 py-3 text-sm font-medium text-gray-600">First Name</th>
                                <th class="px-4 py-3 text-sm font-medium text-gray-600">Last Name</th>
                                <th class="px-4 py-3 text-sm font-medium text-gray-600">Company / School</th>
                                <th class="px-4 py-3 text-sm font-medium text-gray-600">Designation</th>
                                <th class="px-4 py-3 text-sm font-medium text-gray-600">Attending As</th>
                                <th class="px-4 py-3 text-sm font-medium text-gray-600">Type</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-black/5">
                            @foreach ($delegates as $delegate)
                                <tr>
                                    <td class="px-4 py-3">{{ ucwords(strtolower($delegate['first_name'])) }}</td>
                                    <td class="px-4 py-3">{{ ucwords(strtolower($delegate['last_name'])) }}</td>
                                    <td class="px-4 py-3">{{ $delegate['organization'] }}</td>
                                    <td class="px-4 py-3">{{ ucwords($delegate['designation']) }}</td>
                                    <td class="px-4 py-3 capitalize">{{ $delegate['attending_as'] }}</td>
                                    <td class="px-4 py-3">{{ $delegate['type'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </section>

    @include('partials.footer')

@endsection
