<?php
if (isset($_POST['reset_submit'])) {
    if ($_POST['valid_string'] == "clear all record") {
        if ($admin_access) $conn->query("DELETE FROM record");
        else $conn->query("DELETE FROM record WHERE `by_user`='$user'");
    }
}
?>

<div class="container">

    <p class="display-4 text-center mt-4">Reset Record</p>

    <div class="card reset-card">
        <div class="card-body text-center">
            <form action="" method="post">

                <p class="h6 mb-3">Do You Want to Reset Record ?</p>
                <p class="text-muted">Type the content below and submit</p>

                <p class="bold alert alert-secondary">clear all record</p>


                <input class="form-control mb-3" name="valid_string" type="text" placeholder="Write Here">

                <button type="submit" name="reset_submit" class="btn btn-danger" disabled><i class="fa fa-trash"></i> Reset</button>
            </form>
        </div>
    </div>
</div>

<style>
    .reset-card {
        max-width: 400px;
        margin: 2rem auto;
        box-shadow: 2px 2px 15px #ccc;
    }
</style>
<script>
    $('[name="valid_string"]').keyup(function() {
        if ($(this).val() == "clear all record") $('[name="reset_submit"]').removeAttr('disabled')
        else $('[name="reset_submit"]').attr('disabled', 'true');
    })
</script>