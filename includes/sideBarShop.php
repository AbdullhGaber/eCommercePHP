<div class="card">
    <!-- card-starts -->
    <div class="card-header">
        <!-- card-header-starts -->
        <h4>Products categories</h4>
    </div> <!-- card-header-ends -->

    <div class="card-body">
        <!-- card-body-starts -->
        <ul class="list-group list-group-flush">
            <?php
            $product_categories_sql = "SELECT * FROM product_categories";
            $product_categories_run = mysqli_query($conn, $product_categories_sql);
            while ($product_categories_row = mysqli_fetch_assoc($product_categories_run)) :
            ?>
                <a href="./shop_p_category.php?p_cat_id=<?= $product_categories_row['p_cat_id'] ?>" class="list-group-item list-group-item-action"><?= $product_categories_row['p_cat_title'] ?></a>
            <?php endwhile ?>
        </ul>

    </div><!-- card-body-ends -->
</div> <!-- card-ends -->


<div class="card mt-3">
    <!-- card-starts -->
    <div class="card-header">
        <!-- card-header-starts -->
        <h4>Categories</h4>
    </div> <!-- card-header-ends -->

    <div class="card-body">
        <!-- card-body-starts -->
        <ul class="list-group list-group-flush">
            <?php
            $categories_sql = "SELECT * FROM categories";
            $categories_run = mysqli_query($conn, $categories_sql);
            while ($categories_row = mysqli_fetch_assoc($categories_run)) :
            ?>
                <a href="./shop_category.php?cat_id=<?= $categories_row['cat_id'] ?>" class="list-group-item list-group-item-action"><?= $categories_row['cat_title'] ?></a>
            <?php endwhile; ?>
        </ul>

    </div><!-- card-body-ends -->
</div> <!-- card-ends -->