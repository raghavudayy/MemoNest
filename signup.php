<?php

    require_once "includes/config.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $username = trim($_POST["username"]);
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);

        // Check if email already exists
        $check = mysqli_prepare($conn, "SELECT id FROM users WHERE email=?");
        mysqli_stmt_bind_param($check, "s", $email);
        mysqli_stmt_execute($check);
        mysqli_stmt_store_result($check);

        if(mysqli_stmt_num_rows($check) > 0){
            echo "Email already registered.";
        }
        else{

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = mysqli_prepare($conn,
            "INSERT INTO users(username,email,password)
            VALUES(?,?,?)");

            mysqli_stmt_bind_param(
                $stmt,
                "sss",
                $username,
                $email,
                $hashedPassword
            );

            if(mysqli_stmt_execute($stmt)){
                header("Location: login.php");
                exit();
            }
            else{
                echo "Signup Failed";
            }
        }
    }
?>

<!DOCTYPE html>

<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Signup - Diary</title>
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
                    "on-tertiary-fixed": "#171b26",
                    "error": "#ffb4ab",
                    "surface-variant": "#35343e",
                    "on-secondary-fixed": "#181b23",
                    "surface-dim": "#13121b",
                    "secondary-container": "#444650",
                    "on-tertiary-fixed-variant": "#434653",
                    "outline-variant": "#464555",
                    "secondary-fixed": "#e0e2ed",
                    "on-tertiary": "#2c303c",
                    "inverse-surface": "#e4e1ee",
                    "surface-container-low": "#1b1b24",
                    "primary-fixed-dim": "#c4c0ff",
                    "tertiary-fixed-dim": "#c3c6d5",
                    "primary-fixed": "#e3dfff",
                    "secondary": "#c4c6d1",
                    "on-secondary-fixed-variant": "#444650",
                    "on-primary-fixed": "#100069",
                    "on-surface-variant": "#c7c4d8",
                    "surface": "#13121b",
                    "surface-container-highest": "#35343e",
                    "primary": "#c4c0ff",
                    "on-background": "#e4e1ee",
                    "tertiary": "#c3c6d5",
                    "on-primary-fixed-variant": "#3622ca",
                    "surface-container": "#1f1f28",
                    "outline": "#918fa1",
                    "error-container": "#93000a",
                    "primary-container": "#8781ff",
                    "surface-bright": "#393842",
                    "secondary-fixed-dim": "#c4c6d1",
                    "on-surface": "#e4e1ee",
                    "on-secondary": "#2d3039",
                    "on-secondary-container": "#b3b5bf",
                    "on-primary-container": "#1b0091",
                    "tertiary-fixed": "#dfe2f1",
                    "surface-tint": "#c4c0ff",
                    "on-tertiary-container": "#262935",
                    "on-error": "#690005",
                    "tertiary-container": "#8d909e",
                    "surface-container-high": "#2a2933",
                    "surface-container-lowest": "#0e0d16",
                    "on-error-container": "#ffdad6",
                    "inverse-primary": "#4f44e2",
                    "inverse-on-surface": "#302f39",
                    "background": "#13121b",
                    "on-primary": "#2000a4"
                },
                "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px",
                    "2xl": "1.125rem",
                    "3xl": "1.5rem"
                },
                "spacing": {
                    "sm": "8px",
                    "base": "8px",
                    "xl": "40px",
                    "margin-mobile": "16px",
                    "xs": "4px",
                    "md": "16px",
                    "lg": "24px",
                    "xxl": "64px",
                    "margin-desktop": "48px",
                    "gutter": "24px"
                },
                "fontFamily": {
                    "headline-xl": ["Inter"],
                    "headline-lg": ["Inter"],
                    "headline-md": ["Inter"],
                    "label-md": ["Inter"],
                    "label-sm": ["Inter"],
                    "headline-lg-mobile": ["Inter"],
                    "body-lg": ["Inter"],
                    "body-md": ["Inter"]
                },
                "fontSize": {
                    "headline-xl": ["40px", {
                        "lineHeight": "1.2",
                        "letterSpacing": "-0.02em",
                        "fontWeight": "600"
                    }],
                    "headline-lg": ["32px", {
                        "lineHeight": "1.25",
                        "letterSpacing": "-0.02em",
                        "fontWeight": "600"
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
                    "label-sm": ["12px", {
                        "lineHeight": "1",
                        "fontWeight": "600"
                    }],
                    "headline-lg-mobile": ["24px", {
                        "lineHeight": "1.3",
                        "fontWeight": "600"
                    }],
                    "body-lg": ["18px", {
                        "lineHeight": "1.6",
                        "fontWeight": "400"
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
    }

    .bg-level-1 {
        background-color: #171A22;
    }

    .bg-level-2 {
        background-color: #1D212C;
    }

    .glass-panel {
        background: rgba(23, 26, 34, 0.7);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.06);
    }

    .form-input {
        background-color: #0F1117;
        border-color: rgba(255, 255, 255, 0.1);
    }

    .signupForm input {
        background-color: #0F1117;
    }

    .form-input:focus {
        border-color: #c4c0ff;
        box-shadow: 0 0 0 2px rgba(196, 192, 255, 0.2);
    }
    </style>
</head>

<body class="bg-[#0F1117] text-on-surface min-h-screen font-body-md selection:bg-primary selection:text-on-primary">
    <!-- TopNavBar - Suppressed for transactional intent (Signup) as per Semantic Shell Mandate -->
    <main class="min-h-screen flex flex-col md:flex-row w-full">
        <!-- Left Panel: Graphic / Motivational (45%) -->
        <section
            class="relative hidden md:flex w-[45%] flex-col justify-between p-margin-desktop overflow-hidden border-r border-outline-variant/20">
            <!-- Animation Background -->
            <!-- STITCH_SHADER_START:ANIMATION_4 class="absolute inset-0 w-full h-full object-cover opacity-60 z-0" -->
            <div class="absolute inset-0 w-full h-full object-cover opacity-60 z-0" style="display:block;">
                <canvas id="shader-canvas-ANIMATION_4" style="display:block;width:100%;height:100%"></canvas>
                <script>
                (function() {
                    const canvas = document.getElementById('shader-canvas-ANIMATION_4');

                    // Sync the WebGL drawing-buffer size with the CSS-driven layout size.
                    // This fires on initial layout and whenever the element is resized.
                    function syncSize() {
                        const w = canvas.clientWidth || 1280;
                        const h = canvas.clientHeight || 720;
                        if (canvas.width !== w || canvas.height !== h) {
                            canvas.width = w;
                            canvas.height = h;
                        }
                    }
                    if (typeof ResizeObserver !== 'undefined') {
                        new ResizeObserver(syncSize).observe(canvas);
                    }
                    syncSize();

                    const gl = canvas.getContext('webgl') || canvas.getContext('experimental-webgl');
                    if (!gl) return;
                    const vs = `attribute vec2 a_position;
                                varying vec2 v_texCoord;
                                void main() {
                                v_texCoord = a_position * 0.5 + 0.5;
                                gl_Position = vec4(a_position, 0.0, 1.0);
                                }`;
                    const fs = `precision highp float;
                                varying vec2 v_texCoord;
                                uniform float u_time;
                                uniform vec2 u_resolution;

                                // Simplex 2D noise
                                vec3 permute(vec3 x) { return mod(((x*34.0)+1.0)*x, 289.0); }

                                float snoise(vec2 v){
                                const vec4 C = vec4(0.211324865405187, 0.366025403784439,
                                        -0.577350269189626, 0.024390243902439);
                                vec2 i  = floor(v + dot(v, C.yy) );
                                vec2 x0 = v -   i + dot(i, C.xx);
                                vec2 i1;
                                i1 = (x0.x > x0.y) ? vec2(1.0, 0.0) : vec2(0.0, 1.0);
                                vec4 x12 = x0.xyxy + C.xxzz;
                                x12.xy -= i1;
                                i = mod(i, 289.0);
                                vec3 p = permute( permute( i.y + vec3(0.0, i1.y, 1.0 ))
                                + i.x + vec3(0.0, i1.x, 1.0 ));
                                vec3 m = max(0.5 - vec3(dot(x0,x0), dot(x12.xy,x12.xy),
                                    dot(x12.zw,x12.zw)), 0.0);
                                m = m*m ;
                                m = m*m ;
                                vec3 x = 2.0 * fract(p * C.www) - 1.0;
                                vec3 h = abs(x) - 0.5;
                                vec3 a0 = x - floor(x + 0.5);
                                vec4 b0 = vec4( a0.xy, a0.zw );
                                vec4 b1 = vec4( a0.zw, a0.xy );
                                vec3 g = vec3(b0.x, b0.y, b1.z) * x0.x + vec3(b1.x, b1.y, b0.z) * x0.y;
                                vec3 n = 1.79284291400159 - 0.85373472095314 * ( a0*a0 + h*h );
                                return 0.5 + 0.5 * 130.0 * dot(m, g * n);
                                }

                                void main() {
                                    vec2 uv = v_texCoord;
                                    
                                    // Create organic flowing motion
                                    float n1 = snoise(uv * 2.0 + u_time * 0.1);
                                    float n2 = snoise(uv * 4.0 - u_time * 0.15);
                                    float n3 = snoise(uv * 1.0 + u_time * 0.05);
                                    
                                    // Deep Midnight Palette
                                    vec3 color1 = vec3(0.058, 0.066, 0.090); // #0F1117
                                    vec3 color2 = vec3(0.090, 0.102, 0.133); // #171A22
                                    vec3 accent = vec3(0.424, 0.388, 1.0);   // #6C63FF
                                    
                                    // Layered color blending
                                    vec3 finalColor = mix(color1, color2, n1);
                                    finalColor = mix(finalColor, accent * 0.3, n2 * n3);
                                    
                                    // Soft vignette
                                    float dist = length(uv - 0.5);
                                    finalColor *= smoothstep(1.2, 0.2, dist);
                                    
                                    gl_FragColor = vec4(finalColor, 1.0);
                                }`;

                    function cs(type, src) {
                        const s = gl.createShader(type);
                        gl.shaderSource(s, src);
                        gl.compileShader(s);
                        return s;
                    }
                    const prog = gl.createProgram();
                    gl.attachShader(prog, cs(gl.VERTEX_SHADER, vs));
                    gl.attachShader(prog, cs(gl.FRAGMENT_SHADER, fs));
                    gl.linkProgram(prog);
                    gl.useProgram(prog);
                    const buf = gl.createBuffer();
                    gl.bindBuffer(gl.ARRAY_BUFFER, buf);
                    gl.bufferData(gl.ARRAY_BUFFER, new Float32Array([-1, -1, 1, -1, -1, 1, 1, 1]), gl.STATIC_DRAW);
                    const pos = gl.getAttribLocation(prog, 'a_position');
                    gl.enableVertexAttribArray(pos);
                    gl.vertexAttribPointer(pos, 2, gl.FLOAT, false, 0, 0);
                    const uTime = gl.getUniformLocation(prog, 'u_time');
                    const uRes = gl.getUniformLocation(prog, 'u_resolution');
                    const uMouse = gl.getUniformLocation(prog, 'u_mouse');

                    // u_mouse is in pixel coordinates matching u_resolution (ShaderToy convention).
                    // Shaders that need normalized coords should use: u_mouse / u_resolution.
                    let mouse = {
                        x: canvas.width / 2,
                        y: canvas.height / 2
                    };
                    window.addEventListener('mousemove', (event) => {
                        const rect = canvas.getBoundingClientRect();
                        if (rect.width && rect.height) {
                            const nx = (event.clientX - rect.left) / rect.width;
                            const ny = 1.0 - (event.clientY - rect.top) / rect.height;
                            mouse.x = nx * canvas.width;
                            mouse.y = ny * canvas.height;
                        }
                    });

                    function render(t) {
                        if (typeof ResizeObserver === 'undefined') syncSize();
                        gl.viewport(0, 0, canvas.width, canvas.height);
                        if (uTime) gl.uniform1f(uTime, t * 0.001);
                        if (uRes) gl.uniform2f(uRes, canvas.width, canvas.height);
                        if (uMouse) gl.uniform2f(uMouse, mouse.x, mouse.y);
                        gl.drawArrays(gl.TRIANGLE_STRIP, 0, 4);
                        requestAnimationFrame(render);
                    }
                    render(0);
                })();
                </script>
            </div>
            <!-- STITCH_SHADER_END:ANIMATION_4 -->
            <div class="relative z-10 flex items-center gap-sm">
                <img src="uploads/logo.png" class=" h-20 object-contain">
            </div>
            <div class="relative z-10 mt-auto pb-xxl max-w-md">
                <h1 class="font-headline-xl text-headline-xl text-on-surface mb-lg">Your sanctuary for thoughts.</h1>
                <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
                    Join thousands of people who use Diary to capture memories, reflect on their journey, and grow every
                    day.
                </p>
                <!-- Floating Cards Decoration -->
                <div class="mt-xl flex flex-col gap-md relative">
                    <div
                        class="glass-panel p-md rounded-xl w-64 transform -rotate-2 hover:rotate-0 transition-transform duration-300 shadow-lg ml-md">
                        <div class="flex items-center gap-sm mb-sm text-primary">
                            <span class="material-symbols-outlined text-sm">wb_sunny</span>
                            <span class="font-label-md text-label-md">Morning Gratitude</span>
                        </div>
                        <div class="h-2 bg-on-surface-variant/20 rounded w-full mb-2"></div>
                        <div class="h-2 bg-on-surface-variant/20 rounded w-4/5"></div>
                    </div>
                    <div
                        class="glass-panel p-md rounded-xl w-64 transform rotate-1 hover:rotate-0 transition-transform duration-300 shadow-lg ml-xl">
                        <div class="flex items-center gap-sm mb-sm text-tertiary">
                            <span class="material-symbols-outlined text-sm">auto_awesome</span>
                            <span class="font-label-md text-label-md">Daily Reflections</span>
                        </div>
                        <div class="h-2 bg-on-surface-variant/20 rounded w-full mb-2"></div>
                        <div class="h-2 bg-on-surface-variant/20 rounded w-3/4"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Right Panel: Authentication Form (55%) -->
        <section
            class="flex-1 flex flex-col items-center justify-center p-margin-mobile md:p-margin-desktop relative overflow-y-auto">
            <!-- Mobile Logo Header -->
            <div class="md:hidden flex flex-col items-center gap-sm mb-lg mt-md w-full">
                <img src="uploads/logo.png" class="h-12 rounded-md">
                </h1>
                <p class="font-body-md text-body-md text-on-surface-variant text-center">Your sanctuary for thoughts.
                </p>
            </div>
            <!-- Auth Card -->
            <div
                class="w-full max-w-md bg-level-2 rounded-[20px] p-lg md:p-[32px] border border-white/5 shadow-2xl relative z-10">
                <div class="text-center mb-xl">
                    <h2 class="font-headline-lg text-headline-lg text-on-surface mb-sm">Create an account</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant">Start your personal journaling journey.
                    </p>
                </div>
                <form method="POST" action="" class="signupForm space-y-md">
                    <!-- Full Name -->
                    <div class="relative">
                        <label class="sr-only" for="fullName">Full Name</label>
                        <div
                            class="absolute inset-y-0 left-0 pl-sm flex items-center pointer-events-none text-on-surface-variant">
                            <span class="material-symbols-outlined text-lg">person</span>
                        </div>
                        <input
                            class="form-input w-full pl-xl pr-md py-sm rounded-xl text-on-surface placeholder:text-on-surface-variant/50 focus:outline-none transition-all duration-200"
                            id="fullName" name="username" placeholder="Full Name" type="text" />
                    </div>
                    <!-- Email -->
                    <div class="relative">
                        <label class="sr-only" for="email">Email Address</label>
                        <div
                            class="absolute inset-y-0 left-0 pl-sm flex items-center pointer-events-none text-on-surface-variant">
                            <span class="material-symbols-outlined text-lg">mail</span>
                        </div>
                        <input
                            class="form-input w-full pl-xl pr-md py-sm rounded-xl text-on-surface placeholder:text-on-surface-variant/50 focus:outline-none transition-all duration-200"
                            id="email" name="email" placeholder="Email Address" type="email" />
                    </div>
                    <!-- Password -->
                    <div class="relative group">
                        <label class="sr-only" for="password">Password</label>
                        <div
                            class="absolute inset-y-0 left-0 pl-sm flex items-center pointer-events-none text-on-surface-variant">
                            <span class="material-symbols-outlined text-lg">lock</span>
                        </div>
                        <input
                            class="form-input w-full pl-xl pr-xl py-sm rounded-xl text-on-surface placeholder:text-on-surface-variant/50 focus:outline-none transition-all duration-200"
                            id="password" name="password" placeholder="Password" type="password" />
                        <button
                            class="absolute inset-y-0 right-0 pr-sm flex items-center text-on-surface-variant hover:text-primary transition-colors focus:outline-none"
                            type="button">
                            <span class="material-symbols-outlined text-lg">visibility</span>
                        </button>
                    </div>
                    <!-- Password Strength (Conceptual) -->
                    <div class="flex gap-xs mt-2 px-1">
                        <div class="h-1 flex-1 bg-primary/20 rounded-full"></div>
                        <div class="h-1 flex-1 bg-surface-variant rounded-full"></div>
                        <div class="h-1 flex-1 bg-surface-variant rounded-full"></div>
                        <div class="h-1 flex-1 bg-surface-variant rounded-full"></div>
                    </div>
                    <!-- Terms Checkbox -->
                    <div class="flex items-start gap-sm pt-sm">
                        <div class="flex items-center h-5">
                            <input
                                class="w-4 h-4 rounded border-outline-variant/40 bg-[#171A22] text-primary focus:ring-primary focus:ring-offset-background"
                                id="terms" name="terms" required type="checkbox" />
                        </div>
                        <label class="font-body-md text-body-md text-on-surface-variant text-sm" for="terms">
                            I agree to the <a
                                class="text-primary hover:text-primary-fixed-dim underline transition-colors"
                                href="#">Terms of Service</a> and <a
                                class="text-primary hover:text-primary-fixed-dim underline transition-colors"
                                href="#">Privacy Policy</a>.
                        </label>
                    </div>
                    <!-- Submit Button -->
                    <button
                        class="w-full bg-primary text-on-primary font-label-md text-label-md py-md rounded-xl hover:bg-primary-fixed-dim hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 shadow-[0_4px_14px_0_rgba(196,192,255,0.25)] hover:shadow-[0_6px_20px_rgba(196,192,255,0.3)] mt-lg flex items-center justify-center gap-sm group"
                        type="submit">
                        Create Account
                        <span
                            class="material-symbols-outlined text-lg group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </button>
                </form>
                <!-- Social Login Divider -->
                <div class="mt-xl relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-outline-variant/20"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span
                            class="px-2 bg-level-2 text-on-surface-variant font-label-sm text-label-sm uppercase tracking-wider">Or
                            continue with</span>
                    </div>
                </div>
                <!-- Social Buttons (Disabled/Subtle as requested) -->
                <div class="mt-lg grid grid-cols-2 gap-md relative">
                    <div class="absolute -top-4 right-0 transform translate-x-1/4 -translate-y-1/2 z-20">
                        <span
                            class="bg-surface-variant text-on-surface font-label-sm text-[10px] px-2 py-0.5 rounded-full shadow-sm whitespace-nowrap">Coming
                            Soon</span>
                    </div>
                    <button
                        class="flex items-center justify-center gap-sm w-full py-2.5 px-4 bg-level-1 border border-outline-variant/20 rounded-xl text-on-surface-variant opacity-60 cursor-not-allowed"
                        disabled="">
                        <svg class="w-5 h-5" fill="currentColor" viewbox="0 0 24 24">
                            <path
                                d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                                fill="#4285F4"></path>
                            <path
                                d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                                fill="#34A853"></path>
                            <path
                                d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
                                fill="#FBBC05"></path>
                            <path
                                d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                                fill="#EA4335"></path>
                        </svg>
                        <span class="font-label-md text-label-md">Google</span>
                    </button>
                    <button
                        class="flex items-center justify-center gap-sm w-full py-2.5 px-4 bg-level-1 border border-outline-variant/20 rounded-xl text-on-surface-variant opacity-60 cursor-not-allowed"
                        disabled="">
                        <svg class="w-5 h-5" fill="currentColor" viewbox="0 0 24 24">
                            <path
                                d="M12 2C6.477 2 2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12c0-5.523-4.477-10-10-10z">
                            </path>
                        </svg>
                        <span class="font-label-md text-label-md">Facebook</span>
                    </button>
                </div>
                <div class="mt-lg text-center">
                    <p class="font-body-md text-body-md text-on-surface-variant">
                        Already have an account? <a
                            class="text-primary hover:text-primary-fixed-dim font-medium transition-colors"
                            href="login.php">Log
                            in</a>
                    </p>
                </div>
            </div>
            <!-- Subtle Footer Links -->
            <footer
                class="absolute bottom-margin-mobile md:bottom-margin-desktop w-full text-center z-10 px-margin-mobile">
                <div
                    class="flex justify-center items-center gap-md font-label-sm text-label-sm text-on-surface-variant/60">
                    <a class="hover:text-on-surface transition-colors" href="#">Privacy</a>
                    <span class="w-1 h-1 rounded-full bg-on-surface-variant/30"></span>
                    <a class="hover:text-on-surface transition-colors" href="#">Terms</a>
                    <span class="w-1 h-1 rounded-full bg-on-surface-variant/30"></span>
                    <a class="hover:text-on-surface transition-colors" href="#">Help</a>
                </div>
            </footer>
        </section>
    </main>
    <!-- Footer component suppressed as per standard layout for split-screen authentications focusing on the Canvas -->
    <script>
    // Simple password toggle interaction
    document.addEventListener('DOMContentLoaded', () => {
        const toggleBtns = document.querySelectorAll(
            'button:has(.material-symbols-outlined:contains("visibility"))');

        toggleBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                const input = e.currentTarget.previousElementSibling;
                const icon = e.currentTarget.querySelector('.material-symbols-outlined');

                if (input.type === 'password') {
                    input.type = 'text';
                    icon.textContent = 'visibility_off';
                } else {
                    input.type = 'password';
                    icon.textContent = 'visibility';
                }
            });
        });
    });
    </script>
</body>

</html>