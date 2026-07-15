<!DOCTYPE html>

<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Lumora - View Diary Entry</title>
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
                    "surface-container-lowest": "#0e0d16",
                    "primary-container": "#8781ff",
                    "error": "#ffb4ab",
                    "on-surface": "#e4e1ee",
                    "on-surface-variant": "#c7c4d8",
                    "error-container": "#93000a",
                    "tertiary": "#c3c6d5",
                    "surface-container-low": "#1b1b24",
                    "surface-variant": "#35343e",
                    "on-background": "#e4e1ee",
                    "on-secondary-fixed": "#181b23",
                    "on-error": "#690005",
                    "on-secondary": "#2d3039",
                    "primary-fixed": "#e3dfff",
                    "surface": "#13121b",
                    "inverse-on-surface": "#302f39",
                    "tertiary-fixed": "#dfe2f1",
                    "on-secondary-container": "#b3b5bf",
                    "surface-container-highest": "#35343e",
                    "surface-container": "#1f1f28",
                    "on-primary-fixed": "#100069",
                    "on-tertiary": "#2c303c",
                    "background": "#13121b",
                    "surface-bright": "#393842",
                    "inverse-primary": "#4f44e2",
                    "secondary-fixed-dim": "#c4c6d1",
                    "on-primary-fixed-variant": "#3622ca",
                    "secondary-container": "#444650",
                    "surface-tint": "#c4c0ff",
                    "secondary-fixed": "#e0e2ed",
                    "tertiary-fixed-dim": "#c3c6d5",
                    "primary": "#c4c0ff",
                    "on-primary-container": "#1b0091",
                    "on-error-container": "#ffdad6",
                    "primary-fixed-dim": "#c4c0ff",
                    "inverse-surface": "#e4e1ee",
                    "on-secondary-fixed-variant": "#444650",
                    "surface-dim": "#13121b",
                    "on-tertiary-fixed": "#171b26",
                    "on-primary": "#2000a4",
                    "outline-variant": "#464555",
                    "surface-container-high": "#2a2933",
                    "on-tertiary-container": "#262935",
                    "tertiary-container": "#8d909e",
                    "secondary": "#c4c6d1",
                    "outline": "#918fa1",
                    "on-tertiary-fixed-variant": "#434653"
                },
                "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
                },
                "spacing": {
                    "lg": "24px",
                    "xs": "4px",
                    "margin-desktop": "48px",
                    "md": "16px",
                    "margin-mobile": "16px",
                    "xxl": "64px",
                    "gutter": "24px",
                    "sm": "8px",
                    "base": "8px",
                    "xl": "40px"
                },
                "fontFamily": {
                    "headline-md": [
                        "Inter"
                    ],
                    "label-md": [
                        "Inter"
                    ],
                    "body-md": [
                        "Inter"
                    ],
                    "label-sm": [
                        "Inter"
                    ],
                    "headline-xl": [
                        "Inter"
                    ],
                    "headline-lg-mobile": [
                        "Inter"
                    ],
                    "body-lg": [
                        "Inter"
                    ],
                    "headline-lg": [
                        "Inter"
                    ]
                },
                "fontSize": {
                    "headline-md": [
                        "24px",
                        {
                            "lineHeight": "1.4",
                            "fontWeight": "500"
                        }
                    ],
                    "label-md": [
                        "14px",
                        {
                            "lineHeight": "1",
                            "letterSpacing": "0.01em",
                            "fontWeight": "500"
                        }
                    ],
                    "body-md": [
                        "16px",
                        {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
                        }
                    ],
                    "label-sm": [
                        "12px",
                        {
                            "lineHeight": "1",
                            "fontWeight": "600"
                        }
                    ],
                    "headline-xl": [
                        "40px",
                        {
                            "lineHeight": "1.2",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "600"
                        }
                    ],
                    "headline-lg-mobile": [
                        "24px",
                        {
                            "lineHeight": "1.3",
                            "fontWeight": "600"
                        }
                    ],
                    "body-lg": [
                        "18px",
                        {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
                        }
                    ],
                    "headline-lg": [
                        "32px",
                        {
                            "lineHeight": "1.25",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "600"
                        }
                    ]
                }
            },
        },
    }
    </script>
    <style>
    body {
        background-color: #0F1117;
        color: theme('colors.on-surface');
    }

    .glass-card {
        background: rgba(31, 31, 40, 0.6);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.06);
    }

    .fade-in {
        animation: fadeIn 0.8s ease-out forwards;
        opacity: 0;
        transform: translateY(10px);
    }

    @keyframes fadeIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    </style>
</head>

<body class="font-body-md text-body-md antialiased min-h-screen flex flex-col">
    <!-- TopNavBar Header -->
    <header
        class="fixed top-0 w-full z-50 bg-surface/70 dark:bg-surface/70 backdrop-blur-xl bg-surface-variant/70 backdrop-blur-md border-b border-outline-variant/20 shadow-lg shadow-black/15">
        <div class="flex justify-between items-center w-full px-lg py-sm max-w-[1440px] mx-auto">
            <div class="flex items-center gap-md">
                <span
                    class="font-headline-md text-headline-md font-bold text-on-surface dark:text-on-surface tracking-tight">Lumora</span>
            </div>
            <nav class="hidden md:flex items-center gap-lg">
                <a class="text-on-surface-variant dark:text-on-surface-variant font-medium font-label-md text-label-md hover:bg-secondary-container/50 dark:hover:bg-secondary-container/50 transition-colors duration-200 px-3 py-2 rounded-md"
                    href="#">Profile</a>
                <a class="text-on-surface-variant dark:text-on-surface-variant font-medium font-label-md text-label-md hover:bg-secondary-container/50 dark:hover:bg-secondary-container/50 transition-colors duration-200 px-3 py-2 rounded-md"
                    href="#">Account</a>
                <a class="text-on-surface-variant dark:text-on-surface-variant font-medium font-label-md text-label-md hover:bg-secondary-container/50 dark:hover:bg-secondary-container/50 transition-colors duration-200 px-3 py-2 rounded-md"
                    href="#">Settings</a>
                <a class="text-on-surface-variant dark:text-on-surface-variant font-medium font-label-md text-label-md hover:bg-secondary-container/50 dark:hover:bg-secondary-container/50 transition-colors duration-200 px-3 py-2 rounded-md"
                    href="#">Logout</a>
            </nav>
            <div class="flex items-center gap-sm">
                <button aria-label="search"
                    class="p-2 text-on-surface-variant hover:bg-secondary-container/50 dark:hover:bg-secondary-container/50 transition-colors duration-200 rounded-full flex items-center justify-center Active: scale-95 transition-transform duration-150">
                    <span class="material-symbols-outlined text-on-surface-variant">search</span>
                </button>
                <button aria-label="notifications"
                    class="p-2 text-on-surface-variant hover:bg-secondary-container/50 dark:hover:bg-secondary-container/50 transition-colors duration-200 rounded-full flex items-center justify-center Active: scale-95 transition-transform duration-150">
                    <span class="material-symbols-outlined text-on-surface-variant">notifications</span>
                </button>
                <button
                    class="ml-sm bg-primary-container text-on-primary-container font-label-md text-label-md px-md py-sm rounded-full hover:bg-primary-container/80 transition-colors Active: scale-95 transition-transform duration-150 flex items-center gap-xs">
                    New Entry
                </button>
                <div class="ml-sm hidden md:block">
                    <img alt="User profile menu"
                        class="w-8 h-8 rounded-full object-cover border border-outline-variant/30"
                        data-alt="A minimalist, high-end profile avatar placeholder image. Soft, cool lighting. Elegant, understated aesthetic in deep dark tones and muted indigo. 4k resolution."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuC17_kz_hv_fnDQ88HrB1lpB4xu9glEBZxVOXWt55tSD6zxzHIG3OYIAiuXfqacbf6ZSROoyJjNy2O2JUxJAKBLBBcWGYFsZ46Lnh8mwiqQWT1r5NeBXTd_OvIiUJP0h0jV87JTysGNf1VTclDcWwuU1mO4_WYpvEQa7wdHInTvgiRVe7fJGd9UXmnvoRgCZymzGGJukfQpbDdkQEKAY06tfqR3NDONDsndJkI2UU763a9O95erulg" />
                </div>
            </div>
        </div>
    </header>
    <div
        class="flex-grow pt-[80px] pb-xxl px-margin-mobile md:px-margin-desktop w-full max-w-[1440px] mx-auto flex flex-col lg:flex-row gap-gutter">
        <!-- Main Content -->
        <main class="flex-grow w-full max-w-[900px] mx-auto lg:mx-0">
            <a class="inline-flex items-center gap-xs text-on-surface-variant hover:text-primary transition-colors mb-xl font-label-md text-label-md group"
                href="#">
                <span
                    class="material-symbols-outlined text-[18px] group-hover:-translate-x-1 transition-transform">arrow_back</span>
                Back to Entries
            </a>
            <article class="glass-card rounded-[18px] p-lg md:p-xl shadow-lg shadow-black/15 fade-in">
                <!-- Header -->
                <header class="flex flex-col md:flex-row md:items-start justify-between gap-md mb-lg">
                    <div>
                        <h1
                            class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface mb-sm tracking-tight">
                            A Quiet Morning at the Lake</h1>
                        <div
                            class="flex flex-wrap items-center gap-md text-on-surface-variant font-label-sm text-label-sm">
                            <span class="flex items-center gap-xs"><span
                                    class="material-symbols-outlined text-[16px]">calendar_today</span> Oct 24,
                                2023</span>
                            <span class="flex items-center gap-xs"><span
                                    class="material-symbols-outlined text-[16px]">schedule</span> 07:30 AM</span>
                            <span
                                class="px-2 py-1 bg-surface-container-highest rounded-md flex items-center gap-xs text-on-surface">Calm
                                😌</span>
                            <span class="flex items-center gap-xs"><span
                                    class="material-symbols-outlined text-[16px]">timer</span> 3 min read</span>
                            <span class="flex items-center gap-xs"><span
                                    class="material-symbols-outlined text-[16px]">notes</span> 412 words</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-xs text-on-surface-variant">
                        <button
                            class="p-2 hover:bg-surface-container-highest rounded-full transition-colors hover:-translate-y-0.5 hover:shadow-md"
                            title="Edit">
                            <span class="material-symbols-outlined text-[20px]">edit</span>
                        </button>
                        <button
                            class="p-2 hover:bg-surface-container-highest rounded-full transition-colors hover:-translate-y-0.5 hover:shadow-md"
                            title="Bookmark">
                            <span class="material-symbols-outlined text-[20px]">bookmark</span>
                        </button>
                        <button
                            class="p-2 hover:bg-surface-container-highest rounded-full transition-colors hover:-translate-y-0.5 hover:shadow-md"
                            title="Share">
                            <span class="material-symbols-outlined text-[20px]">share</span>
                        </button>
                        <button
                            class="p-2 hover:bg-error-container/20 hover:text-error rounded-full transition-colors hover:-translate-y-0.5 hover:shadow-md"
                            title="Delete">
                            <span class="material-symbols-outlined text-[20px]">delete</span>
                        </button>
                    </div>
                </header>
                <hr class="border-outline-variant/20 mb-lg" />
                <!-- Content -->
                <div
                    class="prose prose-invert max-w-none font-body-lg text-body-lg text-on-surface-variant leading-relaxed space-y-md">
                    <p>
                        The mist was still hanging low over the pond when I arrived. It’s strange how a place can feel
                        completely new depending on the time of day. The usual chatter of the afternoon crowd was
                        replaced by absolute silence, save for the occasional splash of a fish or the distant call of a
                        heron.
                    </p>
                    <p>
                        I sat on the old wooden bench, the one near the weeping willow, and just watched the light
                        change. The sky shifted from deep indigo to a soft, bruised purple, and finally to a pale,
                        hopeful gold.
                    </p>
                    <blockquote
                        class="border-l-4 border-primary pl-md py-sm my-lg bg-surface-container-highest/30 rounded-r-lg text-on-surface italic font-body-lg">
                        "Nature does not hurry, yet everything is accomplished." - Lao Tzu
                    </blockquote>
                    <p>
                        It made me think about my own pacing lately. I’ve been rushing from task to task, trying to
                        check off boxes, but achieving very little of substance. Today, sitting here, I felt a profound
                        sense of relief.
                    </p>
                    <ul class="list-disc list-inside space-y-sm my-lg pl-sm">
                        <li>I need to wake up early more often.</li>
                        <li>Bring a thermos of coffee next time.</li>
                        <li>Spend less time planning the day and more time simply existing in it before it begins.</li>
                    </ul>
                    <p>
                        By the time the sun fully broke the horizon, the mist had burned away. The day had officially
                        started, but I felt ready for it, armored in the quiet of the morning.
                    </p>
                </div>
                <!-- Mood Snippet -->
                <div
                    class="mt-xl p-md bg-surface-container-highest/40 border border-outline-variant/30 rounded-lg flex items-start gap-md">
                    <span class="text-2xl mt-1">😌</span>
                    <div>
                        <h4 class="font-label-md text-label-md text-on-surface mb-xs font-semibold">Mood Today: Calm
                        </h4>
                        <p class="font-body-md text-body-md text-on-surface-variant">The mist was still hanging low over
                            the pond when I arrived. Feeling centered.</p>
                    </div>
                </div>
                <hr class="border-outline-variant/20 my-xl" />
                <!-- Pagination -->
                <div class="flex justify-between items-center">
                    <button
                        class="flex items-center gap-sm text-on-surface-variant hover:text-primary transition-colors font-label-md group hover:-translate-y-0.5">
                        <span
                            class="material-symbols-outlined text-[20px] group-hover:-translate-x-1 transition-transform">chevron_left</span>
                        <div class="text-left">
                            <span class="block text-[10px] uppercase tracking-wider opacity-70">Previous Entry</span>
                            <span class="block text-on-surface truncate max-w-[120px] sm:max-w-[200px]">Late Night
                                Thoughts</span>
                        </div>
                    </button>
                    <button
                        class="flex items-center gap-sm text-on-surface-variant hover:text-primary transition-colors font-label-md group hover:-translate-y-0.5">
                        <div class="text-right">
                            <span class="block text-[10px] uppercase tracking-wider opacity-70">Next Entry</span>
                            <span class="block text-on-surface truncate max-w-[120px] sm:max-w-[200px]">Coffee Shop
                                Observations</span>
                        </div>
                        <span
                            class="material-symbols-outlined text-[20px] group-hover:translate-x-1 transition-transform">chevron_right</span>
                    </button>
                </div>
            </article>
        </main>
        <!-- Sidebar -->
        <aside class="hidden lg:block w-[320px] flex-shrink-0 space-y-lg sticky top-[104px] self-start fade-in"
            style="animation-delay: 0.2s;">
            <!-- Info Panel -->
            <div class="glass-card rounded-[18px] p-lg">
                <h3 class="font-headline-md text-headline-md text-on-surface mb-md">Details</h3>
                <div class="space-y-md">
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-on-surface-variant font-label-sm">Created</span>
                        <span class="text-on-surface font-body-md">Oct 24, 2023</span>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-on-surface-variant font-label-sm">Updated</span>
                        <span class="text-on-surface font-body-md">Oct 24, 2023</span>
                    </div>
                    <hr class="border-outline-variant/20" />
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-on-surface-variant font-label-sm">Characters</span>
                        <span class="text-on-surface font-body-md">2,415</span>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-on-surface-variant font-label-sm">Words</span>
                        <span class="text-on-surface font-body-md">412</span>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-on-surface-variant font-label-sm">Reading Time</span>
                        <span class="text-on-surface font-body-md">3 min</span>
                    </div>
                </div>
            </div>
            <!-- Timeline -->
            <div class="glass-card rounded-[18px] p-lg">
                <h3 class="font-headline-md text-headline-md text-on-surface mb-md">Timeline</h3>
                <div class="relative pl-6 border-l border-outline-variant/30 space-y-md">
                    <div class="relative">
                        <span
                            class="absolute -left-[31px] top-1 bg-surface-container-highest rounded-full p-1 border border-outline-variant/30 flex items-center justify-center w-6 h-6">
                            <span class="material-symbols-outlined text-[14px] text-primary">edit</span>
                        </span>
                        <p class="font-label-sm text-label-sm text-on-surface-variant mb-1">Edited</p>
                        <p class="font-body-md text-body-md text-on-surface">Oct 24, 2023 - 08:15 AM</p>
                    </div>
                    <div class="relative">
                        <span
                            class="absolute -left-[31px] top-1 bg-surface-container-highest rounded-full p-1 border border-outline-variant/30 flex items-center justify-center w-6 h-6">
                            <span class="material-symbols-outlined text-[14px] text-tertiary">add</span>
                        </span>
                        <p class="font-label-sm text-label-sm text-on-surface-variant mb-1">Created</p>
                        <p class="font-body-md text-body-md text-on-surface">Oct 24, 2023 - 07:30 AM</p>
                    </div>
                </div>
            </div>
            <!-- Recent Entries -->
            <div class="glass-card rounded-[18px] p-lg">
                <h3 class="font-headline-md text-headline-md text-on-surface mb-md">Recent Entries</h3>
                <ul class="space-y-sm">
                    <li>
                        <a class="block p-sm rounded-lg hover:bg-surface-container-highest/50 transition-colors text-on-surface font-body-md truncate"
                            href="#">
                            Late Night Thoughts
                        </a>
                    </li>
                    <li>
                        <a class="block p-sm rounded-lg hover:bg-surface-container-highest/50 transition-colors text-on-surface font-body-md truncate"
                            href="#">
                            Meeting Notes: Project Alpha
                        </a>
                    </li>
                    <li>
                        <a class="block p-sm rounded-lg hover:bg-surface-container-highest/50 transition-colors text-on-surface font-body-md truncate"
                            href="#">
                            Weekend Hike Details
                        </a>
                    </li>
                    <li>
                        <a class="block p-sm rounded-lg hover:bg-surface-container-highest/50 transition-colors text-on-surface font-body-md truncate"
                            href="#">
                            Grocery List &amp; Meal Plan
                        </a>
                    </li>
                    <li>
                        <a class="block p-sm rounded-lg hover:bg-surface-container-highest/50 transition-colors text-on-surface font-body-md truncate"
                            href="#">
                            Random Ideas for Q4
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Calendar Widget (UI Only) -->
            <div class="glass-card rounded-[18px] p-lg">
                <div class="flex justify-between items-center mb-md">
                    <button class="text-on-surface-variant hover:text-primary"><span
                            class="material-symbols-outlined text-[20px]">chevron_left</span></button>
                    <span class="font-label-md text-label-md text-on-surface font-medium">October 2023</span>
                    <button class="text-on-surface-variant hover:text-primary"><span
                            class="material-symbols-outlined text-[20px]">chevron_right</span></button>
                </div>
                <div class="grid grid-cols-7 gap-1 text-center font-label-sm text-label-sm mb-2">
                    <span class="text-on-surface-variant/50">S</span>
                    <span class="text-on-surface-variant/50">M</span>
                    <span class="text-on-surface-variant/50">T</span>
                    <span class="text-on-surface-variant/50">W</span>
                    <span class="text-on-surface-variant/50">T</span>
                    <span class="text-on-surface-variant/50">F</span>
                    <span class="text-on-surface-variant/50">S</span>
                </div>
                <div class="grid grid-cols-7 gap-1 text-center font-body-md text-body-md">
                    <span class="p-1 text-on-surface-variant/30">1</span>
                    <span class="p-1 text-on-surface-variant/30">2</span>
                    <span class="p-1 text-on-surface-variant/30">3</span>
                    <span class="p-1 text-on-surface-variant/30">4</span>
                    <span class="p-1 text-on-surface-variant/30">5</span>
                    <span class="p-1 text-on-surface-variant/30">6</span>
                    <span class="p-1 text-on-surface-variant/30">7</span>
                    <!-- skipping full calendar for brevity, just showing a few rows -->
                    <span class="p-1 text-on-surface">22</span>
                    <span class="p-1 text-on-surface relative">23 <span
                            class="absolute bottom-0 left-1/2 -translate-x-1/2 w-1 h-1 bg-primary rounded-full"></span></span>
                    <span
                        class="p-1 bg-primary text-on-primary rounded-full font-bold shadow-md shadow-primary/20">24</span>
                    <span class="p-1 text-on-surface">25</span>
                    <span class="p-1 text-on-surface">26</span>
                    <span class="p-1 text-on-surface">27</span>
                    <span class="p-1 text-on-surface">28</span>
                </div>
            </div>
        </aside>
    </div>
</body>

</html>