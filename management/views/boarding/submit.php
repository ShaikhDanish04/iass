<?php

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $conn->query("UPDATE `ticket` SET `stage` = 'onboard' WHERE `id` = '$id'");
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
        <p class="h3 my-3 font-weight-light">Boarding Check</p>
    </div>
    <hr>
    <?php if ($ticket['stage'] == 'boarding') { ?>
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <p class="h3">Passenger Details</p>
                        <hr>
                        <div class="row p-md-3">
                            <div class="col-md-4 form-group ">
                                <label for="">Name of Passenger</label>
                                <p class="py-1"><?php echo $passenger['name'] ?></p>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="">Date of Birth</label>
                                <p class="py-1"><?php echo pdate($passenger['dob']) ?></p>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="">Gender</label>
                                <p class="py-1"><?php echo $passenger['gender'] ?></p>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="">Contact</label>
                                <p class="py-1"><?php echo $passenger['contact'] ?></p>
                            </div>
                            <div class="col-md-8 form-group">
                                <label for="">Email</label>
                                <p class="py-1"><?php echo $passenger['email'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <p class="h3">Passport Details</p>
                        <hr>
                        <div class="row p-md-3">
                            <div class="col-md-12 form-group">
                                <label for="">Passport Number</label>
                                <p class="py-1"><?php echo $ticket['passenger_passport_number'] ?></p>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="">Date of Issue</label>
                                <p class="py-1"><?php echo pdate($passenger['doi']) ?></p>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="">Date of Expiry</label>
                                <p class="py-1"><?php echo pdate($passenger['doe']) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="" method="post" class="d-flex align-items-center justify-content-end">
                    <button name="submit" class="btn btn-success"><i class="fa fa-plane"></i> Go Onboard</button>
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