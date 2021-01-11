<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-body border-bottom">
            <div class="d-flex align-items-center justify-content-between">
                <p class="h5 m-0 "><i class="fa fa-list-alt"></i> List Planes</p>
                <a href="add" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table data-table">
                    <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Capacity</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php

                        $result = $conn->query("SELECT * FROM plane");
                        while ($row = $result->fetch_assoc()) {
                            echo '' .
                                '<tr>' .
                                '    <td>' . $row['id'] . '</td>' .
                                '    <td>' . $row['name'] . '</td>' .
                                '    <td>' . $row['capacity'] . '</td>' .
                                '    <td><a href="edit?id' . $row['id'] . '" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a></td>' .
                                '</tr>';
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>