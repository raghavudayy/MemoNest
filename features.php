<?php
session_start();
require_once "includes/config.php";
?>
<!DOCTYPE html>

<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Features - My Diary</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <style>
    body {
        background-color: #020617;
        /* Fallback */
        background-image: radial-gradient(circle at top, #172554 0%, #0B1120 45%, #020617 100%);
        background-attachment: fixed;
        color: #e1e2ec;
    }

    .glass-card {
        background: rgba(16, 19, 26, 0.4);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        border: 1px solid rgba(255, 255, 255, 0.08);
    }

    .glass-card-hover {
        transition: all 0.3s ease;
    }

    .glass-card-hover:hover {
        background: rgba(29, 32, 39, 0.5);
        backdrop-filter: blur(24px);
        -webkit-backdrop-filter: blur(24px);
        border: 1px solid rgba(255, 255, 255, 0.12);
        transform: translateY(-4px);
        box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.5);
    }

    .floating {
        animation: floating 6s ease-in-out infinite;
    }

    @keyframes floating {
        0% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-20px);
        }

        100% {
            transform: translateY(0px);
        }
    }

    .gradient-text {
        background: linear-gradient(to right, #adc6ff, #ffb786);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Custom scrollbar for better appearance */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: rgba(0, 0, 0, 0.2);
    }

    ::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.2);
    }
    </style>
    <script id="tailwind-config">
    tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
                "colors": {
                    "tertiary-fixed": "#ffdcc6",
                    "on-primary-container": "#00285d",
                    "surface-container-highest": "#32353c",
                    "surface-dim": "#10131a",
                    "on-error-container": "#ffdad6",
                    "on-error": "#690005",
                    "on-surface-variant": "#c2c6d6",
                    "surface-container": "#1d2027",
                    "tertiary": "#ffb786",
                    "on-secondary-fixed": "#07006c",
                    "tertiary-fixed-dim": "#ffb786",
                    "secondary-container": "#3131c0",
                    "surface-tint": "#adc6ff",
                    "on-secondary-fixed-variant": "#2f2ebe",
                    "on-secondary": "#1000a9",
                    "primary-container": "#4d8eff",
                    "primary-fixed-dim": "#adc6ff",
                    "secondary-fixed": "#e1e0ff",
                    "error": "#ffb4ab",
                    "surface-container-lowest": "#0b0e15",
                    "on-primary": "#002e6a",
                    "outline-variant": "#424754",
                    "primary": "#adc6ff",
                    "on-background": "#e1e2ec",
                    "outline": "#8c909f",
                    "surface-variant": "#32353c",
                    "on-tertiary": "#502400",
                    "inverse-on-surface": "#2e3038",
                    "secondary": "#c0c1ff",
                    "on-primary-fixed-variant": "#004395",
                    "inverse-surface": "#e1e2ec",
                    "on-tertiary-container": "#461f00",
                    "surface": "#10131a",
                    "surface-container-high": "#272a31",
                    "on-surface": "#e1e2ec",
                    "secondary-fixed-dim": "#c0c1ff",
                    "surface-container-low": "#191b23",
                    "tertiary-container": "#df7412",
                    "on-secondary-container": "#b0b2ff",
                    "inverse-primary": "#005ac2",
                    "on-tertiary-fixed": "#311400",
                    "background": "#10131a",
                    "surface-bright": "#363941",
                    "error-container": "#93000a",
                    "primary-fixed": "#d8e2ff",
                    "on-primary-fixed": "#001a42",
                    "on-tertiary-fixed-variant": "#723600"
                },
                "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
                },
                "spacing": {
                    "container-max": "1200px",
                    "stack-gap": "1rem",
                    "margin-mobile": "1rem",
                    "margin-desktop": "2.5rem",
                    "gutter": "1.5rem"
                },
                "fontFamily": {
                    "headline-md": ["Inter"],
                    "body-md": ["Inter"],
                    "label-sm": ["Inter"],
                    "display-lg": ["Inter"],
                    "body-lg": ["Inter"],
                    "display-lg-mobile": ["Inter"]
                },
                "fontSize": {
                    "headline-md": ["24px", {
                        "lineHeight": "32px",
                        "fontWeight": "600"
                    }],
                    "body-md": ["16px", {
                        "lineHeight": "24px",
                        "fontWeight": "400"
                    }],
                    "label-sm": ["14px", {
                        "lineHeight": "20px",
                        "letterSpacing": "0.01em",
                        "fontWeight": "500"
                    }],
                    "display-lg": ["48px", {
                        "lineHeight": "56px",
                        "letterSpacing": "-0.02em",
                        "fontWeight": "700"
                    }],
                    "body-lg": ["18px", {
                        "lineHeight": "28px",
                        "fontWeight": "400"
                    }],
                    "display-lg-mobile": ["32px", {
                        "lineHeight": "40px",
                        "letterSpacing": "-0.02em",
                        "fontWeight": "700"
                    }]
                }
            }
        }
    }
    </script>
</head>

<body class="font-body-md text-body-md bg-background text-on-surface antialiased min-h-screen flex flex-col">
    <!-- Top Navigation (JSON) -->
    <?php
    
        require_once "includes/navbar.php";
  ?>
    <main
        class="flex-grow flex flex-col items-center w-full px-margin-mobile md:px-margin-desktop py-12 md:py-20 overflow-hidden">
        <!-- Hero Section -->
        <section class="max-w-container-max w-full flex flex-col lg:flex-row items-center gap-12 mb-32 relative">
            <!-- Subtle background glow -->
            <div
                class="absolute top-1/2 left-1/4 -translate-y-1/2 -translate-x-1/2 w-96 h-96 bg-primary/20 rounded-full blur-[120px] pointer-events-none z-0">
            </div>
            <div class="flex-1 flex flex-col items-start z-10 text-left w-full">
                <div
                    class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-white/10 bg-surface/40 backdrop-blur-md mb-6 shadow-sm">
                    <i class="w-4 h-4 text-tertiary" data-lucide="sparkles"></i>
                    <span class="font-label-sm text-label-sm text-on-surface-variant">Everything You Need</span>
                </div>
                <h1
                    class="font-display-lg-mobile md:font-display-lg text-display-lg-mobile md:text-display-lg text-on-surface mb-6 leading-tight">
                    Powerful Features Designed for <span class="gradient-text">Thoughtful Journaling</span>
                </h1>
                <p class="font-body-lg text-body-lg text-on-surface-variant mb-10 max-w-2xl leading-relaxed">
                    Experience a sanctuary for your thoughts. My Diary combines an elegant, distraction-free writing
                    interface with military-grade security, ensuring your reflections remain private and protected
                    forever.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                    <button
                        class="bg-[#3B82F6] hover:bg-blue-600 text-white px-8 py-3 rounded-full font-label-sm text-label-sm transition-all shadow-lg hover:shadow-blue-500/25 flex items-center justify-center gap-2">
                        Start Writing <i class="w-4 h-4" data-lucide="arrow-right"></i>
                    </button>
                    <a  href="dashboard.php";
                        class="glass-card hover:bg-white/5 text-on-surface px-8 py-3 rounded-full font-label-sm text-label-sm transition-all flex items-center justify-center gap-2">
                        View Dashboard
                    </a>
                </div>
            </div>
            <div class="flex-1 w-full flex justify-center lg:justify-end z-10 relative mt-12 lg:mt-0">
                <div
                    class="w-full max-w-lg aspect-[4/3] glass-card rounded-2xl p-4 floating shadow-2xl relative overflow-hidden border border-white/12">
                    <!-- Dashboard Mockup Abstraction -->
                    <div
                        class="absolute top-0 left-0 w-full h-8 border-b border-white/10 flex items-center px-4 gap-2 bg-surface/30">
                        <div class="w-2.5 h-2.5 rounded-full bg-error"></div>
                        <div class="w-2.5 h-2.5 rounded-full bg-tertiary"></div>
                        <div class="w-2.5 h-2.5 rounded-full bg-primary/80"></div>
                    </div>
                    <div class="mt-8 flex h-full gap-4">
                        <!-- Sidebar -->
                        <div class="w-1/4 h-full border-r border-white/5 pr-4 flex flex-col gap-3">
                            <div class="h-6 w-3/4 bg-white/10 rounded"></div>
                            <div class="h-4 w-full bg-white/5 rounded mt-4"></div>
                            <div class="h-4 w-5/6 bg-white/5 rounded"></div>
                            <div class="h-4 w-full bg-white/5 rounded"></div>
                        </div>
                        <!-- Content -->
                        <div class="w-3/4 h-full flex flex-col gap-4 relative">
                            <div class="h-10 w-2/3 bg-white/10 rounded-lg"></div>
                            <div class="h-4 w-full bg-white/5 rounded"></div>
                            <div class="h-4 w-full bg-white/5 rounded"></div>
                            <div class="h-4 w-4/5 bg-white/5 rounded"></div>
                            <div class="h-4 w-full bg-white/5 rounded"></div>
                            <div
                                class="h-32 w-full bg-white/5 rounded-xl border border-white/10 mt-auto flex items-center justify-center">
                                <i class="w-8 h-8 text-white/20" data-lucide="image"></i>
                            </div>
                            <!-- Floating element -->
                            <div
                                class="absolute bottom-4 right-4 w-12 h-12 rounded-full bg-primary flex items-center justify-center shadow-lg shadow-primary/30">
                                <i class="w-5 h-5 text-on-primary" data-lucide="pen-tool"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Stats Section -->
        <section class="max-w-container-max w-full mb-32 z-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Stat 1 -->
                <div class="glass-card glass-card-hover rounded-2xl p-6 flex flex-col items-center text-center">
                    <div
                        class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center mb-4 text-primary">
                        <i class="w-6 h-6" data-lucide="infinity"></i>
                    </div>
                    <h3 class="font-headline-md text-headline-md text-on-surface mb-2">Unlimited</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">Journal entries forever</p>
                </div>
                <!-- Stat 2 -->
                <div class="glass-card glass-card-hover rounded-2xl p-6 flex flex-col items-center text-center">
                    <div
                        class="w-12 h-12 rounded-full bg-tertiary/10 flex items-center justify-center mb-4 text-tertiary">
                        <i class="w-6 h-6" data-lucide="shield-check"></i>
                    </div>
                    <h3 class="font-headline-md text-headline-md text-on-surface mb-2">100%</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">Private &amp; encrypted</p>
                </div>
                <!-- Stat 3 -->
                <div class="glass-card glass-card-hover rounded-2xl p-6 flex flex-col items-center text-center">
                    <div class="w-12 h-12 rounded-full bg-error/10 flex items-center justify-center mb-4 text-error">
                        <i class="w-6 h-6" data-lucide="smile"></i>
                    </div>
                    <h3 class="font-headline-md text-headline-md text-on-surface mb-2">Mood Tracking</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">Visual emotional insights</p>
                </div>
                <!-- Stat 4 -->
                <div class="glass-card glass-card-hover rounded-2xl p-6 flex flex-col items-center text-center">
                    <div
                        class="w-12 h-12 rounded-full bg-secondary/10 flex items-center justify-center mb-4 text-secondary">
                        <i class="w-6 h-6" data-lucide="zap"></i>
                    </div>
                    <h3 class="font-headline-md text-headline-md text-on-surface mb-2">Fast &amp; Secure</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">Modern tech stack</p>
                </div>
            </div>
        </section>
        <!-- Features Bento Grid -->
        <section class="max-w-container-max w-full mb-32 z-10">
            <div class="text-center mb-16">
                <h2
                    class="font-display-lg-mobile md:font-display-lg text-display-lg-mobile md:text-display-lg text-on-surface mb-4">
                    A Complete Toolkit</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto">Everything you need to
                    capture your life's moments, beautifully organized in one place.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 auto-rows-fr">
                <!-- Core Editor Feature (Large) -->
                <div
                    class="glass-card glass-card-hover rounded-2xl p-8 col-span-1 md:col-span-2 lg:col-span-2 row-span-2 flex flex-col">
                    <div class="flex items-center gap-3 mb-6 border-b border-white/5 pb-4">
                        <div class="w-10 h-10 rounded-lg bg-primary/20 flex items-center justify-center text-primary">
                            <i class="w-5 h-5" data-lucide="pen-tool"></i>
                        </div>
                        <h3 class="font-headline-md text-headline-md text-on-surface">Distraction-Free Editor</h3>
                    </div>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-6 flex-grow">
                        Our glassmorphic editor fades the interface away, letting you focus entirely on your words.
                        Supports rich formatting, inline images, and autosave.
                    </p>
                    <div
                        class="w-full h-32 rounded-xl border border-white/10 bg-surface/30 relative overflow-hidden flex items-center justify-center text-on-surface-variant/50 font-body-sm">
                        <!-- Abstract Editor Representation -->
                        <div class="w-4/5 h-full pt-6 flex flex-col gap-3">
                            <div class="h-2 w-1/3 bg-white/20 rounded"></div>
                            <div class="h-2 w-full bg-white/10 rounded"></div>
                            <div class="h-2 w-5/6 bg-white/10 rounded"></div>
                            <div class="flex gap-2 mt-4">
                                <div class="w-8 h-8 rounded bg-white/5 flex items-center justify-center"><i
                                        class="w-3 h-3 text-white/30" data-lucide="bold"></i></div>
                                <div class="w-8 h-8 rounded bg-white/5 flex items-center justify-center"><i
                                        class="w-3 h-3 text-white/30" data-lucide="italic"></i></div>
                                <div class="w-8 h-8 rounded bg-white/5 flex items-center justify-center"><i
                                        class="w-3 h-3 text-white/30" data-lucide="link"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Feature Cards -->
                <div class="glass-card glass-card-hover rounded-2xl p-6 flex flex-col">
                    <div
                        class="w-10 h-10 rounded-lg bg-tertiary/20 flex items-center justify-center text-tertiary mb-4">
                        <i class="w-5 h-5" data-lucide="layout-dashboard"></i>
                    </div>
                    <h4 class="font-label-sm text-label-sm text-on-surface font-bold mb-2">Beautiful Layouts</h4>
                    <p class="font-body-md text-body-md text-on-surface-variant text-sm">Organize your thoughts with
                        flexible dashboard views.</p>
                </div>
                <div class="glass-card glass-card-hover rounded-2xl p-6 flex flex-col">
                    <div
                        class="w-10 h-10 rounded-lg bg-secondary/20 flex items-center justify-center text-secondary mb-4">
                        <i class="w-5 h-5" data-lucide="calendar"></i>
                    </div>
                    <h4 class="font-label-sm text-label-sm text-on-surface font-bold mb-2">Calendar View</h4>
                    <p class="font-body-md text-body-md text-on-surface-variant text-sm">Track your writing streaks and
                        revisit past entries easily.</p>
                </div>
                <div class="glass-card glass-card-hover rounded-2xl p-6 flex flex-col">
                    <div class="w-10 h-10 rounded-lg bg-error/20 flex items-center justify-center text-error mb-4">
                        <i class="w-5 h-5" data-lucide="tag"></i>
                    </div>
                    <h4 class="font-label-sm text-label-sm text-on-surface font-bold mb-2">Smart Tagging</h4>
                    <p class="font-body-md text-body-md text-on-surface-variant text-sm">Categorize entries for instant
                        retrieval later.</p>
                </div>
                <div class="glass-card glass-card-hover rounded-2xl p-6 flex flex-col">
                    <div class="w-10 h-10 rounded-lg bg-primary/20 flex items-center justify-center text-primary mb-4">
                        <i class="w-5 h-5" data-lucide="search"></i>
                    </div>
                    <h4 class="font-label-sm text-label-sm text-on-surface font-bold mb-2">Deep Search</h4>
                    <p class="font-body-md text-body-md text-on-surface-variant text-sm">Find exactly what you wrote,
                        when you wrote it.</p>
                </div>
                <!-- Media Handling -->
                <div
                    class="glass-card glass-card-hover rounded-2xl p-6 col-span-1 md:col-span-2 flex flex-col sm:flex-row items-center gap-6">
                    <div
                        class="w-16 h-16 shrink-0 rounded-xl bg-tertiary/20 flex items-center justify-center text-tertiary">
                        <i class="w-8 h-8" data-lucide="image"></i>
                    </div>
                    <div>
                        <h4 class="font-headline-md text-headline-md text-on-surface mb-2">Rich Media Integration</h4>
                        <p class="font-body-md text-body-md text-on-surface-variant text-sm">Upload images to accompany
                            your stories. Pictures say a thousand words, and your diary supports both beautifully.</p>
                    </div>
                </div>
                <!-- Export -->
                <div class="glass-card glass-card-hover rounded-2xl p-6 flex flex-col">
                    <div
                        class="w-10 h-10 rounded-lg bg-secondary/20 flex items-center justify-center text-secondary mb-4">
                        <i class="w-5 h-5" data-lucide="download"></i>
                    </div>
                    <h4 class="font-label-sm text-label-sm text-on-surface font-bold mb-2">Export to PDF</h4>
                    <p class="font-body-md text-body-md text-on-surface-variant text-sm">Take your memories offline
                        anytime.</p>
                </div>
                <!-- Theme -->
                <div class="glass-card glass-card-hover rounded-2xl p-6 flex flex-col">
                    <div
                        class="w-10 h-10 rounded-lg bg-surface-bright flex items-center justify-center text-on-surface mb-4 border border-white/10">
                        <i class="w-5 h-5" data-lucide="moon"></i>
                    </div>
                    <h4 class="font-label-sm text-label-sm text-on-surface font-bold mb-2">Night Sky Theme</h4>
                    <p class="font-body-md text-body-md text-on-surface-variant text-sm">Easy on the eyes for late-night
                        reflections.</p>
                </div>
            </div>
        </section>
        <!-- Timeline Section -->
        <section class="max-w-container-max w-full mb-32 z-10">
            <div class="text-center mb-16">
                <h2
                    class="font-display-lg-mobile md:font-display-lg text-display-lg-mobile md:text-display-lg text-on-surface mb-4">
                    The Journaling Journey</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto">From thought to secure
                    memory in a few elegant steps.</p>
            </div>
            <div class="relative w-full overflow-x-auto pb-8 snap-x snap-mandatory hide-scroll">
                <!-- Connecting Line -->
                <div class="absolute top-1/2 left-0 w-[200%] h-0.5 bg-white/10 -translate-y-1/2 z-0 hidden md:block">
                </div>
                <div class="flex gap-6 w-max px-4 mx-auto relative z-10">
                    <div
                        class="glass-card rounded-2xl p-6 w-64 shrink-0 snap-center flex flex-col items-center text-center relative">
                        <div
                            class="w-12 h-12 rounded-full bg-surface border-2 border-primary flex items-center justify-center mb-4 z-10 text-primary shadow-[0_0_15px_rgba(173,198,255,0.3)]">
                            <i class="w-5 h-5" data-lucide="user-plus"></i>
                        </div>
                        <h4 class="font-label-sm text-label-sm text-on-surface font-bold mb-2">1. Secure Signup</h4>
                        <p class="font-body-md text-body-md text-on-surface-variant text-sm">Create your private vault.
                        </p>
                    </div>
                    <div
                        class="glass-card rounded-2xl p-6 w-64 shrink-0 snap-center flex flex-col items-center text-center relative">
                        <div
                            class="w-12 h-12 rounded-full bg-surface border-2 border-primary/50 flex items-center justify-center mb-4 z-10 text-primary/80">
                            <i class="w-5 h-5" data-lucide="log-in"></i>
                        </div>
                        <h4 class="font-label-sm text-label-sm text-on-surface font-bold mb-2">2. Authenticate</h4>
                        <p class="font-body-md text-body-md text-on-surface-variant text-sm">Session-based security.</p>
                    </div>
                    <div
                        class="glass-card rounded-2xl p-6 w-64 shrink-0 snap-center flex flex-col items-center text-center relative">
                        <div
                            class="w-12 h-12 rounded-full bg-surface border-2 border-tertiary flex items-center justify-center mb-4 z-10 text-tertiary shadow-[0_0_15px_rgba(255,183,134,0.3)]">
                            <i class="w-5 h-5" data-lucide="edit-3"></i>
                        </div>
                        <h4 class="font-label-sm text-label-sm text-on-surface font-bold mb-2">3. Write Entry</h4>
                        <p class="font-body-md text-body-md text-on-surface-variant text-sm">Capture your thoughts.</p>
                    </div>
                    <div
                        class="glass-card rounded-2xl p-6 w-64 shrink-0 snap-center flex flex-col items-center text-center relative">
                        <div
                            class="w-12 h-12 rounded-full bg-surface border-2 border-tertiary/50 flex items-center justify-center mb-4 z-10 text-tertiary/80">
                            <i class="w-5 h-5" data-lucide="smile-plus"></i>
                        </div>
                        <h4 class="font-label-sm text-label-sm text-on-surface font-bold mb-2">4. Track Mood</h4>
                        <p class="font-body-md text-body-md text-on-surface-variant text-sm">Log your emotions.</p>
                    </div>
                    <div
                        class="glass-card rounded-2xl p-6 w-64 shrink-0 snap-center flex flex-col items-center text-center relative">
                        <div
                            class="w-12 h-12 rounded-full bg-surface border-2 border-secondary flex items-center justify-center mb-4 z-10 text-secondary shadow-[0_0_15px_rgba(192,193,255,0.3)]">
                            <i class="w-5 h-5" data-lucide="archive"></i>
                        </div>
                        <h4 class="font-label-sm text-label-sm text-on-surface font-bold mb-2">5. Archive &amp; Export
                        </h4>
                        <p class="font-body-md text-body-md text-on-surface-variant text-sm">Keep memories forever.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- CTA Section -->
        <section class="max-w-container-max w-full mb-20 z-10">
            <div
                class="glass-card rounded-3xl p-10 md:p-16 text-center relative overflow-hidden border-t-2 border-t-primary/30">
                <!-- Decorative background elements inside CTA -->
                <div
                    class="absolute top-0 right-0 w-64 h-64 bg-primary/10 rounded-full blur-[80px] -translate-y-1/2 translate-x-1/3">
                </div>
                <div
                    class="absolute bottom-0 left-0 w-64 h-64 bg-tertiary/10 rounded-full blur-[80px] translate-y-1/2 -translate-x-1/3">
                </div>
                <div class="relative z-10">
                    <h2
                        class="font-display-lg-mobile md:font-display-lg text-display-lg-mobile md:text-display-lg text-on-surface mb-6">
                        Start Your Journaling Journey Today</h2>
                    <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto mb-10">
                        Join thousands of users who have found clarity, peace, and focus through daily reflection. Your
                        blank canvas awaits.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <button
                            class="bg-[#3B82F6] hover:bg-blue-600 text-white px-8 py-4 rounded-full font-label-sm text-label-sm transition-all shadow-lg hover:shadow-blue-500/25">
                            Create Free Account
                        </button>
                        <button
                            class="px-8 py-4 rounded-full font-label-sm text-label-sm transition-all border border-white/20 hover:bg-white/10 text-on-surface">
                            Login to Dashboard
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer (JSON) -->
    <?php
        require_once "includes/footer.php";
  ?>
    <script>
    // Initialize Lucide icons
    lucide.createIcons();
    </script>
</body>

</html>