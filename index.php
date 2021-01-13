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
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />


</head>

<body style="background: linear-gradient(45deg, #fff, #ddd);">

    <style>
        .table td,
        .table th {
            vertical-align: middle;
        }
    </style>

    <?php include('components/navbar.php'); ?>
    <?php
    if (file_exists('views/' . $url_request . '.php')) {
        require_once('views/' . $url_request . '.php');
    } else {
        require_once('components/404.php');
    }
    ?>
    <?php include('components/footer.php'); ?>


    <!-- Modal -->
    <div id="qrModal" class="modal fade" role="dialog">
        <div class="modal-dialog mx-auto my-4" style="width:290px">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">QR Code</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body text-center py-3">
                </div>
            </div>

        </div>
    </div>
</body>

<script>
    $(document).ready(function() {
        $('.data-table').DataTable();
        $('.qr_code').each(function() {

            height = 64;
            width = 64;

            if ($(this).attr('data-height') != null) {
                height = $(this).attr('data-height');
            }
            if ($(this).attr('data-width') != null) {
                width = $(this).attr('data-width');
            }
            $(this).qrcode({
                text: $(this).attr('data-url'),
                width: width,
                height: height
            });
        })
        $('.qr_code').click(function() {
            console.log($(this).attr('data-url'));
            $('#qrModal .modal-body').html('<span class="qr_code" data-url="' + $(this).attr('data-url') + '"></span>');
            $('#qrModal .modal-body .qr_code').qrcode({
                text: $(this).attr('data-url'),
                width: 250,
                height: 250
            });
            $('#qrModal').modal("show");

        })

    });
</script>
<script type="text/javascript" src="https://www.jqueryscript.net/demo/Canvas-Table-QR-Code-Generator/jquery.qrcode.js"></script>
<script type="text/javascript" src="https://www.jqueryscript.net/demo/Canvas-Table-QR-Code-Generator/qrcode.js"></script>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<!-- <script src="<?php echo $addr_space ?>assets/demo/chart-area-demo.js"></script> -->
<!-- <script src="<?php echo $addr_space ?>assets/demo/chart-bar-demo.js"></script> -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<!-- <script src="<?php echo $addr_space ?>assets/demo/datatables-demo.js"></script> -->


</html>