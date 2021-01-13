<?php
$repsonse = '';

$id = $_GET['id'];


if (isset($_POST['update'])) {

    $result = $conn->query("UPDATE `luggage` SET `status`='" . $_POST['update'] . "' WHERE `id` = '$id'");

    if ($result === TRUE) {
        $repsonse = alert('success', 'Updatd Successfully');
    } else {
        $repsonse = alert('danger', 'Failed !!! Try Again');
    }
}

$luggage = $conn->query("SELECT * FROM luggage WHERE id= '$id'")->fetch_assoc();

$ticket_id = $luggage['ticket_id'];
$ticket = $conn->query("SELECT * FROM ticket WHERE id='$ticket_id'")->fetch_assoc();
$passenger = json_decode($ticket['passenger_details'], true);
?>

<div class="container-fluid">
    <?php echo $repsonse ?>
    <div class="card mb-4">
        <div class="card-body border-bottom">
            <div class="d-flex align-items-center justify-content-between">
                <a class="btn btn-sm btn-dark" href="list"><i class="fa fa-chevron-left"></i> Back</a>
                <p class="h5 m-0 "> <i class="fa fa-plus"></i> Process Luggage</p>
            </div>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Passenger Name : <?php echo $passenger['name'] ?></p>
                            <p>Passport Number : <?php echo $ticket['passenger_passport_number'] ?></p>
                            <p>Luggage Weight : <?php echo $luggage['weight'] ?></p>
                            <p>Current Stage : <?php echo $luggage['status'] ?></p>
                        </div>
                    </div>
                    <div class="col-md-6 text-center text-md-right">
                        <div class="qr_code" data-height="140" data-width="140" data-url="luggage_<?php echo $luggage['id'] ?>"></div>
                    </div>
                </div>
                <hr>
                <div class="form-group d-flex align-items-center justify-content-center">
                    <button class="btn mx-3 py-2 px-3 btn-dark" name="update" value="verification">Verification</button>
                    <button class="btn mx-3 py-2 px-3 btn-dark" name="update" value="loaded">Loaded</button>
                    <button class="btn mx-3 py-2 px-3 btn-dark" name="update" value="unload">Unload</button>
                    <button class="btn mx-3 py-2 px-3 btn-dark" name="update" value="collected">Collected</button>
                </div>
            </form>
        </div>
    </div>
</div>