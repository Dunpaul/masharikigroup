@extends('layouts.app')

@section('title', 'Admissions - Mashariki Arts Academy')

@section('content')

    @include('partials.navbar')
    <style>
        /* Reuse homepage styles – assuming they're in layouts.app or global CSS */
        /* Add any missing classes if needed, but most are already there */
        .urgency-badge {
            background: linear-gradient(135deg, #ef4444, #f97316);
            color: white;
            font-weight: bold;
            padding: 0.5rem 1.5rem;
            border-radius: 9999px;
            display: inline-block;
            margin-bottom: 1.5rem;
        }

        .program-card {
            transition: all 0.4s ease;
        }

        .program-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .deadline-countdown {
            background: rgba(239, 68, 68, 0.1);
            border: 2px solid #ef4444;
            border-radius: 1rem;
            padding: 1.5rem;
        }
    </style>

    <!-- Hero Section – Similar to homepage but focused on admissions -->
    <section class="relative bg-gray-900 text-white overflow-hidden min-h-[100vh] flex items-center">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=1600&q=80" alt="Filmmaking workshop" class="w-full h-full object-cover opacity-50">
            @include('partials.page-hero')
            <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/60 to-black/80"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 py-20 w-full z-10">
            <div class="text-center max-w-4xl mx-auto">
                <div class="inline-block mb-6 px-6 py-2 bg-white/10 backdrop-blur-md rounded-full border border-white/20">
                    <span class="text-sm sm:text-base font-semibold tracking-wider uppercase text-gray-200">
                        Now Open for 2026
                    </span>
                </div>

                <h1 class="text-5xl sm:text-6xl md:text-7xl font-bold mb-6 leading-tight">
                    <span class="block bg-gradient-to-r from-white via-gray-200 to-gray-300 bg-clip-text text-transparent">
                        Admissions Open
                    </span>
                    <span class="block bg-gradient-to-r from-purple-400 via-pink-400 to-blue-400 bg-clip-text text-transparent">
                        Professional Short Courses
                    </span>
                </h1>

                <p class="text-xl sm:text-2xl md:text-3xl font-light text-gray-200 mb-8 max-w-3xl mx-auto">
                    6-Month Intensive Programs in Film & Creative Arts
                </p>

                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                    <a href="https://www.masharikiacademy.org/services#apply" class="inline-block bg-white text-gray-900 px-10 py-5 text-lg font-bold rounded-full hover:bg-gray-100 transition-all transform hover:scale-105 shadow-2xl">
                        Apply Now
                    </a>
                    <a href="{{ route('academy.services') }}" class="inline-block border-2 border-white text-white px-10 py-5 text-lg font-bold rounded-full hover:bg-white hover:text-gray-900 transition-all transform hover:scale-105">
                        View Programs
                    </a>
                </div>

                <div class="mt-10">
                    <span class="urgency-badge text-lg">Only 50 Spots Available</span>
                </div>

                <p class="text-4xl font-bold text-white mb-4">3,000,000 RWF Tuition Fee</p>
                <p class="text-xl text-white mb-6">(≈ $2,200 USD – subject to exchange rate)</p>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </div>
    </section>

    <!-- Main Content with Curved Dividers -->
    <section class="bg-warm-white pb-16 md:pb-24 relative overflow-hidden">
        <!-- Floating shapes (reuse from homepage) -->
        <div class="floating-shape floating-shape-1"></div>
        <div class="floating-shape floating-shape-2"></div>
        <div class="gradient-overlay"></div>

        <!-- Curve top (inverted) -->
        <div class="curve-divider-top">
            <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="#f5f5f4"></path>
            </svg>
        </div>

        <div class="max-w-7xl mx-auto pb-4 sm:px-6 relative z-10">
            <div class="text-center mb-16 fade-in-up">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Call for Students 2026</h2>
                <p class="text-xl text-gray-700 max-w-3xl mx-auto">
                    Mashariki Arts Academy, accredited by the Rwanda TVET Board (RTB), invites applications for our six-month professional short courses in film and creative arts. In partnership with leading international film institutions and tied to the Mashariki African Film Festival.
                </p>
            </div>

            <!-- Partners Grid -->
            <div class="mb-20">
                <h3 class="text-2xl font-bold text-center text-gray-900 mb-8">Academic & Festival Partners</h3>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-6 text-center stagger-item">
                    <div class="bg-white p-4 rounded-xl shadow-elevated">Maine Film Center (USA)</div>
                    <div class="bg-white p-4 rounded-xl shadow-elevated">Vue d’Afrique Montréal (Canada)</div>
                    <div class="bg-white p-4 rounded-xl shadow-elevated">Africa Movie Festival Manitoba (Canada)</div>
                    <div class="bg-white p-4 rounded-xl shadow-elevated">Silicon Valley African Film Festival (USA)</div>
                    <div class="bg-white p-4 rounded-xl shadow-elevated">Off-Court Film Festival (France)</div>
                    <div class="bg-white p-4 rounded-xl shadow-elevated">Youth Film Platform Africa (Kenya)</div>
                    <div class="bg-white p-4 rounded-xl shadow-elevated">Perth Film School (Australia)</div>
                    <div class="bg-white p-4 rounded-xl shadow-elevated">Zanzibar International Film Festival – ZIFF (Tanzania)</div>
                    <div class="bg-white p-4 rounded-xl shadow-elevated">Africa Eye (United Kingdom)</div>
                    <div class="bg-white p-4 rounded-xl shadow-elevated">Centro Afro Carioca de Cinema (Brazil)</div>
                </div>
            </div>

            <!-- Programs Offered -->
            <div id="programs" class="mb-20">
                <h3 class="text-3xl font-bold text-center text-gray-900 mb-12">Programs Offered (6 Months)</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                    <!-- 1. Videography & Lighting Techniques -->
                    <div class="program-card bg-white rounded-2xl shadow-elevated overflow-hidden stagger-item">
                        <div class="h-48 bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white text-5xl font-bold">
                            Camera
                        </div>
                        <div class="p-6">
                            <h4 class="text-xl font-bold mb-3">Videography & Lighting Techniques</h4>
                            <p class="text-gray-600">Camera operation, composition, shot planning, lighting techniques, and visual storytelling using industry-standard equipment.</p>
                        </div>
                    </div>

                    <!-- 2. Sound Design -->
                    <div class="program-card bg-white rounded-2xl shadow-elevated overflow-hidden stagger-item">
                        <div class="h-48 bg-gradient-to-br from-green-500 to-teal-600 flex items-center justify-center text-white text-5xl font-bold">
                            Sound
                        </div>
                        <div class="p-6">
                            <h4 class="text-xl font-bold mb-3">Sound Design</h4>
                            <p class="text-gray-600">Field recording, dialogue capture, sound editing, Foley, sound effects, mixing and mastering for film and digital media.</p>
                        </div>
                    </div>

                    <!-- 3. Screenwriting & Directing -->
                    <div class="program-card bg-white rounded-2xl shadow-elevated overflow-hidden stagger-item">
                        <div class="h-48 bg-gradient-to-br from-purple-500 to-pink-600 flex items-center justify-center text-white text-5xl font-bold">
                            Script
                        </div>
                        <div class="p-6">
                            <h4 class="text-xl font-bold mb-3">Screenwriting & Directing</h4>
                            <p class="text-gray-600">Story structure, character development, dialogue writing, visual narration, actor direction, scene staging, and bringing scripts to life.</p>
                        </div>
                    </div>

                    <!-- 4. Art Direction -->
                    <div class="program-card bg-white rounded-2xl shadow-elevated overflow-hidden stagger-item">
                        <div class="h-48 bg-gradient-to-br from-orange-500 to-red-600 flex items-center justify-center text-white text-5xl font-bold">
                            Design
                        </div>
                        <div class="p-6">
                            <h4 class="text-xl font-bold mb-3">Art Direction</h4>
                            <p class="text-gray-600">Production design, set design, props, costumes, colour theory, and creating cinematic environments.</p>
                        </div>
                    </div>

                    <!-- 5. Editing -->
                    <div class="program-card bg-white rounded-2xl shadow-elevated overflow-hidden stagger-item">
                        <div class="h-48 bg-gradient-to-br from-amber-500 to-yellow-600 flex items-center justify-center text-white text-5xl font-bold">
                            Edit
                        </div>
                        <div class="p-6">
                            <h4 class="text-xl font-bold mb-3">Editing</h4>
                            <p class="text-gray-600">Professional video editing, post-production workflows, colour correction, audio synchronization and final delivery.</p>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Benefits & Certification -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-20">
                <div class="fade-in-up">
                    <h3 class="text-3xl font-bold text-gray-900 mb-6">Certification & Opportunities</h3>
                    <ul class="space-y-4 text-gray-700 text-lg">
                        <li class="flex items-start"><span class="text-green-600 text-2xl mr-3">✓</span> RTB-approved certificate (co-signed by select partners)</li>
                        <li class="flex items-start"><span class="text-green-600 text-2xl mr-3">✓</span> Final short films considered for partner festivals</li>
                        <li class="flex items-start"><span class="text-green-600 text-2xl mr-3">✓</span> Premiere opportunities at Mashariki African Film Festival & ZIFF</li>
                        <li class="flex items-start"><span class="text-green-600 text-2xl mr-3">✓</span> Festival attendance for top students</li>
                        <li class="flex items-start"><span class="text-green-600 text-2xl mr-3">✓</span> Fully funded residencies (Rubavu, Zanzibar, Kenya, Uganda, Togo, Egypt, Morocco)</li>
                        <li class="flex items-start"><span class="text-green-600 text-2xl mr-3">✓</span> Career guidance, internships, mentorship, and project development support for top 3</li>
                    </ul>
                </div>

                <div class="fade-in-up">
                    <h3 class="text-3xl font-bold text-gray-900 mb-6">Tuition & Important Notes</h3>
                    <div class="bg-accent-cream p-8 rounded-2xl shadow-elevated">
                        <p class="text-4xl font-bold text-gray-900 mb-4">3,000,000 RWF</p>
                        <p class="text-xl text-gray-700 mb-6">(≈ $2,200 USD – subject to exchange rate)</p>



                        <p class="font-semibold mb-2">Limited to 50 students – Highly competitive</p>
                        <p class="text-gray-600 mb-4">Open to all nationalities (East Africans especially encouraged). Age 18+, secondary education completed, proficient in English.</p>

                        <p class="text-sm text-gray-500 mt-6">Tuition covers program only. Students responsible for travel, visa, accommodation, personal expenses, etc.</p>
                    </div>
                </div>
            </div>

            <!-- How to Apply -->
            <div id="apply" class="text-center mb-16 fade-in-up">
                <h3 class="text-4xl font-bold text-gray-900 mb-8">How to Apply</h3>
                <div class="max-w-2xl mx-auto bg-white p-10 rounded-2xl shadow-elevated">
                    <ul class="text-left space-y-4 text-lg mb-10">
                        <li>• Go to our website a fill in the he official application form: <a href="https://www.masharikiacademy.org/services#apply" class="text-blue-600 hover:underline font-semibold">HERE</a></li>
                        <li>• Fill in your Personal statement (motivation & career goals)</li>
                        <li>• Attach Copies of high school transcripts/diploma</li>
                        <li>• Include One letter of recommendation</li>
                    </ul>

                    <a href="https://www.masharikiacademy.org/services#apply" class="inline-block bg-gray-900 text-white px-12 py-6 text-xl font-bold rounded-full hover:bg-gray-800 transition transform hover:scale-105 shadow-2xl">
                        Send Your Application
                    </a>

                    <p class="mt-8 text-gray-600">Questions? Contact info@masharikiacademy.org or visit www.masharikiacademy.org</p>
                </div>
            </div>
        </div>

        <!-- Bottom curve -->
        <div class="curve-divider">
            <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="#fef8f3"></path>
            </svg>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="bg-gray-900 text-white py-20 text-center relative">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Don't Miss This Opportunity</h2>
            <p class="text-xl text-gray-300 mb-10">Join a global network of storytellers and creatives. Limited spots.</p>
            <a href="mailto:applications@masharikiacademy.org?subject=Application%20for%202026%20Short%20Courses" class="inline-block bg-white text-gray-900 px-12 py-6 text-xl font-bold rounded-full hover:bg-gray-100 transition transform hover:scale-105 shadow-2xl">
                Apply Today
            </a>
        </div>
    </section>

    <!-- Reuse homepage scroll/animation scripts if needed, or add observer here -->
    <script>
        // Fade-in and stagger (reuse from homepage script)
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) entry.target.classList.add('visible');
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.fade-in-up, .stagger-item').forEach(el => observer.observe(el));
    </script>

    @include('partials.footer')

@endsection
