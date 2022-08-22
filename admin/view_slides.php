<?php include "includes/head.php" ?>
<?php require_once 'includes/menu.php'; ?>
<?php require_once 'includes/sideBar.php'; ?>


<nav class=" mt-3">
    <!-- breadcrumb-starts -->

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"> <i class="fa fa-dashboard me-2"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Slides</li>
    </ul>

</nav>

<div class="card w-100 ">
    <div class="card-header text-dark py-2">
        <h5 class="lead"><i class="fa-solid fa-money-bill me-2"></i> View slides</h5>
    </div> <!-- card-header -->
    <div class="card-body text-dark text-center">
        <div class="row">
            <?php
            $get_slides = mysqli_query($conn, "SELECT * FROM slider");
            while ($slide_row = mysqli_fetch_assoc($get_slides)) :
            ?>
                <div class="col-md-3">
                    <div class="card border border-primary border-1 ">

                        <div class="card-header text-white bg-primary  ">
                            <h5 class="lead"> <?= $slide_row['slide_name'] ?> </h5>
                        </div> <!-- card-header -->

                        <div class="card-body text-dark text-center ">
                            <img src="slides_images/<?= $slide_row['slide_image'] ?>" height="90" alt="">
                        </div><!-- card-body -->

                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <a style="text-decoration: none;" href="view_slides.php?del_slide=<?= $slide_row['slide_id'] ?>" class="text-danger"><i class="fa fa-trash"></i> Delete</a>

                                <a style="text-decoration: none;" href="edit_slides.php?edit_slide=<?= $slide_row['slide_id'] ?>" class="text-warning"><i class="fa fa-edit"></i> Edit</a>

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
if(isset($_GET['del_slide'])){

    $delete_id = $_GET['del_slide'];

    $delete_slide = "DELETE FROM slider WHERE slide_id = '$delete_id' ";
    $delete_slide_run = mysqli_query($conn,$delete_slide);

    if($delete_slide_run){
        echo "<script>alert('slide deleted successfully')</script>";
        echo "<script>window.open(view_slides.php,_self)</script>";

    }


}

?>

<?php include "includes/footer.php" ?>