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
        <h5 class="lead"><i class="fa-solid fa-money-bill me-2"></i> Admins</h5>
    </div>
    <div class="card-body">
        <table class="table border  table-striped   table-hover border-primary">
            <thead>
                <th>Admin ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Image</th>
                <th>Phone No.</th>
                <th>Country</th>
                <th>Job</th>
                <th>Delete</th>
            </thead>

            <tbody>
                <?php
                $admins_sql = "SELECT * FROM `admins` ORDER BY `admin_id` DESC LIMIT $start_from,$per_page";
                $admins_run = mysqli_query($conn, $admins_sql);

                $j = $start_from;

                while ($admins_row = mysqli_fetch_assoc($admins_run)) :
                    $j++;
                ?>

                    <tr>
                        <td><?= $j ?></td>
                        <td><?= $admins_row['admin_name'] ?></td>
                        <td><?= $admins_row['admin_email'] ?></td>
                        <td><img src="admin_images/<?= $admins_row['admin_image'] ?>" class="rounded" height="50" alt=""></td>
                        <td><?= $admins_row['admin_contact'] ?></td>
                        <td><?= $admins_row['admin_country'] ?></td>
                        <td><?= $admins_row['admin_job'] ?></td>
                        <td><a href="view_admins.php?del_admin=<?= $admins_row['admin_id'] ?>"><i class="fa fa-trash text-danger"></i></a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div><!-- card-body -->
</div> <!-- card -->

<?php
if (isset($_GET['del_admin'])) {
    $delete_id = $_GET['del_admin'];

    $delete_query = "DELETE FROM admins WHERE admin_id = '$delete_id'";

    $run_delete = mysqli_query($conn, $delete_query);

    if ($run_delete) {
        echo "<script>alert('admin deleted successfully')</script>";
        echo "<script>window.open(view_admins.php,_self)</script>";
    }
}

?>
<nav>
    <ul class="pagination justify-content-center mt-5">
        <li class="page-item">
            <a class="page-link" href="view_admins.php?page=1">First page</a>
        </li>
        <?php
        $all_products = mysqli_query($conn, "SELECT * FROM admins");
        $products_numbers = mysqli_num_rows($all_products);
        $total_page = ceil($products_numbers / $per_page);
        for ($i = 1; $i <= $total_page; $i++) :

        ?>
            <li class="page-item"><a class="page-link" href="view_admins.php?page=<?= $i ?>"><?= $i ?></a></li>
        <?php endfor; ?>

        <li class="page-item">
            <a class="page-link" href="view_admins.php?page=<?php if ($total_page > 0) {
                                                                echo $total_page;
                                                            } else {
                                                                echo 1;
                                                            } ?>">Last page</a>
        </li>
    </ul>
</nav>

</div> <!-- row 2/10 -->




<?php include "includes/footer.php" ?>