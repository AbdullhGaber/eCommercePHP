<div class="card">
<?php $user_row = getUserInfo(); ?>
    <div class="card-header text-center p-3">
        <!-- card-header starts -->
        <img src="customer/customer_images/<?= $user_row['customer_image'] ?>" class="img-fluid mb-3" alt="">
        <p>Name : <?=$user_row['customer_name']?></p>
    </div> <!-- card-header ends -->

    <div class="card-body ">

        <nav class="nav nav-pills nav-fill d-flex flex-column  ">
            <a class="nav-link <?php if (isset($_GET['myOrders'])) echo "active" ?> text-start py-3" href="my_account.php?myOrders&cus_id=<?=$user_row['customer_id']?>"><i class="fa-solid fa-bars"></i> My orders</a>

            <a class="nav-link <?php if (isset($_GET['payOffline'])) echo "active" ?> text-start py-3" href="my_account.php?payOffline"><i class="fa-solid fa-bolt"></i> Pay offline</a>

            <a class="nav-link <?php if (isset($_GET['editAccount'])) echo "active" ?> text-start py-3" href="my_account.php?editAccount"><i class="fa-solid fa-pencil"></i> Edit account</a>

            <a class="nav-link <?php if (isset($_GET['chgPassword'])) echo "active" ?> text-start py-3" href="my_account.php?chgPassword"><i class="fa fa-user"></i> Change password</a>

            <a class="nav-link <?php if (isset($_GET['dltAccount'])) echo "active" ?> text-start py-3" href="my_account.php?dltAccount"><i class="fa-solid fa-trash"></i> Delete account</a>

            <a class="nav-link <?php if (isset($_GET['logOut'])) echo "active" ?> text-start py-3" href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>

        </nav>

    </div>
</div>