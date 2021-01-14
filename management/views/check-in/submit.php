<?php

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    if ($_POST['submit'] == 'accept') {
        $conn->query("UPDATE `ticket` SET `stage` = 'luggage_check-in' WHERE `id` = '$id'");
    } else if ($_POST['submit'] == 'reject') {
        $conn->query("UPDATE `ticket` SET `stage` = 'rejected_check-in' WHERE `id` = '$id'");
    }
}

$ticket = $conn->query("SELECT * FROM ticket WHERE id='$id'")->fetch_assoc();

$flight = $conn->query("SELECT * FROM flight WHERE id ='" . $ticket['flight_id'] . "'")->fetch_assoc();
$passenger = json_decode($ticket['passenger_details'], true);

$plane = $conn->query("SELECT * FROM plane WHERE id ='" . $flight['plane_id'] . "'")->fetch_assoc();

$departure = $conn->query("SELECT * FROM airports WHERE id='" . $flight['departure_id'] . "'")->fetch_assoc();
$arrival = $conn->query("SELECT * FROM airports WHERE id='" . $flight['arrival_id'] . "'")->fetch_assoc();

$boarding_allowed = true;

if ($flight['departure_date'] >= date('Y-m-d')) {
    if ($flight['departure_time'] >= date('H:i:s')) {
        $boarding_allowed = false;
    }
}

if ($flight['departure_date'] >= date('Y-m-d')) {
    if (date_format(date_create($flight['departure_date'] . $flight['departure_time']), 'Y-m-d H:i:s') > date('Y-m-d H:i:s')) {
        $boarding_allowed = false;
        $status = badge('success', 'Open');
    } else {
        if (date_format(date_create($flight['arrival_date'] . $flight['arrival_time']), 'Y-m-d H:i:s') < date('Y-m-d H:i:s')) {
            $status = badge('info', 'In Journey');
            $boarding_allowed = true;
        } else {
            $status = badge('dark', 'Close');
            $boarding_allowed = true;
        }
    }
} else {
    $status = badge('dark', 'Close');
    $boarding_allowed = true;
}
?>

<div class="container">
    <div class="d-flex align-items-center justify-content-between">
        <a class="btn btn-sm btn-dark" href="scan"><i class="fa fa-chevron-left"></i> Back</a>
        <p class="h3 my-3 font-weight-light">Customer Check-In</p>
    </div>
    <hr>
    <?php if ($ticket['stage'] == 'check-in') { ?>
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
        <div class="bg-dark mb-3" style="overflow-y:scroll">
            <div class="bg-dark py-3 mx-auto" style="overflow:hidden;width:1180px">
                <div class="card border-0 mx-auto" style="overflow:hidden;width:1150px">

                    <div class="row no-gutters">
                        <div class="col-9 border-right px-0">
                            <div class="rounded card-body text-light" style="background: linear-gradient(45deg, #1e7e34, #4CAF50);">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="h1 font-weight-normal"><?php echo $plane['name'] ?></p>
                                    <p class="h4 font-weight-light">Boarding Pass</p>
                                </div>
                            </div>
                            <div class="row no-gutters">
                                <div class="col-2">
                                    <div class=" d-flex align-items-cnter justify-content-center" style="position: relative;top: -10px;">
                                        <p class="h1 bg-light p-4 rounded-circle shadow">
                                            <i class="fa fa-plane-departure"></i>
                                        </p>
                                    </div>

                                    <div class="bg-light text-center py-3">
                                        <div class="qr_code" data-height="120" data-width="120" data-url="ticket_<?php echo $ticket['id'] ?>"></div>
                                        <p class="m-0 text-center h5">Ticket</p>
                                        <p class="m-0 text-center h6">QR Code</p>
                                    </div>
                                </div>
                                <div class="col-10 border-left">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Passenger Name</label>
                                                    <p class="py-1"><?php echo $passenger['name'] ?></p>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="">Booking Date</label>
                                                    <p class="py-1"><?php echo pdate($ticket['booking_date']) ?></p>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="">Booking Time</label>
                                                    <p class="py-1"><?php echo ptime($ticket['booking_time']) ?></p>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class=" form-group">
                                                    <label for="">From</label>
                                                    <p class=><?php echo $departure['code'] . ' - ' . $departure['name'] . ' - ' . $departure['state'] . ', ' . $departure['city'] ?></p>
                                                </div>
                                                <div class=" form-group">
                                                    <label for="">To</label>
                                                    <p class=><?php echo $arrival['code'] . ' - ' . $arrival['name'] . ' - ' . $arrival['state'] . ', ' . $arrival['city'] ?></p>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Flight</label>
                                                            <p class="py-1"><?php echo $plane['name'] ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Seat</label>
                                                            <p class="py-1"><?php echo $ticket['id'] ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="">Board Till</label>
                                                            <p class="py-1"><?php echo pdate($flight['departure_date']) ?> <?php echo ptime($flight['departure_time']) ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="col-3 pl-0">
                            <div class="rounded card-body text-light" style="background: linear-gradient(45deg, #1e7e34, #4CAF50);">

                                <div class="text-right">
                                    <p class="h5 font-weight-light">Boarding Pass</p>
                                    <p class="h5 m-0">Indigo</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group m-1">
                                            <label class="m-0" for="">Passenger Name</label>
                                            <p class="small py-1"><?php echo $passenger['name'] ?></p>
                                        </div>
                                        <div class="form-group m-1">
                                            <label class="m-0" for="">From</label>
                                            <p class="small py-1"><?php echo $departure['code'] . ' - ' . $departure['name'] . ' - ' . $departure['state'] . ', ' . $departure['city'] ?></p>
                                        </div>
                                        <div class="form-group m-1">
                                            <label class="m-0" for="">To</label>
                                            <p class="small py-1"><?php echo $arrival['code'] . ' - ' . $arrival['name'] . ' - ' . $arrival['state'] . ', ' . $arrival['city'] ?></p>

                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group m-1">
                                            <label class="m-0" for="">Booking Date</label>
                                            <p class="small py-1"><?php echo pdate($ticket['booking_date']) ?> <?php echo ptime($ticket['booking_time']) ?></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group m-1">
                                            <label class="m-0" for="">Flight</label>
                                            <p class="small py-1"><?php echo $plane['name'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="p-1 text-light" style="background: linear-gradient(45deg, #1e7e34, #4CAF50);">
                    </div>
                </div>
            </div>

        </div>
        <?php if (!$boarding_allowed) { ?>
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" class="d-flex align-items-center justify-content-between">
                        <button name="submit" value="reject" class="btn btn-danger"><i class="fa fa-times"></i> Reject</button>
                        <button name="submit" value="accept" class="btn btn-success"><i class="fa fa-check"></i> Accept</button>
                    </form>
                </div>
            </div>
        <?php } else { ?>
            <div class="card mb-3">
                <div class="card-body d-flex align-items-center justify-content-between h3 py-4">
                    <p class="mb-0">Sorry This Flight is No More Available </p>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <div class="card mb-3">
            <div class="card-body d-flex align-items-center justify-content-between h3 py-4">
                <p class="mb-0">Current Stage of Ticket : </p>
                <p class="mb-0"><b><?php echo $ticket['stage'] ?></b></p>
            </div>
        </div>
    <?php } ?>

</div>