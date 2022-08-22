<?php include "includes/head.php" ?>
<?php include "includes/navBarTop.php" ?>


<nav class="container mt-3">
    <!-- breadcrumb-starts -->

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">My account</li>
    </ul>


</nav> <!-- breadcrumb-ends -->
<section class="container py-3 ">

    <div class="row">
        <div class="col-md-3">
            <!-- col-3 starts -->

            <div class="card">

                <div class="card-header text-center p-3">
                    <!-- card-header starts -->
                    <img src="customer/customer_images/brock_lesnar.jpg" class="img-fluid mb-3" alt="">
                    <p>Name : Broke Lesnar</p>
                </div> <!-- card-header ends -->

                <div class="card-body ">

                    <nav class="nav nav-pills nav-fill d-flex flex-column  ">
                        <a class="nav-link <?php if (isset($_GET['myOrders'])) echo "active" ?> text-start py-3" href="my_account.php?myOrders"><i class="fa-solid fa-bars"></i> My orders</a>

                        <a class="nav-link <?php if (isset($_GET['payOffline'])) echo "active" ?> text-start py-3" href="my_account.php?payOffline"><i class="fa-solid fa-bolt"></i> Pay offline</a>

                        <a class="nav-link <?php if (isset($_GET['editAccount'])) echo "active" ?> text-start py-3" href="my_account.php?editAccount"><i class="fa-solid fa-pencil"></i> Edit account</a>

                        <a class="nav-link <?php if (isset($_GET['chgPassword'])) echo "active" ?> text-start py-3" href="my_account.php?chgPassword"><i class="fa fa-user"></i> Change password</a>

                        <a class="nav-link <?php if (isset($_GET['dltAccount'])) echo "active" ?> text-start py-3" href="my_account.php?dltAccount"><i class="fa-solid fa-trash"></i> Delete account</a>

                        <a class="nav-link <?php if (isset($_GET['logOut'])) echo "active" ?> text-start py-3" href="my_account.php?logOut"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>

                    </nav>

                </div>
            </div>

        </div> <!-- col-3 ends -->
        <div class="col-md-9">
            <div class="card">
                <!-- card-starts -->
                <div class="card-body text-center container py-4">
                    <!-- card-body-starts -->
                    <h2>Please confirm your payment</h2>
                    <?php
                    if (isset($_GET['order_id'])) {
                        $order_id = $_GET['order_id'];
                    }
                    ?>
                    <form action="confirm.php?update_id=<?= $order_id ?>" method="POST" class="mb-3" enctype="multipart/form-data">
                        <!-- confirm-form-starts -->
                        <div class="row g-3 mb-3 align-items-center my-3">
                            <!-- Invoice-row-starts -->
                            <div class="col-3">
                                <label class="col-form-label"><b>Invoice no</b></label>
                            </div>

                            <div class="col-9">
                                <input required name="invoice_no" type="text" class="form-control ">
                            </div>

                        </div> <!-- Invoice-row-ends -->

                        <div class="row g-3 mb-3 align-items-center my-3">
                            <!-- Amount-row-starts -->
                            <div class="col-3">
                                <label class="col-form-label"><b>Amount sent</b></label>
                            </div>

                            <div class="col-9">
                                <input name="amount_sent" required type="text" class="form-control ">
                            </div>

                        </div> <!-- Amount-row-ends -->

                        <div class="row g-3 mb-3 align-items-center my-3">
                            <!-- payment-row-starts -->
                            <div class="col-3">
                                <label class="col-form-label"><b>Select payment mode</b></label>
                            </div>

                            <div class="col-9">
                                <select name="payment_mode" class="form-control">
                                    <option value="">Select payment mode</option>
                                    <option value="Bank code">Bank code</option>
                                    <option value="UBL/ Omni Paisa">UBL/ Omni Paisa</option>
                                    <option value="Easy paisa">Easy paisa</option>
                                    <option value="Western union">Western union</option>
                                </select>
                            </div>

                        </div> <!-- payment-row-ends -->

                        <div class="row g-3 mb-3 align-items-center my-3">
                            <!-- Transaction-row-starts -->
                            <div class="col-3">
                                <label class="col-form-label"><b>Transaction/Reference Id</b></label>
                            </div>

                            <div class="col-9">
                                <input name="transaction" required type="text" class="form-control ">
                            </div>

                        </div> <!-- Transaction-row-ends -->

                        <div class="row g-3 mb-3 align-items-center my-3">
                            <!-- Code-row-starts -->
                            <div class="col-3">
                                <label class="col-form-label"><b>Easy Paisa/Omni Code</b></label>
                            </div>

                            <div class="col-9">
                                <input name="code" required type="text" class="form-control ">
                            </div>

                        </div> <!-- Code-row-ends -->

                        <div class="row g-3 mb-3 align-items-center my-3">
                            <!-- Payment-row-starts -->
                            <div class="col-3">
                                <label class="col-form-label"><b>Payment date</b></label>
                            </div>

                            <div class="col-9">
                                <input name="payment_date" required type="text" class="form-control ">
                            </div>

                        </div> <!-- Payment-row-ends -->

                        <button type="submit" name="confirm_payment" class="btn btn-success btn-lg"><i class="fa-solid fa-money-check"></i> Confirm Payment</button>

                    </form> <!-- confirm-form-ends -->

                    <?php

                    if (isset($_POST['confirm_payment'])) {
                        $cus_info = getUserInfo();
                       $cus_id = $cus_info['customer_id'];
                        $update_id = $_GET['update_id'];

                        $invoice_no = $_POST['invoice_no'];

                        $amount = $_POST['amount_sent'];

                        $payment_mode = $_POST['payment_mode'];

                        $ref_no = $_POST['transaction'];

                        $code = $_POST['code'];

                        $payment_date = $_POST['payment_date'];

                        $complete = "Complete";

                        $insert_payment = "insert into payments (invoice_no,amount,payment_mode,ref_no,code,payment_date) values ('$invoice_no','$amount','$payment_mode','$ref_no','$code','$payment_date')";
                        $run_payment = mysqli_query($conn, $insert_payment);

                        $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";
                        $run_customer_order = mysqli_query($conn, $update_customer_order);

                        $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";
                        $run_pending_order = mysqli_query($conn, $update_pending_order);

                        if ($run_pending_order) {

                            echo "<script>alert('your Payment has been received,order will be completed within 24 hours')</script>";

                            echo "<script>window.open('my_account.php?myOrders&cus_id=$cus_id','_self')</script>";
                        }
                    }


                    ?>
                </div> <!-- card-body-ends -->
            </div> <!-- card-ends -->
        </div> <!-- col-9 ends -->

    </div><!-- row-ends -->

</section>

<?php include "includes/footer.php" ?>