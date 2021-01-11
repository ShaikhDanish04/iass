<?php
$response = '';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT username FROM `management_login` WHERE username = '$username' AND `password` = '$password'");
    echo $conn->error;
    $row = $result->fetch_assoc();

    if ($result->num_rows == 1) {
        $_SESSION['username'] = $row['username'];
        echo "<script>location.reload();</script>";
    } else {
        $response = '' .
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">' .
            '    <button type="button" class="close" data-dismiss="alert" aria-label="Close">' .
            '        <span aria-hidden="true">&times;</span>' .
            '        <span class="sr-only">Close</span>' .
            '    </button>' .
            '    <strong>Access Denied !!!</strong> <br> Invalid Username or Password.' .
            '</div>';
    }
}
?>
<style>
    main {
        height: 100vh;
        display: flex;
        align-items: center;
    }

    .login-card {
        max-width: 350px;
        margin: auto;
        background: linear-gradient(45deg, #fff, #ddd);

    }
</style>

<body style="background: linear-gradient(45deg,#273db0,#1ee9e9 )">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="card login-card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header d-flex flex-column align-items-center justify-content-center shadow bg-dark text-light">
                            <p class="display-4"><i class="fa fa-users"></i> Login</p>
                        </div>
                        <div class="card-body">
                            <?php echo $response ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label class="font-weight-bold small mb-1" for="inputEmailAddress">Username</label>
                                    <input class="form-control py-4" id="inputEmailAddress" name="username" type="text" placeholder="Enter email address" />
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold small mb-1" for="inputPassword">Password</label>
                                    <input class="form-control py-4" id="inputPassword" name="password" type="password" placeholder="Enter password" />
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox"><input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" /><label class="custom-control-label" for="rememberPasswordCheck">Remember password</label></div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <a class="small" href="javascript:void(0)">Forget Password</a>
                                    <button class="btn btn-success" name="login">Login</button>
                                </div>
                            </form>
                            <div class="d-flex flex-column border-top mt-3 pt-3 align-items-center justify-content-between small">

                                <!-- <div class="d-flex align-items-center mb-2">
                                    <img class="mr-2" src="https://www.danishshaikh.tech/img/logo.png" height="32px" alt="">
                                    <div class="text-muted">Copyright &copy; Danish Shaikh 2020</div>
                                </div> -->
                                <div>
                                    <a href="#">Privacy Policy</a>
                                    &middot;
                                    <a href="#">Terms &amp; Conditions</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>