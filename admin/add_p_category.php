<?php include "includes/head.php" ?>
<?php require_once 'includes/menu.php'; ?>
<?php
if (isset($_POST['add_category'])) {

    $cat_title = $_POST['category_title'];
    $category_description = $_POST['category_description'];

    $add_cat = "INSERT INTO `product_categories`(`p_cat_title`, `p_cat_desc`) VALUES ('$cat_title','$category_description')";
    $check_add =  mysqli_query($conn, $add_cat);

    if ($check_add) {

        echo "<script>alert('product category added successfully')</script>";

        echo "<script>window.open('index.php','_self')</script>";
    } else {

        echo "<script>alert('something went wrong')</script>";

        echo "<script>window.open('add_p_category.php','_self')</script>";
    }
}


?>


<?php require_once 'includes/sideBar.php'; ?>
<nav class="container mt-3">
    <!-- breadcrumb-starts -->

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"> <i class="fa fa-dashboard me-2"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"> add product category</li>
    </ul>

</nav>
<section class="py-3">

    <h1 class="text-success text-center">Add product category</h1>


    <div class="card-body text-center container py-4">
        <form action="" class="mb-3" enctype="multipart/form-data" method="POST">
            <!-- add_product-form-ends -->
            <div class="row g-3 mb-3 align-items-center my-3">
                <!-- Product-row-starts -->
                <div class="col-3">
                    <label class="col-form-label"><b>product category title</b></label>
                </div>

                <div class="col-9">
                    <input required type="text" class="form-control " name="category_title">
                </div>

            </div> <!-- category_title-row-ends -->

            <div class="row g-3 mb-3 align-items-center my-3">
                <!-- Product-row-starts -->
                <div class="col-3">
                    <label class="col-form-label"><b>product category description</b></label>
                </div>

                <div class="col-9">
                    <input required type="text" class="form-control " name="category_description">
                </div>

            </div> <!-- category_description-row-ends -->

            <button type="submit" name="add_category" class="btn btn-success">Add product category</button>
        </form> <!-- category-form-ends -->


    </div>

</section>
<?php include "includes/footer.php" ?>