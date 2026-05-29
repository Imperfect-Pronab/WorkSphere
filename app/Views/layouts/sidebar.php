<style>
    .sidebar {
        font-family: 'Syne', sans-serif;
        background: #0c0c0e;
        border-right: 1px solid rgba(255, 255, 255, 0.06);
        box-shadow: 4px 0 24px rgba(0, 0, 0, 0.35);
        width: 220px;
        height: calc(100vh - 56px);
        position: fixed;
        top: 56px;
        left: 0;
        display: flex;
        flex-direction: column;
        z-index: 40;
    }

    .sb-nav-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 9px 12px;
        border-radius: 8px;
        font-size: 13.5px;
        font-weight: 500;
        color: rgba(255, 255, 255, 0.38);
        text-decoration: none;
        letter-spacing: 0.02em;
        border: 1px solid transparent;
        position: relative;
        transition: all 0.18s ease;
    }

    .sb-nav-item:hover {
        color: rgba(255, 255, 255, 0.85);
        background: rgba(255, 255, 255, 0.05);
        border-color: rgba(255, 255, 255, 0.07);
    }

    .sb-nav-item.active {
        color: #fff;
        background: rgba(99, 215, 165, 0.1);
        border-color: rgba(99, 215, 165, 0.2);
    }

    .sb-nav-item.active::before {
        content: '';
        position: absolute;
        left: -1px;
        top: 20%;
        height: 60%;
        width: 2px;
        background: #63d7a5;
        border-radius: 0 2px 2px 0;
        box-shadow: 0 0 8px rgba(99, 215, 165, 0.6);
    }

    .sb-nav-item .sb-icon {
        color: rgba(255, 255, 255, 0.25);
        flex-shrink: 0;
        transition: color 0.18s;
    }

    .sb-nav-item:hover .sb-icon {
        color: rgba(255, 255, 255, 0.65);
    }

    .sb-nav-item.active .sb-icon {
        color: #63d7a5;
    }

    .sb-section-label {
        font-family: 'DM Mono', monospace;
        font-size: 10px;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.2);
        padding: 0 12px;
        margin: 20px 0 6px;
    }

    .sb-sep {
        height: 1px;
        background: rgba(255, 255, 255, 0.06);
        margin: 16px 0;
    }

    .sb-role-chip {
        font-family: 'DM Mono', monospace;
        font-size: 10px;
        letter-spacing: 0.08em;
        padding: 3px 8px;
        border-radius: 4px;
        display: inline-block;
        margin-top: 3px;
        width: fit-content;
    }

    .chip-super_admin {
        background: rgba(167, 139, 250, 0.12);
        color: #a78bfa;
        border: 1px solid rgba(167, 139, 250, 0.2);
    }

    .chip-hr {
        background: rgba(59, 130, 246, 0.12);
        color: #60a5fa;
        border: 1px solid rgba(59, 130, 246, 0.2);
    }

    .chip-employee {
        background: rgba(99, 215, 165, 0.1);
        color: #63d7a5;
        border: 1px solid rgba(99, 215, 165, 0.2);
    }

    .sb-avatar-ring {
        background: conic-gradient(from 180deg, #63d7a5, #3b82f6, #a78bfa, #63d7a5);
        padding: 1.5px;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .sb-avatar-inner {
        background: #1a1a1f;
        border-radius: 50%;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .sb-logout {
        font-family: 'Syne', sans-serif;
        font-size: 12px;
        font-weight: 500;
        letter-spacing: 0.04em;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 12px;
        border-radius: 8px;
        margin-top: 10px;
        color: rgba(239, 68, 68, 0.6);
        border: 1px solid rgba(239, 68, 68, 0.15);
        transition: all 0.2s;
    }

    .sb-logout:hover {
        background: rgba(239, 68, 68, 0.08);
        border-color: rgba(239, 68, 68, 0.35);
        color: #ef4444;
    }
</style>

<aside class="sidebar">

    <!-- Nav links -->
    <nav style="flex:1;padding:12px;overflow-y:auto;">

        <?php $role = session()->get('user_role'); ?>

        <?php if ($role === 'super_admin') : ?>

            <div class="sb-section-label">Management</div>
            <a href="<?= base_url('admin/dashboard') ?>" class="sb-nav-item <?= isActive('admin/dashboard') ?>">
                <svg class="sb-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="7" height="7" />
                    <rect x="14" y="3" width="7" height="7" />
                    <rect x="14" y="14" width="7" height="7" />
                    <rect x="3" y="14" width="7" height="7" />
                </svg>
                Admin Dashboard
            </a>
            <a href="<?= base_url('admin/employees') ?>" class="sb-nav-item <?= isActive('admin/employees') ?>">
                <svg class="sb-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                </svg>
                Manage Employees
            </a>
            <a href="<?= base_url('admin/departments') ?>" class="sb-nav-item <?= isActive('admin/departments') ?>">
                <svg class="sb-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                    <polyline points="9 22 9 12 15 12 15 22" />
                </svg>
                Departments
            </a>
            <div class="sb-sep"></div>
            <div class="sb-section-label">System</div>
            <a href="<?= base_url('admin/settings') ?>" class="sb-nav-item <?= isActive('admin/settings') ?>">
                <svg class="sb-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="3" />
                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z" />
                </svg>
                Menu Settings
            </a>
            <a href="<?= base_url('admin/reports') ?>" class="sb-nav-item <?= isActive('admin/reports') ?>">
                <svg class="sb-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="20" x2="18" y2="10" />
                    <line x1="12" y1="20" x2="12" y2="4" />
                    <line x1="6" y1="20" x2="6" y2="14" />
                </svg>
                Reports
            </a>

        <?php elseif ($role === 'hr') : ?>

            <div class="sb-section-label">HR Panel</div>
            <a href="<?= base_url('hr/dashboard') ?>" class="sb-nav-item active">
                <svg class="sb-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="7" height="7" />
                    <rect x="14" y="3" width="7" height="7" />
                    <rect x="14" y="14" width="7" height="7" />
                    <rect x="3" y="14" width="7" height="7" />
                </svg>
                HR Dashboard
            </a>
            <a href="<?= base_url('hr/attendance') ?>" class="sb-nav-item">
                <svg class="sb-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="18" rx="2" />
                    <line x1="16" y1="2" x2="16" y2="6" />
                    <line x1="8" y1="2" x2="8" y2="6" />
                    <line x1="3" y1="10" x2="21" y2="10" />
                </svg>
                Attendance
            </a>
            <div class="sb-sep"></div>
            <div class="sb-section-label">People</div>
            <a href="<?= base_url('hr/employees') ?>" class="sb-nav-item">
                <svg class="sb-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                </svg>
                All Employees
            </a>
            <a href="<?= base_url('hr/leaves') ?>" class="sb-nav-item">
                <svg class="sb-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                    <polyline points="14 2 14 8 20 8" />
                    <line x1="9" y1="13" x2="15" y2="13" />
                    <line x1="9" y1="17" x2="12" y2="17" />
                </svg>
                Leave Requests
            </a>

        <?php else : ?>

            <div class="sb-section-label">My Space</div>
            <a href="<?= base_url('employee/dashboard') ?>" class="sb-nav-item active">
                <svg class="sb-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="7" height="7" />
                    <rect x="14" y="3" width="7" height="7" />
                    <rect x="14" y="14" width="7" height="7" />
                    <rect x="3" y="14" width="7" height="7" />
                </svg>
                My Dashboard
            </a>
            <a href="<?= base_url('employee/profile') ?>" class="sb-nav-item">
                <svg class="sb-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                    <circle cx="12" cy="7" r="4" />
                </svg>
                My Profile
            </a>
            <div class="sb-sep"></div>
            <div class="sb-section-label">Work</div>
            <a href="<?= base_url('employee/attendance') ?>" class="sb-nav-item">
                <svg class="sb-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10" />
                    <polyline points="12 6 12 12 16 14" />
                </svg>
                Attendance
            </a>
            <a href="<?= base_url('employee/leaves') ?>" class="sb-nav-item">
                <svg class="sb-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                    <polyline points="14 2 14 8 20 8" />
                </svg>
                Apply Leave
            </a>

        <?php endif; ?>

    </nav>

    <!-- User footer -->
    <div style="padding:12px 14px 16px;border-top:1px solid rgba(255,255,255,0.06);">
        <div style="display:flex;align-items:center;gap:10px;">
            <div class="sb-avatar-ring" style="width:34px;height:34px;">
                <div class="sb-avatar-inner">
                    <span style="font-family:'DM Mono',monospace;font-size:11px;font-weight:500;color:#a0e9cc;">
                        <?= strtoupper(substr(session()->get('user_name') ?? 'U', 0, 2)) ?>
                    </span>
                </div>
            </div>
            <div style="display:flex;flex-direction:column;min-width:0;">
                <span style="font-family:'Syne',sans-serif;color:#fff;font-size:13px;font-weight:500;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                    <?= esc(session()->get('user_name')) ?>
                </span>
                <?php
                $r = session()->get('user_role');
                $chipClass = ($r === 'super_admin') ? 'chip-super_admin' : (($r === 'hr') ? 'chip-hr' : 'chip-employee');
                ?>
                <span class="sb-role-chip <?= $chipClass ?>"><?= esc($r) ?></span>
            </div>
        </div>
        <a href="<?= base_url('logout') ?>" class="sb-logout">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                <polyline points="16 17 21 12 16 7" />
                <line x1="21" y1="12" x2="9" y2="12" />
            </svg>
            Logout
        </a>
    </div>

</aside>