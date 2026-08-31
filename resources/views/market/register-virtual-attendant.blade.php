@extends('layouts.app')

@section('title', 'Register as a Virtual Attendant - Masharket')

@section('content')

    @include('partials.navbar')

    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-3xl mx-auto px-6 lg:px-8">
            <div class="mb-10 text-center">
                <div class="inline-flex items-center gap-3 rounded-full border border-black/10 bg-[var(--brand-bg)] px-5 py-2.5 mb-6">
                    <span class="h-2.5 w-2.5 rounded-full bg-[var(--brand-accent)]"></span>
                    <span class="text-[11px] md:text-xs tracking-[0.26em] uppercase text-gray-600 font-medium">Virtual Attendant Registration</span>
                </div>
                <h1 class="text-3xl md:text-4xl font-medium text-[#111111]">Register as a Virtual Attendant</h1>
                <p class="mt-3 text-gray-600">Tell us about your company and we'll be in touch with payment details.</p>
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

            <form action="{{ route('market.virtual-attendants.store') }}" method="POST" class="space-y-10">
                @csrf

                <div>
                    <h2 class="text-xl font-medium text-[#111111] mb-4">Primary Contact</h2>
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
                            <input type="text" name="designation" value="{{ old('designation') }}" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
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
                    <h2 class="text-xl font-medium text-[#111111] mb-4">Alternative Contact <span class="text-sm text-gray-500 font-normal">(optional)</span></h2>
                    <div class="grid md:grid-cols-2 gap-4">
                        <input type="text" name="company_contact_alt_first_name" value="{{ old('company_contact_alt_first_name') }}" placeholder="First Name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                        <input type="text" name="company_contact_alt_last_name" value="{{ old('company_contact_alt_last_name') }}" placeholder="Last Name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                        <input type="text" name="company_contact_alt_phone" value="{{ old('company_contact_alt_phone') }}" placeholder="Phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                        <input type="email" name="company_contact_alt_email" value="{{ old('company_contact_alt_email') }}" placeholder="Email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                    </div>
                </div>

                <div>
                    <h2 class="text-xl font-medium text-[#111111] mb-4">Company Details</h2>
                    <div class="grid md:grid-cols-2 gap-4">
                        <input type="text" name="company_name" value="{{ old('company_name') }}" placeholder="Company Name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                        <input type="text" name="company_address" value="{{ old('company_address') }}" placeholder="Company Address" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                        <input type="text" name="company_phone" value="{{ old('company_phone') }}" placeholder="Company Phone" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                        <input type="email" name="company_email" value="{{ old('company_email') }}" placeholder="Company Email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                        <input type="text" name="company_website" value="{{ old('company_website') }}" placeholder="www.example.com" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)] md:col-span-2">
                        <input type="text" name="company_services" value="{{ old('company_services') }}" placeholder="Service provided by company" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)] md:col-span-2">
                        <textarea name="company_services_exhibited" rows="4" placeholder="Brief description of the service you provide" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)] md:col-span-2">{{ old('company_services_exhibited') }}</textarea>
                    </div>
                </div>

                <div>
                    <h2 class="text-xl font-medium text-[#111111] mb-1">Types of Service(s) You Provide</h2>
                    <p class="text-sm text-gray-500 mb-4">Select all that apply</p>
                    <div class="grid md:grid-cols-2 gap-3">
                        @foreach ([
                            'Content aggregator/Distributor/Sales agent', 'Satellite payTV platform', 'Free to air linear channel',
                            'Telco', 'Online content provider', 'Commercial broadcaster', 'Cable Pay TV operator', 'FAST channel',
                            'Mobile pay Tv operator', 'VOD', 'SVOD', 'TVOD', 'Free VOD', 'OTT', 'Dubbing company',
                            'Content delivery solutions provider', 'Government and government agencies', 'Advertising and marketing agency',
                            'Radio station', 'Podcast', 'Gaming', 'VR', 'Inflight Entertainment',
                        ] as $provision)
                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="company_provisions[]" value="{{ $provision }}" @checked(collect(old('company_provisions'))->contains($provision))>
                                <span class="text-gray-700 text-sm">{{ $provision }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div>
                    <h2 class="text-xl font-medium text-[#111111] mb-1">Genre(s) of Content You Provide</h2>
                    <p class="text-sm text-gray-500 mb-4">Select all that apply</p>
                    <div class="grid md:grid-cols-2 gap-3">
                        @foreach ([
                            'Feature Films', 'Action', 'Science Fiction', 'Documentaries', 'Educational programs', 'Sports',
                            'Channels', 'News and current affairs', 'Game shows', 'Comedy', 'Animations', 'Short Films',
                            'Dramas', 'Telenovelas', 'Reality/Lifestyle shows', 'Kids content', 'Formats',
                        ] as $genre)
                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="company_products[]" value="{{ $genre }}" @checked(collect(old('company_products'))->contains($genre))>
                                <span class="text-gray-700 text-sm">{{ $genre }}</span>
                            </label>
                        @endforeach
                    </div>
                    <textarea name="company_products_other" rows="3" placeholder="List others" class="mt-4 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">{{ old('company_products_other') }}</textarea>
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
