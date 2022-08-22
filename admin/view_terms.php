<?php include "includes/head.php" ?>
<?php require_once 'includes/menu.php'; ?>
<?php require_once 'includes/sideBar.php'; ?>


<nav class=" mt-3">
    <!-- breadcrumb-starts -->

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"> <i class="fa fa-dashboard me-2"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Terms</li>
    </ul>

</nav>

<div class="card w-100 ">
    <div class="card-header text-dark py-2">
        <h5 class="lead"><i class="fa-solid fa-money-bill me-2"></i> View Terms</h5>
    </div> <!-- card-header -->
    <div class="card-body text-dark text-center">
        <div class="row">
            <?php
            $get_terms = mysqli_query($conn, "SELECT * FROM terms");
            while ($term_row = mysqli_fetch_assoc($get_terms)) :
            ?>
                <div class="col-md-4">
                    <div class="card border border-primary border-1 ">

                        <div class="card-header text-white bg-primary  ">
                            <h5 class="lead"> <?= $term_row['term_title'] ?> </h5>
                        </div> <!-- card-header -->

                        <div class="card-body text-dark text-center ">
                            <p><?=substr($term_row['term_desc'],0,400)?></p>
                        </div><!-- card-body -->

                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <a style="text-decoration: none;" href="view_terms.php?del_term=<?= $term_row['term_id'] ?>" class="text-danger"><i class="fa fa-trash"></i> Delete</a>

                                <a style="text-decoration: none;" href="edit_term.php?edit_term=<?= $term_row['term_id'] ?>" class="text-warning"><i class="fa fa-edit"></i> Edit</a>

                            </div><!-- flex-box -->
                        </div> <!-- card-footer -->
                    </div> <!-- card -->
                </div><!-- col-3 -->
            <?php endwhile; ?>
        </div> <!-- row -->
    </div> <!-- card-body -->
</div> <!-- card -->

</div> <!-- row 2/10 -->


<?php
if(isset($_GET['del_term'])){

    $delete_id = $_GET['del_term'];

    $delete_term = "DELETE FROM terms WHERE term_id = '$delete_id' ";
    $delete_term_run = mysqli_query($conn,$delete_term);

    if($delete_term_run){
        echo "<script>alert('term deleted successfully')</script>";
        echo "<script>window.open(view_slides.php,_self)</script>";

    }


}

?>

<?php include "includes/footer.php" ?>