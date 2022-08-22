<div class="card text-center p-4">
    <h1>Do you really want to delete your account?</h1>

    <form action="" method="POST" class="mt-3">
        <input type="submit" value="Yes , I want to delete" name="yes_delete" class="btn btn-danger me-2 ">
        <input type="submit" value="No , I don't want to delete" name="no_delete" class="btn btn-success">
    </form>

    <?php
    $customer_row = getUserInfo();
    if (isset($_POST['yes_delete'])) {
        $delete_acc = "DELETE FROM customers WHERE `customer_email` = '$_SESSION[customer_email]'";
        $run_delete = mysqli_query($conn, $delete_acc);
        if ($run_delete) {
            session_destroy();

            echo "<script>alert('Your Account Has Been Deleted! Good By')</script>";

            echo "<script>window.open('./index.php','_self')</script>";
        }
    }
    if (isset($_POST['no_delete'])) {
        echo "<script>window.open('./my_account.php?myOrders&cus_id=$customer_row[customer_id]','_self')</script>";
    }

    ?>

</div>