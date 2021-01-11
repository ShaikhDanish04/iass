<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">


                <div class="sb-sidenav-menu-heading">Inventroy</div>
                <a class="nav-link" href="<?php echo $addr_space ?>add-entry/">
                    <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                    Add Entry
                </a>
                <a class="nav-link" href="<?php echo $addr_space ?>list-records/">
                    <div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div>
                    List Record
                </a>
                <a class="nav-link" href="<?php echo $addr_space ?>result-analysis/">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-pie"></i></div>
                    Result Analysis
                </a>
                <a class="nav-link" href="<?php echo $addr_space ?>cutting/">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-pie"></i></div>
                    Cutting Check
                </a>
                <!-- <a class="nav-link" href="<?php echo $addr_space ?>cutting-result/">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-pie"></i></div>
                    Cutting Result
                </a> -->
                <a class="nav-link" href="<?php echo $addr_space ?>reset-record/">
                    <div class="sb-nav-link-icon"><i class="fas fa-trash-alt"></i></div>
                    Reset Record
                </a>

                <div class="sb-sidenav-menu-heading">Users Management</div>
                <a class="nav-link" href="<?php echo $addr_space ?>user-accounts/">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    User Accounts
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