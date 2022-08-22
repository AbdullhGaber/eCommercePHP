<?php include "includes/head.php" ?>
<?php include "includes/navBarTop.php" ?>
<?php include "includes/db.php" ?>


<section class="container my-5">

    <div id="carousel_1" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $slides_sql = "SELECT * FROM  slider LIMIT 0,1";
            $slides_obj  = mysqli_query($conn, $slides_sql);

            while ($slides_row = mysqli_fetch_assoc($slides_obj)) :
            ?>
                <div class="carousel-item active ">
                    <img src="admin/slides_images/<?= $slides_row["slide_image"] ?>" class="d-block w-100">
                </div>
            <?php endwhile; ?>


            <?php
            $slides_sql = "SELECT * FROM  slider LIMIT 1,3";
            $slides_obj  = mysqli_query($conn, $slides_sql);

            while ($slides_row = mysqli_fetch_assoc($slides_obj)) :
            ?>
                <div class="carousel-item">
                    <img src="admin/slides_images/<?= $slides_row["slide_image"] ?>" class="d-block w-100">
                </div>
            <?php endwhile; ?>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel_1" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel_1" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section> <!-- carousel-section-ends -->

<section class="container my-5">
    <!-- features-section-starts -->
    <div class="row">
        <?php
        $get_boxes = "SELECT * FROM boxes_section";

        $run_boxes = mysqli_query($conn, $get_boxes);

        while ($box_row = mysqli_fetch_assoc($run_boxes)) :
        ?>
            <div class="col-md-4">
                <!-- col-4-starts -->
                <div class="card bg-white border border-2  p-4 container text-dark text-center" style=" height: 150px;">
                    <h4 class="card-title text-uppercase mb-4" style="color: rgb(30,144,255);font-weight:light;"><?=$box_row['box_title']?></h4>
                    <p class="card-text"><?=$box_row['box_desc']?></p>
                </div>
            </div> <!-- col-4-ends -->
        <?php endwhile; ?>

    </div>

</section> <!-- features-section-ends -->

<div class="py-4 mb-5 " style="  background-color: white;">
    <!-- latest-div-starts -->
    <h1 class="text-center text-uppercase lead fs-2">latest this week</h1>
</div> <!-- latest-div-ends -->

<section class="container py-4">
    <!-- products-section-starts -->
    <div class="row">
        <?php
        $view_latest_product_sql = "SELECT * FROM products  ORDER BY `product_id` DESC LIMIT 0,4 ";
        $view_latest_product_run = mysqli_query($conn, $view_latest_product_sql);

        while ($view_latest_product_row = mysqli_fetch_assoc($view_latest_product_run)) :
        ?>
            <div class="col-md-3">
                <div class="card text-center">
                    <!-- card-starts -->
                    <span class="wdp-ribbon wdp-ribbon-two"><b>Sale</b></span>
                    <img src="admin/product_images/<?= $view_latest_product_row['product_img1'] ?>" class="card-img-top ">
                    <div class="card-body py-3">
                        <!-- card-body-starts -->
                        <h4 class="card-title mb-2"><?= $view_latest_product_row['product_title'] ?></h4>
                        <h5 class="card-text mb-2 text-muted">$<?= $view_latest_product_row['product_price'] ?></h5>
                        <div class="d-flex justify-content-center">
                            <!-- flex-box-starts -->
                            <a href="details.php?product_id=<?= $view_latest_product_row['product_id'] ?>" class="btn  border border-2 me-3">View details</a>
                            <a href="cart.php?product_id=<?= $view_latest_product_row['product_id'] ?>" class="btn btn-success border border-2"><i class="fa fa-shopping-cart"></i> Add
                                to cart</a>
                        </div><!-- flex-box-ends -->

                    </div><!-- card-body-ends -->
                </div><!-- card-ends -->
            </div> <!-- col-3-ends -->
        <?php endwhile; ?>


    </div> <!-- row-ends -->
</section><!-- products-section-ends -->

<?php include "includes/footer.php" ?>