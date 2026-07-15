<?php
        require_once "includes/auth.php";
        require_once "includes/config.php";
      
        $userId = $_SESSION["user_id"];
        $username = $_SESSION["username"];

       // Total Entries
        $query = mysqli_query(
         $conn,
        "SELECT COUNT(*) AS total
        FROM diary_entries
        WHERE user_id = $userId"
        );

        $totalEntries = mysqli_fetch_assoc($query)["total"];

        // This Month
        $query = mysqli_query(
            $conn,
            "SELECT COUNT(*) AS total
            FROM diary_entries
            WHERE user_id = $userId
            AND MONTH(created_at) = MONTH(CURRENT_DATE())
            AND YEAR(created_at) = YEAR(CURRENT_DATE())"
        );

        $thisMonth = mysqli_fetch_assoc($query)["total"];

      

        // Recent Entries
        $entries = mysqli_query(
            $conn,
            "SELECT *
            FROM diary_entries
            WHERE user_id = $userId
            ORDER BY created_at DESC
            LIMIT 4"
        );

      
?>

<!DOCTYPE html>

<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Diary Dashboard</title>
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
                                "on-surface-variant": "#c7c4d8",
                                "on-primary-fixed-variant": "#3622ca",
                                "inverse-on-surface": "#302f39",
                                "surface": "#13121b",
                                "on-background": "#e4e1ee",
                                "primary-fixed-dim": "#c4c0ff",
                                "error-container": "#93000a",
                                "inverse-surface": "#e4e1ee",
                                "background": "#13121b",
                                "surface-tint": "#c4c0ff",
                                "surface-dim": "#13121b",
                                "on-error": "#690005",
                                "secondary-container": "#444650",
                                "surface-container-lowest": "#0e0d16",
                                "primary-container": "#8781ff",
                                "surface-container-high": "#2a2933",
                                "on-primary-container": "#1b0091",
                                "on-primary": "#2000a4",
                                "inverse-primary": "#4f44e2",
                                "tertiary": "#c3c6d5",
                                "tertiary-fixed": "#dfe2f1",
                                "on-secondary": "#2d3039",
                                "on-secondary-fixed": "#181b23",
                                "secondary": "#c4c6d1",
                                "on-secondary-fixed-variant": "#444650",
                                "tertiary-container": "#8d909e",
                                "on-primary-fixed": "#100069",
                                "surface-container-low": "#1b1b24",
                                "on-tertiary-fixed-variant": "#434653",
                                "on-tertiary": "#2c303c",
                                "error": "#ffb4ab",
                                "secondary-fixed-dim": "#c4c6d1",
                                "primary-fixed": "#e3dfff",
                                "on-surface": "#e4e1ee",
                                "on-error-container": "#ffdad6",
                                "secondary-fixed": "#e0e2ed",
                                "on-tertiary-fixed": "#171b26",
                                "tertiary-fixed-dim": "#c3c6d5",
                                "surface-container-highest": "#35343e",
                                "outline": "#918fa1",
                                "surface-bright": "#393842",
                                "outline-variant": "#464555",
                                "on-secondary-container": "#b3b5bf",
                                "primary": "#c4c0ff",
                                "surface-variant": "#35343e",
                                "on-tertiary-container": "#262935",
                                "surface-container": "#1f1f28"
                            },
                            "borderRadius": {
                                "DEFAULT": "0.25rem",
                                "lg": "0.5rem",
                                "xl": "0.75rem",
                                "full": "9999px"
                            },
                            "spacing": {
                                "xxl": "64px",
                                "sm": "8px",
                                "lg": "24px",
                                "margin-mobile": "16px",
                                "base": "8px",
                                "xl": "40px",
                                "xs": "4px",
                                "gutter": "24px",
                                "md": "16px",
                                "margin-desktop": "48px"
                            },
                            "fontFamily": {
                                "label-sm": ["Inter"],
                                "headline-lg-mobile": ["Inter"],
                                "headline-lg": ["Inter"],
                                "body-md": ["Inter"],
                                "body-lg": ["Inter"],
                                "label-md": ["Inter"],
                                "headline-xl": ["Inter"],
                                "headline-md": ["Inter"]
                            },
                            "fontSize": {
                                "label-sm": ["12px", {
                                    "lineHeight": "1",
                                    "fontWeight": "600"
                                }],
                                "headline-lg-mobile": ["24px", {
                                    "lineHeight": "1.3",
                                    "fontWeight": "600"
                                }],
                                "headline-lg": ["32px", {
                                    "lineHeight": "1.25",
                                    "letterSpacing": "-0.02em",
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
                                "label-md": ["14px", {
                                    "lineHeight": "1",
                                    "letterSpacing": "0.01em",
                                    "fontWeight": "500"
                                }],
                                "headline-xl": ["40px", {
                                    "lineHeight": "1.2",
                                    "letterSpacing": "-0.02em",
                                    "fontWeight": "600"
                                }],
                                "headline-md": ["24px", {
                                    "lineHeight": "1.4",
                                    "fontWeight": "500"
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
            background: rgba(29, 33, 44, 0.6);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.06);
        }

        .zen-mode-target {
            transition: opacity 0.3s ease;
        }

        .zen-mode .zen-mode-target {
            opacity: 0.2;
        }

        .zen-mode .zen-mode-target:hover {
            opacity: 1;
        }

        /* ===========================
        Custom Scrollbar
        =========================== */

        /* Width */
        ::-webkit-scrollbar {
            width: 8px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #1b1b24;
            border-radius: 20px;
        }

        /* Thumb */
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #8b83ff, #6d5dfc);
            border-radius: 20px;
            border: 2px solid #1b1b24;
            transition: all 0.3s ease;
        }

        /* Hover */
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #a59eff, #8b83ff);
        }

        /* Firefox */
        * {
            scrollbar-width: thin;
            scrollbar-color: #8b83ff #1b1b24;
        }
    </style>
</head>

<body class="flex h-screen overflow-hidden antialiased">
    <!-- SideNavBar (Shared Component Blueprint) -->
    <nav
        class="hidden md:flex flex-col h-screen w-64 fixed left-0 top-0 bg-surface-container-low dark:bg-surface-container-low border-r border-outline-variant/10 shadow-sm z-40 p-lg overflow-y-auto">
        <div class="flex items-center gap-4 mb-xl">
            <img src="uploads/logo.png" class="w-30 h-20 object-cover">
            
        </div>
        <a  href="add_entry.php"
            class="w-full bg-primary text-on-primary py-3 rounded-xl font-label-md text-label-md flex items-center justify-center gap-2 mb-8 hover:bg-primary/90 transition-colors">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">add</span>
            Write Now
        </a>
        <div class="flex flex-col gap-2 flex-grow">
            <!-- Active Item -->
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl bg-primary/10 text-primary font-bold transition-transform active:scale-95"
                href="#">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">dashboard</span>
                <span class="font-label-md text-label-md">Dashboard</span>
            </a>
            <!-- Inactive Items -->
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl text-on-surface-variant hover:text-on-surface hover:bg-surface-container-highest dark:hover:bg-surface-container-highest transition-colors duration-200 active:scale-95"
                href="view_entries.php">
                <span class="material-symbols-outlined">auto_stories</span>
                <span class="font-label-md text-label-md">My Diary</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl text-on-surface-variant hover:text-on-surface hover:bg-surface-container-highest dark:hover:bg-surface-container-highest transition-colors duration-200 active:scale-95"
                href="add_entry.php">
                <span class="material-symbols-outlined">edit_note</span>
                <span class="font-label-md text-label-md">Create Entry</span>
            </a>
           
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl text-on-surface-variant hover:text-on-surface hover:bg-surface-container-highest dark:hover:bg-surface-container-highest transition-colors duration-200 active:scale-95 mt-auto"
                href="logout.php">
                <span class="material-symbols-outlined">Logout</span>
                <span class="font-label-md text-label-md">Logout</span>
            </a>
        </div>
    </nav>
    <!-- Main Content Area -->
    <main class="flex-1 ml-0 md:ml-64 relative h-screen overflow-y-auto bg-background pb-20 md:pb-0" > 
        <!-- TopNavBar (Shared Component Blueprint) -->
         
       
<style>
    :root {
        --navbar-bg: #0B0F19;
        --navbar-surface: #131A26;
        --navbar-card: #1B2333;
        --navbar-primary: #6D5EF5;
        --navbar-primary-hover: #7C6EFF;
        --navbar-text: #F5F7FA;
        --navbar-text-secondary: #97A1B5;
        --navbar-border: rgba(255, 255, 255, 0.08);
        --navbar-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        --navbar-blur: 16px;
        --navbar-radius: 12px;
        --navbar-height: 76px;
        --transition: 250ms cubic-bezier(0.4, 0, 0.2, 1);
    }

    .lumora-nav-container {
        position: sticky;
        top: 0;
        z-index: 1000;
        width: 100%;
        height: var(--navbar-height);
        background: rgba(11, 15, 25, 0.75);
        backdrop-filter: blur(var(--navbar-blur));
        -webkit-backdrop-filter: blur(var(--navbar-blur));
        border-bottom: 1px solid var(--navbar-border);
        box-shadow: var(--navbar-shadow);
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 24px;
        box-sizing: border-box;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        color: var(--navbar-text);
    }

    /* Left Section */
    .nav-left {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .nav-logo {
        display: flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
        color: inherit;
        transition: var(--transition);
    }

    .nav-logo:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }

    .logo-icon {
        width: 32px;
        height: 32px;
        background: var(--navbar-primary);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .logo-name {
        font-size: 20px;
        font-weight: 700;
        letter-spacing: -0.02em;
    }

    .nav-divider {
        width: 1px;
        height: 20px;
        background: var(--navbar-border);
    }

    .page-title {
        font-size: 16px;
        font-weight: 500;
        color: var(--navbar-text-secondary);
    }

    /* Center Section - Search */
    .nav-center {
        flex: 1;
        max-width: 480px;
        margin: 0 32px;
        position: relative;
    }

    .search-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }

    .search-input {
        width: 100%;
        background: var(--navbar-surface);
        border: 1px solid var(--navbar-border);
        border-radius: 24px;
        padding: 10px 44px;
        color: var(--navbar-text);
        font-size: 14px;
        transition: var(--transition);
        outline: none;
    }

    .search-input:focus {
        border-color: var(--navbar-primary);
        background: var(--navbar-bg);
        box-shadow: 0 0 0 4px rgba(109, 94, 245, 0.15);
    }

    .search-icon {
        position: absolute;
        left: 16px;
        opacity: 0.5;
    }

    .search-shortcut {
        position: absolute;
        right: 12px;
        background: var(--navbar-card);
        border: 1px solid var(--navbar-border);
        padding: 2px 6px;
        border-radius: 4px;
        font-size: 11px;
        color: var(--navbar-text-secondary);
        pointer-events: none;
    }

    /* Right Section */
    .nav-right {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .btn-new-entry {
        background: var(--navbar-primary);
        color: white;
        border: none;
        padding: 8px 18px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: var(--transition);
        box-shadow: 0 4px 12px rgba(109, 94, 245, 0.25);
    }

    .btn-new-entry:hover {
        background: var(--navbar-primary-hover);
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(109, 94, 245, 0.35);
    }

    .icon-btn {
        background: none;
        border: none;
        color: var(--navbar-text-secondary);
        cursor: pointer;
        padding: 8px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: var(--transition);
        position: relative;
    }

    .icon-btn:hover {
        background: var(--navbar-surface);
        color: var(--navbar-text);
    }

    .badge {
        position: absolute;
        top: 6px;
        right: 6px;
        width: 8px;
        height: 8px;
        background: #FF4D4D;
        border: 2px solid var(--navbar-bg);
        border-radius: 50%;
    }

    /* Profile Dropdown */
    .profile-trigger {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 4px;
        background: var(--navbar-surface);
        border: 1px solid var(--navbar-border);
        border-radius: 24px;
        cursor: pointer;
        transition: var(--transition);
        position: relative;
    }

    .profile-trigger:hover {
        border-color: var(--navbar-primary);
    }

    .avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        object-fit: cover;
    }

    .dropdown-arrow {
        margin-right: 8px;
        font-size: 12px;
        color: var(--navbar-text-secondary);
    }

    .profile-dropdown {
        position: absolute;
        top: calc(100% + 12px);
        right: 0;
        width: 240px;
        background: var(--navbar-card);
        border: 1px solid var(--navbar-border);
        border-radius: var(--navbar-radius);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        padding: 8px;
        visibility: hidden;
        opacity: 0;
        transform: translateY(10px);
        transition: var(--transition);
        z-index: 1001;
    }

    .profile-trigger:focus-within .profile-dropdown,
    .profile-trigger.active .profile-dropdown {
        visibility: visible;
        opacity: 1;
        transform: translateY(0);
    }

    .dropdown-header {
        padding: 12px;
        border-bottom: 1px solid var(--navbar-border);
        margin-bottom: 8px;
    }

    .user-name {
        display: block;
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 2px;
    }

    .user-email {
        display: block;
        font-size: 12px;
        color: var(--navbar-text-secondary);
    }

    .dropdown-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px 12px;
        border-radius: 8px;
        text-decoration: none;
        color: var(--navbar-text);
        font-size: 14px;
        transition: var(--transition);
    }

    .dropdown-item:hover {
        background: var(--navbar-surface);
        color: var(--navbar-primary);
    }

    .dropdown-item.logout {
        color: #FF4D4D;
        margin-top: 8px;
        border-top: 1px solid var(--navbar-border);
        border-radius: 0 0 8px 8px;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .nav-center {
            max-width: 300px;
            margin: 0 16px;
        }
    }

    @media (max-width: 768px) {
        .nav-divider, .page-title, .search-shortcut, .btn-new-entry-text {
            display: none;
        }
        .nav-center {
            margin: 0;
            flex: 0;
        }
        .search-input {
            width: 40px;
            padding: 10px;
            cursor: pointer;
            border-radius: 50%;
        }
        .search-input:focus {
            position: absolute;
            right: -100px;
            width: 200px;
            border-radius: 24px;
            padding: 10px 44px;
        }
    }
</style>

<?php

        require_once "includes/navbar.php";

?>

<script>
    // Simple toggle for the profile dropdown if focus is not sufficient
    const profileTrigger = document.querySelector('.profile-trigger');
    profileTrigger.addEventListener('click', function(e) {
        this.classList.toggle('active');
        e.stopPropagation();
    });

    document.addEventListener('click', function() {
        profileTrigger.classList.remove('active');
    });

    // Prevent search shortcut display on mobile
    if (window.innerWidth < 768) {
        document.querySelector('.search-shortcut').style.display = 'none';
    }
</script>

        <!-- Scrollable Content Container -->
        <div class="pt-20 px-margin-mobile md:px-margin-desktop max-w-6xl mx-auto space-y-xl">
            
            <!-- Greeting Section -->
            <section class="flex flex-col sm:flex-row sm:items-end justify-between gap-6">
                <div>
                    <h1 class="font-headline-xl text-headline-lg-mobile md:text-headline-xl text-on-surface mb-2">Welcome  <?php echo htmlspecialchars($username); ?></h1>
                    <p class="font-body-lg text-body-lg text-on-surface-variant">Capture today's thoughts before they
                        fade.</p>
                </div>
               
            </section>
            <!-- Quick Stats -->
            <section class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                <!-- Stat Card 1 -->
                <div class="glass-card rounded-[18px] p-6 flex flex-col gap-4">
                    <div class="flex justify-between items-start">
                        <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined">auto_stories</span>
                        </div>
                    </div>
                    <div>
                        <p class="font-label-sm text-label-sm text-on-surface-variant mb-1 uppercase tracking-wider">
                            Total Entries</p>
                        <p class="font-headline-md text-headline-md text-on-surface font-bold"><?php echo $totalEntries; ?> </p>
                    </div>
                </div>
                <!-- Stat Card 2 -->
                <div class="glass-card rounded-[18px] p-6 flex flex-col gap-4">
                    <div class="flex justify-between items-start">
                        <div
                            class="w-10 h-10 rounded-full bg-tertiary/10 flex items-center justify-center text-tertiary">
                            <span class="material-symbols-outlined">today</span>
                        </div>
                    </div>
                    <div>
                        <p class="font-label-sm text-label-sm text-on-surface-variant mb-1 uppercase tracking-wider">
                            This Month</p>
                        <p class="font-headline-md text-headline-md text-on-surface font-bold"><?php echo $thisMonth; ?></p>
                    </div>
                </div>
                <!-- Stat Card 3 -->
               
                   
               
            </section>
            <!-- Main Content Area Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Recent Entries List -->
                <section class="lg:col-span-2 glass-card rounded-[18px] p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-headline-md text-headline-md text-on-surface font-semibold">Recent Entries</h3>
                        <a class="font-label-md text-label-md text-primary hover:text-primary/80 transition-colors"
                            href="view_entries.php">View All</a>
                    </div>
                    <div class="space-y-4 max-h-[420px] overflow-y-auto pr-2">
                        <?php if(mysqli_num_rows($entries) > 0): ?>

                        <?php while($entry = mysqli_fetch_assoc($entries)): ?>

                            <div class="group flex gap-4 p-4 rounded-xl hover:bg-surface-container-highest transition-colors cursor-pointer border border-transparent hover:border-outline-variant/10">

                                <div class="w-12 h-12 rounded-xl bg-surface flex items-center justify-center text-xl shrink-0">
                                    📖
                                </div>

                                <div class="flex-1 min-w-0">
                                    <h4 class="font-label-md text-label-md text-on-surface font-bold truncate mb-1">
                                        <?php echo htmlspecialchars($entry['title']); ?>
                                    </h4>

                                    <p class="font-body-md text-body-md text-on-surface-variant text-sm truncate">
                                        <?php echo htmlspecialchars(substr($entry['content'], 0, 80)); ?>...
                                    </p>
                                </div>

                                <div class="text-right shrink-0">
                                    <span class="font-label-sm text-label-sm text-on-surface-variant">
                                        <?php echo date("d M Y", strtotime($entry['created_at'])); ?>
                                    </span>
                                </div>

                            </div>

                        <?php endwhile; ?>

                    <?php else: ?>

                        <div class="text-center py-10 text-on-surface-variant">
                            No diary entries found.
                        </div>

                    <?php endif; ?>
                    </div>
                </section>
                <!-- Side Panel (Streak & Mood) -->
                <div class="space-y-6">
                    <!-- Streak Visualizer -->
                    <section class="glass-card rounded-[18px] p-6 relative overflow-hidden">
                        <div
                            class="absolute top-0 right-0 w-32 h-32 bg-primary/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2">
                        </div>
                        <h3
                            class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider mb-4 relative z-10">
                            Writing Streak</h3>
                        <!-- Mini Calendar Graph Placeholder -->
                        <div class="grid grid-cols-7 gap-2 mb-6 relative z-10">
                            <!-- Just visual dots for streak -->
                            <div class="w-full aspect-square rounded-sm bg-primary/20"></div>
                            <div class="w-full aspect-square rounded-sm bg-primary/40"></div>
                            <div class="w-full aspect-square rounded-sm bg-primary/60"></div>
                            <div class="w-full aspect-square rounded-sm bg-primary/80"></div>
                            <div class="w-full aspect-square rounded-sm bg-primary"></div>
                            <div class="w-full aspect-square rounded-sm bg-primary"></div>
                            <div
                                class="w-full aspect-square rounded-sm bg-surface-container-highest border border-outline-variant/20">
                            </div>
                        </div>
                        <blockquote class="border-l-2 border-primary pl-4 relative z-10">
                            <p class="font-body-md text-body-md text-on-surface italic text-sm">"The faintest ink is
                                more powerful than the strongest memory."</p>
                        </blockquote>
                    </section>
                    <!-- Mood Overview Placeholder -->
                    <section class="glass-card rounded-[18px] p-6 h-[200px] flex flex-col">
                        <h3 class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider mb-4">
                            Mood Overview</h3>
                        <div
                            class="flex-1 bg-surface-container-low rounded-xl border border-outline-variant/10 flex items-center justify-center p-4">
                            <!-- Simple visual representation of a chart -->
                            <div class="w-full h-full flex items-end gap-2 justify-between">
                                <div class="w-1/6 bg-secondary/30 rounded-t-sm h-[30%]"></div>
                                <div class="w-1/6 bg-secondary/40 rounded-t-sm h-[50%]"></div>
                                <div class="w-1/6 bg-primary/60 rounded-t-sm h-[80%]"></div>
                                <div class="w-1/6 bg-secondary/50 rounded-t-sm h-[60%]"></div>
                                <div class="w-1/6 bg-primary/80 rounded-t-sm h-[90%]"></div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <?php require "includes/footer.php"; ?>
    </main>
    <!-- Mobile Bottom Nav Fallback (If needed based on constraints, though TopNavBar acts as primary on mobile usually in this layout style) -->
 
    

</body>

</html>