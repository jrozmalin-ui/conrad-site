<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Premium home care in Cumbria — restoring surfaces, air, and the feeling of a considered home. Calm authority, showroom standards.">

        <title>The Cumbria Cleaning Company — Premium Home Care in Cumbria</title>

        {{-- First sequence frame — decoded before user reaches the cinematic block. --}}
        <link rel="preload" href="{{ asset('sequence/ezgif-frame-001.jpg') }}" as="image">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=cormorant-garamond:400,500,600|dm-sans:400,500,600" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="overflow-x-hidden bg-[#F5F5F5] font-sans text-[#2B2B2B] antialiased">
        @php
            $heroImage = 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=2800&q=82';
            /** First sequence frame — never reuse the hero URL or the hero visibly “bleeds” through the canvas before frames load. */
            $fallbackSequence = asset('sequence/ezgif-frame-001.jpg');
        @endphp

        {{-- Navigation --}}
        <header class="fixed inset-x-0 top-0 z-50 border-b border-white/10 bg-[#F5F5F5]/75 backdrop-blur-xl">
            <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-5 md:px-10">
                <a href="#" class="max-w-[min(100%,calc(100%-5.5rem))] font-display text-lg font-medium leading-snug tracking-[0.02em] text-[#2B2B2B] sm:text-xl md:max-w-none md:text-2xl">
                    The Cumbria Cleaning Company
                </a>
                <nav class="hidden items-center gap-10 text-sm font-medium tracking-wide text-[#6E6E6E] md:flex">
                    <a href="#transformation" class="transition-colors hover:text-[#2B2B2B]">Story</a>
                    <a href="#services" class="transition-colors hover:text-[#2B2B2B]">Services</a>
                    <a href="#pricing" class="transition-colors hover:text-[#2B2B2B]">Pricing</a>
                    <a href="#trust" class="transition-colors hover:text-[#2B2B2B]">Trust</a>
                    <a href="#team" class="transition-colors hover:text-[#2B2B2B]">Team</a>
                    <a
                        href="#contact"
                        class="btn-premium rounded-full border border-[#A8B8C8]/55 bg-[#A8B8C8]/15 px-5 py-2 text-[#2B2B2B] hover:border-[#A8B8C8]"
                    >
                        Book
                    </a>
                </nav>
                <details class="group relative md:hidden">
                    <summary class="list-none">
                        <span
                            class="btn-premium inline-flex items-center gap-2 rounded-full border border-[#A8B8C8]/55 bg-[#A8B8C8]/15 px-4 py-2 text-sm font-medium text-[#2B2B2B]"
                        >
                            Menu
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                class="h-4 w-4 transition-transform duration-300 group-open:rotate-180"
                                aria-hidden="true"
                            >
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 11.134l3.71-3.903a.75.75 0 1 1 1.08 1.04l-4.25 4.47a.75.75 0 0 1-1.08 0l-4.25-4.47a.75.75 0 0 1 .02-1.06Z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </summary>
                    <div class="absolute right-0 top-[calc(100%+0.75rem)] w-64 rounded-2xl border border-[#DCDCDC] bg-[#FAFAFA]/98 p-3 shadow-[0_18px_40px_rgb(43_43_43_/0.12)] backdrop-blur-xl">
                        <nav class="flex flex-col gap-1.5 text-sm font-medium text-[#4B4B4B]">
                            <a href="#transformation" class="rounded-xl px-3 py-2 transition-colors hover:bg-white hover:text-[#2B2B2B]">Story</a>
                            <a href="#services" class="rounded-xl px-3 py-2 transition-colors hover:bg-white hover:text-[#2B2B2B]">Services</a>
                            <a href="#pricing" class="rounded-xl px-3 py-2 transition-colors hover:bg-white hover:text-[#2B2B2B]">Pricing</a>
                            <a href="#trust" class="rounded-xl px-3 py-2 transition-colors hover:bg-white hover:text-[#2B2B2B]">Trust</a>
                            <a href="#team" class="rounded-xl px-3 py-2 transition-colors hover:bg-white hover:text-[#2B2B2B]">Team</a>
                            <a href="#contact" class="mt-1 inline-flex items-center justify-center rounded-xl border border-[#A8B8C8]/55 bg-[#A8B8C8]/15 px-3 py-2 text-[#2B2B2B]">
                                Book
                            </a>
                        </nav>
                    </div>
                </details>
            </div>
        </header>

        {{-- Hero — z-0 so the cinematic section always paints above during scroll overlaps --}}
        <section class="relative z-0 flex min-h-screen flex-col justify-end pb-24 pt-32 md:pb-32 md:pt-40">
            <div class="absolute inset-0">
                <img src="{{ $heroImage }}" alt="" class="h-full w-full object-cover" fetchpriority="high">
                <div class="hero-gradient absolute inset-0"></div>
            </div>

            <div class="relative z-10 mx-auto w-full max-w-5xl px-6 md:px-10">
                <p class="animate-fade-up mb-5 text-xs font-semibold uppercase tracking-[0.28em] text-[#EAEAEA]/90 md:text-sm">
                    PREMIUM HOME CARE&nbsp;&nbsp;CUMBRIA
                </p>
                <h1
                    class="animate-fade-up animate-delay-1 font-display text-balance text-5xl font-medium leading-[1.08] tracking-[-0.02em] text-white sm:leading-[1.06] md:text-7xl md:tracking-[-0.03em] lg:text-[5.25rem] lg:leading-[1.04]"
                >
                    <span class="block">Most homes feel fine.</span>
                    <span class="mt-2 block sm:mt-3">Very few feel right.</span>
                </h1>
                <div
                    class="animate-fade-up animate-delay-2 mt-10 max-w-xl space-y-5 text-base leading-relaxed text-[#EAEAEA]/93 md:mt-12 md:max-w-2xl md:text-lg md:leading-relaxed"
                >
                    <p class="text-balance">Over time, the small things slip.</p>
                    <p class="text-balance">
                        Surfaces lose their finish.<br>
                        Air feels heavier.<br>
                        And the rooms stop feeling cozy.
                    </p>
                    <p class="text-balance text-[#F0F0F0]">We restore your home to the standard you deserve.</p>
                </div>
                <div class="animate-fade-up animate-delay-3 mt-12 flex flex-col gap-4 sm:flex-row sm:items-center md:mt-14">
                    <a
                        href="#contact"
                        class="btn-premium inline-flex items-center justify-center rounded-full bg-[#F5F5F5] px-10 py-4 text-center text-sm font-semibold tracking-wide text-[#2B2B2B] shadow-[0_16px_40px_rgb(0_0_0_/0.12)]"
                    >
                        Book a Premium Clean
                    </a>
                    <a
                        href="#transformation"
                        class="btn-premium inline-flex items-center justify-center rounded-full border border-white/35 bg-white/10 px-10 py-4 text-center text-sm font-semibold tracking-wide text-white backdrop-blur-md"
                    >
                        See the Difference
                    </a>
                </div>
                <p class="animate-fade-up animate-delay-4 mt-8 max-w-xl text-sm leading-relaxed text-[#EAEAEA]/78 md:text-base">
                    Most clients notice the difference immediately.
                </p>
            </div>
        </section>

        {{-- Cinematic scroll sequence — centred canvas + single bottom narrative (no side rails) --}}
        <section
            id="transformation"
            data-scroll-sequence
            data-manifest-url="/sequence/manifest.json"
            data-preload-window="14"
            data-max-dpr="2"
            data-sequence-bg="#090909"
            data-reverse-sequence="false"
            data-scroll-smoothing="1"
            data-chapter-feather="0.024"
            class="relative z-[12] min-h-[680vh] scroll-mt-0 bg-[#090909]"
        >
            <div class="pointer-events-none absolute inset-0 z-0 bg-[#090909]"></div>
            <div
                class="pointer-events-none absolute inset-0 z-[1] bg-[radial-gradient(ellipse_82%_65%_at_50%_42%,rgb(36_36_38)_0%,transparent_58%)] opacity-88"
                aria-hidden="true"
            ></div>
            <div class="story-vignette pointer-events-none absolute inset-0 z-[2]" aria-hidden="true"></div>

            <div class="sticky top-0 z-10 isolate flex h-screen flex-col overflow-hidden bg-[#090909]">
                <div
                    class="relative z-[5] mx-auto flex min-h-0 w-full max-w-[1040px] flex-1 flex-col gap-y-2 px-5 sm:gap-y-3 sm:px-8 lg:gap-y-4 lg:px-12"
                >
                    <header class="relative z-30 shrink-0 pt-[5rem] text-center sm:pt-24 lg:pt-[6rem]">
                        <div
                            class="cinema-glass-panel mx-auto max-w-xl px-5 py-4 shadow-[0_16px_48px_rgb(0_0_0_/0.45)] sm:max-w-2xl sm:px-7 sm:py-5"
                        >
                            <p class="text-[10px] font-semibold uppercase tracking-[0.4em] text-white/55">The Difference</p>
                            <h2 class="font-display mt-2 max-w-3xl text-balance text-2xl font-medium tracking-tight text-white sm:mt-3 sm:text-3xl md:text-[2.35rem] md:leading-[1.08]">
                                From Lived-In… to Showroom Ready.
                            </h2>
                        </div>
                    </header>

                    {{-- Equal gap-y above/below via parent; centre sequence in flex-1 so it never stacks over the chapter glass. --}}
                    <div class="relative z-[5] flex min-h-0 flex-1 flex-col items-center justify-center overflow-hidden">
                        <div class="relative w-full max-h-[min(30vh,420px)] aspect-[16/10] bg-[#090909] sm:max-h-[min(34vh,480px)] lg:max-h-[min(36vh,520px)]">
                            <div
                                class="pointer-events-none absolute -inset-[12%] -z-10 rounded-[50%] bg-[radial-gradient(circle_at_50%_48%,rgb(255_255_255/_0.06)_0%,transparent_58%)] blur-3xl"
                                aria-hidden="true"
                            ></div>
                            <img
                                src="{{ $fallbackSequence }}"
                                alt=""
                                data-sequence-fallback
                                class="absolute inset-0 h-full w-full object-contain opacity-100 transition-opacity duration-700"
                            >
                            <canvas
                                data-sequence-canvas
                                class="pointer-events-none absolute inset-0 z-10 h-full w-full opacity-0"
                            ></canvas>
                        </div>
                    </div>

                    <div class="relative z-30 shrink-0 pb-[max(0.5rem,env(safe-area-inset-bottom))] sm:pb-3 lg:pb-4">
                        {{-- Compact strip so chapter glass stays in view; tall copy scrolls inside .cinema-chapter-scroll. --}}
                        <div class="relative mx-auto min-h-[min(34vh,400px)] w-full max-w-2xl sm:min-h-[min(36vh,420px)] lg:min-h-[min(36vh,440px)]">
                                <article
                                    data-story-chapter
                                    data-from="0"
                                    data-to="0.18"
                                    data-parallax-strength="6"
                                    class="pointer-events-none absolute inset-x-0 top-0 flex flex-col justify-start opacity-0"
                                >
                                    <div class="cinema-glass-panel cinema-chapter-scroll px-5 py-4 text-center shadow-[0_16px_48px_rgb(0_0_0_/0.45)] sm:px-7 sm:py-5">
                                        <p class="mb-2 text-[10px] font-semibold uppercase tracking-[0.32em] text-white/48">Recognition</p>
                                        <p class="font-display text-[1.65rem] font-medium leading-[1.12] tracking-tight text-white sm:text-4xl">
                                            Life gets busy.
                                        </p>
                                        <div class="mx-auto mt-4 max-w-lg space-y-3 text-[13px] leading-relaxed text-white/62 sm:text-[0.9375rem]">
                                            <p>It does not happen all at once.</p>
                                            <p>
                                                A surface goes untouched.<br>
                                                A corner gets ignored.<br>
                                                The small details stop standing out.
                                            </p>
                                            <p>
                                                At first it still feels fine.<br>
                                                Then slowly the space feels heavier.<br>
                                                Less calm. Less put together.
                                            </p>
                                            <p>
                                                You stop noticing it.<br>
                                                But you feel it every time you walk in.
                                            </p>
                                        </div>
                                    </div>
                                </article>

                                <article
                                    data-story-chapter
                                    data-from="0.18"
                                    data-to="0.36"
                                    data-parallax-strength="6"
                                    class="pointer-events-none absolute inset-x-0 top-0 flex flex-col justify-start opacity-0"
                                >
                                    <div class="cinema-glass-panel cinema-chapter-scroll px-5 py-4 text-center shadow-[0_16px_48px_rgb(0_0_0_/0.45)] sm:px-7 sm:py-5">
                                        <p class="mb-2 text-[10px] font-semibold uppercase tracking-[0.32em] text-white/48">The gap</p>
                                        <p class="font-display text-[1.65rem] font-medium leading-[1.12] tracking-tight text-white sm:text-4xl">
                                            Details get missed.
                                        </p>
                                        <div class="mx-auto mt-4 max-w-lg space-y-3 text-[13px] leading-relaxed text-white/62">
                                            <p>
                                                Worktops lose their finish.<br>
                                                Floors carry more than they should.<br>
                                                The places you do not look begin to show.
                                            </p>
                                            <p>
                                                It is not about mess.<br>
                                                It is about the standard quietly slipping.
                                            </p>
                                            <p>And once it slips, it is hard to get it back on your own.</p>
                                        </div>
                                    </div>
                                </article>

                                <article
                                    data-story-chapter
                                    data-from="0.36"
                                    data-to="0.56"
                                    data-parallax-strength="6"
                                    class="pointer-events-none absolute inset-x-0 top-0 flex flex-col justify-start opacity-0"
                                >
                                    <div class="cinema-glass-panel cinema-chapter-scroll px-5 py-4 text-center shadow-[0_16px_48px_rgb(0_0_0_/0.45)] sm:px-7 sm:py-5">
                                        <p class="mb-2 text-[10px] font-semibold uppercase tracking-[0.32em] text-white/48">The shift</p>
                                        <p class="font-display text-[1.65rem] font-medium leading-[1.12] tracking-tight text-white sm:text-4xl">
                                            A proper clean changes everything.
                                        </p>
                                        <div class="mx-auto mt-4 max-w-lg space-y-3 text-[13px] leading-relaxed text-white/62">
                                            <p>This is where most cleaning stops short.</p>
                                            <p>
                                                We do not tidy.<br>
                                                We reset the space.
                                            </p>
                                            <p>
                                                Every surface is brought back.<br>
                                                Every room feels intentional again.<br>
                                                The air feels lighter.<br>
                                                The home feels clear.
                                            </p>
                                        </div>
                                    </div>
                                </article>

                                <article
                                    data-story-chapter
                                    data-from="0.56"
                                    data-to="0.76"
                                    data-parallax-strength="6"
                                    class="pointer-events-none absolute inset-x-0 top-0 flex flex-col justify-start opacity-0"
                                >
                                    <div class="cinema-glass-panel cinema-chapter-scroll px-5 py-4 text-center shadow-[0_16px_48px_rgb(0_0_0_/0.45)] sm:px-7 sm:py-5">
                                        <p class="mb-2 text-[10px] font-semibold uppercase tracking-[0.32em] text-white/48">Precision</p>
                                        <p class="font-display text-[1.65rem] font-medium leading-[1.12] tracking-tight text-white sm:text-4xl">
                                            Every surface. Every detail.
                                        </p>
                                        <div class="mx-auto mt-4 max-w-lg space-y-3 text-[13px] leading-relaxed text-white/58">
                                            <p>
                                                Nothing is skipped.<br>
                                                Nothing is rushed.
                                            </p>
                                            <p>
                                                Kitchens, bathrooms, living spaces.<br>
                                                Handled with care and consistency.
                                            </p>
                                            <p>
                                                The result is not just clean.<br>
                                                It feels considered.
                                            </p>
                                        </div>
                                    </div>
                                </article>

                                <article
                                    data-story-chapter
                                    data-from="0.76"
                                    data-to="1"
                                    data-parallax-strength="5"
                                    class="pointer-events-none absolute inset-x-0 top-0 flex flex-col items-center justify-start opacity-0"
                                >
                                    <div class="cinema-glass-panel cinema-chapter-scroll w-full px-5 py-5 text-center shadow-[0_16px_48px_rgb(0_0_0_/0.45)] sm:px-8 sm:py-6">
                                        <p class="mb-2 text-[10px] font-semibold uppercase tracking-[0.32em] text-white/48">Your home</p>
                                        <p class="font-display text-[1.65rem] font-medium leading-[1.12] tracking-tight text-white sm:text-4xl">
                                            Back to calm. Back to perfect.
                                        </p>
                                        <div class="mx-auto mt-4 max-w-lg space-y-3 text-[13px] leading-relaxed text-white/60">
                                            <p>This is how your home should feel every time you walk in.</p>
                                            <p>Clean. Light. In control.</p>
                                        </div>
                                        <a
                                            href="#contact"
                                            class="btn-premium pointer-events-auto mt-7 inline-flex w-max items-center rounded-full border border-white/40 bg-white/[0.12] px-9 py-3.5 text-[13px] font-semibold tracking-wide text-white shadow-[0_12px_40px_rgb(0_0_0_/0.35)] backdrop-blur-md transition hover:border-white/55 hover:bg-white/[0.18]"
                                        >
                                            Book a Premium Clean
                                        </a>
                                        <p class="pointer-events-auto mx-auto mt-4 max-w-md text-center text-[12px] leading-relaxed text-white/48">
                                            Tell us about your home and we will handle the rest.
                                        </p>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Services — premium positioning, pain then transformation --}}
        <section id="services" class="border-t border-[#E6E6E6] bg-[#F8F7F5] py-28 md:py-40">
            <div class="mx-auto max-w-6xl px-6 md:px-10">
                <header class="max-w-3xl">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.42em] text-[#9A9A9A]">Services</p>
                    <h2 class="font-display mt-6 text-[2.35rem] font-medium leading-[1.08] tracking-tight text-[#1F1F1F] md:text-5xl lg:text-[3.25rem]">
                        A higher standard for how your home feels.
                    </h2>
                    <div class="mt-10 space-y-5 text-lg leading-[1.65] text-[#636363] md:text-xl md:leading-relaxed">
                        <p>Most homes are not messy. They are just not maintained to the level they could be.</p>
                        <p>
                            Surfaces lose their finish. Air feels heavier. Details fade into the background.
                        </p>
                        <p class="text-[#4A4A4A]">We bring everything back to where it should be.</p>
                    </div>
                </header>

                <div class="mt-20 grid gap-8 md:grid-cols-2 md:gap-10 lg:mt-24 lg:gap-12">
                    <article
                        class="group flex flex-col rounded-[1.75rem] border border-[#EBEBEB] bg-white p-12 shadow-[0_4px_42px_rgb(43_43_43_/0.035)] transition-all duration-700 ease-[cubic-bezier(0.22,1,0.36,1)] md:p-14 lg:p-16 hover:-translate-y-2 hover:border-[#E0E0E0] hover:shadow-[0_28px_70px_rgb(43_43_43_/0.07)]"
                    >
                        <span class="font-mono text-[11px] font-medium tracking-[0.28em] text-[#B8B8B8]">01</span>
                        <h3 class="font-display mt-8 text-[1.85rem] font-medium leading-snug tracking-tight text-[#1F1F1F] md:text-[2rem]">
                            Regular Home Cleaning
                        </h3>
                        <div class="mt-10 space-y-6 text-[15px] leading-[1.75] text-[#5C5C5C] md:text-base">
                            <p>It starts small.</p>
                            <p>
                                A surface missed. Dust settling where it used to feel fresh. Rooms that no longer feel as light as they should.
                            </p>
                            <p>Over time it builds into something you stop noticing, but always feel.</p>
                            <p>We keep your home in a constant state of calm.</p>
                            <p>Clean, balanced, and ready every time you walk through the door.</p>
                        </div>
                    </article>

                    <article
                        class="group flex flex-col rounded-[1.75rem] border border-[#EBEBEB] bg-white p-12 shadow-[0_4px_42px_rgb(43_43_43_/0.035)] transition-all duration-700 ease-[cubic-bezier(0.22,1,0.36,1)] md:p-14 lg:p-16 hover:-translate-y-2 hover:border-[#E0E0E0] hover:shadow-[0_28px_70px_rgb(43_43_43_/0.07)]"
                    >
                        <span class="font-mono text-[11px] font-medium tracking-[0.28em] text-[#B8B8B8]">02</span>
                        <h3 class="font-display mt-8 text-[1.85rem] font-medium leading-snug tracking-tight text-[#1F1F1F] md:text-[2rem]">
                            Deep Cleaning
                        </h3>
                        <div class="mt-10 space-y-6 text-[15px] leading-[1.75] text-[#5C5C5C] md:text-base">
                            <p>Some areas do not get touched in day to day cleaning.</p>
                            <p>Corners, grout, fittings, the places where wear quietly builds.</p>
                            <p>This is where a home starts to feel tired.</p>
                            <p>We go into the detail.</p>
                            <p>
                                Restoring surfaces, lifting the weight out of the space, and bringing everything back to a standard you can see and feel immediately.
                            </p>
                        </div>
                    </article>

                    <article
                        class="group flex flex-col rounded-[1.75rem] border border-[#EBEBEB] bg-white p-12 shadow-[0_4px_42px_rgb(43_43_43_/0.035)] transition-all duration-700 ease-[cubic-bezier(0.22,1,0.36,1)] md:p-14 lg:p-16 hover:-translate-y-2 hover:border-[#E0E0E0] hover:shadow-[0_28px_70px_rgb(43_43_43_/0.07)]"
                    >
                        <span class="font-mono text-[11px] font-medium tracking-[0.28em] text-[#B8B8B8]">03</span>
                        <h3 class="font-display mt-8 text-[1.85rem] font-medium leading-snug tracking-tight text-[#1F1F1F] md:text-[2rem]">
                            Garden and Outdoor Refresh
                        </h3>
                        <div class="mt-10 space-y-6 text-[15px] leading-[1.75] text-[#5C5C5C] md:text-base">
                            <p>The outside of your home sets the tone before you even step inside.</p>
                            <p>Patios lose their finish. Paths fade. Outdoor areas stop feeling looked after.</p>
                            <p>It changes how the whole property feels.</p>
                            <p>We bring it back to clean, presentable, and aligned with the standard inside.</p>
                        </div>
                    </article>

                    <article
                        class="group flex flex-col rounded-[1.75rem] border border-[#EBEBEB] bg-white p-12 shadow-[0_4px_42px_rgb(43_43_43_/0.035)] transition-all duration-700 ease-[cubic-bezier(0.22,1,0.36,1)] md:p-14 lg:p-16 hover:-translate-y-2 hover:border-[#E0E0E0] hover:shadow-[0_28px_70px_rgb(43_43_43_/0.07)]"
                    >
                        <span class="font-mono text-[11px] font-medium tracking-[0.28em] text-[#B8B8B8]">04</span>
                        <h3 class="font-display mt-8 text-[1.85rem] font-medium leading-snug tracking-tight text-[#1F1F1F] md:text-[2rem]">
                            End of Tenancy
                        </h3>
                        <div class="mt-10 space-y-6 text-[15px] leading-[1.75] text-[#5C5C5C] md:text-base">
                            <p>This is where most people underestimate the standard required.</p>
                            <p>A quick clean is not enough. Every detail is judged.</p>
                            <p>Missed areas cost time, money, and reputation.</p>
                            <p>We prepare the property properly.</p>
                            <p>So it is handed over clean, complete, and ready without question.</p>
                        </div>
                    </article>
                </div>

                <div class="mx-auto mt-24 max-w-3xl border-t border-[#E6E6E6] pt-20 text-center md:mt-32 md:pt-28">
                    <h3 class="font-display text-[2rem] font-medium tracking-tight text-[#1F1F1F] md:text-4xl lg:text-[2.75rem]">
                        Not just cleaned. Reset.
                    </h3>
                    <p class="mx-auto mt-8 max-w-2xl text-lg leading-relaxed text-[#636363] md:text-xl">
                        Once you experience your home at the right standard, it is hard to go back.
                    </p>
                    <div class="mt-12 flex flex-col items-center justify-center gap-4 sm:mt-14 sm:flex-row sm:gap-5">
                        <a
                            href="#contact"
                            class="btn-premium inline-flex min-w-[14rem] justify-center rounded-full bg-[#1F1F1F] px-10 py-4 text-sm font-semibold tracking-wide text-white shadow-[0_18px_48px_rgb(43_43_43_/0.18)] transition hover:bg-[#2B2B2B]"
                        >
                            Book a Premium Clean
                        </a>
                        <a
                            href="#contact"
                            class="btn-premium inline-flex min-w-[14rem] justify-center rounded-full border border-[#D4D4D4] bg-white px-10 py-4 text-sm font-semibold tracking-wide text-[#2B2B2B] transition hover:border-[#B8B8B8]"
                        >
                            Get a Quote
                        </a>
                    </div>
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

        {{-- Assurance — outcome-led trust --}}
        <section id="trust" class="border-t border-[#EAEAEA] bg-[#F5F5F5] py-28 md:py-36">
            <div class="mx-auto max-w-6xl px-6 md:px-10">
                <div class="grid gap-12 lg:grid-cols-2 lg:items-start lg:gap-16">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.35em] text-[#8A8A8A]">Assurance</p>
                        <h2 class="font-display mt-4 text-4xl font-medium tracking-tight text-[#2B2B2B] md:text-5xl lg:text-6xl">
                            <span class="block">Not just a clean.</span>
                            <span class="block">A brand new standard.</span>
                        </h2>
                    </div>
                    <div class="flex flex-col gap-6 text-lg leading-relaxed text-[#6E6E6E] md:text-xl">
                        <p>Most cleaners bring things back to acceptable.</p>
                        <p>That is not what we do.</p>
                        <p>We bring back your home.</p>
                        <p>That feeling on a warm summers eve.</p>
                        <p class="font-medium text-[#4A4A4A]">Warm. Calm. Relaxed.</p>
                    </div>
                </div>

                <ul class="mt-20 grid gap-10 border-t border-[#EAEAEA] pt-16 md:grid-cols-2 lg:grid-cols-5 lg:gap-12">
                    <li class="lg:border-r lg:border-[#EAEAEA] lg:pr-10">
                        <p class="font-display text-xl text-[#2B2B2B]">Fully insured</p>
                        <div class="mt-4 space-y-4 text-sm leading-relaxed text-[#6E6E6E]">
                            <p>Your home is handled with care from start to finish.</p>
                            <p>
                                Everything is protected, accounted for, and treated with the level of respect you would expect from a premium service.
                            </p>
                        </div>
                    </li>
                    <li class="lg:border-r lg:border-[#EAEAEA] lg:pr-10">
                        <p class="font-display text-xl text-[#2B2B2B]">Local Cumbria team</p>
                        <div class="mt-4 space-y-4 text-sm leading-relaxed text-[#6E6E6E]">
                            <p>We understand the homes, materials, and expectations across Cumbria.</p>
                            <p>This is not a one size approach.</p>
                            <p>It is a service that fits how your home is lived in.</p>
                        </div>
                    </li>
                    <li class="lg:border-r lg:border-[#EAEAEA] lg:pr-10">
                        <p class="font-display text-xl text-[#2B2B2B]">Reliable</p>
                        <div class="mt-4 space-y-4 text-sm leading-relaxed text-[#6E6E6E]">
                            <p>You do not need to chase, check, or second guess.</p>
                            <p>
                                We arrive on time, deliver to standard, and leave your home exactly as expected every single visit.
                            </p>
                        </div>
                    </li>
                    <li class="lg:border-r lg:border-[#EAEAEA] lg:pr-10">
                        <p class="font-display text-xl text-[#2B2B2B]">Detail focused</p>
                        <div class="mt-4 space-y-4 text-sm leading-relaxed text-[#6E6E6E]">
                            <p>This is where the difference is made.</p>
                            <p>Edges, fittings, surfaces, transitions.</p>
                            <p>Nothing is overlooked. Nothing is rushed.</p>
                        </div>
                    </li>
                    <li>
                        <p class="font-display text-xl text-[#2B2B2B]">High standard finish</p>
                        <div class="mt-4 space-y-4 text-sm leading-relaxed text-[#6E6E6E]">
                            <p>The result is not just clean.</p>
                            <p>It feels lighter, sharper, and more put together.</p>
                            <p>A home that looks right and feels right the moment you step inside.</p>
                        </div>
                    </li>
                </ul>

                <div class="mx-auto mt-20 max-w-3xl border-t border-[#EAEAEA] pt-16 text-center md:mt-24 md:pt-20">
                    <h3 class="font-display text-2xl font-medium leading-snug tracking-tight text-[#2B2B2B] md:text-3xl">
                        Once you experience the right standard, it becomes the only one that feels acceptable.
                    </h3>
                    <a
                        href="#contact"
                        class="btn-premium mt-10 inline-flex justify-center rounded-full bg-[#2B2B2B] px-10 py-4 text-sm font-semibold tracking-wide text-white shadow-[0_18px_48px_rgb(43_43_43_/0.18)] transition hover:bg-[#1F1F1F]"
                    >
                        Book a Premium Clean
                    </a>
                    <p class="mt-5 text-sm leading-relaxed text-[#8A8A8A]">We will take care of the rest.</p>
                </div>
            </div>
        </section>

        {{--
            Meet the Team — display frame matches common corporate team pages:
            portrait 4:5 card ~280–320px wide (sources often 640×800 or 800×1000 @2x for retina).
            Grid caps at 3 cols so headshots stay readable when the team grows.
        --}}
        <section id="team" class="border-t border-[#EAEAEA] bg-[#F5F5F5] py-24 md:py-32">
            <div class="mx-auto max-w-6xl px-6 md:px-10">
                <h2 class="font-display text-center text-4xl font-medium tracking-tight text-[#2B2B2B] md:text-5xl lg:text-left">
                    Meet the Team
                </h2>
                <div
                    class="mt-14 grid grid-cols-1 gap-x-10 gap-y-14 sm:grid-cols-2 lg:grid-cols-3 lg:gap-x-12"
                >
                    <article class="flex w-full min-w-0 max-w-[320px] flex-col text-left">
                        <div
                            class="aspect-[4/5] w-full overflow-hidden rounded-2xl bg-white shadow-[0_8px_40px_rgb(43_43_43_/0.06)] ring-1 ring-[#EBEBEB]"
                        >
                            <img
                                src="{{ asset('images/team/conrad-director.png') }}"
                                alt="Conrad"
                                width="800"
                                height="1000"
                                class="h-full w-full object-contain object-center p-4"
                                loading="lazy"
                                decoding="async"
                            >
                        </div>
                        <p class="font-display mt-5 text-2xl font-medium tracking-tight text-[#2B2B2B] md:text-3xl lg:text-[2rem]">
                            Conrad, Director
                        </p>
                    </article>
                </div>
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
                <p class="text-center font-display text-lg leading-snug text-[#EAEAEA]/90 md:text-left">The Cumbria Cleaning Company</p>
                <p class="text-center md:text-right">Premium home care across Cumbria · © {{ date('Y') }}</p>
            </div>
        </footer>
    </body>
</html>
