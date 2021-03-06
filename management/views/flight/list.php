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
                        <th>QR Code</th>
                        <th class="text-nowrap">Flight Status</th>
                        <th class="text-nowrap">Tickets Booked</th>

                        <th>Action</th>
                    </thead>
                    <tbody class="text-center">
                        <?php

                        $status = '';

                        $count = 0;
                        $result = $conn->query("SELECT * FROM flight ORDER BY id DESC");
                        while ($row = $result->fetch_assoc()) {
                            if ($row['departure_date'] >= date('Y-m-d')) {
                                if (date_format(date_create($row['departure_date'] . $row['departure_time']), 'Y-m-d H:i:s') > date('Y-m-d H:i:s')) {
                                    $status = badge('success', 'Open');
                                } else {
                                    if (date_format(date_create($row['arrival_date'] . $row['arrival_time']), 'Y-m-d H:i:s') < date('Y-m-d H:i:s')) {
                                        $status = badge('info', 'In Journey');
                                    } else {
                                        $status = badge('dark', 'Close');
                                    }
                                }
                            } else {
                                $status = badge('dark', 'Close');
                            }

                            $plane = $conn->query("SELECT * FROM plane WHERE id='" . $row['plane_id'] . "'")->fetch_assoc();
                            $pilot = $conn->query("SELECT * FROM pilot WHERE id='" . $row['pilot_id'] . "'")->fetch_assoc();

                            $departure = $conn->query("SELECT * FROM airports WHERE id='" . $row['departure_id'] . "'")->fetch_assoc();
                            $arrival = $conn->query("SELECT * FROM airports WHERE id='" . $row['arrival_id'] . "'")->fetch_assoc();

                            $ticket = $conn->query("SELECT * FROM ticket WHERE flight_id='" . $row['id'] . "' ORDER BY seat_number DESC LIMIT 1")->fetch_assoc();
                            if (!($ticket > 0)) $ticket['seat_number'] = 0;

                            echo '' .
                                '<tr>' .
                                '    <td>' . ++$count . '</td>' .
                                '    <td>' . $plane['name'] . '</td>' .
                                '    <td>' . $pilot['name'] . '</td>' .
                                '    <td class="text-center">' .
                                '       <p class="">' . $departure['city'] . '</p>'  .
                                '       <p class="h3">' . $departure['code'] . '</p>'  .
                                '       <p class="small">' . $departure['state'] . '</p>'  .
                                '       <p class="text-nowrap m-0">' . pdate($row['departure_date']) . ' ' . ptime($row['departure_time']) . ' IST</p>' .
                                '    </td>' .
                                '    <td class="text-center">' .
                                '       <p class="">' . $arrival['city'] . '</p>'  .
                                '       <p class="h3">' . $arrival['code'] . '</p>'  .
                                '       <p class="small">' . $arrival['state'] . '</p>'  .
                                '       <p class="text-nowrap m-0">' . pdate($row['arrival_date']) . ' ' . ptime($row['arrival_time']) . ' IST</p>' .
                                '    </td>' .
                                '    <td><span class="qr_code" data-height="110" data-width="110" data-url=flight_' . $row['id'] . '></span></td>' .
                                '    <td>' . $status . '</td>' .
                                '    <td class="text-center">' .  badge('light',  '<span class="h5"><span class="font-weight-light">' . $ticket['seat_number'] . '</span> / ' . $plane['capacity'] . '</span>') . '</td>' .
                                '    <td class="text-nowrap">' .
                                '       <a href="tickets?id=' . $row['id'] . '" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</a>' .
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