<?php
if (!isset($_SESSION['username'])) {
    include('login.php');
    exit;
}
?>

<?php
$response = '';
$id = $_GET['id'];


$flight = $conn->query("SELECT * FROM flight WHERE id='$id'")->fetch_assoc();

$plane = $conn->query("SELECT * FROM plane WHERE id='" . $flight['plane_id'] . "'")->fetch_assoc();
$pilot = $conn->query("SELECT * FROM pilot WHERE id='" . $flight['pilot_id'] . "'")->fetch_assoc();

$departure = $conn->query("SELECT * FROM airports WHERE id='" . $flight['departure_id'] . "'")->fetch_assoc();
$arrival = $conn->query("SELECT * FROM airports WHERE id='" . $flight['arrival_id'] . "'")->fetch_assoc();

$ticket = $conn->query("SELECT * FROM ticket WHERE flight_id='$id' ORDER BY seat_number DESC LIMIT 1")->fetch_assoc();
if (!($ticket > 0)) $ticket['seat_number'] = 0;


if (isset($_POST['checkout'])) {
    $passenger = json_encode($_POST['passenger']);
    $passenger_passport_number = $_POST['passenger_passport_number'];
    $customer_id = $_SESSION['id'];
    $flight_id = $_GET['id'];
    $booking_date = date('Y-m-d');
    $booking_time = date('H:i:s');
    $seat_number = ($ticket['seat_number'] + 1);


    if ($plane['capacity'] == $seat_number) {
        $response = alert('warning', 'Sorry !!! No More Seats Available');
    } else {
        $result = $conn->query("INSERT INTO `ticket` (`flight_id`, `customer_id`, `passenger_passport_number`, `passenger_details`, `seat_number`, `booking_date`, `booking_time`) 
                                        VALUES ('$flight_id', '$customer_id', '$passenger_passport_number', '$passenger', '$seat_number', '$booking_date', '$booking_time')");

        if ($result === TRUE) {
            $response = alert('success', 'Transaction Successfull !!! Your Ticket is Booked Check Your Account');
        } else {
            $response = alert('danger', 'Failed !!! Try Again');
        }
    }
}
$ticket = $conn->query("SELECT * FROM ticket WHERE flight_id='$id' ORDER BY seat_number DESC LIMIT 1")->fetch_assoc();
if (!($ticket > 0)) $ticket['seat_number'] = 0;

?>

<div class="container my-3">

    <div class="d-flex align-items-center justify-content-between">
        <button onclick="window.history.back();" class="btn btn-dark"><i class="fa fa-chevron-left"></i> Back</button>
        <p class="text-center h1 font-weight-light my-3">Passenger Details</p>
    </div>
    <?php echo $response ?>
    <form action="" method="post">
        <div class="row">
            <div class="col-lg-5">

                <div class="card mb-3">
                    <div class="card-body">
                        <p class="h2 font-weight-light text-center my-4"><?php echo $plane['name'] ?></p>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="col-5">
                                        <p class="h5"><?php echo date_format(date_create($flight['departure_date']), 'd-M Y') ?></p>
                                        <p class="h6"><?php echo date_format(date_create($flight['departure_time']), 'h:i A') ?></p>
                                        <div class="badge badge-dark w-100 py-3 mb-3">
                                            <p class="m-0 font-weight-normal h6"><?php echo $departure['city'] ?></p>
                                            <p class="h3"><?php echo $departure['code'] ?></p>
                                            <p class="m-0 font-weight-normal"><?php echo $departure['state'] ?></p>
                                        </div>
                                        <p class="small"><?php echo $departure['name'] ?></p>
                                    </div>
                                    <div class="col-2 d-flex align-items-center justify-content-center"><i class="fa fa-exchange-alt"></i></div>
                                    <div class="col-5">
                                        <p class="h5"><?php echo date_format(date_create($flight['arrival_date']), 'd-M Y') ?></p>
                                        <p class="h5"><?php echo date_format(date_create($flight['arrival_time']), 'h:i A') ?></p>
                                        <div class="badge badge-dark w-100 py-3 mb-3">
                                            <p class="m-0 font-weight-normal h6"><?php echo $arrival['city'] ?></p>
                                            <p class="h3"><?php echo $arrival['code'] ?></p>
                                            <p class="m-0 font-weight-normal"><?php echo $arrival['state'] ?></p>
                                        </div>
                                        <p class="small"><?php echo $arrival['name'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center my-4 justify-content-between">
                            <p class="m-0 h3 font-weight-light">Seats Available :</p>
                            <p class="m-0 h3">
                                <?php echo $plane['capacity'] - $ticket['seat_number'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">

                <div class="card mb-3">
                    <div class="card-body">
                        <p class="h3">Passenger Details</p>
                        <div class="row">
                            <div class="col-xl-12 form-group">
                                <label for="">Name of Passenger</label>
                                <input class="form-control" name="passenger[name]" required>
                            </div>
                            <div class="col-md-4 col-xl-6 form-group">
                                <label for="">Date of Birth</label>
                                <input type="date" class="form-control" name="passenger[dob]" required>
                            </div>
                            <div class="col-md-4 col-xl-6 form-group">
                                <label for="">Gender</label>
                                <select class="form-control" name="passenger[gender]" required>
                                    <option value="">--- Select ---</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-xl-6 form-group">
                                <label for="">Contact</label>
                                <input type="tel" pattern="^\d{10}$" class="form-control" name="passenger[contact]" required>
                            </div>
                            <div class="col-xl-6 form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="passenger[email]" required>
                            </div>
                        </div>
                        <hr>
                        <p class="h3">Passport Details</p>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="">Passport Number</label>
                                <input class="form-control" name="passenger_passport_number" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="">Date of Issue</label>
                                <input type="date" class="form-control" name="passenger[doi]" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="">Date of Expiry</label>
                                <input type="date" class="form-control" name="passenger[doe]" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <p class="m-0 h3 font-weight-light">Total Cost : <b>₹<?php echo $flight['economy_fare'] ?></b></p>
                    <button class="btn btn-success" name="checkout"><i class="fa fa-plane"></i> Checkout</button>
                </div>

            </div>
        </div>
    </form>
</div>