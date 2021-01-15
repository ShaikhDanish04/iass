<nav class="sb-topnav navbar navbar-expand navbar-light">
    <a class="navbar-brand py-0" href="<?php echo $addr_space ?>dashboard">
    Airport IASS
    </a>
    <button class="btn btn-link btn-sm ml-auto ml-md-0 order-0 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button><!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
            <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
    <!-- Navbar-->
    <div class="d-none d-md-block">
        <form action="" method="post">
            <button class="btn btn-danger" name="logout">Logout <i class="fa fa-sign-out-alt"></i></button>
        </form>
    </div>
</nav>