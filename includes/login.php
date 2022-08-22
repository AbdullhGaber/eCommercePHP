<div class="card  p-4">

    <h2 class="text-center fs-1">Login</h2>
    <h5 class="text-center lead mt-3">Already our customer</h5>
    <p class="text-muted">
        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.
    </p>


    <form action="" method="POST">

        <div class="mb-3">
            <!-- email-input starts -->
            <label><b>Email</b></label>
            <input name="customer_email" type="text" class="form-control mt-2">
        </div> <!-- email-input ends  -->

        <div class="mb-3">
            <!-- password-input starts -->
            <label><b>Password</b></label>
            <input name="customer_password" type="password" class="form-control mt-2">
        </div> <!-- password-input ends  -->
        <button type="submit" name="login_customer" class="btn btn-success btn-sm d-block mx-auto"><i class="fa fa-user me-2"></i> Login</button>
    </form>
    <h5 class="text-center mt-3"><a href="./customer_register.php" style="text-decoration: none;">New? Register here</a></h5>
</div>

<?php
if (isset($_POST['login_customer'])) {
    $email = $_POST['customer_email'];
    $password = $_POST['customer_password'];
    $ip_add = getUserRealIP();


    $login_sql = "SELECT * FROM customers WHERE customer_pass = '$password' AND customer_email = '$email' ";

    $run_customer = mysqli_query($conn, $login_sql);
    $check_customer = mysqli_num_rows($run_customer);

    $select_cart = "select * from cart where ip_add='$ip_add'";

    $run_cart = mysqli_query($conn, $select_cart);
    $check_cart = mysqli_num_rows($run_cart);

    if ($check_customer == 0) {
        echo "<script>alert('password or email is wrong')</script>";
        exit();
    }

    if ($check_customer == 1 and $check_cart == 0) {

        $_SESSION['customer_email'] = $email;

        $cus_info = getUserInfo();
        $cus_id =  $cus_info['customer_id'];
        echo "<script>alert('You are Logged In')</script>";

        echo "<script>window.open('./my_account.php?myOrders&cus_id=$cus_id','_self')</script>";
    } else {

        $_SESSION['customer_email'] = $email;

        echo "<script>alert('You are Logged In')</script>";

        echo "<script>window.open('checkout.php','_self')</script>";
    }
}
?>