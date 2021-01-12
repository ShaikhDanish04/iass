<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-body border-bottom">
            <div class="d-flex align-items-center justify-content-between">
                <a class="btn btn-sm btn-dark" href="list"><i class="fa fa-chevron-left"></i> Back</a>
                <p class="h5 m-0 "><i class="fa fa-list-alt"></i> List Tickets</p>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table data-table">
                    <thead class="text-center">
                        <th>Id</th>
                        <th>Passport Number</th>
                        <th>Booking Datetime</th>
                        <th>QR Code</th>

                        <th>Action</th>
                    </thead>
                    <tbody class="text-center">
                        <?php

                        $result = $conn->query("SELECT * FROM ticket");
                        while ($row = $result->fetch_assoc()) {

                            echo '' .
                                '<tr>' .
                                '   <td>' . $row['id'] . '</td>' .
                                '   <td>' . $row['passenger_passport_number'] . '</td>' .
                                '   <td>' . pdate($row['booking_date']) . ' ' . ptime($row['booking_time']) . '</td>' .
                                '   <td><span class="qr_code" data-url="' . $row['id'] . '"></span></td>' .
                                '   <td class="text-nowrap">' .
                                '      <a href="viewticket?id' . $row['id'] . '" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View Ticket</a>' .
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