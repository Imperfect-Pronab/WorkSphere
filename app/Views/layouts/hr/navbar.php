<style>
    .nav-root {
        font-family: 'Syne', sans-serif;
    }

    .mono {
        font-family: 'DM Mono', monospace;
    }

    .navbar {
        background: #0c0c0e;
        border-bottom: 1px solid rgba(255, 255, 255, 0.06);
        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.4);
        position: sticky;
        top: 0;
        z-index: 50;
    }

    .nav-link {
        color: rgba(255, 255, 255, 0.38);
        font-size: 13px;
        font-weight: 500;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        text-decoration: none;
        transition: color 0.2s;
    }

    .active {
        color: #63d7a5;
    }

    .nav-link:hover {
        color: rgba(255, 255, 255, 0.82);
    }

    .brand-dot {
        background: conic-gradient(from 0deg, #63d7a5, #3b82f6, #a78bfa);
        border-radius: 3px;
        width: 8px;
        height: 8px;
        flex-shrink: 0;
    }

    .v-sep {
        width: 1px;
        height: 20px;
        background: rgba(255, 255, 255, 0.08);
    }

    .avatar-ring {
        background: conic-gradient(from 180deg, #63d7a5, #3b82f6, #a78bfa, #63d7a5);
        padding: 1.5px;
        border-radius: 50%;
    }

    .avatar-inner {
        background: #1a1a1f;
        border-radius: 50%;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .role-badge {
        font-family: 'DM Mono', monospace;
        font-size: 10px;
        letter-spacing: 0.07em;
        padding: 2px 7px;
        border-radius: 4px;
        background: rgba(99, 215, 165, 0.1);
        border: 1px solid rgba(99, 215, 165, 0.22);
        color: #63d7a5;
    }

    .notif-dot {
        width: 6px;
        height: 6px;
        background: #63d7a5;
        border-radius: 50%;
        position: absolute;
        top: 2px;
        right: 2px;
        box-shadow: 0 0 6px rgba(99, 215, 165, 0.7);
    }

    .logout-btn {
        font-family: 'Syne', sans-serif;
        font-size: 12px;
        font-weight: 500;
        letter-spacing: 0.05em;
        text-decoration: none;
        border: 1px solid rgba(239, 68, 68, 0.25);
        color: rgba(239, 68, 68, 0.75);
        padding: 6px 12px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s;
    }

    .logout-btn:hover {
        background: rgba(239, 68, 68, 0.1);
        border-color: rgba(239, 68, 68, 0.5);
        color: #ef4444;
    }
</style>

<nav class="nav-root navbar w-full px-5 flex items-center justify-between" style="height:56px;">

    <div class="flex items-center gap-7">
        <a href="<?= base_url('dashboard') ?>" style="display:flex;align-items:center;gap:10px;text-decoration:none;">
            <div class="brand-dot"></div>
            <span style="font-family:'Syne',sans-serif;color:#fff;font-weight:600;font-size:13px;letter-spacing:0.12em;">WORKSPHERE</span>
        </a>
        <div class="v-sep"></div>
        <div style="display:flex;align-items:center;gap:24px;">
            <a href="<?= base_url('hr/profile') ?>" class="nav-link <?= isActive('hr/profile') ?>">Profile</a>
            <a href="<?= base_url('hr/changePassword') ?>" class="nav-link <?= isActive('hr/changePassword') ?>">Change Password</a>
        </div>
    </div>

    <div style="display:flex;align-items:center;gap:16px;">
        <button style="position:relative;background:none;border:none;cursor:pointer;padding:6px;border-radius:8px;color:rgba(255,255,255,0.35);transition:all 0.2s;"
            onmouseover="this.style.color='rgba(255,255,255,0.8)';this.style.background='rgba(255,255,255,0.05)';"
            onmouseout="this.style.color='rgba(255,255,255,0.35)';this.style.background='transparent';"
            aria-label="Notifications">
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                <path d="M13.73 21a2 2 0 0 1-3.46 0" />
            </svg>
            <span class="notif-dot"></span>
        </button>
        <div class="v-sep"></div>
        <div style="display:flex;align-items:center;gap:10px;">
            <div class="avatar-ring" style="width:34px;height:34px;flex-shrink:0;">
                <div class="avatar-inner">
                    <span class="mono" style="font-size:11px;font-weight:500;color:#a0e9cc;">
                        <?= strtoupper(substr(session()->get('user_name') ?? 'U', 0, 2)) ?>
                    </span>
                </div>
            </div>
            <div style="display:flex;flex-direction:column;line-height:1.2;">
                <span style="font-family:'Syne',sans-serif;color:#fff;font-size:13px;font-weight:500;"><?= esc(session()->get('user_name')) ?></span>
                <span class="role-badge" style="margin-top:3px;display:inline-block;width:fit-content;"><?= esc(session()->get('user_role')) ?></span>
            </div>
        </div>
        <div class="v-sep"></div>
        <a href="<?= base_url('logout') ?>" class="logout-btn">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                <polyline points="16 17 21 12 16 7" />
                <line x1="21" y1="12" x2="9" y2="12" />
            </svg>
            Logout
        </a>
    </div>

</nav>