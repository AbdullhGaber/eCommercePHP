<?php include "includes/head.php" ?>
<?php require_once 'includes/menu.php'; ?>
<?php require_once 'includes/sideBar.php'; ?>

<?php


$get_products = mysqli_query($conn, "SELECT * FROM `products`");
$products_count = mysqli_num_rows($get_products);

$get_product_categories = mysqli_query($conn, "SELECT * FROM `product_categories`");
$product_categories_count = mysqli_num_rows($get_product_categories);

$get_customers = mysqli_query($conn, "SELECT * FROM `customers`");
$customers_count = mysqli_num_rows($get_customers);

$get_orders = mysqli_query($conn, "SELECT * FROM `customer_orders`");
$orders_count = mysqli_num_rows($get_orders);


?>
<nav class="container mt-3">
    <!-- breadcrumb-starts -->

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php"> <i class="fa fa-dashboard me-2"></i> Dashboard</a></li>
    </ul>

</nav>
<div class="row container">
    <div class="col-md-3">
        <div class="card ms-5 ">
            <div class="card-header text-danger" style="background-color:rgba(255, 0, 0, 0.2);">
                <div class="d-flex justify-content-between">
                    <i class="fa-solid fa-coins fa-4x py-3"></i>
                    <div>
                        <h1 class="mb-0"><?= $products_count ?></h1>
                        <p class="lead">Products</p>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <a style="text-decoration: none;" href="view_products.php">View Products</a>
                    <a href="view_products.php"><i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div> <!-- card -->
    </div> <!-- col-3 -->
    <div class="col-md-3">
        <div class="card ms-5">
            <div class="card-header text-success" style="background-color:rgba(0,128,0,0.2);">
                <div class="d-flex justify-content-between">
                    <i class="fas fa-tasks-alt fa-4x py-3"></i>
                    <div>

                        <h1 class="mb-0 ms-5"><?= $product_categories_count ?></h1>
                        <p class="lead">Categories</p>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <a style="text-decoration: none;" href="view_categories.php">View Categories</a>
                    <a href="view_categories.php"><i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div> <!-- card -->
    </div> <!-- col-3 -->
    <div class="col-md-3">
        <div class="card ms-5">
            <div class="card-header text-warning" style="background-color:rgba(255 , 255 , 0 , 0.25);">
                <div class="d-flex justify-content-between">
                    <i class="fas fas fa-users fa-4x py-3"></i>
                    <div>

                        <h1 class="mb-0 ms-3"><?= $customers_count ?></h1>
                        <p class="lead">Customers</p>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <a style="text-decoration: none;" href="view_customers.php">View Customers</a>
                    <a href="view_customers.php"><i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div> <!-- card -->
    </div> <!-- col-3 -->
    <div class="col-md-3">
        <div class="card ms-5">
            <div class="card-header text-primary" style="background-color:rgba(0,0,255,0.3);">
                <div class="d-flex justify-content-between">
                    <i class="fas fa-shopping-cart fa-4x py-3"></i>
                    <div>


                        <h1 class="mb-0 ms-3"><?= $orders_count ?></h1>
                        <p class="">orders</p>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <a style="text-decoration: none;" href="view_orders.php">View Orders</a>
                    <a href="view_orders.php"><i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div> <!-- card -->
    </div> <!-- col-3 -->
</div> <!-- row 3/3/3/3 -->

<section class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card w-100 text-white">
                <div class="card-header bg-primary py-2">
                    <h5 class="lead"><i class="fa-solid fa-money-bill me-2"></i> New orders</h5>
                </div>
                <div class="card-body">
                    <table class="table border  table-striped   table-hover border-primary">
                        <thead>
                            <th>Order No</th>
                            <th>Customer Email</th>
                            <th>Invoice No</th>
                            <th>Product ID</th>
                            <th>Quantity</th>
                            <th>Size</th>
                            <th>Status</th>
                        </thead>

                        <tbody>
                            <?php
                            $get_pending_orders =  "SELECT * FROM pending_orders o JOIN customers c ON o.customer_id = c.customer_id ORDER BY `order_id` DESC LIMIT 0,5 ";

                            $run_pending_orders = mysqli_query($conn, $get_pending_orders);
                            $i = 0;
                            
                            while ($row_pending_orders = mysqli_fetch_assoc($run_pending_orders)) :
                                $i++;
                            ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $row_pending_orders['customer_email'] ?></td>
                                    <td><?= $row_pending_orders['invoice_no'] ?></td>
                                    <td><?= $row_pending_orders['product_id'] ?></td>
                                    <td><?= $row_pending_orders['qty'] ?></td>
                                    <td><?= $row_pending_orders['size'] ?></td>
                                    <td><?= $row_pending_orders['order_status'] ?></td>

                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>

                    <div class="text-end">
                        <a href="view_orders.php" style="text-decoration:none;">view orders <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- card-body -->
            </div> <!-- card -->
        </div> <!-- col-8 -->

        <div class="col-md-4">

            <div class="card mb-3">
                <img src="admin_images/<?= $admin_info['admin_image'] ?>" class="rounded card-img-top img-fluid">
                <div class="card-body text-mute">

                    <p class="card-text"> <i class="fa fa-envelope"></i> Email : <?= $admin_info['admin_email'] ?></p>
                    <p class="card-text"> <i class="fa fa-user"></i> Country : <?= $admin_info['admin_country'] ?></p>
                    <p class="card-text"> <i class="fa fa-user"></i> Contact : <?= $admin_info['admin_contact'] ?></p>
                    <hr>
                    <p class="card-text">About</p>
                    <p class="card-text"><?= $admin_info['admin_about'] ?></p>
                </div> <!-- card-body -->
            </div> <!-- card -->
        </div> <!-- col-4 -->
    </div><!-- row 4/8 -->
</section> <!-- table-section -->
</div><!-- col-10-row -->





<?php include "includes/footer.php" ?>