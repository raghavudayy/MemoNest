<?php
        require_once "includes/auth.php";
        require_once "includes/config.php";
      
        $userId = $_SESSION["user_id"];
        $username = $_SESSION["username"];
        $email = $_SESSION["email"];

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

        //Words
       $totalWordsQuery = mysqli_prepare(
            $conn,
            "SELECT
            SUM(
                CASE
                    WHEN TRIM(content) = '' THEN 0
                    ELSE LENGTH(TRIM(content))
                        - LENGTH(REPLACE(TRIM(content), ' ', ''))
                        + 1
                END
            ) AS total_words
            FROM diary_entries
            WHERE user_id = ?"
        );

        mysqli_stmt_bind_param($totalWordsQuery, "i", $userId);
        mysqli_stmt_execute($totalWordsQuery);

        $result = mysqli_stmt_get_result($totalWordsQuery);

        $totalWords = mysqli_fetch_assoc($result)["total_words"] ?? 0;

        //Average Words
        if($totalEntries>=1){

        $avgwordstotal = $totalWords/$totalEntries;
        $avgwords = number_format($avgwordstotal, 2, '.', '');
        }else{
            $avgwords = 0;
        }

        // Recent Entries
        $entries = mysqli_query(
            $conn,
            "SELECT *
            FROM diary_entries
            WHERE user_id = $userId
            ORDER BY created_at DESC
            LIMIT 4"
        );

             // Top Mood

            $moodQuery = mysqli_prepare(
                $conn,
                "SELECT mood, COUNT(*) AS total
                FROM diary_entries
                WHERE user_id=?
                GROUP BY mood
                ORDER BY total DESC
                LIMIT 1"
            );

            mysqli_stmt_bind_param($moodQuery, "i", $userId);
            mysqli_stmt_execute($moodQuery);

            $moodResult = mysqli_stmt_get_result($moodQuery);

            $topMood = "N/A";

            if(mysqli_num_rows($moodResult) > 0){
                $topMood = mysqli_fetch_assoc($moodResult)['mood'];
            }




            $moodQuery = mysqli_prepare(
                $conn,
                "SELECT mood, COUNT(*) AS total
                FROM diary_entries
                WHERE user_id = ?
                GROUP BY mood
                ORDER BY total DESC"
            );

            mysqli_stmt_bind_param($moodQuery, "i", $userId);
            mysqli_stmt_execute($moodQuery);

            $moodResult = mysqli_stmt_get_result($moodQuery);

?>
<!DOCTYPE html>

<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Lumora - My Profile</title>
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
                        "surface-container-lowest": "#0e0d16",
                        "surface-container-highest": "#35343e",
                        "primary-container": "#8781ff",
                        "on-secondary-fixed-variant": "#444650",
                        "primary": "#c4c0ff",
                        "error": "#ffb4ab",
                        "primary-fixed-dim": "#c4c0ff",
                        "outline": "#918fa1",
                        "background": "#13121b",
                        "on-error": "#690005",
                        "tertiary-fixed-dim": "#c3c6d5",
                        "on-tertiary-fixed-variant": "#434653",
                        "on-primary": "#2000a4",
                        "inverse-on-surface": "#302f39",
                        "on-tertiary-fixed": "#171b26",
                        "on-surface-variant": "#c7c4d8",
                        "surface-container": "#1f1f28",
                        "on-secondary-fixed": "#181b23",
                        "surface-dim": "#13121b",
                        "surface-tint": "#c4c0ff",
                        "tertiary": "#c3c6d5",
                        "surface-container-low": "#1b1b24",
                        "secondary": "#c4c6d1",
                        "on-background": "#e4e1ee",
                        "tertiary-fixed": "#dfe2f1",
                        "secondary-fixed": "#e0e2ed",
                        "on-primary-container": "#1b0091",
                        "secondary-fixed-dim": "#c4c6d1",
                        "outline-variant": "#464555",
                        "tertiary-container": "#8d909e",
                        "on-primary-fixed-variant": "#3622ca",
                        "surface-container-high": "#2a2933",
                        "primary-fixed": "#e3dfff",
                        "inverse-surface": "#e4e1ee",
                        "on-secondary-container": "#b3b5bf",
                        "secondary-container": "#444650",
                        "surface-bright": "#393842",
                        "surface": "#13121b",
                        "on-error-container": "#ffdad6",
                        "inverse-primary": "#4f44e2",
                        "error-container": "#93000a",
                        "on-tertiary-container": "#262935",
                        "surface-variant": "#35343e",
                        "on-tertiary": "#2c303c",
                        "on-primary-fixed": "#100069",
                        "on-surface": "#e4e1ee",
                        "on-secondary": "#2d3039"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "margin-mobile": "16px",
                        "lg": "24px",
                        "gutter": "24px",
                        "base": "8px",
                        "margin-desktop": "48px",
                        "xl": "40px",
                        "md": "16px",
                        "xxl": "64px",
                        "xs": "4px",
                        "sm": "8px"
                    },
                    "fontFamily": {
                        "headline-xl": ["Inter"],
                        "headline-lg-mobile": ["Inter"],
                        "headline-lg": ["Inter"],
                        "label-sm": ["Inter"],
                        "body-lg": ["Inter"],
                        "headline-md": ["Inter"],
                        "label-md": ["Inter"],
                        "body-md": ["Inter"]
                    },
                    "fontSize": {
                        "headline-xl": ["40px", {
                            "lineHeight": "1.2",
                            "letterSpacing": "-0.02em",
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
                        "label-sm": ["12px", {
                            "lineHeight": "1",
                            "fontWeight": "600"
                        }],
                        "body-lg": ["18px", {
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
                        }],
                        "body-md": ["16px", {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
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
                overflow-x: hidden;
            }

            .glass-panel {
                background: rgba(29, 33, 44, 0.6);
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
                border: 1px solid rgba(255, 255, 255, 0.06);
                border-radius: 18px;
                box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.15);
                transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .glass-panel:hover {
                transform: translateY(-2px);
                box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.2);
                border-color: rgba(196, 192, 255, 0.15);
            }

            .avatar-glow {
                position: relative;
            }

            .avatar-glow::after {
                content: '';
                position: absolute;
                inset: -4px;
                border-radius: 50%;
                background: radial-gradient(circle, rgba(196, 192, 255, 0.4) 0%, rgba(196, 192, 255, 0) 70%);
                z-index: -1;
                opacity: 0;
                transition: opacity 0.3s ease;
            }

            .avatar-glow:hover::after {
                opacity: 1;
            }

            .fade-in-up {
                opacity: 0;
                transform: translateY(20px);
                animation: fadeInUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            }

            @keyframes fadeInUp {
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .stagger-1 {
                animation-delay: 0.1s;
            }

            .stagger-2 {
                animation-delay: 0.2s;
            }

            .stagger-3 {
                animation-delay: 0.3s;
            }

            .stagger-4 {
                animation-delay: 0.4s;
            }

            .stat-card-gradient {
                background: linear-gradient(135deg, rgba(29, 33, 44, 0.8) 0%, rgba(23, 26, 34, 0.9) 100%);
            }

            .btn-primary {
                background-color: #4f44e2;
                /* inverse-primary from config */
                color: #ffffff;
                border-radius: 12px;
                transition: all 0.2s;
            }

            .btn-primary:hover {
                background-color: #3622ca;
                /* on-primary-fixed-variant from config */
                transform: translateY(-1px);
            }

            .btn-ghost {
                background-color: transparent;
                color: #c4c0ff;
                border: 1px solid rgba(196, 192, 255, 0.3);
                border-radius: 12px;
                transition: all 0.2s;
            }

            .btn-ghost:hover {
                background-color: rgba(196, 192, 255, 0.1);
                border-color: #c4c0ff;
            }
    </style>
</head>

<body
    class="bg-background text-on-background antialiased selection:bg-primary-container selection:text-on-primary-container">
    <!-- Top Navigation Bar -->
     
<?php

        $pageTitle = "Dashboard";

        require_once "includes/navbar.php";

?>
    <!-- Main Content Canvas -->
    <main class="max-w-[1440px] mx-auto px-margin-mobile md:px-margin-desktop py-xl md:py-xxl min-h-screen">
        <!-- Header -->
        <header class="mb-xl fade-in-up">
            <h1 class="font-headline-xl text-headline-xl text-on-surface mb-xs">My Profile</h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant">Manage your personal information and account.
            </p>
        </header>
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
            <!-- Left Column: Main Profile Content -->
            <div class="lg:col-span-8 flex flex-col gap-lg">
                <!-- Top Profile Section -->
                <section
                    class="glass-panel p-lg md:p-xl flex flex-col md:flex-row items-center md:items-start gap-lg fade-in-up stagger-1">
                    <div class="avatar-glow shrink-0">
                        <div
                            class="w-32 h-32 md:w-40 md:h-40 rounded-full overflow-hidden border-4 border-surface-container">
                            <img src="uploads/user.png" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="flex-1 text-center md:text-left flex flex-col justify-center h-full pt-md md:pt-0">
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-md mb-md">
                            <div>
                                <h2
                                    class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface">
                                    <?php echo htmlspecialchars($username) ?>
                                    </h2>
                                <p class="font-body-md text-body-md text-primary">@<?php echo htmlspecialchars($username), htmlspecialchars($userId) ?> </p>
                            </div>
                            <div
                                class="inline-flex items-center gap-sm bg-primary/10 text-primary px-3 py-1.5 rounded-full font-label-sm text-label-sm mx-auto md:mx-0 w-max">
                                <span class="material-symbols-outlined text-[16px]">verified</span>
                                Active Writer
                            </div>
                        </div>
                        <p
                            class="font-body-md text-body-md text-on-surface-variant mb-md flex items-center justify-center md:justify-start gap-sm">
                            <span class="material-symbols-outlined text-[18px]">mail</span>
                            <?php echo htmlspecialchars($email) ?>
                        </p>
                        <div class="flex flex-col sm:flex-row gap-md mt-auto pt-sm">
                            <button
                                class="btn-primary px-6 py-2.5 font-label-md text-label-md flex items-center justify-center gap-sm">
                                <span class="material-symbols-outlined text-[18px]">edit</span>
                                Edit Profile
                            </button>
                            <a  href="change_pass.php"
                                class="btn-ghost px-6 py-2.5 font-label-md text-label-md flex items-center justify-center gap-sm">
                                <span class="material-symbols-outlined text-[18px]">key</span>
                                Change Password
                            </a>
                        </div>
                    </div>
                </section>
                <!-- Statistics Section (Grid) -->
                <section class="grid grid-cols-2 md:grid-cols-4 gap-4 fade-in-up stagger-2">
                    <div class="glass-panel stat-card-gradient p-lg text-center">
                        <div
                            class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center mx-auto mb-md">
                            <span class="material-symbols-outlined text-primary">menu_book</span>
                        </div>
                        <h3 class="font-headline-md text-headline-md text-on-surface mb-xs"><?php echo htmlspecialchars($totalEntries) ?></h3>
                        <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Entries
                        </p>
                    </div>
                    <div class="glass-panel stat-card-gradient p-lg text-center">
                        <div
                            class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center mx-auto mb-md">
                            <span class="material-symbols-outlined text-primary">local_fire_department</span>
                        </div>
                        <h3 class="font-headline-md text-headline-md text-on-surface mb-xs"> <?php echo htmlspecialchars($avgwords) ?> </h3>
                        <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Average
                            Words</p>
                    </div>
                    <div class="glass-panel stat-card-gradient p-lg text-center">
                        <div
                            class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center mx-auto mb-md">
                            <span class="material-symbols-outlined text-primary">stylus_note</span>
                        </div>
                        <h3 class="font-headline-md text-headline-md text-on-surface mb-xs"><?= number_format($totalWords) ?></h3>
                        <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Words
                        </p>
                    </div>
                    <div class="glass-panel stat-card-gradient p-lg text-center">
                        <div
                            class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center mx-auto mb-md">
                            <span class="material-symbols-outlined text-primary">self_improvement</span>
                        </div>
                        <h3 class="font-headline-md text-headline-md text-on-surface mb-xs"><?= htmlspecialchars($topMood) ?></h3>
                        <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Top Mood
                        </p>
                    </div>
                </section>
                <!-- Personal Information & Writing Summary (Bento Grid Style) -->
      
                <!-- Recent Activity Timeline -->
                <section class="glass-panel p-lg fade-in-up stagger-4">
                    <h3 class="font-headline-md text-headline-md text-on-surface mb-lg flex items-center gap-sm">
                        <span class="material-symbols-outlined text-primary">history</span>
                        Recent Activity
                    </h3>
                    <div class="relative pl-6 border-l border-surface-variant ml-2 space-y-6">
                        <div class="relative">
                            <div
                                class="absolute -left-[31px] bg-background w-4 h-4 rounded-full border-2 border-primary mt-1">
                            </div>
                            <p class="font-label-md text-label-md text-on-surface-variant mb-xs">Today, 8:45 AM</p>
                            <p
                                class="font-body-md text-body-md text-on-surface bg-surface-container p-sm rounded-md border border-white/5 inline-block">
                                Created <strong>Morning Reflection</strong></p>
                        </div>
                        <div class="relative">
                            <div
                                class="absolute -left-[31px] bg-background w-4 h-4 rounded-full border-2 border-outline-variant mt-1">
                            </div>
                            <p class="font-label-md text-label-md text-on-surface-variant mb-xs">Yesterday, 9:20 PM</p>
                            <p
                                class="font-body-md text-body-md text-on-surface bg-surface-container p-sm rounded-md border border-white/5 inline-block">
                                Edited <strong>Weekend Thoughts</strong></p>
                        </div>
                        <div class="relative">
                            <div
                                class="absolute -left-[31px] bg-background w-4 h-4 rounded-full border-2 border-outline-variant mt-1">
                            </div>
                            <p class="font-label-md text-label-md text-on-surface-variant mb-xs">Oct 22, 2023</p>
                            <p
                                class="font-body-md text-body-md text-on-surface bg-surface-container p-sm rounded-md border border-white/5 inline-block">
                                Earned badge: <strong>Consistent Writer</strong></p>
                        </div>
                    </div>
                </section>
            </div> <!-- End Left Column -->
            <!-- Right Column: Sidebar -->
            <aside class="lg:col-span-4 flex flex-col gap-lg fade-in-up stagger-2">
                <!-- Quick Actions -->
                <div class="glass-panel p-lg">
                    <h3 class="font-headline-md text-headline-md text-on-surface mb-md">Quick Actions</h3>
                    <div class="flex flex-col gap-sm">
                        <button
                            class="w-full text-left p-sm flex items-center gap-md hover:bg-white/5 rounded-md transition-colors text-on-surface font-body-md text-body-md">
                            <span class="material-symbols-outlined text-primary">add_circle</span> New Entry
                        </button>
                        <button
                            class="w-full text-left p-sm flex items-center gap-md hover:bg-white/5 rounded-md transition-colors text-on-surface font-body-md text-body-md">
                            <span class="material-symbols-outlined text-primary">list_alt</span> View Entries
                        </button>
                        <button
                            class="w-full text-left p-sm flex items-center gap-md hover:bg-white/5 rounded-md transition-colors text-on-surface font-body-md text-body-md">
                            <span class="material-symbols-outlined text-primary">calendar_month</span> Calendar View
                        </button>
                        <div class="h-px bg-white/5 my-2"></div>
                        <button
                            class="w-full text-left p-sm flex items-center gap-md hover:bg-white/5 rounded-md transition-colors text-on-surface font-body-md text-body-md">
                            <span class="material-symbols-outlined text-outline">download</span> Export Diary
                        </button>
                        <button
                            class="w-full text-left p-sm flex items-center gap-md hover:bg-white/5 rounded-md transition-colors text-on-surface font-body-md text-body-md">
                            <span class="material-symbols-outlined text-outline">archive</span> Archive Entries
                        </button>
                    </div>
                </div>
                <!-- Progress & Stats (Sticky) -->
                <div class="glass-panel p-lg sticky top-[100px]">
                    <div class="mb-lg pb-md border-b border-white/5">
                        <div class="flex justify-between items-end mb-sm">
                            <span class="font-label-md text-label-md text-on-surface">Level 3 Writer</span>
                            <span class="font-label-sm text-label-sm text-primary">78%</span>
                        </div>
                        <div class="w-full bg-surface-container-highest rounded-full h-2">
                            <div class="bg-primary h-2 rounded-full" style="width: 78%"></div>
                        </div>
                        <p class="font-label-sm text-label-sm text-on-surface-variant mt-sm text-right">To Level 4</p>
                    </div>
                    <h4 class="font-label-md text-label-md text-on-surface-variant mb-md uppercase tracking-wider">
                        Achievements</h4>
                    <div class="flex flex-wrap gap-2 mb-lg">
                        <div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center border border-primary/30 text-primary cursor-help"
                            title="First Entry">
                            <span class="material-symbols-outlined text-[20px]">emoji_events</span>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center border border-primary/30 text-primary cursor-help"
                            title="7 Day Streak">
                            <span class="material-symbols-outlined text-[20px]">local_fire_department</span>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center border border-primary/30 text-primary cursor-help"
                            title="100 Entries">
                            <span class="material-symbols-outlined text-[20px]">workspace_premium</span>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center border border-primary/30 text-primary cursor-help"
                            title="Night Writer">
                            <span class="material-symbols-outlined text-[20px]">dark_mode</span>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center border border-white/10 text-outline-variant cursor-help opacity-50"
                            title="Consistent Writer (Locked)">
                            <span class="material-symbols-outlined text-[20px]">lock</span>
                        </div>
                    </div>
                    <div
                        class="bg-surface-container-low p-md rounded-lg border border-white/5 relative overflow-hidden">
                        <span
                            class="material-symbols-outlined absolute top-2 right-2 text-surface-container-highest text-[64px] z-0">format_quote</span>
                        <p class="font-body-md text-body-md text-on-surface-variant italic relative z-10">"Writing is
                            nature's way of letting you know how sloppy your thinking is."</p>
                        <p class="font-label-sm text-label-sm text-primary mt-sm relative z-10">— Richard Guindon</p>
                    </div>
                </div>
            </aside> <!-- End Right Column -->
        </div> <!-- End Grid -->
    </main>
    <!-- Footer -->
  <?php
        require_once "includes/footer.php";
?>
</body>

</html>