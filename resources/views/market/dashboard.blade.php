@extends('layouts.app')

@section('title', 'My Dashboard - Masharket')

@section('content')

    @include('partials.navbar')

    <section class="py-16 md:py-24 bg-[var(--brand-bg)]">
        <div class="max-w-3xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between mb-10">
                <div>
                    <h1 class="text-3xl font-medium text-[#111111]">Welcome, {{ $registrant->company_contact_first_name }}</h1>
                    <p class="text-gray-500 mt-1">{{ $typeLabel }} &middot; {{ $registrant->registration_id }}</p>
                </div>
                <form action="{{ route('market.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-sm text-gray-500 hover:text-[var(--brand-primary)]">Log Out</button>
                </form>
            </div>

            @if (session('success'))
                <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-6 py-4 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-6 py-4 text-red-800">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white rounded-2xl border border-black/10 p-6 mb-6 flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Payment Status</p>
                    <p class="text-lg font-medium {{ $registrant->payment_status === 'paid' ? 'text-green-700' : 'text-amber-700' }}">
                        {{ ucfirst($registrant->payment_status) }}
                    </p>
                </div>
                @if ($registrant->payment_status === 'paid')
                    <a href="{{ route('market.ticket.show', ['type' => $type, 'registrationId' => $registrant->registration_id]) }}" class="inline-flex items-center rounded-full bg-[var(--brand-primary)] px-6 py-3 text-white text-sm font-medium">
                        View Ticket
                    </a>
                @else
                    <a href="{{ route('market.waiver.create') }}" class="inline-flex items-center rounded-full border border-black/10 px-6 py-3 text-sm font-medium text-gray-700">
                        Have a waiver code?
                    </a>
                @endif
            </div>

            <div class="bg-white rounded-2xl border border-black/10 p-6">
                <h2 class="text-xl font-medium text-[#111111] mb-6">Your Details</h2>

                <form action="{{ route('market.dashboard.update') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                            <input type="text" name="company_contact_first_name" value="{{ old('company_contact_first_name', $registrant->company_contact_first_name) }}" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                            <input type="text" name="company_contact_last_name" value="{{ old('company_contact_last_name', $registrant->company_contact_last_name) }}" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                            <input type="text" name="company_contact_phone" value="{{ old('company_contact_phone', $registrant->company_contact_phone) }}" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" value="{{ $registrant->company_contact_email }}" disabled class="w-full px-4 py-3 border border-gray-200 bg-gray-50 rounded-lg text-gray-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Designation</label>
                            <input type="text" name="designation" value="{{ old('designation', $registrant->designation) }}" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                        </div>
                    </div>

                    @if (isset($registrant->company_name))
                        <h3 class="text-lg font-medium text-[#111111] pt-4 border-t border-black/5">Company</h3>
                        <div class="grid md:grid-cols-2 gap-4">
                            <input type="text" name="company_name" value="{{ old('company_name', $registrant->company_name) }}" placeholder="Company Name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                            <input type="text" name="company_address" value="{{ old('company_address', $registrant->company_address) }}" placeholder="Company Address" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                            <input type="text" name="company_phone" value="{{ old('company_phone', $registrant->company_phone) }}" placeholder="Company Phone" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                            <input type="email" name="company_email" value="{{ old('company_email', $registrant->company_email) }}" placeholder="Company Email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                            <input type="text" name="company_website" value="{{ old('company_website', $registrant->company_website) }}" placeholder="Website" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)] md:col-span-2">
                        </div>
                    @else
                        <h3 class="text-lg font-medium text-[#111111] pt-4 border-t border-black/5">School</h3>
                        <div class="grid md:grid-cols-2 gap-4">
                            <input type="text" name="school_name" value="{{ old('school_name', $registrant->school_name) }}" placeholder="School Name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                            <input type="text" name="school_address" value="{{ old('school_address', $registrant->school_address) }}" placeholder="School Address" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                            <input type="text" name="school_phone" value="{{ old('school_phone', $registrant->school_phone) }}" placeholder="School Phone" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                            <input type="email" name="school_email" value="{{ old('school_email', $registrant->school_email) }}" placeholder="School Email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                            <input type="text" name="school_website" value="{{ old('school_website', $registrant->school_website) }}" placeholder="Website" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)] md:col-span-2">
                        </div>
                    @endif

                    <button type="submit" class="inline-flex items-center rounded-full bg-[var(--brand-primary)] px-6 py-3 text-white text-sm font-medium">
                        Save Changes
                    </button>
                </form>
            </div>
        </div>
    </section>

    @include('partials.footer')

@endsection
