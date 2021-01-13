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
            alert('hi');
        })
    });
</script>