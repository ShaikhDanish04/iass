<?php $id = $_GET['id'] ?>

<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-body border-bottom">
            <div class="d-flex align-items-center justify-content-between">
                <button class="btn btn-sm btn-dark" onclick="window.history.back();"><i class="fa fa-chevron-left"></i> Back</button>
                <p class="h5 m-0 "><i class="fa fa-list-alt"></i> List Tickets</p>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table data-table">
                    <thead class="text-center">
                        <th>Sr No.</th>
                        <th>Passenger</th>
                        <th>Booked On</th>
                        <th>Booked By</th>
                        <th>QR Code</th>
                        <th>Stage</th>

                        <th>Action</th>
                    </thead>
                    <tbody class="text-center">
                        <?php

                        $result = $conn->query("SELECT * FROM ticket WHERE flight_id='$id' ORDER BY id DESC");
                        $count = 0;
                        while ($row = $result->fetch_assoc()) {
                            $customer = $conn->query("SELECT * FROM customer_login WHERE id='" . $row['customer_id'] . "'")->fetch_assoc();
                            $passenger = json_decode($row['passenger_details'], true);
                            // print_r($passenger);

                            $count++;
                            echo '' .
                                '<tr>' .
                                '   <td>' . $count . '</td>' .
                                '   <td>' .
                                '       <p class="font-weight-bold">' . $passenger['name'] . '</p>' .
                                '       <p class="">' . $row['passenger_passport_number'] . '</p>' .
                                '   </td>' .
                                '   <td>' .
                                '       <p class="font-weight-bold">' . pdate($row['booking_date']) . '</p>' .
                                '       <p class="small">' . ptime($row['booking_time']) . '</p>' .
                                '   </td>' .
                                '   <td>' .
                                '       <p class="font-weight-bold">' . $customer['username'] . '</p>' .
                                '       <p class="small">' . $customer['email'] . '</p>' .
                                '       <p class="font-italic">' . $customer['mobile'] . '</p>' .
                                '   </td>' .
                                '   <td><span class="qr_code" data-height="110" data-width="110" data-url="ticket_' . $row['id'] . '"></span></td>' .
                                '   <td>' . $row['stage'] . '</td>' .
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