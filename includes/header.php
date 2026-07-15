<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=block"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
    try {
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "secondary-fixed": "#e0e2ed",
                        "secondary-container": "#444650",
                        "surface-tint": "#c4c0ff",
                        "tertiary": "#c3c6d5",
                        "primary": "#c4c0ff",
                        "on-primary-fixed": "#100069",
                        "on-surface": "#e4e1ee",
                        "on-secondary": "#2d3039",
                        "on-primary-container": "#1b0091",
                        "on-error": "#690005",
                        "on-primary": "#2000a4",
                        "inverse-primary": "#4f44e2",
                        "surface-bright": "#393842",
                        "on-tertiary-container": "#262935",
                        "on-secondary-fixed": "#181b23",
                        "surface-variant": "#35343e",
                        "on-tertiary-fixed-variant": "#434653",
                        "inverse-on-surface": "#302f39",
                        "tertiary-fixed": "#dfe2f1",
                        "secondary-fixed-dim": "#c4c6d1",
                        "on-secondary-fixed-variant": "#444650",
                        "background": "#13121b",
                        "tertiary-fixed-dim": "#c3c6d5",
                        "outline-variant": "#464555",
                        "on-tertiary": "#2c303c",
                        "on-tertiary-fixed": "#171b26",
                        "surface": "#13121b",
                        "on-secondary-container": "#b3b5bf",
                        "primary-fixed": "#e3dfff",
                        "on-background": "#e4e1ee",
                        "surface-container": "#1f1f28",
                        "on-surface-variant": "#c7c4d8",
                        "primary-fixed-dim": "#c4c0ff",
                        "error-container": "#93000a",
                        "inverse-surface": "#e4e1ee",
                        "on-error-container": "#ffdad6",
                        "surface-container-lowest": "#0e0d16",
                        "error": "#ffb4ab",
                        "outline": "#918fa1",
                        "surface-container-highest": "#35343e",
                        "surface-container-low": "#1b1b24",
                        "on-primary-fixed-variant": "#3622ca",
                        "tertiary-container": "#8d909e",
                        "surface-dim": "#13121b",
                        "secondary": "#c4c6d1",
                        "surface-container-high": "#2a2933",
                        "primary-container": "#8781ff"
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    spacing: {
                        "base": "8px",
                        "xs": "4px",
                        "gutter": "24px",
                        "margin-desktop": "48px",
                        "md": "16px",
                        "sm": "8px",
                        "margin-mobile": "16px",
                        "xxl": "64px",
                        "xl": "40px",
                        "lg": "24px"
                    },
                    fontFamily: {
                        "headline-lg": ["Inter"],
                        "label-sm": ["Inter"],
                        "body-lg": ["Inter"],
                        "headline-xl": ["Inter"],
                        "headline-lg-mobile": ["Inter"],
                        "body-md": ["Inter"],
                        "headline-md": ["Inter"],
                        "label-md": ["Inter"]
                    },
                    fontSize: {
                        "headline-lg": ["32px", {
                            "lineHeight": "1.25",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "600"
                        }],
                        "label-sm": ["12px", {
                            "lineHeight": "1",
                            "fontWeight": "600"
                        }],
                        "body-lg": ["18px", {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
                        }],
                        "headline-xl": ["40px", {
                            "lineHeight": "1.2",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "600"
                        }],
                        "headline-lg-mobile": ["24px", {
                            "lineHeight": "1.3",
                            "fontWeight": "600"
                        }],
                        "body-md": ["16px", {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
                        }],
                        "headline-md": ["24px", {
                            "lineHeight": "1.4",
                            "fontWeight": "500"
                        }],
                        "label-md": ["14px", {
                            "lineHeight": "1",
                            "letterSpacing": "0.01em",
                            "fontWeight": "500"
                        }]
                    }
                }
            }
        }
    } catch (_e) {}
    </script>
    <meta charset="utf-8">
</head>

<body class="antialiased">

    <header class="glass-panel w-full sticky top-0 z-50 px-gutter py-md flex justify-between items-center"
        style="border-radius: 0 0 20px 20px;">
        <!-- Left: Logo & Context -->
        <div class="flex items-center gap-md">
            <div class="flex items-center gap-sm">
                <span class="material-symbols-outlined text-primary" style="font-size: 28px;">auto_awesome</span>
                <span class="font-headline-md text-headline-md font-bold text-on-surface">Lumora</span>
            </div>
            <div class="h-6 w-px bg-outline-variant/50 mx-sm"></div>
            <span class="font-body-md text-body-md text-on-surface-variant font-medium">Dashboard</span>
        </div>
        <!-- Center: Search -->
        <div class="flex-1 max-w-[480px] mx-gutter hidden md:block relative">
            <div
                class="bg-surface-variant/50 rounded-[20px] border border-outline-variant/30 flex items-center px-md py-sm transition-all focus-within:border-primary focus-within:ring-1 focus-within:ring-primary/50">
                <span class="material-symbols-outlined text-on-surface-variant mr-sm">search</span>
                <input type="text" placeholder="Search your memories..."
                    class="bg-transparent border-none w-full text-on-surface placeholder-on-surface-variant/70 font-body-md text-body-md focus:ring-0 p-0">
                <div
                    class="flex items-center gap-1 bg-surface-container px-2 py-1 rounded text-on-surface-variant font-label-sm text-label-sm border border-outline-variant/30 ml-2">
                    <span class="">Ctrl</span>
                    <span class="">+</span>
                    <span class="">K</span>
                </div>
            </div>
        </div>
        <!-- Right: Actions & Profile -->
        <div class="flex items-center gap-md relative">
            <!-- Notification Bell -->
            <button
                class="relative p-sm rounded-full text-on-surface-variant hover:text-on-surface hover:bg-surface-variant/50 transition-colors">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 0;">notifications</span>
                <span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full z-10"></span>
                <span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full pulse-badge"></span>
            </button>
            <!-- New Entry Button -->
            <button
                class="gradient-btn text-white px-md py-sm rounded-xl font-label-md text-label-md flex items-center gap-sm transition-all shadow-lg shadow-primary/20">
                <span class="material-symbols-outlined text-[18px]">add</span>
                New Entry
            </button>
            <!-- User Profile -->
            <button
                class="relative rounded-full focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:ring-offset-background ml-sm"
                id="profile-btn">
                <img class="w-10 h-10 rounded-full object-cover border border-outline-variant/50"
                    data-alt="A small, circular avatar portrait of a sophisticated person with short hair, softly lit in a modern studio environment, set against a dark grey backdrop, high quality."
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDnN98wdFZLRpvCa9IF5ppSoH3QTwlO6738nSTF_QT-7RE9nLW7XE2twuPq5J3sD4SZfqpqlybrP-WmWSzBe71fBIop9yTwV2ziIeubqOVKzvCU8Vwb-4MKCt-X-fhadnilN6qvzt0qg4Tt-KG00_PMJ6yxBsfq35zg7azh5u9fAUAYWHDEBhSdcvZr-iVrIGaRWM35mAGQJO8Tyvpx6t5XqRkDmMeg20i5BoTtjx7MBuCfSDrdniA">
                <span
                    class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-surface-container rounded-full"></span>
            </button>
            <!-- Profile Dropdown (Demonstrated in open state) -->
            <div class="glass-dropdown absolute top-[120%] right-0 w-[240px] rounded-[20px] p-sm z-50 animate-fade-in-down"
                style="border-radius: 20px;">
                <!-- Header -->
                <div class="px-md py-md border-b border-outline-variant/20 mb-sm">
                    <p class="font-label-md text-label-md text-on-surface font-semibold truncate">Alex Mercer</p>
                    <p class="font-body-md text-body-md text-on-surface-variant text-[13px] truncate">alex@lumora.app
                    </p>
                </div>
                <!-- Menu Items -->
                <nav class="flex flex-col gap-xs">
                    <a class="flex items-center gap-md px-md py-sm rounded-xl text-on-surface-variant hover:text-on-surface hover:bg-surface-variant/50 transition-colors font-body-md text-body-md"
                        href="#">
                        <span class="material-symbols-outlined text-[20px]">person</span>
                        Profile
                    </a>
                    <a class="flex items-center gap-md px-md py-sm rounded-xl text-on-surface-variant hover:text-on-surface hover:bg-surface-variant/50 transition-colors font-body-md text-body-md"
                        href="#">
                        <span class="material-symbols-outlined text-[20px]">manage_accounts</span>
                        My Account
                    </a>
                    <a class="flex items-center gap-md px-md py-sm rounded-xl text-on-surface-variant hover:text-on-surface hover:bg-surface-variant/50 transition-colors font-body-md text-body-md"
                        href="#">
                        <span class="material-symbols-outlined text-[20px]">settings</span>
                        Settings
                    </a>
                    <div class="h-px w-full bg-outline-variant/20 my-xs"></div>
                    <a class="flex items-center gap-md px-md py-sm rounded-xl text-on-surface-variant hover:text-on-surface hover:bg-surface-variant/50 transition-colors font-body-md text-body-md"
                        href="#">
                        <span class="material-symbols-outlined text-[20px]">help</span>
                        Help
                    </a>
                    <a class="flex items-center gap-md px-md py-sm rounded-xl text-error hover:bg-error/10 transition-colors font-body-md text-body-md mt-xs"
                        href="#">
                        <span class="material-symbols-outlined text-[20px]">logout</span>
                        Logout
                    </a>
                </nav>
            </div>
        </div>
    </header>
    <!-- Main Content Area to show contrast -->