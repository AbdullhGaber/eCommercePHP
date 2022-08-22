<div class="card  p-4">

    <h2 class="text-center fs-1">Edit your account</h2>
    <?php
    $user_row = getUserInfo();

    if (isset($_POST['update_customer'])) {
        $customer_name = $_POST['customer_name'];
        $customer_email = $_POST['customer_email'];
        $customer_country = $_POST['customer_country'];
        $customer_city = $_POST['customer_city'];
        $customer_contact = $_POST['customer_contact'];
        $customer_address = $_POST['customer_address'];
        $img_name = $_FILES['customer_img']['name'];
        $img_tmp = $_FILES['customer_img']['tmp_name'];

        $update_user_sql = "UPDATE `customers` SET `customer_name`='$customer_name',`customer_email`='$customer_email',`customer_country`='$customer_country',`customer_city`='$customer_city',`customer_contact`='$customer_contact',`customer_address`='$customer_address',`customer_image`='$img_name' WHERE customer_email = '$user_row[customer_email]'";
        move_uploaded_file($img_tmp,"./customer/customer_images/$img_name");
        mysqli_query($conn,$update_user_sql);
    }


    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        
        <div class="mb-3">
            <!-- name-input starts -->
            <label><b>Customer name</b></label>
            <input type="text" name="customer_name"  value="<?= $user_row['customer_name'] ?>" class="form-control mt-2">
        </div> <!-- name-input ends  -->

        <div class="mb-3">
            <!-- email-input starts -->
            <label><b>Customer email</b></label>
            <input type="text" name="customer_email" value="<?= $user_row['customer_email'] ?>" class="form-control mt-2">
        </div> <!-- email-input ends  -->

        <div class="mb-3">
            <!-- country-input starts -->
            <label><b>Customer country</b></label>
            <input type="text" name="customer_country" value="<?= $user_row['customer_country'] ?>" class="form-control mt-2">
        </div> <!-- country-input ends  -->

        <div class="mb-3">
            <!-- city-input starts -->
            <label><b>Customer city</b></label>
            <input type="text" name="customer_city" value="<?= $user_row['customer_city'] ?>" class="form-control mt-2">
        </div> <!-- city-input ends  -->

        <div class="mb-3">
            <!-- contact-input starts -->
            <label><b>Customer contact</b></label>
            <input type="text" name="customer_contact" value="<?= $user_row['customer_contact'] ?>" class="form-control mt-2">
        </div> <!-- contact-input ends  -->

        <div class="mb-3">
            <!-- address-input starts -->
            <label><b>Customer address</b></label>
            <input type="text" name="customer_address" value="<?= $user_row['customer_address'] ?>" class="form-control mt-2">
        </div> <!-- address-input ends  -->

        <div class="mb-3">
            <!-- image-input starts -->
            <label><b>Customer image</b></label>
            <input type="file" name="customer_img" class="form-control mt-2">
        </div> <!-- image-input ends  -->
        <div>
            <img src="./customer/customer_images/<?= $user_row['customer_image'] ?>" height="75" class="mt-3">
        </div>
        <button type="submit" name="update_customer" class="btn btn-success btn-sm d-block mx-auto"><i class="fa fa-user"></i> Update now</button>
    </form>

</div>