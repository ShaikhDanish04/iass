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
                <p class="h5 font-weight-normal m-0 mr-2"><?php echo $_SESSION['username'] ?></p>
                <a href="logout" class="btn btn-outline-dark">Logout</a>
            </div>
        <?php } else { ?>
            <div>
                <a href="login" class="btn btn-outline-dark">Login</a>
                <a href="" class="btn btn-dark">Register</a>
            </div>
        <?php } ?>
    </div>
</nav>