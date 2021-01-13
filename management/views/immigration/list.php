<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-body border-bottom">
            <div class="d-flex align-items-center justify-content-between">
                <p class="h5 m-0 "><i class="fa fa-list-alt"></i> List Immigration</p>
                <!-- <a href="add" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add</a> -->
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table data-table text-center">
                    <thead>
                        <th>Sr No</th>
                        <th>Passport Number</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Time</th>
                    </thead>
                    <tbody>
                        <?php

                        $result = $conn->query("SELECT * FROM immigration ORDER BY id DESC");
                        $count = 0;
                        while ($row = $result->fetch_assoc()) {
                            // $id = $row['ticket_id'];
                            $airport = $conn->query("SELECT * FROM airports WHERE id='" . $row['location'] . "'")->fetch_assoc();
                            // $passenger = json_decode($ticket['passenger_details'], true);

                            echo '' .
                                '<tr>' .
                                '    <td>' . ++$count . '</td>' .
                                '    <td>' . $row['passport_number'] . '</td>' .
                                '    <td>' . $airport['code'] . '-' . $airport['name'] . '</td>' .
                                '    <td>' . pdate($row['datetime']) . '</td>' .
                                '    <td>' . ptime($row['datetime']) . '</td>' .
                                '</tr>';
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>