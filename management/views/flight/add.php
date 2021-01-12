<?php
$response = '';
if (isset($_POST['add'])) {

    $plane_id = $_POST['plane_id'];
    $pilot_id = $_POST['pilot_id'];
    $economy_fare = $_POST['economy_fare'];
    $business_fare = $_POST['business_fare'];
    $departure_id = $_POST['departure_id'];
    $arrival_id = $_POST['arrival_id'];
    $departure_date = $_POST['departure_date'];
    $departure_time = $_POST['departure_time'];
    $arrival_date = $_POST['arrival_date'];
    $arrival_time = $_POST['arrival_time'];

    $result = $conn->query("INSERT INTO `flight` (`plane_id`, `pilot_id`, `economy_fare`, `business_fare`, `departure_id`, `arrival_id`, `departure_date`, `departure_time`, `arrival_date`, `arrival_time`, `status`) 
                        VALUES ('$plane_id', '$pilot_id', '$economy_fare', '$business_fare', '$departure_id', '$arrival_id', '$departure_date', '$departure_time', '$arrival_date', '$arrival_time', '0')");

    if ($result === TRUE) {
        $response = alert('success', 'Flight Added Successfully');
    } else {
        $response = alert('success', 'Error !!! Try Again');
    }
}
?>

<div class="container-fluid">
    <?php echo $response ?>
    <div class="card mb-4">
        <div class="card-body border-bottom">
            <div class="d-flex align-items-center justify-content-between">
                <a class="btn btn-sm btn-dark" href="list"><i class="fa fa-chevron-left"></i> Back</a>
                <p class="h5 m-0 "> <i class="fa fa-plus"></i> Add Flight</p>
            </div>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Select Plane</label>
                        <select name="plane_id" class="form-control">
                            <option value="">--- Select ---</option>
                            <?php $result = $conn->query("SELECT * FROM plane");
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                            } ?>
                        </select>
                        <small class="text-muted">*Mandatory</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Select Pilot</label>
                        <select name="pilot_id" class="form-control">
                            <option value="">--- Select ---</option>
                            <?php $result = $conn->query("SELECT * FROM pilot");
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                            } ?>
                        </select>
                        <small class="text-muted">*Mandatory</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Select Departure Location</label>
                        <select name="departure_id" class="form-control">
                            <option value="">--- Select ---</option>
                            <?php $result = $conn->query("SELECT * FROM airports");
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row['id'] . '">' . $row['code'] . ' - ' . $row['name'] . '</option>';
                            } ?>
                        </select>
                        <small class="text-muted">*Mandatory</small>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">Select Arrival Location</label>
                        <select name="arrival_id" class="form-control">
                            <option value="">--- Select ---</option>
                            <?php $result = $conn->query("SELECT * FROM airports");
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row['id'] . '">' . $row['code'] . ' - ' . $row['name'] . '</option>';
                            } ?>
                        </select>
                        <small class="text-muted">*Mandatory</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Set Departure Date</label>
                        <input type="date" name="departure_date" class="form-control">
                        <small class="text-muted">*Mandatory</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Set Departure Time</label>
                        <input type="time" name="departure_time" class="form-control">
                        <small class="text-muted">*Mandatory</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Set Arrival Date</label>
                        <input type="date" name="arrival_date" class="form-control">
                        <small class="text-muted">*Mandatory</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Set Arrival Time</label>
                        <input type="time" name="arrival_time" class="form-control">
                        <small class="text-muted">*Mandatory</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Economy Class Fare</label>
                        <input type="text" name="economy_fare" class="form-control">
                        <small class="text-muted">*Mandatory</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Business Class Fare</label>
                        <input type="text" name="business_fare" class="form-control">
                        <small class="text-muted">*Mandatory</small>
                    </div>
                </div>

                <div class="form-group d-flex align-items-center justify-content-between">
                    <button class="btn btn-danger" type="reset">Reset</button>
                    <button class="btn btn-success" name="add">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>