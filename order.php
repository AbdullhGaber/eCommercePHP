<?php
include "includes/head.php";

if (isset($_GET['cus_id'])) {
    $cus_id = $_GET['cus_id'];
}


$ip_add = getUserRealIP();

$status = "pending";

$invoice_no = mt_rand();

$get_cart_sql = "SELECT * FROM products p INNER JOIN cart c ON p.product_id = c.p_id WHERE c.ip_add = '$ip_add' ";
$get_cart_run = mysqli_query($conn, $get_cart_sql);

$sub_total = 0;

while ($get_cart_row = mysqli_fetch_assoc($get_cart_run)) :

    $sub_total = $get_cart_row['product_price'] * $get_cart_row['qty'];
    $insert_customer_order = "insert into customer_orders (customer_id,due_amount,invoice_no,qty,size,order_date,order_status) values ('$cus_id','$sub_total','$invoice_no','$get_cart_row[qty]','$get_cart_row[size]',NOW(),'$status')";

    $run_customer_order = mysqli_query($conn, $insert_customer_order);

    $insert_pending_order = "insert into pending_orders (customer_id,invoice_no,product_id,qty,size,order_status) values ('$cus_id','$invoice_no','$get_cart_row[product_id]','$get_cart_row[qty]','$get_cart_row[size]','$status')";

    $run_pending_order = mysqli_query($conn, $insert_pending_order);

    $delete_cart = "delete from cart where ip_add='$ip_add'";

    $run_delete = mysqli_query($conn, $delete_cart);

    echo "<script>alert('Your order has been submitted,Thanks ')</script>";

    echo "<script>window.open('my_account.php?myOrders&cus_id=$cus_id','_self')</script>";

endwhile;
