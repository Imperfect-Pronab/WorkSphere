<div style="background:#222;color:#fff;padding:15px;">

    Welcome,
    <?= session()->get('user_name') ?>

    |

    Role:
    <?= session()->get('user_role') ?>

    |

    <a href="<?= base_url('logout') ?>" style="color:red;">
        Logout
    </a>

</div>