<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .dash-page {
        font-family: 'Syne', sans-serif;
    }

    /* Page header */
    .dash-header-label {
        font-family: 'DM Mono', monospace;
        font-size: 10px;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.22);
        margin-bottom: 6px;
    }

    .dash-title {
        font-size: 26px;
        font-weight: 600;
        color: #fff;
        letter-spacing: -0.01em;
        line-height: 1.2;
    }

    .dash-subtitle {
        font-size: 13px;
        color: rgba(255, 255, 255, 0.35);
        margin-top: 4px;
    }

    /* Stat cards */
    .stat-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 14px;
        margin-top: 28px;
    }

    .stat-card {
        background: #141210;
        border: 1px solid rgba(255, 255, 255, 0.07);
        border-radius: 14px;
        padding: 18px 20px;
        position: relative;
        overflow: hidden;
        transition: border-color 0.2s, transform 0.2s;
        cursor: default;
    }

    .stat-card:hover {
        border-color: rgba(255, 255, 255, 0.14);
        transform: translateY(-2px);
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        opacity: 0;
        transition: opacity 0.2s;
    }

    .stat-card:hover::before {
        opacity: 1;
    }

    .stat-card.green::before {
        background: linear-gradient(90deg, transparent, #63d7a5, transparent);
    }

    .stat-card.blue::before {
        background: linear-gradient(90deg, transparent, #60a5fa, transparent);
    }

    .stat-card.purple::before {
        background: linear-gradient(90deg, transparent, #a78bfa, transparent);
    }

    .stat-card.amber::before {
        background: linear-gradient(90deg, transparent, #f59e0b, transparent);
    }

    .stat-icon {
        width: 34px;
        height: 34px;
        border-radius: 9px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 14px;
    }

    .stat-icon.green {
        background: rgba(99, 215, 165, 0.12);
        color: #63d7a5;
    }

    .stat-icon.blue {
        background: rgba(96, 165, 250, 0.12);
        color: #60a5fa;
    }

    .stat-icon.purple {
        background: rgba(167, 139, 250, 0.12);
        color: #a78bfa;
    }

    .stat-icon.amber {
        background: rgba(245, 158, 11, 0.12);
        color: #f59e0b;
    }

    .stat-value {
        font-size: 28px;
        font-weight: 600;
        color: #fff;
        letter-spacing: -0.02em;
        line-height: 1;
    }

    .stat-label {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.35);
        margin-top: 5px;
        letter-spacing: 0.02em;
    }

    .stat-change {
        font-family: 'DM Mono', monospace;
        font-size: 11px;
        margin-top: 10px;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        padding: 2px 7px;
        border-radius: 5px;
    }

    .stat-change.up {
        background: rgba(99, 215, 165, 0.1);
        color: #63d7a5;
    }

    .stat-change.down {
        background: rgba(239, 68, 68, 0.1);
        color: #f87171;
    }

    .stat-change.neutral {
        background: rgba(255, 255, 255, 0.06);
        color: rgba(255, 255, 255, 0.4);
    }

    /* Two-column section */
    .dash-grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
        margin-top: 24px;
    }

    @media (max-width: 900px) {
        .dash-grid-2 {
            grid-template-columns: 1fr;
        }
    }

    /* Panel card */
    .panel {
        background: #141210;
        border: 1px solid rgba(255, 255, 255, 0.07);
        border-radius: 14px;
        overflow: hidden;
    }

    .panel-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.06);
    }

    .panel-title {
        font-size: 13px;
        font-weight: 600;
        color: #fff;
        letter-spacing: 0.02em;
    }

    .panel-action {
        font-family: 'DM Mono', monospace;
        font-size: 11px;
        color: rgba(99, 215, 165, 0.7);
        text-decoration: none;
        letter-spacing: 0.04em;
        transition: color 0.2s;
    }

    .panel-action:hover {
        color: #63d7a5;
    }

    /* Recent activity list */
    .activity-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.04);
        transition: background 0.15s;
    }

    .activity-item:last-child {
        border-bottom: none;
    }

    .activity-item:hover {
        background: rgba(255, 255, 255, 0.02);
    }

    .activity-avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'DM Mono', monospace;
        font-size: 11px;
        font-weight: 500;
    }

    .activity-info {
        flex: 1;
        min-width: 0;
    }

    .activity-name {
        font-size: 13px;
        font-weight: 500;
        color: rgba(255, 255, 255, 0.8);
    }

    .activity-desc {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.3);
        margin-top: 1px;
    }

    .activity-time {
        font-family: 'DM Mono', monospace;
        font-size: 11px;
        color: rgba(255, 255, 255, 0.2);
        white-space: nowrap;
    }

    /* Department list */
    .dept-item {
        padding: 13px 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.04);
    }

    .dept-item:last-child {
        border-bottom: none;
    }

    .dept-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 7px;
    }

    .dept-name {
        font-size: 13px;
        font-weight: 500;
        color: rgba(255, 255, 255, 0.75);
    }

    .dept-count {
        font-family: 'DM Mono', monospace;
        font-size: 11px;
        color: rgba(255, 255, 255, 0.3);
    }

    .dept-bar-track {
        height: 4px;
        background: rgba(255, 255, 255, 0.06);
        border-radius: 2px;
        overflow: hidden;
    }

    .dept-bar-fill {
        height: 100%;
        border-radius: 2px;
        transition: width 0.8s ease;
    }

    /* Quick actions */
    .quick-actions {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
        padding: 16px;
    }

    .qa-btn {
        display: flex;
        align-items: center;
        gap: 9px;
        padding: 11px 14px;
        border-radius: 9px;
        border: 1px solid rgba(255, 255, 255, 0.08);
        background: rgba(255, 255, 255, 0.03);
        text-decoration: none;
        transition: all 0.18s;
        color: rgba(255, 255, 255, 0.55);
        font-size: 12.5px;
        font-weight: 500;
    }

    .qa-btn:hover {
        background: rgba(255, 255, 255, 0.07);
        border-color: rgba(255, 255, 255, 0.14);
        color: #fff;
    }

    .qa-btn svg {
        flex-shrink: 0;
    }

    /* Animations */
    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(14px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .anim {
        animation: fadeUp 0.5s ease forwards;
        opacity: 0;
    }

    .d1 {
        animation-delay: 0.05s;
    }

    .d2 {
        animation-delay: 0.12s;
    }

    .d3 {
        animation-delay: 0.18s;
    }

    .d4 {
        animation-delay: 0.24s;
    }

    .d5 {
        animation-delay: 0.30s;
    }

    .d6 {
        animation-delay: 0.36s;
    }
</style>

<div class="dash-page">

    <!-- Page header -->
    <div class="anim d1">
        <p class="dash-header-label">Overview</p>
        <h1 class="dash-title">Admin Dashboard</h1>
        <p class="dash-subtitle">
            Welcome back, <span style="color:rgba(255,255,255,0.65);"><?= esc(session()->get('user_name')) ?></span>
            &mdash; here's what's happening today.
        </p>
    </div>

    <!-- Stat cards -->
    <div class="stat-grid anim d2">

        <div class="stat-card green">
            <div class="stat-icon green">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                </svg>
            </div>
            <div class="stat-value">248</div>
            <div class="stat-label">Total Employees</div>
            <span class="stat-change up">↑ 12 this month</span>
        </div>

        <div class="stat-card blue">
            <div class="stat-icon blue">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                    <polyline points="9 22 9 12 15 12 15 22" />
                </svg>
            </div>
            <div class="stat-value">9</div>
            <div class="stat-label">Departments</div>
            <span class="stat-change neutral">No change</span>
        </div>

        <div class="stat-card purple">
            <div class="stat-icon purple">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="18" rx="2" />
                    <line x1="16" y1="2" x2="16" y2="6" />
                    <line x1="8" y1="2" x2="8" y2="6" />
                    <line x1="3" y1="10" x2="21" y2="10" />
                </svg>
            </div>
            <div class="stat-value">18</div>
            <div class="stat-label">Pending Leaves</div>
            <span class="stat-change down">↑ 5 new today</span>
        </div>

        <div class="stat-card amber">
            <div class="stat-icon amber">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12" />
                </svg>
            </div>
            <div class="stat-value">94<span style="font-size:16px;color:rgba(255,255,255,0.3);">%</span></div>
            <div class="stat-label">Attendance Rate</div>
            <span class="stat-change up">↑ 2% vs last week</span>
        </div>

    </div>

    <!-- Two-column panels -->
    <div class="dash-grid-2">

        <!-- Recent Activity -->
        <div class="panel anim d3">
            <div class="panel-header">
                <span class="panel-title">Recent Activity</span>
                <a href="<?= base_url('admin/activity') ?>" class="panel-action">View all →</a>
            </div>

            <div class="activity-item">
                <div class="activity-avatar" style="background:rgba(99,215,165,0.12);color:#63d7a5;">RK</div>
                <div class="activity-info">
                    <div class="activity-name">Rahul Kumar</div>
                    <div class="activity-desc">Submitted leave request</div>
                </div>
                <span class="activity-time">2m ago</span>
            </div>

            <div class="activity-item">
                <div class="activity-avatar" style="background:rgba(96,165,250,0.12);color:#60a5fa;">PS</div>
                <div class="activity-info">
                    <div class="activity-name">Priya Sharma</div>
                    <div class="activity-desc">Joined Engineering dept.</div>
                </div>
                <span class="activity-time">1h ago</span>
            </div>

            <div class="activity-item">
                <div class="activity-avatar" style="background:rgba(167,139,250,0.12);color:#a78bfa;">AM</div>
                <div class="activity-info">
                    <div class="activity-name">Arjun Mehta</div>
                    <div class="activity-desc">Profile updated</div>
                </div>
                <span class="activity-time">3h ago</span>
            </div>

            <div class="activity-item">
                <div class="activity-avatar" style="background:rgba(245,158,11,0.12);color:#f59e0b;">SN</div>
                <div class="activity-info">
                    <div class="activity-name">Sneha Nair</div>
                    <div class="activity-desc">Marked absent — flagged</div>
                </div>
                <span class="activity-time">5h ago</span>
            </div>

            <div class="activity-item">
                <div class="activity-avatar" style="background:rgba(99,215,165,0.12);color:#63d7a5;">VB</div>
                <div class="activity-info">
                    <div class="activity-name">Vikram Bose</div>
                    <div class="activity-desc">Leave approved by HR</div>
                </div>
                <span class="activity-time">Yesterday</span>
            </div>
        </div>

        <!-- Right column: Departments + Quick Actions -->
        <div style="display:flex;flex-direction:column;gap:18px;">

            <!-- Departments -->
            <div class="panel anim d4">
                <div class="panel-header">
                    <span class="panel-title">Departments</span>
                    <a href="<?= base_url('admin/departments') ?>" class="panel-action">Manage →</a>
                </div>

                <div class="dept-item">
                    <div class="dept-row">
                        <span class="dept-name">Engineering</span>
                        <span class="dept-count">72 employees</span>
                    </div>
                    <div class="dept-bar-track">
                        <div class="dept-bar-fill" style="width:72%;background:#60a5fa;"></div>
                    </div>
                </div>

                <div class="dept-item">
                    <div class="dept-row">
                        <span class="dept-name">Human Resources</span>
                        <span class="dept-count">18 employees</span>
                    </div>
                    <div class="dept-bar-track">
                        <div class="dept-bar-fill" style="width:18%;background:#63d7a5;"></div>
                    </div>
                </div>

                <div class="dept-item">
                    <div class="dept-row">
                        <span class="dept-name">Marketing</span>
                        <span class="dept-count">34 employees</span>
                    </div>
                    <div class="dept-bar-track">
                        <div class="dept-bar-fill" style="width:34%;background:#a78bfa;"></div>
                    </div>
                </div>

                <div class="dept-item">
                    <div class="dept-row">
                        <span class="dept-name">Finance</span>
                        <span class="dept-count">26 employees</span>
                    </div>
                    <div class="dept-bar-track">
                        <div class="dept-bar-fill" style="width:26%;background:#f59e0b;"></div>
                    </div>
                </div>

            </div>

            <!-- Quick Actions -->
            <div class="panel anim d5">
                <div class="panel-header">
                    <span class="panel-title">Quick Actions</span>
                </div>
                <div class="quick-actions">
                    <a href="<?= base_url('admin/employees/add') ?>" class="qa-btn">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                            <circle cx="8.5" cy="7" r="4" />
                            <line x1="20" y1="8" x2="20" y2="14" />
                            <line x1="23" y1="11" x2="17" y2="11" />
                        </svg>
                        Add Employee
                    </a>
                    <a href="<?= base_url('admin/departments/add') ?>" class="qa-btn">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        New Department
                    </a>
                    <a href="<?= base_url('admin/leaves') ?>" class="qa-btn">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                            <polyline points="14 2 14 8 20 8" />
                            <line x1="9" y1="13" x2="15" y2="13" />
                        </svg>
                        Review Leaves
                    </a>
                    <a href="<?= base_url('admin/reports') ?>" class="qa-btn">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="20" x2="18" y2="10" />
                            <line x1="12" y1="20" x2="12" y2="4" />
                            <line x1="6" y1="20" x2="6" y2="14" />
                        </svg>
                        View Reports
                    </a>
                </div>
            </div>

        </div>
    </div>

</div>

<?= $this->endSection() ?>