<?php include('connect.php'); ?>

<!DOCTYPE html>
<html lang="en">


<?php

if (isset($_GET['url'])) {
    $url_request = $_GET['url'];
} else {
    $url_request = '';
}
if ($url_request == '') {
    $url_request = 'index';
}
$addr_space = '';
$url_break = explode('/', $url_request);

$space = count($url_break) + substr_count($_SERVER['REQUEST_URI'], "//");
for ($i = 0; $i < $space; $i++) {
    if ($i > 0) {
        $addr_space .= '../';
    }
}
if (substr($url_request, -1) == '/') {
    $url_request = substr($url_request, 0, -1);
}


?>


<head>
    <?php include('components/head.php'); ?>

</head>

<?php
if (file_exists('views/' . $url_request . '.php')) {
    require_once('views/' . $url_request . '.php');
} else {
    require_once('components/404.php');
}
?>

</html>