<div class="card  p-4">

    <h2 class="text-center fs-1">Change your password</h2>

    <form action="" enctype="multipart/form-data" method="POST">

        <div class="mb-3">
            <!-- currentPassword-input starts -->

            <label><b>Enter your current password</b></label>
            <input type="password" name="old_pass" class="form-control mt-2">

        </div> <!-- currentPassword-input ends  -->

        <div class="mb-3">
            <!-- newPassword-input starts -->

            <label><b>Enter your new password</b></label>
            <input type="password" name="new_pass" class="form-control mt-2">

        </div> <!-- newPassword-input ends  -->

        <div class="mb-3">
            <!-- newPasswordAgain-input starts -->

            <label><b>Enter your new password again</b></label>
            <input type="password" name="new_pass_again" class="form-control mt-2">

        </div> <!-- newPasswordAgain-input ends  -->

        <button type="submit" name="change_password" class="btn btn-success btn-sm d-block mx-auto"><i class="fa fa-user"></i> Change password</button>
    </form>
    <?php
    $customer_row = getUserInfo();
    if (isset($_POST['change_password'])) {
        $old_pass = $_POST['old_pass'];
        $new_pass = $_POST['new_pass'];
        $new_pass_again = $_POST['new_pass_again'];
        $c_email = $_SESSION['customer_email'];

        $sel_old_pass = "SELECT * FROM customers WHERE customer_pass='$old_pass' AND customer_email = '$c_email'";
        $run_old_pass = mysqli_query($conn, $sel_old_pass);

        $check_old_pass = mysqli_num_rows($run_old_pass);

        if ($check_old_pass==0) {
            echo "<script>alert('Your Current Password is not valid try again')</script>";

            exit();
        }

        if ($new_pass!=$new_pass_again) {
            echo "<script>alert('Your New Password does not match')</script>";

            exit();
        }

        $update_pass = "update customers set customer_pass='$new_pass' where customer_email='$c_email'";

        $run_pass = mysqli_query($conn, $update_pass);

        if ($run_pass) {
            echo "<script>alert('your Password Has been Changed Successfully')</script>";

            echo "<script>window.open('./my_account.php?myOrders&cus_id=$customer_row[customer_id]','_self')</script>";
        }
    } ?>
</div>