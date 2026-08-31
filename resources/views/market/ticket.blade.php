@extends('layouts.app')

@section('title', 'Your Ticket - Masharket')

@section('content')

    @include('partials.navbar')

    <section class="py-16 md:py-24 bg-[var(--brand-bg)]">
        <div class="max-w-xl mx-auto px-6">
            @if (session('success'))
                <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-6 py-4 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-3xl shadow-xl border border-black/10 overflow-hidden">
                <div class="bg-[var(--brand-primary)] px-8 py-6 text-white">
                    <p class="text-[11px] uppercase tracking-[0.28em] text-white/70">{{ $settings->event_name }}</p>
                    <h1 class="text-2xl font-medium mt-1">Entry Ticket</h1>
                </div>

                <div class="px-8 py-8 text-center">
                    <div class="flex justify-center mb-6">
                        {!! QrCode::size(180)->generate($registrant->registration_id) !!}
                    </div>

                    <p class="text-2xl font-semibold text-[#111111] tracking-wider">{{ $registrant->registration_id }}</p>
                    <p class="mt-1 text-sm uppercase tracking-[0.2em] text-gray-500">{{ $typeLabel }}</p>

                    <div class="mt-6 pt-6 border-t border-gray-200 text-left space-y-1 text-gray-700">
                        <p class="font-medium">{{ $registrant->company_contact_first_name }} {{ $registrant->company_contact_last_name }}</p>
                        @if (isset($registrant->company_name))
                            <p class="text-sm text-gray-500">{{ $registrant->company_name }}</p>
                        @elseif (isset($registrant->school_name))
                            <p class="text-sm text-gray-500">{{ $registrant->school_name }}</p>
                        @endif

                        @if ($settings->start_date && $settings->end_date)
                            <p class="text-sm text-gray-500 mt-3">{{ $settings->start_date->format('jS') }} to {{ $settings->end_date->format('jS F, Y') }}</p>
                        @endif
                        @if ($settings->venue_name)
                            <p class="text-sm text-gray-500">{{ $settings->venue_name }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <p class="mt-6 text-center text-sm text-gray-500">Present this ticket (printed or on your phone) at the entrance.</p>
        </div>
    </section>

    @include('partials.footer')

@endsection
