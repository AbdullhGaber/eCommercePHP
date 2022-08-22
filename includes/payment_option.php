
<?php 
$user_row = getUserInfo(); 
?>
<div class="card text-center p-3">
    <h1><b>Payment options for you</b></h1>
    <a href="./order.php?cus_id=<?= $user_row['customer_id'] ?>">
        <h3 class="text-muted mt-2">pay offline</h3>
    </a>
    <a href="#" style="text-decoration: none ;">
        <h3 class="text-muted mt-2">pay online width paypal</h3>
    </a>

    <img src="./images/paypal.png">

</div>