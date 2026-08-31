@extends('layouts.app')

@section('title', 'Register as a Student - Masharket')

@section('content')

    @include('partials.navbar')

    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-3xl mx-auto px-6 lg:px-8">
            <div class="mb-10 text-center">
                <div class="inline-flex items-center gap-3 rounded-full border border-black/10 bg-[var(--brand-bg)] px-5 py-2.5 mb-6">
                    <span class="h-2.5 w-2.5 rounded-full bg-[var(--brand-accent)]"></span>
                    <span class="text-[11px] md:text-xs tracking-[0.26em] uppercase text-gray-600 font-medium">Student Registration</span>
                </div>
                <h1 class="text-3xl md:text-4xl font-medium text-[#111111]">Register as a Student</h1>
                <p class="mt-3 text-gray-600">Student registration is free — get an insider's view of the entertainment industry.</p>
            </div>

            @if (session('success'))
                <div class="mb-8 rounded-xl border border-green-200 bg-green-50 px-6 py-4 text-green-800">
                    {{ session('success') }}
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

            <form action="{{ route('market.students.store') }}" method="POST" class="space-y-10">
                @csrf

                <div>
                    <h2 class="text-xl font-medium text-[#111111] mb-4">Your Details</h2>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                            <input type="text" name="company_contact_first_name" value="{{ old('company_contact_first_name') }}" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                            <input type="text" name="company_contact_last_name" value="{{ old('company_contact_last_name') }}" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                            <input type="text" name="company_contact_phone" value="{{ old('company_contact_phone') }}" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" name="company_contact_email" value="{{ old('company_contact_email') }}" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Designation</label>
                            <input type="text" name="designation" value="{{ old('designation') }}" placeholder="e.g. Student" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Attending As</label>
                            <select name="attending_as" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                                <option value="">Select one option</option>
                                <option value="buyer">Buyer</option>
                                <option value="seller">Seller</option>
                                <option value="vendor">Vendor</option>
                                <option value="official">Official</option>
                                <option value="visitor">Visitor</option>
                                <option value="press">Press</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-xl font-medium text-[#111111] mb-4">School Details</h2>
                    <div class="grid md:grid-cols-2 gap-4">
                        <input type="text" name="school_name" value="{{ old('school_name') }}" placeholder="School Name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                        <input type="text" name="school_address" value="{{ old('school_address') }}" placeholder="School Address" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                        <input type="text" name="school_phone" value="{{ old('school_phone') }}" placeholder="School Phone" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                        <input type="email" name="school_email" value="{{ old('school_email') }}" placeholder="School Email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                        <input type="text" name="school_website" value="{{ old('school_website') }}" placeholder="www.example.com" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)] md:col-span-2">
                    </div>
                </div>

                <div>
                    <h2 class="text-xl font-medium text-[#111111] mb-4">Account</h2>
                    <div class="grid md:grid-cols-2 gap-4">
                        <input type="password" name="password" placeholder="Password" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                    </div>
                </div>

                <button type="submit" class="w-full inline-flex items-center justify-center rounded-2xl bg-[var(--brand-primary)] px-7 py-4 text-white font-medium shadow-lg transition duration-300 hover:-translate-y-0.5">
                    Submit Registration
                </button>
            </form>
        </div>
    </section>

    @include('partials.footer')

@endsection
