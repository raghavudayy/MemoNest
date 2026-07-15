<!DOCTYPE html>

<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Edit Profile - Lumora</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
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
                    "error-container": "#93000a",
                    "on-secondary-fixed-variant": "#444650",
                    "surface-container-low": "#1b1b24",
                    "secondary-fixed-dim": "#c4c6d1",
                    "on-tertiary-fixed-variant": "#434653",
                    "outline": "#918fa1",
                    "on-error-container": "#ffdad6",
                    "tertiary-fixed-dim": "#c3c6d5",
                    "surface-container-highest": "#35343e",
                    "surface-bright": "#393842",
                    "on-primary-container": "#1b0091",
                    "surface-tint": "#c4c0ff",
                    "primary-container": "#8781ff",
                    "on-tertiary": "#2c303c",
                    "on-secondary": "#2d3039",
                    "surface-container-lowest": "#0e0d16",
                    "inverse-primary": "#4f44e2",
                    "secondary-fixed": "#e0e2ed",
                    "on-surface-variant": "#c7c4d8",
                    "on-surface": "#e4e1ee",
                    "surface-container-high": "#2a2933",
                    "on-secondary-container": "#b3b5bf",
                    "surface-dim": "#13121b",
                    "on-tertiary-container": "#262935",
                    "primary-fixed-dim": "#c4c0ff",
                    "tertiary-fixed": "#dfe2f1",
                    "error": "#ffb4ab",
                    "primary-fixed": "#e3dfff",
                    "on-error": "#690005",
                    "on-primary-fixed-variant": "#3622ca",
                    "on-background": "#e4e1ee",
                    "outline-variant": "#464555",
                    "on-tertiary-fixed": "#171b26",
                    "on-secondary-fixed": "#181b23",
                    "tertiary-container": "#8d909e",
                    "surface-variant": "#35343e",
                    "on-primary-fixed": "#100069",
                    "tertiary": "#c3c6d5",
                    "surface": "#13121b",
                    "primary": "#c4c0ff",
                    "secondary": "#c4c6d1",
                    "inverse-on-surface": "#302f39",
                    "secondary-container": "#444650",
                    "background": "#13121b",
                    "on-primary": "#2000a4",
                    "inverse-surface": "#e4e1ee",
                    "surface-container": "#1f1f28"
                },
                "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
                },
                "spacing": {
                    "md": "16px",
                    "xs": "4px",
                    "margin-desktop": "48px",
                    "sm": "8px",
                    "gutter": "24px",
                    "base": "8px",
                    "lg": "24px",
                    "xxl": "64px",
                    "xl": "40px",
                    "margin-mobile": "16px"
                },
                "fontFamily": {
                    "headline-xl": ["Inter"],
                    "label-md": ["Inter"],
                    "headline-lg-mobile": ["Inter"],
                    "body-md": ["Inter"],
                    "body-lg": ["Inter"],
                    "headline-md": ["Inter"],
                    "label-sm": ["Inter"],
                    "headline-lg": ["Inter"]
                },
                "fontSize": {
                    "headline-xl": ["40px", {
                        "lineHeight": "1.2",
                        "letterSpacing": "-0.02em",
                        "fontWeight": "600"
                    }],
                    "label-md": ["14px", {
                        "lineHeight": "1",
                        "letterSpacing": "0.01em",
                        "fontWeight": "500"
                    }],
                    "headline-lg-mobile": ["24px", {
                        "lineHeight": "1.3",
                        "fontWeight": "600"
                    }],
                    "body-md": ["16px", {
                        "lineHeight": "1.6",
                        "fontWeight": "400"
                    }],
                    "body-lg": ["18px", {
                        "lineHeight": "1.6",
                        "fontWeight": "400"
                    }],
                    "headline-md": ["24px", {
                        "lineHeight": "1.4",
                        "fontWeight": "500"
                    }],
                    "label-sm": ["12px", {
                        "lineHeight": "1",
                        "fontWeight": "600"
                    }],
                    "headline-lg": ["32px", {
                        "lineHeight": "1.25",
                        "letterSpacing": "-0.02em",
                        "fontWeight": "600"
                    }]
                }
            }
        }
    }
    </script>
    <style>
    body {
        background-color: #0F1117;
        color: #e4e1ee;
        font-family: 'Inter', sans-serif;
    }

    .glass-card {
        background-color: #1D212C;
        border: 1px solid rgba(255, 255, 255, 0.06);
        border-radius: 18px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .glass-panel {
        background: rgba(23, 26, 34, 0.7);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
    }

    .input-glow:focus-within {
        border-color: #C4C0FF;
        box-shadow: 0 0 0 2px rgba(196, 192, 255, 0.2);
    }

    .toggle-checkbox:checked {
        right: 0;
        border-color: #C4C0FF;
    }

    .toggle-checkbox:checked+.toggle-label {
        background-color: #C4C0FF;
    }

    .circular-progress {
        background: conic-gradient(#C4C0FF calc(var(--progress) * 1%), #2a2933 0);
        border-radius: 50%;
    }

    .circular-progress::before {
        content: '';
        position: absolute;
        inset: 8px;
        background-color: #1D212C;
        border-radius: 50%;
    }
    </style>
</head>

<body class="antialiased min-h-screen flex flex-col selection:bg-primary-container selection:text-on-primary-container">
    <!-- TopNavBar -->
    <nav
        class="fixed top-0 w-full z-50 bg-background/70 backdrop-blur-xl shadow-sm border-b border-white/5 transition-all duration-300">
        <div
            class="flex justify-between items-center px-margin-mobile md:px-margin-desktop py-4 max-w-[800px] mx-auto w-full">
            <div class="flex items-center gap-4">
                <a class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg font-bold tracking-tight text-primary hover:text-primary transition-colors duration-300 active:scale-95"
                    href="#">Lumora</a>
            </div>
            <div class="flex items-center gap-6">
                <!-- Search could go here based on "search_bar": "on_right" but skipping full implementation for nav simplicity -->
                <button
                    class="hidden md:flex items-center gap-2 px-4 py-2 bg-primary text-on-primary rounded-xl font-label-md text-label-md hover:bg-primary-container transition-colors active:scale-95 duration-200 shadow-sm">
                    <span class="material-symbols-outlined text-[20px]"
                        style="font-variation-settings: 'FILL' 1;">add</span>
                    New Entry
                </button>
                <button
                    class="text-on-surface-variant hover:text-primary transition-colors duration-300 active:scale-95">
                    <span class="material-symbols-outlined text-[24px]">notifications</span>
                </button>
                <button
                    class="w-10 h-10 rounded-full overflow-hidden border border-white/10 active:scale-95 transition-transform duration-200">
                    <img alt="User profile reflection" class="w-full h-full object-cover"
                        data-alt="A close up, cinematic portrait of a serene woman named Eleanor Vance in soft, moody lighting. She has a calm expression, perfect for a high-end personal journaling application avatar. The background is a dark, sophisticated studio setting with subtle cool gray and indigo lighting accents."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAJnL1UNaR0VT5ioPBZGOFxPE3Yw6uv6hekIVED0mA-oiBQ1HN5SQKlJnuuy3UhnPq6fLnKc47Mrz3pJHTrrQAr8fjLmFjHKvlHiByfyBYd8XfFFuVBIebH6Dixvj6txGS9T9wAeDBloRn9vx2EmP2v9PCZqILYmwa3tY491n3qcL_plaBxH8h91xwvENm89FieAriYZguLKWS13IlhNvke_KgG5V4LIRWsRHBUGBuoYUOfZdOQv8I" />
                </button>
            </div>
        </div>
    </nav>
    <!-- Main Content Canvas -->
    <main
        class="flex-grow pt-[100px] pb-xxl px-margin-mobile md:px-margin-desktop max-w-[1200px] mx-auto w-full flex flex-col lg:flex-row gap-gutter">
        <!-- Left Column: Settings -->
        <div class="w-full lg:w-[800px] flex flex-col gap-xl">
            <!-- Page Header -->
            <header class="flex flex-col gap-sm mt-md">
                <h1 class="font-headline-xl text-headline-xl text-on-surface">Edit Profile</h1>
                <p class="font-body-md text-body-md text-on-surface-variant max-w-2xl">Update your personal information
                    and customize your account.</p>
            </header>
            <!-- Top Profile Card -->
            <section
                class="glass-card p-lg flex flex-col sm:flex-row items-center sm:items-start gap-lg relative overflow-hidden group">
                <div
                    class="absolute inset-0 bg-gradient-to-br from-primary/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none">
                </div>
                <div
                    class="relative w-24 h-24 sm:w-32 sm:h-32 rounded-full overflow-hidden border-2 border-surface-variant flex-shrink-0 group/avatar cursor-pointer">
                    <img alt="Eleanor Vance Avatar"
                        class="w-full h-full object-cover transition-transform duration-300 group-hover/avatar:scale-105"
                        data-alt="A close up, cinematic portrait of a serene woman named Eleanor Vance in soft, moody lighting. She has a calm expression, perfect for a high-end personal journaling application avatar. The background is a dark, sophisticated studio setting with subtle cool gray and indigo lighting accents."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAcLs_qprRBoh46tQfz5R83sFcPtlBzhYQwo-tjCFbsRyZWZFOxU-YflUKR4CxJMbP4T_9YYw5Qa5D4L-1h0sCvl3JgEItQfbQP_Kqq54u4toFl1_fhJkGbDK1zH9RO049zBtdu0Kio1bU7i5E_eUlKs0UeMxgRuVkWmG1kR2B-swPi_hEPWlxTw0y8qAdv1T9Ud73Xj-YEQsZ9qTmhqrlkuWOGM8CqamQend-oQa-A3hs00j6n2nU" />
                    <div
                        class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover/avatar:opacity-100 transition-opacity duration-300 backdrop-blur-sm">
                        <span class="material-symbols-outlined text-white text-[32px]">photo_camera</span>
                    </div>
                </div>
                <div class="flex flex-col gap-md items-center sm:items-start w-full z-10">
                    <div class="text-center sm:text-left">
                        <h2 class="font-headline-md text-headline-md text-on-surface">Eleanor Vance</h2>
                        <p class="font-body-md text-body-md text-primary">@eleanor_v</p>
                    </div>
                    <div class="flex flex-wrap gap-sm justify-center sm:justify-start w-full">
                        <button
                            class="px-6 py-2.5 bg-primary text-on-primary rounded-xl font-label-md text-label-md hover:bg-primary-container transition-all active:scale-95 flex items-center gap-2 shadow-[0_4px_14px_rgba(196,192,255,0.2)] hover:shadow-[0_6px_20px_rgba(196,192,255,0.3)]">
                            <span class="material-symbols-outlined text-[18px]">upload</span>
                            Upload New Photo
                        </button>
                        <button
                            class="px-6 py-2.5 bg-transparent border border-outline-variant text-on-surface-variant rounded-xl font-label-md text-label-md hover:bg-surface-variant hover:text-on-surface transition-all active:scale-95 flex items-center gap-2">
                            <span class="material-symbols-outlined text-[18px]">delete</span>
                            Remove Photo
                        </button>
                    </div>
                </div>
            </section>
            <!-- Profile Information Form -->
            <section class="glass-card p-lg flex flex-col gap-lg">
                <h3 class="font-headline-md text-headline-md text-on-surface border-b border-white/5 pb-sm">Profile
                    Information</h3>
                <form class="grid grid-cols-1 md:grid-cols-2 gap-x-gutter gap-y-lg">
                    <!-- Full Name -->
                    <div class="flex flex-col gap-sm">
                        <label class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Full
                            Name</label>
                        <div
                            class="bg-[#171A22] border border-surface-variant rounded-lg p-1 input-glow transition-all">
                            <input
                                class="w-full bg-transparent border-none text-on-surface font-body-md text-body-md focus:ring-0 px-3 py-2 rounded-md"
                                placeholder="Enter your full name" type="text" value="Eleanor Vance" />
                        </div>
                    </div>
                    <!-- Username -->
                    <div class="flex flex-col gap-sm">
                        <label
                            class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Username</label>
                        <div
                            class="bg-[#171A22] border border-surface-variant rounded-lg p-1 input-glow transition-all flex items-center pr-3">
                            <span class="text-on-surface-variant pl-3">@</span>
                            <input
                                class="w-full bg-transparent border-none text-on-surface font-body-md text-body-md focus:ring-0 px-2 py-2 rounded-md"
                                placeholder="Choose a username" type="text" value="eleanor_v" />
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="flex flex-col gap-sm">
                        <label
                            class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Email
                            Address</label>
                        <div
                            class="bg-[#171A22] border border-surface-variant rounded-lg p-1 input-glow transition-all">
                            <input
                                class="w-full bg-transparent border-none text-on-surface font-body-md text-body-md focus:ring-0 px-3 py-2 rounded-md"
                                placeholder="your@email.com" type="email" value="eleanor.vance@example.com" />
                        </div>
                    </div>
                    <!-- Phone -->
                    <div class="flex flex-col gap-sm">
                        <label
                            class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Phone
                            Number</label>
                        <div
                            class="bg-[#171A22] border border-surface-variant rounded-lg p-1 input-glow transition-all">
                            <input
                                class="w-full bg-transparent border-none text-on-surface font-body-md text-body-md focus:ring-0 px-3 py-2 rounded-md"
                                placeholder="Phone number" type="tel" value="+1 (555) 019-2834" />
                        </div>
                    </div>
                    <!-- DOB -->
                    <div class="flex flex-col gap-sm">
                        <label class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Date
                            of Birth</label>
                        <div
                            class="bg-[#171A22] border border-surface-variant rounded-lg p-1 input-glow transition-all relative">
                            <input
                                class="w-full bg-transparent border-none text-on-surface font-body-md text-body-md focus:ring-0 px-3 py-2 rounded-md [color-scheme:dark]"
                                type="date" value="1992-05-14" />
                        </div>
                    </div>
                    <!-- Gender Dropdown -->
                    <div class="flex flex-col gap-sm">
                        <label
                            class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Gender</label>
                        <div
                            class="bg-[#171A22] border border-surface-variant rounded-lg p-1 input-glow transition-all relative">
                            <select
                                class="w-full bg-transparent border-none text-on-surface font-body-md text-body-md focus:ring-0 px-3 py-2 rounded-md appearance-none cursor-pointer">
                                <option selected="" value="female">Female</option>
                                <option value="male">Male</option>
                                <option value="non-binary">Non-binary</option>
                                <option value="prefer-not">Prefer not to say</option>
                            </select>
                            <span
                                class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none">expand_more</span>
                        </div>
                    </div>
                    <!-- Country Dropdown -->
                    <div class="flex flex-col gap-sm">
                        <label
                            class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Country</label>
                        <div
                            class="bg-[#171A22] border border-surface-variant rounded-lg p-1 input-glow transition-all relative">
                            <select
                                class="w-full bg-transparent border-none text-on-surface font-body-md text-body-md focus:ring-0 px-3 py-2 rounded-md appearance-none cursor-pointer">
                                <option selected="" value="us">United States</option>
                                <option value="uk">United Kingdom</option>
                                <option value="ca">Canada</option>
                                <option value="au">Australia</option>
                            </select>
                            <span
                                class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none">expand_more</span>
                        </div>
                    </div>
                    <!-- Timezone Dropdown -->
                    <div class="flex flex-col gap-sm">
                        <label
                            class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Timezone</label>
                        <div
                            class="bg-[#171A22] border border-surface-variant rounded-lg p-1 input-glow transition-all relative">
                            <select
                                class="w-full bg-transparent border-none text-on-surface font-body-md text-body-md focus:ring-0 px-3 py-2 rounded-md appearance-none cursor-pointer">
                                <option selected="" value="pst">Pacific Time (PT)</option>
                                <option value="est">Eastern Time (ET)</option>
                                <option value="utc">UTC</option>
                            </select>
                            <span
                                class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none">expand_more</span>
                        </div>
                    </div>
                    <!-- Bio -->
                    <div class="flex flex-col gap-sm md:col-span-2">
                        <div class="flex justify-between items-end">
                            <label
                                class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Bio</label>
                            <span class="font-label-sm text-label-sm text-outline">124 / 500</span>
                        </div>
                        <div
                            class="bg-[#171A22] border border-surface-variant rounded-lg p-1 input-glow transition-all">
                            <textarea
                                class="w-full bg-transparent border-none text-on-surface font-body-md text-body-md focus:ring-0 px-3 py-2 rounded-md resize-none"
                                placeholder="Write a short bio..."
                                rows="4">Navigating life one entry at a time. Finding sanctuary in words, exploring the quiet spaces between thoughts. Avid tea drinker and night owl.</textarea>
                        </div>
                    </div>
                </form>
            </section>
            <!-- Preferences Card -->
            <section class="glass-card p-lg flex flex-col gap-lg">
                <h3 class="font-headline-md text-headline-md text-on-surface border-b border-white/5 pb-sm">Preferences
                </h3>
                <div class="flex flex-col gap-4">
                    <!-- Toggle: Dark Mode -->
                    <div
                        class="flex items-center justify-between p-4 rounded-xl hover:bg-surface-variant/30 transition-colors">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-full bg-surface-variant flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined">dark_mode</span>
                            </div>
                            <div>
                                <h4 class="font-label-md text-label-md text-on-surface">Dark Mode</h4>
                                <p class="font-body-md text-[14px] text-on-surface-variant">Experience Lumora in a dark,
                                    relaxing theme.</p>
                            </div>
                        </div>
                        <div
                            class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                            <input checked=""
                                class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer z-10 top-0 transition-all duration-300"
                                id="toggle-dark" name="toggle" type="checkbox" />
                            <label
                                class="toggle-label block overflow-hidden h-6 rounded-full bg-surface-variant cursor-pointer transition-colors duration-300"
                                for="toggle-dark"></label>
                        </div>
                    </div>
                    <!-- Toggle: Email Notifications -->
                    <div
                        class="flex items-center justify-between p-4 rounded-xl hover:bg-surface-variant/30 transition-colors">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-full bg-surface-variant flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined">mail</span>
                            </div>
                            <div>
                                <h4 class="font-label-md text-label-md text-on-surface">Email Notifications</h4>
                                <p class="font-body-md text-[14px] text-on-surface-variant">Receive updates and summary
                                    emails.</p>
                            </div>
                        </div>
                        <div
                            class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                            <input checked=""
                                class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer z-10 top-0 transition-all duration-300"
                                id="toggle-email" name="toggle" type="checkbox" />
                            <label
                                class="toggle-label block overflow-hidden h-6 rounded-full bg-surface-variant cursor-pointer transition-colors duration-300"
                                for="toggle-email"></label>
                        </div>
                    </div>
                    <!-- Toggle: Weekly Reminder -->
                    <div
                        class="flex items-center justify-between p-4 rounded-xl hover:bg-surface-variant/30 transition-colors">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-full bg-surface-variant flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined">edit_calendar</span>
                            </div>
                            <div>
                                <h4 class="font-label-md text-label-md text-on-surface">Weekly Writing Reminder</h4>
                                <p class="font-body-md text-[14px] text-on-surface-variant">Get a gentle nudge to write
                                    every Sunday.</p>
                            </div>
                        </div>
                        <div
                            class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                            <input checked=""
                                class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer z-10 top-0 transition-all duration-300"
                                id="toggle-remind" name="toggle" type="checkbox" />
                            <label
                                class="toggle-label block overflow-hidden h-6 rounded-full bg-surface-variant cursor-pointer transition-colors duration-300"
                                for="toggle-remind"></label>
                        </div>
                    </div>
                    <!-- Toggle: Public Profile -->
                    <div
                        class="flex items-center justify-between p-4 rounded-xl hover:bg-surface-variant/30 transition-colors opacity-70">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-full bg-surface-variant flex items-center justify-center text-on-surface-variant">
                                <span class="material-symbols-outlined">public</span>
                            </div>
                            <div>
                                <h4 class="font-label-md text-label-md text-on-surface">Public Profile</h4>
                                <p class="font-body-md text-[14px] text-on-surface-variant">Allow others to view your
                                    profile and public entries.</p>
                            </div>
                        </div>
                        <div
                            class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                            <input
                                class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer z-10 top-0 transition-all duration-300"
                                id="toggle-public" name="toggle" type="checkbox" />
                            <label
                                class="toggle-label block overflow-hidden h-6 rounded-full bg-surface-variant cursor-pointer transition-colors duration-300"
                                for="toggle-public"></label>
                        </div>
                    </div>
                    <!-- Toggle: Auto Save -->
                    <div
                        class="flex items-center justify-between p-4 rounded-xl hover:bg-surface-variant/30 transition-colors">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-full bg-surface-variant flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined">save</span>
                            </div>
                            <div>
                                <h4 class="font-label-md text-label-md text-on-surface">Auto Save Entries</h4>
                                <p class="font-body-md text-[14px] text-on-surface-variant">Automatically save drafts
                                    while typing.</p>
                            </div>
                        </div>
                        <div
                            class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                            <input checked=""
                                class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer z-10 top-0 transition-all duration-300"
                                id="toggle-autosave" name="toggle" type="checkbox" />
                            <label
                                class="toggle-label block overflow-hidden h-6 rounded-full bg-surface-variant cursor-pointer transition-colors duration-300"
                                for="toggle-autosave"></label>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Account & Security Section Row -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
                <!-- Account Info -->
                <section class="glass-card p-lg flex flex-col gap-md">
                    <h3 class="font-headline-md text-headline-md text-on-surface border-b border-white/5 pb-sm">Account
                        Info</h3>
                    <div class="flex flex-col gap-4 mt-2">
                        <div class="flex justify-between items-center py-2 border-b border-white/5">
                            <span class="font-body-md text-[14px] text-on-surface-variant">Account ID</span>
                            <span class="font-label-md text-label-md text-on-surface font-mono">#LUM-8492X</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-white/5">
                            <span class="font-body-md text-[14px] text-on-surface-variant">Member Since</span>
                            <span class="font-label-md text-label-md text-on-surface">Oct 2021</span>
                        </div>
                        <div class="flex justify-between items-center py-2">
                            <span class="font-body-md text-[14px] text-on-surface-variant">Subscription</span>
                            <span
                                class="font-label-md text-label-md text-primary bg-primary/10 px-2 py-1 rounded-md">Pro
                                Tier</span>
                        </div>
                    </div>
                </section>
                <!-- Security -->
                <section class="glass-card p-lg flex flex-col gap-md relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-4">
                        <span
                            class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-[#1e3a29] text-[#a3dcb5] font-label-sm text-[10px] uppercase tracking-wider border border-[#2d5940]">
                            <span class="material-symbols-outlined text-[14px]"
                                style="font-variation-settings: 'FILL' 1;">shield</span>
                            Secure
                        </span>
                    </div>
                    <h3 class="font-headline-md text-headline-md text-on-surface border-b border-white/5 pb-sm">Security
                    </h3>
                    <div class="flex flex-col gap-3 mt-2">
                        <button
                            class="w-full flex items-center justify-between p-3 rounded-lg bg-surface-variant hover:bg-surface-variant/80 transition-colors text-left group">
                            <div class="flex items-center gap-3 text-on-surface">
                                <span
                                    class="material-symbols-outlined text-outline group-hover:text-primary transition-colors">password</span>
                                <span class="font-label-md text-label-md">Change Password</span>
                            </div>
                            <span
                                class="material-symbols-outlined text-outline group-hover:text-on-surface">chevron_right</span>
                        </button>
                        <button
                            class="w-full flex items-center justify-between p-3 rounded-lg bg-surface-variant hover:bg-surface-variant/80 transition-colors text-left group">
                            <div class="flex items-center gap-3 text-on-surface">
                                <span
                                    class="material-symbols-outlined text-outline group-hover:text-primary transition-colors">devices</span>
                                <span class="font-label-md text-label-md">Manage Sessions</span>
                            </div>
                            <span
                                class="material-symbols-outlined text-outline group-hover:text-on-surface">chevron_right</span>
                        </button>
                    </div>
                </section>
            </div>
            <!-- Bottom Actions -->
            <div
                class="flex flex-col-reverse sm:flex-row justify-between items-center pt-xl pb-xxl border-t border-white/5 gap-4">
                <div class="flex gap-4 w-full sm:w-auto">
                    <button
                        class="w-full sm:w-auto px-6 py-3 bg-transparent text-on-surface-variant rounded-xl font-label-md text-label-md hover:text-on-surface transition-colors active:scale-95 text-center">Cancel</button>
                    <button
                        class="w-full sm:w-auto px-6 py-3 bg-transparent text-error hover:bg-error/10 rounded-xl font-label-md text-label-md transition-colors active:scale-95 text-center">Reset
                        Changes</button>
                </div>
                <button
                    class="w-full sm:w-auto px-8 py-3 bg-primary text-on-primary rounded-xl font-label-md text-label-md hover:bg-primary-container transition-all active:scale-95 shadow-[0_4px_20px_rgba(196,192,255,0.25)] hover:shadow-[0_8px_30px_rgba(196,192,255,0.4)] flex justify-center items-center gap-2 text-center">
                    <span class="material-symbols-outlined text-[20px]"
                        style="font-variation-settings: 'FILL' 1;">check_circle</span>
                    Save Changes
                </button>
            </div>
        </div>
        <!-- Right Column: Sticky Sidebar -->
        <aside class="w-full lg:w-[320px] lg:flex-shrink-0">
            <div class="sticky top-[120px] flex flex-col gap-lg">
                <!-- Completion Card -->
                <div class="glass-card p-lg flex flex-col items-center gap-md">
                    <h3
                        class="font-label-md text-label-md text-on-surface-variant uppercase tracking-widest w-full text-center mb-2">
                        Profile Completion</h3>
                    <div class="relative w-32 h-32 flex items-center justify-center circular-progress shadow-inner"
                        style="--progress: 85;">
                        <div
                            class="absolute inset-2 bg-[#1D212C] rounded-full flex items-center justify-center shadow-[inset_0_4px_10px_rgba(0,0,0,0.4)]">
                            <span class="font-headline-lg text-headline-lg text-primary font-bold">85%</span>
                        </div>
                    </div>
                    <p class="font-body-md text-[14px] text-on-surface-variant text-center mt-2">Almost there! Complete
                        your profile to unlock personalized journaling prompts.</p>
                    <ul class="w-full flex flex-col gap-2 mt-4">
                        <li class="flex items-center gap-3 font-body-md text-[14px] text-on-surface opacity-50">
                            <span class="material-symbols-outlined text-primary text-[18px]">check_circle</span>
                            <span class="line-through decoration-white/20">Add Profile Photo</span>
                        </li>
                        <li class="flex items-center gap-3 font-body-md text-[14px] text-on-surface opacity-50">
                            <span class="material-symbols-outlined text-primary text-[18px]">check_circle</span>
                            <span class="line-through decoration-white/20">Verify Email</span>
                        </li>
                        <li class="flex items-center gap-3 font-body-md text-[14px] text-on-surface opacity-50">
                            <span class="material-symbols-outlined text-primary text-[18px]">check_circle</span>
                            <span class="line-through decoration-white/20">Write First Entry</span>
                        </li>
                        <li class="flex items-center gap-3 font-body-md text-[14px] text-on-surface">
                            <span
                                class="material-symbols-outlined text-outline text-[18px]">radio_button_unchecked</span>
                            <span>Connect Calendar</span>
                        </li>
                    </ul>
                </div>
                <!-- Writing Stats Card -->
                <div class="glass-card p-lg flex flex-col gap-md">
                    <h3
                        class="font-label-md text-label-md text-on-surface-variant uppercase tracking-widest border-b border-white/5 pb-sm">
                        Writing Stats</h3>
                    <div class="flex items-center gap-4 py-2">
                        <div
                            class="w-12 h-12 rounded-xl bg-surface-variant flex items-center justify-center text-primary shadow-inner">
                            <span class="material-symbols-outlined">menu_book</span>
                        </div>
                        <div>
                            <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">
                                Total Entries</p>
                            <p class="font-headline-md text-headline-md text-on-surface font-bold">124</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 py-2">
                        <div
                            class="w-12 h-12 rounded-xl bg-surface-variant flex items-center justify-center text-[#ffb4ab] shadow-inner">
                            <span class="material-symbols-outlined"
                                style="font-variation-settings: 'FILL' 1;">local_fire_department</span>
                        </div>
                        <div>
                            <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">
                                Current Streak</p>
                            <p class="font-headline-md text-headline-md text-on-surface font-bold">15 Days</p>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </main>
    <!-- Footer -->
    <footer class="w-full py-xxl bg-surface-container-lowest mt-xxl border-t border-white/5">
        <div
            class="max-w-[800px] mx-auto px-margin-mobile md:px-margin-desktop flex flex-col md:flex-row justify-between items-center gap-lg">
            <div class="flex flex-col items-center md:items-start gap-2">
                <span class="font-headline-md text-headline-md text-on-surface font-bold tracking-tight">Lumora</span>
                <span class="font-body-md text-[14px] text-on-surface-variant">© 2024 Lumora. A sanctuary for your
                    thoughts.</span>
            </div>
            <div class="flex flex-wrap justify-center gap-x-6 gap-y-2">
                <a class="font-label-sm text-label-sm text-on-secondary-fixed-variant hover:text-primary transition-all cursor-pointer"
                    href="#">Privacy Policy</a>
                <a class="font-label-sm text-label-sm text-on-secondary-fixed-variant hover:text-primary transition-all cursor-pointer"
                    href="#">Terms of Service</a>
                <a class="font-label-sm text-label-sm text-on-secondary-fixed-variant hover:text-primary transition-all cursor-pointer"
                    href="#">Journaling Guide</a>
                <a class="font-label-sm text-label-sm text-on-secondary-fixed-variant hover:text-primary transition-all cursor-pointer"
                    href="#">Support</a>
            </div>
        </div>
    </footer>
    <script>
    // Simple script to handle input glows more robustly if needed, 
    // but CSS :focus-within handles it well. 
    // Adding a small hover effect to the profile pic logic
    const profileUpload = document.querySelector('.group\\/avatar');
    if (profileUpload) {
        profileUpload.addEventListener('click', () => {
            // Mock upload click
            console.log('Open file dialog for new profile picture');
        });
    }
    </script>
</body>

</html>