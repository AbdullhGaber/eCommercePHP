<?php include "includes/head.php" ?>
<?php include "includes/navBarTop.php" ?>


<nav class="container mt-3">
    <!-- breadcrumb-starts -->

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Contact us</li>
    </ul>


</nav> <!-- breadcrumb-ends -->
<section class="container py-3 ">

    <div class="row">
        <div class="col-md-3">
            <?php include "includes/sideBarShop.php"; ?>
        </div>

        <div class="col-md-9">

            <div class="card">
                <?php

                if (isset($_POST['Cus_register'])) {

                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $country = $_POST['country'];
                    $city = $_POST['city'];
                    $phone_number = $_POST['phone_number'];
                    $address = $_POST['address'];
                    $ip_add = getUserRealIP();

                        $img_name = $_FILES['user_img']['name'];
                        $tmp_name = $_FILES['user_img']['tmp_name'];
                        move_uploaded_file($tmp_name, "customer/customer_images/$img_name");
                    
                    $user_reg_sql = "INSERT INTO `customers`(`customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES ('$name','$email','$password','$country','$city','$phone_number','$address','$img_name','$ip_add')";

                    $insert_cus_run = mysqli_query($conn, $user_reg_sql);

                    if (getItemsNo() > 0) {
                        session_start();
                        $_SESSION['customer_email'] = $email;
                        header("location:cart.php");
                    } else {
                        session_start();
                        $_SESSION['customer_email'] = $email;
                        header("location:index.php");
                    }
                    
                    if ($insert_cus_run) {
                        echo "<div class='alert alert-success text-center'>you have been registered successfully</div>";
                    }
                }


                ?>
                <div class="card-header text-center container py-4">
                    <!-- card-header-starts -->
                    <h2>Register a new account</h2>

                </div> <!-- card-header-ends -->
                <div class="card-body text-center container py-4">
                    <form action="" class="mb-3" method="POST" enctype="multipart/form-data">
                        <!-- contact-form-ends -->
                        <div class="row g-3 mb-3 align-items-center my-3">
                            <!-- Name-row-starts -->
                            <div class="col-3">
                                <label class="col-form-label"><b>Name</b></label>
                            </div>

                            <div class="col-9">
                                <input name="name" required type="text" class="form-control ">
                            </div>

                        </div> <!-- Name-row-ends -->

                        <div class="row g-3 mb-3 align-items-center my-3">
                            <!-- Email-row-starts -->
                            <div class="col-3">
                                <label class="col-form-label"><b>Email</b></label>
                            </div>

                            <div class="col-9">
                                <input name="email" required type="email" class="form-control ">
                            </div>

                        </div> <!-- Email-row-ends -->

                        <div class="row g-3 mb-3 align-items-center my-3">
                            <!-- Password-row-starts -->
                            <div class="col-3">
                                <label class="col-form-label"><b>Password</b></label>
                            </div>

                            <div class="col-9">
                                <input name="password" required type="password" class="form-control ">
                            </div>

                        </div> <!-- Password-row-ends -->

                        <div class="row g-3 mb-3 align-items-center my-3">
                            <!-- Country-row-starts -->
                            <div class="col-3">
                                <label class="col-form-label"><b>Country</b></label>
                            </div>

                            <div class="col-9">
                                <input name="country" required type="text" class="form-control ">
                            </div>
                        </div>

                        <div class="row g-3 mb-3 align-items-center my-3">
                            <!-- City-row-starts -->
                            <div class="col-3">
                                <label class="col-form-label"><b>City</b></label>
                            </div>

                            <div class="col-9">
                                <input name="city" required type="text" class="form-control ">
                            </div>

                        </div> <!-- City-row-ends -->

                        <div class="row g-3 mb-3 align-items-center my-3">
                            <!-- Contact-row-starts -->
                            <div class="col-3">
                                <label class="col-form-label"><b>Contact</b></label>
                            </div>

                            <div class="col-9">
                                <input name="phone_number" required type="number" class="form-control">
                            </div>

                        </div> <!-- Contact-row-ends -->

                        <div class="row g-3 mb-3 align-items-center my-3">
                            <!-- Address-row-starts -->
                            <div class="col-3">
                                <label class="col-form-label"><b>Address</b></label>
                            </div>

                            <div class="col-9">
                                <input required name="address" type="text" class="form-control">
                            </div>

                        </div> <!-- Address-row-ends -->

                        <div class="row g-3 mb-3 align-items-center my-3">
                            <!-- Image-row-starts -->
                            <div class="col-3">
                                <label class="col-form-label"><b>Image</b></label>
                            </div>

                            <div class="col-9">
                                <input required name="user_img" type="file" class="form-control-file form-control">
                            </div>

                        </div> <!-- Image-row-ends -->

                        <button type="submit" name="Cus_register" class="btn btn-success"><i class="fa fa-user me-2"></i> Register</button>
                    </form> <!-- contact-form-ends -->

                </div> <!-- card-body-ends -->
            </div> <!-- card-ends -->
        </div> <!-- col-9 ends -->
    </div>

</section>

<?php include "includes/footer.php" ?>