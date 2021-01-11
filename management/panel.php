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
                        <div class="text-muted">Copyright &copy; Danish Shaikh <?php echo date('Y') ?></div>
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