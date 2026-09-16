@extends('layouts.app')

@section('title', 'About Us - Mashariki Arts Academy')

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

        .floating-shape-3 {
            width: 250px;
            height: 250px;
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            top: 50%;
            left: -125px;
            animation: float 18s ease-in-out infinite;
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
    <!-- Hero Section with Image -->
    <section class="relative bg-gray-900 text-white overflow-hidden min-h-[70vh] flex items-center">
        <div class="absolute inset-0">
            <img src="{{ asset('academy/images/workshop9.jpg') }}" alt="Team collaboration" class="w-full h-full object-cover opacity-30">
            @include('partials.page-hero')
            <div class="absolute inset-0 bg-black/30"></div>
        </div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 py-16 sm:py-24 text-center">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-4 sm:mb-6">Welcome to Mashariki Arts Academy</h1>
            <p class="text-lg sm:text-xl text-gray-200 leading-relaxed max-w-3xl mx-auto">
                Shaping Africa's creative future through world-class film and storytelling training.
            </p>
        </div>
    </section>

    <!-- Founder's Message -->
    <section class="bg-white py-12 sm:py-16 md:py-20 relative overflow-hidden">
        <div class="gradient-overlay"></div>
        <div class="max-w-6xl mx-auto px-4 sm:px-6 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center fade-in-up">
                <div class="order-2 lg:order-1">
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-6">From Our Founder</h2>
                    <blockquote class="text-lg sm:text-xl text-gray-700 leading-relaxed mb-6 italic border-l-4 border-gray-900 pl-6">
                        "Africa's greatest stories live within its people. Our role is to give creatives the tools, discipline, and opportunity to take those stories to the world."
                    </blockquote>
                    <p class="text-base sm:text-lg font-semibold text-gray-900">— Senga Trésor</p>
                    <p class="text-sm text-gray-600">Founder, Mashariki Arts Academy</p>
                </div>
                <div class="order-1 lg:order-2 relative fade-in-up">
                    <img src="{{ asset('academy/images/tesor1.jpeg') }}" alt="Senga Trésor, Founder" class="rounded-xl shadow-elevated hover-lift">
                    <div class="absolute -bottom-4 sm:-bottom-6 -right-4 sm:-right-6 w-32 sm:w-48 h-32 sm:h-48 bg-gray-900 rounded-xl -z-10"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Who We Are Section -->
    <section class="bg-warm-white py-12 sm:py-16 md:py-20 relative overflow-hidden">
        <!-- Decorative shapes -->
        <div class="floating-shape floating-shape-1"></div>
        <div class="gradient-overlay"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 sm:gap-12 lg:gap-16 items-center mb-12 sm:mb-16 md:mb-20 fade-in-up">
                <div>
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4 sm:mb-6">Who We Are</h2>
                    <div class="space-y-3 sm:space-y-4 text-sm sm:text-base text-gray-600 leading-relaxed">
                        <p>
                            Mashariki Arts Academy is a professional film and creative training institution dedicated to nurturing Africa's next generation of storytellers.
                        </p>
                        <p>
                            Based in Rwanda and accredited by the Rwanda TVET Board (RTB), the Academy offers intensive, practice-driven training that blends African storytelling traditions with global production standards. Our mission is to equip emerging creatives with the technical skills, creative confidence, and industry exposure needed to thrive in today's creative economy.
                        </p>
                        <p>
                            Through hands-on learning, mentorship from local and international professionals, and real production experience, Mashariki Arts Academy prepares students not only to tell powerful stories but to build sustainable creative careers across Africa and beyond.
                        </p>
                        <p class="font-semibold text-gray-900">
                            We believe Africa's stories matter, and the future of global cinema depends on African voices that are skilled, confident, and industry-ready.
                        </p>
                    </div>
                </div>
                <div class="relative fade-in-up">
                    <img src="{{ asset('academy/images/IMG_1940.PNG') }}" alt="Creative team working" class="rounded-xl shadow-elevated hover-lift">
                    <div class="absolute -bottom-4 sm:-bottom-6 -left-4 sm:-left-6 w-32 sm:w-48 h-32 sm:h-48 bg-gray-900 rounded-xl -z-10"></div>
                </div>
            </div>

            <!-- Impact Stats -->
            <div class="grid grid-cols-2 lg:grid-cols-3 gap-6 mb-12 sm:mb-16 md:mb-20">
                <div class="bg-white p-6 rounded-xl shadow-elevated text-center stagger-item">
                    <div class="text-4xl sm:text-5xl font-bold text-gray-900 mb-2">11+</div>
                    <p class="text-gray-600 text-sm sm:text-base">Years of Impact</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-elevated text-center stagger-item">
                    <div class="text-4xl sm:text-5xl font-bold text-gray-900 mb-2">5,000+</div>
                    <p class="text-gray-600 text-sm sm:text-base">Creatives Trained</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-elevated text-center stagger-item col-span-2 lg:col-span-1">
                    <div class="text-4xl sm:text-5xl font-bold text-gray-900 mb-2">150+</div>
                    <p class="text-gray-600 text-sm sm:text-base">Projects Created</p>
                </div>
            </div>

            <!-- Mission and Vision -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8 mb-12 sm:mb-16 md:mb-20">
                <div class="bg-gray-900 rounded-xl sm:rounded-2xl p-8 sm:p-10 text-white shadow-elevated fade-in-up">
                    <h2 class="text-2xl sm:text-3xl font-bold mb-4">Our Mission</h2>
                    <p class="text-base sm:text-lg text-gray-300 leading-relaxed">
                        To build Africa's creative capacity by training, mentoring, and empowering filmmakers and creatives with practical skills, professional discipline, and global exposure; strengthening Africa's creative economy through storytelling, innovation, and collaboration.
                    </p>
                </div>
                <div class="bg-gray-900 rounded-xl sm:rounded-2xl p-8 sm:p-10 text-white shadow-elevated fade-in-up">
                    <h2 class="text-2xl sm:text-3xl font-bold mb-4">Our Vision</h2>
                    <p class="text-base sm:text-lg text-gray-300 leading-relaxed">
                        To become a leading African center of excellence for film and creative training, shaping globally competitive creatives who tell authentic African stories and contribute meaningfully to the continent's cultural, social, and economic transformation.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- What Makes Us Different -->
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

        <!-- Curved divider at bottom -->
        <div class="curve-divider">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="#ffffff"></path>
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
            <h2 class="text-3xl sm:text-4xl font-bold text-center text-gray-900 mb-8 sm:mb-12 md:mb-16 fade-in-up">What Makes Us Different</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8">
                <div class="bg-white p-6 sm:p-8 rounded-xl shadow-elevated hover-lift stagger-item">
                    <div class="w-12 h-12 sm:w-16 sm:h-16 bg-gray-900 rounded-xl mb-3 sm:mb-4 flex items-center justify-center">
                        <svg class="w-6 h-6 sm:w-8 sm:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-2 sm:mb-3">Practice First, Not Theory Heavy</h3>
                    <p class="text-sm sm:text-base text-gray-600">Our programs are hands-on and project-based. Every student graduates with a professionally produced short film and real production experience.</p>
                </div>
                <div class="bg-white p-6 sm:p-8 rounded-xl shadow-elevated hover-lift stagger-item">
                    <div class="w-12 h-12 sm:w-16 sm:h-16 bg-gray-900 rounded-xl mb-3 sm:mb-4 flex items-center justify-center">
                        <svg class="w-6 h-6 sm:w-8 sm:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-2 sm:mb-3">African Stories, Global Standards</h3>
                    <p class="text-sm sm:text-base text-gray-600">We ground our training in African narratives while teaching workflows and ethics aligned with international film industries and festivals.</p>
                </div>
                <div class="bg-white p-6 sm:p-8 rounded-xl shadow-elevated hover-lift stagger-item">
                    <div class="w-12 h-12 sm:w-16 sm:h-16 bg-gray-900 rounded-xl mb-3 sm:mb-4 flex items-center justify-center">
                        <svg class="w-6 h-6 sm:w-8 sm:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-2 sm:mb-3">Recognized & Credible Training</h3>
                    <div class="text-sm sm:text-base text-gray-600 space-y-2">
                        <p>• RTB-approved certification</p>
                        <p>• Possible co-signed certificates with partner institutions</p>
                        <p>• Trusted by local and international cultural organizations</p>
                    </div>
                </div>
                <div class="bg-white p-6 sm:p-8 rounded-xl shadow-elevated hover-lift stagger-item">
                    <div class="w-12 h-12 sm:w-16 sm:h-16 bg-gray-900 rounded-xl mb-3 sm:mb-4 flex items-center justify-center">
                        <svg class="w-6 h-6 sm:w-8 sm:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-2 sm:mb-3">Career-Focused Outcomes</h3>
                    <p class="text-sm sm:text-base text-gray-600 mb-3">Top graduates access:</p>
                    <div class="text-sm sm:text-base text-gray-600 space-y-2">
                        <p>• Internships with partner organizations</p>
                        <p>• Film residencies across Africa</p>
                        <p>• Project development support through Mashariki Productions</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Approach to Learning -->
    <section class="bg-white py-12 sm:py-16 md:py-20 relative overflow-hidden">
        <div class="gradient-overlay"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
            <h2 class="text-3xl sm:text-4xl font-bold text-center text-gray-900 mb-8 sm:mb-12 fade-in-up">Our Approach to Learning</h2>
            <div class="max-w-3xl mx-auto text-center mb-12 fade-in-up">
                <p class="text-base sm:text-lg text-gray-600 leading-relaxed mb-6">
                    At Mashariki Arts Academy, learning is collaborative, immersive, and industry-oriented. Students work individually and in teams, guided by professionals who actively work in film and creative industries.
                </p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 sm:gap-8">
                <div class="text-center stagger-item">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 bg-gray-900 rounded-full mx-auto mb-4 flex items-center justify-center shadow-elevated">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h4 class="font-semibold text-gray-900 text-sm sm:text-base">Technical Excellence</h4>
                </div>
                <div class="text-center stagger-item">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 bg-gray-900 rounded-full mx-auto mb-4 flex items-center justify-center shadow-elevated">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                        </svg>
                    </div>
                    <h4 class="font-semibold text-gray-900 text-sm sm:text-base">Creative Discipline</h4>
                </div>
                <div class="text-center stagger-item">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 bg-gray-900 rounded-full mx-auto mb-4 flex items-center justify-center shadow-elevated">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h4 class="font-semibold text-gray-900 text-sm sm:text-base">Collaboration & Leadership</h4>
                </div>
                <div class="text-center stagger-item">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 bg-gray-900 rounded-full mx-auto mb-4 flex items-center justify-center shadow-elevated">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h4 class="font-semibold text-gray-900 text-sm sm:text-base">Professional Ethics</h4>
                </div>
            </div>
            <div class="max-w-2xl mx-auto mt-12 text-center fade-in-up">
                <p class="text-base sm:text-lg text-gray-700 font-semibold">
                    This approach ensures graduates are job-ready, festival-ready, and future-ready.
                </p>
            </div>
        </div>
    </section>

    <!-- Who We Serve -->
    <section class="bg-accent-cream py-12 sm:py-16 md:py-20 relative overflow-hidden">
        <div class="gradient-overlay"></div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 relative z-10 text-center">
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-8 fade-in-up">Who We Serve</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 fade-in-up">
                <div class="bg-white p-6 rounded-xl shadow-elevated">
                    <p class="text-gray-700">Emerging African filmmakers</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-elevated">
                    <p class="text-gray-700">Aspiring creatives and storytellers</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-elevated">
                    <p class="text-gray-700">Youth and professionals seeking career transitions into film</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-elevated">
                    <p class="text-gray-700">Creatives committed to building Africa's creative industries</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Commitment to Creative Economy -->
    <section class="bg-white py-12 sm:py-16 md:py-20 relative overflow-hidden">
        <div class="gradient-overlay"></div>
        <div class="max-w-6xl mx-auto px-4 sm:px-6 relative z-10">
            <h2 class="text-3xl sm:text-4xl font-bold text-center text-gray-900 mb-6 fade-in-up">Our Commitment to the Creative Economy</h2>
            <p class="text-lg text-center text-gray-600 mb-12 max-w-3xl mx-auto fade-in-up">
                Mashariki Arts Academy is more than a school—it is a creative ecosystem builder.
            </p>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">
                <div class="text-center stagger-item">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 bg-gray-900 rounded-full mx-auto mb-4 flex items-center justify-center shadow-elevated">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h4 class="font-semibold text-gray-900 text-sm sm:text-base">Job Creation</h4>
                </div>
                <div class="text-center stagger-item">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 bg-gray-900 rounded-full mx-auto mb-4 flex items-center justify-center shadow-elevated">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                        </svg>
                    </div>
                    <h4 class="font-semibold text-gray-900 text-sm sm:text-base">Cultural Preservation</h4>
                </div>
                <div class="text-center stagger-item">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 bg-gray-900 rounded-full mx-auto mb-4 flex items-center justify-center shadow-elevated">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h4 class="font-semibold text-gray-900 text-sm sm:text-base">Creative Entrepreneurship</h4>
                </div>
                <div class="text-center stagger-item">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 bg-gray-900 rounded-full mx-auto mb-4 flex items-center justify-center shadow-elevated">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h4 class="font-semibold text-gray-900 text-sm sm:text-base">Film Industry Growth</h4>
                </div>
            </div>
            <p class="text-center text-gray-600 text-base sm:text-lg fade-in-up">
                Our programs are open to all nationalities, with a strong focus on African talent.
            </p>
        </div>
    </section>
    <!-- Board of Directors Section -->
    <section class="bg-accent-cream py-12 sm:py-16 md:py-20 relative overflow-hidden"
             x-data="{ modalOpen: false, modalTitle: '', modalBio: '' }"
             @open-bio.window="modalTitle = $event.detail.title; modalBio = $event.detail.bio; modalOpen = true">

        <div class="floating-shape floating-shape-3"></div>
        <div class="gradient-overlay"></div>

        <div class="curve-divider-top">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" fill="#ffffff"></path>
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
            <div class="text-center mb-8 sm:mb-12 md:mb-16 fade-in-up">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-3 sm:mb-4">Board of Directors</h2>
                <p class="text-sm sm:text-base text-gray-600 max-w-3xl mx-auto">
                    Meet the distinguished leaders and experts guiding Mashariki Arts Academy's mission to empower African creatives.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 sm:gap-8">
                <!-- Brad Major -->
                <div class="bg-white rounded-xl shadow-elevated hover-lift overflow-hidden stagger-item flex flex-col">
                    <img src="{{ asset('academy/images/brad_.jpeg') }}" alt="Brad Major" class="w-full h-64 object-cover">
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-1">Brad Major</h3>
                        <p class="text-sm text-gray-600 font-semibold mb-3">Board Member, Australia</p>
                        <div class="text-sm text-gray-600 leading-relaxed space-y-3 flex-grow">
                            <p>Australian producer with experience at Working Title Films, production on Deep Sea Challenge (James Cameron), and development at Lightstream Pictures.</p>
                        </div>
                        <button @click="$dispatch('open-bio', { title: 'Brad Major', bio: `<p>Australian Producer, Brad Major joined Working Title Films in Sydney (2010-2012) where he learnt from one of the most successful production companies in the world.</p><p>Brad produced the short film Ronan’s Escape with A.J. Carter, and after its success internationally, they turned their attention to 3D filmmaking, which led Brad to develop (in partnership with Screen-west) a series of 3D seminars.</p><p>Brad later met Australian Producer Brett Popplewell which led to Brad working as a Production Manager on Deep Sea Challenge alongside James Cameron.</p><p>Since Deep Sea Challenge, Brad has continued to collaborate with Brett on numerous projects.</p><p>In 2016/17 Brad was engaged at Icon Film Distribution reporting to the CEO, Greg Hughes. It is here Brad learnt valuable lessons in marketing, distribution, and project acquisition.</p><p>After leaving Icon, Brad was engaged to oversee development for Paul Currie’s Lightstream Pictures (Hacksaw Ridge, 2:22, & Blacklight, Better Man). Brad was responsible for evaluating a projects potential for the international market and working with writer(s) and director(s) to get the scripts production ready.</p>` })"
                                class="mt-4 self-start text-gray-900 font-semibold hover:text-gray-700 text-sm flex items-center">
                            Read Full Bio
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                </div>

                <!-- Dr. ZHANG Yong -->
                <div class="bg-white rounded-xl shadow-elevated hover-lift overflow-hidden stagger-item flex flex-col">
                    <img src="{{ asset('academy/images/zhang.jpeg') }}" alt="Dr. ZHANG Yong" class="w-full h-64 object-cover">
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-1">Dr. ZHANG Yong</h3>
                        <p class="text-sm text-gray-600 font-semibold mb-3">Board Member, China</p>
                        <div class="text-sm text-gray-600 leading-relaxed space-y-3 flex-grow">
                            <p>Vice Director and Doctoral Supervisor at Zhejiang University, pioneer in African Film Studies and China-Africa film relations.</p>
                        </div>
                        <button @click="$dispatch('open-bio', { title: 'Dr. ZHANG Yong', bio: `<p>Dr. ZHANG Yong is a vice director and a Doctoral Supervisor at Zhejiang University. He is the first Chinese scholar focusing on African Film Studies as well as China-Africa Film Relations.</p><p>He has published books including African Film Studies, Uhuru: The Story of Tanzania-Zambia Railway, and Africans in China, etc.</p><p>He is also a documentary film director. His film works include: Africans in Yiwu, TAZARA: A Journey Without an End, Bobby’s Factory. These films have been translated into English, French, Swahili, Hausa Language versions, and broadcasted in African countries.</p>` })"
                                class="mt-4 self-start text-gray-900 font-semibold hover:text-gray-700 text-sm flex items-center">
                            Read Full Bio
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                </div>

                <!-- Prof. Martin Mhando -->
                <div class="bg-white rounded-xl shadow-elevated hover-lift overflow-hidden stagger-item flex flex-col">
                    <img src="{{ asset('academy/images/prof.jpg') }}" alt="Prof Martin Mhando" class="w-full h-64 object-cover">
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-1">Prof. Martin Mhando</h3>
                        <p class="text-sm text-gray-600 font-semibold mb-3">Board Member, Tanzania/Australia</p>
                        <div class="text-sm text-gray-600 leading-relaxed space-y-3 flex-grow">
                            <p>Renowned scholar and expert in African cinema. Research Fellow at Murdoch University, founder/chair of Film Lab Zanzibar, mentor in African film training programs.</p>
                        </div>
                    </div>
                </div>

                <!-- Fabrizio Colombo -->
                <div class="bg-white rounded-xl shadow-elevated hover-lift overflow-hidden stagger-item flex flex-col">
                    <img src="{{ asset('academy/images/fabrizio.jpg') }}" alt="Fabrizio Colombo" class="w-full h-64 object-cover">
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-1">Fabrizio Colombo</h3>
                        <p class="text-sm text-gray-600 font-semibold mb-3">Artistic Director, Mashariki African Film Festival | Board Member, Italy</p>
                        <div class="text-sm text-gray-600 leading-relaxed space-y-3 flex-grow">
                            <p>25+ years in audiovisual communication and cultural development. Artistic Director of Mashariki African Film Festival since 2019.</p>
                        </div>
                        <button @click="$dispatch('open-bio', { title: 'Fabrizio Colombo', bio: `<p>Fabrizio Colombo is an artistic director, producer, and media trainer with over 25 years of experience in audiovisual communication, cultural development, and intercultural dialogue across Europe and Africa. He specializes in using media and cinema for education, social empowerment, and community building, with a strong focus on African and Afro-diasporic expressions.</p><p>Since 2019, he has served as Artistic Director of the Mashariki African Film Festival in Kigali, Rwanda, and the Afrobrix Festival in Italy—platforms dedicated to promoting African and Afro-descendant cinema while building transnational networks. He is also Executive Vice-President of CREC International (Lyon, France), where he leads media training, cultural cooperation, and community media initiatives.</p><p>Previously, Colombo directed the Zanzibar International Film Festival (ZIFF) from 2016 to 2018 and served as a consultant for FESPACO (Burkina Faso) on behalf of the European Commission. He was Artistic Director of the African Cinema Festival of Verona, founder of Afriradio.it, and led audiovisual education and community radio projects in Chad and Italy.</p><p>With extensive experience as a media trainer and facilitator (over a decade with CREC International and various institutions), his expertise spans radio journalism, audiovisual production, film programming, and intercultural facilitation. He frequently serves as a jury member at international festivals and speaks at academic/professional events.</p><p>His background blends humanities, music, and psychosocial studies (with training in the UK and France), and as a musician/composer, he integrates artistic expression into education and community work. He has received awards including the Guglielmo Zucconi International Prize for youth empowerment through media and the Chairman Award from ZIFF. Fluent in Italian, English, and French.</p>` })"
                                class="mt-4 self-start text-gray-900 font-semibold hover:text-gray-700 text-sm flex items-center">
                            Read Full Bio
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                </div>

                <!-- Andrew Milner -->
                <div class="bg-white rounded-xl shadow-elevated hover-lift overflow-hidden stagger-item flex flex-col">
                    <img src="{{ asset('academy/images/milner.jpeg') }}" alt="Andrew Milner" class="w-full h-64 object-cover">
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-1">Andrew Milner</h3>
                        <p class="text-sm text-gray-600 font-semibold mb-3">Award Winning Cinematographer, Australia</p>
                        <div class="text-sm text-gray-600 leading-relaxed space-y-3 flex-grow">
                            <p>Australian cinematographer and director of photography with credits in film, television, commercials, and short films.</p>
                        </div>
                    </div>
                </div>

                <!-- Mike Perreault -->
                <div class="bg-white rounded-xl shadow-elevated hover-lift overflow-hidden stagger-item flex flex-col">
                    <img src="{{ asset('academy/images/mike.jpeg') }}" alt="Mike Perreault" class="w-full h-64 object-cover">
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-1">Mike Perreault</h3>
                        <p class="text-sm text-gray-600 font-semibold mb-3">Executive Director, Maine Film Center | Board Member, USA</p>
                        <div class="text-sm text-gray-600 leading-relaxed space-y-3 flex-grow">
                            <p>Leads Maine Film Center and Maine International Film Festival (MIFF). Expert in film exhibition, festival leadership, and cultural exchange programs.</p>
                        </div>
                        <button @click="$dispatch('open-bio', { title: 'Mike Perreault', bio: `<p>Mike Perreault is the Executive Director of the Maine Film Center in Waterville, Maine, where he oversees strategy, operations, and programming for the organization, including the annual Maine International Film Festival (MIFF)—a ten-day event showcasing approximately 100 films from around the world.</p><p>With a diverse background in film exhibition, festival leadership, arts administration, and higher education, Perreault has built strong international partnerships and developed innovative programs that promote education, community engagement, and cultural exchange through cinema. Under his leadership, the Maine Film Center continues to serve as a vibrant year-round hub for independent film, education, and community building since its roots as Railroad Square Cinema in 1978.</p><p>He has been recognized for his contributions, including being named the 2022 Emerging Leader of the Year by the Central Maine Growth Council and KV Connect. Perreault actively participates in global film networks, attending major festivals like Sundance and Berlinale, and has engaged in cross-cultural dialogues (including discussions with leaders from African film initiatives like Mashariki African Film Festival).</p><p>His work emphasizes the power of film to enrich communities, foster dialogue, and support emerging voices in cinema, aligning closely with Mashariki Arts Academy's mission to empower creatives through sustainable cultural ecosystems.</p>` })"
                                class="mt-4 self-start text-gray-900 font-semibold hover:text-gray-700 text-sm flex items-center">
                            Read Full Bio
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                </div>

                <!-- Anny Tubbs -->
                <div class="bg-white rounded-xl shadow-elevated hover-lift overflow-hidden stagger-item flex flex-col">
                    <img src="{{ asset('academy/images/anny.jpeg') }}" alt="Anny Tubbs" class="w-full h-64 object-cover">
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-1">Anny Tubbs</h3>
                        <p class="text-sm text-gray-600 font-semibold mb-3">Documentary Filmmaker & Producer | Board Member, Belgium</p>
                        <div class="text-sm text-gray-600 leading-relaxed space-y-3 flex-grow">
                            <p>Co-founder of First Move Productions. Former legal career; now focuses on ethical storytelling, social impact documentaries, and creative skills development.</p>
                        </div>
                        <button @click="$dispatch('open-bio', { title: 'Anny Tubbs', bio: `<p>Anny Tubbs is a Brussels-based documentary filmmaker, audiovisual producer, and co-founder of First Move Productions (established in 2020). After a 25-year career in law and corporate compliance—focusing on business integrity, ethics, and global advisory—she pivoted to multimedia at age 50 to champion ethical storytelling, social impact, and human-centered narratives.</p><p>Her work centers on environmental and social issues, inclusive digital/creative skills development, adult learning, and international collaboration. Through First Move Productions, she directs thoughtful documentaries and multimedia content that inform, inspire, and spark conversation—often blending advocacy with innovative ESG-related initiatives.</p><p>Notable films include *Trapped By Plastic* (2021), *Here We Are* (2021), *Who Speaks For The Butterflies?* (2022), and *Less Walls (A Brussels Love Story)* (2023)—the latter earning multiple festival selections for its exploration of cultural unity and migration. Her films have screened at international festivals and been featured in European institutions' programs.</p><p>Anny is a passionate advocate for using film and media to give voice to underrepresented stories and foster cross-cultural dialogue. She has spoken at events including masterclasses at the Mashariki African Film Festival (MAAFF), where she shared expertise on documentary filmmaking. Her background in law, combined with film training (including studies in communications), enables her to bridge ethical governance with creative advocacy—aligning strongly with Mashariki Arts Academy's mission to empower inclusive, sustainable creative ecosystems.</p>` })"
                                class="mt-4 self-start text-gray-900 font-semibold hover:text-gray-700 text-sm flex items-center">
                            Read Full Bio
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                </div>

                <!-- Recheal Wainaina -->
                <div class="bg-white rounded-xl shadow-elevated hover-lift overflow-hidden stagger-item flex flex-col">
                    <img src="{{ asset('academy/images/rachael.jpeg') }}" alt="Recheal Wainaina" class="w-full h-64 object-cover">
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-1">Recheal Wainaina</h3>
                        <p class="text-sm text-gray-600 font-semibold mb-3">Founder, Youth Film Platform Africa</p>
                        <div class="text-sm text-gray-600 leading-relaxed space-y-3 flex-grow">
                            <p>Filmmaker, producer, Mandela Washington Fellow 2014, communication specialist, and digital creator empowering young African storytellers.</p>
                        </div>
                        <button @click="$dispatch('open-bio', { title: 'Recheal Wainaina', bio: `<p>Recheal Wainaina is a filmmaker, producer, director, and communication specialist with over 13 years in the Kenyan and international film industry. She is the Founder and CEO of Youth Film Platform Africa, a key initiative empowering young African storytellers through training, production, and exhibition opportunities.</p><p>As a 2014 Mandela Washington Fellow, she has been a strong advocate for youth in creative industries. She studied at the University of Notre Dame (USA) and the East African School of Journalism, and has served as a lecturer at Shangtao Media Arts College. Her work focuses on storytelling, capacity building, and creating platforms for emerging talent across Africa.</p><p>She is also a digital creator and adventurer, using film to drive social change and cultural representation.</p>` })"
                                class="mt-4 self-start text-gray-900 font-semibold hover:text-gray-700 text-sm flex items-center">
                            Read Full Bio
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-elevated hover-lift overflow-hidden stagger-item flex flex-col">
                    <img src="{{ asset('academy/images/jeniffer.jpeg') }}" alt="Jenifer Neza" class="w-full h-64 object-cover">
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-1">Jenifer Neza</h3>
                        <p class="text-sm text-gray-600 font-semibold mb-3">Co-Founder, Mashariki Pictures | Executive Producer & Film Producer | Bachelors in Finance</p>
                        <div class="text-sm text-gray-600 leading-relaxed space-y-3 flex-grow">
                            <p>Co-founder of Mashariki Pictures, a dynamic production entity focused on East African storytelling. Executive producer of the TV series *Greenland*, with hands-on experience in film and television production. Blends financial expertise with creative filmmaking to bring compelling African narratives to life.</p>
                        </div>
                        <button @click="$dispatch('open-bio', { title: 'Jenifer Neza', bio: `<p>Jenifer Neza holds a Bachelor's degree in Finance and is an accomplished film producer with a passion for African cinema. She is the co-founder of Mashariki Pictures, a production company dedicated to creating impactful stories from an East African perspective.</p><p>As executive producer, she has been instrumental in the development and production of the TV series *Greenland*, contributing to its vision and execution. Her work emphasizes high-quality storytelling, production management, and bridging finance with creative industries.</p><p>Jenifer's background combines strong financial acumen with practical experience in film production, enabling her to navigate budgets, partnerships, and distribution effectively in the growing East African film landscape. Through Mashariki Pictures, she continues to support emerging talents and projects that highlight regional voices and experiences.</p><p>Her contributions help elevate African narratives on local and international stages, fostering innovation in film and television across Rwanda, Kenya, and beyond.</p>` })"
                                class="mt-4 self-start text-gray-900 font-semibold hover:text-gray-700 text-sm flex items-center">
                            Read Full Bio
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-elevated hover-lift overflow-hidden stagger-item flex flex-col">
                    <img src="{{ asset('academy/images/Oge.jpg') }}" alt="Oge Obasi" class="w-full h-64 object-cover">
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-1">Oge Obasi</h3>
                        <p class="text-sm text-gray-600 font-semibold mb-3">Producer & Production Head, Fiery Film Company | Nigeria</p>
                        <div class="text-sm text-gray-600 leading-relaxed space-y-3 flex-grow">
                            <p>Over a decade in film & TV production. Key producer at Fiery Film Company for acclaimed genre films like Ojuju (Best Nigerian Film at AFRIFF), O-Town, Juju Stories (Boccalino d’Oro at Locarno), and Mami Wata (Sundance Jury Award, Nigeria's 2024 Oscar submission), with wide festival acclaim and international distribution.</p>
                        </div>
                        <button @click="$dispatch('open-bio', { title: 'Oge Obasi', bio: `<p>Oge Obasi has production experience spanning over a decade, working on TV and film projects such as The Figurine, Amstel Malta Box Office, Miss Earth Nigeria, Heineken's Champion's Planet, Desperate Housewives Africa, and MTV Base Shuga in roles as production coordinator and manager.</p><p>She is partner and production head at Fiery Film Company, founded in 2012 by filmmaker C.J. Obasi to create genre-based films from an African perspective. She produced the zero-budget zombie feature Ojuju, which won Best Nigerian Film at AFRIFF 2014, screened at Fantasia, Africa in Motion, and nearly 20 other festivals, and was optioned for series by a major Hollywood studio. She also produced the semi-autobiographical gangster saga O-Town, an official selection at Göteborg Film Festival, with 3 nominations at the 2016 Africa Movie Academy Awards (winning Achievement in Soundtrack).</p><p>Through Fiery Film, she executive produced “Bruja” in the anthology Visions by Surreal16 collective (Abba T. Makama, C.J. Obasi, Michael Omonua), challenging Nollywood narratives.</p><p>She produced Hello, Rain (based on Nnedi Okorafor's Hello, Moto), which premiered at Oberhausen (Oscar-qualifying), won Special Mention at Fantasia, and was nominated at BFI London Film Festival 2018.</p><p>She produced Juju Stories, premiering in Locarno's International Competition (winning Boccalino d’Oro for Best Film), screening at BFI London, FESPACO, Indie Memphis, AFRIFF (Best Director award), and theatrically released across 12 African countries by CanalOlympia and in Nigeria by FilmOne.</p><p>Her latest is Mami Wata, a female-driven supernatural thriller on West African Mermaid Goddess folklore, directed by C.J. Obasi. Developed at Ouaga Film Lab, EAVE, Le Groupe Ouest, Durban Film Mart; presented at Final Cut Venice and Yennenga FESPACO (Post-Production Grant from Red Sea and Visions Sud Est). Premiered at Sundance (Special Jury Award for Cinematography), with awards/nominations including Independent Spirit and NAACP Image Awards. Distributed theatrically/SVOD in North America, UK/Ireland, Switzerland/Liechtenstein, Germany/Austria, BENELUX, Brazil, France, Australia, and more. Nigeria’s official 2024 Oscar submission.</p>` })"
                                class="mt-4 self-start text-gray-900 font-semibold hover:text-gray-700 text-sm flex items-center">
                            Read Full Bio
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-elevated hover-lift overflow-hidden stagger-item flex flex-col">
                    <img src="{{ asset('academy/images/cj.jpg') }}" alt="C.J. Obasi" class="w-full h-64 object-cover"> <!-- Alternative strong portrait; swap with another if preferred, e.g., from IMDb or Instagram previews -->
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-1">C.J. Obasi</h3>
                        <p class="text-sm text-gray-600 font-semibold mb-3">Writer, Director & Filmmaker, Fiery Film Company | Nigeria</p>
                        <div class="text-sm text-gray-600 leading-relaxed space-y-3 flex-grow">
                            <p>Known as “Fiery” or “The Fiery One.” Award-winning director of genre films Ojuju (IndieWire Best Zombie Films list), O-Town, Hello, Rain, Juju Stories (Boccalino d’Oro at Locarno, Amazon Prime), and Mami Wata (Sundance Jury Cinematography Award, Independent Spirit/NAACP noms, Nigeria's 2024 Oscar entry). Co-founder of Surreal16 Collective; Academy (Oscars) voting member.</p>
                        </div>
                        <button @click="$dispatch('open-bio', { title: 'C.J. Obasi', bio: `<p>C.J. Obasi, known as “Fiery” or “The Fiery One,” wrote and directed features Ojuju and O-Town, screened at festivals like Göteborg and Fantasia, acclaimed by Screen Anarchy, IndieWire, and The Hollywood Reporter. Won African Movie Academy Awards and Trailblazer at Africa Magic Viewers Choice Awards (AMVCA). Ojuju listed in IndieWire’s Best Zombie Films of All Time. Short Hello, Rain premiered at Oberhausen, screened in 30+ festivals (Special Mention at Fantasia, Short Film Award nom at BFI London 2018). In 2016, co-founded Surreal16 Collective with Abba T. Makama and Michael Omonua to challenge Nollywood norms; their anthology Juju Stories won Boccalino d’Oro at Locarno and acquired by Amazon Prime Video.</p><p>Latest work Mami Wata premiered at Sundance 2023 (Jury Award for Cinematography), FESPACO (Best Image, Best Décor, African Critics Prize); nominated Independent Spirit and NAACP Image Awards. Nigeria's official Academy Awards entry. Acquired by Mubi; distributed theatrically/SVOD/Blu-ray/DVD in 25+ territories including US, UK, Germany, Switzerland, France, Brazil, Australia.</p><p>Invited by Rockefeller Foundation for Bellagio Residency at Lake Como, Italy, with project La Pyramide: A Celebration of Dark Bodies. Voting member of the Academy of Motion Picture Arts and Sciences (Oscars).</p><p><strong>Filmography:</strong></p><ul><li>Ojuju (2014) – feature (Writer, Director)</li><li>O-Town (2015) – feature (Writer, Director)</li><li>Visions (2017) – short (Co-Writer, Co-Director)</li><li>Hello, Rain (2018) – short (Writer, Director)</li><li>Juju Stories (2021) – feature (Co-Writer, Co-Director)</li><li>Mami Wata (2023) – feature (Writer, Director)</li></ul>` })"
                                class="mt-4 self-start text-gray-900 font-semibold hover:text-gray-700 text-sm flex items-center">
                            Read Full Bio
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                </div>

                <!-- Add remaining board members here with similar structure when you have details/images -->
                <!-- Example: Faridah Mhando -->
                <!-- <div class="bg-white ..."> ... </div> -->

            </div>

            <!-- Academy Administration -->
            <div class="mt-16 md:mt-20">
                <h3 class="text-2xl sm:text-3xl font-bold text-center text-gray-900 mb-8 fade-in-up">Academy Administration</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                    <!-- Dean -->
                    <div class="bg-white rounded-xl shadow-elevated hover-lift overflow-hidden stagger-item flex flex-col items-center text-center p-6">
                        <img src="{{ asset('academy/images/prof.jpg') }}" alt="Prof. Martin Mhando" class="w-32 h-32 sm:w-40 sm:h-40 rounded-full object-cover mb-4 shadow-md border-4 border-gray-100">
                        <h4 class="text-xl font-bold text-gray-900 mb-1">Dean</h4>
                        <p class="text-lg font-semibold text-gray-800">Prof. Martin Mhando</p>
                        <p class="text-sm text-gray-600 mt-2">Renowned Tanzanian filmmaker, academic, and festival director</p>
                    </div>

                    <!-- Director/Principal -->
                    <div class="bg-white rounded-xl shadow-elevated hover-lift overflow-hidden stagger-item flex flex-col items-center text-center p-6">
                        <img src="{{ asset('academy/images/tresor.jpg') }}" alt="Tresor Senga" class="w-32 h-32 sm:w-40 sm:h-40 rounded-full object-cover mb-4 shadow-md border-4 border-gray-100">
                        <h4 class="text-xl font-bold text-gray-900 mb-1">Director/Principal</h4>
                        <p class="text-lg font-semibold text-gray-800">Tresor Senga</p>
                        <p class="text-sm text-gray-600 mt-2">Founder & Executive Director, Mashariki African Film Festival</p>
                    </div>

                    <!-- Deputy Principal -->
                    <div class="bg-white rounded-xl shadow-elevated hover-lift overflow-hidden stagger-item flex flex-col items-center text-center p-6">
                        <img src="{{ asset('academy/images/clemence.jpeg') }}" alt="Clemence Nahimana" class="w-32 h-32 sm:w-40 sm:h-40 rounded-full object-cover mb-4 shadow-md border-4 border-gray-100">
                        <h4 class="text-xl font-bold text-gray-900 mb-1">Deputy Principal</h4>
                        <p class="text-lg font-semibold text-gray-800">Clemence Nahimana</p>
                        <p class="text-sm text-gray-600 mt-2">Director, Writer, Producer, and Actress in Rwandan film & comedy</p>
                        <p class="text-sm text-gray-600 mt-2">Bachelor of Education Option :Education -English-Drama</p>
                    </div>

                    <!-- Academic Lead -->
                    <div class="bg-white rounded-xl shadow-elevated hover-lift overflow-hidden stagger-item flex flex-col items-center text-center p-6">
                        <img src="{{ asset('academy/images/manu.jpeg') }}" alt="Emmanuel Amimo" class="w-32 h-32 sm:w-40 sm:h-40 rounded-full object-cover mb-4 shadow-md border-4 border-gray-100">
                        <h4 class="text-xl font-bold text-gray-900 mb-1">Academic Lead</h4>
                        <p class="text-lg font-semibold text-gray-800">Emmanuel Amimo</p>
                        <p class="text-sm text-gray-600 mt-2">Filmmaker, Cameraman, Editor, and Producer (FilmLab Kenya / Dynamic Pictures)</p>
                        <p class="text-sm text-gray-600 mt-2">Bachelor of Arts, CommunicationElectronic Media, 06/2011 Daystar University</p>
                    </div>

                    <!-- Registrar/Admin/Finance -->
                    <div class="bg-white rounded-xl shadow-elevated hover-lift overflow-hidden stagger-item flex flex-col items-center text-center p-6">
                        <img src="{{ asset('academy/images/anasto.jpeg') }}" alt="Anastace Nsengiyumva" class="w-32 h-32 sm:w-40 sm:h-40 rounded-full object-cover mb-4 shadow-md border-4 border-gray-100">
                        <h4 class="text-xl font-bold text-gray-900 mb-1">Registrar/Admin/Finance</h4>
                        <p class="text-lg font-semibold text-gray-800">Anastace Nsengiyumva</p>
                        <p class="text-sm text-gray-600 mt-2">Administrative and finance professional supporting creative education initiatives</p>
                        <p class="text-sm text-gray-600 mt-2">  Bachelors of science Economics science and management ;information system and Management, Masters in Business Administration and Finance  </p>
                    </div>

                    <!-- Student Support and Compliance -->
                    <div class="bg-white rounded-xl shadow-elevated hover-lift overflow-hidden stagger-item flex flex-col items-center text-center p-6">
                        <img src="{{ asset('academy/images/grace.jpg') }}" alt="Grace Uwingeneye" class="w-32 h-32 sm:w-40 sm:h-40 rounded-full object-cover mb-4 shadow-md border-4 border-gray-100">
                        <h4 class="text-xl font-bold text-gray-900 mb-1">Student Support and Compliance</h4>
                        <p class="text-lg font-semibold text-gray-800">Grace Uwingeneye</p>
                        <p class="text-sm text-gray-600 mt-2">Communication Officer, Event Host, and Digital Content Creator at Mashariki</p>
                    </div>

                    <!-- Human Resources -->
                    <div class="bg-white rounded-xl shadow-elevated hover-lift overflow-hidden stagger-item flex flex-col items-center text-center p-6">
                        <img src="{{ asset('academy/images/loic.jpeg') }}" alt="Murwanashyaka Loïc" class="w-32 h-32 sm:w-40 sm:h-40 rounded-full object-cover mb-4 shadow-md border-4 border-gray-100">
                        <h4 class="text-xl font-bold text-gray-900 mb-1">Human Resources</h4>
                        <p class="text-lg font-semibold text-gray-800">Murwanashyaka Loïc</p>
                        <p class="text-sm text-gray-600 mt-2 leading-relaxed">
                            HR professional supporting team growth, employee well-being, and talent management within the creative education and film ecosystem at Mashariki.
                        </p>
                    </div>

                    <!-- Human Resources -->
                    <div class="bg-white rounded-xl shadow-elevated hover-lift overflow-hidden stagger-item flex flex-col items-center text-center p-6">
                        <img src="{{ asset('academy/images/fabrizio_logistics.jpeg') }}" alt="Izabayo Fabrice" class="w-32 h-32 sm:w-40 sm:h-40 rounded-full object-cover mb-4 shadow-md border-4 border-gray-100">
                        <h4 class="text-xl font-bold text-gray-900 mb-1">Logistics Manager</h4>
                        <p class="text-lg font-semibold text-gray-800">Imanizabayo Fabrice</p>
                        <p class="text-sm text-gray-600 mt-2 leading-relaxed">
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <template x-if="modalOpen">
            <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
                    <!-- Overlay -->
                    <div @click="modalOpen = false" class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                    <!-- Modal panel -->
                    <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-3xl">
                        <div class="bg-gray-50 px-6 py-5 sm:px-8 border-b border-gray-200">
                            <h3 class="text-xl sm:text-2xl font-bold text-gray-900" x-text="modalTitle" id="modal-title"></h3>
                            <button @click="modalOpen = false" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                        <div class="px-6 py-6 sm:px-8 max-h-[70vh] overflow-y-auto prose prose-sm sm:prose">
                            <div x-html="modalBio"></div>
                        </div>
                        <div class="bg-gray-50 px-6 py-4 sm:px-8 border-t border-gray-200 text-right">
                            <button @click="modalOpen = false" class="inline-flex justify-center rounded-md border border-transparent bg-gray-900 px-6 py-2.5 text-sm font-medium text-white hover:bg-gray-800">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </section>
    <!-- Call to Action -->
    <section class="relative bg-gray-900 text-white py-12 sm:py-16 md:py-20 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=1600&q=80" alt="Conference" class="w-full h-full object-cover">
        </div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 text-center">
            <h2 class="text-3xl sm:text-4xl font-bold mb-6 fade-in-up">Start Your Journey with Mashariki Arts Academy</h2>
            <p class="text-lg sm:text-xl text-gray-300 mb-8 sm:mb-12 fade-in-up">
                Become part of Africa's growing creative economy and shape stories that travel the world.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center fade-in-up">
                <a href="{{ route('academy.contact.submit') }}" class="inline-flex items-center justify-center px-8 py-4 bg-white text-gray-900 font-semibold rounded-lg hover:bg-gray-100 transition shadow-elevated">
                    Apply Now
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
                <a  target="_blank" href="/academy/sources/MasharikiArtsAcademy.pdf" class="inline-flex items-center justify-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-gray-900 transition">
                    Download Brochure
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </a>
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

        document.querySelectorAll('.fade-in-up').forEach(el => observer.observe(el));

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
