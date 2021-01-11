<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-body border-bottom">
            <div class="d-flex align-items-center justify-content-between">
                <p class="h5 m-0 "><i class="fa fa-list-alt"></i> List Flights</p>
                <a href="add" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table data-table">
                    <thead class="text-center">
                        <th>Id</th>
                        <th>Plane</th>
                        <th class="text-nowrap">Pilot Name</th>
                        <th>Departure</th>
                        <th>Arrival</th>
                        <th class="text-nowrap">Tickets Booked</th>

                        <th>Action</th>
                    </thead>
                    <tbody class="text-center">
                        <?php

                        $result = $conn->query("SELECT * FROM flight");
                        while ($row = $result->fetch_assoc()) {

                            $plane = $conn->query("SELECT * FROM plane WHERE id='" . $row['plane_id'] . "'")->fetch_assoc();
                            $pilot = $conn->query("SELECT * FROM pilot WHERE id='" . $row['pilot_id'] . "'")->fetch_assoc();

                            $departure = $conn->query("SELECT * FROM airports WHERE id='" . $row['departure_id'] . "'")->fetch_assoc();
                            $arrival = $conn->query("SELECT * FROM airports WHERE id='" . $row['arrival_id'] . "'")->fetch_assoc();
                            echo '' .
                                '<tr>' .
                                '    <td>' . $row['id'] . '</td>' .
                                '    <td>' . $plane['name'] . '</td>' .
                                '    <td>' . $pilot['name'] . '</td>' .
                                '    <td class="text-center">' .
                                '       <p class="h3">' . $departure['code'] . '</p>'  .
                                '       <p class="small">' . $departure['state'] . '</p>'  .
                                '       <p>' . pdate($row['departure_date']) . ' ' . ptime($row['departure_time']) . ' IST</p>' .
                                '    </td>' .
                                '    <td class="text-center">' .
                                '       <p class="h3">' . $arrival['code'] . '</p>'  .
                                '       <p class="small">' . $arrival['state'] . '</p>'  .
                                '       <p>' . pdate($row['arrival_date']) . ' ' . ptime($row['arrival_time']) . ' IST</p>' .
                                '    </td>' .
                                '    <td class="text-center">3 / ' . $plane['capacity'] . '</td>' .
                                '    <td class="text-nowrap">' .
                                '       <a href="edit?id' . $row['id'] . '" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>' .
                                '       <a href="view?id' . $row['id'] . '" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</a>' .
                                '    </td>' .
                                '</tr>';
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>