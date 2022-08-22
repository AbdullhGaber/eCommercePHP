<?php include "includes/head.php" ?>
<?php require_once 'includes/menu.php'; ?>
<?php require_once 'includes/sideBar.php'; ?>


<nav class=" mt-3">
    <!-- breadcrumb-starts -->

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"> <i class="fa fa-dashboard me-2"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Slides</li>
    </ul>

</nav>

<div class="card w-100 ">
    <div class="card-header text-white bg-primary py-2">
        <h5 class="lead"><i class="fa-solid fa-money-bill me-2"></i> Add slide</h5>
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
                    <input required type="text" class="form-control " name="slide_name">
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

            </div> <!-- category_description-row-ends -->
            <div class="col-6 offset-3">
                <button type="submit" name="add_slide" class="btn btn-success w-100">Add slide</button>
            </div>

        </form> <!-- category-form-ends -->

    </div><!-- card-body -->
</div> <!-- card -->

</div> <!-- row 2/10 -->


<?php

if (isset($_POST['add_slide'])) {

    $slide_name = $_POST['slide_name'];
    $image_name = $_FILES['slide_image']['name'];
    $image_temp = $_FILES['slide_image']['tmp_name'];

    $get_slides = "SELECT * FROM slider";
    $run_slides = mysqli_query($conn, $get_slides);

    $count = mysqli_num_rows($run_slides);

    if ($count < 4) {
        move_uploaded_file($image_temp, "slides_images/$image_name");

        $insert_slide = "INSERT INTO `slider`(`slide_name`, `slide_image`) VALUES ('$slide_name','$image_name')";
        $slide_run = mysqli_query($conn, $insert_slide);

        if ($slide_run) {

            echo "<script>alert('slide added successfully')</script>";

            echo "<script>window.open('index.php','_self')</script>";
        } else {

            echo "<script>alert('something went wrong')</script>";
        }
    } else {

        echo "<script>alert('you have exceeded the maximum number of slides you can insert')</script>";

        echo "<script>window.open('add_slides.php','_self')</script>";
    }
}

?>

<?php include "includes/footer.php" ?>