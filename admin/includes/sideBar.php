<div class="row " style="width: 1378px;">
    <div class="col-2 bg-light " style="height: 1020px;">
        <ul class="nav flex-column">

            <li class="nav-item">
                <a class="nav-link active" href="./index.php"><i class="fas fa-tachometer-alt"></i> Dashbord</a>
            </li>

            <li class="nav-item">
                <a data-bs-toggle="collapse" class="nav-link" href="#collapseProduct"><i class="fas fa-plus"></i> Products</a>
            </li>

            <ul class="collapse nav" id="collapseProduct">

                <li class="nav-item">
                    <a class="nav-link ms-3" href="add_product.php"><i class="fas fa-pen-alt"></i> New product</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link ms-3" href="view_products.php"><i class="fas fa-edit "></i> View product</a>
                </li>

            </ul>

            <li class="nav-item">
                <a data-bs-toggle="collapse" class="nav-link" href="#collapseBox"><i class="fas fa-plus"></i> Boxes</a>
            </li>

            <ul class="collapse nav" id="collapseBox">

                <li class="nav-item">
                    <a class="nav-link ms-3" href="add_boxes.php"><i class="fas fa-pen-alt"></i> New box</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link ms-3" href="view_boxes.php"><i class="fas fa-edit "></i> View boxes</a>
                </li>

            </ul>

            <li class="nav-item">
                <a data-bs-toggle="collapse" class="nav-link" href="#collapseTerm"><i class="fas fa-plus"></i> Terms</a>
            </li>

            <ul class="collapse nav" id="collapseTerm">

                <li class="nav-item">
                    <a class="nav-link ms-3" href="add_term.php"><i class="fas fa-pen-alt"></i> New term</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link ms-3" href="view_terms.php"><i class="fas fa-edit "></i> View term</a>
                </li>

            </ul>


            <li class="nav-item">
                <a data-bs-toggle="collapse" class="nav-link" href="#collapseCategory"><i class="fas fa-plus"></i> Categories</a>
            </li>

            <ul class="collapse nav" id="collapseCategory">

                <li class="nav-item">
                    <a class="nav-link ms-3" href="add_category.php"><i class="fas fa-pen-alt"></i> New category</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link ms-3" href="view_categories.php"><i class="fas  fa-edit "></i> View category</a>
                </li>
    
            </ul>

            <li class="nav-item">
                <a data-bs-toggle="collapse" class="nav-link" href="#collapsePCategory"><i class="fas fa-plus"></i> products categories</a>
            </li>

            <ul class="collapse nav" id="collapsePCategory">

                <li class="nav-item">
                    <a class="nav-link ms-3" href="add_p_category.php"><i class="fas fa-pen-alt"></i> New product category</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link ms-3" href="view_p_categories.php"><i class="fas  fa-edit "></i> View product category</a>
                </li>

            </ul>

            <li class="nav-item">
                <a data-bs-toggle="collapse" class="nav-link" href="#collapseSlide"><i class="fas fa-plus"></i> Slides</a>
            </li>

            <ul class="collapse nav" id="collapseSlide">

                <li class="nav-item">
                    <a class="nav-link ms-3" href="add_slides.php"><i class="fas fa-pen-alt"></i> New slide</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link ms-3" href="view_slides.php"><i class="fas  fa-edit "></i> View slides</a>
                </li>

            </ul>


            <li class="nav-item">
                <a class="nav-link" href="edit_css.php"><i class="fa-brands fa-css3-alt"></i> Edit css</a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="view_customers.php"><i class="fas fa-users"></i> View customers</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="view_orders.php"><i class="fas fa-list"></i> View orders</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="view_payments.php"><i class="fas fa-money-check-alt"></i> View payments</a>
            </li>

            <li class="nav-item">
                <a data-bs-toggle="collapse" class="nav-link" href="#collapseUsers"><i class="fas fa-user"></i> Users</a>
            </li>

            <ul class="collapse nav" id="collapseUsers">

                <li class="nav-item">
                    <a class="nav-link ms-3" href="add_admin.php"><i class="fas fa-pen-alt"></i> New user</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link ms-3" href="view_admins.php"><i class="fas  fa-edit "></i> View users</a>
                </li>
            <?php $admin_info = getAdminInfo() ?>
                <li class="nav-item">
                    <a class="nav-link ms-3" href="edit_admin.php?admin_id=<?= $admin_info['admin_id'] ?>"><i class="fas  fa-edit "></i> Edit users</a>
                </li>

            </ul>

            <li class="nav-item">
                <a class="nav-link" href="logout.php"><i class="fa-solid fa-power-off"></i> Logout</a>
            </li>

        </ul>
    </div> <!-- col-2 -->
    <div class="col-10 py-5 ">