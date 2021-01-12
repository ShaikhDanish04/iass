<hr>
<?php
include('../connect.php');
$departure = $_POST['departure'];
$arrival = $_POST['arrival'];

if (empty($departure) || empty($arrival) || empty($arrival)) {
    echo '<p class="text-center h1 font-weight-light my-5">Please Select Proper Options</p>';
    exit;
}
if ($departure == $arrival) {
    echo '<p class="text-center h1 font-weight-light my-5">Departure and Arrival Cannot Be Same</p>';
    exit;
}
?>

<div class="card-body">
    <div class="table-responsive rounded">
        <table class="table table-bordered shadow">
            <thead class="text-center thead-dark">
                <th>Sr No</th>
                <th>From</th>
                <th>To</th>
                <th>Timing</th>
                <th>Seats Available</th>
                <th>Fare</th>
                <th></th>
            </thead>
            <tbody class="text-center">
                <?php


                $result = $conn->query("SELECT * FROM flight WHERE departure_id='$departure' AND arrival_id='$arrival' AND departure_date ='$date'");
                if ($result->num_rows > 0) {

                    while ($row  = $result->fetch_assoc()) {

                        $plane = $conn->query("SELECT * FROM plane WHERE id='" . $row['plane_id'] . "'")->fetch_assoc();
                        $pilot = $conn->query("SELECT * FROM pilot WHERE id='" . $row['pilot_id'] . "'")->fetch_assoc();

                        $departure = $conn->query("SELECT * FROM airports WHERE id='" . $row['departure_id'] . "'")->fetch_assoc();
                        $arrival = $conn->query("SELECT * FROM airports WHERE id='" . $row['arrival_id'] . "'")->fetch_assoc();
                        echo '' .
                            '<tr>' .
                            '    <td>' . $row['id'] . '</td>' .
                            '    <td class="text-center">' .
                            '       <p class=" m-0">' . $departure['city'] . '</p>'  .
                            '       <p class="h3">' . $departure['code'] . '</p>'  .
                            '       <p class="small">' . $departure['state'] . '</p>'  .
                            '    </td>' .
                            '    <td class="text-center">' .
                            '       <p class=" m-0">' . $arrival['city'] . '</p>'  .
                            '       <p class="h3">' . $arrival['code'] . '</p>'  .
                            '       <p class="small">' . $arrival['state'] . '</p>'  .
                            '    </td>' .
                            '    <td> ' .
                            '       <p>' . date_format(date_create($row['departure_time']), 'h:i A') . ' - ' . date_format(date_create($row['arrival_time']), 'h:i A') . '</p>' .
                            '    </td>' .
                            '    <td class="text-center">3 / ' . $plane['capacity'] . '</td>' .
                            '    <td class="text-nowrap">' .
                            '       <p>Economy Class - ₹' . $row['economy_fare'] . '</p>' .
                            '       <p>Business Class - ₹' . $row['business_fare'] . '</p>' .
                            '    </td>' .
                            '    <td class="text-nowrap">' .
                            '       <a href="book?id=' . $row['id'] . '" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</a>' .
                            '    </td>' .
                            '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="7"><p class="h3 my-3 font-weight-normal">No Flights Found</p></td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>