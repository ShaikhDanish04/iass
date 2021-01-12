<?php
if (isset($_SESSION['username'])) {
    echo "<script>location.href = 'index';</script>";
}

$response = '';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT id,mobile,email,username FROM `customer_login` WHERE (email = '$username' OR mobile = '$username') AND `password` = '$password'");
    // echo $conn->error;
    $row = $result->fetch_assoc();

    if ($result->num_rows == 1) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['mobile'] = $row['mobile'];
        $_SESSION['email'] = $row['email'];
        echo "<script>location.reload();</script>";
    } else {
        $response = alert('danger', '<strong>Access Denied !!!</strong> <br> Invalid Login Details.');
    }
}
?>
<div class="container d-flex align-items-center justify-content-center flex-column my-4" style="min-height:90vh">
    <div style="width:300px">
        <?php echo $response ?>
    </div>
    <div class="card mb-4" style="width:300px">
        <div class="card-body">
            <p class="h2 text-center font-weight-normal mt-4 mb-5">LOGIN</p>
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Email or Mobile</label>
                    <input type="text" name="username" class="form-control">
                    <small id="helpId" class="text-muted">*Enter Your Mobile or Email</small>
                </div>
                <div class="form-group">
                    <div class="d-flex align-items-center justify-content-between">
                        <label for="">Password</label>
                        <a href="#" class="small">Forgot Password ?</a>
                    </div>
                    <input type="password" name="password" class="form-control">
                    <small id="helpId" class="text-muted">*Enter Your Password</small>
                </div>
                <div class="form-group  w-100">
                    <button class="btn btn-success w-100 mb-3" name="login">Login</button>
                    <p class="text-center">Don't Have Account ? <a href="register">Register</a></p>
                </div>
            </form>
        </div>
    </div>
</div>