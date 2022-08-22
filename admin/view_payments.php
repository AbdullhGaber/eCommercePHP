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
        <h5 class="lead"><i class="fa-solid fa-money-bill me-2"></i> Payments</h5>
    </div>
    <div class="card-body">
        <table class="table border  table-striped   table-hover border-primary">
            <thead>
                <th>Payment NO.</th>
                <th>Invoice_no</th>
                <th>amount</th>
                <th>Payment mode</th>
                <th>Reference No.</th>
                <th>Code</th>
                <th>Date</th>
                <th>Delete</th>
            </thead>

            <tbody>
                <?php
                $payments_sql = "SELECT * FROM `payments` ORDER BY `payment_id` DESC LIMIT $start_from,$per_page";
                $payments_run = mysqli_query($conn, $payments_sql);

                $j = $start_from;

                while ($payments_row = mysqli_fetch_assoc($payments_run)) :
                    $j++;
                ?>

                    <tr>
                        <td><?= $j ?></td>
                        <td><?= $payments_row['invoice_no'] ?></td>
                        <td><?= $payments_row['amount'] ?></td>
                        <td><?= $payments_row['payment_mode'] ?></td>
                        <td><?= $payments_row['ref_no'] ?></td>
                        <td><?= $payments_row['code'] ?></td>
                        <td><?= $payments_row['payment_date'] ?></td>
                        <td><a href="view_payments.php?del_payment=<?= $payments_row['payment_id'] ?>"><i class="fa fa-trash text-danger"></i></a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div><!-- card-body -->
</div> <!-- card -->

<?php
if (isset($_GET['del_payment'])) {
    $delete_id = $_GET['del_payment'];

    $delete_query = "DELETE FROM payments WHERE payment_id = '$delete_id'";

    $run_delete = mysqli_query($conn, $delete_query);

    if ($run_delete) {
        echo "<script>alert('payment deleted successfully')</script>";
        echo "<script>window.open(view_payments.php,_self)</script>";
    }
}


?>

<nav>
    <ul class="pagination justify-content-center mt-5">
        <li class="page-item">
            <a class="page-link" href="view_payments.php?page=1">First page</a>
        </li>
        <?php
        $all_products = mysqli_query($conn, "SELECT * FROM payments");
        $products_numbers = mysqli_num_rows($all_products);
        $total_page = ceil($products_numbers / $per_page);
        for ($i = 1; $i <= $total_page; $i++) :

        ?>
            <li class="page-item"><a class="page-link" href="view_payments.php?page=<?= $i ?>"><?= $i ?></a></li>
        <?php endfor; ?>

        <li class="page-item">
            <a class="page-link" href="view_payments.php?page=<?php if ($total_page > 0) {
                                                                    echo $total_page;
                                                                } else {
                                                                    echo 1;
                                                                } ?>">Last page</a>
        </li>
    </ul>
</nav>

</div> <!-- row 2/10 -->




<?php include "includes/footer.php" ?>