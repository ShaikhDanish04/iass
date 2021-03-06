<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="<?php echo $addr_space ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

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
                <a class="nav-link" href="<?php echo $addr_space ?>luggage/list">
                    <div class="sb-nav-link-icon"><i class="fas fa-cubes"></i></div>
                    Luggage
                </a>
                <a class="nav-link" href="<?php echo $addr_space ?>immigration/list">
                    <div class="sb-nav-link-icon"><i class="fas fa-cubes"></i></div>
                    Immigration
                </a>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#check">
                    <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
                    <div>
                        <p class="m-0">Machine Check </p>
                        <p class="m-0 small">Virtual Hooks </p>
                    </div>
                    <div class="sb-sidenav-collapse-arrow">
                        <i class="fa fa-chevron-left"></i>
                    </div>
                </a>
                <div class="collapse" id="check" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo $addr_space ?>check-in/scan">
                            <div class="sb-nav-link-icon"><i class="fas fa-cubes"></i></div>
                            Check-In
                        </a>
                        <a class="nav-link" href="<?php echo $addr_space ?>luggage_check-in/scan">
                            <div class="sb-nav-link-icon"><i class="fas fa-cubes"></i></div>
                            Luggage Check-In
                        </a>
                        <a class="nav-link" href="<?php echo $addr_space ?>security_check/scan">
                            <div class="sb-nav-link-icon"><i class="fas fa-cubes"></i></div>
                            Security Check
                        </a>
                        <a class="nav-link" href="<?php echo $addr_space ?>immigration_check/scan">
                            <div class="sb-nav-link-icon"><i class="fas fa-cubes"></i></div>
                            Immigration Check
                        </a>
                        <a class="nav-link" href="<?php echo $addr_space ?>boarding/scan">
                            <div class="sb-nav-link-icon"><i class="fas fa-cubes"></i></div>
                            Boarding Check
                        </a>
                    </nav>
                </div>
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