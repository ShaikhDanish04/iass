<div id="bannerSlider" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#bannerSlider" data-slide-to="0" class="active"></li>
        <li data-target="#bannerSlider" data-slide-to="1"></li>
        <li data-target="#bannerSlider" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <!-- <div class="carousel-item">
            <img width="100%" src="assets/img/bg1.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block text-dark">
                <h3>Book Your Ticket Now</h3>
                <p>Online Ticket Booking</p>
            </div>
        </div> -->
        <div class="carousel-item active">
            <img width="100%" src="assets/img/bg2.jpg" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h3>Book Your Ticket Now</h3>
                <p>Online Ticket Booking</p>
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
    <a class="carousel-control-prev" href="#bannerSlider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#bannerSlider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container my-5">

    <div class="card shadow border-0">
        <div class="card-body border-bottom">
            <!-- Nav tabs -->
            <ul class="nav nav-pills" id="navId">
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
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label for="">From</label>
                                <input type="text" name="" class="form-control">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="">To</label>
                                <input type="text" name="" class="form-control">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="">Departure</label>
                                <input type="text" name="" class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-dark ml-auto d-block border-0 px-5 py-2" style="border-radius:5rem">
                            <p class="m-0 h5 font-weight-light"><i class="fa fa-search"></i> Search Flight</p>
                        </button>
                    </div>
                </div>
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

                                    $result = $conn->query("SELECT * FROM flight");
                                    while ($row = $result->fetch_assoc()) {

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
</div>