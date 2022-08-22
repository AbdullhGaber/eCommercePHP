<?php include "includes/head.php" ?>
<?php include "includes/navBarTop.php" ?>

<nav class="container mt-3">
    <!-- breadcrumb-starts -->

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Contact us</li>
    </ul>


</nav> <!-- breadcrumb-ends -->
<section class="container py-3 ">

    <div class="row">
        <div class="col-md-3">
            <?php include "includes/sideBarShop.php"; ?>
        </div>

        <div class="col-md-9">
            <div class="card">
            <?php
if(isset($_POST['message_submit'])){
    $name = $_POST['user_name'];
    $sender_email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    //
    echo "<div class='alert alert-success text-center'>your message was sent successfully</div>";
    }

?>

                <div class="card-header text-center container py-4">
                    <!-- card-header-starts -->
                    <h2>Contact us</h2>
                    <p class="text-muted">if you have any question, please feel free to contact us, our customer service center is working for you 24/7</p>
                </div> <!-- card-header-ends -->
                <div class="card-body text-center container py-4">
                    <form action="" class="mb-3" method="POST">
                        <!-- contact-form-ends -->
                        <div class="row g-3 mb-3 align-items-center my-3">
                            <!-- Name-row-starts -->
                            <div class="col-3">
                                <label class="col-form-label"><b>Name</b></label>
                            </div>

                            <div class="col-9">
                                <input required name="user_name" type="text" class="form-control ">
                            </div>

                        </div> <!-- Name-row-ends -->

                        <div class="row g-3 mb-3 align-items-center my-3">
                            <!-- Email-row-starts -->
                            <div class="col-3">
                                <label class="col-form-label"><b>Email</b></label>
                            </div>

                            <div class="col-9">
                                <input name="email" required type="email" class="form-control ">
                            </div>

                        </div> <!-- Email-row-ends -->

                        <div class="row g-3 mb-3 align-items-center my-3">
                            <!-- Subject-row-starts -->
                            <div class="col-3">
                                <label class="col-form-label"><b>Subject</b></label>
                            </div>

                            <div class="col-9">
                                <input name="subject" required type="text" class="form-control ">
                            </div>

                        </div> <!-- Subject-row-ends -->

                        <div class="row g-3 mb-3 align-items-center my-3">
                            <!-- Message-row-starts -->
                            <div class="col-3">
                                <label  class="col-form-label"><b>Message</b></label>
                            </div>

                            <div class="col-9">
                               <textarea required name="message" class="form-control "  cols="9" rows="5"></textarea>
                            </div>

                        </div> <!-- Message-row-ends -->

                        <button type="submit" name="message_submit" class="btn btn-success">Send message</button>
                    </form> <!-- contact-form-ends -->

                </div> <!-- card-body-ends -->
            </div> <!-- card-ends -->
        </div> <!-- col-9 ends -->
    </div>

</section>


<?php include "includes/footer.php" ?>