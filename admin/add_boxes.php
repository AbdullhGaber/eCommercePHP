<?php include "includes/head.php" ?>
<?php require_once 'includes/menu.php'; ?>
<?php require_once 'includes/sideBar.php'; ?>


<nav class=" mt-3">
    <!-- breadcrumb-starts -->

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"> <i class="fa fa-dashboard me-2"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Boxes</li>
    </ul>

</nav>

<div class="card w-100 ">
    <div class="card-header text-white bg-primary py-2">
        <h5 class="lead"><i class="fa-solid fa-money-bill me-2"></i> Add Box</h5>
    </div>
    <div class="card-body text-dark text-center">
        <form action="" class="mb-3 container" enctype="multipart/form-data" method="POST">
            <!-- add_product-form-ends -->
            <div class="row g-3 mb-3 align-items-center my-3">
                <!-- Product-row-starts -->
                <div class="col-3">
                    <label class="col-form-label"><b>Box name</b></label>
                </div>

                <div class="col-6">
                    <input required type="text" class="form-control " name="box_title">
                </div>

            </div> <!-- category_title-row-ends -->

            <div class="row g-3 mb-3 align-items-center my-3">
                <!-- Product-row-starts -->
                <div class="col-3">
                    <label class="col-form-label"><b>Box description</b></label>
                </div>

                <div class="col-6">
                    <textarea class="form-control" name="box_desc" cols="30" rows="10"></textarea>
                </div>

            </div> <!-- category_description-row-ends -->
            <div class="col-6 offset-3">
                <button type="submit" name="add_box" class="btn btn-success w-100">Add box</button>
            </div>

        </form> <!-- category-form-ends -->

    </div><!-- card-body -->
</div> <!-- card -->

</div> <!-- row 2/10 -->


<?php

if (isset($_POST['add_box'])) {

    $box_name = $_POST['box_title'];
    $box_desc = $_POST['box_desc'];
       
        $insert_box = "INSERT INTO `boxes_section`( `box_title`, `box_desc`) VALUES ('$box_name','$box_desc')";
        $box_run = mysqli_query($conn, $insert_box);

        if ($box_run) {

            echo "<script>alert('box added successfully')</script>";

            echo "<script>window.open('view_boxes.php','_self')</script>";
        } else {

            echo "<script>alert('something went wrong')</script>";
        }
     
}

?>

<?php include "includes/footer.php" ?>