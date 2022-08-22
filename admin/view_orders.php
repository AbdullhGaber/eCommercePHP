<?php include "includes/head.php" ?>
<?php require_once 'includes/menu.php'; ?>
<?php require_once 'includes/sideBar.php'; ?>


<nav class=" mt-3">
    <!-- breadcrumb-starts -->

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"> <i class="fa fa-dashboard me-2"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"> Orders</li>
    </ul>

</nav>

<div class="card w-100 text-white">
    <div class="card-header bg-primary py-2">
        <h5 class="lead"><i class="fa-solid fa-money-bill me-2"></i> Orders</h5>
    </div>
    <div class="card-body">
        <table class="table border  table-striped   table-hover border-primary">
            <thead>
                <th>Order NO.</th>
                <th>Customer ID</th>
                <th>Due amount</th>
                <th>Invoice_no</th>
                <th>Qty</th>
                <th>Size</th>
                <th>Date</th>
                <th>Status</th>
                <th>Delete</th>
            </thead>

            <tbody>
                <?php
                $orders_sql = "SELECT * FROM `customer_orders` ORDER BY `order_id` DESC LIMIT $start_from,$per_page";
                $orders_run = mysqli_query($conn, $orders_sql);

                $j = $start_from;

                while ($orders_row = mysqli_fetch_assoc($orders_run)) :
                    $j++;
                ?>

                    <tr>
                        <td><?= $j ?></td>
                        <td><?= $orders_row['customer_id'] ?></td>
                        <td><?= $orders_row['due_amount'] ?></td>
                        <td><?= $orders_row['invoice_no'] ?></td>
                        <td><?= $orders_row['qty'] ?></td>
                        <td><?= $orders_row['size'] ?></td>
                        <td><?= $orders_row['order_date'] ?></td>
                        <td><?= $orders_row['order_status'] ?></td>
                        <td><a href="view_orders.php?del_order=<?= $orders_row['order_id'] ?>"><i class="fa fa-trash text-danger"></i></a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div><!-- card-body -->
</div> <!-- card -->

<?php
if (isset($_GET['del_order'])) {
    $delete_id = $_GET['del_order'];

    $delete_query = "DELETE FROM customer_orders WHERE order_id = '$delete_id'";

    $run_delete = mysqli_query($conn, $delete_query);

    if ($run_delete) {
        echo "<script>alert('order deleted successfully')</script>";
        echo "<script>window.open(view_orders.php,_self)</script>";
    }
}


?>

<nav>
    <ul class="pagination justify-content-center mt-5">
        <li class="page-item">
            <a class="page-link" href="view_orders.php?page=1">First page</a>
        </li>
        <?php
        $all_products = mysqli_query($conn, "SELECT * FROM customer_orders");
        $products_numbers = mysqli_num_rows($all_products);
        $total_page = ceil($products_numbers / $per_page);
        for ($i = 1; $i <= $total_page; $i++) :

        ?>
            <li class="page-item"><a class="page-link" href="view_orders.php?page=<?= $i ?>"><?= $i ?></a></li>
        <?php endfor; ?>

        <li class="page-item">
            <a class="page-link" href="view_orders.php?page=<?php if ($total_page > 0) {
                                                                echo $total_page;
                                                            } else {
                                                                echo 1;
                                                            } ?>">Last page</a>
        </li>
    </ul>
</nav>

</div> <!-- row 2/10 -->




<?php include "includes/footer.php" ?>