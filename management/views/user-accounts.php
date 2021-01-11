<div class="container">

    <p class="display-4 text-center mt-4">User Accounts</p>

    <?php
    if (isset($_POST['admin_access'])) {
        $username = $_POST['username'];
        $admin_access = $_POST['admin_access'];

        $update_time = date('Y-m-d H-i-s');
        $conn->query("UPDATE `user_login` SET update_time = '$update_time',`admin_access` = '$admin_access' WHERE `username` = '$username';");
        echo "<script>location.reload();</script>";
    }
    ?>
    <div class="card">
        <div class="card-body">


            <table id="users_table" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>Username</th>
                        <th>Update Time</th>
                        <th>Admin Access</th>
                        <th>Password</th>
                        <th>Account</th>
                    </tr>
                </thead>
                <tbody>


                    <?php

                    $user_result = $conn->query("SELECT * FROM user_login");

                    while ($users = $user_result->fetch_assoc()) {

                        echo '<tr><form action="" method="post"><input type="hidden" name="username" value="' . $users['username'] . '">';
                        echo '<td></td>';
                        echo '<td style="white-space: nowrap" class="font-weight-bold">' . $users['username'] . '</td>';
                        echo '<td style="white-space: nowrap">' . $users['update_time'] . '</td>';
                        echo '<td style="white-space: nowrap">' .
                            '   <button name="admin_access" value="1" class="btn btn-secondary ' . (($users['admin_access']) ? 'btn-danger' : '') . ' btn-sm">Granted</button>' .
                            '    / ' .
                            '   <button name="admin_access" value="0" class="btn btn-secondary ' . (($users['admin_access']) ? '' : 'btn-success') . ' btn-sm">Revoked</button>' .
                            '</td>';
                        echo '<td style="white-space: nowrap"><button class="btn btn-warning btn-sm" disabled>Reset Password</button></td>';
                        echo '<td style="white-space: nowrap"><button class="btn btn-danger btn-sm" disabled>Delete</button></td>';

                        echo "</form></tr>";
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var usersTable = $('#users_table').DataTable({
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": 0
            }],
            "order": [
                [2, 'dec']
            ]
        });

        usersTable.on('order.dt search.dt', function() {
            usersTable.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

        $('table').parent().addClass('table-responsive');
    });
</script>