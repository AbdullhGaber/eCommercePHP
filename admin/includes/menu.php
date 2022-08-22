<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
$admin_info = getAdminInfo();
$get_products = mysqli_query($conn,"SELECT * FROM `products`");
$products_count = mysqli_num_rows($get_products);

$get_product_categories = mysqli_query($conn,"SELECT * FROM `product_categories`");
$product_categories_count = mysqli_num_rows($get_product_categories);

$get_customers = mysqli_query($conn,"SELECT * FROM `customers`");
$customers_count = mysqli_num_rows($get_customers);
?>
<nav class="navbar navbar-expand-sm navbar-light bg-light justify-content-between d-flex container-fluid">


    <div>
        <a class="navbar-brand" href="index.php">Admin</a>
    </div>


    <ul class="navbar-nav mt-2  mt-lg-0">
        <li class="nav-item ">
            <a class="nav-link " href="../index.php">Home</a>
        </li>

        <li class="nav-item me-4">
            <a class="nav-link" href="logout.php">Log out</a>
        </li>

        <ul class="navbar-nav me-5">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user me-2"></i> <?= $admin_info['admin_name'] ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink" style="font-size: 12px ;">
                    <li>
                        <a class="dropdown-item" href="edit_admin.php?admin_id=<?=$admin_info['admin_id']?>">
                            <i class="fa fa-user"></i> Profile
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-envelope"></i> Products <span class="badge bg-secondary"><?= $products_count ?></span>
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-users"></i> Customers <span class="badge bg-secondary"><?= $customers_count ?></span>
                        </a>

                    </li>

                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-tasks-alt"></i> Product categories <span class="badge bg-secondary"><?= $product_categories_count ?></span>
                        </a>
                    </li>
            </li>
        </ul>
    </ul>


</nav> <!-- END OF NAVBAR -->