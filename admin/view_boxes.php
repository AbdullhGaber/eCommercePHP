<?php include "includes/head.php" ?>
<?php require_once 'includes/menu.php'; ?>
<?php require_once 'includes/sideBar.php'; ?>


<nav class=" mt-3">
    <!-- breadcrumb-starts -->

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"> <i class="fa fa-dashboard me-2"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Boxes</li>
    </ul>

</nav>

<div class="card w-100 ">
    <div class="card-header text-dark py-2">
        <h5 class="lead"><i class="fa-solid fa-money-bill me-2"></i> View boxes</h5>
    </div> <!-- card-header -->
    <div class="card-body text-dark text-center">
        <div class="row">
            <?php
            $get_boxes = mysqli_query($conn, "SELECT * FROM boxes_section");
            while ($box_row = mysqli_fetch_assoc($get_boxes)) :
            ?>
                <div class="col-md-3">
                    <div class="card border border-primary border-1 ">

                        <div class="card-header text-white bg-primary  ">
                            <h5 class="lead"> <?= $box_row['box_title'] ?> </h5>
                        </div> <!-- card-header -->

                        <div class="card-body text-dark text-center ">
                            <p><?= $box_row['box_desc'] ?></p>
                        </div><!-- card-body -->

                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <a style="text-decoration: none;" href="view_boxes.php?del_box=<?= $box_row['box_id'] ?>" class="text-danger"><i class="fa fa-trash"></i> Delete</a>

                                <a style="text-decoration: none;" href="edit_box.php?edit_box=<?= $box_row['box_id'] ?>" class="text-warning"><i class="fa fa-edit"></i> Edit</a>

                            </div><!-- flex-box -->
                        </div> <!-- card-footer -->
                    </div> <!-- card -->
                </div><!-- col-3 -->
            <?php endwhile; ?>
        </div> <!-- row -->
    </div> <!-- card-body -->
</div> <!-- card -->

</div> <!-- row 2/10 -->


<?php
if (isset($_GET['del_box'])) {

    $delete_id = $_GET['del_box'];

    $delete_slide = "DELETE FROM boxes_section WHERE box_id = '$delete_id' ";
    $delete_slide_run = mysqli_query($conn, $delete_slide);

    if ($delete_slide_run) {
        echo "<script>alert('box deleted successfully')</script>";
        echo "<script>window.open(view_boxes.php,_self)</script>";
    }
}

?>

<?php include "includes/footer.php" ?>