<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand" href="#">IASS</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
            </li>
        </ul>
        <?php if (isset($_SESSION['username'])) { ?>
            <div class="d-flex align-items-center">
                <!-- <p class="h5 font-weight-normal m-0 mr-2"></p> -->
                <div class="dropdown open">
                    <button class="btn btn-outline-dark dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['username'] ?>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right mt-3" aria-labelledby="triggerId">
                        <a href="my_account" class="dropdown-item"><i class="fa fa-user"></i> My Account</a>
                        <a href="logout" class="dropdown-item"><i class="fa fa-sign-out-alt"></i> Logout</a>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div>
                <a href="login" class="btn btn-outline-dark">Login</a>
                <a href="" class="btn btn-dark">Register</a>
            </div>
        <?php } ?>
    </div>
</nav>