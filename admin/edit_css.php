<?php include "includes/head.php" ?>
<?php require_once 'includes/menu.php'; ?>
<?php require_once 'includes/sideBar.php'; ?>

<?php

$file = "../styles/style.css";

if (file_exists($file)) {
    $data = file_get_contents($file);
}

?>
<nav class=" mt-3">
    <!-- breadcrumb-starts -->

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"> <i class="fa fa-dashboard me-2"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit CSS</li>
    </ul>

</nav>

<div class="card w-100 ">
    <div class="card-header text-dark py-2">
        <h5 class="lead"><i class="fa-solid fa-money-bill me-2"></i> Edit CSS</h5>
    </div> <!-- card-header -->
    
    <div class="card-body text-dark ">

        <form action="" method="POST" enctype="multipart/form-data">

            <textarea name="newData" rows="25" class="form-control"><?= $data ?></textarea>

            <div class="col-md-6 offset-3">
                <button type="submit" name="update_css" class="btn btn-primary w-100 mt-3">Update CSS</button>
            </div>

        </form>

        <?php

        if (isset($_POST['update_css'])) {
            $new_data = $_POST['newData'];

            $handle = fopen($file, "w");

            fwrite($handle, $new_data);

            fclose($handle);
            
            echo "<script>alert('CSS file has been edited successfully')</script>";

            echo "<script>window.open('index.php','_self')</script>";
        }

        ?>

    </div> <!-- card-body -->
</div> <!-- card -->

</div> <!-- row 2/10 -->


<?php include "includes/footer.php" ?>