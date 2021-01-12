<?php
$id = $_GET['id'];

$flight = $conn->query("SELECT * FROM flight WHERE id='$id'")->fetch_assoc();

$plane = $conn->query("SELECT * FROM plane WHERE id='" . $flight['plane_id'] . "'")->fetch_assoc();
$pilot = $conn->query("SELECT * FROM pilot WHERE id='" . $flight['pilot_id'] . "'")->fetch_assoc();

$departure = $conn->query("SELECT * FROM airports WHERE id='" . $flight['departure_id'] . "'")->fetch_assoc();
$arrival = $conn->query("SELECT * FROM airports WHERE id='" . $flight['arrival_id'] . "'")->fetch_assoc();

?>
<div class="container my-3" style="max-width:500px">

    <div class="d-flex align-items-center justify-content-between">
        <a href="index" class="btn btn-dark"><i class="fa fa-chevron-left"></i> Back</a>
        <p class="text-center h1 font-weight-light my-3">Flight Details</p>
    </div>

    <div class="card mx-auto">
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

            <p><i class=""></i>Check-in Baggage:<strong class="font-weight-bold">&nbsp;15kg</strong></span><span><strong class="font-weight-bold"> per person</strong>&nbsp;(1 piece only). For Double or MultiSeats bookings, extra 10 kg. Additional charges may apply for excess baggage.</p>
            <p class="baggage-students">Hand Baggage &nbsp;:&nbsp;<strong class="font-weight-bold">One hand bag up to 7 kgs and 115 cms, shall be allowed per customer.</strong>&nbsp;For contactless travel we recommend to place it under the seat in front, on board.</p>

            <hr>
            <ul class="list-unstyled priceBreakup">
                <li class="row">
                    <span class="col">Regular Fare</span>
                    <span class="col-auto"><span>₹<?php echo $flight['economy_fare'] ?></span></span>
                </li>
            </ul>
            <hr>
            <a href="checkout?id=<?php echo $flight['id'] ?>" class="btn btn-primary w-100 py-3" style="border-radius:5rem"><i class="fa fa-ticket-alt"></i> Book Flight</a>

        </div>
    </div>

</div>