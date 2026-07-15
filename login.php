<?php

session_start();

require_once "includes/config.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $stmt = mysqli_prepare($conn,
    "SELECT id, username, email, password
    FROM users
    WHERE email=?");

    mysqli_stmt_bind_param($stmt,"s",$email);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result)==1){

        $user = mysqli_fetch_assoc($result);

        if(password_verify($password,$user["password"])){

            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["email"] = $user["email"];
          

            header("Location: dashboard.php");
            exit();

        }else{

            echo "Invalid Password";

        }

    }else{

        echo "Email not found";

    }

}
?>

<!DOCTYPE html>

<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Login - Diary</title>
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
                    "primary": "#c4c0ff",
                    "secondary-fixed-dim": "#c4c6d1",
                    "on-secondary": "#2d3039",
                    "background": "#13121b",
                    "on-primary-fixed-variant": "#3622ca",
                    "on-primary-fixed": "#100069",
                    "surface-container-highest": "#35343e",
                    "surface-container-lowest": "#0e0d16",
                    "surface-bright": "#393842",
                    "outline-variant": "#464555",
                    "tertiary": "#c3c6d5",
                    "surface": "#13121b",
                    "inverse-primary": "#4f44e2",
                    "surface-tint": "#c4c0ff",
                    "on-tertiary": "#2c303c",
                    "on-tertiary-fixed-variant": "#434653",
                    "on-surface": "#e4e1ee",
                    "secondary-fixed": "#e0e2ed",
                    "error": "#ffb4ab",
                    "on-background": "#e4e1ee",
                    "surface-variant": "#35343e",
                    "surface-container-low": "#1b1b24",
                    "primary-container": "#8781ff",
                    "on-secondary-fixed": "#181b23",
                    "on-secondary-container": "#b3b5bf",
                    "on-primary-container": "#1b0091",
                    "tertiary-fixed-dim": "#c3c6d5",
                    "error-container": "#93000a",
                    "surface-dim": "#13121b",
                    "primary-fixed": "#e3dfff",
                    "surface-container-high": "#2a2933",
                    "surface-container": "#1f1f28",
                    "on-primary": "#2000a4",
                    "on-error": "#690005",
                    "inverse-on-surface": "#302f39",
                    "on-tertiary-container": "#262935",
                    "on-surface-variant": "#c7c4d8",
                    "on-secondary-fixed-variant": "#444650",
                    "on-tertiary-fixed": "#171b26",
                    "on-error-container": "#ffdad6",
                    "secondary": "#c4c6d1",
                    "primary-fixed-dim": "#c4c0ff",
                    "inverse-surface": "#e4e1ee",
                    "tertiary-container": "#8d909e",
                    "secondary-container": "#444650",
                    "outline": "#918fa1",
                    "tertiary-fixed": "#dfe2f1"
                },
                "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px",
                    "card": "18px",
                    "button": "12px"
                },
                "spacing": {
                    "margin-desktop": "48px",
                    "xs": "4px",
                    "md": "16px",
                    "xl": "40px",
                    "margin-mobile": "16px",
                    "lg": "24px",
                    "sm": "8px",
                    "base": "8px",
                    "xxl": "64px",
                    "gutter": "24px"
                },
                "fontFamily": {
                    "label-sm": ["Inter"],
                    "headline-lg": ["Inter"],
                    "body-lg": ["Inter"],
                    "label-md": ["Inter"],
                    "body-md": ["Inter"],
                    "headline-md": ["Inter"],
                    "headline-lg-mobile": ["Inter"],
                    "headline-xl": ["Inter"]
                },
                "fontSize": {
                    "label-sm": ["12px", {
                        "lineHeight": "1",
                        "fontWeight": "600"
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
                    "label-md": ["14px", {
                        "lineHeight": "1",
                        "letterSpacing": "0.01em",
                        "fontWeight": "500"
                    }],
                    "body-md": ["16px", {
                        "lineHeight": "1.6",
                        "fontWeight": "400"
                    }],
                    "headline-md": ["24px", {
                        "lineHeight": "1.4",
                        "fontWeight": "500"
                    }],
                    "headline-lg-mobile": ["24px", {
                        "lineHeight": "1.3",
                        "fontWeight": "600"
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

            .glass-panel {
                background: rgba(23, 26, 34, 0.7);
                backdrop-filter: blur(12px);
                border: 1px solid rgba(255, 255, 255, 0.06);
            }

            .input-glow:focus-within {
                border-color: #c4c0ff;
                box-shadow: 0 0 0 2px rgba(196, 192, 255, 0.2);
            }

            .link-underline {
                position: relative;
            }

            .link-underline::after {
                content: '';
                position: absolute;
                width: 100%;
                transform: scaleX(0);
                height: 1px;
                bottom: 0;
                left: 0;
                background-color: currentColor;
                transform-origin: bottom right;
                transition: transform 0.25s ease-out;
            }

            .link-underline:hover::after {
                transform: scaleX(1);
                transform-origin: bottom left;
            }
    </style>
</head>

<body
    class="min-h-screen font-body-md antialiased overflow-hidden flex flex-col md:flex-row selection:bg-primary-container selection:text-on-primary-container">
    <!-- Left Panel: Brand & Atmosphere (45%) -->
    <div
        class="hidden md:flex w-[45%] relative flex-col justify-between p-margin-desktop bg-[#171A22] overflow-hidden border-r border-white/5">
        <!-- WebGL Background -->

        <!-- Brand Header -->
        <div class="relative z-10 flex items-center gap-sm">
            <img src="uploads/logo.png" class=" h-20 object-contain">
        </div>
        <!-- Atmosphere Content -->
        <div class="relative z-10 flex-1 flex flex-col justify-center mt-xl">
            <h1 class="font-headline-xl text-headline-xl text-on-surface mb-sm">Welcome Back</h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-md">Continue writing your thoughts
                securely.</p>
            <!-- Floating Glass Cards (Continuity from Signup) -->
            <div class="mt-xxl space-y-md relative">
                <div
                    class="absolute -left-lg top-10 w-24 h-24 bg-primary rounded-full blur-[80px] opacity-20 pointer-events-none">
                </div>
                <div
                    class="glass-panel rounded-card p-lg w-[85%] transform -rotate-2 hover:rotate-0 transition-transform duration-500 ease-out shadow-lg">
                    <div class="flex items-center gap-md mb-sm">
                        <span class="material-symbols-outlined text-primary"
                            style="font-variation-settings: 'FILL' 1;">wb_sunny</span>
                        <h3 class="font-label-md text-label-md text-on-surface">Morning Gratitude</h3>
                    </div>
                    <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2">"Today I woke up feeling
                        surprisingly rested. The light hitting my desk felt inspiring..."</p>
                </div>
                <div
                    class="glass-panel rounded-card p-lg w-[90%] ml-auto transform rotate-1 hover:rotate-0 transition-transform duration-500 ease-out shadow-lg opacity-80 hover:opacity-100">
                    <div class="flex items-center gap-md mb-sm">
                        <span class="material-symbols-outlined text-tertiary"
                            style="font-variation-settings: 'FILL' 1;">nightlight</span>
                        <h3 class="font-label-md text-label-md text-on-surface">Daily Reflections</h3>
                    </div>
                    <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2">"A challenging
                        conversation at work today, but I realized it was mostly my own anxiety..."</p>
                </div>
            </div>
        </div>
        <!-- Subtle Footer Quote -->
        <div class="relative z-10 mt-auto pt-xl">
            <p class="font-label-sm text-label-sm text-on-surface-variant opacity-60">"The unexamined life is not worth
                living."</p>
        </div>
    </div>
    <!-- Right Panel: Authentication (55%) -->
    <div class="w-full md:w-[55%] flex flex-col relative h-screen overflow-y-auto bg-[#0F1117]">
        <!-- Mobile Header (Visible only on small screens) -->
        <div class="md:hidden flex items-center justify-center p-margin-mobile gap-sm mt-lg">
            <img src="uploads/logo.png" class="h-12 object-contain">
        </div>
        <div
            class="flex-1 flex flex-col justify-center items-center p-margin-mobile md:p-margin-desktop w-full max-w-2xl mx-auto">
            <!-- Auth Card -->
            <div
                class="w-full bg-[#1D212C] rounded-card p-lg md:p-xl border border-white/5 shadow-2xl relative overflow-hidden">
                <div
                    class="absolute top-0 right-0 w-32 h-32 bg-primary rounded-full blur-[100px] opacity-10 pointer-events-none">
                </div>
                <div class="mb-xl text-center md:text-left">
                    <h2
                        class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface mb-xs">
                        Sign In</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant">Sign in to your account.</p>
                </div>
                <form method="POST" action="" class="space-y-lg w-full">
                    <!-- Email Field -->
                    <div
                        class="relative input-glow bg-[#171A22] rounded-button border border-outline-variant transition-colors duration-200">
                        <div class="absolute inset-y-0 left-0 pl-md flex items-center pointer-events-none">
                            <span class="material-symbols-outlined text-outline">mail</span>
                        </div>
                        <input
                            class="w-full bg-transparent border-none text-on-surface font-body-md py-md pl-12 pr-md focus:ring-0 placeholder-transparent peer rounded-button"
                            id="email" name="email" placeholder="Email Address" required="" type="email"  />
                        <label
                            class="absolute left-12 top-1/2 -translate-y-1/2 text-outline font-body-md transition-all duration-200 peer-focus:top-3 peer-focus:text-label-sm peer-focus:text-primary peer-valid:top-3 peer-valid:text-label-sm pointer-events-none"
                            for="email">Email Address</label>
                    </div>
                    <!-- Password Field -->
                    <div
                        class="relative input-glow bg-[#171A22] rounded-button border border-outline-variant transition-colors duration-200">
                        <div class="absolute inset-y-0 left-0 pl-md flex items-center pointer-events-none">
                            <span class="material-symbols-outlined text-outline">lock</span>
                        </div>
                        <input
                            class="w-full bg-transparent border-none text-on-surface font-body-md py-md pl-12 pr-12 focus:ring-0 placeholder-transparent peer rounded-button"
                            id="password" name="password" placeholder="Password" required="" type="password" />
                        <label
                            class="absolute left-12 top-1/2 -translate-y-1/2 text-outline font-body-md transition-all duration-200 peer-focus:top-3 peer-focus:text-label-sm peer-focus:text-primary peer-valid:top-3 peer-valid:text-label-sm pointer-events-none"
                            for="password">Password</label>
                        <button
                            class="absolute inset-y-0 right-0 pr-md flex items-center text-outline hover:text-on-surface transition-colors"
                            type="submit">
                            <span class="material-symbols-outlined">visibility</span>
                        </button>
                    </div>
                    <!-- Controls Row -->
                    <div class="flex items-center justify-between mt-sm">
                        <label class="flex items-center gap-sm cursor-pointer group">
                            <div class="relative flex items-center justify-center w-5 h-5">
                                <input
                                    class="peer appearance-none w-5 h-5 border border-outline-variant rounded bg-[#171A22] checked:bg-primary checked:border-primary transition-all cursor-pointer"
                                    type="checkbox" />
                                <span
                                    class="material-symbols-outlined absolute text-[16px] text-on-primary-container opacity-0 peer-checked:opacity-100 pointer-events-none transition-opacity"
                                    style="font-variation-settings: 'wght' 600;">check</span>
                            </div>
                            <span
                                class="font-body-md text-body-md text-on-surface-variant group-hover:text-on-surface transition-colors">Remember
                                Me</span>
                        </label>
                        <a class="font-label-md text-label-md text-primary hover:text-primary-fixed transition-colors"
                            href="#">Forgot Password?</a>
                    </div>
                    <!-- Submit Button -->
                    <button
                        class="w-full bg-primary hover:bg-primary-fixed text-on-primary-container font-label-md text-label-md py-lg rounded-button transition-all duration-300 transform active:scale-[0.98] mt-md shadow-[0_0_20px_rgba(196,192,255,0.15)] hover:shadow-[0_0_25px_rgba(196,192,255,0.25)] flex justify-center items-center gap-sm"
                        type="submit">
                        <span>Sign In</span>
                        <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                    </button>
                </form>
                <!-- Social Login -->
                <div class="mt-xl">
                    <div class="relative flex items-center py-md">
                        <div class="flex-grow border-t border-white/5"></div>
                        <span
                            class="flex-shrink-0 mx-md text-outline font-label-sm text-label-sm uppercase tracking-wider">Or
                            continue with</span>
                        <div class="flex-grow border-t border-white/5"></div>
                    </div>
                    <div class="grid grid-cols-3 gap-md mt-sm">
                        <button
                            class="bg-[#171A22] border border-white/5 rounded-button py-sm flex justify-center items-center opacity-50 cursor-not-allowed group relative"
                            disabled="">
                            <span class="font-label-md text-label-md text-on-surface-variant">Google</span>
                            <div
                                class="absolute -top-8 left-1/2 -translate-x-1/2 bg-surface-container-highest text-on-surface font-label-sm text-label-sm px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none">
                                Coming Soon</div>
                        </button>
                        <button
                            class="bg-[#171A22] border border-white/5 rounded-button py-sm flex justify-center items-center opacity-50 cursor-not-allowed group relative"
                            disabled="">
                            <span class="font-label-md text-label-md text-on-surface-variant">Facebook</span>
                            <div
                                class="absolute -top-8 left-1/2 -translate-x-1/2 bg-surface-container-highest text-on-surface font-label-sm text-label-sm px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none">
                                Coming Soon</div>
                        </button>
                        <button
                            class="bg-[#171A22] border border-white/5 rounded-button py-sm flex justify-center items-center opacity-50 cursor-not-allowed group relative"
                            disabled="">
                            <span class="font-label-md text-label-md text-on-surface-variant">GitHub</span>
                            <div
                                class="absolute -top-8 left-1/2 -translate-x-1/2 bg-surface-container-highest text-on-surface font-label-sm text-label-sm px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none">
                                Coming Soon</div>
                        </button>
                    </div>
                </div>
                <!-- Footer Link -->
                <div class="mt-xl text-center">
                    <p class="font-body-md text-body-md text-on-surface-variant">
                        Don't have an account?
                        <a class="text-primary hover:text-primary-fixed transition-colors link-underline"
                            href="signup.php">Create Account</a>
                    </p>
                </div>
            </div>
            <!-- Page Footer (Shared Component Rules applied inline for contextual relevance) -->
            <div
                class="w-full flex flex-col md:flex-row justify-center items-center gap-md md:gap-xl mt-xl py-xl bg-surface/0">
                <a class="font-label-sm text-label-sm text-on-surface-variant hover:text-primary transition-all opacity-80 hover:opacity-100"
                    href="#">Privacy</a>
                <a class="font-label-sm text-label-sm text-on-surface-variant hover:text-primary transition-all opacity-80 hover:opacity-100"
                    href="#">Terms</a>
                <a class="font-label-sm text-label-sm text-on-surface-variant hover:text-primary transition-all opacity-80 hover:opacity-100"
                    href="#">Help</a>
                <span class="font-label-sm text-label-sm text-outline hidden md:block">|</span>
                <span class="font-label-sm text-label-sm text-outline opacity-60">© 2024 Diary. All rights
                    reserved.</span>
            </div>
        </div>
    </div>
</body>

</html>