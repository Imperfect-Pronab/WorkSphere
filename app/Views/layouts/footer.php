<style>
    .site-footer {
        font-family: 'Syne', sans-serif;
        background: #0c0c0e;
        border-top: 1px solid rgba(255, 255, 255, 0.06);
        margin-left: 220px;
        padding: 18px 32px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 8px;
    }

    .footer-brand {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .footer-brand-dot {
        background: conic-gradient(from 0deg, #63d7a5, #3b82f6, #a78bfa);
        border-radius: 3px;
        width: 7px;
        height: 7px;
    }

    .footer-brand span {
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 0.12em;
        color: rgba(255, 255, 255, 0.35);
    }

    .footer-copy {
        font-family: 'DM Mono', monospace;
        font-size: 11px;
        color: rgba(255, 255, 255, 0.18);
        letter-spacing: 0.04em;
    }

    .footer-links {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .footer-links a {
        font-size: 12px;
        font-weight: 500;
        color: rgba(255, 255, 255, 0.25);
        text-decoration: none;
        letter-spacing: 0.03em;
        transition: color 0.2s;
    }

    .footer-links a:hover {
        color: rgba(255, 255, 255, 0.7);
    }

    .footer-sep {
        width: 1px;
        height: 14px;
        background: rgba(255, 255, 255, 0.08);
    }
</style>

<footer class="site-footer">

    <div class="footer-brand">
        <div class="footer-brand-dot"></div>
        <span>WORKSPHERE</span>
    </div>

    <span class="footer-copy">
        &copy; <?= date('Y') ?> WorkSphere &mdash; All rights reserved
    </span>

    <div class="footer-links">
        <a href="<?= base_url('privacy') ?>">Privacy</a>
        <div class="footer-sep"></div>
        <a href="<?= base_url('terms') ?>">Terms</a>
        <div class="footer-sep"></div>
        <a href="<?= base_url('support') ?>">Support</a>
    </div>

</footer>