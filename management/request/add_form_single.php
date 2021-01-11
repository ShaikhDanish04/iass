<?php include('connect.php') ?>

<?php
$number = $_POST['number'];
$panna = $_POST['panna'];
$amount = $_POST['amount'];

$result = $conn->query("SELECT * FROM record ORDER BY id DESC LIMIT 1");
$row = $result->fetch_assoc();

if ($row['id'] == null) {
    $id = 1;
} else {
    $id = $row['id'] + 1;
}
$datetime = date('Y-m-d H:i:s');
$conn->query("INSERT INTO record (`id`,`number`, `cost`, `panna`,`datetime`,`by_user`) VALUES ('$id','$number', '$amount', '$panna','$datetime','$user')");

?>

<div class="card alert entry-card alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong class="mb-1">ID : <?php echo $id ?> - Inserted Successfully</strong>

    <p class="ml-2 mb-0">Number : <?php echo $number ?></p>
    <p class="ml-2 mb-0">Panna : <?php echo $panna ?></p>
    <p class="ml-2 mb-0">Amount : ₹ <?php echo $amount ?></p>
    <p class="ml-2 mb-0">Insert Time : ₹ <?php echo $datetime ?></p>

</div>