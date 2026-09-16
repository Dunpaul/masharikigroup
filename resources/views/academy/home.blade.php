@extends('layouts.app')

@section('title', 'Home - Mashariki Arts Academy')

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

    <!-- Hero Section with Sliding Background Images -->
    <section class="relative bg-gray-900 text-white overflow-hidden min-h-screen flex items-center">
        <!-- Background Image Slider -->
        <div class="absolute inset-0">
            @include('partials.page-hero')
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/50 to-black/70"></div>
        </div>

        <!-- Animated gradient accent -->
        <div class="absolute inset-0 opacity-20 pointer-events-none">
            <div class="absolute top-0 left-0 w-96 h-96 bg-purple-500 rounded-full filter blur-3xl animate-pulse"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-500 rounded-full filter blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 py-16 sm:py-24 w-full">
            <div class="text-center max-w-5xl mx-auto">
                <!-- Eyebrow text -->
                <div class="inline-block mb-6 px-6 py-2 bg-white/10 backdrop-blur-md rounded-full border border-white/20">
                <span class="text-sm sm:text-base font-semibold tracking-wider uppercase text-gray-200">
                    Mashariki Arts Academy
                </span>
                </div>

                <!-- Main Headline with gradient -->
                <h1 class="text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-bold mb-6 sm:mb-8 leading-tight">
                <span class="block bg-gradient-to-r from-white via-gray-100 to-gray-300 bg-clip-text text-transparent animate-fade-in">
                    Shaping Africa's
                </span>
                    <span class="block bg-gradient-to-r from-purple-400 via-pink-400 to-blue-400 bg-clip-text text-transparent animate-fade-in-delay">
                    Creative Future
                </span>
                </h1>

                <!-- Tagline -->
                <p class="text-xl sm:text-2xl md:text-3xl font-light text-gray-200 mb-8 sm:mb-10 max-w-3xl mx-auto leading-relaxed animate-fade-in-delay-2">
                    Creativity is heritage, voice, and vision.
                </p>

                <!-- Divider -->
                <div class="w-24 h-1 bg-gradient-to-r from-purple-400 to-blue-400 mx-auto mb-8 sm:mb-10 rounded-full"></div>

                <!-- Description -->
                <p class="text-base sm:text-lg md:text-xl text-gray-300 mb-8 sm:mb-10 max-w-4xl mx-auto leading-relaxed animate-fade-in-delay-3">
                    We nurture African artists, storytellers, and creative entrepreneurs with the skills, confidence, and global perspective needed to thrive. Through training, mentorship, and collaboration, we empower creatives to tell authentic African stories, build sustainable brands, and actively strengthen the creative economy across the continent.
                </p>

                <!-- Impact statement -->
                <p class="text-lg sm:text-xl md:text-2xl font-semibold text-white mb-10 sm:mb-12 italic tracking-wide animate-fade-in-delay-4">
                <span class="inline-block px-4 py-2 bg-white/5 backdrop-blur-sm rounded-lg border border-white/10">
                    Where culture meets innovation
                </span>
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 justify-center items-center animate-fade-in-delay-5">
                    <a href="{{ route('academy.contact') }}" class="inline-block bg-white text-gray-900 px-10 sm:px-12 py-4 sm:py-5 text-base font-bold rounded-full hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl shadow-xl">
                        GET IN TOUCH
                    </a>
                    <a href="{{ route('academy.services') }}" class="inline-block border-2 border-white text-white px-10 sm:px-12 py-4 sm:py-5 text-base font-bold rounded-full hover:bg-white hover:text-gray-900 transition-all duration-300 transform hover:scale-105">
                        EXPLORE PROGRAMS
                    </a>
                </div>

                <!-- Scroll indicator -->
                <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce hidden md:block">
                    <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in {
            animation: fade-in 0.8s ease-out forwards;
        }

        .animate-fade-in-delay {
            opacity: 0;
            animation: fade-in 0.8s ease-out 0.2s forwards;
        }

        .animate-fade-in-delay-2 {
            opacity: 0;
            animation: fade-in 0.8s ease-out 0.4s forwards;
        }

        .animate-fade-in-delay-3 {
            opacity: 0;
            animation: fade-in 0.8s ease-out 0.6s forwards;
        }

        .animate-fade-in-delay-4 {
            opacity: 0;
            animation: fade-in 0.8s ease-out 0.8s forwards;
        }

        .animate-fade-in-delay-5 {
            opacity: 0;
            animation: fade-in 0.8s ease-out 1s forwards;
        }
    </style>
    <!-- Vision Section with Images -->
    <section class="bg-warm-white py-12 sm:py-16 md:py-20 relative overflow-hidden">
        <!-- Decorative shapes -->
        <div class="floating-shape floating-shape-1"></div>
        <div class="floating-shape floating-shape-2"></div>
        <div class="gradient-overlay"></div>

        <!-- Curved divider at bottom -->
        <div class="curve-divider">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="#f5f5f4"></path>
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 sm:gap-12 lg:gap-16 items-center">
                <div class="fade-in-up">
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4 sm:mb-6">Empowering the Next Generation of African Creatives</h2>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed mb-3 sm:mb-4">
                        For over a decade, Mashariki has been at the forefront of reshaping the cultural and creative landscape of Rwanda and the African continent. What began in 2013 with the Mashariki African Film Festival has grown into a continental movement.
                    </p>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed mb-4 sm:mb-6">
                        Our work has catalyzed the careers of hundreds of young creatives, supported the professional growth of artists from over 40 countries, and contributed to policy dialogues on creative industry development.
                    </p>
                    <a href="{{ route('academy.about') }}" class="inline-flex items-center text-gray-900 font-semibold hover:text-gray-700 text-sm sm:text-base">
                        Learn More About Us
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-3 sm:gap-4 fade-in-up">
                    <img src="{{ asset('academy/images/workshop19.JPG') }}" alt="Film production" class="rounded-lg shadow-elevated hover-lift w-full">
                    <img src="{{ asset('academy/images/workshop4.jpg') }}" alt="Photography" class="rounded-lg shadow-elevated hover-lift mt-6 sm:mt-8 w-full">
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values Cards with Hover-Reveal Images -->
    <section class="bg-warm-gray py-12 sm:py-16 md:py-20 relative overflow-hidden">
        <!-- Decorative shapes -->
        <div class="floating-shape floating-shape-3"></div>
        <div class="gradient-overlay"></div>

        <!-- Curved divider at top -->
        <div class="curve-divider-top">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="#fafaf9"></path>
            </svg>
        </div>

        <!-- Curved divider at bottom -->
        <div class="curve-divider">
            <svg data-name="Layer 1" xmlns=
                "http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="#fef8f3"></path>
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
            <h2 class="text-3xl sm:text-4xl font-bold text-center text-gray-900 mb-8 sm:mb-12 fade-in-up">What Drives Us</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                <div class="bg-white rounded-xl shadow-elevated hover-lift overflow-hidden group cursor-pointer value-card stagger-item">
                    <div class="relative h-40 sm:h-48 overflow-hidden">
                        <img src="{{ asset('academy/images/workshop1.jpg') }}" alt="Purpose-Driven Growth" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 sm:p-6">
                        <h3 class="text-base sm:text-lg font-bold text-gray-900 mb-1 sm:mb-2">Purpose-Driven Growth</h3>
                        <p class="text-xs sm:text-sm text-gray-600">Businesses that contribute meaningfully to society</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-elevated hover-lift overflow-hidden group cursor-pointer value-card stagger-item">
                    <div class="relative h-40 sm:h-48 overflow-hidden">
                        <img src="{{ asset('academy/images/workshop2.jpg') }}" alt="African Excellence" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 sm:p-6">
                        <h3 class="text-base sm:text-lg font-bold text-gray-900 mb-1 sm:mb-2">African Excellence</h3>
                        <p class="text-xs sm:text-sm text-gray-600">Locally rooted, globally competitive</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-elevated hover-lift overflow-hidden group cursor-pointer value-card stagger-item">
                    <div class="relative h-40 sm:h-48 overflow-hidden">
                        <img src="{{ asset('academy/images/workshop13.JPG') }}" alt="Long-Term Value" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 sm:p-6">
                        <h3 class="text-base sm:text-lg font-bold text-gray-900 mb-1 sm:mb-2">Long-Term Value</h3>
                        <p class="text-xs sm:text-sm text-gray-600">Sustainable models over short-term gains</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-elevated hover-lift overflow-hidden group cursor-pointer value-card stagger-item">
                    <div class="relative h-40 sm:h-48 overflow-hidden">
                        <img src="{{ asset('academy/images/workshop23.jpg') }}" alt="Creative Impact" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 sm:p-6">
                        <h3 class="text-base sm:text-lg font-bold text-gray-900 mb-1 sm:mb-2">Creative Impact</h3>
                        <p class="text-xs sm:text-sm text-gray-600">Culture as an engine for development</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="bg-gray-900 text-white py-12 sm:py-16 md:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="text-center mb-10 sm:mb-16">
                <h2 class="text-3xl sm:text-4xl font-bold mb-3 sm:mb-4">Our Impact</h2>
                <p class="text-gray-300 text-base sm:text-lg">A decade of transforming Africa's creative landscape</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 sm:gap-8">
                <div class="text-center">
                    <div class="text-4xl sm:text-5xl md:text-6xl font-bold mb-2">11+</div>
                    <div class="text-xs sm:text-sm text-gray-400 uppercase tracking-wider">Years of Impact</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl sm:text-5xl md:text-6xl font-bold mb-2">40+</div>
                    <div class="text-xs sm:text-sm text-gray-400 uppercase tracking-wider">Countries Reached</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl sm:text-5xl md:text-6xl font-bold mb-2">5000+</div>
                    <div class="text-xs sm:text-sm text-gray-400 uppercase tracking-wider">Creatives Trained</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl sm:text-5xl md:text-6xl font-bold mb-2">150+</div>
                    <div class="text-xs sm:text-sm text-gray-400 uppercase tracking-wider">Projects Created</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Image Carousel Section -->
    <section class="bg-accent-cream py-12 sm:py-16 md:py-20 relative overflow-hidden">
        <!-- Decorative shapes -->
        <div class="gradient-overlay"></div>

        <!-- Curved divider at top -->
        <div class="curve-divider-top">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="#f5f5f4"></path>
            </svg>
        </div>

        <!-- Curved divider at bottom -->
        <div class="curve-divider">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" fill="#fafaf9"></path>
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
            <div class="text-center mb-8 sm:mb-12 fade-in-up">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-3 sm:mb-4">Student Showcase</h2>
                <p class="text-gray-600 text-base sm:text-lg">Explore the creative work of our talented students</p>
            </div>

            <div class="relative fade-in-up">
                <div class="carousel-container overflow-hidden rounded-xl sm:rounded-2xl shadow-elevated">
                    <div class="carousel-track flex transition-transform duration-500 ease-in-out">
                        <div class="carousel-slide flex-shrink-0 w-full px-1 sm:px-2">
                            <img src="{{ asset('academy/images/workshop1.jpg') }}" alt="Student work 1" class="w-full h-64 sm:h-80 md:h-96 object-cover">
                        </div>
                        <div class="carousel-slide flex-shrink-0 w-full px-1 sm:px-2">
                            <img src="{{ asset('academy/images/workshop9.jpg') }}" alt="Student work 2" class="w-full h-64 sm:h-80 md:h-96 object-cover">
                        </div>
                        <div class="carousel-slide flex-shrink-0 w-full px-1 sm:px-2">
                            <img src="{{ asset('academy/images/workshop16.JPG') }}" alt="Student work 3" class="w-full h-64 sm:h-80 md:h-96 object-cover">
                        </div>
                        <div class="carousel-slide flex-shrink-0 w-full px-1 sm:px-2">
                            <img src="{{ asset('academy/images/workshop20.jpg') }}" alt="Student work 4" class="w-full h-64 sm:h-80 md:h-96 object-cover">
                        </div>
                    </div>
                </div>

                <!-- Carousel Controls -->
                <button class="carousel-prev absolute left-2 sm:left-4 top-1/2 -translate-y-1/2 bg-white hover:bg-gray-50 text-gray-900 p-2 sm:p-3 md:p-4 rounded-full shadow-elevated transition z-10">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <button class="carousel-next absolute right-2 sm:right-4 top-1/2 -translate-y-1/2 bg-white hover:bg-gray-50 text-gray-900 p-2 sm:p-3 md:p-4 rounded-full shadow-elevated transition z-10">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>

                <!-- Carousel Indicators -->
                <div class="flex justify-center mt-4 sm:mt-6 gap-2">
                    <button class="carousel-indicator w-2 h-2 sm:w-3 sm:h-3 rounded-full bg-gray-900 transition shadow-sm" data-slide="0"></button>
                    <button class="carousel-indicator w-2 h-2 sm:w-3 sm:h-3 rounded-full bg-gray-300 transition shadow-sm" data-slide="1"></button>
                    <button class="carousel-indicator w-2 h-2 sm:w-3 sm:h-3 rounded-full bg-gray-300 transition shadow-sm" data-slide="2"></button>
                    <button class="carousel-indicator w-2 h-2 sm:w-3 sm:h-3 rounded-full bg-gray-300 transition shadow-sm" data-slide="3"></button>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Programs with Images -->
    <section class="bg-warm-white py-12 sm:py-16 md:py-20 relative overflow-hidden">
        <!-- Decorative shapes -->
        <div class="floating-shape floating-shape-1"></div>
        <div class="gradient-overlay"></div>

        <!-- Curved divider at top -->
        <div class="curve-divider-top">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" fill="#fef8f3"></path>
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
            <h2 class="text-3xl sm:text-4xl font-bold text-center text-gray-900 mb-8 sm:mb-12 fade-in-up">Explore Our Programs</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 sm:gap-8">
                <div class="group relative overflow-hidden rounded-xl shadow-elevated hover-lift stagger-item">
                    <img src="https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?w=600&q=80" alt="Filmmaking" class="w-full h-56 sm:h-64 object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-4 sm:p-6 text-white">
                        <h3 class="text-xl sm:text-2xl font-bold mb-1 sm:mb-2">Filmmaking</h3>
                        <p class="text-xs sm:text-sm text-gray-200">Master the art of visual storytelling</p>
                    </div>
                </div>
                <div class="group relative overflow-hidden rounded-xl shadow-elevated hover-lift stagger-item">
                    <img src="https://images.unsplash.com/photo-1626785774573-4b799315345d?w=600&q=80" alt="Design" class="w-full h-56 sm:h-64 object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-4 sm:p-6 text-white">
                        <h3 class="text-xl sm:text-2xl font-bold mb-1 sm:mb-2">Design</h3>
                        <p class="text-xs sm:text-sm text-gray-200">Create impactful visual experiences</p>
                    </div>
                </div>
                <div class="group relative overflow-hidden rounded-xl shadow-elevated hover-lift stagger-item sm:col-span-2 md:col-span-1">
                    <img src="https://images.unsplash.com/photo-1492691527719-9d1e07e534b4?w=600&q=80" alt="Photography" class="w-full h-56 sm:h-64 object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-4 sm:p-6 text-white">
                        <h3 class="text-xl sm:text-2xl font-bold mb-1 sm:mb-2">Photography</h3>
                        <p class="text-xs sm:text-sm text-gray-200">Capture moments that tell stories</p>
                    </div>
                </div>
            </div>
            <div class="text-center mt-8 sm:mt-12 fade-in-up">
                <a href="{{ route('academy.services') }}" class="inline-block bg-gray-900 text-white px-8 sm:px-10 py-3 sm:py-4 text-sm font-bold rounded-full hover:bg-gray-800 transition transform hover:scale-105 shadow-elevated">
                    VIEW ALL PROGRAMS
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="relative bg-gray-900 text-white py-12 sm:py-16 md:py-20 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?w=1600&q=80" alt="Creative team" class="w-full h-full object-cover opacity-20">
        </div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 text-center">
            <h2 class="text-3xl sm:text-4xl font-bold mb-4 sm:mb-6">Ready to Start Your Creative Journey?</h2>
            <p class="text-gray-300 mb-6 sm:mb-8 text-base sm:text-lg">Join the next generation of African creative leaders and shape the future of storytelling.</p>
            <p class="text-white text-lg font-semibold mb-6">Tuition Fee: 3,000,000 RWF (≈ $2,200 USD)</p>
            <a href="{{ route('academy.services') }}" class="inline-block bg-white text-gray-900 px-8 sm:px-10 py-3 sm:py-4 text-sm font-bold rounded-full hover:bg-gray-100 transition transform hover:scale-105">
                EXPLORE OUR PROGRAMS
            </a>
        </div>
    </section>

    <script>
        // Student Showcase Carousel functionality
        let currentSlide = 0;
        const slides = document.querySelectorAll('.carousel-slide');
        const track = document.querySelector('.carousel-track');
        const indicators = document.querySelectorAll('.carousel-indicator');
        const prevBtn = document.querySelector('.carousel-prev');
        const nextBtn = document.querySelector('.carousel-next');

        function updateCarousel() {
            track.style.transform = `translateX(-${currentSlide * 100}%)`;
            indicators.forEach((indicator, index) => {
                if (index === currentSlide) {
                    indicator.classList.remove('bg-gray-300');
                    indicator.classList.add('bg-gray-900');
                } else {
                    indicator.classList.remove('bg-gray-900');
                    indicator.classList.add('bg-gray-300');
                }
            });
        }

        nextBtn.addEventListener('click', () => {
            currentSlide = (currentSlide + 1) % slides.length;
            updateCarousel();
        });

        prevBtn.addEventListener('click', () => {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            updateCarousel();
        });

        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                currentSlide = index;
                updateCarousel();
            });
        });

        // Auto-advance carousel
        setInterval(() => {
            currentSlide = (currentSlide + 1) % slides.length;
            updateCarousel();
        }, 5000);

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
                    }, index * 100); // 100ms delay between each item
                }
            });
        }, observerOptions);

        document.querySelectorAll('.stagger-item').forEach(el => staggerObserver.observe(el));
    </script>

    @if ($partners->isNotEmpty())
        <section class="py-16 bg-[var(--brand-bg)]">
            <div class="max-w-6xl mx-auto px-6 lg:px-8">
                <h2 class="text-2xl font-medium text-center text-[#111111] mb-10">Our Partners</h2>
                <div class="flex flex-wrap items-center justify-center gap-10">
                    @foreach ($partners as $partner)
                        <img src="{{ asset('storage/'.$partner->logo_path) }}" alt="{{ $partner->name }}" class="h-14 object-contain grayscale hover:grayscale-0 transition">
                    @endforeach
                </div>
                <p class="text-center mt-8">
                    <a href="{{ route('academy.partners') }}" class="text-sm font-medium text-gray-600 hover:text-[var(--accent)] transition">See all partners →</a>
                </p>
            </div>
        </section>
    @endif

    @include('partials.footer')

@endsection
