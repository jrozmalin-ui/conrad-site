<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Premium home and garden care across Cumbria — calm, meticulous, showroom-ready finishes.">

        <title>Cumbria Cleaning Company — Effortless Clean. Exceptional Standard.</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=cormorant-garamond:400,500,600|dm-sans:400,500,600" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="overflow-x-hidden bg-[#F5F5F5] font-sans text-[#2B2B2B] antialiased">
        @php
            $heroImage = 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=2800&q=82';
            $fallbackSequence = $heroImage;
        @endphp

        {{-- Navigation --}}
        <header class="fixed inset-x-0 top-0 z-50 border-b border-white/10 bg-[#F5F5F5]/75 backdrop-blur-xl">
            <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-5 md:px-10">
                <a href="#" class="font-display text-xl font-medium tracking-[0.02em] text-[#2B2B2B] md:text-2xl">Cumbria Cleaning</a>
                <nav class="hidden items-center gap-10 text-sm font-medium tracking-wide text-[#6E6E6E] md:flex">
                    <a href="#transformation" class="transition-colors hover:text-[#2B2B2B]">Story</a>
                    <a href="#services" class="transition-colors hover:text-[#2B2B2B]">Services</a>
                    <a href="#pricing" class="transition-colors hover:text-[#2B2B2B]">Pricing</a>
                    <a href="#trust" class="transition-colors hover:text-[#2B2B2B]">Trust</a>
                    <a
                        href="#contact"
                        class="btn-premium rounded-full border border-[#A8B8C8]/55 bg-[#A8B8C8]/15 px-5 py-2 text-[#2B2B2B] hover:border-[#A8B8C8]"
                    >
                        Book
                    </a>
                </nav>
                <a href="#contact" class="btn-premium rounded-full border border-[#A8B8C8]/55 bg-[#A8B8C8]/15 px-4 py-2 text-sm font-medium text-[#2B2B2B] md:hidden">Book</a>
            </div>
        </header>

        {{-- Hero --}}
        <section class="relative flex min-h-screen flex-col justify-end pb-24 pt-32 md:pb-32 md:pt-40">
            <div class="absolute inset-0">
                <img src="{{ $heroImage }}" alt="" class="h-full w-full object-cover" fetchpriority="high">
                <div class="hero-gradient absolute inset-0"></div>
            </div>

            <div class="relative z-10 mx-auto w-full max-w-5xl px-6 md:px-10">
                <p class="animate-fade-up mb-4 text-xs font-semibold uppercase tracking-[0.35em] text-[#EAEAEA]/90 md:text-sm">Premium home care · Cumbria</p>
                <h1 class="animate-fade-up animate-delay-1 font-display text-balance text-5xl font-medium leading-[1.05] tracking-tight text-white md:text-7xl lg:text-8xl">
                    Effortless Clean.<br class="hidden sm:block"> Exceptional Standard.
                </h1>
                <p class="animate-fade-up animate-delay-2 mt-8 max-w-2xl text-lg leading-relaxed text-[#EAEAEA]/95 md:text-xl">
                    Premium home and garden cleaning across Cumbria — designed for homes that deserve more.
                </p>
                <div class="animate-fade-up animate-delay-3 mt-12 flex flex-col gap-4 sm:flex-row sm:items-center">
                    <a
                        href="#contact"
                        class="btn-premium inline-flex items-center justify-center rounded-full bg-[#F5F5F5] px-10 py-4 text-center text-sm font-semibold tracking-wide text-[#2B2B2B] shadow-[0_16px_40px_rgb(0_0_0_/0.12)]"
                    >
                        Book a Clean
                    </a>
                    <a
                        href="#services"
                        class="btn-premium inline-flex items-center justify-center rounded-full border border-white/35 bg-white/10 px-10 py-4 text-center text-sm font-semibold tracking-wide text-white backdrop-blur-md"
                    >
                        View Services
                    </a>
                </div>
            </div>
        </section>

        {{-- Cinematic scroll sequence --}}
        <section
            id="transformation"
            data-scroll-sequence
            data-manifest-url="/sequence/manifest.json"
            data-preload-window="12"
            data-max-dpr="2"
            class="relative h-[420vh] bg-[#2B2B2B]"
        >
            <div class="sticky top-0 flex h-screen w-full flex-col overflow-hidden">
                <div class="relative flex min-h-0 flex-1 flex-col">
                    <img
                        src="{{ $fallbackSequence }}"
                        alt="Serene interior — reference frame while the sequence loads"
                        data-sequence-fallback
                        class="absolute inset-0 z-0 h-full w-full object-cover transition-opacity duration-700"
                    >
                    <canvas
                        data-sequence-canvas
                        aria-hidden="true"
                        class="pointer-events-none absolute inset-0 z-10 h-full w-full object-cover opacity-0 transition-opacity duration-500"
                    ></canvas>

                    <div class="pointer-events-none absolute inset-x-0 top-0 z-20 bg-gradient-to-b from-[#2B2B2B]/55 to-transparent px-6 pb-24 pt-28 md:px-10 md:pt-32">
                        <p class="text-xs font-semibold uppercase tracking-[0.35em] text-[#EAEAEA]/75">The difference</p>
                        <h2 class="font-display mt-4 max-w-3xl text-balance text-4xl font-medium tracking-tight text-white md:text-5xl lg:text-6xl">
                            From Lived-In… to Showroom Ready.
                        </h2>
                        <p class="mt-5 max-w-xl text-base leading-relaxed text-[#EAEAEA]/85 md:text-lg">
                            Scroll to see the difference a true standard makes.
                        </p>
                    </div>

                    <div class="pointer-events-none absolute inset-x-0 bottom-0 z-20 flex justify-center px-6 pb-10 md:pb-14">
                        <div class="relative min-h-[5.5rem] w-full max-w-xl md:min-h-[4.5rem]">
                            <div
                                data-sequence-overlay
                                data-from="0"
                                data-to="0.2"
                                class="glass-panel absolute inset-0 rounded-2xl px-8 py-6 text-center md:px-10"
                            >
                                <p class="font-display text-xl text-white md:text-2xl">Life gets busy.</p>
                            </div>
                            <div
                                data-sequence-overlay
                                data-from="0.2"
                                data-to="0.4"
                                class="glass-panel absolute inset-0 rounded-2xl px-8 py-6 text-center md:px-10"
                            >
                                <p class="font-display text-xl text-white md:text-2xl">Mess builds. Details get missed.</p>
                            </div>
                            <div
                                data-sequence-overlay
                                data-from="0.4"
                                data-to="0.6"
                                class="glass-panel absolute inset-0 rounded-2xl px-8 py-6 text-center md:px-10"
                            >
                                <p class="font-display text-xl text-white md:text-2xl">A proper clean changes everything.</p>
                            </div>
                            <div
                                data-sequence-overlay
                                data-from="0.6"
                                data-to="0.8"
                                class="glass-panel absolute inset-0 rounded-2xl px-8 py-6 text-center md:px-10"
                            >
                                <p class="font-display text-xl text-white md:text-2xl">Every surface. Every detail.</p>
                            </div>
                            <div
                                data-sequence-overlay
                                data-from="0.8"
                                data-to="1"
                                class="glass-panel absolute inset-0 rounded-2xl px-8 py-6 text-center md:px-10"
                            >
                                <p class="font-display text-xl text-white md:text-2xl">Back to calm. Back to perfect.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Services --}}
        <section id="services" class="border-t border-[#EAEAEA] bg-[#F5F5F5] py-28 md:py-36">
            <div class="mx-auto max-w-6xl px-6 md:px-10">
                <div class="max-w-2xl">
                    <p class="text-xs font-semibold uppercase tracking-[0.35em] text-[#8A8A8A]">Services</p>
                    <h2 class="font-display mt-4 text-4xl font-medium tracking-tight text-[#2B2B2B] md:text-5xl">Considered care for every room.</h2>
                    <p class="mt-6 text-lg leading-relaxed text-[#6E6E6E]">
                        Quiet precision, meticulous routines, and finishes that feel quietly expensive — without the noise.
                    </p>
                </div>

                <div class="mt-16 grid gap-6 md:grid-cols-2 lg:gap-8">
                    <article class="group rounded-2xl border border-[#EAEAEA] bg-[#EAEAEA]/40 p-10 shadow-[0_12px_40px_rgb(43_43_43_/0.05)] transition-[transform,box-shadow] duration-500 hover:-translate-y-1 hover:shadow-[0_24px_60px_rgb(43_43_43_/0.08)]">
                        <span class="flex h-12 w-12 items-center justify-center rounded-full border border-[#EAEAEA] bg-[#F5F5F5] text-[#6E6E6E]">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.25" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m4 8 8-4 8 4-8 4-8-4Zm0 8 8 4 8-4M4 16l8 4"/></svg>
                        </span>
                        <h3 class="font-display mt-8 text-2xl font-medium text-[#2B2B2B]">Regular Home Cleaning</h3>
                        <p class="mt-4 leading-relaxed text-[#6E6E6E]">Rhythmic upkeep that keeps surfaces composed, fabrics lifted, and air feeling lighter week after week.</p>
                    </article>

                    <article class="group rounded-2xl border border-[#EAEAEA] bg-[#EAEAEA]/40 p-10 shadow-[0_12px_40px_rgb(43_43_43_/0.05)] transition-[transform,box-shadow] duration-500 hover:-translate-y-1 hover:shadow-[0_24px_60px_rgb(43_43_43_/0.08)]">
                        <span class="flex h-12 w-12 items-center justify-center rounded-full border border-[#EAEAEA] bg-[#F5F5F5] text-[#6E6E6E]">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.25" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v18M6 9h12M8 15h8"/></svg>
                        </span>
                        <h3 class="font-display mt-8 text-2xl font-medium text-[#2B2B2B]">Deep Cleaning</h3>
                        <p class="mt-4 leading-relaxed text-[#6E6E6E]">A full reset: corners, grout, fittings, and the places life hides its dust — returned to quiet order.</p>
                    </article>

                    <article class="group rounded-2xl border border-[#EAEAEA] bg-[#EAEAEA]/40 p-10 shadow-[0_12px_40px_rgb(43_43_43_/0.05)] transition-[transform,box-shadow] duration-500 hover:-translate-y-1 hover:shadow-[0_24px_60px_rgb(43_43_43_/0.08)]">
                        <span class="flex h-12 w-12 items-center justify-center rounded-full border border-[#EAEAEA] bg-[#F5F5F5] text-[#6E6E6E]">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.25" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18ZM12 8v8"/></svg>
                        </span>
                        <h3 class="font-display mt-8 text-2xl font-medium text-[#2B2B2B]">Garden & Outdoor Refresh</h3>
                        <p class="mt-4 leading-relaxed text-[#6E6E6E]">Patios, paths, thresholds — exterior presentation brought back to calm in keeping with your interiors.</p>
                    </article>

                    <article class="group rounded-2xl border border-[#EAEAEA] bg-[#EAEAEA]/40 p-10 shadow-[0_12px_40px_rgb(43_43_43_/0.05)] transition-[transform,box-shadow] duration-500 hover:-translate-y-1 hover:shadow-[0_24px_60px_rgb(43_43_43_/0.08)]">
                        <span class="flex h-12 w-12 items-center justify-center rounded-full border border-[#EAEAEA] bg-[#F5F5F5] text-[#6E6E6E]">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.25" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </span>
                        <h3 class="font-display mt-8 text-2xl font-medium text-[#2B2B2B]">End-of-Tenancy</h3>
                        <p class="mt-4 leading-relaxed text-[#6E6E6E]">Meticulous handover cleaning that protects deposits and preserves reputation — nothing rushed.</p>
                    </article>
                </div>
            </div>
        </section>

        {{-- Pricing --}}
        <section id="pricing" class="border-t border-[#EAEAEA] bg-white py-28 md:py-36">
            <div class="mx-auto max-w-6xl px-6 md:px-10">
                <div class="max-w-2xl">
                    <p class="text-xs font-semibold uppercase tracking-[0.35em] text-[#8A8A8A]">Pricing</p>
                    <h2 class="font-display mt-4 text-4xl font-medium tracking-tight text-[#2B2B2B] md:text-5xl">Clear tiers. No theatrics.</h2>
                    <p class="mt-6 text-lg leading-relaxed text-[#6E6E6E]">Confident starting points — refined to your home on consultation.</p>
                </div>

                <div class="mt-16 grid gap-8 lg:grid-cols-4">
                    <div class="flex flex-col rounded-2xl border border-[#EAEAEA] bg-[#F5F5F5]/60 p-10 shadow-[0_16px_50px_rgb(43_43_43_/0.06)]">
                        <h3 class="font-display text-2xl text-[#2B2B2B]">Essential Clean</h3>
                        <p class="mt-6 font-display text-4xl font-medium text-[#2B2B2B]">From £45</p>
                        <p class="mt-6 flex-1 text-sm leading-relaxed text-[#6E6E6E]">Thoughtful upkeep for composed, presentable spaces — week by week.</p>
                        <a href="#contact" class="btn-premium mt-10 inline-flex justify-center rounded-full border border-[#EAEAEA] bg-white px-6 py-3 text-sm font-semibold text-[#2B2B2B]">Enquire</a>
                    </div>

                    <div class="relative flex flex-col rounded-2xl border border-[#A8B8C8]/45 bg-white p-10 shadow-[0_24px_70px_rgb(43_43_43_/0.1)] ring-1 ring-[#A8B8C8]/25">
                        <span class="absolute right-8 top-8 rounded-full bg-[#2B2B2B] px-3 py-1 text-[10px] font-semibold uppercase tracking-widest text-white">Most popular</span>
                        <h3 class="font-display text-2xl text-[#2B2B2B]">Deep Reset</h3>
                        <p class="mt-6 font-display text-4xl font-medium text-[#2B2B2B]">From £95</p>
                        <p class="mt-6 flex-1 text-sm leading-relaxed text-[#6E6E6E]">A rigorous, room-by-room reset — the benchmark for homes that hold a higher line.</p>
                        <a href="#contact" class="btn-premium mt-10 inline-flex justify-center rounded-full bg-[#2B2B2B] px-6 py-3 text-sm font-semibold text-white shadow-[0_18px_45px_rgb(43_43_43_/0.22)]">Book</a>
                    </div>

                    <div class="flex flex-col rounded-2xl border border-[#EAEAEA] bg-[#F5F5F5]/60 p-10 shadow-[0_16px_50px_rgb(43_43_43_/0.06)]">
                        <h3 class="font-display text-2xl text-[#2B2B2B]">Outdoor Refresh</h3>
                        <p class="mt-6 font-display text-4xl font-medium text-[#2B2B2B]">From £60</p>
                        <p class="mt-6 flex-1 text-sm leading-relaxed text-[#6E6E6E]">Presentable outdoor spaces — aligned with the calm of your interior.</p>
                        <a href="#contact" class="btn-premium mt-10 inline-flex justify-center rounded-full border border-[#EAEAEA] bg-white px-6 py-3 text-sm font-semibold text-[#2B2B2B]">Enquire</a>
                    </div>

                    <div class="flex flex-col rounded-2xl border border-[#EAEAEA] bg-[#F5F5F5]/60 p-10 shadow-[0_16px_50px_rgb(43_43_43_/0.06)]">
                        <h3 class="font-display text-2xl text-[#2B2B2B]">Premium Plan</h3>
                        <p class="mt-6 font-display text-4xl font-medium text-[#2B2B2B]">Custom</p>
                        <p class="mt-6 flex-1 text-sm leading-relaxed text-[#6E6E6E]">Tailored cadence for residences that require continuity at an exceptional standard.</p>
                        <a href="#contact" class="btn-premium mt-10 inline-flex justify-center rounded-full border border-[#EAEAEA] bg-white px-6 py-3 text-sm font-semibold text-[#2B2B2B]">Discuss</a>
                    </div>
                </div>
            </div>
        </section>

        {{-- Trust --}}
        <section id="trust" class="border-t border-[#EAEAEA] bg-[#F5F5F5] py-28 md:py-36">
            <div class="mx-auto max-w-6xl px-6 md:px-10">
                <div class="grid gap-16 lg:grid-cols-2 lg:items-end">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.35em] text-[#8A8A8A]">Assurance</p>
                        <h2 class="font-display mt-4 text-4xl font-medium tracking-tight text-[#2B2B2B] md:text-5xl lg:text-6xl">Not just clean — completely reset.</h2>
                    </div>
                    <p class="text-lg leading-relaxed text-[#6E6E6E] md:text-xl">
                        A premium standard is measured in silence: doors that close without grit, glass without bloom, air that feels considered.
                    </p>
                </div>

                <ul class="mt-20 grid gap-10 border-t border-[#EAEAEA] pt-16 md:grid-cols-2 lg:grid-cols-5 lg:gap-12">
                    <li class="lg:border-r lg:border-[#EAEAEA] lg:pr-10">
                        <p class="font-display text-xl text-[#2B2B2B]">Fully insured</p>
                        <p class="mt-3 text-sm leading-relaxed text-[#6E6E6E]">Work carried out with proper cover — your home treated with professional care.</p>
                    </li>
                    <li class="lg:border-r lg:border-[#EAEAEA] lg:pr-10">
                        <p class="font-display text-xl text-[#2B2B2B]">Local Cumbria team</p>
                        <p class="mt-3 text-sm leading-relaxed text-[#6E6E6E]">Familiar with regional homes, materials, and the rhythm of Cumbrian life.</p>
                    </li>
                    <li class="lg:border-r lg:border-[#EAEAEA] lg:pr-10">
                        <p class="font-display text-xl text-[#2B2B2B]">Reliable</p>
                        <p class="mt-3 text-sm leading-relaxed text-[#6E6E6E]">Punctual visits, discreet presence, schedules you can trust.</p>
                    </li>
                    <li class="lg:border-r lg:border-[#EAEAEA] lg:pr-10">
                        <p class="font-display text-xl text-[#2B2B2B]">Detail-focused</p>
                        <p class="mt-3 text-sm leading-relaxed text-[#6E6E6E]">Edges, fittings, transitions — nothing accepted as “good enough”.</p>
                    </li>
                    <li>
                        <p class="font-display text-xl text-[#2B2B2B]">High-standard finish</p>
                        <p class="mt-3 text-sm leading-relaxed text-[#6E6E6E]">Presentation that reads as intentional — quietly luxurious.</p>
                    </li>
                </ul>
            </div>
        </section>

        {{-- Contact --}}
        <section id="contact" class="border-t border-[#EAEAEA] bg-[#2B2B2B] py-28 text-[#EAEAEA] md:py-36">
            <div class="mx-auto max-w-3xl px-6 text-center md:px-10">
                <h2 class="font-display text-4xl font-medium tracking-tight text-white md:text-5xl">Reserve your standard.</h2>
                <p class="mx-auto mt-6 max-w-xl text-lg leading-relaxed text-[#8A8A8A]">
                    Share your property details — we respond with calm clarity and a tailored proposal.
                </p>
                <div class="mt-12 flex flex-col items-center justify-center gap-4 sm:flex-row sm:gap-6">
                    <a href="mailto:hello@cumbriacleaning.example" class="btn-premium inline-flex rounded-full bg-[#F5F5F5] px-10 py-4 text-sm font-semibold text-[#2B2B2B]">hello@cumbriacleaning.example</a>
                    <a href="tel:+441539000000" class="btn-premium inline-flex rounded-full border border-white/15 bg-white/5 px-10 py-4 text-sm font-semibold text-white backdrop-blur-md">01539 000 000</a>
                </div>
            </div>
        </section>

        <footer class="border-t border-white/10 bg-[#2B2B2B] py-12">
            <div class="mx-auto flex max-w-6xl flex-col items-center justify-between gap-6 px-6 text-sm text-[#8A8A8A] md:flex-row md:px-10">
                <p class="font-display text-lg text-[#EAEAEA]/90">Cumbria Cleaning Company</p>
                <p class="text-center md:text-right">Premium home care across Cumbria · © {{ date('Y') }}</p>
            </div>
        </footer>
    </body>
</html>
