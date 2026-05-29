<!DOCTYPE html>
<html>

<head>

    <title><?= $title ?? 'WorkSphere' ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: #0f0d0a;
            color: #f0ece4;
        }

        /* Pushes content to the right of the fixed sidebar */
        .main-content {
            margin-left: 220px;
            /* sidebar width */
            min-height: calc(100vh - 56px - 57px);
            /* full height minus navbar + footer */
            padding: 28px 32px;
            font-family: 'Syne', sans-serif;
        }
    </style>

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