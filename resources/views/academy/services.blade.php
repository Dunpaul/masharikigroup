@extends('layouts.app')

@section('title', 'Programs - Mashariki Arts Academy')

@section('content')

    @include('partials.navbar')
    <style>
        /* ── Core custom classes ── */
        .shadow-elevated { box-shadow: 0 10px 40px rgba(0,0,0,0.1), 0 2px 8px rgba(0,0,0,0.06); }
        .shadow-elevated:hover { box-shadow: 0 20px 60px rgba(0,0,0,0.15), 0 4px 12px rgba(0,0,0,0.08); }

        .bg-warm-white  { background-color: #fafaf9; }
        .bg-warm-gray   { background-color: #f5f5f4; }
        .bg-accent-cream{ background-color: #fef8f3; }

        .hover-lift { transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .hover-lift:hover { transform: translateY(-4px); }

        .floating-shape {
            position: absolute; border-radius: 50%; opacity: 0.06; z-index: 0;
        }
        .floating-shape-1 {
            width: 400px; height: 400px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%);
            top: -200px; right: -50px;
            animation: float 20s ease-in-out infinite;
        }
        .floating-shape-2 {
            width: 300px; height: 300px;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 50%);
            bottom: -50px; left: -50px;
            animation: float 15s ease-in-out infinite reverse;
        }
        .floating-shape-3 {
            width: 250px; height: 250px;
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 50%);
            top: 50%; right: -125px;
            animation: float 18s ease-in-out infinite;
        }
        @keyframes float {
            0%,100% { transform: translateY(0) rotate(0deg); }
            50%     { transform: translateY(-30px) rotate(5deg); }
        }

        .curve-divider, .curve-divider-top {
            position: absolute; left: 0; width: 100%; overflow: hidden; line-height: 0;
        }
        .curve-divider { bottom: 0; }
        .curve-divider-top { top: 0; transform: rotate(180deg); }
        .curve-divider svg, .curve-divider-top svg {
            display: block; width: calc(100% + 1.3px); height: 80px;
        }

        .fade-in-up, .stagger-item {
            opacity: 0; transform: translateY(30px);
            transition: all 0.6s ease-out;
        }
        .fade-in-up.visible, .stagger-item.visible { opacity: 1; transform: translateY(0); }

        .gradient-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(135deg, rgba(102,126,234,0.03) 0%, rgba(118,75,162,0.03) 50%);
            pointer-events: none; z-index: 0;
        }

        @media (max-width: 768px) {
            .floating-shape { display: none; }
            .curve-divider svg, .curve-divider-top svg { height: 40px; }
        }

        .sticky-cta {
            position: fixed; bottom: 0; left: 0; right: 0; z-index: 500;
            background: rgba(17,24,39,0.95); backdrop-filter: blur(8px);
            padding: 1rem; display: flex; justify-content: center; gap: 1rem;
            box-shadow: 0 -4px 20px rgba(0,0,0,0.3);
        }
        .sticky-cta button, .sticky-cta a { min-width: 140px; }
        @media (min-width: 768px) { .sticky-cta { display: none; } }

        .form-error-summary { background: #fee2e2; color: #991b1b; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem; }
        input:invalid:focus, textarea:invalid:focus, select:invalid:focus { border-color: #ef4444; box-shadow: 0 0 0 3px rgba(239,68,68,0.2); }
        .word-count.warning { color: #d97706; }
        .word-count.danger { color: #dc2626; font-weight: bold; }

        .step-title { font-size: 1.25rem; font-weight: 600; margin-bottom: 1rem; color: #111827; }
        .motivational-note { font-style: italic; color: #4b5563; margin-top: 1.5rem; padding: 1rem; background: #f3f4f6; border-radius: 0.5rem; text-align: center; }

        .application-tab {
            background: transparent;
            color: #6b7280;
        }

        .application-tab.active {
            background: #111827;
            color: white;
        }

        .form-step {
            display: none;
        }

        .form-step.active {
            display: block;
            animation: fadeIn 0.3s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        input[type="radio"]:checked + div {
            border-color: #111827;
        }
    </style>

    <!-- Hero with early CTA -->
    <section class="relative bg-gray-900 text-white overflow-hidden min-h-screen flex items-center">
        <div class="absolute inset-0">
            <img src="{{ asset('academy/images/25_workshop1.jpg') }}" alt="Students learning" class="w-full h-full object-cover opacity-30">
            @include('partials.page-hero')
            <div class="absolute inset-0 bg-black/30"></div>
        </div>
        <div class="relative max-w-5xl mx-auto px-4 sm:px-6 py-12 text-center">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-4">Professional Film & Media Production Training</h1>
            <p class="text-lg sm:text-xl text-gray-200 max-w-3xl mx-auto leading-relaxed mb-8">
                6-month intensive • RTB accredited • Films screened at ZIFF & Mashariki Festival • 50 places only
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#apply" class="bg-white text-gray-900 px-10 py-5 font-bold rounded-full hover:bg-gray-50 transition transform hover:scale-105 shadow-elevated text-lg">
                    Apply Now – Limited Spots
                </a>
                <a target="_blank" href="/academy/sources/MasharikiArtsAcademy.pdf" class="border-2 border-white text-white px-10 py-5 font-bold rounded-full hover:bg-white hover:text-gray-900 transition transform hover:scale-105 text-lg">
                    Download Brochure
                </a>
            </div>
        </div>
    </section>

    <!-- Program Overview -->
    <section class="bg-warm-white py-16 md:py-20 relative overflow-hidden">
        <div class="gradient-overlay"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center fade-in-up">
                <div>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Africa's Creative Future</h2>
                    <p class="text-lg text-gray-700 leading-relaxed mb-6">
                        Mashariki Arts Academy blends African storytelling traditions with global production standards, empowering students to actively participate in and strengthen the creative economy.
                    </p>
                    <p class="text-lg text-gray-700 leading-relaxed mb-6">
                        Accredited by the Rwanda TVET Board (RTB), our program delivers hands-on learning guided by experienced local and international professionals.
                    </p>
                    <div class="grid grid-cols-2 gap-4 mt-8">
                        <div class="bg-white p-6 rounded-xl shadow-elevated">
                            <div class="text-3xl font-bold text-gray-900">6 Months</div>
                            <div class="text-sm text-gray-600 mt-1">Program Duration</div>
                        </div>
                        <div class="bg-white p-6 rounded-xl shadow-elevated">
                            <div class="text-3xl font-bold text-gray-900">RTB</div>
                            <div class="text-sm text-gray-600 mt-1">Accredited Certificate</div>
                        </div>
                        <div class="bg-white p-6 rounded-xl shadow-elevated">
                            <div class="text-3xl font-bold text-gray-900">50</div>
                            <div class="text-sm text-gray-600 mt-1">Students Per Intake</div>
                        </div>
                        <div class="bg-white p-6 rounded-xl shadow-elevated">
                            <div class="text-3xl font-bold text-gray-900">All</div>
                            <div class="text-sm text-gray-600 mt-1">Nationalities Welcome</div>
                        </div>
                    </div>
                </div>
                <div class="relative rounded-2xl overflow-hidden shadow-elevated">
                    <img src="{{ asset('academy/images/workshop1.jpg') }}" alt="Film training" class="w-full h-full object-cover">
                </div>
            </div>

            <div class="text-center mt-12">
                <p class="text-lg font-bold text-gray-900 mb-4">Tuition Fee: 3,000,000 RWF (≈ $2,200 USD)</p>
                <a href="#apply" class="inline-block bg-gray-900 text-white px-12 py-6 font-bold rounded-full text-xl hover:bg-gray-800 transition transform hover:scale-105 shadow-elevated">
                    Start Your Application → Only 50 Spots
                </a>
                <p class="mt-4 text-sm text-gray-600">Applications close August 31, 2026</p>
            </div>
        </div>
    </section>

    <!-- Learning Areas -->
    <section class="bg-white py-16 md:py-20 relative overflow-hidden">
        <div class="floating-shape floating-shape-1"></div>
        <div class="gradient-overlay"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <h2 class="text-4xl md:text-5xl font-bold text-center text-gray-900 mb-4 fade-in-up">
                Programs Offered
            </h2>

            <p class="text-xl text-gray-600 text-center max-w-3xl mx-auto mb-16 fade-in-up">
                Choose from five professional filmmaking disciplines designed to prepare students for careers in Africa's growing creative industry.
            </p>

            <div class="space-y-16 lg:space-y-24">
                @foreach($programs as $index => $area)
                    <div class="grid lg:grid-cols-5 gap-0 shadow-elevated rounded-2xl overflow-hidden stagger-item group">
                        <div class="lg:col-span-2 relative h-80 lg:h-auto order-1 {{ $index % 2 === 1 ? 'lg:order-2' : '' }}">
                            <img src="{{ $area->image_url }}"
                                 alt="{{ $area->title }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-r from-gray-900/40 to-transparent lg:from-transparent lg:to-gray-900/30"></div>
                            <div class="absolute top-6 left-6 lg:left-auto lg:right-6 w-16 h-16 rounded-xl bg-white/90 backdrop-blur flex items-center justify-center text-3xl font-bold text-gray-900 shadow-lg">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </div>
                        </div>

                        <div class="lg:col-span-3 bg-white p-8 lg:p-12 flex items-center order-2 {{ $index % 2 === 1 ? 'lg:order-1' : '' }}">
                            <div>
                                <h3 class="text-3xl font-bold text-gray-900 mb-4">
                                    {{ $area->title }}
                                </h3>
                                <p class="text-gray-600 leading-relaxed text-lg">
                                    {{ $area->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Learning Schedule -->
    <section class="bg-warm-gray py-16 md:py-20 relative overflow-hidden">
        <div class="floating-shape floating-shape-2"></div>
        <div class="gradient-overlay"></div>

        <div class="curve-divider-top">
            <svg viewBox="0 0 1200 120" preserveAspectRatio="none"><path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="#ffffff"/></svg>
        </div>
        <div class="curve-divider">
            <svg viewBox="0 0 1200 120" preserveAspectRatio="none"><path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="#fef8f3"/></svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16 fade-in-up">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Learning Schedule</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Flexible session times to accommodate different learning needs</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
                <div class="bg-white p-8 rounded-2xl shadow-elevated hover-lift border-t-4 border-gray-900 stagger-item text-center">
                    <div class="text-5xl font-bold text-gray-900 mb-2">3</div>
                    <div class="text-sm text-gray-600 uppercase tracking-wider mb-4">Hours</div>
                    <h4 class="text-xl font-bold text-gray-900">Day Sessions</h4>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-elevated hover-lift border-t-4 border-gray-900 stagger-item text-center">
                    <div class="text-5xl font-bold text-gray-900 mb-2">3</div>
                    <div class="text-sm text-gray-600 uppercase tracking-wider mb-4">Hours</div>
                    <h4 class="text-xl font-bold text-gray-900">Evening Sessions</h4>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-elevated hover-lift border-t-4 border-gray-900 stagger-item text-center">
                    <div class="text-5xl font-bold text-gray-900 mb-2">6</div>
                    <div class="text-sm text-gray-600 uppercase tracking-wider mb-4">Hours</div>
                    <h4 class="text-xl font-bold text-gray-900">Weekend Sessions</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- Certification & Opportunities -->
    <section class="bg-accent-cream py-16 md:py-20 relative overflow-hidden">
        <div class="floating-shape floating-shape-3"></div>
        <div class="gradient-overlay"></div>

        <div class="curve-divider-top">
            <svg viewBox="0 0 1200 120" preserveAspectRatio="none"><path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" fill="#f5f5f4"/></svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16 fade-in-up">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Certification & Global Opportunities</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Your pathway to international recognition and festival exposure</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 mb-12">
                <div class="bg-white p-8 rounded-2xl shadow-elevated stagger-item">
                    <div class="w-16 h-16 bg-gray-900 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Official Certification</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-gray-900 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            RTB-approved certificate upon completion
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-gray-900 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Co-signed certificates from select partner institutions
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-gray-900 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Internationally recognized credentials
                        </li>
                    </ul>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-elevated stagger-item">
                    <div class="w-16 h-16 bg-gray-900 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Festival Premieres</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-gray-900 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Films considered for international partner festivals
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-gray-900 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Selected films premiere at Mashariki African Film Festival
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-gray-900 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Screenings at Zanzibar International Film Festival (ZIFF)
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Student Benefits -->
    <section class="bg-white py-16 md:py-20 relative overflow-hidden">
        <div class="gradient-overlay"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16 fade-in-up">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Student Benefits</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Comprehensive support to launch and sustain your creative career</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach([
                    ['icon' => 'M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z', 'title' => 'Professional Short Film', 'desc' => 'Produce a complete short film from concept to final cut'],
                    ['icon' => 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9', 'title' => 'Festival Exposure', 'desc' => 'Screening opportunities at major African and international festivals'],
                    ['icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z', 'title' => 'Expert Mentorship', 'desc' => 'Career guidance from international film industry professionals'],
                    ['icon' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'title' => 'Internship Opportunities', 'desc' => 'Placement with local partner organizations'],
                    ['icon' => 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Film Residencies', 'desc' => 'Fully funded residencies in Rwanda, Zanzibar, Kenya, Uganda, Togo, Egypt, and Morocco'],
                    ['icon' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z', 'title' => 'Project Development', 'desc' => 'Top graduates receive support through Mashariki Productions']
                ] as $benefit)
                    <div class="bg-warm-white p-8 rounded-2xl shadow-elevated hover-lift stagger-item">
                        <div class="w-12 h-12 bg-gray-900 rounded-lg mb-4 flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $benefit['icon'] }}"/>
                            </svg>
                        </div>
                        <h4 class="font-bold text-xl mb-2 text-gray-900">{{ $benefit['title'] }}</h4>
                        <p class="text-gray-600">{{ $benefit['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Tuition & Scholarships -->
    <section class="bg-gray-900 text-white py-16 md:py-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=1600&q=80" alt="Creative environment" class="w-full h-full object-cover">
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-in-up">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Tuition & Scholarships</h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">Investing in Africa's creative future through accessible education</p>
            </div>

            <div class="grid md:grid-cols-1 gap-8 max-w-5xl mx-auto">
                <div class="bg-white/10 backdrop-blur-md p-10 rounded-2xl shadow-elevated stagger-item">
                    <div class="text-center mb-6">
                        <div class="text-6xl font-bold mb-2">3M</div>
                        <div class="text-gray-300 text-lg">RWF</div>
                        <p class="text-gray-300 text-base mt-2">(≈ $2,200 USD)</p>
                    </div>
                    <h3 class="text-2xl font-bold text-center mb-6">Full Program Tuition</h3>
                    <ul class="space-y-3 text-gray-200">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-white mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Six months of intensive training
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-white mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Choose One Professional Specialization
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-white mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Professional short film production
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-white mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            RTB-approved certification
                        </li>
                    </ul>
                    <p class="text-sm text-gray-300 italic border-t border-white/20 pt-4">
                        Stay tuned to the upcoming Mashariki scholarships only available on merit
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Who Should Apply & Admissions -->
    <section class="bg-warm-white py-16 md:py-20 relative overflow-hidden">
        <div class="gradient-overlay"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-start">
                <div class="fade-in-up">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Who Should Apply</h2>
                    <p class="text-lg text-gray-700 leading-relaxed mb-8">
                        Whether you aspire to become a videographer, editor, sound designer, screenwriter, director or art director, Mashariki Arts Academy provides practical, industry-focused training designed to prepare you for a successful career in film and digital media.
                    </p>
                    <div class="bg-white p-8 rounded-2xl shadow-elevated">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Ideal Candidates Are:</h3>
                        <ul class="space-y-4 text-gray-700">
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-gray-900 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span>Passionate about African storytelling and cinema</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-gray-900 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span>Committed to hands-on, practical learning</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-gray-900 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span>Ready to build careers in the creative industry</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-gray-900 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span>Open to collaboration and creative exploration</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-gray-900 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span>Eager to contribute to Africa's creative economy</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="fade-in-up">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Admissions</h2>
                    <p class="text-lg text-gray-700 leading-relaxed mb-8">
                        Join our next cohort and start your journey in professional filmmaking. Applications are highly competitive with limited spaces available.
                    </p>

                    <div class="bg-accent-cream p-6 rounded-xl border-l-4 border-gray-900 mb-6">
                        <p class="text-gray-800 font-semibold text-lg">Tuition Fee: 3,000,000 RWF (≈ $2,200 USD)</p>
                        <p class="text-sm text-gray-500 mt-1">Tuition covers program only. Students responsible for travel, visa, accommodation, personal expenses, etc.</p>
                    </div>

                    <div class="bg-accent-cream p-6 rounded-xl border-l-4 border-gray-900">
                        <p class="text-gray-800 font-medium">
                            <strong>Note:</strong> With only 50 spaces available, early application is strongly encouraged. Selection is based on passion, potential, and commitment to storytelling.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Application Section -->
    <section class="bg-white py-16 md:py-24 relative overflow-hidden" id="apply">
        <div class="gradient-overlay"></div>
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-12 fade-in-up">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Apply Now</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    MASHARIKI ARTS ACADEMY (RTB – Rwanda TVET Board Accredited)<br>
                    FILMMAKING CERTIFICATE PROGRAM APPLICATION FORM<br>
                    6-Month Professional Training Program
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-elevated p-8 md:p-12">
                <div class="mb-8 fade-in-up">
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div id="progress-bar" class="bg-gray-900 h-2.5 rounded-full transition-all duration-500" style="width: 25%"></div>
                    </div>
                    <p class="text-center mt-3 text-sm text-gray-600">
                        Step <span id="current-step">1</span> of 4 • <span id="progress-percent">25</span>%
                    </p>
                </div>

                <form id="application-form" action="{{ route('application.submit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="form_type" value="academy_application">

                    <!-- Step 1 -->
                    <div class="form-step active" data-step="1">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">1. Applicant Information</h3>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name *</label>
                                <input type="text" name="full_name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Date of Birth *</label>
                                <input type="date" name="date_of_birth" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nationality *</label>
                                <input type="text" name="nationality" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Are you currently affiliated with Norxen Kigali? *</label>
                                <select name="affiliated_with_norxen" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent">
                                    <option value="">Select an option</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Gender (optional)</label>
                                <select name="gender" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent">
                                    <option value="">Prefer not to say</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Residential Address *</label>
                                <textarea name="address" required rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent"></textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number (WhatsApp) *</label>
                                <input type="tel" name="phone" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address *</label>
                                <input type="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">ID / Passport Number *</label>
                                <input type="text" name="id_number" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent">
                            </div>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="form-step" data-step="2">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">2. Select Your Preferred Program</h3>
                        <p class="text-gray-600 mb-4">Please select one specialization *</p>
                        <div class="grid md:grid-cols-2 gap-4 mb-10">
                            @foreach($programs as $program)
                                <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-gray-900">
                                    <input type="radio" name="specialization" value="{{ $program->specialization_key }}" required class="mr-3">
                                    <span class="font-medium">{{ $program->title }}</span>
                                </label>
                            @endforeach
                        </div>

                        <h3 class="text-2xl font-bold text-gray-900 mb-6">4. Educational Background</h3>
                        <div class="space-y-6 mb-10">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Highest Level of Education Completed *</label>
                                <input type="text" name="education_level" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">School / Institution Name *</label>
                                <input type="text" name="institution" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Year Completed *</label>
                                <input type="number" name="year_completed" required min="1900" max="2030" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent">
                            </div>
                        </div>

                        <h3 class="text-2xl font-bold text-gray-900 mb-6">5. Creative / Filmmaking Background</h3>
                        <div class="mb-4">
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Do you have prior experience in filmmaking or creative arts? *</label>
                            <div class="flex gap-6">
                                <label class="flex items-center">
                                    <input type="radio" name="has_experience" value="yes" required class="mr-2" onclick="document.getElementById('experience-desc').classList.remove('hidden')">
                                    Yes
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="has_experience" value="no" required class="mr-2" onclick="document.getElementById('experience-desc').classList.add('hidden')">
                                    No
                                </label>
                            </div>
                        </div>
                        <div id="experience-desc" class="hidden">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">If yes, briefly describe your experience, training, or creative practice (Maximum 150 words)</label>
                            <textarea name="experience_description" rows="5" maxlength="500" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent"></textarea>
                            <div class="text-right text-sm text-gray-500 mt-1"><span id="exp-word-count">0</span>/150 words</div>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="form-step" data-step="3">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">6. Areas of Interest in Filmmaking</h3>
                        <p class="text-gray-600 mb-4">Select all that apply</p>
                        <div class="grid md:grid-cols-2 gap-3 mb-10">
                            @foreach(['Videography', 'Lighting', 'Sound Design', 'Screenwriting', 'Directing', 'Art Direction', 'Editing', 'Photography', 'Documentary Filmmaking'] as $item)
                                <label class="flex items-center p-3 border rounded-lg border-gray-200 hover:bg-gray-50 cursor-pointer">
                                    <input type="checkbox" name="interests[]" value="{{ $item }}" class="mr-3">
                                    {{ $item }}
                                </label>
                            @endforeach
                            <div class="flex items-center p-3 border rounded-lg border-gray-200">
                                <input type="checkbox" name="interests_other_check" value="other" id="other-check" class="mr-3">
                                <label for="other-check" class="mr-2">Other:</label>
                                <input type="text" name="other_interest" class="flex-1 px-3 py-2 border border-gray-300 rounded focus:ring-gray-900 text-sm">
                            </div>
                        </div>

                        <h3 class="text-2xl font-bold text-gray-900 mb-6">7. Motivation Statement (Required)</h3>
                        <p class="text-gray-600 mb-4">Please explain:</p>
                        <ul class="list-disc pl-6 mb-4 text-gray-700 space-y-1">
                            <li>Why you are applying to Mashariki Arts Academy</li>
                            <li>What you hope to gain from the program</li>
                            <li>Your long-term career goals in film or creative industries</li>
                        </ul>
                        <textarea name="motivation" required rows="8" maxlength="2000" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent"></textarea>
                        <div class="text-right text-sm text-gray-500 mt-1"><span id="mot-word-count">0</span>/300 words</div>
                    </div>

                    <!-- Step 4 -->
                    <div class="form-step" data-step="4">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">8. Portfolio / Sample Work (Optional but Encouraged)</h3>
                        <p class="text-gray-600 mb-3">Please share links or brief descriptions of any creative work (films, scripts, photography, sound work, writing, or related projects):</p>
                        <textarea name="portfolio_description" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent mb-6"></textarea>

                        <label class="block text-sm font-semibold text-gray-700 mb-2">Upload files (optional)</label>
                        <input type="file" name="portfolio_files[]" multiple accept=".pdf,.jpg,.jpeg,.png,.mp4,.mov,.doc,.docx" class="w-full px-4 py-3 border border-gray-300 rounded-lg">

                        <h3 class="text-2xl font-bold text-gray-900 mt-12 mb-6">9. Availability & Commitment</h3>
                        <p class="text-gray-700 mb-4">
                            The program requires full participation over a six-month period, including practical exercises and collaborative projects.
                        </p>
                        <label class="block text-sm font-semibold text-gray-700 mb-3">Do you confirm your availability and commitment for the full duration? *</label>
                        <div class="flex gap-6">
                            <label class="flex items-center">
                                <input type="radio" name="commitment" value="yes" required class="mr-2">
                                Yes
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="commitment" value="no" required class="mr-2">
                                No
                            </label>
                        </div>

                        <h3 class="text-2xl font-bold text-gray-900 mt-12 mb-6">10. Declaration</h3>
                        <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                            <p class="text-gray-700 mb-6">
                                I confirm that the information provided in this application is accurate and complete.
                                I understand that admission is competitive and subject to evaluation by the Mashariki Arts Academy selection committee.
                            </p>
                            <div class="grid md:grid-cols-3 gap-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Applicant Name *</label>
                                    <input type="text" name="declaration_name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Date *</label>
                                    <input type="date" name="declaration_date" value="{{ now()->format('Y-m-d') }}" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent">
                                </div>
                            </div>
                            <div class="mt-6">
                                <label class="flex items-start">
                                    <input type="checkbox" name="declaration_agree" required class="mt-1 mr-3">
                                    <span class="text-sm text-gray-700">I agree to the declaration above</span>
                                </label>
                            </div>
                        </div>


                    </div>

                    <!-- Navigation -->
                    <div class="flex justify-between mt-10 pt-6 border-t border-gray-200">
                        <button type="button" id="prev-btn" onclick="previousStep()" class="px-8 py-3 border-2 border-gray-300 text-gray-700 font-bold rounded-full hover:border-gray-900 transition hidden">
                            ← PREVIOUS
                        </button>
                        <button type="button" id="next-btn" onclick="nextStep()" class="ml-auto px-8 py-3 bg-gray-900 text-white font-bold rounded-full hover:bg-gray-800 transition">
                            NEXT →
                        </button>
                        <button type="submit" id="submit-btn" class="ml-auto px-8 py-3 bg-gray-900 text-white font-bold rounded-full hover:bg-gray-800 transition hidden">
                            SUBMIT APPLICATION
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="relative bg-gray-900 py-20 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?w=1600&q=80" alt="Creative success" class="w-full h-full object-cover opacity-20">
        </div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 text-center text-white">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Ready to Begin Your Journey?</h2>
            <p class="text-xl text-gray-300 mb-4">Start your journey with Mashariki Arts Academy and become part of Africa's growing creative economy. Applications close August 31, 2026.</p>
            <p class="text-2xl font-bold text-white mb-10">Tuition Fee: 3,000,000 RWF (≈ $2,200 USD)</p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="#apply" class="bg-white text-gray-900 px-10 py-5 font-bold rounded-full hover:bg-gray-50 transition transform hover:scale-105 shadow-elevated text-lg">
                    APPLY NOW
                </a>
                <a href="/academy/sources/MasharikiArtsAcademy.pdf" class="border-2 border-white text-white px-10 py-5 font-bold rounded-full hover:bg-white hover:text-gray-900 transition transform hover:scale-105 text-lg">
                    DOWNLOAD BROCHURE
                </a>
            </div>
            <p class="text-sm text-gray-400 mt-8">
                Questions? Contact our admissions team or schedule a campus tour.
            </p>
        </div>
    </section>

    <!-- Sticky CTA (mobile) -->
    <div class="sticky-cta">
        <a href="#apply" class="bg-white text-gray-900 px-6 py-3 font-bold rounded-full hover:bg-gray-50 transition">
            Apply Now
        </a>
        <a href="mailto:applications@masharikiacademy.org" class="bg-transparent border border-white text-white px-6 py-3 font-bold rounded-full hover:bg-white hover:text-gray-900 transition">
            Questions?
        </a>
    </div>

    <script>
        const options = { threshold: 0.1, rootMargin: '0px 0px -80px 0px' };

        const fadeObserver = new IntersectionObserver(entries => {
            entries.forEach(e => {
                if (e.isIntersecting) e.target.classList.add('visible');
            });
        }, options);

        const staggerObserver = new IntersectionObserver((entries) => {
            entries.forEach((e, i) => {
                if (e.isIntersecting) {
                    setTimeout(() => e.target.classList.add('visible'), i * 80);
                }
            });
        }, options);

        document.querySelectorAll('.fade-in-up').forEach(el => fadeObserver.observe(el));
        document.querySelectorAll('.stagger-item').forEach(el => staggerObserver.observe(el));
    </script>

    <script>
        let currentStep = 1;
        const totalSteps = 4;

        function nextStep() {
            const currentStepElement = document.querySelector(`.form-step[data-step="${currentStep}"]`);
            const inputs = currentStepElement.querySelectorAll('input[required], textarea[required], select[required]');

            let isValid = true;

            inputs.forEach(input => {
                if (!input.checkValidity()) {
                    input.reportValidity();
                    isValid = false;
                }
            });

            if (!isValid) return;

            if (currentStep < totalSteps) {
                currentStep++;
                updateStep();
            }
        }

        function previousStep() {
            if (currentStep > 1) {
                currentStep--;
                updateStep();
            }
        }

        function updateStep() {
            document.querySelectorAll('.form-step').forEach(step => {
                step.classList.remove('active');
            });

            document.querySelector(`.form-step[data-step="${currentStep}"]`).classList.add('active');

            const progress = (currentStep / totalSteps) * 100;
            document.getElementById('progress-bar').style.width = progress + '%';
            document.getElementById('current-step').textContent = currentStep;
            document.getElementById('progress-percent').textContent = Math.round(progress);

            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');
            const submitBtn = document.getElementById('submit-btn');

            if (currentStep === 1) {
                prevBtn.classList.add('hidden');
            } else {
                prevBtn.classList.remove('hidden');
            }

            if (currentStep === totalSteps) {
                nextBtn.classList.add('hidden');
                submitBtn.classList.remove('hidden');
            } else {
                nextBtn.classList.remove('hidden');
                submitBtn.classList.add('hidden');
            }

            document.getElementById('application-form').scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        function setupWordCounter(textareaSelector, counterSelector, maxWords) {
            const textarea = document.querySelector(textareaSelector);
            const counter = document.querySelector(counterSelector);

            if (textarea && counter) {
                textarea.addEventListener('input', function() {
                    const words = this.value.trim().split(/\s+/).filter(word => word.length > 0);
                    const wordCount = words.length;
                    counter.textContent = wordCount;

                    counter.classList.remove('text-red-600');

                    if (wordCount > maxWords) {
                        counter.classList.add('text-red-600');
                    }
                });
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            setupWordCounter('textarea[name="experience_description"]', '#exp-word-count', 150);
            setupWordCounter('textarea[name="motivation"]', '#mot-word-count', 300);
        });
    </script>

    @include('partials.footer')

@endsection
