<?php include "includes/head.php" ?>
<?php require_once 'includes/menu.php'; ?>
<?php
if (isset($_POST['add_admin'])) {

    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_pass = $_POST['admin_password'];
    $admin_contact = $_POST['admin_contact'];
    $admin_country = $_POST['admin_country'];
    $admin_job = $_POST['admin_job'];
    $admin_about = $_POST['admin_about'];

    if (isset($_FILES['admin_image']['name'])) {

        $image_name = $_FILES['admin_image']['name'];
        $temp_image = $_FILES['admin_image']['tmp_name'];

        move_uploaded_file($temp_image, "admin_images/$image_name");
    }



    $add_admin_sql = "INSERT INTO `admins`(
        `admin_name`,
        `admin_email`,
        `admin_pass`,
        `admin_image`,
        `admin_contact`,
        `admin_country`,
        `admin_job`,
        `admin_about`
    )
    VALUES(
        '$admin_name',
        '$admin_email',
        '$admin_pass',
        '$image_name',
        '$admin_contact',
        '$admin_country',
        '$admin_job',
        '$admin_about'
    )";

    $add_admin_run = mysqli_query($conn, $add_admin_sql);
    if ($add_admin_run) {

        echo "<script>alert('admin added successfully')</script>";

        echo "<script>window.open('index.php','_self')</script>";
    } else {

        echo "<script>alert('something went wrong')</script>";

        echo "<script>window.open('add_admin.php','_self')</script>";
    }
}


?>


<?php require_once 'includes/sideBar.php'; ?>
<nav class="container mt-3">
    <!-- breadcrumb-starts -->

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"> <i class="fa fa-dashboard me-2"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">add admin</li>
    </ul>

</nav>
<section class="py-3">

    <h1 class="text-success text-center">Add admin</h1>


    <div class="card-body text-center container py-4">
        <form action="" class="mb-3" enctype="multipart/form-data" method="POST">
            <!-- add_admin-form-ends -->
            <div class="row g-3 mb-3 align-items-center my-3">
                <!-- admin_name-row-starts -->
                <div class="col-3">
                    <label class="col-form-label"><b>Name</b></label>
                </div>

                <div class="col-9">
                    <input required type="text" class="form-control " name="admin_name">
                </div>

            </div> <!-- admin_name-row-ends -->

            <div class="row g-3 mb-3 align-items-center my-3">
                <!-- admin_email-row-starts -->
                <div class="col-3">
                    <label class="col-form-label"><b>Email</b></label>
                </div>

                <div class="col-9">
                    <input type="email" name="admin_email" class="form-control">
                </div>

            </div> <!-- admin_email-row-ends -->

            <div class="row g-3 mb-3 align-items-center my-3">
                <!-- admin_password-row-starts -->
                <div class="col-3">
                    <label class="col-form-label"><b>Password</b></label>
                </div>

                <div class="col-9">
                    <input type="password" name="admin_password" class="form-control">
                </div>

            </div> <!-- admin_password-row-ends -->

            <div class="row g-3 mb-3 align-items-center my-3">
                <!-- admin_image-row-starts -->
                <div class="col-3">
                    <label class="col-form-label"><b>image</b></label>
                </div>

                <div class="col-9">
                    <input type="file" name="admin_image" class="form-control">
                </div>

            </div> <!-- admin_image-row-ends -->


            <div class="row g-3 mb-3 align-items-center my-3">
                <!-- admin_contact-row-starts -->
                <div class="col-3">
                    <label class="col-form-label"><b>Phone number</b></label>
                </div>

                <div class="col-9">
                    <input required type="text" class="form-control " name="admin_contact">
                </div>

            </div> <!-- admin_contact-row-ends -->

            <div class="row g-3 mb-3 align-items-center my-3">
                <!-- admin_country-row-starts -->
                <div class="col-3">
                    <label class="col-form-label"><b>Country</b></label>
                </div>

                <div class="col-9">
                    <input required type="text" class="form-control " name="admin_country">
                </div>

            </div> <!-- admin_country-row-ends -->

            <div class="row g-3 mb-3 align-items-center my-3">
                <!-- admin_job-row-starts -->
                <div class="col-3">
                    <label class="col-form-label"><b>Job</b></label>
                </div>

                <div class="col-9">
                    <input required type="text" class="form-control " name="admin_job">
                </div>

            </div> <!-- admin_country-row-ends -->

            <div class="row g-3 mb-3 align-items-center my-3">
                <!-- admin_about-row-starts -->
                <div class="col-3">
                    <label class="col-form-label"><b>About</b></label>
                </div>

                <div class="col-9">
                    <textarea required class="form-control" name="admin_about" cols="9" rows="5"></textarea>
                </div>

            </div> <!-- admin_about-row-ends -->

            <button type="submit" name="add_admin" class="btn btn-success">Add admin</button>
        </form> <!-- add_admin-form-ends -->


    </div>

</section>
<?php include "includes/footer.php" ?>