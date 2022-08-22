<?php include "includes/head.php" ?>
<?php include "includes/navBarTop.php" ?>

<nav class="container mt-3">
    <!-- breadcrumb-starts -->

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">T-Shirts</li>
    </ul>


</nav> <!-- breadcrumb-ends -->

<section class="container py-3 ">

    <div class="row">
        <!-- row-starts -->
        <div class="col-md-3">
            <?php include "includes/sideBarShop.php"; ?>
        </div>

        <div class="col-md-9">
            <!-- col-9-starts -->

            <div class="row">
                <!-- row-starts -->
                <div class="col-md-6">
                    <!-- col-6-starts -->

                    <div id="carousel_1" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">

                            <?php
                            if (isset($_GET['product_id'])) {
                                $p_id = $_GET['product_id'];
                                $get_product_details_sql = "SELECT * FROM products WHERE product_id = $p_id ";
                                $get_product_details_run = mysqli_query($conn, $get_product_details_sql);
                                while ($get_product_details_row = mysqli_fetch_assoc($get_product_details_run)) :
                                ?>
                            }


                           
                                <div class="carousel-item active">
                                    <img src="admin/product_images/<?= $get_product_details_row['product_img1'] ?>" class="d-block w-100">
                                </div>

                                <div class="carousel-item ">
                                    <img src="admin/product_images/<?= $get_product_details_row['product_img2'] ?>" class="d-block w-100">
                                </div>

                                <div class="carousel-item ">
                                    <img src="admin/product_images/<?= $get_product_details_row['product_img3'] ?>" class="d-block w-100">
                                </div>



                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel_1" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel_1" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>


                </div> <!-- col-6-ends -->

                <div class="col-md-6">
                    <!-- col-6-starts -->
                    <div class="card bg-white border border-2  py-5 container text-dark mb-4 text-center" style="box-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);">

                        <h1 class="card-title mb-3"><?= $get_product_details_row['product_title'] ?></h1>

                        <form action="" method="POST" class="mb-3">
                            <!-- add-cart-form-started -->
                            <div class="row g-3 mb-3 align-items-center">
                                <!-- quantity-row-starts -->
                                <div class="col-4">
                                    <label class="col-form-label">Product quantity</label>
                                </div>

                                <div class="col-7">
                                    <select name="product_quantity" class="form-control ">
                                        <option value="0">Select quantity</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>

                            </div> <!-- quantity-row-ends -->

                            <div class="row g-3 align-items-center mb-2">
                                <!-- size-row-starts -->
                                <div class="col-4">
                                    <label class="col-form-label">Product size</label>
                                </div>

                                <div class="col-7">
                                    <select name="product_size" class="form-control ">
                                        <option value="0" selected>Select a size</option>
                                        <option value="big">big</option>
                                        <option value="medium">medium</option>
                                        <option value="small">small</option>

                                    </select>
                                </div>
                            </div> <!-- size-row-ends -->
                            <p class="lead fs-2">$<?= $get_product_details_row['product_price'] ?></p>

                            <button type="submit" name="add_cart" class="btn btn-success border border-2 mt-3" value="Add_to_cart"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                        </form> <!-- product-form-ends -->

                    </div> <!-- card-ends -->

                    <div class="row">
                        <!-- row-starts -->
                        <div class="col-md-4">
                            <!-- col-4-starts -->
                            <img src="admin/product_images/<?= $get_product_details_row['product_img1'] ?>" class="img-thumbnail">
                        </div> <!-- col-4-ends -->

                        <div class="col-md-4">
                            <!-- col-4-starts -->
                            <img src="admin/product_images/<?= $get_product_details_row['product_img2'] ?>" class="img-thumbnail">
                        </div> <!-- col-4-ends -->

                        <div class="col-md-4">
                            <!-- col-4-starts -->
                            <img src="admin/product_images/<?= $get_product_details_row['product_img3'] ?>" class="img-thumbnail">
                        </div> <!-- col-4-ends -->



                    </div> <!-- row-ends -->
                </div> <!-- col-6-ends -->

            </div> <!-- row-ends -->

            <div class="card bg-white border border-2  py-4 container text-dark my-4" style="box-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);">
                <h4 class="card-title mb-2">Product details</h4>
                <p class="card-text"><?= $get_product_details_row['product_desc'] ?></p>
                <h4 class="card-title mb-2">Size & fit</h4>
                <ul>
                    <li>Small</li>
                    <li>Medium</li>
                    <li>Large</li>
                </ul>
                <hr>
            </div> <!-- card-ends -->
        <?php endwhile;
                            } ?>
        <div class="row">
            <!-- row-starts -->
            <div class="col-md-3">
                <!-- col-3-starts -->
                <div class="card" style="height: 460px;">
                    <!-- card-starts -->
                    <div class="card-body py-3   ">
                        <!-- card-body-starts -->
                        <h3 class="card-title mt-4 ">You also like these <br> products</h3>

                    </div><!-- card-body-ends -->
                </div>
            </div><!-- col-3-ends -->

            <?php
            $related_products_sql = "SELECT * FROM products ORDER BY product_id DESC LIMIT 0,3";
            $related_products_run = mysqli_query($conn, $related_products_sql);
            while ($related_products_row = mysqli_fetch_assoc($related_products_run)) :
            ?>
                <div class="col-md-3">
                    <!-- col-3-starts -->
                    <div class="card text-center">
                        <!-- card-starts -->
                        <img src="admin/product_images/<?= $related_products_row['product_img1'] ?>" class="card-img-top">
                        <div class="card-body py-3">
                            <!-- card-body-starts -->
                            <h4 class="card-title mb-2"><?= $related_products_row['product_title'] ?></h4>
                            <h5 class="card-text mb-2 text-muted">$<?= $related_products_row['product_price'] ?></h5>

                        </div><!-- card-body-ends -->
                    </div>
                </div><!-- col-3-ends -->
            <?php endwhile; ?>


        </div><!-- row-ends -->
        </div> <!-- col-9-ends -->

    </div> <!-- row-ends -->




</section>

<?php
//add_cart
if (isset($_POST['add_cart'])) {
    $pro_id = $_GET['product_id'];
    $product_size = $_POST['product_size'];
    $product_quantity = $_POST['product_quantity'];
    $ip_add = getUserRealIP();
    $check_items_in_cart_sql = "SELECT * FROM cart WHERE ip_add = '$ip_add' AND p_id = '$pro_id' ";
    $cart_check_run = mysqli_query($conn, $check_items_in_cart_sql);
    if (mysqli_num_rows($cart_check_run) > 0) {

        echo "<script>alert('this product already added')</script>";
    } else {
        $insert_cart_sql = "INSERT INTO `cart`(`p_id`,`ip_add`, `qty`, `size`)VALUES('$pro_id','$ip_add','$product_quantity','$product_size')";
        mysqli_query($conn, $insert_cart_sql);
    }
}

?>

<?php include "includes/footer.php" ?>