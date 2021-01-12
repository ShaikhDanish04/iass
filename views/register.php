<?php
$response = '';

if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];

    if ($password == $c_password) {
        if ($conn->query("SELECT * FROM customer_login WHERE mobile='$mobile'")->num_rows > 0) {
            $response = alert('warning', 'Mobile Number Already Register');
        } else {
            if ($conn->query("SELECT * FROM customer_login WHERE email='$email'")->num_rows > 0) {
                $response = alert('warning', 'Email Already Register');
            } else {
                $result = $conn->query("INSERT INTO `customer_login` (`mobile`, `email`, `password`) VALUES ('$mobile', '$email', '$password')");

                if ($result === TRUE) {
                    $response = alert('success', 'Registration Successfull');
                } else {
                    $response = alert('danger', 'Error Try Again');
                }
            }
        }
    } else {
        $response = alert('danger', 'Password Not Matched');
    }
}

?>

<div class="container d-flex align-items-center justify-content-center flex-column my-4" style="min-height:90vh">
    <div style="width:300px">
        <?php echo $response ?>
    </div>

    <div class="card mb-4" style="width:300px">
        <div class="card-body">
            <p class="h2 text-center font-weight-normal mt-4 mb-5">REGISTER</p>
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" required>
                    <small class="text-muted">*Enter Your Email</small>
                </div>
                <div class="form-group">
                    <label for="">Mobile</label>
                    <input type="tel" pattern="^\d{10}$" name="mobile" class="form-control" required>
                    <small class="text-muted">*Enter Your Mobile</small>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" required>
                    <small class="text-muted">*Enter Your Password</small>
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" name="c_password" class="form-control" required>
                    <small class="text-muted">*Re-enter Your Password</small>
                </div>
                <div class="form-group w-100">
                    <button class="btn btn-success w-100 mb-3" name="register">Register</button>
                    <p class="text-center">Already Registered ? <a href="login">Login</a></p>
                </div>
            </form>
        </div>
    </div>
</div>