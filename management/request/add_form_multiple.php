<?php include('connect.php') ?>


<?php

$panna = $_POST['panna'];
$amount = $_POST['amount'];

foreach ($_POST['number'] as $number) {
    $result = $conn->query("SELECT * FROM record ORDER BY id DESC LIMIT 1");
    $row = $result->fetch_assoc();

    if ($row['id'] == null) {
        $id = 1;
    } else {
        $id = $row['id'] + 1;
    }
    $datetime = date('Y-m-d H:i:s');
    $conn->query("INSERT INTO record (`id`,`number`, `cost`, `panna`,`datetime`,`by_user`) VALUES ('$id','$number', '$amount', '$panna','$datetime','$user')");
}


?>

<div class="card alert entry-card alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong class="mb-1">All Inserted Successfully</strong>

    <p class="ml-2 mb-0">Panna : <?php echo $panna ?></p>
    <p class="ml-2 mb-0">Total Amount: ₹ <?php echo $amount ?></p>

</div>