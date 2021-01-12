<?php
$repsonse = '';

if (isset($_POST['add'])) {

    $name = $_POST['name'];
    $capacity = $_POST['capacity'];
    $result = $conn->query("INSERT INTO `plane` (`name`, `capacity`) VALUES ('$name', '$capacity')");

    if ($result === TRUE) {
        $repsonse = alert('success', 'Plane Added Successfully');
    } else {
        $repsonse = alert('danger', 'Failed !!! Try Again');
    }
}
?>

<div class="container-fluid">
    <?php echo $repsonse ?>
    <div class="card mb-4">
        <div class="card-body border-bottom">
            <div class="d-flex align-items-center justify-content-between">
                <a class="btn btn-sm btn-dark" href="list"><i class="fa fa-chevron-left"></i> Back</a>
                <p class="h5 m-0 "> <i class="fa fa-plus"></i> Add Plane</p>
            </div>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Plane Name</label>
                    <input type="text" name="name" class="form-control" required>
                    <small class="text-muted">*Mandatory</small>
                </div>
                <div class="form-group">
                    <label for="">Passanger Capacity</label>
                    <input type="text" name="capacity" class="form-control" required>
                    <small class="text-muted">*Mandatory</small>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between">
                    <button class="btn btn-danger" type="reset">Reset</button>
                    <button class="btn btn-success" name="add">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>