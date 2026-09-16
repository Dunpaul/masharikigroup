@extends('layouts.app')

@section('content')

    @include('partials.navbar')

    @php $hasHero = \App\Models\PageHero::forPage($brand['key'], request()->route()->getName())->active()->exists(); @endphp
    <section @class(['relative overflow-hidden bg-[#f5f6f8] py-24 md:py-32', 'min-h-screen flex items-center' => $hasHero])>
        @include('partials.page-hero')
        @if ($hasHero)
            <div class="absolute inset-0 bg-black/60"></div>
        @else
            <div class="absolute top-0 left-0 h-72 w-72 rounded-full bg-orange-200/30 blur-3xl"></div>
            <div class="absolute bottom-0 right-0 h-80 w-80 rounded-full bg-purple-200/25 blur-3xl"></div>
        @endif

        <div class="relative w-full max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-start">

                <div>
                    <div class="inline-flex items-center gap-3 rounded-full border border-black/10 bg-white/70 backdrop-blur px-4 py-2 mb-8 shadow-sm">
                        <span class="h-2.5 w-2.5 rounded-full bg-[var(--accent)]"></span>
                        <span class="text-[11px] md:text-xs tracking-[0.26em] uppercase text-gray-600 font-medium">
                            Contact Mashariki Group
                        </span>
                    </div>

                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-semibold tracking-tight leading-[1.02] mb-6 {{ $hasHero ? 'text-white' : 'text-[#111111]' }}">
                        Let’s Build
                        <span @class([
                            'block',
                            'text-white' => $hasHero,
                            'bg-gradient-to-r from-orange-500 via-pink-500 to-purple-600 bg-clip-text text-transparent' => ! $hasHero,
                        ])>
                            Something Meaningful
                        </span>
                    </h1>

                    <p class="text-lg md:text-xl leading-8 max-w-2xl mb-10 {{ $hasHero ? 'text-white/90' : 'text-gray-600' }}">
                        Whether you want to partner with us, learn more about our companies, or start a conversation
                        around culture, education, commerce, or creative growth, we’d love to hear from you.
                    </p>

                    <div class="grid sm:grid-cols-2 gap-5">
                        <div class="rounded-3xl bg-white/90 backdrop-blur p-6 border border-white/80 shadow-[0_10px_30px_rgba(0,0,0,0.04)]">
                            <div class="w-12 h-12 rounded-2xl bg-[var(--accent)]/10 flex items-center justify-center mb-4">
                                <svg class="w-5 h-5 text-[var(--accent)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 5a2 2 0 012-2h3.28a2 2 0 011.895 1.368l1.074 3.222a2 2 0 01-.457 2.11l-1.547 1.547a16.042 16.042 0 006.506 6.506l1.547-1.547a2 2 0 012.11-.457l3.222 1.074A2 2 0 0121 15.72V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-[#111111] mb-2">Call Us</h3>
                            <p class="text-gray-600 leading-7">+250 792 608 452</p>
                        </div>

                        <div class="rounded-3xl bg-white/90 backdrop-blur p-6 border border-white/80 shadow-[0_10px_30px_rgba(0,0,0,0.04)]">
                            <div class="w-12 h-12 rounded-2xl bg-pink-50 flex items-center justify-center mb-4">
                                <svg class="w-5 h-5 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-16 10h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-[#111111] mb-2">Email Us</h3>
                            <p class="text-gray-600 leading-7">info@masharikigroup.org</p>
                        </div>

                        <div class="rounded-3xl bg-white/90 backdrop-blur p-6 border border-white/80 shadow-[0_10px_30px_rgba(0,0,0,0.04)] sm:col-span-2">
                            <div class="w-12 h-12 rounded-2xl bg-purple-50 flex items-center justify-center mb-4">
                                <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-[#111111] mb-2">Visit Us</h3>
                            <p class="text-gray-600 leading-7">
                                Kigali, Rwanda
                            </p>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute -top-6 -left-6 h-full w-full rounded-[2rem] bg-gradient-to-br from-orange-100 via-pink-100 to-purple-100 blur-2xl opacity-60"></div>

                    <div class="relative rounded-[2rem] bg-white p-8 md:p-10 border border-white/80 shadow-[0_20px_60px_rgba(0,0,0,0.08)]">
                        <div class="mb-8">
                            <p class="uppercase tracking-[0.24em] text-xs text-gray-500 mb-3">
                                Send a Message
                            </p>
                            <h2 class="text-3xl md:text-4xl font-semibold tracking-tight text-[#111111]">
                                Start the conversation
                            </h2>
                            <p class="mt-4 text-gray-600 leading-7">
                                Fill in the form below and our team will get back to you.
                            </p>
                        </div>

                        <form action="#" method="POST" class="space-y-6">
                            @csrf

                            <div class="grid md:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-sm font-medium text-[#111111] mb-2">First Name</label>
                                    <input
                                        type="text"
                                        name="first_name"
                                        class="w-full rounded-2xl border border-gray-200 bg-[#fafafa] px-4 py-3.5 text-[#111111] outline-none transition focus:border-gray-400 focus:bg-white"
                                        placeholder="John"
                                    >
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-[#111111] mb-2">Last Name</label>
                                    <input
                                        type="text"
                                        name="last_name"
                                        class="w-full rounded-2xl border border-gray-200 bg-[#fafafa] px-4 py-3.5 text-[#111111] outline-none transition focus:border-gray-400 focus:bg-white"
                                        placeholder="Doe"
                                    >
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-sm font-medium text-[#111111] mb-2">Email Address</label>
                                    <input
                                        type="email"
                                        name="email"
                                        class="w-full rounded-2xl border border-gray-200 bg-[#fafafa] px-4 py-3.5 text-[#111111] outline-none transition focus:border-gray-400 focus:bg-white"
                                        placeholder="you@example.com"
                                    >
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-[#111111] mb-2">Phone Number</label>
                                    <input
                                        type="text"
                                        name="phone"
                                        class="w-full rounded-2xl border border-gray-200 bg-[#fafafa] px-4 py-3.5 text-[#111111] outline-none transition focus:border-gray-400 focus:bg-white"
                                        placeholder="+250..."
                                    >
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-[#111111] mb-2">Subject</label>
                                <input
                                    type="text"
                                    name="subject"
                                    class="w-full rounded-2xl border border-gray-200 bg-[#fafafa] px-4 py-3.5 text-[#111111] outline-none transition focus:border-gray-400 focus:bg-white"
                                    placeholder="How can we help?"
                                >
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-[#111111] mb-2">Message</label>
                                <textarea
                                    name="message"
                                    rows="6"
                                    class="w-full rounded-2xl border border-gray-200 bg-[#fafafa] px-4 py-3.5 text-[#111111] outline-none transition focus:border-gray-400 focus:bg-white resize-none"
                                    placeholder="Tell us more about your inquiry..."
                                ></textarea>
                            </div>

                            <button
                                type="submit"
                                class="inline-flex items-center rounded-2xl bg-[#111111] px-7 py-4 text-white font-medium shadow-lg shadow-black/10 transition duration-300 hover:-translate-y-0.5 hover:bg-black"
                            >
                                Send Message
                                <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="bg-white py-24 md:py-28">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-6">
                <div class="rounded-3xl border border-gray-100 bg-[#fafafa] p-8 shadow-[0_8px_30px_rgba(0,0,0,0.04)]">
                    <p class="uppercase tracking-[0.24em] text-xs text-gray-500 mb-4">General Inquiries</p>
                    <h3 class="text-2xl font-semibold text-[#111111] mb-3">Questions about the group</h3>
                    <p class="text-gray-600 leading-7">
                        Reach out for information about Mashariki Group, our vision, or our work across sectors.
                    </p>
                </div>

                <div class="rounded-3xl border border-gray-100 bg-[#fafafa] p-8 shadow-[0_8px_30px_rgba(0,0,0,0.04)]">
                    <p class="uppercase tracking-[0.24em] text-xs text-gray-500 mb-4">Partnerships</p>
                    <h3 class="text-2xl font-semibold text-[#111111] mb-3">Collaborate with us</h3>
                    <p class="text-gray-600 leading-7">
                        We welcome opportunities in education, culture, commerce, media, and strategic growth.
                    </p>
                </div>

                <div class="rounded-3xl border border-gray-100 bg-[#111111] p-8 text-white shadow-[0_18px_60px_rgba(0,0,0,0.16)]">
                    <p class="uppercase tracking-[0.24em] text-xs text-gray-400 mb-4">Companies</p>
                    <h3 class="text-2xl font-semibold mb-3">Looking for a specific brand?</h3>
                    <p class="text-gray-300 leading-7 mb-6">
                        Visit our companies page to explore the businesses under Mashariki Group.
                    </p>
                    <a href="/companies" class="inline-flex items-center text-white font-medium">
                        Explore our companies
                        <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')

@endsection
