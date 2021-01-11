<?php
$response = '';
if (isset($_POST['delete_record'])) {

    $id = $_POST['delete_record'];

    if ($conn->query("DELETE FROM `record` WHERE id='$id'")) {

        $response =  '' .
            '<div class="alert alert-success alert-dismissible fade show" role="alert">' .
            '    <button type="button" class="close" data-dismiss="alert" aria-label="Close">' .
            '        <span aria-hidden="true">&times;</span>' .
            '        <span class="sr-only">Close</span>' .
            '    </button>' .
            '    <strong>Successfull !!! </strong> Your Selected Record Is Deleted.' .
            '</div>';
    } else {

        $response =  '' .
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">' .
            '    <button type="button" class="close" data-dismiss="alert" aria-label="Close">' .
            '        <span aria-hidden="true">&times;</span>' .
            '        <span class="sr-only">Close</span>' .
            '    </button>' .
            '    <strong>Error !!! </strong> Record Not Deleted.' .
            '</div>';
    }
}
?>

<div class="container">

    <p class="display-4 text-center mt-4">List Record</p>

    <?php echo $response ?>

    <div class="card">
        <div class="card-body">

            <form method="post" onsubmit="return confirm('Are Your Sure You Want To Delete The Record ?')">

                <table id="list_record" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th class="text-center">Number</th>
                            <th>Amount</th>
                            <th>Panna</th>
                            <th>Insert Time</th>
                            <th>By User</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if ($admin_access) $result = $conn->query("SELECT * FROM record");
                        else $result = $conn->query("SELECT * FROM record WHERE `by_user`='$user'");

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td><p class='m-0 number'>" . $row["number"] . "</p></td>";
                                echo "<td><p class='m-0 cost'>" . $row["cost"] . "</p></td>";
                                echo "<td><div class='badge badge-dark p-2'>" . $row["panna"] . "</div></td>";
                                echo "<td>" . datetime($row["datetime"]) . "</td>";
                                echo "<td class='text-capitalize'>" . $row["by_user"] . "</td>";
                                echo "<td class='text-center' style='white-space: nowrap'><button name='delete_record' value='" . $row["id"] . "' class='m-1 btn btn-sm btn-danger' ><i class='fa fa-times'></i> Delete</button></td>";
                                echo "</tr>";
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#list_record').DataTable({
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": 5
            }],
            "order": [
                [4, "desc"]
            ]
        });
        $('table').parent().addClass('table-responsive');

    });
</script>