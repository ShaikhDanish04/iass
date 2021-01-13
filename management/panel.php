<body class="sb-nav-fixed">

    <?php include('components/mainC/nav.php') ?>

    <div id="layoutSidenav">

        <?php include('components/mainC/side-nav.php') ?>
        <div id="layoutSidenav_content">
            <main class="py-3">

                <?php
                if (file_exists('views/' . $url_request . '.php')) {
                    require_once('views/' . $url_request . '.php');
                } else {
                    require_once('components/404.php');
                }
                ?>
            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <!-- <div class="text-muted">Copyright &copy; Danish Shaikh <?php echo date('Y') ?></div> -->
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>
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