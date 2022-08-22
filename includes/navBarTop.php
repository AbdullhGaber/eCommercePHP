<?php include_once "./functions/functions.php" ?>
<?php
if(isset($_SESSION['customer_email']))
 $user_row = getUserInfo(); 
 ?>
<div id="top">
    <!-- top-starts -->
    <div class="container">
        <!-- start-container -->
        <div class="row">
            <!-- start-row -->

            <div class="col-md-6 offer">
                <!-- start-left-col-6 offer -->

                <a href="#" style='font-size : 10px;' class="btn btn-success btn-sm">Welcome :
                    <?php if (isset($_SESSION['customer_email'])) {
                        echo "$_SESSION[customer_email]";
                    } else {
                        echo "GUEST";
                    }
                    ?>

                </a>

                <a href="#" style='font-size : 12px;' class="">Shopping cart total price : $<?= getTotalPrice() ?> , Total items <?= getItemsNo(); ?></a>

            </div> <!-- end-left-col-6 offer -->

            <div class="col-md-6">
                <!-- start-right-col-6 menu-->

                <ul class="menu">
                    <!-- start-menu-ul -->

                    <li>
                        <a href="customer_register.php">Register</a>
                    </li>

                    <li>
                        <?php

                        if (!isset($_SESSION['customer_email'])):
                        ?>
                            <a  href="checkout.php">My Account</a>
                        <?php

                        else :
                        ?>
                            <a  href="my_account.php?myOrders&cus_id=<?= $user_row['customer_id'] ?> ">My Account</a>
                        <?php
                        endif; ?>
                    </li>

                    <li>
                        <a href="cart.php">Go to cart</a>
                    </li>

                    <li>
                        <a href="<?php if (isset($_SESSION['customer_email'])) {
                                        echo "logout.php";
                                    } else {
                                        echo "checkout.php";
                                    } ?>"><?php if (isset($_SESSION['customer_email'])) {
                                                echo "logout";
                                            } else {
                                                echo "login";
                                            } ?></a>
                    </li>

                </ul> <!-- end-menu-ul -->

            </div> <!-- end-right-col-6 menu -->

        </div> <!-- end-row -->





    </div> <!-- end-container -->

</div> <!-- top-end -->


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- navbar-starts -->
    <div class="container">
        <!-- container-starts -->
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <!-- collapse-starts -->
            <ul class="navbar-nav menu">
                <!-- navbar-nav-ul starts -->

                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home</a>
                </li>

                <li class="nav-item">

                    <a class="nav-link" href="shop.php">Shop</a>

                </li>
                <li class="nav-item">
                    <?php

                    if (!isset($_SESSION['customer_email'])) :
                    ?>
                        <a class="nav-link" href='checkout.php'>My Account</a>
                    <?php

                    else :
                    ?>
                        <a class="nav-link" href='my_account.php?myOrders&cus_id=<?= $user_row['customer_id'] ?>'>My Account</a>
                    <?php
                    endif; ?>

                </li>

                <li class="nav-item">
                    <a class="nav-link" href="cart.php">Shopping cart</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact us</a>
                </li>


            </ul> <!-- navbar-nav-ul ends -->

            <div class="d-flex align-items-start">
                <form class="d-flex ">
                    <input class="form-control me-2" type="search" placeholder="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>

                <a href="cart.php" class="btn btn-sm btn-primary ms-2 mt-1">
                    <!-- card-btn-starts -->
                    <i class="fa fa-shopping-cart"></i>
                    <span> <?= getItemsNo() ?> items in cart </span>
                </a> <!-- card-btn-ends -->
            </div>

        </div> <!-- collapse-ends -->
    </div> <!-- container-ends -->
</nav> <!-- navbar-ends -->