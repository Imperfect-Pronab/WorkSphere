<!DOCTYPE html>
<html>

<head>

    <title><?= $title ?? 'WorkSphere' ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/common.css'); ?>">

</head>

<body>

    <?= $this->include('layouts/navbar') ?>

    <?= $this->include('layouts/sidebar') ?>

    <div class="main-content">
        <?= $this->renderSection('content') ?>
    </div>

    <?= $this->include('layouts/footer') ?>

</body>

</html>