<?= $this->extend('layouts/hr/main') ?>

<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/admin/css/list.css') ?>">

<div class="dash-page">

    <!-- Header -->
    <div class="anim d1">
        <p class="dash-header-label">Hr Panel</p>
        <h1 class="dash-title">Employee Management</h1>
        <p class="dash-subtitle">View, manage, and organize employee records efficiently.</p>
    </div>

    <!-- Toolbar -->
    <div class="toolbar anim d2">
        <div class="search-wrap">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
            </svg>
            <input
                type="text"
                class="search-input"
                placeholder="Search employees…"
                id="searchInput"
                onkeyup="filterTable()">
        </div>
        <a href="<?= base_url('admin/employees/add') ?>" class="add-btn">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19" />
                <line x1="5" y1="12" x2="19" y2="12" />
            </svg>
            Add Employee
        </a>
    </div>

    <!-- Table -->
    <div class="table-card anim d3">

        <?php if (!empty($employeelist)) : ?>

            <table id="employeeTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Employee</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($employeelist as $row) : ?>
                        <tr>
                            <!-- Serial -->
                            <td class="td-serial"><?= $i++ ?></td>

                            <!-- Name + Email -->
                            <td>
                                <div class="emp-cell">
                                    <div class="emp-avatar av-<?= $i % 5 ?>">
                                        <?= strtoupper(substr($row->name ?? 'U', 0, 2)) ?>
                                    </div>
                                    <div>
                                        <div class="emp-name"><?= esc($row->name) ?></div>
                                        <div class="emp-email"><?= esc($row->email) ?></div>
                                    </div>
                                </div>
                            </td>

                            <!-- Role -->
                            <td>
                                <?php
                                $roleKey = $row->role ?? 'employee';
                                $roleClass = 'role-' . $roleKey;
                                ?>
                                <span class="role-badge <?= $roleClass ?>">
                                    <?= esc($roleKey) ?>
                                </span>
                            </td>

                            <!-- Status toggle -->
                            <td>
                                <?php
                                $isActive  = ($row->status ?? 'active') === 'active';
                                $statusClass = $isActive ? 'active' : 'inactive';
                                $statusLabel = $isActive ? 'Active' : 'Inactive';
                                ?>
                                <a href="javascript:void(0)" class="status-toggle <?= $statusClass ?>">
                                    <span class="status-dot"></span>
                                    <?= $statusLabel ?>
                                </a>
                            </td>

                            <!-- Actions -->
                            <td>
                                <div class="action-cell">
                                    <a href="<?= base_url('admin/employees/edit/' . $row->id) ?>" class="btn-edit">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                        </svg>
                                        Edit
                                    </a>
                                    <a href="<?= base_url('admin/employees/delete/' . $row->id) ?>"
                                        class="btn-delete"
                                        onclick="return confirm('Delete <?= esc($row->name) ?>? This cannot be undone.')">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="3 6 5 6 21 6" />
                                            <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                                            <path d="M10 11v6" />
                                            <path d="M14 11v6" />
                                            <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2" />
                                        </svg>
                                        Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Footer count -->
            <div class="table-footer">
                <span class="table-count" id="rowCount">
                    <?= count($employeelist) ?> employee<?= count($employeelist) !== 1 ? 's' : '' ?>
                </span>
            </div>

        <?php else : ?>

            <!-- Empty state -->
            <div class="empty-state">
                <div class="empty-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                </div>
                <div class="empty-title">No employees found</div>
                <div class="empty-sub">Add your first employee to get started.</div>
            </div>

        <?php endif; ?>

    </div>
</div>

<script>
    function filterTable() {
        const query = document.getElementById('searchInput').value.toLowerCase();
        const rows = document.querySelectorAll('#employeeTable tbody tr');
        let visible = 0;
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            const show = text.includes(query);
            row.style.display = show ? '' : 'none';
            if (show) visible++;
        });
        const counter = document.getElementById('rowCount');
        if (counter) counter.textContent = visible + ' employee' + (visible !== 1 ? 's' : '');
    }
</script>
<?= $this->endSection() ?>