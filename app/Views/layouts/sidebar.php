<div style="width:200px;float:left;background:#eee;height:100vh;padding:20px;">

    <h3>Menu</h3>

    <?php if (session()->get('user_role') == 'super_admin') : ?>

        <p><a href="#">Admin Dashboard</a></p>
        <p><a href="#">Manage Employees</a></p>
        <p><a href="#">Departments</a></p>

    <?php elseif (session()->get('user_role') == 'hr') : ?>

        <p><a href="#">HR Dashboard</a></p>
        <p><a href="#">Attendance</a></p>

    <?php else : ?>

        <p><a href="#">Employee Dashboard</a></p>
        <p><a href="#">My Profile</a></p>

    <?php endif; ?>

</div>