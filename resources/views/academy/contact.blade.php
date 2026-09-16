@extends('layouts.app')

@section('title', 'Contact Us - Mashariki Arts Academy')

@section('content')

    @include('partials.navbar')
    <style>
        /* Enhanced shadows and depth */
        .shadow-elevated {
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1), 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        .shadow-elevated:hover {
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15), 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        /* Warm background tones */
        .bg-warm-white {
            background-color: #fafaf9;
        }

        .bg-warm-gray {
            background-color: #f5f5f4;
        }

        .bg-accent-cream {
            background-color: #fef8f3;
        }

        /* Decorative geometric shapes */
        .floating-shape {
            position: absolute;
            border-radius: 50%;
            opacity: 0.06;
            z-index: 0;
        }

        .floating-shape-1 {
            width: 400px;
            height: 400px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            top: -200px;
            right: -100px;
            animation: float 20s ease-in-out infinite;
        }

        .floating-shape-2 {
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            bottom: -100px;
            left: -50px;
            animation: float 15s ease-in-out infinite reverse;
        }

        /* Floating animation */
        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-30px) rotate(5deg);
            }
        }

        /* Curved section dividers */
        .curve-divider {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }

        .curve-divider svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 80px;
        }

        .curve-divider-top {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
            transform: rotate(180deg);
        }

        .curve-divider-top svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 80px;
        }

        /* Fade in on scroll animation */
        .fade-in-up {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .fade-in-up.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Stagger animation for grid items */
        .stagger-item {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease-out, transform 0.5s ease-out;
        }

        .stagger-item.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Gradient background overlay */
        .gradient-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.03) 0%, rgba(118, 75, 162, 0.03) 100%);
            pointer-events: none;
            z-index: 0;
        }

        /* Mobile responsive adjustments */
        @media (max-width: 768px) {
            .floating-shape {
                display: none;
            }

            .curve-divider svg,
            .curve-divider-top svg {
                height: 40px;
            }
        }
    </style>

    <!-- Hero Section -->
    <section class="relative bg-gray-900 text-white overflow-hidden min-h-[70vh] flex items-center">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1423666639041-f56000c27a9a?w=1600&q=80" alt="Contact" class="w-full h-full object-cover opacity-30">
            @include('partials.page-hero')
            <div class="absolute inset-0 bg-black/60"></div>
        </div>
        <div class="relative max-w-5xl mx-auto px-4 sm:px-6 py-16 sm:py-24 text-center">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-4 sm:mb-6">Get In Touch</h1>
            <p class="text-lg sm:text-xl text-gray-200 max-w-3xl mx-auto">
                We'd love to hear from you. Get in touch with us today to discuss your project and see how we can help you achieve your goals.
            </p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="bg-warm-white py-12 sm:py-16 md:py-20 relative overflow-hidden">
        <!-- Decorative shapes -->
        <div class="floating-shape floating-shape-1"></div>
        <div class="gradient-overlay"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
            @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 text-green-900 px-4 sm:px-6 py-3 sm:py-4 mb-6 sm:mb-8 rounded-lg shadow-elevated fade-in-up">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-sm sm:text-base">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 sm:gap-12 lg:gap-16">
                <!-- Contact Form -->
                <div class="fade-in-up">
                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">Send Us a Message</h2>
                    <p class="text-sm sm:text-base text-gray-600 mb-6 sm:mb-8">Fill out the form below and we'll get back to you as soon as possible.</p>

                    <form action="{{ route('academy.contact.submit') }}" method="POST" class="space-y-5 sm:space-y-6">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-900 mb-2">Full Name *</label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                class="w-full px-4 sm:px-6 py-3 sm:py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-gray-900 transition @error('name') border-red-500 @enderror text-sm sm:text-base"
                                required>
                            @error('name')
                            <p class="text-red-500 text-xs sm:text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-900 mb-2">Email Address *</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="w-full px-4 sm:px-6 py-3 sm:py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-gray-900 transition @error('email') border-red-500 @enderror text-sm sm:text-base"
                                required>
                            @error('email')
                            <p class="text-red-500 text-xs sm:text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-semibold text-gray-900 mb-2">Message *</label>
                            <textarea
                                id="message"
                                name="message"
                                rows="6"
                                class="w-full px-4 sm:px-6 py-3 sm:py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-gray-900 transition @error('message') border-red-500 @enderror text-sm sm:text-base"
                                required>{{ old('message') }}</textarea>
                            @error('message')
                            <p class="text-red-500 text-xs sm:text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <button
                            type="submit"
                            class="w-full bg-gray-900 text-white py-3 sm:py-4 rounded-xl text-sm font-bold hover:bg-gray-800 transition transform hover:scale-105 shadow-elevated">
                            SEND MESSAGE
                        </button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="space-y-6 sm:space-y-8 fade-in-up">
                    <div>
                        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-6 sm:mb-8">Contact Information</h2>
                    </div>

                    <div class="space-y-4 sm:space-y-6">
                        <div class="flex items-start bg-white p-5 sm:p-6 rounded-xl hover-lift shadow-elevated stagger-item">
                            <div class="flex-shrink-0 w-10 h-10 sm:w-12 sm:h-12 bg-gray-900 rounded-lg flex items-center justify-center mr-3 sm:mr-4">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xs sm:text-sm font-semibold text-gray-900 uppercase tracking-wider mb-1 sm:mb-2">Location</h3>
                                <p class="text-sm sm:text-base text-gray-700 font-medium">8 KN 4 Ave<br>Kigali, Rwanda</p>
                            </div>
                        </div>

                        <div class="flex items-start bg-white p-5 sm:p-6 rounded-xl hover-lift shadow-elevated stagger-item">
                            <div class="flex-shrink-0 w-10 h-10 sm:w-12 sm:h-12 bg-gray-900 rounded-lg flex items-center justify-center mr-3 sm:mr-4">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xs sm:text-sm font-semibold text-gray-900 uppercase tracking-wider mb-1 sm:mb-2">Phone</h3>
                                <p class="text-sm sm:text-base text-gray-700 font-medium">+250 792 614 766</p>
                            </div>
                        </div>

                        <div class="flex items-start bg-white p-5 sm:p-6 rounded-xl hover-lift shadow-elevated stagger-item">
                            <div class="flex-shrink-0 w-10 h-10 sm:w-12 sm:h-12 bg-gray-900 rounded-lg flex items-center justify-center mr-3 sm:mr-4">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xs sm:text-sm font-semibold text-gray-900 uppercase tracking-wider mb-1 sm:mb-2">Email</h3>
                                <p class="text-sm sm:text-base text-gray-700 font-medium">info@masharikiacademy.org</p>
                            </div>
                        </div>

                        <div class="flex items-start bg-white p-5 sm:p-6 rounded-xl hover-lift shadow-elevated stagger-item">
                            <div class="flex-shrink-0 w-10 h-10 sm:w-12 sm:h-12 bg-gray-900 rounded-lg flex items-center justify-center mr-3 sm:mr-4">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xs sm:text-sm font-semibold text-gray-900 uppercase tracking-wider mb-2">Follow Us</h3>
                                <div class="flex space-x-2 sm:space-x-3 mt-2">
                                    <a href="#" class="w-8 h-8 sm:w-9 sm:h-9 bg-gray-900 rounded-lg flex items-center justify-center text-white hover:bg-gray-700 transition shadow-elevated">
                                        <span class="text-xs sm:text-sm font-semibold">f</span>
                                    </a>
                                    <a href="#" class="w-8 h-8 sm:w-9 sm:h-9 bg-gray-900 rounded-lg flex items-center justify-center text-white hover:bg-gray-700 transition shadow-elevated">
                                        <span class="text-xs sm:text-sm font-semibold">𝕏</span>
                                    </a>
                                    <a href="#" class="w-8 h-8 sm:w-9 sm:h-9 bg-gray-900 rounded-lg flex items-center justify-center text-white hover:bg-gray-700 transition shadow-elevated">
                                        <span class="text-xs sm:text-sm font-semibold">in</span>
                                    </a>
                                    <a href="#" class="w-8 h-8 sm:w-9 sm:h-9 bg-gray-900 rounded-lg flex items-center justify-center text-white hover:bg-gray-700 transition shadow-elevated">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M7.75 2h8.5A5.75 5.75 0 0122 7.75v8.5A5.75 5.75 0 0116.25 22h-8.5A5.75 5.75 0 012 16.25v-8.5A5.75 5.75 0 017.75 2zm0 1.5A4.25 4.25 0 003.5 7.75v8.5a4.25 4.25 0 004.25 4.25h8.5a4.25 4.25 0 004.25-4.25v-8.5a4.25 4.25 0 00-4.25-4.25h-8.5zM12 7a5 5 0 110 10 5 5 0 010-10zm0 1.5a3.5 3.5 0 100 7 3.5 3.5 0 000-7zm5.5-.75a.75.75 0 110 1.5.75.75 0 010-1.5z" clip-rule="evenodd"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Additional Info Cards -->
    <section class="bg-warm-gray py-12 sm:py-16 md:py-20 relative overflow-hidden">
        <!-- Decorative shapes -->
        <div class="floating-shape floating-shape-2"></div>
        <div class="gradient-overlay"></div>

        <!-- Curved divider at top -->
        <div class="curve-divider-top">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="#fafaf9"></path>
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
                <div class="bg-white p-8 sm:p-10 rounded-xl sm:rounded-2xl shadow-elevated text-center hover-lift stagger-item">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 bg-gray-900 rounded-full mx-auto mb-4 sm:mb-6 flex items-center justify-center shadow-elevated">
                        <svg class="w-7 h-7 sm:w-8 sm:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg sm:text-xl mb-2 sm:mb-3">Visit Our Campus</h3>
                    <p class="text-gray-600 text-xs sm:text-sm">Modern facilities in the heart of Kigali equipped for creative excellence</p>
                </div>
                <div class="bg-white p-8 sm:p-10 rounded-xl sm:rounded-2xl shadow-elevated text-center hover-lift stagger-item">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 bg-gray-900 rounded-full mx-auto mb-4 sm:mb-6 flex items-center justify-center shadow-elevated">
                        <svg class="w-7 h-7 sm:w-8 sm:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg sm:text-xl mb-2 sm:mb-3">Partnership Opportunities</h3>
                    <p class="text-gray-600 text-xs sm:text-sm">Collaborate with us to shape Africa's creative future</p>
                </div>
                <div class="bg-white p-8 sm:p-10 rounded-xl sm:rounded-2xl shadow-elevated text-center hover-lift stagger-item">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 bg-gray-900 rounded-full mx-auto mb-4 sm:mb-6 flex items-center justify-center shadow-elevated">
                        <svg class="w-7 h-7 sm:w-8 sm:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg sm:text-xl mb-2 sm:mb-3">Apply to Our Programs</h3>
                    <p class="text-gray-600 text-xs sm:text-sm">Join our next cohort of emerging African creatives</p>
                    <p class="text-gray-900 font-semibold text-sm mt-3">Tuition Fee: 3,000,000 RWF (≈ $2,200 USD)</p>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Observe fade-in elements
        document.querySelectorAll('.fade-in-up').forEach(el => observer.observe(el));

        // Staggered animation for grid items
        const staggerObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.classList.add('visible');
                    }, index * 100);
                }
            });
        }, observerOptions);

        document.querySelectorAll('.stagger-item').forEach(el => staggerObserver.observe(el));
    </script>

    @include('partials.footer')

@endsection
