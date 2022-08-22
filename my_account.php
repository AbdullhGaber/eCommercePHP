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
            <?php include "includes/cus_sidebar.php" ?>
        </div> <!-- col-3 ends -->
        <div class="col-md-9">

        <?php 
        
        if(isset($_GET['myOrders']))
        include "includes/myOrders.php";


        if(isset($_GET['payOffline']))
        include "includes/payOffline.php";

        if(isset($_GET['editAccount']))
        include "includes/editAccount.php";

        if(isset($_GET['chgPassword']))
        include "includes/changePassword.php";

        if(isset($_GET['dltAccount']))
        include "includes/deleteAccount.php";
        ?>

        </div> <!-- col-9 ends -->
    </div>

</section>

<?php include "includes/footer.php" ?>