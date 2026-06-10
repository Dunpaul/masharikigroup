<header
    x-data="{ open: false }"
    class="sticky top-0 z-50 w-full border-b border-black/5 bg-[#eef0f2]/80 backdrop-blur-xl"
>
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between">

            <a href="/" class="group inline-flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl border border-black/15 bg-white/70 text-sm font-semibold text-black shadow-sm transition duration-300 group-hover:-translate-y-0.5 group-hover:shadow-md">
                    M
                </div>

                <div class="flex flex-col leading-none">
                    <span class="text-[11px] uppercase tracking-[0.28em] text-gray-500">
                        Group
                    </span>
                    <span class="text-base md:text-lg font-semibold tracking-[0.18em] text-[#111111]">
                        MASHARIKI
                    </span>
                </div>
            </a>

            <nav class="hidden md:flex items-center gap-2 rounded-full border border-black/5 bg-white/60 px-3 py-2 shadow-sm backdrop-blur">
                <a
                    href="/"
                    class="{{ request()->is('/') ? 'bg-[#111111] text-white shadow-sm' : 'text-gray-700 hover:text-black' }} rounded-full px-5 py-2.5 text-sm font-medium transition duration-300"
                >
                    Home
                </a>

                <a
                    href="/about"
                    class="{{ request()->is('about') ? 'bg-[#111111] text-white shadow-sm' : 'text-gray-700 hover:text-black' }} rounded-full px-5 py-2.5 text-sm font-medium transition duration-300"
                >
                    About
                </a>

                <a
                    href="/companies"
                    class="{{ request()->is('companies') || request()->is('companies/*') ? 'bg-[#111111] text-white shadow-sm' : 'text-gray-700 hover:text-black' }} rounded-full px-5 py-2.5 text-sm font-medium transition duration-300"
                >
                    Companies
                </a>

                <a
                    href="/contact"
                    class="{{ request()->is('contact') ? 'bg-[#111111] text-white shadow-sm' : 'text-gray-700 hover:text-black' }} rounded-full px-5 py-2.5 text-sm font-medium transition duration-300"
                >
                    Contact
                </a>
            </nav>

            <a
                href="/contact"
                class="hidden md:inline-flex items-center rounded-full bg-[#111111] px-5 py-3 text-sm font-medium text-white shadow-lg shadow-black/10 transition duration-300 hover:-translate-y-0.5 hover:bg-black"
            >
                Get in touch
            </a>

            <button
                type="button"
                @click="open = !open"
                class="md:hidden inline-flex h-11 w-11 items-center justify-center rounded-xl border border-black/10 bg-white/70 text-black shadow-sm transition"
                aria-label="Open menu"
                :aria-expanded="open.toString()"
            >
                <svg x-show="!open" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 7h16M4 12h16M4 17h16"/>
                </svg>

                <svg x-show="open" x-cloak class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M6 6l12 12M18 6L6 18"/>
                </svg>
            </button>

        </div>

        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            x-cloak
            class="md:hidden pb-5"
        >
            <div class="rounded-3xl border border-black/5 bg-white/80 p-3 shadow-lg backdrop-blur-xl">
                <nav class="flex flex-col gap-1">
                    <a
                        href="/"
                        class="{{ request()->is('/') ? 'bg-[#111111] text-white' : 'text-gray-700 hover:bg-black/[0.04] hover:text-black' }} rounded-2xl px-4 py-3 text-sm font-medium transition"
                    >
                        Home
                    </a>

                    <a
                        href="/about"
                        class="{{ request()->is('about') ? 'bg-[#111111] text-white' : 'text-gray-700 hover:bg-black/[0.04] hover:text-black' }} rounded-2xl px-4 py-3 text-sm font-medium transition"
                    >
                        About
                    </a>

                    <a
                        href="/companies"
                        class="{{ request()->is('companies') || request()->is('companies/*') ? 'bg-[#111111] text-white' : 'text-gray-700 hover:bg-black/[0.04] hover:text-black' }} rounded-2xl px-4 py-3 text-sm font-medium transition"
                    >
                        Companies
                    </a>

                    <a
                        href="/contact"
                        class="{{ request()->is('contact') ? 'bg-[#111111] text-white' : 'text-gray-700 hover:bg-black/[0.04] hover:text-black' }} rounded-2xl px-4 py-3 text-sm font-medium transition"
                    >
                        Contact
                    </a>

                    <a
                        href="/contact"
                        class="mt-2 inline-flex items-center justify-center rounded-2xl bg-[#111111] px-5 py-3 text-sm font-medium text-white shadow-lg shadow-black/10 transition duration-300"
                    >
                        Get in touch
                    </a>
                </nav>
            </div>
        </div>
    </div>
</header>
