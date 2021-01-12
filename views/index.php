<div id="bannerSlider" class="carousel slide shadow" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        <!-- <div class="carousel-item">
            <img width="100%" src="assets/img/bg1.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block text-dark">
                <h3>Book Your Ticket Now</h3>
                <p>Online Ticket Booking</p>
            </div>
        </div> -->
        <style>
            .carousel-caption {
                position: absolute;
                right: unset;
                bottom: unset;
                top: 40%;
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
                <h3>Intelligent Automated Security System</h3>
                <p>Book Your Ticket Now</p>
            </div>
        </div>
        <!-- <div class="carousel-item">
            <img width="100%" src="assets/img/bg3.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h3>Book Your Ticket Now</h3>
                <p>Online Ticket Booking</p>
            </div>
        </div> -->
    </div>
</div>

<div class="container my-5">

    <div class="card shadow border-0">
        <div class="card-body border-bottom">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="navId">
                <li class="nav-item">
                    <a data-toggle="tab" href="#tab1Id" class="nav-link active">Book Flight</a>
                </li>
                <li class="nav-item">
                    <a data-toggle="tab" href="#tab2Id" class="nav-link">Available Flights</a>
                </li>
                <li class="nav-item">
                    <a data-toggle="tab" href="#tab2Id" class="nav-link disabled">Flight Status</a>
                </li>

            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab1Id">
                    <div class="card-body">
                        <form id="search_flight" action="" method="post">
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label for="">From</label>
                                    <select name="departure" class="form-control">
                                        <option value="">--- Select ---</option>
                                        <?php $result = $conn->query("SELECT * FROM airports");
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<option value="' . $row['id'] . '">' . $row['code'] . ' - ' . $row['name'] . ' - ' . $row['city'] . '</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="">To</label>
                                    <select name="arrival" class="form-control">
                                        <option value="">--- Select ---</option>
                                        <?php $result = $conn->query("SELECT * FROM airports");
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<option value="' . $row['id'] . '">' . $row['code'] . ' - ' . $row['name'] . ' - ' . $row['city'] . '</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="">Departure</label>
                                    <input type="date" name="date" value="<?php echo date('Y-m-d') ?>" class="form-control">
                                </div>
                            </div>
                            <button class="btn btn-dark ml-auto d-block border-0 px-5 py-2" style="border-radius:5rem">
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
                                            '       <p>' . date_format(date_create($row['departure_time']), 'h:i A') . ' - ' . date_format(date_create($row['arrival_time']), 'h:i A') . '</p>' .
                                            '    </td>' .
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
                </div>
                <div class="tab-pane fade" id="tab3Id">
                </div>
            </div>


        </div>
    </div>
    <p class="my-4 display-4">About US</p>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem ipsa tempore temporibus inventore ea quae? Iusto nemo alias esse consequatur neque obcaecati maiores dolore, dignissimos rem consectetur natus dolor eaque!
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem ipsa tempore temporibus inventore ea quae? Iusto nemo alias esse consequatur neque obcaecati maiores dolore, dignissimos rem consectetur natus dolor eaque!</p>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem ipsa tempore temporibus inventore ea quae? Iusto nemo alias esse consequatur neque obcaecati maiores dolore, dignissimos rem consectetur natus dolor eaque!</p>
</div>