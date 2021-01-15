<div id="bannerSlider" class="carousel slide shadow" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        <style>
            .carousel-caption {
                position: absolute;
                right: unset;
                bottom: unset;
                top: 30%;
                left: 5%;
                z-index: 10;
                padding-top: 20px;
                padding-bottom: 20px;
                color: #fff;
                text-align: left;
            }
        </style>
        <div class="carousel-item active">
            <img width="100%" src="assets/img/banner1.jpg" alt="Second slide">
            <div class="carousel-caption text-dark d-none d-md-block">
                <h1>Airport</h1>
                <h3>Intelligent Automated Security System</h3>
                <p>Book Your Ticket Now</p>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">

    <div class="card shadow border-0 mb-3" style="background: linear-gradient(45deg, #e9e9e9, #f3f3f3);">
        <div class="card-body">
            <!-- Nav tabs -->
            <ul class="nav nav-pills" id="navId">
                <li class="nav-item">
                    <a data-toggle="tab" href="#tab1Id" class="nav-link active">Book Flight</a>
                </li>
                <li class="nav-item">
                    <a data-toggle="tab" href="#tab2Id" class="nav-link">Available Flights</a>
                </li>
                <li class="nav-item">
                    <a data-table data-toggle="tab" href="#tab2Id" class="nav-link disabled">Flight Status</a>
                </li>

            </ul>
            <hr>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab1Id">
                    <div class="card-body">
                        <form id="search_flight" action="" method="post">
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label class="font-weight-bold" for="">From</label>
                                    <select name="departure" class="form-control">
                                        <option value="">--- Select ---</option>
                                        <?php $result = $conn->query("SELECT * FROM airports");
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<option value="' . $row['id'] . '">' . $row['code'] . ' - ' . $row['name'] . ' - ' . $row['city'] . '</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="font-weight-bold" for="">To</label>
                                    <select name="arrival" class="form-control">
                                        <option value="">--- Select ---</option>
                                        <?php $result = $conn->query("SELECT * FROM airports");
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<option value="' . $row['id'] . '">' . $row['code'] . ' - ' . $row['name'] . ' - ' . $row['city'] . '</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="font-weight-bold" for="">Departure</label>
                                    <input type="date" name="date" value="<?php echo date('Y-m-d') ?>" class="form-control">
                                </div>
                            </div>
                            <button class="btn btn-dark mx-auto my-4 d-block border-0 px-5 py-2" style="border-radius:5rem">
                                <p class="m-0 h5 font-weight-light"><i class="fa fa-search"></i> Search Flight</p>
                            </button>
                        </form>
                    </div>
                    <div id="flight_search_response"></div>
                </div>
                <script>
                    $('#search_flight').submit(function(e) {
                        e.preventDefault();

                        $.ajax({
                            method: 'POST',
                            data: $(this).serialize(),
                            url: 'request/search_flight.php',
                        }).done(function(response) {
                            console.log(response)
                            $('#flight_search_response').html(response)
                        })
                    })
                </script>
                <div class="tab-pane fade" id="tab2Id">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table data-table">
                                <thead class="text-center">
                                    <th>Sr No</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Timing</th>
                                    <th>Departure</th>
                                    <th>Arrival</th>
                                    <th>Seats Available</th>
                                    <th>Fare</th>
                                    <th></th>
                                </thead>
                                <tbody class="text-center">
                                    <?php

                                    $result = $conn->query("SELECT * FROM flight ORDER BY id DESC");
                                    $count = 0;
                                    while ($row = $result->fetch_assoc()) {

                                        $plane = $conn->query("SELECT * FROM plane WHERE id='" . $row['plane_id'] . "'")->fetch_assoc();
                                        $pilot = $conn->query("SELECT * FROM pilot WHERE id='" . $row['pilot_id'] . "'")->fetch_assoc();

                                        $departure = $conn->query("SELECT * FROM airports WHERE id='" . $row['departure_id'] . "'")->fetch_assoc();
                                        $arrival = $conn->query("SELECT * FROM airports WHERE id='" . $row['arrival_id'] . "'")->fetch_assoc();

                                        $ticket = $conn->query("SELECT * FROM ticket WHERE flight_id='" . $row['id'] . "' ORDER BY seat_number DESC LIMIT 1")->fetch_assoc();
                                        if (!($ticket > 0)) $ticket['seat_number'] = 0;

                                        $count++;

                                        $status = 'Open';
                                        if ($row['departure_date'] >= date('Y-m-d')) {
                                            if (date_format(date_create($row['departure_date'] . $row['departure_time']), 'Y-m-d H:i:s') > date('Y-m-d H:i:s')) {
                                                $status = 'Open';
                                            } else {
                                                if (date_format(date_create($row['arrival_date'] . $row['arrival_time']), 'Y-m-d H:i:s') < date('Y-m-d H:i:s')) {
                                                    $status = 'In Journey';
                                                } else {
                                                    $status = 'Close';
                                                }
                                            }
                                        } else {
                                            $status = 'Close';
                                        }

                                        if ($status == 'Open')
                                            echo '' .
                                                '<tr>' .
                                                '    <td>' . $count . '</td>' .
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
                                                '       <p class="m-0">' . date_format(date_create($row['departure_time']), 'h:i A') . ' - ' . date_format(date_create($row['arrival_time']), 'h:i A') . '</p>' .
                                                '    </td>' .
                                                '    <td class="text-center">' .  pdate($row['departure_date']) . '</td>' .
                                                '    <td class="text-center">' .  pdate($row['arrival_date']) . '</td>' .
                                                '    <td class="text-center">' . ($plane['capacity'] - $ticket['seat_number']) . ' / ' . $plane['capacity'] . '</td>' .
                                                '    <td class="text-nowrap">' .
                                                '       <p>₹' . $row['economy_fare'] . '</p>' .
                                                '    </td>' .
                                                '    <td class="text-nowrap">' .
                                                '       <a target="blank" href="view_flight?id=' . $row['id'] . '" class="btn btn-sm btn-primary"><i class="fa fa-plane"></i> View</a>' .
                                                '    </td>' .
                                                '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="tab3Id">
                    </div>
                </div>


            </div>
        </div>
    </div>


    <p class="my-4 display-4">About US</p>
    <p class="text-justify">
        This project automates the various manual procedures that occur during Check-In and CheckOut processes at airports and maintain security standards. We choose the topic of "Intelligent
        Automation and Security System for Airports” as it can provide Real-Time notifications and
        navigation to its users and also authenticate and provide validation. Every year millions of
        passengers travel around the world through airways. They all have to go through long and tiring
        duration of security checks, checking-in and boarding .In India alone for domestic flights
        usually a passenger has to arrive 2-3 hours before the flight time and for international flights the
        time is even more. Many of the passengers are first time travelers and old age people who do
        not have any clue how to work out things and makes situations very complex. The solution that
        our project provides will not only help the passengers but also save lot of resources in form of
        money and time. This automated system will reduce the manual work by about 50% and
        increase the efficiency.</p>

    <div class="card shadow mx-auto my-4 border-0" style="max-width:600px;background: linear-gradient(45deg, #fcfcfc, #fff)">
        <div class="card-body text-center">
            <p class="h5 my-4">"Intelligent Automation & Security System for Airports"</p>
            <p class="mb-0">A Report submitted</p>
            <p>By</p>
            <p class="mb-0 font-weight-bold">Aryan Shaikh (15)</p>
            <p class="small">(11811071)</p>
            <p class="mb-0 font-weight-bold">Sumedh Maharaj (43)</p>
            <p class="small">(11811098)</p>
            <p class="mb-0 font-weight-bold">Zeshan Shaikh (73)</p>
            <p class="small">(11810261)</p>
            <p class="mb-0 font-weight-bold">Siddharth Kumar Singh (33)</p>
            <p class="small">(11811203)</p>
            <p class="mb-0 font-weight-bold">Sharan Patil (18)</p>
            <p class="small">(11811274)</p>
            <p class="m-0">Under the Guidance of</p>
            <p class="font-weight-bold">Dr. Sandip Shinde</p>
            <p class="h5">BACHELOR OF TECHNOLOGY</p>
            <p>COMPUTER SCIENCE & ENGINEERING</p>
            <p class="h3 font-weight-normal"> Vishwakarma Institute Of Technology</p>

        </div>
    </div>
    <p class="my-4 h1">Features</p>
    <p class="text-justify">
        <b>Automated Check-in</b> : IASS Customer Side Generated Code will be scanned be the IASS
        Management System and update the customer status in the system as check-in to the airport
    </p>
    <p class="text-justify">
        <b>Smart Baggage Check-in</b> : Each Baggage of the customer will be given barcode, which will be
        scanned by the IASS IoT machine (Virtual Hook) and update the clients luggage status in their
        respective login.
    </p>
    <p class="text-justify">
        <b>Advanced Security Check</b> : Each step of the Security Check will be updated in the IASS
        Management System in Realtime Reflecting on the customers login. Every scanning machine will be
        an IoT device and it will send data of customer directly to IASS Management System
    </p>
    <p class="text-justify">
        <b>Intelligent Immigration</b> : Generate Online Passport Stamp on Virual Passport for Contact Less
        Exectuion. It will keep record of every Passport ID and Their Journey
    </p>

    <p class="text-justify">
        <b>Real-Time Luggage Tracking</b> : IASS Management System will send realtime data of customers
        luggage to customer login. And send a time for their luggage collection on arrival location at luggage
        counter.
    </p>
</div>