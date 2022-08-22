<?php include "includes/head.php" ?>
<?php require_once 'includes/menu.php'; ?>
<?php require_once 'includes/sideBar.php'; ?>


<nav class=" mt-3">
    <!-- breadcrumb-starts -->

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"> <i class="fa fa-dashboard me-2"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"> Customers</li>
    </ul>

</nav>

<div class="card w-100 text-white">
    <div class="card-header bg-primary py-2">
        <h5 class="lead"><i class="fa-solid fa-money-bill me-2"></i> Customers</h5>
    </div>
    <div class="card-body">
        <table class="table border  table-striped   table-hover border-primary">
            <thead>
                <th>ID</th>
                <th>Email</th>
                <th>Country</th>
                <th>City</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Image</th>
                <th>Delete</th>
            </thead>

            <tbody>
                <?php
                $customers_sql = "SELECT * FROM customers ORDER BY `customer_id` DESC LIMIT $start_from,$per_page";
                $customers_run = mysqli_query($conn, $customers_sql);

                $j = $start_from;

                while ($customers_row = mysqli_fetch_assoc($customers_run)) :
                    $j++;
                ?>

                    <tr>
                        <td><?= $j ?></td>
                        <td><?= $customers_row['customer_email'] ?></td>
                        <td><?= $customers_row['customer_country'] ?></td>
                        <td><?= $customers_row['customer_city'] ?></td>
                        <td><?= $customers_row['customer_contact'] ?></td>
                        <td><?= $customers_row['customer_address'] ?></td>
                        <td><img src="../customer/customer_images/<?= $customers_row['customer_image'] ?>" height="30" alt=""></td>
                        <td><a href="view_customers.php?del_cus=<?= $customers_row['customer_id'] ?>"><i class="fa fa-trash text-danger"></i></a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div><!-- card-body -->
</div> <!-- card -->
<?php
if (isset($_GET['del_cus'])) {
    $delete_id = $_GET['del_cus'];

    $delete_query = "DELETE FROM customers WHERE customer_id = '$delete_id'";

    $run_delete = mysqli_query($conn, $delete_query);

    if ($run_delete) {
        echo "<script>alert('customer deleted successfully')</script>";
        echo "<script>window.open(view_customers.php,_self)</script>";
    }
}

?>
<nav>
    <ul class="pagination justify-content-center mt-5">
        <li class="page-item">
            <a class="page-link" href="view_customers.php?page=1">First page</a>
        </li>
        <?php
        $all_products = mysqli_query($conn, "SELECT * FROM customers");
        $products_numbers = mysqli_num_rows($all_products);
        $total_page = ceil($products_numbers / $per_page);
        for ($i = 1; $i <= $total_page; $i++) :

        ?>
            <li class="page-item"><a class="page-link" href="view_customers.php?page=<?= $i ?>"><?= $i ?></a></li>
        <?php endfor; ?>

        <li class="page-item">
            <a class="page-link" href="view_customers.php?page=<?php if ($total_page > 0) {
                                                                    echo $total_page;
                                                                } else {
                                                                    echo 1;
                                                                } ?>">Last page</a>
        </li>
    </ul>
</nav>

</div> <!-- row 2/10 -->




<?php include "includes/footer.php" ?>