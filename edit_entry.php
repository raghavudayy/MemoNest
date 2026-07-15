<?php
require_once "includes/config.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$error = "";

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid Entry ID");
}

$id = (int)$_GET['id'];



$sql = "SELECT *
        FROM diary_entries
        WHERE id = ?
        AND user_id = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ii", $id, $user_id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) != 1) {
    die("Entry not found.");
}

$entry = mysqli_fetch_assoc($result);

mysqli_stmt_close($stmt);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $mood = trim($_POST['mood']);
    $entry_date = $_POST['entry_date'];
    $status = $_POST['status'];

    if (empty($title) || empty($content) || empty($entry_date)) {

        $error = "Please fill all required fields.";

    } else {

        $sql = "UPDATE diary_entries
                SET
                    title = ?,
                    content = ?,
                    mood = ?,
                    entry_date = ?,
                    status = ?,
                    updated_at = NOW()
                WHERE
                    id = ?
                AND
                    user_id = ?";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param(
            $stmt,
            "sssssii",
            $title,
            $content,
            $mood,
            $entry_date,
            $status,
            $id,
            $user_id
        );

        if (mysqli_stmt_execute($stmt)) {

            header("Location: view_entries.php?success=updated");
            exit();

        } else {

            $error = "Something went wrong.";

        }

        mysqli_stmt_close($stmt);

        // Refresh data after update
        $stmt = mysqli_prepare($conn, "SELECT * FROM diary_entries WHERE id=? AND user_id=?");
        mysqli_stmt_bind_param($stmt, "ii", $id, $user_id);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $entry = mysqli_fetch_assoc($result);

        mysqli_stmt_close($stmt);
    }
}
?>




<!DOCTYPE html>

<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Lumora - New Diary Entry</title>
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
                    "surface-variant": "#35343e",
                    "on-tertiary-container": "#262935",
                    "surface-container": "#1f1f28",
                    "outline-variant": "#464555",
                    "on-secondary-container": "#b3b5bf",
                    "primary": "#c4c0ff",
                    "secondary-fixed": "#e0e2ed",
                    "on-tertiary-fixed": "#171b26",
                    "tertiary-fixed-dim": "#c3c6d5",
                    "surface-container-highest": "#35343e",
                    "outline": "#918fa1",
                    "surface-bright": "#393842",
                    "on-primary-fixed": "#100069",
                    "surface-container-low": "#1b1b24",
                    "on-tertiary-fixed-variant": "#434653",
                    "on-tertiary": "#2c303c",
                    "error": "#ffb4ab",
                    "secondary-fixed-dim": "#c4c6d1",
                    "primary-fixed": "#e3dfff",
                    "on-surface": "#e4e1ee",
                    "on-error-container": "#ffdad6",
                    "tertiary": "#c3c6d5",
                    "tertiary-fixed": "#dfe2f1",
                    "on-secondary": "#2d3039",
                    "on-secondary-fixed": "#181b23",
                    "secondary": "#c4c6d1",
                    "on-secondary-fixed-variant": "#444650",
                    "tertiary-container": "#8d909e",
                    "secondary-container": "#444650",
                    "surface-container-lowest": "#0e0d16",
                    "primary-container": "#8781ff",
                    "surface-container-high": "#2a2933",
                    "on-primary-container": "#1b0091",
                    "on-primary": "#2000a4",
                    "inverse-primary": "#4f44e2",
                    "surface-tint": "#c4c0ff",
                    "surface-dim": "#13121b",
                    "on-error": "#690005",
                    "on-surface-variant": "#c7c4d8",
                    "on-primary-fixed-variant": "#3622ca",
                    "inverse-on-surface": "#302f39",
                    "surface": "#13121b",
                    "on-background": "#e4e1ee",
                    "primary-fixed-dim": "#c4c0ff",
                    "error-container": "#93000a",
                    "inverse-surface": "#e4e1ee",
                    "background": "#13121b"
                },
                "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
                },
                "spacing": {
                    "lg": "24px",
                    "xxl": "64px",
                    "sm": "8px",
                    "margin-mobile": "16px",
                    "md": "16px",
                    "margin-desktop": "48px",
                    "xs": "4px",
                    "gutter": "24px",
                    "xl": "40px",
                    "base": "8px"
                },
                "fontFamily": {
                    "headline-lg-mobile": ["Inter"],
                    "headline-lg": ["Inter"],
                    "body-md": ["Inter"],
                    "body-lg": ["Inter"],
                    "label-sm": ["Inter"],
                    "label-md": ["Inter"],
                    "headline-md": ["Inter"],
                    "headline-xl": ["Inter"]
                },
                "fontSize": {
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
                    "label-sm": ["12px", {
                        "lineHeight": "1",
                        "fontWeight": "600"
                    }],
                    "label-md": ["14px", {
                        "lineHeight": "1",
                        "letterSpacing": "0.01em",
                        "fontWeight": "500"
                    }],
                    "headline-md": ["24px", {
                        "lineHeight": "1.4",
                        "fontWeight": "500"
                    }],
                    "headline-xl": ["40px", {
                        "lineHeight": "1.2",
                        "letterSpacing": "-0.02em",
                        "fontWeight": "600"
                    }]
                }
            },
        },
    }
    </script>
    <style>
    body {
        background-color: #0F1117;
        color: #e4e1ee;
    }

    .glass-card {
        background-color: rgba(29, 33, 44, 0.9);
        border: 1px solid rgba(255, 255, 255, 0.06);
        backdrop-filter: blur(12px);
        border-radius: 18px;
    }

    .input-glow:focus {
        box-shadow: 0 0 0 2px rgba(196, 192, 255, 0.5);
        border-color: #c4c0ff;
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

    .sidebar-card {
        background-color: #171A22;
        border-radius: 18px;
    }
    </style>
</head>



<body class="antialiased min-h-screen flex flex-col ">

    <?php

        $pageTitle = "Dashboard";

        require_once "includes/navbar.php";

?>


    <main
        class="flex-grow w-full max-w-[1200px] mx-auto px-margin-mobile md:px-margin-desktop py-xl md:py-xxl flex flex-col md:flex-row gap-gutter">
        <!-- Main Content Canvas -->
        <div class="flex-grow flex flex-col max-w-[800px] w-full mx-auto fade-in">
            <div class="mb-xl text-center md:text-left">
                <h1 class="font-headline-xl text-headline-xl text-on-surface mb-sm">New Diary Entry</h1>
                <p class="font-body-lg text-body-lg text-on-surface-variant">Capture your thoughts, memories and
                    emotions.</p>
            </div>

            <?php if($error): ?>
            <div class="text-red-500 mb-4">
                <?= htmlspecialchars($error) ?>
            </div>
            <?php endif; ?>

            <form action="" method="POST">
                <div class="glass-card p-lg md:p-xl flex flex-col gap-lg shadow-2xl shadow-black/20">
                    <!-- Date & Time -->
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-md">
                        <div class="relative w-full sm:w-auto">
                            <?php
                                date_default_timezone_set('Asia/Kolkata');
                               ?>
                            <input
                                class="w-full bg-[#171A22] border border-outline-variant/30 text-on-surface rounded-lg px-md py-sm font-body-md focus:outline-none input-glow transition-all"
                                type="datetime-local" name="entry_date" value="<?= date('Y-m-d\TH:i') ?>" required />
                        </div>

                    </div>
                    <!-- Title -->
                    <div>
                        <input
                            class="w-full bg-transparent border-b border-outline-variant/30 text-headline-lg text-on-surface placeholder:text-on-surface-variant/50 focus:border-primary focus:outline-none py-sm transition-colors font-headline-lg"
                            placeholder="Today's title..." style="background-color: transparent !important;" type="text"
                            name="title" value="<?= htmlspecialchars($entry['title']) ?>" />
                    </div>
                    <!-- Mood Selector -->
                    <div class="flex flex-col gap-sm">
                        <label class="font-label-md text-label-md text-on-surface-variant">How are you feeling?</label>
                        <select name="mood" class="bg-transparent">
                            <option class="bg-black text-white" value="Happy">Happy</option>
                            <option class="bg-black text-white" value="Calm">Calm</option>
                            <option class="bg-black text-white" value="Excited">Excited</option>
                            <option class="bg-black text-white" value="Sad">Sad</option>
                            <option class="bg-black text-white" value="Angry">Angry</option>
                        </select>
                    </div>
                    <!-- Content Area -->
                    <div class="flex flex-col gap-xs relative mt-md flex-grow">
                        <textarea
                            class="w-full h-[300px] bg-[#171A22] border border-outline-variant/30 rounded-lg p-md text-on-surface font-body-lg text-body-lg focus:outline-none input-glow transition-all resize-y placeholder:text-on-surface-variant/40"
                            placeholder="What's on your mind today?..."
                            name="content"><?= htmlspecialchars($entry['content']) ?></textarea>
                        <div
                            class="flex justify-between items-center text-on-surface-variant/60 font-label-sm text-label-sm px-sm pt-xs absolute bottom-sm w-full pointer-events-none">
                            <span>Words: 0</span>
                            <span>0 / 5000</span>
                        </div>
                    </div>
                    <!-- Actions -->
                    <div
                        class="flex flex-col sm:flex-row justify-between items-center pt-md border-t border-outline-variant/20 mt-sm gap-md">
                        <button
                            class="w-full sm:w-auto px-lg py-sm rounded-xl border border-outline-variant text-on-surface hover:bg-surface-variant transition-colors font-label-md text-label-md">
                            Cancel
                        </button>
                        <div class="flex flex-col sm:flex-row gap-md w-full sm:w-auto">
                            <button
                                class="w-full sm:w-auto px-lg py-sm rounded-xl border border-primary text-primary hover:bg-primary/10 transition-colors font-label-md text-label-md"
                                type="submit" name="status" value="Draft">
                                Save as Draft
                            </button>
                            <button
                                class="w-full sm:w-auto px-lg py-sm rounded-xl bg-primary text-surface-container-lowest font-bold hover:bg-primary-fixed transition-colors flex justify-center items-center gap-xs font-label-md text-label-md"
                                type="submit" name="status" value="Published">
                                <span class="material-symbols-outlined text-[20px]"
                                    style="font-variation-settings: 'FILL' 1;">edit_document</span>
                                Save Entry
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Sidebar / Contextual Column (Desktop) -->
        <aside class="w-full md:w-[320px] flex-shrink-0 flex flex-col gap-md fade-in" style="animation-delay: 0.2s;">
            <!-- Quote Card -->
            <div
                class="sidebar-card p-lg border border-outline-variant/10 shadow-lg shadow-black/10 relative overflow-hidden">
                <span
                    class="material-symbols-outlined text-primary/10 text-[80px] absolute -top-4 -left-4 pointer-events-none">format_quote</span>
                <p class="font-body-lg text-body-lg text-on-surface relative z-10 italic">"Writing is the painting of
                    the voice."</p>
                <p class="font-label-sm text-label-sm text-on-surface-variant mt-sm relative z-10">— Voltaire</p>
            </div>
            <!-- Tips Card -->
            <div
                class="sidebar-card p-lg border border-outline-variant/10 shadow-lg shadow-black/10 sticky top-[100px]">
                <h3 class="font-headline-md text-[18px] text-on-surface mb-md flex items-center gap-xs">
                    <span class="material-symbols-outlined text-primary text-[20px]">lightbulb</span>
                    Writing Tips
                </h3>
                <ul class="flex flex-col gap-sm">
                    <li class="flex items-start gap-sm">
                        <span
                            class="material-symbols-outlined text-on-surface-variant text-[18px] mt-1">check_circle</span>
                        <span class="font-body-md text-body-md text-on-surface-variant">Be completely honest with
                            yourself.</span>
                    </li>
                    <li class="flex items-start gap-sm">
                        <span
                            class="material-symbols-outlined text-on-surface-variant text-[18px] mt-1">check_circle</span>
                        <span class="font-body-md text-body-md text-on-surface-variant">Write freely without worrying
                            about grammar.</span>
                    </li>
                    <li class="flex items-start gap-sm">
                        <span class="material-symbols-outlined text-on-surface-variant text-[18px] mt-1">lock</span>
                        <span class="font-body-md text-body-md text-on-surface-variant">This space is encrypted. No one
                            else can read your diary.</span>
                    </li>
                </ul>
            </div>
        </aside>
    </main>
</body>

</html>