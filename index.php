<?php
session_start();
require_once "<includes/config.php";
?>
<!DOCTYPE html>

<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>My Diary - Write. Reflect. Remember.</title>
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
                "colors": {
                    "surface-variant": "#32353c",
                    "surface-bright": "#363941",
                    "surface": "#10131a",
                    "on-secondary-container": "#b0b2ff",
                    "on-primary-container": "#00285d",
                    "error": "#ffb4ab",
                    "inverse-on-surface": "#2e3038",
                    "primary-fixed": "#d8e2ff",
                    "secondary-fixed": "#e1e0ff",
                    "outline": "#8c909f",
                    "on-secondary": "#1000a9",
                    "primary-fixed-dim": "#adc6ff",
                    "on-surface-variant": "#c2c6d6",
                    "surface-container": "#1d2027",
                    "on-secondary-fixed-variant": "#2f2ebe",
                    "on-primary-fixed": "#001a42",
                    "on-tertiary-container": "#461f00",
                    "on-secondary-fixed": "#07006c",
                    "on-tertiary": "#502400",
                    "error-container": "#93000a",
                    "on-error-container": "#ffdad6",
                    "tertiary-container": "#df7412",
                    "on-tertiary-fixed": "#311400",
                    "surface-dim": "#10131a",
                    "secondary-container": "#3131c0",
                    "inverse-primary": "#005ac2",
                    "on-tertiary-fixed-variant": "#723600",
                    "on-background": "#e1e2ec",
                    "surface-tint": "#adc6ff",
                    "background": "#10131a",
                    "on-error": "#690005",
                    "primary-container": "#4d8eff",
                    "secondary": "#c0c1ff",
                    "tertiary": "#ffb786",
                    "surface-container-lowest": "#0b0e15",
                    "surface-container-high": "#272a31",
                    "on-primary": "#002e6a",
                    "surface-container-low": "#191b23",
                    "secondary-fixed-dim": "#c0c1ff",
                    "surface-container-highest": "#32353c",
                    "outline-variant": "#424754",
                    "on-primary-fixed-variant": "#004395",
                    "tertiary-fixed": "#ffdcc6",
                    "inverse-surface": "#e1e2ec",
                    "tertiary-fixed-dim": "#ffb786",
                    "on-surface": "#e1e2ec",
                    "primary": "#adc6ff"
                },
                "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
                },
                "spacing": {
                    "gutter": "1.5rem",
                    "margin-desktop": "2.5rem",
                    "stack-gap": "1rem",
                    "margin-mobile": "1rem",
                    "container-max": "1200px"
                },
                "fontFamily": {
                    "headline-md": ["Inter"],
                    "display-lg": ["Inter"],
                    "body-lg": ["Inter"],
                    "body-md": ["Inter"],
                    "display-lg-mobile": ["Inter"],
                    "label-sm": ["Inter"]
                },
                "fontSize": {
                    "headline-md": ["24px", {
                        "lineHeight": "32px",
                        "fontWeight": "600"
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
                    "body-md": ["16px", {
                        "lineHeight": "24px",
                        "fontWeight": "400"
                    }],
                    "display-lg-mobile": ["32px", {
                        "lineHeight": "40px",
                        "letterSpacing": "-0.02em",
                        "fontWeight": "700"
                    }],
                    "label-sm": ["14px", {
                        "lineHeight": "20px",
                        "letterSpacing": "0.01em",
                        "fontWeight": "500"
                    }]
                }
            }
        }
    }
    </script>
    <style>
    body {
        background-color: #0b1120;
        background-image: radial-gradient(circle at top, #172554 0%, #0b1120 45%, #020617 100%);
        background-attachment: fixed;
        color: #e1e2ec;
        -webkit-font-smoothing: antialiased;
    }

    .glass-panel {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        border: 1px solid rgba(255, 255, 255, 0.08);
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
    }

    .glass-panel-hover:hover {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.12);
        transform: translateY(-2px);
        transition: all 0.3s ease;
    }

    .floating-hero {
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-10px);
        }

        100% {
            transform: translateY(0px);
        }
    }

    .gradient-text {
        background: linear-gradient(135deg, #adc6ff 0%, #b0b2ff 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    </style>
</head>

<body class="min-h-screen flex flex-col font-body-md text-body-md">
    <!-- Top Navigation -->
 <?php
        require_once "includes/navbar.php";
  ?>
    <main class="flex-grow pt-24 pb-16">
        <!-- Hero Section -->
        <section class="max-w-container-max mx-auto px-gutter min-h-[80vh] flex items-center pt-8 md:pt-16 pb-24">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <!-- Left Column -->
                <div class="flex flex-col gap-8 z-10">
                    <div
                        class="inline-flex items-center gap-2 bg-white/5 border border-white/10 rounded-full px-4 py-2 w-fit backdrop-blur-sm">
                        <span class="material-symbols-outlined text-primary text-sm"
                            data-icon="auto_awesome">auto_awesome</span>
                        <span class="font-label-sm text-label-sm text-on-surface-variant">Your Private Space for
                            Thoughts &amp; Memories</span>
                    </div>
                    <h1
                        class="font-display-lg-mobile md:font-display-lg text-display-lg-mobile md:text-display-lg text-on-surface">
                        Write. Reflect. <br />
                        <span class="gradient-text">Remember.</span>
                    </h1>
                    <p class="font-body-lg text-body-lg text-on-surface-variant max-w-xl">
                        A secure, beautiful, and intuitive diary for your personal reflections. End-to-end encrypted,
                        endlessly customizable, and designed for mindful writing.
                    </p>
                    <div class="flex flex-wrap gap-4 items-center">
                        <a  href="add_entry.php"
                            class="bg-[#3B82F6] hover:bg-blue-600 text-white px-8 py-3 rounded-full font-label-sm text-label-sm transition-colors shadow-[0_0_15px_rgba(59,130,246,0.5)]">
                            Start Writing Free
                        </a>
                        <a  href="features.php"
                            class="glass-panel hover:bg-white/10 text-on-surface px-8 py-3 rounded-full font-label-sm text-label-sm transition-colors flex items-center gap-2">
                            Explore Features
                            <span class="material-symbols-outlined text-sm"
                                data-icon="arrow_forward">arrow_forward</span>
                        </a>
                    </div>
                    <div class="flex flex-wrap gap-6 pt-4 text-on-surface-variant/80 font-label-sm text-label-sm">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary text-[16px]"
                                data-icon="check_circle">check_circle</span>
                            Secure
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary text-[16px]"
                                data-icon="check_circle">check_circle</span>
                            Private
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary text-[16px]"
                                data-icon="check_circle">check_circle</span>
                            Free to Start
                        </div>
                    </div>
                </div>
                <!-- Right Column (Mockup) -->
                <div class="relative w-full h-[600px] hidden lg:block perspective-1000">
                    <div
                        class="floating-hero absolute inset-0 glass-panel rounded-xl overflow-hidden border border-white/10 shadow-[0_20px_50px_rgba(0,0,0,0.5)] transform rotate-y-[-10deg] rotate-x-[5deg]">
                        <!-- Mockup Header -->
                        <div class="h-12 border-b border-white/10 bg-white/5 flex items-center px-4 gap-2">
                            <div class="w-3 h-3 rounded-full bg-red-500/80"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-500/80"></div>
                            <div class="w-3 h-3 rounded-full bg-green-500/80"></div>
                        </div>
                        <!-- Mockup Body -->
                        <div class="p-6 grid grid-cols-3 gap-6 h-[calc(100%-3rem)] bg-surface/30">
                            <!-- Sidebar -->
                            <div class="col-span-1 space-y-4 border-r border-white/5 pr-4">
                                <div class="glass-panel p-4 rounded-lg">
                                    <h3 class="font-label-sm text-label-sm text-on-surface mb-1">Welcome</h3>
                                    <p class="font-headline-md text-[18px] text-primary">User</p>
                                </div>
                                <div class="space-y-2">
                                    <div class="flex items-center gap-3 p-2 rounded bg-white/10 text-on-surface">
                                        <span class="material-symbols-outlined text-[18px]"
                                            data-icon="edit_note">edit_note</span>
                                        <span class="text-sm">New Entry</span>
                                    </div>
                                    <div
                                        class="flex items-center gap-3 p-2 rounded text-on-surface-variant hover:bg-white/5">
                                        <span class="material-symbols-outlined text-[18px]"
                                            data-icon="calendar_month">calendar_month</span>
                                        <span class="text-sm">Calendar</span>
                                    </div>
                                    <div
                                        class="flex items-center gap-3 p-2 rounded text-on-surface-variant hover:bg-white/5">
                                        <span class="material-symbols-outlined text-[18px]" data-icon="mood">mood</span>
                                        <span class="text-sm">Mood Tracker</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Main Content -->
                            <div class="col-span-2 space-y-6">
                                <div class="glass-panel p-6 rounded-lg relative overflow-hidden group">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-primary/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                                    </div>
                                    <div class="flex justify-between items-start mb-4">
                                        <h4 class="font-headline-md text-[20px] text-on-surface">Evening Reflections
                                        </h4>
                                        <span class="text-xs text-on-surface-variant">Today, 8:45 PM</span>
                                    </div>
                                    <p class="text-sm text-on-surface-variant line-clamp-3">
                                        Today was a surprisingly productive day. I managed to finish the project ahead
                                        of schedule, which gave me some time to finally start reading that new book...
                                    </p>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div
                                        class="glass-panel p-4 rounded-lg flex flex-col items-center justify-center gap-2">
                                        <span class="material-symbols-outlined text-primary text-[24px]"
                                            data-icon="local_fire_department">local_fire_department</span>
                                        <div class="text-center">
                                            <div class="font-bold text-lg text-on-surface">14 Days</div>
                                            <div class="text-xs text-on-surface-variant">Writing Streak</div>
                                        </div>
                                    </div>
                                    <div
                                        class="glass-panel p-4 rounded-lg flex flex-col items-center justify-center gap-2">
                                        <span class="material-symbols-outlined text-tertiary text-[24px]"
                                            data-icon="text_snippet">text_snippet</span>
                                        <div class="text-center">
                                            <div class="font-bold text-lg text-on-surface">12,450</div>
                                            <div class="text-xs text-on-surface-variant">Words Written</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Final CTA -->
        <section class="max-w-container-max mx-auto px-gutter py-24">
            <div class="glass-panel rounded-2xl p-12 text-center relative overflow-hidden group">
                <!-- Background ambient glow -->
                <div
                    class="absolute -inset-10 bg-primary/20 blur-[100px] rounded-full pointer-events-none opacity-50 group-hover:opacity-80 transition-opacity duration-1000">
                </div>
                <div class="relative z-10 max-w-2xl mx-auto flex flex-col items-center gap-8">
                    <span class="material-symbols-outlined text-primary text-4xl mb-4"
                        data-icon="edit_square">edit_square</span>
                    <h2
                        class="font-display-lg-mobile md:font-display-lg text-display-lg-mobile md:text-display-lg text-on-surface">
                        Every Great Story Begins With One Entry
                    </h2>
                    <p class="font-body-lg text-body-lg text-on-surface-variant">
                        Join thousands of users who have found clarity and peace through daily journaling. Start your
                        secure, private journey today.
                    </p>
                    <a  href="view_entries.php"
                        class="bg-[#3B82F6] hover:bg-blue-600 text-white px-10 py-4 rounded-full font-headline-md text-[18px] transition-all transform hover:scale-105 shadow-[0_0_20px_rgba(59,130,246,0.4)] mt-4">
                        Create Your Free Diary
                    </a>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer -->
<?php
require_once "includes/footer.php";
?>
</body>

</html>