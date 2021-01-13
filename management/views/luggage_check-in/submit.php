<?php

$id = $_GET['id'];

if (isset($_POST['proceed'])) {
    if ($_POST['weight'] > 0) {
        $conn->query("INSERT INTO `luggage` (`ticket_id`, `weight`, `status`) VALUES ( '$id', '" . $_POST['weight'] . "', 'veification')");
    }
    $conn->query("UPDATE `ticket` SET `stage` = 'security_check' WHERE `id` = '$id'");
}

$ticket = $conn->query("SELECT * FROM ticket WHERE id='$id'")->fetch_assoc();

$flight = $conn->query("SELECT * FROM flight WHERE id ='" . $ticket['flight_id'] . "'")->fetch_assoc();
$passenger = json_decode($ticket['passenger_details'], true);

$plane = $conn->query("SELECT * FROM plane WHERE id ='" . $flight['plane_id'] . "'")->fetch_assoc();

$departure = $conn->query("SELECT * FROM airports WHERE id='" . $flight['departure_id'] . "'")->fetch_assoc();
$arrival = $conn->query("SELECT * FROM airports WHERE id='" . $flight['arrival_id'] . "'")->fetch_assoc();

?>
<div class="container">
    <div class="d-flex align-items-center justify-content-between">
        <a class="btn btn-sm btn-dark" href="scan"><i class="fa fa-chevron-left"></i> Back</a>
        <p class="h3 my-3 font-weight-light">Luggage Check-In</p>
    </div>
    <hr>
    <?php if ($ticket['stage'] == 'luggage_check-in') { ?>
        <div class="card mb-3">
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Enter the Weight</label>
                        <input type="number" name="weight" min="0" max="40" class="form-control">
                        <div class="mt-2">
                            <p class="text-muted small m-0">*Enter No Weight if No Luggage</p>
                            <p class="text-muted small m-0">*Max Weight Allowed is 40 kg</p>
                        </div>
                    </div>
                    <div class="form-group text-right m-0">
                        <button name="proceed" class="btn btn-success"><i class="fa fa-check"></i> Proceed</button>
                    </div>
                </form>

            </div>
        </div>
    <?php } else { ?>
        <div class="card mb-3">
            <div class="card-body d-flex align-items-center justify-content-between h3 py-4">
                <p class="mb-0">Current Stage of Ticket : </p>
                <p class="mb-0"><b><?php echo $ticket['stage'] ?></b></p>
            </div>
        </div>
    <?php } ?>

</div>