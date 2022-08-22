<?php include "includes/head.php" ?>
<?php require_once 'includes/menu.php'; ?>
<?php
if (isset($_POST['add_product'])) {

    $product_title = $_POST['product_title'];
    $product_category = $_POST['product_category'];
    $category = $_POST['category'];
    $product_price = $_POST['product_price'];
    $product_keyword = $_POST['product_keyword'];
    $product_description = $_POST['product_description'];

    if (isset($_FILES['p_image_1']['name']) &&  isset($_FILES['p_image_2']['name']) && isset($_FILES['p_image_3']['name'])) {

        $p_image_1 = $_FILES['p_image_1']['name'];
        $p_image_2 = $_FILES['p_image_2']['name'];
        $p_image_3 = $_FILES['p_image_3']['name'];

        $temp_image_1 = $_FILES['p_image_1']['tmp_name'];
        $temp_image_2 = $_FILES['p_image_2']['tmp_name'];
        $temp_image_3 = $_FILES['p_image_3']['tmp_name'];

        move_uploaded_file($temp_image_1, "product_images/$p_image_1");
        move_uploaded_file($temp_image_2, "product_images/$p_image_2");
        move_uploaded_file($temp_image_3, "product_images/$p_image_3");
    }



    $add_product_sql = "INSERT INTO `products`(
                    `p_cat_id`,
                    `cat_id`,
                    `date`,
                    `product_title`,
                    `product_img1`,
                    `product_img2`,
                    `product_img3`,
                    `product_price`,
                    `product_desc`,
                    `product_keywords`
                )
                VALUES(
                    '$product_category',
                    '$category',
                    NOW(),
                    '$product_title',
                    '$p_image_1',
                    '$p_image_2',
                    '$p_image_3',
                    '$product_price',
                    '$product_description',
                    '$product_keyword')";

    $add_product_run = mysqli_query($conn, $add_product_sql);
}


?>


<?php require_once 'includes/sideBar.php'; ?>
<nav class="container mt-3">
    <!-- breadcrumb-starts -->

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"> <i class="fa fa-dashboard me-2"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">add product</li>
    </ul>

</nav>
<section class="py-3">

    <h1 class="text-success text-center">Add product</h1>


    <div class="card-body text-center container py-4">
        <?php
        if (isset($add_product_run)) {
            echo "<div class = 'alert alert-success'>
              product inserted successfully </div> ";
        }

        ?>
        <form action="" class="mb-3" enctype="multipart/form-data" method="POST">
            <!-- add_product-form-ends -->
            <div class="row g-3 mb-3 align-items-center my-3">
                <!-- Product-row-starts -->
                <div class="col-3">
                    <label class="col-form-label"><b>Product title</b></label>
                </div>

                <div class="col-9">
                    <input required type="text" class="form-control " name="product_title">
                </div>

            </div> <!-- Product-row-ends -->

            <div class="row g-3 mb-3 align-items-center my-3">
                <!-- product_category-row-starts -->
                <div class="col-3">
                    <label class="col-form-label"><b>Product category</b></label>
                </div>

                <div class="col-9">
                    <select name="product_category" class="form-control">
                        <?php

                        $p_category_sql = "SELECT * FROM product_categories";
                        $p_category_run = mysqli_query($conn, $p_category_sql);

                        while ($p_category_row = mysqli_fetch_assoc($p_category_run)) :
                        ?>
                            <option value="<?= $p_category_row['p_cat_id'] ?>">
                                <?= $p_category_row['p_cat_title']; ?>
                            </option>
                        <?php endwhile; ?>

                    </select>
                </div>

            </div> <!-- product_category-row-ends -->

            <div class="row g-3 mb-3 align-items-center my-3">
                <!-- Category-row-starts -->
                <div class="col-3">
                    <label class="col-form-label"><b>Category</b></label>
                </div>

                <div class="col-9">
                    <select name="category" class="form-control">
                        <?php

                        $category_sql = "SELECT * FROM categories";
                        $category_run = mysqli_query($conn, $category_sql);

                        while ($category_row = mysqli_fetch_assoc($category_run)) :
                        ?>
                            <option value="<?= $category_row['cat_id'] ?>">
                                <?= $category_row['cat_title']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

            </div> <!-- category-row-ends -->

            <div class="row g-3 mb-3 align-items-center my-3">
                <!-- Product_image-row-starts -->
                <div class="col-3">
                    <label class="col-form-label"><b>Product image 1</b></label>
                </div>

                <div class="col-9">
                    <input type="file" name="p_image_1" class="form-control">
                </div>

            </div> <!-- Product_image-row-ends -->


            <div class="row g-3 mb-3 align-items-center my-3">
                <!-- Product_image-row-starts -->
                <div class="col-3">
                    <label class="col-form-label"><b>Product image 2</b></label>
                </div>

                <div class="col-9">
                    <input type="file" name="p_image_2" class="form-control">
                </div>

            </div> <!-- Product_image-row-ends -->


            <div class="row g-3 mb-3 align-items-center my-3">
                <!-- Product_image-row-starts -->
                <div class="col-3">
                    <label class="col-form-label"><b>Product image 3</b></label>
                </div>

                <div class="col-9">
                    <input type="file" name="p_image_3" class="form-control">
                </div>

            </div> <!-- Product_image-row-ends -->

            <div class="row g-3 mb-3 align-items-center my-3">
                <!-- Product_price-row-starts -->
                <div class="col-3">
                    <label class="col-form-label"><b>Product price</b></label>
                </div>

                <div class="col-9">
                    <input required type="text" class="form-control " name="product_price">
                </div>

            </div> <!-- Product_price-row-ends -->

            <div class="row g-3 mb-3 align-items-center my-3">
                <!-- Product_keyword-row-starts -->
                <div class="col-3">
                    <label class="col-form-label"><b>Product keyword</b></label>
                </div>

                <div class="col-9">
                    <input required type="text" class="form-control " name="product_keyword">
                </div>

            </div> <!-- Product_keyword-row-ends -->

            <div class="row g-3 mb-3 align-items-center my-3">
                <!-- product_description-row-starts -->
                <div class="col-3">
                    <label class="col-form-label"><b>Product description</b></label>
                </div>

                <div class="col-9">
                    <textarea required class="form-control" name="product_description" cols="9" rows="5"></textarea>
                </div>

            </div> <!-- Message-row-ends -->

            <button type="submit" name="add_product" class="btn btn-success">Add product</button>
        </form> <!-- contact-form-ends -->


    </div>

</section>
<?php include "includes/footer.php" ?>