@extends('layouts.app')

@section('title', 'Redeem Waiver Code - Masharket')

@section('content')

    @include('partials.navbar')

    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-lg mx-auto px-6 lg:px-8">
            <div class="mb-10 text-center">
                <div class="inline-flex items-center gap-3 rounded-full border border-black/10 bg-[var(--brand-bg)] px-5 py-2.5 mb-6">
                    <span class="h-2.5 w-2.5 rounded-full bg-[var(--brand-accent)]"></span>
                    <span class="text-[11px] md:text-xs tracking-[0.26em] uppercase text-gray-600 font-medium">Waiver Code</span>
                </div>
                <h1 class="text-3xl md:text-4xl font-medium text-[#111111]">Redeem a Waiver Code</h1>
                <p class="mt-3 text-gray-600">Already registered and have a fee waiver code? Enter it below to confirm your registration.</p>
            </div>

            @if (session('error'))
                <div class="mb-8 rounded-xl border border-red-200 bg-red-50 px-6 py-4 text-red-800">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-8 rounded-xl border border-red-200 bg-red-50 px-6 py-4 text-red-800">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('market.waiver.store') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Registration Type</label>
                    <select name="registration_type" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                        <option value="">Select one</option>
                        <option value="exhibitor" @selected(old('registration_type') === 'exhibitor')>Exhibitor</option>
                        <option value="non_exhibitor" @selected(old('registration_type') === 'non_exhibitor')>Non-Exhibitor</option>
                        <option value="virtual_attendant" @selected(old('registration_type') === 'virtual_attendant')>Virtual Attendant</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Registration Email</label>
                    <input type="email" name="company_contact_email" value="{{ old('company_contact_email') }}" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Waiver Code</label>
                    <input type="text" name="waiver_code" value="{{ old('waiver_code') }}" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)] uppercase tracking-wider font-mono">
                </div>

                <button type="submit" class="w-full inline-flex items-center justify-center rounded-2xl bg-[var(--brand-primary)] px-7 py-4 text-white font-medium shadow-lg transition duration-300 hover:-translate-y-0.5">
                    Redeem Code
                </button>
            </form>
        </div>
    </section>

    @include('partials.footer')

@endsection
