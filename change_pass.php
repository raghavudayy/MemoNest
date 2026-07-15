<?php
require_once "includes/auth.php";
require_once "includes/config.php";

$user_id = $_SESSION['user_id'];
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $currentPass = trim($_POST['currentPass']);
    $newPass = trim($_POST['newPass']);
    $confirmNewPass = trim($_POST['confirmNewPass']);

    // Get current password hash
    $stmt = mysqli_prepare($conn, "SELECT password FROM users WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);

        // Verify current password
        if (password_verify($currentPass, $user["password"])) {

            // Check new password confirmation
            if ($newPass === $confirmNewPass) {

                // Prevent same password
                if (password_verify($newPass, $user["password"])) {

                    $error = "New password cannot be the same as the current password.";

                } else {

                    $hashedNewPass = password_hash($newPass, PASSWORD_DEFAULT);

                    $updateStmt = mysqli_prepare(
                        $conn,
                        "UPDATE users SET password = ? WHERE id = ?"
                    );

                    mysqli_stmt_bind_param(
                        $updateStmt,
                        "si",
                        $hashedNewPass,
                        $user_id
                    );

                    if (mysqli_stmt_execute($updateStmt)) {

                        $success = "Password changed successfully.";

                    } else {

                        $error = "Something went wrong. Please try again.";

                    }

                    mysqli_stmt_close($updateStmt);
                }

            } else {

                $error = "New passwords do not match.";

            }

        } else {

            $error = "Current password is incorrect.";

        }

    } else {

        $error = "User not found.";

    }

    mysqli_stmt_close($stmt);
}
?>
<!DOCTYPE html>

<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Lumora - Change Password</title>
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
                    "tertiary-fixed": "#dfe2f1",
                    "on-secondary-fixed-variant": "#444650",
                    "inverse-on-surface": "#302f39",
                    "error": "#ffb4ab",
                    "secondary-fixed": "#e0e2ed",
                    "on-secondary": "#2d3039",
                    "primary-fixed-dim": "#c4c0ff",
                    "primary": "#c4c0ff",
                    "surface-tint": "#c4c0ff",
                    "surface-container-high": "#2a2933",
                    "on-primary": "#2000a4",
                    "on-secondary-container": "#b3b5bf",
                    "surface-container-lowest": "#0e0d16",
                    "surface-container-highest": "#35343e",
                    "error-container": "#93000a",
                    "secondary-fixed-dim": "#c4c6d1",
                    "on-surface-variant": "#c7c4d8",
                    "on-primary-container": "#1b0091",
                    "on-error": "#690005",
                    "surface-dim": "#13121b",
                    "on-error-container": "#ffdad6",
                    "on-primary-fixed": "#100069",
                    "surface": "#13121b",
                    "primary-fixed": "#e3dfff",
                    "outline-variant": "#464555",
                    "on-tertiary-fixed-variant": "#434653",
                    "tertiary-fixed-dim": "#c3c6d5",
                    "on-background": "#e4e1ee",
                    "surface-bright": "#393842",
                    "on-tertiary": "#2c303c",
                    "secondary-container": "#444650",
                    "secondary": "#c4c6d1",
                    "on-surface": "#e4e1ee",
                    "background": "#13121b",
                    "outline": "#918fa1",
                    "surface-container-low": "#1b1b24",
                    "on-tertiary-fixed": "#171b26",
                    "on-primary-fixed-variant": "#3622ca",
                    "tertiary-container": "#8d909e",
                    "surface-container": "#1f1f28",
                    "inverse-surface": "#e4e1ee",
                    "tertiary": "#c3c6d5",
                    "surface-variant": "#35343e",
                    "inverse-primary": "#4f44e2",
                    "on-secondary-fixed": "#181b23",
                    "primary-container": "#8781ff",
                    "on-tertiary-container": "#262935"
                },
                "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
                },
                "spacing": {
                    "xl": "40px",
                    "gutter": "24px",
                    "margin-mobile": "16px",
                    "xs": "4px",
                    "xxl": "64px",
                    "margin-desktop": "48px",
                    "lg": "24px",
                    "md": "16px",
                    "base": "8px",
                    "sm": "8px"
                },
                "fontFamily": {
                    "body-lg": ["Inter"],
                    "headline-md": ["Inter"],
                    "headline-xl": ["Inter"],
                    "headline-lg-mobile": ["Inter"],
                    "headline-lg": ["Inter"],
                    "label-md": ["Inter"],
                    "label-sm": ["Inter"],
                    "body-md": ["Inter"]
                },
                "fontSize": {
                    "body-lg": ["18px", {
                        "lineHeight": "1.6",
                        "fontWeight": "400"
                    }],
                    "headline-md": ["24px", {
                        "lineHeight": "1.4",
                        "fontWeight": "500"
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
                    "headline-lg": ["32px", {
                        "lineHeight": "1.25",
                        "letterSpacing": "-0.02em",
                        "fontWeight": "600"
                    }],
                    "label-md": ["14px", {
                        "lineHeight": "1",
                        "letterSpacing": "0.01em",
                        "fontWeight": "500"
                    }],
                    "label-sm": ["12px", {
                        "lineHeight": "1",
                        "fontWeight": "600"
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
    }

    .glass-card {
        background-color: #1D212C;
        border: 1px solid rgba(255, 255, 255, 0.06);
        backdrop-filter: blur(12px);
    }

    .form-input {
        background-color: #171A22;
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: #e4e1ee;
    }

    .form-input:focus {
        border-color: #c4c0ff;
        box-shadow: 0 0 0 2px rgba(196, 192, 255, 0.2);
        outline: none;
    }

    .btn-primary {
        background-color: #c4c0ff;
        color: #1b0091;
        border-radius: 12px;
    }

    .btn-ghost {
        background-color: transparent;
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: #e4e1ee;
        border-radius: 12px;
    }

    .fade-in {
        animation: fadeIn 0.8s ease-out forwards;
        opacity: 0;
        transform: translateY(10px);
    }

    .fade-in-delay-1 {
        animation-delay: 0.1s;
    }

    .fade-in-delay-2 {
        animation-delay: 0.2s;
    }

    @keyframes fadeIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Progress Bar Animation */
    .progress-bar-fill {
        transition: width 0.5s ease-in-out, background-color 0.5s ease-in-out;
    }
    </style>
</head>

<body class="min-h-screen font-body-lg text-body-lg antialiased">
    <!-- TopNavBar (Simulated suppression as it's a settings page, but requested in prompt, so rendering barebones) -->

    <?php
        require_once "includes/navbar.php";
?>
    <main
        class="max-w-[1440px] mx-auto px-margin-mobile md:px-margin-desktop py-xl md:py-xxl grid grid-cols-1 md:grid-cols-12 gap-gutter">
        <!-- Main Content Area -->
        <div class="md:col-span-8 lg:col-span-9 flex flex-col gap-xl max-w-[900px] mx-auto w-full">
            <section class="fade-in">
                <h1 class="font-headline-xl text-headline-xl text-on-surface mb-2">Change Password</h1>
                <p class="font-body-md text-body-md text-on-surface-variant">Keep your account secure by updating your
                    password regularly.</p>
            </section>
            <section class="glass-card rounded-[20px] p-lg md:p-xl fade-in fade-in-delay-1">
                <p class="font-body-md text-body-md text-on-surface-variant mb-6 italic">"Choose a strong password that
                    you haven't used before."</p>
                <form class="flex flex-col gap-lg" action="" method="POST">
                    <!-- Current Password -->
                    <div class="flex flex-col gap-sm">
                        <label class="font-label-md text-label-md text-on-surface">Current Password</label>
                        <div class="relative">
                            <span
                                class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant w-5 h-5 text-[20px]">lock</span>
                            <input class="form-input w-full rounded-lg pl-10 pr-10 py-3 font-body-md text-body-md"
                                placeholder="Enter current password" type="password" name="currentPass" />
                            <button
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant hover:text-primary transition-colors"
                                type="button">
                                <span class="material-symbols-outlined text-[20px]">visibility_off</span>
                            </button>
                        </div>
                    </div>
                    <!-- New Password -->
                    <div class="flex flex-col gap-sm mt-4">
                        <label class="font-label-md text-label-md text-on-surface">New Password</label>
                        <div class="relative">
                            <span
                                class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant w-5 h-5 text-[20px]">lock_reset</span>
                            <input class="form-input w-full rounded-lg pl-10 pr-10 py-3 font-body-md text-body-md"
                                id="new-password" placeholder="Enter new password" type="password" name="newPass" />
                            <button
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant hover:text-primary transition-colors"
                                type="button">
                                <span class="material-symbols-outlined text-[20px]">visibility_off</span>
                            </button>
                        </div>
                    </div>
                    <!-- Password Strength Meter -->
                    <div class="flex flex-col gap-sm">
                        <div class="flex justify-between items-center">
                            <span class="font-label-sm text-label-sm text-on-surface-variant">Password Strength</span>
                            <span class="font-label-sm text-label-sm text-tertiary" id="strength-text">Weak</span>
                        </div>
                        <div class="w-full h-2 bg-surface-container-highest rounded-full overflow-hidden">
                            <div class="progress-bar-fill h-full bg-error w-1/4 rounded-full" id="strength-bar"></div>
                        </div>
                        <!-- Requirements -->
                        <div class="grid grid-cols-2 gap-2 mt-2">
                            <div class="flex items-center gap-2 text-on-surface-variant opacity-50">
                                <span class="material-symbols-outlined text-[16px]">close</span>
                                <span class="font-label-sm text-label-sm">8+ characters</span>
                            </div>
                            <div class="flex items-center gap-2 text-on-surface-variant opacity-50">
                                <span class="material-symbols-outlined text-[16px]">close</span>
                                <span class="font-label-sm text-label-sm">Uppercase letter</span>
                            </div>
                            <div class="flex items-center gap-2 text-on-surface-variant opacity-50">
                                <span class="material-symbols-outlined text-[16px]">close</span>
                                <span class="font-label-sm text-label-sm">Lowercase letter</span>
                            </div>
                            <div class="flex items-center gap-2 text-on-surface-variant opacity-50">
                                <span class="material-symbols-outlined text-[16px]">close</span>
                                <span class="font-label-sm text-label-sm">Number or symbol</span>
                            </div>
                        </div>
                    </div>
                    <!-- Confirm New Password -->
                    <div class="flex flex-col gap-sm mt-4">
                        <label class="font-label-md text-label-md text-on-surface">Confirm New Password</label>
                        <div class="relative">
                            <span
                                class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant w-5 h-5 text-[20px]">lock</span>
                            <input class="form-input w-full rounded-lg pl-10 pr-10 py-3 font-body-md text-body-md"
                                placeholder="Confirm new password" type="password" name="confirmNewPass"/>
                        </div>
                    </div>
                    <?php echo $error; ?>
                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row justify-end gap-md mt-6">
                        <button
                            class="btn-ghost px-6 py-3 font-label-md text-label-md hover:bg-white/5 transition-colors"
                            type="button">Cancel</button>
                        <button
                            class="btn-primary px-6 py-3 font-label-md text-label-md hover:opacity-90 transition-opacity"
                            type="submit">Update Password</button>
                    </div>
                </form>
            </section>
            <!-- Inline Security Status Cards -->
            <section class="grid grid-cols-1 sm:grid-cols-3 gap-md fade-in fade-in-delay-2">
                <div class="glass-card rounded-[20px] p-md flex flex-col gap-sm items-center text-center">
                    <span class="material-symbols-outlined text-primary text-[24px]">history</span>
                    <h3 class="font-label-md text-label-md text-on-surface-variant">Last Password Change</h3>
                    <p class="font-body-md text-body-md text-on-surface font-medium">6 Months Ago</p>
                </div>
                <div class="glass-card rounded-[20px] p-md flex flex-col gap-sm items-center text-center">
                    <span class="material-symbols-outlined text-primary text-[24px]">login</span>
                    <h3 class="font-label-md text-label-md text-on-surface-variant">Last Login</h3>
                    <p class="font-body-md text-body-md text-on-surface font-medium">Today, 09:41 AM</p>
                </div>
                <div
                    class="glass-card rounded-[20px] p-md flex flex-col gap-sm items-center text-center border-primary/30 bg-primary/5">
                    <span class="material-symbols-outlined text-primary text-[24px]">verified_user</span>
                    <h3 class="font-label-md text-label-md text-on-surface-variant">Account Security Status</h3>
                    <p class="font-body-md text-body-md text-primary font-medium">Secure</p>
                </div>
            </section>
        </div>
        <!-- Sidebar (Desktop Only) -->
        <aside
            class="hidden md:flex flex-col gap-xl md:col-span-4 lg:col-span-3 sticky top-[100px] h-fit fade-in fade-in-delay-2">
            <!-- Security Score -->
            <div class="glass-card rounded-[20px] p-lg flex flex-col items-center">
                <h3 class="font-headline-md text-headline-md text-on-surface mb-6">Security Score</h3>
                <div class="relative w-32 h-32 flex items-center justify-center mb-4">
                    <svg class="w-full h-full transform -rotate-90" viewbox="0 0 100 100">
                        <circle cx="50" cy="50" fill="none" r="45" stroke="rgba(255,255,255,0.1)" stroke-width="8">
                        </circle>
                        <circle cx="50" cy="50" fill="none" r="45" stroke="#c4c0ff" stroke-dasharray="282.7"
                            stroke-dashoffset="22.6" stroke-linecap="round" stroke-width="8"></circle>
                    </svg>
                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                        <span class="font-headline-lg text-headline-lg text-on-surface">92<span
                                class="text-[20px]">%</span></span>
                    </div>
                </div>
                <p class="font-label-md text-label-md text-on-surface-variant text-center">Your account is highly
                    secure.</p>
            </div>
            <!-- Recent Activity -->
            <div class="glass-card rounded-[20px] p-lg">
                <h3 class="font-label-md text-label-md text-on-surface-variant mb-4 uppercase tracking-wider">Recent
                    Activity</h3>
                <div class="flex flex-col gap-4 relative">
                    <div class="absolute left-[11px] top-2 bottom-2 w-px bg-white/10 z-0"></div>
                    <div class="flex gap-4 relative z-10">
                        <div
                            class="w-6 h-6 rounded-full bg-surface-container-highest border border-white/10 flex items-center justify-center shrink-0 mt-1">
                            <span class="material-symbols-outlined text-[12px] text-primary">smartphone</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="font-label-md text-label-md text-on-surface">New login (iPhone)</span>
                            <span class="font-label-sm text-label-sm text-on-surface-variant">Yesterday, San
                                Francisco</span>
                        </div>
                    </div>
                    <div class="flex gap-4 relative z-10">
                        <div
                            class="w-6 h-6 rounded-full bg-surface-container-highest border border-white/10 flex items-center justify-center shrink-0 mt-1">
                            <span class="material-symbols-outlined text-[12px] text-on-surface-variant">key</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="font-label-md text-label-md text-on-surface">2FA Enabled</span>
                            <span class="font-label-sm text-label-sm text-on-surface-variant">Jan 15, 2024</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Quote -->
            <div class="glass-card rounded-[20px] p-lg border-l-4 border-l-primary">
                <p class="font-body-md text-body-md text-on-surface-variant italic">"Security protects your memories."
                </p>
            </div>
        </aside>
    </main>
    <!-- Footer (Using Shared Component JSON styling) -->
    <?php
        require_once "includes/footer.php";
?>
    <script>
    // Very basic script for UI demonstration purposes
    document.getElementById('new-password').addEventListener('input', function(e) {
        const val = e.target.value;
        const bar = document.getElementById('strength-bar');
        const text = document.getElementById('strength-text');

        if (val.length === 0) {
            bar.style.width = '0%';
            text.textContent = '';
        } else if (val.length < 5) {
            bar.style.width = '25%';
            bar.className = 'progress-bar-fill h-full bg-error rounded-full';
            text.textContent = 'Weak';
            text.className = 'font-label-sm text-label-sm text-error';
        } else if (val.length < 8) {
            bar.style.width = '50%';
            bar.className = 'progress-bar-fill h-full bg-tertiary-container rounded-full';
            text.textContent = 'Fair';
            text.className = 'font-label-sm text-label-sm text-tertiary-container';
        } else {
            bar.style.width = '100%';
            bar.className = 'progress-bar-fill h-full bg-primary rounded-full';
            text.textContent = 'Excellent';
            text.className = 'font-label-sm text-label-sm text-primary';
        }
    });
    </script>
</body>

</html>