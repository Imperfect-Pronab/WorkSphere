<!DOCTYPE html>
<html>

<head>

    <title><?= $title ?? 'WorkSphere' ?></title>
    <link rel="stylesheet" href="<?= base_url('public/assets/css/style.css') ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('public/assets/admin/css/common.css'); ?>">

</head>

<body>

    <?= $this->include('layouts/admin/navbar') ?>

    <?= $this->include('layouts/admin/sidebar') ?>

    <div class="main-content">
        <?= $this->renderSection('content') ?>
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


        <?php if (session()->getFlashdata('error')) : ?>
            <div id="toast-error"
                class="fixed top-1/2 left-1/2 z-[9999] -translate-x-1/2 -translate-y-1/2 
        opacity-0 scale-95 transition-all duration-300 ease-out">

                <div class="min-w-[340px] max-w-[500px] rounded-2xl border border-red-400/20 
            bg-red-500/10 backdrop-blur-xl shadow-2xl overflow-hidden">

                    <div class="flex items-start gap-4 p-5">

                        <div class="flex h-12 w-12 items-center justify-center rounded-full 
                    bg-red-500 text-white shadow-lg">
                            !
                        </div>

                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-white">
                                Error
                            </h3>

                            <p class="mt-1 text-sm text-red-100">
                                <?= session()->getFlashdata('error') ?>
                            </p>
                        </div>

                        <button onclick="closeToast('toast-error')"
                            class="text-white/60 hover:text-white transition">
                            ✕
                        </button>

                    </div>

                    <div class="h-1 w-full bg-white/10">
                        <div class="toast-progress-error h-full bg-red-400"></div>
                    </div>

                </div>
            </div>
        <?php endif; ?>
    </div>

    <?= $this->include('layouts/footer') ?>
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
        showToast('toast-error');
    </script>
</body>

</html>