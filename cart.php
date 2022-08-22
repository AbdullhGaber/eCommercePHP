<?php include "includes/head.php" ?>
<?php include "includes/navBarTop.php" ?>
<style>
    ul a.list-group-item {
        border: none;
        padding: 10px 10px;
        font-size: 18px;
    }
    
</style>
<nav class="container mt-3">
    <!-- breadcrumb-starts -->

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cart</li>
    </ul>


</nav> <!-- breadcrumb-ends -->

<section class="container py-3 ">

    <div class="row">

        <div class="col-md-9">
            <!-- col-9-starts -->
            <div class="card bg-white border border-2    text-dark mb-4 " style="box-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);">
                <div class="card-body py-4 container">
                    <!-- card-body-starts -->
                    <h2 class="card-title mb-2">Shopping cart</h2>
                    <p class="card-text">you currently have <?= getItemsNo() ?> item(s) in your cart</p>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Unit price</th>
                                    <th>Size</th>
                                    <th>Delete</th>
                                    <th>Sub total</th>
                                </tr>
                            </thead>

                            <tbody class="">
                                <style>
                                    table td p {

                                        margin-top: 30px;

                                    }
                                </style>
                                <?php
                                $ip_add = getUserRealIP();

                                $get_cart_sql = "SELECT * FROM products p INNER JOIN cart c ON p.product_id = c.p_id WHERE c.ip_add = '$ip_add' ";
                                $get_cart_run = mysqli_query($conn, $get_cart_sql);
                                $sub_total = 0;
                                while ($get_cart_row = mysqli_fetch_assoc($get_cart_run)) :

                                ?>
                                    <tr>
                                        <th><a href="#"><img src="admin/product_images/<?= $get_cart_row['product_img1'] ?>" height="80"> <?= $get_cart_row['product_title'] ?></a></th>
                                        <td>
                                            <p><?= $get_cart_row['qty'] ?></p>
                                        </td>

                                        <td>
                                            <p>$<?= $get_cart_row['product_price'] ?>.00</p>
                                        </td>

                                        <td>
                                            <p><?= $get_cart_row['size'] ?></p>
                                        </td>

                                        <td class="text-center">

                                            <p><input class="form-check-input" type="checkbox" value="<?= $get_cart_row['product_id'] ?>" name="delete[]"></p>


                                        </td>

                                        <td>
                                            <p>$<?php echo $get_cart_row['product_price'] * $get_cart_row['qty']  ?>.00</p>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>


                            </tbody>


                        </table>
                        <div class="d-flex justify-content-between">
                            <!-- flex-box-start -->
                            <h4><b>Total</b></h4>
                            <h4></h4>
                            <h4></h4>
                            <h4><b>$<?= getTotalPrice() ?>.00 </b></h4>
                            <h4></h4>

                        </div> <!-- flex-box-ends -->
                </div> <!-- card-body-ends -->




                <div class="card-footer py-4">
                    <!-- card-footer-start -->
                    <div class="d-flex justify-content-between">
                        <!-- flex-box-start -->
                        <a href="index.php" class="btn btn-secondary "><i class="fa-solid fa-angle-left"></i> continue shopping</a>

                        <div class="d-flex justify-content-center">

                            <button value="update_cart" type="submit" name="delete_product" class="btn btn-secondary me-2 ms-2 ms-md-0"><i class="fa-solid fa-arrows-rotate"></i> update cart</button>

                            <button type="submit" class="btn btn-success ">proceed to checkout <i class="fa-solid fa-angle-right"></i> </button>

                        </div><!-- flex-box-ends -->
                    </div> <!-- justify-content-between-box -->

                </div> <!-- card-footer-ends -->
            </div> <!-- card-ends -->

            </form>
            <?php
            if (isset($_POST['delete_product'])) {
                $id_values = $_POST['delete'];

                foreach ($id_values as $id_value) {

                    $delete_pro = "DELETE FROM cart WHERE p_id = '$id_value'";

                    mysqli_query($conn, $delete_pro);
                }
            }

            ?>
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
                $related_products_sql = "SELECT * FROM products ORDER BY rand() DESC LIMIT 0,3";
                $related_products_run = mysqli_query($conn, $related_products_sql);
                while ($related_products_row = mysqli_fetch_assoc($related_products_run)) :
                ?>
                    <div class="col-md-3 same-height">
                        <!-- col-3-starts -->
                        <div class="card text-center">
                            <!-- card-starts -->
                            <img src="admin/product_images/<?= $related_products_row['product_img1'] ?>" class="card-img-top">
                            <div class="card-body py-3">
                                <!-- card-body-starts -->
                                <h4 class="card-title mb-2"><?= $related_products_row['product_title'] ?></h4>
                                <h5 class="card-text mb-2 text-muted">$<?= $related_products_row['product_price'] ?>.00</h5>

                            </div><!-- card-body-ends -->
                        </div>
                    </div><!-- col-3-ends -->
                <?php endwhile; ?>




            </div><!-- row-ends -->


        </div> <!-- col-9-ends -->
        <div class="col-md-3">
            <div class="card bg-white border border-2 text-dark mb-4 " style="box-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);">
                <!-- card-starts -->
                <div class="card-header py-4 container">
                    <!-- card-header-starts -->
                    <h3>Order summary</h3>
                </div> <!-- card-header-ends -->

                <div class="card-body py-4 container">
                    <!-- card-body-starts -->
                    <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered </p>
                    <table class="table">

                        <tr>
                            <th class="text-muted">Order subtotal</th>
                            <td>$<?= getTotalPrice() ?>.00</td>
                        </tr>

                        <tr>
                            <th class="text-muted">Shipping and handling</th>
                            <td>$0.00</td>
                        </tr>

                        <tr>
                            <th class="text-muted">Tax</th>
                            <td> $0.00</td>
                        </tr>

                    </table>
                    <div class="d-flex justify-content-between">
                        <!-- flex-box-start -->
                        <h4><b>Total</b></h4>
                        <h4></h4>
                        <h4></h4>
                        <h4><b>$<?= getTotalPrice() ?>.00</b></h4>
                        <h4></h4>

                    </div> <!-- flex-box-ends -->

                </div> <!-- card-body-ends -->
            </div> <!-- card-ends -->
        </div> <!-- row-ends -->

</section>

<?php include "includes/footer.php" ?>