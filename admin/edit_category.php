<?php include "includes/head.php" ?>
<?php require_once 'includes/menu.php'; ?>

<?php

if (isset($_GET['cat_id'])) {
    $edit_id = $_GET['cat_id'];

    $get_cat = "SELECT * FROM categories WHERE cat_id = '$edit_id'";

    $cat_run = mysqli_query($conn, $get_cat);

    $category_row = mysqli_fetch_assoc($cat_run);
}

?>

<?php require_once 'includes/sideBar.php'; ?>
<nav class="container mt-3">
    <!-- breadcrumb-starts -->

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"> <i class="fa fa-dashboard me-2"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"> edit category</li>
    </ul>

</nav>
<section class="py-3">

    <h1 class="text-success text-center">Edit category</h1>


    <div class="card-body text-center container py-4">

        <form action="" class="mb-3" enctype="multipart/form-data" method="POST">
            <!-- add_product-form-ends -->
            <div class="row g-3 mb-3 align-items-center my-3">
                <!-- Product-row-starts -->
                <div class="col-3">
                    <label class="col-form-label"><b>category title</b></label>
                </div>

                <div class="col-9">
                    <input required type="text" class="form-control" value="<?= $category_row['cat_title'] ?>" name="category_title">
                </div>

            </div> <!-- category_title-row-ends -->

            <div class="row g-3 mb-3 align-items-center my-3">
                <!-- Product-row-starts -->
                <div class="col-3">
                    <label class="col-form-label"><b>category description</b></label>
                </div>

                <div class="col-9">
                    <input required type="text" class="form-control " value="<?= $category_row['cat_desc'] ?>" name="category_description">
                </div>

            </div> <!-- category_description-row-ends -->

            <button type="submit" name="edit_category" class="btn btn-success">Edit category</button>
        </form> <!-- category-form-ends -->


    </div>

</section>

<?php
if (isset($_POST['edit_category'])) {

    $cat_title = $_POST['category_title'];
    $category_description = $_POST['category_description'];

    $edit_cat = "UPDATE `categories` SET `cat_title`='$cat_title',`cat_desc`='$category_description' WHERE cat_id = $edit_id";
    $check_edit =  mysqli_query($conn, $edit_cat);

    if ($check_edit) {

        echo "<script>alert('category edited successfully')</script>";

        echo "<script>window.open('index.php','_self')</script>";
    } else {

        echo "<script>alert('something went wrong')</script>";

        echo "<script>window.open('add_category.php','_self')</script>";
    }
}
?>

<?php include "includes/footer.php" ?>