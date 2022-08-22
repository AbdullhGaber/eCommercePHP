<?php include "includes/head.php" ?>
<?php require_once 'includes/menu.php'; ?>
<?php require_once 'includes/sideBar.php'; ?>

<nav class=" mt-3">
    <!-- breadcrumb-starts -->

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"> <i class="fa fa-dashboard me-2"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"> Product Categories</li>
    </ul>

</nav>

<div class="card w-100 text-white">
    <div class="card-header bg-primary py-2">
        <h5 class="lead"><i class="fa-solid fa-money-bill me-2"></i> Product Categories</h5>
    </div>
    <div class="card-body">
        <table class="table border  table-striped   table-hover border-primary">
            <thead>
                <th>Product Category ID</th>
                <th>Product Category title</th>
                <th>delete</th>
                <th>edit</th>

            </thead>

            <tbody>
                <?php
                $categories_sql = "SELECT * FROM product_categories ORDER BY `p_cat_id` DESC LIMIT $start_from,$per_page";
                $categories_run = mysqli_query($conn, $categories_sql);

                $j = $start_from;

                while ($categories_row = mysqli_fetch_assoc($categories_run)) :
                    $j++;
                ?>

                    <tr>
                        <td><?= $j ?></td>
                        <td><?= $categories_row['p_cat_title'] ?></td>
                        <td><a href="view_p_categories.php?cat_delete=<?= $categories_row['p_cat_id'] ?>"><i class="fas fa-trash text-danger"></i></a></td>
                        <td><a href="edit_p_category.php?cat_edit=<?= $categories_row['p_cat_id'] ?>"><i class="fas fa-edit  text-warning"></i></a></td>

                    </tr>
                <?php endwhile;


                if (isset($_GET['cat_delete'])) {
                    $cat_id = $_GET['cat_delete'];
                    $delete_p_cat = "DELETE FROM `product_categories` WHERE  p_cat_id = '$cat_id' ";
                    $run_delete = mysqli_query($conn, $delete_p_cat);
                }


                ?>
            </tbody>
        </table>
    </div><!-- card-body -->
</div> <!-- card -->
<nav>
    <ul class="pagination justify-content-center mt-5">
        <li class="page-item">
            <a class="page-link" href="view_categories.php?page=1">First page</a>
        </li>
        <?php
        $all_products = mysqli_query($conn, "SELECT * FROM product_categories");
        $products_numbers = mysqli_num_rows($all_products);
        $total_page = ceil($products_numbers / $per_page);
        for ($i = 1; $i <= $total_page; $i++) :

        ?>
            <li class="page-item"><a class="page-link" href="view_p_categories.php?page=<?= $i ?>"><?= $i ?></a></li>
        <?php endfor; ?>

        <li class="page-item">
            <a class="page-link" href="view_p_categories.php?page=<?php if ($total_page > 0) {
                                                                        echo $total_page;
                                                                    } else {
                                                                        echo 1;
                                                                    } ?>">Last page</a>
        </li>
    </ul>
</nav>

</div> <!-- row 2/10 -->




<?php include "includes/footer.php" ?>