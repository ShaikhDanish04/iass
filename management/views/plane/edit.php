<?php
$repsonse = '';

$id = $_GET['id'];

$plane = $conn->query("SELECT * FROM plane WHERE id= '$id'")->fetch_assoc();

if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $capacity = $_POST['capacity'];

    $result = $conn->query("UPDATE `plane` SET `name`='$name',`capacity`='$capacity' WHERE `id` = '$id'");

    if ($result === TRUE) {
        $repsonse = alert('success', 'Plane Details Updatd Successfully');
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
                <p class="h5 m-0 "> <i class="fa fa-plus"></i> Edit Plane</p>
            </div>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Plane Name</label>
                    <input type="text" name="name" value="<?php echo $plane['name'] ?>" class="form-control">
                    <small class="text-muted">*Mandatory</small>
                </div>
                <div class="form-group">
                    <label for="">Passanger Capacity</label>
                    <input type="text" name="capacity" value="<?php echo $plane['capacity'] ?>" class="form-control">
                    <small class="text-muted">*Mandatory</small>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between">
                    <button class="btn btn-danger" type="reset">Reset</button>
                    <button class="btn btn-success" name="update">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>