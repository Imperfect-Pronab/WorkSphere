<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>

    <h2>Login</h2>

    <?php if (session()->getFlashdata('error')) : ?>
        <p style="color:red;">
            <?= session()->getFlashdata('error') ?>
        </p>
    <?php endif; ?>

    <form method="post" action="<?= base_url('login/process') ?>">

        <?= csrf_field() ?>

        <div>
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <br>

        <div>
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <br>

        <button type="submit">Login</button>

    </form>

</body>

</html>