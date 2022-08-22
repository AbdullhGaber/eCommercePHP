<?php include "includes/head.php" ?>
<?php include "includes/navBarTop.php" ?>
<?php include "includes/db.php" ?>
<style>
    ul a.list-group-item {
        border: none;
        padding: 10px 10px;
        font-size: 18px;
    }
</style>
<nav class="container mt-3">
    <!-- breadcrumb-starts -->

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Shop</li>
    </ul>


</nav> <!-- breadcrumb-ends -->
<?php
if (isset($_GET['cat_id'])) {
    $cat_id = $_GET['cat_id'];
    $category_view_sql = "SELECT * FROM products WHERE `cat_id` = $cat_id";
    $category_view_run = mysqli_query($conn, $category_view_sql);
}

?>
<section class="container py-3 ">

    <div class="row">
        <div class="col-md-3">
            <?php include "includes/sideBarShop.php"; ?>
        </div>

        <div class="col-md-9">
            <!-- col-9-starts -->
            <div class="card bg-white border border-2  py-5 container text-dark mb-4" style="box-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);">
                <h2 class="card-title mb-2">Shop</h2>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam ex, odit excepturi, asperiores sunt eligendi velit quia consectetur labore maxime sequi totam amet sint fuga repellat quo necessitatibus ipsa quos!</p>
            </div>
            <div class="row">
                <!-- row-starts -->
                <?php
                if (mysqli_num_rows($category_view_run) == 0) {

                    echo "<div class = 'alert alert-danger text-center'>
                    No product were found in this category !</div> ";

                } else {
                    while ($category_view_row = mysqli_fetch_assoc($category_view_run)) :
                ?>
                        <div class="col-md-4">
                            <!-- col-4-starts -->
                            <div class="card text-center">
                                <!-- card-starts -->
                                <img src="admin/product_images/<?= $category_view_row['product_img1'] ?>" class="card-img-top">
                                <div class="card-body py-3">
                                    <!-- card-body-starts -->
                                    <h4 class="card-title mb-2"><?= $category_view_row['product_title'] ?></h4>
                                    <h5 class="card-text mb-2 text-muted">$<?= $category_view_row['product_price'] ?></h5>
                                    <div class="d-flex justify-content-center">
                                        <!-- flex-box-starts -->
                                        <a href="details.php?product_id=<?= $category_view_row['product_id'] ?>" class="btn  border border-2 me-3">View details</a>
                                        <a href="cart.php?product_id=<?= $category_view_row['product_id'] ?>" class="btn btn-success border border-2"><i class="fa fa-shopping-cart"></i> Add
                                            to cart</a>
                                    </div><!-- flex-box-ends -->

                                </div><!-- card-body-ends -->
                            </div><!-- card-ends -->
                        </div> <!-- col-4-ends -->
                <?php endwhile;
                } ?>



            </div> <!-- row-ends -->

            <nav>
                <ul class="pagination justify-content-center mt-5">
                    <li class="page-item">
                        <a class="page-link" href="shop_category.php?page=1&cat_id=<?= $cat_id ?>">First page</a>
                    </li>
                    <?php
                    $products_numbers = mysqli_num_rows($category_view_run);
                    $total_page = ceil($products_numbers / $per_page);
                    for ($i = 1; $i <= $total_page; $i++) :

                    ?>
                        <li class="page-item"><a class="page-link" href="shop.php?page=<?= $i ?>"><?= $i ?></a></li>
                    <?php endfor; ?>
                    <li class="page-item">
                        <a class="page-link" href="shop_category.php?page=<?php if($total_page>0){echo $total_page;} else{echo 1 ;}  ?>&cat_id=<?= $cat_id ?>">Last page</a>
                    </li>
                </ul>
            </nav>

        </div> <!-- col-9-ends -->
    </div>

</section>

<?php include "includes/footer.php" ?>