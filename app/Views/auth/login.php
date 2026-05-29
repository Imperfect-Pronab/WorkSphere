<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'DM Sans', sans-serif;
        }

        .serif {
            font-family: 'Instrument Serif', serif;
        }

        .grain::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 0;
            opacity: 0.5;
        }

        .input-field {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.12);
            color: #f0ece4;
            transition: all 0.25s ease;
        }

        .input-field::placeholder {
            color: rgba(240, 236, 228, 0.3);
        }

        .input-field:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(212, 180, 140, 0.55);
            box-shadow: 0 0 0 3px rgba(212, 180, 140, 0.12);
        }

        .btn-login {
            background: linear-gradient(135deg, #c9a96e 0%, #e0c99a 50%, #c9a96e 100%);
            background-size: 200% 200%;
            animation: shimmer 4s ease infinite;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 32px rgba(201, 169, 110, 0.35);
        }

        .btn-login:active {
            transform: translateY(0px);
        }

        @keyframes shimmer {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .card-glow {
            box-shadow:
                0 0 0 1px rgba(255, 255, 255, 0.07),
                0 24px 80px rgba(0, 0, 0, 0.55),
                0 4px 16px rgba(0, 0, 0, 0.3);
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeup {
            animation: fadeUp 0.6s ease forwards;
        }

        .delay-1 {
            animation-delay: 0.1s;
            opacity: 0;
        }

        .delay-2 {
            animation-delay: 0.2s;
            opacity: 0;
        }

        .delay-3 {
            animation-delay: 0.3s;
            opacity: 0;
        }

        .delay-4 {
            animation-delay: 0.4s;
            opacity: 0;
        }

        .delay-5 {
            animation-delay: 0.5s;
            opacity: 0;
        }

        .dot-pattern {
            background-image: radial-gradient(rgba(255, 255, 255, 0.07) 1px, transparent 1px);
            background-size: 28px 28px;
        }

        .divider-line {
            background: linear-gradient(to right, transparent, rgba(255, 255, 255, 0.12), transparent);
        }

        label {
            color: rgba(240, 236, 228, 0.55);
            letter-spacing: 0.08em;
        }
    </style>
</head>

<body class="grain min-h-screen flex items-center justify-center p-4 relative overflow-hidden"
    style="background: #0f0d0a;">

    <!-- Background layers -->
    <div class="dot-pattern fixed inset-0 z-0 pointer-events-none"></div>
    <div class="fixed inset-0 z-0 pointer-events-none"
        style="background: radial-gradient(ellipse 70% 60% at 30% 20%, rgba(201,169,110,0.08) 0%, transparent 60%),
                            radial-gradient(ellipse 50% 50% at 75% 80%, rgba(100,80,140,0.06) 0%, transparent 55%);">
    </div>

    <!-- Card -->
    <div class="relative z-10 w-full max-w-md">

        <!-- Logo / Brand mark -->
        <div class="animate-fadeup delay-1 text-center mb-10">
            <div class="inline-flex items-center justify-center w-12 h-12 rounded-2xl mb-5"
                style="background: rgba(201,169,110,0.14); border: 1px solid rgba(201,169,110,0.28);">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 2L13.5 8H20L14.5 12L16.5 18L11 14.5L5.5 18L7.5 12L2 8H8.5L11 2Z"
                        fill="none" stroke="#c9a96e" stroke-width="1.4" stroke-linejoin="round" />
                </svg>
            </div>
            <h1 class="serif text-3xl text-white" style="letter-spacing: -0.01em;">Welcome back</h1>
            <p class="mt-1.5 text-sm" style="color: rgba(240,236,228,0.38);">Sign in to your account to continue</p>
        </div>

        <!-- Card -->
        <div class="animate-fadeup delay-2 card-glow rounded-3xl p-8"
            style="background: rgba(20,17,12,0.85); backdrop-filter: blur(24px); border: 1px solid rgba(255,255,255,0.07);">

            <!-- Flash error -->
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="animate-fadeup mb-6 flex items-start gap-3 rounded-xl px-4 py-3"
                    style="background: rgba(180,50,50,0.13); border: 1px solid rgba(220,80,80,0.25);">
                    <svg class="mt-0.5 shrink-0" width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <circle cx="8" cy="8" r="7" stroke="#e05555" stroke-width="1.3" />
                        <path d="M8 5v4M8 11v.5" stroke="#e05555" stroke-width="1.4" stroke-linecap="round" />
                    </svg>
                    <p class="text-sm" style="color: #e08080;">
                        <?= session()->getFlashdata('error') ?>
                    </p>
                </div>
            <?php endif; ?>

            <form method="post" action="<?= base_url('login/process') ?>" class="space-y-5">

                <?= csrf_field() ?>

                <!-- Email -->
                <div class="animate-fadeup delay-3">
                    <label class="block text-xs font-medium uppercase mb-2">Email address</label>
                    <input
                        type="email"
                        name="email"
                        required
                        placeholder="you@example.com"
                        class="input-field w-full rounded-xl px-4 py-3 text-sm">
                </div>

                <!-- Password -->
                <div class="animate-fadeup delay-4">
                    <div class="flex items-center justify-between mb-2">
                        <label class="block text-xs font-medium uppercase">Password</label>
                        <a href="javascript:void(0)" class="text-xs transition-colors"
                            style="color: rgba(201,169,110,0.7);"
                            onmouseover="this.style.color='rgba(201,169,110,1)'"
                            onmouseout="this.style.color='rgba(201,169,110,0.7)'">
                            Forgot password?
                        </a>
                    </div>
                    <input
                        type="password"
                        name="password"
                        required
                        placeholder="********"
                        class="input-field w-full rounded-xl px-4 py-3 text-sm">
                </div>

                <!-- Submit -->
                <div class="animate-fadeup delay-5 pt-2">
                    <button type="submit"
                        class="btn-login w-full rounded-xl py-3 text-sm font-medium"
                        style="color: #1a1408; letter-spacing: 0.03em;">
                        Sign in
                    </button>
                </div>

            </form>

            <!-- Divider -->
            <div class="animate-fadeup delay-5 flex items-center gap-3 my-6">
                <div class="divider-line flex-1 h-px"></div>
                <span class="text-xs" style="color: rgba(240,236,228,0.22);">or</span>
                <div class="divider-line flex-1 h-px"></div>
            </div>

            <!-- Sign-up nudge -->
            <p class="animate-fadeup delay-5 text-center text-xs" style="color: rgba(240,236,228,0.32);">
                Don't have an account?
                <a href="javascript:void(0)" class="transition-colors"
                    style="color: rgba(201,169,110,0.75);"
                    onmouseover="this.style.color='rgba(201,169,110,1)'"
                    onmouseout="this.style.color='rgba(201,169,110,0.75)'">
                    Create one
                </a>
            </p>

        </div>

        <!-- Footer note -->
        <p class="animate-fadeup delay-5 text-center text-xs mt-6" style="color: rgba(240,236,228,0.2);">
            Protected by industry-standard encryption
        </p>

    </div>
</body>

</html>