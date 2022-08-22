<section class="py-4 " style="background-color: #DFDFDF;">
    <!-- footer-section-starts -->
    <div class="container">
        <!-- container-ends -->
        <div class="row align-items-start">
            <!-- row-starts -->

            <div class="col-md-3  mt-3 mt-md-0">
                <!-- col-3-starts -->

                <h5 class="mb-3">Pages</h5>

                <div style="line-height: 10px;">

                    <a href="cart.php" style=" text-decoration: none;">
                        <p class="text-muted">Shopping cart</p>
                    </a>

                    <a href="contact.php" style=" text-decoration: none;">
                        <p class="text-muted">Contact us</p>
                    </a>

                    <a href="shop.php" style=" text-decoration: none;">
                        <p class="text-muted">Shop</p>
                    </a>

                    <a href="checkout.php" style=" text-decoration: none;">
                        <p class="text-muted">My account</p>
                    </a>

                </div>


                <div class="mt-5 d-none d-md-block">
                    <h5 class="mb-3">User section</h5>
                    <div style="line-height: 10px;">

                        <a href="cart.php" style=" text-decoration: none;">
                            <p class="text-muted">Login</p>
                        </a>

                        <a href="contact.php" style=" text-decoration: none;">
                            <p class="text-muted">Register</p>
                        </a>
                    </div>
                </div>


            </div><!-- col-3-ends -->

            <div class="col-md-3 mt-3 mt-md-0">
                <!-- col-3-starts  -->

                <h5 class="mb-3">Top categories</h5>
                <div style="line-height: 10px;">
                    <?php
                    $product_categories_sql = "SELECT * FROM product_categories";
                    $product_categories_run = mysqli_query($conn, $product_categories_sql);
                    while ($product_categories_row = mysqli_fetch_assoc($product_categories_run)) :
                    ?>
                        <a href="shop_p_category.php?p_cat_id=<?= $product_categories_row['p_cat_id'] ?>" style=" text-decoration: none;">
                            <p class="text-muted"><?= $product_categories_row['p_cat_title']?></p>
                        </a>
                    <?php endwhile; ?>
                </div>
            </div> <!-- col-3-ends -->

            <div class="col-md-3 mt-3 mt-md-0">
                <!-- col-3-starts  -->

                <h5 class="mb-3">Where to find us</h5>
                <div style="line-height: 10px;">


                    <p>Computerfever Ltd.</p>
                    <p>Mansoura</p>
                    <p>01010440206</p>
                    <p>drabdullh2002.1@gmail.com</p>
                    <b>Abdullh Gaber</b>

                </div>
                <a href="contact.php" style=" text-decoration: none;">
                    <p class="text-muted mt-3">Go to contact page</p>
                </a>
            </div> <!-- col-3-ends -->

            <div class="col-md-3 mt-3 mt-md-0  mt-3 mt-md-0">
                <!-- col-3-starts  -->

                <h5 class="mb-3">Get the news</h5>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis perferendis voluptatibus
                    libero magnam, recusandae aspernatur.</p>

                <form class="d-flex ">
                    <input class="form-control" type="text">
                    <button class="btn btn-light border border-3" type="submit">Subscribe</button>
                </form>

                <div class="mt-5 d-inline-block">
                    <h5>Stay in touch</h5>

                    <div class="d-flex">
                        <a href="#" class=" text-dark"><i class="fab fa-facebook  fa-2x"></i></a>
                        <a href="#" class=" text-dark"> <i class="fab fa-twitter ms-3 fa-2x"></i></a>
                        <a href="#" class=" text-dark"><i class="fab fa-instagram ms-3 fa-2x"></i></a>
                        <a href="#" class=" text-dark"><i class="fab fa-google-plus ms-3 fa-2x"></i></a>
                        <a href="#" class=" text-dark"><i class="fa fa-envelope ms-3 fa-2x"></i></a>
                    </div>
                </div>
            </div><!-- col-3-ends -->

            <div class="col-md-3">

                <div class="mt-5 d-block d-md-none ">
                    <h5 class="mb-3">User section</h5>
                    <div style="line-height: 10px;">

                        <a href="cart.php" style=" text-decoration: none;">
                            <p class="text-muted">Login</p>
                        </a>

                        <a href="contact.php" style=" text-decoration: none;">
                            <p class="text-muted">Register</p>
                        </a>
                    </div>
                </div>

            </div>

        </div> <!-- row-ends -->

    </div> <!-- container-ends -->
</section> <!-- footer-section-ends -->

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <!-- footer-nav-starts -->
    <div class="container pt-3">

        <p class="text-secondary">Created by Abdullh Gaber &copy; 2022</p>


    </div>
</nav> <!-- footer-nav-ends -->


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>