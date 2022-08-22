<?php include "includes/head.php" ?>
<?php require_once 'includes/menu.php'; ?>
<?php require_once 'includes/sideBar.php'; ?>

<nav class=" mt-3">
    <!-- breadcrumb-starts -->

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"> <i class="fa fa-dashboard me-2"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Products</li>
    </ul>

</nav>

<div class="card w-100 text-white">
    <div class="card-header bg-primary py-2">
        <h5 class="lead"><i class="fa-solid fa-money-bill me-2"></i> New orders</h5>
    </div>
    <div class="card-body">
        <table class="table border  table-striped   table-hover border-primary">
            <thead>
                <th>Product ID</th>
                <th>Product title</th>
                <th>Product image</th>
                <th>Product sold</th>
                <th>Product keywords</th>
                <th>Product date</th>
                <th>delete</th>
                <th>edit</th>

            </thead>

            <tbody>
                <?php
                $view_product_sql = "SELECT * FROM products ORDER BY `product_id` DESC LIMIT $start_from,$per_page";
                $view_product_run = mysqli_query($conn, $view_product_sql);

                $j = $start_from;

                while ($view_product_row = mysqli_fetch_assoc($view_product_run)) :
                    $j++;
                ?>
                    <tr>
                        <td><?= $j ?></td>
                        <td><?= $view_product_row['product_title'] ?></td>
                        <td><img src="./product_images/<?= $view_product_row['product_img1'] ?>" height="50" alt=""></td>
                        <td></td>
                        <td><?= $view_product_row['product_keywords'] ?></td>
                        <td><?= $view_product_row['date'] ?></td>
                        <td><a href="view_products.php?pro_delete=<?= $view_product_row['product_id'] ?>"><i class="fas fa-trash text-danger"></i></a></td>
                        <td><a href="view_products.php?pro_edit=<?= $view_product_row['product_id'] ?>"><i class="fas fa-edit  text-warning"></i></a></td>

                    </tr>
                <?php endwhile;

                if (isset($_GET['pro_delete'])) {
                    $pro_id = $_GET['pro_delete'];
                    $delete_product = "DELETE FROM products WHERE product_id = '$pro_id' ";
                    $run_delete = mysqli_query($conn, $delete_product);
                }

                ?>
            </tbody>
        </table>
    </div><!-- card-body -->
</div> <!-- card -->
<nav>
    <ul class="pagination justify-content-center mt-5">
        <li class="page-item">
            <a class="page-link" href="view_products.php?page=1">First page</a>
        </li>
        <?php
        $all_products = mysqli_query($conn, "SELECT * FROM products");
        $products_numbers = mysqli_num_rows($all_products);
        $total_page = ceil($products_numbers / $per_page);
        for ($i = 1; $i <= $total_page; $i++) :

        ?>
            <li class="page-item"><a class="page-link" href="view_products.php?page=<?= $i ?>"><?= $i ?></a></li>
        <?php endfor; ?>

        <li class="page-item">
            <a class="page-link" href="view_products.php?page=<?php if ($total_page > 0) {
                                                                    echo $total_page;
                                                                } else {
                                                                    echo 1;
                                                                } ?>">Last page</a>
        </li>
    </ul>
</nav>

</div> <!-- row 2/10 -->




<?php include "includes/footer.php" ?>