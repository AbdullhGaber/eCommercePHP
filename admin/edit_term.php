<?php include "includes/head.php" ?>
<?php require_once 'includes/menu.php'; ?>
<?php require_once 'includes/sideBar.php'; ?>

<?php

if (isset($_GET['edit_term'])) {

    $edit_id = $_GET['edit_term'];

    $get_term_data = "SELECT * FROM terms WHERE term_id = '$edit_id' ";

    $run_term = mysqli_query($conn, $get_term_data);

    $term_row = mysqli_fetch_assoc($run_term);
}

?>

<nav class=" mt-3">
    <!-- breadcrumb-starts -->

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"> <i class="fa fa-dashboard me-2"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Terms</li>
    </ul>

</nav>

<div class="card w-100 ">
    <div class="card-header text-white bg-primary py-2">
        <h5 class="lead"><i class="fa-solid fa-money-bill me-2"></i> Edit Term</h5>
    </div>
    <div class="card-body text-dark text-center">
        <form action="" class="mb-3 container" enctype="multipart/form-data" method="POST">
            <!-- add_product-form-ends -->
            <div class="row g-3 mb-3 align-items-center my-3">
                <!-- Product-row-starts -->
                <div class="col-3">
                    <label class="col-form-label"><b>Term name</b></label>
                </div>

                <div class="col-6">
                    <input required type="text" class="form-control" value="<?= $term_row['term_title'] ?>" name="term_title">
                </div>

            </div> <!-- category_title-row-ends -->

            <div class="row g-3 mb-3 align-items-center my-3">
                <!-- Product-row-starts -->
                <div class="col-3">
                    <label class="col-form-label"><b>Term link</b></label>
                </div>

                <div class="col-6">
                    <input required type="text" class="form-control" value="<?= $term_row['term_link'] ?>" name="term_link">
                </div>

            </div> <!-- category_title-row-ends -->

            <div class="row g-3 mb-3 align-items-center my-3">
                <!-- Product-row-starts -->
                <div class="col-3">
                    <label class="col-form-label"><b>Term description</b></label>
                </div>

                <div class="col-6">
                    <textarea class="form-control" name="term_desc" cols="30" rows="10"><?= $term_row['term_desc'] ?></textarea>
                </div>

            </div> <!-- category_description-row-ends -->
            <div class="col-6 offset-3">
                <button type="submit" name="edit_term" class="btn btn-success w-100">edit term</button>
            </div>

        </form> <!-- category-form-ends -->

    </div><!-- card-body -->
</div> <!-- card -->

</div> <!-- row 2/10 -->


<?php

if (isset($_POST['edit_term'])) {

    $term_title = $_POST['term_title'];
    $term_link = $_POST['term_link'];
    $term_desc = $_POST['term_desc'];

    $insert_term = "UPDATE `terms` SET `term_title`='$term_title',`term_link`='$term_link',`term_desc`='$term_desc' WHERE term_id = '$edit_id'";

    $term_run = mysqli_query($conn, $insert_term);

    if ($term_run) {

        echo "<script>alert('term edited successfully')</script>";

        echo "<script>window.open('view_terms.php','_self')</script>";
    } else {

        echo "<script>alert('something went wrong')</script>";
    }
}

?>

<?php include "includes/footer.php" ?>