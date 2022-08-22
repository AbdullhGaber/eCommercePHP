<div class="card">
    <div class="card-body ">

        <nav class="nav nav-pills nav-fill d-flex flex-column  ">
            <?php

            $get_terms = "select * from terms ";

            $run_terms = mysqli_query($conn, $get_terms);

            while ($row_terms = mysqli_fetch_array($run_terms)) :

                $term_title = $row_terms['term_title'];

                $term_link = $row_terms['term_link'];

            ?>
                <a class="nav-link <?php if (isset($_GET['term_id'])){ 
                   if($_GET['term_id'] == $row_terms['term_id']){
                        echo "active";
                   }
                    } ?> text-start py-3" href="./terms.php?term_id=<?=$row_terms['term_id']?>"><i class="fa-solid fa-bars me-2"></i> <?= $term_title ?></a>
            <?php endwhile; ?>
        </nav>

    </div>
</div>