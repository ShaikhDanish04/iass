<div class="container my-3">

    <div class=" d-flex align-items-center justify-content-center">
        <!-- <a href="index" class="btn btn-dark"><i class="fa fa-chevron-left"></i> Back</a> -->
        <p class="text-center h1 font-weight-light my-3 text-center">My Account</p>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 border-right">
                    <!-- Nav pills -->
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#profile">My Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#booking">Bookings </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9" style="min-height: 80vh;">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="profile">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="">Username</label>
                                        <p class="p-1"><?php echo $_SESSION['username'] ?></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="">Mobile</label>
                                        <p class="p-1"><?php echo $_SESSION['mobile'] ?></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="">Email</label>
                                        <p class="p-1"><?php echo $_SESSION['email'] ?></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="booking">
                            <div class="table-responsive">
                                <table class="table data-table">
                                    <thead class="text-center">
                                        <th>Sr No</th>
                                        <th>Passenger</th>
                                        <th>Booking</th>
                                        <th>Luggage</th>
                                        <th>QR Code</th>
                                        <th>Stage</th>

                                        <th>Action</th>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php


                                        $result = $conn->query("SELECT * FROM ticket WHERE customer_id='" . $_SESSION['id'] . "' ORDER BY id DESC");
                                        $count = 0;
                                        while ($row = $result->fetch_assoc()) {
                                            $customer = $conn->query("SELECT * FROM customer_login WHERE id='" . $row['customer_id'] . "'")->fetch_assoc();
                                            $luggage = $conn->query("SELECT * FROM luggage WHERE ticket_id='" . $row['id'] . "'")->fetch_assoc();

                                            $passenger = json_decode($row['passenger_details'], true);

                                            if ($luggage == '') $luggage['status'] = 'No Luggage';
                                            $count++;
                                            echo '' .
                                                '<tr>' .
                                                '   <td>' . $count . '</td>' .
                                                '   <td>' .
                                                '       <p class="font-weight-bold text-nowrap m-0">' . $passenger['name'] . '</p>' .
                                                '       <p class="">' . $row['passenger_passport_number'] . '</p>' .
                                                '   </td>' .
                                                '   <td>' .
                                                '       <p class="font-weight-bold text-nowrap m-0">' . pdate($row['booking_date']) . '</p>' .
                                                '       <p class="small">' . ptime($row['booking_time']) . '</p>' .
                                                '   </td>' .
                                                '   <td>' . $luggage['status'] . '</td>' .
                                                '   <td><span class="qr_code" data-url="ticket_' . $row['id'] . '"></span></td>' .
                                                '   <td>' . badge('dark', $row['stage']) . '</td>' .
                                                '   <td class="text-nowrap">' .
                                                '      <a href="viewticket?id=' . $row['id'] . '" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View Ticket</a>' .
                                                '   </td>' .
                                                '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>