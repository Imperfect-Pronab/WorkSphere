<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/login.css') ?>">
</head>

<body class="grain min-h-screen flex items-center justify-center p-4 relative overflow-hidden"
    style="background: #0f0d0a;">
    <?php if (session()->getFlashdata('success')) : ?>
        <div id="toast-success"
            class="fixed top-1/2 left-1/2 z-[9999] -translate-x-1/2 -translate-y-1/2 
        opacity-0 scale-95 transition-all duration-300 ease-out">

            <div class="min-w-[340px] max-w-[500px] rounded-2xl border border-emerald-400/20 
            bg-emerald-500/10 backdrop-blur-xl shadow-2xl overflow-hidden">

                <div class="flex items-start gap-4 p-5">

                    <div class="flex h-12 w-12 items-center justify-center rounded-full 
                    bg-emerald-500 text-white shadow-lg">
                        ✓
                    </div>

                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-white">
                            Success
                        </h3>

                        <p class="mt-1 text-sm text-emerald-100">
                            <?= session()->getFlashdata('success') ?>
                        </p>
                    </div>

                    <button onclick="closeToast('toast-success')"
                        class="text-white/60 hover:text-white transition">
                        ✕
                    </button>

                </div>

                <div class="h-1 w-full bg-white/10">
                    <div class="toast-progress-success h-full bg-emerald-400"></div>
                </div>

            </div>
        </div>
    <?php endif; ?>
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
    <script>
        function showToast(id) {
            const toast = document.getElementById(id);

            if (!toast) return;

            setTimeout(() => {
                toast.classList.remove('opacity-0', 'scale-95');
                toast.classList.add('opacity-100', 'scale-100');
            }, 100);

            setTimeout(() => {
                closeToast(id);
            }, 4000);
        }

        function closeToast(id) {
            const toast = document.getElementById(id);

            if (!toast) return;

            toast.classList.remove('opacity-100', 'scale-100');
            toast.classList.add('opacity-0', 'scale-95');

            setTimeout(() => {
                toast.remove();
            }, 300);
        }

        showToast('toast-success');
    </script>
</body>

</html>