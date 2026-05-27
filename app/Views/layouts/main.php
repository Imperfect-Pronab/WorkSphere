<!DOCTYPE html>
<html>

<head>

    <title><?= $title ?? 'WorkSphere' ?></title>

</head>

<body>

    <?= $this->include('layouts/navbar') ?>

    <?= $this->include('layouts/sidebar') ?>

    <div style="padding:20px;">

        <?= $this->renderSection('content') ?>

    </div>

    <?= $this->include('layouts/footer') ?>

</body>

</html>