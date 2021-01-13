<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-body border-bottom">
            <div class="d-flex align-items-center justify-content-between">
                <p class="h5 m-0 "><i class="fa fa-list-alt"></i> List Luggage</p>
                <!-- <a href="add" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add</a> -->
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table data-table text-center">
                    <thead>
                        <th>Sr No</th>
                        <th>Passenger</th>
                        <th>Weight</th>
                        <th>Stage</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php

                        $result = $conn->query("SELECT * FROM luggage ORDER BY id DESC");
                        $count = 0;
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['ticket_id'];
                            $ticket = $conn->query("SELECT * FROM ticket WHERE id='$id'")->fetch_assoc();
                            $passenger = json_decode($ticket['passenger_details'], true);

                            echo '' .
                                '<tr>' .
                                '    <td>' . ++$count . '</td>' .
                                '   <td class="text-center">' .
                                '       <p class="font-weight-bold">' . $passenger['name'] . '</p>' .
                                '       <p class="">' . $ticket['passenger_passport_number'] . '</p>' .
                                '   </td>' .
                                '    <td>' . $row['weight'] . ' kg</td>' .
                                '    <td>' . $row['status'] . '</td>' .
                                '    <td><a href="view?id=' . $row['id'] . '" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</a></td>' .
                                '</tr>';
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>