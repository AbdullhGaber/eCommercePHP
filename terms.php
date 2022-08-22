<?php include "includes/head.php" ?>
<?php include "includes/navBarTop.php" ?>


<nav class="container mt-3">
    <!-- breadcrumb-starts -->

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">My account</li>
    </ul>


</nav> <!-- breadcrumb-ends -->
<section class="container py-3 ">

    <div class="row">
        <div class="col-md-3">
            <!-- col-3 starts -->
            <?php include "includes/terms_sideBar.php" ?>
        </div> <!-- col-3 ends -->
        <div class="col-md-9">
            <?php
            if (isset($_GET['term_id'])) :
                $term_id = $_GET['term_id'];

                $get_terms = "SELECT * FROM terms WHERE term_id = '$term_id' ";

                $run_terms = mysqli_query($conn, $get_terms);

                $row_terms = mysqli_fetch_array($run_terms);

                $term_desc = $row_terms['term_desc'];
                $term_title = $row_terms['term_title'];

            ?>
                <div class="card">

                    <div class="card-header p-3">
                        <h2><b><?= $term_title ?></b></h2>
                    </div>

                    <div class="card-body">
                        <p><?= $term_desc ?></p>
                    </div>

                </div>

            <?php endif ?>
        </div> <!-- col-9 ends -->
    </div>

</section>

<?php include "includes/footer.php" ?>