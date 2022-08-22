<?php include "includes/head.php" ?>
<style>
    .gradient-custom {
        /* fallback for old browsers */
        background: #6a11cb;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
    }
</style>
<section class="vh-200 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">

                            <h2 class="fw-bold mb-2 text-uppercase">Admin Login</h2>
                            <p class="text-white-50 mb-5">Please enter your login and password!</p>

                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-outline form-white mb-4">
                                    <label class="form-label" for="typeEmailX">Email</label>
                                    <input type="email" name="email" id="typeEmailX" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <label class="form-label" for="typePasswordX">Password</label>
                                    <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg" />
                                </div>

                                <button class="btn btn-outline-light btn-lg px-5" name="admin_login" type="submit">Login</button>
                            </form>

                        </div> <!-- login-box -->
                    </div> <!-- card-body -->
                </div> <!-- card -->
            </div> <!-- col-12 -->
        </div>
    </div>
</section>

<?php
if(isset($_POST['admin_login'])){

    $admin_email =  mysqli_real_escape_string($conn,$_POST['email']);

    $admin_password =  mysqli_real_escape_string($conn,$_POST['password']);

    $get_admin_sql = "SELECT * FROM admins WHERE admin_email = '$admin_email' AND admin_pass = '$admin_password' ";
    $run_admin = mysqli_query($conn,$get_admin_sql);
    $admin_check = mysqli_num_rows($run_admin);

    if($admin_check == 1){
        $_SESSION['admin_email'] = $admin_email;
        echo "<script>alert('you are logged in')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }else{
        echo "<script>alert('email or password is wrong')</script>";
    }
}

?>

<?php include "includes/footer.php" ?>