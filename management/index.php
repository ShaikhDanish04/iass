<?php include('request/connect.php'); ?>

<!DOCTYPE html>
<html lang="en">


<?php

if (isset($_GET['url'])) {
    $url_request = $_GET['url'];
} else {
    $url_request = '';
}
if ($url_request == '') {
    $url_request = 'dashboard';
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

$admin_logged_in = false;
if (isset($_SESSION)) {
    if (isset($_SESSION['username'])) {
        $admin_logged_in = true;
    } else {
        $admin_logged_in = false;
    }
}


if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    echo "<script type='text/javascript'>document.location.href = '';</script>";
}

function datetime($datetime)
{
    return date_format(date_create($datetime), "d M Y - h:m:i A");
}
?>


<head>
    <style>
        :root {
            --primay-color: #aa2424;
            --primay-color-hover: #941f1f;
            --primay-variant-color: #941f1f;
            --secondary-color: #ffd200;
        }
    </style>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Admin</title>
    <link href="<?php echo $addr_space ?>css/styles.css" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>



    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href)
        };
    </script>

</head>

<style>
    .table td,
    .table th {
        vertical-align: middle;
    }

    td .cost:before {
        content: "₹ ";
    }

    td p {
        margin: 0px;
    }

    td .number {
        font-weight: 500;
        text-align: center;
        font-size: 22px;
    }

    td .badge {
        margin: auto;
        padding: 10px
    }

    .sb-sidenav-dark {
        background: linear-gradient(45deg, #2493aa, #1f4d94);
        /* background: linear-gradient(45deg, var(--primay-color), var(--primay-variant-color)); */
        color: rgba(255, 255, 255, 0.5);
        text-shadow: 0 0 3px;
        box-shadow: 3px 0px 22px rgba(0, 0, 0, 0.25);
    }

    .sb-sidenav-dark:hover {
        text-shadow: 0 0 0px;
    }

    .card {
        box-shadow: 0 0.46875rem 2.1875rem rgba(4, 9, 20, 0.03), 0 0.9375rem 1.40625rem rgba(4, 9, 20, 0.03), 0 0.25rem 0.53125rem rgba(4, 9, 20, 0.05), 0 0.125rem 0.1875rem rgba(4, 9, 20, 0.03);
        border: 0;
        transition: .15s;
    }

    .breadcrumb {
        background: #fff;
        box-shadow: 0 0.46875rem 2.1875rem rgba(4, 9, 20, 0.03), 0 0.9375rem 1.40625rem rgba(4, 9, 20, 0.03), 0 0.25rem 0.53125rem rgba(4, 9, 20, 0.05), 0 0.125rem 0.1875rem rgba(4, 9, 20, 0.03);
    }

    .card-header {
        font-size: 18px;
        font-weight: 300;
        text-shadow: 0 0 1px #000;
        padding: 1rem 1.5rem;

    }

    .card:hover .card-header {
        font-weight: 500;
    }

    .sb-topnav {
        height: 70px;
        background: #fff;
        box-shadow: 0px 5px 22px rgba(0, 0, 0, 0.25);
    }

    .sb-nav-fixed #layoutSidenav #layoutSidenav_nav .sb-sidenav {
        padding-top: 70px;
    }

    .sb-sidenav .sb-sidenav-menu .nav .sb-sidenav-menu-heading {
        color: #fff
    }

    .sb-nav-fixed #layoutSidenav #layoutSidenav_content {
        top: 70px;
        background: #f1f1f1;
    }

    .sb-sidenav-dark .sb-sidenav-footer {
        background-color: rgba(0, 0, 0, 0.5);
        color: #fff;
        text-shadow: 0 0 0;
    }

    .bg-primary,
    .btn-primary {
        border: 0;
        background: linear-gradient(45deg, #003d7c, #007BFB);
    }

    .bg-warning,
    .btn-warning {
        border: 0;
        background: linear-gradient(45deg, #bc8d00, #ffc107);
    }


    .bg-success,
    .btn-success {
        border: 0;
        background: linear-gradient(45deg, #00751b, #28a745);
    }

    .bg-danger,
    .btn-danger {
        border: 0;
        background: linear-gradient(45deg, #7a000c, #dc3545);
    }

    .btn-warning,
    .btn-warning:hover {
        color: #fff;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6 {
        font-weight: 400;
    }

    .sb-sidenav-dark .sb-sidenav-menu .nav-link:hover {
        background: rgba(0, 0, 0, 0.25)
    }

    .sb-sidenav .sb-sidenav-menu .nav .sb-sidenav-menu-nested {
        margin: .5rem;
        border-radius: 1em;
        overflow: hidden;
        background-color: #fff;
    }

    .sb-sidenav .sb-sidenav-menu .nav .sb-sidenav-menu-nested .nav-link {
        color: #000;
        text-shadow: none;
        font-size: 12px;
    }


    .sb-sidenav-dark .sb-sidenav-menu .nav .sb-sidenav-menu-nested .nav-link .sb-nav-link-icon {
        color: #000 !important;
        font-size: 12px;

    }
</style>

<?php
// $admin_logged_in = false;

// print_r($_GET);

if ($admin_logged_in) {
    include('panel.php');
} else {
    // include('panel.php');
    include('login.php');
}
?>
<script type="text/javascript" src="https://www.jqueryscript.net/demo/Canvas-Table-QR-Code-Generator/jquery.qrcode.js"></script>
<script type="text/javascript" src="https://www.jqueryscript.net/demo/Canvas-Table-QR-Code-Generator/qrcode.js"></script>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?php echo $addr_space ?>js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<!-- <script src="<?php echo $addr_space ?>assets/demo/chart-area-demo.js"></script> -->
<!-- <script src="<?php echo $addr_space ?>assets/demo/chart-bar-demo.js"></script> -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<!-- <script src="<?php echo $addr_space ?>assets/demo/datatables-demo.js"></script> -->

</html>