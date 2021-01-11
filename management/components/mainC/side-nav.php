<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="<?php echo $addr_space ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#customer">
                    <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
                    Customer
                    <div class="sb-sidenav-collapse-arrow">
                        <i class="fa fa-chevron-left"></i>
                    </div>
                </a>
                <div class="collapse" id="customer" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo $addr_space ?>customer/book_ticket">Book Ticket</a>
                        <a class="nav-link" href="">List My Tickets</a>
                        <a class="nav-link" href="">Track Luggage</a>
                        <a class="nav-link" href="">Track Flight Status</a>
                    </nav>
                </div> -->
                <a class="nav-link" href="<?php echo $addr_space ?>flight/list">
                    <div class="sb-nav-link-icon"><i class="fas fa-cubes"></i></div>
                    Flights
                </a>
                <a class="nav-link" href="<?php echo $addr_space ?>pilot/list">
                    <div class="sb-nav-link-icon"><i class="fas fa-cubes"></i></div>
                    Pilots
                </a>
                <a class="nav-link" href="<?php echo $addr_space ?>plane/list">
                    <div class="sb-nav-link-icon"><i class="fas fa-cubes"></i></div>
                    Planes
                </a>
                <a class="nav-link" href="<?php echo $addr_space ?>luggage">
                    <div class="sb-nav-link-icon"><i class="fas fa-cubes"></i></div>
                    Luggage
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="d-flex align-items-center justify-content-between">
                <div class="small">Logged in as:</div>
                <p class="m-0 text-capitalize badge badge-light font-weight-normal px-3 py-2">
                    <?php echo $_SESSION['username'] ?>
                </p>
            </div>
            <div class="d-block d-md-none mt-3">
                <form action="" method="post">
                    <button class="btn btn-danger w-100" name="logout">Logout <i class="fa fa-sign-out-alt"></i></button>
                </form>
            </div>
        </div>
    </nav>
</div>