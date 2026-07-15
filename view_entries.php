<?php
require_once "includes/auth.php";
require_once "includes/config.php";

$userId = $_SESSION["user_id"];
$username = $_SESSION["username"];

// Fetch diary entries
$sql = "SELECT * FROM diary_entries
        WHERE user_id = ?
        ORDER BY created_at DESC";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $userId);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

// Statistics

// Total Entries
$totalQuery = mysqli_prepare(
    $conn,
    "SELECT COUNT(*) AS total
     FROM diary_entries
     WHERE user_id = ?"
);

mysqli_stmt_bind_param($totalQuery, "i", $userId);
mysqli_stmt_execute($totalQuery);

$totalResult = mysqli_stmt_get_result($totalQuery);
$totalEntries = mysqli_fetch_assoc($totalResult)['total'];


// Entries This Month

$thisMonthQuery = mysqli_prepare(
    $conn,
    "SELECT COUNT(*) AS total
     FROM diary_entries
     WHERE user_id = ?
     AND MONTH(created_at)=MONTH(CURRENT_DATE())
     AND YEAR(created_at)=YEAR(CURRENT_DATE())"
);

mysqli_stmt_bind_param($thisMonthQuery, "i", $userId);
mysqli_stmt_execute($thisMonthQuery);

$thisMonthResult = mysqli_stmt_get_result($thisMonthQuery);
$thisMonthEntries = mysqli_fetch_assoc($thisMonthResult)['total'];


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


$currentMonth = date("F");
$currentYear = date("Y");

$daysInMonth = date("t");

$firstDay = date("w", strtotime(date("Y-m-01")));


?>
<!DOCTYPE html>

<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Lumora - View Diary Entries</title>
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
                    "outline": "#918fa1",
                    "on-tertiary-container": "#262935",
                    "on-secondary": "#2d3039",
                    "surface-container-low": "#1b1b24",
                    "on-tertiary-fixed-variant": "#434653",
                    "on-tertiary": "#2c303c",
                    "on-error": "#690005",
                    "error": "#ffb4ab",
                    "tertiary-fixed-dim": "#c3c6d5",
                    "primary": "#c4c0ff",
                    "on-surface": "#e4e1ee",
                    "background": "#0F1117",
                    /* Replaced default with requested dark background */
                    "on-secondary-container": "#b3b5bf",
                    "inverse-surface": "#e4e1ee",
                    "surface-tint": "#c4c0ff",
                    "secondary-fixed-dim": "#c4c6d1",
                    "surface-container-lowest": "#0e0d16",
                    "surface-container": "#171A22",
                    /* Adjusted for sidebar/panels */
                    "primary-container": "#8781ff",
                    "on-primary": "#2000a4",
                    "on-background": "#e4e1ee",
                    "surface-bright": "#393842",
                    "on-surface-variant": "#c7c4d8",
                    "primary-fixed": "#e3dfff",
                    "surface-container-high": "#1D212C",
                    /* Adjusted for cards */
                    "inverse-primary": "#4f44e2",
                    "primary-fixed-dim": "#c4c0ff",
                    "on-secondary-fixed": "#181b23",
                    "tertiary-fixed": "#dfe2f1",
                    "on-error-container": "#ffdad6",
                    "on-primary-fixed-variant": "#3622ca",
                    "tertiary-container": "#8d909e",
                    "secondary-container": "#444650",
                    "error-container": "#93000a",
                    "surface-container-highest": "#35343e",
                    "secondary": "#c4c6d1",
                    "tertiary": "#c3c6d5",
                    "surface": "#13121b",
                    "inverse-on-surface": "#302f39",
                    "surface-dim": "#13121b",
                    "on-secondary-fixed-variant": "#444650",
                    "surface-variant": "#35343e",
                    "outline-variant": "#464555",
                    "on-tertiary-fixed": "#171b26",
                    "on-primary-container": "#1b0091",
                    "on-primary-fixed": "#100069",
                    "secondary-fixed": "#e0e2ed"
                },
                "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "2xl": "1.125rem",
                    /* ~18px for cards */
                    "full": "9999px"
                },
                "spacing": {
                    "base": "8px",
                    "margin-desktop": "48px",
                    "xl": "40px",
                    "xs": "4px",
                    "xxl": "64px",
                    "gutter": "24px",
                    "sm": "8px",
                    "lg": "24px",
                    "margin-mobile": "16px",
                    "md": "16px"
                },
                "fontFamily": {
                    "headline-md": ["Inter"],
                    "headline-lg": ["Inter"],
                    "body-lg": ["Inter"],
                    "label-sm": ["Inter"],
                    "headline-xl": ["Inter"],
                    "body-md": ["Inter"],
                    "label-md": ["Inter"],
                    "headline-lg-mobile": ["Inter"]
                },
                "fontSize": {
                    "headline-md": ["24px", {
                        "lineHeight": "1.4",
                        "fontWeight": "500"
                    }],
                    "headline-lg": ["32px", {
                        "lineHeight": "1.25",
                        "letterSpacing": "-0.02em",
                        "fontWeight": "600"
                    }],
                    "body-lg": ["18px", {
                        "lineHeight": "1.6",
                        "fontWeight": "400"
                    }],
                    "label-sm": ["12px", {
                        "lineHeight": "1",
                        "fontWeight": "600"
                    }],
                    "headline-xl": ["40px", {
                        "lineHeight": "1.2",
                        "letterSpacing": "-0.02em",
                        "fontWeight": "600"
                    }],
                    "body-md": ["16px", {
                        "lineHeight": "1.6",
                        "fontWeight": "400"
                    }],
                    "label-md": ["14px", {
                        "lineHeight": "1",
                        "letterSpacing": "0.01em",
                        "fontWeight": "500"
                    }],
                    "headline-lg-mobile": ["24px", {
                        "lineHeight": "1.3",
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

    .glass-panel {
        background: rgba(23, 26, 34, 0.7);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.05);
    }

    .entry-card {
        background-color: #1D212C;
        border: 1px solid rgba(255, 255, 255, 0.06);
        transition: all 0.3s ease;
    }

    .entry-card:hover {
        transform: translateY(-4px);
        border-color: #c4c0ff;
        box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.5), 0 0 15px rgba(196, 192, 255, 0.1);
    }

    .fade-in {
        animation: fadeIn 0.6s ease-out forwards;
        opacity: 0;
        transform: translateY(10px);
    }

    @keyframes fadeIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .delay-1 {
        animation-delay: 0.1s;
    }

    .delay-2 {
        animation-delay: 0.2s;
    }

    .delay-3 {
        animation-delay: 0.3s;
    }

    .delay-4 {
        animation-delay: 0.4s;
    }

    /* Custom scrollbar for webkit */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #0F1117;
    }

    ::-webkit-scrollbar-thumb {
        background: #2a2933;
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #464555;
    }
    </style>
</head>

<body class="antialiased min-h-screen flex flex-col">
    <!-- TopNavBar -->
    
<?php

        $pageTitle = "Dashboard";

        require_once "includes/navbar.php";

?>
    <!-- Main Content Area -->
    <main
        class="flex-grow pt-[50px] px-margin-mobile md:px-margin-desktop pb-xxl max-w-[1200px] mx-auto w-full grid grid-cols-1 lg:grid-cols-12 gap-gutter">
        <!-- Left Column: Content -->
        <div class="lg:col-span-8 flex flex-col gap-xl">
            <!-- Header Section -->
            <section class="fade-in">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-md mb-lg">
                    <div>
                        <h1 class="font-headline-xl text-headline-xl text-on-surface mb-2">My Diary Entries</h1>
                        <p class="font-body-md text-body-md text-on-surface-variant">Browse and revisit your personal
                            memories.</p>
                    </div>
                    <a  href="add_entry.php"
                        class="bg-primary text-on-primary font-label-md text-label-md px-6 py-3 rounded-xl flex items-center justify-center gap-2 hover:bg-primary-fixed transition-colors active:scale-95">
                        
                        <span class="material-symbols-outlined">add</span>
                        New Entry
                    </a>
                </div>
              
            </section>
            <!-- Statistics Bar -->
            <section class="grid grid-cols-2 md:grid-cols-4 gap-md fade-in delay-1">
                <div class="glass-panel p-4 rounded-2xl flex flex-col items-center justify-center text-center">
                    <span class="material-symbols-outlined text-primary mb-1">book</span>
                    <span class="font-headline-md text-headline-md text-on-surface"><?= $totalEntries ?></span>
                    <span
                        class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider mt-1">Total
                        Entries</span>
                </div>
                <div class="glass-panel p-4 rounded-2xl flex flex-col items-center justify-center text-center">
                    <span class="material-symbols-outlined text-primary mb-1">calendar_month</span>
                    <span class="font-headline-md text-headline-md text-on-surface"><?= $thisMonthEntries ?></span>
                    <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider mt-1">This
                        Month</span>
                </div>
                <div class="glass-panel p-4 rounded-2xl flex flex-col items-center justify-center text-center">
                    <span class="material-symbols-outlined text-primary mb-1">local_fire_department</span>
                    <span class="font-headline-md text-headline-md text-on-surface">0</span>
                    <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider mt-1">Day
                        Streak</span>
                </div>
                <div class="glass-panel p-4 rounded-2xl flex flex-col items-center justify-center text-center">
                    <span class="material-symbols-outlined text-primary mb-1">self_improvement</span>
                    <span
                        class="font-headline-md text-headline-md text-on-surface"><?= htmlspecialchars($topMood) ?></span>
                    <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider mt-1">Top
                        Mood</span>
                </div>
            </section>
            <!-- Entries Grid -->
            <section class="grid grid-cols-1 md:grid-cols-2 gap-lg">
                <!-- Entry Card 1 -->
                <?php while($entry = mysqli_fetch_assoc($result)): ?>

                <?php
$title = htmlspecialchars($entry['title']);
$content = htmlspecialchars($entry['content']);
$mood = htmlspecialchars($entry['mood']);

$date = date("M d, Y", strtotime($entry['created_at']));
$preview = substr(strip_tags($content), 0, 180);
$wordCount = str_word_count($entry['content']);
?>

                <article class="entry-card rounded-2xl p-6 flex flex-col h-full fade-in">

                    <div class="flex justify-between items-start mb-4">

                        <div
                            class="flex items-center gap-2 bg-surface-container-highest px-3 py-1 rounded-full border border-white/5">
                            <span class="material-symbols-outlined text-primary text-[16px]">
                                mood
                            </span>

                            <span class="font-label-sm text-label-sm text-on-surface">
                                <?= $mood ?>
                            </span>
                        </div>

                        <span class="font-label-md text-label-md text-on-surface-variant">
                            <?= $date ?>
                        </span>

                    </div>

                    <h2 class="font-headline-md text-headline-md text-on-surface mb-3 line-clamp-1">
                        <?= $title ?>
                    </h2>

                    <p class="font-body-md text-body-md text-on-surface-variant line-clamp-3 mb-6 flex-grow">
                        <?= $preview ?>...
                    </p>

                    <div class="flex items-center justify-between mt-auto pt-4 border-t border-white/5">

                        <div class="flex gap-4 text-on-surface-variant font-label-sm text-label-sm">

                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]">notes</span>
                                <?= $wordCount ?> Words
                            </span>

                        </div>

                        <div class="flex gap-2">

                            <a href="edit_entry.php?id=<?= $entry['id'] ?>"
                                class="text-on-surface-variant hover:text-primary transition-colors p-1">

                                <span class="material-symbols-outlined text-[20px]">
                                    edit
                                </span>

                            </a>

                            <a href="delete_entry.php?id=<?= $entry['id'] ?>"
                                onclick="return confirm('Delete this entry?')"
                                class="text-on-surface-variant hover:text-error transition-colors p-1">

                                <span class="material-symbols-outlined text-[20px]">
                                    delete
                                </span>

                            </a>

                        </div>

                    </div>

                </article>

                <?php endwhile; ?>

            </section>
            <!-- Pagination -->
            <div class="flex justify-center items-center gap-2 mt-8 fade-in delay-4">
                <button
                    class="px-4 py-2 rounded-lg border border-outline-variant text-on-surface-variant hover:text-on-surface hover:border-on-surface transition-colors font-label-md text-label-md disabled:opacity-50">Previous</button>
                <button
                    class="w-10 h-10 rounded-lg bg-primary text-on-primary font-label-md text-label-md flex items-center justify-center">1</button>
                <button
                    class="w-10 h-10 rounded-lg border border-outline-variant text-on-surface-variant hover:text-on-surface hover:border-on-surface transition-colors font-label-md text-label-md flex items-center justify-center">2</button>
                <button
                    class="w-10 h-10 rounded-lg border border-outline-variant text-on-surface-variant hover:text-on-surface hover:border-on-surface transition-colors font-label-md text-label-md flex items-center justify-center">3</button>
                <button
                    class="px-4 py-2 rounded-lg border border-outline-variant text-on-surface-variant hover:text-on-surface hover:border-on-surface transition-colors font-label-md text-label-md">Next</button>
            </div>
        </div>
        <!-- Right Column: Sidebar (Desktop) -->
        <aside class="hidden lg:block lg:col-span-4 fade-in delay-2">
            <div class="sticky top-[100px] flex flex-col gap-lg">
                <!-- Calendar Widget Mini -->
                <div class="glass-panel p-6 rounded-2xl">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="font-label-md text-label-md text-on-surface uppercase tracking-wider"><?= $currentMonth ?> <?= $currentYear ?>
                        </h3>
                        <div class="flex gap-1">
                            <button class="text-on-surface-variant hover:text-primary"><span
                                    class="material-symbols-outlined text-[18px]">chevron_left</span></button>
                            <button class="text-on-surface-variant hover:text-primary"><span
                                    class="material-symbols-outlined text-[18px]">chevron_right</span></button>
                        </div>
                    </div>
                    <div class="grid grid-cols-7 gap-1 text-center mb-2">
                        <span class="font-label-sm text-label-sm text-outline">S</span>
                        <span class="font-label-sm text-label-sm text-outline">M</span>
                        <span class="font-label-sm text-label-sm text-outline">T</span>
                        <span class="font-label-sm text-label-sm text-outline">W</span>
                        <span class="font-label-sm text-label-sm text-outline">T</span>
                        <span class="font-label-sm text-label-sm text-outline">F</span>
                        <span class="font-label-sm text-label-sm text-outline">S</span>
                    </div>
                    <div class="grid grid-cols-7 gap-1 text-center font-body-md text-body-md text-on-surface">

<?php

for($i=0;$i<$firstDay;$i++){

    echo "<div></div>";

}

for($day=1;$day<=$daysInMonth;$day++){

    if($day == date("j")){

        echo "<div class='p-1 bg-primary text-on-primary rounded-full'>$day</div>";

    }else{

        echo "<div class='p-1'>$day</div>";

    }

}

?>

</div>
                </div>
                <!-- Recent Moods -->
                <div class="glass-panel p-6 rounded-2xl">

                    <h3 class="font-label-md text-label-md text-on-surface uppercase tracking-wider mb-4">
                        Recent Moods
                    </h3>

                    <div class="flex flex-wrap gap-2">

                        <?php if(mysqli_num_rows($moodResult) > 0): ?>

                        <?php while($mood = mysqli_fetch_assoc($moodResult)): ?>

                        <?php

                switch(strtolower($mood['mood'])){

                    case "happy":
                        $icon = "sentiment_satisfied";
                        break;

                    case "sad":
                        $icon = "sentiment_dissatisfied";
                        break;

                    case "calm":
                        $icon = "self_improvement";
                        break;

                    case "angry":
                        $icon = "mood_bad";
                        break;

                    case "excited":
                        $icon = "celebration";
                        break;

                    default:
                        $icon = "psychology";
                }

                ?>

                        <span
                            class="px-3 py-1 rounded-full border border-white/10 bg-surface-container-high text-on-surface font-label-sm text-label-sm flex items-center gap-1">

                            <span class="material-symbols-outlined text-[16px] text-primary">

                                <?= $icon ?>

                            </span>

                            <?= htmlspecialchars($mood['mood']) ?>

                            (<?= $mood['total'] ?>)

                        </span>

                        <?php endwhile; ?>

                        <?php else: ?>

                        <span class="text-on-surface-variant">
                            No moods yet.
                        </span>

                        <?php endif; ?>

                    </div>

                </div>
            </div>
        </aside>
    </main>
    <!-- Footer -->
   
<?php

        require_once "includes/footer.php";
?>
</body>

</html>