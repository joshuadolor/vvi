@extends('layouts.public')

@php
    $company = config('company');
    $websiteSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        'name' => $company['name'],
        'url' => url('/'),
        'description' => $company['description'],
    ];
@endphp

@section('content')
    {{-- Top Navigation --}}
    <header class="w-full top-0 sticky z-50 bg-surface-container-lowest border-b border-outline-variant">
        <nav class="flex justify-between items-center h-20 px-margin-mobile lg:px-margin-desktop max-w-container-max mx-auto" aria-label="Primary">
            <div class="flex items-center justify-between w-full gap-12">
                <a class="font-headline-md text-headline-md font-bold text-on-surface tracking-tighter" href="{{ url('/') }}">
                    VICTOR <span class="text-dragon-red">VANGUARD</span>
                </a>

                {{-- Desktop links --}}
                <div class="hidden md:flex items-center gap-8 font-label-caps text-label-caps uppercase h-20">
                    <a class="inline-flex items-center h-full border-b-2 border-dragon-red text-dragon-red transition-colors" href="#services" data-nav-link>Services</a>
                    <a class="inline-flex items-center h-full border-b-2 border-transparent text-on-surface-variant hover:text-on-surface transition-colors" href="#about" data-nav-link>Who We Are</a>
                    <a class="inline-flex items-center h-full border-b-2 border-transparent text-on-surface-variant hover:text-on-surface transition-colors" href="#advantage" data-nav-link>Advantage</a>
                    <a class="inline-flex items-center h-full border-b-2 border-transparent text-on-surface-variant hover:text-on-surface transition-colors" href="#catalog" data-nav-link>Catalog</a>
                    <a class="inline-flex items-center h-full border-b-2 border-transparent text-on-surface-variant hover:text-on-surface transition-colors" href="#partners" data-nav-link>Partners</a>
                </div>

                {{-- Mobile burger --}}
                <button
                    type="button"
                    id="nav-toggle"
                    class="md:hidden inline-flex items-center justify-center w-12 h-12 border border-outline-variant text-on-surface hover:border-dragon-red hover:text-dragon-red transition-colors"
                    aria-controls="mobile-nav"
                    aria-expanded="false"
                    aria-label="Open menu"
                >
                    <span class="material-symbols-outlined text-3xl" data-nav-icon-open>menu</span>
                    <span class="material-symbols-outlined text-3xl hidden" data-nav-icon-close>close</span>
                </button>
            </div>
        </nav>

        {{-- Mobile panel --}}
        <div
            id="mobile-nav"
            class="md:hidden hidden border-t border-outline-variant bg-surface-container-lowest"
            hidden
        >
            <div class="flex flex-col font-label-caps text-label-caps uppercase px-margin-mobile py-4">
                <a class="py-4 border-b border-outline-variant text-dragon-red" href="#services" data-nav-link data-mobile-nav-link>Services</a>
                <a class="py-4 border-b border-outline-variant text-on-surface-variant hover:text-on-surface transition-colors" href="#about" data-nav-link data-mobile-nav-link>Who We Are</a>
                <a class="py-4 border-b border-outline-variant text-on-surface-variant hover:text-on-surface transition-colors" href="#advantage" data-nav-link data-mobile-nav-link>Advantage</a>
                <a class="py-4 border-b border-outline-variant text-on-surface-variant hover:text-on-surface transition-colors" href="#catalog" data-nav-link data-mobile-nav-link>Catalog</a>
                <a class="py-4 text-on-surface-variant hover:text-on-surface transition-colors" href="#partners" data-nav-link data-mobile-nav-link>Partners</a>
            </div>
        </div>
    </header>

    <main>
        {{-- Hero --}}
        <section class="relative min-h-[720px] lg:h-[880px] overflow-hidden flex items-center">
            <div class="absolute inset-0 z-0">
                <div class="w-full h-full bg-cover bg-center scale-105" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuB3cCU7IgxIlBQqBXk8Pb7vIWt1apEIb87S3YRiTOGwgo7j2Lmb2ruDnO9j4L0mRXsRyfWt0avYuc5gDwFDKLSBrpE_XJznuFUWf6LrIeLjyA6vt_U-qxqY0NFFr3GVlmnU_9cKSqWkv48T1Fi5rsoGQ_p7I6_qDsXMc2048_5HDSTg6OdqqlP83WRkeAOtJ-hSa07XB6BporDoJqz7Th8WRBXzNJ6qHGgPmNMFcNdiFA0BRp33IOmuGjwvj5fgUDbJALk_ZEaTcVM')"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-surface-container-lowest via-surface-container-lowest/70 to-transparent"></div>
            </div>
            <div class="relative z-10 px-margin-mobile lg:px-margin-desktop max-w-container-max mx-auto w-full">
                <div class="max-w-3xl space-y-8">
                    <div class="flex items-center gap-4">
                        <span class="h-px w-12 bg-dragon-red"></span>
                        <span class="font-label-caps text-label-caps text-secondary uppercase tracking-[0.2em]">
                            The Verification Standard
                            @if (! empty($company['contact']['locations'] ?? null))
                                | {{ implode(' - ', $company['contact']['locations']) }}
                            @endif
                        </span>
                    </div>
                    <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-on-surface leading-[1.1]">
                        VERIFIED <br> GLOBAL <br> <span class="serif-italic text-dragon-red">SOURCING.</span>
                    </h1>
                    <p class="font-body-lg text-body-lg text-on-surface-variant max-w-lg">
                        Independent factory verification, supplier due diligence, and quality assurance. We personally evaluate manufacturers so you can source from China with confidence.
                    </p>
                    <div class="flex flex-wrap items-center gap-6 pt-4">
                        <a href="#services" class="bg-dragon-red text-white font-label-caps text-label-caps px-10 py-5 uppercase tracking-widest hover:brightness-110 active:scale-95 transition-all">
                            Explore Services
                        </a>
                        <a href="#partners" class="border border-secondary text-secondary font-label-caps text-label-caps px-10 py-5 uppercase tracking-widest hover:bg-secondary hover:text-surface-container-lowest transition-all metallic-sheen">
                            Verified Partners
                        </a>
                    </div>
                </div>
            </div>
            <div class="absolute bottom-0 right-0 bg-surface-container-low p-12 hidden lg:block border-t border-l border-outline-variant">
                <div class="grid grid-cols-2 gap-12">
                    <div>
                        <div class="font-label-caps text-label-caps text-dragon-red mb-2">VERIFICATION MODEL</div>
                        <div class="font-headline-md text-headline-md">ON-SITE</div>
                    </div>
                    <div>
                        <div class="font-label-caps text-label-caps text-dragon-red mb-2">TRUST MARK</div>
                        <div class="font-headline-md text-headline-md">VVI VERIFIED</div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Core Services --}}
        <section id="services" class="py-24 px-margin-mobile lg:px-margin-desktop max-w-container-max mx-auto">
            <div class="flex flex-col sm:flex-row justify-between sm:items-end gap-6 mb-16">
                <div>
                    <h2 class="font-headline-lg text-headline-lg text-on-surface">Core Services</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant mt-2">Independent sourcing, verification, and quality assurance.</p>
                </div>
                <a class="font-label-caps text-label-caps uppercase border-b border-dragon-red text-dragon-red pb-1 self-start" href="#contact">Request a Consultation</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter h-auto md:h-[600px]">
                <div class="md:col-span-8 group relative overflow-hidden border border-outline-variant min-h-[280px]">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCIvelpEoTkK7jwYFlm8y1OPss74xzCxbiSrEJ3XWDnwppYGRGSlK3p6suMu_5zvtIPiP6BbKQKoqWnTCqkGjAPa6xO7IVbh783XW2V-NK4XUBVN_G2gPxfB622BFFU4S1eC7862zz5FP0o1H1aCknbsFs_0wOsaL8RnkPiDTAbzF9Hpm4vZuCyPN5oBrLoV39wNTQ4B0Zt_XE24aXPB83bZZoL3qy9t7atjsufsctf-4gOxbCFycNLk-7UvlD9Z9TvNiT4Zd_ta98')"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest to-transparent"></div>
                    <div class="absolute bottom-10 left-10 right-10">
                        <span class="font-label-caps text-label-caps text-secondary mb-4 block">FACTORY VERIFICATION</span>
                        <h3 class="font-headline-md text-headline-md text-on-surface">Physical Factory Visits</h3>
                        <p class="font-body-md text-on-surface max-w-md mt-2">Business registration checks, facility assessment, and production capability review before any manufacturer is recommended.</p>
                   
                    </div>
                </div>
                <div class="md:col-span-4 group relative overflow-hidden border border-outline-variant min-h-[280px]">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBlJ4kfeUracW7rXD4VDdvBuAr3v6ss1N5mwZ0uZQqfhhdSyMDi0-mYU5XP-Z6FMpR9eoyJXJABg9A5d7KyzF7kG-GyoWgr23C9zltNIYFhmT6AXapHMO7QUoA8T04LvBzQCNdY4i5Y0MOEj9rm0Acx1NNjTj4KipOeTRpV55RcXuC9YM7mqLOQyicKsNESMvAMjjv8HtMyYFy6xK6ThzawSAej4T6aknhToW27LfDAprJeN7D5DgsY8owfPyEoBFqr9ayUeZVk6bU')"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest to-transparent"></div>
                    <div class="absolute bottom-10 left-10 right-10">
                        <span class="font-label-caps text-label-caps text-secondary mb-4 block">QUALITY ASSURANCE</span>
                        <h3 class="font-headline-md text-headline-md text-white">Pre-Shipment Inspections</h3>
                    </div>
                </div>
            </div>
        </section>

        {{-- Who We Are — copy only from provided source; no invented supporting text --}}
        <section id="about" class="py-32 px-margin-mobile lg:px-margin-desktop max-w-container-max mx-auto border-y border-outline-variant">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-20">
                <aside class="lg:col-span-4 lg:sticky lg:top-28 self-start">
                    <span class="font-label-caps text-label-caps text-secondary uppercase tracking-[0.2em] block mb-6">Who We Are</span>
                    <h2 class="font-headline-lg text-headline-lg text-on-surface">Born from a Legacy of Trust</h2>
                </aside>

                <div class="lg:col-span-8 max-w-3xl space-y-20">
                    <div class="space-y-8">
                        <p class="font-body-lg text-body-lg text-on-surface leading-relaxed">
                            Victor Vanguard International is not just a business; it is the evolution of a 54-year legacy of commercial excellence and unbreakable trust.
                        </p>
                        <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                            Our founder comes from a family of ten siblings, all stakeholders in DVS Dolor Marketing Inc.—a legendary institution in the Bicol region of the Philippines (Daet, Camarines Norte). DVS Dolor Marketing was built from the ground up by a resilient, visionary mother who single-handedly turned a humble beginning into a regional powerhouse. Today, that single enterprise has blossomed into a diverse portfolio of successful businesses spanning all over Luzon, recognized as the premier destination for leading branded appliances and furniture.
                        </p>
                        <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                            Growing up within this ecosystem, our founder learned firsthand that a company’s most valuable asset isn't its inventory—it is its reputation. In our family business, trust wasn't a marketing buzzword; it was the foundation of our existence, proven daily through an unwavering commitment to legendary after-sales service.
                        </p>
                    </div>

                    <div>
                        <h3 class="font-headline-md text-headline-md text-on-surface mb-8">Bringing High Standards to Global Trade</h3>
                        <div class="space-y-8">
                            <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                                Steeped in a tradition where high standards, uncompromising quality, and justifiable spending govern every decision, Victor Vanguard International was founded to bring those exact values to the global B2B landscape.
                            </p>
                            <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                                We saw a world where businesses were losing time, money, and trust to unverified entities and corporate scams. Drawing from half a century of family business ethics, we decided to build a vanguard against that inefficiency.
                            </p>
                        </div>
                    </div>

                    <div>
                        <h3 class="font-headline-md text-headline-md text-on-surface mb-10">Our Core Beliefs</h3>
                        <dl class="border-t border-outline-variant">
                            <div class="grid grid-cols-1 sm:grid-cols-12 gap-3 sm:gap-10 py-10 border-b border-outline-variant">
                                <dt class="sm:col-span-4 font-label-caps text-label-caps uppercase text-on-surface tracking-widest pt-1">Reputation Above All</dt>
                                <dd class="sm:col-span-8 font-body-md text-body-md text-on-surface-variant leading-relaxed">Just as our family business built its name over five decades on absolute integrity, we protect the reputations of the businesses we serve.</dd>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-12 gap-3 sm:gap-10 py-10 border-b border-outline-variant">
                                <dt class="sm:col-span-4 font-label-caps text-label-caps uppercase text-on-surface tracking-widest pt-1">Uncompromising Standards</dt>
                                <dd class="sm:col-span-8 font-body-md text-body-md text-on-surface-variant leading-relaxed">We don't cut corners. From corporate history to physical factory audits, our verification process is rigorous and absolute.</dd>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-12 gap-3 sm:gap-10 py-10 border-b border-outline-variant">
                                <dt class="sm:col-span-4 font-label-caps text-label-caps uppercase text-on-surface tracking-widest pt-1">Justifiable Spending</dt>
                                <dd class="sm:col-span-8 font-body-md text-body-md text-on-surface-variant leading-relaxed">We believe B2B commerce should be lean and secure. By eliminating the expensive, exhausting legwork of verification, we save your capital for what matters most: growth.</dd>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-12 gap-3 sm:gap-10 py-10 border-b border-outline-variant">
                                <dt class="sm:col-span-4 font-label-caps text-label-caps uppercase text-on-surface tracking-widest pt-1">The "After-Sales" Mentality</dt>
                                <dd class="sm:col-span-8 font-body-md text-body-md text-on-surface-variant leading-relaxed">We don't just facilitate a connection and walk away. Our commitment to your security continues long after the initial vetting is done.</dd>
                            </div>
                        </dl>
                    </div>

                    <p class="font-body-lg text-body-lg text-on-surface leading-relaxed">
                        We are the bridge between caution and confidence. We are Victor Vanguard International.
                    </p>
                </div>
            </div>
        </section>

        {{-- The Vanguard Advantage --}}
        <section id="advantage" class="bg-surface-container-lowest py-32 border-y border-outline-variant">
            <div class="px-margin-mobile lg:px-margin-desktop max-w-container-max mx-auto grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div class="space-y-12">
                    <div class="space-y-4">
                        <h2 class="font-headline-lg text-headline-lg text-on-surface">The Vanguard Advantage</h2>
                        <p class="font-body-lg text-body-lg text-on-surface-variant">Unlike marketplaces where suppliers self-register, VVI personally evaluates manufacturers before recommending them to buyers.</p>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-10">
                        <div class="space-y-4">
                            <span class="material-symbols-outlined text-dragon-red text-4xl">verified_user</span>
                            <h4 class="font-label-caps text-label-caps uppercase text-on-surface">Verified Sourcing</h4>
                            <p class="text-sm font-body-md text-on-surface-variant">On-site inspections and structured verification at manufacturing facilities in China.</p>
                        </div>
                        <div class="space-y-4">
                            <span class="material-symbols-outlined text-dragon-red text-4xl">fact_check</span>
                            <h4 class="font-label-caps text-label-caps uppercase text-on-surface">Supplier Due Diligence</h4>
                            <p class="text-sm font-body-md text-on-surface-variant">Company background, export capability, ownership validation, and certification review.</p>
                        </div>
                        <div class="space-y-4">
                            <span class="material-symbols-outlined text-dragon-red text-4xl">inventory_2</span>
                            <h4 class="font-label-caps text-label-caps uppercase text-on-surface">Product Verification</h4>
                            <p class="text-sm font-body-md text-on-surface-variant">Product inspection, specification validation, sample evaluation, and packaging checks.</p>
                        </div>
                        <div class="space-y-4">
                            <span class="material-symbols-outlined text-dragon-red text-4xl">handshake</span>
                            <h4 class="font-label-caps text-label-caps uppercase text-on-surface">Sourcing Support</h4>
                            <p class="text-sm font-body-md text-on-surface-variant">Supplier matching, MOQ negotiation, and manufacturing coordination from real experience.</p>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="aspect-square border border-outline-variant p-8 relative overflow-hidden group">
                        <div class="w-full h-full bg-cover bg-center" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuC1PxWTuRPpNgxrNElgQN1urKUut94fU1sh6hDRZHTheV2uivlSxqFXQ6-LSzEk-SZbzC126nQtWCYRqzOF5wOi4TZz-y0cjTJQvyXtwyoO3wfRZcE1wVzSI9Bo5XRNxOzdZqP193cZRVFLIBYU1cxC9uI4WGYtkT43XAXs3eVEcfcEkOMKAdRJxWKHkofWbX3i7ojxR9tlv8g8v11uRJrEvTxZgy0VBIJil46r9HdJUgB8oQGselNEmuVzsSa_CixuSPJdzzGT358')"></div>
                        <div class="absolute inset-0 bg-dragon-red/5 mix-blend-overlay"></div>
                    </div>
                    <div class="absolute -bottom-10 -right-10 w-40 h-40 border-r border-b border-secondary opacity-50 hidden lg:block"></div>
                </div>
            </div>
        </section>

        {{-- Verified Catalog --}}
        <section id="catalog" class="py-24 overflow-hidden">
            <div class="px-margin-mobile lg:px-margin-desktop max-w-container-max mx-auto mb-12 flex justify-between items-center">
                <h2 class="font-headline-lg text-headline-lg text-on-surface">Verified Catalog</h2>
                <div class="hidden sm:flex gap-4">
                    <button aria-label="Previous" class="w-12 h-12 border border-outline-variant flex items-center justify-center hover:border-on-surface transition-colors">
                        <span class="material-symbols-outlined">chevron_left</span>
                    </button>
                    <button aria-label="Next" class="w-12 h-12 border border-outline-variant flex items-center justify-center hover:border-on-surface transition-colors">
                        <span class="material-symbols-outlined">chevron_right</span>
                    </button>
                </div>
            </div>
            <div class="flex gap-gutter px-margin-mobile lg:px-margin-desktop overflow-x-auto hide-scrollbar pb-12">
                @foreach ([
                    ['tag' => 'PREFAB STRUCTURES', 'sku' => 'VV-PREFAB-01', 'title' => 'Modular Prefab Office', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDy1HNj1K2avXj4mZF61K2fGlI6Wt_n1azHktstg6hBEwTEFLfw2JkdIqmnwD6XZ4c7xzQ8g7wP14gI3ie4znNljVlAt0sShGZXuT60zpHzcJ4shgG9zmFdPdccb3KDHQcdPV3Lh7DMv3fIItNu660J9hbgP99kL9F__q36TXkYVLdZt---4eVkRPbdzzlRyKJz3Jd73Ythhc3-X2N3Ru6X5osxtqOXdjv_n9VASLhvzpu9GLwbdTjDU0T97ibbqG-89IdP5-jWPHU'],
                    ['tag' => 'SOLAR ASSETS', 'sku' => 'VV-SOLAR-42', 'title' => 'Solar Infrastructure', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuC2m5lU3BC7I_3I01OVI_QMphZtHs1yDZ0bq7VwsLZ7QvuPBQ52OQ-VYvFYhCkp3wuQ2CpaNTXDubQknVUwZk-oD4IIT-i2hvnIT6oxITJYxKbvu2QxMlICXGmPI5ggu6RwL_QwtRNKJzE_PN2SkBaOxbpfecoxJmknuFXjVW68KeKzGgdnS0f5z_FF_IEFItLHJrOr6_NKHJnNsxlm3uzhyCyM-SS3UQI0uibQJY1jutCjHUhxkglhbO51NeMhONCDMndXW4duK6E'],
                    ['tag' => 'HEAVY MACHINERY', 'sku' => 'VV-MACH-900', 'title' => 'Industrial Equipment', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuC_T5CQETro3lOoTEGFAfMvzBx-0EOTcJY_99EViCav8HmOdSEZer2iVxtN7iXZK-7IZuxYR5hq3dn1FC3mA2k9k79tgb-ZhEcuQL4UnLJMLsNnHnU6bCsqscTjCtbY7CLPs4Ff5pmi5NG18H2iDGwUtYxAII2tfbjHwQkPWMs2XvOmyi5AYzTJ105zP2BWqQ1icj87MNrQ98m1XO39IsMPUKjepeXmRnuEKfItSr5rQtK1qS4HPbhGeNPggWMIPn9NSquGlHWqbH8'],
                ] as $item)
                    <div class="min-w-[300px] sm:min-w-[400px] border border-outline-variant group bg-surface-container-low">
                        <div class="h-80 overflow-hidden">
                            <div class="w-full h-full bg-cover bg-center transition-transform duration-500 group-hover:scale-105" style="background-image: url('{{ $item['img'] }}')"></div>
                        </div>
                        <div class="p-8 space-y-4">
                            <div class="flex justify-between items-start">
                                <span class="font-label-caps text-label-caps bg-surface-container-highest px-2 py-1">{{ $item['tag'] }}</span>
                                <span class="font-mono-data text-mono-data text-on-surface-variant">{{ $item['sku'] }}</span>
                            </div>
                            <h4 class="font-headline-md text-headline-md text-on-surface">{{ $item['title'] }}</h4>
                            <div class="h-px w-full bg-outline-variant"></div>
                            <div class="flex justify-between items-center">
                                <span class="font-label-caps text-label-caps text-secondary">VVI VERIFIED</span>
                                <button class="text-dragon-red font-label-caps text-label-caps uppercase flex items-center gap-2 group-hover:underline">
                                    DETAILS <span class="material-symbols-outlined text-sm">arrow_outward</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- Verified Partners (manufacturers evaluated by VVI — not corporate affiliates) --}}
        <section id="partners" class="py-24 px-margin-mobile lg:px-margin-desktop max-w-container-max mx-auto border-t border-outline-variant">
            <div class="flex flex-col sm:flex-row justify-between sm:items-end gap-6 mb-16">
                <div>
                    <h2 class="font-headline-lg text-headline-lg text-on-surface">Verified Partners</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant mt-2 max-w-xl">
                        Manufacturers independently evaluated by VVI. 
                    </p>
                </div>
                <span class="font-label-caps text-label-caps uppercase text-secondary tracking-widest">VVI Verified</span>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-gutter">
                @foreach ($company['verified_partners'] as $partner)
                    <div class="border border-outline-variant bg-surface-container-low p-8 space-y-6 hover:border-secondary transition-colors">
                        <div class="flex items-center justify-between gap-4">
                            <span class="font-label-caps text-label-caps uppercase text-dragon-red">{{ $partner['status'] }}</span>
                            <span class="material-symbols-outlined text-secondary text-xl">verified</span>
                        </div>
                        <div class="h-24 w-full border border-outline-variant bg-surface-container-lowest flex items-center justify-center overflow-hidden">
                            <img
                                src="{{ $partner['logo'] }}"
                                alt="{{ $partner['name'] }} logo"
                                class="h-full w-full object-cover"
                                loading="lazy"
                            >
                        </div>
                        <div class="space-y-2">
                            <h3 class="font-headline-md text-xl text-on-surface leading-snug">{{ $partner['name'] }}</h3>
                            <p class="font-body-md text-sm text-on-surface-variant">{{ $partner['sector'] }}</p>
                        </div>
                        <div class="h-px w-full bg-outline-variant"></div>
                        <div class="flex items-end justify-between gap-4">
                            <span class="font-mono-data text-mono-data text-on-surface-variant uppercase tracking-wide">{{ $partner['region'] }}</span>
                            <div class="text-right">
                                <div class="font-label-caps text-label-caps uppercase text-secondary mb-1">Items Sold</div>
                                <div class="font-mono-data text-mono-data text-on-surface">{{ number_format($partner['items_sold']) }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- CTA --}}
        <section id="contact" class="py-32 luxury-gradient border-y border-outline-variant">
            <div class="px-margin-mobile lg:px-margin-desktop max-w-container-max mx-auto text-center space-y-10">
                <h2 class="font-display-lg text-headline-lg md:text-display-lg text-on-surface">Source With Confidence</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto">
                    Request a custom consultation for your global procurement needs. Our verification and sourcing teams are standing by.
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                    <a href="mailto:{{ $company['contact']['email'] }}" class="bg-dragon-red text-white font-label-caps text-label-caps px-12 py-6 uppercase tracking-widest hover:brightness-110 transition-all w-full sm:w-auto">
                        Talk to a Specialist
                    </a>
                </div>
            </div>
        </section>
    </main>

    {{-- Footer --}}
    <footer class="w-full bg-surface-container-lowest border-t border-outline-variant">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter px-margin-mobile lg:px-margin-desktop py-20 max-w-container-max mx-auto">
            <div class="col-span-1 space-y-6">
                <div class="font-headline-lg text-headline-lg text-on-surface">VICTOR VANGUARD</div>
                <p class="font-body-md text-on-surface-variant text-sm pr-8 leading-relaxed">
                    {{ $company['tagline'] }}. Independent supplier verification and quality assurance for global B2B trade, part of the {{ $company['parent_group'] }}.
                </p>
            </div>
            <div class="space-y-6">
                <h5 class="font-label-caps text-label-caps uppercase text-secondary tracking-widest">Services</h5>
                <ul class="space-y-3 font-body-md text-body-md">
                    @foreach ($company['services'] as $service)
                        <li><a class="text-on-surface-variant hover:text-primary transition-colors" href="#services">{{ $service }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="space-y-6">
                <h5 class="font-label-caps text-label-caps uppercase text-secondary tracking-widest">Company</h5>
                <ul class="space-y-3 font-body-md text-body-md">
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors" href="#about">Who We Are</a></li>
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors" href="#advantage">The Advantage</a></li>
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors" href="#catalog">Verified Catalog</a></li>
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors" href="#partners">Verified Partners</a></li>
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors" href="#contact">Contact</a></li>
                </ul>
            </div>
            <div class="space-y-6">
                <h5 class="font-label-caps text-label-caps uppercase text-secondary tracking-widest">Contact</h5>
                <ul class="space-y-3 font-body-md text-body-md">
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors" href="mailto:{{ $company['contact']['email'] }}">{{ $company['contact']['email'] }}</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-outline-variant py-8 px-margin-mobile lg:px-margin-desktop max-w-container-max mx-auto flex flex-col md:flex-row justify-between items-center gap-4">
            <span class="font-label-caps text-label-caps text-on-tertiary-fixed-variant">© {{ date('Y') }} {{ strtoupper($company['name']) }}. {{ strtoupper($company['tagline']) }}.</span>
            <div class="flex flex-wrap gap-8 font-label-caps text-label-caps">
                @foreach ($company['contact']['locations'] ?? [] as $location)
                    <span class="text-on-surface-variant">{{ strtoupper($location) }}</span>
                @endforeach
            </div>
        </div>
    </footer>
@endsection

@push('jsonld')
    <script type="application/ld+json">
{!! json_encode($websiteSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>
@endpush
