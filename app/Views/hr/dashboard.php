<?= $this->extend('layouts/hr/main') ?>

<?= $this->section('content') ?>

<div class="dash-page">

    <!-- Page header -->
    <div class="anim d1">
        <p class="dash-header-label">Overview</p>
        <h1 class="dash-title">HR Dashboard</h1>
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