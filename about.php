<?php
session_start();
require_once "includes/config.php";
?>
<!DOCTYPE html>

<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>About MemoNest - Keep Every Memory Safe</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
    tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
                colors: {
                    "primary-container": "#8781ff",
                    "surface-container-lowest": "#0e0d16",
                    "surface-container-low": "#1b1b24",
                    "surface-container-high": "#2a2933",
                    "on-primary-fixed": "#100069",
                    "on-surface-variant": "#c7c4d8",
                    "surface-bright": "#393842",
                    "surface-container-highest": "#35343e",
                    "primary-fixed-dim": "#c4c0ff",
                    "surface-variant": "#35343e",
                    "on-error": "#690005",
                    "secondary-fixed": "#e0e2ed",
                    "surface-tint": "#c4c0ff",
                    "tertiary-fixed-dim": "#c3c6d5",
                    "secondary-container": "#444650",
                    "secondary-fixed-dim": "#c4c6d1",
                    "primary-fixed": "#e3dfff",
                    "tertiary": "#c3c6d5",
                    "on-primary-container": "#1b0091",
                    "on-background": "#e4e1ee",
                    "error": "#ffb4ab",
                    "on-primary-fixed-variant": "#3622ca",
                    "inverse-surface": "#e4e1ee",
                    "surface": "#13121b",
                    "on-tertiary-fixed": "#171b26",
                    "inverse-primary": "#4f44e2",
                    "outline-variant": "#464555",
                    "outline": "#918fa1",
                    "on-secondary": "#2d3039",
                    "tertiary-container": "#8d909e",
                    "surface-dim": "#13121b",
                    "on-error-container": "#ffdad6",
                    "on-secondary-fixed": "#181b23",
                    "secondary": "#c4c6d1",
                    "tertiary-fixed": "#dfe2f1",
                    "on-surface": "#e4e1ee",
                    "on-tertiary-container": "#262935",
                    "surface-container": "#1f1f28",
                    "primary": "#c4c0ff",
                    "on-primary": "#2000a4",
                    "error-container": "#93000a",
                    "background": "#13121b",
                    "on-secondary-fixed-variant": "#444650",
                    "inverse-on-surface": "#302f39",
                    "on-tertiary": "#2c303c",
                    "on-secondary-container": "#b3b5bf",
                    "on-tertiary-fixed-variant": "#434653"
                },
                borderRadius: {
                    DEFAULT: "0.25rem",
                    lg: "0.5rem",
                    xl: "0.75rem",
                    full: "9999px",
                    "card": "18px"
                },
                spacing: {
                    md: "16px",
                    xs: "4px",
                    xxl: "64px",
                    xl: "40px",
                    "margin-desktop": "48px",
                    base: "8px",
                    sm: "8px",
                    "margin-mobile": "16px",
                    lg: "24px",
                    gutter: "24px",
                    "section-y": "120px"
                },
                fontFamily: {
                    "label-md": ["Inter"],
                    "headline-lg": ["Inter"],
                    "headline-xl": ["Inter"],
                    "headline-lg-mobile": ["Inter"],
                    "label-sm": ["Inter"],
                    "headline-md": ["Inter"],
                    "body-md": ["Inter"],
                    "body-lg": ["Inter"]
                },
                fontSize: {
                    "label-md": ["14px", {
                        lineHeight: "1",
                        letterSpacing: "0.01em",
                        fontWeight: "500"
                    }],
                    "headline-lg": ["32px", {
                        lineHeight: "1.25",
                        letterSpacing: "-0.02em",
                        fontWeight: "600"
                    }],
                    "headline-xl": ["40px", {
                        lineHeight: "1.2",
                        letterSpacing: "-0.02em",
                        fontWeight: "600"
                    }],
                    "headline-lg-mobile": ["24px", {
                        lineHeight: "1.3",
                        fontWeight: "600"
                    }],
                    "label-sm": ["12px", {
                        lineHeight: "1",
                        fontWeight: "600"
                    }],
                    "headline-md": ["24px", {
                        lineHeight: "1.4",
                        fontWeight: "500"
                    }],
                    "body-md": ["16px", {
                        lineHeight: "1.6",
                        fontWeight: "400"
                    }],
                    "body-lg": ["18px", {
                        lineHeight: "1.6",
                        fontWeight: "400"
                    }]
                },
                backgroundImage: {
                    'glass-gradient': 'linear-gradient(135deg, rgba(255, 255, 255, 0.05) 0%, rgba(255, 255, 255, 0.01) 100%)',
                    'primary-gradient': 'linear-gradient(135deg, var(--tw-colors-primary-container) 0%, var(--tw-colors-on-primary-fixed-variant) 100%)',
                }
            }
        }
    }
    </script>
    <style>
    body {
        background-color: #0F1117;
        color: var(--tw-colors-on-surface);
    }

    .glass-panel {
        background-color: #171A22;
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.06);
    }

    .glass-card {
        background-color: #1D212C;
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.06);
        transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
    }

    .glass-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.5);
        border-color: rgba(196, 192, 255, 0.2);
    }

    .btn-primary {
        background-color: #6D5EF5;
        color: white;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #5b4eea;
        box-shadow: 0 4px 15px rgba(109, 94, 245, 0.3);
    }

    .btn-ghost {
        background-color: transparent;
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .btn-ghost:hover {
        background-color: rgba(255, 255, 255, 0.05);
        border-color: rgba(255, 255, 255, 0.4);
    }

    .text-glow {
        text-shadow: 0 0 20px rgba(196, 192, 255, 0.3);
    }

    .timeline-line {
        width: 2px;
        background: linear-gradient(to bottom, rgba(109, 94, 245, 0.1), rgba(109, 94, 245, 0.8), rgba(109, 94, 245, 0.1));
    }
    </style>
</head>

<body
    class="font-body-md text-body-md antialiased overflow-x-hidden selection:bg-primary-container selection:text-white">
    <!-- TopNavBar Placeholder (Derived from JSON) -->
  <?php
        require_once "includes/navbar.php";
  ?>
    <main class="pb-section-y max-w-[1440px] mx-auto px-margin-mobile md:px-margin-desktop space-y-section-y">
        <!-- SECTION 1 - HERO -->
        <section class="relative min-h-[716px] flex items-center justify-center pt-xl">
            <!-- Decorative background blur -->
            <div
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-primary-container/10 rounded-full blur-[120px] -z-10 pointer-events-none">
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-xxl items-center w-full max-w-7xl mx-auto">
                <div class="space-y-xl z-10 text-center lg:text-left">
                    <h1
                        class="font-headline-xl text-headline-lg-mobile md:text-headline-xl text-white text-glow leading-tight">
                        Your Story Matters. <br />
                        <span class="text-primary-fixed-dim">Keep Every Memory Safe.</span>
                    </h1>
                    <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto lg:mx-0">
                        MemoNest is your personal digital journal where every thought, memory, emotion, and milestone
                        finds a safe place. Capture your journey, reflect on your experiences, and preserve moments that
                        truly matter.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-md justify-center lg:justify-start">
                        <button
                            class="btn-primary px-xl py-md font-label-md text-label-md flex items-center justify-center gap-sm">
                            Start Writing <span class="material-symbols-outlined text-[18px]">edit_document</span>
                        </button>
                        <button
                            class="btn-ghost px-xl py-md font-label-md text-label-md flex items-center justify-center gap-sm">
                            Explore Features <span class="material-symbols-outlined text-[18px]">explore</span>
                        </button>
                    </div>
                </div>
                <div class="relative h-[400px] lg:h-[500px] w-full flex items-center justify-center z-10">
                    <div
                        class="absolute inset-0 bg-gradient-to-tr from-surface/50 to-transparent rounded-3xl border border-white/5 backdrop-blur-sm shadow-2xl overflow-hidden flex items-center justify-center group">
                        <img class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-700 mix-blend-screen"
                            data-alt="A glowing, ethereal digital notebook floating in a dark, minimalist void. Soft, luminous blue and indigo particles resembling glowing memories float gently around the open pages. The lighting is sophisticated, moody, and serene, fitting a premium digital sanctuary aesthetic."
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCjZAA6geqCPa1I3NDGejTUxx0JcxMXrSz_mbhGXSS2-evXM6Ho_pd8NT5zU2Wb9Jo1azugHlYPaFSn40idt4elVYQ8kouaofbhEUsgLsQf8smRM84qq6BwFruIaKXozJRDQyMpN81pZHTLK9VWcBkTTQvpbMbjC1JInK4XF8tkC2qFrgS9etn8wO-fN-6_MNaHuaRlhXOuGrV8-p-82lJb6xMLp7yvhbCtJhSbSJ48jjybBIkZGBU" />
                    </div>
                </div>
            </div>
        </section>
        <!-- SECTION 2 - OUR STORY & MISSION -->
        <section class="max-w-5xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-xxl items-center mb-xxl">
                <div>
                    <h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-white mb-lg">Our Story
                    </h2>
                    <div class="w-16 h-1 bg-primary-container mb-lg rounded-full"></div>
                    <p class="text-on-surface-variant font-body-md text-body-md mb-md">
                        Time moves fast, and memories inevitably fade. We built MemoNest because we realized how easy it
                        is to lose touch with the small, everyday moments that shape who we are.
                    </p>
                    <p class="text-on-surface-variant font-body-md text-body-md">
                        MemoNest isn't just a writing tool; it's designed as a sanctuary. A place free from the noise of
                        social media, where you can preserve your thoughts for reflection and personal growth in a
                        secure, beautiful environment.
                    </p>
                </div>
                <div class="grid grid-cols-1 gap-lg">
                    <div class="glass-card p-xl rounded-card border-l-4 border-l-primary-container">
                        <div class="flex items-center gap-md mb-md">
                            <span class="material-symbols-outlined text-primary-container text-[32px]">flag</span>
                            <h3 class="font-headline-md text-headline-md text-white">Mission</h3>
                        </div>
                        <p class="text-on-surface-variant font-body-md text-body-md">
                            "To make journaling simple, meaningful, secure and enjoyable for everyone."
                        </p>
                    </div>
                    <div class="glass-card p-xl rounded-card border-l-4 border-l-surface-tint">
                        <div class="flex items-center gap-md mb-md">
                            <span class="material-symbols-outlined text-surface-tint text-[32px]">visibility</span>
                            <h3 class="font-headline-md text-headline-md text-white">Vision</h3>
                        </div>
                        <p class="text-on-surface-variant font-body-md text-body-md">
                            "To become the most trusted personal journaling platform where memories remain safe and
                            self-reflection becomes a daily habit."
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- SECTION 4 - WHY CHOOSE MEMONEST -->
        <section class="max-w-7xl mx-auto">
            <div class="text-center mb-xxl">
                <h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-white mb-md">Why Choose
                    MemoNest</h2>
                <p class="text-on-surface-variant max-w-2xl mx-auto font-body-md text-body-md">Designed with intention,
                    crafted for focus.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-lg">
                <!-- Why Cards -->
                <div class="glass-card p-lg rounded-card flex flex-col gap-md">
                    <div
                        class="w-12 h-12 rounded-full bg-surface-container-high flex items-center justify-center text-primary-container">
                        <span class="material-symbols-outlined">lock</span>
                    </div>
                    <h4 class="font-label-md text-label-md text-white font-bold">Private Diary</h4>
                    <p class="text-on-surface-variant text-sm font-body-md">Your thoughts remain strictly yours, locked
                        safely away.</p>
                </div>
                <div class="glass-card p-lg rounded-card flex flex-col gap-md">
                    <div
                        class="w-12 h-12 rounded-full bg-surface-container-high flex items-center justify-center text-primary-container">
                        <span class="material-symbols-outlined">edit</span>
                    </div>
                    <h4 class="font-label-md text-label-md text-white font-bold">Beautiful Writing</h4>
                    <p class="text-on-surface-variant text-sm font-body-md">A distraction-free, zen-like editor that
                        lets you focus.</p>
                </div>
                <div class="glass-card p-lg rounded-card flex flex-col gap-md">
                    <div
                        class="w-12 h-12 rounded-full bg-surface-container-high flex items-center justify-center text-primary-container">
                        <span class="material-symbols-outlined">mood</span>
                    </div>
                    <h4 class="font-label-md text-label-md text-white font-bold">Mood Tracking</h4>
                    <p class="text-on-surface-variant text-sm font-body-md">
                        Capture how you feel with every journal entry and revisit your emotional journey over time.
                    </p>
                </div>
                <div class="glass-card p-lg rounded-card flex flex-col gap-md">
                    <div
                        class="w-12 h-12 rounded-full bg-surface-container-high flex items-center justify-center text-primary-container">
                        <span class="material-symbols-outlined">dashboard</span>
                    </div>
                    <h4 class="font-label-md text-label-md text-white font-bold">Personal Dashboard</h4>
                    <p class="text-on-surface-variant text-sm font-body-md">
                        Access your diary entries, writing statistics, and recent memories from one organized dashboard.
                    </p>
                </div>
                <!-- Add more cards for brevity... -->
            </div>
        </section>
    </main>
    <!-- Footer Placeholder (Derived from JSON) -->
    <section class="max-w-7xl mx-auto px-margin-mobile md:px-margin-desktop mb-xxl">
        <div class="glass-card p-xl rounded-card border border-white/5 relative overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-[380px_1fr] gap-16 items-center">
                <!-- Left Side: Profile Photo -->
                <div class="flex justify-center">
                    <div class="relative group">
                        <div
                            class="absolute -inset-1 rounded-full blur opacity-75 group-hover:opacity-100 transition duration-1000 group-hover:duration-200">
                        </div>
                        <div
                            class="relativew-56 h-56 lg:w-72 lg:h-72 rounded-full border-4 border-primary-container/20 overflow-hidden">
                            <img alt="Uday Pratap Raghav" class="w-full h-full object-cover"
                                src="uploads/about_uday.png" />
                        </div>
                    </div>
                </div>
                <!-- Right Side: Content -->
                <div class="space-y-8">
                    <div class="space-y-xs">
                        <span
                            class="font-label-sm text-label-sm uppercase tracking-wider text-primary-container">Founder
                            &amp; Developer</span>
                        <h2 class="font-headline-lg text-headline-lg text-white">Uday Pratap Raghav</h2>
                        <p class="text-on-surface-variant font-label-md">Full Stack Developer</p>
                    </div>
                    <p class="text-on-surface-variant leading-8">
                        Hi, I'm <strong class="text-white">Uday Pratap Raghav</strong>, the founder and developer of
                        MemoNest. I created MemoNest because I believe every memory deserves a safe place. Journaling
                        helps us preserve experiences, organize our thoughts, reduce stress, and better understand
                        ourselves.
                    </p>

                    <p class="text-on-surface-variant leading-8">
                        MemoNest combines thoughtful design with modern web technologies to provide a clean, secure, and
                        enjoyable writing experience. My goal is to build a space where people can capture meaningful
                        moments and revisit them for years to come. Thank you for being part of this journey.
                    </p>
                    <!-- Skills -->
                    <div class="flex flex-wrap gap-sm pt-md">
                        <span
                            class="px-md py-xs bg-surface-container-high rounded-full text-label-sm text-on-surface-variant border border-white/5">PHP</span>
                        <span
                            class="px-md py-xs bg-surface-container-high rounded-full text-label-sm text-on-surface-variant border border-white/5">MySQL</span>
                        <span
                            class="px-md py-xs bg-surface-container-high rounded-full text-label-sm text-on-surface-variant border border-white/5">HTML</span>
                        <span
                            class="px-md py-xs bg-surface-container-high rounded-full text-label-sm text-on-surface-variant border border-white/5">CSS</span>
                        <span
                            class="px-md py-xs bg-surface-container-high rounded-full text-label-sm text-on-surface-variant border border-white/5">Tailwind
                            CSS</span>
                        <span
                            class="px-md py-xs bg-surface-container-high rounded-full text-label-sm text-on-surface-variant border border-white/5">JavaScript</span>
                        <span
                            class="px-md py-xs bg-surface-container-high rounded-full text-label-sm text-on-surface-variant border border-white/5">React</span>
                        <span
                            class="px-md py-xs bg-surface-container-high rounded-full text-label-sm text-on-surface-variant border border-white/5">Responsive
                            Web Design</span>
                    </div>
                    <!-- Social Buttons -->
                    <div class="flex gap-md pt-lg">
                        <a class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center text-on-surface-variant hover:bg-primary-container hover:text-white transition-all duration-300"
                            href="#">
                            <span class="material-symbols-outlined text-[20px]">code</span>
                        </a>
                        <a class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center text-on-surface-variant hover:bg-primary-container hover:text-white transition-all duration-300"
                            href="#">
                            <span class="material-symbols-outlined text-[20px]">person</span>
                        </a>
                        <a class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center text-on-surface-variant hover:bg-primary-container hover:text-white transition-all duration-300"
                            href="#">
                            <span class="material-symbols-outlined text-[20px]">language</span>
                        </a>
                        <a class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center text-on-surface-variant hover:bg-primary-container hover:text-white transition-all duration-300"
                            href="#">
                            <span class="material-symbols-outlined text-[20px]">mail</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    include "includes/footer.php";
    ?>
</body>

</html>