<div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body text-center">
                    <p class="h3"><?php echo $conn->query("SELECT * FROM flight ")->num_rows ?></p>
                    <p class="m-0">Total Flight</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body text-center">
                    <p class="h3"><?php echo $conn->query("SELECT * FROM ticket ")->num_rows ?></p>
                    <p class="m-0">Total Ticket</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body text-center">
                    <p class="h3"><?php echo $conn->query("SELECT * FROM pilot ")->num_rows ?></p>
                    <p class="m-0">Total Pilot</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body text-center">
                    <p class="h3"><?php echo $conn->query("SELECT * FROM plane ")->num_rows ?></p>
                    <p class="m-0">Total Plane</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body border-bottom">
            <div class="d-flex align-items-center justify-content-between">
                <!-- <a class="btn btn-sm btn-dark" href="list"><i class="fa fa-chevron-left"></i> Back</a> -->
                <!-- <p class="h5 m-0 text-nowrap mr-1"> <i class="fa fa-search"></i> Search Flights</p> -->
                <input type="text" placeholder="Search Flight" class="form-control">
                <button class="btn btn-primary ml-2"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body border-bottom">
            <div class="d-flex align-items-center justify-content-between">
                <p class="h5 m-0 "><i class="fa fa-list-alt"></i> Flight Quick Access</p>
                <div>
                    <input type="date" value="" class="form-control">
                </div>
                <!-- <a href="add" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add</a> -->
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
                        <th class="text-nowrap">Tickets Booked</th>

                        <th>Action</th>
                    </thead>
                    <tbody class="text-center">
                        <?php

                        $count = 0;
                        $result = $conn->query("SELECT * FROM flight ORDER BY id desc");
                        while ($row = $result->fetch_assoc()) {

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
                                '       <p class="h3">' . $departure['code'] . '</p>'  .
                                '       <p class="small">' . $departure['state'] . '</p>'  .
                                '       <p class="text-nowrap">' . pdate($row['departure_date']) . ' ' . ptime($row['departure_time']) . ' IST</p>' .
                                '    </td>' .
                                '    <td class="text-center">' .
                                '       <p class="h3">' . $arrival['code'] . '</p>'  .
                                '       <p class="small">' . $arrival['state'] . '</p>'  .
                                '       <p class="text-nowrap">' . pdate($row['arrival_date']) . ' ' . ptime($row['arrival_time']) . ' IST</p>' .
                                '    </td>' .
                                '    <td><span class="qr_code" data-url=flight_' . $row['id'] . '></span></td>' .
                                '    <td class="text-center">' .  badge('light',  '<span class="h5"><span class="font-weight-light">' . $ticket['seat_number'] . '</span> / ' . $plane['capacity'] . '</span>') . '</td>' .
                                '    <td class="text-nowrap">' .
                                // '       <a href="edit?id=' . $row['id'] . '" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>' .
                                '       <a href="flight/tickets?id=' . $row['id'] . '" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</a>' .
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