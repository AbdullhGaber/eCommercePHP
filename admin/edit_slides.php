<?php include "includes/head.php" ?>
<?php require_once 'includes/menu.php'; ?>
<?php require_once 'includes/sideBar.php'; ?>

<?php

if (isset($_GET['edit_slide'])) {

    $edit_id = $_GET['edit_slide'];

    $get_slide_data = "SELECT * FROM slider WHERE slide_id = '$edit_id' ";

    $run_slide = mysqli_query($conn, $get_slide_data);

    $slide_row = mysqli_fetch_assoc($run_slide);
}

?>

<nav class=" mt-3">
    <!-- breadcrumb-starts -->

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"> <i class="fa fa-dashboard me-2"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Categories</li>
    </ul>

</nav>

<div class="card w-100 ">
    <div class="card-header text-white bg-primary py-2">
        <h5 class="lead"><i class="fa-solid fa-money-bill me-2"></i> Edit slide</h5>
    </div>
    <div class="card-body text-dark text-center">
        <form action="" class="mb-3 container" enctype="multipart/form-data" method="POST">
            <!-- add_product-form-ends -->
            <div class="row g-3 mb-3 align-items-center my-3">
                <!-- Product-row-starts -->
                <div class="col-3">
                    <label class="col-form-label"><b>Slide name</b></label>
                </div>

                <div class="col-6">
                    <input required type="text" value="<?= $slide_row['slide_name'] ?>" class="form-control " name="slide_name">
                </div>

            </div> <!-- category_title-row-ends -->

            <div class="row g-3 mb-3 align-items-center my-3">
                <!-- Product-row-starts -->
                <div class="col-3">
                    <label class="col-form-label"><b>Slide image</b></label>
                </div>

                <div class="col-6">
                    <input required type="file" class="form-control " name="slide_image">

                </div>

                <div class="col-7 ">
                    <img src="slides_images/<?= $slide_row['slide_image'] ?>" height="50" width="80">
                </div>

            </div> <!-- category_description-row-ends -->

            <div class="col-6 offset-3">
                <button type="submit" name="edit_slide" class="btn btn-success w-100">Edit slide</button>
            </div>

        </form> <!-- category-form-ends -->

    </div><!-- card-body -->
</div> <!-- card -->

</div> <!-- row 2/10 -->


<?php

if (isset($_POST['edit_slide'])) {

    $slide_name = $_POST['slide_name'];
    $image_name = $_FILES['slide_image']['name'];
    $image_temp = $_FILES['slide_image']['tmp_name'];


    move_uploaded_file($image_temp, "slides_images/$image_name");

    $update_slide = "UPDATE `slider` SET `slide_name`='$slide_name',`slide_image`='$image_name' WHERE slide_id = ' $edit_id' ";
    $slide_run = mysqli_query($conn, $update_slide);

    if ($slide_run) {

        echo "<script>alert('slide updated successfully')</script>";

        echo "<script>window.open('view_slides.php','_self')</script>";
    } else {

        echo "<script>alert('something went wrong')</script>";
    }
}

?>

<?php include "includes/footer.php" ?>