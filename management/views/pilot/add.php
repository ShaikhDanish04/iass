<?php
$repsonse = '';

if (isset($_POST['add'])) {

    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $result = $conn->query("INSERT INTO `pilot` (`name`, `contact`, `address`) VALUES ('$name', '$contact', '$address')");

    if ($result === TRUE) {
        $repsonse = alert('success', 'Pilot Added Successfully');
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
                <p class="h5 m-0 "> <i class="fa fa-plus"></i> Add Pilot</p>
            </div>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Pilot Name</label>
                    <input type="text" name="name" class="form-control" required>
                    <small class="text-muted">*Mandatory</small>
                </div>
                <div class="form-group">
                    <label for="">Contact</label>
                    <input type="tel" pattern="^\d{10}$" name="contact" class="form-control" required>
                    <small class="text-muted">*Mandatory</small>
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <textarea class="form-control" name="address" rows="3" required></textarea>
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